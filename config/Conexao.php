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
    
    



    private static function Conectar_mysql(){
        $dsn = "mysql:dbname=infinitygroup01;host=mysql.infinity-group.net";
        $dbuser = "infinitygroup01";
	$dbpass = "conejo24";
       try{
           if(self::$Connect == null){
               self::$Connect = new PDO($dsn, $dbuser, $dbpass);
               self::$Connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           }
       } catch (PDOException $e) {
           echo "\n=================================\n";
           echo "Nao conectou " . $e->getMessage();
           echo "\n=================================\n";
           die;
       } 
       
       return self::$Connect;
    }
    
    
        
    public static function getConn_mysql(){
        return self::Conectar_mysql();
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