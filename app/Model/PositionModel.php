<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class PositionModel extends Model
{
    protected $table ='positions';
    public $timestamps = false;
    protected $fillabled = [
        'id',
        'name_branch',
        'id_branch'
    ];
}
