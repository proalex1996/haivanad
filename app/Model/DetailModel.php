<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class DetailModel extends Model
{
    protected $table = 'detail_payment';
    public $timestamps = false;
    protected $primaryKey = 'id_contract';
    protected $fillable =[
        'payment_period',
        'ratio',
        'id_value_contract',
        'id_vat',
        'total_value',
        'id_contract',
        '_pay_due'
    ];

}
