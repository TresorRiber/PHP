<!DOCTYPE html>
<html>
<body>
  <?php
        $nombreErr = $emailErr = $contraseñaErr = $repitacontraErr = "";
        $nombre = $email = $contraseña = $repitacontra = "";
        
        function test_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $patternNombre = "/^[a-zA-Z\s]+$/";
        $contadorError=0;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["nombre"])) {
              $nombreErr = "Requiere nombre";
            } else {
              $nombre = test_input($_POST["nombre"]);
              if(preg_match($patternNombre, $nombre)){
                $contadorError++;
              }else{
                $nombreErr = "Nombre no valido";
                
              }
            }
          
            if (empty($_POST["email"])) {
              $emailErr = "Requiere email";
            } else {
              $email = test_input($_POST["email"]);
              if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                $contadorError++;
              }else{
                $emailErr = "E-mail no valido";
                
              }
            }
            
            if (empty($_POST["contraseña"]) && empty($_POST["repitacontra"])) {
              $contraseñaErr = "Requiere contraseña";
            } else {
              $contraseña = test_input($_POST["contraseña"]);
              $repitacontra = test_input($_POST["repitacontra"]);
              if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{6,}$/', $contraseña) && $contraseña==$repitacontra) {
                $contadorError++;
            } else {
                $contraseñaErr = "La contraseña no es válida.";
                
            }
          }
        }
        
        ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

        Nombre: <input type="text" name="nombre">
        <span class="error">* <?php echo $nombreErr;?></span>
        <br><br>
        E-mail:
        <input type="email" name="email">
        <span class="error">* <?php echo $emailErr;?></span>
        <br><br>
        Contraseña:
        <input type="text" name="contraseña">
        <span class="error"><?php echo $contraseñaErr;?></span>
        <br><br>
        Repita contraseña:
        <input type="text" name="repitacontra">
        <span class="error"><?php echo $repitacontraErr;?></span>
        <br><br>
        <input type="submit" name="submit" value="Submit">
        
        </form>
      <?php 
        if($contadorError==3){
          echo "<br>"."Formulario correctamente completado";
        }
      ?>
</body>
</html>