<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithProperties;

class UsersExport implements FromQuery,  WithProperties
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
    public function properties(): array
    {
        return [
            'name' => 'Users',
            'birthdate' => 'Birthdate',
        ];
    }

}
