
<javascript src="http://code.jquery.com/jquery-1.7.2.min.js">


<style type="text/css">
	/*three dot pop up css*/	
	ol, ul {
		list-style: none;
	    margin: 10px;
	    margin-bottom: 8px;
	}
	.cd-popup-trigger {
	   display: block;
	   width: 32px;
	   height: 28px;
	   background: rgb(209,209,209);
	}
	.cd-popup-trigger:hover{
		width: 40px;
		text-decoration:none
		}
	
	.cd-popup {
	   position: fixed; 
	   left: 0;
	   top: 0;
	   height: 100%;
	   width: 100%;
	   background-color: rgba(94, 110, 141, 0.9);
	   opacity: 0;
	   visibility: hidden;
	   z-index:1;
	}
	.cd-popup.is-visible {
	   opacity: 1;
	   visibility: visible;
	}
	
	.cd-popup-container {
	   position: relative;
	   width: 90%;
	   max-width: 50%;
	   margin: 4em auto;
	   background: white;
	   border-radius: .25em .25em .4em .4em;
	   text-align: center;
	   box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
	   transition-duration: 0.3s;
	   top:100px;
	}
	.cd-popup-container p {
	   padding: 1em 0em;
	}
	.cd-popup-container .cd-buttons:after {
	   content: "";
	   display: table;
	   clear: both;
	}
	.cd-popup-container .cd-buttons li {
		float: left;
		width: 32%;
		margin: 3px;
		margin-bottom: 10px;
		border-radius: 0 0 0 .25em;
		height: 42px;
		line-height: 40px;
		border-radius: 10px;
		border-radius:10px;
		color: white;
		font-weight: bold;
		cursor: pointer;
	}
	.cd-popup-container .cd-popup-close {
		  position: absolute;
		  top: 8px;
		  right: 8px;
		  width: 30px;
		  height: 30px;
	}
	.is-visible .cd-popup-container {
		  -webkit-transform: translateY(0);
		  -moz-transform: translateY(0);
		  -ms-transform: translateY(0);
		  -o-transform: translateY(0);
		  transform: translateY(0);
	}
	/*popup menus*/
	.popup-link{border-radius:10px;}
	.facebook{background: rgb(59,89,152) url(code/properties/socialmediaicons/images/facebook.png) no-repeat; background-size: 44px 44px; font-size:15px;}
	.twitter{background: rgb(41,197,246) url(code/properties/socialmediaicons/images/twitter.png) no-repeat; background-size: 44px 44px; font-size:15px;}
	.digg{background: rgb(42,111,184) url(code/properties/socialmediaicons/images/digg.png) no-repeat; background-size: 44px 44px; font-size:15px;}
	.stumbleupon{background: rgb(232,60,29) url(code/properties/socialmediaicons/images/stumbleupon.png) no-repeat; background-size: 44px 44px; font-size:15px;}
	.delicious{background: rgb(43,129,214) url(code/properties/socialmediaicons/images/delicious.png) no-repeat; background-size: 44px 44px; font-size:15px;}
	.gplus{background: rgb(209,62,47) url(code/properties/socialmediaicons/images/google-plus.png) no-repeat; background-size: 44px 44px; font-size:15px;}
	.email{background: rgb(51,202,255) url(code/properties/socialmediaicons/images/email.png) no-repeat; background-size: 44px 44px; font-size:15px;}
	.hackernews{background: rgb(240,134,65) url(code/properties/socialmediaicons/images/hackernews.png) no-repeat; background-size: 44px 44px; font-size:15px;}
	.myspace{background: rgb(49,76,129) url(code/properties/socialmediaicons/images/myspace.png) no-repeat; background-size: 44px 44px; font-size:15px;}
	.linkedin{background: rgb(0,109,192)url(code/properties/socialmediaicons/images/linkedin.png) no-repeat; background-size: 44px 44px; font-size:15px;} 
	.blogger{background: rgb(248,104,19) url(code/properties/socialmediaicons/images/bloggr.png) no-repeat; background-size: 44px 44px; font-size:15px;}
	.amazon{background: rgb(34,34,34) url(code/properties/socialmediaicons/images/amazon.png) no-repeat; background-size: 44px 44px; font-size:15px;}
	.yahoomail{background: rgb(95,13,142) url(code/properties/socialmediaicons/images/yahoomail.png) no-repeat; background-size: 44px 44px; font-size:15px;}
	.gmail {background: rgb(231,15,16) url(code/properties/socialmediaicons/images/gmail.png) no-repeat; background-size: 44px 44px; font-size:15px;}
	.evernote{background: rgb(98,177,32) url(code/properties/socialmediaicons/images/evernote.png) no-repeat; background-size: 44px 44px; font-size:15px;}
       .share-btn-wrp {
           list-style: none;
           display: block;
           margin: 0px;
           padding: 0px;
           width: 32px;
           left: 0px;
           position: fixed;
       }
       .share-btn-wrp .button-wrap{
           text-indent:-100000px;
           width:32px;
           height: 32px;
           cursor:pointer;
           transition: width 0.1s ease-in-out;
       }
      
       .share-btn-wrp  .facebook{
           background: url(code/properties/socialmediaicons/images/share-icons.png) no-repeat -42px 0px;
       }
       .share-btn-wrp  .facebook:hover{
           background: url(code/properties/socialmediaicons/images/share-icons.png) no-repeat -4px -0px;
           width:38px;
       }
       .share-btn-wrp  .twitter{
           background: url(code/properties/socialmediaicons/images/share-icons.png) no-repeat -42px -34px;
       }
       .share-btn-wrp  .twitter:hover{
           background: url(code/properties/socialmediaicons/images/share-icons.png) no-repeat -4px -34px;
           width:38px;
       }
       .share-btn-wrp  .digg{
           background: url(code/properties/socialmediaicons/images/share-icons.png) no-repeat -42px -68px;
       }
       .share-btn-wrp  .digg:hover{
           background: url(code/properties/socialmediaicons/images/share-icons.png) no-repeat -4px -68px;
           width:38px;
       }
       .share-btn-wrp  .stumbleupon{
           background: url(code/properties/socialmediaicons/images/share-icons.png) no-repeat -42px -102px;
       }
       .share-btn-wrp  .stumbleupon:hover{
           background: url(code/properties/socialmediaicons/images/share-icons.png) no-repeat -4px -102px;
           width:38px;
       }
       .share-btn-wrp  .delicious{
           background: url(code/properties/socialmediaicons/images/share-icons.png) no-repeat -42px -136px;
       }
       .share-btn-wrp  .delicious:hover{
           background: url(code/properties/socialmediaicons/images/share-icons.png) no-repeat -4px -136px;
           width:38px;
       }
       .share-btn-wrp  .gplus{
           background: url(code/properties/socialmediaicons/images/share-icons.png) no-repeat -42px -170px;
       }
       .share-btn-wrp  .gplus:hover{
           background: url(code/properties/socialmediaicons/images/share-icons.png) no-repeat -4px -170px;
           width:38px;
       }
       .share-btn-wrp  .email{
           background: url(code/properties/socialmediaicons/images/share-icons.png) no-repeat -42px -408px;
       }
       .share-btn-wrp  .email:hover{
           background: url(code/properties/socialmediaicons/images/share-icons.png) no-repeat -4px -408px;
           width:38px;
       }
 
	.et_social_all_button{
		text-indent:10px!important;
		font-weight:bold!important;
		font-size:15px!important;	
	} 
