<?php
$conn= new mysqli('localhost', 'root', '', 'morleydb');

// ¡Oh, no! Existe un error 'connect_errno', fallando así el intento de conexión
if ($conn->connect_errno) {
    // La conexión falló. ¿Que vamos a hacer? 
    // Se podría contactar con uno mismo (¿email?), registrar el error, mostrar una bonita página, etc.
    // No se debe revelar información delicada

    // Probemos esto:
    echo "Lo sentimos, este sitio web está experimentando problemas.";

    // Algo que no se debería de hacer en un sitio público, aunque este ejemplo lo mostrará
    // de todas formas, es imprimir información relacionada con errores de MySQL -- se podría registrar
    echo "Error: Fallo al conectarse a MySQL debido a: \n";
    echo "Errno: " . $conn->connect_errno . "\n";
    echo "Error: " . $conn->connect_error . "\n";
    
    // Podría ser conveniente mostrar algo interesante, aunque nosotros simplemente saldremos
    exit;
}
?>