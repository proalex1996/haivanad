<?php


namespace App\Exports;

use App\Model\ProductModel;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportProduct implements FromQuery,WithHeadings
{
    use Exportable;

    public function query()
    {
        return ProductModel::query()
            ->join('status_banner','banner.status','=','status_banner.id_status')
            ->select('banner.id','banner.id_banner','banner.thumb_banner','banner.banner_adress','banner.size_banner','banner.height_banner','banner.content','banner.light_system','status_banner.name_status')->orderBy('id','DESC')->getQuery();
    }

    public function headings(): array
    {
        return ['STT','Mã Pano','Ảnh Đại Diện','Địa Chỉ','Kích Thước','Tổng Chiều Cao',' Nội Dung','Hệ Thống Đèn','Trạng Thái'];
    }
}
