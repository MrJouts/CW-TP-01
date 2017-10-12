function editarReserva(reservaEditar) {

	// reservaEditar.addEventListener('click', function(ev) {				
	// 	alert('editar');

	// }, false);

	for (let i = 0; i < reservaEditar.length; i++) {
		//console.log(reservaEditar[i].value);

		reservaEditar[i].addEventListener('click', function(){
			//alert(reservaEditar[i].value);

			hc.ajax({
				url: 'index.php?cat=reservas?id=' + this.getAttribute('data-id'),
				success: function(rta) {
					var salida = '';
					salida += '<h2>Editar Reserva</h2>';
					salida += '<form  id="cargarReserva" class="form-horizontal">';
					salida += '<fieldset>';
					salida += '<legend>Huesped:</legend>';
					salida += '<div class="form-group"><label for="nombre" class="col-sm-2 control-label">Nombre: </label><div class="col-sm-4"><input type="text" class="form-control" id="nombre" name="nombre"></div></div>';
					salida += '<div class="form-group"><label for="apellido" class="col-sm-2 control-label">Apellido: </label><div class="col-sm-4"><input type="text" class="form-control" id="apellido" name="apellido"></div></div>';
					salida += '<div class="form-group"><label for="direccion" class="col-sm-2 control-label">Direccion: </label><div class="col-sm-4"><input type="text" class="form-control" id="direccion" name="direccion"></div></div>';
					salida += '<div class="form-group"><label for="telefono" class="col-sm-2 control-label">Teléfono: </label><div class="col-sm-4"><input type="number" class="form-control" id="telefono" name="telefono"></div></div>';
					salida += '<div class="form-group"><label for="mail" class="col-sm-2 control-label">E-mail: </label><div class="col-sm-4"><input type="text" class="form-control" id="mail" name="mail"></div></div>';
					salida += '</fieldset>';

					// salida += '<fieldset>';
					// salida += '<legend>Habitación:</legend>';
					// salida += '<div class="form-group"><label for="numeroHabitacion" class="col-sm-2 control-label">Numero habitación: </label><div class="col-sm-4"><select class="form-control" id="numeroHabitacion" name="numeroHabitacion">';
					// salida += '<option value="1">101</option>';
					// salida += '<option value="2">102</option>';
					// salida += '<option value="3">103</option>';
					// salida += '</select></div></div>';
					// salida += '</fieldset>';

					// salida += '<fieldset>';
					// salida += '<legend>Horario:</legend>';
					// salida += '<div class="form-group"><label for="fechaEntrada" class="col-sm-2 control-label">Fecha de entrada: </label><div class="col-sm-4"><input type="datetime-local" class="form-control" id="fechaEntrada" name="fechaEntrada"></div></div>';
					// salida += '<div class="form-group"><label for="fechaSalida" class="col-sm-2 control-label">Fecha de salida: </label><div class="col-sm-4"><input type="datetime-local" class="form-control" id="fechaSalida" name="fechaSalida"></div></div>';
					// salida += '</fieldset>';

					salida += '<div class="form-group"><div class="col-sm-offset-2 col-sm-4"><button type="submit" class="btn btn-default">Cargar reserva</button></div></div>';

					salida += '</form>';



					hc.$('getReserva').innerHTML = salida;

					// capturar form, evento submit => llamada de ajax (put)
				}
			});

		}, false);
	}


	// hc.ajax({
	// 	method: "PUT",
	// 	url: 'api/reservasd.php?id=',
	// 	// Stringificamos la data para poder
	// 	// mandarla como texto en el send.
	// 	data: JSON.stringify(data),
	// 	success: function(rta) {
	// 		console.log(rta);
	// 	}
	// });


}
