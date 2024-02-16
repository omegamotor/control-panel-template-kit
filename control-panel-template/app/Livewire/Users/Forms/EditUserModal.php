<?php

namespace App\Livewire\Users\Forms;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Illuminate\Validation\Rule;

class EditUserModal extends Component
{
    public $user;

    #[Validate]
    public $name;

    #[Validate]
    public $email;

    public function rules()
    {
        return [
            'name' => [
                'required','string','max:255',
                Rule::unique('users')->ignore($this->user),
            ],
            'email' => ['required','string','max:255',
                Rule::unique('users')->ignore($this->user),
            ],
        ];
    }

    #[On('edit-user-modal-open')]
    public function loadUser($user)
    {
        $this->user = User::findOrFail($user['id']);

        if($this->user){
            $this->name = $user->name ?? $user['name'];
            $this->email = $user->email ?? $user['email'];
        }
    }

    public function edit()
    {
        $validatedData = $this->validate();

        $this->user->name = $validatedData['name'];
        $this->user->email = $validatedData['email'];
        $this->user->save();

        $message = "Użytkownik zosał zaktualizowany!";
        $type = "SUCCESS";

        session()->flash('alert-type', $type);
        session()->flash('message', $message);

        return redirect()->route('users.list');
    }

    public function cancel()
    {
        $this->reset('user','name', 'email');
    }


    public function render()
    {
        return view('livewire.users.forms.edit-user-modal');
    }
}
