<?php 

public static function generarAlAzar() {
    // Datos básicos comunes
    $nombres = ['Juan', 'María', 'Pedro', 'Ana', 'Carlos', 'Laura'];
    $apellidos = ['Pérez', 'González', 'Rodríguez', 'López', 'Martínez', 'Sánchez'];
    $cargos = ['ninguno', 'dirección', 'secretariado', 'jefatura estudios diurno', 'jefatura estudios personas adultas', 'vicedirección'];
    $materias = ['Matemáticas', 'Lengua', 'Física', 'Química', 'Historia', 'Inglés'];

    $sexo = rand(0, 1) == 0 ? 'masculino' : 'femenino';
    $nombre = $nombres[array_rand($nombres)];
    $apellido1 = $apellidos[array_rand($apellidos)];
    $apellido2 = $apellidos[array_rand($apellidos)];
    $dni = strtoupper(substr(md5(rand()), 0, 8)); // Generar un DNI ficticio
    $telefono = '+34 ' . rand(600000000, 699999999); // Teléfono ficticio
    $direccion = 'Calle ' . $apellidos[array_rand($apellidos)] . ' ' . rand(1, 100) . ', Madrid'; // Dirección ficticia
    $fechaNacimiento = date('Y-m-d', strtotime('-' . rand(18, 60) . ' years')); // Fecha de nacimiento aleatoria (18-60 años)
    
    // Crear objeto de la clase correspondiente
    $objeto = new static($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefono, $sexo);

    // Asignar atributos específicos según la clase
    if ($objeto instanceof Administrativo || $objeto instanceof Conserje || $objeto instanceof PersonalLimpieza || $objeto instanceof Profesor) {
        $objeto->añosServicio = rand(1, 40); // Años de servicio aleatorios
    }

    if ($objeto instanceof Profesor) {
        $objeto->materias = [ $materias[array_rand($materias)], $materias[array_rand($materias)] ]; // Dos materias aleatorias
        $objeto->cargoDirectivo = $cargos[array_rand($cargos)]; // Cargo directivo aleatorio
    }

    if ($objeto instanceof AlumnoESO || $objeto instanceof AlumnoBachillerato) {
        $objeto->curso = rand(1, 4); // Curso aleatorio (1-4)
        $objeto->grupo = chr(rand(65, 90)); // Grupo aleatorio (letras A-Z)
    }

    if ($objeto instanceof AlumnoFP) {
        $objeto->cicloFormativo = 'Ciclo ' . rand(1, 3); // Ciclo formativo aleatorio
        $objeto->curso = rand(1, 2); // Curso aleatorio (1-2)
        $objeto->grupo = chr(rand(65, 90)); // Grupo aleatorio (letras A-Z)
    }

    return $objeto;
}?>