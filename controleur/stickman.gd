extends CharacterBody2D

const SPEED = 200.0
const JUMP_VELOCITY = -320.0

func _physics_process(delta: float) -> void:
	
	# Add the gravity.
	if not is_on_floor():
		velocity += get_gravity() * delta

	# Handle jump.
	if Input.is_action_just_pressed("jump") and is_on_floor():
		velocity.y = JUMP_VELOCITY

	# Get the input direction and handle the movement/deceleration.
	var direction := Input.get_axis("left", "right")
	if direction:
		velocity.x = direction * SPEED
	else:
		velocity.x = move_toward(velocity.x, 0, SPEED)
	
	if not is_on_floor():  # En l'air
		$Sprite.play("sauter")
		$Sprite.flip_h = direction < 0
	elif direction != 0:  # En train de courir
		$Sprite.flip_h = direction < 0  # Inverse selon la direction
		$Sprite.play("courir")
	else:  # Immobile
		$Sprite.play("respiration")
	move_and_slide()
