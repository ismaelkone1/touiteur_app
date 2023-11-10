<?php

namespace touiteur\app\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Tag extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'Tag';
    protected $primaryKey = 'IDTAG';
    public $timestamps = false;

    public function touites()
    {
        return $this->belongsToMany(Touite::class, 'Touite_Tag', 'Tag_ID', 'Touite_ID');
    }

    public function abonnements()
    {
        return $this->hasMany(AbonnementTag::class, 'Tag_ID');
    }
}