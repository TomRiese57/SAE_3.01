extends Control

func _ready() -> void:
	$API.send_request()
	$ScoreTemps.text = ""

func _process(delta: float) -> void:
	if $API.request == null:
		return
	elif $ScoreTemps.text == "":
		$ScoreTemps.text += "Meilleur Temps : \n"
		var scoreTemps = $API.request['result']['score']
		
		for x in range(len(scoreTemps)):
			for k in range(x, len(scoreTemps)):
				if scoreTemps[k]['temps'] < scoreTemps[x]['temps']:
					var change = scoreTemps[x]
					scoreTemps[x] = scoreTemps[k]
					scoreTemps[k] = change
		for x in range(4):
			if scoreTemps[x] != null:
				$ScoreTemps.text += str(scoreTemps[x]['pseudo']) + " : " + str(scoreTemps[x]['temps']) + "\n"

func _on_retour_pressed() -> void:
	get_tree().change_scene_to_file("res://vue/tscn/menu_principal.tscn")
