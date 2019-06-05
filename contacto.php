
<?php
//llamdado a los campos
  $nombre =$_Post['nombre'];
  $correo= $_Post['email'];
  $telefono=$_Post['telefono'];
  $mensaje=$_Post['mensaje'];

  //datos para el correo
  $destino ="ventas.unisoft@gmail.com";
  $asunto = "Contacto desde la web";

  $carta = "De: $nombre \n";
  $carta = "Correo: $email \n";
  $carta = "Correo: $telefono \n";
  $carta = "Mensaje: $mensaje";

//enviando mensaje
  mail($destino,$asunto, $carta);
  header("Location:gracias.html");
 ?>