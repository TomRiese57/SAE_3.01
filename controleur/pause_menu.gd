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
	var path = get_tree().current_scene.scene_file_path
	if path == "res://vue/tscn/level.tscn":
		get_tree().change_scene_to_file("res://vue/tscn/level.tscn")
	elif path == "res://vue/tscn/level_2.tscn":
		get_tree().change_scene_to_file("res://vue/tscn/level_2.tscn")
	elif path == "res://vue/tscn/level_3.tscn":
		get_tree().change_scene_to_file("res://vue/tscn/level_3.tscn")
			
func _on_quitter_pressed() -> void:
	pause_unpaused()
	get_tree().change_scene_to_file("res://vue/tscn/menu_principal.tscn")
