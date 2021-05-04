<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'positions';
    public $timestamps = false;
    protected $dateFormat = 'dd-mm-YYYY';
    protected $fillable = [
        'id_position',
        'name_position'

    ];
}
