<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Iniciar Sesión</title>
</head>
<body>
    <main>
        <form action="procesarRegistro.php" method="post">
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
            <div>
                <label for="dni">DNI:</label>
                <input type="text" name="dni" id="dni">
            </div>
            <div>
                <label for="username">Usuario:</label>
                <input type="text" name="username" id="username">
            </div>
            <div>
                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password">
            </div>
            <button type="submit">Ingresar</button>
        </form>
    </main>
</body>
</html>
