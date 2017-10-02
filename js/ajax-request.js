/* Archivo Ajax Request */

var cv = {};

cv.ajax = function(options) {
	var defaults = {
		method: 'GET',
		data: null,
		success: function() {},
		error: function() {}
	}

	var o = cv.merge(defaults, options);

	var xhr = new XMLHttpRequest();

	if (o.method.toUppercase() == 'GET') {
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

}

cv.merge = function(obj1, obj2) {
	var salida = {};
	for(var i in obj1) {
		salida[i] = obj1[i];
	}
	for(var i in obj2) {
		salida[i] = obj2[i];
	}
	return salida;
}