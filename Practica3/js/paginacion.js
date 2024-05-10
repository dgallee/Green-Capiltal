document.addEventListener('DOMContentLoaded', (event) => {
    const itemsPorPagina = 9;
    let paginaActual = window.location.search.split('pagina=')[1] || 1;
    let numeroDePaginas = Math.ceil(document.querySelectorAll('.producto').length / itemsPorPagina);
    let inicio = (paginaActual - 1) * itemsPorPagina;

    function mostrarProductos() {
        let productos = Array.from(document.querySelectorAll('.producto'));
        productos.forEach((producto, index) => {
            producto.style.display = (index >= inicio && index < (inicio + itemsPorPagina)) ? 'block' : 'none';
        });
    }
    mostrarProductos();
});
