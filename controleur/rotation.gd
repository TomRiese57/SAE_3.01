extends Node2D

const ROTATION_ANGLE = 45  # Angle de rotation en degrés
@onready var stickman = $Stickman
@onready var sprite = $Stickman/Sprite

func _input(event):
	if not stickman.is_on_floor():
		return  false # Ne fait rien si le stickman n'est pas au sol
		
	# Vérifie si une action pour tourner la carte est déclenchée
	if Input.is_action_just_pressed("RotateLeft") and stickman.is_on_floor():
		$Rotation.play()
		rotate_map(-ROTATION_ANGLE)
		
	elif Input.is_action_just_pressed("RotateRight") and stickman.is_on_floor():
		$Rotation.play()
		rotate_map(ROTATION_ANGLE)
	
	if rotation_degrees == 360 or rotation_degrees == -360:
		rotation_degrees = 0
	
func rotate_map(angle_degrees):
	stickman.set_collision_layer(0)
	stickman.set_collision_mask(0)
	stickman.set_physics_process(false)
	# Applique la rotation de la carte
	var rot = 0
	if angle_degrees > 0:
		while(rot != abs(angle_degrees)):
			stickman.rotation_degrees -= 5
			rotation_degrees += 5
			rot += 5
			await get_tree().create_timer(0.001).timeout
	else:
		while(rot != abs(angle_degrees)):
			stickman.rotation_degrees += 5
			rotation_degrees -= 5
			rot += 5
			await get_tree().create_timer(0.001).timeout
	stickman.set_physics_process(true)
	stickman.set_collision_layer(1)
	stickman.set_collision_mask(2)
	
