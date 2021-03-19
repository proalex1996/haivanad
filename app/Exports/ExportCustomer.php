<?php

namespace App\Exports;

use App\Model\CustomerModel;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportCustomer implements FromQuery, WithHeadings
{
        use Exportable;

        public function query()
    {
        return CustomerModel::query()
            ->join('type_customer','type_customer','=','type_customer.id')
            ->join('status','status_customer','=','status.id_status')
            ->join('solvency','solvency','=','solvency.id')
            ->select('customer.id','customer.customer_id','customer.name_customer','contact_name','mst','phone_customer','email_customer','type_customer.name_type','solvency.name_solvency','mass','status')->orderBy('id')->getQuery();
    }

    public function headings(): array
    {
        return ['STT','Mã Khách Hàng','Tên Khách Hàng','Tên Liên Hệ','Mã Số Thuế','Số Điện Thoại',' Email','Loại Khách Hàng','Khả Năng Thanh Toán','Khối Lượng','Trạng Thái'];
    }
}
