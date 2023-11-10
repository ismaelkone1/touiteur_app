<?php

namespace touiteur\app\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class AbonnementTag extends Model
{
    protected $table = 'Abonnement_Tag';
    protected $primaryKey = 'IDABNTAG';
    public $timestamps = false;

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'Utilisateur_ID');
    }

    public function tag(): BelongsTo
    {
        return $this->belongsTo(Tag::class, 'Tag_ID');
    }
}