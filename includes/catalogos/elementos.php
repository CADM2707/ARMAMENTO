<?php

include_once '../../conexiones/sqlsrv.php';
$conn = connection_object();
$html = "";
$id_elemento = isset($_REQUEST['Elemento']) ? $_REQUEST['Elemento'] : "";
$placa = isset($_REQUEST['Placa']) ? $_REQUEST['Placa'] : "";
$resultados = array();
$addCode = " and ";

if ($id_elemento != "") {
    $addCode .= " ID_ELEMENTO='$id_elemento'";
} else if ($placa != "") {
    $addCode .= " PLACA='$placa'";
}

$query = "SELECT ID_ELEMENTO,PLACA,ISNULL(APELLIDOP+' ','')+ISNULL(APELLIDOM+' ','')+NOMBRE NOMBRE,SECTOR,DEST,ID_USUARIO,R_SOCIAL,PORTACION,DOMICILIO,COLONIA,ENTIDAD,LOCALIDAD,CP 
        FROM v_elemento_padron WHERE CVE_SITUACION+CVE_SITUACION_NOMINA=0 $addCode";

$execute = sqlsrv_query($conn, $query);

if ($row = sqlsrv_fetch_array($execute)) {
    $resultados[0] = $row['ID_ELEMENTO'];
    $resultados[1] = $row['PLACA'];
    $resultados[2] = $row['NOMBRE'];
    $resultados[3] = $row['SECTOR'];
    $resultados[4] = $row['DEST'];
    $resultados[5] = $row['ID_USUARIO'];
    $resultados[6] = $row['R_SOCIAL'];
    $resultados[7] = $row['PORTACION'];
    $resultados[8] = $row['DOMICILIO'];
    $resultados[9] = $row['COLONIA'];
    $resultados[10] = $row['ENTIDAD'];
    $resultados[11] = $row['LOCALIDAD'];
    $resultados[12] = $row['CP'];
}



echo json_encode($resultados);
