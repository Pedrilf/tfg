<?php
include("../components/admin_nav.php");

if (!$_SESSION['loged']) {
    header("Location: index.php");
}

if (isset($_REQUEST['si'])) {
    $_SESSION['loged'] = false;
    session_destroy();
    header("Location: index.php");
}

if (isset($_REQUEST['no'])) {
    header("Location: admin_reservas.php");
}
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<form method="POST">
<div style="margin-top: 90px;height: 80%;text-align: center;padding: 50px;">
    <h1>Seguro que deseas cerrar sesion?</h1>
    <br><br>
    <div>
        <div style="display: inline-block;">
            <button class="btn btn-success" type="button" style="width: 250px;" data-toggle="modal" data-target="#exampleModal">Si</button>
        </div>
        <div style="display: inline-block;">
            <button class="btn btn-danger" type="submit" name="no" value="no" style="width: 250px;">No</button>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sesion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        Estas seguro de que deseas cerrar sesion?
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary" type="submit" name="si" value="si">Si</button>
    </div>
    </div>
</div>
</div>

</form>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<?php
    include("../components/admin_footer.php");
?>