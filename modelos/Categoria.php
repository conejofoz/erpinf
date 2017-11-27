<?php
//Incluimos inicialmente la conexion a la base de datos
require "../config/Conexion.php";
require "../config/Conexao.php";

Class Categoria{
    //Implementamos nuestro constructor
    public function __construct() {
        
    }
    
    //Implementamos um medoto para insertar registros
    public function insertar($nombre, $descripcion){
        $sql = "INSERT INTO categoria (nombre,descripcion,condicion) "
                . "VALUES ('$nombre','$descripcion', '1')";
        return ejecutarConsulta($sql);
    }
    
    
    //Implementamos um metodo para editar registros
    public function editar($idcategoria, $nombre,$descripcion){
        $sql="UPDATE categoria SET nombre='$nombre', descripcion='$descripcion' WHERE idcategoria='$idcategoria'";
        return ejecutarConsulta($sql);
    }
    
    //Implementamos um metodo para desactivar categorias
    public function desativar($idcategoria){
        $sql="UPDATE categoria SET condicion='0' WHERE idcategoria='$idcategoria'";
        return ejecutarConsulta($sql);
    }
    //Implementamos um metodo para desactivar categorias
    public function ativar($idcategoria){
        $sql="UPDATE categoria SET condicion='1' WHERE idcategoria='$idcategoria'";
        return ejecutarConsulta($sql);
    }
    
    
    
    //Implementar un metodo para mostrar los datos de un registro a modificar
    public function mostrar($idcategoria){
        $sql="SELECT * FROM categoria WHERE idcategoria='$idcategoria'";
        return ejecutarConsultaSimpleFila($sql);
    }
    //Implementar un metodo para listar los registros
    public function listar_old(){
        $sql="SELECT * FROM categoria";
        return ejecutarConsulta($sql);
    }
    
    
    
    public function listar_tentando_com_objeto_retornando(){
        $pdo = new Conexao();
        $sql="SELECT idcategoria, nombre, descripcion, condicion FROM categoria";
        $query = $pdo->getConn_mysql()->prepare($sql);
        //$query->bindValue(':parametro', $parametro);
        $query->execute();
        //return $query->fetchObject();
        ////foreach ($query as $q){
        ////    echo $q['nombre'];
       //// }
       //// die;
        
        $resultado = $query->fetchAll(PDO::FETCH_OBJ);
        print_r($resultado);
        return $resultado;
    }
    public function listar(){
        $pdo = new Conexao();
        $sql="SELECT idcategoria, nombre, descripcion, condicion FROM categoria";
        $query = $pdo->getConn_mysql()->prepare($sql);
        //$query->bindValue(':parametro', $parametro);
        $query->execute();
        return $query;
    }
    
    
        public function listarProdutos($x) {
        try {
            $p = '%' . trim($x) . '%';
            $PDO = new Conexao();
            $sql = "SELECT CP_CODPRO, "
                    . "CP_DESCRILJ, "
                    . "CP_CODGRU "
                    . "FROM produtos where CP_DESCRILJ LIKE :parametro ";
            $query = $PDO->getConn()->prepare($sql);
            $query->bindValue(':parametro', $p);
            $query->execute();
            return $query;
        } catch (Exception $ex) {
            echo "Erro ao listar produtos " .$ex->getMessage();
            die;
        }
    }
    
    
    
    
    
    //Implementar un metodo para listar los registros y mostrar en el select
    public function select(){
        $sql="SELECT * FROM categoria WHERE condicion=1";
        return ejecutarConsulta($sql);
    }
    
    
    
    
}
