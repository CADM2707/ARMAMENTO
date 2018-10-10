<?php

include '../../conexiones/sqlsrv.php';
$conn = connection_object2();
$html = "";
session_start();

$usr = $_REQUEST['usrcompstat'] ? $_REQUEST['usrcompstat'] : NULL;
$pwd = $_REQUEST['passwordcompstat'] ? $_REQUEST['passwordcompstat'] : NULL;

$searchlog = "EXECUTE BITACORA.DBO.SP_Acceso '$usr','$pwd'";
$execue = sqlsrv_query($conn, $searchlog);


if ($row= sqlsrv_fetch_array($execue)) {

    $html = 1;
    $_SESSION['NOMBRE'] = $row['NOMBRE'];
    $_SESSION['PLACA'] = $row['PLACA'];
    $_SESSION['SECTOR'] = $row['SECTOR'];
    $_SESSION['DEST'] = $row['DEST'];
    $_SESSION['ID_OPERADOR'] = $row['ID_OPERADOR'];
} else {
    $html = 0;
}

echo $html;
?>
