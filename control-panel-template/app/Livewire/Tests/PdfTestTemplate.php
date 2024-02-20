<?php

namespace App\Livewire\Tests;

use App\Models\Schedule;
use App\Models\User;
use Livewire\Component;

class PdfTestTemplate extends Component
{
    public $schedule;

    public $weekDays = [
        'Poniedziałek',
        'Wtorek',
        'Środa',
        'Czwartek',
        'Piatek',
        'Sobota',
        'Niedziela',
    ];


    public function render()
    {
        $this->schedule = Schedule::first();
        return view('livewire.tests.pdf-test-template');
    }
}
