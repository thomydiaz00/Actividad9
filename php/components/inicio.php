<!DOCTYPE html>
<html lang="es">
<head>
<meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
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
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
<!-- Navbar para Menu: Gestion Campañas -->
    <a class="navbar-brand" href="../../index.html">Gestión de Campañas</a>

    <!-- Botoneras:-->
    <ul class="navbar-nav">
        <li class="nav-item">
        <div class="btn-group">
    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Campaña
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="../../formulario.html">Agregar</a> 
        <!-- En href: dire. a donde redirecciona. Acá debería ser al html que Thomas realizo: formulario.html -->
        <a class="dropdown-item" href="#">Listar</a>
        <!-- En href: dire. a donde redirecciona. En este caso: el camp_list.html -->
    </div>
    </div>
    <div class="btn-group">
    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Reportes
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="../../reportesagregar.html">Agregar</a>
    </div>
    </div>
        </li>
    </ul>
    </nav>
    <!--Barra de busqueda a implementar-->
    <!--Barra de busqueda a implementar-->
    <div class="container pt-2">
        <form>
            <div class="input-group">
            <input type="text" class= "form-control" id="barra_busqueda" required placeholder="Buscar...">
            <div class="input-group-append" id="button-addon4">
                <input type="submit" value="Search" button class="btn btn-outline-secondary"/>
                <input type="button" value="Clear" id="btnClear"  button class="btn btn-outline-secondary"/>
            </div>	
            </div>	 	  	
        </form>
    </div>
    <!--Misma logica que en inicio.php solo que no agregamos, solo usamos iteradores para traer los datos e la b.d-->
    <div class="d-flex justify-content-center pt-2">
        <a class="btn btn-lg btn-primary" href="../../formulario.html">Agregar Campaña</a>
    </div>
    <div class="container pt-2">
        <div class="alert alert-success" role="alert">
            Registro agregado!
        </div>
    </div>
    
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
            //$sql="Select * from Campanias ";
            $sqlCom = "Select * from Campanias";
            $insertDatos= "INSERT INTO Campanias (RazonSocial,Campania, NombreCliente,FechaInicio,FechaFin,Mensaje,Cuil,Email,Telefono) VALUES ('$razon_social','$nombre_campania','$nombre_cliente', '$fecha_inicio','$fecha_fin','$mensaje','$cuil','$email','$telefono')";
            //funciones de insert para cada dato que traemos desde el formulario

            //al ejecutarse result se ejecutara la sentencia sql HAY QUE ESCAPAR DE LAS COMILLAS CON '\'
            //$result=odbc_exec($cid,$sql)or die(exit("Error en odbc_exec"));
            $resultInsertDatos =$conn->query($insertDatos);
            $result = $conn->query($sqlCom);
             //odbc_exec($cid,$insertDatos)or die(exit("error cargando datos"));
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
                            while ($rCom=$result->fetch_array())
                            {
                                $razon_iterador=$rCom["RazonSocial"];
                                $campania_iterador= $rCom["Campania"];
                                $cliente_iterador=$rCom["NombreCliente"];
                                $inicio_iterador=$rCom["FechaInicio"];
                                $fin_iterador=$rCom["FechaFin"];
                                $cuil_iterador=$rCom["Cuil"];
                                $mensaje_iterador=$rCom["Mensaje"];
    
                                $email_iterador=$rCom["Email"];
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
                                    ."<div class=\"d-flex align-items-stretch\">"
                                        ."<div class=\"p-2\">" 
                                            ."<a class =\"btn btn-warning\">" 
                                            ."<span class=\"fa fa-pencil fa-fw\"></span>Editar"
                                            ."</a>" 
                                        ."</div>"
                                        ."<div class=\"p-2\">"
                                            ."<a  class = \"btn btn-danger\">"
                                            ."<span class=\"fas fa-trash-alt\"></span>Eliminar!"
                                            ."</a>"
                                        ."</div>" 
                                    ."</td>"
                                 ."</tr>";
                                }
            
                        echo "</tbody>"
                             ."</table>"
                        ."</div>";
                        
                        
        
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

