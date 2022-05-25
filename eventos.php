<?php
include("components/nav.php");
include("bbdd/conex.php");
$username = "root"; 
$password = ""; 
$database = "casajavi"; 
$mysqli = new mysqli("localhost", $username, $password, $database);

$sql = "SELECT * FROM eventos ";
?>
<!-- <section class="py-5">
  <div class="container px-4 px-lg-6 my-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
      <div class="col-8">
        <h1 class="display-5 fw-bolder">{{ juegos?.nombre }}</h1>

        <img
          class="card-img-top mb-5"
          src="assets/img/{{ juegos?.imagen }}"
          alt="..."
        />

        <h5>Fecha de lanzamiento: {{ juegos?.fecha_lanzamiento }}</h5>
        <h5>Plataformas: {{ juegos?.plataforma }}</h5>
        <h5>Generos: {{ juegos?.genero }}</h5>

        <hr class="divider" />

        <p class="lead">{{ juegos?.descripcion }}</p>
      </div>
    </div>
  </div>
</section> -->

                <?php
                if ($result = $mysqli->query($sql)) {
                    while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <th scope="row"><?php echo $row["ID_RESERVA"] ?></th> 
                        <td><?php echo $row["NOMBRE"] ?></td> 
                        <td><?php echo $row["FECHA"] ?></td> 
                        <td><?php echo $row["NUM_PERSONAS"] ?> </td> 
                        <td><?php echo $row["CORREO"] ?></td> 
                        <td><?php echo $row["TELEFONO"] ?></td> 
                        <td><?php echo $row["ESTADO"] ?></td>
                        <?php 
                            if ($row["ESTADO"] == "Aceptada") {
                                ?> <td colspan="2" style="padding-left: 100px;"><button type="submit" class="btn btn-danger" name="denegar"value='<?php echo $row["ID_RESERVA"]?>'>Denegar</button></td> <?php
                            } elseif ($row["ESTADO"] == "Denegada") {
                                ?> <td colspan="2" style="padding-left: 100px;"><button type="submit" class="btn btn-success" name="aceptar" value='<?php echo $row["ID_RESERVA"]?>'>Aceptar</button></td> <?php
                            } else {
                                ?> <td><button type="submit" class="btn btn-success" name="aceptar" value='<?php echo $row["ID_RESERVA"]?>'>Aceptar</button></td>
                                <td><button type="submit" class="btn btn-danger" name="denegar"value='<?php echo $row["ID_RESERVA"]?>'>Denegar</button></td> <?php
                            }
                        ?>
                    </tr>
                    <?php
                    }    
                }
                ?>


<?php
include("components/footer.php");
?>