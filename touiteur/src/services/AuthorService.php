<?php

namespace touiteur\app\services;

use touiteur\app\models\Utilisateur;

class AuthorService
{
    public function isAdmin($id) : bool
    {
        $user = Utilisateur::find($id);
        if ($user->user_status == '3') {
            return true;
        } else {
            return false;
        }
    }

    public function saveUser(Utilisateur $user)
    {
        $user->save();
    }

    public function getAuthorID(mixed $id)
    {
        return Utilisateur::find($id);
    }
}