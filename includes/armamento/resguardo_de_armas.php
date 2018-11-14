<?php

include_once '../../conexiones/sqlsrv.php';
$conn = connection_object();
$matricula = $_REQUEST['matricula'];
$armas = isset($_REQUEST['armas'])?$_REQUEST['armas']:"";
$queryPadronArmas = "select * from [dbo].[Arma_Resg_Individual] where MATRICULA='$matricula'";
$html="";
$addCode="";
$rowTr="";
$html.="
            <table class='table table-bordered table-hover table-responsive table-striped' id='padronSearch'>
                            <thead>
                                <th>#</th>         
                                <th>ID ELEMENTO</th>
                                <th>PLACA</th>
                                <th>SECTOR</th>               
                                <th>DESTTO</th>               
                                <th>NOMBRE</th>               
                                <th>ID USUARIO</th>               
                                <th>PORTACIÓN</th>               
                                <th>RAZÓN SOCIAL</th>               
                                <th>DOMICILIO</th>               
                                <th>COLONIA</th>               
                                <th>ENTIDAD</th>               
                                <th>LOCALIDAD</th>               
                                <th>CP</th>               
                                <th>PERFIL</th> 
                                ";
if($armas!=""){
    $html.="<th>IMPRIMIR</th> ";
}
$html.="<thead>
        <tbody>";

$execute = sqlsrv_query($conn, $queryPadronArmas);

$cont=1;
while ($row = sqlsrv_fetch_array($execute)) {
$addCode="<div class='row text-center'>
    <div class='col-lg-12 col-xs-0 text-center'><h4>MATRICULA ARMA RESGUARDO:&nbsp;<b>$matricula</b></h4></div>
         </div>";
        $queryUsr = "SELECT ID_ELEMENTO,PLACA,ISNULL(APELLIDOP+' ','')+ISNULL(APELLIDOM+' ','')+NOMBRE NOMBRE,SECTOR,DEST,ID_USUARIO,R_SOCIAL,PORTACION,DOMICILIO,COLONIA,ENTIDAD,LOCALIDAD,CP 
        FROM v_elemento_padron WHERE CVE_SITUACION+CVE_SITUACION_NOMINA=0 and ID_ELEMENTO=" . $row['ID_ELEMENTO'];

    $executeUsr = sqlsrv_query($conn, $queryUsr);

    while ($row2 = sqlsrv_fetch_array($executeUsr)) {

    $rowTr.="<tr>
                <td>$cont</td>
                <td>".$row2['ID_ELEMENTO']."</td>                
                <td>".$row2['PLACA']."</td>                
                <td>".$row2['SECTOR']."</td>                
                <td>".$row2['DEST']."</td>                
                <td>".$row2['NOMBRE']."</td>                
                <td>".$row2['ID_USUARIO']."</td>                
                <td>".$row2['PORTACION']."</td>                
                <td>".$row2['R_SOCIAL']."</td>                
                <td>".$row2['DOMICILIO']."</td>                
                <td>".$row2['COLONIA']."</td>                
                <td>".$row2['ENTIDAD']."</td>                
                <td>".$row2['LOCALIDAD']."</td>                
                <td>".$row2['CP']."</td>                
                <td><img class='img2' src='http://sectores.pa.cdmx.gob.mx:3128/Album/".$row2['ID_ELEMENTO'].".jpg' alt=''></td>
            ";
    if($armas!=""){
       $rowTr.="<td>               
                    <a class='btn btn-primary' data-fancybox data-type='iframe' data-src='hoja_control_individual.php?id_elemento=".$row2['ID_ELEMENTO']."&matricula=".$matricula."' href='javascript:;'>
                       <span class='fa fa-print'></span>&nbsp; Resguardo   
                    </a>                        
              </td>"; 
    }
          $rowTr.=" </tr>";
    }
    $cont++;
}

if($rowTr!=""){
    echo $addCode.$html.$rowTr.="</tbody></table>";
}else{
    echo 0;
}



