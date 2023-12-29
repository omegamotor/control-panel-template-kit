<?php

namespace App\Livewire\Users\Forms;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class RegisterUser extends Component
{
    public $name;
    public $email;
    public $password;
    // public $passwordConfirmation;

    public function render()
    {
        return view('livewire.users.forms.register-user');
    }

    public function register()
    {
        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        session()->flash('success', 'Rejestracja zakończona pomyślnie!');
        return redirect()->to('/login');
    }
}
