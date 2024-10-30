<?php
class eliminar_incidencia{
    public function eliminar_incidencia() 
    {
        $mysql = new mysqli("localhost", "root", "", "mvc");
        
        // Verificar la conexión
        if ($mysql->connect_error) {
            die('Problemas con la conexión a la base de datos');
        }

        // Asegurarse de que `codigo` está definido
        if (isset($_REQUEST['codigo'])) {
            $codigo = intval($_REQUEST['codigo']); // Convertir a entero para evitar inyecciones SQL
            
            // Realizar la consulta para eliminar la incidencia
            $resultado = $mysql->query("DELETE FROM incidencia WHERE id=$codigo");

            // Cerrar la conexión
            $mysql->close();

            // Retornar verdadero si la eliminación fue exitosa, de lo contrario falso
            return $resultado; 
        }

        // Cerrar la conexión si no se proporcionó un código
        $mysql->close();
        return false; // No se pudo eliminar porque no se proporcionó el código
    }
}