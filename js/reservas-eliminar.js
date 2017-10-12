hc.eliminarReserva = function(reservaEliminar) {

		for (let i = 0; i < reservaEliminar.length; i++) {
				reservaEliminar[i].addEventListener('click', function() {
					hc.id_reserva = this.getAttribute('data-id');

				hc.ajax({
					url: 'api/reservas.php?id=' + hc.id_reserva,
					success: function(rta) {

						hc.reservaCompleta = JSON.parse(rta);
						console.log(hc.reservaCompleta);

								var datos = {
									ID_HUESPED: hc.reservaCompleta.huesped.id_huesped,
								};

							hc.ajax({
								method: "DELETE",
								url: 'api/reservas.php?id=' + hc.id_reserva,
								data: JSON.stringify(datos),
								success: function(rta) {

										$respuesta = JSON.parse(rta)

									if ($respuesta  == 'registro borrado') {
										hc.crearMensaje({
											mensaje: 'Se borró el registro correspondiente a <b>' + hc.reservaCompleta.huesped.nombre+' '+hc.reservaCompleta.huesped.apellido + '</b> satisfactoriamente',
											estado: 'success'
										})
										hc.getReservas();
									}
								}
							});

						}
					});

				})
		}
}
