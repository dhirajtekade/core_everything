<html>
	<title>Dhiraj Tekade</title>
	<body bgcolor="lime"  text="maroon">
		<?php
 			$books = array("PHP 5.1 For Professionals", "Applications Developement with Oracle and php on linux", "J2EE 1.5 Server Programming For Professionals");
 			$item = rand(0, sizeof($books)-1);

		?>		
		<h1>
			<?php 
				echo $books[$item]
			?>
		</h1>
	</body>
</html>

