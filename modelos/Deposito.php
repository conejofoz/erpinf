<?php

//Incluimos inicialmente la conexion a la base de datos
require "../config/Conexion.php";
require "../config/Conexao.php";

Class Deposito {

    //Implementamos nuestro constructor
    public function __construct() {
        
    }

    //Implementamos um medoto para insertar registros
    public function insertar($idcategoria, $codigo, $nombre, $stock, $descripcion, $imagen) {
        $sql = "INSERT INTO articulo (idcategoria, codigo, nombre, stock, descripcion, condicion, imagen) "
                . "VALUES ('$idcategoria', '$codigo', '$nombre', '$stock', '$descripcion', '1','$imagen')";
        return ejecutarConsulta($sql);
    }

    //Implementamos um metodo para editar registros
    public function editar($idarticulo, $idcategoria, $codigo, $nombre, $stock, $descripcion, $imagen) {
        $sql = "UPDATE articulo SET idcategoria='$idcategoria', codigo='$codigo', nombre='$nombre', stock='$stock', descripcion='$descripcion', imagen='$imagen' WHERE idarticulo='$idarticulo'";
        return ejecutarConsulta($sql);
    }

    //Implementamos um metodo para desactivar articulos
    public function desativar($idarticulo) {
        $sql = "UPDATE articulo SET condicion='0' WHERE idarticulo='$idarticulo'";
        return ejecutarConsulta($sql);
    }

    //Implementamos um metodo para desactivar articulos
    public function ativar($idarticulo) {
        $sql = "UPDATE articulo SET condicion='1' WHERE idarticulo='$idarticulo'";
        return ejecutarConsulta($sql);
    }

    //Implementar un metodo para mostrar los datos de un registro a modificar
    public function mostrar($idarticulo) {
        $sql = "SELECT * FROM articulo WHERE idarticulo='$idarticulo'";
        return ejecutarConsultaSimpleFila($sql);
    }

    //Implementar un metodo para listar los registros
    public function listar() {
        $sql = "SELECT "
                . "a.idarticulo, "
                . "a.idcategoria, "
                . "c.nombre as categoria, "
                . "a.codigo, "
                . "a.nombre, "
                . "a.stock, "
                . "a.descripcion, "
                . "a.imagen, "
                . "a.condicion "
                . "FROM articulo a "
                . "INNER JOIN categoria c on a.idcategoria=c.idcategoria";
        return ejecutarConsulta($sql);
    }

    public function listarProdutos($x) {
        try {
            $p = '%' . trim($x) . '%';
            //$p = '%' . trim($x);
            //$p = $x . '%';
            $PDO = new Conexao();
            $PDO = new Conexao();
            $sql = "SELECT CP_CODPRO, "
                    //.utf8_encode("CP_DESCRILJ,") //NAO PRECISA... SO ANTES DE RETORNAR PARA O JSON JA FUNCIONA
                    . "CP_DESCRILJ, "
                    . "CP_DEPOSITO1, "
                    . "CP_DEPOSITO2, "
                    . "CP_DEPOSITO3, "
                    . "CP_DEPOSITO4, "
                    . "CP_DEPOSITO5, "
                    . "CP_DEPOSITO6, "
                    . "CP_DEPOSITO7, "
                    . "CP_CODGRU "
                    . "FROM produtos where CP_DESCRILJ LIKE :parametro ";
            $query = $PDO->getConn()->prepare($sql);
            $query->bindValue(':parametro', $p);
            $query->execute();
            return $query;
        } catch (Exception $ex) {
            echo "errrrrrrrrro" .$ex->getMessage();
            die;
        }
    }

    //Implementar un metodo para listar los registros activos
    public function listarActivos() {
        $sql = "SELECT "
                . "a.idarticulo, "
                . "a.idcategoria, "
                . "c.nombre as categoria, "
                . "a.codigo, "
                . "a.nombre, "
                . "a.stock, "
                . "a.descripcion, "
                . "a.imagen, "
                . "a.condicion "
                . "FROM articulo a "
                . "INNER JOIN categoria c on a.idcategoria=c.idcategoria "
                . "WHERE a.condicion='1'";
        return ejecutarConsulta($sql);
    }

    //implementar un metodo para listar los registros activos, su ultimo precio y el stock (vamos a unir con el ultimo registro de la tabla detalle_ingresso
    public function listarActivosVenta() {
        $sql = "SELECT "
                . "a.idarticulo, "
                . "a.idcategoria, "
                . "c.nombre as categoria, "
                . "a.codigo, "
                . "a.nombre, "
                . "a.stock, "
                . "(SELECT precio_venta FROM detalle_ingreso WHERE idarticulo=a.idarticulo order by iddetalle_ingreso desc limit 0,1) as precio_venta, "
                . "a.descripcion, "
                . "a.imagen, "
                . "a.condicion "
                . "FROM articulo a "
                . "INNER JOIN categoria c on a.idcategoria=c.idcategoria "
                . "WHERE a.condicion='1'";
        return ejecutarConsulta($sql);
    }

}
