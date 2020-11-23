<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
    <!--Iconos de FontAwesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://kit.fontawesome.com/76bcb4e810.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Document</title>
</head>
<body>
    <!--Navbar header-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#">
    <h4>Gestion de Campañas</h4>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
        <li class="nav-item active ml-3">
        <a class="nav-link" href="/index.html">Home </a>
        </li>
        <li class="nav-item ml-3">
        <a class="nav-link" href="#">Listado<span class="sr-only">(current)</span></a>
        </li>
       
    </ul>
    </div>
    </nav>

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
            $insertDatos= "INSERT INTO Campanias (RazonSocial,Campania, NombreCliente,FechaInicio,FechaFin,Mensaje,Cuil,Email,Telefono) VALUES ('$razon_social','$nombre_campania','$nombre_cliente', '$fecha_inicio','$fecha_fin','$mensaje','$cuil','$email','$telefono')";
            //funciones de insert para cada dato que traemos desde el formulario

            //al ejecutarse result se ejecutara la sentencia sql HAY QUE ESCAPAR DE LAS COMILLAS CON '\'
            $result=odbc_exec($cid,$sql)or die(exit("Error en odbc_exec"));
            $resultInsertDatos = odbc_exec($cid,$insertDatos)or die(exit("error cargando datos"));
            if (!$result)
            {exit("Error in SQL");}
            
            echo   "<div class= \"container pt-3\">"
                        ."<table class=\"table table-striped table-bordered table-responsive tabla-campanias\">"
                            ."<thead>"
                                . "<tr>"
                                .    "<th class=\"col-sm-1\">Razon social</th>"
                                .    "<th class=\"col-sm-1\">Campaña</th>"
                                .    "<th class=\"col-sm-1\">Cliente</th>"
                                .    "<th class=\"col-sm-1\">Fecha Inicio</th>"
                                .    "<th class=\"col-sm-1\">Fecha fin</th>"
                                .    "<th class=\"col-sm-1\">Cuil</th>"
                                .    "<th class=\"col-sm-1\">Email</th>"
                                .    "<th class=\"col-sm-1\">Mensaje</th>"
                                .    "<th class=\"col-sm-1\">Acciones</th>"
                                . "</tr>"
                            ."</thead>"
                            ."<tbody>";
                            while (odbc_fetch_row($result))
                            {
                            $razon_iterador=odbc_result($result,"RazonSocial");
                            $campania_iterador= odbc_result($result,"Campania");
                            $cliente_iterador=odbc_result($result,"NombreCliente");
                            $inicio_iterador=odbc_result($result,"FechaInicio");
                            $fin_iterador=odbc_result($result,"FechaFin");
                            $cuil_iterador=odbc_result($result,"Cuil");
                            $mensaje_iterador=odbc_result($result,"Mensaje");

                            $email_iterador=odbc_result($result,"Email");
                            echo "<tr>"
                                    ."<td>$razon_iterador</td>"
                                    ."<td>$campania_iterador</td>"
                                    ."<td>$cliente_iterador</td>"
                                    ."<td>$inicio_iterador</td>"
                                    ."<td>$fin_iterador</td>"
                                    ."<td>$cuil_iterador</td>"
                                    ."<td>$email_iterador</td>"
                                    ."<td>$mensaje_iterador</td>"
                                    ."<td>"

                                    
                                 ."</tr>";
                                }
            
                        echo "</tbody>"
                             ."</table>"
                        ."</div>";
                        echo "<script language = 'javascript'>
                            $('.tabla_campanias').DataTable({
                                \"language\": {
                                \"sProcessing\":     \"Procesando...\",
                                \"sLengthMenu\":     \"Mostrar _MENU_ registros\",
                                \"sZeroRecords\":    \"No se encontraron resultados\",
                                \"sEmptyTable\":     \"Ningún dato disponible en esta tabla\",
                                \"sInfo\":           \"Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros\",
                                \"sInfoEmpty\":      \"Mostrando registros del 0 al 0 de un total de 0 registros\",
                                \"sInfoFiltered\":   \"(filtrado de un total de _MAX_ registros)\",
                                \"sInfoPostFix\":    \"\",
                                \"sSearch\":         \"Buscar:\",
                                \"sUrl\":            \"\",
                                \"sInfoThousands\":  \",\",
                                \"sLoadingRecords\": \"Cargando...\",
                                \"oPaginate\": {
                                \"sFirst\":    \"Primero\",
                                \"sLast\":     \"Último\",
                                \"sNext\":     \"Siguiente\",
                                \"sPrevious\": \"Anterior\"
                            } );
                                
                            </script>
                            
                        
                        ";
        
            ?>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>    
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"></script>
    <script>
    
    
  
</body>
</html>

