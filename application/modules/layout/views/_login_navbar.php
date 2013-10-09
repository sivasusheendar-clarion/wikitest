 <ul class="dropdown-menu">
                             <div class="content clearfix">
                                
                                <form class="form login-form" name="login-form" action="<?php echo $this->url(array('controller'=>'api', 'action'=>'login-process'));?>" method="post">
                                
                                    <h1>Sign In</h1>        
                                    
                                    <div class="login-fields">
                                        
                                        <p>Sign in using your registered account:</p>
                                        <li class="form-response-2 alert alert-error" style="display: none;"></li>
                                        
                                        <div class="field">
                                            <label for="username">Username:</label>
                                            <input type="text" class="login username-field field" name="email" id="email-2" value="" placeholder="Enter Username">
                                        </div> <!-- /field -->
                                        
                                        <div class="field">
                                            <label for="password">Password:</label>
                                            <input type="password" class="field login password-field" placeholder="Enter Password" value="" name="password" id="password-2">
                                        </div> <!-- /password -->
                                        
                                    </div> <!-- /login-fields -->
                                    
                                    <div class="login-actions">
                                        
                                        <!-- <span class="login-checkbox">
                                            <input type="checkbox" tabindex="4" value="First Choice" class="field login-checkbox" name="Field" id="Field">
                                            <label for="Field" class="choice">Keep me signed in</label>
                                        </span>                                                         -->
                                                            
                                        <button id="2" class="loginButton button btn btn-warning btn-large">Sign In</button>
                                        
                                    </div> <!-- .actions -->
                                    
                                    <div class="login-social" style="display:none;">
                                        <p>Sign in using social network:</p>
                                        
                                        <div class="twitter">
                                            <a class="btn_1" href="#">Login with Twitter</a>                
                                        </div>
                                        
                                        <div class="fb">
                                            <a class="btn_2" href="#">Login with Facebook</a>                
                                        </div>
                                    </div>
                                    
                                </form>
                                     
                            </div>
                        </ul>

<ul class="nav pull-right">
					<li><a href="/signup">Sign Up</a></li>
                  	<li class="divider-vertical"></li>
					<li class="dropdown">
						<a class="dropdown-toggle" href="#" data-toggle="dropdown">Sign In <strong class="caret"></strong></a>
						<div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
							
                            <form method="post"  accept-charset="UTF-8">
								<input style="margin-bottom: 15px;" type="text" placeholder="Username" id="email" name="username">
								<input style="margin-bottom: 15px;" type="password" placeholder="Password" id="password" name="password">
								<input style="float: left; margin-right: 10px;" type="checkbox" name="remember-me" id="remember-me" value="1">
								<label class="string optional" for="user_remember_me"> Remember me</label>
								<input class="btn btn-primary btn-block" type="button" id="sign-in" value="Sign In">
								<label style="text-align:center;margin-top:5px">or</label>
                                <input class="btn btn-primary btn-block" type="button" id="sign-in-google" value="Sign In with Google">
								<input class="btn btn-primary btn-block" type="button" id="sign-in-twitter" value="Sign In with Twitter">
							</form>
						</div>
					</li>
</ul>
<script>
$(document).ready(function()
{
  //Handles menu drop down
  $('.dropdown-menu').find('form').click(function (e) {
        e.stopPropagation();
        });
		
 $("#sign-in").click(function(){
	 var data = {
            'email':$('#email').val(),
            'password':$('#password').val()
        }   
     var request = $.ajax({
              url: "/index.php/api/session/login",
              type: "POST",
              data: data,
              dataType: "json"
            });
             
            request.done(function(response) {
              if(response.code == '500')
              {
                   $("#dropdown-menu").prepend(' <div class="alert-message warning"><a class="close" href="#">×</a><p><strong>Holy guacamole!</strong> Best check yo self, you’re not looking too good.</p></div>');
                   return false;
              }
            });
             
            request.fail(function(jqXHR, textStatus) {
              alert( "Request failed: " + textStatus );
            });
    });
  });
</script>