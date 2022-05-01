<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromQuery, WithHeadings
{
    use Exportable;

    public function __construct( $start, $end)
    {
        $this->start = $start;
        $this->end = $end;
    }

    public function query()
    {
        return User::query()->select('id', 'name', 'birthdate')->where('birthdate','>=', $this->start)->where('birthdate','<=', $this->end);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Birthdate',
        ];
    }

}
