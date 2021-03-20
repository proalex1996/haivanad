<?php


namespace App\Exports;


use App\Model\staffModel;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportStaff implements FromQuery, WithHeadings
{
    use Exportable;

    public function query()
    {
        return staffModel::query()
            ->join('salary','users.id_salary','=','salary.id_salary')
            ->join('branch','users.id_branch','=','branch.id_branch')
            ->join('positions','users.id_position','=','positions.id_position')

            ->select('users.id','users.name','users.email','users.staff_phone','users.id_CMND','users.born','users.staff_adress','branch.name_branch','positions.name_position','salary.bassic_salary','users.created_at')->orderBy('id','DESC')->getQuery();
    }

    public function headings(): array
    {
        return ['STT','Họ Và Tên','Email','Số Điện Thoại','CMND','Năm Sinh','Địa Chỉ','Chi Nhánh','Chức Vụ','Lương','Trạng Thái','Ngày Tạo'];
    }
}
