<?php

$destination = "minipedri@me.com";
$title = "Prueba 1 Correo";
$body = "Esto es un mensaje de prueba";
$from = "From: minipedri02@gmail.com";

if (mail($destination, $title, $body, $from)) {
    echo "Correo enviado";
} else {
    echo "Error";
}

?>