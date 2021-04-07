<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class MapModel extends Model
{
    protected $table ='map';
    public $timestamps = false;
    protected $fillable = [
        'id',
        '_name_map',
        'id_banner'
    ];
}
