/**
 * Realiza los procesos para validar si el usuaria se encuentra
 * autentificado en la plataforma
 *
 */

hc.login = function() {

	hc.formLogin = hc.$('login');

	if (hc.formLogin) {


		hc.formLogin.addEventListener('submit', function(ev) {
			ev.preventDefault();
			// capturo los campos del formulario
			var usuarioInput = hc.$('usuario');
			var passwordInput = hc.$('password');
			// creo el json para enviarlo en la peticion de ajax
			var data = {
				usuario : usuarioInput.value,
				password: passwordInput.value
			};
			// genero la peticion de ajax
			hc.ajax({
				method: "POST",
				url: 'api/login.php',
				data: JSON.stringify(data),
				success: function(rta) {
					var data = JSON.parse(rta);
					if (!data) {
						hc.$('salida').innerHTML = 'Los datos ingresados son incorrectos';
					} else {

						console.log(data);

						//location = "index.php?cat=reservas";
					} // else close

				} // success: close

			}); // ajax{} close

		}, false); // addEventListener() close

	} // if close

} //login() close

window.addEventListener('DOMContentLoaded', function() {
	hc.login();
}, false);