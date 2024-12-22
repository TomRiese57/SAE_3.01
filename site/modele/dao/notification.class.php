<?php
require_once "../connexion.php";
require_once "../metier/notification.class.php";
class NofificationDAO
{
    // définition des propriétés
    private $bd;
    private $select;
    // définition des méthodes
    function __construct()
    {
        $this->bd = new Connexion();
        $this->select = "SELECT * FROM 'notification';";
    }

    function insert(Notification $notif): void
    {
        $this->bd->execSQL("INSERT INTO 'notification' (id_notif, id_uti, 'type', contenu, est_lu, 'date')
        VALUES (:idNotif, :idUti, :'type', :contenu ,:estLu, :'date');",
            [':idNotif' => $notif->getIdNotif(), ':idUti' => $notif->getIdUti(), ':type' => $notif->getType(), ":contenu" => $notif->getContenu(), ":estLu" => $notif->getEstLu(), ":date" => $notif->getDate()]
        );
    }

    function deleteByIdUti(int $idUti): void
    {
        $this->bd->execSQLselect("DELETE FROM 'notification' WHERE id_uti = :idUti;", [$idUti]);
    }

    function update(Notification $msg)
    {
        $this->bd->execSQLselect(
            "UPDATE 'notification' SET id_uti = :idUti, 'type' = :'type', contenu = :contenu, est_lu :estLu, 'date' = :'date' WHERE idNotif = :idNotif;",
            [":idUti" => $msg->getIdUti(), ":type" => $msg->getType(), ":contenu" => $msg->getContenu(), ":estLu" => $msg->getEstLu(), ":date" => $msg->getDate(), ":idNotif" => $msg->getIdNotif()]
        );
    }

    private function loadQuery(array $result): array
    {
        $notifs = [];
        foreach ($result as $row) {
            $notif = new Notification();
            $notif->setIdNotif($row['id_notif']);
            $notif->setIdUti($row['id_uti']);
            $notif->setType($row['type']);
            $notif->setContenu($row['contenu']);
            $notif->setEstLu($row['est_lu']);
            $notif->setDate($row['date']);
            $notifs[] = $notif;
        }
        return $notifs;
    }

    function getAll(): array
    {
        return $this->loadQuery($this->bd->execSQL($this->select));
    }

    function getByIdUti(int $idNotif): array
    {

        return $this->loadQuery($this->bd->execSQL($this->select . " WHERE id_notif = :idNotif;", [':idNotif' => $idNotif]));
    }

    function existe(string $idNotif): bool
    {
        $req = "SELECT * FROM 'notification' WHERE id_notif = :idNotif;";
        $res = ($this->loadQuery($this->bd->execSQL($req, [':idNotif' => $idNotif])));
        return ($res != []);
    }
}
?>