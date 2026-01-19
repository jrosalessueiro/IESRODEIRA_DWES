<?php

/**
 * Clase abstracta Persona que define las propiedades y métodos comunes para todas las personas.
 */
abstract class Persona
{
    // Propiedades protegidas (accesibles desde las clases heredadas)
    protected string $nombre;        // Nombre de la persona
    protected string $apellido1;     // Primer apellido de la persona
    protected string $apellido2;     // Segundo apellido de la persona
    protected string $fechaNacimiento; // Fecha de nacimiento de la persona (formato: Y-m-d)
    protected string $dni;           // Documento Nacional de Identidad de la persona
    protected string $direccion;     // Dirección de la persona
    protected array $telefonos;      // Array con los números de teléfono de la persona
    protected string $sexo;          // Sexo de la persona (masculino o femenino)

    private static int $contador = 0;  // Contador estático para llevar el registro de objetos creados

    /**
     * Constructor para inicializar una nueva persona.
     * 
     * @param string $nombre Nombre de la persona.
     * @param string $apellido1 Primer apellido de la persona.
     * @param string $apellido2 Segundo apellido de la persona.
     * @param string $fechaNacimiento Fecha de nacimiento de la persona (formato: Y-m-d).
     * @param string $dni DNI de la persona.
     * @param string $direccion Dirección de la persona.
     * @param array $telefonos Array con los números de teléfono de la persona.
     * @param string $sexo Sexo de la persona.
     */
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
        // Inicialización de las propiedades
        $this->nombre = $nombre;
        $this->apellido1 = $apellido1;
        $this->apellido2 = $apellido2;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->dni = $dni;
        $this->direccion = $direccion;
        $this->telefonos = $telefonos;
        $this->sexo = $sexo;

        // Incrementamos el contador estático cada vez que se crea una persona
        self::$contador++;
    }

    // Métodos getter (acceso a las propiedades)
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
    public function getDireccion(): string
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

    // Métodos setter (modificación de las propiedades)
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


    abstract public function trabajar(): string;

    /**
     * Método estático para obtener el número total de objetos Persona creados.
     * 
     * @return int El número total de objetos Persona creados.
     */
    public static function numeroObjetosCreado(): int
    {
        return self::$contador;
    }

    /**
     * Método abstracto para generar una persona aleatoriamente.
     * Este método debe ser implementado por las clases que extienden Persona.
     * 
     * @return self Devuelve una nueva instancia de la clase hija.
     */
    abstract public static function generarAlAzar(): self;

    /**
     * Método mágico __toString para obtener una representación en cadena de la persona.
     * 
     * @return string Representación en cadena de la persona.
     */
    public function __toString(): string
    {
        return "{$this->nombre} {$this->apellido1} {$this->apellido2}, nacido el {$this->fechaNacimiento}, DNI: {$this->dni}";
    }
}

/**
 * Clase Administrativo que extiende la clase Persona.
 * Representa a un trabajador administrativo.
 */
class Administrativo extends Persona
{
    private int $aniosServicio;  // Años de servicio en el cargo
    private static int $contador = 0;  // Contador estático de instancias creadas

