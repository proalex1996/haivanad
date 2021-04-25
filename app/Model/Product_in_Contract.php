<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Product_in_Contract extends Model
{
    protected $table = 'product_in_contract';
    public $timestamps = false;
    protected $dateFormat = 'dd-mm-YYYY';
    protected $fillable = [
        'id_banner',
        'id_contract',
        'real_value'

    ];
}
