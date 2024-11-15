<?php
abstract class Persona
{
    protected string $nombre;
    protected string $apellido1;
    protected string $apellido2;
    protected string $fechaNacimiento;
    protected string $dni;
    protected string $direccion;
    protected array $telefonos;
    protected string $sexo;
    private int $contador = 0;

    public function __construct(
        string $nombre,
        string $apellido1,
        string $apellido2,
        string $fechaNacimiento,
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

    public function getNombre(): string
    {
        return $this->nombre;
    }
    public function getApellido1(): string
    {
        return $this->apellido1;
    }
    public function getApellido2(): string
    {
        return $this->apellido2;
    }
    public function getFechaNacimiento(): string
    {
        return $this->fechaNacimiento;
    }
    public function getDni(): string
    {
        return $this->dni;
    }
    public function getdireccion(): string
    {
        return $this->direccion;
    }
    public function getTelefonos(): array
    {
        return $this->telefonos;
    }
    public function getSexo(): string
    {
        return $this->sexo;
    }

    public function setNombre(string $nombre)
    {
        $this->nombre = $nombre;
    }
    public function setApellido1(string $apellido1): void
    {
        $this->apellido1 = $apellido1;
    }
    public function setApellido2(string $apellido2): void
    {
        $this->apellido2 = $apellido2;
    }
    public function setFechaNacimiento(string $fechaNacimiento): void
    {
        $this->fechaNacimiento = $fechaNacimiento;
    }
    public function setDni(string $dni): void
    {
        $this->dni = $dni;
    }
    public function setDireccion(string $direccion): void
    {
        $this->direccion = $direccion;
    }
    public function setSexo(string $sexo): void
    {
        $this->sexo = $sexo;
    }

    public static function  numeroObjetosCreado(): int
    {
        return self::$contador;
    }

    abstract public static function generarAlAzar(): self;

    public function __toString(): string
    {
        return "{$this->nombre} {$this->apellido1}{$this->apellido2}, nacido el {$this->fechaNacimiento}, DNI: {$this->dni}";
    }
}

class Administrativo extends Persona
{
    private int $aniosServicio;
    private static int $contador = 0;

    public function __construct(
        string $nombre,
        string $apellido1,
        string $apellido2,
        string $fechaNacimiento,
        string $dni,
        string $direccion,
        array $telefonos,
        string $sexo,
        int $aniosServicio
    ) {
        parent::__construct(
            $nombre,
            $apellido1,
            $apellido2,
            $fechaNacimiento,
            $dni,
            $direccion,
            $telefonos,
            $sexo
        );
        $this->aniosServicio = $aniosServicio;
        self::$contador++;
    }

    public function getAniosServicio(): int
    {
        return $this->aniosServicio;
    }

    public function setAniosServicio(int $aniosServicio): void
    {
        $this->aniosServicio = $aniosServicio;
    }

    public static function generarAlAzar(): self {
        $nombres = ["José", "Lucía", "María", "David", "Juan","Carlos", "Ana", "Pedro", "Laura", "Raúl"];
        $apellidos = ["Ramírez", "González", "López", "Martínez", "Pérez","Sánchez", "Rodríguez", "García", "Fernández", "Moreno"];
        $fechaNacimiento = date("Y-m-d", rand(strtotime("2000-01-01"), strtotime("2004-12-31")));
        $dni = rand(10000000, 99999999) . chr(rand(65, 90));
                $direcciones = ["Calle Mayor 5", "Calle de la Estrella 30", "Avenida de la Constitución 12","Calle del Sol 45",
         "Calle Luna 7", "Avenida de la Paz 9","Calle del Prado 3", "Calle del Río 21", "Plaza España 4", "Calle del Carmen 8"];
        $telefonos = [
            "634567890", "647890123", "612345678", "678901234","699123456", "634512345", "630987654", "675432109","631234567",
             "649876543"];
        $sexos = ["masculino", "femenino"];
        $sexo = $sexos[array_rand($sexos)];
        $aniosServicio = rand(1, 100);  

        return new self(
            $nombres[array_rand($nombres)],
            $apellidos[array_rand($apellidos)],
            $apellidos[array_rand($apellidos)],
            $fechaNacimiento,
            $dni,
            $direcciones[array_rand($direcciones)],
            [$telefonos[array_rand($telefonos)]],
            $sexo,
            $aniosServicio
        );
    }

