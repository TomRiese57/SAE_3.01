<?php
require_once 'template.php';
require_once '../../model/scoreDAO.class.php';

if( !empty($_POST['id_score']) && !empty($_POST['id_uti']) && !empty($_POST['temps']) && !empty($_POST['morts']) && !empty($_POST['date']) ){
	//Si toutes les données sont saisie par le client

	$score = new Score();
	$scoreDAO = new ScoreDAO();
	$score->setIdScore($_POST['id_score']);
	$score->setIdUti($_POST['id_uti']);
	$score->setTemps($_POST['temps']);
	$score->setMorts($_POST['morts']);
	$score->setDate($_POST['date']);

	$scoreDAO->insert($score);
	$success = true;
	$msg = 'Le score a bien été ajouté';
} else {
	$msg = "Il manque des informations";
}

reponse_json($success, $data, $msg);