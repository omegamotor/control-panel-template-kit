<?php

namespace App\Livewire\Notifications;

use App\Events\PusherBroadcast;
use App\Models\CustomNotification;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use App\Traits\FilterTrait;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;

class NotificationsList extends Component
{
    use WithPagination;
    use FilterTrait;

    public string $searchBy = '';
    public string $sortBy = 'DESC';
    public int $perPage = 50;

    // new, readed, all
    public string $typeShow = 'new';

    protected $queryString = [
        'typeShow' => ['except' => 'new'],
        'sortBy' => ['except' => 'ASC'],
        'searchBy' => ['except' => ''],
        'perPage' => ['except' => 50],
    ];

    // For save Filters (Trait Need this)
    private $filterSaveData = [
        'typeShow' => 'notifications_list-typeShow',
        'sortBy' => 'notifications_list-sortBy',
        'perPage' => 'notifications_list-perPage',
        'searchBy' => 'notifications_list-searchBy',
    ];
    // --------------------------------------

    public function pusherTest(){
        $title = 'Nowa wiadomość';
        $message = 'Treść wiadomośći!!';
        $type = 'SUCCESS';
        $authorId = Auth::user()->id;

        $users = User::all();

        foreach ($users as $user) {
            CustomNotification::create([
                'title' => $title,
                'message' => $message,
                'type' => $type,
                'user_id' => $user->id,
                'author_id' => $authorId,
            ]);
        }

        try {
            event(new PusherBroadcast($title, $message, $type));
        } catch (\Throwable $th) {
            //throw $th;
            $type = 'ERROR';
            $message = 'Wiadomość nie zostanie poprawnie wysłana! Pusher jest żle skonfigurowany!';
            session()->flash('alert-type', $type);
            session()->flash('message', $message);

            return redirect()->route('notifications.list');
        }
    }

    #[On('newNotification')]
    public function readNewNotification($data){
        // dd($data);
    }

    public function setAsReaded($notificationId){
        $notification = CustomNotification::find($notificationId);
        if($notification && !$notification->is_readed){
            $notification->is_readed = 1;
            $notification->save();
        }
        $this->dispatch('load-alerts');
        // $this->gotoPage(1);
    }

    // Back to First Page After Change filters
        public function updatedtypeShow()
        {$this->gotoPage(1);}

        public function updatedPerPage()
        {$this->gotoPage(1);}

        public function updatedSearchBy()
        {$this->gotoPage(1);}
    // -----------------------------------------

    public function render()
    {
        return view('livewire.notifications.notifications-list',[
            'notifications' => CustomNotification::where('title', 'LIKE', '%' . $this->searchBy . '%')
                ->where('user_id', Auth::user()->id)
                ->when($this->typeShow == 'readed', function ($q) {
                    return $q->where('is_readed', true);
                })
                ->when($this->typeShow == 'new', function ($q) {
                    return $q->where('is_readed', false);
                })
                ->orderBy('id', $this->sortBy)
                ->paginate($this->perPage)
                ->withQueryString()
        ]);
    }
}
