<?php

namespace touiteur\app\services;

use touiteur\app\models\Image;
use touiteur\app\models\Touite;

class TouiteService
{
    public function getAllTouites()
    {
        return Touite::all();
    }

    public function deleteTouite(Touite $touite)
    {
        $touite->delete();
    }

    public function getTouite(mixed $id)
    {
        return Touite::find($id);
    }

    public function createTouite(string $text, int $id)
    {
        $touite = new Touite();
        $touite->text = $text;
        $touite->Utilisateur_ID = $id;
        $touite->save();
    }

    public static function addImage(string $id, string $image): void
    {
        if ($image != null) {
            $article = Touite::findOrFail($id);
            $article->images()->attach($image);
        }
    }


}