<?php
date_default_timezone_set('America/Bogota');

//controladores
require_once 'controladores/templateControlador.php';
//EXTENSIONES
require_once 'extensiones/PHPMailer/PHPMailerAutoload.php';
require_once "extensiones/Classes/PHPExcel/IOFactory.php";

$template = new TemplateController();
$template -> template();