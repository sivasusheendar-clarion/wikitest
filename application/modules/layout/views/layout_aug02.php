                                  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <script>var serverUrl = "http://lurn.clarion";</script>
    <script>var casterUrl = "http://caster.localhost/";</script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">    
        <title></title>        <link href="/js/jquery/timepicker-addon/jquery-ui-timepicker-addon.css?version=0.26.20" media="screen" rel="stylesheet" type="text/css" >
<link href="<?php echo base_url(); ?>assets/default/css/style.css?version=0.26.20" media="screen" rel="stylesheet" type="text/css" >
<link href="<?php echo base_url(); ?>assets/default/css/colorbox.css?version=0.26.20" media="screen" rel="stylesheet" type="text/css" >
<link href="/js/jquery/ui-1.10.2.custom/css/ui-lightness/jquery-ui-1.10.2.custom.min.css?version=0.26.20" media="screen" rel="stylesheet" type="text/css" >
<link href="/css/custom.css?version=0.26.20" media="screen" rel="stylesheet" type="text/css" >
<link href="/css/bootstrap.min.css?version=0.26.20" media="screen" rel="stylesheet" type="text/css" >
<link href="/css/bootstrap-responsive.min.css?version=0.26.20" media="screen" rel="stylesheet" type="text/css" >
<link href="/css/font-awesome.min.css?version=0.26.20" media="screen" rel="stylesheet" type="text/css" >
<link href="/css/ui-lightness/jquery-ui-1.10.0.custom.min.css?version=0.26.20" media="screen" rel="stylesheet" type="text/css" >
<link href="/css/base-admin-2.css?version=0.26.20" media="screen" rel="stylesheet" type="text/css" >
<link href="/css/base-admin-2-responsive.css?version=0.26.20" media="screen" rel="stylesheet" type="text/css" >
<link href="/css/custom1.css?version=0.26.20" media="screen" rel="stylesheet" type="text/css" >
<link href="/css/pages/signin.css?version=0.26.20" media="screen" rel="stylesheet" type="text/css" >        <script type="text/javascript" src="/js/jquery-1.8.3.min.js?version=0.26.20"></script>
<script type="text/javascript" src="/js/jquery/ui-1.10.2.custom/js/jquery-ui-1.10.2.custom.min.js?version=0.26.20"></script>
<script type="text/javascript" src="/js/application/index/_login.js?version=0.26.20"></script>
<script type="text/javascript" src="/js/jquery.colorbox.js?version=0.26.20"></script>
<script type="text/javascript" src="/js/jquery.wysiwyg.js?version=0.26.20"></script>
<script type="text/javascript" src="/js/wysiwyg/wysiwyg.image.js?version=0.26.20"></script>
<script type="text/javascript" src="/js/wysiwyg/wysiwyg.link.js?version=0.26.20"></script>
<script type="text/javascript" src="/js/popup.js?version=0.26.20"></script>
<script type="text/javascript" src="/js/jquery.carouFredSel.js?version=0.26.20"></script>
<script type="text/javascript" src="/js/functions.js?version=0.26.20"></script>
<script type="text/javascript" src="/js/binding.js?version=0.26.20"></script>
<script type="text/javascript" src="/js/purl.js?version=0.26.20"></script>
<script type="text/javascript" src="/js/profanity.js?version=0.26.20"></script>
<script type="text/javascript" src="/js/linkify.js?version=0.26.20"></script>
<script type="text/javascript" src="/js/lurn.js?version=0.26.20"></script>
<script type="text/javascript" src="/js/jquery/timepicker-addon/jquery-ui-timepicker-addon.js?version=0.26.20"></script>
<script type="text/javascript" src="/js/application/cast/_view.js?version=0.26.20"></script>    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    <base href="/" />
</head>

<body>

<div class="navbar navbar-inverse navbar-fixed-top">
    
    <div class="navbar-inner">
        
        <div class="container">
            
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <i class="icon-cog"></i>
            </a>
            
            <h1 id="logo"><a href="/">Lurn</a></h1>        
            
            <div class="nav-collapse">
                <ul class="nav pull-right">
                    
                    <li class="">                        
                        <a href="/index/register" class="">
                            Create an Account
                        </a>
                        
                    </li>
                    <li class="divider"></li>
                    <li class="dropdown">
                        
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="icon-user"></i> 
                            Login
                            <b class="caret"></b>
                        </a>
                        
                        <ul class="dropdown-menu">
                             <div class="content clearfix">
                                
                                <form class="form login-form" name="login-form" action="/api/login-process" method="post">
                                
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
                        
                    </li>
                </ul>
                
            </div><!--/.nav-collapse -->    
    
        </div> <!-- /container -->
        
    </div> <!-- /navbar-inner -->
    
