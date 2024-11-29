<?php

abstract class Persona
{
    // Atributos comunes
    protected string $nombre;
    protected string $apellido1;
    protected string $apellido2;
    protected DateTime $fechaNacimiento;
    protected string $dni;
    protected string $direccion;
    protected array $telefonos; // Puede tener varios teléfonos
    protected string $sexo; // "M" o "F"

    // Contador de objetos creados
    private static int $contador = 0;

    // Constructor
    public function __construct(
        string $nombre,
        string $apellido1,
        string $apellido2,
        DateTime $fechaNacimiento,
        string $dni,
        string $direccion,
        array $telefonos,
        string $sexo
    ) {
        $this->nombre = $nombre;
        $this->apellido1 = $apellido1;
        $this->apellido2 = $apellido2;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->dni = $dni;
        $this->direccion = $direccion;
        $this->telefonos = $telefonos;
        $this->sexo = $sexo;
        self::$contador++;
    }

    // Métodos getters y setters
    public function getNombre(): string { return $this->nombre; }
    public function setNombre(string $nombre): void { $this->nombre = $nombre; }

    // Método abstracto trabajar
    abstract public function trabajar(): string;

    // Método generar al azar (genérico, puede ser sobreescrito por subclases)
    public static function generarAlAzar(): static {
        $nombres = ["Juan", "María", "Pedro", "Lucía"];
        $apellidos = ["Pérez", "López", "Martínez", "García"];
        $nombre = $nombres[array_rand($nombres)];
        $apellido1 = $apellidos[array_rand($apellidos)];
        $apellido2 = $apellidos[array_rand($apellidos)];
        $fechaNacimiento = new DateTime(sprintf("%04d-%02d-%02d", rand(1970, 2010), rand(1, 12), rand(1, 28)));
        $dni = sprintf("%08d%c", rand(10000000, 99999999), chr(rand(65, 90)));
        $direccion = "Calle Falsa " . rand(1, 100);
        $telefonos = [sprintf("%09d", rand(600000000, 699999999))];
        $sexo = rand(0, 1) ? "M" : "F";
        return new static($nombre, $apellido1, $apellido2, $fechaNacimiento, $dni, $direccion, $telefonos, $sexo);
    }

    // Método para obtener el número de objetos creados
    public static function numeroObjetosCreado(): int {
        return self::$contador;
    }

    // Método __toString
    public function __toString(): string {
        return "{$this->nombre} {$this->apellido1} {$this->apellido2}, {$this->dni}";
    }
}

// Subclases específicas
class Administrativo extends Persona
{
    private int $aniosServicio;

    public function __construct(...$args, int $aniosServicio) {
        parent::__construct(...$args);
        $this->aniosServicio = $aniosServicio;
    }

    public function trabajar(): string {
        return "Soy un administrativo y gestiono tareas administrativas.";
    }

    public function __toString(): string {
        return parent::__toString() . ", Administrativo, {$this->aniosServicio} años de servicio.";
    }
}

class Conserje extends Persona
{
    private int $aniosServicio;

    public function __construct(...$args, int $aniosServicio) {
        parent::__construct(...$args);
        $this->aniosServicio = $aniosServicio;
    }

    public function trabajar(): string {
        return "Soy un conserje y realizo labores de mantenimiento.";
    }

    public function __toString(): string {
        return parent::__toString() . ", Conserje, {$this->aniosServicio} años de servicio.";
    }
}

// Se pueden continuar de manera similar para PersonalLimpieza, Profesorado, AlumnadoESO, etc.
// Cada uno agregará sus atributos específicos, implementará `trabajar` y sobrescribirá `__toString`.

// Ejemplo de uso:
$persona = Administrativo::generarAlAzar();
echo $persona->trabajar() . PHP_EOL;
echo $persona . PHP_EOL;
echo "Número de objetos creados: " . Persona::numeroObjetosCreado() . PHP_EOL;