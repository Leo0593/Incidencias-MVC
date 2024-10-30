<?php
require_once 'models/login.php';

class logincontroller
{
    public function login()
    {
        require 'views/formularios/Formulario_Login.php';
    }

    public function verificar_login()
    {
        $login = new login();
        if ($login->verificar_login()) {
            // Si el login es exitoso, redirige a la página de inicio
            header( "Location: /index.php?controller=login&method=bienvenido" );
            exit;
        } else {
            // Si hubo un error, redirige al formulario de login
            header("Location: /index.php?controller=login&method=login");
            exit;
        }
    }

    public function bienvenido()
    {
        $incidencias = new login();
        
        $total_incidencias = $incidencias->contar_incidencias();

        // Obtener los contadores por prioridad
        $incidencias_alta = $incidencias->contar_incidencias_por_prioridad('alta');
        $incidencias_media = $incidencias->contar_incidencias_por_prioridad('media');
        $incidencias_baja = $incidencias->contar_incidencias_por_prioridad('baja');

        $incidencias_abierto = $incidencias->contar_incidencias_por_estado('abierto');
        $incidencias_cerrado = $incidencias->contar_incidencias_por_estado('cerrado');
        $incidencias_proceso = $incidencias->contar_incidencias_por_estado('proceso');


        require 'views/formularios/Bienvenido.php';
    }

    public function cerrar_sesion()
    {
        session_destroy();
        header("Location: /index.php?controller=login&method=login");
        exit;
    }
}
