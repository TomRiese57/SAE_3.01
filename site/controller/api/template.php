<?php
header('Content-Type: application/json');
$success = false;
$data = array();
require_once "../../model/connexion.php";

function reponse_json($success, $data, $msgErreur=NULL) {
	$array['success'] = $success;
	$array['msg'] = $msgErreur;
	$array['result'] = $data;

	echo json_encode($array);
}