<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class staffModel extends Model
{
    protected $table = 'users';
    protected $dateFormat = 'dd-mm-YYYY';
    protected $fillable = [
        'id_contract',
        'id_customer',
        'id_banner',
        'content',
        'id_staff',
        'date_start',
        'date_end',
        'kind',
        'value_contract',
        'status_contract'
    ];
}
