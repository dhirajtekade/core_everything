<?php 
//a lot work to do in this main website pge
session_start();
echo "site under maintenance";
?>
<!DOCTYPE html>
<html><head><title>DadaCart Home Page</title>
<link rel= "stylesheet" type="text/css" href="DadaCartHomeStyle.css">
<script src="selecttype.js" ></script>


</head><body>



<div id="main_div">
	<header id="top_header">
		
			<h1>DadaCart</h1>
		<?php 
		echo "Welcome ";
		
		
		
		?>
		<div id="logout"><a href="logout.php">Log Out</a></div>
		
	</header>
	
	<nav id="top_nav">
		<ul>
			<li>Profile</li>
			<li>Stores</li>
			<li>Articles</li>
			<li>Reviews</li>
		</ul>
	
	</nav>
	
		
		
	<section id="main_section">
		<article>
			<table id="middle"><tr><td>
			<h2>select type of books</h2>
			<form action=""> 
			<select name="genre" onchange="showType(this.value)">
				<option value="">Select the type of books:</option>
				<option value="all">All</option>
				<option value="technology">Technology</option>
				<option value="children">Children</option>
				<option value="literature">Literature</option>
				<option value="spiritual">Spiritual</option>
			</select>
			</form></td><td><p>
			<div id="txtHint">books info will be listed here...
			</div></p>
			</td></tr></table>
		</article>
		
		
	</section>
			
	
	<aside id="side_news">
			<h1>News</h1>
			<?php echo "Today is " .date("Y/m/d");?>
			<marquee direction="up" height="80px" scrolldelay= "500">
			<ul>
				 <li>Sites under construction.</li>
				 <li>still can purchase the books.</li>
				 <li>need to fetch news later from admin news submission</li>
				
			</ul>
			<?php echo readfile("news.txt", "w"); ?>
			</marquee>			  
		</aside>
</div>
	<footer id="the_footer" >
		copyright @ dheeraj.org
	</footer>

</body></html>
