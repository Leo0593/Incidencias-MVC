<?php

class ingresar_incidencias
{
    public function llenar_formulario()
    {
        
        if (isset($_SESSION['usuario'])) {
            $usuario = $_SESSION['usuario'];
        } else {
            die("Error: No se ha encontrado el usuario en la sesión.");
        }
            $categoria = $_POST['categoria'];
            $descripcion = $_POST['descripcion'];
            $data = $_POST['data'];
            $estado = $_POST['estado'];
            $prioridad = $_POST['prioridad'];
            $foto = $_FILES['foto']['name'];
            $ruta = $_FILES['foto']['tmp_name'];
            $destino = "assets/imagenes/".$foto;
            move_uploaded_file($ruta, $destino);
            $cierre = $_POST['cierre'];
            
            $mysql = new mysqli("localhost", "root", "", "mvc");
            if ($mysql->connect_error) {
                die('Problemas con la conexión a la base de datos');
            }


            $query_usuario = "SELECT id FROM usuarios WHERE nombre = '$usuario'";
            $result = $mysql->query($query_usuario);
            

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $id_usuario = $row['id'];
        
                $query_incidencia = "INSERT INTO incidencia (usuario, categoria, descripcion, fecha_incidencia, estado, prioridad, foto, fecha_cierre, usuario_id) 
                VALUES ('$usuario', '$categoria', '$descripcion', '$data', '$estado', '$prioridad', '$destino', '$cierre', '$id_usuario')";
        
                if ($mysql->query($query_incidencia) === TRUE) {
                    $_SESSION['exito'] = "Incidencia ingresada con éxito.";
                    return true;
                } else {
                    $_SESSION['error'] = "Error al insertar la incidencia:";
                    return false;
                }
            } else {
                $_SESSION['error'] = "Error: No se encontró el usuario.";
                return false;
            }
    }
}