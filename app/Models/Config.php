<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
   use HasFactory;

    protected $fillable = [
        'key',
        'value'
    ];

    protected $table = 'config';
    public $timestamps = false;

    
}
