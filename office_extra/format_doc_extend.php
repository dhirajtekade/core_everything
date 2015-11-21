<?php

//task desc for name
$person = 'Dhiraj Tekade';
$version = '1.0';
$issue_name = 'eventhub_media_submenu';
$date = '20 Nov 2015';
$issue = ucfirst('eventhub media submenu changes');


//create actual doc file with name $filename
//header("Content-type: application/vnd.ms-word");
$filename = "xaraya_".$issue_name.".doc";
//header("Content-Disposition: attachment;Filename=$filename");

//actual data in the doc file
$version_history = '<br><b><i>Version History</i></b>';
$version_table = '<style>
					table {
					    border-collapse: collapse;
					}
					
					table, td, th {
					    border: 1px solid black;
					}
					tr { text-align:center;}
					</style>
					<table style="font-family:Calibri;padding:5px;">
						<tr style="background:#D3D3D3;">
							<td style="width:100px;">Person Name</td>
							<td style="width:120px;">Date</td>
							<td style="width:80px;">Version</td>
							<td style="width:300px;">Details</td>
						</tr>
						<tr>
							<td>'.$person.'</td>
							<td>'.$date.'</td>
							<td>'.$version.'</td>
							<td>'.$issue.'</td>
						</tr>
					</table>';

$content = '<br><div style="font-family:Cambria; font-size:20px;font-weight: bold;color:#9370db;">Contents</div>';
$content = $content."<br><u>Task Requirement</u>";


$doc_data = $version_history."<br>".$version_table."<br>".$content.'<br>this will be the data in the file';
print_r($doc_data);
exit;
echo "<html>";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
echo "<body>";
echo $doc_data;
echo "</body>";
echo "</html>";

?>