    public function trabajar(): string
    {
        $pronombre = $this->sexo === "masculino" ? "Soy un administrativo" : "Soy una administrativa";
        return "$pronombre con {$this->aniosServicio} años de servicio.";
    }

    public static function numeroObjetosCreados(): int
    {
        return self::$contador;
    }

    public function __toString(): string
    {
        return parent::__toString() . ", con {$this->aniosServicio} años de servicio como administrativo.";
    }
}


class Conserje extends Persona
{
    private int $aniosServicio;
    private static int $contador = 0;

    public function __construct(
        string $nombre,
        string $apellido1,
        string $apellido2,
        string $fechaNacimiento,
        string $dni,
        string $direccion,
        array $telefonos,
        string $sexo,
        int $aniosServicio
    ) {
        parent::__construct(
            $nombre,
            $apellido1,
            $apellido2,
            $fechaNacimiento,
            $dni,
            $direccion,
            $telefonos,
            $sexo
        );
        $this->aniosServicio = $aniosServicio;
        self::$contador++;
    }

    public function getAniosServicio(): int
    {
        return $this->aniosServicio;
    }

    public function setAniosServicio(int $aniosServicio): void
    {
        $this->aniosServicio = $aniosServicio;
    }

    public static function generarAlAzar(): self {
        $nombres = ["José", "Lucía", "María", "David", "Juan","Carlos", "Ana", "Pedro", "Laura", "Raúl"];
        $apellidos = ["Ramírez", "González", "López", "Martínez", "Pérez","Sánchez", "Rodríguez", "García", "Fernández", "Moreno"];
        $fechaNacimiento = date("Y-m-d", rand(strtotime("2000-01-01"), strtotime("2004-12-31")));
        $dni = rand(10000000, 99999999) . chr(rand(65, 90));
                $direcciones = ["Calle Mayor 5", "Calle de la Estrella 30", "Avenida de la Constitución 12","Calle del Sol 45",
         "Calle Luna 7", "Avenida de la Paz 9","Calle del Prado 3", "Calle del Río 21", "Plaza España 4", "Calle del Carmen 8"];
        $telefonos = [
            "634567890", "647890123", "612345678", "678901234","699123456", "634512345", "630987654", "675432109","631234567",
             "649876543"];
        $sexos = ["masculino", "femenino"];
        $sexo = $sexos[array_rand($sexos)];
        $aniosServicio = rand(1, 100);  

        return new self(
            $nombres[array_rand($nombres)],
            $apellidos[array_rand($apellidos)],
            $apellidos[array_rand($apellidos)],
            $fechaNacimiento,
            $dni,
            $direcciones[array_rand($direcciones)],
            [$telefonos[array_rand($telefonos)]],
            $sexo,
            $aniosServicio
        );
    }


    public function trabajar(): string
    {
        $pronombre = $this->sexo === "masculino" ? "Soy un conserje" : "Soy una conserje";
        return "$pronombre con {$this->aniosServicio} años de servicio.";
    }

    public static function numeroObjetosCreados(): int
    {
        return self::$contador;
    }

    public function __toString(): string
    {
        return parent::__toString() . ", con {$this->aniosServicio} años de servicio como conserje.";
    }
}

class PersonalDeLimpieza extends Persona
{
    private int $aniosServicio;
    private static int $contador = 0;

    public function __construct(
        string $nombre,
        string $apellido1,
        string $apellido2,
        string $fechaNacimiento,
        string $dni,
        string $direccion,
        array $telefonos,
        string $sexo,
        int $aniosServicio
    ) {
        parent::__construct(
            $nombre,
            $apellido1,
            $apellido2,
            $fechaNacimiento,
            $dni,
            $direccion,
            $telefonos,
            $sexo
        );
        $this->aniosServicio = $aniosServicio;
        self::$contador++;
    }

