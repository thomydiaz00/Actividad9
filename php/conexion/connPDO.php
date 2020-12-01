<?php

/*$dsn = "Prueba"; 
//debe ser de sistema no de usuario
$usuario = "";
$clave="";

//realizamos la conexion mediante odbc
$cid=odbc_connect($dsn, $usuario, $clave);

if (!$cid){
	exit("error".$cid);
}	
*/
$password = "";
$user = "root";
$nombreBd= "morleydb";
try{
    $base_de_datos = new PDO('mysql:host=localhost;dbname='.$nombreBd,$user,$password);
} catch(Exception $e){
    echo "<script>alert('Error en la conexion')</script>";

}



?>