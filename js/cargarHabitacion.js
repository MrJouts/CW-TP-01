window.addEventListener('DOMContentLoaded', function() {


	var formAlta = cv.$('cargarHabitacion');

	formAlta.addEventListener('submit', function(ev) {
		ev.preventDefault();

		var numeroHabitacion = cv.$('numeroHabitacion');

		var data = {
			numeroHabitacion : numeroHabitacion.value
		};

		cv.ajax({
			method: "POST",
			url:'api/habitaciones.php',
			data: JSON.stringify(data),
			success: function(rta) {
				console.log(rta);
			}
		});

	}, false);

}, false);