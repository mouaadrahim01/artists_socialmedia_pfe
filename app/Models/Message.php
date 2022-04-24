<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Mzssage extends Model
{
    use HasFactory , HasApiTokens,Notifiable;
    protected $table = "messages";

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'recepteur_id',
        'conv_id',
        'contenu',
        'type_message',
        'Vu'
    ];

   
}