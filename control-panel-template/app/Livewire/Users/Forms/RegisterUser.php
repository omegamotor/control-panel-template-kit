<?php

namespace App\Livewire\Users\Forms;

use App\Mail\NewAccountEmail;
use App\Models\AppConfigurationEmail;
use App\Models\User;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class RegisterUser extends Component
{
    #[Validate('required|string|max:255|unique:users', 'Nazwa użytkownika')]
    public $name;

    #[Validate('required|email|max:255|unique:users', 'Email')]
    public $email;

    #[Validate('required|string|min:8|regex:/^(?=.*[^\w\d\s:])(?=.*[A-Z]).*$/', 'Hasło', message: 'Hasło musi zawierać min 8 znaków, w tym 1 znak specjalny i 1 wielką literę!')]
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

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        $shouldSendEmail = AppConfigurationEmail::first()->active_sending;

        if($user && $shouldSendEmail){
            Mail::to($user->email)->send(new NewAccountEmail($validatedData['name'], $validatedData['email']));
            $message = "Rejestracja zakończona pomyślnie!";
            $type = "SUCCESS";

        }else if($user){
            $message = "Rejestracja zakończona pomyślnie! Wysyłanie e-maili jest wyłączone, użytkownik nie zostanie poinformowany!";
            $type = "SUCCESS";

        }else{
            $message = "Podczas dodawania użytkownika wystąpił błąd!";
            $type = "ERROR";
        }

        session()->flash('alert-type', $type);
        session()->flash('message', $message);

        return redirect()->route('users.login');
    }
}
