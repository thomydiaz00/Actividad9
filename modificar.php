
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
     <!--Iconos de FontAwesome-->
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
     <script src="https://kit.fontawesome.com/76bcb4e810.js" crossorigin="anonymous"></script>
 

    <title>Listado de Campañas</title>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
<!-- Navbar para Menu: Gestion Campañas -->
  <a class="navbar-brand" href="iniciomenu.html">Gestión de Campañas</a>

  <!-- Botoneras:-->
  <ul class="navbar-nav">
    <li class="nav-item">
	  <div class="btn-group">
  <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Campaña
  </button>
  <div class="dropdown-menu">
    <a class="dropdown-item" href="hola.html">Agregar</a> 
	<!-- En href: dire. a donde redirecciona. Acá debería ser al html que Thomas realizo: formulario.html -->
    <a class="dropdown-item" href="listar.html">Listar</a>
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
	<title></title>
</head>
<body>
<h1>Editar Campañas</h1>
 <?php
    include_once "php/conexion/connPDO.php";
    $campania = $_POST['campania_a_editar'];
    $buscarCampaniaSql = $base_de_datos->query("SELECT * FROM Campanias WHERE Campania = '$campania'");
    $registro = $buscarCampaniaSql->fetch(PDO::FETCH_OBJ);

   
?>

<div class="container pt-3">
    <div class="card">

        <div class="card-header">
            <h3 class="text-center">Nueva campaña publicitaria</h3>


        </div>
        <div class="card-body">
            
            <form id="formulario" action="modificarcampaña.php" method="POST" target="_blank">
                <div class="form-group">
                    <label for="nombre_campania">Nombre de campaña</label>
                    <input type="text" class="form-control" id="nombre_campania" name="nombre_campania" value=<?php echo $campania?>>
                    
                </div>
                <div class="form-group">
                    <label for="razon_social">Razon social de la empresa</label>
                    <input type="text" class="form-control" id="razon_social" name="razon_social" value=<?php echo "$registro->RazonSocial";?>>
                </div>
                 
                <div class="form-group">
                    <label for="fecha_inicio">Fecha de inicio</label>
                    <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value=<?php echo "$registro->FechaInicio";?>>
                </div>
                <div class="form-group">
                    <label for="fecha_fin">Fecha de finalización</label>
                    <input type="date"  class="form-control" id="fecha_fin" name="fecha_fin" value=<?php echo "$registro->FechaFin";?>>
                </div>

                <div class="form-group">
                    <label for="nombre_cliente">Nombre del cliente</label>
                    <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente"  value=<?php echo "$registro->NombreCliente";?>>
                </div>
                
                <div class="form-group">
                    <label for="email">Dirección de correo email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="nombre@ejemplo.com" value=<?php echo "$registro->Email";?>>
                  </div>

                <div class="form-group">
                    <label for="cuil">CUIL/CUIT</label>
                    <input type="number" min="0" class="form-control" id="cuil"  name="cuil" value=<?php echo "$registro->Cuil";?>>
                </div>
                <div class="form-group">
                    <label for="mensaje">Mensaje</label>
                    <input type="text" class="form-control" rows="3" id="mensaje" name="mensaje" value=<?php echo "$registro->Mensaje";?>>
                </div>
                
                
                <input type="hidden" value="<?php echo $campania;?>" name="campania_a_editar" >
                <input type="submit" value="Guardar">
                
            </form>

        </div>

    </div>


</div>   

	      

</body>
</html>