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
    $_SESSION['NOMBREA'] = $row['NOMBRE'];
    $_SESSION['PLACAA'] = $row['PLACA'];
    $_SESSION['SECTORA'] = $row['SECTOR'];
    $_SESSION['DESTA'] = $row['DEST'];
    $_SESSION['ID_OPERADORA'] = $row['ID_OPERADOR'];    
    $query="select T2.ID_PROGRAMA,CVE_PERFIL,CVE_GRUPO
                                    FROM BITACORA.DBO.Operador_Padron  T1 
                                    INNER JOIN BITACORA.DBO.Programa_Perfil T2 ON T1.ID_OPERADOR=T2.ID_OPERADOR 
                                    INNER JOIN BITACORA.DBO.Operador_Grupo T3 ON T1.ID_OPERADOR=T3.ID_OPERADOR AND T2.ID_PROGRAMA=T3.ID_PROGRAMA                                  
                                     WHERE T1.ID_OPERADOR='".$_SESSION['ID_OPERADORA']."' and T2.ID_PROGRAMA=90";
    $execuePerfil = sqlsrv_query($conn, $query);
    $row=sqlsrv_fetch_array($execuePerfil);
    $_SESSION['PERFILES']=$row['CVE_PERFIL'];
} else {
    $html = 0;
}

echo $html;
?>
