<?php
include_once "app/vistas/layout/head.php";
?>
    </main>

    <div class="content-wrapper">


        <section class="content">



            <div class="container-fluid p-0">

                <div class="row mb-2 mb-xl-3">
                    <div class="col-auto d-none d-sm-block">
                        <h3><strong>Cuarentena</strong> Covid</h3>
                    </div>

                    <div class="col-auto ml-auto text-right mt-n1">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                                <li class="breadcrumb-item"><a href="#">Control Covid</a></li>
                                <li class="breadcrumb-item"><a href="#">Registro</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Cuarentena</li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Tabla de cuarentena</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <input type="hidden" name="accion" value="CUARENTENA">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Fecha de Inicio</th>
                                    <th>Fecha final</th>
                                </tr>
                                </thead>

                                <?php

                                $guardarCuarentena = new \App\Clases\Cuarentena();
                                $result=$guardarCuarentena->mostrarCuarentena();

                                foreach($result as $cuarentena){
                                    ?>


                                    <tr>
                                        <td><?php echo $cuarentena['codigo']; ?></td>
                                        <td><?php echo $cuarentena['nombres']; ?></td>
                                        <td><?php echo $cuarentena['apellidos']; ?></td>
                                        <td><?php echo $cuarentena['fecha_inicio']; ?></td>
                                        <td><?php echo $cuarentena['fecha_final']; ?></td>
                                    </tr>



                                    <?php
                                }
                                ?>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>
    </main>

<?php
include_once "app/vistas/layout/footer.php";
?>