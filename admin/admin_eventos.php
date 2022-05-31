<?php
include("../components/admin_nav.php");
require_once("../bbdd/conex.php");

$bd = new conex();
$ejecutar = true;
if (isset($_REQUEST["submit"])) {

    $target_dir = "../assets/img/eventos/";
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
        if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["img"]["name"])). " has been uploaded.";
        } else {
        echo "Sorry, there was an error uploading your file.";
        $ejecutar = false;
        }
    }

    
        $nombre = $_REQUEST["nom"];
        $fecha = $_REQUEST["fecha"];
        $desc_c = $_REQUEST["desc_c"];
        $desc_l = $_REQUEST["desc_l"];

        $sql = "INSERT INTO eventos (NOMBRE,FECHA,DESC_CORTA,DESC_LARGA,IMAGEN) VALUES ('$nombre', '$fecha', '$desc_c', '$desc_l', 'assets/img/eventos/$file_name')";
        
        $bd->ExecSQL($sql);
    
}

?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<section class="bg-dark text-white row justify-content-center" style="padding: 25px 75px 50px 75px;width: 100%;overflow: auto;margin-top:100px;";>

    <h2 class="text-center mt-5">Nuevo Evento</h2>
    <form class="col-6 mt-5" method="post" action="#" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nom">Nombre</label>
            <input type="text" class="form-control" id="nom" name="nom" aria-describedby="nomHelp" required/>
            <small id="nomHelp" class="form-text text-white">Nombre del evento.</small>
        </div>
        <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="date" class="form-control" id="fecha" name="fecha" aria-describedby="fechaHelp" required/>
        </div>
        <div class="form-group">
            <label for="desc_c">Descripcion Corta</label>
            <textarea class="form-control" id="desc_c" rows="3" name="desc_c" required></textarea>
            <small id="generoHelp" class="form-text text-white">Descripcion corta del evento</small>
        </div>
        <div class="form-group">
            <label for="desc_l">Descripcion Larga</label>
            <textarea class="form-control" id="desc_l" rows="7" name="desc_l" required></textarea>
            <small id="fechaHelp" class="form-text text-white">Descripcion larga del evento</small>
        </div>
        <div>
            <label for="img" class="form-label">Imagen para evento</label>
            <input class="form-control form-control-lg" id="img" name="img" type="file" required>
        </div>
        <br>
        <button type="submit" class="btn btn-primary" name="submit">Dar de Alta</button>
    </form>
</section>

<?php
    include("../components/footer.php");
?>