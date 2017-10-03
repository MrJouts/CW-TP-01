<main class="main-content">
	<section class="container-fluid pelicula">

	<h2>Reservas</h2>

		<button class="btn btn-primary">Nueva reserva</button>

		<div class="row">
			<div class="col-sm-12">
				<div class="wrapper">
					<div class="table-responsive">
			      <table class="table">
			        <thead>
			          <tr>
			            <th>Habitación</th>
			            <th>Huesped</th>
			            <th>Fecha de entrada</th>
			            <th>Fecha de salida</th>
			            <th>Acciones</th>
			          </tr>
			        </thead>
			        <tbody>

			          <tr>
			            <th scope="row">504</th>
			            <td>Carlos Kike</td>
			            <td>22 De marzo</td>
			            <td>222 de junio</td>
			            <td>
			            	<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Editar"><i class="glyphicon glyphicon-pencil"></i> <span class="sr-only">Editar</span></button>
			            	<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Borrar"><i class="glyphicon glyphicon-remove"></i> <span class="sr-only">Borrar</span></button>
			            </td>
			          </tr>

			          <tr class="active">
			            <th scope="row">active</th>
			            <td>Gray</td>
			            <td>Active color to a particular row or cell</td>
			            <td>Active color to a particular row or cell</td>
			            <td>Active color to a particular row or cell</td>
			          </tr>

			          <tr>
			            <th scope="row">success</th>
			            <td>Green</td>
			            <td>A successful or positive action</td>
			            <td>A successful or positive action</td>
			            <td>A successful or positive action</td>
			          </tr>

			          <tr>
			            <th scope="row">info</th>
			            <td>Blue</td>
			            <td>A neutral informative change or action</td>
			            <td>A neutral informative change or action</td>
			            <td>A neutral informative change or action</td>
			          </tr>

			          <tr>
			            <th scope="row">warning</th>
			            <td>Yellow</td>
			            <td>A warning that might need attention, but not too scary</td>
			            <td>A warning that might need attention, but not too scary</td>
			            <td>A warning that might need attention, but not too scary</td>
			          </tr>

			          <tr>
			            <th scope="row">danger</th>
			            <td>Red</td>
			            <td>Dangerous or potentially negative action</td>
			            <td>Dangerous or potentially negative action</td>
			            <td>
			            	<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Editar"><i class="glyphicon glyphicon-pencil"></i> <span class="sr-only">Editar</span></button>
			            	<button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Borrar"><i class="glyphicon glyphicon-remove"></i> <span class="sr-only">Borrar</span></button>
			            </td>
			          </tr>

			        </tbody>
			      </table>

					</div><!-- table-responsive -->
	    	</div><!-- wrapper -->
			</div><!-- col-sm-12 -->
		</div><!-- row -->



	<form  id="cargarHabitacion" class="form-horizontal">
	  <div class="form-group">
	    <label for="numeroHabitacion" class="col-sm-2 control-label">Numero Habitacion: </label>
	    <div class="col-sm-4">
	      <input type="text" class="form-control" id="numeroHabitacion">
	    </div>
	  </div>

	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-4">
	      <button type="submit" class="btn btn-default">Cargar datos</button>
	    </div>
	  </div>
	</form>	

</main>
