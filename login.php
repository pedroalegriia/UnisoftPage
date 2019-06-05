<!DOCTYPE html PUBLIC>
<html xmlns="">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Log In </title>
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" />
</head>

<body>
<div align="center" id="mainWrapper">
  <?php

if (isset($_SESSION["user"])) {
    header("location: store.php");
    exit();
}
?>

<?php
if (isset($_POST["username"]) && isset($_POST["password"])) {

	$user = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["username"]);
    $password = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password"]);

    include "conexion.php";
    $sql = mysql_query("SELECT id FROM unisoft WHERE login='$user' AND password='$password' LIMIT 1");

    $existCount = mysql_num_rows($sql);
    if ($existCount == 1) {
	     while($row = mysql_fetch_array($sql)){
             $id = $row["id"];
		 }
		 $_SESSION["id"] = $id;
		 $_SESSION["user"] = $user;
		 $_SESSION["password"] = $password;
		 header("location: store.html");
         exit();
    } else {
		echo 'That information is incorrect, try again <a href="">Click Here</a>';
		exit();
	}
}
?>
  <div id="pageContent"><br />
    <div align="left" style="margin-left:24px;">
      <h2>Acceso al sistema</h2>
      <form id="form2" name="form2" method="post" action="store.php">
        Usuario:<br />
          <input name="username" type="text" id="username" size="40" required />
        <br /><br />
        Contraseña:<br />
       <input name="password" type="password" id="password" size="40" required />
       <br />
       <br />
       <br />

         <input type="submit" name="button" id="button" value="Log In" />

      </form>
      <p>&nbsp; </p>
    </div>
    <br />
  <br />
  <br />
  </div>
</div>
</body>
</html>
