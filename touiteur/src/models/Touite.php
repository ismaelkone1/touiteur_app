<?php

namespace touiteur\app\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Touite extends Model
{
    protected $table = 'Touite';
    protected $primaryKey = 'IDTOUITE';
    public $timestamps = false;


    public function auteur()
    {
        return $this->belongsTo(Utilisateur::class, 'Utilisateur_ID');
    }

    public function notes()
    {
        return $this->hasMany(NoteTouite::class, 'Touite_ID');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'Touite_Tag', 'Touite_ID', 'Tag_ID');
    }
}