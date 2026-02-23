<?php

use DateTime;

/********************************************************************
 *  CLASE ABSTRACTA BASE: Vehiculo
 *  Modela los atributos comunes a TODOS los vehículos
 ********************************************************************/
abstract class Vehiculo
{

    /* ========= ATRIBUTOS COMUNES ========= */

    protected string $matricula;
    protected string $marca;
    protected string $modelo;
    protected DateTime $fechaCompra;
    protected string $numeroBastidor;
    protected int $kilometros;
    protected bool $enServicio;

    /**
     * Constructor común para todos los vehículos
     */
    public function __construct(
        string $matricula,
        string $marca,
        string $modelo,
        DateTime $fechaCompra,
        string $numeroBastidor,
        int $kilometros,
        bool $enServicio
    ) {
        $this->matricula = $matricula;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->fechaCompra = $fechaCompra;
        $this->numeroBastidor = $numeroBastidor;
        $this->kilometros = max(0, $kilometros); // Garantizamos km no negativos
        $this->enServicio = $enServicio;
    }

    /* ========= MÉTODOS ABSTRACTOS ========= */
    abstract public static function generarAlAzar(): self;
    abstract public static function numeroObjetosCreado(): int;
    abstract public function informar(): string;

    /**
     * Método trabajar()
     * Simplemente reutiliza informar()
     */
    public function trabajar(): string
    {
        return $this->informar();
    }

    /**
     * Representación común legible
     */
    public function __toString(): string
    {
        return static::class .
            " | {$this->matricula} | {$this->marca} {$this->modelo} | {$this->kilometros} km";
    }

    /* ========= MÉTODOS AUXILIARES ========= */

    protected static function generarMatricula(): string
    {
        return rand(1000, 9999) .
            chr(rand(65, 90)) .
            chr(rand(65, 90)) .
            chr(rand(65, 90));
    }

    protected static function generarFecha(): DateTime
    {
        return new DateTime("-" . rand(0, 10) . " years");
    }

    protected static function generarBastidor(): string
    {
        return strtoupper(bin2hex(random_bytes(5)));
    }
}

/********************************************************************
 *  CLASE INTERMEDIA ABSTRACTA: VehiculoEmpresa
 *  Modela vehículos PROPIEDAD de la empresa
 ********************************************************************/
abstract class VehiculoEmpresa extends Vehiculo
{

    protected int $aniosEnEmpresa;
    protected float $costeMantenimientoAnual;

    public function __construct(
        string $matricula,
        string $marca,
        string $modelo,
        DateTime $fechaCompra,
        string $numeroBastidor,
        int $kilometros,
        bool $enServicio,
        int $aniosEnEmpresa,
        float $costeMantenimientoAnual
    ) {
        parent::__construct(
            $matricula,
            $marca,
            $modelo,
            $fechaCompra,
            $numeroBastidor,
            $kilometros,
            $enServicio
        );

        $this->aniosEnEmpresa = $aniosEnEmpresa;
        $this->costeMantenimientoAnual = $costeMantenimientoAnual;
    }
}

/********************************************************************
 *  COCHE EMPRESA
 ********************************************************************/
class CocheEmpresa extends VehiculoEmpresa
{

    private static int $contador = 0;

    private int $numeroPlazas;
    private string $categoria;

    public function __construct(
        string $matricula,
        string $marca,
        string $modelo,
        DateTime $fechaCompra,
        string $numeroBastidor,
        int $kilometros,
        bool $enServicio,
        int $aniosEnEmpresa,
        float $costeMantenimientoAnual,
        int $numeroPlazas,
        string $categoria
    ) {
        parent::__construct(
            $matricula,
            $marca,
            $modelo,
            $fechaCompra,
            $numeroBastidor,
            $kilometros,
            $enServicio,
            $aniosEnEmpresa,
            $costeMantenimientoAnual
        );

        $this->numeroPlazas = $numeroPlazas;
        $this->categoria = $categoria;

        self::$contador++;
    }

    public static function numeroObjetosCreado(): int
    {
        return self::$contador;
    }

    public static function generarAlAzar(): self
    {

        $catalogo = [
            ["Toyota", "Corolla"],
            ["Seat", "León"],
            ["Ford", "Focus"],
            ["Volkswagen", "Golf"]
        ];

        $eleccion = $catalogo[array_rand($catalogo)];

        return new self(
            parent::generarMatricula(),
            $eleccion[0],
            $eleccion[1],
            parent::generarFecha(),
            parent::generarBastidor(),
            rand(0, 200000),
            (bool)rand(0, 1),
            rand(0, 10),
            rand(500, 1500),
            rand(2, 5),
            ["urbano", "berlina", "SUV"][rand(0, 2)]
        );
    }

