<?php

class conex {

    var $conexion;

    function __construct() {
        $servername = "localhost";
        $database = "casajavi";
        $username = "root";
        $password = "";

        $this->conexion = mysqli_connect($servername, $username, $password, $database);
    }

    function ExecSQL($sql) {
        $resultado = mysqli_query($this->conexion, $sql);

        return $resultado;
    }
    
    function SigReg($Id_Sql)
    {
        return mysqli_fetch_object($Id_Sql);
    }

    function NumRegs($Id_Sql)
    {
        return mysqli_num_rows($Id_Sql);
    } // FIN NumRegs
}

    

    // // Create connection
    // $conn = new mysqli($servername, $username, $password, $database);
    
    // // Check connection
    // if (!$conn) {
    //     die("Connection failed: " . mysqli_connect_error());
    // }
    // define('USER', 'root');
    // define('PASSWORD', '');
    // define('HOST', 'localhost');
    // define('DATABASE', 'casajavi');
    
    // try {
    //     $connection = new PDO("mysql:host=".HOST.";dbname=".DATABASE, USER, PASSWORD);
    // } catch (PDOException $e) {
    //     exit("Error: " . $e->getMessage());
    // }
?>