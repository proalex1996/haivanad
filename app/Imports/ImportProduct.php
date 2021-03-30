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
            'id' => $row[0],
            'location' => $row[1],
            'banner_adress' => $row[2],
            'size_banner' => $row[3],
            'height_banner' => $row[4],
            'dac_diem' => $row[5],
            'light_system' => $row[6],
            'id_system' => $row[7],
            $id1 =DB::table('province')->select('province.id')->where('_name','=',$row[8])->first(),
            'tinh' => $id1['id'],
            $ids =DB::table('district')->select('id_district')->where('_name_district','=',$row[9])->get(),
            'quan' => $ids,
            $idss =DB::table('type_banner')->select('id_typebanner')->where('name_type','=',$row[10])->get(),

            'id_typebanner' => $idss,
            'flow' => $row[11],
            'escom' => $row[12],
            'gianam' => $row[13]

        ));
    }

    public function startRow(): int
    {
        return 4;
    }
}
