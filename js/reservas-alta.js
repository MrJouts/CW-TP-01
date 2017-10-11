function cargarReserva(nuevaReserva) {

	nuevaReserva.addEventListener('click', function(ev) {

		var salida = '';
		salida += '<h2>Nueva Reserva</h2>';
		salida += '<form  id="cargarReserva" class="form-horizontal">';
		salida += '<fieldset>';
		salida += '<legend>Huesped:</legend>';
		salida += '<div class="form-group"><label for="nombre" class="col-sm-2 control-label">Nombre: </label><div class="col-sm-4"><input type="text" class="form-control" id="nombre" name="nombre"></div></div>';
		salida += '<div class="form-group"><label for="apellido" class="col-sm-2 control-label">Apellido: </label><div class="col-sm-4"><input type="text" class="form-control" id="apellido" name="apellido"></div></div>';
		salida += '<div class="form-group"><label for="direccion" class="col-sm-2 control-label">Direccion: </label><div class="col-sm-4"><input type="text" class="form-control" id="direccion" name="direccion"></div></div>';
		salida += '<div class="form-group"><label for="telefono" class="col-sm-2 control-label">Teléfono: </label><div class="col-sm-4"><input type="number" class="form-control" id="telefono" name="telefono"></div></div>';
		salida += '<div class="form-group"><label for="mail" class="col-sm-2 control-label">E-mail: </label><div class="col-sm-4"><input type="text" class="form-control" id="mail" name="mail"></div></div>';
		salida += '</fieldset>';

		salida += '<fieldset>';
		salida += '<legend>Habitación:</legend>';
		salida += '<div class="form-group"><label for="numeroHabitacion" class="col-sm-2 control-label">Numero habitación: </label><div class="col-sm-4"><select class="form-control" id="numeroHabitacion" name="numeroHabitacion">';
		salida+= '<option value="1">101</option>';
		salida+= '<option value="2">102</option>';
		salida+= '<option value="3">103</option>';
		salida+= '</select></div></div>';
		salida += '</fieldset>';

		salida += '<fieldset>';
		salida += '<legend>Horario:</legend>';
		salida += '<div class="form-group"><label for="fechaEntrada" class="col-sm-2 control-label">Fecha de entrada: </label><div class="col-sm-4"><input type="datetime-local" class="form-control" id="fechaEntrada" name="fechaEntrada"></div></div>';
		salida += '<div class="form-group"><label for="fechaSalida" class="col-sm-2 control-label">Fecha de salida: </label><div class="col-sm-4"><input type="datetime-local" class="form-control" id="fechaSalida" name="fechaSalida"></div></div>';
		salida += '</fieldset>';

		salida += '<div class="form-group"><div class="col-sm-offset-2 col-sm-4"><button type="submit" class="btn btn-default">Cargar reserva</button></div></div>';

		salida += '</form>';
		
		hc.$('getReserva').innerHTML = salida;

		var cargarReserva = hc.$('cargarReserva');

		cargarReserva.addEventListener('submit', function(ev) {
			ev.preventDefault();
			
			var nombre = hc.$('nombre');
			var apellido = hc.$('apellido');
			var direccion = hc.$('direccion');
			var telefono = hc.$('telefono');
			var mail = hc.$('mail');
			var numeroHabitacion = hc.$('numeroHabitacion');
			var fechaEntrada = hc.$('fechaEntrada');
			var fechaSalida = hc.$('fechaSalida');

			var datos = {
				NOMBRE: nombre.value,
				APELLIDO: apellido.value,
				DIRECCION: direccion.value,
				TELEFONO: telefono.value,
				EMAIL: mail.value,
				HABITACION: numeroHabitacion.value,
				FECHA_INICIO: fechaEntrada.value,
				FECHA_SALIDA: fechaSalida.value
			};

			console.log(datos);

			hc.ajax({
				method: 'POST',
				url: 'api/reservas.php?cargar=1',
				data: JSON.stringify(datos),
				success: function(rta) {
					console.log(rta);
					var respuesta = JSON.parse(rta);

					console.log(respuesta);
					
					mostrarReservas()
					if(respuesta.id_reserva) {
						hc.$('mensaje').innerHTML = "La reserva se cargó satisfactoriamente";
						location = "index.php?cat=reservas";
					}
				}
			});


		}, false);

	}, false);

}