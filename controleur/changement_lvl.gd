extends Sprite2D


# Called when the node enters the scene tree for the first time.
func _ready() -> void:
	pass # Replace with function body.


# Called every frame. 'delta' is the elapsed time since the previous frame.
func _process(delta: float) -> void:
	pass


func _on_porte_body_entered(body: Node2D) -> void:
	if body.name == "Stickman" and Input.is_action_just_pressed("interact"):
		get_tree().change_scene("level_2.tscn")
