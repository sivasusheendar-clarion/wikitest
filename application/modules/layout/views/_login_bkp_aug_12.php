 <?php
 if($this->session->userdata('user_id')) {
 ?>
 <ul class="nav pull-right">
      <li class="dropdown">
                        
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user"></i> 
                           <?php echo $this->session->userdata('user_name') ?> <b class="caret"></b>
                        </a>
                         <ul class="dropdown-menu">
                            <li><a class="ico-acc" href="/user/profile">My Profile</a></li>
                            <li><a class="ico-settings" href="/channel/manage">My Channels</a></li>
                            <li><a class="ico-settings" href="/channel/list/type/subscribed">Subscribed Channels</a></li>
                                                        <li><a class="ico-settings" href="/course/list/type/enrolled">Enrolled Courses</a></li>
                                                        <li class="divider"></li>
                            <li><a href="/index/logout"><i class="icon-minus-sign"></i> Sign Out</a></li>
                        </ul>
                    </li>
                </ul>
 <?php
 } else {    
 ?>
  <ul class="nav pull-right">
      <li class="dropdown">
        <a class="btn btn-primary btn-medium " data-toggle="modal" href="#betaModal">Join the Beta</a>
       </li>
       <li>  
  <form class="navbar-form ">
                 <input class="span2" type="text" placeholder="Email" id="email">
                 <input class="span2" type="password" placeholder="Password" id="password">
                 <button type="button" class="btn btn-primary" id="signin">Sign in</button>
 </form>
   </li>
 </ul>
 <script>
  $(function()
            {
              
              $("#signin").click(function(){
               var data = {
                    email : $("#email").val(),
                    password : $("#password").val(),
                       
                    }  ;
               var request = $.ajax({
                                url : '/index.php/api/user/login',
                                type: 'post',
                                data : data ,
                                dataType: 'json',
                                success: function (response) {
                                     if (response) {
                                        if(response.data.user_type){ location.href='/index.php/dashboard' ;}
                                     }
                                     
                                  },
                   
                            });
                            
               
                   return false;
               
            });
            
            });
 
 </script>
<?php 
 }
 ?>