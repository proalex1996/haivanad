<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = 'branch';
    public $timestamps = false;
    protected $dateFormat = 'dd-mm-YYYY';
    protected $fillable = [
        'id_branch',
        'name_branch',
        'adress_branch'

    ];
}
