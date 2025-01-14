<?php
class Notification {
    private $idNotif;
    private $idUti;
    private TypeNotification $type;
    private $contenu;
    private $estLu;
    private $date;

    // constructeur    
    function __construct(int $idUti = 0, string $contenu = '') {
        $this->idNotif = 0; // id_notif (sera auto-généré par la BDD car défini comme AUTO_INCREMENT)
        $this->idUti = $idUti;
        $this->type = 0;
        $this->contenu = $contenu;
        $this->estLu = 0;
        $this->date = date("Y-m-d");
    }

    // getters
    public function getIdNotif(): int {
        return $this->idNotif;
    }

    public function getIdUti(): int {
        return $this->idUti;
    }

    public function getType(): TypeNotification {
        return $this->type;
    }

    public function getContenu(): string {
        return $this->contenu;
    }

    public function getEstLu(): int {
        return $this->estLu;
    }

    public function getDate(): string {
        return $this->date;
    }

    // setters
    public function setIdNotif(int $idNotif) {
        $this->idNotif = $idNotif;
    }

    public function setIdUti(int $idUti) {
        $this->idUti = $idUti;
    }

    public function setType(TypeNotification $type) {
        $this->type = $type;
    }

    public function setContenu(string $contenu) {
        $this->contenu = $contenu;
    }

    public function setEstLu(int $estLu) {
        $this->estLu = $estLu;
    }

    public function setDate(string $date) {
        $this->date = $date;
    }
}

enum TypeNotification: string {
    case DEMANDE_AMIS = 'demande amis';
    case NOUVEAU_MEILLEUR_TEMPS = 'nouveau meilleur temps';
    case MESSAGE = 'message';
}
?>