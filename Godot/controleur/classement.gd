extends Control

func _ready() -> void:
	$API.send_request()
	$ScoreTemps.text = ""
	$ScoreMorts.text = ""

func _process(delta: float) -> void:
	if $API.request == null:
		return
	elif $ScoreTemps.text == "":
		$ScoreTemps.text += "Meilleur Temps : \n"
		$ScoreMorts.text += "Meilleur Morts : \n"
		var scoreTemps = $API.request['result']['score']
		var scoreMorts = $API.request['result']['score']
		
		for x in range(len(scoreTemps)):
			for k in range(x, len(scoreTemps)):
				if scoreTemps[k]['temps'] < scoreTemps[x]['temps']:
					var change = scoreTemps[x]
					scoreTemps[x] = scoreTemps[k]
					scoreTemps[k] = change
		for x in range(4):
			if scoreTemps[x] != null:
				$ScoreTemps.text += str(scoreTemps[x]['pseudo']) + " : " + str(scoreTemps[x]['temps']) + "\n"
		
		for x in range(len(scoreMorts)):
			for k in range(x, len(scoreMorts)):
				if scoreMorts[k]['morts'] < scoreMorts[x]['morts']:
					var change = scoreMorts[x]
					scoreMorts[x] = scoreMorts[k]
					scoreMorts[k] = change
		for x in range(4):
			if scoreMorts[x] != null:
				$ScoreMorts.text += str(scoreMorts[x]['pseudo']) + " : " + str(scoreMorts[x]['morts']) + "\n"

func _on_retour_pressed() -> void:
	get_tree().change_scene_to_file("res://vue/tscn/menu_principal.tscn")
