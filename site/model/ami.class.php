<?php
class Ami {
    private $idUti;
    private $idAmi;
    private StatusAmis $status;
    private $date;

    // constructeur    
    function __construct(int $idUti = 0, int $idAmi = 0) {
        $this->idUti = $idUti;
        $this->idAmi = $idAmi;
        $this->status = 0;
        $this->date = date("Y-m-d");
    }

    // getters
    public function getIdUti(): int {
        return $this->idUti;
    }

    public function getIdAmi(): int {
        return $this->idAmi;
    }

    public function getStatus(): StatusAmis {
        return $this->status;
    }

    public function getDate(): string {
        return $this->date;
    }

    // setters   
    public function setIdUti(int $idUti) {
        $this->idUti = $idUti;
    }

    public function setIdAmi(int $idAmi) {
        $this->idAmi = $idAmi;
    }

    public function setStatus(StatusAmis $status) {
        $this->status = $status;
    }

    public function setDate(string $date) {
        $this->date = $date;
    }
}

enum StatusAmis: string {
    case EN_ATTENTE = 'en attente';
    case ACCEPTE = 'accepté';
    case REFUSE = 'refusé';
}
?>
