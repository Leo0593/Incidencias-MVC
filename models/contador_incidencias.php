<?php
class contador_incidencias
{
    private $db;

    public function __construct()
    {
        $this->db = new mysqli("localhost", "root", "", "mvc");
        if ($this->db->connect_error) {
            die('Problemas con la conexión a la base de datos');
        }
    }

    public function contar_inciAbiertas()
    {
        $consulta = "SELECT COUNT(*) AS total_abiertas FROM incidencia WHERE estado = 'abierto'";
        $resultado = $this->db->query($consulta);
        if (!$resultado) {
            die('Error en la consulta: ' . $this->db->error);
        }
        return $resultado->fetch_assoc()['total_abiertas'];
    }

    public function contar_inciCerradas()
    {
        $consulta = "SELECT COUNT(*) AS total_cerradas FROM incidencia WHERE estado = 'cerrado'";
        $resultado = $this->db->query($consulta);
        if (!$resultado) {
            die('Error en la consulta: ' . $this->db->error);
        }
        return $resultado->fetch_assoc()['total_cerradas'];
    }

    public function contar_inciProceso()
    {
        $consulta = "SELECT COUNT(*) AS total_proceso FROM incidencia WHERE estado = 'proceso'";
        $resultado = $this->db->query($consulta);
        if (!$resultado) {
            die('Error en la consulta: ' . $this->db->error);
        }
        return $resultado->fetch_assoc()['total_proceso'];
    }
}