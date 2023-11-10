<?php

namespace touiteur\app\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class SuiviUtilisateur extends Model
{
    protected $table = 'suivi_utilisateur';
    protected $primaryKey = 'id_suivi_utilisateur';
    public $timestamps = false;

    public function utilisateurSuivi(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, 'id_utilisateur_suivi');
    }

    public function utilisateurSuiveur(): BelongsTo
    {
        return $this->belongsTo(Utilisateur::class, 'id_utilisateur_suiveur');
    }
}