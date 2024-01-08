<?php

namespace App\Livewire\Users\Forms;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;

class DeleteUserModal extends Component
{
    public $user;

    public function render()
    {
        return view('livewire.users.forms.delete-user-modal');
    }

    #[On('delete-user-modal-open')]
    public function loadUser($user)
    {
        $this->user = User::findOrFail($user['id']);
    }

    public function clear(){
        $this->reset();
    }

    public function deleteUser(){
        $this->user->delete();

        $message = "Użytkownik został usunięty!";
        session()->flash('alert-type', 'SUCCESS');
        session()->flash('message', $message);

        return redirect()->route('users.list');

    }
}
