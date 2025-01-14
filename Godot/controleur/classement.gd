extends Control

func _ready() -> void:
	$VBoxContainer/Label.text = ""
	$VBoxContainer/Label.text += "Meilleur Temps : " + str(Global.tabTime[0]) + ", Meilleurs score de mort : " + str(Global.tabDead[0]) + "\n"

func _on_retour_pressed() -> void:
	get_tree().change_scene_to_file("res://vue/tscn/menu_principal.tscn")
