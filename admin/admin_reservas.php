<?php
include("../components/admin_nav.php");
// include("../bbdd/conex.php");
$username = "root"; 
$password = ""; 
$database = "casajavi"; 
$mysqli = new mysqli("localhost", $username, $password, $database); 
$sql = "SELECT * FROM reservas WHERE ESTADO = 'Pendiente'";

if ($result = $mysqli->query($sql)) {
    while ($row = $result->fetch_assoc()) {
        $reservas = array(
            $field1name = $row["ID_RESERVA"];
            $field2name = $row["NOMBRE"];
            $field3name = $row["FECHA"];
            $field4name = $row["NUM_PERSONAS"];
            $field5name = $row["CORREO"]; 
            $field6name = $row["TELEFONO"]; 
            $field7name = $row["ESTADO"]; 
        );
    }
} 

?>
        
<!-- FILTROS -->
<div style="margin:auto;margin-top:100px;width:90%;">
    <form>
        <div style="width: 98%;overflow: auto;">
            <div style="float: left;width: 49%;height: 100%;border-right: 3px solid black;padding: 30px;">
                <label for="fecha">Fecha</label>
                <input type="date" class="form-control" id="fecha" placeholder="DD/MM/YYYY">
                <br><br>
                <label for="NPersonas">Nº Personas</label>
                <input type="number" class="form-control" id="NPersonas" placeholder="Numero de personas">
                <br>
            </div>
            <div style="float: left;width: 49%;padding: 30px;height: 100%;">
                <label for="inputEmail4">Numero de Telefono</label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                <br>
                <label for="inputEmail4">Correo</label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                <br>
                <label for="inputEmail4">Nombre</label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
            </div>
        </div>
        
        <div style="text-align: center;">
            <br>
            <button class="btn btn-primary" type="submit">Reservar</button>
        </div>
    </form>
</div>
<br><br>
<div style="height: 800px;width: 90%;background-color: rgb(224, 224, 235);margin: auto;">
    <table border="0" cellspacing="2" cellpadding="2">
        <tr>
            <td> <font face="Arial">Id Reserva</font> </td> 
            <td> <font face="Arial">Nombre</font> </td> 
            <td> <font face="Arial">Fecha</font> </td> 
            <td> <font face="Arial">Numero Personas</font> </td> 
            <td> <font face="Arial">Correo</font> </td> 
            <td> <font face="Arial">Telefono</font> </td> 
            <td> <font face="Arial">Estado</font> </td> 
        </tr>
        <tr>
            <?php
            $cont = 0;
            while ($cont < count($reservas)) {
                ?>

                <td> <font face="Arial"><?php $reservas[$cont]["ID_RESERVA"] ?></font> </td> 
                <td> <font face="Arial"><?php $reservas[$cont]["NOMBRE"] ?></font> </td> 
                <td> <font face="Arial"><?php $reservas[$cont]["FECHA"] ?></font> </td> 
                <td> <font face="Arial"><?php $reservas[$cont]["NUM_PERSONAS"] ?></font> </td> 
                <td> <font face="Arial"><?php $reservas[$cont]["CORREO"] ?></font> </td> 
                <td> <font face="Arial"><?php $reservas[$cont]["TELEFONO"] ?></font> </td> 
                <td> <font face="Arial"><?php $reservas[$cont]["ESTADO"] ?></font> </td>

                <?php
            }
            ?>
        </tr>
    </table>
</div>

<?php
    include("../components/footer.php");
?>
