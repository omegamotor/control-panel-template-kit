<?php

namespace App\Livewire\Users\Forms;

use App\Mail\NewAccountEmail;
use App\Models\AppConfigurationEmail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateUserModal extends Component
{
    #[Validate('required|string|max:255|unique:users', 'Nazwa użytkownika')]
    public $name;

    #[Validate('required|email|max:255|unique:users', 'Email')]
    public $email;

    #[Validate('required|string|min:8|regex:/^(?=.*[^\w\d\s:])(?=.*[A-Z]).*$/', 'Hasło', message: 'Hasło musi zawierać min 8 znaków, w tym 1 znak specjalny i 1 wielką literę!')]
    public $password;

    public $password_confirmation;

    public function register()
    {
        $validatedData = $this->validate();

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        $shouldSendEmail = AppConfigurationEmail::first()->active_sending;

        if($user && $shouldSendEmail){
            Mail::to($user->email)->send(new NewAccountEmail($validatedData['name'], $validatedData['email']));
            $message = "Użytkownik zosał dodany!";
            $type = "SUCCESS";

        }else if($user){
            $message = "Użytkownik zosał dodany! Wysyłanie e-maili jest wyłączone, użytkownik nie zostanie poinformowany!";
            $type = "SUCCESS";

        }else{
            $message = "Podczas dodawania użytkownika wystąpił błąd!";
            $type = "ERROR";

        }

        session()->flash('alert-type', $type);
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
