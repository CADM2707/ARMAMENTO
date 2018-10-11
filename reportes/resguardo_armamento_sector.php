<?php 
	session_start();
	//require('../conexion.php');
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


@$pdf->AddPage();
	@$pdf->Cell(135,5," ",0,0,'R',0);
	@$pdf->Cell(18,5,"FECHA ",0,0,'L',0);
	@$pdf->Cell(20,5,$dia." DE ".$m." DEL ".$ayo,0,0,'L',0);
	@$pdf->Ln(4);
	@$pdf->Cell(135,5,'',0,0,'R',0);
	@$pdf->Cell(18,5,utf8_decode('SECTOR'),0,0,'L',0);
	@$pdf->Cell(20,5,utf8_decode('65'),0,0,'L',0);
	@$pdf->Ln(4);
	@$pdf->Cell(135,5,'',0,0,'R',0);
	@$pdf->Cell(18,5,utf8_decode('No. FOLIO '),0,0,'L',0);
	@$pdf->Cell(20,5,utf8_decode('2533 '),0,0,'L',0);
	@$pdf->Ln(5);
@$pdf->SetFont('Times','B',12);

@$pdf->Cell(190,10,"CLAVE 11CD02",0,0,'C',0);
@$pdf->Ln(5);
@$pdf->Cell(190,10,"RESGUARDO DE ARMAMENTO DEL SECTOR 65",0,0,'C',0);
@$pdf->Ln(8);
@$pdf->SetFont('Times','',7);
@$pdf->MultiCell(190,3,utf8_decode('Con fundamento en el articulo 24 de la Ley Federal de Armas de Fuego y Explosivos y 60 de su reglamento, se crea el presente Resguardo General de Armamento a cargo de la o el Titular y Depositario de la Dirección que se inscribe, estos como responsables de la custodia, control y usp de estos bienes que se encuentran fisicamente a carfo de esa area,conforme a la establecidas en la ley y reglamento en la materia y los complementarias que la Secretaria de Defensa en la Secretaria de Seguridad Pública de la Ciudad de Mexico establezcan, Original incluido en la Licencia Oficial Colectiva número 4 . Asi mismoen los articulos 47 fracción III de la Ley Federal de Responsabilidades de los Servidores Públicos,fracción de la Ley de Seguridad Pública de la Ciudad de Mexico y 2.3.2.2 de la Circular Uno 2015 de la "Normatividad de Materia de Administracion de Recursos " de la Oficialia Mayor del Gobierno de la Ciudad de Mexico.'));
@$pdf->Ln(3);


