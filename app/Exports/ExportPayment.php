<?php


namespace App\Exports;


use App\Model\ContractModel;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportPayment implements FromQuery, WithHeadings
{

    use Exportable;

    public function query()

    {
        return ContractModel::query()
            ->join('customer','contract.id_customer','=','customer.customer_id')
            ->join('type_customer','type_customer','=','type_customer.id')
            ->join('banner','contract.id_banner','=','banner.id_banner')
            ->join('kind_contract','contract.kind','=','kind_contract.id_contract')
            ->join('contract_status','contract_status.id_contract','=','contract.status_contract')
            ->join('detail_payment','contract.id_contract','=','detail_payment.id_contract')
            ->select('customer.name_customer','banner.location','customer.phone_customer','kind_contract.name_kind','banner._name_banner',
                'contract.date_start','contract.date_end','contract.value_contract', 'detail_payment._pay_due','detail_payment.total_value','contract.note_contract')
            ->orderBy('customer_id','DESC')->getQuery();

    }

    public function headings(): array
    {
        return ['TÊN KHÁCH HÀNG','VỊ TRÍ','SĐT','LOẠI HĐ','TỪ NGÀY','ĐẾN NGÀY',' TỔNG GIÁ TRỊ HĐ','LỊCH THANH TOÁN','SỐ TIỀN','Ghi Chú'];
    }


}
