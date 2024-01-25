<?php

namespace App\Livewire\Notifications\Forms;

use App\Events\PusherBroadcast;
use App\Models\CustomNotification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateNotificationModal extends Component
{
    #[Validate('required|string|max:255', 'Tytuł powiadomienia')]
    public $title;

    #[Validate('required|string|max:255', 'Treść powiadomienia')]
    public $message;

    #[Validate('required|string|max:255', 'Typ powiadomienia')]
    public $type = "SUCCESS";

    public $icon = "fa-solid fa-circle-check";
    public $bgColor = "bg-success";

    public function sendNotification(){
        $validatedData = $this->validate();
        $authorId = Auth::user()->id;
        $users = User::all();

        foreach ($users as $user) {
            CustomNotification::create([
                'title' => $validatedData['title'],
                'message' => $validatedData['message'],
                'type' => $validatedData['type'],
                'user_id' => $user->id,
                'author_id' => $authorId,
            ]);
        }



        try {
            event(new PusherBroadcast($validatedData['title'], $validatedData['message'], $validatedData['type']));
        } catch (\Throwable $th) {
            //throw $th;
            $type = 'ERROR';
            $message = 'Powiadomienie nie zostanie poprawnie wysłana! Pusher jest żle skonfigurowany!';
            session()->flash('alert-type', $type);
            session()->flash('message', $message);

            return redirect()->route('notifications.list');
        }


        $message = "Powiadomienie zosało wysłane!";
        $type = "SUCCESS";

        session()->flash('alert-type', $type);
        session()->flash('message', $message);

        return redirect()->route('notifications.list');
    }

    public function updatedType(){
        if($this->type == 'SUCCESS'){
            $this->icon = 'fa-solid fa-circle-check';
            $this->bgColor = 'bg-success';
        }else if($this->type == 'INFO'){
            $this->icon = 'fa-solid fa-circle-info';
            $this->bgColor = 'bg-primary';
        }
        else if($this->type == 'WARNING'){
            $this->icon = 'fa-solid fa-triangle-exclamation';
            $this->bgColor = 'bg-warning';
        }
        else if($this->type == 'DANGER'){
            $this->icon = 'fa-solid fa-triangle-exclamation';
            $this->bgColor = 'bg-danger';
        }
        else if($this->type == 'ERROR'){
            $this->icon = 'fa-solid fa-triangle-exclamation';
            $this->bgColor = 'bg-danger';
        }
        else{
            $this->icon = 'fa-regular fa-circle-question';
            $this->bgColor = 'bg-secondary';
        }
    }

    public function cancel()
    {
        $this->reset('title', 'message', 'type', 'icon', 'bgColor');
    }

    public function render()
    {
        return view('livewire.notifications.forms.create-notification-modal');
    }

}
