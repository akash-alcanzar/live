<?php

class AttendsController extends AppController {

	var $uses = array('VendorClasse');
/*================== @ Developed By Rahul Pathak  for check Session=======================================*/
    public function checkUser(){
    	if(!$this->Session->check('Admin')){
    		$this->redirect(array('controller'=>'Admins','action'=>'login'));
    	}
    }
public function fixedClass(){
  require ('sendgrid-php/vendor/autoload.php');
  require ('sendgrid-php/lib/SendGrid.php');
  $dt=date('m/d/Y');
  $this->autoRender=false;
 
  $this->layout='vendor_layout';
 
 
   $res = $this->VendorClasse->find('all',array(
            'joins' =>   array(
                            array(
                                'table' => 'bg_tickets',
                                'alias' => 'Ticket',
                                'type'  =>  'INNER',
                                'conditions' => array('VendorClasse.id=Ticket.vendor_classe_id','VendorClasse.end_month'=>$dt)
                               
                                ),
                            array(
                                'table' => 'bg_payu_transactions',
                                'alias' => 'Payu',
                                'type'  =>  'INNER',
                                'conditions' => array('Ticket.txn_id = Payu.txnid','Payu.status'=>'success')
                                
                                ),
                             array(
                                'table' => 'bg_user_masters',
                                'alias' => 'UserMaster',
                                'type'  =>  'INNER',
                                'conditions' => array('Ticket.user_id = UserMaster.id')
                                
                                )
                           
                             


                           
                              ),
            
            'fields'    =>array('Ticket.*','Payu.*','UserMaster.*','VendorClasse.*')
           
            ));
      
    if(!empty($res)){
      foreach($res as $key=>$result){
        $class_id=$result['VendorClasse']['id'];
        $class_name=$result['VendorClasse']['class_topic'];
        $user_id=
        $user_name=$result['UserMaster']['first_name'];
        $mobile=$result['UserMaster']['mobile'];
        $email=$result['UserMaster']['email'];
        $link=HTTP_ROOT.'/homes/customerReviewForm/'.base64_encode($user_id).'/'.base64_encode($class_id);
        $msg='Hello%20'.$user_name.'%20Your%20Class%20'.$class_name.'%20Has%20been%20Completed%20Successfully%20Please%20click%20on%20this%20link%20for%20Review%20%20:'.$link;
        
        $Url = 'http://193.105.74.159/api/v3/sendsms/plain?user=braingroom&password=3e4IG3WL&sender=BRAING&SMSText='.$msg.'&type=longsms&GSM=91'.$mobile;
        $dataArray=array();
        $dataArray['link']=$link;
        $dataArray['user_name']=ucfirst($user_name);
        $dataArray['class_name']=$class_name;
        
        
        $this->sendMail('review',$email,$dataArray);
        $this->openurl($Url);            

      }
    }
}
public function openurl($url) {
   
    $ch=curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$postvars);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    curl_setopt($ch,CURLOPT_TIMEOUT, '3');  
    $content = trim(curl_exec($ch)); 
    
    $response = curl_exec($ch);
    
    return $response;
    curl_close($ch); 
      

  } 

function sendMail($mailFor, $mail= NULL, $activationCode=NULL){
        
        switch($mailFor){
       
            case 'review' : 
           
             $sendgrid = new SendGrid('madhulas','thirdeye123');

            $email    = new SendGrid\Email();
            $email->addTo($mail)->addTo('')->setFrom('support@braingroom.com')->setSubject('braingroom| Customer Review Collection for'.$activationCode['class_name'])->setText('!')->setHtml('
            <html>
                <head><title></title></head>
                <body>
                    <div style="border-radius: 6px;background-color: rgba(255,255,255,0.3);padding: 10px;width: 81%;margin-left:20px;">
                    <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
                    <p>
                        <span style="font-size:20px;font-weight:bold;color:#6397cb;line-height:110%">Dear '.$activationCode['user_name'].' your class '.$activationCode['class_name'].' has been Completed Successfully,</span><br>
                            <span style="font-size:14px;color:#666666;font-style:italic"></span>
                        </p>
                        <p>Please Click on This Link For Review  Class...,</p>
                        <p>'.$activationCode['link'].'</p>
                        
                        <hr style="border:0;border-top:1px solid #d7d7d7;min-height:0">
                        <p>If you have any problems, or believe you have received this in error, please contact us.</p>
                        <p></p>
                        <p>braingroom</p>
                        <span style="font-size:11px;color:#8a8a8a;line-height:100%">Copyright © 2016 braingroom.com All rights reserved.</span>
                    </div>        
                </body>
            </html>');
            $sendgrid->send($email);
             break;
          }
    }
   

}

?>
