<?php
error_reporting(E_ALL & ~E_WARNING);
$csv_file_path = 'csv/promo_code.csv';
$file = fopen($csv_file_path,"r");
$base_file_path = 'promofiles';

$index = 1;
while(! feof($file)) {
	// Read first field - curDte
	if (!empty($csv_file_path)){
		$field = fgetcsv($file);
		$curDate = $field[0];
		$curDate = strtotime($curDate);
		$curDate = date('Y-m-d',$curDate);
	} else {
		$curDate = date("Y-m-d");
	}
	// Read second field - PromoText
	$Promotext = $field[1];
	// promoFile = ase folder” .  yyyy/mm/dd.html (yyyy/mm/dd.html is based on curDate value)
		//$promoFile = $base_file_path."/".$curDate.".html";
	 $subfolder_path = $base_file_path."/".$curDate;
	 
	// If promo file is not present and correct date
	if ($curDate != '1970-01-01') {
		
		if(!mkdir($subfolder_path, 0777, true)) {
			echo "<br>Failed to create folder <strong>".$subfolder_path."</strong> or Folder already exits!";
		} else {
			$promoFile_path = $base_file_path."/".$curDate."/".$curDate.".html";
			$promoFile = fopen($promoFile_path, "w") or die("Unable to open file!");
			fwrite($promoFile, $Promotext);
			echo "<br><strong>".$index.") Created files = </strong>".$promoFile_path."<br>";
			$index++;
		}
	}
}

fclose($file);


 ?>
