<?php

namespace touiteur\app\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class NoteTouite extends Model
{

    protected $table = 'Note_Touite';
    protected $primaryKey = 'IDNOTE';
    public $timestamps = false;

    public function Utilisateur()
    {
        return $this->belongsTo(Utilisateur::class, 'Utilisateur_ID');
    }

    public function Touite()
    {
        return $this->belongsTo(Touite::class, 'Touite_ID');
    }

    public function getNote(): int
    {
        return $this->NOTE;
    }

}