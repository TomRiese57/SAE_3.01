extends Node2D

const ROTATION_ANGLE = 90  # Angle de rotation en degrés
@onready var stickman = $Stickman
var dead = false
var is_rotating = false

func _process(delta: float) -> void:
	if dead:
		Global.dead += 1
		reset_rotation()
	
func _input(event):
	if is_rotating or dead:
		return
	# Vérifie si une action pour tourner la carte est déclenchée
	elif Input.is_action_just_pressed("RotateLeft"):
		start_rotation(-ROTATION_ANGLE)
	elif Input.is_action_just_pressed("RotateRight"):
		start_rotation(ROTATION_ANGLE)
		
func start_rotation(angle_degrees):
	is_rotating = true
	$Rotation.play()
	rotate_map(angle_degrees)

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
	stickman.rot = round(global_rotation_degrees)
	if rotation_degrees == 360 or rotation_degrees == -360:
		rotation_degrees = 0
	if int(stickman.rotation_degrees) % 90 != 0:
		stickman.rotation_degrees = 0
		rotation_degrees = 0
	is_rotating = false
	
func reset_rotation():
	set_process_input(false)
	stickman.rotation_degrees = 0
	rotation_degrees = 0
	dead = false
	is_rotating = false
	set_process_input(true)
	
func _on_spike_dead() -> void:
	dead = true

func _on_hacksaw_dead() -> void:
	dead = true

func _on_timer_timeout() -> void:
	Global.time += 1
