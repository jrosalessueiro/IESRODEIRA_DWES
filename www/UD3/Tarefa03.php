<?php
abstract class Persona{
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

    public function getNom(): string{
        return $this->nombre;
    }
    public function getApellido1(): string{
        return $this->apellido1;
    }
    public function getApellido2(): string{
        return $this->apellido2;
    }
    public function getFechaNacimiento(): string{
        return $this->fechaNacimiento;
    }
    public function getDni(): string{
        return $this->dni;
    }
    public function getdireccion(): string{
        return $this->direccion;
    }
    public function getSexo(): string{
        return $this->sexo;
    }

    public function setNombre(string $nombre){
        $this->nombre = $nombre;
    }
    public function setApellido1(string $apellido1): void{
        $this->apellido1 = $apellido1;
    }
    public function setApellido2(string $apellido2): void{
        $this->apellido2 = $apellido2;
    }
    public function setFechaNacimiento(string $fechaNacimiento): void{
        $this->fechaNacimiento = $fechaNacimiento;
    }
    public function setDni(string $dni): void{
        $this->dni = $dni;
    }
    public function setDireccion(string $direccion): void{
        $this->direccion = $direccion;
    }
    public function setSexo(string $sexo): void{
        $this->sexo = $sexo;
    }

    public static function  numeroObjetosCreado(): int{
        return self::$contador;
    }

    public static function generarAlAzar(): self{
        $nombres = ["Luis", "María", "Juan", "Carmen"];
        $apellidos = ["Pérez", "González", "López", "Martínez"];
        $sexo = ["masculino", "femenino"][array_rand(["masculino", "femenino"])];

        return new static(
            $nombres[array_rand($nombres)],
            $apellidos[array_rand($apellidos)],
            $apellidos[array_rand($apellidos)],
            "1990-01-01",
            "12345678A",
            "Calle Falsa 123",
            ["600123456"],
            $sexo
        );
    }

    public function __toString(): string{
        return "{$this->nombre} {$this->apellido1}{$this->apellido2}, nacido el {$this->fechaNacimiento}, DNI: {$this->dni}";
    }
}

class Administrativo extends Persona{
    private int $aniosServicio;

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
    }

    public function getAniosServicio(): int{
        return $this->aniosServicio;
    }

    public function setAniosServicio(int $aniosServicio): void{
        $this->aniosServicio = $aniosServicio;
    }

    public function trabajar(): string{
        $pronombre = $this->sexo === "masculino" ? "Soy un administrativo" : "Soy una administrativa";
        return "$pronombre y estoy gestionando documentación.";
    }

    public function __toString(): string{
        return parent::__toString() . ", con {$this->aniosServicio} años de servicio.";
    }
}


class Conserje extends Persona{
    private int $aniosServicio;

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
    }

    public function getAniosServicio(): int{
        return $this->aniosServicio;
    }

    public function setAniosServicio(int $aniosServicio): void{
        $this->aniosServicio = $aniosServicio;
    }

    public function trabajar(): string{
        $pronombre = $this->sexo === "masculino" ? "Soy un conserje" : "Soy una conserje";
        return "$pronombre y estoy vigilando el centro.";
    }

    public function __toString(): string{
        return parent::__toString() . ", con {$this->aniosServicio} años de servicio.";
    }
}

class PersonalLimpieza extends Persona{
    private int $aniosServicio;

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
    }


    public function getAniosServicio(): int{
        return $this->aniosServicio;
    }

    public function setAniosServicio(int $aniosServicio): void{
        $this->aniosServicio = $aniosServicio;
    }


    public function trabajar(): string{
        $pronombre = $this->sexo === "masculino" ? "Soy un limpiador" : "Soy una limpiadora";
        return "$pronombre y estoy limpiando el centro.";
    }

    public function __toString(): string{
        return parent::__toString() . ", con {$this->aniosServicio} años de servicio.";
    }
}

class Profesor extends Persona
{
    private int $aniosServicio;
    private array $materias;
    private string $cargo;

    public const cargosValidos = [
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
        if (!in_array($cargo, self::cargosValidos, true)) {
            throw new InvalidArgumentException("Cargo no permitido: $cargo");
        }
        $this->cargo = $cargo;
    }
    public function trabajar(): string{
        $pronombre = $this->sexo === "masculino" ? "Soy un profesor" : "Soy una profesora";
        return "$pronombre con cargo de $this->cargo y estoy dando clase.";
    }

    public function __toString(): string{
        return parent::__toString() . ", con {$this->aniosServicio} años de servicio. Mi cargo es el de {$this->cargo}
         y las materias que imparto son {$this->materias}";
    }
}

/*Deseamos crear una aplicación que modelará o guardará información sobre las personas que conforman la comunidad educativa de un instituto de enseñanza secundaria. En concreto, tenemos los siguientes tipos de personas, de los que queremos guardar la información:
    • para todas las personas:
        ◦ nombre, apellido1 y apellido2
        ◦ fecha nacimiento
        ◦ DNI o documento de identificación
        ◦ Dirección
        ◦ Teléfono(s)
        ◦ sexo
    • administrativos:
        ◦ años de servicio
    • conserjes:
        ◦ años de servicio
    • personal de limpieza:
        ◦ años de servicio
    • profesorado:
        ◦ años de servicio
        ◦ materias que imparte
        ◦ cargo directivo: ninguno, dirección, secretariado, jefatura estudios diurno, jefatura estudios personas adultas, vicedirección
    • alumnado de la ESO:
        ◦ curso
        ◦ grupo
    • alumnado de Bachillerato
        ◦ curso
        ◦ grupo
    • alumnado de Formación Profesional
        ◦ ciclo formativo
        ◦ curso
        ◦ grupo

Crea el código de una jerarquía de clases que permite modelar la información anterior, diseñando la/s clase/s abstracta/s, métodos setter/getter, propiedades/atributos, métodos auxiliares, etcétera necesarios. Diseña tu jerarquía de clases teniendo en cuenta que se pueda usar polimorfismo. 

Ten además en cuenta las cuestiones siguientes:
    • todas las clases que modelan lo anterior, tendrán un método/función generarAlAzar() que devolverá un objeto de esa clase con información inventada (pero coherente, es decir, con formato que respete la semántica del elemento a representar).
    • todas las clases implementarán un método numeroObjetosCreado() que devuelva la cantidad de objetos que se han creado de esa clase en concreto.
    • implementa el método __toString() para cada clase.
    • todas las clases que modelan lo anterior, tendrán un método trabajar() que devolverá un string o cadena indicando lo que hacer una persona de esa clase (por ejemplo: "Soy un estudiante de la ESO y estoy estudiando" ó "Soy una estudiante de la ESO y estoy estudiando"; es decir, se tendrá en cuenta la propiedad "sexo" para imprimir un mensaje correcto).

Documenta todo el código.