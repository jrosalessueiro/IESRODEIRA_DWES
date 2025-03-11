<?php

require_once 'Conection.php'; // Se incluye la clase para la conexión a la base de datos

class Jugador
{
    private $nombre;   // Atributo para almacenar el nombre del jugador
    private $apellidos; // Atributo para almacenar los apellidos del jugador
    private $dorsal;   // Atributo para almacenar el número de dorsal del jugador
    private $posicion; // Atributo para almacenar la posición del jugador
    private $code;     // Atributo para almacenar el código de barras del jugador

    /**
     * Constructor de la clase Jugador.
     * Inicializa los atributos con los datos proporcionados.
     */
    public function __construct($nombre, $apellidos, $dorsal, $posicion, $code)
    {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->dorsal = $dorsal;
        $this->posicion = $posicion;
        $this->code = $code;
    }

    // Métodos getter para acceder a los atributos de la clase

    /**
     * Obtiene el nombre del jugador.
     * 
     * @return string Nombre del jugador.
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Obtiene los apellidos del jugador.
     * 
     * @return string Apellidos del jugador.
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Obtiene el dorsal del jugador.
     * 
     * @return int Dorsal del jugador.
     */
    public function getDorsal()
    {
        return $this->dorsal;
    }

    /**
     * Obtiene la posición del jugador.
     * 
     * @return int Posición del jugador.
     */
    public function getPosicion()
    {
        return $this->posicion;
    }

    /**
     * Obtiene el código de barras del jugador.
     * 
     * @return string Código de barras del jugador.
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Valida los datos de un jugador antes de ser insertados en la base de datos.
     * 
     * @param array $data Datos del jugador a validar.
     * 
     * @throws Exception Si alguno de los campos obligatorios está vacío o si el dorsal ya está ocupado.
     */
    public static function validatePlayer(array $data): void
    {
        if (empty($data['nombre'])) {
            throw new Exception('El nombre es obligatorio');
        } elseif (empty($data['apellidos'])) {
            throw new Exception('Los apellidos son obligatorios');
        } elseif (empty($data['code'])) {
            throw new Exception('El código de barras es obligatorio');
        } elseif (empty($data['posicion'])) {
            throw new Exception('La posición es obligatoria');
        } elseif (isset($data['dorsal']) && self::getPlayerByDorsal($data['dorsal'])) {
            throw new Exception('El dorsal ya está ocupado por otro jugador');
        }
    }

    /**
     * Inserta un nuevo jugador en la base de datos.
     * 
     * @param array $data Datos del jugador a insertar.
     * 
     * @throws Exception Si ocurre algún error al insertar en la base de datos.
     */
    public static function create(array $data): void
    {
        // Primero validamos los datos del jugador
        self::validatePlayer($data);

        // Establecemos la conexión a la base de datos
        $pdo = Conection::getConnection();
        
        // Preparamos la consulta SQL para insertar los datos del jugador
        $stmt = $pdo->prepare('
            INSERT INTO jugadores (nombre, apellidos, dorsal, posicion, barcode) 
            VALUES (:nombre, :apellidos, :dorsal, :posicion, :code)
        ');

        // Asignamos los valores de los parámetros en la consulta
        $stmt->bindParam(':nombre', $data['nombre']);
        $stmt->bindParam(':apellidos', $data['apellidos']);
        $stmt->bindParam(':dorsal', $data['dorsal']);
        $stmt->bindParam(':posicion', $data['posicion']);
        $stmt->bindParam(':code', $data['code']);

        // Ejecutamos la consulta para insertar el jugador en la base de datos
        $stmt->execute();
    }

    /**
     * Obtiene un jugador de la base de datos por su número de dorsal.
     * 
     * @param int $dorsal Dorsal del jugador a buscar.
     * 
     * @return array|false Datos del jugador encontrado o false si no se encuentra.
     */
    public static function getPlayerByDorsal(int $dorsal): array|false
    {
        $pdo = Conection::getConnection();
        $stmt = $pdo->prepare('SELECT * FROM jugadores WHERE dorsal = :dorsal');
        $stmt->bindParam(':dorsal', $dorsal);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC); // Devuelve el jugador o false si no lo encuentra
    }

    /**
     * Obtiene un jugador de la base de datos por su código de barras.
     * 
     * @param string $code Código de barras del jugador.
     * 
     * @return array|false Datos del jugador encontrado o false si no se encuentra.
     */
    public static function getPlayerByBarcode(string $code): array|false
    {
        $pdo = Conection::getConnection();
        $stmt = $pdo->prepare('SELECT * FROM jugadores WHERE barcode = :code');
        $stmt->bindParam(':code', $code);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC); // Devuelve los datos del jugador o false si no lo encuentra
    }

    /**
     * Obtiene todos los jugadores de la base de datos.
     * 
     * @return array Lista de objetos Jugador.
     */
    public static function getAllPlayers(): array
    {
        $pdo = Conection::getConnection();
        $stmt = $pdo->query('SELECT * FROM jugadores');
        $jugadoresData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $jugadores = [];
        // Convertimos los datos de cada jugador en un objeto Jugador
        foreach ($jugadoresData as $data) {
            $jugadores[] = new Jugador($data['nombre'], $data['apellidos'], $data['dorsal'], $data['posicion'], $data['code']);
        }

        return $jugadores;
    }
}