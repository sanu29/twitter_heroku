<footer class="footer mt-auto py-3">
  <div class="container">
    <span class="text-muted">&copy;SaniyaShaikh.</span>
    <span class="feedback"><a href='https://docs.google.com/forms/d/e/1FAIpQLSdZzDGZCwh5r_qYttyFKWMvhiWWF2jHwJULnPQftLfAR5MiNw/viewform?usp=sf_link'>Click here for feedback form</a></span>
  </div>



</footer>
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Login Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;<span>
        </button>
      </div>
      <div class="modal-body">
        
    <div class="alert alert-danger" id="erroralert"></div>
     <div class="alert alert-success" id="success"></div>

        <form>
  <div class="form-group">

    <div class="signupdata" >
      <form>
  <div class="form-row">
    <div class="col">
      <input type="text" class="form-control firstname" placeholder="First name">
    </div>
    <div class="col">
      <input type="text" class="form-control lastname" placeholder="Last name">
    </div>
  </div>
</form>


    </div>
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password">
  </div>
  <input type="hidden" name="loginactive" class="loginactive" value="1">
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="remember">
    <label class="form-check-label" for="remember">Remember Me</label>
  </div>
 </form>





      </div>
      <div class="modal-footer">
         <a  id="signup">Signup</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" id="subbutton" class="btn btn-success">Login</button>
      </div>
    </div>
  </div>
</div>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-171823939-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-171823939-1');
</script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script type="text/javascript">
          
          $("#signup").click(function()
          {
            if($(".loginactive").val()==1)
            {
               $(".modal-title").text("SIGNUP");
              $("#subbutton").text("SIGNUP");
              $("#signup").text("Login");
              $(".loginactive").val(0);
              $(".signupdata").css("display","block");
            }
           else{
                 $(".modal-title").text("LOGIN");
              $("#subbutton").text("LOGIN");
              $("#signup").text("Signup");
              $(".loginactive").val(1);
              $(".signupdata").css("display","none");
           }
          })
          
         
        $("#subbutton").click(function(){

            if($(".loginactive").val() == 1)
            {
                $.ajax({
                  type : "POST",                
                  url : "action.php?action=login",
                  data : "email =" + $("#email").val() + "&password =" + $("#password").val(),
                  success : function(result)
                  {
                        if(!(result))
                        {
                                window.location.assign("http://twitterclone-sanu.stackstaging.com/");
                        }
                        else{
                            
                            $("#erroralert").html(result).show();
                        }
                  }
                })
             }
              else{
                $.ajax({
                  type : "POST",                
                  url : "action.php?action=signup",
                  data : "&firstname =" + $(".firstname").val() + "&lastname =" + $(".lastname").val()+ "&email =" + $("#email").val() + "&password =" + $("#password").val(),
                  success : function(result)
                  {
                     if(!(result))
                        {       $("#erroralert").css("display","none");
                                $("#success").html("SignUp Sucessful !!!! You can Login now").show();
                        }
                        else{
                             $("#success").css("display","none");
                            $("#erroralert").html(result).show();
                        }
                  }
                  
                })
              }


        }
        )
        
        $(document).ready(function() {
        $(".togglefollow").click(function()
        {
                var id =  $(this).attr("data-userid");   
             $.ajax({
                // var id = $(this).attr("data-userid");
                  type : "POST",                
                  url : "action.php?action=togglefollow",
                  data : "userid=" + id,
                  success : function(result)
                  { 
                    if(result == "1")
                    {
                    $("a[data-userid='" + id + "']").val("Unfollow");
                    location.reload();
                    }
                 else   if(result == "2")
                    {
                        $("a[data-userid='" + id + "']").val("Follow");
                        location.reload();
                    }
                    else{
                        alert("try again");
                    }
                  }
            
            
        })
        })
        })
        
        $(document).ready(function() {
        $("#togglefollow").click(function()
        {
                // alert($(this).attr("data-userid"));
                var id =  $(this).attr("data-userid");   
             $.ajax({
                // var id = $(this).attr("data-userid");
                  type : "POST",                
                  url : "action.php?action=togglefollow",
                  data : "userid=" + id,
                  success : function(result)
                  { 
                    //   alert(result);
                    if(result == "1")
                    {
                    $("#togglefollow").val("Unfollow");
                    // location.reload();
                    }
                 else   if(result == "2")
                    {
                        $("#togglefollow").val("Follow");
                        // location.reload();
                    }
                    else{
                        alert("try again");
                    }
                  }
            
            
        })
        })
        })
        
        
        
        $("#posttweet").click(function(){
            
            // alert();
           var tweet = $("#tweetcontent").val();
           var replaced = tweet.replace("+","saniyaplus");
          replaced = replaced.replace("&","saniyaand");
             $.ajax({
                // var con = $("#tweetcontent").val();
                  type : "POST",                
                  url : "action.php?action=posttweet",
                  data : "tweetcontent=" + replaced,
                  success : function(result)
                  { 
                       if(result == "1")
                       {
                        //   $("#successtweet").css("display","flex");
                            alert("SUCCESSFULLY TWEETED");
                          location.reload();
                        
                       }
                       else
                       {
                           $("#failtweet").html(result);
                           $("#failtweet").css("display","flex");
                       }
                  }
            
            
        })
        })
        
        $("#deletetweet").click(function()
        {
            var id = $(this).attr("data-tweetid");
            $.ajax({
                // var con = $("#tweetcontent").val();
                  type : "POST",                
                  url : "action.php?action=deletetweet",
                  data : "tweetid=" + id,
                  success : function(result)
                  { 
                       if(result == "1")
                       {
                        //   $("#successtweet").css("display","flex");
                            alert("SUCCESSFULLY DELETED TWEET");
                          location.reload();
                        
                       }
                       else
                       {
                         alert("could not delete try again later");
                       }
                  }
            
            
        })
           
           
        })
      
    </script>


  </body>
</html>