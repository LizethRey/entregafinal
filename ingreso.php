<?php

//crea la conexion a la base de datos
include 'db_connection.php';
$conn = OpenCon();

//Obtenemos los valores del formulario
$usuario = $_POST['usuario'];
$pass = $_POST['pass'];

//Obtiene la longitus de un string
$req = (strlen($usuario)*strlen($pass)) or die("No se han llenado todos los campos");

$validar = mysqli_query($conn, "SELECT * from administrador WHERE usuario='$usuario' AND password='$pass'");
$result = mysqli_num_rows($validar);

if ($result == 0)
{
	echo '
		<script>
        	alert("Datos incorrectos");
        	location.href="ingreso.html";
    	</script>
	';
}
else if ($result == 1)
{
	header("Location: admin.html");
}
else
{
	echo '
		<script>
        	alert("Datos duplicados");
        	location.href="ingreso.html";
    	</script>
	';
}
?>