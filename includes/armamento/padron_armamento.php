<?php

session_start();
include_once '../../conexiones/sqlsrv.php';
$conn = connection_object();
$requestArray = array();
$addCode = "";
$perfil = $_SESSION['PERFILES'];
$sector = $_SESSION['SECTORA'];
$destto = $_SESSION['DESTA'];
$queryPadronArmas = "select top 250 MATRICULA,RFAFE,TIPO,CALIBRE,MARCA,MODELO,CLASIFICACION,PROPIEDAD,STATUS,T1.CARGADORES,MINICIONES,SECTOR,ID_USUARIO,T2.CARTUCHOS,T2.CARGADORES NOCARGADORES from [dbo].[V_PADRON_ARMAMENTO] T1
inner join
Arma_C_Tipo T2 on T1.TIPO=T2.DESCRIPCION";
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
$cont2= isset($_REQUEST['cont2'])? $_REQUEST['cont2'] : "" ;

$addResg = isset($_REQUEST['resguardoG']) ? $_REQUEST['resguardoG'] : "";
$addResIR = isset($_REQUEST['resguardoIR']) ? $_REQUEST['resguardoIR'] : "";

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
                $addCode .= "TIPO='" . utf8_decode($res) . "'";
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

if (!isset($addCode)) {
    $addCode .= " where ";
} else {
//    $addCode .= " and ";
}
//agregar nuevamente para ver las armas que pertenecen a cada destacamento
if ($perfil == 1) {
//    $addCode .= "SECTOR=50 and ID_USUARIO is null";
    $addCode .= "";
} else if ($perfil == 2) {
//    $addCode .= " and SECTOR=51";
}

$queryPadronArmas = $queryPadronArmas . $addCode . " order by TIPO asc";
$execute = sqlsrv_query($conn, $queryPadronArmas);

if ($addResg == "") {
    $html .= "               <center><H4><label> <span class='fa fa-list' style=' color: #114D87'></span> LISTADO PADRÓN DE ARMAMENTO</label></H4></center>
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
                                <th class='hidex hidez'>OPCIONES</th>";
} else {
    $html .= "           <center><H4><label> <span class='fa fa-list' style=' color: #114D87'></span> LISTADO PADRÓN DE ARMAMENTO</label></H4></center>";
    if ($addResIR == "") {
        $html .= "    <a id='select1' class='btn btn-primary' onclick='selectAll(1)'><span class='fa fa-sort-amount-asc'></span>&nbsp;Marcar todos</a>
        <a id='unselect1' style='display:none' class='btn btn-warning' onclick='UnselecAll(1)'><span class='fa fa-sort-amount-desc'></span>&nbsp;Desmarcar todos</a>
        <hr><table class='table table-bordered table-hover table-responsive table-striped' id='padronSearch'>
        ";
    }else{
        $html .= "    <a id='select1IR' class='btn btn-primary' onclick='selectAllIR(1)'><span class='fa fa-sort-amount-asc'></span>&nbsp;Marcar todos</a>
        <a id='unselect1IR' style='display:none' class='btn btn-warning' onclick='UnselecAllIR(1)'><span class='fa fa-sort-amount-desc'></span>&nbsp;Desmarcar todos</a>
        <hr><table class='table table-bordered table-hover table-responsive table-striped' id='padronSearchIR'>
        ";
    }
    $html .= "
                            <thead>                                                                              
                                <th>MARCA</th>                                
                                <th>STATUS</th>                                
                                <th>MODELO</th>                                
                                <th>MATRICULA</th>
                                <th>TIPO</th>
                                <th>CALIBRE</th>
                                <th>SELECCIONAR</th>
                                <th class='hidentd'>CARGADORES</th>
                                <th class='hidentd'>MUNICIONES</th>                                                     
                          ";
}
$html .= "    </thead>
        <tbody>";
