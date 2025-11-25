<?php

namespace App;

use App\Enigme;

class Salle{
    private string $nom;
    private array $enigmes = [];

    public function __construct(string $nom){
        $this->nom = $nom;
        $this->enigmes = [];
    }

    public function ajouterEnigme (Enigme $enigme){
        $this->enigmes[] =$enigme;
    }

    public function getEnigme(int $index): Enigme{
        return $this->enigmes[$index];
    }

    public function getNombreEnigmes(): int{
        return count($this->enigmes);
    }
}