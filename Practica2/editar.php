<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Iniciar Sesión</title>
</head>
<body>

<?php
    require_once 'includes/config.php';
    require_once 'includes/vistas/helpers/autorizacion.php';
    require_once 'usuarioDAO.php';

    $user = $_GET['user'];
    $userEdit = Usuario::search($user);

    if($userEdit){
        echo "Nombre: " . $userEdit->getUName() . "<br>";
        echo "Apellidos: " . $userEdit->getUSurname() . "<br>";
        echo "Correo: " . $userEdit->getUEmail() . "<br>";
        echo "Dirección: " . $userEdit->getUDir() . "<br>";
        echo "Teléfono: " . $userEdit->getUTel() . "<br>";
        echo "DNI: " . $userEdit->getuDNI() . "<br>";
        echo "Usuario: " . $userEdit->getUUser() . "<br>";
        echo "Contraseña: " . $userEdit->getUPass() . "<br>";
        echo "Tipo: " . $userEdit->getUTipo() . "<br>";
    } else {
        echo "El usuario no existe.";
    }
?>


    <main>
       <form action="procesarEditar.php" method="post">
            <h1>Registro</h1>
            <div>
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre">
            </div>
            <div>
                <label for="apellidos">Apellidos:</label>
                <input type="text" name="apellidos" id="apellidos">
            </div>
            <div>
                <label for="correo">Correo:</label>
                <input type="email" name="correo" id="correo">
            </div>
            <div>
                <label for="direccion">Dirección:</label>
                <input type="text" name="direccion" id="direccion">
            </div>
            <div>
                <label for="telefono">Teléfono:</label>
                <input type="number" name="telefono" id="telefono">
            </div>

            <input type="hidden" name="dni" value="<?php echo $userEdit->getuDNI(); ?>">

            <div>
                <label for="username">Usuario:</label>
                <input type="text" name="username" id="username">
            </div>
            <div>
                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password">
            </div>
            <div>
                <label for="type">Tipo:</label>
                <input type="number" name="type" id="type">
            </div>

            <input type="hidden" name="oldUser" value="<?php echo $user; ?>">
            
            <button type="submit">Ingresar</button>
        </form>
    </main>
</body>
</html>

