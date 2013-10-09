<?php

Class Facebook  {
    
    

    public function __construct() {
            $this->output = "";
    }

    public function init() {
        
        $this->output .=  ' <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script><div id="fb-root"></div>';
        $this->output .= "<script>
                                window.fbAsyncInit = function() {
                                    // init the FB JS SDK
                                    FB.init({
                                        appId: \"" . FACEBOOK_APP_ID . "\", // App ID from the app dashboard
                                       // channelUrl: '//WWW.YOUR_DOMAIN.COM/channel.html', // Channel file for x-domain comms
                                        status: true, // Check Facebook Login status
                                        xfbml: true                                  // Look for social plugins on the page
                                    });
                                    // Additional initialization code such as adding Event Listeners goes here
                                };
                                // Load the SDK asynchronously
                                (function(d, s, id) {
                                    var js, fjs = d.getElementsByTagName(s)[0];
                                    if (d.getElementById(id)) {
                                        return;
                                    }
                                    js = d.createElement(s);
                                    js.id = id;
                                    js.src = \"//connect.facebook.net/en_US/all.js\";
                                    fjs.parentNode.insertBefore(js, fjs);
                                }(document, 'script', 'facebook-jssdk'));
                    </script>";
    }

    public function button() {
        $this->init();
        $this->output .= " <input class=\"btn btn-primary btn-block\" type=\"button\" id=\"sign-in-facebook\" value=\"Sign In with Facebook\">
                    <script>
                            $(document).ready(function(){
                                    $('#sign-in-facebook').click(function(e) {
                                        FB.login(function(response) {
                                              if (response.authResponse) {
                                                console.log('Welcome!  Fetching your information.... ');
                                                $('#sign-in-facebook').val('FB SIGNED IN');
                                                 e.stopPropagation();
                                                FB.api('/me', function(response) {
                                                  console.log('Good to see you, ' + response.name + '.');
                                                });
                                              } else {
                                                console.log('User cancelled login or did not fully authorize.');
                                              }

                                        });
                                    });
                            });
                      </script>";
        
        echo $this->output;
    }

    public function url_authorize() {
        return 'https://www.facebook.com/dialog/oauth';
    }

    public function url_access_token() {
        return 'https://graph.facebook.com/oauth/access_token';
    }

    public function get_user_info($token) {
        $url = 'https://graph.facebook.com/me?' . http_build_query(array(
                    'access_token' => $token->access_token,
        ));

        $user = json_decode(file_get_contents($url));

        // Create a response from the request
        return array(
            'uid' => $user->id,
            'nickname' => isset($user->username) ? $user->username : null,
            'name' => $user->name,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => isset($user->email) ? $user->email : null,
            'location' => isset($user->hometown->name) ? $user->hometown->name : null,
            'description' => isset($user->bio) ? $user->bio : null,
            'image' => 'https://graph.facebook.com/me/picture?type=normal&access_token=' . $token->access_token,
            'urls' => array(
                'Facebook' => $user->link,
            ),
        );
    }

}
