<?php


namespace App\Imports;


use App\Model\ContractModel;
use App\Utilili\DateTimeFormat;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class ImportsContract implements ToModel, WithStartRow
{
    public function model(array $row)
    {
        return new ContractModel([
            'id_contract'=>$row[0],
            'id_customer' => $row[1],
            'id_staff' => $row[2],
            'id_banner' => $row[3],
            'kind' => $row[4],
            'date_start' => date_format(date_create($row[5]),'Y-m-d'),
            'date_end' => date_format(date_create($row[6]),'Y-m-d'),
            'value_contract' => $row[7],
            'vat' => $row[8],
            'note_contract' => $row[9],
            'status_contract' => $row[10],



        ]);
    }
    public function startRow(): int
    {
        return 2;
    }
}
