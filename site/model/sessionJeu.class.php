<?php
class SessionJeu
{
    private $idSession;
    private $idUtilisateur;
    private $tempsJoue;
    private $score;
    private $dateSession;

    // constructeur    
    function __construct(int $idSession = 0, int $idUtilisateur = 0, float $tempsJoue = 0.0, int $score = 0, string $dateSession = '')
    {
        $this->idSession = $idSession;
        $this->idUtilisateur = $idUtilisateur;
        $this->tempsJoue = $tempsJoue;
        $this->score = $score;
        $this->dateSession = $dateSession;
    }

    // getters
    public function getIdSession()
    {
        return $this->idSession;
    }

    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }

    public function getTempsJoue()
    {
        return $this->tempsJoue;
    }

    public function getScore()
    {
        return $this->score;
    }

    public function getDateSession()
    {
        return $this->dateSession;
    }

    // setters
    public function setIdSession($idSession)
    {
        $this->idSession = $idSession;
    }

    public function setIdUtilisateur($idUtilisateur)
    {
        $this->idUtilisateur = $idUtilisateur;
    }

    public function setTempsJoue($tempsJoue)
    {
        $this->tempsJoue = $tempsJoue;
    }

    public function setScore($score)
    {
        $this->score = $score;
    }

    public function setDateSession($dateSession)
    {
        $this->dateSession = $dateSession;
    }
}
?>