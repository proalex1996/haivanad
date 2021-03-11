<?php


namespace App\Imports;


use App\Model\staffModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ImportStaff implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        return new staffModel([
            'name' => $row[0],
            'email' => $row[1],
            'id_branch' => $row[2],
            'id_salary' => $row[3],
            'id_status' => $row[4],
            'staff_adress' => $row[5],
            'staff_phone' => $row[6],
            'born' => $row[7],
            'id_CMND' => $row[8],
            'id_phan_quyen' => $row[9],

        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
