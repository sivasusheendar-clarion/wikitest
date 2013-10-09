<?php

if ($this->session->userdata('user_id')) {
    ?>

    <ul class="nav pull-right">
        <li class="dropdown">

            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="icon-user"></i>
                <?php echo $this->session->userdata('user_name') ?> <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                <li><a class="ico-acc" href="/users/profile">My Profile</a></li>
                <li class="divider"></li>
                <li><a href="/user/logout"><i class="icon-minus-sign"></i> Sign Out</a></li>
            </ul>
        </li>
    </ul>
    <?php
} else {
    ?>

    <ul class="nav pull-right">
        <!--<li  class="dropdown">
            <a  class="dropdown-toggle" href="#" data-toggle="dropdown">Sign Up <strong class="caret"></strong></a>
            <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
                <div id="msg"> </div>
                <form method="post" action="login" accept-charset="UTF-8">
                    <input style="margin-bottom: 15px;" type="text" placeholder="Name" id="name" name="name">
                    <input style="margin-bottom: 15px;" type="text" placeholder="Email" id="email" name="email">
                    <input style="margin-bottom: 15px;" type="password" placeholder="Password" id="password" name="password">
                    <input style="margin-bottom: 15px;" type="password" placeholder="Confirm Password" id="conf_password" name="conf_password">

                    <input class="btn btn-primary btn-block" type="submit" id="sign-up" value="Sign Up">
                      
                </form>
            </div>

        </li>-->
        <li class="divider-vertical"></li>
        <li class="dropdown">
            <a class="dropdown-toggle" href="#" data-toggle="dropdown">Sign In <strong class="caret"></strong></a>
            <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
                <form method="post" action="login" accept-charset="UTF-8">
                    <input style="margin-bottom: 15px;" type="text" placeholder="Username" id="login-email" name="email">
                    <input style="margin-bottom: 15px;" type="password" placeholder="Password" id="login-password" name="password">
                    <input style="float: left; margin-right: 10px;" type="checkbox" name="remember-me" id="remember-me" value="1">
                    <label class="string optional" for="user_remember_me"> Remember me</label>
                    <input class="btn btn-primary btn-block" type="submit" id="sign-in" value="Sign In">
                   
                    <label style="text-align:center;margin-top:5px">or</label>
                     <input class="btn btn-primary btn-block" type="button" onclick="location.href = '/users/forgot_pass';" id="sign-up" value="Forgot Password">
                </form>
            </div>
        </li>
    </ul> 

    <script>

      $(document).ready(function()
        {
            //Handles menu drop down
            $('.dropdown-menu').find('form').click(function(e) {
                e.stopPropagation();
            });
    
            $("#sign-in").click(function() {
                var data = {
                    email: $("#login-email").val(),
                    password: $("#login-password").val(),
                };
                var request = $.ajax({
                    url: '/index.php/api/user/login',
                    type: 'post',
                    data: data,
                    dataType: 'json',
                    success: function(response) {
                        if (response) {

                            if (response.data.user_type) {
                                if (response.data.user_type==1) {
                                    location.href = '/admin/users/index';
                                }
                                else 
                                    {
                                        location.href = '/dashboard';
                                    }
                            }
                        }

                    },
                });


                return false;

            });

            $("#sign-up").click(function() {


                var data = {
                    email: $("#email").val(),
                    password: $("#password").val(),
                    name: $("#name").val(),
                    confirm_password: $("#conf_password").val(),
                };
                if (data.confirm_password != data.password) {

                }

                var request = $.ajax({
                    url: '/index.php/api/user/register',
                    type: 'post',
                    data: data,
                    dataType: 'json',
                    success: function(response) {
                        Error.display(response.code, response.message, 'msg');
                        if (response.code == 200) {
                           // self.location = '/';
                        }

                    },
                });


                return false;

            });

            Error = {
                display: function(code, msg, targetDiv) {
                    if (code == 200) {
                        $("#" + targetDiv).html('<div class="alert alert-success">' + msg + '</div>');
                    } else if (code == 500) {
                        $("#" + targetDiv).html('<div class="alert alert-error">' + msg + '</div>');
                    }
                }

            }();

        }); 


    </script>
    <?php
}
?>