<?php
include("components/nav.php");
include("bbdd/conex.php");
$bd = new conex();

$hoy = date("Y-m-d");
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script>
    function jsFunction(){
        alert('Solicitud de reserva enviada correctamente');
        window.location.href = "index.php";
    }
</script>

<div style="margin:auto;border-radius: 15px; width: 90%;margin-top: 125px;background-color: rgba(212, 252, 223,0.7);display: flex;flex-wrap: wrap;">
    <p style="word-break:break-all;padding: 15px;margin:auto;text-align:center;font-size:18px;">
        Estamos muy agradecidos de que quieran sentarse a nuestra mesa.<br> Para cualquier duda pueden ponerse en contacto con nosotros llamando al teléfono fijo del restaurante: <b>941 141536</b>.
        <br>La solicitud de reserva realizada qedara a la <b>espera</b> de ser aprobada o denegada por parte de los responsables del restaurante.<br>
Se enviara un mensaje de respuesta lo antes posible al email proporcionado en la solicitud de reserva.
    </p>
</div>

<!-- FORMULARIO DE RESERVA -->
<div style="margin:auto;margin-top:25px;width:90%;overflow: auto;padding: 25px 0 25px 0;">
    <form method="POST" name="formReserva">
        <div style="width: 98%;overflow: auto;">
            <div style="float: left;width: 50.7%;height: 100%;border-right: 3px solid black;padding: 30px;">
                <label for="fecha">Fecha</label>
                <input type="date" class="form-control" id="fecha" name="fecha" min="<?php echo $hoy ?>" placeholder="DD/MM/YYYY" required>
                <br>
                <label for="NPersonas">Nº Personas</label>
                <input type="number" class="form-control" id="NPersonas" name="NPersonas" placeholder="Numero de personas" min="1" required>
                <br>
                <label for="hora">Hora</label>
                <input type="time" class="form-control" id="hora" name="hora" placeholder="Hora para la reserva" min="13:00" max="16:00" required>
            </div>
            <div style="float: left;width: 49%;padding: 30px;height: 100%;">
                <label for="nom">Nombre y Apellidos</label>
                <input type="nom" class="form-control" id="nom" name="nom" placeholder="Introduce tu nombre y apellidos" required>
                <br>
                <label for="tel">Numero de Telefono</label>
                <input type="tel" class="form-control" id="tel" name="tel" placeholder="Introduce tu numero de telefono" required>
                <br>
                <label for="email">Correo</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Introduce tu email" required>
            </div>
        </div>
        
        <div style="text-align: center;">
            <br>
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal">Reservar</button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmacion de reserva</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Se hara una solicitud de reserva a espera de ser procesada. En caso de ser denegada o aceptada se le notificara mediante un correo electronico a la direccion proporcionada.<br><br>
                    Desea continuar?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" name="submit">Hacer Reserva</button>
                </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php
if (isset($_REQUEST["submit"])) {
    $fecha = $_REQUEST["fecha"];
    $numPersonas = $_REQUEST["NPersonas"];
    $hora = $_REQUEST["hora"];
    $nom = $_REQUEST["nom"];
    $numTel = $_REQUEST["tel"];
    $correo = $_REQUEST["email"];

    $sql = "INSERT INTO reservas (NOMBRE,FECHA,NUM_PERSONAS,CORREO,TELEFONO,ESTADO,HORA) VALUES ('$nom','$fecha',$numPersonas,'$correo','$numTel','Pendiente','$hora')";
    if ($bd->ExecSQL($sql)) {
        echo '<script>jsFunction();</script>';
    } else {
        echo "Ha habido un problema con la reserva";
    }
}

include("components/footer.php");
?>
