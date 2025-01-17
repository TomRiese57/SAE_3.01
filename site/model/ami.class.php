<?php
class Ami {
    private $uti1;
    private $uti2;
    private StatusAmis $status;
    private $date;

    // constructeur    
    function __construct(Utilisateur $uti1 = null, Utilisateur $uti2 = null) {
        $this->uti1 = $uti1;
        $this->uti2 = $uti2;
        $this->status = StatusAmis::EN_ATTENTE;
        $this->date = date("Y-m-d");
    }

    // getters
    public function getUti1(): Utilisateur {
        return $this->uti1;
    }

    public function getUti2(): Utilisateur {
        return $this->uti2;
    }

    public function getStatus(): StatusAmis {
        return $this->status;
    }

    public function getDate(): string {
        return $this->date;
    }

    // setters   
    public function setUti1(Utilisateur $uti1) {
        $this->uti1 = $uti1;
    }

    public function setUti2(Utilisateur $uti2) {
        $this->uti2 = $uti2;
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
