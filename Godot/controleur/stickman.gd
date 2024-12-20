extends CharacterBody2D

const SPEED = 200.0
const JUMP_VELOCITY = -320.0
var current_speed = SPEED
var was_colliding = false
var is_blocked = false
var rot = 0

func set_speed(new_speed: int) -> void:
	current_speed = new_speed
	
func _physics_process(delta: float) -> void:
	$Time.text = "Temps : " + str(Global.time)
	$NbMort.text = "Mort : " + str(Global.dead)
	# Add the gravity.
	if not is_on_floor():
		velocity += get_gravity() * delta

	# Handle jump
	if Input.is_action_just_pressed("jump") and is_on_floor():
		velocity.y = JUMP_VELOCITY
		$Jump.play()

	# Get the input direction and handle the movement/deceleration.
	var direction := Input.get_axis("left", "right")
	if direction:
		velocity.x = direction * current_speed
	else:
		velocity.x = move_toward(velocity.x, 0, current_speed)
	
	if not is_on_floor():  # En l'air
		$Sprite.play("sauter")
		$Sprite.flip_h = direction < 0
	elif direction != 0:  # En train de courir
		$Sprite.flip_h = direction < 0  # Inverse selon la direction
		$Sprite.play("courir")
	else:  # Immobile
		$Sprite.play("respiration")
		
	if $Floor.is_colliding():
		if rot == 0:
			position.y -= 10
		elif rot == 90:
			position.x -= 10
		elif rot == -90:
			position.x += 10
		elif rot == -180 or rot == 180:
			position.y += 10
	if $Ceilling.is_colliding():
		if rot == 0:
			position.y += 10
		elif rot == 90:
			position.x += 10
		elif rot == -90:
			position.x -= 10
		elif rot == -180 or rot == 180:
			position.y -= 10
	move_and_slide()
	
