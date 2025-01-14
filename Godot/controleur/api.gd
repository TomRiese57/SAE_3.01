extends Node2D
var url = "http://localhost/SAE/Jeux/SAE_3.01/site/controller/api/score.php"

func _ready():
	$HTTPRequest.request_completed.connect(_on_request_completed)
	
	send_request()

func send_data(data):
	var json = JSON.stringify(data)
	var headers = ["Content-Type: application/json"]
	$HTTPRequest.request(url, headers, HTTPClient.METHOD_POST, json)

func send_request():
	var headers = ["Content-Type: application/json"]
	$HTTPRequest.request(url, headers, HTTPClient.METHOD_GET)

func _on_request_completed(result, response_code, headers, body):
	var json = JSON.parse_string(body.get_string_from_utf8())
	print(json["result"]["score"])
