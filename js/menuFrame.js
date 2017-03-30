var current_selected = "home";

function changeCSS(target) {
	var box_selected = document.getElementById(target);
	box_selected.className = "current";
	if(current_selected != target) {
		var box_unselected = document.getElementById(current_selected);
		box_unselected.className = "";
		current_selected = target;
	}
}