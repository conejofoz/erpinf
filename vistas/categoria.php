<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();

if(!isset($_SESSION["nombre"])){
    header("Location? login.html");
} else {
    
//} fecha no final do arquivo

require 'header.php';

if($_SESSION['almacen']==1){
?>
            <!-- ============================================================== -->
            <!-- Page Content -->
            <!-- ============================================================== -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row bg-title">
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <h4 class="page-title">Categorias de produto</h4> </div>
                        
                        <!-- /.col-lg-12 -->
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            
                                
                                
                                <div class="box-header with-border">
                          <h1 class="box-title">Categoria <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                                <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                          <tfoot>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                          </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Nombre:</label>
                            <input type="hidden" name="idcategoria" id="idcategoria">
                            <input type="text" class="form-control" name="nombre" id="nombre" maxlength="50" placeholder="Nombre" required>
                          </div>
                          <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <label>Descripción:</label>
                            <input type="text" class="form-control" name="descripcion" id="descripcion" maxlength="256" placeholder="Descripción">
                          </div>
                          <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                            <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                          </div>
                        </form>
                    </div>
                                <div class="button-box">
                                <button class="tst1 btn btn-info">Info Message</button>
                                <button class="tst2 btn btn-warning">Warning Message</button>
                                <button class="tst3 btn btn-success">Success Message</button>
                                <button class="tst4 btn btn-danger">Danger Message</button>
                            </div>
                    <!--Fin centro -->
                                
                                
                                
                                
                                
                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->
               
            <?php

} else { //fim de verificacao de permisso
    require 'noacceso.php';
}

require 'footer.php';
?>
               
    
  
<script type="text/javascript" src="scripts/categoria.js"></script>

<?php
}
ob_end_flush();
?>