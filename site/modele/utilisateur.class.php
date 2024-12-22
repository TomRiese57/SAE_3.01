<?php
class Utilisateur
{
    private $idUti;
    private $pseudo;
    private $mail;
    private $mdp;
    private $scoreTemps;
    private $scoreMorts;
    private $date;

    // constructeur    
    function __construct(
        int $idUti = 0,
        string $pseudo = '',
        string $mail = '',
        string $mdp = '',
        int $scoreTemps = 0,
        int $scoreMorts = 0,
        string $date = ''
    ) {
        $this->idUti = $idUti;
        $this->pseudo = $pseudo;
        $this->mail = $mail;
        $this->mdp = $mdp;
        $this->scoreTemps = $scoreTemps;
        $this->scoreMorts = $scoreMorts;
        $this->date = $date;
    }

    // getters
    function getIdUti(): int
    {
        return $this->idUti;
    }

    function getPseudo(): string
    {
        return $this->pseudo;
    }

    function getMail(): string
    {
        return $this->mail;
    }

    function getMdp(): string
    {
        return $this->mdp;
    }

    function getScoreTemps(): int
    {
        return $this->scoreTemps;
    }

    function getScoreMorts(): int
    {
        return $this->scoreMorts;
    }

    function getDate(): string
    {
        return $this->date;
    }

    // setters    
    function setIdUti(int $id): void
    {
        $this->idUti = $id;
    }

    function setPseudo(string $pseudo): void
    {
        $this->pseudo = $pseudo;
    }

    function setMail(string $mail): void
    {
        $this->mail = $mail;
    }

    function setMdp(string $mdp): void
    {
        $this->mdp = $mdp;
    }

    function setScoreTemps(int $scoreTemps): void
    {
        $this->scoreTemps = $scoreTemps;
    }

    function setScoreMorts(int $scoreMorts): void
    {
        $this->scoreMorts = $scoreMorts;
    }

    function setDate(string $date): void
    {
        $this->date = $date;
    }
}