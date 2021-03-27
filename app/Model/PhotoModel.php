<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class PhotoModel extends Model
{
    protected $table ='photo';
    public $timestamps = false;
    protected $fillabled = [
        'id',
        '_name_photo',
        'id_banner'
    ];
}
