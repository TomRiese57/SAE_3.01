<?php
require_once 'connexion.php';
require_once 'score.class.php';

class ScoreDAO
{
    private $bd;
    private $select;

    function __construct()
    {
        $this->bd = new Connexion();
        $this->select = 'SELECT id_score, id_uti, temps, morts, date FROM score';
    }

    function insert(Score $score): void
    {
        $this->bd->execSQL("INSERT INTO score (id_score, id_uti, temps, morts, date)
                            VALUES (:idScore, :idUti, :temps, :morts, :date)"
            ,
            [
                ':idScore' => $score->getIdScore(),
                ':idUti' => $score->getIdUti()
                ,
                ':temps' => $score->getTemps(),
                ':morts' => $score->getMorts()
                ,
                ':date' => $score->getDate()
            ]
        );
    }

    function delete(int $idScore): void
    {
        $this->bd->execSQL("DELETE FROM score 
                            WHERE id_score = :idScore", [':idScore' => $idScore]);
    }

    function deleteByIdUti(int $idUti): void
    {
        $this->bd->execSQL("DELETE FROM score 
                            WHERE id_uti = :idUti", [':idUti' => $idUti]);
    }

    function update(Score $score): void
    {
        $this->bd->execSQL("UPDATE score 
                            SET id_uti = :idUti, temps = :temps, morts = :morts, date = :date
                            WHERE id_score = :idScore"
            ,
            [
                ':idScore' => $score->getIdScore(),
                ':idUti' => $score->getIdUti()
                ,
                ':temps' => $score->getTemps(),
                ':morts' => $score->getMorts()
                ,
                ':date' => $score->getDate()
            ]
        );
    }

    private function loadQuery(array $result): array
    {
        $scores = [];
        foreach ($result as $row) {
            $score = new Score();
            $score->setIdScore($row['id_score']);
            $score->setIdUti($row['id_uti']);
            $score->settemps($row['temps']);
            $score->setmorts($row['morts']);
            $score->setDate($row['date']);
            $scores[] = $score;
        }
        return $scores;
    }

    function getAll(): array
    {
        return ($this->loadQuery($this->bd->execSQLSelect($this->select)));
    }

    function getAllAPI(): array
    {
        return $this->bd->execSQLselect("SELECT pseudo, temps, morts
        FROM score, utilisateur
        WHERE utilisateur.id_uti = score.id_uti");
    }

    function getByIdScore(int $idScore): Score
    {
        $unScore = new Score();
        $lesScores = $this->loadQuery($this->bd->execSQLSelect($this->select . " WHERE
        id_score = :idScore", [':idScore' => $idScore]));
        if (count($lesScores) > 0) {
            $unScore = $lesScores[0];
        }
        return $unScore;
        // il y a un seul élément dans le tableau des scores ➔ indice 0 return $unScore;
    }

    function existe(int $idScore): bool
    {
        $req = "SELECT * 
                FROM score
                WHERE id_score = :idScore";
        $res = ($this->loadQuery($this->bd->execSQLSelect($req, [':idScore' => $idScore])));
        return ($res != []); // si tableau des scores est vide alors le score n’existe pas
    }
}
?>