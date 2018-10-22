<?php
session_start();

if (isset($_SESSION['PLACAA'])) {    
    $nombre=$_SESSION['NOMBREA'];
    $sec=$_SESSION['SECTORA'];
    $dest=$_SESSION['DESTA'];
    $idOp=$_SESSION['ID_OPERADORA'];    
    $perfil = $_SESSION['PERFILES'];
    include('conexiones/sqlsrv.php');
    $conn = connection_object();
    date_default_timezone_set('America/Mexico_City');
} else {
define('BASE_URL2', 'http://' . $_SERVER['SERVER_NAME'] . '/ARMAMENTO/');

    header('Location:'.BASE_URL2.'login.php');
}

	
  	