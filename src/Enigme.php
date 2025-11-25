<?php

namespace App;

class Enigme{
    private string $texte;
    private string $reponseAttendue;
    private string $indice;
    private bool $estResolue;

    public function __construct(string $texte, string $reponseAttendue, string $indice){
        $this->texte = $texte;
        $this->reponseAttendue = $reponseAttendue;
        $this->indice = $indice;
        $this->estResolue = false;
    }

    public function verifierReponse(string $reponse): bool{
        if($reponse === $this->reponseAttendue){
            $this->estResolue = true;
            return true;
        }else {
            $this->estResolue = false;
            return false;
        }
    }

    public function getTexte(): string{
        return $this->texte;
    }

    public function getReponseAttendue(): string{
        return $this->reponseAttendue;
    }

    public function getIndice(): string{
        return $this->indice;
    }

    public function getEstResolue(): bool{
        return $this->estResolue;
    }
}