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
                            <h4 class="page-title">Consulta de produtos do depósito</h4> </div>
                        
                        <!-- /.col-lg-12 -->
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            
                                
                                
                                <!-- centro -->
                                <ul class="nav navbar-top-links">
                                <li>
                                <form role="search" class="app-search">
                                    <input type="text" id="busca" name="busca" placeholder="Buscar produtos aqui..." class="form-control"> <a href="#"><i class="fa fa-search"></i></a> 
                                </form>
                                </li>
                                </ul>
                    <!--<input type="text" id="busca2" name="busca2" class="form form-control">-->
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                            <thead>
                            <th>CODIGO</th>
                            <th>DESCRICAO</th>
                            <th>DEP 1</th>
                            <th>DEP 2</th>
                            <th>DEP 3</th>
                            <th>DEP 4</th>
                            <th>DEP 5</th>
                            <th>DEP 6</th>
                            <th>DEP 7</th>
                            </thead>
                            <tbody>                            
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                    </div>
                    <div class="panel-body" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Nombre:</label>
                                <input type="hidden" name="idarticulo" id="idarticulo">
                                <input type="text" class="form-control" name="nombre" id="nombre" maxlength="100" placeholder="Nombre" required>
                            </div>
                            
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Categoria:</label>
                                <select id="idcategoria" name="idcategoria" class="form-control selectpicker" data-live-search="true" required></select>
                            </div>

                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Stock:</label>
                                <input type="number" class="form-control" name="stock" id="stock" required>
                            </div>
                            
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Descripción:</label>
                                <input type="text" class="form-control" name="descripcion" id="descripcion" maxlength="256" placeholder="Descripción">
                            </div>
                            
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Imagen:</label>
                                <input type="file" class="form-control" name="imagen" id="imagen">
                                <input type="hidden" name="imagenactual" id="imagenactual">
                                <img src="" width="150px" height="120px" id="imagenmuestra">
                            </div>
                            
                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <label>Codigo:</label>
                                <input type="text" class="form-control" name="codigo" id="codigo" placeholder="Codigo de barras">
                                <button class="btn btn-success" type="button" onclick="generarbarcode()">Generar</button>
                                <button class="btn btn-info" type="button" onclick="imprimir()">Imprimir</button>
                                <div id="print">
                                    <svg id="barcode"></svg>
                                </div>    
                            </div>

                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Guardar</button>

                                <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                            </div>
                        </form>
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
<script type="text/javascript" src="../public/js/JsBarcode.all.min.js"></script>
<script type="text/javascript" src="../public/js/jquery.PrintArea.js"></script>
<script type="text/javascript" src="scripts/deposito.js"></script>

<?php
}
ob_end_flush();
?>
               