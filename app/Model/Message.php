<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;



class Message extends Model
{
    protected $table = 'message';

    protected $fillable = ['message_content', 'id_staff'];

    public function user() {
        return $this->belongsTo(UserModel::class);
    }
}
