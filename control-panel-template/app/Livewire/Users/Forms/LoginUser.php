<?php

namespace App\Livewire\Users\Forms;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class LoginUser extends Component
{

    #[Validate('required|email|max:255', 'Email')]
    public $email;

    #[Validate('required|string|min:8', 'Hasło')]
    public $password;
    // public $remember;

    public function render()
    {
        return view('livewire.users.forms.login-user')->layout("layouts.empty");
    }

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            // Zalogowano pomyślnie
            return redirect()->route('dashboard');
        } else {
            // Błąd logowania
            session()->flash('error', 'Nieprawidłowe dane logowania');
        }
    }
}
