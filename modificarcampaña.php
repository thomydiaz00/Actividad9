
<?php
    include_once "php/conexion/connPDO.php";


    $razon_social=$_POST['razon_social'];
    $nombre_campania=$_POST['nombre_campania'];
    $nombre_cliente=$_POST['nombre_cliente'];
    $fecha_inicio=$_POST['fecha_inicio'];
    $fecha_fin=$_POST['fecha_fin'];
    $mensaje=$_POST['mensaje'];
    $cuil= $_POST['cuil'];
    $email= $_POST['email'];

    $sentencia = $base_de_datos->prepare("UPDATE Campanias SET RazonSocial=:razonSocial, NombreCliente=:nombre, FechaInicio =:fechaIni, FechaFin=:fechaFin, Cuil =:cuil, Email=:email, Mensaje =:mensaje WHERE Campania=:camp;  ");
    $sentencia->bindParam(':nombre', $nombre_cliente);
    $sentencia->bindParam(':razonSocial', $razon_social);
    $sentencia->bindParam(':fechaIni', $fecha_inicio);
    $sentencia->bindParam(':fechaFin', $fecha_fin);
    $sentencia->bindParam(':cuil', $cuil);
    $sentencia->bindParam(':email', $email);
    $sentencia->bindParam(':mensaje', $mensaje);
    $sentencia->bindParam(':camp', $nombre_campania);


    $modificar = $sentencia->execute();
   if (!modificar){
       echo "error insertando datos";
   }{
       header ("Location: camp_list.php");
   }

    
?>
