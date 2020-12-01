<?php
include_once "php/conexion/connPDO.php";
$campania = $_POST['campania_a_eliminar'];
$sql = $base_de_datos->prepare("DELETE FROM Campanias WHERE Campania = :campania");
$sql->bindParam(':campania',$campania);

$sql->execute();
header ("Location: camp_list.php");



?>