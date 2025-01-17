<?php
require_once 'connexion.php';
require_once 'score.class.php';

class ScoreDAO {
    private $bd;
    private $select;

    function __construct() {
        $this->bd = new Connexion();
        $this->select = 'SELECT id_score, id_uti, temps, morts, date FROM score';
    }

    function insert (Score $score): void {
        $this->bd->execSQL("INSERT INTO score (id_score, id_uti, temps, morts, date)
                            VALUES (:idScore, :idUti, :temps, :morts, :date)"
                            ,[':idScore'=>$score->getIdScore(), ':idUti'=>$score->getIdUti()
                            ,':temps'=>$score->getTemps(), ':morts'=>$score->getMorts()
                            ,':date'=>$score->getDate()]);
    }

    function delete (int $idScore): void {
        $this->bd->execSQL("DELETE FROM score 
                            WHERE id_score = :idScore", [':idScore'=>$idScore]);
    }

    function deleteByIdUti (int $idUti): void {
        $this->bd->execSQL("DELETE FROM score 
                            WHERE id_uti = :idUti", [':idUti'=>$idUti]);
    }

    function update (Score $score): void {
        $this->bd->execSQL("UPDATE score 
                            SET id_uti = :idUti, temps = :temps, morts = :morts, date = :date
                            WHERE id_score = :idScore"
                            ,[':idScore'=>$score->getIdScore(), ':idUti'=>$score->getIdUti()
                            ,':temps'=>$score->getTemps(), ':morts'=>$score->getMorts()
                            ,':date'=>$score->getDate()]);
    }

    private function loadQuery (array $result): array {
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

    function getAll (): array {
        return ($this->loadQuery($this->bd->execSQLSelect($this->select)));
    }

    function getAllAPI (): array {
        return $this->bd->execSQLSelect("SELECT pseudo, temps, morts
                                        FROM score, utilisateur
                                        WHERE utilisateur.id_uti = score.id_uti");
    }

    function getClassement () : array {
        return ($this->bd->execSQLSelect("SELECT DISTINCT(id_uti) as clast
            FROM score
            ORDER BY temps;"));
    }

    function getByIdScore (int $idScore): Score {
        $unScore = new Score();
        $lesScores = $this->loadQuery($this->bd->execSQLSelect($this->select . " WHERE
        id_score = :idScore", [':idScore'=>$idScore]));
        if (count($lesScores) > 0) {
            $unScore = $lesScores[0];
        }
        return $unScore;
        // il y a un seul élément dans le tableau des scores ➔ indice 0 return $unScore;
    }

    function existe (int $idScore): bool {
        $req = "SELECT * 
                FROM score
                WHERE id_score = :idScore";
        $res = ($this->loadQuery($this->bd->execSQLSelect($req, [':idScore'=>$idScore])));
        return ($res != []); // si tableau des scores est vide alors le score n’existe pas
    }

    function getTop10 (): array {
        return $this->bd->execSQLSelect("SELECT pseudo, temps, morts, score.date
                                        FROM score, utilisateur
                                        WHERE utilisateur.id_uti = score.id_uti
                                        ORDER BY temps ASC
                                        LIMIT 10");
    }

    function getNbrMortsTotales (): int {
        $totalMort = 0;
        $lesMorts = $this->bd->execSQLSelect("SELECT SUM(morts) AS total_morts
                                                FROM score");
        if (count($lesMorts) > 0) {
            $totalMort = (int) $lesMorts[0]['total_morts'];
        }
        return $totalMort;
    }

    function getNbrTempsTotals (): int {
        $totalTemps = 0;
        $lesTemps = $this->bd->execSQLSelect("SELECT COUNT(*) AS total_temps
                                                FROM score");
        if (count($lesTemps) > 0) {
            $totalTemps = (int) $lesTemps[0]['total_temps'];
        }
        return $totalTemps;
    }

    function getTopTempsJour (): array {
        $unTemps = 0;
        $lesTemps = $this->bd->execSQLSelect("SELECT pseudo, temps, morts, score.date
                                        FROM score, utilisateur
                                        WHERE utilisateur.id_uti = score.id_uti
                                        AND score.date = CURRENT_DATE()
                                        ORDER BY temps ASC
                                        LIMIT 1");
        if (count($lesTemps) > 0) {
            $unTemps = $lesTemps[0];
        }
        return $unTemps;
    }

    function getNbrMortsJour (): int {
        $totalMort = 0;
        $lesMorts = $this->bd->execSQLSelect("SELECT SUM(morts) AS total_morts
                                            FROM score
                                            WHERE date = CURRENT_DATE()");
        if (count($lesMorts) > 0) {
            $totalMort = (int) $lesMorts[0]['total_morts'];
        }
        return $totalMort;
    }

    function getNbrTempsJour (): int {
        $totalTemps = 0;
        $lesTemps = $this->bd->execSQLSelect("SELECT COUNT(*) AS total_temps
                                            FROM score
                                            WHERE date = CURRENT_DATE()");
        if (count($lesTemps) > 0) {
            $totalTemps = (int) $lesTemps[0]['total_temps'];
        }
        return $totalTemps;
    }
}
?>