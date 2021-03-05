<?php


namespace App\Imports;
use App\Model\ProductModel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ImportProduct implements ToModel, WithStartRow
{

    public function model(array $row)
    {
        return new ProductModel([
            'id_banner' => $row[0],
            'banner_adress' => $row[1],
            'size_banner' => $row[2],
            'height_banner' => $row[3],
            'light_system' => $row[4],
            'content' => $row[5],
            'thumb_banner' => $row[6],
            'status' => $row[7],
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
