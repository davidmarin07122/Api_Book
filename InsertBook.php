<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
// Importar la conexion
include 'DBConfig.php';
 
// Conectar a la base de datos
 $conexion = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
 
 // Obteniendo los datos en la variable $json.
 $json = file_get_contents('php://input');
 
 // Decodificando los datos en formato JSON en la variables $obj.
 $obj = json_decode($json,true);
 
 // Crear variables por cada campo.
 $S_id_book = $obj['id_book'];
 
 $S_Code = $obj['isbn'];
 
 $S_Name = $obj['name'];
 
 $S_Gender = $obj['gender'];

 $S_Date = $obj['date'];

 $S_Status = $obj['status'];
 
 // Instrucción SQL para agregar el estudiante.
 $Sql_Query = "insert into book (isbn,name,gender,date,status) values ('$S_Code','$S_Name','$S_Gender','$S_Date','$S_Status')";
 
 
 if(mysqli_query($conexion,$Sql_Query)){
 
$MSG = 'Libro registrado correctamente...' ;
 
//$json = json_encode($MSG);
//echo $json ;
 
 }
 else{
 
 $MSG = 'Inténtelo de nuevo...';
 
 }
 $json = json_encode($MSG);
 echo $json;
 mysqli_close($conexion);
?>