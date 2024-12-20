<?php
class Utilisateur
{
    private $idUti;
    private $pseudoUti;
    private $emailUti;
    private $motDePasseUti;
    private $meilleurTempsUti;
    private $dateCreationUti;

    // constructeur    
    function __construct(
        int $id = 0,
        string $pseudo = '',
        string $email = '',
        string $motDePasse = '',
        float $meilleurTemps = 0.0,
        string $dateCreation = ''
    ) {
        $this->idUti = $id;
        $this->pseudoUti = $pseudo;
        $this->emailUti = $email;
        $this->motDePasseUti = $motDePasse;
        $this->meilleurTempsUti = $meilleurTemps;
        $this->dateCreationUti = $dateCreation;
    }

    // getters
    function getIdUti(): int
    {
        return $this->idUti;
    }

    function getPseudoUti(): string
    {
        return $this->pseudoUti;
    }

    function getEmailUti(): string
    {
        return $this->emailUti;
    }

    function getMotDePasseUti(): string
    {
        return $this->motDePasseUti;
    }

    function getMeilleurTempsUti(): string
    {
        return $this->meilleurTempsUti;
    }

    function getDateCreationUti(): string
    {
        return $this->dateCreationUti;
    }

    // setters    
    function setIdUti(int $id): void
    {
        $this->idUti = $id;
    }

    function setPseudoUti(string $pseudo): void
    {
        $this->pseudoUti = $pseudo;
    }

    function setEmailUti(string $email): void
    {
        $this->emailUti = $email;
    }

    function setMotDePasseUti(string $motDePasse): void
    {
        $this->motDePasseUti = $motDePasse;
    }

    function setMeilleurTempsUti(float $meilleurTemps): void
    {
        $this->meilleurTempsUti = $meilleurTemps;
    }

    function setDateCreationUti(string $dateCreation): void
    {
        $this->dateCreationUti = $dateCreation;
    }
}