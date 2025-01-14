<?php
require_once 'template.php';
require_once '../../model/scoreDAO.class.php';
$_SESSION['id'] = 1;
$data = file_get_contents("php://input");
$post = json_decode($data, true); // Décoder les données JSON en tableau associatif

if((!empty($post['temps']) && !empty($post['morts'])) || ($post['temps'] == 0) || ($post['morts'] == 0)){
	//Si toutes les données sont saisie par le client

	$score = new Score();
	$scoreDAO = new ScoreDAO();
	$score->setIdUti($_SESSION['id']);
	$score->setTemps($post['temps']);
	$score->setMorts($post['morts']);

	$scoreDAO->insert($score);
	$success = true;
	$msg = 'Le score a bien été ajouté';
} else {
	$msg = "Il manque des informations";
}

reponse_json($success, $post, $msg);