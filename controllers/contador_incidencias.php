<?php
require 'models/contador_incidencias.php';

class contador_incidenciasController 
{
    public function obtener_contadores() {
        $modelo = new contador_incidencias();

        $abiertas = $modelo->contar_inciAbiertas();
        $cerradas = $modelo->contar_inciCerradas();
        $en_proceso = $modelo->contar_inciProceso();

        // Retorna los valores como JSON
        echo json_encode([
            'abiertas' => $abiertas,
            'cerradas' => $cerradas,
            'en_proceso' => $en_proceso
        ]);
        
        // Si necesitas cargar una vista después de obtener los contadores
        // require 'views/formularios/Bienvenido.php'; // Descomentar si es necesario
    }
}
?>