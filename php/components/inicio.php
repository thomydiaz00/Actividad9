
<?php
            include "../conexion/connPDO.php";
           /*
           if(isset($_post['delete'])){
                $nombre_a_eliminar = mysql_real_escape_string($conn, $_POST['nombre_a_eliminar']);
                $sqlDel = "DELETE FROM campanias WHERE Campania = $nombre_a_eliminar";
                mysqli_query($conn, $sqlDel);
                    
            }

           */
           
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
            //$sql="Select * from Campanias ";
            //funciones de insert para cada dato que traemos desde el formulario

            //al ejecutarse result se ejecutara la sentencia sql HAY QUE ESCAPAR DE LAS COMILLAS CON '\'
            //$result=odbc_exec($cid,$sql)or die(exit("Error en odbc_exec"));
            $ExisteQuery = $base_de_datos->query("select campania from Campanias where campania='$nombre_campania'");
            $lineas = $ExisteQuery->fetch(PDO::FETCH_OBJ);
            if(!$lineas){
                $insertDatos= "INSERT INTO Campanias (RazonSocial,Campania, NombreCliente,FechaInicio,FechaFin,Mensaje,Cuil,Email,Telefono) VALUES ('$razon_social','$nombre_campania','$nombre_cliente', '$fecha_inicio','$fecha_fin','$mensaje','$cuil','$email','$telefono')";
                $resultInsertDatos =$base_de_datos->query($insertDatos);
                if(!$resultInsertDatos){
                    echo "<script> alert(\"error insertando datos\") </script>";
                }{
                    header ("Location: ../../camp_list.php");

                }

            }{
                echo ("<script LANGUAGE='JavaScript'>
                        window.alert('Ya hay una campaña con este nombre');
                        window.location.href='../../camp_list.php';
                        </script>");

            }
            //funciones de insert para cada dato que traemos desde el formulario
			
			//Fin validacion de campañas.
            /*if (!$result)
            {
                exit("Error in SQL");}{
                
            }{
                header("Location: ../../camp_list.php");
            }
*/
        ?>

    
            
    

