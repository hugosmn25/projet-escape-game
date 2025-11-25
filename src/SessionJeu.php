<?php

namespace App;

use App\Enigme;
use App\Salle;

class SessionJeu{
    private string $nomEquipe;
    private Salle $salle;
    private int $indexEnigmeCourante;
    private int $nombreTentatives;

    public function __construct(string $nomEquipe, Salle $salle){
        $this->nomEquipe = $nomEquipe;
        $this->salle = $salle;
        $this->indexEnigmeCourante = 0;
        $this->nombreTentatives = 0;
    }

    public function getEnigmeEnCours(): Enigme{
        return $this->salle->getEnigme($this->indexEnigmeCourante);
    }

    public function repondreAEnigme(string $str, $nombreTentatives): bool{
        $nombreTentatives++;
        return $this->getEnigmeEnCours()->verifierReponse($str);
    }

    public function estTerminee(): bool{
        if ($this->indexEnigmeCourante >= $this->salle->getNombreEnigmes() && $this->getEnigmeEnCours()->getEstResolue()){
            return true;
        }
        return false;
    }
    
    public function getIndexEnigmeCourante(): int{
        return $this->indexEnigmeCourante;
    }

    public function getNombreTentatives(): int{
        return $this->nombreTentatives;
    }


}