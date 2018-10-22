<?php

include_once '../../conexiones/sqlsrv.php';
$conn = connection_object();
$html = "";
$queryAddResgIR = "";

$id_elemento = isset($_REQUEST['id_elemE']) ? $_REQUEST['id_elemE'] : "";
$sector = isset($_REQUEST['sectorRI']) ? $_REQUEST['sectorRI'] : "";
$destto = isset($_REQUEST['desttoRI']) ? $_REQUEST['desttoRI'] : "";
$id_usuario = isset($_REQUEST['idUsuarioRI']) ? $_REQUEST['idUsuarioRI'] : "";
$domicilio = isset($_REQUEST['domicilioRI']) ? $_REQUEST['domicilioRI'] : "";
$colonia = isset($_REQUEST['coloniaRI']) ? $_REQUEST['coloniaRI'] : "";
$cp = isset($_REQUEST['cpRI']) ? $_REQUEST['cpRI'] : "";
$localidad = isset($_REQUEST['localidadRI']) ? $_REQUEST['localidadRI'] : "";
$entidad = isset($_REQUEST['entidadRI']) ? $_REQUEST['entidadRI'] : "";
$chaleco = isset($_REQUEST['chaleco']) ? $_REQUEST['chaleco'] : "";
$antimotin = isset($_REQUEST['antimotin']) ? $_REQUEST['antimotin'] : "";
$candado = isset($_REQUEST['candado']) ? $_REQUEST['candado'] : "";
$id_vobo = isset($_REQUEST['VOBO']) ? $_REQUEST['VOBO'] : "";
$id_autoriza = isset($_REQUEST['idautoriza']) ? $_REQUEST['idautoriza'] : "";




$noFilas = isset($_REQUEST['nofilas']) ? $_REQUEST['nofilas'] : "";

for ($index = 1; $index <= $noFilas; $index++) {
    $id_armamento = isset($_REQUEST['idArmamento' . $index]) ? $_REQUEST['idArmamento' . $index] : "";
    $cargadores = isset($_REQUEST['Crgad' . $index]) ? $_REQUEST['Crgad' . $index] : "";
    $cartuchos = isset($_REQUEST['Muni' . $index]) ? $_REQUEST['Muni' . $index] : "";
    $matricula = isset($_REQUEST['Mat' . $index]) ? $_REQUEST['Mat' . $index] : "";
    $queryAddResgIR .= "insert into [dbo].[Arma_Resg_Individual]
                        values((select COUNT(*)+1 from [dbo].[Arma_Resg_Individual]),1,GETDATE(),(select CONCAT ((select COUNT(*)+1 ID_RESGUARDO from [dbo].[Arma_Resg_Individual]),'50')AS FOLIO),
                        $id_elemento,$sector,$destto,'$id_usuario',
                        '$matricula',$cargadores,$cartuchos,'$domicilio','$colonia',$cp,'$localidad','$entidad','$chaleco','$antimotin','$candado',$id_armamento,$id_vobo,$id_autoriza)
                        ";
}
//echo $queryAddResgIR;
$execute = sqlsrv_query($conn, $queryAddResgIR);

if ($execute) {
    $html = 1;
} else {
    $html = 2;
}

echo $html;
