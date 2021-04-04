<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;
use phpDocumentor\Reflection\Types\Self_;

class ContractModel extends Model
{
    protected $table = 'contract';
    public $timestamps = false;
    protected $dateFormat = 'dd-mm-YYYY';
    protected $fillable = [
        'id_contract',
        'id_customer',
        'id_banner',
        'content',
        'id_staff',
        'date_start',
        'date_end',
        'kind',
        'value_contract',
        'vat',
        'note_contract'

    ];


}