    /**
     * Constructor para inicializar un objeto Administrativo.
     * 
     * @param string $nombre Nombre del administrativo.
     * @param string $apellido1 Primer apellido.
     * @param string $apellido2 Segundo apellido.
     * @param string $fechaNacimiento Fecha de nacimiento.
     * @param string $dni DNI.
     * @param string $direccion Dirección.
     * @param array $telefonos Array de teléfonos.
     * @param string $sexo Sexo del administrativo.
     * @param int $aniosServicio Años de servicio del administrativo.
     */
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
        $this->aniosServicio = $aniosServicio;  // Inicialización de años de servicio
        self::$contador++;  // Incrementar el contador de administrativos creados
    }

    /**
     * Getter para obtener los años de servicio del administrativo.
     * 
     * @return int Años de servicio.
     */
    public function getAniosServicio(): int
    {
        return $this->aniosServicio;
    }

    /**
     * Setter para modificar los años de servicio.
     * 
     * @param int $aniosServicio Años de servicio.
     */
    public function setAniosServicio(int $aniosServicio): void
    {
        $this->aniosServicio = $aniosServicio;
    }

    /**
     * Método estático para generar un administrativo aleatoriamente.
     * 
     * @return self Instancia de un administrativo generado aleatoriamente.
     */
    public static function generarAlAzar(): self
    {
        // Listas de valores aleatorios para cada atributo
        $nombres = ["José", "Lucía", "María", "David", "Juan", "Carlos", "Ana", "Pedro", "Laura", "Raúl"];
        $apellidos = ["Ramírez", "González", "López", "Martínez", "Pérez", "Sánchez", "Rodríguez", "García", "Fernández", "Moreno"];
        $fechaNacimiento = date("Y-m-d", rand(strtotime("2000-01-01"), strtotime("2004-12-31")));
        $dni = rand(10000000, 99999999) . chr(rand(65, 90));
        $direcciones = ["Calle Mayor 5", "Calle de la Estrella 30", "Avenida de la Constitución 12", "Calle del Sol 45", "Calle Luna 7"];
        $telefonos = ["634567890", "647890123", "612345678", "678901234", "699123456"];
        $sexos = ["masculino", "femenino"];
        $sexo = $sexos[array_rand($sexos)];
        $aniosServicio = rand(1, 100);  // Años de servicio aleatorios

        // Creación de un administrativo con valores aleatorios
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

    /**
     * Método para obtener la descripción del trabajo del administrativo.
     * 
     * @return string Descripción de la tarea del administrativo.
     */
    public function trabajar(): string
    {
        $pronombre = $this->sexo === "masculino" ? "Soy un administrativo" : "Soy una administrativa";
        return "$pronombre con {$this->aniosServicio} años de servicio.";
    }

    /**
     * Método estático para obtener el número de objetos Administrativo creados.
     * 
     * @return int Número de objetos Administrativo creados.
     */
    public static function numeroObjetosCreado(): int
    {
        return self::$contador;
    }

    /**
     * Método mágico __toString para obtener una representación en cadena del administrativo.
     * 
     * @return string Representación en cadena del administrativo.
     */
    public function __toString(): string
    {
        return parent::__toString() . " (Años de servicio: {$this->aniosServicio})";
    }
}


// Clase que representa a un conserje, extendiendo la clase Persona
class Conserje extends Persona
{
    // Propiedades específicas de la clase Conserje
    private int $aniosServicio;
    private static int $contador = 0; // Contador estático para llevar el número de objetos creados

    // Constructor que inicializa todas las propiedades de la clase
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
        // Llamada al constructor de la clase base (Persona)
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
        // Inicialización de la propiedad específica
        $this->aniosServicio = $aniosServicio;
        // Incrementa el contador de objetos creados
        self::$contador++;
    }

    // Métodos getter y setter para la propiedad $aniosServicio
    public function getAniosServicio(): int
    {
        return $this->aniosServicio;
    }

    public function setAniosServicio(int $aniosServicio): void
    {
        $this->aniosServicio = $aniosServicio;
    }

    // Método estático que genera un objeto Conserje al azar con datos predefinidos
    public static function generarAlAzar(): self
    {
        $nombres = ["José", "Lucía", "María", "David", "Juan", "Carlos", "Ana", "Pedro", "Laura", "Raúl"];
        $apellidos = ["Ramírez", "González", "López", "Martínez", "Pérez", "Sánchez", "Rodríguez", "García", "Fernández", "Moreno"];
        $fechaNacimiento = date("Y-m-d", rand(strtotime("2000-01-01"), strtotime("2004-12-31")));
        $dni = rand(10000000, 99999999) . chr(rand(65, 90));
        $direcciones = [
            "Calle Mayor 5",
            "Calle de la Estrella 30",
            "Avenida de la Constitución 12",
            "Calle del Sol 45",
            "Calle Luna 7",
            "Avenida de la Paz 9",
            "Calle del Prado 3",
            "Calle del Río 21",
            "Plaza España 4",
            "Calle del Carmen 8"
        ];
        $telefonos = [
            "634567890",
            "647890123",
            "612345678",
            "678901234",
            "699123456",
            "634512345",
            "630987654",
            "675432109",
            "631234567",
            "649876543"
        ];
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

    // Método para mostrar información de lo que hace el conserje
    public function trabajar(): string
    {
        $pronombre = $this->sexo === "masculino" ? "Soy un conserje" : "Soy una conserje";
        return "$pronombre con {$this->aniosServicio} años de servicio.";
    }

    // Método estático que devuelve el número de objetos Conserje creados
    public static function numeroObjetosCreado(): int
    {
        return self::$contador;
    }

    // Método mágico __toString que devuelve una representación en cadena del objeto
    public function __toString(): string
    {
        return parent::__toString() . ", con {$this->aniosServicio} años de servicio como conserje.";
    }
}

