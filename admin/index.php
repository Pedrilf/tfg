<?php
include("../components/admin_nav.php");
include('../bbdd/conex.php');
  
 if (isset($_POST['login'])) {
  
     $username = $_POST['username'];
     $password = $_POST['password'];
  
     $query = $connection->prepare("SELECT * FROM usuarios WHERE USERNAME=:username");
     $query->bindParam("username", $username, PDO::PARAM_STR);
     $query->execute();
  
     $result = $query->fetch(PDO::FETCH_ASSOC);
  
     if (!$result) {
         echo '<p class="error">Contraseña o usuario incorrectos</p>';
     } else {
       echo $password;
       echo "<br>";
       echo $result['PASSWORD'];
         if ($password == $result['PASSWORD']) {
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
<!------ Include the above in your HEAD tag ---------->

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" />
    </div>

    <!-- Login Form -->
    <form method="POST">
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="login" required>
      <input type="text" id="password" class="fadeIn third" name="password" placeholder="password" required>
      <input type="submit" class="fadeIn fourth" value="login" name="login">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>

<?php
    include("../components/admin_footer.php");
?>
