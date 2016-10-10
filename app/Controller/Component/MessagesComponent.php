<?php 

   

    Class MessagesComponent extends Component{
        
        function ErrorMessages($status){
            
                    $codes = Array(
                        '101'=>'Please Enter Old Password',
                        '102'=>'Please Enter New Password',
                        '103'=>'Please Enter Confirm Password',
                        '104'=>'New Password and ConfirmPassword Does not match!',
                        '105'=>'Invalid Old Password',
                        '106'=>'Invalid Old Password',
                        
                        '600'=>'Please Enter Email Address!',
                        '601'=>'Please Enter Password!',
                        '602'=>'Entered Email Address is not valid!',
                        '603'=>'Entered Email is Already Exists',
                        '604'=>"Email Or Password Invalid!",
                        '605'=>'Email Address Does not Match!',
                        '606'=>'Please Enter Old Password!',
                        '607'=>'Please Enter New Password!',
                        '608'=>'Please Enter uuid!',
                        '609'=>'Invalid Old Password',
                        '610'=>'You have Succssfully logged out ',
                        '611'=>'Please Select Image Format like jpg,png,gif! ',
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
                         '918' =>'Please enter the user id.',
                        '919' =>'Please enter the gift type.',
                        '920' =>'Please enter the recepient name.',
                        '921' =>'Please enter the email.',
                        '922' =>'Please enter the message.',
                        '923' =>'Please enter the gift card id.',
                        '924' =>'Please enter the gift coupan id.',
                        '925' =>'Please enter the recepient image.',
                        '926' =>'Please enter the user id.',
                        '927' =>'Please enter the user id.',
                        '928' =>'Please enter the user id.',
                        '929' => 'category Added Successfully',
                        '930' =>'Blog Posted Successfully',
                        '931' =>'Class Successfully added To Wishlist',
                        '932' =>'Please Enter Search Value',
                        '933' =>'Comment Added Successfully',
                        
                        '935' =>'Vendor DeActivated Successfully',
                        '936' =>'Category DeActivated Successfully',
                        '937' =>'Segment DeActivated Successfully',
                        '938' =>'Please Enter  Gift Title',
                        '939' =>'Please Enter  Gift description',
                        
                        '940' =>'Please Select Proper CardType',
                        '941' =>'Segment Already Added on This Gift Card !',
                        '942' =>'Community DeActivated Successfully !',
                        '943'=>'Group DeActivated Successfully',
                        '944'=>'Please Enter Group Name',
                        '945'=>'Please Select Segment Name',
                        '946'=>'Segment Image Can Not Be Blank',
                        '947'=>'Mobile No Already Exists!',


                        '952'=>'Please Enter NGO Title',
                        '953'=>'Please Enter NGO Description',
                        '953'=>'Ngo Name Can not be blank!',
                       '954'=>"The email address that you've entered doesn't match any account. Please Sign up for an account.!",
                        
                        
                        
                        











                        //=====================Admin------------------------------------//
                        '1500'=>'Please Enter Category Name',
                        
                        
                         );
                   
            return (isset($codes[$status])) ? $codes[$status] : '';
        }
        
        function SuccessMessages($status){
            $codes = Array(
                '101'=>'Otp Send Successfully on your Mobile Number',
                '102'=>'Password Reset Sucessfully',
                '103' => 'Password Changed Successfully',
                '104'=>'Registration completed Successfully, Your Verification Link has been Sent to Your Email id, Please Verify Your Account to continue...,',
                '105'=>'Your Account Verified Successfully',
                '106'=>'Gifting option saved Successfully',
                '107'=>'Image Added Successfully',
                '108'=>'Video Added Successfully',
                '109' =>'Vendor Activated Successfully',
                '110' =>'Category Activated Successfully',
                '111' =>'Category Updated Successfully',
                '112' =>'Category Added Successfully',
                '113' =>'Segment Activated Successfully',
                '114' =>'Segment Updated Successfully',
                '115'=>'New Gift Card Added Successfully',
                '116'=>'Gift Card Segment Added Successfully',
                '117'=>'Community ActivatedSuccessfully',
                '118'=>'Community Updated Successfully',
                '118'=>'Group Activated Successfully',
                '119'=>'Group Updated Successfully',
                '120'=>'New Group Created Successfully',
                '121'=>'Catalog Request Approved Successfully',
                '122'=>'Catalog Request Rejected Successfully',
                '123'=>'Featured  Class Price Updated Successfully',
                '124'=>'Vendor Profile Updated Successfully',
                '125'=>'Password Changed Successfully',
                '126'=>'Password Changed Successfully',
                '127'=>'Learner Profile Updated Successfully',
                '128'=>'Category Deleted Successfully',
                '129'=>'Segment Deleted Successfully',
                '130'=>'Vendor Deleted Successfully',
                '131'=>'Learner Deleted Successfully',

                '150'=>'NGO Card Updated Successfully',
                '151'=>'NGO Card Added Successfully',
                '152'=>'New Ngo Added Successfully',
               '153'=>'Ngo Updated Successfully',
               '154'=>'Ngo Activated Successfully',
               '155'=>'Ngo DeActivated Successfully',
               '156'=>'Quote Request Send Successfully to Vendor',
               '157'=>'Message Send Successfully to learner',
               '158'=>'Class Has been Activated Successfully',
               '159'=>'Class Has been DeActivated Successfully',
					
                
                  );
            return (isset($codes[$status])) ? $codes[$status] : '';
        }
        
    }
?>
