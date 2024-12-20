extends Button

# Called when the node enters the scene tree for the first time.
func _ready() -> void:
	if (Global.lvl_actuel >= 3):
		self.disabled = false
