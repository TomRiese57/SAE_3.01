<?php
class Score {
    private $idScore;
    private $idUti;
    private $temps;
    private $morts;
    private $date;

    // constructeur    
    function __construct(int $idScore = 0, int $idUti = 0, float $temps = 0.0, int $morts = 0, string $date = '') {
        $this->idScore = $idScore;
        $this->idUti = $idUti;
        $this->temps = $temps;
        $this->morts = $morts;
        $this->date = $date;
    }

    // getters
    public function getIdScore(): int {
        return $this->idScore;
    }

    public function getIdUti(): int {
        return $this->idUti;
    }

    public function getTemps(): float {
        return $this->temps;
    }

    public function getMorts(): int {
        return $this->morts;
    }

    public function getDate(): string {
        return $this->date;
    }

    // setters
    public function setIdScore(int $idScore) {
        $this->idScore = $idScore;
    }

    public function setIdUti(int $idUti) {
        $this->idUti = $idUti;
    }

    public function setTemps(float $temps) {
        $this->temps = $temps;
    }

    public function setMorts(int $morts) {
        $this->morts = $morts;
    }

    public function setDate(string $date) {
        $this->date = $date;
    }
}
?>
