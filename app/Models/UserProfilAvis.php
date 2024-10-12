<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserProfilAvis extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_profil_id',
        'note',
        'messages'
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function user_profil() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_profil_id', 'id');
    }

    protected $table = 'users_profils_avis';
}
