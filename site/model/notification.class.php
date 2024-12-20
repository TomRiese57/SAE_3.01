<?php
class Notification
{
    private $idNotification;
    private $idUtilisateur;
    private $type;
    private $contenu;
    private $estLu;
    private $dateCreation;

    // constructeur    
    function __construct(int $idNotification = 0, int $idUtilisateur = 0, string $type = '', string $contenu = '', int $estLu = 0, string $dateCreation = '')
    {
        $this->idNotification = $idNotification;
        $this->idUtilisateur = $idUtilisateur;
        $this->type = $type;
        $this->contenu = $contenu;
        $this->estLu = $estLu;
        $this->dateCreation = $dateCreation;
    }

    // getters
    public function getIdNotification()
    {
        return $this->idNotification;
    }

    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getContenu()
    {
        return $this->contenu;
    }

    public function getEstLu()
    {
        return $this->estLu;
    }

    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    // setters
    public function setIdNotification($idNotification)
    {
        $this->idNotification = $idNotification;
    }

    public function setIdUtilisateur($idUtilisateur)
    {
        $this->idUtilisateur = $idUtilisateur;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }

    public function setEstLu($estLu)
    {
        $this->estLu = $estLu;
    }

    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;
    }
}
?>