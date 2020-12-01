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
    <!--Navbar header-->
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
<!-- Navbar para Menu: Gestion Campañas -->
    <a class="navbar-brand" href="index.html">Gestión de Campañas</a>

    <!-- Botoneras:-->
    <ul class="navbar-nav">
        <li class="nav-item">
        <div class="btn-group">
    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Campaña
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="formulario.html">Agregar</a> 
        <!-- En href: dire. a donde redirecciona. Acá debería ser al html que Thomas realizo: formulario.html -->
        <a class="dropdown-item" href="../../camp_list.php">Listar</a>
        <!-- En href: dire. a donde redirecciona. En este caso: el camp_list.html -->
    </div>
    </div>
    <div class="btn-group">
    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Reportes
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="reportesagregar.html">Agregar</a>
    </div>
    </div>
        </li>
    </ul>
    </nav>
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
        <a class="btn btn-lg btn-primary" href="formulario.php">Agregar Campaña</a>
    </div>
    <?php
            include_once "php/conexion/connPDO.php";
            $sqlCampanias = $base_de_datos->query("Select * from Campanias;");
            $registros = $sqlCampanias->fetchAll(PDO::FETCH_OBJ);
            ?>
            <div class= "container pt-3">
                <table class="table table-striped table-bordered table-responsive tabla_campanias">
                    <thead>
                        <tr>
                            <th class="col-sm-1">Razon social</th>
                            <th class="col-sm-1">Campaña</th>
                            <th class="col-sm-1">Cliente</th> 
                            <th class="col-sm-1">Fecha Inicio</th>
                            <th class="col-sm-1">Fecha fin</th>
                            <th class="col-sm-1">Cuil</th>
                            <th class="col-sm-1">Email</th>
                            <th class="col-sm-1">Mensaje</th>
                            <th class="col-sm-1">Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                    <!--Registros de la bd-->           
                    <?php foreach($registros as $registro) { ?>     
                        <tr>
                            <td><?php echo $registro-> RazonSocial ?></td>
                            <td><?php echo $registro-> Campania ?></td>
                            <td><?php echo $registro-> NombreCliente ?></td>
                            <td><?php echo $registro-> FechaInicio ?></td>
                            <td><?php echo $registro-> FechaFin ?></td>
                            <td><?php echo $registro-> Cuil ?></td>
                            <td><?php echo $registro-> Email ?></td>
                            <td><?php echo $registro-> Mensaje ?></td>
                            <td>
                                <form action="eliminar.php" method="POST">
                                        <input type="hidden" value="<?php echo $registro-> Campania?>" name="campania_a_eliminar" >
                                        <input type="submit" value="Eliminar" name="eliminar" >

                                </form>
                                <form action="modificar.php" method="POST">
                                        <input type="hidden" value="<?php echo $registro-> Campania?>" name="campania_a_editar" >
                                        <input type="submit" value="Editar" name="editar" >

                                </form>
                            </td>

                        </tr>
                    
                    <?php } ?>
                    
                        
    
                </tbody>
                </table>
            </div>

            
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>    
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json"></script>
    <script>
    $('.tabla_campanias').DataTable({
      "language": {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix":    "",
        "sSearch":         "Buscar campaña:",
        "sUrl":            "",
        "sInfoThousands":  ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    },
    "buttons": {
        "copy": "Copiar",
        "colvis": "Visibilidad"
    }
    }
       
  
 
  } );
</script>
    
    
  
</body>
</html>
