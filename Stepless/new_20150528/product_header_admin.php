	
<nav id="top_sub_nav">
			<ul>
			<?php 
				if($_SESSION["login"] == "loggedin" && $_SESSION["admin"] == "admin") {
			?>
			<li><a href="books_product_admin.php">Books</a></li>
			<li><a href="dvd_product_admin.php">DVD/CD</a></li>
			<li><a href="magazines_product_admin.php">Magazines</a></li>
			<?php }?>
		</ul>
</nav>