<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model
{
    protected $table = 'customer';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'customer_id',
        'name_customer',
        'mst',
        'contact_name',
        'phone_customer',
        'email_customer',
        'type_customer',
        'solvency',
        'mass',
        'status_customer',
        'id_nguon',
        'adress_customer'
    ];
}
