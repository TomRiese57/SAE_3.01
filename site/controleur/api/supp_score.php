<?php
require_once 'template.php';
require_once '../../modele/scoreDAO.class.php';

if( !empty($_GET['id_score']) ){
	//Si le client a saisis un id

	$scoreDAO = new ScoreDAO();
	$scoreDAO->deleteByIdScore($_GET['id_score']);
	$success = true;
	$msg = 'Le vol est supprimé';
	
	$msg = "Une erreur s'est produite";
} else {
	$msg = "Il manque des informations";
}

reponse_json($success, $data, $msg);