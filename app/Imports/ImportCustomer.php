<?php

namespace App\Imports;

use App\Model\CustomerModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class ImportCustomer implements ToModel, WithStartRow
{

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new CustomerModel([
        'customer_id'=>$row[0],
        'name_customer' => $row[1],
        'contact_name' => $row[2],
        'mst' => $row[3],
        'phone_customer' => $row[4],
        'email_customer' => $row[5],
        '_cmnd' => $row[6],
        '_bank' => $row[7],
        'adress_customer' => $row[8],
        'id_nguon' => $row[9],
        'position_customer' => $row[10],
        'mass' => $row[11],
        'solvency' => $row[12],
        'status_customer' => $row[13],
        ]);
    }
    public function startRow(): int
    {
        return 2;
    }
}
