<?php

include_once '../../conexiones/sqlsrv.php';
$conn = connection_object();
$id_elemento = $_REQUEST['id_elemento'];
$queryPadronArmas = "select * from [dbo].[Arma_Resg_Individual] where id_elemento='$id_elemento'";
$html = "";
$addCode = "";

$cont = 1;

$queryUsr = "SELECT ID_ELEMENTO,PLACA,ISNULL(APELLIDOP+' ','')+ISNULL(APELLIDOM+' ','')+NOMBRE NOMBRE,SECTOR,DEST,ID_USUARIO,R_SOCIAL,PORTACION,DOMICILIO,COLONIA,ENTIDAD,LOCALIDAD,CP 
        FROM v_elemento_padron WHERE CVE_SITUACION+CVE_SITUACION_NOMINA=0 and ID_ELEMENTO=" . $id_elemento;

$executeUsr = sqlsrv_query($conn, $queryUsr);

if ($row2 = sqlsrv_fetch_array($executeUsr)) {

    $html = "<div class='container-fluid'>
        
<div class='row'>
    <div class='col-lg-12 col-xs-12 text-center'>
        <img class='img2' src='http://sectores.pa.cdmx.gob.mx:3128/Album/" . $row2['ID_ELEMENTO'] . ".jpg' alt=''><br>
    </div>
    <div class='col-lg-12 col-xs-12 text-center'>
        <h4 class='b2'>NOMBRE:</h4>
        " . $row2['NOMBRE'] . "
    </div>
</div><hr>
<div class='row'>
    
    <div class='col-lg-3 col-xs-6 text-center'>
        <h4 class='b2'>ID ELEMENTO: </h4><br>
        " . $row2['ID_ELEMENTO'] . "
    </div>
    <div class='col-lg-3 col-xs-6 text-center'>
        <h4 class='b2'>PLACA: </h4><br>
        " . $row2['PLACA'] . "
    </div>
    <div class='col-lg-3 col-xs-6 text-center'>
        <h4 class='b2'>SECTOR: </h4><br>
        " . $row2['SECTOR'] . "
    </div>
    <div class='col-lg-3 col-xs-6 text-center'>
        <h4 class='b2'>DESTTO: </h4><br>
        " . $row2['DEST'] . "
    </div>            
</div><hr>
<div class='row'>                   
    <div class='col-lg-3 col-xs-6 text-center'>
        <h4 class='b2'>ID USUARIO: </h4><br>
        " . $row2['ID_USUARIO'] . "
    </div>
    <div class='col-lg-3 col-xs-6 text-center'>
        <h4 class='b2'>RAZÓN SOCIAL: </h4><br>
        " . $row2['R_SOCIAL'] . "
    </div>                        
      
    <div class='col-lg-3 col-xs-6 text-center'>
        <h4 class='b2'>DOMICILIO: </h4><br>
        " . $row2['DOMICILIO'] . "
    </div>
    <div class='col-lg-3 col-xs-6 text-center'>
        <h4 class='b2'>COLONIA: </h4><br>
        " . $row2['COLONIA'] . "
    </div>                        
</div><hr>
<div class='row'>             
    <div class='col-lg-3 col-xs-6 text-center'>
        <h4 class='b2'>ENTIDAD: </h4><br>
        " . $row2['ENTIDAD'] . "
    </div>
    <div class='col-lg-3 col-xs-6 text-center'>
        <h4 class='b2'>CP: </h4><br>
        " . $row2['CP'] . "
    </div>
    <div class='col-lg-3 col-xs-6 text-center'>
        <h4 class='b2'>LOCALIDAD:</h4><br>
        " . $row2['LOCALIDAD'] . "
    </div>                        
</div>
        </div>

";
}


echo $html;


