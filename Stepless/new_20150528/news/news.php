	<aside id="side_news">		
<h1>News</h1>
			<?php echo "<strong>Today is " .date("Y/m/d")."</strong>";?>
			<!--  <p>-----------------</p> -->
			<marquee direction="up" height="80px" scrolldelay= "500">
			<ul>
				 <li>Sites under construction.</li>
				 <li>still can purchase the books.</li>
				 <li>need to fetch news later from admin news submission</li>
				
			</ul>
			<?php echo readfile("news.txt", "w"); ?>
			</marquee>	
</aside>