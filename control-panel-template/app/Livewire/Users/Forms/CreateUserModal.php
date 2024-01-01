<?php

namespace App\Livewire\Users\Forms;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CreateUserModal extends Component
{
    public $name;
    public $email;
    public $password;
    public $passwordConfirmation;

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

        $message = "Użytkownik zosał dodany!";
        $type = "Sukces";

        $this->dispatch('closeModal');
        $this->dispatch('alertMessage', $message, $type);
        // Wywołaj metodę refreshList w Component A
        $this->dispatch('refreshList');
        $this->reset('name', 'email', 'password', 'passwordConfirmation');

        // session()->flash('success', 'Rejestracja zakończona pomyślnie!');
    }

    public function cancel()
    {
        $this->reset('name', 'email', 'password', 'passwordConfirmation');
    }


    public function render()
    {
        return view('livewire.users.forms.create-user-modal');
    }
}
