extends CharacterBody2D

const SPEED = 50
var direction = 1
var sens = 0
# Variable pour vérifier si le personnage est dans la hitbox
var is_in_hitbox: bool = false

func _physics_process(delta: float) -> void:
	if global_rotation_degrees == 0:
		velocity.y = 0
		sensX()
	elif global_rotation_degrees == 90:
		velocity.x = 0
		sensY()
	elif global_rotation_degrees == -90:
		velocity.x = 0
		sensYB()
	else:
		velocity.y = 0
		sensXB()
	$Sprite.play("spin")
	move_and_slide()
	
	if is_on_wall():
		direction *= -1
	
	if is_on_floor():
		direction *= -1
	
	if is_on_ceiling():
		direction *= -1
	
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
	
func sensX() -> void:
	velocity.x = direction * SPEED
	if direction == 1:
		$Sprite.flip_h = false
	else:
		$Sprite.flip_h = true

func sensY() -> void:
	velocity.y = direction * SPEED
	if direction == 1:
		$Sprite.flip_v = false
	else:
		$Sprite.flip_v = true

func sensXB() -> void:
	velocity.x = direction * -SPEED
	if direction == 1:
		$Sprite.flip_h = false
	else:
		$Sprite.flip_h = true

func sensYB() -> void:
	velocity.y = direction * -SPEED
	if direction == 1:
		$Sprite.flip_v = false
	else:
		$Sprite.flip_v = true

func _on_hacksaw_body_entered(body: Node2D) -> void:
	# Si le personnage entre dans la hitbox, active la variable
	if body.name == "Stickman":
		is_in_hitbox = true

func _on_hacksaw_body_exited(body: Node2D) -> void:
	# Si le personnage sort de la hitbox, désactive la variable
	if body.name == "Stickman":
		is_in_hitbox = false
