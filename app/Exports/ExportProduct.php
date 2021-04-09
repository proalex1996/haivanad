<?php


namespace App\Exports;

use App\Model\ProductModel;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportProduct implements FromQuery,WithHeadings
{
    use Exportable;

        public function __construct($id_banner)
        {
            $this->id_banner = $id_banner;
        }

    public function query()
        { if($this->id_banner[0] != null){
            return ProductModel::query()
                ->join('status_banner','banner.name_status','=','status_banner.id_status')
                ->select('banner.id','banner.id_banner','banner.banner_adress','banner.size_banner','banner.height_banner','banner.light_system','status_banner.name_status')
                ->whereIn('banner.id_banner',$this->id_banner)
                ->orderBy('id','DESC')->getQuery();
            }
            else{
                return ProductModel::query()
                    ->join('status_banner','banner.name_status','=','status_banner.id_status')
                    ->select('banner.id','banner.id_banner','banner.banner_adress','banner.size_banner','banner.height_banner','banner.light_system','status_banner.name_status')
                    ->orderBy('id','DESC')->getQuery();
            }

        }

        public function headings(): array
        {
            return ['STT','Mã Pano','Địa Chỉ','Kích Thước','Tổng Chiều Cao','Hệ Thống Đèn','Trạng Thái'];
        }

}
