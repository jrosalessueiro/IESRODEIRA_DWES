<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AGENDA - DWES</title>
    <link rel="stylesheet" href="styles2.css">
</head>
<body>
    <header>
        <h1>Agenda</h1>
        
    </header>
    
    <main>
        <form action="#" method="post">
            <fieldset>
                <legend>Datos Agenda</legend>
               
            </fieldset>

            <fieldset>
                <legend>Nuevo Contacto</legend>
                <label for="name">Nombre:</label>
                <input type="name" id="name" name="name" required><br>
                <label for="telefono">Teléfono:</label>
                <input type="tel" id="telefono" name="telefono" required><br>

                <button type="submit">Añadir Contacto</button>
                <button type="submit">Limpiar Campos</button>
            </fieldset>

            <fieldset>
                <legend>Vaciar Agenda</legend>
                <button type="submit">Vaciar</button>
            </fieldset>

        </form>
    </main>

    <footer>
        <p>© 2024 Ciclo de DAW. Todos los derechos reservados.</p>
    </footer>
</body>
</html>