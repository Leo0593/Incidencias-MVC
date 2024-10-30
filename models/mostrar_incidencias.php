<?php

class mostrar_incidencias
{
    public function mostrar_incidencias()
    {
        $mysql = new mysqli("localhost", "root", "", "mvc");
        if ($mysql->connect_error) {
            die('Problemas con la conexión a la base de datos');
        }
        $sql = "SELECT * FROM incidencia";
        $tablaregistro = $mysql->query($sql);
        if ($tablaregistro->num_rows > 0) {
            return $tablaregistro;
        } else {
            $_SESSION['error'] = "No se encontraron incidencias.";
            return false;
        }
        
    }

    
}