<?php
if(isset($_POST['email'])) {
 
    // 
 
    $email_to = "ventas.unisoft@gmail.com";
 
    $email_subject = "Contacto desde Web";
 
    function died($error) {
 
        // mensajes de error
 
        echo "Lo sentimos, hubo un error en sus datos y el formulario no puede ser enviado en este momento. ";
 
        echo "Detalle de los errores.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Porfavor corrija estos errores e inténtelo de nuevo.<br /><br />";
        die();
    }
 
    // Se valida que los campos del formulairo estén llenos
 
    if(!isset($_POST['nombre']) ||
 
        !isset($_POST['email']) ||
 
        !isset($_POST['telefono']) ||
 
        !isset($_POST['mensaje'])) {
 
        die('Lo sentimos pero parece haber un problema con los datos enviados.');
 
    }
 //En esta parte el valor "name"  sirve para crear las variables que recolectaran la información de cada campo
 
    $nombre = $_POST['nombre']; // requerido
 
    $email_de = $_POST['email']; // requerido
 
    $telefono = $_POST['telefono']; // no requerido 
 
    $mensaje = $_POST['mensaje']; // requerido
 
    $error_message = "";//Linea numero 52;
 
//En esta parte se verifica que la dirección de correo sea válida 
 
   $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_de)) {
 
    $error_message .= 'La dirección de correo proporcionada no es válida.<br />';
 
  }
 
//En esta parte se validan las cadenas de texto
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$nombre)) {
 
    $error_message .= 'El formato del nombre no es válido<br />';
 
  }
 
  if(strlen($mensaje) < 2) {
 
    $error_message .= 'El formato del texto no es válido.<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    die($error_message);
 
  }
 
//Este es el cuerpo del mensaje tal y como llegará al correo
 
    $email_message = "Contenido del Mensaje.\n\n";
 
 
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
 
 
    $email_message .= "Nombre: ".clean_string($nombre)."\n";
 
    $email_message .= "Email: ".clean_string($email_de)."\n";
 
    $email_message .= "Teléfono: ".clean_string($telefono)."\n";
 
    $email_message .= "Mensaje: ".clean_string($mensaje)."\n";
 
//Se crean los encabezados del correo
$headers = 'From: '.$email_de."\r\n".
'Reply-To: '.$email_de."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
?>
<!-- Mensaje de que fue enviado-->
<script type="text/javascript">
  alert("Gracias! Nos pondremos en contacto contigo a la brevedad!");
 // document.location=('contact.html');
  //windows.location="http://www.unisoftcol.com/contact.html";
</script>
<?php
}
<script>
  function redireccionar() {
    windows.location='http://www.unisoftcol/contact.html';
  }
  setTimeout('redireccionar()',5000);
</script>

?>
