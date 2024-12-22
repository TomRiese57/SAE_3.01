<?php
require_once "../connexion.php";
require_once "../metier/message.class.php";
class MessageDAO
{
    // définition des propriétés
    private $bd;
    private $select;
    // définition des méthodes
    function __construct()
    {
        $this->bd = new Connexion();
        $this->select = "SELECT * FROM 'message';";
    }

    function insert(Message $msg): void
    {
        $this->bd->execSQL("INSERT INTO 'message' (id_msg, id_exp, id_rec, texte, 'date', est_lu)
        VALUES (:idMsg, :idExp, :idRec, :texte ,:'date', :estLu);",
            [':idMsg' => $msg->getIdMsg(), ':idRec' => $msg->getIdExp(), ':texte' => $msg->getTexte(), ":date" => $msg->getDate(), ":estLu" => $msg->getEstLu()]
        );
    }

    function deleteByIdMsg(int $idMsg): void
    {
        $this->bd->execSQLselect("DELETE FROM 'message' WHERE id_msg = :idMsg;", [$idMsg]);
    }

    function update(Message $msg)
    {
        $this->bd->execSQLselect(
            "UPDATE 'message' SET id_exp = :idExp, id_rec = :idRec, texte = :texte, 'date' :'date', estLu = :estLu WHERE id_msg = :idMsg;",
            [":idExp" => $msg->getIdExp(), ":idRec" => $msg->getIdRec(), ":texte" => $msg->getTexte(), ":date" => $msg->getDate(), ":estLu" => $msg->getEstLu(), ":idMsg" => $msg->getIdMsg()]
        );
    }

    private function loadQuery(array $result): array
    {
        $msgs = [];
        foreach ($result as $row) {
            $msg = new Message();
            $msg->setIdMsg($row['id_msg']);
            $msg->setIdExp($row['id_exp']);
            $msg->setIdRec($row['id_rec']);
            $msg->setTexte($row['texte']);
            $msg->setDate($row['date']);
            $msg->setEstLu($row['estLu']);
            $msgs[] = $msg;
        }
        return $msgs;
    }

    function getAll(): array
    {
        return $this->loadQuery($this->bd->execSQL($this->select));
    }

    function getByIdMsg(int $idMsg): array
    {

        return $this->loadQuery($this->bd->execSQL($this->select . " WHERE id_msg = :idMsg;", [':idMsg' => $idMsg]));
    }

    function existe(string $idMsg): bool
    {
        $req = "SELECT * FROM 'message' WHERE id_msg = :idMsg;";
        $res = ($this->loadQuery($this->bd->execSQL($req, [':idMsg' => $idMsg])));
        return ($res != []);
    }
}
?>