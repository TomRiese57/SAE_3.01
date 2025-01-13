<?php
require_once 'template.php';
require_once '../../model/scoreDAO.class.php';

if( !empty($_GET['id_score']) && !empty($_GET['id_uti']) && !empty($_GET['temps']) && !empty($_GET['morts']) && !empty($_GET['date']) ){
	//Si toutes les données sont saisie par le client

	$score = new Score();
	$scoreDAO = new ScoreDAO();
	$score->setIdScore($_GET['id_score']);
	$score->setIdUti($_GET['id_uti']);
	$score->setTemps($_GET['temps']);
	$score->setMorts($_GET['morts']);
	$score->setDate($_GET['date']);

	$scoreDAO->insert($score);
	$success = true;
	$msg = 'Le score a bien été ajouté';
} else {
	$msg = "Il manque des informations";
}

reponse_json($success, $data, $msg);