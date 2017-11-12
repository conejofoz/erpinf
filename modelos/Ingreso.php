<?php

//Incluimos inicialmente la conexion a la base de datos
require "../config/Conexion.php";

Class Ingreso {

    //Implementamos nuestro constructor
    public function __construct() {
        
    }

    //Implementamos um medoto para insertar registros
    public function insertar($idproveedor, $idusuario, $tipo_comprovante, $serie_comprovante, $num_comprovante, $fecha_hora, $impuesto, $total_compra, 
            $idarticulo, $cantidad, $precio_compra, $precio_venta) {
        $sql = "INSERT INTO ingreso (idproveedor, idusuario, tipo_comprovante, serie_comprovante, num_comprovante, fecha_hora, impuesto, total_compra, estado) "
                . "VALUES ('$idproveedor', '$idusuario', '$tipo_comprovante', '$serie_comprovante', '$num_comprovante', '$fecha_hora', '$impuesto', '$total_compra', 'Aceptado')";
        //return ejecutarConsulta($sql);
        $idingresonew = ejecutarConsulta_retornarID($sql);


        $num_elementos = 0;
        $sw = true;

        while ($num_elementos < count($idarticulo)) {
            $sql_detalle = "INSERT INTO detalle_ingreso(idingreso, idarticulo, cantidad, precio_compra, precio_venta) "
                    . "VALUES('$idingresonew', '$idarticulo[$num_elementos]', '$cantidad[$num_elementos]', '$precio_compra[$num_elementos]', '$precio_venta[$num_elementos]')";
            ejecutarConsulta($sql_detalle) or $sw = false;
            $num_elementos = $num_elementos + 1;
        }

        return $sw;
    }

    //Implementamos um metodo para desactivar categorias
    public function anular($idingreso) {
        $sql = "UPDATE ingreso SET estado='Anulado' WHERE idingreso='$idingreso'";
        return ejecutarConsulta($sql);
    }


    //Implementar un metodo para mostrar los datos de un registro a modificar
    public function mostrar($idingreso) {
        $sql = "SELECT i.idingreso, DATE(i.fecha_hora) as fecha, i.idproveedor, p.nombre as proveedor, u.idusuario, u.nombre as usuario, i.tipo_comprovante, i.serie_comprovante, i.num_comprovante, i.total_compra, i.impuesto, i.estado FROM ingreso i INNER JOIN persona p ON i.idproveedor=p.idpersona INNER JOIN usuario u ON i.idusuario=u.idusuario WHERE idingreso='$idingreso'";
        return ejecutarConsultaSimpleFila($sql);
    }
    
    
    
    public function listarDetalle($idingreso){
        $sql = "SELECT di.idingreso, di.idarticulo, a.nombre, di.cantidad, di.precio_compra, di.precio_venta "
                . "FROM detalle_ingreso di "
                . "INNER JOIN articulo a ON di.idarticulo=a.idarticulo "
                . "WHERE di.idingreso='$idingreso'";
        return ejecutarConsulta($sql);
    }

    //Implementar un metodo para listar los registros
    public function listar() {
        $sql = "SELECT i.idingreso, DATE(i.fecha_hora) as fecha, i.idproveedor, p.nombre as proveedor, u.idusuario, u.nombre as usuario, i.tipo_comprovante, i.serie_comprovante, i.num_comprovante, i.total_compra, i.impuesto, i.estado FROM ingreso i INNER JOIN persona p ON i.idproveedor=p.idpersona INNER JOIN usuario u ON i.idusuario=u.idusuario ORDER BY i.idingreso desc ";
        return ejecutarConsulta($sql);
    }

    public function listamarcados($idingreso) {
        $sql = "SELECT * FROM usuario_permiso WHERE idusuario='$idusuario'";
        return ejecutarConsulta($sql);
    }
    
    
    
    //funcion para verificar aceso ao sistema
    public function verificar($login, $clave){
        $sql = "SELECT idusuario, nombre, tipo_documento, num_documento, telefono, email, cargo, imagen, login "
                . "FROM usuario "
                . "WHERE login='$login' AND clave='$clave' AND condicion='1'";
        return ejecutarConsulta($sql);
    }

}
