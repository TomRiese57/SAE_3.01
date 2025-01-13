<?php
require_once 'connexion.php'; 
require_once 'message.class.php';

class MessageDAO {
    private $bd;
    private $select;

    function __construct(){
        $this->bd = new Connexion();
        $this->select = 'SELECT id_msg, id_exp, id_rec, texte, est_lu, date FROM message';
    }

    function insert (Message $message) : void {
        $this->bd->execSQL("INSERT INTO message (id_msg, id_exp, id_rec, texte, est_lu, date)
                            VALUES (:idMsg, :idExp, :idRec, :texte, :estLu, :date)"
                            ,[':idMsg'=>$message->getIdMsg() ,':idExp'=>$message->getIdExp(), 
                            ':idRec'=>$message->getIdRec(), ':texte'=>$message->getTexte(), 
                            ':estLu'=>$message->getEstLu(), ':date'=>$message->getDate()]);
    }    

    function delete (int $idMsg) : void {
        $this->bd->execSQL("DELETE FROM message 
                            WHERE id_msg = :idMsg", [':idMsg'=>$idMsg]);
    } 

    function update (Message $message) : void {
        $this->bd->execSQL("UPDATE message 
                            SET id_exp = :idExp, id_rec = :idRec, texte = :texte, 
                            est_lu = :estLu, date = :date
                            WHERE id_msg = :idMsg"
                            ,[':idMsg'=>$message->getIdMsg() ,':idExp'=>$message->getIdExp(), 
                            ':idRec'=>$message->getIdRec(), ':texte'=>$message->getTexte(), 
                            ':estLu'=>$message->getEstLu(), ':date'=>$message->getDate()]);
    }    

    private function loadQuery (array $result) : array { 
        $messages = [];
        foreach($result as $row) {
            $message = new Message(); 
            $message->setIdMsg($row['id_msg']);
            $message->setIdExp($row['id_exp']);
            $message->setIdRec($row['id_rec']);
            $message->setTexte($row['texte']);
            $message->setEstLu($row['est_lu']);
            $message->setDate($row['date']);
            $messages[] = $message;
        }
        return $messages;
    }

    function getAll () : array {
        return ($this->loadQuery($this->bd->execSQLSelect($this->select)));
    }

    function getById (int $idMsg) : Message {
        $unMessage = new Message();
        $lesMessages = $this->loadQuery($this->bd->execSQLSelect($this->select ." WHERE
        id_msg = :idMsg", [':idMsg'=>$idMsg]) );
        if (count($lesMessages) > 0) { 
            $unMessage = $lesMessages[0]; 
        }
        return $unMessage;
        // il y a un seul élément dans le tableau des messages ➔ indice 0 return $unMessage;
    }	

    function existe (int $idMsg) : bool {
        $req = "SELECT * 
                FROM message
                WHERE id_msg = :idMsg";
        $res = ($this->loadQuery($this->bd->execSQLSelect($req, [':idMsg'=>$idMsg])));
        return ($res != []); // si tableau des messages est vide alors le message n’existe pas
    }
}    
?>