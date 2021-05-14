function habilitar(campos)
{
	document.getElementById('del').style.display = 'none';
	document.getElementById('up').style.display = 'block';


	campos.forEach(function(campo, indice, array) {
		document.getElementById(campo).disabled = false
	});

}