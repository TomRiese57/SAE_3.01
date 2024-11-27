extends Node2D

const ROTATION_ANGLE = 90  # Angle de rotation en degrés
@onready var stickman = $Stickman

func _input(event):
	if not is_stickman_on_ground():
		return  # Ne fait rien si le stickman n'est pas au sol

	# Vérifie si une action pour tourner la carte est déclenchée
	if Input.is_action_just_pressed("RotateLeft"):
		rotate_map(-ROTATION_ANGLE)
	elif Input.is_action_just_pressed("RotateRight"):
		rotate_map(ROTATION_ANGLE)

func rotate_map(angle_degrees):
	# Applique la rotation de la carte
	rotation_degrees += angle_degrees

	# Ajuste le stickman pour compenser l'orientation
	adjust_stickman(angle_degrees)
	
	await (0.5)

func adjust_stickman(angle_degrees):
	# Corrige l'orientation du stickman pour rester droit
	stickman.rotation_degrees -= angle_degrees

func is_stickman_on_ground() -> bool:
	# Vérifie si le stickman est sur le sol (spécifique à CharacterBody2D)
	return stickman.is_on_floor()