// Clase que representa al personal de limpieza, extendiendo la clase Persona
class PersonalDeLimpieza extends Persona
{
    private int $aniosServicio;
    private static int $contador = 0; // Contador estático para llevar el número de objetos creados

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

    // Método estático que genera un objeto PersonalDeLimpieza al azar con datos predefinidos
    public static function generarAlAzar(): self
    {
        $nombres = ["José", "Lucía", "María", "David", "Juan", "Carlos", "Ana", "Pedro", "Laura", "Raúl"];
        $apellidos = ["Ramírez", "González", "López", "Martínez", "Pérez", "Sánchez", "Rodríguez", "García", "Fernández", "Moreno"];
        $fechaNacimiento = date("Y-m-d", rand(strtotime("2000-01-01"), strtotime("2004-12-31")));
        $dni = rand(10000000, 99999999) . chr(rand(65, 90));
        $direcciones = [
            "Calle Mayor 5",
            "Calle de la Estrella 30",
            "Avenida de la Constitución 12",
            "Calle del Sol 45",
            "Calle Luna 7",
            "Avenida de la Paz 9",
            "Calle del Prado 3",
            "Calle del Río 21",
            "Plaza España 4",
            "Calle del Carmen 8"
        ];
        $telefonos = [
            "634567890",
            "647890123",
            "612345678",
            "678901234",
            "699123456",
            "634512345",
            "630987654",
            "675432109",
            "631234567",
            "649876543"
        ];
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

    // Método para mostrar información de lo que hace el personal de limpieza
    public function trabajar(): string
    {
        $pronombre = $this->sexo === "masculino" ? "Soy un empleado de limpieza" : "Soy una empleada de limpieza";
        return "$pronombre con {$this->aniosServicio} años de servicio.";
    }

    // Método estático que devuelve el número de objetos PersonalDeLimpieza creados
    public static function numeroObjetosCreado(): int
    {
        return self::$contador;
    }

    // Método mágico __toString que devuelve una representación en cadena del objeto
    public function __toString(): string
    {
        return parent::__toString() . ", con {$this->aniosServicio} años de servicio como personal de limpieza.";
    }
}

// Clase que representa a un profesor, extendiendo la clase Persona
class Profesor extends Persona
{
    private int $aniosServicio;
    private array $materias;
    private string $cargo;

    private static int $contador = 0;


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
        self::$contador++;
    }

    public function getAniosServicio(): int
    {
        return $this->aniosServicio;
    }
    public function getMaterias(): array
    {
        return $this->materias;
    }
    public function getCargo(): string
    {
        return $this->cargo;
    }

    public function setAniosServicio(int $aniosServicio): void
    {
        $this->aniosServicio = $aniosServicio;
    }
    public function setMaterias(array $materias): void
    {
        $this->materias = $materias;
    }
    public function setCargo(string $cargo): void
    {
        if (!in_array($cargo, self::CARGOS_VALIDOS, true)) {
            throw new InvalidArgumentException("Cargo no permitido: $cargo");
        }
        $this->cargo = $cargo;
    }

