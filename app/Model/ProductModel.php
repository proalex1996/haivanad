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
        'location',
        'banner_adress',
        'quan',
        'tinh',
        'id_typebanner',
        'id_system',
        'size_banner',
        'height_banner',
        'light_system',
        'flow',
        'dac_diem',
        'status_banner',
        'note_banner'
    ];
}
