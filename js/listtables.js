function myFunction() {
	var tables = ["mytable1", "mytable2", "mytable3", "mytable4", "mytable5", "mytable6"]
	for (var i = 0; i < tables.length; i++) {
		var x = document.getElementById(tables[i]);
		if (x.style.display === "block") {
			x.style.display = "none";
			window.location.reload();
		} else {
			x.style.display = "block";

		}
	}
}