    public static function generarAlAzar(): self
    {
        $nombres = ["José", "Lucía", "María", "David", "Juan", "Carlos", "Ana", "Pedro", "Laura", "Raúl"];
        $apellidos = ["Ramírez", "González", "López", "Martínez", "Pérez", "Sánchez", "Rodríguez", "García", "Fernández", "Moreno"];
        $fechaNacimiento = date("Y-m-d", rand(strtotime("2000-01-01"), strtotime("2004-12-31")));
        $dni = rand(10000000, 99999999) . chr(rand(65, 90));
        $direcciones = [
            "Calle Mayor 5",
            "Calle de la Estrella 30",
            "Avenida de la Constitución 12",
            "Calle del Sol 45",
            "Calle Luna 7",
            "Avenida de la Paz 9",
            "Calle del Prado 3",
            "Calle del Río 21",
            "Plaza España 4",
            "Calle del Carmen 8"
        ];
        $telefonos = [
            "634567890",
            "647890123",
            "612345678",
            "678901234",
            "699123456",
            "634512345",
            "630987654",
            "675432109",
            "631234567",
            "649876543"
        ];
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

    public function trabajar(): string
    {
        $pronombre = $this->sexo === "masculino" ? "Soy un profesor" : "Soy una profesora";
        return "$pronombre con cargo de $this->cargo y estoy dando clase.";
    }

    public function __toString(): string
    {
        $materiasStr = implode(", ", $this->materias); // Convierte el array de materias en un string
        return parent::__toString() . ", con {$this->aniosServicio} años de servicio. Mi cargo es el de {$this->cargo} y las materias que imparto son {$materiasStr}.";
    }

    public static function numeroObjetosCreado(): int
    {
        return self::$contador;
    }
}
// Clase AlumnadoESO que extiende de la clase Persona
class AlumnadoESO extends Persona
{
    // Propiedades privadas
    private string $curso; // Curso del alumno
    private string $grupo; // Grupo al que pertenece el alumno
    private static int $contador = 0; // Contador estático para llevar el número de objetos creados

    // Constructor que inicializa todos los atributos de la clase
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
        // Llamada al constructor de la clase padre (Persona)
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
        // Inicialización de las propiedades de la clase hija
        $this->curso = $curso;
        $this->grupo = $grupo;
        self::$contador++; // Incrementa el contador de objetos creados
    }

    // Métodos getter y setter para las propiedades curso y grupo
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

    // Método estático que genera un objeto de forma aleatoria
    public static function generarAlAzar(): self
    {
        // Definición de arrays con posibles valores
        $nombres = ["José", "Lucía", "María", "David", "Juan", "Carlos", "Ana", "Pedro", "Laura", "Raúl"];
        $apellidos = ["Ramírez", "González", "López", "Martínez", "Pérez", "Sánchez", "Rodríguez", "García", "Fernández", "Moreno"];
        $fechaNacimiento = date("Y-m-d", rand(strtotime("2000-01-01"), strtotime("2004-12-31"))); // Fecha de nacimiento aleatoria
        $dni = rand(10000000, 99999999) . chr(rand(65, 90)); // DNI aleatorio
        $direcciones = [
            "Calle Mayor 5",
            "Calle de la Estrella 30",
            "Avenida de la Constitución 12",
            "Calle del Sol 45",
            "Calle Luna 7",
            "Avenida de la Paz 9",
            "Calle del Prado 3",
            "Calle del Río 21",
            "Plaza España 4",
            "Calle del Carmen 8"
        ];
        $telefonos = [
            "634567890",
            "647890123",
            "612345678",
            "678901234",
            "699123456",
            "634512345",
            "630987654",
            "675432109",
            "631234567",
            "649876543"
        ];
        $sexos = ["masculino", "femenino"];
        $sexo = $sexos[array_rand($sexos)]; // Sexo aleatorio
        $curso = "ESO " . rand(1, 4); // Curso aleatorio de ESO (1 a 4)
        $grupo = ["A", "B", "C"][array_rand(["A", "B", "C"])]; // Grupo aleatorio (A, B o C)

        // Creación del objeto con valores aleatorios
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

    // Método que devuelve una frase describiendo al alumno
    public function trabajar(): string
    {
        // Determina el pronombre según el sexo del alumno
        $pronombre = $this->sexo === "masculino" ? "Soy un alumno" : "Soy una alumna";
        // Devuelve la descripción del alumno
        return "$pronombre de {$this->curso}, grupo {$this->grupo} y estoy estudiando.";
    }

    // Método estático que devuelve el número de objetos creados
    public static function numeroObjetosCreado(): int
    {
        return self::$contador;
    }

    // Método mágico que devuelve una representación en cadena del objeto
    public function __toString(): string
    {
        // Llama al método __toString() de la clase padre y agrega información adicional
        return parent::__toString() . ", estudiante de {$this->curso}, grupo {$this->grupo}.";
    }
}

// Clase AlumnadoBachillerato que extiende de la clase Persona
class AlumnadoBachillerato extends Persona
{
    private int $curso; // Curso de Bachillerato
    private string $grupo; // Grupo de Bachillerato
    private static int $contador = 0; // Contador de objetos creados

