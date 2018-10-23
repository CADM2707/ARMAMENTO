<?php

include_once '../../conexiones/sqlsrv.php';
$conn = connection_object();
$load = isset($_REQUEST['loadSelectores']) ? $_REQUEST['loadSelectores'] : 0;
$html = "";
$querys = array();
$opciones = array();
$dos= isset($_REQUEST['dos'])? $_REQUEST['dos']: 0;
$sec= isset($_REQUEST['usrSec'])? $_REQUEST['dos']: 0;
//$codeUsr="";
//if($sec!=0){
// $codeUsr="and T2.R_SOCIAL like '50' and ";  
//}
if ($load==1) {
    // QUERYS
    $querys[0] = "select * from Arma_C_Clasificacion order by CLASIFICACION ASC";
    $querys[1] = "select * from Arma_C_Tipo order by DESCRIPCION ASC";
    $querys[2] = "select * from Arma_C_Marca where CVE_MARCA<>0 order by DESCRIPCION ASC";
    $querys[3] = "select * from Arma_C_Modelo where CVE_MODELO<>0 order by DESCRIPCION ASC";
    $querys[4] = "select * from Arma_C_Calibre where CVE_CALIBRE<>0 order by DESCRIPCION asc";
    $querys[5] = "select * from Arma_C_Situacion order by STATUS asc";    
    $querys[6] = "SELECT T1.ID_USUARIO,R_SOCIAL FROM USUARIO_PADRON T1
                  INNER JOIN Usuario_Vigencia_R_Social T2 ON T1.ID_USUARIO=T2.ID_USUARIO
                  WHERE Sector=50 AND T1.ID_USUARIO LIKE '4.%'
                  UNION
                  SELECT CAST(Sector AS varchar(2))+CAST(DESTACAMENTO AS VARCHAR(2)),'SECTOR '+CAST(Sector AS varchar(2))+' DESTACAMENTO '+CAST(DESTACAMENTO AS VARCHAR(2))
                  FROM Usuario_Padron WHERE ID_USUARIO IN ('0','80019')  ORDER BY R_SOCIAL";
    $querys[7] = "select * from [dbo].[Arma_C_Propietario] order by PROPIEDAD ASC";
    $querys[8] = "select SECTOR from [dbo].[C_Sector] order by SECTOR ASC";
    for ($i = 0; $i <= 8; $i++) {

        $execute = sqlsrv_query($conn, $querys[$i]);        
        while ($row = sqlsrv_fetch_array($execute)) {
            
            switch ($i) {
                case 0:
                    $cve = "CVE_CLASIFICACION";
                    $desc = "CLASIFICACION";
                    break;
                case 1:
                    $cve = "CVE_TIPO";
                    $desc = "DESCRIPCION";
                    break;
                case 2:
                    $cve = "CVE_MARCA";
                    $desc = "DESCRIPCION";
                    break;                
                case 3:
                    $cve = "CVE_MODELO";
                    $desc = "DESCRIPCION";
                    break;                
                case 4:
                    $cve = "CVE_CALIBRE";
                    $desc = "DESCRIPCION";
                    break;                
                case 5:
                    $cve = "CVE_STATUS";
                    $desc = "STATUS";
                    break;                
                case 6:
                    $cve = "ID_USUARIO";
                    $desc = "R_SOCIAL";
                    break;                                            
                case 7:
                    $cve = "CVE_PROPIEDAD";
                    $desc = "PROPIEDAD";
                    break;                                            
                case 8:
                    $cve = "SECTOR";
                    $desc = "SECTOR";
                    break;                                            
            }            	
            
            $id = $row[$cve];
            $descripcion = utf8_encode($row[$desc]);
            if($dos!=1 || $cve=="ID_USUARIO"){
            $html .= "<option value='$id'> $descripcion </option>";            
            }else{
            $html .= "<option value='$descripcion'> $descripcion </option>";  
            }
        }
       $opciones[$i] = $html; 
       $html="";
    }    
    echo json_encode($opciones);
}