<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- El titulo puede ser definido en cada pagina -->
    <title><?= isset($pageTitle) ? $pageTitle : 'Tienda' ?></title>
    <!-- Importamos Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
          crossorigin="anonymous"
    >
</head>

<!-- Creamos el layout general para que en cada pagina solo haya que definir el contenido -->
<body class="p-3 text-info-emphasis bg-info-subtle border border-primary-subtle rounded-3">
<div class="container">
    <div class="row my-4 text-center">
        <div class="col">
            <h2><?= isset($pageTitle) ? $pageTitle : 'Tienda' ?></h2>
        </div>
    </div>