<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Nguon_Customer extends Model
{
    protected $table = 'nguon_customer';
    public $timestamps = false;
    protected $dateFormat = 'dd-mm-YYYY';
    protected $fillable = [
        'id_nguon',
        'name_nguon',
     ];
}
