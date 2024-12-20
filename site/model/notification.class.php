<?php
class Notification {
    private $idNotification;
    private $idUtilisateur;
    private TypeNotification $type;
    private $contenu;
    private $estLu;
    private $dateCreation;

    // constructeur    
    function __construct(int $idNotification = 0, int $idUtilisateur = 0, string $type = '', string $contenu = '', int $estLu = 0, string $dateCreation = '') {
        $this->idNotification = $idNotification;
        $this->idUtilisateur = $idUtilisateur;
        $this->type = $type;
        $this->contenu = $contenu;
        $this->estLu = $estLu;
        $this->dateCreation = $dateCreation;
    }

    // getters
    public function getIdNotification(): int {
        return $this->idNotification;
    }

    public function getIdUtilisateur(): int {
        return $this->idUtilisateur;
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

    public function getDateCreation(): string {
        return $this->dateCreation;
    }

    // setters
    public function setIdNotification(int $idNotification) {
        $this->idNotification = $idNotification;
    }

    public function setIdUtilisateur(int $idUtilisateur) {
        $this->idUtilisateur = $idUtilisateur;
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

    public function setDateCreation(string $dateCreation) {
        $this->dateCreation = $dateCreation;
    }
}

enum TypeNotification: string {
    case DEMANDE_AMIS = 'demande amis';
    case NOUVEAU_MEILLEUR_TEMPS = 'nouveau meilleur temps';
    case MESSAGE = 'message';
}
?>