<?php

include_once '../../conexiones/sqlsrv.php';
$conn = connection_object();
$requestArray = array();
$addCode = "";
$queryPadronArmas = "select * from [dbo].[V_PADRON_ARMAMENTO]";
$flag = 0;
$requestArray[0] = "matricula1";
$requestArray[1] = "clasificacion1";
$requestArray[2] = "tipo1";
$requestArray[3] = "marca1";
$requestArray[4] = "modelo1";
$requestArray[5] = "calibre1";
$requestArray[6] = "rfafe1";
$requestArray[7] = "propietario1";
$requestArray[8] = "situacion1";
$requestArray[9] = "areaRes1";
$requestArray[10] = "elemResg";
$html = "";

for ($index = 0; $index < count($requestArray); $index++) {

    $res = isset($_REQUEST[$requestArray[$index]]) ? $_REQUEST[$requestArray[$index]] : "";

    if ($res != "") {

        $flag++;

        if ($flag == 1)
            $addCode .= " where ";

        if ($flag > 1 and $flag != 9)
            $addCode .= " and ";

        if ($flag == 10)
            $addCode .= " or ";

        switch ($index) {
            case 0:
                $addCode .= "MATRICULA='$res'";
                break;
            case 1:
                $addCode .= "CLASIFICACION='$res'";
                break;
            case 2:
                $addCode .= "TIPO='". utf8_decode($res)."'";
                break;
            case 3:
                $addCode .= "MARCA='$res'";
                break;
            case 4:
                $addCode .= "MODELO='$res'";
                break;
            case 5:
                $addCode .= "CALIBRE='$res'";
                break;
            case 6:
                $addCode .= "RFAFE='$res'";
                break;
            case 7:
                $addCode .= "PROPIEDAD='$res'";
                break;
            case 8:
                $addCode .= "STATUS='$res'";
                break;
            case 9:
                $addCode .= "ID_USUARIO='$res'";
                break;
            case 10:
                $addCode .= "ID_USUARIO='$res'";
                break;
        }
    }
}


$queryPadronArmas = $queryPadronArmas . $addCode . " order by TIPO asc";
$execute = sqlsrv_query($conn, $queryPadronArmas);

$html .= "<center><H4><label> <span class='fa fa-list' style=' color: #114D87'></span> LISTADO PADRÓN DE ARMAMENTO</label></H4></center>
                                            <hr><table class='table table-bordered table-hover table-responsive table-striped' id='padronSearch'>
                            <thead>
                                <th>#</th>                                
                                <th>MATRICULA</th>
                                <th>RFAFE</th>
                                <th>TIPO</th>
                                <th>CALIBRE</th>
                                <th>MARCA</th>                                
                                <th>MODELO</th>                                
                                <th>CLASIFICACIÓN</th>                                
                                <th>PROPIEDAD</th>                                
                                <th>STATUS</th>                                
                                <th>CARGADORES</th>                                
                                <th>MUNICIONES</th>     
                                <th>SECTOR RESGUARDANTE</th>
                                <th>ID USUARIO RESGUARDANTE</th>
                                <th>OPCIONES</th>
                            </thead>
                            <tbody>";
$cont = 1;
while ($row = sqlsrv_fetch_array($execute)) {

    $mat=$row["MATRICULA"];
    $rfafe=$row["RFAFE"];
    $tipo=$row["TIPO"];
    $calibre =$row["CALIBRE"];
    $marca =$row["MARCA"];
    $mod =$row["MODELO"];
    $clasif =$row["CLASIFICACION"];
    $prop =$row["PROPIEDAD"];
    $stats =$row["STATUS"];
    $cargadores =$row["CARGADORES"];
    $municiones =$row["MINICIONES"];
    $sec =$row["SECTOR"];
    $usuario =$row["ID_USUARIO"];

    $html .= "
              <tr>
                  <td>$cont</td>                  
                  <td>$mat</td>
                  <td>$rfafe</td>
                  <td>". utf8_encode($tipo)."</td>
                  <td>$calibre</td>
                  <td>$marca</td>
                  <td>$mod</td>
                  <td>$clasif</td>
                  <td>$prop</td>
                  <td>$stats</td>
                  <td>$cargadores</td>
                  <td>$municiones</td>  
                  <td>$sec</td>
                  <td>$usuario</td>
                  <td><button class='btn btn-warning' value='$cont' onclick='editPadron($cont)' ><i class='fa fa-edit'></i> Editar</button></td>
              </tr>
            ";
    $cont++;
  
}
echo $html;


