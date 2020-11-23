<?php
include "../conexion/conn.php";
//estos son los datos que traemos desde el formulario. Hacemos referencia con su 'name' en html
$razon_social=$_POST['razon_social'];
$nombre_campania=$_POST['nombre_campania'];
$nombre_cliente=$_POST['nombre_cliente'];
$fecha_inicio=$_POST['fecha_inicio'];
$fecha_fin=$_POST['fecha_fin'];
$mensaje=$_POST['mensaje'];
$cuil= $_POST['cuil'];
$email= $_POST['email'];
$telefono= $_POST['numero_telefono_cliente'];
// Definimos la funcion select para mostrar toda la tabla"
$sql="Select * from Campanias ";
//funciones de insert para cada dato que traemos desde el formulario

$insertDatos= "INSERT INTO Campanias (RazonSocial,Campania, NombreCliente,FechaInicio,FechaFin,Mensaje,Cuil,Email,Telefono) VALUES ('$razon_social','$nombre_campania','$nombre_cliente', '$fecha_inicio','$fecha_fin','$mensaje','$cuil','$email','$telefono')";

//al ejecutarse result se ejecutara la sentencia sql
$result=odbc_exec($cid,$sql)or die(exit("Error en odbc_exec"));
$resultInsertDatos = odbc_exec($cid,$insertDatos)or die(exit("error cargando datos"));







//Se hace el select generando una tabla
print odbc_result_all($result,"border=1");
?>