extends Control

func _ready() -> void:
	$VBoxContainer/Label.text = ""
	var nb = 1
	for x in Global.score:
		$VBoxContainer/Label.text += "Score numéro " + str(nb) + " : temps : " + str(x[0]) + ", mort : " + str(x[1]) + "\n"

func _on_retour_pressed() -> void:
	get_tree().change_scene_to_file("res://vue/tscn/menu_principal.tscn")
