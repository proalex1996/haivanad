<?php


namespace App\Exports;


use App\Model\ContractModel;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportPayment
{
class ExportReport implements FromQuery, WithHeadings
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
            ->select('customer.name_customer','banner._name_banner','customer.phone_customer','kind_contract.name_kind',
                'contract.date_start','contract.date_end','contract.value_contract','detail_payment.total_value',
                'detail_payment._pay_due','contract_status.name_status','contract.note_contract')
            ->orderBy('customer_id','DESC')->getQuery();

    }

    public function headings(): array
    {
        return ['TÊN KHÁCH HÀNG','ĐỊA CHỈ','SĐT','VỊ TRÍ','LOẠI HĐ','TỪ NGÀY','ĐẾN NGÀY',' TỔNG GIÁ TRỊ HĐ','SỐ TIỀN','LỊCH THANH TOÁN','TRẠNG THÁI','Ghi Chú'];
    }
}

}
