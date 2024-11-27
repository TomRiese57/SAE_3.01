extends Node2D

const ROTATION_ANGLE = 90  # Angle de rotation en degrés

func _input(event):
	# Vérifie si une action pour tourner la carte est déclenchée
	if Input.is_action_just_pressed("RotateLeft"):
		rotate_map(-ROTATION_ANGLE)
	elif Input.is_action_just_pressed("RotateRight"):
		rotate_map(ROTATION_ANGLE)

func rotate_map(angle_degrees):
	# Applique la rotation
	rotation_degrees += angle_degrees

	# Corrige les sous-composants comme la caméra ou le stickman
	adjust_stickman(angle_degrees)

func adjust_stickman(angle_degrees):
	# Modifie éventuellement l'orientation ou la logique de Stickman si nécessaire
	var stickman = $Stickman
	stickman.rotation_degrees -= angle_degrees # Corrige l'orientation du stickman (optionnel)
