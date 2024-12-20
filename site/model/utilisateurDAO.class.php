<?php
    require_once 'connexion.php'; 
    require_once 'utilisateur.class.php';

class UtilisateurDAO {
    private $bd;
    private $select;

    function __construct(){
        $this->bd = new Connexion();
        $this->select = 'SELECT id_uti, pseudo_uti, email_uti, mot_de_passe_uti, meilleur_temps_uti, 
                        date_creation_uti FROM `utilisateur`';
    }

    function insert (Utilisateur $utilisateur) : void {
        $this->bd->execSQL("INSERT INTO utilisateur (id_uti, pseudo_uti, email_uti, mot_de_passe_uti, 
                            meilleur_temps_uti, date_creation_uti)
                            VALUES (:id, :pseudo, :email, :motDePasse, :meilleurTemps, :dateCreation)"
                            ,[':id'=>$utilisateur->getIdUti() ,':pseudo'=>$utilisateur->getPseudoUti(), 
                            ':email'=>$utilisateur->getEmailUti(), ':motDePasse'=>$utilisateur->getMotDePasseUti(), 
                            ':meilleurTemps'=>$utilisateur->getMeilleurTempsUti(), 
                            ':dateCreation'=>$utilisateur->getDateCreationUti()]);
    }    

    function delete (int $idUti) : void {
        $this->bd->execSQL("DELETE FROM utilisateur 
                            WHERE id_uti = :idUti", [':idUti'=>$idUti]);
    } 

    function update (Utilisateur $utilisateur) : void {
        $this->bd->execSQL("UPDATE utilisateur 
                            SET pseudo_uti = :pseudo, email_uti = :email, mot_de_passe_uti = :motDePasse, 
                            meilleur_temps_uti = :meilleurTemps, date_creation_uti = :dateCreation
                            WHERE id_uti = :id"
                            ,[':id'=>$utilisateur->getIdUti() ,':pseudo'=>$utilisateur->getPseudoUti(), 
                            ':email'=>$utilisateur->getEmailUti(), ':motDePasse'=>$utilisateur->getMotDePasseUti(), 
                            ':meilleurTemps'=>$utilisateur->getMeilleurTempsUti(), 
                            ':dateCreation'=>$utilisateur->getDateCreationUti()]);
    }    

    private function loadQuery (array $result) : array { 
        $utilisateurs = [];
        foreach($result as $row) {
            $utilisateur = new Utilisateur(); 
            $utilisateur->setIdUti($row['id_uti']);
            $utilisateur->setPseudoUti($row['pseudo_uti']);
            $utilisateur->setEmailUti($row['email_uti']);
            $utilisateur->setMotDePasseUti($row['mot_de_passe_uti']);
            $utilisateur->setMeilleurTempsUti($row['meilleur_temps_uti']);
            $utilisateur->setDateCreationUti($row['date_creation_uti']);
            $utilisateurs[] = $utilisateur;
        }
        return $utilisateurs;
    }

    function getAll () : array {
        return ($this->loadQuery($this->bd->execSQLselect($this->select)));
    }

    function getById (int $idUti) : Utilisateur {
        $unUtilisateur = new Utilisateur();
        $lesUtilisateurs = $this->loadQuery($this->bd->execSQLselect($this->select ." WHERE
        id_uti = :idUti", [':idUti'=>$idUti]) );
        if (count($lesUtilisateurs) > 0) { 
            $unUtilisateur = $lesUtilisateurs[0]; 
        }
        return $unUtilisateur;
        // il y a un seul élément dans le tableau d'utilisateurs ➔ indice 0 return $unUtilisateur;
    }	

    function existe (int $idUti) : bool {
        $req = "SELECT * 
                FROM utilisateur 
                WHERE id_uti = :idUti";
        $res = ($this->loadQuery($this->bd->execSQLselect($req, [':idUti'=>$idUti])));
        return ($res != []); // si tableau d'utilisateurs est vide alors l'utilisateur n’existe pas
    }
}    
?>