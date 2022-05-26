<?php
include("components/nav.php");
require_once("bbdd/conex.php");

$bd = new conex();


$sql = "SELECT * FROM eventos";
$resultado = $bd->ExecSQL($sql);
while ($row = $bd->SigReg($resultado)) {
?>
<br><br>
<div class="container bcontent" style="margin-top:100px;">
    <h2><?php echo $row->NOMBRE ?></h2>
    <hr/>
    <div class="card" style="width: 100%;">
        <div class="row no-gutters" style="height:400px;">
            <div class="col-sm-6">
                <img class="card-img" src="<?php echo $row->IMAGEN ?>" alt="Suresh Dasari Card" style="height: 400px;">
            </div>
            <div class="col-sm-5">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row->DESC_CORTA ?></h5>
                    <b><p class="card-text"><?php echo $row->FECHA ?></p></b>
                    <p class="card-text"><?php echo $row->DESC_LARGA ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
<?php
}

include("components/footer.php");
?>