<?php


namespace App\Imports;
use App\Model\ProductModel;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ImportProduct implements ToModel, WithStartRow
{

    public function model(array $row)
    {
        return new ProductModel(array(
            'id_banner' => $row[0],
            '_name_banner' => $row[1],
            'banner_adress' => $row[2],
            'size_banner' => $row[3],
            'height_banner' => $row[4],
            'light_system ' => $row[5],
            'name_status ' => $row[6],
            'id_system' => $row[7],
            'quan' => $row[8],
            'tinh' => $row[9],
            'id_typebanner' => $row[10],
            'id_system ' => $row[11],
            'dac_diem ' => $row[12],
            'flow escom' => $row[13],
            'escom' => $row[14],
            'note_banner' => $row [15],
            'gianam' => $row[16],
            'dien_tich' => $row[17]

        ));
    }

    public function startRow(): int
    {
        return 2;
    }
}
