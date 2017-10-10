$(document).ready(function () {

	var nuevaReserva = hc.$('nuevaReserva');

	console.log(nuevaReserva);

	if (nuevaReserva) {
		nuevaReserva.addEventListener('click', function(){
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
				salida += '<div class="form-group"><label for="numeroHabitacion" class="col-sm-2 control-label">Número de habitación: </label><div class="col-sm-4"><input type="text" class="form-control" id="numeroHabitacion" name="numeroHabitacion"></div></div>';
				// salida += '<div class="form-group"><label for="tipoHabitacion" class="col-sm-2 control-label">Tipo: </label><div class="col-sm-4"><select class="form-control" id="tipoHabitacion" name="tipoHabitacion">';
				// salida += '<option value="">Matrimonial</option>';
				// salida += '<option value="">Single</option>';
				// salida += '<option value="">Double</option>';
				// salida += '</select></div></div>';
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

				cargarReserva.addEventListener('submit', function(ev){
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
						nombre: nombre.value,
						apellido: apellido.value,
						direccion: direccion.value,
						telefono: telefono.value,
						mail: mail.value,
						numeroHabitacion: numeroHabitacion.value,
						FECHA_INICIO: fechaEntrada.value,
						FECHA_SALIDA: fechaSalida.value
					}

					console.log(datos);

					hc.ajax({
						method: 'POST',
						url: 'api/reservas.php',
						data: JSON.stringify(datos),
						success: function(rta) {
							console.log(rta);
						}
					});



					// console.log(nombre.value);
					// console.log(apellido.value);
					// console.log(direccion.value);
					// console.log(telefono.value);
					// console.log(mail.value);
					// console.log(numeroHabitacion.value);
					// console.log(fechaEntrada.value);
					// console.log(fechaSalida.value);



				}, false);

		}, false);
	}

});