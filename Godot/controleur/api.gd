extends Node2D
var url_request = "http://localhost/SAE/Jeux/SAE_3.01/site/controller/api/score.php"
var url_send = "http://localhost/SAE/Jeux/SAE_3.01/site/controller/api/ajouter_score.php"
var test_json = {'temps' : 40, 'morts' : 30}

func _ready():
	$HTTPRequest.request_completed.connect(_on_request_completed)
	
	send_data(test_json)

func send_data(data):
	var json = JSON.stringify(data)
	var headers = ["Content-Type: application/json"]
	$HTTPRequest.request(url_send, headers, HTTPClient.METHOD_POST, json)

func send_request():
	var headers = ["Content-Type: application/json"]
	$HTTPRequest.request(url_request, headers, HTTPClient.METHOD_GET)

func _on_request_completed(result, response_code, headers, body):
	var json = JSON.parse_string(body.get_string_from_utf8())
	print(json)
