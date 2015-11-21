
<header id="top_header">	
		<h1>SiteName</h1>
			<h4>SiteSlogan</h4>
		<?php 
		echo "Welcome ";
		?>
</header>	
<nav id="top_nav">
			<ul>
			<li><a href="home.php">Home</a></li>
			<li><a href="store.php">Store</a></li>
			<li>Articles</li>
			<li>Reviews</li>
			<li style="float:right;"><a href="register.php">Register</a></li>
			<?php 
				if($_SESSION["login"] == "loggedin") {
			?>
			<li>Profile</li>
			<?php 
				if($_SESSION["admin"] == "admin") {
			?>
			<li><a href="backend.php">[Back End]</a></li>
			<?php 
				}
			?>
			<li style="float:right;"><a href="logout.php">Logout</a></li>
			<?php } else { ?>
			<li style="float:right;"><a href="login.php">Login</a></li>
			<?php }?>
		</ul>
</nav>