document.getElementById("ingresar-usuario").addEventListener('click', function(){
	document.getElementById("content-form").classList.add('mostrar-formulario')
	document.getElementById("form-register").classList.add('mostrar')
})

document.getElementById("cerrar-ingresar").addEventListener('click', function(){
	document.getElementById("content-form").classList.remove('mostrar-formulario')
	document.getElementById("form-register").classList.remove('mostrar')
})
for (var i = document.getElementsByClassName('eliminar-formulario').length - 1; i >= 0; i--) {
	document.getElementsByClassName('eliminar-formulario')[i].addEventListener('click', function(){

		for (var i = document.getElementsByClassName('eliminar-formulario').length - 1; i >= 0; i--) {
			document.getElementsByClassName('eliminar-formulario')[i].addEventListener('click', function(){
				text = this.parentElement.parentElement.childNodes

				swal({
				  title: "VerduraSoft",
				  text: "¿seguro que deseas eliminar a "+ text[3].innerHTML + " "+ text[5].innerHTML +" con número documento " + text[1].innerHTML +"?",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((willDelete) => {
				  if (willDelete) {
				    swal(text[3].innerHTML + " " + text[5].innerHTML + " ha sido eliminado", {
				      icon: "success",
				    });
				  }
				});
			})
		}
	})
}



for (var i = document.getElementsByClassName("editar-formulario").length - 1; i >= 0; i--) {
	document.getElementsByClassName("editar-formulario")[i].addEventListener("click", function(){
		var text = this.parentElement.parentElement.childNodes

		// CC/Nit:
		document.getElementById('form-content-actualizar').childNodes[3].value = text[1].innerHTML;

		// Nombre:
		document.getElementById('form-content-actualizar').childNodes[5].childNodes[3].value = text[3].innerHTML

		// Apellido:
		document.getElementById('form-content-actualizar').childNodes[5].childNodes[7].value = text[5].innerHTML

		// Email:
		document.getElementById('form-content-actualizar').childNodes[9].value = text[7].innerHTML

		// Direccion:
		document.getElementById('form-content-actualizar').childNodes[13].value = text[9].innerHTML

		// Telefono:
		document.getElementById('form-content-actualizar').childNodes[17].value = text[13].innerHTML

		// ID Hidden
		document.getElementById('form-content-actualizar').childNodes[19].childNodes[1].value = text[21].innerHTML


		document.getElementById("content-form").classList.add('mostrar-formulario')
		document.getElementById("form-actualizar").classList.add("mostrar")

	})
}


document.getElementById("cerrar-actualizar").addEventListener('click', function(){
	document.getElementById("content-form").classList.remove('mostrar-formulario')
	document.getElementById("form-actualizar").classList.remove('mostrar')
})
