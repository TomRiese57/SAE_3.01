extends Node2D

const ROTATION_ANGLE = 90  # Angle de rotation en degrés

func _input(event):
	# Vérifie si une action pour tourner la carte est déclenchée
	if Input.is_action_just_pressed("RotateLeft"):
		rotate_map(-ROTATION_ANGLE)
	elif Input.is_action_just_pressed("RotateRight"):
		rotate_map(ROTATION_ANGLE)

func rotate_map(angle_degrees):
	print("Rotation demandée :", angle_degrees)
	# Applique la rotation à Level_1
	rotation_degrees += angle_degrees
	print("Nouvelle rotation :", rotation_degrees)
	
	# Verrouille la rotation sur des multiples de 90° pour éviter des erreurs
	rotation_degrees = round(rotation_degrees / 90) * 90

	# Corrige les sous-composants comme la caméra ou le stickman
	adjust_stickman()
	adjust_camera()

func adjust_stickman():
	# Modifie éventuellement l'orientation ou la logique de Stickman si nécessaire
	var stickman = $StickmanObject
	stickman.rotation_degrees = -rotation_degrees  # Corrige l'orientation du stickman (optionnel)

func adjust_camera():
	# Ajuste la rotation de la caméra pour garder une vue stable
	var camera = $StickmanObject/Camera2D
	camera.rotation_degrees = -rotation_degrees
