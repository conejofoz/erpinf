<?php

require_once '../modelos/Categoria.php';

$categoria = new Categoria();

$idcategoria = isset($_POST["idcategoria"]) ? limpiarCadena($_POST["idcategoria"]) : "";
$nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";
$descripcion = isset($_POST["descripcion"]) ? limpiarCadena($_POST["descripcion"]) : "";

switch ($_GET["op"]) {
    case 'guardaryeditar':
        if(empty($idcategoria)){
            $rspta=$categoria->insertar($nombre, $descripcion);
            echo $rspta ? "Categoria registrada" : "Categoria no se pudo registrar";
        } else {
            $rspta=$categoria->editar($idcategoria, $nombre, $descripcion);
            echo $rspta ? "Categoria actualizada" : "Categoria no se pudo actualizar";
        }

        break;
    case 'desactivar':
        $rspta=$categoria->desativar($idcategoria);
        echo $rspta ? "Categoria Desactivada" : "Categoria no se puede desactivar";

        break;
    case 'activar':
        $rspta=$categoria->ativar($idcategoria);
        echo $rspta ? "Categoria Activada" : "Categoria no se puede activar";

        break;
    case 'mostrar':
        $rspta=$categoria->mostrar($idcategoria);
        //Codificar o resultado utilizando json
        echo json_encode($rspta);

        break;
    case 'listar':
        $rspta=$categoria->listar();
        //Vamos declarar un array
        $data = Array();
        //while($reg=$rspta->fetch_object()){
        /*foreach ($rspta as $reg){
            $data[] = array(
                "0"=>($reg->condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->idcategoria.')"><i class="fa fa-pencil"></i></button>'.
                ' <button class="btn btn-danger" onclick="desactivar('.$reg->idcategoria.')"><i class="fa fa-close"></i></button>':
                '<button class="btn btn-warning" onclick="mostrar('.$reg->idcategoria.')"><i class="fa fa-pencil"></i></button>'.
                ' <button class="btn btn-primary" onclick="activar('.$reg->idcategoria.')"><i class="fa fa-check"></i></button>',
                "1"=>$reg->nombre,
                "2"=>$reg->descripcion,
                "3"=>($reg->condicion)?'<span class="label bg-green">Activado</span>':
                '<span class="label bg-red">Desactivado</span>'
            );
        }*/
            foreach ($rspta as $reg){
            $data[] = array(
            "0"=>($reg['condicion'])?'<button class="btn btn-warning" onclick="mostrar('.$reg['idcategoria'].')"><i class="fa fa-pencil"></i></button>'.
                ' <button class="btn btn-danger" onclick="desactivar('.$reg['idcategoria'].')"><i class="fa fa-close"></i></button>':
                '<button class="btn btn-warning" onclick="mostrar('.$reg['idcategoria'].')"><i class="fa fa-pencil"></i></button>'.
                ' <button class="btn btn-primary" onclick="activar('.$reg['idcategoria'].')"><i class="fa fa-check"></i></button>',
                "1"=>utf8_encode($reg['nombre']),
                "2"=>utf8_encode($reg['descripcion']),
                "3"=>($reg['condicion'])?'<span class="label label-info">Activado</span>':
                '<span class="label label-danger">Desactivado</span>'
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
}