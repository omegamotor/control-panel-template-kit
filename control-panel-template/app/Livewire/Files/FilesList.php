<?php

namespace App\Livewire\Files;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class FilesList extends Component
{
    public $showType;
    protected $listeners = ['newDirectory' => 'hideDotFiles', 'fileUploaded' => 'hideDotFiles'];

    public $breadcrumbs = [];
    public $files = [];
    public $directories = [];
    public $filesWithData = [];

    public function render(){
        return view('livewire.files.files-list');
    }

    public function mount(){
        $this->showType = "grid";
        $this->hideDotFiles('');
    }

    public function getLastUpdateDate($route){
        $dataModyfikacji = Storage::lastModified($route);
        return date('Y-m-d H:i:s', $dataModyfikacji);
    }

    public function getFileSize($route){
        $size = Storage::size($route) / 1024 / 1024 ;
        return number_format($size,2) ;
    }

    public function openFolder($name){
        $this->breadcrumbs[] = $name;
        $this->dispatch('breadcrumbsUpdated', $this->breadcrumbs);
        $path = implode('/', $this->breadcrumbs);
        $this->hideDotFiles($path);
    }

    public function backToMainFolder(){
        $this->breadcrumbs = [];
        $this->dispatch('breadcrumbsUpdated', $this->breadcrumbs);
        $this->hideDotFiles('');
    }

    public function backToSelectFolder($index){
        $newBreadcrumbs = [];
        for ($i=0; $i <= $index ; $i++) {
            $newBreadcrumbs[] = $this->breadcrumbs[$i];
        }

        $this->breadcrumbs = $newBreadcrumbs;
        $this->dispatch('breadcrumbsUpdated', $this->breadcrumbs);
        $path = implode('/', $this->breadcrumbs);
        $this->hideDotFiles($path);
    }

    public function deleteFile($fileName){
        $path = 'public/' . implode('/', $this->breadcrumbs) . '/' . $fileName;
        Storage::delete($path);
        $path = implode('/', $this->breadcrumbs);
        $this->hideDotFiles($path);
    }
    public function deleteDirectory($fileName){
        $path = 'public/' . implode('/', $this->breadcrumbs) . '/' . $fileName;
        Storage::deleteDirectory($path);
        $path = implode('/', $this->breadcrumbs);
        $this->hideDotFiles($path);
    }

    public function hideDotFiles($directory){
        $directory = 'public/' . $directory;
        $this->files = Storage::files($directory);
        $this->directories = Storage::directories($directory);

        $newData = [];
        foreach ($this->files as $file) {
            $lastSlashPosition = strrpos($file, '/');
            $file = substr($file, $lastSlashPosition + 1);

            if($file && $file[0] != '.'){
                $newData[] = $file;
            }
        }
        $this->files = $newData;
        $newData = [];

        foreach ($this->directories as $directory) {
            $lastSlashPosition = strrpos($directory, '/');
            $newData[] = substr($directory, $lastSlashPosition + 1);
        }

        $this->directories = $newData;
        $newData = [];

        $this->filesWithData = [];

        foreach ($this->files as $file){
            $sciezka = 'public/' . implode('/', $this->breadcrumbs) . '/' . $file;
            $lastUpdateDate = $this->getLastUpdateDate($sciezka);
            $size = $this->getFileSize($sciezka);
            $this->filesWithData[] = [
                'name' => $file,
                'size' => $size,
                'created_at' => $lastUpdateDate
            ];
        }
    }

    public function changeShowType($type){
        $this->showType = $type;
    }
}
