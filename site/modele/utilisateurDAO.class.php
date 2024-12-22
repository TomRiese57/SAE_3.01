<?php
echo "c";
require_once "connexion.php";
echo "z";
require_once "utilisateur.class.php";
echo "r";
class UtilisateurDAO
{
    // définition des propriétés
    private $bd;
    private $select;
    // définition des méthodes
    function __construct()
    {
        $this->bd = new Connexion();
        $this->select = "SELECT * FROM utilisateur;";
    }

    function insert(Utilisateur $uti): void
    {
        $this->bd->execSQL("INSERT INTO ami (id_uti, pseudo, mail, mdp, score_temps, sore_morts, 'date')
        VALUES (:idUti, :pseudo, :mail, :mdp ,:scoreTemps, :soreMorts, :'date');",
            [':idUti' => $uti->getIdUti(), ':pseudo' => $uti->getPseudo(), ':mail' => $uti->getMail(), ":scoreTemps" => $uti->getScoreTemps(), ":scoreMorts" => $uti->getScoreMorts(), ":date" => $uti->getDate()]
        );
    }

    function deleteByIdUti(int $idUti): void
    {
        $this->bd->execSQL("DELETE FROM utilisateur WHERE id_uti = :idUti;", [$idUti]);
    }

    function update(Utilisateur $uti)
    {
        $this->bd->execSQL(
            "UPDATE ami SET pseudo = :pseudo, mail = :mail, mdp = :mdp, score_temps :scoreTemps, score_morts = :scoreMorts, 'date' = :'date' WHERE idUti = :idUti;",
            [":pseudo" => $uti->getPseudo(), ":mail" => $uti->getMail(), ":mdp" => $uti->getMdp(), ":scoreTemps" => $uti->getScoreTemps(), ":scoreMorts" => $uti->getScoreMorts(), ":date" => $uti->getDate()]
        );
    }

    private function loadQuery(array $result): array
    {
        $utis = [];
        foreach ($result as $row) {
            $uti = new Utilisateur();
            $uti->setIdUti($row['id_uti']);
            $uti->setPseudo($row['pseudo']);
            $uti->setMail($row['mail']);
            $uti->setMdp($row['mdp']);
            $uti->setMdp($row['score_temps']);
            $uti->setMdp($row['score_morts']);
            $uti->setMdp($row['date']);
            $utis[] = $uti;
        }
        return $utis;
    }

    function getAll(): array
    {
        return $this->loadQuery($this->bd->execSQLSelect($this->select));
    }

    function getByIdUti(int $idUti): array
    {

        return $this->loadQuery($this->bd->execSQLSelect($this->select . " WHERE id_uti = :idUti;", [':idUti' => $idUti]));
    }

    function existe(string $idUti): bool
    {
        $req = "SELECT * FROM utilisateur WHERE id_uti = :idUti;";
        $res = ($this->loadQuery($this->bd->execSQLSelect($req, [':idUti' => $idUti])));
        return ($res != []);
    }
}
?>