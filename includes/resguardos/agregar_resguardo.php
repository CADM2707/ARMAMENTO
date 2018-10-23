<?php

include_once '../../conexiones/sqlsrv.php';
$conn = connection_object();

$noFilas = isset($_REQUEST['filasSend']) ? $_REQUEST['filasSend'] : 0;
$matricula = "";
$queryPadronArmas = "";
$sector = isset($_REQUEST['addSec']) ? $_REQUEST['addSec'] : "";
$destto = isset($_REQUEST['addSdestto']) ? $_REQUEST['addSdestto'] : "";
$usr = isset($_REQUEST['addUsrSelect']) ? $_REQUEST['addUsrSelect'] : "";
$i=1;
while ($i <= $noFilas) {

    $mat = "Mat" . $noFilas;
    $cargador = "Crgad" . $noFilas;
    $muni = "Muni" . $noFilas;
    $matricula = isset($_REQUEST[$mat]) ? $_REQUEST[$mat] : "";
    $cargador = isset($_REQUEST[$cargador]) ? $_REQUEST[$cargador] : "";
    $muni = isset($_REQUEST[$muni]) ? $_REQUEST[$muni] : "";

   $queryPadronArmas .= " IF EXISTS(select * from [dbo].[Arma_Resg_General] where MATRICULA='$matricula')
                             BEGIN
                                 UPDATE  [dbo].[Arma_Resg_General]
                                 SET CARGADORES=$cargador, MINICIONES=$muni, ID_USUARIO='$usr', SECTOR=$sector where MATRICULA='$matricula'
                                 SELECT 'ACTUALIZADO' RESPUESTA
                             END
                             ELSE
                                 BEGIN
                                     INSERT INTO [dbo].[Arma_Resg_General]
                                     values('$matricula',$sector,$destto,$cargador,$muni,'$usr')
                                     SELECT 'INSERTADO' RESPUESTA
                                 END ";   

    $i++;
}

$execute = sqlsrv_query($conn, $queryPadronArmas);


if ($execute) {
    $html = 1;
} else {
    $html = 2;
}

echo $html;


