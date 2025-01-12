extends Control

func _ready() -> void:
	$Result.text = "\nTemps : " + str(Global.time) + "\nMort : " + str(Global.dead)

func _on_retour_pressed() -> void:
	get_tree().change_scene_to_file("res://vue/tscn/menu_principal.tscn")
