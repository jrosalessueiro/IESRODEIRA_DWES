<?php
// TAREA6/OperacionesTarea06.php
require_once __DIR__ . '/public/conexion.php';

class OperacionesTarea06
{
    /**
     * Obtiene tiendas y stock para un producto
     * @param int $idProducto
     * @return array [nombre tienda, teléfono tienda, unidades]
     */
    public function getTiendas($idProducto)
    {
        global $conProyecto;

        $sql = "SELECT t.nombre, t.tlf, s.unidades 
                FROM tiendas t 
                INNER JOIN stocks s ON t.id = s.tienda 
                WHERE s.producto = :idp";

        $stmt = $conProyecto->prepare($sql);

        try {
            $stmt->execute([':idp' => $idProducto]);
            // PDO::FETCH_NUM nos devuelve el array [0=>nombre, 1=>tlf, 2=>unidades]
            return $stmt->fetchAll(PDO::FETCH_NUM);
        } catch (PDOException $ex) {
            return ["error" => $ex->getMessage()];
        }
    }
}
