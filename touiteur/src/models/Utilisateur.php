<?php

namespace touiteur\app\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Utilisateur extends Model
{
    protected $table = 'Utilisateur';
    protected $primaryKey = 'iduser';
    public $timestamps = false;

    public function status(): BelongsTo
    {
        return $this->belongsTo(UserStatus::class, 'user_status');
    }

    public function touites()
    {
        return $this->hasMany(Touite::class, 'Utilisateur_ID');
    }

    public function suivis()
    {
        return $this->hasMany(SuiviUtilisateur::class, 'Utilisateur_ID');
    }

    public function abonnementsTags()
    {
        return $this->hasMany(AbonnementTag::class, 'Utilisateur_ID');
    }

    public function notesTouites()
    {
        return $this->hasMany(NoteTouite::class, 'Utilisateur_ID');
    }
}