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
        'id'=>$row[0],
        'customer_id' => $row[1],
        'name_customer' => $row[2],
        'mst' => $row[3],
        'contact_name' => $row[4],
        'phone_customer' => $row[5],
        'email_customer' => $row[6],
        'type_customer' => $row[7],
        'solvency' => $row[8],
        'mass' => $row[9],
        'status_customer' => $row[10],
        ]);
    }
    public function startRow(): int
    {
        return 2;
    }
}
