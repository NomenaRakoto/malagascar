<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'ville',
        'pays',
        'telephone',
        'full_telephone',
        'prenom',
        'adresse',
        'remember_token',
        'age',
        'aime_music_tout_long',
        'aime_discuter',
        'fb_link',
        'whatsapp',
        'full_whatsapp',
        'pdp',
        'lang',
        'sex',
        'is_email_verified',
        'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function pieces(): HasMany
    {
        return $this->hasMany(UserPj::class, 'user_id', 'id');
    }

    public function musics(): HasMany
    {
        return $this->hasMany(UserMusic::class, 'user_id', 'id');
    }

    public function profil_avis(): HasMany
    {
        return $this->hasMany(UserProfilAvis::class, 'user_profil_id', 'id');
    }

    public function avis(): HasMany
    {
        return $this->hasMany(UserProfilAvis::class, 'user_id', 'id');
    }

    public function trajets(): HasMany
    {
        return $this->hasMany(CovoiturageAd::class, 'user_id', 'id');
    }
}
