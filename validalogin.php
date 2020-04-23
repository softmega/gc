<?php
    header('Content-Type: text/html; charset=UTF-8');
    include("conn.php");
    session_start();
//error_reporting(0);
/*echo '<script language="javascript">';
echo 'window.location=portalClientes.php';
echo '</script>';*/
//if($_SERVER["REQUEST_METHOD"] == "POST") {
   // username and password sent from form 
  
   if (isset($_POST['usuario']) and isset($_POST['clave'])){
    $usuario = strtoupper(mysqli_real_escape_string($db,$_POST['usuario']));
    $clave = mysqli_real_escape_string($db,$_POST['clave']);
    if (strlen($usuario) > 20){exit('Usuario: Demasiados caracteres');}
    if (strlen($clave) > 20 ){exit('Clave: Demasiados caracteres');}
      if (!is_null($usuario)){
        $sql = "SELECT rut, nombres ,apellidos FROM usuarios WHERE usuario = '$usuario' and clave = '$clave'";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $rut = $row['rut'];
        $nombres = $row['nombres'];
        $apellidos = $row['apellidos'];
        
        $count = mysqli_num_rows($result);
      
        // If result matched $myusername and $mypassword, table row must be 1 row
  
        if($count == 1) {
          $_SESSION['login_rut'] = $rut;
          $_SESSION['login_usuario'] = $nombres & ' ' &  $apellidos;
          header("Location: portalClientes.php");
          /*echo '<script language="javascript">';
          echo 'window.location=portalClientes.php';
          echo '</script>';*/
        }else {
          $_SESSION['error_login'] = "Nombre de Usuario o Clave Incorrectos";
          header("Location: vista_collao.php");
          /*echo '<script language="javascript">';
          echo 'window.location=vista_collao.php';
          echo '</script>';*/
        }
    }
   mysqli_close($db);   
   }else{
    echo 'no definido';
   }
  /* $usuario = mysqli_real_escape_string($db,$_POST['usuario']);
     $clave = mysqli_real_escape_string($db,$_POST['clave']); 
     if (strlen($usuario) > 20) {
      exit('Usuario: Demasiados caracteres');
     }

 
  if (!is_null($usuario)){
     $sql = "SELECT rut, nombres ,apellidos FROM usuarios WHERE usuario = '$usuario' and clave = '$clave'";
     $result = mysqli_query($db,$sql);
     $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
     $rut = $row['rut'];
     $nombres = $row['nombres'];
     $apellidos = $row['apellidos'];
     
     $count = mysqli_num_rows($result);
     // If result matched $myusername and $mypassword, table row must be 1 row

     if($count == 1) {
        $_SESSION['login_rut'] = $rut;
        $_SESSION['login_usuario'] = $nombres & ' ' &  $apellidos;
        header("Location:clientesVistaCollao.php");
        echo"<script language='javascript'>window.location='clientesVistaCollao.php'</script>;";
     }else {
       $error = "Nombre de Usuario o Clave Incorrectos";
     }
  }
  mysqli_close($db);   
}*/
?>