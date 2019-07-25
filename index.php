<?php
date_default_timezone_set('America/Bogota');


//MODELOS
require_once 'modelos/login.modelo.php';
require_once 'modelos/rol.modelo.php';
require_once 'modelos/funcionalidad.modelo.php';
require_once 'modelos/persona.modelo.php';
require_once 'modelos/habitacion.modelo.php';
require_once 'modelos/reserva.modelo.php';
require_once 'modelos/usuario.modelo.php';
require_once 'modelos/tipodoc.modelo.php';
require_once 'modelos/tipohab.modelo.php';
require_once 'modelos/cliente.modelo.php';



//controladores
require_once 'controladores/templateControlador.php';
require_once 'controladores/login.controlador.php';
require_once 'controladores/rol.controlador.php';
require_once 'controladores/funcionalidad.controlador.php';
require_once 'controladores/persona.controlador.php';
require_once 'controladores/reserva.controlador.php';
require_once 'controladores/habitacion.controlador.php';
require_once 'controladores/usuario.controlador.php';
require_once 'controladores/tipodoc.controlador.php';
require_once 'controladores/tipohab.controlador.php';
require_once 'controladores/cliente.controlador.php';


//EXTENSIONES
require_once 'extensiones/PHPMailer/PHPMailerAutoload.php';
require_once 'extensiones/Classes/PHPExcel/IOFactory.php';

$template = new TemplateController();
$template -> template();