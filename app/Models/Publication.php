<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Publication extends Model
{
    use HasFactory , HasApiTokens,Notifiable;
    protected $table = "publications";
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type',
        'file',
        'statu',
        'is_image',
        'droit'
    ];

   
}