<?php

include_once '../../conexiones/sqlsrv.php';
$conn = connection_object();
$addCode = "";
$queryPadronArmas = "insert into Arma_PADRON values(";
$matricula=$_REQUEST['matricula'];
$html="";
$addCode.= "'".$matricula."',";
$addCode.= $_REQUEST['tipo']." , ";
$addCode.= $_REQUEST['calibre']." , ";
$addCode.= "'".$_REQUEST['rfafe']."',";;
$addCode.= $_REQUEST['marca']." , ";
$addCode.= $_REQUEST['modelo']." , ";
$addCode.= $_REQUEST['clasificacion']." , ";
$addCode.= $_REQUEST['propietario']." , ";
$addCode.= $_REQUEST['situacion']." )";

$queryPadronArmas.=$addCode;

$execute = sqlsrv_query($conn, $queryPadronArmas);

if($execute){
    $html=1;
}else{
    if($execute = sqlsrv_query($conn, "select MATRICULA from Arma_PADRON where MATRICULA='$matricula'")){
        $html=2;
    }else{
        $html=3;
    }
}

echo $html;