    public function getAniosServicio(): int
    {
        return $this->aniosServicio;
    }

    public function setAniosServicio(int $aniosServicio): void
    {
        $this->aniosServicio = $aniosServicio;
    }

    public static function generarAlAzar(): self {
        $nombres = ["José", "Lucía", "María", "David", "Juan","Carlos", "Ana", "Pedro", "Laura", "Raúl"];
        $apellidos = ["Ramírez", "González", "López", "Martínez", "Pérez","Sánchez", "Rodríguez", "García", "Fernández", "Moreno"];
        $fechaNacimiento = date("Y-m-d", rand(strtotime("2000-01-01"), strtotime("2004-12-31")));
        $dni = rand(10000000, 99999999) . chr(rand(65, 90));
                $direcciones = ["Calle Mayor 5", "Calle de la Estrella 30", "Avenida de la Constitución 12","Calle del Sol 45",
         "Calle Luna 7", "Avenida de la Paz 9","Calle del Prado 3", "Calle del Río 21", "Plaza España 4", "Calle del Carmen 8"];
        $telefonos = [
            "634567890", "647890123", "612345678", "678901234","699123456", "634512345", "630987654", "675432109","631234567",
             "649876543"];
        $sexos = ["masculino", "femenino"];
        $sexo = $sexos[array_rand($sexos)];
        $aniosServicio = rand(1, 100); 

        return new self(
            $nombres[array_rand($nombres)],
            $apellidos[array_rand($apellidos)],
            $apellidos[array_rand($apellidos)],
            $fechaNacimiento,
            $dni,
            $direcciones[array_rand($direcciones)],
            [$telefonos[array_rand($telefonos)]],
            $sexo,
            $aniosServicio
        );
    }

    public function trabajar(): string
    {
        $pronombre = $this->sexo === "masculino" ? "Soy un empleado de limpieza" : "Soy una empleada de limpieza";
        return "$pronombre con {$this->aniosServicio} años de servicio.";
    }

    public static function numeroObjetosCreados(): int{
        return self::$contador;
    }

    public function __toString(): string{
        return parent::__toString() . ", con {$this->aniosServicio} años de servicio como personal de limpieza.";
    }
}

class Profesor extends Persona
{
    private int $aniosServicio;
    private array $materias;
    private string $cargo;

    public const CARGOS_VALIDOS = [
        "ninguno",
        "dirección",
        "secretariado",
        "jefatura estudios diurno",
        "jefatura estudios personas adultas",
        "vicedirección"
    ];

    public function __construct(
        string $nombre,
        string $apellido1,
        string $apellido2,
        string $fechaNacimiento,
        string $dni,
        string $direccion,
        array $telefonos,
        string $sexo,
        int $aniosServicio,
        array $materias,
        string $cargo
    ) {
        parent::__construct(
            $nombre,
            $apellido1,
            $apellido2,
            $fechaNacimiento,
            $dni,
            $direccion,
            $telefonos,
            $sexo
        );
        $this->aniosServicio = $aniosServicio;
        $this->materias = $materias;
        $this->cargo = $cargo;
    }

    public function getAniosServicio(): int{
        return $this->aniosServicio;
    }
    public function getMaterias(): array{
        return $this->materias;
    }
    public function getCargo(): string{
        return $this->cargo;
    }

    public function setAniosServicio(int $aniosServicio): void{
        $this->aniosServicio = $aniosServicio;
    }
    public function setMaterias(array $materias): void{
        $this->materias = $materias;
    }
    public function setCargo(string $cargo): void{
        if (!in_array($cargo, self::CARGOS_VALIDOS, true)) {
            throw new InvalidArgumentException("Cargo no permitido: $cargo");
        }
        $this->cargo = $cargo;
    }

