<?

header("Content-type: text/xml");

include('../lib/functions.php');
cleanLogDir($config['days_to_log'],'*.csv','../logs/');

date_default_timezone_set($config['time_zone']);

$myFile 		=	"../logs/LOGS__".date('Y-m-d-H00').".csv";
$year 			=	date('Y');
$timeStamp	=	date('H:i:s');
    
$roomNumbers = Array();  
$roomNumbers = $_REQUEST['roomNumbers'];
$resultArray = array("success","failure");

$logDisposition = $resultArray[rand(0,(count($resultArray)-1))];

if($logDisposition=='success'){
	
	if(!file_exists($myFile)){
		touch ($myFile);
		$fh = fopen($myFile, 'a');
		fwrite($fh, '--------------------------------' . "\n");
		fwrite($fh, 'Clean Rooms: ');	
			foreach (($roomNumbers) as $key) {
				fwrite($fh,$key . " ");
			}
		fwrite($fh,"\n");	
		fclose($fh);
	}else{
		$fh = fopen($myFile, 'a');
		fwrite($fh, 'Clean Rooms: ');	
	 	foreach (($roomNumbers) as $key) {
			fwrite($fh,$key . " ");
		}   
		fwrite($fh,"\n");	
		fclose($fh);
		}
}

	$xml_output = "<?xml version=\"1.0\"?>";

	$xml_output .= "<data>";
	$xml_output .= "<result>";
	$xml_output .= $logDisposition; 
	$xml_output .= "</result>";
	$xml_output .= "</data>";  
	echo $xml_output;



?>
