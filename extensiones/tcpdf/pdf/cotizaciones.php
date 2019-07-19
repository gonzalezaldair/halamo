<?php
require_once '../../../modelos/cotizadorModelo.php';
require_once '../../../controladores/cotizadorControlador.php';

class imprimirCotizacion{
	public $codigo;
	public $opcion;
	public function traerimpresioncotizacion(){
		//traemos info de la cotizacion
		$numco = $this->codigo;
		$opc =$this->opcion;
		$respuesta = cotizadorControlador::imprimirCotizacionControlador($numco);
		$cotizacionid = $respuesta[0]["Num_cotizacion"];
		$fecha = $respuesta[0]["Fecha"];
		$nombres = $respuesta[0]["Nombres"];
		$direccion = $respuesta[0]["Direccion"];
		$tel = $respuesta[0]["Telefono"];
		$correo = $respuesta[0]["Correo"];
		$cliente = $respuesta[0]["cliente"];
		$telcliente = $respuesta[0]["telefono"];
		$formapago = $respuesta[0]["forma_pago"];
		$validez = $respuesta[0]["validez_oferta"];
		



// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->startPageGroup();
$pdf->AddPage();
if($cliente == ""){
	$bloque1 = <<<EOF
	<table>
		<tr>
			<td style="width: 150px;"><img src="images/logo_penalosa_pdf1.png" alt=""></td>
			<td style="background-color:white; width:140px;">
				<div style="font-size:8.5px; text-align:rigth; line-height:15px;">
					<br>
					NIT: 71.759.963-9
					<br>
					Direccion: Av 5 # 8-40 Centro
				</div>
			</td>
			<td style="background-color:white; width:140px;">
				<div style="font-size:8.5px; text-align:rigth; line-height:15px;">
					<br>
					Telefono: 5756464
					<br>
					info@penalosa.com.co
				</div>
			</td>
			<td style="background-color:white; width:110px; text-align:center; color:red">
				<br><br>
				Cotizacion N.<br>$cotizacionid
			</td>
		</tr>
	</table>
EOF;
$pdf->writeHTML($bloque1,false,false,false,false,'');
// ---------------------------------------------------------

$bloque2 = <<<EOF

	<table>
		
		<tr>
			
			<td style="width:540px"><img src="images/back.jpg"></td>
		
		</tr>

	</table>

	<table style="font-size:10px; padding:5px 10px;">
	
		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:390px">

				Cliente: $nombres

			</td>

			<td style="border: 1px solid #666; background-color:white; width:150px; text-align:right">
			
				Fecha: $fecha

			</td>

		</tr>

		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:540px">Vendedor: Portal</td>

		</tr>

		<tr>
		
		<td style="border-bottom: 1px solid #666; background-color:white; width:540px"></td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');
// ---------------------------------------------------------

$bloque3 = <<<EOF

	<table style="font-size:8px; padding:5px 10px;">

		<tr>
		<td style="border: 1px solid #666; background-color:white; width:40px; text-align:center">Item</td>
		<td style="border: 1px solid #666; background-color:white; width:60px; text-align:center">Referencia</td>
		<td style="border: 1px solid #666; background-color:white; width:200px; text-align:center">Producto</td>
		<td style="border: 1px solid #666; background-color:white; width:40px; text-align:center">Cant</td>
		<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">Valor Unit.</td>
		<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">Valor Total</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

// ---------------------------------------------------------
 $sumador = 0;
 $item=1;
 foreach ($respuesta as $key => $value){
 $bloque4 = <<<EOF

	<table style="font-size:8px; padding:5px 5px;">

		<tr>
			<td style="border: 1px solid #666; color:#333; background-color:white; width:40px; text-align:center">
				$item
			</td>
			<td style="border: 1px solid #666; color:#333; background-color:white; width:60px; text-align:left;">
				$value[REFERENCIA]
			</td>
			<td style="border: 1px solid #666; color:#333; background-color:white; width:200px; text-align:left;">
				$value[DESCRIPCION]
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:40px; text-align:right;">
				$value[Cantidad]
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:right;">$ 
				$value[Precio]
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:right;">$ 
				$value[precio_total]
			</td>


		</tr>

	</table>


EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');
$sumador = $sumador + $value["precio_total"];
$item=$item+1;
}
$sumador1 = $sumador * (0.81);
$iva = $sumador - $sumador1;
// ---------------------------------------------------------

$bloque5 = <<<EOF

	<table style="font-size:10px; padding:5px 5px;">

		<tr>

			<td style="color:#333; background-color:white; width:340px; text-align:center"></td>

			<td style="border-bottom: 1px solid #666; background-color:white; width:100px; text-align:center"></td>

			<td style="border-bottom: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center"></td>

		</tr>
		
		<tr>
		
			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:340px; text-align:center"></td>

			<td style="border: 1px solid #666;  background-color:white; width:100px; text-align:center">
				Neto:
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:right ">
				$ $sumador1
			</td>

		</tr>

		<tr>

			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:340px; text-align:center"></td>

			<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">
				Impuesto:
			</td>
		
			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:right ">
				$ $iva
			</td>

		</tr>

		<tr>
		
			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:340px; text-align:center"></td>

			<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">
				Total:
			</td>
			
			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:right ">
				$ $sumador
			</td>

		</tr>


	</table>

EOF;

$pdf->writeHTML($bloque5, false, false, false, false, '');
}else{
	$bloque1 = <<<EOF
	<table>
		<tr>
			<td style="width: 150px;"><img src="images/logo_penalosa_pdf1.png" alt=""></td>
			<td style="background-color:white; width:140px;">
				<div style="font-size:8.5px; text-align:rigth; line-height:15px;">
					<br>
					NIT: 71.759.963-9
					<br>
					Direccion: Av 5 # 8-40 Centro
				</div>
			</td>
			<td style="background-color:white; width:140px;">
				<div style="font-size:8.5px; text-align:rigth; line-height:15px;">
					<br>
					Telefono: 5756464
					<br>
					info@penalosa.com.co
				</div>
			</td>
			<td style="background-color:white; width:110px; text-align:center; color:red">
				<br><br>
				Cotizacion N.<br>$cotizacionid
			</td>
		</tr>
	</table>
EOF;
$pdf->writeHTML($bloque1,false,false,false,false,'');
// ---------------------------------------------------------

$bloque2 = <<<EOF

	<table>
		
		<tr>
			
			<td style="width:540px"><img src="images/back.jpg"></td>
		
		</tr>

	</table>

	<table style="font-size:10px; padding:5px 10px;">
	
		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:390px">

				Cliente: $cliente

			</td>

			<td style="border: 1px solid #666; background-color:white; width:150px; text-align:right">
			
				Fecha: $fecha

			</td>

		</tr>

		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:540px">Vendedor: $nombres</td>

		</tr>

		<tr>
		
		<td style="border-bottom: 1px solid #666; background-color:white; width:540px"></td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');
// ---------------------------------------------------------

$bloque3 = <<<EOF

	<table style="font-size:8px; padding:5px 10px;">

		<tr>
		<td style="border: 1px solid #666; background-color:white; width:40px; text-align:center">Item</td>
		<td style="border: 1px solid #666; background-color:white; width:60px; text-align:center">Referencia</td>
		<td style="border: 1px solid #666; background-color:white; width:200px; text-align:center">Producto</td>
		<td style="border: 1px solid #666; background-color:white; width:40px; text-align:center">Cant</td>
		<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">Valor Unit.</td>
		<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">Valor Total</td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');

// ---------------------------------------------------------
 $sumador = 0;
 $item=1;
 foreach ($respuesta as $key => $value){
 $bloque4 = <<<EOF

	<table style="font-size:8px; padding:5px 5px;">

		<tr>
			<td style="border: 1px solid #666; color:#333; background-color:white; width:40px; text-align:center">
				$item
			</td>
			<td style="border: 1px solid #666; color:#333; background-color:white; width:60px; text-align:left;">
				$value[REFERENCIA]
			</td>
			<td style="border: 1px solid #666; color:#333; background-color:white; width:200px; text-align:left;">
				$value[DESCRIPCION]
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:40px; text-align:right;">
				$value[Cantidad]
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:right;">$ 
				$value[Precio]
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:right;">$ 
				$value[precio_total]
			</td>


		</tr>

	</table>


EOF;

$pdf->writeHTML($bloque4, false, false, false, false, '');
$sumador = $sumador + $value["precio_total"];
$item=$item+1;
}
$sumador1 = $sumador * (0.81);
$iva = $sumador - $sumador1;
// ---------------------------------------------------------

$bloque5 = <<<EOF

	<table style="font-size:10px; padding:5px 5px;">

		<tr>

			<td style="color:#333; background-color:white; width:340px; text-align:center"></td>

			<td style="border-bottom: 1px solid #666; background-color:white; width:100px; text-align:center"></td>

			<td style="border-bottom: 1px solid #666; color:#333; background-color:white; width:100px; text-align:center"></td>

		</tr>
		
		<tr>
		
			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:340px; text-align:center"></td>

			<td style="border: 1px solid #666;  background-color:white; width:100px; text-align:center">
				Neto:
			</td>

			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:right ">
				$ $sumador1
			</td>

		</tr>

		<tr>

			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:340px; text-align:center"></td>

			<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">
				Impuesto:
			</td>
		
			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:right ">
				$ $iva
			</td>

		</tr>

		<tr>
		
			<td style="border-right: 1px solid #666; color:#333; background-color:white; width:340px; text-align:center"></td>

			<td style="border: 1px solid #666; background-color:white; width:100px; text-align:center">
				Total:
			</td>
			
			<td style="border: 1px solid #666; color:#333; background-color:white; width:100px; text-align:right ">
				$ $sumador
			</td>

		</tr>


	</table>

EOF;

$pdf->writeHTML($bloque5, false, false, false, false, '');
}



// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('cotizacion'.$numco.'.pdf', $opc);
}
}
$cotizacion = new imprimirCotizacion();
$cotizacion ->codigo= $_GET["codigo"];
$cotizacion ->opcion= $_GET["opcion"];
$cotizacion -> traerimpresioncotizacion();
?>