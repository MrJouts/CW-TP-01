function mostrarReservas() {
	hc.ajax({
		url: 'api/reservas.php',
		success: function(rta) {
			
			var reservas = JSON.parse(rta);
			
			console.log(reservas); 

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

				// salida += '<a id="reservaEditar" type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Editar"><i class="glyphicon glyphicon-pencil"></i> <span class="sr-only">Editar</span></a> ';
				
				salida += '<button id="reservaEliminar" type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Borrar"><i class="glyphicon glyphicon-remove"></i> <span class="sr-only">Borrar</span></button>';
				salida += "</td>";
				salida += "</tr>";
			}

			salida += '</tbody>';
			salida += '</table>';
			salida += '</div><!-- table-responsive -->';
			salida += '</div><!-- wrapper -->';
			salida += '</div><!-- col-sm-12 -->';
			salida += '</div><!-- row -->';

			hc.$('getReserva').innerHTML = salida;

			cargarReserva(nuevaReserva);
			editarReserva(reservaEditar);
			eliminarReserva(reservaEliminar);
		}

	});

}

window.addEventListener('DOMContentLoaded', function() {

	mostrarReservas();

	// Traemos las habitaciones.
	hc.ajax({
		url: 'api/habitaciones-leer.php',
		success: function(rta) {
			hc.habitaciones = JSON.parse(rta);
			console.log(hc.habitaciones);
		}
	});

}, false);