if ($cont2) {
    $cont = $cont2;
} else {
    $cont = 0;
}
while ($row = sqlsrv_fetch_array($execute)) {
    $cont++;
    
    $mat = $row["MATRICULA"];
    $mat2 = '"' . $mat . '"';
    $rfafe = $row["RFAFE"];
    $tipo = $row["TIPO"];
    $calibre = $row["CALIBRE"];
    $marca = $row["MARCA"];
    $mod = $row["MODELO"];
    $clasif = $row["CLASIFICACION"];
    $prop = $row["PROPIEDAD"];
    $stats = $row["STATUS"];
    $cargadores = $row["CARGADORES"];
    $municiones = $row["MINICIONES"];
    $sec = $row["SECTOR"];
    $usuario = $row["ID_USUARIO"];
    $cartucho = $row["CARTUCHOS"];
    $NoCargadores = $row["NOCARGADORES"];

    
    if ($addResg == "") {
        $html .= "
              <tr>
                  <td>$cont</td>                  
                  <td>$mat</td>
                  <td>$rfafe</td>
                  <td>" . utf8_encode($tipo) . "</td>
                  <td>$calibre</td>
                  <td>$marca</td>
                  <td>$mod</td>
                  <td>$clasif</td>
                  <td>$prop</td>
                  <td>$stats</td>
                  <td>$cargadores</td>
                  <td>$municiones</td>  
                  <td>$sec</td>
                  <td class='hidex'> 
                    <button type='button' class='btn btn-primary ' data-toggle='modal' onclick='dispElementAsig(\"$mat\")' data-target='#modal-default'>
                        <span class='fa fa-eye'></span>&nbsp;Ver
                    </button>
                  </td>
                  <td class='hidey' style='display: none'> 
                    $usuario
                  </td>
                  <td class='hidex hidez'><a class='btn btn-warning' value='$cont' onclick='editPadron($cont,$mat2)' ><i class='fa fa-edit'></i> Editar</a></td>                 
              </tr>
            ";
    } else  if ($addResIR == "") {
        $html .= "
              <tr id='tr$cont'>                  
                  <td>$marca</td>
                  <td>$stats</td>
                  <td>$mod</td>
                  <td>$mat</td>
                  <td>" . utf8_encode($tipo) . "</td>
                  <td>$calibre</td>
                  <td><input type='checkbox' class='checkAdd' name='No$cont' id='No$cont'></td>
                   <td style='display:none'><input id='Mat$cont' name='Mat$cont' value='$mat'></td>        
                   <td class='hidentd'><input required='true' id='Crgad$cont' name='Crgad$cont' value='$NoCargadores' class='form form-control'></td>        
                   <td class='hidentd'><input required='true' id='Muni$cont' name='Muni$cont' value='$cartucho' class='form form-control'></td>                                                                                                           
              </tr>
            ";
    }else{
         $html .= "
              <tr id='tr$cont'>                  
                  <td>$marca</td>
                  <td>$stats</td>
                  <td>$mod</td>
                  <td>$mat</td>
                  <td>" . utf8_encode($tipo) . "</td>
                  <td>$calibre</td>
                  <td><input type='checkbox' class='checkAdd' name='No$cont' id='No$cont'></td>
                   <td style='display:none'><input id='Mat$cont' name='Mat$cont' value='$mat'></td>        
                   <td class='hidentd'><input required='true' id='Crgad$cont' name='Crgad$cont' value='$NoCargadores' class='form form-control'></td>        
                   <td class='hidentd'><input required='true' id='Muni$cont' name='Muni$cont' value='$cartucho' class='form form-control'></td>                                             
                   <td class='hidentd'><input required='true' id='idArmamento$cont' name='idArmamento$cont' class='form form-control'></td>                                             
              </tr>
            ";
    }
}
echo $html .= "</tbody></table><input type='hidden' required='true' id='filas' name='filas' value='$cont' class='form form-control'>";


