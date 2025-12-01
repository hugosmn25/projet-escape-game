<?php

class Score
{
    private int $tentatives;
    private int $duree;
    private int $nbEnigmes;
    private int $valeur;
    private string $commentaire;

    public function __construct(int $tentatives, int $duree, int $nbEnigmes)
    {
        $this->tentatives = $tentatives;
        $this->duree = $duree;
        $this->nbEnigmes = $nbEnigmes;

        $this->calculerScore();
        $this->genererCommentaire();
    }

    private function calculerScore(): void
    {
        // Barème proposé :
        // - Score de base : 100 points
        // - Malus : 2 points par tentative au‑delà du nombre d’énigmes
        // - Malus temps : 1 point par tranche de 20 secondes

        // TODO
    }

    private function genererCommentaire(): void
    {
        // TODO
    }

    public function getScore(): int
    {
        // TODO
    }

    public function getCommentaire(): string
    {
        // TODO
    }
}