<?php
include 'views/layout/header_filtros.php'; 
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
            <!-- Card -->
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header text-center bg-primary text-white">
                    <h3 class="mb-0">Ingreso de Incidencias</h3>
                </div>
                <div class="card-body p-5">
                    <form id="formularioIngresarIncidencia" action="index.php?controller=ingresar_incidencias&method=ingresar" method="POST" enctype="multipart/form-data">
                        <!-- Categoría -->
                        <div class="mb-4">
                            <label for="categoria" class="form-label">Categoría:</label><br>
                            <div class="btn-group flex-wrap" role="group">
                                <input type="radio" class="btn-check" name="categoria" id="Energia" value="Energia" required>
                                <label class="btn btn-outline-primary" for="Energia">Energía</label>

                                <input type="radio" class="btn-check" name="categoria" id="Climatizacion" value="Climatizacion" required>
                                <label class="btn btn-outline-primary" for="Climatizacion">Climatización</label>

                                <input type="radio" class="btn-check" name="categoria" id="Red" value="Red" required>
                                <label class="btn btn-outline-primary" for="Red">Red</label>

                                <input type="radio" class="btn-check" name="categoria" id="Servidores" value="Servidores" required>
                                <label class="btn btn-outline-primary" for="Servidores">Servidores</label>

                                <input type="radio" class="btn-check" name="categoria" id="Cableado" value="Cableado" required>
                                <label class="btn btn-outline-primary" for="Cableado">Cableado</label>

                                <input type="radio" class="btn-check" name="categoria" id="Infraestructura" value="Infraestructura" required>
                                <label class="btn btn-outline-primary" for="Infraestructura">Infraestructura</label>
                            </div>
                        </div>

                        <!-- Descripción -->
                        <div class="mb-4">
                            <label for="descripcion" class="form-label">Descripción:</label>
                            <input type="text" class="form-control form-control-lg" name="descripcion" id="descripcion" required>
                        </div>

                        <!-- Fecha de Incidencia -->
                        <div class="mb-4">
                            <label for="data" class="form-label">Fecha de Incidencia:</label>
                            <input type="date" class="form-control form-control-lg" name="data" id="data" required>
                        </div>

                        <!-- Estado de la Incidencia -->
                        <div class="mb-4">
                            <label for="estado" class="form-label">Estado de la Incidencia:</label><br>
                            <div class="btn-group flex-wrap" role="group">
                                <input type="radio" class="btn-check" name="estado" id="abierto" value="abierto" required>
                                <label class="btn btn-outline-success" for="abierto">Abierto</label>

                                <input type="radio" class="btn-check" name="estado" id="cerrado" value="cerrado" required>
                                <label class="btn btn-outline-danger" for="cerrado">Cerrado</label>

                                <input type="radio" class="btn-check" name="estado" id="proceso" value="proceso" required>
                                <label class="btn btn-outline-warning" for="proceso">En Proceso</label>
                            </div>
                        </div>

                        <!-- Prioridad -->
                        <div class="mb-4">
                            <label for="prioridad" class="form-label">Prioridad:</label><br>
                            <div class="btn-group flex-wrap" role="group">
                                <input type="radio" class="btn-check" name="prioridad" id="baja" value="baja" required>
                                <label class="btn btn-outline-info" for="baja">Baja</label>

                                <input type="radio" class="btn-check" name="prioridad" id="media" value="media" required>
                                <label class="btn btn-outline-info" for="media">Media</label>

                                <input type="radio" class="btn-check" name="prioridad" id="alta" value="alta" required>
                                <label class="btn btn-outline-info" for="alta">Alta</label>
                            </div>
                        </div>

                        <!-- Foto -->
                        <div class="mb-4">
                            <label for="foto" class="form-label">Foto:</label>
                            <input type="file" class="form-control form-control-lg" name="foto" id="foto">
                        </div>

                        <!-- Fecha de Cierre -->
                        <div class="mb-4">
                            <label for="cierre" class="form-label">Fecha de Cierre:</label>
                            <input type="date" class="form-control form-control-lg" name="cierre" id="cierre">
                        </div>

                        <!-- Botones -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg"><i class="bi bi-upload"></i> Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
