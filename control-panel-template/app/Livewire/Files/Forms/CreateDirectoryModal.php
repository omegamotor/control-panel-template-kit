<?php

namespace App\Livewire\Files\Forms;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Attributes\Validate;

class CreateDirectoryModal extends Component
{
    public $breadcrumbs;

    #[Validate('required|string|', 'Nazwa folderu')]
    public $fileName = '';

    protected $listeners = ['breadcrumbsUpdated' => 'updateBreadcrumbs'];

    public function mount($breadcrumbs){
        $this->breadcrumbs = $breadcrumbs;
    }

    public function render()
    {
        return view('livewire.files.forms.create-directory-modal');
    }

    public function updateBreadcrumbs($breadcrumbs)
    {
        $this->breadcrumbs = $breadcrumbs;
    }

    public function createFolder(){
        $path = 'public/' . implode('/', $this->breadcrumbs);
        Storage::makeDirectory($path . '/' . $this->fileName);

        $type = 'SUCCESS';
        $message = 'Nowy folder dodany!';

        session()->flash('alert-type', $type);
        session()->flash('message', $message);

        $path = implode('/', $this->breadcrumbs);
        $this->dispatch('newDirectory', $path);

        $this->reset('fileName');
    }

    public function cancel()
    {
        $this->reset('fileName');
    }
}
