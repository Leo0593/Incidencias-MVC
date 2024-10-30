<?php
require 'models/actualizar_incidencias.php';

class actualizar_incidenciasController{
    public function actualizar_incidencias() {
        $actualizar_incidencias = new actualizar_incidencias();
        $actualizar_incidencias->mostrar_form_incidencias();
    }

    public function consulta_actualizacion() {
        $actualizar_incidencias = new actualizar_incidencias();
        $actualizar_incidencias->consulta_actualizacion(); // Este método ya recoge los datos de $_POST
    }

    public function guardar_actualizacion() {
        $actualizar_incidencias = new actualizar_incidencias();
        if ($actualizar_incidencias->actualizar_incidencia()) {
            // Actualización exitosa
            header("Location: /index.php?controller=login&method=bienvenido");
            exit;
        } else {
            $_SESSION['error'] = "Error al actualizar la incidencia.";
            
        }
    }
}
    
