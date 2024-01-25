<?php

namespace App\Livewire\Users;

use App\Http\Helpers\passwordGenerator;
use App\Models\User;
use App\Mail\NewPasswordEmail;
use App\Models\AppConfigurationEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithPagination;
use App\Traits\FilterTrait;

class UsersList extends Component
{
    use WithPagination;
    use FilterTrait;

    public string $searchBy = '';
    public string $sortBy = 'ASC';
    public int $perPage = 50;

    protected $queryString = [
        'sortBy' => ['except' => 'ASC'],
        'searchBy' => ['except' => ''],
        'perPage' => ['except' => 50],
    ];

    // For save Filters (Trait Need this)
    private $filterSaveData = [
        'sortBy' => 'users_list-sortBy',
        'perPage' => 'users_list-perPage',
        'searchBy' => 'users_list-searchBy',
    ];
    // --------------------------------------

    public function openModal($user, $type){
        $this->dispatch($type.'-user-modal-open', user: $user);
    }

    public function sendNewPassword($user){
        $user = User::find($user['id']);

        if($user){
            $passwordGenerator = new passwordGenerator(12, 12);

            $newPassword = htmlspecialchars($passwordGenerator->generate());
            $user->password = Hash::make($newPassword);

            $shouldSendEmail = AppConfigurationEmail::first()->active_sending;

            if($shouldSendEmail){

                $user->save();
                $message = "Nowe hasło zostało wysłane na podany email!";
                $type = "SUCCESS";

                try {
                    Mail::to($user->email)->send(new NewPasswordEmail($user, $newPassword));
                } catch (\Throwable $th) {
                    $type = 'ERROR';
                    $message = 'Mailing został źle skonfigurowany albo wysyłanie jest zablokowane. Nie można wysłać nowego hasła!';
                    session()->flash('alert-type', $type);
                    session()->flash('message', $message);
                }

            }else{
                $message = "Mailing nie został skonfigurowany albo wysyłanie jest zablokowane. Nie można wysłać nowego hasła!";
                $type = "ERROR";
            }

            session()->flash('alert-type', $type);
            session()->flash('message', $message);

            return redirect()->route('users.list');
        }
    }

    // To First Page After Change filters
    public function updatedPerPage()
    {$this->gotoPage(1);}

    public function updatedsearchBy()
    {$this->gotoPage(1);}

    public function render()
    {
        return view('livewire.users.users-list',[
            'users' => User::where('name', 'LIKE', '%' . $this->searchBy . '%')
                ->orderBy('name', $this->sortBy)
                ->select(['id','name','email'])
                ->paginate($this->perPage)
                ->withQueryString()
        ]);
    }
}
