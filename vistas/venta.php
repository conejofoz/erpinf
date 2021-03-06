<?php
//Activamos el almacenamiento en el buffer
ob_start();
session_start();

if (!isset($_SESSION["nombre"])) {
    header("Location: login.html");
} else {
    require 'header.php';

    if ($_SESSION['ventas'] == 1) {
        ?>



        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Vendas</h4> </div>

                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <div class="box-header with-border">
                                <h1 class="box-title"><button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Nova venda</button></h1>
                                <div class="box-tools pull-right">

                                </div>
                            </div>
                            <!-- /.box-header -->
                            <!-- centro -->
                            <div class="panel-body table-responsive" id="listadoregistros">
                                <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                                    <thead>
                                    <th>Fecha</th>
                                    <th>Cliente</th>
                                    <th>Usuario</th>
                                    <th>Documento</th>
                                    <th>Número</th>
                                    <th>Total Venta</th>
                                    <th>Estado</th>
                                    <th>Opciones</th>
                                    </thead>
                                    <tbody>                            
                                    </tbody>
                                    <tfoot>
                                    <th>Fecha</th>
                                    <th>Proveedor</th>
                                    <th>Usuario</th>
                                    <th>Documento</th>
                                    <th>Número</th>
                                    <th>Total Venta</th>
                                    <th>Estado</th>
                                    <th>Opciones</th>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="panel-body" id="formularioregistros">


                                <form name="formulario" id="formulario" method="POST">
                                    <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                        <label>Cliente(*):</label>
                                        <input type="hidden" name="idventa" id="idventa">
                                        <select id="idcliente" name="idcliente" class="form-control selectpicker" data-live-search="true" >

                                        </select>
                                    </div>
                                    <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                        <label>Fecha(*):</label>
                                        <input type="date" class="form-control" name="fecha_hora" id="fecha_hora" required="">
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <label>Tipo Comprovante(*):</label>
                                        <select name="tipo_comprovante" id="tipo_comprovante" class="form-control selectpicker" required="">
                                            <option value="Boleta">Boleta</option>
                                            <option value="Factura">Factura</option>
                                            <option value="Ticket">Ticket</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">
                                        <label>Serie:</label>
                                        <input type="text" class="form-control" name="serie_comprovante" id="serie_comprovante" maxlength="7" placeholder="Serie">
                                    </div>
                                    <div class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">
                                        <label>Número:</label>
                                        <input type="text" class="form-control" name="num_comprovante" id="num_comprovante" maxlength="10" placeholder="Número" required="">
                                    </div>
                                    <div class="form-group col-lg-2 col-md-2 col-sm-6 col-xs-12">
                                        <label>Impuesto:</label>
                                        <input type="text" class="form-control" name="impuesto" id="impuesto" required="">
                                    </div>

                                    <div class="form-group col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <a data-toggle="modal" href="#myModal">           
                                            <button id="btnAgregarArt" type="button" class="btn btn-primary"> <span class="fa fa-plus"></span> Consulta de produtos</button>
                                        </a>
                                    </div>

                                    <div class="table-responsive col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <table width="100%" id="detalles" class="table table-striped table-bordered table-condensed table-hover table-responsive">
                                            <thead style="background-color:#A9D0F5">
                                            <th>Remover</th>
                                            <th>Produto</th>
                                            <th>Quantidade</th>
                                            <th>Preço</th>
                                            <th>Desconto</th>
                                            <th>Sub-Total</th>
                                            <th>Atualizar</th>
                                            </thead>
                                            <tfoot>

                                            </tfoot>
                                            <tbody>

                                            </tbody>
                                        </table>



                                    </div> <!-- fim div table responsive -->


                                    <!-- testando -->
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <h1>Total</h1> 
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">    
                                            <!--<div class="pull-right">
                                                <span class="hidden-xs circle circle-md bg-success di vm"><i class="ti-plus"></i></span><div class="di vm"><h1 class="m-b-0" id="total">$ 0,00</h1> <input type="hidden" name="total_venta" id="total_venta"></div>
                                            </div>-->
                                            <h1 class="pull-right m-b-0" id="total">$ 0,00</h1> <input type="hidden" name="total_venta" id="total_venta">
                                        </div>
                                        <!-- fim testando -->



                                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i> Gravar</button>
                                            <button id="btnCancelar" class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left">Voltar</i></button>
                                        </div>
                                </form>

                            </div>
                            <!--Fin centro -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->


            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
                <div class="modal-dialog" style="width: 90% !important;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Selecione um produto</h4>
                        </div>
                        <div class="modal-body table-responsive">
                            <table id="tblarticulos" class="table table-striped table-bordered table-condensed table-hover">
                                <thead>
                                <th></th>
                                <th>Produto</th>
                                <th>Categoria</th>
                                <th>Código</th>
                                <th>Estoque</th>
                                <th>Preço</th>
                                <th>Imagem</th>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        </div>        
                    </div>
                </div>
            </div>  
            <!-- Fin modal -->
            <?php
        } else {
            require 'noacceso.php';
        }

        require 'footer.php';
        ?>
        <script type="text/javascript" src="scripts/venta.js"></script>
        <?php
    }
    ob_end_flush();
    ?>



