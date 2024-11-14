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
	
	$Sprite.speed_scale = 4
	if Input.is_action_pressed("right") and is_on_floor():
		$Sprite.flip_h = false
		if Input.is_action_pressed("jump"):
			$Sprite.play("sauter")
		else:
			$Sprite.play("courir")
	elif Input.is_action_pressed("left") and is_on_floor():
		$Sprite.flip_h = true
		if Input.is_action_pressed("jump"):
			$Sprite.play("sauter")
		else:
			$Sprite.play("courir")
	elif Input.is_action_pressed("jump") and not is_on_floor():
		$Sprite.play("sauter")
	else:
		$Sprite.play("respiration")
		

	move_and_slide()
