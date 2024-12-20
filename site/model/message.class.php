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
    public function getIdMessage(): int {
        return $this->idMessage;
    }

    public function getIdExpediteur(): int {
        return $this->idExpediteur;
    }

    public function getIdReceveur(): int {
        return $this->idReceveur;
    }

    public function getTexteMessage(): string {
        return $this->texteMessage;
    }

    public function getEnvoyeA(): string {
        return $this->envoyeA;
    }
    
    public function getEstLu(): int {
        return $this->estLu;
    }

    // setters
    public function setIdMessage(int $idMessage) {
        $this->idMessage = $idMessage;
    }

    public function setIdExpediteur(int $idExpediteur) {
        $this->idExpediteur = $idExpediteur;
    }

    public function setIdReceveur(int $idReceveur) {
        $this->idReceveur = $idReceveur;
    }

    public function setTexteMessage(string $texteMessage) {
        $this->texteMessage = $texteMessage;
    }

    public function setEnvoyeA(string $envoyeA) {
        $this->envoyeA = $envoyeA;
    }

    public function setEstLu(int $estLu) {
        $this->estLu = $estLu;
    }
}
?>