    // Constructor que inicializa todos los atributos de la clase
    public function __construct(
        string $nombre,
        string $apellido1,
        string $apellido2,
        string $fechaNacimiento,
        string $dni,
        string $direccion,
        array $telefonos,
        string $sexo,
        int $curso,
        string $grupo
    ) {
        // Llamada al constructor de la clase padre (Persona)
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
        // Inicialización de las propiedades de la clase hija
        $this->curso = $curso;
        $this->grupo = $grupo;
        self::$contador++; // Incrementa el contador de objetos creados
    }

    // Métodos getter y setter para las propiedades curso y grupo
    public function getCurso(): string
    {
        return $this->curso;
    }

    public function setCurso(int $curso): void
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

    // Método estático que genera un objeto de forma aleatoria
    public static function generarAlAzar(): self
    {
        // Definición de arrays con posibles valores
        $nombres = ["José", "Lucía", "María", "David", "Juan", "Carlos", "Ana", "Pedro", "Laura", "Raúl"];
        $apellidos = ["Ramírez", "González", "López", "Martínez", "Pérez", "Sánchez", "Rodríguez", "García", "Fernández", "Moreno"];
        $fechaNacimiento = date("Y-m-d", rand(strtotime("2000-01-01"), strtotime("2004-12-31"))); // Fecha de nacimiento aleatoria
        $dni = rand(10000000, 99999999) . chr(rand(65, 90)); // DNI aleatorio
        $direcciones = [
            "Calle Mayor 5",
            "Calle de la Estrella 30",
            "Avenida de la Constitución 12",
            "Calle del Sol 45",
            "Calle Luna 7",
            "Avenida de la Paz 9",
            "Calle del Prado 3",
            "Calle del Río 21",
            "Plaza España 4",
            "Calle del Carmen 8"
        ];
        $telefonos = [
            "634567890",
            "647890123",
            "612345678",
            "678901234",
            "699123456",
            "634512345",
            "630987654",
            "675432109",
            "631234567",
            "649876543"
        ];
        $sexos = ["masculino", "femenino"];
        $sexo = $sexos[array_rand($sexos)]; // Sexo aleatorio
        $curso = "Bachillerato " . rand(1, 2); // Curso aleatorio de Bachillerato (1 o 2)
        $grupo = ["A", "B", "C"][array_rand(["A", "B", "C"])]; // Grupo aleatorio (A, B o C)

        // Creación del objeto con valores aleatorios
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

    // Método que devuelve una frase describiendo al alumno
    public function trabajar(): string
    {
        // Determina el pronombre según el sexo del alumno
        $pronombre = $this->sexo === "masculino" ? "Soy un alumno" : "Soy una alumna";
        // Devuelve la descripción del alumno
        return "$pronombre de {$this->curso}, grupo {$this->grupo} y estoy estudiando.";
    }

    // Método estático que devuelve el número de objetos creados
    public static function numeroObjetosCreado(): int
    {
        return self::$contador;
    }

    // Método mágico que devuelve una representación en cadena del objeto
    public function __toString(): string
    {
        // Llama al método __toString() de la clase padre y agrega información adicional
        return parent::__toString() . ", estudiante de {$this->curso}, grupo {$this->grupo}.";
    }
}

// Clase AlumnadoFP que extiende de la clase Persona
class AlumnadoFP extends Persona
{
    private int $curso; // Curso de Formación Profesional
    private string $cicloFormativo; // Ciclo formativo que está cursando el alumno
    private string $grupo; // Grupo del alumno
    private static int $contador = 0; // Contador de objetos creados

