document.addEventListener("DOMContentLoaded", function() {
  let boton = document.getElementById("miBoton");
  let eliminar = document.getElementById("eliminarvaloracion");
  let botones= document.getElementsByClassName("botonvalorar");
  
  if(boton!=null)
  boton.addEventListener("click", function() {
    
    location.href = "valoraciones.php?" + "Dni=" + this.getAttribute("data-dni") + "&idProd=" + this.getAttribute("data-idProducto") + "&dir=0";  });
  if(botones!=null){
    
    for(let i=0;i<botones.length;i++)
      
      botones[i].addEventListener("click", function() {
        location.href = "valoraciones.php?" + "Dni=" + this.getAttribute("data-dni") + "&idProd=" + this.getAttribute("data-idProducto") + "&dir=1";
      });
  }

  if(eliminar!=null)
  eliminar.addEventListener("click", function() {
    location.href = "eliminarvaloracion.php?" + "Dni=" + this.getAttribute("data-dni") + "&idProd=" + this.getAttribute("data-idProducto");
  });

});