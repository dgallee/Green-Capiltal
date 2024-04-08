
document.addEventListener("DOMContentLoaded", function() {
    var btnSumar = document.getElementById("btn-sumar");
    var btnRestar = document.getElementById("btn-restar");
    var cantidadInput = document.getElementById("cantidad");
    var unidadesComprar = document.getElementById("unidades-comprar");

    // Función para actualizar la cantidad
    function actualizarCantidad(nuevaCantidad) {
        cantidadInput.value = nuevaCantidad;
        unidadesComprar.textContent = nuevaCantidad;
    }

    btnSumar.addEventListener("click", function() {
        var nuevaCantidad = parseInt(cantidadInput.value) + 1;
        if (nuevaCantidad <= existencias) { // Verificar si se excede el stock
            actualizarCantidad(nuevaCantidad);
        } else {
            alert("No hay suficientes unidades en stock.");
        }
    });

    btnRestar.addEventListener("click", function() {
        var nuevaCantidad = parseInt(cantidadInput.value) - 1;
        nuevaCantidad = nuevaCantidad >= 1 ? nuevaCantidad : 1;
        actualizarCantidad(nuevaCantidad);
    });
});