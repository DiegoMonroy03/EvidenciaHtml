<?php

 $host_db = "localhost";
 $user_db = "root";
 $pass_db = "";
 $db_name = "formulario";
 $tbl_name = "registro";
 
 $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

 if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}

 $buscarUsuario = "SELECT * FROM $tbl_name
 WHERE Id = '$_POST[idsignup]'";

 $result = $conexion->query($buscarUsuario);

 $count = mysqli_num_rows($result); 


 if ($count == 1 ) {
 echo "<br />". "El Nombre de Usuario ya existe." . "<br />";

 echo "<a href='index.html'>Por favor diligencie otro documento</a>";
 }
 else{

 $query = "INSERT INTO registro(Id,Nombre,Apellido,Edad,Email)
           VALUES ('$_POST[idsignup]','$_POST[usernamesignup]','$_POST[lastnamesignup]','$_POST[yearsignup]','$_POST[emailsignup]')";
 if ($conexion->query($query) === TRUE) {
 echo "<br />" . "<h2>" . "Usuario Creado Exitosamente!" . "</h2>";
 echo "<h4>" . "Bienvenido: " . $_POST['usernamesignup'] . "</h4>" . "\n\n";
 echo "<h5>" . "Hacer Login: " . "<a href='formulario.html'>Inicio</a>" . "</h5>";

 	
 }

else {
 echo "Error al crear el usuario." . $query . "<br>" . $conexion->error; 
  }
 }
 mysqli_close($conexion);
?>