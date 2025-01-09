<?php

// Clase abstracta Persona
abstract class Persona {
    protected string $nombre;
    protected string $apellido1;
    protected string $apellido2;
    protected string $fechaNacimiento;
    protected string $dni;
    protected string $direccion;
    protected array $telefonos;
    protected string $sexo;
    protected static int $contadorPersonas = 0;

    public function __construct(string $nombre, string $apellido1, string $apellido2, string $fechaNacimiento, string $dni, string $direccion, array $telefonos, string $sexo) {
        $this->nombre = $nombre;
        $this->apellido1 = $apellido1;
        $this->apellido2 = $apellido2;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->dni = $dni;
        $this->direccion = $direccion;
        $this->telefonos = $telefonos;
        $this->sexo = $sexo;
        self::$contadorPersonas++;
    }

    // Método para generar los atributos comunes aleatorios
    public static function generarComunesAlAzar(): array {
        $nombres = ["Carlos", "María", "José", "Ana", "Luis"];
        $apellidos = ["González", "Martínez", "Lopez", "Rodríguez", "Pérez"];
        $dni = strtoupper(substr(md5(uniqid(rand(), true)), 0, 8));
        $telefono = ["630123456", "635678901"];
        $direccion = "Calle " . ucfirst(strtolower($nombres[array_rand($nombres)])) . ", Nº " . rand(1, 100);
        $sexo = rand(0, 1) == 0 ? "masculino" : "femenino";
        $nombre = $nombres[array_rand($nombres)];
        $apellido1 = $apellidos[array_rand($apellidos)];
        $apellido2 = $apellidos[array_rand($apellidos)];
        $fechaNacimiento = rand(1, 12) . "-" . rand(1, 28) . "-19" . rand(30, 50);

        return [$nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefono, $sexo];
    }

    // Método abstracto para generar objetos aleatorios
    abstract public static function generarAlAzar(): Persona;
    
    // Método abstracto para devolver el número de objetos creados
    abstract public static function numeroObjetosCreados(): int;

    // Método que muestra todos los atributos de la clase Persona
    public function __toString(): string {
        return "Nombre: $this->nombre $this->apellido1 $this->apellido2, Fecha de nacimiento: $this->fechaNacimiento, DNI: $this->dni, Dirección: $this->direccion, Teléfonos: " . implode(", ", $this->telefonos) . ", Sexo: $this->sexo";
    }

    // Método abstracto para describir lo que hace la persona
    abstract public function trabajar(): string;

    // Método estático para obtener el número de personas creadas
    public static function numeroObjetosCreado(): int {
        return self::$contadorPersonas;
    }
}

// Clase Administrativo
class Administrativo extends Persona {
    private int $añosServicio;
    private static int $contadorAdministrativos = 0;

    public function __construct(string $nombre, string $apellido1, string $apellido2, string $fechaNacimiento, string $dni, string $direccion, array $telefonos, string $sexo, int $añosServicio) {
        parent::__construct($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefonos, $sexo);
        $this->añosServicio = $añosServicio;
        self::$contadorAdministrativos++;
    }

    public static function generarAlAzar(): Administrativo {
        // Usamos el método generarComunesAlAzar() para obtener los atributos comunes
        list($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefonos, $sexo) = Persona::generarComunesAlAzar();
        $añosServicio = rand(1, 30); // Atributo específico de Administrativo

        return new Administrativo($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefonos, $sexo, $añosServicio);
    }

    public static function numeroObjetosCreados(): int {
        return self::$contadorAdministrativos;
    }

    public function __toString(): string {
        return parent::__toString() . ", Años de servicio: $this->añosServicio";
    }

    public function trabajar(): string {
        return "Soy un administrativo y estoy gestionando tareas administrativas.";
    }
}

// Clase Conserje
class Conserje extends Persona {
    private int $añosServicio;
    private static int $contadorConserjes = 0;

    public function __construct(string $nombre, string $apellido1, string $apellido2, string $fechaNacimiento, string $dni, string $direccion, array $telefonos, string $sexo, int $añosServicio) {
        parent::__construct($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefonos, $sexo);
        $this->añosServicio = $añosServicio;
        self::$contadorConserjes++;
    }

