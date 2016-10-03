<?php ?>
<div id="fb-root"></div>
<script>
window.fbAsyncInit = function() {
    FB.init({
        appId   : '958960750891975',
        oauth   : true,
        status  : true, // check login status
        cookie  : true, // enable cookies to allow the server to access the session
        xfbml   : true // parse XFBML
    });
};

function fb_login(){
    $('.loader').show();  
    var first='<?php echo $this->params->pass[0];?>';
    var secound='<?php echo $this->params->pass[1];?>';
    var third='<?php echo $this->params->pass[2];?>';
    var url='<?php echo HTTP_ROOT;?>/Homes/socialLogin';
    FB.login(function(response) {
        
        if (response.authResponse) {
            access_token = response.authResponse.accessToken; //get access token
            
            user_id = response.authResponse.userID; //get FB UID
  
            FB.api('/me','GET',{"fields":"id,name,email,picture"}, function(response){
                   
                  
                $.post(url, {response : response, social_type: 'facebook'}, function(data){
                    
                     $('.loader').hide();  
                 
                    if(data==1){
                        
                        if(third=='quote'){
                         
                        window.location.href = "<?php echo HTTP_ROOT;?>/Homes/CatalougeClassDetail/"+first+"/"+secound+"/"+third;
                        }
                        else{
                      
                        window.location.href = "<?php echo HTTP_ROOT;?>/Homes/dashboard";
                    }
                    }else if(data ==2){
                        
                       
                       
                        $('#response_msg').html('<div class="alert alert-danger">Your account has been Blocked yet. Please Contact Braingroom Admin.</div>');
                    }
                });
            });
        }else{
            console.log('User cancelled login or did not fully authorize.');
        }
    },{scope: 'public_profile,email'});
}

/*trainer fb login*/
function trainer_fb_login(){
    FB.login(function(response) {
        if (response.authResponse) {
            access_token = response.authResponse.accessToken; //get access token
            user_id = response.authResponse.userID; //get FB UID
            FB.api('/me','GET',{"fields":"id,name,email"}, function(response){
                $.post('socialLogin', {response : response, social_type: 'facebook'}, function(data){
                    alert(data);
                    if(data==1){
                        window.location.href = "registrationDetails" ;
                    }else if(data == '900'){
                        
                         $('#myModal').modal({
                                show: true,
                                backdrop: 'static',
                                keyboard: false
                            }
                        );
                        document.getElementById('response_msg').style.display = 'block';
                        $('#response_msg').html('<div class="alert alert-danger">Your account has not been activated yet. Please enter your activation code.</div>');
                    }else if(data==2){
                         window.location.href = "dashboard" ;
                    }
                });
            });
        }else{
            console.log('User cancelled login or did not fully authorize.');
        }
    });
}

/*end*/

(function() {
    var e = document.createElement('script');
    e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
    e.async = true;
    document.getElementById('fb-root').appendChild(e);
}());   
</script>
