window.addEventListener('DOMContentLoaded', function() {

	/**
	 *	Funcion que trae un listado de las reservas cargadas
	 *	
	 */
	hc.getReservas = function() {

		hc.ajax({
			url: 'api/reservas.php',
			success: function(rta) {
				
				var reservas = JSON.parse(rta);

				var salida = "";
				salida = '<h2>Reservas</h2> ';
				salida += '<button id="nuevaReserva" class="btn btn-primary">Nueva reserva</button>';
				salida += '<div class="row">';
				salida += '<div class="col-sm-12">';
				salida += '<div class="wrapper">';
				salida += '<div class="table-responsive">';
				salida += '<table class="table">';
				salida += '<thead>';
				salida += '<tr>';
				salida += '<th>Habitación</th>';
				salida += '<th>Huesped</th>';
				salida += '<th>Fecha de entrada</th>';
				salida += '<th>Fecha de salida</th>';
				salida += '<th>Acciones</th>';
				salida += '</tr>';
				salida += '</thead>';
				salida += '<tbody>';

				for(let i = 0; i < reservas.length; i++) {
					salida += '<tr>';
					salida += '<td>' + reservas[i].fk_habitacion + '</td>';
					salida += '<td>' + reservas[i].fk_huesped + '</td>';
					salida += '<td>' + reservas[i].fecha_inicio + '</td>';
					salida += '<td>' + reservas[i].fecha_salida	 + '</td>';
					salida += '<td>';
					salida += '<button id="reservaEditar" type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" data-id="'+reservas[i].id_reserva+'" title="Editar"><i class="glyphicon glyphicon-pencil"></i> <span class="sr-only">Editar</span></button> ';
					
					salida += '<button id="reservaEliminar" type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" data-id="'+reservas[i].id_reserva+'" title="Borrar"><i class="glyphicon glyphicon-remove"></i> <span class="sr-only">Borrar</span></button>';
					salida += "</td>";
					salida += "</tr>";
				}

				salida += '</tbody>';
				salida += '</table>';
				salida += '</div><!-- table-responsive -->';
				salida += '</div><!-- wrapper -->';
				salida += '</div><!-- col-sm-12 -->';
				salida += '</div><!-- row -->';

				if (hc.$('getReserva')) {
					hc.$('getReserva').innerHTML = salida;
					hc.cargarReserva(nuevaReserva);
					hc.editarReserva(reservaEditar);
					hc.eliminarReserva(reservaEliminar);
				}

			}

		});

	}
	
	hc.getReservas();

}, false);