    public static function generarAlAzar(): self{
        $nombres = ["José", "Lucía", "María", "David", "Juan","Carlos", "Ana", "Pedro", "Laura", "Raúl"];
        $apellidos = ["Ramírez", "González", "López", "Martínez", "Pérez","Sánchez", "Rodríguez", "García", "Fernández", "Moreno"];
        $fechaNacimiento = date("Y-m-d", rand(strtotime("2000-01-01"), strtotime("2004-12-31")));
        $dni = rand(10000000, 99999999) . chr(rand(65, 90));
                $direcciones = ["Calle Mayor 5", "Calle de la Estrella 30", "Avenida de la Constitución 12","Calle del Sol 45",
         "Calle Luna 7", "Avenida de la Paz 9","Calle del Prado 3", "Calle del Río 21", "Plaza España 4", "Calle del Carmen 8"];
        $telefonos = [
            "634567890", "647890123", "612345678", "678901234","699123456", "634512345", "630987654", "675432109","631234567",
             "649876543"];
        $sexos = ["masculino", "femenino"];
        $sexo = $sexos[array_rand($sexos)];
        $cargos = [
            "ninguno",
            "dirección",
            "secretariado",
            "jefatura estudios diurno",
            "jefatura estudios personas adultas",
            "vicedirección"
        ];
        $cargo = $cargos[array_rand($cargos)];
        $materias = ["Matemáticas", "Física", "Biología", "Química"];
        $aniosServicio = rand(1, 30);

        return new self(
            $nombres[array_rand($nombres)],
            $apellidos[array_rand($apellidos)],
            $apellidos[array_rand($apellidos)],
            $fechaNacimiento,
            $dni,
            $direcciones[array_rand($direcciones)],
            [$telefonos[array_rand($telefonos)]],
            $sexo,
            $aniosServicio,
            [$materias[array_rand($materias)]],
            $cargo
        );
    }

    public function trabajar(): string{
        $pronombre = $this->sexo === "masculino" ? "Soy un profesor" : "Soy una profesora";
        return "$pronombre con cargo de $this->cargo y estoy dando clase.";
    }

    public function __toString(): string{
        $materiasStr = implode(", ", $this->materias); // Convierte el array de materias en un string
        return parent::__toString() . ", con {$this->aniosServicio} años de servicio. Mi cargo es el de {$this->cargo} y las materias que imparto son {$materiasStr}.";
    }
}
class AlumnadoESO extends Persona{
    private string $curso;
    private string $grupo;
    private static int $contador = 0;

    public function __construct(
        string $nombre,
        string $apellido1,
        string $apellido2,
        string $fechaNacimiento,
        string $dni,
        string $direccion,
        array $telefonos,
        string $sexo,
        string $curso,
        string $grupo
    ) {
        parent::__construct(
            $nombre,
            $apellido1,
            $apellido2,
            $fechaNacimiento,
            $dni,
            $direccion,
            $telefonos,
            $sexo
        );
        $this->curso = $curso;
        $this->grupo = $grupo;
        self::$contador++;
    }

    public function getCurso(): string
    {
        return $this->curso;
    }

    public function setCurso(string $curso): void
    {
        $this->curso = $curso;
    }

    public function getGrupo(): string
    {
        return $this->grupo;
    }

    public function setGrupo(string $grupo): void
    {
        $this->grupo = $grupo;
    }

    public static function generarAlAzar(): self {
        $nombres = ["José", "Lucía", "María", "David", "Juan","Carlos", "Ana", "Pedro", "Laura", "Raúl"];
        $apellidos = ["Ramírez", "González", "López", "Martínez", "Pérez","Sánchez", "Rodríguez", "García", "Fernández", "Moreno"];
        $fechaNacimiento = date("Y-m-d", rand(strtotime("2000-01-01"), strtotime("2004-12-31")));
        $dni = rand(10000000, 99999999) . chr(rand(65, 90));
                $direcciones = ["Calle Mayor 5", "Calle de la Estrella 30", "Avenida de la Constitución 12","Calle del Sol 45",
         "Calle Luna 7", "Avenida de la Paz 9","Calle del Prado 3", "Calle del Río 21", "Plaza España 4", "Calle del Carmen 8"];
        $telefonos = [
            "634567890", "647890123", "612345678", "678901234","699123456", "634512345", "630987654", "675432109","631234567",
             "649876543"];
        $sexos = ["masculino", "femenino"];
        $sexo = $sexos[array_rand($sexos)];
        $curso = "ESO " . rand(1, 4);
        $grupo = ["A", "B", "C"][array_rand(["A", "B", "C"])];

        return new self(
            $nombres[array_rand($nombres)],
            $apellidos[array_rand($apellidos)],
            $apellidos[array_rand($apellidos)],
            $fechaNacimiento,
            $dni,
            $direcciones[array_rand($direcciones)],
            [$telefonos[array_rand($telefonos)]],
            $sexo,
            $curso,
            $grupo
        );
    }

