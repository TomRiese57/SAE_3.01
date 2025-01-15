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
    function __construct(string $pseudo = '', string $email = '', string $motDePasse = '') {
        $this->idUti = 0; // id_uti (sera auto-généré par la BDD car défini comme AUTO_INCREMENT)
        $this->pseudo = $pseudo;
        $this->email = $email;
        $this->motDePasse = $motDePasse;
        $this->scoreTemps = 0;
        $this->scoreMorts = 0;
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

    function getScoreTemps(): int {
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

    function setScoreTemps(int $scoreTemps): void {
        $this->scoreTemps = $scoreTemps;
    }

    function setScoreMorts(int $scoreMorts): void {
        $this->scoreMorts = $scoreMorts;
    }

    function setDate(string $date): void {
        $this->date = $date;
    }
}