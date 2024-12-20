<?php
class SessionJeu {
    private $idSession;
    private $idUtilisateur;
    private $tempsJoue;
    private $score;
    private $dateSession;

    // constructeur    
    function __construct(int $idSession = 0, int $idUtilisateur = 0, float $tempsJoue = 0.0, int $score = 0, string $dateSession = '') {
        $this->idSession = $idSession;
        $this->idUtilisateur = $idUtilisateur;
        $this->tempsJoue = $tempsJoue;
        $this->score = $score;
        $this->dateSession = $dateSession;
    }

    // getters
    public function getIdSession(): int {
        return $this->idSession;
    }

    public function getIdUtilisateur(): int {
        return $this->idUtilisateur;
    }

    public function getTempsJoue(): float {
        return $this->tempsJoue;
    }

    public function getScore(): int {
        return $this->score;
    }

    public function getDateSession(): string {
        return $this->dateSession;
    }

    // setters
    public function setIdSession(int $idSession) {
        $this->idSession = $idSession;
    }

    public function setIdUtilisateur(int $idUtilisateur) {
        $this->idUtilisateur = $idUtilisateur;
    }

    public function setTempsJoue(float $tempsJoue) {
        $this->tempsJoue = $tempsJoue;
    }

    public function setScore(int $score) {
        $this->score = $score;
    }

    public function setDateSession(string $dateSession) {
        $this->dateSession = $dateSession;
    }
}
?>
