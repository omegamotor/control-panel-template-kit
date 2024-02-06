<?php

namespace App\Livewire\Files\Forms;

use Exception;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class UploadFileModal extends Component
{
    use WithFileUploads;

    public $breadcrumbs;

    #[Validate('image|required|max:1024','Plik')] // 1MB Max
    public $file = null;
    protected $listeners = ['breadcrumbsUpdated' => 'updateBreadcrumbs'];

    public function mount($breadcrumbs){
        $this->breadcrumbs = $breadcrumbs;
    }

    public function render()
    {
        return view('livewire.files.forms.upload-file-modal');
    }

    public function updateBreadcrumbs($breadcrumbs)
    {
        $this->breadcrumbs = $breadcrumbs;
    }

    public function cancel()
    {
        $this->reset('file');
    }

    public function uploadFile(){
        if($this->file){
            $originalName = $this->file->getClientOriginalName();
            $path = 'public/' . implode('/', $this->breadcrumbs);
            $completePath = $path.'/'.$originalName;
            $counter = 1;

            $extension = $this->file->getClientOriginalExtension();
            $fileName = pathinfo($originalName, PATHINFO_FILENAME);

            while (Storage::exists($completePath)) {
                $newFileName = $fileName . " ($counter)." . $extension;
                $completePath = $path.'/'.$newFileName;
                $counter++;
            }

            $this->file->storeAs($path, basename($completePath));

            $path = implode('/', $this->breadcrumbs);
            $this->dispatch('fileUploaded', $path);
            $this->reset('file');
        }else{
            $type = 'ERROR';
            $message = 'Wystąpił problem nie udało się zapisać pliku!';
            session()->flash('alert-type', $type);
            session()->flash('message', $message);

            return redirect()->route('files.list');
        }
    }
}
