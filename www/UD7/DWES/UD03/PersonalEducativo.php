<?php

/**
 * ============================================================
 * CLASE ABSTRACTA BASE: Persona
 * ============================================================
 */
abstract class Persona
{
    protected string $nombre;
    protected string $apellidos;
    protected string $dni;
    protected string $direccion;
    protected \DateTime $fechaNacimiento;

    // Contador global para todas las personas
    protected static int $contadorGeneral = 0;

    public function __construct(
        string $nombre,
        string $apellidos,
        string $dni,
        string $direccion,
        \DateTime $fechaNacimiento
    ) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->dni = $dni;
        $this->direccion = $direccion;
        $this->fechaNacimiento = $fechaNacimiento;

        self::$contadorGeneral++;
    }

    abstract public function trabajar(): string;

    public static function getTotalPersonas(): int
    {
        return self::$contadorGeneral;
    }

    public function __toString(): string
    {
        return "{$this->nombre} {$this->apellidos} - DNI: {$this->dni}";
    }

    // --- MÉTODOS AUXILIARES ESTÁTICOS ---

    protected static function generarNombre(): string
    {
        $nombres = ["Ana", "Luis", "Carlos", "Marta", "Lucía", "Pedro"];
        return $nombres[array_rand($nombres)];
    }

    protected static function generarApellidos(): string
    {
        $apellidos = ["García", "López", "Martínez", "Sánchez", "Fernández"];
        return $apellidos[array_rand($apellidos)];
    }

    protected static function generarDni(): string
    {
        return rand(10000000, 99999999) . chr(rand(65, 90));
    }

    protected static function generarDireccion(): string
    {
        return "Calle " . rand(1, 100);
    }

    protected static function generarFecha(int $anioMin, int $anioMax): \DateTime
    {
        return new \DateTime(rand($anioMin, $anioMax) . "-01-01");
    }
}

/**
 * ============================================================
 * CLASE ABSTRACTA: PersonalEmpleado
 * ============================================================
 */
abstract class PersonalEmpleado extends Persona
{
    protected int $aniosServicio;

    public function __construct(
        string $nombre,
        string $apellidos,
        string $dni,
        string $direccion,
        \DateTime $fechaNacimiento,
        int $aniosServicio
    ) {
        parent::__construct($nombre, $apellidos, $dni, $direccion, $fechaNacimiento);
        $this->aniosServicio = $aniosServicio;
    }
}

/**
 * ============================================================
 * CLASE Administrativo
 * ============================================================
 */
class Administrativo extends PersonalEmpleado
{
    protected static int $contadorAdmin = 0;

    public function __construct(
        string $nombre,
        string $apellidos,
        string $dni,
        string $direccion,
        \DateTime $fechaNacimiento,
        int $aniosServicio
    ) {
        parent::__construct($nombre, $apellidos, $dni, $direccion, $fechaNacimiento, $aniosServicio);
        self::$contadorAdmin++;
    }

    public function trabajar(): string
    {
        return "Soy administrativo y gestiono documentación.";
    }

    public static function numeroObjetosCreado(): int
    {
        return self::$contadorAdmin;
    }

    public static function generarAlAzar(): Administrativo
    {
        return new Administrativo(
            self::generarNombre(),
            self::generarApellidos(),
            self::generarDni(),
            self::generarDireccion(),
            self::generarFecha(1965, 1995),
            rand(1, 30)
        );
    }
}

/**
 * ============================================================
 * CLASE Profesor
 * ============================================================
 */
class Profesor extends PersonalEmpleado
{
    protected static int $contadorProf = 0;
    private string $especialidad;

    public function __construct(
        string $nombre,
        string $apellidos,
        string $dni,
        string $direccion,
        \DateTime $fechaNacimiento,
        int $aniosServicio,
        string $especialidad
    ) {
        parent::__construct($nombre, $apellidos, $dni, $direccion, $fechaNacimiento, $aniosServicio);
        $this->especialidad = $especialidad;
        self::$contadorProf++;
    }

    public function trabajar(): string
    {
        return "Soy profesor de {$this->especialidad} e imparto clase.";
    }

    public static function numeroObjetosCreado(): int
    {
        return self::$contadorProf;
    }

    public static function generarAlAzar(): Profesor
    {
        $especialidades = ["Matemáticas", "Historia", "Informática", "Lengua"];
        return new Profesor(
            self::generarNombre(),
            self::generarApellidos(),
            self::generarDni(),
            self::generarDireccion(),
            self::generarFecha(1960, 1995),
            rand(1, 35),
            $especialidades[array_rand($especialidades)]
        );
    }
}

/**
 * ============================================================
 * CLASE ABSTRACTA: Alumnado
 * ============================================================
 */
abstract class Alumnado extends Persona
{
    protected string $curso;

    public function __construct(
        string $nombre,
        string $apellidos,
        string $dni,
        string $direccion,
        \DateTime $fechaNacimiento,
        string $curso
    ) {
        parent::__construct($nombre, $apellidos, $dni, $direccion, $fechaNacimiento);
        $this->curso = $curso;
    }
}

/**
 * ============================================================
 * CLASE AlumnadoESO
 * ============================================================
 */
class AlumnadoESO extends Alumnado
{
    protected static int $contadorESO = 0;

    public function __construct(
        string $nombre,
        string $apellidos,
        string $dni,
        string $direccion,
        \DateTime $fechaNacimiento,
        string $curso
    ) {
        parent::__construct($nombre, $apellidos, $dni, $direccion, $fechaNacimiento, $curso);
        self::$contadorESO++;
    }

    public function trabajar(): string
    {
        return "Soy alumno de ESO y estudio para un examen.";
    }

    public static function numeroObjetosCreado(): int
    {
        return self::$contadorESO;
    }

    public static function generarAlAzar(): AlumnadoESO
    {
        return new AlumnadoESO(
            self::generarNombre(),
            self::generarApellidos(),
            self::generarDni(),
            self::generarDireccion(),
            self::generarFecha(2008, 2012),
            "ESO " . rand(1, 4)
        );
    }
}

/**
 * ============================================================
 * ACTIVIDAD 2
 * ============================================================
 */

$personas = [];

$tipos = [
    Administrativo::class,
    Profesor::class,
    AlumnadoESO::class
];

// Crear 100 objetos aleatorios usando polimorfismo
for ($i = 0; $i < 100; $i++) {
    $clase = $tipos[array_rand($tipos)];
    $personas[] = $clase::generarAlAzar();
}

// Mostrar qué está haciendo cada uno
foreach ($personas as $persona) {
    echo $persona->trabajar() . "<br>";
}

// Mostrar número de objetos creados SIN contadores externos
echo "<hr>";
echo "Administrativos creados: " . Administrativo::numeroObjetosCreado() . "<br>";
echo "Profesores creados: " . Profesor::numeroObjetosCreado() . "<br>";
echo "Alumnos ESO creados: " . AlumnadoESO::numeroObjetosCreado() . "<br>";
