<?php

namespace App\Livewire\Users;

use App\Models\User;
use Illuminate\Queue\Listener;
use Livewire\Component;
use Livewire\WithPagination;

class UsersList extends Component
{
    use WithPagination;

    public string $searchBy = '';
    public string $sortBy = 'ASC';
    public int $perPage = 50;

    protected $queryString = [
        'sortBy' => ['except' => 'ASC'],
        'searchBy' => ['except' => ''],
        'perPage' => ['except' => 50],
    ];

    protected $listeners = ['refreshList' => 'render'];

    public function refreshList()
    {
        $this->refresh();
    }

    public function render()
    {
        return view('livewire.users.users-list',[
            'users' => User::where('name', 'LIKE', '%' . $this->searchBy . '%')
            ->orderBy('name', $this->sortBy)
            ->paginate($this->perPage)
            ->withQueryString()
        ]);
    }


    public function test(){
        dump($this->selectedUsers);
    }

}