@$pdf->SetFillColor(215,215,215);
@$pdf->Cell(10,5,utf8_decode("No."),1,0,'C',1);
@$pdf->Cell(18,5,utf8_decode("TIPO"),1,0,'C',1);
@$pdf->Cell(18,5,utf8_decode("MARCA"),1,0,'C',1);
@$pdf->Cell(18,5,utf8_decode("CALIBRE"),1,0,'C',1);
@$pdf->Cell(18,5,utf8_decode("MODELO"),1,0,'C',1);
@$pdf->Cell(18,5,utf8_decode("MATRICULA"),1,0,'C',1);
@$pdf->Cell(18,5,utf8_decode("INVENTARIO"),1,0,'C',1);
@$pdf->Cell(18,5,utf8_decode("FOLIO D"),1,0,'C',1);
@$pdf->Cell(18,5,utf8_decode("CARGADORES"),1,0,'C',1);
@$pdf->Cell(18,5,utf8_decode("MUNICIONES"),1,0,'C',1);
@$pdf->Cell(18,5,utf8_decode("SITUACION"),1,0,'C',1);
@$pdf->Ln(5);
for($x=1; $x<=20; $x++){
@$pdf->Cell(10,5,utf8_decode("$x"),1,0,'C',0);
@$pdf->Cell(18,5,utf8_decode("PISTOLA"),1,0,'C',0);
@$pdf->Cell(18,5,utf8_decode("BERRETA"),1,0,'C',0);
@$pdf->Cell(18,5,utf8_decode("SKA"),1,0,'C',0);
@$pdf->Cell(18,5,utf8_decode("3423"),1,0,'C',0);
@$pdf->Cell(18,5,utf8_decode("GSDFLKK"),1,0,'C',0);
@$pdf->Cell(18,5,utf8_decode("43635735635"),1,0,'C',0);
@$pdf->Cell(18,5,utf8_decode("D23423"),1,0,'C',0);
@$pdf->Cell(18,5,utf8_decode("2"),1,0,'C',0);
@$pdf->Cell(18,5,utf8_decode("50"),1,0,'C',0);
@$pdf->Cell(18,5,utf8_decode("FISICO"),1,0,'C',0);
@$pdf->Ln(5);
}
@$pdf->Ln(1);
@$pdf->Cell(190,5,"RECIBE DE CONFORMIDAD",0,0,'C',0);
@$pdf->Ln(5);
@$pdf->Cell(95,20,"",1,0,'C',0);
@$pdf->Cell(95,20,"",1,0,'C',0);
@$pdf->Ln(1);
@$pdf->Cell(95,5,"Encargada(o) de Armamento del Sector",0,0,'C',0);
@$pdf->Cell(95,5,"Director(a) del Sector",0,0,'C',0);
@$pdf->Ln(12);
@$pdf->Cell(95,5,"Policia",0,0,'C',0);
@$pdf->Cell(95,5,"Segundo Inspector",0,0,'C',0);
@$pdf->Ln(3);
@$pdf->Cell(95,5,"Daniel",0,0,'C',0);
@$pdf->Cell(95,5,"Miguel",0,0,'C',0);

@$pdf->Ln(5);
@$pdf->Cell(190,5,"ENTREGA",0,0,'C',0);
@$pdf->Ln(5);
@$pdf->Cell(63,25,"",1,0,'C',0);
@$pdf->Cell(64,25,"",1,0,'C',0);
@$pdf->Cell(63,25,"",1,0,'C',0);
@$pdf->Ln(1);
@$pdf->Cell(63,5,"Elaboro",0,0,'C',0);
@$pdf->Cell(64,5,"Vo. Bo.",0,0,'C',0);
@$pdf->Cell(63,5,"Autorizo",0,0,'C',0);
@$pdf->Ln(5);
@$pdf->Cell(63,5,"Encargada(o) del Deposito General de ",0,0,'C',0);
@$pdf->Cell(64,5,"J.U.D. de Armamento y Municiones",0,0,'C',0);
@$pdf->Cell(63,5,"Director Ejecutiva de Operacion Policial",0,0,'C',0);
@$pdf->Ln(12);
@$pdf->Cell(63,5,"Policia Segundo",0,0,'C',0);
@$pdf->Cell(64,5,"",0,0,'C',0);
@$pdf->Cell(63,5,"Primer Superintendente",0,0,'C',0);
@$pdf->Ln(3);
@$pdf->Cell(63,5,"Armando ",0,0,'C',0);
@$pdf->Cell(64,5,"Juan Ramon",0,0,'C',0);
@$pdf->Cell(63,5,"Jose Crisoforo",0,0,'C',0);


@$pdf->Ln(10);
@$pdf->MultiCell(190,4,"NOTA: En caso de que el Titular del Area se separe del cargo, debera informar a la Direccion Ejecutiva de Operacion Policial conforme a sus facultades, asimismo debera dar seguimiento a los bienes que se encuentren en situacion juridica (Extraviado, Robado y/o Consignado) en la unidad hasta su culminacion");

@$pdf->Image('ABAJO.png',165,252,34);
@$pdf->Ln(22);
@$pdf->Cell(155,4," ",0,0,'C',0);
@$pdf->Cell(35,4,"FO-SSPPA-02-DEOP-30 V2",1,0,'C',0);

@$pdf->Ln(-15);
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


@$pdf->Output();

?>