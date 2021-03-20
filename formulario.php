<?php 

//crea la conexion a la base de datos
include 'db_connection.php';
$conn = OpenCon();

//Obtenemos los valores del formulario
$asunto = $_POST['asunto'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$comentarios = $_POST['comentarios'];

//Obtiene la longitus de un string
$req = (strlen($asunto)*strlen($nombre)*strlen($correo)*strlen($comentarios)) or die("No se han llenado todos los campos");

//ingresamos la informacion a la base de datos
// mysql_query("") or die("<h2>Error Guardando los datos</h2>");
$sql = "INSERT INTO VISITANTES (asunto, nombre, correo, comentarios) VALUES('$asunto','$nombre','$correo','$comentarios')";

if ($conn->query($sql) === TRUE) {
echo'
    <script>
        alert("Envío Exitoso");
        location.href="index.html";
    </script>
';
}
else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// mysql_query("INSERT INTO VISITANTES VALUES('','$asunto','$nombre','$correo','$comentarios')") or die("<h2>Error Guardando los datos</h2>");
// echo'
//     <script>
//         alert("Envío Exitoso");
//         location.href="index.html";
//     </script>

// ';

//cierra la conexion a la base de datos 
$connClose = CloseCon($conn)

?>
