function myFunction(y) {
	var x = document.getElementById(y)
	if (x.style.display === "block") {
		x.style.display = "none";
		window.location.reload();
	} else {
		x.style.display = "block";

	}
}
