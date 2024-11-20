<?php

$host = 'localhost';
$dbname = 'proyecto';
$username = 'gestor';
$password = 'secreto';

try {

    $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
    $pdo = new PDO($dsn, $username, $password);

    //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}


/*listado.php. Mostrará en una tabla los datos código y nombre y los botones para crear un nuevo registro, 
actualizar uno existente, borrarlo o ver todos sus detalles. 

crear.php. Será un formulario para rellenar todos los campos de productos (a excepción del id). Para la familia nos aparecerá 
un "select" con los nombre de las familias de los productos para elegir uno (lógicamente aunque mostremos los nombres pro formulario enviaremos el código). Ver imagen.


detalle.php. Mostrará todo los detalles del producto seleccionado.


update.php. Nos aparecerá un formulario con los campos rellenos con los valores del producto seleccionado desde 
"listado.php" incluido el select donde seleccionamos la familia


borrar.php. Será una página php con el código necesario para borrar el producto seleccionado desde "listado.php"
 un mensaje de información y un botón volver para volver a "listado.php".


Para acceder a la base de datos se debe usar PDO. Controlaremos y mostraremos los posible errores. Para los estilos 
se recomienda usar Bootstrap.

Pasaremos el código de producto por "get" tanto para "detalle.php" como para "update.php". Utilizando en el enlace
 "detalle.php?id=cod" .En ambas páginas comprobaremos que esta variable existe, si no redireccionaremos a 
 "listado.php" para esto podemos usar "header('Location:listado.php')"



 Para no repetir el código de la conexión a la base de datos en cada archivo, se recomienda crear el archivo conexion.php
  y utilizar require o require_once cada vez que lo necesitamos.
Para borrar un producto, crea un formulario con el action apuntando a "borrar.php" y pasa por un campo oculto el código 
del producto a borrar.
Recuerda que en el "option" del HTML "<option value="v">Nombre</option>",  "v" es el valor que pasamos, "Nombre" es lo 
que mostramos en la lista desplegable.*/