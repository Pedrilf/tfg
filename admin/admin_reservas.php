<?php
include("../components/admin_nav.php");
require_once("../bbdd/conex.php");

$bd = new conex();

$sql = "SELECT * FROM reservas WHERE ESTADO = 'Pendiente' ORDER BY FECHA";
$filtro = "SELECT * FROM reservas WHERE '1=1'";

if (isset($_REQUEST["filtrar"])) {
    $filtrar = false;
    if ($_REQUEST["idR"] != "") {
        $idReserva = $_REQUEST["idR"];
        $filtro .= " AND ID_RESERVA = ".$idReserva."";
        $filtrar = true;
    }
    if ($_REQUEST["nom"] != "") {
        $nombre = $_REQUEST["nom"];
        $filtro .= " AND NOMBRE LIKE '%".$nombre."%'";
        $filtrar = true;
    }
    if ($_REQUEST["fecha"] != "") {
        $fecha = $_REQUEST["fecha"];
        $filtro .= " AND FECHA = '$fecha'";
        $filtrar = true;
    }
    if ($_REQUEST["NPersonas"] != "") {
        $nPersonas = $_REQUEST["NPersonas"];
        $filtro .= " AND NUM_PERSONAS = $nPersonas";
        $filtrar = true;
    }
    if ($_REQUEST["email"] != "") {
        $email = $_REQUEST["email"];
        $filtro .= " AND EMAIL = '$email'";
        $filtrar = true;
    }
    if ($_REQUEST["tel"] != "") {
        $telefono = $_REQUEST["tel"];
        $filtro .= " AND TELEFONO = '$telefono'";
        $filtrar = true;
    }
    if ($_REQUEST["estado"] != "") {
        $estado = $_REQUEST["estado"];
        $filtro .= " AND ESTADO = ".$estado."";
        $filtrar = true;
    } 

    if ($filtrar) {
        echo $filtro;
        $sql = $filtro;
    }

}

if (isset($_REQUEST["aceptar"])) {
    $destination = "minipedri@me.com";
    $title = "Prueba 1 Correo";
    $body = "Solicitud de reserva aceptada";
    $from = "From: minipedri02@gmail.com";

    mail($destination, $title, $body, $from);

} elseif (isset($_REQUEST["aceptar"])) {   
    $destination = "minipedri@me.com";
    $title = "Prueba 1 Correo";
    $body = "Solicitud de reserva cancelada";
    $from = "From: minipedri02@gmail.com";

    mail($destination, $title, $body, $from);
}

if (isset($_REQUEST["aceptar"])) {
    $id = $_REQUEST["aceptar"];
    $query = "UPDATE reservas SET ESTADO = 'Aceptada' where ID_RESERVA = $id";
    if (mysqli_query($conn, $query)) {
        echo "Reserva Aceptada con exito";
    } else {
        echo "Ha ocurrido un problema";
    }
}

if (isset($_REQUEST["denegar"])) {
    $id = $_REQUEST["denegar"];
    $query = "UPDATE reservas SET ESTADO = 'Denegada' where ID_RESERVA = $id";
    if (mysqli_query($conn, $query)) {
        echo "Reserva Denegada con exito";
    } else {
        echo "Ha ocurrido un problema";
    }
}
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<br><br>
<!-- FILTROS -->
<div style="margin:auto;margin-top:100px;width:90%;">
    <form method="POST">
        <div style="width: 98%;overflow: auto;">
            <div style="float: left;width: 49%;height: 100%;border-right: 3px solid black;padding: 30px;">
                <label for="idR">Id Reserva</label>
                <input type="number" class="form-control" id="idR" name="idR" placeholder="ID de reserva">
                <br>
                <label for="nom">Nombre</label>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="Nombre y apellidos">
                <br>
                <label for="fecha">Fecha</label>
                <input type="date" class="form-control" id="fecha" name="fecha" placeholder="DD/MM/YYYY">
                <br>
                <label for="NPersonas">Nº Personas</label>
                <input type="number" class="form-control" id="NPersonas" name="NPersonas" placeholder="Numero de personas">
                <br>
            </div>
            <div style="float: left;width: 49%;padding: 30px;height: 100%;">
                <label for="email">Correo</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Correo">
                <br>
                <label for="tel">Numero de Telefono</label>
                <input type="text" class="form-control" id="tel" name="tel" placeholder="Numero de telefono">
                <br>
                <label for="estado">Estado</label>
                <select class="form-select" id="estado" name="estado" placeholder="Estado de reserva">
                    <option value="'Aceptada' OR ESTADO = 'Pendiente' OR ESTADO = 'Denegada'">Todas</option>
                    <option value="'Aceptada'">Aceptada</option>
                    <option value="'Denegada'">Denegada</option>
                    <option value="'Pendiente'" selected>Pendiente</option>
                </select>
                <br>
            </div>
        </div>
        
        <div style="text-align: center;">
            <br><br>
            <button class="btn btn-primary" type="submit" name="filtrar">Filtrar</button>
        </div>
    </form>
</div>
<br><br>
<div style="overflow:auto; width:90%;margin: auto;">
    <form method="POST">
        <table class="table table-striped">
            <tr>
                <th scope="col">Id Reserva</th>
                <th scope="col">Nombre</th>
                <th scope="col">Fecha</th>
                <th scope="col">Numero Personas</th>
                <th scope="col">Correo</th>
                <th scope="col">Telefono</th>
                <th scope="col">Estado</th>
                <th scope="col" colspan="2" style="padding-left: 110px;">Botones</th>
            </tr>
            <tr>
                <?php
                if ($resultado = $bd->ExecSQL($sql)) {
                    while ($row = $bd->SigReg($resultado)) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $row->ID_RESERVA ?></th> 
                        <td><?php echo $row->NOMBRE ?></td> 
                        <td><?php echo $row->FECHA ?></td> 
                        <td><?php echo $row->NUM_PERSONAS ?> </td> 
                        <td><?php echo $row->CORREO ?></td> 
                        <td><?php echo $row->TELEFONO ?></td> 
                        <td><?php echo $row->ESTADO ?></td>
                        <?php 
                            if ($row->ESTADO == "Aceptada") {
                                ?> <td colspan="2" style="padding-left: 100px;"><button type="submit" class="btn btn-danger" name="denegar"value='<?php echo $row->ID_RESERVA?>'>Denegar</button></td> <?php
                            } elseif ($row->ESTADO == "Denegada") {
                                ?> <td colspan="2" style="padding-left: 100px;"><button type="submit" class="btn btn-success" name="aceptar" value='<?php echo $row->ID_RESERVA?>'>Aceptar</button></td> <?php
                            } else {
                                ?> <td><button type="submit" class="btn btn-success" name="aceptar" value='<?php echo $row->ID_RESERVA?>'>Aceptar</button></td>
                                <td><button type="submit" class="btn btn-danger" name="denegar"value='<?php echo $row->ID_RESERVA?>'>Denegar</button></td> <?php
                            }
                        ?>
                    </tr>
                    <?php
                    }    
                }
                ?>
            </tr>
        </table>
    </form>
</div>
<?php
    include("../components/footer.php");
?>
