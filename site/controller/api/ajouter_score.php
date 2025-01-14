<?php
require_once 'template.php';
require_once '../../model/scoreDAO.class.php';

$data = file_get_contents("php://input");
$post = json_decode($data, true); // Décoder les données JSON en tableau associatif

if( !empty($post['id_score']) && !empty($post['id_uti']) && !empty($post['temps']) && !empty($post['morts']) && !empty($post['date']) ){
	//Si toutes les données sont saisie par le client

	$score = new Score();
	$scoreDAO = new ScoreDAO();
	$score->setIdScore($post['id_score']);
	$score->setIdUti($post['id_uti']);
	$score->setTemps($post['temps']);
	$score->setMorts($post['morts']);
	$score->setDate($post['date']);

	$scoreDAO->insert($score);
	$success = true;
	$msg = 'Le score a bien été ajouté';
} else {
	$msg = "Il manque des informations";
}

reponse_json($success, $post, $msg);