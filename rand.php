<?
header("Content-type: text/xml");

$resultArray = array("success","failure");

	
$xml_output = "<?xml version=\"1.0\"?>";

$xml_output .= "<data>";
$xml_output .= "<result>";
$xml_output .= $resultArray[rand(0,(count($resultArray)-1))]; 
$xml_output .= "</result>";
$xml_output .= "</data>";  
echo $xml_output;

?>