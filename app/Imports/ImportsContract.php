<?php


namespace App\Imports;


use App\Model\ContractModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportsContract
{
    public function model(array $row)
    {
        return new ContractModel([
            'name'     => $row['name'],
            'email'    => $row['email'],
            'password' => \Hash::make($row['password']),
        ]);
    }
}
