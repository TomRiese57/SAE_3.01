extends Control

func _ready() -> void:
	$VBoxContainer/Result.text = "\nTemps : " + str(Global.time) + "\nMort : " + str(Global.dead)
	
	# On trie les tables de score par ordre croissant
	Global.tabTime.append(Global.time)
	for x in range(len(Global.tabTime)):
		for k in range(x, len(Global.tabTime)):
			if Global.tabTime[k] < Global.tabTime[x]:
				var change = Global.tabTime[x]
				Global.tabTime[x] = Global.tabTime[k]
				Global.tabTime[k] = change
				
	Global.tabDead.append(Global.dead)
	for x in range(len(Global.tabDead)):
		for k in range(x, len(Global.tabDead)):
			if Global.tabDead[k] < Global.tabDead[x]:
				var change = Global.tabDead[x]
				Global.tabDead[x] = Global.tabDead[k]
				Global.tabDead[k] = change
	# On réinitialise les score à zéro
	Global.time = 0
	Global.dead = 0

func _on_retour_pressed() -> void:
	get_tree().change_scene_to_file("res://vue/tscn/menu_principal.tscn")
