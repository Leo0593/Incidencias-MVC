<?php
if (isset($_SESSION['error'])) {
    $errorMessage = $_SESSION['error'];
    unset($_SESSION['error']);
} else {
    $errorMessage = '';
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Incidencias</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.min.css">
  <script src="https://cdn.datatables.net/2.1.7/js/dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/2.1.7/js/dataTables.bootstrap5.js"></script>


  <script>
    $(document).ready(function() {
        $('#Tabla_Incidencias').DataTable();
    } );
  </script>
    <style>
        /* Estilos para el sidebar con un gradiente */
        .sidebar {
            height: 100vh; /* Ocupa toda la altura de la ventana */
            position: fixed;
            top: 0;
            left: 0;
            width: 280px; /* Ancho del sidebar */
            background: linear-gradient(135deg, #007bff, #0056b3); /* Gradiente moderno */
            padding-top: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1); /* Sombra ligera */
            transition: background-color 0.3s ease;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%; /* Ancho completo en pantallas pequeñas */
                height: auto; /* Permitir que el sidebar sea más corto */
                position: relative; /* Cambiar a posición relativa */
            }
        }

        /* Ajustes para el logo del sidebar */
        .sidebar .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 30px;
            display: block;
        }

        /* Estilos para los links del sidebar */
        .sidebar .nav-link {
            color: white; /* Color de los links en blanco */
            font-size: 1.1rem;
            margin: 10px 0;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.2); /* Hover suave */
            transform: translateX(5px); /* Desplazamiento ligero al pasar el mouse */
        }

        /* Ajustes de la bienvenida */
        .sidebar .welcome-message {
            margin-top: 30px;
            font-size: 1.1rem;
            text-align: center;
        }

        /* Encabezado principal */
        .main-content {
            margin-left: 280px; /* Ajuste del margen izquierdo */
            padding: 20px;
        }

        @media (max-width: 768px) {
            .main-content {
                margin-left: 0; /* Sin margen izquierdo en pantallas pequeñas */
                padding: 10px; /* Padding reducido */
            }
        }

        /* Estilos para los botones */
        .btn-group-vertical .btn {
            margin-bottom: 10px;
            border-radius: 50px; /* Bordes redondeados */
            font-size: 1.2rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Sombra ligera */
        }

        .btn-group-vertical .btn:hover {
            transform: translateY(-2px); /* Efecto de levantamiento */
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15); /* Aumenta la sombra */
        }

        /* Estilos para la alerta */
        .alert {
            border-radius: 10px;
            padding: 20px;
            font-size: 1.1rem;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script>
        function showNotification(message) {
            swal("Error", message, "error");
        }

        window.onload = function() {
            const errorMessage = "<?php echo addslashes($errorMessage); ?>";
            if (errorMessage) {
                showNotification(errorMessage);
            }
        };
    </script>
</head>
