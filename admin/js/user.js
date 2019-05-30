document.getElementById("ingresar-usuario").addEventListener('click', function(){
	document.getElementById("content-form").classList.add('mostrar-formulario')
	document.getElementById("form-register").classList.add('mostrar')
})

document.getElementById("cerrar-ingresar").addEventListener('click', function(){
	document.getElementById("content-form").classList.remove('mostrar-formulario')
<<<<<<< HEAD
	document.getElementById("form-register").classList.remove('mostrar')
=======
	document.getElementById("form-register").classList.remove('mostrar')	
>>>>>>> 9019f5ef6dd6faa370230cb428f1840a3b32e772
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

<<<<<<< HEAD
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
=======
		document.getElementById('form-content-actualizar').childNodes[1].value = text[1].innerHTML
		document.getElementById('form-content-actualizar').childNodes[3].childNodes[1].value = text[3].innerHTML
		document.getElementById('form-content-actualizar').childNodes[3].childNodes[1].value = text[3].innerHTML
		document.getElementById('form-content-actualizar').childNodes[3].childNodes[3].value = text[5].innerHTML
		document.getElementById('form-content-actualizar').childNodes[5].value = text[7].innerHTML
		document.getElementById('form-content-actualizar').childNodes[7].value = text[9].innerHTML
		document.getElementById('form-content-actualizar').childNodes[9].value = text[11].innerHTML



>>>>>>> 9019f5ef6dd6faa370230cb428f1840a3b32e772


		document.getElementById("content-form").classList.add('mostrar-formulario')
		document.getElementById("form-actualizar").classList.add("mostrar")

	})
}


document.getElementById("cerrar-actualizar").addEventListener('click', function(){
	document.getElementById("content-form").classList.remove('mostrar-formulario')
<<<<<<< HEAD
	document.getElementById("form-actualizar").classList.remove('mostrar')
})
=======
	document.getElementById("form-actualizar").classList.remove('mostrar')	
})



>>>>>>> 9019f5ef6dd6faa370230cb428f1840a3b32e772
