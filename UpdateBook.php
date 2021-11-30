<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');

include 'DBConfig.php';
 
$con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
 
$json = file_get_contents('php://input');
 
$obj = json_decode($json,true);
 
$S_Id_Book = $obj['id_book'];
 
$S_Code = $obj['isbn'];

$S_Name = $obj['name'];

$S_Gender = $obj['gender'];

$S_Date = $obj['date'];

$S_Status = $obj['status'];
 

$Sql_Query = "UPDATE book SET isbn = '$S_Code', name = '$S_Name', gender = '$S_Gender', date = '$S_Date', status = '$S_Status' WHERE id_book = $S_Id_Book";
 
 if(mysqli_query($con,$Sql_Query)){
 
$MSG = 'El libro ha sido actualizado correctamente ...' ;
 
$json = json_encode($MSG);

 echo $json ;
 
 }
 else{
 
 echo 'Inténtelo de nuevo';
 
 }
 mysqli_close($con);
?>