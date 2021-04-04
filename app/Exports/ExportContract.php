<?php


namespace App\Exports;


use App\Model\ContractModel;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportContract implements FromQuery, WithHeadings
{
    use Exportable;
    public function query()
    {
       return ContractModel::query()
           ->join('customer','contract.id_customer','=','customer.customer_id')
           ->join('banner','contract.id_banner','=','banner.id_banner')
           ->join('province','banner.tinh','=','province.id')
           ->join('district','banner.quan','=','district.id_district')
           ->join('users','contract.id_staff','=','users.id_staff')
           ->join('kind_contract','contract.kind','=','kind_contract.id_contract')
           ->join('type_banner','banner.id_typebanner','=','type_banner.id_typebanner')
           ->join('detail_payment','contract.id_contract','=','detail_payment.id_contract')
           ->select('banner.id_banner','kind_contract.name_kind','users.name','banner._name_banner'
               ,'banner.banner_adress','district._name_district','province._name','banner.id_system','banner.size_banner',
               'customer.name_customer',
               'customer.adress_customer','contract.content','value_contract','detail_payment._pay_due',
               'customer.contact_name',
               'contract.date_start',
               'contract.date_end',
               'contract.note_contract'
           )->orderBy('contract.id','DESC')->groupBy('banner.id_banner')->getQuery();

    }
    public function headings(): array
    {
        return ['MÃ PANO','LOẠI HĐ','NGƯỜI THEO DỎI','VỊ TRÍ','Địa chỉ'	,'Quận/Huyện','Tỉnh/TP','Kết Cấu',
        'KÍCH THƯỚC','TÊN KHÁCH HÀNG','ĐỊA CHỈ','NỘI DUNG HĐ',	'TỔNG GIÁ TRỊ HĐ','lịch thanh toán',
        'NGƯỜI LIÊN HỆ','Từ ngày','Đến ngày','Ghi Chú'
];
    }
}
