extends Sprite2D

# Variable pour vérifier si le personnage est dans la hitbox
var is_in_hitbox: bool = false

func _process(delta: float) -> void:
	# Vérifie si la touche "interact" est appuyée et si le personnage est dans la hitbox
	if is_in_hitbox and Input.is_action_just_pressed("interact"):
		get_tree().change_scene_to_file("res://controleur/level_2.tscn")

func _on_porte_body_entered(body: Node2D) -> void:
	# Si le personnage entre dans la hitbox, active la variable
	if body.name == "Stickman":
		is_in_hitbox = true

func _on_porte_body_exited(body: Node2D) -> void:
	# Si le personnage sort de la hitbox, désactive la variable
	if body.name == "Stickman":
		is_in_hitbox = false
