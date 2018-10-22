<?php

include_once '../../conexiones/sqlsrv.php';
$conn = connection_object();
$addCode = "";
$matricula=$_REQUEST['matricula2'];
$html="";
$tipo= $_REQUEST['tipo2'];
$calibre= $_REQUEST['calibre2'];
$rfafe= $_REQUEST['rfafe2'];
$marca= $_REQUEST['marca2'];
$modelo= $_REQUEST['modelo2'];
$clasificaion= $_REQUEST['clasificacion2'];
$prop= $_REQUEST['propietario2'];
$situacion= $_REQUEST['situacion2'];

$queryPadronArmas = "update Arma_PADRON set 
                          CVE_TIPO=$tipo,CVE_CALIBRE=$calibre,RFAFE='$rfafe',CVE_MARCA=$marca,CVE_MODELO=$modelo,CVE_CLASIFICACION=$situacion,CVE_PROPIEDAD=$prop,CVE_STATUS=$situacion
                          where matricula='$matricula'";

$execute = sqlsrv_query($conn, $queryPadronArmas);

if($execute){
    $html=1;
}else{    
        $html=2;    
}

echo $html;


