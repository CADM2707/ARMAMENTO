<?php

include_once '../../conexiones/sqlsrv.php';
$conn = connection_object();
$format = "d/m/Y";

$html = "<table class='table table-bordered table-hover table-responsive table-striped' id='padronSearch'>
            <thead>
                <th>#</th>         
                <th>ID RESGUARDO</th>
                <th>FOLIO</th>
                <th>ID USUARIO</th>
                <th>SITUACIÓN</th>
                <th>FECHA</th>
                <th>MATRICULA</th>
                <th>CARTUCHOS</th>
                <th>CARGADORES</th>
                <th>ID ARMAMENTO</th>
                <th>CHALECO</th>
                <th>ANTIMOTÍN</th>
                <th>CANDADO</th>
                <th>V°B°</th>
                <th>ID AUTORIZA</th>                        
                <th>IMPRIMIR</th>                        
            <thead>
            <tbody>";
$id_usr = isset($_REQUEST['id_elemento']) ? $_REQUEST['id_elemento'] : "";
$queryPadronArmas = "select * from [dbo].[Arma_Resg_Individual] where ID_ELEMENTO='$id_usr' and CVE_SITUACION=1";
$execute = sqlsrv_query($conn, $queryPadronArmas);

$cont = 1;
while ($row = sqlsrv_fetch_array($execute)) {
    $ID_RESGUARDO = $row['ID_RESGUARDO'];
    $CVE_SITUACION = ($row['CVE_SITUACION'] == 1) ? "ACTIVO" : "INACTIVO";
    $FECHA = date_format($row['FECHA'], $format);
    $FOLIO = $row['FOLIO'];
    $ID_USUARIO = $row['ID_USUARIO'];
    $MATRICULA = $row['MATRICULA'];
    $CARTUCHOS = $row['CARTUCHOS'];
    $CARGADORES = $row['CARGADORES'];
    $ID_ARMAMENTO = $row['ID_ARMAMENTO'];
    $CHALECO = $row['CHALECO'];
    $ANTIMOTIN = $row['ANTIMOTIN'];
    $CANDADO = $row['CANDADO'];
    $ID_VOBO = $row['ID_VOBO'];
    $ID_AUTORIZA = $row['ID_AUTORIZA'];

    $html .= "<tr>
                <td>$cont</td>
                <td>$ID_RESGUARDO</td>
                <td>$FOLIO</td>
                <td>$ID_USUARIO</td>
                <td>$CVE_SITUACION</td>
                <td>$FECHA</td>
                <td>$MATRICULA</td>
                <td>$CARTUCHOS</td>
                <td>$CARGADORES</td>
                <td>$ID_ARMAMENTO</td>
                <td>$CHALECO</td>
                <td>$ANTIMOTIN</td>
                <td>$CANDADO</td>
                <td>
                    <button type='button' class='btn btn-warning' data-toggle='modal' onclick='dispElementAsig(\"$ID_VOBO\",1)' data-target='#modal-default'>
                        <span class='fa fa-eye'></span>&nbsp;Ver
                    </button>
                </td>
                <td>
                    <button type='button' class='btn btn-success' data-toggle='modal' onclick='dispElementAsig(\"$ID_AUTORIZA\",2)' data-target='#modal-default'>
                        <span class='fa fa-eye'></span>&nbsp;Ver
                    </button>
                </td>                
                <td>
                    <a class='btn btn-primary' data-fancybox data-type='iframe' data-src='hoja_control_individual.php?id_elemento=".$id_usr."&matricula=".$MATRICULA."' href='javascript:;'>
                       <span class='fa fa-print'></span>&nbsp; Resguardo   
                    </a>
                </td>
            </tr>";


    $cont++;
}
echo $html .= "</tbody></table>";


