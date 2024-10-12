<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserPj extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'recto_verso',
        'pj_name',
        'is_verified',
        'verified_at',
        'filename'
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    protected $table = 'users_pj';
}
