<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amis extends Model
{
    use HasFactory;
    public $table = 'listamis';

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id2');
    }
}
