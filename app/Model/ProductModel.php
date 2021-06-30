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
        '_name_banner',
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
        'dien_tich',
        'v_light',
        'content',
        'license_number_advertise',
        'start_date_advertise',
        'end_date_advertise',
        'date_range_advertise',
        'content_advertise',
        'license_number_build',
        'start_date_build',
        'end_date_build',
        'date_range_build',
        'content_build'
    ];
}
