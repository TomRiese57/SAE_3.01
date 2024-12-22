<?php
require_once "connexion.php";
require_once "score.php";
class ScoreDAO
{
    // définition des propriétés
    private $bd;
    private $select;
    // définition des méthodes
    function __construct()
    {
        $this->bd = new Connexion();
        $this->select = "SELECT * FROM score;";
    }

    function insert(Score $score): void
    {
        $this->bd->execSQL("INSERT INTO score (id_score, id_uti, temps, morts, 'date')
        VALUES (:idScore, :idUti, :temps, :morts , :'date');",
            [':idScore' => $score->getIdScore(), ':idUti' => $score->getIdUti(), ':temps' => $score->getTemps(), ":morts" => $score->getMorts(), ":date" => $score->getDate()]
        );
    }

    function deleteByIdUti(int $idScore): void
    {
        $this->bd->execSQL("DELETE FROM score WHERE id_score = :idScore;", [$idScore]);
    }

    function update(Score $score)
    {
        $this->bd->execSQL(
            "UPDATE score SET id_uti = :idUti, temps = :temps, morts = :morts, 'date' = :'date' WHERE id_score = :idScore;",
            [":idUti" => $score->getIdUti(), ":temps" => $score->getTemps(), ":morts" => $score->getMorts(), ":date" => $score->getDate(), ":idScore" => $score->getIdScore()]
        );
    }

    private function loadQuery(array $result): array
    {
        $scores = [];
        foreach ($result as $row) {
            $score = new Score();
            $score->setIdScore($row['id_score']);
            $score->setIdUti($row['id_uti']);
            $score->setTemps($row['temps']);
            $score->setMorts($row['morts']);
            $score->setDate($row['date']);
            $scores[] = $score;
        }
        return $scores;
    }

    function getAll(): array
    {
        return $this->loadQuery($this->bd->execSQLSelect($this->select));
    }

    function getByIdUti(int $idScore): array
    {

        return $this->loadQuery($this->bd->execSQLSelect($this->select . " WHERE id_score = :idScore;", [':idScore' => $idScore]));
    }

    function existe(string $idScore): bool
    {
        $req = "SELECT * FROM score WHERE id_score = :idScore;";
        $res = ($this->loadQuery($this->bd->execSQLSelect($req, [':idScore' => $idScore])));
        return ($res != []);
    }
}
?>