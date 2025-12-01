<?php

namespace App;

use App\Enigme;
use App\Salle;

class SessionJeu {
    private string $nomEquipe;
    private Salle $salle;
    private int $indexEnigmeCourante;
    private int $nombreTentatives;
    private int $debutTimestamp;

    public function __construct(string $nomEquipe, Salle $salle) {
        $this->nomEquipe = $nomEquipe;
        $this->salle = $salle;
        $this->indexEnigmeCourante = 0;
        $this->nombreTentatives = 0;
        $this->debutTimestamp = time();
    }

    /**
     * Retourne l'énigme courante ou null si l'index est hors bornes.
     */
    public function getEnigmeEnCours(): ?Enigme {
        if ($this->indexEnigmeCourante >= $this->salle->getNombreEnigmes()) {
            return null;
        }
        return $this->salle->getEnigme($this->indexEnigmeCourante);
    }

    /**
     * Traite une réponse pour l'énigme courante.
     */
    public function repondreAEnigme(string $str): bool {
        $this->nombreTentatives++;

        $enigme = $this->getEnigmeEnCours();
        if ($enigme === null) {
            return false;
        }

        $ok = $enigme->verifierReponse($str);

        if ($ok) {
            // On passe à l'énigme suivante
            $this->indexEnigmeCourante++;
        }

        return $ok;
    }

    /**
     * La session est terminée lorsque l'index atteint le nombre total d'énigmes.
     */
    public function estTerminee(): bool {
        return $this->indexEnigmeCourante >= $this->salle->getNombreEnigmes();
    }

    public function getIndexEnigmeCourante(): int {
        return $this->indexEnigmeCourante;
    }

    public function getNombreTentatives(): int {
        return $this->nombreTentatives;
    }

    /**
     * Retourne la durée (en secondes) depuis le début de la session.
     */
    public function getDuree(): int {
        return time() - $this->debutTimestamp;
    }

    /**
     * Affiche la progression (énigmes résolues / total) dans la console.
     */
    public function afficherProgression(): void {
        $total = $this->salle->getNombreEnigmes();
        $resolues = $this->getNombreEnigmesResolues();
        echo "Progression : $resolues / $total\n";
    }

    /**
     * Calcule le nombre d'énigmes déjà résolues.
     */
    public function getNombreEnigmesResolues(): int {
        $total = $this->salle->getNombreEnigmes();
        $count = 0;
        for ($i = 0; $i < $total; $i++) {
            $enigme = $this->salle->getEnigme($i);
            if ($enigme->getEstResolue()) {
                $count++;
            }
        }
        return $count;
    }
}