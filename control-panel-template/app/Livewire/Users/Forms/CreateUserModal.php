<?php

namespace App\Livewire\Users\Forms;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateUserModal extends Component
{
    #[Validate('required|string|max:255|unique:users', 'Nazwa użytkownika')]
    public $name;

    #[Validate('required|email|max:255|unique:users', 'Email')]
    public $email;

    #[Validate('required|string|min:8|confirmed', 'Hasło')]
    public $password;

    public $password_confirmation;

    public function register()
    {
        $validatedData = $this->validate();

        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        $message = "Użytkownik zosał dodany!";
        $type = "Sukces";

        session()->flash('alert-type', 'SUCCESS');
        session()->flash('message', $message);

        return redirect()->route('users.list');
    }

    public function cancel()
    {
        $this->reset('name', 'email', 'password', 'password_confirmation');
    }


    public function render()
    {
        return view('livewire.users.forms.create-user-modal');
    }
}
