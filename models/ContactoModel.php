<?php
// models/ContactoModel.php

class ContactoModel {
    private $db;

    public function __construct($conexion) {
        $this->db = $conexion;
    }

    // CAMBIO: guarda también correo y comentario
    public function guardarContacto($nombre, $correo, $comentario) {
        try {
            $sql = "INSERT INTO contactos (nombre, correo, comentario) VALUES (:nombre, :correo, :comentario)";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([
                ':nombre' => $nombre,
                ':correo' => $correo,
                ':comentario' => $comentario
            ]);
        } catch (PDOException $e) {
            return false;
        }
    }
}
