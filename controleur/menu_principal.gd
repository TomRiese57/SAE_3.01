extends Control




func _on_commencer_pressed() -> void:
	#get_tree().change_scene_to_file("res://controleur/level.tscn")
	get_tree().change_scene_to_file("res://controleur/selection_du_niveau.tscn")
	


func _on_quitter_pressed() -> void:
	get_tree().quit()


func _on_classement_pressed() -> void:
	get_tree().change_scene_to_file("res://controleur/classement.tscn")
