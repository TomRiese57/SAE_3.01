<?php
class Utilisateur {
    private $idUti;
    private $pseudo;
    private $email;
    private $motDePasse;
    private $scoreTemps;
    private $scoreMorts;
    private $date;

    // constructeur    
    function __construct(int $idUti = 0, string $pseudo = '', string $email = '', string $motDePasse = '', float $scoreTemps = 0.0, 
                         int $scoreMorts = 0) {
        $this->idUti = $idUti;
        $this->pseudo = $pseudo;
        $this->email = $email;
        $this->motDePasse = $motDePasse;
        $this->scoreTemps = $scoreTemps;
        $this->scoreMorts = $scoreMorts;
        $this->date = date("Y-m-d");
    }

    // getters
    function getIdUti(): int {
        return $this->idUti;
    }

    function getPseudo(): string {
        return $this->pseudo;
    }

    function getEmail(): string {
        return $this->email;
    }

    function getMotDePasse(): string {
        return $this->motDePasse;
    }

    function getScoreTemps(): float {
        return $this->scoreTemps;
    }

    function getScoreMorts(): int {
        return $this->scoreMorts;
    }

    function getDate(): string {
        return $this->date;
    }

    // setters    
    function setIdUti(int $idUti): void {
        $this->idUti = $idUti;
    }

    function setPseudo(string $pseudo): void {
        $this->pseudo = $pseudo;
    }

    function setEmail(string $email): void {
        $this->email = $email;
    }

    function setMotDePasse(string $motDePasse): void {
        $this->motDePasse = $motDePasse;
    }

    function setScoreTemps(float $scoreTemps): void {
        $this->scoreTemps = $scoreTemps;
    }

    function setScoreMorts(int $scoreMorts): void {
        $this->scoreMorts = $scoreMorts;
    }

    function setDate(string $date): void {
        $this->date = $date;
    }
}