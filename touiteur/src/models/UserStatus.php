<?php

namespace touiteur\app\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class UserStatus extends Model
{
    protected $table = 'user_status';
    protected $primaryKey = 'id_user_status';
    public $timestamps = false;

    public function utilisateurs()
    {
        return $this->hasMany(Utilisateur::class, 'user_status');
    }
}