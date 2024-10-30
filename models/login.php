<?php

class login{

    public function verificar_login()
    {
        $email = $_POST['email'];
        $contraseña = $_POST['contraseña'];

        $mysql = new mysqli("localhost", "root", "", "mvc");

        if ($mysql->connect_error) {
            die('Problemas con la conexión a la base de datos');
        }

        if (empty($email) || empty($contraseña)) {
            $_SESSION['error'] = "Por favor, completa todos los campos.";
            return false;
        }

        $result = $mysql->query("SELECT * FROM usuarios WHERE email = '$email'");

        if ($result->num_rows === 0) {
            $_SESSION['error'] = "Usuario no encontrado.";
            return false;
        } else {
            $usuario = $result->fetch_assoc();
            if (password_verify($contraseña, $usuario['contraseña'])) {
                // Login exitoso
                $_SESSION['usuario'] = $usuario['nombre']; 
                return true;
            } else {
                $_SESSION['error'] = "Contraseña incorrecta.";
                return false;
            }
        }
    }

    public function contar_incidencias()
    {
        $mysql = new mysqli("localhost", "root", "", "mvc");

        if ($mysql->connect_error) {
            die('Problemas con la conexión a la base de datos');
        }

        $result = $mysql->query("SELECT COUNT(*) AS total FROM incidencia");

        if ($result) {
            $row = $result->fetch_assoc();
            return $row['total'];
        } else {
            return 0;
        }
    }

    // Contar incidencias por prioridad
    public function contar_incidencias_por_prioridad($prioridad)
    {
        $mysql = new mysqli("localhost", "root", "", "mvc");

        if ($mysql->connect_error) {
            die('Problemas con la conexión a la base de datos');
        }

        $stmt = $mysql->prepare("SELECT COUNT(*) AS total FROM incidencia WHERE prioridad = ?");
        $stmt->bind_param("s", $prioridad);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result) {
            $row = $result->fetch_assoc();
            return $row['total'];
        } else {
            return 0;
        }
    }

    public function contar_incidencias_por_estado($prioridad)
    {
        $mysql = new mysqli("localhost", "root", "", "mvc");

        if ($mysql->connect_error) {
            die('Problemas con la conexión a la base de datos');
        }

        $stmt = $mysql->prepare("SELECT COUNT(*) AS total FROM incidencia WHERE estado = ?");
        $stmt->bind_param("s", $prioridad);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result) {
            $row = $result->fetch_assoc();
            return $row['total'];
        } else {
            return 0;
        }
    }
}