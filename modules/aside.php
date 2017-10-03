<aside class="main-sidebar">
	<ul class="nav nav-pills nav-stacked">
		
		<?php 


		foreach ( $botones as $link => $txt ) {
			if ( $seccion == $link ) {
				$activo = 'class="active"';
			} else {
				$activo = '';
			}

			?>


	  <li role="presentation" <?php echo $activo; ?>>
	  	<a href="index.php?cat=<?php echo $link; ?>">
		  	<i class="<?php echo $icono; ?>"></i>
	  		<?php echo $txt; ?>
	  	</a>
	  </li>


		<?php
		}
		?>

	</ul>

			

				



</aside>