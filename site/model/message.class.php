<?php
class Message {
    private $idMessage;
    private $idExpediteur;
    private $idReceveur;
    private $texteMessage;
    private $envoyeA;
    private $estLu;

    // constructeur    
    function __construct(int $idMessage = 0, int $idExpediteur = 0, int $idReceveur = 0, string $texteMessage = '', string $envoyeA = '', 
                        int $estLu = 0) {
        $this->idMessage = $idMessage;
        $this->idExpediteur = $idExpediteur;
        $this->idReceveur = $idReceveur;
        $this->texteMessage = $texteMessage;
        $this->envoyeA = $envoyeA;
        $this->estLu = $estLu;
    }

    // getters
    public function getIdMessage() {
        return $this->idMessage;
    }

    public function getIdExpediteur() {
        return $this->idExpediteur;
    }

    public function getIdReceveur() {
        return $this->idReceveur;
    }

    public function getTexteMessage() {
        return $this->texteMessage;
    }

    public function getEnvoyeA() {
        return $this->envoyeA;
    }
    
    public function getEstLu() {
        return $this->estLu;
    }

    // setters
    public function setIdMessage($idMessage) {
        $this->idMessage = $idMessage;
    }

    public function setIdExpediteur($idExpediteur) {
        $this->idExpediteur = $idExpediteur;
    }

    public function setIdReceveur($idReceveur) {
        $this->idReceveur = $idReceveur;
    }

    public function setTexteMessage($texteMessage) {
        $this->texteMessage = $texteMessage;
    }

    public function setEnvoyeA($envoyeA) {
        $this->envoyeA = $envoyeA;
    }

    public function setEstLu($estLu) {
        $this->estLu = $estLu;
    }
}
?>
