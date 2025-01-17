extends Control

func _on_commencer_pressed() -> void:

	get_tree().change_scene_to_file("res://vue/tscn/selection_niveau.tscn")

func _on_quitter_pressed() -> void:
	OS.shell_open("http://localhost/SAE_3.01/site/controller/accueil.php")

func _on_classement_pressed() -> void:
	get_tree().change_scene_to_file("res://vue/tscn/classement.tscn")
