document.getElementById("ingresar-producto").addEventListener("click",function(){
	document.getElementById("content-formulario").classList.add("mostrar-formulario")
	document.getElementById("form-register").classList.add("mostrar")
})

document.getElementById("cerrar_ingresar").addEventListener("click",function(){
	document.getElementById("content-formulario").classList.remove("mostrar-formulario")
	document.getElementById("form-register").classList.remove("mostrar")
})

for (var i = document.getElementsByClassName('eliminar-formulario').length - 1; i >= 0; i--) {
	document.getElementsByClassName('eliminar-formulario')[i].addEventListener('click', function(){

		for (var i = document.getElementsByClassName('eliminar-formulario').length - 1; i >= 0; i--) {
			document.getElementsByClassName('eliminar-formulario')[i].addEventListener('click', function(){
				text = this.parentElement.parentElement.childNodes

				swal({
				  title: "VerduraSoft",
				  text: "¿Seguro que deseas eliminar el producto  "+ text[5].innerHTML +" con codigo  " + text[3].innerHTML +"?",
				  icon: "warning",
				  buttons: true,
				  dangerMode: true,
				})
				.then((willDelete) => {
				  if (willDelete) {
				    swal(text[5].innerHTML + " ha sido eliminado", {
				      icon: "success",
				    });
				  }
				});
			})
		}
	})
}

for (var i = document.getElementsByClassName('editar-formulario').length - 1; i >= 0; i--) {
	document.getElementsByClassName('editar-formulario')[i].addEventListener('click', function(){
		var text = this.parentElement.parentElement.childNodes

<<<<<<< HEAD
		// Foto
		document.getElementById('img_editar').src = '../' + text[19].innerHTML

		// Codigo
		document.getElementById('form-content-actualizar').childNodes[1].childNodes[1].value = text[1].innerHTML

		// Nombre
		document.getElementById('form-content-actualizar').childNodes[1].childNodes[3].value = text[3].innerHTML

		// Descripcion
		document.getElementById('form-content-actualizar').childNodes[3].value = text[5].innerHTML

		// Valor
		document.getElementById('form-content-actualizar').childNodes[5].childNodes[1].value = text[7].innerHTML

		// Cantidad
		document.getElementById('form-content-actualizar').childNodes[5].childNodes[3].value = text[9].innerHTML

		// id hidden
		document.getElementById('form-content-actualizar').childNodes[9].childNodes[1].value = text[1].innerHTML

		// nombre hidden
		document.getElementById('form-content-actualizar').childNodes[9].childNodes[3].value = text[3].innerHTML

		// foto hidden
		document.getElementById('form-content-actualizar').childNodes[9].childNodes[5].value = text[19].innerHTML

		precio = document.getElementById('form-content-actualizar').childNodes[5].childNodes[1].value
		cu = document.getElementById('form-content-actualizar').childNodes[5].childNodes[3].value



		document.getElementById('form-content-actualizar').childNodes[7].value = precio * cu

		document.getElementById("content-formulario").classList.add("mostrar-formulario")
=======
		document.getElementById('form-content-actualizar').childNodes[1].childNodes[1].value = text[1].innerHTML
		document.getElementById('form-content-actualizar').childNodes[1].childNodes[3].value = text[3].innerHTML
		document.getElementById('form-content-actualizar').childNodes[3].value = text[5].innerHTML
		document.getElementById('form-content-actualizar').childNodes[5].childNodes[1].value = text[7].innerHTML
		document.getElementById('form-content-actualizar').childNodes[5].childNodes[3].value = text[9].innerHTML

		precio = document.getElementById('form-content-actualizar').childNodes[5].childNodes[1].value
		cu = document.getElementById('form-content-actualizar').childNodes[5].childNodes[3].value

		document.getElementById('form-content-actualizar').childNodes[7].value = precio * cu
		
		document.getElementById("content-formulario").classList.add("mostrar-formulario")		
>>>>>>> 9019f5ef6dd6faa370230cb428f1840a3b32e772
		document.getElementById("form-actualizar").classList.add("mostrar")
	})
}

document.getElementById('form-actualizar').addEventListener('keyup',function(){
<<<<<<< HEAD

=======
	
>>>>>>> 9019f5ef6dd6faa370230cb428f1840a3b32e772
		precio = document.getElementById('form-content-actualizar').childNodes[5].childNodes[1].value
		cu = document.getElementById('form-content-actualizar').childNodes[5].childNodes[3].value

		document.getElementById('form-content-actualizar').childNodes[7].value = precio * cu
})
document.getElementById('form-content-register').addEventListener('keyup',function(){
<<<<<<< HEAD

=======
	
>>>>>>> 9019f5ef6dd6faa370230cb428f1840a3b32e772
		precio = document.getElementById('form-content-register').childNodes[5].childNodes[1].value
		cu = document.getElementById('form-content-register').childNodes[5].childNodes[3].value

		document.getElementById('form-content-register').childNodes[7].value = precio * cu
})




document.getElementById("cerrar_editar").addEventListener("click",function(){
	document.getElementById("content-formulario").classList.remove("mostrar-formulario")
	document.getElementById("form-actualizar").classList.remove("mostrar")
})
<<<<<<< HEAD
=======


>>>>>>> 9019f5ef6dd6faa370230cb428f1840a3b32e772
