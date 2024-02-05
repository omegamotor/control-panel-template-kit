<?php

namespace App\Livewire\Components;

use Livewire\Component;

class DiskSpace extends Component
{
    public $freeDiskSpace;
    public $totalDiskSpace;

    public function mount(){
        $this->totalDiskSpace = number_format(disk_total_space("/") / 1024 / 1024 / 1024,2);
        $this->freeDiskSpace = number_format(disk_free_space("/") / 1024 / 1024 / 1024,2);
    }

    public function render()
    {
        return view('livewire.components.disk-space');
    }
}
