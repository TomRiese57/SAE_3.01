extends Button

# Called when the node enters the scene tree for the first time.
func _ready() -> void:
	if (Global.lvl_actuel >= 2):
		self.disabled = false

# Called every frame. 'delta' is the elapsed time since the previous frame.
func _process(delta: float) -> void:
	pass
