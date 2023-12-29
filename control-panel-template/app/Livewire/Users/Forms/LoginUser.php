<?php

namespace App\Livewire\Users\Forms;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginUser extends Component
{

    public $email;
    public $password;
    // public $remember;

    public function render()
    {
        return view('livewire.users.forms.login-user');
    }

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            // Zalogowano pomyślnie
            return redirect()->to('/dashboard');
        } else {
            // Błąd logowania
            session()->flash('error', 'Nieprawidłowe dane logowania');
        }
    }
}
