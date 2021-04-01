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
            $row[0] =>'id_banner',
//            'location' => $row[1],
//            'banner_adress' => $row[2],
//            'size_banner' => $row[3],
//            'height_banner' => $row[4],
//            'dac_diem' => $row[5],
//            'light_system' => $row[6],
//            'id_system' => $row[7],
//            $tinh =DB::table('province')->select('province._code')->where('_name','=',$row[8])->get(),
//            'tinh' => $tinh[0]->_code,
//            $ids =DB::table('district')->select('id_district')->where('_name_district','=',$row[9])->get(),
//            'quan' => $ids[0]->id_district,
//            $idss =DB::table('type_banner')->select('id_typebanner')->where('name_type','=',$row[10])->get(),
//            'id_typebanner' => $idss[0]->id_typebanner,
//            $status =DB::table('status_banner')->select('id_status')->where('name_status','=',$row[11])->get(),
//            'name_status' => $status[0]->id_status,
//            'flow' => $row[12],
//            'escom' => $row[13],
//            'gianam' => $row[14],

        ));
    }

    public function startRow(): int
    {
        return 2;
    }
}
