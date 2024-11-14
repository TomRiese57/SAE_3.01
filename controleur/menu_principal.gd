extends Control




func _on_commencer_pressed() -> void:
	get_tree().change_scene_to_file("res://controleur/level.tscn")


func _on_quitter_pressed() -> void:
	get_tree().quit()
