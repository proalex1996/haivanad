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
            'location' => $row[1],
            'banner_adress' => $row[2],
            'quan' => $row[3],
            'tinh' => $row[4],
            'id_typebanner' => $row[5],
            'id_system' => $row[6],
            'size_banner' => $row[7],
            'height_banner' => $row[8],
            'light_system' => $row[9,
            'content' => $row[10],
            'dac_diem' => $row[11],
            'flow' => $row[12],
            'escom' => $row[13],
            'status' => $row[14],
        ]);
    }

    public function startRow(): int
    {
        return 4;
    }
}
