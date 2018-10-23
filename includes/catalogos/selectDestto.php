<?php

include_once '../../conexiones/sqlsrv.php';
$conn = connection_object();
$sector = isset($_REQUEST['SEC']) ? $_REQUEST['SEC'] : "";
$html = "<option selected='selected' value='0' >Opciones</option>";

if ($sector != "") {
    $querys = "select * from [dbo].[C_Destacamento] where sector ='$sector'";

    $execute = sqlsrv_query($conn, $querys);
    while ($row = sqlsrv_fetch_array($execute)) {

        $descripcion = $row['DESTACAMENTO'];
        $html .= "<option value='$descripcion'> $descripcion </option>";
    }    
}
echo $html;
