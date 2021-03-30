<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $table = 'salary';
    public $timestamps = false;
    protected $dateFormat = 'dd-mm-YYYY';
    protected $fillable = [
        'id_salary',
        'bassic_salary',

    ];
}
