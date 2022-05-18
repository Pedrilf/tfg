<?php
include("components/nav.php");
include("bbdd/conex.php");

if (isset($_REQUEST["submit"])) {
    $fecha = $_REQUEST["fecha"];
    $numPersonas = $_REQUEST["NPersonas"];
    $hora = $_REQUEST["hora"];
    $nom = $_REQUEST["nom"];
    $numTel = $_REQUEST["tel"];
    $correo = $_REQUEST["email"];

    $sql = "INSERT INTO reservas (NOMBRE,FECHA,NUM_PERSONAS,CORREO,TELEFONO,ESTADO) VALUES ('$nom','$fecha',$numPersonas,'$correo','$numTel','Pendiente')";
    if (mysqli_query($conn, $sql)) {
        echo "Reserva solicitada con exito";
    } else {
        echo "Ha habido un problema con la reserva";
    }
}

?>

<div style="margin:auto;margin-top:100px;width:90%;">
    <form>
        <div style="width: 98%;overflow: auto;">
            <div style="float: left;width: 50.7%;height: 100%;border-right: 3px solid black;padding: 30px;">
                <label for="fecha">Fecha</label>
                <input type="date" class="form-control" id="fecha" name="fecha" placeholder="DD/MM/YYYY">
                <br>
                <label for="NPersonas">Nº Personas</label>
                <input type="number" class="form-control" id="NPersonas" name="NPersonas" placeholder="Numero de personas">
                <br>
                <label for="hora">Hora</label>
                <input type="text" class="form-control" id="hora" name="hora" placeholder="Hora para la reserva">
            </div>
            <div style="float: left;width: 49%;padding: 30px;height: 100%;">
                <label for="nom">Nombre y Apellidos</label>
                <input type="nom" class="form-control" id="nom" name="nom" placeholder="Introduce tu nombre y apellidos">
                <br>
                <label for="tel">Numero de Telefono</label>
                <input type="tel" class="form-control" id="tel" name="tel" placeholder="Introduce tu numero de telefono">
                <br>
                <label for="email">Correo</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Introduce tu email">
            </div>
        </div>
        
        <div style="text-align: center;">
            <br>
            <button class="btn btn-primary" type="submit" name="submit">Reservar</button>
        </div>
    </form>
</div>

<?php
    include("components/footer.php");
?>
