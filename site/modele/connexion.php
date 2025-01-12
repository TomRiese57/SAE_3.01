<?php
class Connexion
{
	private $db;

	// définition des méthodes
	function __construct(
		string $SGBD = "mysql",
		string $HOST = "localhost",
		string $DB_NAME = "stickspin",
		string $USER = "root",
		string $PASSWORD = ""
	) {
		//utilisation d’un tableau associatif pour l’ensemble des données de connexion
		$db_config['SGBD'] = $SGBD;
		$db_config['HOST'] = $HOST;
		$db_config['DB_NAME'] = $DB_NAME;
		$db_config['USER'] = $USER;
		$db_config['PASSWORD'] = $PASSWORD; // Attention : mot de passe en clair !
		try {
			$this->db = new PDO(
				$db_config['SGBD'] . ':host=' . $db_config['HOST'] . ';dbname=' . $db_config['DB_NAME'],
				$db_config['USER'],
				$db_config['PASSWORD'],
				array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
			);
			// permet d’afficher les caractères utf8 si la BdD est définie en utf8 (accents…)
			unset($db_config);
		} catch (Exception $exception) {
			die($exception->getMessage());
		}
	}
	function execSQLR(string $req, array $valeurs = []): void
	{
		try {
			$sql = $this->db->prepare($req);
			$sql->execute($valeurs);
		} catch (Exception $exception) {
			die($exception->getMessage());
		}
	}

	function execSQLSelect(string $req, array $valeurs = []): array
	{
		try {
			$sql = $this->db->prepare($req);
			$sql->execute($valeurs);
			return $sql->fetchAll(PDO::FETCH_ASSOC);
		} catch (Exception $exception) {
			die($exception->getMessage());
		}
	}
}