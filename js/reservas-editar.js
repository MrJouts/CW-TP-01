hc.editarReserva = function(reservaEditar) {
	for (let i = 0; i < reservaEditar.length; i++) {
		reservaEditar[i].addEventListener('click', function(){

				hc.id_reserva = this.getAttribute('data-id');

				console.log(hc.id_reserva);

			hc.ajax({
				url: 'api/reservas.php?id=' + hc.id_reserva,
				success: function(rta) {

					hc.reservaCompleta = JSON.parse(rta);
					console.log(hc.reservaCompleta);

						hc.ajax({
						url: 'api/habitaciones-leer.php',
						success: function(rta) {
							hc.habitaciones = JSON.parse(rta);
							console.log(hc.habitaciones);


							var salida = '';
							salida += '<h2>Editar Reserva</h2>';
							salida += '<form  id="editarReserva" class="form-horizontal">';
							salida += '<fieldset>';
							salida += '<legend>Huesped:</legend>';
							salida += '<div class="form-group"><label for="nombre" class="col-sm-2 control-label">Nombre: </label><div class="col-sm-4"><input type="text" class="form-control" id="nombre" name="nombre" value="'+ hc.reservaCompleta.huesped.nombre+'"></div></div>';
							salida += '<div class="form-group"><label for="apellido" class="col-sm-2 control-label">Apellido: </label><div class="col-sm-4"><input type="text" class="form-control" id="apellido" name="apellido" value="'+ hc.reservaCompleta.huesped.apellido +'"></div></div>';
							salida += '<div class="form-group"><label for="direccion" class="col-sm-2 control-label">Direccion: </label><div class="col-sm-4"><input type="text" class="form-control" id="direccion" name="direccion" value="'+ hc.reservaCompleta.huesped.direccion +'"></div></div>';
							salida += '<div class="form-group"><label for="telefono" class="col-sm-2 control-label">Teléfono: </label><div class="col-sm-4"><input type="number" class="form-control" id="telefono" name="telefono" value="'+ hc.reservaCompleta.huesped.telefono +'"></div></div>';
							salida += '<div class="form-group"><label for="mail" class="col-sm-2 control-label">E-mail: </label><div class="col-sm-4"><input type="text" class="form-control" id="mail" name="mail" value="'+ hc.reservaCompleta.huesped.email +'"></div></div>';
							salida += '</fieldset>';

							salida += '<fieldset>';
							salida += '<legend>Habitación:</legend>';
							salida += '<div class="form-group"><label for="numeroHabitacion" class="col-sm-2 control-label">Numero habitación: </label><div class="col-sm-4"><select class="form-control" id="numeroHabitacion" name="numeroHabitacion">';

							for (var i = 0; i < hc.habitaciones.length; i++) {
								var hab = hc.habitaciones[i];
								salida+= '<option value="' + hab.id_habitacion + '" ';
								if (hc.reservaCompleta.habitacion.id_habitacion == hab.id_habitacion) {
									salida+= 'selected';
								}
								salida+='>' + hab.numero_habitacion + '</option>';
							}

							salida+= '</select></div></div>';
							salida += '</fieldset>';

							salida += '<fieldset>';
							salida += '<legend>Horario:</legend>';
							salida += '<div class="form-group"><label for="fechaEntrada" class="col-sm-2 control-label">Fecha de entrada: </label><div class="col-sm-4"><input type="date" class="form-control" id="fechaEntrada" name="fechaEntrada" value="'+ hc.reservaCompleta.reserva.fecha_inicio +'"></div></div>';
							salida += '<div class="form-group"><label for="fechaSalida" class="col-sm-2 control-label">Fecha de salida: </label><div class="col-sm-4"><input type="date" class="form-control" id="fechaSalida" name="fechaSalida" value="'+ hc.reservaCompleta.reserva.fecha_salida +'"></div></div>';
							salida += '</fieldset>';

							salida += '<div class="form-group"><div class="col-sm-offset-2 col-sm-4"><button type="submit" class="btn btn-default">Actualizar reserva</button></div></div>';

							salida += '</form>';

							hc.$('getReserva').innerHTML = salida;

							var formEditar = hc.$('editarReserva');

							formEditar.addEventListener('submit', function(ev) {
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
									ID_HUESPED: hc.reservaCompleta.huesped.id_huesped,
									NOMBRE: nombre.value,
									APELLIDO: apellido.value,
									DIRECCION: direccion.value,
									TELEFONO: telefono.value,
									EMAIL: mail.value,
									HABITACION: numeroHabitacion.value,
									FECHA_INICIO: fechaEntrada.value,
									FECHA_SALIDA: fechaSalida.value
								};

								hc.ajax({
									method: "PUT",
									url: 'api/reservas.php?id=' + hc.id_reserva,
									data: JSON.stringify(datos),
									success: function(rta) {

										console.log(rta);

										$respuesta = JSON.parse(rta)

										if ($respuesta  == 'ok') {
											hc.crearMensaje({
												mensaje: 'Se han realizado los cambios satisfactoriamente',
												estado: 'success'
											})
											hc.getReservas();
										}
									}
								});

							}, false);



				}
			});

		}
	});


		}, false);
	}






}
