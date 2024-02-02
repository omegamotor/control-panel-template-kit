<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection, WithHeadings, WithMapping
{
    private $userIDs;

    public function __construct($userIDs){
        $this->userIDs = $userIDs;
    }

    /**
     * Return headings for the export file.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID', 'Nazwa użytkownika', 'Email', 'Konto od'
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
        return User::find($this->userIDs);
    }
}
