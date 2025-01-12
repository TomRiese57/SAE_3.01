<?php
class Message
{
    private $idMsg;
    private $idExp;
    private $idRec;
    private $texte;
    private $date;
    private $estLu;

    // constructeur    
    function __construct(
        int $idMsg = 0,
        int $idExp = 0,
        int $idRec = 0,
        string $texte = '',
        string $date = '',
        int $estLu = 0
    ) {
        $this->idMsg = $idMsg;
        $this->idExp = $idExp;
        $this->idRec = $idRec;
        $this->texte = $texte;
        $this->date = $date;
        $this->estLu = $estLu;
    }

    // getters
    public function getIdMsg(): int
    {
        return $this->idMsg;
    }

    public function getIdExp(): int
    {
        return $this->idExp;
    }

    public function getIdRec(): int
    {
        return $this->idRec;
    }

    public function getTexte(): string
    {
        return $this->texte;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function getEstLu(): int
    {
        return $this->estLu;
    }

    // setters
    public function setIdMsg(int $idMsg)
    {
        $this->idMsg = $idMsg;
    }

    public function setIdExp(int $idExp)
    {
        $this->idExp = $idExp;
    }

    public function setIdRec(int $idRec)
    {
        $this->idRec = $idRec;
    }

    public function setTexte(string $texte)
    {
        $this->texte = $texte;
    }

    public function setDate(string $date)
    {
        $this->date = $date;
    }

    public function setEstLu(int $estLu)
    {
        $this->estLu = $estLu;
    }
}
?>