extends Control


# Called when the node enters the scene tree for the first time.
func _ready() -> void:
	pass # Replace with function body.


# Called every frame. 'delta' is the elapsed time since the previous frame.
func _process(delta: float) -> void:
	pass


func _on_retour_pressed() -> void:
	get_tree().change_scene_to_file("res://vue/tscn/menu_principal.tscn")


func _on_niveau_2_pressed() -> void:
	get_tree().change_scene_to_file("res://vue/tscn/level_2.tscn")


func _on_niveau_1_pressed() -> void:
	get_tree().change_scene_to_file("res://vue/tscn/level.tscn")


func _on_niveau_3_pressed() -> void:
	get_tree().change_scene_to_file("res://vue/tscn/level_3.tscn")
