$(document).ready(function () {
    $("#productomal").hide();
    $("#usuariomal").hide();
    $("#extension_img").hide();
    $("#dnimal").hide();

    

    $("#nombre_producto").change(function () {
        // Obtener el valor del campo de usuario
        var nombre_producto = $("#nombre_producto").val();

        // Realizar la validación básica del nombre de usuario
        if (nombre_producto.trim() === "") {
            // Si el campo está vacío, no hacer nada
            return;
        } else if (!/^[a-zA-Z0-9]+$/.test(nombre_producto)) {
            // Si el campo contiene caracteres no permitidos, mostrar un mensaje de error
            $("#productomal").show();
            alert("El nombre de usuario solo puede contener letras y números.");
            return;
        } else {
            // Si la validación pasa, enviar la solicitud AJAX para verificar el nombre de usuario
            var url = "includes/src/productos/verificar_producto.php?user=" + nombre_producto;
           

            // Realizar la solicitud GET utilizando $.get()
            $.get(url, function (data, status) {
                // Función de callback que maneja la respuesta del servidor
                data = data.trim(); // Eliminar espacios en blanco y saltos de línea

                

                if (status === "success") {
                    if (data.toLowerCase() === "producto ya registrado") {
                        
                        $("#productomal").show();
                        $("#nombre_producto").focus();
                        alert("El producto ya existe. Por favor, escoge otro nombre de producto.");
                        $("#nombre_producto").val("");
                        
                    } else if (data.toLowerCase() === "producto no registrado") {
                        
                        
                        $("#productomal").hide();
                        
                    }
                } else {
                    alert("Error al procesar la solicitud. Por favor, intenta de nuevo más tarde.");
                }
            });
        }

    });

    $("#dni").change(function () {
        // Obtener el valor del campo de usuario
        var dni = $("#dni").val();

        // Realizar la validación básica del nombre de usuario
        if (dni.trim() === "") {
            // Si el campo está vacío, no hacer nada
            return;
        
        } else {
            // Si la validación pasa, enviar la solicitud AJAX para verificar el nombre de usuario
            var url = "includes/src/usuarios/verificar_dni.php?dni=" + dni;
           

            // Realizar la solicitud GET utilizando $.get()
            $.get(url, function (data, status) {
                // Función de callback que maneja la respuesta del servidor
                data = data.trim(); // Eliminar espacios en blanco y saltos de línea

                

                if (status === "success") {
                    if (data.toLowerCase() === "dni ya registrado") {
                        
                        $("#dnimal").show();
                        $("#dni").focus();
                        alert("El dni ya existe.");
                        $("#dni").val("");
                        
                    } else if (data.toLowerCase() === "dni no registrado") {
                        
                        
                        $("#productomal").hide();
                        
                    }
                } else {
                    alert("Error al procesar la solicitud. Por favor, intenta de nuevo más tarde.");
                }
            });
        }

    });

    $("#username").change(function () {
        // Obtener el valor del campo de usuario
        var username = $("#username").val();

        // Realizar la validación básica del nombre de usuario
        if (username.trim() === "") {
            // Si el campo está vacío, no hacer nada
            return;
        } else if (!/^[a-zA-Z0-9]+$/.test(username)) {
            // Si el campo contiene caracteres no permitidos, mostrar un mensaje de error
            $("#usuariomal").show();
            alert("El nombre de usuario solo puede contener letras y números.");
            return;
        } else {
            // Si la validación pasa, enviar la solicitud AJAX para verificar el nombre de usuario
            var url = "includes/src/usuarios/verificar_usuarios.php?user=" + username;
           

            
            //Falta tm lo de verificar si una imagen es png o jpg

            // Realizar la solicitud GET utilizando $.get()
            $.get(url, function (data, status) {
                // Función de callback que maneja la respuesta del servidor
                data = data.trim(); // Eliminar espacios en blanco y saltos de línea

                

                if (status === "success") {
                    if (data.toLowerCase() === "nombre ya registrado") {
                        
                        
                        $("#usuariomal").show();
                        $("#username").focus();
                        alert("El usuario ya existe. Por favor, escoge otro nombre de usuario.");
                        $("#username").val("");
                        
                    } else if (data.toLowerCase() === "nombre no registrado") {
                        
                        $("#usuariomal").hide();
                        
                    }
                } else {
                    alert("Error al procesar la solicitud. Por favor, intenta de nuevo más tarde.");
                }
            });
        }

    });



    $("#imagen").change(function(){
        const campo = $("#imagen"); // referencia jQuery al campo
        campo[0].setCustomValidity(""); // limpia validaciones previas
    
        // Obtén el nombre del archivo desde el valor del campo de entrada
        const nombreArchivo = campo.val();
    
        // Validación de la extensión del archivo
        const esExtensionValida = validarExtensionArchivo(nombreArchivo);
        if (esExtensionValida) {
            // La extensión del archivo es válida: marca y limpia las quejas
            $("#extension_img").hide();
            
            campo[0].setCustomValidity("");
        } else {			
            // Extensión de archivo no válida: marca y nos quejamos
            $("#extension_img").show();
            campo.val("");
            
            campo[0].setCustomValidity("El archivo debe tener una extensión válida");
        }
    });
    
    function validarExtensionArchivo(nombreArchivo) {
        // Obtén la extensión del archivo
        const extension = obtenerExtension(nombreArchivo);
    
        // Lista de extensiones válidas
        const extensionesValidas = ["jpg", "png"];
    
        // Comprueba si la extensión del archivo está en la lista de extensiones válidas
        return extensionesValidas.includes(extension.toLowerCase());
    }
    
    function obtenerExtension(nombreArchivo) {
        // Divide el nombre del archivo en partes usando el punto como delimitador y toma la última parte como la extensión
        const partes = nombreArchivo.split(".");
        return partes[partes.length - 1];
    }
    


});