    // Constructor que inicializa todos los atributos de la clase
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
        int $curso,
        string $grupo
    ) {
        // Llamada al constructor de la clase padre (Persona)
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
        // Inicialización de las propiedades de la clase hija
        $this->curso = $curso;
        $this->cicloFormativo = $cicloFormativo;
        $this->grupo = $grupo;

        self::$contador++; // Incrementa el contador de objetos creados
    }

    // Métodos getter y setter para las propiedades curso y módulo
    public function getCurso(): int
    {
        return $this->curso;
    }

    public function setCurso(int $curso): void
    {
        $this->curso = $curso;
    }

    public function getCicloFormativo(): string
    {
        return $this->cicloFormativo;
    }

    public function setCicloFormativo(string $cicloFormativo): void
    {
        $this->cicloFormativo = $cicloFormativo;
    }
    public function getGrupo(): string
    {
        return $this->grupo;
    }

    public function setGrupo(string $grupo): void
    {
        $this->grupo = $grupo;
    }

    // Método estático que genera un objeto de forma aleatoria
    public static function generarAlAzar(): self
    {
        // Definición de arrays con posibles valores
        $nombres = ["José", "Lucía", "María", "David", "Juan", "Carlos", "Ana", "Pedro", "Laura", "Raúl"];
        $apellidos = ["Ramírez", "González", "López", "Martínez", "Pérez", "Sánchez", "Rodríguez", "García", "Fernández", "Moreno"];
        $fechaNacimiento = date("Y-m-d", rand(strtotime("2000-01-01"), strtotime("2004-12-31"))); // Fecha de nacimiento aleatoria
        $dni = rand(10000000, 99999999) . chr(rand(65, 90)); // DNI aleatorio
        $direcciones = [
            "Calle Mayor 5",
            "Calle de la Estrella 30",
            "Avenida de la Constitución 12",
            "Calle del Sol 45",
            "Calle Luna 7",
            "Avenida de la Paz 9",
            "Calle del Prado 3",
            "Calle del Río 21",
            "Plaza España 4",
            "Calle del Carmen 8"
        ];
        $telefonos = [
            "634567890",
            "647890123",
            "612345678",
            "678901234",
            "699123456",
            "634512345",
            "630987654",
            "675432109",
            "631234567",
            "649876543"
        ];
        $sexos = ["masculino", "femenino"];
        $sexo = $sexos[array_rand($sexos)]; // Sexo aleatorio
        $ciclos = ["DAW", "ASIR", "SMR", "DAM"];
        $cicloFormativo = $ciclos[array_rand($ciclos)];

        $curso = rand(1, 2); // Curso aleatorio de Formación Profesional (1 o 2)
        $grupo = ["A", "B", "C"][array_rand(["A", "B", "C"])];

        // Creación del objeto con valores aleatorios
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

    // Método que devuelve una frase describiendo al alumno
    public function trabajar(): string
    {
        // Determina el pronombre según el sexo del alumno
        $pronombre = $this->sexo === "masculino" ? "Soy un alumno" : "Soy una alumna";
        // Devuelve la descripción del alumno
        return "$pronombre de FP {$this->cicloFormativo}, curso {$this->curso}, grupo {$this->grupo} y estoy estudiando.";
    }

    // Método estático que devuelve el número de objetos creados
    public static function numeroObjetosCreado(): int
    {
        return self::$contador;
    }

    // Método mágico que devuelve una representación en cadena del objeto
    public function __toString(): string
    {
        // Llama al método __toString() de la clase padre y agrega información adicional
        return parent::__toString() . ", estudiante de FP {$this->cicloFormativo}, curso {$this->curso}, grupo {$this->grupo}.";
    }
}
