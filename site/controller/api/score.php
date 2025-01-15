<?php
require_once 'template.php';
require_once '../../model/scoreDAO.class.php';

$scoreDAO = new ScoreDAO();
$data['score'] = $scoreDAO->getAllApi();
$success = true;

reponse_json($success, $data);