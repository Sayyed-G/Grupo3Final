<?php
include_once "app/vistas/layout/head.php";
?>
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row mb-2 mb-xl-3">
                <div class="col-auto d-none d-sm-block">
                    <h3><strong>HISORIAL</strong> PERSONAS</h3>
                </div>

                <div class="col-auto ml-auto text-right mt-n1">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                            <li class="breadcrumb-item"><a href="#">Personas & PNP</a></li>
                            <li class="breadcrumb-item"><a href="#">Registro</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Persona</li>
                        </ol>
                    </nav>
                </div>
            </div>


            <div class="row">
                <div class="col-12 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Buscar historial de personas</h5>
                            <h6 class="card-subtitle text-muted">Buscar con el dni.</h6>
                        </div>
                        <div class="card-body">
                            <form id="formBuscarHistorialClinico">
                                <div class="mb-3 row">
                                    <label class="col-form-label col-sm-2 text-sm-right">DNI</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <input type="hidden" name="accion" id="accion" value="HISTORIALCLINICO">
                                            <input type="text" class="form-control" name="dni" id="dni" placeholder="Ingrese documento">
                                            <span class="input-group-btn">
												<button class="btn btn-primary" type="button" onclick="buscarHistorialClinico()">Buscar</button>
												</span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row wrapperHistorialClinico" >

                <div class="col-12 datosPaciente" style="display:none;">
                    <div class="mt-5" style="padding:20px;">
                        <table class="table table-bordered table-hover table-striped">
                            <tr>
                                <td>DNI:</td>
                                <td class="dniPacienteMostrar"></td>
                            </tr>
                            <tr>
                                <td>NOMBRE(S):</td>
                                <td class="nombrePacienteMostrar"></td>
                            </tr>
                            <tr>
                                <td>APELLIDOS:</td>
                                <td class="apellidosPacienteMostrar"></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="col-12 mt-5 contenidoHistorialClinico" style="border-radius:25px; padding:50px; display:none;">


                </div>

            </div>


        </div>
    </main>
<?php
include_once "app/vistas/layout/footer.php";
?>