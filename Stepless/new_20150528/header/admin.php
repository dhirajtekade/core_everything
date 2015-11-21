
<header id="top_header">	
		<h1>Welcome Admin</h1>

</header>	
<nav id="top_nav">
			<ul>
			<li><a href="home.php">[Front End]</a></li>
			<?php 
				if($_SESSION["login"] == "loggedin" && $_SESSION["admin"] == "admin") {
			?>
			<li><a href="products.php">Products</a></li>
			<li><a href="category.php">categories</a></li>
			<li><a href="news.php">News</a></li>
			
			<li style="float:right;"><a href="logout.php">Logout</a></li>
			<?php } else { ?>
			<li style="float:right;"><a href="login.php">Login</a></li>
			<?php }?>
		</ul>
</nav>