</style>

    <script type="text/javascript">
        <![CDATA[
        $(document).ready(function(){
            var pageTitle	= document.title; //HTML page title
            var pageUrl		= location.href; //Location of this page
    
            $('.social-links-wrp li').click(function(event){
                var shareName = $(this).attr('class').split(' ')[0]; //get the first class name of clicked element
                switch(shareName) //switch to different links based on different social name
                {
                    case 'facebook':
                        OpenShareUrl('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(pageUrl) + '&amp;title=' + encodeURIComponent(pageTitle));
                        break;
                    case 'twitter':
                        OpenShareUrl('http://twitter.com/home?status=' + encodeURIComponent(pageTitle + ' ' + pageUrl));
                        break;
                    case 'digg':
                        OpenShareUrl('http://www.digg.com/submit?phase=2&amp;url=' + encodeURIComponent(pageUrl) + '&amp;title=' + encodeURIComponent(pageTitle));
                        break;
                    case 'stumbleupon':
                        OpenShareUrl('http://www.stumbleupon.com/submit?url=' + encodeURIComponent(pageUrl) + '&amp;title=' + encodeURIComponent(pageTitle));
                        break;
                    case 'delicious':
                        OpenShareUrl('http://del.icio.us/post?url=' + encodeURIComponent(pageUrl) + '&amp;title=' + encodeURIComponent(pageTitle));
                        break;
                    case 'gplus':
                        OpenShareUrl('https://plus.google.com/share?url=' + encodeURIComponent(pageUrl) + '&amp;title=' + encodeURIComponent(pageTitle));
                        break;
                    case 'email':
                    	OpenShareUrl('mailto:?subject=' + pageTitle + '&body=Found this useful link for you : ' + pageUrl);
                        break;
                    case 'hackernews':
                        OpenShareUrl('https://news.ycombinator.com/submitlink?u=' + encodeURIComponent(pageUrl) + '&amp;title=' + encodeURIComponent(pageTitle));
                        break;
                    case 'gmail':
                        OpenShareUrl('https://mail.google.com/mail/u/0/?view=cm&fs=1&su=' + encodeURIComponent(pageUrl) + '&amp;title=' + encodeURIComponent(pageTitle));
                        break;
                    case 'linkedin':
                        OpenShareUrl('http://www.linkedin.com/shareArticle?mini=true&url=' + encodeURIComponent(pageUrl) + '&amp;title=' + encodeURIComponent(pageTitle));
                        break;
                    case 'blogger':
                        OpenShareUrl('https://www.blogger.com/blog_this.pyra?t&u=' + encodeURIComponent(pageUrl) + '&amp;title=' + encodeURIComponent(pageTitle));
                        break;
                    case 'amazon':
                        OpenShareUrl('http://www.amazon.com/gp/wishlist/static-add?u=' + encodeURIComponent(pageUrl) + '&amp;title=' + encodeURIComponent(pageTitle));
                        break;
                    case 'yahoomail':
                        OpenShareUrl('http://compose.mail.yahoo.com/?body=' + encodeURIComponent(pageUrl) + '&amp;title=' + encodeURIComponent(pageTitle));
                        break;
                    case 'evernote':
                        OpenShareUrl('http://www.evernote.com/clip.action?url=' + encodeURIComponent(pageUrl) + '&amp;title=' + encodeURIComponent(pageTitle));
                        break;
                    case 'myspace':
                        OpenShareUrl('https://myspace.com/post?u=' + encodeURIComponent(pageUrl) + '&amp;title=' + encodeURIComponent(pageTitle));
                        break;
                }
        
            });
        
            function OpenShareUrl(openLink){
                //Parameters for the Popup window
                winWidth    = 650; 
                winHeight   = 450;
                winLeft     = ($(window).width()  - winWidth)  / 2,
                winTop      = ($(window).height() - winHeight) / 2,
                winOptions   = 'width='  + winWidth  + ',height=' + winHeight + ',top='    + winTop    + ',left='   + winLeft;
                window.open(openLink,'Share This Link',winOptions); //open Popup window to share website.
                return false;
            }
        });
        ]]>
    </script>
    <!-- function for popup display -->
	<script type="text/javascript">
		$(document).ready(function($){
			//open popup
			$('.cd-popup-trigger').on('click', function(event){
				event.preventDefault();
				$('.cd-popup').addClass('is-visible');
			});
			
			//close popup
			$('.cd-popup').on('click', function(event){
				if( $(event.target).is('.cd-popup-close') || $(event.target).is('.cd-popup') ) {
					event.preventDefault();
					$(this).removeClass('is-visible');
				}
			});
			//close popup when clicking the esc keyboard button
			$(document).keyup(function(event){
		    	if(event.which=='27'){
		    		$('.cd-popup').removeClass('is-visible');
			    }
		    });
		});
	</script>
	
<div class="social-links-wrp">
	<ul class="share-btn-wrp">
	        <li class="facebook button-wrap">Facebook</li>
	        <li class="twitter button-wrap">Tweet</li>
	        <li class="digg button-wrap">Digg it</li>
	        <li class="stumbleupon button-wrap">Stumbleupon</li>
	        <li class="delicious button-wrap">Delicious</li>
	        <li class="gplus button-wrap">Google Share</li>
	        <li class="email button-wrap">Email</li>
	        <li class="et_social_all_button button-wrap"><a href="#" class="cd-popup-trigger" >...</a></li>
	</ul>
	<div class="cd-popup" role="alert">
	<div class="cd-popup-container">
		<p></p>
		<ul class="cd-buttons">
		    <li class="facebook popup-link">facebook</li>
			<li class="twitter popup-link">twitter</li>
	        <li class="digg popup-link">digg</li>
	        <li class="stumbleupon popup-link">stumbleupon</li>
	        <li class="delicious popup-link">delicious</li>
	        <li class="gplus popup-link">googleplus</li>
	        <li class="email popup-link">email</li>
		    <li class="hackernews popup-link">hackernews</li>
		   	<li class="gmail popup-link">gmail</li>
	        <li class="myspace popup-link">myspace</li>
	        <li class="linkedin popup-link">linkedin</li>
	      	<li class="blogger popup-link">blogger</li>
	       	<li class="amazon popup-link">amazon</li>
	        <li class="yahoomail popup-link">yahoomail</li>
	        <li class="evernote popup-link">evernote</li>
		</ul>
			<a href="#0" class="cd-popup-close img-replace" style="font-weight:bold; text-decoration:none;">X</a>
		</div> 
	</div> 
</div>
</xar:template>