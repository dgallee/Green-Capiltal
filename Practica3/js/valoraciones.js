// Primero, obtén el botón por su ID
var boton = document.getElementById('miBoton');

// Luego, añade el event listener
boton.addEventListener('click', function() {
  // Aquí va el código que se ejecutará cuando el botón sea clickeado

  /*
  alert('¡Botón clickeado!');

  
  alert(event.currentTarget.getAttribute("idProducto"));
  alert(event.currentTarget.getAttribute("dni"));
  */

  location.href="valoraciones.php?"+"Dni="+event.currentTarget.getAttribute("dni")+"&idProd="+event.currentTarget.getAttribute("idProducto");


});
