<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CovoiturageAd extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nb_place_offert',
        'nb_place_dispo',
        'color',
        'marque_vehicule',
        'type_ad',
        'date_heure_depart',
        'quotidienne',
        'vehicule_id',
        'autre_vehicule',
        'is_recuperation_dom',
        'is_livraison_dom',
        'price'

    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    protected $table = 'covoiturage_ads';
}
