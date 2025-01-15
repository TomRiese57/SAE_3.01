extends Node2D
var url_request = "https://devweb.iutmetz.univ-lorraine.fr/~bondon3u/2A/SAE_3.01/site/controller/api/score.php"
var url_send = "https://devweb.iutmetz.univ-lorraine.fr/~bondon3u/2A/SAE_3.01/site/controller/api/ajouter_score.php"
var request

func _ready():
	$HTTPRequest.request_completed.connect(_on_request_completed)

func send_data(data):
	var json = JSON.stringify(data)
	var headers = ["Content-Type: application/json"]
	$HTTPRequest.request(url_send, headers, HTTPClient.METHOD_POST, json)

func send_request():
	var headers = ["Content-Type: application/json"]
	$HTTPRequest.request(url_request, headers, HTTPClient.METHOD_GET)

func _on_request_completed(result, response_code, headers, body):
	request = JSON.parse_string(body.get_string_from_utf8())
