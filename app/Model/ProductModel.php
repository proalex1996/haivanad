<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    protected $table = 'banner';
    protected $dateFormat = 'dd-mm-YYYY';
    public $timestamps = false;
    protected $fillable = [
        'id_banner',
        'flow',
        'tinh',
        'location',
        'banner_adress',
        'quan',
        'id_system',
        'size_banner',
        'name_status',
        'height_banner',
        'light_system',
        'id_typebanner',
        'escom',
        'dac_diem',
        'note_banner',
        'thumb_banner',
        'gianam',
        'dien_tich'
    ];
}
