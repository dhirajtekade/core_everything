<html>
  <head>
       <script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
      <!-- <script type="text/javascript" src="js/jquery-1.9.0.min.js"></script> -->
        
       <script type="text/javascript">
 
         $(document).ready(function(){
            $("#username").change(function(){
                 $("#message").html("<img src='ajax-loader.gif' /> checking...");
             
 
            var username=$("#username").val();
 
              $.ajax({
                    type:"post",
                    url:"check.php",
                    data:"username="+username,
                        success:function(data){
                        if(data==0){
                            $("#message").html("<img src='tick.png' /> Username available");
                        }
                        else{
                            $("#message").html("<img src='cross.png' /> Username already taken");
                        }
                    }
                 });
 
            });
 
         });
 
       </script>
  </head>
 
  <body>
 
       <table>
        <tr>
              <td>Username</td>
              <td>:</td>
              <td><input type="text" name="username" id="username"/><td>
                <td id="message"><td>
        </tr>
 
        <tr>
              <td>Password</td>
              <td>:</td>
              <td><input type="text" name="password" id="password" /><td>
        </tr>
       </table>
  </body>
</html>