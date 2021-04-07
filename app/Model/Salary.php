<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $table = 'kind_contract';
    public $timestamps = false;
    protected $dateFormat = 'dd-mm-YYYY';
    protected $fillable = [
        'id_contract',
        'name_kind',

    ];
}
