<?php
class Ami {
    private $id;
    private $idUtilisateur;
    private $idAmi;
    private $status;
    private $dateEnvoi;

    // constructeur    
    function __construct(int $id = 0, int $idUtilisateur = 0, int $idAmi = 0, string $status = '', string $dateEnvoi = '') {
        $this->id = $id;
        $this->idUtilisateur = $idUtilisateur;
        $this->idAmi = $idAmi;
        $this->status = $status;
        $this->dateEnvoi = $dateEnvoi;
    }

    // getters
    public function getId() {
        return $this->id;
    }

    public function getIdUtilisateur() {
        return $this->idUtilisateur;
    }

    public function getIdAmi() {
        return $this->idAmi;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getDateEnvoi() {
        return $this->dateEnvoi;
    }

    // setters   
    public function setId($id) {
        $this->id = $id;
    }

    public function setIdUtilisateur($idUtilisateur) {
        $this->idUtilisateur = $idUtilisateur;
    }

    public function setIdAmi($idAmi) {
        $this->idAmi = $idAmi;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setDateEnvoi($dateEnvoi) {
        $this->dateEnvoi = $dateEnvoi;
    }
}
?>
