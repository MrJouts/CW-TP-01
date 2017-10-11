window.addEventListener('DOMContentLoaded', function() {

	var formLogin = hc.$('login');

	if (formLogin) {

		formLogin.addEventListener('submit', function(ev) {
			ev.preventDefault();

			var usuarioInput = hc.$('usuario');
			var passwordInput = hc.$('password');

			var data = {
				usuario : usuarioInput.value,
				password: passwordInput.value
			};

			hc.ajax({
				method: "POST",
				url: 'api/login.php',
				data: JSON.stringify(data),
				success: function(rta) {
				
					if (rta == 'Los datos ingresados son incorrectos' ) {
						hc.$('salida').innerHTML = rta;
					} else {
						console.log(rta);

						location = "index.php?cat=reservas";
						//location = "reservas.php";

					}
				}
			});
		}, false);
	}
}, false);