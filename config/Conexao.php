<?php

class Conexao {

   
    private static $Connect = null;
   
    private static function Conectar(){
       //$dsn = "firebird:dbname=c:/guri/dados/inf.pbr;host=143.255.141.88:3050";
	//$dbuser = "SYSDBA";
	//$dbpass = "masterkey";

        $dsn = "firebird:dbname=firebird.infinity-group.net:/firebird/infinity-group.gdb;host=firebird.infinity-group.net";
        $dbuser = "infinity-group";
	$dbpass = "conejo24";
       try{
           if(self::$Connect == null){
               self::$Connect = new PDO($dsn, $dbuser, $dbpass);
           }
       } catch (PDOException $e) {
           echo "\n=================================\n";
           echo "Nao conectou " . $e->getMessage();
           echo "\n=================================\n";
           die;
       } 
       self::$Connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       return self::$Connect;
    }
    
    
    
        
    public static function getConn(){
        return self::Conectar();
    }
    

}




/*
include 'Conexao.php';

$PDO = new Conexao();
$sql = "SELECT * FROM clientes";
$query = $PDO->getConn()->prepare($sql);
$query->execute();
$resultado = $query->fetchAll();

foreach ($resultado as $cliente) {
    echo $cliente['NOME'];
}

 *  */