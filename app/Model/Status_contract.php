<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Status_contract extends Model
{
    protected $table = 'contract_status';
    public $timestamps = false;
    protected $dateFormat = 'dd-mm-YYYY';
    protected $fillable = [
        'id_contract',
        'name_status',
    ];
}
