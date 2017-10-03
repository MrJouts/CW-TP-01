window.addEventListener('DOMContentLoaded', function() {
	// Capturamos el form.
	var formLogin = cv.$('login');

	formLogin.addEventListener('submit', function(ev) {
		ev.preventDefault();

		// Capturamos los campos del form.
		var usuarioInput = cv.$('usuario');
		var passwordInput = cv.$('password');

		var data = {
			usuario : usuarioInput.value,
			password: passwordInput.value
		};

		cv.ajax({
			method: "POST",
			url: 'api/login.php',
			// Stringificamos la data para poder
			// mandarla como texto en el send.
			data: JSON.stringify(data),
			success: function(rta) {
				console.log(rta);
			}
		});
	}, false);
}, false);