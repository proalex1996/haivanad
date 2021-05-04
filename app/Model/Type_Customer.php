<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Type_Customer extends Model
{
    protected $table = 'type_customer';
    public $timestamps = false;
    protected $dateFormat = 'dd-mm-YYYY';
    protected $fillable = [
        'id',
        'name_type',
        ];

}
