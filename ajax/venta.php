<?php

if (strlen(session_id()) < 1)
    session_start();

require_once "../modelos/Venta.php";

$venta = new Venta();

$idventa = isset($_POST["idventa"]) ? limpiarCadena($_POST["idventa"]) : "";
$idcliente = isset($_POST["idcliente"]) ? limpiarCadena($_POST["idcliente"]) : "";
$idusuario = $_SESSION["idusuario"];
$tipo_comprovante = isset($_POST["tipo_comprovante"]) ? limpiarCadena($_POST["tipo_comprovante"]) : "";
$serie_comprovante = isset($_POST["serie_comprovante"]) ? limpiarCadena($_POST["serie_comprovante"]) : "";
$num_comprovante = isset($_POST["num_comprovante"]) ? limpiarCadena($_POST["num_comprovante"]) : "";
$fecha_hora = isset($_POST["fecha_hora"]) ? limpiarCadena($_POST["fecha_hora"]) : "";
$impuesto = isset($_POST["impuesto"]) ? limpiarCadena($_POST["impuesto"]) : "";
$total_venta = isset($_POST["total_venta"]) ? limpiarCadena($_POST["total_venta"]) : "";

switch ($_GET["op"]) {
    case 'guardaryeditar':
        if (empty($idventa)) {
            $rspta = $venta->insertar($idcliente, $idusuario, $tipo_comprovante, $serie_comprovante, $num_comprovante, $fecha_hora, $impuesto, $total_venta, $_POST["idarticulo"], $_POST["cantidad"], $_POST["precio_venta"], $_POST["descuento"]);
            echo $rspta ? "Venta registrada" : "No se pudieron registrar todos los datos de la venta";
        } else {
            echo $rspta = "Venta id" . $idventa;
        }
        break;

    case 'anular':
        $rspta = $venta->anular($idventa);
        echo $rspta ? "Venta anulada" : "Venta no se puede anular";
        break;

    case 'mostrar':
        $rspta = $venta->mostrar($idventa);
        //Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;

    case 'listarDetalle':
        //Recibimos el idventa
        /* $id=$_GET['id'];

          $rspta = $venta->listarDetalle($id);
          $total=0;
          echo '<thead style="background-color:#A9D0F5">
          <th>Opciones</th>
          <th>Artículo</th>
          <th>Cantidad</th>
          <th>Precio Venta</th>
          <th>Descuento</th>
          <th>Subtotal</th>
          </thead>';

          while ($reg = $rspta->fetch_object())
          {
          echo '<tr class="filas"><td></td><td>'.$reg->nombre.'</td><td>'.$reg->cantidad.'</td><td>'.$reg->precio_venta.'</td><td>'.$reg->descuento.'</td><td>'.$reg->subtotal.'</td></tr>';
          $total=$total+($reg->precio_venta*$reg->cantidad-$reg->descuento);
          }
          echo '<tfoot>
          <th>TOTAL</th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th><h4 id="total">S/.'.$total.'</h4><input type="hidden" name="total_venta" id="total_venta"></th>
          </tfoot>'; */

        //******
        //$id=$_GET['id'];
        $id = $_REQUEST["idventa"];
        $rspta = $venta->listarDetalle($id);
        //Vamos a declarar un array
        $data = Array();
        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "0" => '',
                "1" => $reg->nombre,
                "2" => $reg->cantidad,
                "3" => $reg->precio_venta,
                "4" => $reg->descuento,
                "5" => $reg->subtotal,
                "6" => ''
            );
        }
        $results = array(
            "sEcho" => 1, //Información para el datatables
            "iTotalRecords" => count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords" => count($data), //enviamos el total registros a visualizar
            "aaData" => $data);
        echo json_encode($results);
        //******



        break;

    case 'listar':
        $rspta = $venta->listar();
        //Vamos a declarar un array
        $data = Array();

        while ($reg = $rspta->fetch_object()) {
            if ($reg->tipo_comprovante == 'Ticket') {
                $url = '../reportes/exTicket.php?id=';
            } else {
                $url = '../reportes/exFactura.php?id=';
            }

            $data[] = array(
                "0" => $reg->fecha,
                "1" => $reg->cliente,
                "2" => $reg->usuario,
                "3" => $reg->tipo_comprovante,
                "4" => $reg->serie_comprovante . '-' . $reg->num_comprovante,
                "5" => $reg->total_venta,
                "6" => ($reg->estado == 'Aceptado') ? '<span class="label label-info">Aceptado</span>' : '<span class="label label-danger">Anulado</span>',
                "7" => (($reg->estado == 'Aceptado') ? '<button class="btn btn-outline btn-warning btn-circle" onclick="mostrar(' . $reg->idventa . ')"><i class="fa fa-eye"></i></button>' .
                        ' <button class="btn btn-outline btn-primary btn-1b btn-circle" onclick="anular(' . $reg->idventa . ')"><i class="fa fa-close"></i></button>' :
                        '<button class="btn btn-outline btn-warning btn-circle" onclick="mostrar(' . $reg->idventa . ')"><i class="fa fa-eye"></i></button>') .
                '<a target="_blank" href="' . $url . $reg->idventa . '"> <button class="btn btn-outline btn-info btn-circle"><i class="fa fa-file"></i></button></a>'
            );
        }
        $results = array(
            "sEcho" => 1, //Información para el datatables
            "iTotalRecords" => count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords" => count($data), //enviamos el total registros a visualizar
            "aaData" => $data);
        echo json_encode($results);

        break;

    case 'selectCliente':
        require_once "../modelos/Persona.php";
        $persona = new Persona();

        $rspta = $persona->listarC();
        echo '<option value="0">' . "Selecione um cliente" . '</option>';   
        while ($reg = $rspta->fetch_object()) {
            echo '<option value=' . $reg->idpersona . '>' . $reg->nombre . '</option>';
        }
        break;

    case 'listarArticulosVenta':
        require_once "../modelos/Articulo.php";
        $articulo = new Articulo();

        $rspta = $articulo->listarActivosVenta();
        //Vamos a declarar un array
        $data = Array();

        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "0" => '<button class="btn btn-outline btn-circle btn-warning" onclick="agregarDetalle(' . $reg->idarticulo . ',\'' . $reg->nombre . '\',\'' . $reg->precio_venta . '\')"><span class="fa fa-plus"></span></button>',
                "1" => $reg->nombre,
                "2" => $reg->categoria,
                "3" => $reg->codigo,
                "4" => $reg->stock,
                "5" => $reg->precio_venta,
                "6" => "<img src='../files/articulos/" . $reg->imagen . "' height='50px' width='50px' >"
            );
        }
        $results = array(
            "sEcho" => 1, //Información para el datatables
            "iTotalRecords" => count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords" => count($data), //enviamos el total registros a visualizar
            "aaData" => $data);
        echo json_encode($results);
        break;
}
?>