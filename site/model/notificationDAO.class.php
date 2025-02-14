<?php
require_once 'connexion.php'; 
require_once 'notification.class.php';

class NotificationDAO {
    private $bd;
    private $select;

    function __construct() {
        $this->bd = new Connexion();
        $this->select = 'SELECT id_notif, id_uti, type, contenu, est_lu, date FROM notification';
    }

    function insert (Notification $notification) : void {
        $this->bd->execSQL("INSERT INTO notification (id_notif, id_uti, type, contenu, est_lu, date)
                            VALUES (:idNotif, :idUti, :type, :contenu, :estLu, :date)"
                            ,[':idNotif'=>$notification->getIdNotif() ,':idUti'=>$notification->getIdUti(), 
                            ':type'=>$notification->getType(), ':contenu'=>$notification->getContenu(), 
                            ':estLu'=>$notification->getEstLu(), ':date'=>$notification->getDate()]);
    }    

    function delete (int $idNotif) : void {
        $this->bd->execSQL("DELETE FROM notification 
                            WHERE id_notif = :idNotif", [':idNotif'=>$idNotif]);
    } 

    function deleteByIdUti (int $idUti) : void {
        $this->bd->execSQL("DELETE FROM notification 
                            WHERE id_uti = :idUti", [':idUti'=>$idUti]);
    } 

    function update (Notification $notification) : void {
        $this->bd->execSQL("UPDATE notification 
                            SET id_uti = :idUti, type = :type, contenu = :contenu, 
                            est_lu = :estLu, date = :date
                            WHERE id_notif = :idNotif"
                            ,[':idNotif'=>$notification->getIdNotif() ,':idUti'=>$notification->getIdUti(), 
                            ':type'=>$notification->getType(), ':contenu'=>$notification->getContenu(), 
                            ':estLu'=>$notification->getEstLu(), ':date'=>$notification->getDate()]);
    }    

    private function loadQuery (array $result) : array { 
        $notifications = [];
        foreach($result as $row) {
            $notification = new Notification(); 
            $notification->setIdNotif($row['id_notif']);
            $notification->setIdUti($row['id_uti']);
            $notification->setType($row['type']);
            $notification->setContenu($row['contenu']);
            $notification->setEstLu($row['est_lu']);
            $notification->setDate($row['date']);
            $notifications[] = $notification;
        }
        return $notifications;
    }

    function getAll () : array {
        return ($this->loadQuery($this->bd->execSQLSelect($this->select)));
    }

    function getById (int $idNotif) : Notification {
        $uneNotification = new Notification();
        $lesNotifications = $this->loadQuery($this->bd->execSQLSelect($this->select ." WHERE
        id_notif = :idNotif", [':idNotif'=>$idNotif]) );
        if (count($lesNotifications) > 0) { 
            $uneNotification = $lesNotifications[0]; 
        }
        return $uneNotification;
        // il y a un seul élément dans le tableau des notifications ➔ indice 0 return $uneNotification;
    }	

    function existe (int $idNotif) : bool {
        $req = "SELECT * 
                FROM notification
                WHERE id_notif = :idNotif";
        $res = ($this->loadQuery($this->bd->execSQLSelect($req, [':idNotif'=>$idNotif])));
        return ($res != []); // si tableau des notifications est vide alors la notifcation n’existe pas
    }

    function getNotifNonLues (int $idUti) : array {
        return $this->bd->execSQLSelect("SELECT id_notif, type, contenu, date
                                        FROM notification
                                        WHERE id_uti = :idUti
                                        AND est_lu = 0",
                                        [':idUti' => $idUti]);
    }

    function getDemandeAmisNonLues (int $idUti) : array {
        return $this->bd->execSQLSelect("SELECT id_notif, type, contenu, date
                                        FROM notification
                                        WHERE id_uti = :idUti
                                        AND est_lu = 0
                                        AND type = 'demande_amis'",
                                        [':idUti' => $idUti]);
    }

    function getNouveauMeilleurTempsNonLus (int $idUti) : array {
        return $this->bd->execSQLSelect("SELECT id_notif, type, contenu, date
                                        FROM notification
                                        WHERE id_uti = :idUti
                                        AND est_lu = 0
                                        AND type = 'nouveau_meilleur_temps'",
                                        [':idUti' => $idUti]);
    }

    function getMessageNonLus (int $idUti) : array {
        return $this->bd->execSQLSelect("SELECT id_notif, type, contenu, date
                                        FROM notification
                                        WHERE id_uti = :idUti
                                        AND est_lu = 0
                                        AND type = 'message'",
                                        [':idUti' => $idUti]);
    }

    function marquerCommeLue (int $idNotif) : void {
        $this->bd->execSQL("UPDATE notification 
                            SET est_lu = 1 
                            WHERE id_notif = :idNotif", 
                            [':idNotif' => $idNotif]);
    }
}    
?>