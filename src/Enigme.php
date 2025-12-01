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

    /**
     * Vérifie la réponse fournie par l'utilisateur.
     * La comparaison est insensible à la casse et ignore les espaces de début/fin.
     */
    public function verifierReponse(string $reponse): bool{
        // Normalisation : trim + minuscules multi-octets pour gérer les majuscules.
        $reponseNorm = mb_strtolower(trim($reponse), 'UTF-8');
        $attendueNorm = mb_strtolower(trim($this->reponseAttendue), 'UTF-8');

        if($reponseNorm === $attendueNorm){
            $this->estResolue = true;
            return true;
        } else {
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