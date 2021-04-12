<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class StatusBanner extends Model
{
    protected $table = 'status_banner';
    public $timestamps = false;
    protected $dateFormat = 'dd-mm-YYYY';
    protected $fillable = [
        'id_status',
        'name_status',
        ];
}