    public function informar(): string
    {
        return "Soy un coche de empresa y estoy transportando empleados.";
    }
}

/********************************************************************
 *  FURGONETA REPARTO
 ********************************************************************/
class FurgonetaReparto extends VehiculoEmpresa
{

    private static int $contador = 0;

    private int $capacidadCargaKg;
    private float $volumenCargaM3;

    public function __construct(
        string $matricula,
        string $marca,
        string $modelo,
        DateTime $fechaCompra,
        string $numeroBastidor,
        int $kilometros,
        bool $enServicio,
        int $aniosEnEmpresa,
        float $costeMantenimientoAnual,
        int $capacidadCargaKg,
        float $volumenCargaM3
    ) {
        parent::__construct(
            $matricula,
            $marca,
            $modelo,
            $fechaCompra,
            $numeroBastidor,
            $kilometros,
            $enServicio,
            $aniosEnEmpresa,
            $costeMantenimientoAnual
        );

        $this->capacidadCargaKg = $capacidadCargaKg;
        $this->volumenCargaM3 = $volumenCargaM3;

        self::$contador++;
    }

    public static function numeroObjetosCreado(): int
    {
        return self::$contador;
    }

    public static function generarAlAzar(): self
    {

        $catalogo = [
            ["Ford", "Transit"],
            ["Mercedes", "Sprinter"],
            ["Renault", "Master"]
        ];

        $eleccion = $catalogo[array_rand($catalogo)];

        return new self(
            parent::generarMatricula(),
            $eleccion[0],
            $eleccion[1],
            parent::generarFecha(),
            parent::generarBastidor(),
            rand(0, 300000),
            true,
            rand(0, 10),
            rand(1000, 3000),
            rand(500, 2000),
            rand(5, 20)
        );
    }

    public function informar(): string
    {
        return "Soy una furgoneta de reparto y estoy entregando paquetes en el centro.";
    }
}

/********************************************************************
 *  MOTO REPARTO
 ********************************************************************/
class MotoReparto extends VehiculoEmpresa
{

    private static int $contador = 0;

    private int $cilindradaCc;
    private string $tipoCarnetNecesario;

    public function __construct(
        string $matricula,
        string $marca,
        string $modelo,
        DateTime $fechaCompra,
        string $numeroBastidor,
        int $kilometros,
        bool $enServicio,
        int $aniosEnEmpresa,
        float $costeMantenimientoAnual,
        int $cilindradaCc,
        string $tipoCarnetNecesario
    ) {
        parent::__construct(
            $matricula,
            $marca,
            $modelo,
            $fechaCompra,
            $numeroBastidor,
            $kilometros,
            $enServicio,
            $aniosEnEmpresa,
            $costeMantenimientoAnual
        );

        $this->cilindradaCc = $cilindradaCc;
        $this->tipoCarnetNecesario = $tipoCarnetNecesario;

        self::$contador++;
    }

    public static function numeroObjetosCreado(): int
    {
        return self::$contador;
    }

    public static function generarAlAzar(): self
    {

        $catalogo = [
            ["Honda", "CB125"],
            ["Yamaha", "NMax"],
            ["Kymco", "Agility"]
        ];

        $eleccion = $catalogo[array_rand($catalogo)];

        return new self(
            parent::generarMatricula(),
            $eleccion[0],
            $eleccion[1],
            parent::generarFecha(),
            parent::generarBastidor(),
            rand(0, 100000),
            true,
            rand(0, 10),
            rand(300, 800),
            rand(125, 500),
            ["A1", "A2", "B"][rand(0, 2)]
        );
    }

    public function informar(): string
    {
        return "Soy una moto de reparto y estoy realizando entregas urgentes.";
    }
}

/********************************************************************
 *  TAXI COLABORADOR
 ********************************************************************/
class TaxiColaborador extends Vehiculo
{

    private static int $contador = 0;

    private string $nombreConductor;
    private string $licenciaMunicipal;
    private float $precioPorKm;

