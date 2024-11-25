extends CanvasLayer

var pause = false

func pause_unpaused():
	pause = !pause
	if pause:
		get_tree().paused = true
		show()
	else:
		get_tree().paused = false
		hide()
	
func _input(event):
	if Input.is_action_just_pressed("pause"):
		pause_unpaused()

func _on_reprendre_pressed() -> void:
	pause_unpaused()

func _on_recommencer_pressed() -> void:
	pause_unpaused()
	get_tree().change_scene_to_file("res://controleur/level.tscn")
	
func _on_quitter_pressed() -> void:
	pause_unpaused()
	get_tree().change_scene_to_file("res://controleur/menu_principal.tscn")
