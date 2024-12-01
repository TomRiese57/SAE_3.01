extends Sprite2D

# Variable pour vérifier si le personnage est dans la hitbox
var is_in_hitbox: bool = false

func _process(delta: float) -> void:
	# Vérifie si la touche "interact" est appuyée et si le personnage est dans la hitbox
	if is_in_hitbox:
		var path = get_tree().current_scene.scene_file_path
		if path == "res://vue/tscn/level.tscn":
			get_tree().change_scene_to_file("res://vue/tscn/level.tscn")
		elif path == "res://vue/tscn/level_2.tscn":
			get_tree().change_scene_to_file("res://vue/tscn/level_2.tscn")
		elif path == "res://vue/tscn/level_3.tscn":
			get_tree().change_scene_to_file("res://vue/tscn/level_3.tscn")

func _on_piques_body_entered(body: Node2D) -> void:
	# Si le personnage entre dans la hitbox, active la variable
	if body.name == "Stickman":
		is_in_hitbox = true

func _on_piques_body_exited(body: Node2D) -> void:
	# Si le personnage sort de la hitbox, désactive la variable
	if body.name == "Stickman":
		is_in_hitbox = false
