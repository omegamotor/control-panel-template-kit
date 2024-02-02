<?php

namespace App\Livewire\Tests;

use App\Models\User;
use Livewire\Component;

class PdfTestTemplate extends Component
{
    public $usersP;


    public function render()
    {
        $this->usersP = User::all() ;
        return view('livewire.tests.pdf-test-template');
    }
}
