<?php
include 'views/layout/header_filtros.php'; 
?>

<nav class="sidebar">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="index.php?controller=login&method=bienvenido">Gestión de Incidencias</a>
        <ul class="navbar-nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="#" id="mostrarFormulario">Ingresar Incidencias</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" id="mostrarIncidencias">Tabla de Incidencias</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?controller=login&method=cerrar_sesion">Cerrar Sesión</a>
            </li>
        </ul>
    </div>
</nav>

<!-- Contenido principal -->
<div class="main-content">
    <!-- Mensaje de alerta de error -->
    <?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger">
        <?php echo $_SESSION['error']; ?>
    </div>
    <?php unset($_SESSION['error']); // Limpiar el mensaje de error después de mostrarlo ?>
    <?php endif; ?>

    <h1 class="text-primary">Bienvenido, <?php echo $_SESSION['usuario']; ?>!</h1>
    <h2 class="text-primary">Sistema de Gestión de Incidencias</h2>
    <p>Has iniciado sesión exitosamente.</p>

    <div class="row">
        <!-- Prioridad Baja -->
        <div class="col-md-4">
            <div class="card bg-success text-white text-center">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <h3 class="card-title">Prioridad Baja</h3>
                    <p class="card-text">
                        Total: <span id="incidenciasBaja"><?php echo $incidencias_baja; ?></span>
                    </p>
                </div>
            </div>
        </div>

        <!-- Prioridad Media -->
        <div class="col-md-4">
            <div class="card bg-warning text-dark text-center">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <h3 class="card-title">Prioridad Media</h3>
                    <p class="card-text">
                        Total: <span id="incidenciasMedia"><?php echo $incidencias_media; ?></span>
                    </p>
                </div>
            </div>
        </div>

        <!-- Prioridad Alta -->
        <div class="col-md-4">
            <div class="card bg-danger text-white text-center">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <h3 class="card-title">Prioridad Alta</h3>
                    <p class="card-text">
                        Total: <span id="incidenciasAlta"><?php echo $incidencias_alta; ?></span>
                    </p>
                </div>
            </div>
        </div>

        <!-- Incidencias Cerradas -->
        <div class="col-md-4 mt-4">
            <div class="card bg-danger text-white text-center">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <h3 class="card-title">Incidencias Cerradas</h3>
                    <p class="card-text">
                        Total: <span id="incidenciascerradas"><?php echo $incidencias_cerrado; ?></span>
                    </p>
                </div>
            </div>
        </div>

        <!-- Incidencias Abiertas -->
        <div class="col-md-4 mt-4">
            <div class="card bg-success text-white text-center">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <h3 class="card-title">Incidencias Abiertas</h3>
                    <p class="card-text">
                        Total: <span id="incidenciasabiertas"><?php echo $incidencias_abierto; ?></span>
                    </p>
                </div>
            </div>
        </div>

        <!-- Incidencias En Proceso -->
        <div class="col-md-4 mt-4">
            <div class="card bg-warning text-dark text-center">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <h4 class="card-title">Incidencias En Proceso</h4>
                    <p class="card-text">
                        Total: <span id="incidenciasproceso"><?php echo $incidencias_proceso; ?></span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    


            
    
    <!-- Contenedor para el formulario de ingreso de incidencias -->
    <div id="formularioContainer" style="display:none;"></div>

    <!-- Contenedor para la tabla de incidencias -->
    <div id="tablaContainer" style="display:none;">
        <h3 class="text-primary">Tabla de Incidencias</h3>
        <div id="tablaIncidencias">
            <!-- Aquí se cargará la tabla mediante AJAX -->
        </div>
    </div>

    <div id="formularioActualizarIncidencia" style="display:none;"></div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Mostrar el formulario de Ingresar Incidencias
        $('#mostrarFormulario').on('click', function(e) {
            e.preventDefault();

            // Oculta la tabla de incidencias y el formulario de actualizar
            $('#tablaContainer').hide();
            $('#formularioActualizarIncidencia').hide();

            // Verifica si el formulario de ingresar ya está presente en la página
            if ($('#formularioIngresarIncidencia').length === 0) {
                // Si no está cargado, realiza la solicitud AJAX
                $.ajax({
                    url: 'index.php?controller=ingresar_incidencias&method=ingresar_incidencia',
                    type: 'GET',
                    success: function(response) {
                        // Añade el formulario al contenedor y lo muestra
                        $('#formularioContainer').html(response).show();
                    },
                    error: function() {
                        alert('Hubo un error al cargar el formulario de ingreso.');
                    }
                });
            } else {
                // Si ya está cargado, simplemente muéstralo
                $('#formularioContainer').show();
            }
        });

        // Mostrar la tabla de incidencias
        $('#mostrarIncidencias').on('click', function(e) {
            e.preventDefault();

            // Oculta los formularios de ingreso y actualización
            $('#formularioContainer').hide();
            $('#formularioActualizarIncidencia').hide();

            // Cargar la tabla de incidencias mediante AJAX
            $.ajax({
                url: 'index.php?controller=mostrar_incidencias&method=mostrar_incidencias',
                type: 'GET',
                success: function(response) {
                    $('#tablaIncidencias').html(response);
                    $('#tablaContainer').show(); // Muestra el contenedor de la tabla
                },
                error: function() {
                    $('#tablaIncidencias').html("Error al cargar la tabla.");
                }
            });
        });

            // Mostrar el formulario de actualizar incidencia
        $(document).on('click', '.actualizar-incidencia', function() {
        var idIncidencia = $(this).data('id');  // Obtener el ID de la incidencia
        $('#tablaContainer').hide();  // Ocultar la tabla de incidencias

        $.ajax({
            url: 'index.php?controller=actualizar_incidencias&method=consulta_actualizacion',
            type: 'POST',
            data: { id: idIncidencia },  // Pasar el ID de la incidencia al controlador
            success: function(response) {
                $('#formularioActualizarIncidencia').html(response).show();  // Mostrar el formulario de actualización
            },
            error: function() {
                alert('Hubo un error al cargar el formulario de actualización.');
            }
            });
        });
    });
</script>
