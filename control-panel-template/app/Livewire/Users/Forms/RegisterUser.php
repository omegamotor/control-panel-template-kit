<?php

namespace App\Livewire\Users\Forms;

use App\Models\User;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class RegisterUser extends Component
{
    #[Validate('required|string|max:255|unique:users', 'Nazwa użytkownika')]
    public $name;

    #[Validate('required|email|max:255|unique:users', 'Email')]
    public $email;

    #[Validate('required|string|min:8', 'Hasło')]
    public $password;

    public $passwordConfirmation;


    public function render()
    {
        return view('livewire.users.forms.register-user')
            ->layout("layouts.empty");
    }

    public function register()
    {
        $validatedData = $this->validate();

        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        session()->flash('alert-type', 'SUCCESS');
        session()->flash('message', 'Rejestracja zakończona pomyślnie!');

        return redirect()->route('users.login');
    }
}
