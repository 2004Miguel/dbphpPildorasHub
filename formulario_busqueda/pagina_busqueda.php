<?php

$busqueda = $_GET["buscar"];

require("./datos_conexion.php");

$connection = mysqli_connect($db_host, $db_user, $db_password);

if(mysqli_connect_errno()){ //si la conexion no fue posible, osea que ocurrió un error  

    echo "Conexión no establecida"; 
    exit();
}

mysqli_select_db($connection, $db_nombre) or die ("No se encuentra la base de datos"); //indicamos el nombre de la base de datos a la que queremos conectar


mysqli_set_charset($connection, "utf8"); //estos son los caracteres que se van a utilizar 

$consulta = "SELECT*FROM $busqueda";
$resultao = mysqli_query($connection, $consulta); //ejectua la consulta

$fila=mysqli_fetch_row($resultao); //devuelve un vector en donde cada indice es una columna

/*
echo $fila[0] . " ";
echo $fila[1] . " ";
echo $fila[2] . " ";
echo $fila[3] . " ";
*/


/*
while(($fila=mysqli_fetch_row($resultao))){ //si la condición a evaluar se verifica si es true, se puede obviar el true

    echo $fila[0] . " ";
    echo $fila[1] . " ";
    echo $fila[2] . " ";
    echo $fila[3] . " ";
    
    echo "<br>";

}
*/


/* OTRA FORMA DE VER LOS DATOS DE LA CONSULTA */

while($fila=mysqli_fetch_array($resultao, MYSQLI_ASSOC)){ //trabajamos con un array asociativo

    //los indices tienen que ser iguales a los nombres de la columna en la base de datos

    echo "<table><tr><td>";
    echo $fila['cedula'] . "</td><td>"; 
    echo $fila['nombre'] . "</td><td>";
    echo $fila['apellido'] . "</td><td>";
    echo $fila['edad'] . "</td><td></tr></table>";

    echo "<br>";
    echo "<br>";
}
mysqli_close($connection); //se cierra la conexión para ahorrar recursos
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>
<body>
    <main>
       
    </main>
    
</body>
</html>