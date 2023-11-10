<?php

namespace touiteur\app\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class TouiteTag extends Model
{
    protected $table = 'Touite_Tag';
    protected $primaryKey = 'ID'; // Assurez-vous que la clé primaire correspond à celle définie dans votre schéma SQL
    public $timestamps = false;

    public function touite()
    {
        return $this->belongsTo(Touite::class, 'Touite_ID');
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class, 'Tag_ID');
    }
}