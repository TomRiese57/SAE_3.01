extends Sprite2D

@onready var stickman = $Stickman

func _on_eau_body_entered(body: Node2D) -> void:
	if body.name == "Stickman":
		if body.has_method("set_speed"):
			body.set_speed(50)
	
func _on_eau_body_exited(body: Node2D) -> void:
	if body.name == "Stickman":
		if body.has_method("set_speed"):
			body.set_speed(200)