    public function __construct(
        string $matricula,
        string $marca,
        string $modelo,
        DateTime $fechaCompra,
        string $numeroBastidor,
        int $kilometros,
        bool $enServicio,
        string $nombreConductor,
        string $licenciaMunicipal,
        float $precioPorKm
    ) {
        parent::__construct(
            $matricula,
            $marca,
            $modelo,
            $fechaCompra,
            $numeroBastidor,
            $kilometros,
            $enServicio
        );

        $this->nombreConductor = $nombreConductor;
        $this->licenciaMunicipal = $licenciaMunicipal;
        $this->precioPorKm = $precioPorKm;

        self::$contador++;
    }

    public static function numeroObjetosCreado(): int
    {
        return self::$contador;
    }

    public static function generarAlAzar(): self
    {

        $catalogo = [
            ["Toyota", "Prius"],
            ["Skoda", "Octavia"],
            ["Seat", "Toledo"]
        ];

        $eleccion = $catalogo[array_rand($catalogo)];

        return new self(
            parent::generarMatricula(),
            $eleccion[0],
            $eleccion[1],
            parent::generarFecha(),
            parent::generarBastidor(),
            rand(0, 500000),
            true,
            "Conductor " . rand(1, 100),
            "LIC" . rand(1000, 9999),
            rand(1, 3)
        );
    }

    public function informar(): string
    {
        return "Soy un taxi colaborador y estoy llevando a un cliente al aeropuerto.";
    }
}

/********************************************************************
 *  VTC COLABORADOR
 ********************************************************************/
class VTCColaborador extends Vehiculo
{

    private static int $contador = 0;

    private string $empresaColaboradora;
    private float $precioPorHora;
    private string $nivelServicio;

    public function __construct(
        string $matricula,
        string $marca,
        string $modelo,
        DateTime $fechaCompra,
        string $numeroBastidor,
        int $kilometros,
        bool $enServicio,
        string $empresaColaboradora,
        float $precioPorHora,
        string $nivelServicio
    ) {
        parent::__construct(
            $matricula,
            $marca,
            $modelo,
            $fechaCompra,
            $numeroBastidor,
            $kilometros,
            $enServicio
        );

        $this->empresaColaboradora = $empresaColaboradora;
        $this->precioPorHora = $precioPorHora;
        $this->nivelServicio = $nivelServicio;

        self::$contador++;
    }

    public static function numeroObjetosCreado(): int
    {
        return self::$contador;
    }

    public static function generarAlAzar(): self
    {

        $catalogo = [
            ["Tesla", "Model 3"],
            ["Mercedes", "Clase E"],
            ["BMW", "Serie 5"]
        ];

        $eleccion = $catalogo[array_rand($catalogo)];

        return new self(
            parent::generarMatricula(),
            $eleccion[0],
            $eleccion[1],
            parent::generarFecha(),
            parent::generarBastidor(),
            rand(0, 400000),
            true,
            "EmpresaVTC" . rand(1, 10),
            rand(20, 50),
            ["estándar", "premium"][rand(0, 1)]
        );
    }

    public function informar(): string
    {
        return "Soy un VTC colaborador y estoy realizando un servicio {$this->nivelServicio}.";
    }
}

/********************************************************************
 *  ACTIVIDAD 2
 ********************************************************************/

echo "<h2>Generando 100 vehículos al azar...</h2>";

$tipos = [
    CocheEmpresa::class,
    FurgonetaReparto::class,
    MotoReparto::class,
    TaxiColaborador::class,
    VTCColaborador::class
];

$vehiculos = [];

for ($i = 0; $i < 100; $i++) {
    $clase = $tipos[array_rand($tipos)];
    $vehiculos[] = $clase::generarAlAzar();
}

/* Mostrar mensaje de trabajar() */
echo "<h3>Mensajes de trabajo:</h3>";
foreach ($vehiculos as $v) {
    echo $v->trabajar() . "<br>";
}

/* Mostrar número de objetos creados */
echo "<h3>Conteo por clase:</h3>";
echo "CocheEmpresa: " . CocheEmpresa::numeroObjetosCreado() . "<br>";
echo "FurgonetaReparto: " . FurgonetaReparto::numeroObjetosCreado() . "<br>";
echo "MotoReparto: " . MotoReparto::numeroObjetosCreado() . "<br>";
echo "TaxiColaborador: " . TaxiColaborador::numeroObjetosCreado() . "<br>";
echo "VTCColaborador: " . VTCColaborador::numeroObjetosCreado() . "<br>";
