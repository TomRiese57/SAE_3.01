extends Control

func _ready() -> void:
	$VBoxContainer/Result.text = "\nTemps : " + str(Global.time) + "\nMort : " + str(Global.dead)
	$API.send_data({'temps' : Global.time, 'morts' : Global.dead})
	# On réinitialise les score à zéro
	Global.time = 0
	Global.dead = 0

func _on_retour_pressed() -> void:
	get_tree().change_scene_to_file("res://vue/tscn/menu_principal.tscn")
