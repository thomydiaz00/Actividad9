<?php
                        include "php/conexion/conn.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!--select mult-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <title>Formulario</title>
    
    <!--funcion para verificar fecha-->
    <script src="js/funcion.js" ></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
<div class="container pt-3">
    <div class="card">

        <div class="card-header">
            <h3 class="text-center">Nueva campaña publicitaria</h3>


        </div>
        <div class="card-body">
            
            <form id="formulario" action="php/components/inicio.php" method="POST" target="_blank">
                <div class="form-group">
                    <label for="nombre_campania">Nombre de campaña</label>
                    <input type="text" class="form-control" id="nombre_campania" name="nombre_campania">
                </div>
                <div class="form-group">
                    <label for="razon_social">Razon social de la empresa</label>
                    <input type="text" class="form-control" id="razon_social" name="razon_social">
                </div>
                
                
                <div class="form-grup">
                    <label for="localidad">Seleccionar localidades:</label>
                    <select type="text"class="form-control selectpicker ml-2" multiple data-live-search="true" id="localidad" name="localidades[]">
                        <option value="">Seleccione</option>
                        <?php
                        include "php/conexion/conn.php";
                        $sqlCom="SELECT * FROM localidades";
                        $localidades = $conn->query($sqlCom);
                        if (!$localidades)
                        {exit("Error in SQL");}
                        while ($localidad=$localidades->fetch_array()) {
                            $id=$localidad["Id"];
                            $loc=$localidad["Localidad"];
                            echo '<option value="'.$id.'">'.$loc.'</option>';
                        }
                        ?>
                    </select>

                </div>
                
                <div class="form-group">
                    <label for="fecha_inicio">Fecha de inicio</label>
                    <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio"/>
                </div>
                <div class="form-group">
                    <label for="fecha_fin">Fecha de finalización</label>
                    <input type="date"  class="form-control" id="fecha_fin" name="fecha_fin" />
                </div>

                <div class="form-group">
                    <label for="nombre_cliente">Nombre del cliente</label>
                    <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente"/>
                </div>
                <div class="form-group">
                    <label for="numero_telefono_cliente">Número de teléfono</label>
                    <input type="number" class="form-control" id="numero_telefono_cliente"  name="numero_telefono_cliente"/>
                </div>
                <div class="form-group">
                    <label for="email">Dirección de correo email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="nombre@ejemplo.com"/>
                  </div>

                <div class="form-group">
                    <label for="cuil">CUIL/CUIT</label>
                    <input type="number" min="0" class="form-control" id="cuil"  name="cuil"/>
                </div>
                <div class="form-group">
                    <label for="mensaje">Mensaje a enviar</label>
                    <textarea type="text" maxlength="160" class="form-control" rows="3" id="mensaje" name="mensaje"></textarea>
                    <small id="cantidad_caracteres" class="form-text text-muted">El mensaje debe tener como máximo 160 caracteres</small>

                </div>
                
                
                <button type="reset" class="btn btn-warning">Reset</button>
                <button type="button" onclick="validar()" class="btn btn-primary">Guardar</button>
                
            </form>

        </div>

    </div>


</div>   
</body>
</html>
