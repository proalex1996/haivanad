<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = 'banner';
    public $timestamps = false;
    protected $fillable = [
        'id_banner',
        'thumb_banner',
        'banner_adress',
        'size_banner',
        'height_banner',
        'content',
        'light_system',
        'name_status'
    ];
}
