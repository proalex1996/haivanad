<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class staffModel extends Model
{
    protected $table = 'users';

    public $timestamps = false;
    protected $dateFormat = 'dd-mm-YYYY';
    protected $fillable = [
        'id',
        'id_branch',
        'name',
        'id_staff',
        'email',
        'password',
        'non_password',
        'id_salary',
        'id_status',
        'staff_adress',
        'staff_phone',
        'id_CMND',
        'id_phan_quyen',
        'born',
        'io_position'

    ];
}
