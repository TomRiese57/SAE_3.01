extends Node2D

const ROTATION_ANGLE = 90  # Angle de rotation en degrés
@onready var stickman = $Stickman
var dead = false
var is_rotating = false

func _process(delta: float) -> void:
	if dead:
		reset_rotation()
		return
	
func _input(event):
	if is_rotating or dead:
		return
	# Vérifie si une action pour tourner la carte est déclenchée
	if Input.is_action_just_pressed("RotateLeft") and stickman.is_on_floor():
		start_rotation(-ROTATION_ANGLE)
		
	elif Input.is_action_just_pressed("RotateRight") and stickman.is_on_floor():
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
	is_rotating = false
	if rotation_degrees == 360 or rotation_degrees == -360:
		rotation_degrees = 0
	
func reset_rotation():
	set_process_input(false)
	Global.dead += 1
	dead = false
	stickman.rotation_degrees = 0
	rotation_degrees = 0
	is_rotating = false
	set_process_input(true)
	print(Global.dead)
	
func _on_spike_dead() -> void:
	dead = true

func _on_hacksaw_dead() -> void:
	dead = true
