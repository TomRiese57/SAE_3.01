extends Node2D

const ROTATION_ANGLE = 90  # Angle de rotation en degrés
@onready var stickman = $Stickman

func _input(event):
	if not is_stickman_on_ground():
		return  # Ne fait rien si le stickman n'est pas au sol

	# Vérifie si une action pour tourner la carte est déclenchée
	if Input.is_action_just_pressed("RotateLeft"):
		rotate_map(-ROTATION_ANGLE)
		$Rotation.play()
	elif Input.is_action_just_pressed("RotateRight"):
		rotate_map(ROTATION_ANGLE)
		$Rotation.play()
	
	if rotation_degrees == 360 or rotation_degrees == -360:
		rotation_degrees = 0
	

func rotate_map(angle_degrees):
	# Applique la rotation de la carte
	rotation_degrees += angle_degrees
	
	# Ajuste le stickman pour compenser l'orientation
	adjust_stickman(angle_degrees)
	

func adjust_stickman(angle_degrees):
	stickman.set_physics_process(false)
	# Corrige l'orientation du stickman pour rester droit
	var rot = 0
	if angle_degrees > 0:
		while(rot != abs(angle_degrees)):
			stickman.rotation_degrees -= 5
			rot += 5
			await get_tree().create_timer(0.0000001).timeout
	else:
		while(rot != abs(angle_degrees)):
			stickman.rotation_degrees += 5
			rot += 5
			await get_tree().create_timer(0.0000001).timeout
	stickman.set_physics_process(true)

func is_stickman_on_ground() -> bool:
	# Vérifie si le stickman est sur le sol (spécifique à CharacterBody2D)
	return stickman.is_on_floor()
