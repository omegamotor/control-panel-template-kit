<?php

namespace App\Exports;

use App\Models\Schedule;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ScheduleExport implements FromCollection, WithHeadings, WithMapping
{
    private $schedule;

    public function __construct($schedule){
        $this->schedule = $schedule;
    }

    /**
     * Return headings for the export file.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID', 'Nazwa użytkownika', 'Email', 'Konto fvod'
        ];
    }

    public function map($user): array
    {
        return [
            $user->id,
            $user->name,
            $user->email,
            $user->created_at,
        ];
    }


    /**
     * Return a collection of users.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return $this->schedule;
    }
}