    public function trabajar(): string
    {
        $pronombre = $this->sexo === "masculino" ? "Soy un alumno" : "Soy una alumna";
        return "$pronombre de {$this->curso}, grupo {$this->grupo}.";
    }

    public static function numeroObjetosCreados(): int
    {
        return self::$contador;
    }

    public function __toString(): string
    {
        return parent::__toString() . ", estudiante de {$this->curso}, grupo {$this->grupo}.";
    }
}

class AlumnadoBachillerato extends Persona
{
    private string $curso;
    private string $grupo;
    private static int $contador = 0;

    public function __construct(
        string $nombre,
        string $apellido1,
        string $apellido2,
        string $fechaNacimiento,
        string $dni,
        string $direccion,
        array $telefonos,
        string $sexo,
        string $curso,
        string $grupo
    ) {
        parent::__construct(
            $nombre,
            $apellido1,
            $apellido2,
            $fechaNacimiento,
            $dni,
            $direccion,
            $telefonos,
            $sexo
        );
        $this->curso = $curso;
        $this->grupo = $grupo;
        self::$contador++;
    }

    public function getCurso(): string
    {
        return $this->curso;
    }

    public function setCurso(string $curso): void
    {
        $this->curso = $curso;
    }

    public function getGrupo(): string
    {
        return $this->grupo;
    }

    public function setGrupo(string $grupo): void
    {
        $this->grupo = $grupo;
    }

    public static function generarAlAzar(): self {
        $nombres = ["José", "Lucía", "María", "David", "Juan","Carlos", "Ana", "Pedro", "Laura", "Raúl"];
        $apellidos = ["Ramírez", "González", "López", "Martínez", "Pérez","Sánchez", "Rodríguez", "García", "Fernández", "Moreno"];
        $fechaNacimiento = date("Y-m-d", rand(strtotime("2000-01-01"), strtotime("2004-12-31")));
        $dni = rand(10000000, 99999999) . chr(rand(65, 90));
                $direcciones = ["Calle Mayor 5", "Calle de la Estrella 30", "Avenida de la Constitución 12","Calle del Sol 45",
         "Calle Luna 7", "Avenida de la Paz 9","Calle del Prado 3", "Calle del Río 21", "Plaza España 4", "Calle del Carmen 8"];
        $telefonos = [
            "634567890", "647890123", "612345678", "678901234","699123456", "634512345", "630987654", "675432109","631234567",
             "649876543"];
        $sexos = ["masculino", "femenino"];
        $sexo = $sexos[array_rand($sexos)];
        $curso = "Bachillerato " . rand(1, 2);
        $grupo = ["A", "B", "C"][array_rand(["A", "B", "C"])];

        return new self(
            $nombres[array_rand($nombres)],
            $apellidos[array_rand($apellidos)],
            $apellidos[array_rand($apellidos)],
            $fechaNacimiento,
            $dni,
            $direcciones[array_rand($direcciones)],
            [$telefonos[array_rand($telefonos)]],
            $sexo,
            $curso,
            $grupo
        );
    }


    public function trabajar(): string
    {
        $pronombre = $this->sexo === "masculino" ? "Soy un alumno" : "Soy una alumna";
        return "$pronombre de {$this->curso}, grupo {$this->grupo}.";
    }

