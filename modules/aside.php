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
		  		<span class="<?= $txt[1] ?>"></span><?php echo $txt[0]; ?>
		  	</a>
		  </li>

		<?php
		}
		?>

	</ul>

</aside>