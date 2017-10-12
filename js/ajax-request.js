/* Archivo Ajax Request */

// creo el objeto hc
var hc = {};

// creo el ajax
hc.ajax = function(options) {
	var defaults = {
		method: 'GET',
		data: null,
		success: function() {},
		error: function() {}
	};

	var o = hc.merge(defaults, options);

	var xhr = new XMLHttpRequest();

	if (o.method.toUpperCase() == 'GET') {
		if (o.data != null) {
			o.url += '?' + o.data;
			o.data = null;
		}
	}

	xhr.open(o.method, o.url);

	xhr.addEventListener('readystatechange', function() {
		if(xhr.readyState == 4) {
			if(xhr.status == 200) {
				o.success(xhr.responseText);
			} else {
				o.error();
			}
		}
	}, false);

	if(o.method.toUpperCase() == "POST") {
		xhr.setRequestHeader('Content-Type', 
			'application/x-www-form-urlencoded');
	}

	xhr.send(o.data);
};

hc.$ = function(id) {
	return document.getElementById(id);
}

hc.merge = function(obj1, obj2) {
	var salida = {};
	for(var i in obj1) {
		salida[i] = obj1[i];
	}
	for(var i in obj2) {
		salida[i] = obj2[i];
	}
	return salida;
}

hc.crearMensaje = function(options) {
	mensaje = '';
	if (options.estado == 'success') {
		mensaje += '<div class="alert alert-success alert-dismissible show" role="alert"><span class="glyphicon glyphicon-ok"></span> ';
	} else {
		mensaje += '<div class="alert alert-danger alert-dismissible show" role="alert"><span class="glyphicon glyphicon-warning-sign"></span> ';
	}
	mensaje += '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
	mensaje += '<span aria-hidden="true">&times;</span>';
	mensaje += '</button>';
	mensaje += options.mensaje;
	mensaje += '</div>'
	hc.$('mensaje').innerHTML = mensaje;
}


