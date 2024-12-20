extends CharacterBody2D

const SPEED = 50
var direction = 1
var sens = 0

signal dead()

func _physics_process(delta: float) -> void:
	if round(global_rotation_degrees) == 0:
		velocity.y = 0
		sensX()
		$Sprite.play("spin")
		move_and_slide()
	elif round(global_rotation_degrees) == 90:
		velocity.x = 0
		sensY()
		$Sprite.play("spin")
		move_and_slide()
	elif round(global_rotation_degrees) == -90:
		velocity.x = 0
		sensYB()
		$Sprite.play("spin")
		move_and_slide()
	elif round(global_rotation_degrees) == -180 or round(global_rotation_degrees) == 180:
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
		dead.emit()