    public static function generarAlAzar(): Conserje {
        // Usamos el método generarComunesAlAzar() para obtener los atributos comunes
        list($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefonos, $sexo) = Persona::generarComunesAlAzar();
        $añosServicio = rand(1, 30); // Atributo específico de Conserje

        return new Conserje($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefonos, $sexo, $añosServicio);
    }

    public static function numeroObjetosCreados(): int {
        return self::$contadorConserjes;
    }

    public function __toString(): string {
        return parent::__toString() . ", Años de servicio: $this->añosServicio";
    }

    public function trabajar(): string {
        return "Soy un conserje y estoy encargándome de las tareas de mantenimiento y vigilancia del instituto.";
    }
}

// Clase Personal de limpieza
class PersonalLimpieza extends Persona {
    private int $añosServicio;
    private static int $contadorPersonalLimpieza = 0;

    public function __construct(string $nombre, string $apellido1, string $apellido2, string $fechaNacimiento, string $dni, string $direccion, array $telefonos, string $sexo, int $añosServicio) {
        parent::__construct($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefonos, $sexo);
        $this->añosServicio = $añosServicio;
        self::$contadorPersonalLimpieza++;
    }

    public static function generarAlAzar(): PersonalLimpieza {
        // Usamos el método generarComunesAlAzar() para obtener los atributos comunes
        list($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefonos, $sexo) = Persona::generarComunesAlAzar();
        $añosServicio = rand(1, 30); // Atributo específico de PersonalLimpieza

        return new PersonalLimpieza($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefonos, $sexo, $añosServicio);
    }

    public static function numeroObjetosCreados(): int {
        return self::$contadorPersonalLimpieza;
    }

    public function __toString(): string {
        return parent::__toString() . ", Años de servicio: $this->añosServicio";
    }

    public function trabajar(): string {
        return "Soy personal de limpieza y estoy encargándome de mantener las instalaciones limpias.";
    }
}

// Clase Profesor
class Profesor extends Persona {
    private int $añosServicio;
    private string $materias;
    private string $cargoDirectivo;
    private static int $contadorProfesores = 0;

    public function __construct(string $nombre, string $apellido1, string $apellido2, string $fechaNacimiento, string $dni, string $direccion, array $telefonos, string $sexo, int $añosServicio, string $materias, string $cargoDirectivo) {
        parent::__construct($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefonos, $sexo);
        $this->añosServicio = $añosServicio;
        $this->materias = $materias;
        $this->cargoDirectivo = $cargoDirectivo;
        self::$contadorProfesores++;
    }

    public static function generarAlAzar(): Profesor {
        // Usamos el método generarComunesAlAzar() para obtener los atributos comunes
        list($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefonos, $sexo) = Persona::generarComunesAlAzar();
        $añosServicio = rand(1, 30); // Atributo específico de Profesor
        $materias = "Matemáticas"; // Materias de ejemplo
        $cargoDirectivo = rand(0, 1) == 0 ? "Profesor" : "Jefe de departamento"; // Cargo de ejemplo

        return new Profesor($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefonos, $sexo, $añosServicio, $materias, $cargoDirectivo);
    }

    public static function numeroObjetosCreados(): int {
        return self::$contadorProfesores;
    }

    public function __toString(): string {
        return parent::__toString() . ", Años de servicio: $this->añosServicio, Materias: $this->materias, Cargo Directivo: $this->cargoDirectivo";
    }

    public function trabajar(): string {
        return "Soy profesor y estoy dando clases de $this->materias.";
    }
}

// Clase AlumnoESO
class AlumnoESO extends Persona {
    private int $curso;
    private float $notaMedia;
    private static int $contadorAlumnosESO = 0;

    public function __construct(string $nombre, string $apellido1, string $apellido2, string $fechaNacimiento, string $dni, string $direccion, array $telefonos, string $sexo, int $curso, float $notaMedia) {
        parent::__construct($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefonos, $sexo);
        $this->curso = $curso;
        $this->notaMedia = $notaMedia;
        self::$contadorAlumnosESO++;
    }

    public static function generarAlAzar(): AlumnoESO {
        list($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefonos, $sexo) = Persona::generarComunesAlAzar();
        $curso = rand(1, 4); // Curso de ESO
        $notaMedia = rand(5, 10) + (rand(0, 9) / 10); // Nota media entre 5.0 y 10.0

        return new AlumnoESO($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefonos, $sexo, $curso, $notaMedia);
    }

    public static function numeroObjetosCreados(): int {
        return self::$contadorAlumnosESO;
    }

