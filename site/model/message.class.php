<?php
class Message {
    private $idMsg;
    private $idExp;
    private $idRec;
    private $texte;
    private $estLu;
    private $date;

    // constructeur    
    function __construct(int $idMsg = 0, int $idExp = 0, int $idRec = 0, string $texte = '', int $estLu = 0, string $date = '') {
        $this->idMsg = $idMsg;
        $this->idExp = $idExp;
        $this->idRec = $idRec;
        $this->texte = $texte;
        $this->estLu = $estLu;
        $this->date = $date;
    }

    // getters
    public function getIdMsg(): int {
        return $this->idMsg;
    }

    public function getIdExp(): int {
        return $this->idExp;
    }

    public function getIdRec(): int {
        return $this->idRec;
    }

    public function getTexte(): string {
        return $this->texte;
    }

    public function getEstLu(): int {
        return $this->estLu;
    }

    public function getDate(): string {
        return $this->date;
    }

    // setters
    public function setIdMsg(int $idMsg) {
        $this->idMsg = $idMsg;
    }

    public function setIdExp(int $idExp) {
        $this->idExp = $idExp;
    }

    public function setIdRec(int $idRec) {
        $this->idRec = $idRec;
    }

    public function setTexte(string $texte) {
        $this->texte = $texte;
    }

    public function setEstLu(int $estLu) {
        $this->estLu = $estLu;
    }

    public function setDate(string $date) {
        $this->date = $date;
    }
}
?>
