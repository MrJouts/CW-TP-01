<header class="main-header">
	<nav class="navbar navbar-default">
	  <div class="container-fluid">

	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <span class="navbar-brand">Hotel California</span>
	    </div>

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav navbar-right">
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
	          	<?php echo Auth::getUser()->nombre .' ' . Auth::getUser()->apellido; ?>
	          </a>
	          <ul class="dropdown-menu">
	            <li><a href="index.php?cat=logout"><i class="glyphicon glyphicon-log-out"></i> Salir</a></li>
	          </ul>
	        </li>
	      </ul>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
</header>