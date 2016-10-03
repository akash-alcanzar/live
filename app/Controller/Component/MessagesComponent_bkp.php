<?php 

   

    Class MessagesComponent extends Component{
        
        function ErrorMessages($status){
            
                    $codes = Array(
                        '600'=>'Please Enter Email Address!',
                        '601'=>'Please Enter Password!',
                        '602'=>'Entered Email Address is not valid!',
                        '603'=>'Entered Email is Already Exists',
                        '604'=>'Email Or Password Invalid!',
                        '605'=>'Email Address Does not Match!',
                        '606'=>'Please Enter Old Password!',
                        '607'=>'Please Enter New Password!',
                        '608'=>'Please Enter uuid!',
                        '609'=>'Invalid Old Password',
                        '610'=>'You have Succssfully logged out ',
                        '611'=>'Please Select Image Format like jpg,png,gif! ',
                        '610'=>'You have Succssfully logged out ',
                        '611'=>'Please Enter Gender',
                        '623'=>'Invalid Json format!',
                        '624'=>'Invalid uuid',
                        '625'=>'Please Enter Mobile No!',
                        '626'=>'Please Enter State!',
                        '627'=>'Please Enter City!',
                        '628'=>'Please Enter Interest Area!',
                        '629'=>'Please Enter Community Class Prefrence!',
                        '630'=>'Please Enter Date Of Birth!',
                        '631'=>'Please Select Experience!',
                        '632'=>'Please Select Primary Verification Type!',
                        '633'=>'Please Enter Verification Number!',
                        '634'=>'Please Enter Name!',
                        '635'=>'Please Select Expert Type Area!',
                        '636'=>'Please Enter Address',
                        '637'=>'Please Enter Description',
                        '638'=>'Please Enter Registration Id',
                        '639'=>'Invalid Id',
                        '640'=>'Please Select Video Format like mp4,flv,asf,mov,avi',
                        '643'=>'Please Enter user_id',
                        '644'=>'please Enter Segment Type',
                        '645'=>'please Enter class Type',
                        '646'=>'Class Schedule Can not be blank!',
                        '647'=>'Recurring Classes Can not be blank!',
                        '648'=>'Record Not Found!',
                        '649'=>'Mobile Number Does not exists please Enter Valid Mobile Number!',
                        '650'=>'Request Successfully Send To Admin',
                        '651'=>'Entered Mobile Number is Already Exists',
                        '652'=>'Invalid Cupan Id',
                        '653'=>'Your Account Is Not verified Please Verify Your Account',
                        '700'=>'Registration has been Successfully',
                        '900'=>'Login has been Successfully',
                        '901'=>'Password Send Successfully on your email',
                        '902'=>'Password Changed Successfully',
                        '903'=>'Profile Updated Successfully',
                        '904'=>'New Video Posted Successfully in Gallary',
                        '905'=>'class Added Successfully',
                        '906'=>'Your Password Changed Successfully!',
                        '907'=>'Cupan Code Generated Successfully',
                        '908'=>'Device Data Registered Successfully',
                        '909'=>'Invalid Otp,Please Enter Valid Otp Code',
                        '910'=>'New Password And Confirm Password are not Same!',
                        '911' =>'Old Password Can Not Be Blank',
                        '912' =>'New Password Can Not Be Blank',
                        '913' =>'Confirm Password Can Not Be Blank',
                        "914" => "Invalid Old Password",
                        "915" => "New Password And Confirm Password Does Not Match",
                        '916' =>'Old Password And New Password Does Not Same!, Please Enter Again New Password',
                        '917' =>'Please Select Image Format Like Jpg,png,gif',
                         );
                   
            return (isset($codes[$status])) ? $codes[$status] : '';
        }
        
        function SuccessMessages($status){
            $codes = Array(
                '101'=>'Otp Send Successfully on your Mobile Number',
                '102'=>'Password Reset Sucessfully',
                '103' => 'Password Changed Successfully',
                '104'=>'Registration completed Successfully, Your Verification Link Send on Your Email,Please Verify Your Account,',
                '105'=>'Your Account Verified Successfully',
                  );
            return (isset($codes[$status])) ? $codes[$status] : '';
        }
        
    }
?>
