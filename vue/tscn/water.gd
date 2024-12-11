extends Sprite2D

@onready var stickman = $Stickman
# Called when the node enters the scene tree for the first time.
func _ready() -> void:
	pass # Replace with function body.


# Called every frame. 'delta' is the elapsed time since the previous frame.
func _process(delta: float) -> void:
	pass


func _on_eau_body_entered(body: Node2D) -> void:
	if body.name == "Stickman":
		if body.has_method("set_speed"):
			body.set_speed(50)
	
func _on_eau_body_exited(body: Node2D) -> void:
	if body.name == "Stickman":
		if body.has_method("set_speed"):
			body.set_speed(200)
