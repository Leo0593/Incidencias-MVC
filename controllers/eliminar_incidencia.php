<?php
require 'models/eliminar_incidencia.php';

class eliminar_incidenciaController {
    public function eliminar_incidencia() {
        // Crear una instancia del modelo
        $eliminar_incidencia = new eliminar_incidencia();
        
        // Intentar eliminar la incidencia
        $resultado = $eliminar_incidencia->eliminar_incidencia();

        // Verificar si la eliminación fue exitosa
        if ($resultado) {
            // Redirigir a la página de bienvenida si fue exitoso
            header("Location: /index.php?controller=login&method=bienvenido");
            exit;
        } else {
            // Mostrar un mensaje de error si no se pudo eliminar
            $_SESSION['error'] = "Error: No se pudo eliminar la incidencia. Asegúrese de que el ID es válido.";
            
        }
    }
}