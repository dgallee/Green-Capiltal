



document.addEventListener("DOMContentLoaded", function() {
  let boton = document.getElementById("miBoton");
  let eliminar = document.getElementById("eliminarvaloracion");
  
 
  

  if(boton!=null)
  boton.addEventListener("click", function() {
    
    location.href = "valoraciones.php?" + "Dni=" + this.getAttribute("dni") + "&idProd=" + this.getAttribute("idProducto");
  });

  if(eliminar!=null)
  eliminar.addEventListener("click", function() {
    location.href = "eliminarvaloracion.php?" + "Dni=" + this.getAttribute("dni") + "&idProd=" + this.getAttribute("idProducto");
  });


 
});