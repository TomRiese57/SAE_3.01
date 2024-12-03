extends Node2D

const ROTATION_ANGLE = 90  # Angle de rotation en degrés
@onready var stickman = $Stickman

func _input(event):
	if not stickman.is_on_floor():
		return  false # Ne fait rien si le stickman n'est pas au sol
		
	# Vérifie si une action pour tourner la carte est déclenchée
	if Input.is_action_just_pressed("RotateLeft") and stickman.is_on_floor():
		rotate_map(-ROTATION_ANGLE)
		$Rotation.play()
	elif Input.is_action_just_pressed("RotateRight") and stickman.is_on_floor():
		rotate_map(ROTATION_ANGLE)
		$Rotation.play()
	
	if rotation_degrees == 360 or rotation_degrees == -360:
		rotation_degrees = 0
	

func rotate_map(angle_degrees):
	stickman.set_physics_process(false)
	# Applique la rotation de la carte
	var rot = 0
	if angle_degrees > 0:
		while(rot != abs(angle_degrees)):
			stickman.rotation_degrees -= 5
			rotation_degrees += 5
			rot += 5
			await get_tree().create_timer(0.0000001).timeout
	else:
		while(rot != abs(angle_degrees)):
			stickman.rotation_degrees += 5
			rotation_degrees -= 5
			rot += 5
			await get_tree().create_timer(0.0000001).timeout
	stickman.set_physics_process(true)