</div> <!-- /navbar -->


 
 
  <div class="container">
	<?php echo $content; ?>

		<br><br><br><br>

     <!-- Footer
      ================================================== -->
      <hr>

      <footer id="footer">
        <p class="pull-right"><a href="#top">Back to top</a></p>
        <div class="links">
          <a href="http://news.bootswatch.com" onclick="pageTracker._link(this.href); return false;">Blog</a>
          <a href="http://feeds.feedburner.com/bootswatch">RSS</a>
          <a href="https://twitter.com/thomashpark">Twitter</a>
          <a href="https://github.com/thomaspark/bootswatch/">GitHub</a>
          <a rel="tooltip" href="javascript:(function(e,a,g,h,f,c,b,d)%7Bif(!(f%3De.jQuery)%7C%7Cg%3Ef.fn.jquery%7C%7Ch(f))%7Bc%3Da.createElement(%22script%22)%3Bc.type%3D%22text/javascript%22%3Bc.src%3D%22http://ajax.googleapis.com/ajax/libs/jquery/%22%2Bg%2B%22/jquery.min.js%22%3Bc.onload%3Dc.onreadystatechange%3Dfunction()%7Bif(!b%26%26(!(d%3Dthis.readyState)%7C%7Cd%3D%3D%22loaded%22%7C%7Cd%3D%3D%22complete%22))%7Bh((f%3De.jQuery).noConflict(1),b%3D1)%3Bf(c).remove()%7D%7D%3Ba.documentElement.childNodes%5B0%5D.appendChild(c)%7D%7D)(window,document,%221.3.2%22,function(%24,L)%7Bif(%24(%22.bootswatcher%22)%5B0%5D)%7B%24(%22.bootswatcher%22).remove()%7Delse%7Bvar%20%24e%3D%24(%27%3Cselect%20class%3D%22bootswatcher%22%3E%3Coption%3EAmelia%3C/option%3E%3Coption%3ECerulean%3C/option%3E%3Coption%3ECosmo%3C/option%3E%3Coption%3ECyborg%3C/option%3E%3Coption%3EJournal%3C/option%3E%3Coption%3EReadable%3C/option%3E%3Coption%3ESimplex%3C/option%3E%3Coption%3ESlate%3C/option%3E%3Coption%3ESpacelab%3C/option%3E%3Coption%3ESpruce%3C/option%3E%3Coption%3ESuperhero%3C/option%3E%3Coption%3EUnited%3C/option%3E%3C/select%3E%27)%3Bvar%20l%3D1%2BMath.floor(Math.random()*%24e.children().length)%3B%24e.css(%7B%22z-index%22:%2299999%22,position:%22fixed%22,top:%225px%22,right:%225px%22,opacity:%220.5%22%7D).hover(function()%7B%24(this).css(%22opacity%22,%221%22)%7D,function()%7B%24(this).css(%22opacity%22,%220.5%22)%7D).change(function()%7Bif(!%24(%22link.bootswatcher%22)%5B0%5D)%7B%24(%22head%22).append(%27%3Clink%20rel%3D%22stylesheet%22%20class%3D%22bootswatcher%22%3E%27)%7D%24(%22link.bootswatcher%22).attr(%22href%22,%22http://bootswatch.com/%22%2B%24(this).find(%22:selected%22).text().toLowerCase()%2B%22/bootstrap.min.css%22)%7D).find(%22option:nth-child(%22%2Bl%2B%22)%22).attr(%22selected%22,%22selected%22).end().trigger(%22change%22)%3B%24(%22body%22).append(%24e)%7D%3B%7D)%3B" title="Drag to your bookmarks bar">Bookmarklet</a>
          <a href="https://github.com/thomaspark/bootswatch/tree/gh-pages/swatchmaker">Swatchmaker</a>
          <a href="http://news.bootswatch.com/post/22193315172/bootswatch-api">API</a>
          <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=F22JEM3Q78JC2">Donate</a>
        </div>
        Made by <a href="http://thomaspark.me">Thomas Park</a>. Contact him <a href="mailto:hello@thomaspark.me">hello@thomaspark.me</a>.<br/>
        Code licensed under the <a href="http://www.apache.org/licenses/LICENSE-2.0">Apache License v2.0</a>.<br/>
        Based on <a href="http://twitter.github.com/bootstrap/">Bootstrap</a>. Hosted on <a href="http://pages.github.com/">GitHub</a>. Icons from <a href="http://fortawesome.github.com/Font-Awesome/">Font Awesome</a>. Web fonts from <a href="http://www.google.com/webfonts">Google</a>. Favicon by <a href="https://twitter.com/geraldhiller">Gerald Hiller</a>.</p>
      </footer>

    </div><!-- /container -->

		 <!-- Javascript -->
        <script src="<?php echo base_url(); ?>assets/default/js/jquery-1.8.2.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/default/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/default/js/jquery.flexslider.js"></script>
        <script src="<?php echo base_url(); ?>assets/default/js/jquery.tweet.js"></script>
        <script src="<?php echo base_url(); ?>assets/default/js/jflickrfeed.js"></script>
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script src="<?php echo base_url(); ?>assets/default/js/jquery.ui.map.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/default/js/jquery.quicksand.js"></script>
        <script src="<?php echo base_url(); ?>assets/default/prettyPhoto/js/jquery.prettyPhoto.js"></script>
        <script src="<?php echo base_url(); ?>assets/default/js/scripts.js"></script>
		<script defer src="<?php echo base_url(); ?>assets/default/js/plugins.js"></script>
		<script defer src="<?php echo base_url(); ?>assets/default/js/script.js"></script>
        <script src="<?php echo base_url(); ?>assets/default/js/bootstrap-datepicker.js"></script>
		<script src="<?php echo base_url(); ?>assets/default/js/boot-business.js"></script>

		<!--[if lt IE 7 ]>
			<script src="<?php echo base_url(); ?>assets/default/js/dd_belatedpng.js"></script>
			<script type="text/javascript"> DD_belatedPNG.fix('img, .png_bg'); //fix any <img> or .png_bg background-images </script>
		<![endif]-->

		<!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
			 chromium.org/developers/how-tos/chrome-frame-getting-started -->
		<!--[if lt IE 7 ]>
		  <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
		  <script type="text/javascript">window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->
		
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
            
            

	</body>
</html>