<?php

include_once '../../conexiones/sqlsrv.php';
$conn = connection_object();
$addCode = "";
$matricula=$_REQUEST['matricula'];
$queryPadronArmas = "select * from Arma_PADRON where MATRICULA='$matricula'";
$html=array();



    if($execute = sqlsrv_query($conn, $queryPadronArmas)){
        $row=sqlsrv_fetch_array($execute);
        $html[0]=1;
        $html[1]=$row['MATRICULA'];
        $html[2]=$row['CVE_TIPO'];
        $html[3]=$row['CVE_CALIBRE'];
        $html[4]=$row['RFAFE'];
        $html[5]=$row['CVE_MARCA'];
        $html[6]=$row['CVE_MODELO'];
        $html[7]=$row['CVE_CLASIFICACION'];
        $html[8]=$row['CVE_PROPIEDAD'];
        $html[9]=$row['CVE_STATUS'];
    }else{
        $html[0]=3;
    }

echo json_encode($html);


	
	
	
	
	
	
	
	
