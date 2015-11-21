<?php 
/* here there will be 
 * 1) dropdown for the main product categories 
 * 2) and from main categories corresponding table will be get called
   3) and all records in that table will be shown using ajax
   4) at the same time the related subcategories will be shown in the below dropdown
   5) when subcategories will be selected from the second dropdown the categories will be changes to show only from that record	
   
   or in other words for 2) case the value of the sucategories will be all
*/

?>
<article>

		<h2>select type of product</h2>
		<form action=""> 
			<select name="genre" onchange="showType(this.value)">
			<!-- 
			<option value="">Select the categories:</option>
			<option value="all">All</option>
			<option value="books">Books</option>
			<option value="dvd">DVD/CD</option>
			<option value="magazines">Magazines</option>
			<option value="spiritual">Gallery</option>
			</select>
			
			<select name="genre" onchange="showType(this.value)">
			<option value="">Select the categories:</option>
			<option value="all">All</option>
			<option value="technology">Technology</option>
			<option value="spiritual">Spiritual</option>
			<option value="literature">Literature</option>
			<option value="kids">Kids</option>
			 -->
			</select>
			
		</form>
		<p><br>
		<div id="txtHint">
		</div></p>
</article>
	