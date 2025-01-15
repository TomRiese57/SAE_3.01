<?php
class Message {
    private $idMsg;
    private $idExp;
    private $idRec;
    private $texte;
    private $estLu;
    private $date;

    // constructeur    
    function __construct(int $idExp = 0, int $idRec = 0, string $texte = '') {
        $this->idMsg = 0; // id_msg (sera auto-généré par la BDD car défini comme AUTO_INCREMENT)
        $this->idExp = $idExp;
        $this->idRec = $idRec;
        $this->texte = $texte;
        $this->estLu = 0;
        $this->date = date("Y-m-d");
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
