<?php

require_once '../modelos/Deposito.php';

$articulo = new Deposito();

$idarticulo = isset($_POST["idarticulo"]) ? limpiarCadena($_POST["idarticulo"]) : "";
$idcategoria = isset($_POST["idcategoria"]) ? limpiarCadena($_POST["idcategoria"]) : "";
$codigo = isset($_POST["codigo"]) ? limpiarCadena($_POST["codigo"]) : "";
$nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";
$stock = isset($_POST["stock"]) ? limpiarCadena($_POST["stock"]) : "";
$descripcion = isset($_POST["descripcion"]) ? limpiarCadena($_POST["descripcion"]) : "";
$imagen = isset($_POST["imagen"]) ? limpiarCadena($_POST["imagen"]) : "";

switch ($_GET["op"]) {
    case 'guardaryeditar':
        
        if(!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name'])){
            $imagen=$_POST["imagenactual"];
        } else {
            $ext = explode(".", $_FILES['imagen']['name']);
            if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png"){
                $imagen = round(microtime(true)) . '.' . end($ext);
                move_uploaded_file($_FILES['imagen']['tmp_name'], '../files/articulos/' . $imagen);
            }
        }
        
        if(empty($idarticulo)){
            $rspta=$articulo->insertar($idcategoria, $codigo, $nombre, $stock, $descripcion, $imagen);
            echo $rspta ? "Articulo registrado" : "Articulo no se pudo registrar";
        } else {
            $rspta=$articulo->editar($idarticulo, $idcategoria, $codigo, $nombre, $stock, $descripcion, $imagen);
            echo $rspta ? "Articulo actualizado" : "Articulo no se pudo actualizar";
        }

        break;
    case 'desactivar':
        $rspta=$articulo->desativar($idarticulo);
        echo $rspta ? "Articulo Desactivado" : "Articulo no se puede desactivar";

        break;
    case 'activar':
        $rspta=$articulo->ativar($idarticulo);
        echo $rspta ? "Articulo Activado" : "Articulo no se puede activar";

        break;
    case 'mostrar':
        $rspta=$articulo->mostrar($idarticulo);
        //Codificar o resultado utilizando json
        echo json_encode($rspta);

        break;
    case 'listar':
        //$rspta=$articulo->listar();
        $x = $_REQUEST["descri"];
        $rspta=$articulo->listarProdutos($x);
        //Vamos declarar un array
        $data = Array();
        foreach ($rspta as $reg) {
            $data[] = array(
                "0"=>$reg['CP_CODPRO'], 
                "1"=> utf8_encode($reg['CP_DESCRILJ']), //banco firebird
                "2"=>$reg['CP_DEPOSITO1'],
                "3"=>$reg['CP_DEPOSITO2'],
                "4"=>$reg['CP_DEPOSITO3'],
                "5"=>$reg['CP_DEPOSITO4'],
                "6"=>$reg['CP_DEPOSITO5'],
                "7"=>$reg['CP_DEPOSITO6'],
                "8"=>$reg['CP_DEPOSITO7'],
                );
        }
        $results = array(
            "sEcho"=>1, //Informacion para el datatables
            "iTotalRecords"=>count($data), //enviamos el total registros ao datatable
            "iTotalDisplayRecords"=>count($data), //enviamos el total de registros a visualizar
            "aaData"=>$data
        );
        echo json_encode($results);
        break;
        
        
    case "selectCategoria":
        require_once "../modelos/Categoria.php";
        $categoria = new Categoria();
        
        $rspta = $categoria->select();
        
        while ($reg = $rspta->fetch_object()){
            echo '<option value='. $reg->idcategoria . '>' . $reg->nombre . '</option>';
        }
        
        break;
        
}