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
			$ScoreTemps.text += "Joueur " + str(scoreTemps[x]['id_uti']) + " avec un temps de " + str(scoreTemps[x]['temps']) + "\n"
		
		for x in range(len(scoreMorts)):
			for k in range(x, len(scoreMorts)):
				if scoreMorts[k]['morts'] < scoreMorts[x]['morts']:
					var change = scoreMorts[x]
					scoreMorts[x] = scoreMorts[k]
					scoreMorts[k] = change
		for x in range(4):
			$ScoreMorts.text += "Joueur " + str(scoreMorts[x]['id_uti']) + " avec un nb mort de " + str(scoreMorts[x]['morts']) + "\n"

func _on_retour_pressed() -> void:
	get_tree().change_scene_to_file("res://vue/tscn/menu_principal.tscn")
