<?php

class actualizar_incidencias{
    public function mostrar_form_incidencias() {
        require 'views/formularios/Actualizar_Incidencias.php';
    }

    public function consulta_actualizacion() {
        // Verifica si hay un usuario en la sesión
        if (isset($_SESSION['usuario'])) {
            $usuario = $_SESSION['usuario'];
        } else {
            die("Error: No se ha encontrado el usuario en la sesión.");
        }

        // Conexión a la base de datos
        $mysql = new mysqli("localhost", "root", "", "mvc");
        if ($mysql->connect_error) {
            die('Problemas con la conexión a la base de datos');
        }

        // Verificar si 'codigo' está definido en POST
        if (isset($_POST['id']) && is_numeric($_POST['id'])) {
            $codigo = $_POST['id'];

            // Ejecutar la consulta SQL
            $registro = $mysql->query("SELECT * FROM incidencia WHERE id = $codigo") or
                die($mysql->error);

            // Verificar si se encontró la incidencia
            if ($reg = $registro->fetch_array()) {
                // Cargar el formulario de actualización con los datos de la incidencia
                require 'views/formularios/Actualizar_Incidencias.php';
            } else {
                // Si no se encontró la incidencia, mostrar error
                $_SESSION['error'] = "No existe la incidencia con el código: " . htmlspecialchars($codigo);
                return false;
            }
        } else {
            // Si no se pasa el código o no es numérico, mostrar error
            $_SESSION['error'] = "Código de incidencia no válido o faltante.";
            return false;
        }
    }

    public function actualizar_incidencia() {
        $mysql = new mysqli("localhost", "root", "", "mvc");
        if ($mysql->connect_error) {
            die('Problemas con la conexión a la base de datos: ' . $mysql->connect_error);
        }
    
        // Recoger datos del formulario
        $id = $_POST['id'];  
        $categoria = $_POST['categoria'];
        $descripcion = $_POST['descripcion'];
        $data = $_POST['data'];
        $estado = $_POST['estado'];
        $prioridad = $_POST['prioridad'];
        $cierre = $_POST['cierre'];
    
        // Manejo de la foto
        $foto = ""; 
        if (!empty($_FILES['foto']['name'])) {
            $ruta = 'assets/imagenes/'; 
            $nombreArchivo = basename($_FILES['foto']['name']); 
            $foto = $ruta . $nombreArchivo; 
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $foto)) {
                // La imagen se ha subido correctamente
            } else {
                $_SESSION['error'] = "Error al subir la imagen.";
                return false; // Retornar false en caso de error
            }
        } else {
            // Si no se subió una nueva foto, recupera la existente
            $foto_query = $mysql->query("SELECT foto FROM incidencia WHERE id=$id");
            if ($foto_query) {
                $foto_row = $foto_query->fetch_array();
                $foto = $foto_row['foto']; 
            } else {
                $_SESSION['error'] = "Error al recuperar la foto actual.";
                return false; // Retornar false en caso de error
            }
        }
    
        // Actualizar en la base de datos
        $query = "UPDATE incidencia SET categoria = '$categoria', descripcion = '$descripcion', fecha_incidencia = '$data', estado = '$estado', prioridad = '$prioridad', fecha_cierre = '$cierre', foto = '$foto' WHERE id = $id";
    
        if ($mysql->query($query)) {
            return true; // Retornar true si la actualización fue exitosa
        } else {
            $_SESSION['error'] = "Error al actualizar la incidencia: " . $mysql->error;
            return false; // Retornar false en caso de error
        }
    }
}