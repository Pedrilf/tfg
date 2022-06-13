<?php
include("../components/admin_nav.php");
require_once("../bbdd/conex.php");

if (!$_SESSION['loged']) {
    header("Location: index.php");
}

$bd = new conex();
$ejecutar = true;
if (isset($_REQUEST["submit"])) {

    $target_dir = "../assets/img/menu/";
    $target_file = $target_dir . basename($_FILES["img"]["name"]);
    $file_name = basename($_FILES["img"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["img"]["tmp_name"]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
      $ejecutar = false;
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
        $ejecutar = false;
    }
    // Check file size
    if ($_FILES["img"]["size"] > 5000000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
        $ejecutar = false;
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
        $ejecutar = false;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        $ejecutar = false;

    // if everything is ok, try to upload file
    } else {
        $nom = "../assets/img/menu/menu.jpeg";
        if (move_uploaded_file($_FILES["img"]["tmp_name"], $nom)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["img"]["name"])). " has been uploaded.";
        } else {
        echo "Sorry, there was an error uploading your file.";
        $ejecutar = false;
        }
    }
}

?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<section class="bg-dark text-white row justify-content-center" style="padding: 25px 75px 50px 75px;width: 100%;overflow: auto;margin-top:100px;height:850px;";>

    <h2 class="text-center mt-5">Foto del Menu</h2>
    <form class="" method="post" action="#" enctype="multipart/form-data">
        <div>
            <label for="img" class="form-label">Imagen para evento</label>
            <input class="form-control form-control-lg" id="img" name="img" type="file" required>
        </div>
        <br>
        <button type="submit" class="btn btn-primary" name="submit">Subir menu</button>
    </form>
</section>

<?php
    include("../components/footer.php");
?>