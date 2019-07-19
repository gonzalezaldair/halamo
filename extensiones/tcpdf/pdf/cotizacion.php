<?php

require_once '../../../modelos/cotizadorModelo.php';
require_once '../../../controladores/cotizadorControlador.php';
require_once('../tcpdf.php');

class imprimirCotizacion extends TCPDF{
	public $codigo;
	public $opcion;
	public function header()
	{
		$numco = $this->codigo;
		$opc =$this->opcion;
		$respuesta1 = cotizadorControlador::imprimirCotizacionControlador($numco);
		if($this->PageNo() == 1)
		{
			if($respuesta1[0]['cliente'] == "")
			{
				$this->Image("images/logo.png", 10,10,50,18, "png");
			}else{
				$this->Image("images/".$respuesta1[0]['img'], 10,10,50,18,"");
			}
			
			$this->SetFont('Helvetica','',10);$this->SetY(15);
			$this->Write(5,'Cotizacion N° '.$respuesta1[0]['Num_cotizacion'],'',false,'R',true);
			$datoscoti = array('cliente' => 'Jose Daniel', 'contacto' => 'Francisco Arias', 'telefono' => '5797401');
		$this->SetFont('Helvetica','',10);$this->SetY(30);
		$this->Write(5,'San Jose de Cucuta, '.$respuesta1[0]['Fecha'],'',false,'L',true);
		$this->Ln();
		//$this->Write(5,'','',false,'L',true);
		if($respuesta1[0]['cliente'] == "")
		{
			$this->Write(5,'Cliente: ' .$respuesta1[0]['Nombres'],'',false,'L',true);
		}else{
			$this->Write(5,'Cliente: ' .$respuesta1[0]['cliente'],'',false,'L',true);	
		}
		
		$this->Ln();
		//$this->Write(5,'','',false,'L',true);
		//$this->Write(5,'Contacto: ' .$datoscoti["contacto"],'',false,'L',true);
		if($respuesta1[0]['telefono'] == "")
		{
			$this->Write(5,'Telefono: ' .$respuesta1[0]['Telefono'],'',false,'L',true);
		}else{
			$this->Write(5,'Telefono: ' .$respuesta1[0]['telefono'],'',false,'L',true);	
		}
		
		$this->Ln();
		//$this->Write(5,'','',false,'L',true);
		$this->Write(5,'En atencion a su solicitud, nos permitimos presentar nuestra oferta comercial, asi:','',false,'L',true);
		}
		
	}

	public function footer()
	{
		$numco = $this->codigo;
		$opc =$this->opcion;
		$respuesta1 = cotizadorControlador::imprimirCotizacionControlador($numco);
		$this->SetFont('Helvetica','',8);
		$this->SetY(-25);
		$this->writeHTML('<p>Plazo, precio y condiciones de pago sujetos a cambio sin previo aviso.Esta cotizacion NO constituye un compromiso de venta <br>ni contrae obligatoriedad alguna de nuestra parte</p>',false,false,false,false,'C');
		$this->writeHTML('<br><div style="border-color: black;"></div>',false,false,false,false);
		//$this->write(5,'M.A. PEÑALOSA CIA S.A.S','',false,'L');
		if($respuesta1[0]['cliente'] == ""){$this->Write(5,'M.A. PEÑALOSA CIA S.A.S  Direccion: AV 5 N° 8-40 Centro  Tel:5756464  Sitio Web: www.penalosacorona.com','',false,'C');}
		
		$this->SetX(-25);
		//$this->AliasNbPages();
		$this->Write(5, $this->PageNo());
	}
}

$cotizacion = new imprimirCotizacion();
$cotizacion ->codigo= $_GET["codigo"];
$cotizacion ->opcion= $_GET["opcion"];
$respuesta = cotizadorControlador::imprimirCotizacionControlador($_GET["codigo"]);
$cotizacion ->AddPage('portrait','LETTER');
$cotizacion->SetFont('Helvetica','B',10);
$cotizacion->SetY(70);
$cotizacion->Cell(10,5,'Item',1,0,'C',false);
$cotizacion->Cell(30,5,'Referencia',1,0,'C',false);
$cotizacion->Cell(105,5,'Producto',1,0,'C',false);
$cotizacion->Cell(10,5,'Cant',1,0,'C',false);
$cotizacion->Cell(20,5,'Valor Unit',1,0,'C',false);
$cotizacion->Cell(20,5,'Valor Total',1,0,'C',false);
$cotizacion->Ln();
$cotizacion->SetFont('Helvetica','',7);
$item = 1;
$sumador = 0;
foreach ($respuesta as $key => $value) {
	$cotizacion->Cell(10,5,$item,1,'C',false);
	$cotizacion->Cell(30,5,$value['REFERENCIA'],1,'C',false);
	$cotizacion->Cell(105,5,$value['DESCRIPCION'],1,'C',false);
	$cotizacion->Cell(10,5,$value['Cantidad'],1,'C',false);
	$cotizacion->Cell(20,5,"$ ".number_format ($value['Precio'] ,2,".", ","),1,0,'R',false);
	$cotizacion->Cell(20,5,"$ ".number_format ($value['precio_total'] ,2,".", ","),1,0,'R',false);
	$sumador = $value['precio_total'] + $sumador;
	$item++;
	if($item == 33)
	{
		$cotizacion ->AddPage('portrait','LETTER');
	}
	$cotizacion->Ln();
}

$iva = ($sumador * 19)/100;
$subto = $sumador - $iva;
$cotizacion->Ln();
$cotizacion->SetX(-70);
$cotizacion->Cell(30,5,"SUBTOTAL",1,0,'C',false);
$cotizacion->Cell(30,5,"$ ".number_format ($subto ,2,".", ","),1,0,'R',false);
$cotizacion->Ln();
$cotizacion->SetX(-70);
$cotizacion->Cell(30,5,"IVA %",1,0,'C',false);
$cotizacion->Cell(30,5,"$ ".number_format ($iva ,2,".", ","),1,0,'R',false);
$cotizacion->Ln();
$cotizacion->SetX(-70);
$cotizacion->Cell(30,5,"TOTAL",1,0,'C',false);
$cotizacion->Cell(30,5,"$ ".number_format ($sumador ,2,".", ","),1,0,'R',false);
$cotizacion->Ln(20);
/*if ($item > 24) {
	
}*/
$cotizacion->SetFont('Helvetica','',8);
$cotizacion->Cell(195,5,"CONDICIONES COMERCIALES",1,0,'C',false);
$cotizacion->Ln();
$cotizacion->Cell(50,5,"Observaciones",1,0,'L',false);
$cotizacion->Cell(145,5,"Observaciones",1,0,'L',false);
$cotizacion->Ln();
$cotizacion->Cell(50,5,"Forma de Pago",1,0,'L',false);
$cotizacion->Cell(145,5,$respuesta[0]['forma_pago'],1,0,'L',false);
$cotizacion->Ln();
$cotizacion->Cell(50,5,"Validez de la Oferta",1,0,'L',false);
$cotizacion->Cell(145,5,$respuesta[0]['validez_oferta'],1,0,'L',false);
$cotizacion->Ln();
$cotizacion->Cell(50,5,"Lugar de Entrega",1,0,'L',false);
$cotizacion->Cell(145,5,"Observaciones",1,0,'L',false);
//$cotizacion ->AddPage();
$cotizacion->Output('cotizacion'.$_GET["codigo"].'.pdf', $_GET["opcion"]);