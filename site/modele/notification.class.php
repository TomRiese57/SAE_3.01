<?php
class Notification
{
    private $idNotif;
    private $idUti;
    private TypeNotification $type;
    private $contenu;
    private $estLu;
    private $date;

    // constructeur    
    function __construct(int $idNotif = 0, int $idUti = 0, TypeNotification $type = '', string $contenu = '', int $estLu = 0, string $date = '')
    {
        $this->idNotif = $idNotif;
        $this->idUti = $idUti;
        $this->type = $type;
        $this->contenu = $contenu;
        $this->estLu = $estLu;
        $this->date = $date;
    }

    // getters
    public function getIdNotif(): int
    {
        return $this->idNotif;
    }

    public function getIdUti(): int
    {
        return $this->idUti;
    }

    public function getType(): TypeNotification
    {
        return $this->type;
    }

    public function getContenu(): string
    {
        return $this->contenu;
    }

    public function getEstLu(): int
    {
        return $this->estLu;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    // setters
    public function setIdNotif(int $idNotif)
    {
        $this->idNotif = $idNotif;
    }

    public function setIdUti(int $idUti)
    {
        $this->idUti = $idUti;
    }

    public function setType(TypeNotification $type)
    {
        $this->type = $type;
    }

    public function setContenu(string $contenu)
    {
        $this->contenu = $contenu;
    }

    public function setEstLu(int $estLu)
    {
        $this->estLu = $estLu;
    }

    public function setDate(string $date)
    {
        $this->date = $date;
    }
}

enum TypeNotification: string
{
    case DEMANDE_AMIS = 'demande amis';
    case NOUVEAU_MEILLEUR_TEMPS = 'nouveau meilleur temps';
    case MESSAGE = 'message';
}
?>