<?php 
	session_start();
	require('../conexiones/sqlsrv.php');        
    $conn = connection_object();
	
    $id_usr = isset($_REQUEST['id_elemento'])?$_REQUEST['id_elemento']:"";
    $noArmas = isset($_REQUEST['noArmas'])?$_REQUEST['noArmas']:"";
    $matricula = isset($_REQUEST['matricula'])?$_REQUEST['matricula']:"";
	
 
	
	   
	@$dia=date('d');
	@$mes=date('m');
		if(@$mes==1){ $m="ENERO"; }
		if(@$mes==2){ $m="FEBRERO"; }
		if(@$mes==3){ $m="MARZO"; }
		if(@$mes==4){ $m="ABRIL"; }
		if(@$mes==5){ $m="MAYO"; }
		if(@$mes==6){ $m="JUNIO"; }
		if(@$mes==7){ $m="JULIO"; }
		if(@$mes==8){ $m="AGOSTO"; }
		if(@$mes==9){ $m="SEPTIEMBRE"; }
		if(@$mes==10){ $m="OCTUBRE"; }
		if(@$mes==11){ $m="NOVIEMBRE"; }
		if(@$mes==12){ $m="DICIEMBRE"; }
	@$ayo=date('Y');
	require('fpdf/fpdf.php');
	class PDF extends FPDF
	{
		function Header()
		{
	
	@$this->SetFont('Times','B',16);	 
	@$this->Image('cdmx.png',140,0,70);
	
	@$this->SetTextColor(006,057,113);
	@$this->SetTextColor(0,0,0);
	@$this->Ln(18);
   	@$this->SetTextColor(0,0,0);
	@$this->SetFont('Times','',8);

}
		function Footer()
{

}
}


	
@$pdf=new PDF();
if($matricula!=""){
    $query="select * from [dbo].[Arma_Resg_Individual] where ID_ELEMENTO=$id_usr and matricula='$matricula' order by ID_RESGUARDO desc";
}else{
    $query="select top $noArmas * from [dbo].[Arma_Resg_Individual] where ID_ELEMENTO=$id_usr order by ID_RESGUARDO desc";
}
 
 $restn = sqlsrv_query($conn,$query);
 while($rowtn = sqlsrv_fetch_array($restn, SQLSRV_FETCH_ASSOC)){
 
 $id=$rowtn['ID_ELEMENTO'];
 $dom=$rowtn['DOMICILIO'];
 $col=$rowtn['COLONIA'];
 $cp=$rowtn['CP'];
 $loc=$rowtn['LOCALIDAD'];
 $mat=$rowtn['MATRICULA'];
 $usu=$rowtn['ID_USUARIO'];
 $folio=$rowtn['FOLIO'];
 
 
 $sql_datos="SELECT * FROM v_elemento_padron WHERE ID_ELEMENTO=$id_usr";
 $res = sqlsrv_query($conn,$sql_datos);
 $row = sqlsrv_fetch_array($res, SQLSRV_FETCH_ASSOC);
 
 $nom=$row['NOMBRE'];
 $ap=$row['APELLIDOP'];
 $am=$row['APELLIDOM'];
 $rfc=$row['RFC'];
 $placa=$row['PLACA'];
 $sec=$row['SECTOR'];
 $dest=$row['DEST'];
@$pdf->AddPage();
	@$pdf->Cell(135,5," ",0,0,'R',0);
	@$pdf->Cell(18,5,"FECHA ",0,0,'L',0);
	@$pdf->Cell(20,5,$dia." DE ".$m." DEL ".$ayo,0,0,'L',0);
	@$pdf->Ln(4);
	@$pdf->Cell(135,5,'',0,0,'R',0);
	@$pdf->Cell(18,5,utf8_decode('SECTOR'),0,0,'L',0);
	@$pdf->Cell(20,5,utf8_decode($sec),0,0,'L',0);
	@$pdf->Ln(4);
	@$pdf->Cell(135,5,'',0,0,'R',0);
	@$pdf->Cell(18,5,utf8_decode('No. FOLIO '),0,0,'L',0);
	@$pdf->Cell(20,5,utf8_decode($folio),0,0,'L',0);
	@$pdf->Ln(5);
@$pdf->SetFont('Times','B',12);

@$pdf->Cell(190,10,"CLAVE 11CD02",0,0,'C',0);
@$pdf->Ln(5);
@$pdf->Cell(190,10,"HOJA DE CONTROL INDIVIDUAL DE ARMAMENTO Y EQUIPO",0,0,'C',0);
@$pdf->Ln(8);
@$pdf->SetFont('Times','',7);
@$pdf->MultiCell(190,3,utf8_decode('CON FUNDAMENTO EN EL ARTÍCULO 24 DE LA LEY FEDERAL DE ARMAS DE FUEGO Y EXPLOSIVOS Y 60 DE SU REGLAMENTO, SE CREA LA PRESENTE NOTA DE CARGO CON AUTORIZACIÓN DE LA O EL DIRECTOR DE SECTOR Y A CARGO DE LA O EL DEPOSITAIO DEL ÁREA QUE SE INSCRIBE, Y USUARIO DIRECTO; ESTOS COMO RESPONSABLES DE LA CUSTODIA, CONTROL Y USO DE ESTOS BIENES CONFORME A LAS DISPOSICIONES EN LA LEY PÚBLICA Y REGLAMENTO EN LA MATERIA, Y LAS COMPLEMENTARIAS QUE LA SECRETARIA DE LA DEFENSA NACIONAL O LA SECRETARIA DE SEGURIDAD PÚBLICA DE LA CIUDAD DE MEXICO ESTABLEZCAN ARMAMENTO INCLUIDO EN LA LICENCIA OFICIAL COLECTIVA NÚMERO 6, ASIMISMO EL ARTÍCULO 47 FRACCIÓN III DE LA LEY FEDERAL DE RESPONSABILIDADES DE LOS SERVIDORES PÚBLICOS, ARTÍCULO 17 FRACCIÓN IX DE LA LEY DE SEGURIDAD PÚBLICA DE LA CDMX Y NUMERAL 7.3.2.2 DE LA CIRCULAR UNO 2015 DE LA "NORMATIVIDAD EN MATERIA DE ADMINISTRACIÓN DE RECURSOS" DE LA OFICIALIA MAYOR DEL GOBIERNO DE LA CIUDAD DE MEXICO, SE SUSCRIBEEL PRESENTE RESGUARDO DE BIENES A CARGO DE LA O EL ELEMENTO Y DEPOSITARIO DEL AREA QUE SE REFIERE ESTE DOCUMENTO COMPROMETE A LAS Y A LOS SIGNATARIOS A UTILIZAR DICHO RECURSO EXCLUSIVAMENTEPARA EL FIN QUE SE ASIGNADO, ÚSANDOLO CON EL DEBIDO CUIDADO Y PRUDENCIA, VIENDO EN TODO MOMENTO POR SU CONSERVACIÓN, SIENDO RESPONSABILIDAD DE LA O EL USUARIO LA PÉRDIDA O SUSTRACCIÓN DEL MISMO, CONFORME A LAS DISPOSICIONES PENALES ADMINISTRATIVAS Y CIVILES VIGENTES.'));
@$pdf->Ln(3);
 
 
@$pdf->Cell(25);
@$pdf->Cell(30,5,"SELLARLA",0,0,'C',0);
@$pdf->Cell(25);
@$pdf->Cell(30,5,"HUELLA DIGITAL ",0,0,'C',0);
@$pdf->Cell(25);
@$pdf->Cell(30,5,"HUELLA DIGITAL ",0,0,'C',0);
@$pdf->Cell(25);
@$pdf->Ln(3);
@$pdf->Cell(25);
@$pdf->Cell(30,5,"FOTOGRAFIA",0,0,'C',0);
@$pdf->Cell(25);
@$pdf->Cell(30,5,"IZQUIERDA",0,0,'C',0);
@$pdf->Cell(25);
@$pdf->Cell(30,5,"DERECHA",0,0,'C',0);
@$pdf->Cell(25);
@$pdf->Ln(-3);
@$pdf->Cell(25);
@$pdf->Cell(30,33,"",1,0,'C',0);
@$pdf->Cell(25);
@$pdf->Cell(30,33,"",1,0,'C',0);
@$pdf->Cell(25);
@$pdf->Cell(30,33,"",1,0,'C',0);
@$pdf->Cell(25);

@$pdf->Image('frente.png',38,97,25);
@$pdf->Image('huella.png',93,97,25);
@$pdf->Image('huella.png',147,97,25);


@$pdf->Ln(35);


@$pdf->SetFillColor(215,215,215);
@$pdf->Cell(95,5,utf8_decode("DATOS PERSONALES"),1,0,'C',1);
@$pdf->Cell(95,5,utf8_decode("DATOS LABORALES"),1,0,'C',1);
@$pdf->Ln(5);
@$pdf->Cell(95,5,utf8_decode("APELLIDO PATERNO:          ".$ap),1,0,'L',0);
@$pdf->Cell(95,5,utf8_decode("R.F.C.:          ".$rfc),1,0,'L',0);
@$pdf->Ln(5);
@$pdf->Cell(95,5,utf8_decode("APELLIDO MATERNO:          ".$am),1,0,'L',0);
@$pdf->Cell(95,5,utf8_decode("ID:          ".$id),1,0,'L',0);
@$pdf->Ln(5);
@$pdf->Cell(95,10,utf8_decode("NOMBRE(S):          ".$nom),1,0,'L',0);
@$pdf->Cell(95,5,utf8_decode("No. DE PLACA:          ".$placa),1,0,'L',0);
@$pdf->Ln(5);
@$pdf->Cell(95,5,'',0,0,'L',0);
@$pdf->Cell(95,5,utf8_decode("ÁREA DE ADSCRIPCIÓN:  SECTOR  ".$sec."  DESTACAMENTO  ".$dest),1,0,'L',0);

@$pdf->Ln(5);
@$pdf->Cell(95,5,utf8_decode("DOMICILIO PARTICULAR"),1,0,'C',1);
@$pdf->Cell(95,5,utf8_decode("DATOS DEL ARMA	"),1,0,'C',1);
@$pdf->Ln(5);
@$pdf->Cell(95,5,utf8_decode("CALLE:          ".$dom),1,0,'L',0);
@$pdf->Cell(95,5,utf8_decode("TIPO:           REVOLVER"),1,0,'L',0);
@$pdf->Ln(5);
@$pdf->Cell(95,5,utf8_decode("No. EXTERIOR E INTERIOR:"),1,0,'L',0);
@$pdf->Cell(95,5,utf8_decode("MARCA:          SMITH & WESSON"),1,0,'L',0);
@$pdf->Ln(5);
@$pdf->Cell(95,5,utf8_decode("COLONIA:          ".$col),1,0,'L',0);
@$pdf->Cell(95,5,utf8_decode("CALIBRE:          0.38 SPL"),1,0,'L',0);
@$pdf->Ln(5);
@$pdf->Cell(95,5,utf8_decode("CÓDIGO POSTAL:          ".$cp),1,0,'L',0);
@$pdf->Cell(95,5,utf8_decode("MODELO:           15-7"),1,0,'L',0);
@$pdf->Ln(5);
@$pdf->Cell(95,5,utf8_decode("DELEGACIÓN O MUNICIPIO:          ".$loc),1,0,'L',0);
@$pdf->Cell(95,5,utf8_decode("MATRÍCULA:        ".$mat),1,0,'L',0);
@$pdf->Ln(5);
@$pdf->Cell(60,5,utf8_decode("EQUIPO DE DEFENSA Y SEGURIDAD"),1,0,'C',1);
@$pdf->Cell(35,5,utf8_decode("No. DE CONTROL"),1,0,'C',1);
@$pdf->Cell(95,5,utf8_decode("R.F.A.:           C A P 3 0 4 8"),1,0,'L',0);
@$pdf->Ln(5);
@$pdf->Cell(60,5,utf8_decode("CHALECO:"),1,0,'L',0);
@$pdf->Cell(35,5,utf8_decode("0"),1,0,'C',0);
@$pdf->Cell(95,5,utf8_decode("CARGADORES:          0"),1,0,'L',0);
@$pdf->Ln(5);
@$pdf->Cell(60,5,utf8_decode("EQUIPO ANTIMOTÍN:"),1,0,'L',0);
@$pdf->Cell(35,5,utf8_decode("0"),1,0,'C',0);
@$pdf->Cell(95,5,utf8_decode("MUNICIONES:          18 CARTUCHOS"),1,0,'L',0);
@$pdf->Ln(5);
@$pdf->Cell(60,5,utf8_decode("PR-24:"),1,0,'L',0);
@$pdf->Cell(35,5,utf8_decode("0"),1,0,'C',0);
@$pdf->Cell(95,5,utf8_decode("No. DE USUARIO:          ".$usu),1,0,'L',0);
@$pdf->Ln(5);
@$pdf->Cell(60,5,utf8_decode("CANDADO DE MANO:"),1,0,'L',0);
@$pdf->Cell(35,5,utf8_decode("0"),1,0,'C',0);
@$pdf->Cell(95,5,utf8_decode("RAZÓN SOCIAL:           DELEGACION POLITICA G.A.M."),1,0,'L',0);
@$pdf->Ln(7);



@$pdf->Cell(47,5,"ENTREGO",0,0,'C',0);
@$pdf->Cell(48,5,"RECIBE",0,0,'C',0);
@$pdf->Cell(47,5,"Vo. Bo.",0,0,'C',0);
@$pdf->Cell(48,5,"AUTORIZA",0,0,'C',0);
@$pdf->Ln(3);
@$pdf->Cell(47,5,"ARMAMENTO Y EQUIPO",0,0,'C',0);
@$pdf->Cell(48,5,"ARMAMENTO Y EQUIPO",0,0,'C',0);
@$pdf->Cell(47,5,"COMANDANTE DEL",0,0,'C',0);
@$pdf->Cell(48,5,"DIRECTOR DEL SECTOR",0,0,'C',0);
@$pdf->Ln(3);
@$pdf->Cell(47,5,"",0,0,'C',0);
@$pdf->Cell(48,5,"",0,0,'C',0);
@$pdf->Cell(47,5,"DESTACAMENTO",0,0,'C',0);
@$pdf->Cell(48,5,"",0,0,'C',0);
@$pdf->Ln(-6);
@$pdf->Cell(47,25,"",1,0,'C',0);
@$pdf->Cell(48,25,"",1,0,'C',0);
@$pdf->Cell(47,25,"",1,0,'C',0);
@$pdf->Cell(48,25,"",1,0,'C',0);
@$pdf->Ln(25);
@$pdf->Cell(47,12,"",1,0,'C',0);
@$pdf->Cell(48,12,"",1,0,'C',0);
@$pdf->Cell(47,12,"",1,0,'C',0);
@$pdf->Cell(48,12,"",1,0,'C',0);
@$pdf->Ln(1);
@$pdf->Cell(47,4,"",0,0,'C',0);
@$pdf->Cell(48,4,"POLICIA 2 ",0,0,'C',0);
@$pdf->Cell(47,4,"",0,0,'C',0);
@$pdf->Cell(48,4,"",0,0,'C',0);
@$pdf->Ln(3);
@$pdf->Cell(47,4,"POLICIA 2",0,0,'C',0);
@$pdf->Cell(48,4,"ESMERALDA GUADALUPE ",0,0,'C',0);
@$pdf->Cell(47,4,"POLICIA 2",0,0,'C',0);
@$pdf->Cell(48,4,"SEGUNDO INSPECTOR",0,0,'C',0);
@$pdf->Ln(3);
@$pdf->Cell(47,4,"DANIEL DE LA ROSA  ",0,0,'C',0);
@$pdf->Cell(48,4,"ACATITLA ORTEGA  ",0,0,'C',0);
@$pdf->Cell(47,4,"ADAN HERNANDEZ",0,0,'C',0);
@$pdf->Cell(48,4,"MIGUEL ZARAGOZA",0,0,'C',0);
@$pdf->Ln(8);
@$pdf->Cell(190,4,"NOTA: EL PRESENTE RESGUARDO INDIVIDUAL ES DE USO EXCLUSIVO PARA CONTROL INTERNO EN CASA SECTOR ",1,0,'C',0);

@$pdf->Image('ABAJO.png',165,252,34);
@$pdf->Ln(25);
@$pdf->Cell(155,4," ",0,0,'C',0);
@$pdf->Cell(35,4,"FO-SSPPA-02-DEOP-30 V2",1,0,'C',0);

@$pdf->Ln(-17);
@$pdf->Cell(120,4," ",0,0,'C',0);
@$pdf->Cell(35,4,utf8_decode("Secretaria de Seguridad Pública"),0,0,'L',0);
@$pdf->Ln(3);
@$pdf->Cell(120,4," ",0,0,'C',0);
@$pdf->Cell(35,4,utf8_decode("Dirección General de la Policia"),0,0,'L',0);
@$pdf->Ln(3);
@$pdf->Cell(120,4," ",0,0,'C',0);
@$pdf->Cell(35,4,"Sector 65",0,0,'L',0);
@$pdf->Ln(3);
@$pdf->Cell(120,4," ",0,0,'C',0);
@$pdf->Cell(35,4,"Destacamento 01",0,0,'L',0);
@$pdf->Ln(3);
}





@$pdf->Output();	
	
	
	


?>
