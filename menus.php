<?php
include("components/nav.php");
include("bbdd/conex.php");
$bd = new conex();

$img = $bd->SigReg($bd->ExecSQL("SELECT * from menu"));
?>

<div style="margin-top: 100px;text-align:center;padding: 50px 0 50px 0;">
    <img src="<?php echo $img->IMAGEN ?>" alt="">
</div>

<?php
include("components/footer.php");
?>
