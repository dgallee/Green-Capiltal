<?php

function buildFormularioBusqueda($itemname='')
{
  $ruta=RUTA_APP."/procesarBusqueda.php";
    //"/includes/src/process/procesarBusqueda.php"
    return <<<EOS
    <div class= "contenedor de busqueda">
        <form method="get" action="$ruta" class="search-form">
            <div class="search-container">
            <input type="text" id="search-input" class="search-input" name="busqueda" placeholder="$itemname">
            <label for="search-input" class="search-label">Buscar:</label>
            </div>
        
            <div class="filter-container">
                <label for="filter1">Filter 1:</label>
                <input type="text" id="filter1" name="filter1">
                <label for="filter2">Filter 2:</label>
                <input type="text" id="filter2" name="filter2">
                <span class="filter-item">Filter 3</span>
                <button type="submit">Search</button>
                <div class="filter-item clear-all-button" id="clear-all-filters">Clear All</div>
            </div>

        </form>
    </div>
   
  EOS;
}
?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var clearAllButton = document.getElementById('clear-all-filters');
    if (clearAllButton) {
        clearAllButton.addEventListener('click', function(event) {
            event.preventDefault(); // Previene la acción por defecto del botón
            var form = this.closest('form'); // Encuentra el formulario más cercano
            if (form) {
                var inputs = form.querySelectorAll('input[type="text"]'); // Selecciona todos los campos de texto
                inputs.forEach(function(input) {
                    input.value = ''; // Vacía el valor de cada campo de texto
                });
            }
        });
    }
});
</script>