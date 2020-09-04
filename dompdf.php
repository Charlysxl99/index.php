<?php


require_once __DIR__ . '../vendor/autoload.php';

/* require_once('documento.php'); */
/* require_once('contrato-print.php'); */



/* $plantilla = getPlantilla(); */
$css = file_get_contents('style-imprimir.css');
$html = file_get_contents('base.php');
$header = file_get_contents('header-print.html');
$footer = file_get_contents('footer-print.html');

//Grabs variables

$pname = $_POST['promotor'];
$cname = $_POST['cname'];

//

$mpdf = new \Mpdf\Mpdf(
  [
    "format" => "A4",
    "margin_left"=> "0",
    "margin_right" => "0",
    "margin_top" => "0",
    "margin_bottom" => "0",
    "margin_header" => "0",
    "margin_footer" => "0"
  ]
);

$mpdf->SetFooter( $footer, $side = 'right');
$mpdf->WriteHTML($html);

$mpdf->AddPageByArray($pname);
/* 
$mpdf->AddPageByArray($contrato,[ "margin_top" =>"50px"]); */

/*   "format" => "A4",
  "mgl" => "0",
  "mgr" => "0",
  "mgt" => "0",
  "mgb" => "0",
  "mgh" => "0",
  "mgf" => "0",
]
)); */
//output browser
$mpdf->Output('myfile.pdf','I' );




?>