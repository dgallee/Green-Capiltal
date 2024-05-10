document.addEventListener("DOMContentLoaded", function() {
  let boton = document.getElementById("miBoton"); //detalles
  let eliminar = document.getElementById("eliminarvaloracion");
  let botones= document.getElementsByClassName("botonvalorar"); //pedidos
  
  if(boton!=null)
  boton.addEventListener("click", function() {
    
    location.href = "valoraciones.php?" + "Dni=" + this.getAttribute("dni") + "&idProd=" + this.getAttribute("idProducto") + "&dir=0";
  });
  if(botones!=null){
    for(let i=0;i<botones.length;i++)
      botones[i].addEventListener("click", function() {
      location.href = "valoraciones.php?" + "Dni=" + this.getAttribute("dni") + "&idProd=" + this.getAttribute("idProducto") + "&dir=1";
  });

}
  if(eliminar!=null)
  eliminar.addEventListener("click", function() {
    location.href = "eliminarvaloracion.php?" + "Dni=" + this.getAttribute("dni") + "&idProd=" + this.getAttribute("idProducto");
  });

});