    public function __toString(): string {
        return parent::__toString() . ", Curso: $this->curso, Nota media: $this->notaMedia";
    }

    public function trabajar(): string {
        return "Soy un alumno de ESO y estoy estudiando mis materias.";
    }
}

// Clase AlumnoBachillerato
class AlumnoBachillerato extends Persona {
    private array $materias;
    private static int $contadorAlumnosBachillerato = 0;

    public function __construct(string $nombre, string $apellido1, string $apellido2, string $fechaNacimiento, string $dni, string $direccion, array $telefonos, string $sexo, array $materias) {
        parent::__construct($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefonos, $sexo);
        $this->materias = $materias;
        self::$contadorAlumnosBachillerato++;
    }

    public static function generarAlAzar(): AlumnoBachillerato {
        list($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefonos, $sexo) = Persona::generarComunesAlAzar();
        $materias = ["Matemáticas", "Lengua", "Inglés", "Física", "Química"]; // Materias típicas de Bachillerato

        return new AlumnoBachillerato($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefonos, $sexo, $materias);
    }

    public static function numeroObjetosCreados(): int {
        return self::$contadorAlumnosBachillerato;
    }

    public function trabajar(): string {
        return "Soy un alumno de Bachillerato y estoy estudiando mis materias.";
    }
}

// Clase AlumnoFP
class AlumnoFP extends Persona {
    private string $cicloFormativo;
    private int $curso;
    private string $grupo;
    private static int $contadorAlumnosFP = 0;

    public function __construct(string $nombre, string $apellido1, string $apellido2, string $fechaNacimiento, string $dni, string $direccion, array $telefonos, string $sexo, string $cicloFormativo, int $curso, string $grupo) {
        parent::__construct($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefonos, $sexo);
        $this->cicloFormativo = $cicloFormativo;
        $this->curso = $curso;
        $this->grupo = $grupo;
        self::$contadorAlumnosFP++;
    }

    public static function generarAlAzar(): AlumnoFP {
        list($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefonos, $sexo) = Persona::generarComunesAlAzar();
        $cicloFormativo = "Ciclo de " . ["Informática", "Administración", "Salud", "Electricidad"][rand(0, 3)];
        $curso = rand(1, 2); // Curso de FP
        $grupo = "Grupo " . chr(rand(65, 90)); // Un grupo aleatorio (A, B, C...)

        return new AlumnoFP($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefonos, $sexo, $cicloFormativo, $curso, $grupo);
    }

    public static function numeroObjetosCreados(): int {
        return self::$contadorAlumnosFP;
    }

    public function __toString(): string {
        return parent::__toString() . ", Ciclo Formativo: $this->cicloFormativo, Curso: $this->curso, Grupo: $this->grupo";
    }

    public function trabajar(): string {
        return "Soy un alumno de Formación Profesional y estoy estudiando el ciclo de $this->cicloFormativo en el grupo $this->grupo.";
    }
}

// Generar 100 objetos aleatorios de diferentes tipos de Persona
$personasGeneradas = [];
$tiposDePersona = [Administrativo::class, Conserje::class, PersonalLimpieza::class, Profesor::class, AlumnoESO::class, AlumnoBachillerato::class, AlumnoFP::class];

for ($i = 0; $i < 100; $i++) {
    $tipo = $tiposDePersona[array_rand($tiposDePersona)];
    $persona = $tipo::generarAlAzar();
    $personasGeneradas[] = $persona;

    // Invocar el método trabajar() de cada objeto generado
    echo $persona->trabajar() . "\n";
}

// Contar el número de objetos creados de cada tipo
echo "Número de Administrativos: " . Administrativo::numeroObjetosCreados() . "\n";
echo "Número de Conserjes: " . Conserje::numeroObjetosCreados() . "\n";
echo "Número de Personal de Limpieza: " . PersonalLimpieza::numeroObjetosCreados() . "\n";
echo "Número de Profesores: " . Profesor::numeroObjetosCreados() . "\n";
echo "Número de Alumnos ESO: " . AlumnoESO::numeroObjetosCreados() . "\n";
echo "Número de Alumnos Bachillerato: " . AlumnoBachillerato::numeroObjetosCreados() . "\n";
echo "Número de Alumnos FP: " . AlumnoFP::numeroObjetosCreados() . "\n";
?>