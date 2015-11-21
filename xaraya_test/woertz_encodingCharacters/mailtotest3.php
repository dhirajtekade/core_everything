<?php

$to = "dhirajtekade@gmail.com;dhiraj_tekade@paramss.com;DhirajT.imail@paramss.com";
$body = "Lütolf";
$subject = "Lütolf";
//<a href="mailto:dhirajtekade@gmail.com;dhiraj_tekade@paramss.com;DhirajT.imail@paramss.com?Subject=Lütolf&amp;body=Lütolf">Normal</a>

//<a href="mailto:dhirajtekade@gmail.com;dhiraj_tekade@paramss.com;DhirajT.imail@paramss.com?Subject=Lütolf&amp;body=Lütolf">Normal</a>

//echo "<a href='mailto:" . $to . "?body=" . $body . "'>";
?>
<a href="mailto:<?php echo $to; ?>?subject=<?php echo $subject; ?>&body=<?php echo $body;?>">normal</a><br>

<a href="mailto:<?php echo $to; ?>?subject=<?php echo $subject; ?>&body=<?php echo rawurlencode($body);?>">rawurlencode</a><br>

<a href="mailto:<?php echo $to; ?>?subject=<?php echo $subject; ?>&body=<?php echo htmlentities($body);?>">htmlentities</a><br>




<a href="mailto:dhirajtekade%40gmail.com?subject=L%C3%BCtolf&body=L%C3%BCtolf">mailtourlEncoderSite</a><br>
<a href="mailto:dihrajtekade@gmail.com?Subject=L%FCtolf&Body=L%FCtolf%0A%0A">cha4mot.com/t_mailto.html</a><br>

<a href="mailto:<?php echo $to; ?>?subject=<?php echo $subject; ?>&body=<?php echo $body;?>">unescape-encode-utf8</a><br>