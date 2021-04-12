<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'type_banner';
    public $timestamps = false;
    protected $dateFormat = 'dd-mm-YYYY';
    protected $fillable = [
        'id_typebanner',
        'name_type',
    ];
}
