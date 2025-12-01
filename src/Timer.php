<?php

namespace App;

class Timer
{
    private int $debut;
    private int $fin;

    public function start(): void
    {
        $this->debut = time();   
    }

    public function stop(): void
    {
        $this->fin = time();
    }

    public function getDuree(): int
    {
        return $this->fin - $this->debut;
    }

    public function getDureeFormatee(): string
    {
        $duree = $this->getDuree();
        $minutes = floor($duree / 60);
        $secondes = $duree % 60;
        return sprintf("%02d:%02d", $minutes, $secondes);
    }
}