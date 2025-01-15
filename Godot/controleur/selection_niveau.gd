extends Control

func _on_retour_pressed() -> void:
	get_tree().change_scene_to_file("res://vue/tscn/menu_principal.tscn")

func _on_niveau_1_pressed() -> void:
	get_tree().change_scene_to_file("res://vue/tscn/level.tscn")

func _on_niveau_2_pressed() -> void:
	get_tree().change_scene_to_file("res://vue/tscn/level_2.tscn")

func _on_niveau_3_pressed() -> void:
	get_tree().change_scene_to_file("res://vue/tscn/level_3.tscn")
	
func _on_niveau_4_pressed() -> void:
	get_tree().change_scene_to_file("res://vue/tscn/level_4.tscn")