    public static function numeroObjetosCreados(): int
    {
        return self::$contador;
    }

    public function __toString(): string
    {
        return parent::__toString() . ", estudiante de {$this->curso}, grupo {$this->grupo}.";
    }
}

class AlumnadoFormacionProfesional extends Persona
{
    private string $cicloFormativo;
    private string $curso;
    private string $grupo;
    private static int $contador = 0;

    public function __construct(
        string $nombre,
        string $apellido1,
        string $apellido2,
        string $fechaNacimiento,
        string $dni,
        string $direccion,
        array $telefonos,
        string $sexo,
        string $cicloFormativo,
        string $curso,
        string $grupo
    ) {
        parent::__construct(
            $nombre,
            $apellido1,
            $apellido2,
            $fechaNacimiento,
            $dni,
            $direccion,
            $telefonos,
            $sexo
        );
        $this->cicloFormativo = $cicloFormativo;
        $this->curso = $curso;
        $this->grupo = $grupo;
        self::$contador++;
    }

    public function getCicloFormativo(): string
    {
        return $this->cicloFormativo;
    }

    public function setCicloFormativo(string $cicloFormativo): void
    {
        $this->cicloFormativo = $cicloFormativo;
    }

    public function getCurso(): string
    {
        return $this->curso;
    }

    public function setCurso(string $curso): void
    {
        $this->curso = $curso;
    }

    public function getGrupo(): string
    {
        return $this->grupo;
    }

    public function setGrupo(string $grupo): void
    {
        $this->grupo = $grupo;
    }

    public static function generarAlAzar(): self {
        $nombres = ["José", "Lucía", "María", "David", "Juan","Carlos", "Ana", "Pedro", "Laura", "Raúl"];
        $apellidos = ["Ramírez", "González", "López", "Martínez", "Pérez","Sánchez", "Rodríguez", "García", "Fernández", "Moreno"];
        $fechaNacimiento = date("Y-m-d", rand(strtotime("2000-01-01"), strtotime("2004-12-31")));
        $dni = rand(10000000, 99999999) . chr(rand(65, 90));
                $direcciones = ["Calle Mayor 5", "Calle de la Estrella 30", "Avenida de la Constitución 12","Calle del Sol 45",
         "Calle Luna 7", "Avenida de la Paz 9","Calle del Prado 3", "Calle del Río 21", "Plaza España 4", "Calle del Carmen 8"];
        $telefonos = [
            "634567890", "647890123", "612345678", "678901234","699123456", "634512345", "630987654", "675432109","631234567",
             "649876543"];
        $sexos = ["masculino", "femenino"];
        $sexo = $sexos[array_rand($sexos)];
        $cicloFormativo = ["Desarrollo de Aplicaciones Web", "Gestión de Redes y Sistemas", "Automatización y Robótica"][
            array_rand(["Desarrollo de Aplicaciones Web", "Gestión de Redes y Sistemas", "Automatización y Robótica"])
        ];
        $curso = rand(1, 2);
        $grupo = ["A", "B", "C"][array_rand(["A", "B", "C"])];

        return new self(
            $nombres[array_rand($nombres)],
            $apellidos[array_rand($apellidos)],
            $apellidos[array_rand($apellidos)],
            $fechaNacimiento,
            $dni,
            $direcciones[array_rand($direcciones)],
            [$telefonos[array_rand($telefonos)]],
            $sexo,
            $cicloFormativo,
            $curso,
            $grupo
        );
    }

    public function trabajar(): string
    {
        $pronombre = $this->sexo === "masculino" ? "Soy un alumno" : "Soy una alumna";
        return "$pronombre de {$this->cicloFormativo}, curso {$this->curso}, grupo {$this->grupo}.";
    }

    public static function numeroObjetosCreados(): int
    {
        return self::$contador;
    }

    public function __toString(): string
    {
        return parent::__toString() . ", estudiante del ciclo formativo {$this->cicloFormativo}, curso {$this->curso}, grupo {$this->grupo}.";
    }
}
