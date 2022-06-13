<?php
include("../components/admin_nav.php");
include('../bbdd/conex.php');
$bd = new conex();
 if (isset($_POST['login'])) {
  
     $username = $_POST['username'];
     $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE USERNAME = '$username'";
     if (!$resultado = $bd->ExecSQL($sql)) {
         echo '<p class="error">Contraseña o usuario incorrectos</p>';
     } else {
       $row = $bd->SigReg($resultado);
         if ($password == $row->PASSWORD) {
             $_SESSION['loged'] = true;
             header("Location: admin_reservas.php");
         } else {
             echo '<p class="error">Contraseña o usuario incorrectos!</p>';
         }
     }
 }
?>
  
<link href="../css/styles_login.css" rel="stylesheet" />
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<div class="wrapper fadeInDown">
  <div id="formContent">

    <div class="fadeIn first">
      <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" />
    </div>

    <form method="POST">
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="login" required>
      <input type="text" id="password" class=" form-control fadeIn third" name="password" placeholder="password" required>
      <input type="submit" class="fadeIn fourth" value="login" name="login">
    </form>

    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>

<?php
    include("../components/admin_footer.php");
?>
