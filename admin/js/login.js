document.getElementById("iniciar-sesion").addEventListener('click', function(){
	document.getElementById("content-form").classList.add('mostrar-formulario')
	document.getElementById("form-register").classList.add('mostrar')
	document.getElementById("menu").classList.remove("active")
})

document.getElementById("cerrar-iniciar").addEventListener('click', function(){
	document.getElementById("content-form").classList.remove('mostrar-formulario')
	document.getElementById("form-register").classList.remove('mostrar')	
})



document.getElementById("registrarse-sesion").addEventListener('click', function(){
	document.getElementById("content-form").classList.add('mostrar-formulario')
	document.getElementById("form-actualizar").classList.add('mostrar')
	document.getElementById("menu").classList.remove("active")

})

document.getElementById("cerrar-registrarse").addEventListener('click', function(){
	document.getElementById("content-form").classList.remove('mostrar-formulario')
	document.getElementById("form-actualizar").classList.remove('mostrar')	
})