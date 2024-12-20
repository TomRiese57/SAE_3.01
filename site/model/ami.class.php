<?php
class Ami {
    private $id;
    private $idUtilisateur;
    private $idAmi;
    private StatusAmis $status;
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
    public function getId(): int {
        return $this->id;
    }

    public function getIdUtilisateur(): int {
        return $this->idUtilisateur;
    }

    public function getIdAmi(): int {
        return $this->idAmi;
    }

    public function getStatus(): StatusAmis {
        return $this->status;
    }

    public function getDateEnvoi(): string {
        return $this->dateEnvoi;
    }

    // setters   
    public function setId(int $id) {
        $this->id = $id;
    }

    public function setIdUtilisateur(int $idUtilisateur) {
        $this->idUtilisateur = $idUtilisateur;
    }

    public function setIdAmi(int $idAmi) {
        $this->idAmi = $idAmi;
    }

    public function setStatus(StatusAmis $status) {
        $this->status = $status;
    }

    public function setDateEnvoi(string $dateEnvoi) {
        $this->dateEnvoi = $dateEnvoi;
    }
}

enum StatusAmis: string {
    case EN_ATTENTE = 'en attente';
    case ACCEPTE = 'accepté';
    case REFUSE = 'refusé';
}
?>
