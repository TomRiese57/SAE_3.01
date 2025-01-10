extends Sprite2D

signal dead()

func _on_piques_body_entered(body: Node2D) -> void:
	# Si le personnage entre dans la hitbox, active la variable
	if body.name == "Stickman":
		var path = get_tree().current_scene.scene_file_path
		if path == "res://vue/tscn/level.tscn":
			body.position.x = 238
			body.position.y = 308
		elif path == "res://vue/tscn/level_2.tscn":
			body.position.x = 145
			body.position.y = 178
		elif path == "res://vue/tscn/level_3.tscn":
			body.position.x = 182
			body.position.y = 309
		elif path == "res://vue/tscn/level_4.tscn":
			body.position.x = 232
			body.position.y = 306
		dead.emit()
