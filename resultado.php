<?php
//crea la conexion a la base de datos
include 'db_connection.php';
$conn = OpenCon();

//Obtenemos los valores del formulario
$filtrado = $_POST['filtrado'];

$buscar = mysqli_query($conn, "SELECT * from visitantes WHERE asunto='$filtrado'");
$result = mysqli_num_rows($buscar);

if ($result == 0)
{
	echo '
		<script>
        	alert("No existen registros");
        	location.href="admin.html";
    	</script>
	';
}
else
{
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"&amp;gt>
    <title>EDWARD GARCIA</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/skeleton.css">
    <link rel="stylesheet" href="css/style1.css">

	<style>

	/* Si la pantalla es de 500px o menos */
	@media screen and (max-width: 500px) {
	table {
		width: 100%;
	}
	table {
		font-family: arial, sans-serif;
		border-collapse: collapse;
		width: 70%;
	}
	td, th {
		border: 1px solid #FFFFFF;
		background-color: #B4B4B4;
		text-align: justify;
		padding: 0.5vh 0.5vw;
		margin: 0.5vh 0.5vw;
	}

	thead{
		font-weight:bold;
	}
	}

	/* Si la pantalla es de 501px o mas */
	@media screen and (min-width: 501px) {
	table {
		font-family: arial, sans-serif;
		border-collapse: collapse;
		width: 90%;
	}
	td, th {
		border: 1px solid #FFFFFF;
		background-color: #B4B4B4;
		text-align: justify;
		padding: 1vh 1vw;
		margin: 1vh 1vw;
	}

	thead{
		font-weight:bold;
	}
	}
	
	</style>
</head>

<body>
	<!--First section-->
    <div style="background-image: url('img/web.jpg'); background-size: cover; height:700px; padding-top:80px;">

	<div class="table-responsive"> 
		<table class="table table-bordered table-striped">
		<thead> 
		<tr>
		<!-- definimos cabeceras de la tabla --> 
			<td># de mensaje</td>
			<td>Nombre</td>
			<td>Correo</td>
			<td>Mensaje</td>
			<td>Fecha</td>
		</tr>
		</thead>
		<?php 
		while ($row=mysqli_fetch_array($buscar))
			{
				$id=$row["0"];
				$nombre=$row["2"];
				$correo=$row["3"];
				$comentarios=$row["4"];
				$fecha=$row["5"];

				echo "<tr>"; //fila
				echo "<td>"; //columna
				echo $id;
				echo "</td>";
				echo "<td>";
				echo $nombre;
				echo "</td>";
				echo "<td>";
				echo $correo;
				echo "</td>";
				echo "<td>";
				echo $comentarios;
				echo "</td>";
				echo "<td>";
				echo $fecha;
				echo "</td>";
				echo "</tr>";
			}
		?>
		</table>
    </div>
</body>
</html>

<?php
}

//cierra la conexion a la base de datos 
$connClose = CloseCon($conn)
?>