<?php
require_once 'template.php';
require_once '../../model/scoreDAO.class.php';

if( !empty($_GET['id_score']) ){
	//Si le client a saisis un id

	$scoreDAO = new ScoreDAO();
	$scoreDAO->deleteByIdScore($_GET['id_score']);
	$success = true;
	$msg = 'Le score est supprimé';
} else {
	$msg = "Il manque des informations";
}

reponse_json($success, $data, $msg);