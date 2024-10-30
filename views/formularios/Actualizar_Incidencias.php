<?php
include 'views/layout/header_filtros.php'; 
?>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow-lg" style="max-width: 600px; width: 100%;">
        <h1 class="text-center mb-4">Actualizar Incidencia</h1>
        <form id="formularioActualizarIncidencia" action="index.php/?controller=actualizar_incidencias&method=guardar_actualizacion" method="post" enctype="multipart/form-data">
            <!-- Categoría -->
            <div class="mb-4">
                <label for="categoria" class="form-label">Categoría:</label><br>
                <div class="btn-group d-flex flex-wrap" role="group">
                    <input type="radio" class="btn-check" name="categoria" id="Energia" value="Energia" <?php if ($reg['categoria'] == 'Energia') echo 'checked'; ?>>
                    <label class="btn btn-outline-primary flex-fill" for="Energia">Energía</label>

                    <input type="radio" class="btn-check" name="categoria" id="Climatizacion" value="Climatizacion" <?php if ($reg['categoria'] == 'Climatizacion') echo 'checked'; ?>>
                    <label class="btn btn-outline-primary flex-fill" for="Climatizacion">Climatización</label>

                    <input type="radio" class="btn-check" name="categoria" id="Red" value="Red" <?php if ($reg['categoria'] == 'Red') echo 'checked'; ?>>
                    <label class="btn btn-outline-primary flex-fill" for="Red">Red</label>

                    <input type="radio" class="btn-check" name="categoria" id="Servidores" value="Servidores" <?php if ($reg['categoria'] == 'Servidores') echo 'checked'; ?>>
                    <label class="btn btn-outline-primary flex-fill" for="Servidores">Servidores</label>

                    <input type="radio" class="btn-check" name="categoria" id="Cableado" value="Cableado" <?php if ($reg['categoria'] == 'Cableado') echo 'checked'; ?>>
                    <label class="btn btn-outline-primary flex-fill" for="Cableado">Cableado</label>

                    <input type="radio" class="btn-check" name="categoria" id="Infraestructura" value="Infraestructura" <?php if ($reg['categoria'] == 'Infraestructura') echo 'checked'; ?>>
                    <label class="btn btn-outline-primary flex-fill" for="Infraestructura">Infraestructura</label>
                </div>
            </div>

            <!-- Descripción -->
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción:</label>
                <input type="text" class="form-control form-control-lg" name="descripcion" id="descripcion" value="<?php echo $reg['descripcion']; ?>" required>
            </div>

            <!-- Fecha de Incidencia -->
            <div class="mb-3">
                <label for="data" class="form-label">Fecha de Incidencia:</label>
                <input type="date" class="form-control form-control-lg" name="data" id="data" value="<?php echo $reg['fecha_incidencia']; ?>" required>
            </div>

            <!-- Estado de la Incidencia -->
            <div class="mb-4">
                <label for="estado" class="form-label">Estado de la Incidencia:</label><br>
                <div class="btn-group d-flex flex-wrap" role="group">
                    <input type="radio" class="btn-check" name="estado" id="abierto" value="abierto" <?php if ($reg['estado'] == 'abierto') echo 'checked'; ?>>
                    <label class="btn btn-outline-success flex-fill" for="abierto">Abierto</label>

                    <input type="radio" class="btn-check" name="estado" id="cerrado" value="cerrado" <?php if ($reg['estado'] == 'cerrado') echo 'checked'; ?>>
                    <label class="btn btn-outline-danger flex-fill" for="cerrado">Cerrado</label>

                    <input type="radio" class="btn-check" name="estado" id="proceso" value="proceso" <?php if ($reg['estado'] == 'proceso') echo 'checked'; ?>>
                    <label class="btn btn-outline-warning flex-fill" for="proceso">En Proceso</label>
                </div>
            </div>

            <!-- Prioridad -->
            <div class="mb-4">
                <label for="prioridad" class="form-label">Prioridad:</label><br>
                <div class="btn-group d-flex flex-wrap" role="group">
                    <input type="radio" class="btn-check" name="prioridad" id="baja" value="baja" <?php if ($reg['prioridad'] == 'baja') echo 'checked'; ?>>
                    <label class="btn btn-outline-info flex-fill" for="baja">Baja</label>

                    <input type="radio" class="btn-check" name="prioridad" id="media" value="media" <?php if ($reg['prioridad'] == 'media') echo 'checked'; ?>>
                    <label class="btn btn-outline-info flex-fill" for="media">Media</label>

                    <input type="radio" class="btn-check" name="prioridad" id="alta" value="alta" <?php if ($reg['prioridad'] == 'alta') echo 'checked'; ?>>
                    <label class="btn btn-outline-info flex-fill" for="alta">Alta</label>
                </div>
            </div>

            <!-- Foto -->
            <div class="mb-3">
                <label for="foto" class="form-label">Foto:</label>
                <input type="file" class="form-control form-control-lg" name="foto" id="foto">
            </div>

            <!-- Fecha de Cierre -->
            <div class="mb-3">
                <label for="cierre" class="form-label">Fecha de Cierre:</label>
                <input type="date" class="form-control form-control-lg" name="cierre" id="cierre" value="<?php echo $reg['fecha_cierre']; ?>">
            </div>

            <!-- Botones -->
            <div class="d-grid gap-2">
                <input type="hidden" name="id" value="<?php echo $codigo; ?>">
                <button type="submit" class="btn btn-primary btn-lg">Actualizar</button>
            </div>
        </form>
    </div>
</div>