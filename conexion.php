<?php
$conexion = mysqli_connect("localhost","root","","unisoft");
if ($conexion) {
  echo "se realizo correctamente la conexion";
}else{
  echo "error de conexion";
}
?>
