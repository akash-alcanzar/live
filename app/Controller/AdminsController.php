<?php

class AdminsController extends AppController {

	var $uses = array('Admin','UserMaster','City','Locality','Category','Community','UserVerfication','ClassType',
    'ClassSegment','VendorClasse','ClassRegular','ClassSchedule','VendorGalleries','TransactionHistorie',
    'ConnectGroup','RequestCatalog','CatalogAddGroup','AddCatalog','VendorMessage','FeaturedPrice',
    'PromoteClassDetail','Ngo','GroupActivity','GroupActivityMessge','Blog');
   var $components = array('Paginator');
/*================== @ Developed By Rahul Pathak  for check Session=======================================*/
    public function checkUser(){
    	if(!$this->Session->check('Admin')){
    		$this->redirect(array('controller'=>'Admins','action'=>'login'));
    	}
    }
/*==============   End=====================================================================================*/

     public function index() {
    	$this->redirect(array('controller'=>'Admins','action'=>'manageVendor'));
       

 	  }
    public function Dashboard(){
      $this->checkUser();
      $this->layout="admin_layout";
    }

    public function manageVendor(){
     $this->checkUser();
     $this->layout="admin_layout";
     $res=$this->UserMaster->find('all',array('conditions'=>array('user_type_id'=>'1','status !='=>4),'order' => array('add_date DESC')));
     //print_r($res);die;
     if(!empty($res)){
      foreach($res as $result){
        
        $locality=$this->Locality->find('first',array('conditions'=>array('id'=>$result['UserMaster']['locality_id'])));
        
       $dataArray[$result['UserMaster']['id']]=$locality['Locality']['name'];
      }
     }
     //print_r($dataArray);die;
     $this->set('locality',$dataArray);
     $this->set('view_vendor',$res);
     
    }
    public function sendMessageVendor(){
       $this->checkUser();
       $this->loadmodel('GetQuote');
       $this->loadmodel('ChatMessage');
     $this->layout="admin_layout";
     $quote_id=base64_decode($this->params->pass[0]);
    $res=$this->GetQuote->find('first',array(
            'joins' =>   array(
                            array(
                                'table' => 'bg_class_types',
                                'alias' => 'ClassType',
                                'type'  =>  'INNER',
                                'conditions' => array('GetQuote.class_mode = ClassType.id')
                               
                                ),
                          array(
                                'table' => 'bg_vendor_classes',
                                'alias' => 'VendorClasse',
                                'type'  =>  'INNER',
                                'conditions' => array('GetQuote.class_id = VendorClasse.id')
                               
                                ),
                            array(
                                'table' => 'bg_user_masters',
                                'alias' => 'UserMaster',
                                'type'  =>  'INNER',
                                'conditions' => array('GetQuote.user_id = UserMaster.id')
                                ),
                            array(
                                'table' =>'bg_user_masters',
                                'alias' =>'VendorUser',
                                'type' =>'INNER',
                                'conditions'=>array('VendorClasse.user_id=VendorUser.id')
                              ),
                            

                              ),
            'conditions'=>array('GetQuote.id'=>$quote_id),
            'fields'    =>array('GetQuote.*','ClassType.*','UserMaster.*','VendorUser.*')
           
            ));
     if($this->request->is('post')){
      $data=$this->data;

      $msg="Hello ". $res['VendorUser']['first_name']."....<br>".$res['UserMaster']['first_name']." Wants to Seminor in ". $data['GetQuote']['organization_name']." For ".$data['GetQuote']['audience_strength']." Strength Location of Seminor ".$data['GetQuote']
            ['location']." For ".$data['GetQuote']['class_type']." Date Of Seminor Is ".$data['GetQuote']['date']." If Are u intrested For Seminor Please Send  Your Seminor price <br> Admin Description About this Seminor ".$data['GetQuote']['admin_message'];
      $dataArray['sender_id']=0;
      $dataArray['reciever_id']=$res['VendorUser']['id'];
      $dataArray['message_type']=1;
      $dataArray['quote_id']=$res['GetQuote']['id'];
      
      $dataArray['message']=$msg;
      $dataArray['status']=1;
      $dataArray['add_date']=strtotime(date('Y-m-d H:i:s'));
      $dataArray['modify_date']=strtotime(date('Y-m-d H:i:s'));
      $this->ChatMessage->save($dataArray);
      $userArray['id']=$res['GetQuote']['id'];
      $userArray['admin_to_Vendor_status']=1;
      $this->GetQuote->save($userArray);
      $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
            array('pass'=>array('156','1'))); 
      $this->redirect(array('controller'=>'Admins','action'=>'manageQuote'));
            
     }
      
      //print_r($res);die;
     $this->set('edit_quote',$res);
    }
    public function sendMessageUser(){
       $this->checkUser();
       $this->layout="admin_layout";
       $this->loadmodel('GetQuote');
       $this->loadmodel('ChatMessage');
       $quote_id=base64_decode($this->params->pass[0]);
       $learner_message=$this->ChatMessage->find('first',array('conditions'=>array('sender_id'=>0,'quote_id'=>$quote_id)));
       $vendor_message=$this->ChatMessage->find('first',array('conditions'=>array('sender_id !='=>0,'quote_id'=>$quote_id)));
       $this->set(compact('learner_message','vendor_message'));
       $quote_price=$this->GetQuote->find('first',array('conditions'=>array('id'=>$quote_id)));

       $this->set('quote_price',$quote_price);
       if($this->request->is('post')){
        $data=$this->data;
       
        $link='<a href='.HTTP_ROOT.'/Homes/catalogBook/'.base64_encode($quote_price['GetQuote']['id']).'/'.base64_encode($data['GetQuote']['price']).'>Click here For Booking Catalog Quote </a>';
        $msg=$data['GetQuote']['vendor_message']."<br> Admin Description -".$data['GetQuote']['admin_message']." ".$link;
        
        $dataArray['sender_id']=0;
        $dataArray['reciever_id']=$quote_price['GetQuote']['user_id'];
        $dataArray['message_type']=1;
        $dataArray['quote_id']=$quote_price['GetQuote']['id'];
       
        $dataArray['message']=$msg;
        $dataArray['status']=1;
        $dataArray['add_date']=strtotime(date('Y-m-d H:i:s'));
        $dataArray['modify_date']=strtotime(date('Y-m-d H:i:s'));
      $this->ChatMessage->save($dataArray);
      $userArray['price']=$data['GetQuote']['price'];
      $userArray['id']=$quote_price['GetQuote']['id'];
      $userArray['admin_to_user_status']=1;
      $this->GetQuote->save($userArray);
      $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
            array('pass'=>array('157','1'))); 
      $this->redirect(array('controller'=>'Admins','action'=>'manageQuote'));
       }

    } 
    public function manageQuote(){
        $this->checkUser();
        $this->layout="admin_layout";
        $this->loadmodel('GetQuote');
        $res = $this->GetQuote->find('all',array(
            'joins' =>   array(
                            array(
                                'table' => 'bg_vendor_classes',
                                'alias' => 'VendorClasse',
                                'type'  =>  'INNER',
                                'conditions' => array('GetQuote.class_id = VendorClasse.id')
                               
                                ),
                            array(
                                'table' => 'bg_user_masters',
                                'alias' => 'UserMaster',
                                'type'  =>  'INNER',
                                'conditions' => array('GetQuote.user_id = UserMaster.id')
                                ),
                            array(
                                'table' =>'bg_user_masters',
                                'alias' =>'VendorUser',
                                'type' =>'INNER',
                                'conditions'=>array('VendorClasse.user_id=VendorUser.id')
                              ),
                            array(
                                'table' =>'bg_connect_groups',
                                'alias' =>'ConnectGroup',
                                'type' =>'INNER',
                                'conditions'=>array('GetQuote.catalog_id=ConnectGroup.id')
                              ),
                           
                             


                           
                              ),
            
            'fields'    =>array('GetQuote.*','UserMaster.*','VendorClasse.*','VendorUser.*','ConnectGroup.group_name'),
            'order'=>array('GetQuote.modify_date DESC')
            ));
        
       
        $this->set('view_quote',$res);
    }
    public function Delete(){
      if(isset($this->params->pass[0])){
            $this->checkUser();
            $ide=base64_decode($this->params->pass[0]);
            $res=$this->UserMaster->find('first',array('conditions'=>array('id'=>$ide)));
            if(!empty($res)){
             
             
              $this->UserMaster->delete($res['UserMaster']['id']);
              if($res['UserMaster']['user_type_id']=='1'){
              $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
            array('pass'=>array('130','1')));
            }
            else{
             $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
            array('pass'=>array('131','1'))); 
            }
        $this->redirect(array('controller'=>'admins','action'=>'manageLearner'));
            }
          }
        }
    public function editVendor(){
      $this->checkUser();
     $this->layout="admin_layout";
     
     if(!empty($this->params->pass[0])){
      $categoryArray=array();
      $ide=base64_decode($this->params->pass[0]);
      $res=$this->UserMaster->find('first',array('conditions'=>array('id'=>$ide)));
      //print_r($res);die;
      $locality_name=$this->Locality->find('first',array('conditions'=>array('id'=>$res['UserMaster']['locality_id'])));
      $res['UserMaster']['locality_name']=$locality_name['Locality']['name'];
      $strArray=explode(",",$res['UserMaster']['category_id']);
      $len=count($strArray);
      for($a=0;$a<$len;$a++){
      $check=$this->Category->find('first',array('conditions'=>array('id'=>$strArray[$a])));
      //print_r($check);die;
      $categoryArray[$check['Category']['id']]=$check['Category']['category_name'];
      }

      $this->set('view_cat',$categoryArray);
      $this->set('edit_profile',$res);
      $city=$this->City->find('all');
      //print_r($city);die;
      $cat_localitie=$this->Locality->find('all');
      $cat=$this->Category->find('all',array('conditions'=>array('status'=>1)));
      $this->set('localitie',$cat_localitie);
      $this->set('city',$city);
      $this->set('category',$cat);
      if($this->request->is('post')){
        $validate=0;
        $data=$this->data;
        $mobile_no=$data['UserMaster']['mobile'];
        $check=$this->UserMaster->find('first',array('conditions'=>array('mobile'=>$mobile_no)));
        $check=$this->UserMaster->find('first',array('conditions'=>array('mobile'=>$mobile_no,'id !='=>$ide)));
        
        if(!empty($check)){
         $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                                    array('pass'=>array('947','0')));
        }
        else{
          
        
       $img_filename = $data['UserMaster']['profile_image1']['name'];
                    
                    $img_tmpname  = $data['UserMaster']['profile_image1']['tmp_name'];
                    $res=$this->UserMaster->find('first',array('conditions'=>array('id'=>$ide)));
                               
             
              
              if(($img_filename != "") && ($img_tmpname != "")){

                  
                  $explode_file   = explode(".",$img_filename);
                  $countExp       = count($explode_file);
                  $fileExtenstion = $explode_file[$countExp-1];
                   
                  if(($fileExtenstion != 'png') && ($fileExtenstion != 'jpg') && ($fileExtenstion != 'jpeg') &&($fileExtenstion != 'gif')){
                      
                     $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                                    array('pass'=>array('611','0')));
                  }else{
                      $final_img = str_replace(".","",str_replace(" ","",date("YmdHis").microtime())).".".$fileExtenstion;    
                         
                          $upload=WWW_ROOT."/img/Vendor/profile/".$final_img;
                          
                            if(move_uploaded_file($img_tmpname,$upload)){ 

                              $data['UserMaster']['id']=$ide;
                                $str="";
                                $k=0;
                                
                                $data['langOpt2']=array_unique($data['langOpt2']);
                                foreach($data['langOpt2'] as $r){

                                  $find=$this->Category->find('first',array('conditions'=>array('category_name'=>$r)));
                                  
                                  $str=$str.",".$find['Category']['id'];
                                  
                                }
                                $str=substr($str,1);

                                $data['UserMaster']['category_id']=$str;
                                $data['UserMaster']['profile_image']=$final_img;
                                $data['UserMaster']['status']=1;
                                $data['UserMaster']['modify_date']=strtotime(date('Y-m-d H:i:s'));
                                $this->UserMaster->save($data);
                                unlink(WWW_ROOT."/img/Vendor/profile/".$res['UserMaster']['profile_image']); 
                                $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                                    array('pass'=>array('124','1')));
                              $this->redirect(array('controller'=>'Admins','action'=>'manageVendor'));
                            
                            }

             
                    }
            

                  
                }
                else{


                              $data['UserMaster']['id']=$ide;
                                $str="";
                                 $k=0;
                                
                                $data['langOpt2']=array_unique($data['langOpt2']);
                                foreach($data['langOpt2'] as $r){

                                  $find=$this->Category->find('first',array('conditions'=>array('category_name'=>$r)));
                                  
                                  $str=$str.",".$find['Category']['id'];
                                  
                                }
                                $str=substr($str,1);
                                $data['UserMaster']['category_id']=$str;
                                $data['UserMaster']['status']=1;
                                $data['UserMaster']['modify_date']=strtotime(date('Y-m-d H:i:s'));
                               
                                $this->UserMaster->save($data);
                                $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                                    array('pass'=>array('124','1')));
                              $this->redirect(array('controller'=>'Admins','action'=>'manageVendor'));
                  }
                }

        }
 }
} 
public function editBuyer(){
      $this->checkUser();
     $this->layout="admin_layout";
     
     if(!empty($this->params->pass[0])){
      $categoryArray=array();
      $ide=base64_decode($this->params->pass[0]);
      $res=$this->UserMaster->find('first',array('conditions'=>array('id'=>$ide)));
      //print_r($res);die;
      $locality_name=$this->Locality->find('first',array('conditions'=>array('id'=>$res['UserMaster']['locality_id'])));
      $res['UserMaster']['locality_name']=$locality_name['Locality']['name'];
      $strArray=explode(",",$res['UserMaster']['category_id']);
      $len=count($strArray);
      for($a=0;$a<$len;$a++){
      $check=$this->Category->find('first',array('conditions'=>array('id'=>$strArray[$a])));
      //print_r($check);die;
      $categoryArray[$check['Category']['id']]=$check['Category']['category_name'];
      }

      $this->set('view_cat',$categoryArray);
      $this->set('edit_profile',$res);
      $city=$this->City->find('all');
      //print_r($city);die;
      $cat_localitie=$this->Locality->find('all');
      $cat=$this->Category->find('all',array('conditions'=>array('status'=>1)));
      $this->set('localitie',$cat_localitie);
      $this->set('city',$city);
      $this->set('category',$cat);
      if($this->request->is('post')){
        $validate=0;
        $data=$this->data;
        $mobile_no=$data['UserMaster']['mobile'];
        $check=$this->UserMaster->find('first',array('conditions'=>array('mobile'=>$mobile_no,'id !='=>$ide)));
        if(!empty($check)){
         $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                                    array('pass'=>array('947','0')));
        }
        else{
          
                    $img_filename = $data['UserMaster']['profile_image1']['name'];
                    
                    $img_tmpname  = $data['UserMaster']['profile_image1']['tmp_name'];
                    $res=$this->UserMaster->find('first',array('conditions'=>array('id'=>$ide)));
                               
             
              
              if(($img_filename != "") && ($img_tmpname != "")){

                  
                  $explode_file   = explode(".",$img_filename);
                  $countExp       = count($explode_file);
                  $fileExtenstion = $explode_file[$countExp-1];
                   
                  if(($fileExtenstion != 'png') && ($fileExtenstion != 'jpg') && ($fileExtenstion != 'jpeg') &&($fileExtenstion != 'gif')){
                      
                       $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                                    array('pass'=>array('611','0'))); 
                  }else{
                      $final_img = str_replace(".","",str_replace(" ","",date("YmdHis").microtime())).".".$fileExtenstion;    
                         
                          $upload=WWW_ROOT."/img/Buyer/profile/".$final_img;
                          
                            if(move_uploaded_file($img_tmpname,$upload)){ 

                              $data['UserMaster']['id']=$ide;
                                $str="";
                                $k=0;
                                
                                $data['langOpt2']=array_unique($data['langOpt2']);
                                foreach($data['langOpt2'] as $r){

                                  $find=$this->Category->find('first',array('conditions'=>array('category_name'=>$r)));
                                  
                                  $str=$str.",".$find['Category']['id'];
                                  
                                }
                                $str=substr($str,1);
                                $data['UserMaster']['category_id']=$str;
                                $data['UserMaster']['profile_image']=$final_img;
                                $data['UserMaster']['status']=1;
                                $data['UserMaster']['modify_date']=strtotime(date('Y-m-d H:i:s'));
                                $this->UserMaster->save($data);
                                unlink(WWW_ROOT."/img/Buyer/profile/".$res['UserMaster']['profile_image']); 
                                $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                                    array('pass'=>array('127','1')));
                              $this->redirect(array('controller'=>'Admins','action'=>'manageLearner'));
                            
                            }

             
                    }
            

                  
                }
                else{


                              $data['UserMaster']['id']=$ide;
                                $str="";
                                 $k=0;
                                
                                $data['langOpt2']=array_unique($data['langOpt2']);
                                foreach($data['langOpt2'] as $r){

                                  $find=$this->Category->find('first',array('conditions'=>array('category_name'=>$r)));
                                  
                                  $str=$str.",".$find['Category']['id'];
                                  
                                }
                                $str=substr($str,1);
                                $data['UserMaster']['category_id']=$str;
                                $data['UserMaster']['status']=1;
                                $data['UserMaster']['modify_date']=strtotime(date('Y-m-d H:i:s'));
                               
                                $this->UserMaster->save($data);
                                $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                                    array('pass'=>array('127','1')));
                              $this->redirect(array('controller'=>'Admins','action'=>'manageLearner'));
                  }
                }

        }
       // ============================================================================================================
        //print_r($data);die;
      }
 
} 
    public function manageLearner(){
     $this->checkUser();
     $this->layout="admin_layout";
     $res=$this->UserMaster->find('all',array('conditions'=>array('user_type_id'=>'2','status !='=>4),'order' => array('add_date DESC')));
    if(!empty($res)){
      foreach($res as $result){
        
        $locality=$this->Locality->find('first',array('conditions'=>array('id'=>$result['UserMaster']['locality_id'])));
        
       $dataArray[$result['UserMaster']['id']]=$locality['Locality']['name'];
      }
     }
     //print_r($dataArray);die;
     $this->set('locality',$dataArray);
     $this->set('view_Learner',$res);
     
    }
    public function transactionDetail(){
     $this->checkUser();
     $this->layout="admin_layout";
     $res=$this->TransactionHistorie->query('SELECT * from bg_transaction_histories,bg_user_masters,bg_vendor_classes where bg_transaction_histories.class_id=bg_vendor_classes.id and  bg_transaction_histories.user_id=bg_user_masters.id and bg_transaction_histories.payment_from_class=1 order by bg_transaction_histories.transaction_date desc');
     //print_r($res);die;
     if(!empty($res)){

      $this->set('view_transaction',$res);
     }
     //print_r($res);die;     
     
     //$res=$this->TransactionHistorie=>find('')

    }
    public function cuponTracking(){
      $this->checkUser();
      $this->layout="admin_layout"; 
       $res = $this->TransactionHistorie->find('all',array(
            'joins' =>   array(
                            array(
                                'table' => 'bg_gift_cupans',
                                'alias' => 'GiftCupan',
                                'type'  =>  'INNER',
                                'conditions' => array('TransactionHistorie.booking_id = GiftCupan.booking_id','TransactionHistorie.status'=>2),
                                'order'=>array('TransactionHistorie.add_date DESC')
                                ),
                           
                             


                           
                              ),
            
            'fields'    =>array('TransactionHistorie.*','GiftCupan.*')
           
            ));

       $this->set('view_cupon',$res);
      
    }
 public function trackClassBookingCupon(){
       $this->checkUser();
      $this->layout="admin_layout";
      if(!empty($this->params->pass[0])){
        $cupon_id=base64_decode($this->params->pass[0]);
        
          $res = $this->TransactionHistorie->find('all',array(
            'joins' =>   array(
                            array(
                                'table' => 'bg_gift_cupans',
                                'alias' => 'GiftCupan',
                                'type'  =>  'INNER',
                                'conditions' => array('TransactionHistorie.booking_id=GiftCupan.booking_id','GiftCupan.id'=>$cupon_id,'TransactionHistorie.status'=>2),
                                'order'=>array('TransactionHistorie.add_date DESC')
                                ),
                            array(
                                'table' => 'bg_vendor_classes',
                                'alias' => 'VendorClasse',
                                'type'  =>  'INNER',
                                'conditions' => array('TransactionHistorie.class_id = VendorClasse.id')
                                
                                )
                           
                             


                           
                              ),
            
            'fields'    =>array('TransactionHistorie.*','GiftCupan.*','VendorClasse.*')
           
            ));
      
       $this->set('view_cupon',$res);
      }


    }
    public function transactionGift(){
     $this->checkUser();
     $this->layout="admin_layout";
     $res=$this->TransactionHistorie->query('SELECT * from bg_transaction_histories,bg_gift_cupans where bg_transaction_histories.booking_id=bg_gift_cupans.booking_id and bg_transaction_histories.payment_from_class=2 order by bg_transaction_histories.transaction_date desc'); 

    //print_r($res);die;
     if(!empty($res)){

      $this->set('view_transaction',$res);
     }
     //print_r($res);die;     
     
     //$res=$this->TransactionHistorie=>find('')

    }
    public function trackingFixedClass(){
     $this->checkUser();
     $this->layout="admin_layout"; 
     //$this->loadmodel('PayuTransaction');
    // $this->loadmodel('Ticket');
    $res=$this->VendorClasse->find('all',array(
                 'joins'=>array(
                           array(
                                'table'=>'bg_user_masters',
                                'alias'=>'UserMaster',
                                'type'=>'LEFT',
                                'conditions'=>array('VendorClasse.user_id = UserMaster.id'),
                                'order'=>array('VendorClasse.add_date DESC')
                                )
                                ),
                 'conditions' => array('VendorClasse.class_timing_id'=>2),

                 'fields'=>array('VendorClasse.*','UserMaster.first_name','UserMaster.institute_name','UserMaster.vendor_type_id')
                 )
              );
 /*$res = $this->PayuTransaction->find('all',array(
            'joins' =>   array(
                            array(
                                'table' => 'bg_tickets',
                                'alias' => 'Ticket',
                                'type'  =>  'INNER',
                                'conditions' => array('PayuTransaction.txnid = Ticket.txn_id'),
                                'order'=>array('Ticket.created')
                                ),
                             array(
                                'table' => 'bg_vendor_classes',
                                'alias' => 'VendorClasse',
                                'type'  =>  'INNER',
                                'conditions' => array('Ticket.vendor_classe_id = VendorClasse.id')
                                ),
                              array(
                                'table' => 'bg_user_masters',
                                'alias' => 'UserMaster',
                                'type'  =>  'INNER',
                                'conditions' => array('VendorClasse.user_id = UserMaster.id')
                                )
                             


                           
                              ),
            
            'fields'    =>array('VendorClasse.*','Ticket.*','PayuTransaction.*','UserMaster.*')
           
            ));*/

     if(!empty($res)){
    
      $this->set('view_detail',$res);
     }
    
    }
     public function trackingFlexibleClass(){
     $this->checkUser();
     $this->layout="admin_layout"; 
     $res=$this->VendorClasse->find('all',array(
                 'joins'=>array(
                           array(
                                'table'=>'bg_user_masters',
                                'alias'=>'UserMaster',
                                'type'=>'LEFT',
                                'conditions'=>array('VendorClasse.user_id = UserMaster.id'),
                                'order'=>array('VendorClasse.add_date DESC')
                                )
                                ),
                 'conditions' => array('VendorClasse.class_timing_id'=>1),

                 'fields'=>array('VendorClasse.*','UserMaster.first_name','UserMaster.institute_name','UserMaster.vendor_type_id')
                 )
              );
 

     if(!empty($res)){
    
      $this->set('view_detail',$res);
     }
    
    }
public function TrackDetail(){
       $this->layout="admin_layout"; 
      $this->loadmodel('PayuTransaction');
      $this->loadmodel('Ticket');
      if(!empty($this->params->pass[0])){
        $class_id=base64_decode($this->params->pass[0]);
        $class_detail=$this->VendorClasse->find('first',array('conditions'=>array('VendorClasse.id'=>$class_id),'fields'=>array('class_topic','id')));
        $this->set('class_view',$class_detail);
        $res=$this->PayuTransaction->query("select bg_tickets.payment_status,bg_tickets.user_id,bg_tickets.status,bg_tickets.created,bg_tickets.txn_id,count(bg_tickets.ticket_id) as total_ticket,bg_payu_transactions.amount from bg_tickets,bg_payu_transactions where bg_tickets.txn_id=bg_payu_transactions.txnid and bg_tickets.vendor_classe_id='".$class_id."'");
        if($res[0]['bg_tickets']['txnid']!='')
        $this->set('view_detail',$res);
      }
    } 
    public function TrackDetailFlexible(){
       $this->layout="admin_layout"; 
      $this->loadmodel('PayuTransaction');
      $this->loadmodel('Ticket');
      if(!empty($this->params->pass[0])){
        $class_id=base64_decode($this->params->pass[0]);
        
        $class_detail=$this->VendorClasse->find('first',array('conditions'=>array('VendorClasse.id'=>$class_id),'fields'=>array('class_topic','id')));
     
        $this->set('class_view',$class_detail);
        $res = $this->PayuTransaction->find('all',array(
                                            'joins' => array(
                                            array(
                                            'table' => 'bg_tickets',
                                            'alias' => 'Ticket',
                                            'conditions' => array('PayuTransaction.txnid=Ticket.txn_id'),
                                            'order'=>array('Ticket.created')
                                            )),
                                            'conditions'=>array('Ticket.vendor_classe_id'=>$class_id),
                                            'fields' =>array('Ticket.*','PayuTransaction.txnid')
                                            ));
        
        
 $this->set('view_detail',$res);
      }
    }
    public function UpdateFlexibleTicket(){
      $this->autoRender=false;
      $this->loadmodel('Ticket');
      if((!empty($this->params->pass[0]))&&(!empty($this->params->pass[1]))){
      $id=base64_decode($this->params->pass[0]);
      $status=base64_decode($this->params->pass[1]);
      $this->Ticket->updateAll(array('Ticket.payment_status' =>"'$status'"), array('Ticket.id' => $id));
      if($status=='1'){
        echo "1";die;
        }
        else if($status=='2'){
          echo "2";die;
        }
        else{
          echo "0";die;
        }

      }
      } 
    public function UpdateTicket(){
      $this->autoRender=false;
      $this->loadmodel('Ticket');
      if((!empty($this->params->pass[0]))&&(!empty($this->params->pass[1]))){
      $txn_id=base64_decode($this->params->pass[0]);
      $status=base64_decode($this->params->pass[1]);
      
      $this->Ticket->updateAll(array('Ticket.payment_status' =>"'$status'"), array('Ticket.txn_id' => $txn_id));
      if($status=='1'){
      echo "1";die;
      }
      else if($status=='2'){
        echo "2";die;
      }
      else{
        echo "0";die;
      }

    }
    }

    public function transactionPramote(){
     $this->checkUser();
     $this->layout="admin_layout";
     $res=$this->TransactionHistorie->query('SELECT * 
FROM bg_transaction_histories, bg_promote_class_details, bg_vendor_classes
WHERE bg_transaction_histories.transaction_id = bg_promote_class_details.txn_id
AND bg_transaction_histories.class_id = bg_vendor_classes.id and bg_transaction_histories.class_id=bg_promote_class_details.class_id
AND bg_transaction_histories.payment_from_class =3
ORDER BY bg_transaction_histories.transaction_date DESC '); 
     //print_r($res);die;
     if(!empty($res)){

      $this->set('view_transaction',$res);
     }
     

    }
    public function getTransaction($id=null){
      if(!empty($id)){
        $type=base64_decode($id);
        $str="";
        if($type=='1'){
         $str=$str.'<table id="example" class="table table-striped table-bordered" style="table-layout: fixed;width: 100%;">
                                <thead>
                                <tr>
                                    <th>Sr. no.</th>
                                    <th>Class_name</th>
                                    <th>Transaction By</th>
                                    <th>Contact No</th>
                                    <th>Amount</th>
                                    <th>Transaction Id</th>
                                    
                                    <th>Payment Mode</th>
                                    <th>Transaction Date</th>                                  
                                    <th>Transaction status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>';
          $res=$this->TransactionHistorie->query('SELECT * from bg_transaction_histories,bg_user_masters,bg_vendor_classes where bg_transaction_histories.class_id=bg_vendor_classes.id and  bg_transaction_histories.user_id=bg_user_masters.id and bg_transaction_histories.payment_from_class=1');
          if(!empty($res)){
            print_r($res);die;
          }                      
        }
      }
    }
    public function manageCategory(){
      $this->checkUser();
      $this->layout="admin_layout";
      $res=$this->Category->find('all',array('conditions'=>array('status !='=>3)));
      if(!empty($res)){

        $this->set('view_category',$res);
      }

    }

    public function view(){
      $this->checkUser();
      $this->layout="admin_layout";
      if(isset($this->params->pass[0])){
        $id=base64_decode($this->params->pass[0]);
      
      $res=$this->UserMaster->findById($id);
      if(!empty($res)){
      $city_name=$this->City->find('first',array('conditions'=>array('id'=>$res['UserMaster']['city_id'])));
      if(!empty($city_name)){
      $res['UserMaster']['city']=$city_name['City']['name'];
      }
      else{
        $res['UserMaster']['city']="N/A";
      
      }
      $locality_name=$this->Locality->find('first',array('conditions'=>array('id'=>$res['UserMaster']['locality_id']))); 
      
      if(!empty($locality_name)){
      $res['UserMaster']['locality']=$locality_name['Locality']['name'];
      }
      else{
       $res['UserMaster']['locality']="N/A"; 
      } 
      
      $interest=$this->Category->query("select * from bg_categories where id IN (".$res['UserMaster']['category_id'].")");
      
      if(!empty($interest)){
       foreach($interest as $res1){
      $res['UserMaster']['interest']=$res['UserMaster']['interest'].$res1['bg_categories']['category_name'].",";
      }
      $res['UserMaster']['interest']=rtrim($res['UserMaster']['interest'], ",");
       
      }
       //print_r($res);die;
        $this->set('view',$res);
      }
      }
  }
  public function ChangeCategoryStatus(){
   if(isset($this->params->pass[0])){
            $this->checkUser();
            $ide=base64_decode($this->params->pass[0]);

           
            
            

            $res1=$this->Category->find('first',array('conditions'=>array('id'=>$ide)));
            //print_r($res1);die;
            $data1=array();
            if(!empty($res1)){
                if(!empty($res1)){

                if($res1['Category']['status']=='1'){
                    $data1['Category']['status']=2;
                    $data1['Category']['id']=$ide;
                $this->Category->save($data1);
                    $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
            array('pass'=>array('936','0')));
        $this->redirect( $this->referer());
                    
                
                }else if($res1['Category']['status']=='2'){

                    $data1['Category']['status']=1;
                    $data1['Category']['id']=$ide;

                $this->Category->save($data1);
                    $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
            array('pass'=>array('110','1')));
        $this->redirect( $this->referer());
                    
                }


            }
          }
       }
    }
    /*public function DeleteCategory(){
      if(isset($this->params->pass[0])){
            $this->checkUser();
            $ide=base64_decode($this->params->pass[0]);
            $res=$this->Category->find('first',array('conditions'=>array('id'=>$ide)));
            if(!empty($res)){
              $dataArray['status']=3;
              $dataArray['id']=$ide;
              $this->Category->save($dataArray);
              $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
            array('pass'=>array('128','1')));
        $this->redirect( $this->referer());
            }
          }
          
    }*/
    public function DeleteSegment(){
      if(isset($this->params->pass[0])){
            $this->checkUser();
            $ide=base64_decode($this->params->pass[0]);
            $res=$this->ClassSegment->find('first',array('conditions'=>array('id'=>$ide)));
            if(!empty($res)){
              $dataArray['status']=3;
              $dataArray['id']=$ide;
              $this->ClassSegment->save($dataArray);
              $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
            array('pass'=>array('129','1')));
        $this->redirect( $this->referer());
            }
          }
          
    }
    public function editCategory(){
       $this->checkUser();
       $this->layout="admin_layout";
       $categoryArray=array();
            if(isset($this->params->pass[0])){
                  $this->checkUser();
                  $ide=base64_decode($this->params->pass[0]);
                  if($this->request->is('post')){
                    $data=$this->data;
                    
                    
                    $img_filename = $data['Category']['category_image']['name'];
                    
                    $img_tmpname  = $data['Category']['category_image']['tmp_name'];
                    $res=$this->Category->find('first',array('conditions'=>array('id'=>$ide)));
                               
             
               
              if(($img_filename != "") && ($img_tmpname != "")){

                  
                  $explode_file   = explode(".",$img_filename);
                  $countExp       = count($explode_file);
                  $fileExtenstion = $explode_file[$countExp-1];
                   
                  if(($fileExtenstion != 'png') && ($fileExtenstion != 'jpg') && ($fileExtenstion != 'jpeg') &&($fileExtenstion != 'gif')){
                      
                      $this->requestAction(array('controller'=>'validate','action'=>'generateServerResponse'),array('pass'=>array('611','0'))
                          ); 
                  }else{
                      $final_img = str_replace(".","",str_replace(" ","",date("YmdHis").microtime())).".".$fileExtenstion;    
                         
                          $upload=WWW_ROOT."img/category_image/".$final_img;
                          
                            if(move_uploaded_file($img_tmpname,$upload)){ 
                              $dataArray['id']=$ide;
                              $dataArray['category_name']=$data['Category']['category_name'];
                              $dataArray['category_image']=$final_img;
                              $dataArray['status']=1;
                              $dataArray['modify_date']=strtotime(date('Y-m-d H:i:s'));
                              //print_r($dataArray);die;
                              $this->Category->save($dataArray);
                              unlink(WWW_ROOT."/img/category_image/".$res['Category']['category_image']);  
                    
                               $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                  array('pass'=>array('110','1')));
                               $this->redirect(array('controller'=>'Admins','action'=>'manageCategory'));
                          
                            }

             
            }
            

                  
          }
                else{
                              $dataArray['id']=$ide;
                              $dataArray['category_name']=$data['Category']['category_name'];
                              //$dataArray['category_image']=$final_img;
                              $dataArray['status']=1;
                              $dataArray['modify_date']=strtotime(date('Y-m-d H:i:s'));
                              //print_r($dataArray);die;
                              $this->Category->save($dataArray);
                              $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                  array('pass'=>array('111','1')));
                               $this->redirect(array('controller'=>'Admins','action'=>'manageCategory'));
                  }

        }
        $all_cat=$this->Category->find('first',array('conditions'=>array('id'=>$ide)));
             
             $this->set('category_name',$all_cat['Category']['category_name']);
             $this->set('category',$all_cat);
      } 
    }
/*public function addCategory(){
       $this->checkUser();
       $this->layout="admin_layout";
       $validate=0;
       if($this->request->is('post')){
        $data=$this->data;
        if(empty($data['Category']['category_name'])){
          $validate++;
          $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
            array('pass'=>array('1500','0')));
        }
        else if(empty($data['Category']['category_image']['name'])){
          $validate++;
          $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
            array('pass'=>array('611','0')));
        }
        else if($data['Category']['category_image']['error']=='4'){
          $validate++;
          $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
            array('pass'=>array('611','0')));
        }
        else{
          if($validate=='0'){
            $img_filename = $data['Category']['category_image']['name'];
              
              $img_tmpname  = $data['Category']['category_image']['tmp_name'];
                    
              if(($img_filename != "") && ($img_tmpname != "")){

                  
                  $explode_file   = explode(".",$img_filename);
                  $countExp       = count($explode_file);
                  $fileExtenstion = $explode_file[$countExp-1];
                   
                  if(($fileExtenstion != 'png') && ($fileExtenstion != 'jpg') && ($fileExtenstion != 'jpeg') &&($fileExtenstion != 'gif')){
                      
                      $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                    array('pass'=>array('611','0')));
                  }else{
                      $final_img = str_replace(".","",str_replace(" ","",date("YmdHis").microtime())).".".$fileExtenstion;    
                         
                          $upload=WWW_ROOT."img/category_image/".$final_img;
                          
                            if(move_uploaded_file($img_tmpname,$upload)){ 
                                $dataArray['category_name']=$data['Category']['category_name'];
                                $dataArray['category_image']=$final_img;
                                $dataArray['status']=1;
                                $dataArray['add_date']=strtotime(date('Y-m-d H:i:s'));
                                
                                $dataArray['modify_date']=strtotime(date('Y-m-d H:i:s'));
                                //print_r($dataArray);die;
                                $this->Category->save($dataArray);
                                
                                 $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                    array('pass'=>array('112','1')));
                                 $this->redirect(array('controller'=>'Admins','action'=>'manageCategory'));

                }
        }

       }
    }
  }
}
}*/
 public function manageSegment(){

      $this->checkUser();
      $this->layout="admin_layout";
      $res1=$this->ClassSegment->find('all');

      $res=$this->ClassSegment->query("select bg_class_segments.*,bg_categories.category_name from bg_class_segments,bg_categories where bg_class_segments.category_id=bg_categories.id and bg_class_segments.status!=3 order by add_date desc");
      //print_r($res);die;
      $this->set('view_segment',$res);

 }
 public function ChangeSegmentStatus(){
   if(isset($this->params->pass[0])){
            $this->checkUser();
            $ide=base64_decode($this->params->pass[0]);
            
           
            
            

            $res1=$this->ClassSegment->find('first',array('conditions'=>array('id'=>$ide)));
            //print_r($res1);die;
            $data1=array();
            if(!empty($res1)){
                if(!empty($res1)){
                if($res1['ClassSegment']['status']==1){
                    $data1['ClassSegment']['status']=2;
                    $data1['ClassSegment']['id']=$ide;
                $this->ClassSegment->save($data1);
                    $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
            array('pass'=>array('937','0')));
        $this->redirect( $this->referer());
                    
                
                }else if($res1['ClassSegment']['status']==2){
                    $data1['ClassSegment']['status']=1;
                    $data1['ClassSegment']['id']=$ide;
                $this->ClassSegment->save($data1);
                    $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
            array('pass'=>array('113','1')));
        $this->redirect( $this->referer());
                    
                }
            }
          }
       }
    }
  public function addSegment(){
      $this->checkUser();
      $this->layout="admin_layout";
      $cat=array();
      $validate=0;
      if($this->request->is('post')){
        $data=$this->data;
        //print_r($data);die;
        if(empty($data['AddSegment']['category_name'])){
          $validate++;
          $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
            array('pass'=>array('1500','0')));
        }
        else if(empty($data['AddSegment']['Segment_image']['name'])){
          $validate++;
          $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
            array('pass'=>array('611','0')));
        }
        else if($data['AddSegment']['Segment_image']['error']=='4'){
          $validate++;
          $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
            array('pass'=>array('611','0')));
        }
        else{
         
          if($validate=='0'){
          
            $img_filename = $data['AddSegment']['Segment_image']['name'];
              
              $img_tmpname  = $data['AddSegment']['Segment_image']['tmp_name'];
                    
              if(($img_filename != "") && ($img_tmpname != "")){

                  
                  $explode_file   = explode(".",$img_filename);
                  $countExp       = count($explode_file);
                  $fileExtenstion = $explode_file[$countExp-1];
                   
                  if(($fileExtenstion != 'png') && ($fileExtenstion != 'jpg') && ($fileExtenstion != 'jpeg') &&($fileExtenstion != 'gif')){
                      
                      $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                    array('pass'=>array('611','0')));
                  }else{
                      $final_img = str_replace(".","",str_replace(" ","",date("YmdHis").microtime())).".".$fileExtenstion;    
                         
                          $upload=WWW_ROOT."img/segment_image/".$final_img;
                             
                            if(move_uploaded_file($img_tmpname,$upload)){ 
                              
                                $dataArray['category_id']=$data['AddSegment']['category_name'];
                                $dataArray['segment_name']=$data['AddSegment']['segment_name'];
                                $dataArray['segment_image']=$final_img;
                                $dataArray['status']=1;
                                $dataArray['add_date']=strtotime(date('Y-m-d H:i:s'));
                                
                                $dataArray['modify_date']=strtotime(date('Y-m-d H:i:s'));
                                
                                $this->ClassSegment->save($dataArray);
                                
                                 $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                    array('pass'=>array('114','1')));
                                 $this->redirect(array('controller'=>'Admins','action'=>'manageSegment'));

                }
        }

       }
    }
  }

      }
      $res=$this->Category->find('all',array('conditions'=>array('status'=>1)));
      if(!empty($res)){
        foreach($res as $result){
          $cat[$result['Category']['id']]=$result['Category']['category_name'];
        }

        $this->set('category_name',$cat);
      }
  }

  public function editSegment(){
     $this->checkUser();
     $this->layout="admin_layout";
     if(isset($this->params->pass[0])){
      $validate=0;
           
            $ide=base64_decode($this->params->pass[0]);
            if($this->request->is('post')){
              $data=$this->data;
              if(empty($data['AddSegment']['category_name'])){
          $validate++;
          $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
            array('pass'=>array('1500','0')));
        }
        
        else{
         
          if($validate=='0'){
          
            $img_filename = $data['AddSegment']['Segment_image']['name'];
              
              $img_tmpname  = $data['AddSegment']['Segment_image']['tmp_name'];
                    
              if(($img_filename != "") && ($img_tmpname != "")){

                  
                  $explode_file   = explode(".",$img_filename);
                  $countExp       = count($explode_file);
                  $fileExtenstion = $explode_file[$countExp-1];
                   
                  if(($fileExtenstion != 'png') && ($fileExtenstion != 'jpg') && ($fileExtenstion != 'jpeg') &&($fileExtenstion != 'gif')){
                      
                      $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                    array('pass'=>array('611','0')));
                  }else{
                      $final_img = str_replace(".","",str_replace(" ","",date("YmdHis").microtime())).".".$fileExtenstion;    
                         
                          $upload=WWW_ROOT."img/segment_image/".$final_img;
                             
                            if(move_uploaded_file($img_tmpname,$upload)){ 
                                $dataArray['id']=$ide;
                                
                                $dataArray['category_id']=$data['AddSegment']['category_name'];
                                $dataArray['segment_name']=$data['AddSegment']['segment_name'];
                                $dataArray['segment_image']=$final_img;
                                $dataArray['status']=1;
                                $dataArray['add_date']=strtotime(date('Y-m-d H:i:s'));
                                
                                $dataArray['modify_date']=strtotime(date('Y-m-d H:i:s'));
                                
                                $this->ClassSegment->save($dataArray);
                                
                                 $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                    array('pass'=>array('114','1')));
                                 $this->redirect(array('controller'=>'Admins','action'=>'manageSegment'));

                }
        }

       }
       else{
                                $dataArray['id']=$ide;
                                
                                $dataArray['category_id']=$data['AddSegment']['category_name'];
                                $dataArray['segment_name']=$data['AddSegment']['segment_name'];
                                //$dataArray['segment_image']=$final_img;
                                $dataArray['status']=1;
                                //$dataArray['add_date']=strtotime(date('Y-m-d H:i:s'));
                                
                                $dataArray['modify_date']=strtotime(date('Y-m-d H:i:s'));
                                
                                $this->ClassSegment->save($dataArray);
                                
                                 $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                    array('pass'=>array('114','1')));
                                 $this->redirect(array('controller'=>'Admins','action'=>'manageSegment'));
       }
    }
  }
}
            $segment_name=$this->ClassSegment->find('first',array('conditions'=>array('id'=>$ide)));
            $this->set('segment_name',$segment_name['ClassSegment']['segment_name']);


     $res=$this->Category->find('all',array('conditions'=>array('Category.status'=>1)));

      if(!empty($res)){
        foreach($res as $result){
          $cat[$result['Category']['id']]=$result['Category']['category_name'];
        }

        $this->set('category_name',$cat);
      }
  } 
}
  public function ChangeStatus(){
        if(isset($this->params->pass[0])){
            $this->checkUser();
            $ide=base64_decode($this->params->pass[0]);

            $this->loadmodel('UserMaster');
            
            

            $res1=$this->UserMaster->find('first',array('conditions'=>array('id'=>$ide)));
            //print_r($res1);die;
            $data1=array();
            if(!empty($res1)){
                if(!empty($res1)){
                if($res1['UserMaster']['status']==1){
                    $data1['UserMaster']['status']=2;
                    $data1['UserMaster']['id']=$ide;
                $this->UserMaster->save($data1);
                    $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
            array('pass'=>array('935','0')));
        $this->redirect( $this->referer());
                    
                
                }else if($res1['UserMaster']['status']==2){
                    $data1['UserMaster']['status']=1;
                    $data1['UserMaster']['id']=$ide;
                $this->UserMaster->save($data1);
                    $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
            array('pass'=>array('109','1')));
        $this->redirect( $this->referer());
                    
                }
                else if($res1['UserMaster']['status']==0){
                    $data1['UserMaster']['status']=1;
                    $data1['UserMaster']['id']=$ide;
                $this->UserMaster->save($data1);
                    $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
            array('pass'=>array('109','1')));
        $this->redirect( $this->referer());
                    
                }
            }
                
                
               

                //$this->redirect($this->referer());

            }
            
        }
        
        
    }
      public function login(){

    $this->layout=null; 

    if ($this->request->is('post')) {
      if(isset($this->data['Admins']['username'])&&isset($this->data['Admins']['password'])){
        $uname = $this->data['Admins']['username'];
        $password = $this->data['Admins']['password'];
        $count=$this->Admin->find('first',array('conditions'=>array('Admin.username'=>$uname,'Admin.password'=>md5($password))));
        if(!empty($count)){
          $this->Session->write('Admin',$count['Admin']['id']);
          //$this->Session->setFlash(__('Welcome  '.$count['Admin']['username']));
          $this->redirect(array('controller'=>'Admins', 'action'=>'manageVendor'));
        } else {
          $this->Session->setFlash('<div class="alert alert-danger">Invalid username or password</div>');
        }
      }else{
        $this->Session->setFlash('<div class="alert alert-danger">Please fill the  username or password</div>');  
      }
    }
  }
public function manageGift(){
  $this->checkUser();
  $this->layout="admin_layout";
  $this->loadModel('GiftCard');
  $res=$this->GiftCard->find('all',array('conditions'=>array('card_type_status !='=>3,'status !='=>3),
                             'order'=>array('add_date desc')));
  if(!empty($res)){
    $this->set('view_giftCard',$res);
  }
  $category=array();
  $cat=$this->Category->find('all',array('conditions'=>array('status'=>1)));
  if(!empty($cat)){
      $category[0]="Select";
    foreach($cat as $res){
    $category[$res['GiftCard']['id']]=$res['Category']['category_name'];
    }
    //print_r($category);die;
    $this->set('category',$category);
  }

}
public function addGiftCard(){
  $this->checkUser();
  $this->layout="admin_layout";
  $this->loadModel('GiftCard');
  $validate=0;
  if($this->request->is('post')){
    $data=$this->data;
    if(empty($data['GiftCard']['title'])){
      $validate++;
      $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                        array('pass'=>array('938','0')));
    }
    else if($data['GiftCard']['card_type_status']=='0'){
      $validate++;
     $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                        array('pass'=>array('940','0')));
    }
     else if($data['GiftCard']['category_id']=='0'){
      $validate++;
     $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                        array('pass'=>array('940','0')));//add Message Component
    }
    else if(empty($data['GiftCard']['description'])){
      $validate++;
      $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                        array('pass'=>array('939','0')));
    }
    else if(empty($data['GiftCard']['gift_image']['name'])){
      $validate++;
     $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                        array('pass'=>array('611','0'))); 
    }
    else{
      if($validate=='0'){

         $img_filename = $data['GiftCard']['gift_image']['name'];
              
              $img_tmpname  = $data['GiftCard']['gift_image']['tmp_name'];
                   
              if(($img_filename != "") && ($img_tmpname != "")){

                  
                  $explode_file   = explode(".",$img_filename);
                  $countExp       = count($explode_file);
                  $fileExtenstion = $explode_file[$countExp-1];
                   
                  if(($fileExtenstion != 'png') && ($fileExtenstion != 'jpg') && ($fileExtenstion != 'jpeg') &&($fileExtenstion != 'gif')){
                      
                      $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                    array('pass'=>array('611','0')));
                  }else{
                      $final_img = str_replace(".","",str_replace(" ","",date("YmdHis").microtime())).".".$fileExtenstion;    
                         
                          $upload=WWW_ROOT."img/gift_image/".$final_img;
                             
                            if(move_uploaded_file($img_tmpname,$upload)){ 
                                
                                
                                $dataArray['title']=$data['GiftCard']['title'];
                                $dataArray['description']=$data['GiftCard']['description'];
                                $dataArray['gift_image']=$final_img;
                                $dataArray['card_type_status']=$data['GiftCard']['card_type_status'];
                                $dataArray['status']=1;
                                $dataArray['category_id']=$data['GiftCard']['category_id'];
                                $dataArray['add_date']=strtotime(date('Y-m-d H:i:s'));
                                
                                $dataArray['modify_date']=strtotime(date('Y-m-d H:i:s'));
                                
                                $this->GiftCard->save($dataArray);
                                
                                 $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                    array('pass'=>array('115','1')));
                                 $this->redirect(array('controller'=>'Admins','action'=>'manageGift'));

                }
        }

       }
    }
      }
    }
    
  
  $userArray['0']="Select";
  $userArray['1']="Individual";
  $userArray['2']="Corporation";
 
  //print_r($dataArray);die;
  $this->set('card_type',$userArray);
  $category=array();
  $cat=$this->Category->find('all',array('conditions'=>array('status'=>1)));
  if(!empty($cat)){
      $category[0]="Select";
    foreach($cat as $res){
    $category[$res['Category']['id']]=$res['Category']['category_name'];
    }
    //print_r($category);die;
    $this->set('category',$category);
  }
  


}
public function editGiftCard(){
  $this->checkUser();
  $this->layout="admin_layout";
  $this->loadModel('GiftCard');
  if(isset($this->params->pass[0])){
      $validate=0;
      $ide=base64_decode($this->params->pass[0]);
        $res=$this->GiftCard->find('first',array('conditions'=>array('id'=>$ide)));
      if($this->request->is('post')){
        $data=$this->data;
        if(empty($data['GiftCard']['title'])){
          $validate++;
          $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                        array('pass'=>array('938','0')));
    }
    else if($data['GiftCard']['card_type_status']=='0'){
      $validate++;
      $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                    array('pass'=>array('940','0')));
    }
    else if($data['GiftCard']['category_id']=='0'){
      $validate++;
      $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                    array('pass'=>array('940','0')));
    }
    else if(empty($data['GiftCard']['description'])){
      $validate++;
      $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                    array('pass'=>array('939','0')));
    }
    
    else{
      if($validate=='0'){

         $img_filename = $data['GiftCard']['gift_image']['name'];
              
              $img_tmpname  = $data['GiftCard']['gift_image']['tmp_name'];
                   
              if(($img_filename != "") && ($img_tmpname != "")){

                  
                  $explode_file   = explode(".",$img_filename);
                  $countExp       = count($explode_file);
                  $fileExtenstion = $explode_file[$countExp-1];
                   
                  if(($fileExtenstion != 'png') && ($fileExtenstion != 'jpg') && ($fileExtenstion != 'jpeg') &&($fileExtenstion != 'gif')){
                      
                      $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                    array('pass'=>array('611','0')));
                  }else{
                      $final_img = str_replace(".","",str_replace(" ","",date("YmdHis").microtime())).".".$fileExtenstion;    
                         
                          $upload=WWW_ROOT."img/gift_image/".$final_img;
                             
                            if(move_uploaded_file($img_tmpname,$upload)){ 
                                
                                $dataArray['id']=$ide;
                                $dataArray['title']=$data['GiftCard']['title'];
                                $dataArray['description']=$data['GiftCard']['description'];
                                $dataArray['gift_image']=$final_img;
                                $dataArray['card_type_status']=$data['GiftCard']['card_type_status'];
                                $dataArray['status']=1;
                                 $dataArray['category_id']=$data['GiftCard']['category_id'];
                                $dataArray['add_date']=strtotime(date('Y-m-d H:i:s'));
                                
                                $dataArray['modify_date']=strtotime(date('Y-m-d H:i:s'));
                                
                                $this->GiftCard->save($dataArray);
                                unlink(WWW_ROOT."/img/gift_image/".$res['GiftCard']['gift_image']);
                                 $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                    array('pass'=>array('115','1')));
                                 $this->redirect(array('controller'=>'Admins','action'=>'manageGift'));

                }
        }

       }
       else{
                                $dataArray['id']=$ide;
                                $dataArray['title']=$data['GiftCard']['title'];
                                $dataArray['description']=$data['GiftCard']['description'];
                                //$dataArray['gift_image']=$final_img;
                                $dataArray['card_type_status']=$data['GiftCard']['card_type_status'];
                                $dataArray['status']=1;
                                 $dataArray['category_id']=$data['GiftCard']['category_id'];
                                $dataArray['add_date']=strtotime(date('Y-m-d H:i:s'));
                                
                                $dataArray['modify_date']=strtotime(date('Y-m-d H:i:s'));
                                
                                $this->GiftCard->save($dataArray);
                                
                                 $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                    array('pass'=>array('115','1')));
                                 $this->redirect(array('controller'=>'Admins','action'=>'manageGift'));
       }
    }
      }
      }
      
      $this->set('edit_gift',$res);
      $userArray['0']="Select";
      $userArray['1']="Individual";
      $userArray['2']="Corporation";
      $userArray['3']="NGO";
      //print_r($dataArray);die;
      $this->set('card_type',$userArray);
      $category=array();
  $cat=$this->Category->find('all',array('conditions'=>array('status'=>1)));
  if(!empty($cat)){
      $category[0]="Select";
    foreach($cat as $res){
    $category[$res['Category']['id']]=$res['Category']['category_name'];
    }
    //print_r($category);die;
    $this->set('category',$category);
  }

  }
 

}
public function manageNgo(){
  $this->checkUser();
  $this->layout="admin_layout";
  $this->loadModel('GiftCard');
  $res=$this->GiftCard->find('all',array('conditions'=>array('card_type_status'=>3,'status !='=>3),
                             'order'=>array('add_date desc')));
  if(!empty($res)){

    $this->set('view_ngo_card',$res);
  }
}
public function addNgoCard(){
     $this->checkUser();
  $this->layout="admin_layout";
  $this->loadModel('GiftCard');
  $validate=0;
  if($this->request->is('post')){
    $data=$this->data;
    if(empty($data['GiftCard']['title'])){
      $validate++;
      $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                        array('pass'=>array('952','0')));
    }
  
    else if(empty($data['GiftCard']['description'])){
      $validate++;
      $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                        array('pass'=>array('953','0')));
    }
    else if(empty($data['GiftCard']['ngo_image']['name'])){
      $validate++;
     $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                        array('pass'=>array('611','0'))); 
    }
    else{
      if($validate=='0'){

         $img_filename = $data['GiftCard']['ngo_image']['name'];
              
              $img_tmpname  = $data['GiftCard']['ngo_image']['tmp_name'];
                   
              if(($img_filename != "") && ($img_tmpname != "")){

                  
                  $explode_file   = explode(".",$img_filename);
                  $countExp       = count($explode_file);
                  $fileExtenstion = $explode_file[$countExp-1];
                   
                  if(($fileExtenstion != 'png') && ($fileExtenstion != 'jpg') && ($fileExtenstion != 'jpeg') &&($fileExtenstion != 'gif')){
                      
                      $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                    array('pass'=>array('611','0')));
                  }else{
                      $final_img = str_replace(".","",str_replace(" ","",date("YmdHis").microtime())).".".$fileExtenstion;    
                         
                          $upload=WWW_ROOT."img/gift_image/".$final_img;
                             
                            if(move_uploaded_file($img_tmpname,$upload)){ 
                                
                                
                                $dataArray['title']=$data['GiftCard']['title'];
                                $dataArray['description']=$data['GiftCard']['description'];
                                $dataArray['gift_image']=$final_img;
                                $dataArray['card_type_status']=3;
                                $dataArray['status']=1;
                               
                                $dataArray['add_date']=strtotime(date('Y-m-d H:i:s'));
                                
                                $dataArray['modify_date']=strtotime(date('Y-m-d H:i:s'));
                                
                                $this->GiftCard->save($dataArray);
                                
                                 $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                    array('pass'=>array('151','1')));
                                 $this->redirect(array('controller'=>'Admins','action'=>'manageNgo'));

                }
        }

       }
    }
      }
    }
    
  
 
  


}
public function editNgoCard(){
  $this->checkUser();
  $this->layout="admin_layout";
  $this->loadModel('GiftCard');
  if(isset($this->params->pass[0])){
      $validate=0;
      $ide=base64_decode($this->params->pass[0]);
        $res=$this->GiftCard->find('first',array('conditions'=>array('id'=>$ide)));
      if($this->request->is('post')){
        $data=$this->data;
        if(empty($data['GiftCard']['title'])){
          $validate++;
          $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                        array('pass'=>array('952','0')));
    }
    
    else if(empty($data['GiftCard']['description'])){
      $validate++;
      $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                    array('pass'=>array('953','0')));
    }
    
    else{
      if($validate=='0'){

         $img_filename = $data['GiftCard']['gngo_image']['name'];
              
              $img_tmpname  = $data['GiftCard']['ngo_image']['tmp_name'];
                   
              if(($img_filename != "") && ($img_tmpname != "")){

                  
                  $explode_file   = explode(".",$img_filename);
                  $countExp       = count($explode_file);
                  $fileExtenstion = $explode_file[$countExp-1];
                   
                  if(($fileExtenstion != 'png') && ($fileExtenstion != 'jpg') && ($fileExtenstion != 'jpeg') &&($fileExtenstion != 'gif')){
                      
                      $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                    array('pass'=>array('611','0')));
                  }else{
                      $final_img = str_replace(".","",str_replace(" ","",date("YmdHis").microtime())).".".$fileExtenstion;    
                         
                          $upload=WWW_ROOT."img/gift_image/".$final_img;
                             
                            if(move_uploaded_file($img_tmpname,$upload)){ 
                                
                                $dataArray['id']=$ide;
                                $dataArray['title']=$data['GiftCard']['title'];
                                $dataArray['description']=$data['GiftCard']['description'];
                                $dataArray['gift_image']=$final_img;
                                $dataArray['card_type_status']=3;
                                $dataArray['status']=1;
                                $dataArray['add_date']=strtotime(date('Y-m-d H:i:s'));
                                
                                $dataArray['modify_date']=strtotime(date('Y-m-d H:i:s'));
                                
                                $this->GiftCard->save($dataArray);
                                unlink(WWW_ROOT."/img/gift_image/".$res['GiftCard']['gift_image']);
                                 $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                    array('pass'=>array('150','1')));
                                 $this->redirect(array('controller'=>'Admins','action'=>'manageNgo'));

                }
        }

       }
       else{
                                $dataArray['id']=$ide;
                                $dataArray['title']=$data['GiftCard']['title'];
                                $dataArray['description']=$data['GiftCard']['description'];
                                //$dataArray['gift_image']=$final_img;
                                $dataArray['card_type_status']=3;
                                $dataArray['status']=1;
                                 
                                $dataArray['add_date']=strtotime(date('Y-m-d H:i:s'));
                                
                                $dataArray['modify_date']=strtotime(date('Y-m-d H:i:s'));
                                
                                $this->GiftCard->save($dataArray);
                                
                                 $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                    array('pass'=>array('150','1')));
                                 $this->redirect(array('controller'=>'Admins','action'=>'manageNgo'));
       }
    }
      }
      }

      $this->set('edit_ngo',$res); 
      

  }
 

}
public function addNgo(){
  $this->checkUser();
  $this->layout="admin_layout";
  $this->loadModel('Ngo');

  if(isset($this->params->pass[0])){
    $gift_card_id=base64_decode($this->params->pass[0]);
   
     if($this->request->is('post')){
      $data=$this->data;

      $check=$this->Ngo->find('first',array('conditions'=>array('ngo_name'=>$data['NgoName']['ngo_name'],'gift_card_id'=>$gift_card_id)));
      if(!empty($check)){
        $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'),
            array('pass'=>array('941','0'))); 
      }
      else{
      $data['Ngo']['gift_card_id']=$gift_card_id;
      $data['Ngo']['ngo_name']=$data['NgoName']['ngo_name']; 
      $data['Ngo']['email']=$data['NgoName']['email']; 
      $data['Ngo']['status']=1;
      $data['Ngo']['add_date']=strtotime(date('Y-m-d H:i:s'));
      $data['Ngo']['modify_date']=strtotime(date('Y-m-d H:i:s'));
      $this->Ngo->save($data);
      $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'),
            array('pass'=>array('116','1')));
      $this->redirect(array('controller'=>'Admins','action'=>'manageNgo'));
     }
   }

  }
}
 public function viewNgo(){ 
  $this->checkUser();
  $this->layout="admin_layout";
  $this->loadModel('Ngo');
  if(!empty($this->params->pass[0])){
    $gift_card_id=base64_decode($this->params->pass[0]);
 
  $res=$this->Ngo->find('all',array('conditions'=>array('gift_card_id'=>$gift_card_id)));
  //print_r($res);die;
    $this->set('all_ngo',$res);
  }
}
public function editNgo(){
  $this->checkUser();
  $this->layout="admin_layout";
  $this->loadModel('Ngo');
  if(!empty($this->params->pass[0])){
    $ngo_id=base64_decode($this->params->pass[0]);
    if($this->request->is('post')){
      $data=$this->data;
      $validate=0;
      if(empty($data['Ngo']['ngo_name'])){
        $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'),
            array('pass'=>array('953','0'))); 
        $validate++;
      }
      else{
        if($validate=='0'){
          $data['Ngo']['id']=$ngo_id;
          $data['Ngo']['modify_date']=strtotime(date('Y-m-d H:i:s'));
          
         $this->Ngo->save($data); 
          $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'),
            array('pass'=>array('153','1')));
          $this->redirect(array('controller'=>'Admins','action'=>'manageNgo'));
        }
      }

  }


    $res=$this->Ngo->find('first',array('conditions'=>array('id'=>$ngo_id)));
    if(!empty($res)){
    
    $this->set('ngo_name',$res);
   }
  }
} 
public function ChangeNgoStatus(){
  if(!empty($this->params->pass[0])){
    $this->checkUser();

    $id=base64_decode($this->params->pass[0]);
    
    $res=$this->Ngo->findById($id);
    
    if($res['Ngo']['status']=='1'){
      $res['Ngo']['status']='2';
      $this->Ngo->save($res);
       $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                      array('pass'=>array('154','1')));
                  $this->redirect(array('controller'=>'Admins','action'=>'viewNgo/'.base64_encode($res['Ngo']['gift_card_id'])));
    }
    else if($res['Ngo']['status']=='2'){
            $res['Ngo']['status']='1';
            $this->Ngo->save($res);
            
             $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                      array('pass'=>array('155','1')));
                 $this->redirect(array('controller'=>'Admins','action'=>'viewNgo/'.base64_encode($res['Ngo']['gift_card_id'])));
    }
  }
}
public function ngoBooking(){
   $this->checkUser();
   $this->layout="admin_layout";
   $res = $this->TransactionHistorie->find('all',array(
            'joins' =>   array(
                            array(
                                'table' => 'bg_gift_cupans',
                                'alias' => 'GiftCupan',
                                'type'  =>  'INNER',
                                'conditions' => array('TransactionHistorie.booking_id = GiftCupan.booking_id','TransactionHistorie.status'=>2),
                                'order'=>array('TransactionHistorie.add_date')
                                ),
                             array(
                                'table' => 'bg_gift_cards',
                                'alias' => 'GiftCard',
                                'type'  =>  'INNER',
                                'conditions' => array('GiftCupan.gift_card_id = GiftCard.id')
                                ),
                              array(
                                'table' => 'bg_ngos',
                                'alias' => 'Ngo',
                                'type'  =>  'INNER',
                                'conditions' => array('GiftCupan.ngo_id = Ngo.id')
                                ),
                                array(
                                'table' => 'bg_gift_card_segments',
                                'alias' => 'GiftCardSegment',
                                'type'  =>  'INNER',
                                'conditions' => array('GiftCupan.gift_card_segement_id = GiftCardSegment.id')
                                ),
                                array(
                                'table' => 'bg_class_segments',
                                'alias' => 'ClassSegment',
                                'type'  =>  'INNER',
                                'conditions' => array('GiftCardSegment.segment_id = ClassSegment.id')
                                ),


                           
                              ),
            
            'fields'    =>array('TransactionHistorie.*','GiftCupan.*','GiftCard.*','Ngo.*','GiftCardSegment.*','ClassSegment.*')
           
            ));

$this->set('ngo_booking',$res);
}
 
        public function ChangeGiftStatus(){
              if(isset($this->params->pass[0])){
                      $this->checkUser();
                      $ide=base64_decode($this->params->pass[0]);

                      $this->loadmodel('GiftCard');
                      
                      

                      $res1=$this->GiftCard->find('first',array('conditions'=>array('id'=>$ide)));
                      //print_r($res1);die;
                      $data1=array();
                    
                          if(!empty($res1)){
                          if($res1['GiftCard']['status']==1){
                              $data1['GiftCard']['status']=2;
                              $data1['GiftCard']['id']=$ide;

                          $this->GiftCard->save($data1);
                              $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                      array('pass'=>array('935','0')));
                  $this->redirect( $this->referer());
                              
                          
                          }else if($res1['GiftCard']['status']==2){
                              $data1['GiftCard']['status']=1;
                              $data1['GiftCard']['id']=$ide;
                          $this->GiftCard->save($data1);
                              $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                      array('pass'=>array('109','1')));
                  $this->redirect( $this->referer());
                              
                          }
                      }
                          
                  }

        } 
public function addGiftSegment(){
  $this->checkUser();
  $this->layout="admin_layout";
  $this->loadModel('GiftCardSegment');
   $this->loadModel('GiftCard');
  if(isset($this->params->pass[0])){
    $gift_card_id=base64_decode($this->params->pass[0]);
    $gift_card_res=$this->GiftCard->find('first',array('conditions'=>array('id'=>$gift_card_id)));
    //print_r($gift_card_res);die;
    $res=$this->ClassSegment->find('all',array('conditions'=>array('status'=>1)));
       if(!empty($res)){
        foreach($res as $result){
          $dataArray[$result['ClassSegment']['id']]=$result['ClassSegment']['segment_name'];

        }
       $this->set('segment_name',$dataArray);
       }
     if($this->request->is('post')){
      $data=$this->data;
      $check=$this->GiftCardSegment->find('first',array('conditions'=>array('segment_id'=>$data['GiftCardSegment']['segment_id'],'gift_card_id'=>$gift_card_id)));
      if(!empty($check)){
        $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'),
            array('pass'=>array('941','0'))); 
      }
      else{
      $data['GiftCardSegment']['gift_card_id']=$gift_card_id;
      $data['GiftCardSegment']['status']=1;
      $data['GiftCardSegment']['add_date']=strtotime(date('Y-m-d H:i:s'));
      $data['GiftCardSegment']['modify_date']=strtotime(date('Y-m-d H:i:s'));
      $this->GiftCardSegment->save($data);
      $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'),
            array('pass'=>array('116','1')));

      if($gift_card_res['GiftCard']['card_type_status']==3){
       $this->redirect(array('controller'=>'Admins','action'=>'manageNgo'));
      }
      else{
      $this->redirect(array('controller'=>'Admins','action'=>'manageGift'));
      }
     }
   }

  }
}
public function viewSegment(){
  $this->checkUser();
  $this->layout="admin_layout";
  $this->loadModel('GiftCardSegment');
  if(!empty($this->params->pass[0])){
    $gift_card_id=base64_decode($this->params->pass[0]);
 
  $res=$this->GiftCardSegment->find('all',array('conditions'=>array('gift_card_id'=>$gift_card_id)));
  if(!empty($res)){
     $i=0;
    foreach($res as $result){
      $segment_name=$this->ClassSegment->find('first',array('conditions'=>array('id'=>$result['GiftCardSegment']['segment_id'])));
      
       $dataArray[$i]=$segment_name['ClassSegment']['segment_name'];
       $i++;
    }
    $this->set('all_segment',$dataArray);
  }
}
} 
public function manageCommunity(){
  $this->checkUser();
  $this->layout="admin_layout";
  $res=$this->Community->find('all');
  $this->set('community',$res);
}
public function CommunityStatus(){
         if(isset($this->params->pass[0])){
            $this->checkUser();
            $ide=base64_decode($this->params->pass[0]);

            $this->loadmodel('Community');
            
            

            $res1=$this->Community->find('first',array('conditions'=>array('id'=>$ide)));
            //print_r($res1);die;
            $data1=array();
          
                if(!empty($res1)){
                if($res1['Community']['status']==1){
                    $data1['Community']['status']=2;
                    $data1['Community']['id']=$ide;
                    
                $this->Community->save($data1);
                    $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
            array('pass'=>array('942','0')));
        $this->redirect( $this->referer());
                    
                
                }else if($res1['Community']['status']==2){
                    $data1['Community']['status']=1;
                    $data1['Community']['id']=$ide;
                $this->Community->save($data1);
                    $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
            array('pass'=>array('117','1')));
        $this->redirect( $this->referer());
                    
                }
            }
                
                
               

                //$this->redirect($this->referer());

            
            
        }

} 
public function editCommunity(){
  $this->checkUser();
  $this->layout="admin_layout";
  if(!empty($this->params->pass[0])){
    $ide=base64_decode($this->params->pass[0]);
    if($this->request->is('post')){
      $data=$this->data;
      $data['Community']['id']=$ide;

      $this->Community->save($data);
      $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
            array('pass'=>array('118','1')));
      $this->redirect(array('controller'=>'Admins','action'=>'manageCommunity'));

    }
    $res=$this->Community->find('first',array('conditions'=>array('id'=>$ide)));
    if(!empty($res)){

      $this->set('community_name',$res['Community']['community_name']);
    }
  }
} 
public function manageGroup(){
        $this->checkUser();
        $this->layout="admin_layout";
        $res=$this->ConnectGroup->query("SELECT *
    FROM bg_connect_groups, bg_class_segments
    WHERE bg_connect_groups.segment_id = bg_class_segments.id order by bg_connect_groups.add_date Desc");
        //print_r($res);die;
        if(!empty($res)){
          $this->set('connect_group',$res);

        }
}
public function editGroup(){
  $this->checkUser();
  $this->layout="admin_layout";
  if(!empty($this->params->pass[0])){
    $validate=0;
    $ide=base64_decode($this->params->pass[0]);
    $res=$this->ConnectGroup->find('first',array('conditions'=>array('id'=>$ide)));
    $this->set('edit_group',$res);
    $res=$this->ClassSegment->find('all',array('conditions'=>array('status'=>1)));
       if(!empty($res)){
        foreach($res as $result){
          $dataArray[$result['ClassSegment']['id']]=$result['ClassSegment']['segment_name'];

        }
       $this->set('segment_name',$dataArray);
       }
      if($this->request->is('post')){
         $data=$this->data;
         if(empty($data['ConnectGroup']['group_name'])){
          $validate++;
          $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                        array('pass'=>array('938','0')));
    }
    
   
    
    else{
      if($validate=='0'){

         $img_filename = $data['ConnectGroup']['group_image']['name'];
              
              $img_tmpname  = $data['ConnectGroup']['group_image']['tmp_name'];
                  
              if(($img_filename != "") && ($img_tmpname != "")){

                  
                  $explode_file   = explode(".",$img_filename);
                  $countExp       = count($explode_file);
                  $fileExtenstion = $explode_file[$countExp-1];
                   
                  if(($fileExtenstion != 'png') && ($fileExtenstion != 'jpg') && ($fileExtenstion != 'jpeg') &&($fileExtenstion != 'gif')){
                      
                      $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                    array('pass'=>array('611','0')));
                  }else{
                      $final_img = str_replace(".","",str_replace(" ","",date("YmdHis").microtime())).".".$fileExtenstion;    
                         
                          $upload=WWW_ROOT."img/group_image/".$final_img;
                             
                            if(move_uploaded_file($img_tmpname,$upload)){ 
                                
                                $dataArray['id']=$ide;
                                $dataArray['group_name']=$data['ConnectGroup']['group_name'];
                                $dataArray['segment_id']=$data['ConnectGroup']['segment_id'];
                                $dataArray['group_image']=$final_img;
                                $dataArray['status']=1;
                                $dataArray['add_date']=strtotime(date('Y-m-d H:i:s'));
                                
                                $dataArray['modify_date']=strtotime(date('Y-m-d H:i:s'));
                                
                                $this->ConnectGroup->save($dataArray);
                                unlink(WWW_ROOT."/img/group_image/".$res['ConnectGroup']['gift_image']);
                                 $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                    array('pass'=>array('119','1')));
                                 $this->redirect(array('controller'=>'Admins','action'=>'manageGroup'));

                }
        }

       }
       else{
                                $dataArray['id']=$ide;
                                $dataArray['group_name']=$data['ConnectGroup']['group_name'];
                                $dataArray['segment_id']=$data['ConnectGroup']['segment_id'];
                                $dataArray['status']=1;
                                $dataArray['add_date']=strtotime(date('Y-m-d H:i:s'));
                                
                                $dataArray['modify_date']=strtotime(date('Y-m-d H:i:s'));
                                
                                $this->ConnectGroup->save($dataArray);
                                
                                 $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                    array('pass'=>array('119','1')));
                                 $this->redirect(array('controller'=>'Admins','action'=>'manageGroup'));
       }
    }
      }

      }
  }
}
public function manageCatalog(){
  $this->checkUser();
  $this->layout="admin_layout";
  $res=$this->RequestCatalog->query('SELECT bg_request_catalogs.*,bg_vendor_classes.class_topic,bg_vendor_classes.class_summary,bg_vendor_classes.upload_class_photo,bg_user_masters.first_name,bg_user_masters.user_type_id,bg_user_masters.institute_name
FROM bg_request_catalogs, bg_vendor_classes, bg_user_masters
WHERE bg_request_catalogs.class_id =bg_vendor_classes.id
AND bg_request_catalogs.vendor_id = bg_user_masters.id');
  //print_r($res);die;
 if(!empty($res)){
  $this->set('show_catalog',$res);
 }
}
public function requestStatus(){
  if(!empty($this->params->pass[0])){
    $dataArray=array();
   $ide=base64_decode($this->params->pass[0]);
   $res=$this->RequestCatalog->find('first',array('conditions'=>array('id'=>$ide)));
  /*===============================Add Messages When Admin Reject Catalog Request===============================*/
   $vendor_class=$this->VendorClasse->find('first',array('conditions'=>array('VendorClasse.id'=>$res['RequestCatalog']['class_id']),'fields'=>array('class_topic')));
   $dataArray['user_id']=$res['RequestCatalog']['vendor_id'];
   $dataArray['message']="Your Request ".$vendor_class['VendorClasse']['class_topic']." For Catalog Class is Rejected By Admin Sorry for Inconvenience";
   $dataArray['status']=0;
   $dataArray['add_date']=strtotime(date('Y-m-d H:i:s'));
   $dataArray['modify_date']=strtotime(date('Y-m-d H:i:s'));
   
   $this->VendorMessage->save($dataArray);
   /*===========================================End===============================================================*/
   /*$res['RequestCatalog']['status']='2';
   $check=$this->AddCatalog->find('all',array('conditions'=>array('catalog_id'=>$ide)));
   if(!empty($check)){
    $check['AddCatalog']['status']=2;
    $this->AddCatalog->save($check);

   }*/
   $status=2;
   $this->AddCatalog->updateAll(array('AddCatalog.status' =>"'$status'"), array('AddCatalog.catalog_id' => $ide));
   $this->RequestCatalog->save($res);
   $vendor_class['VendorClasse']['catalogue_status']=2;
   
   $this->VendorClasse->save($vendor_class);
   $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                    array('pass'=>array('122','1')));
   $this->redirect( $this->referer());
  }
} 
public function addCatalogGroup(){
  $this->checkUser();
  $this->layout="admin_layout";
  $dataArray=array();
  $userArray=array();
  if(!empty($this->params->pass[0])){
    $ide=base64_decode($this->params->pass[0]);
    
    $check=$this->RequestCatalog->find('first',array('conditions'=>array('RequestCatalog.id'=>$ide)));
    
    $vendor_class=$this->VendorClasse->find('first',array('conditions'=>array('VendorClasse.id'=>$check['RequestCatalog']['class_id']),'fields'=>array('id','class_topic')));
    
    $this->set('vendor_title',$vendor_class);
    $strArray=explode(",",$check['RequestCatalog']['group_name']);
      $len=count($strArray);
      for($a=0;$a<$len;$a++){
      $check11=$this->ConnectGroup->find('first',array('conditions'=>array('ConnectGroup.id'=>$strArray[$a])));
      //print_r($check);die;
      $groupArray[$check11['ConnectGroup']['id']]=$check11['ConnectGroup']['group_name'];
      }
    
    $this->set('my_group',$groupArray);
   $res=$this->ConnectGroup->find('all');
  if(!empty($res)){
  
    foreach($res as $result){
      $dataArray[$result['ConnectGroup']['id']]=$result['ConnectGroup']['group_name'];
    }
    
    $dataArray=array_diff($dataArray,$groupArray);
    $this->set('view_group',$dataArray);
  }
  
    
    
   
  
  if($this->request->is('post')){
    $data=$this->data;
   
    $len=count($data['group_id']);
    $str="";
    $str1="";
     
    for($i=0;$i<$len;$i++){

      $group_name=$this->ConnectGroup->find('first',array('conditions'=>array('ConnectGroup.group_name'=>$data['group_id'][$i])));
    if(!empty($group_name)){
    $user['AddCatalog']['catalog_group_id']=$group_name['ConnectGroup']['id'];
    $user['AddCatalog']['catalog_id']=$ide;
    $user['AddCatalog']['class_id']=$check['RequestCatalog']['class_id'];
    $user['AddCatalog']['status']=1;
    $user['AddCatalog']['add_date']=strtotime(date('Y-m-d H:i:s'));
    $user['AddCatalog']['modify_date']=strtotime(date('Y-m-d H:i:s'));
     
    $check123=$this->AddCatalog->find('first',array('conditions'=>array('catalog_group_id'=>$group_name['ConnectGroup']['id'],'catalog_id'=>$ide,'class_id'=>$check['RequestCatalog']['class_id'])));
    
    if(!empty($check123)){
      $check123['AddCatalog']['status']=1;
      $check123['AddCatalog']['modify_date']=strtotime(date('Y-m-d H:i:s'));
      $this->AddCatalog->save($check123);
      
    }
    else{
      $this->AddCatalog->create();
     $this->AddCatalog->save($user);
     
    }
    $str=$str.",".$group_name['ConnectGroup']['id'];
    $str1=$str1.",".$group_name['ConnectGroup']['group_name'];
     }
    }


    $str= ltrim ($str,',');
    $str1= ltrim ($str1,',');
   
    $data['RequestCatalog']['catalogue_group_id']=$str;
    $data['RequestCatalog']['status']=1;
    $data['RequestCatalog']['id']=$ide;
    $data['RequestCatalog']['modify_date']=strtotime(date('Y-m-d H:i:s'));
    
   
    /*===============================Add Messages When Admin Reject Catalog Request===============================*/
   $vendor_class=$this->VendorClasse->find('first',array('conditions'=>array('VendorClasse.id'=>$check['RequestCatalog']['class_id']),'fields'=>array('class_topic')));
   $mobile=$this->UserMaster->find('first',array('conditions'=>array('id'=>$vendor_class['VendorClasse']['user_id'])));
   $mobile_no=$mobile['UserMaster']['mobile'];
   $dataArray['user_id']=$check['RequestCatalog']['vendor_id'];
   $dataArray['message']="Your Request ".$vendor_class['VendorClasse']['class_topic']." For Catalog Class is Approved By Admin In ".$str1." Group";
   $dataArray['status']=0;
   $dataArray['add_date']=strtotime(date('Y-m-d H:i:s'));
   $dataArray['modify_date']=strtotime(date('Y-m-d H:i:s'));
 
   $this->VendorMessage->save($dataArray);
   

   /*===========================================End===============================================================*/
   
     $checkCatalogRequest=$this->RequestCatalog->find('first',array('conditions'=>array('catalogue_group_id'=>$str,'vendor_id'=>$check['RequestCatalog']['vendor_id'],'class_id'=>$check['RequestCatalog']['class_id'])));
     if(!empty($checkCatalogRequest)){
      $checkCatalogRequest['RequestCatalog']['status']=1;
      $this->RequestCatalog->save($checkCatalogRequest);
      $vendor_class['VendorClasse']['catalogue_status']=1;
      $vendor_class['VendorClasse']['id']=$check['RequestCatalog']['class_id'];
      $this->VendorClasse->save($vendor_class);
     }
     else{
     $this->RequestCatalog->save($data);
     $vendor_class['VendorClasse']['id']=$check['RequestCatalog']['class_id'];
     $vendor_class['VendorClasse']['catalogue_status']=1;
     $this->VendorClasse->save($vendor_class);
     }
     $msg='Congratulations,'.$dataArray['message'];
     $this->sendMail('approveRequest',$email,$msg);
     $msg = str_replace(" ","%20",$msg);
     $Url = 'http://193.105.74.159/api/v3/sendsms/plain?user=braingroom&password=3e4IG3WL&sender=BRAING&SMSText='.$msg.'&type=longsms&GSM=91'.$mobile_no;
  
    $this->openurl($Url);
      $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                    array('pass'=>array('121','1')));

    $this->redirect(array('controller'=>'Admins','action'=>'manageCatalog'));
    
    
    //print_r($data);die;
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
public function addGroup(){
  $this->checkUser();
  $this->layout="admin_layout";
  $validate=0;
  if($this->request->is('post')){
    $data=$this->data;

    if(empty($data['ConnectGroup']['group_name'])){
          $validate++;
          $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                        array('pass'=>array('944','0')));
    }
    else if($data['ConnectGroup']['segment_id']=='0'){
          $validate++;
          $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                        array('pass'=>array('945','0')));
    }
    else if(empty($data['ConnectGroup']['group_image']['name'])){
          $validate++;
          $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                        array('pass'=>array('946','0')));
    }
    
   
    
    else{
      if($validate=='0'){

         $img_filename = $data['ConnectGroup']['group_image']['name'];
              
              $img_tmpname  = $data['ConnectGroup']['group_image']['tmp_name'];
                  
              if(($img_filename != "") && ($img_tmpname != "")){

                  
                  $explode_file   = explode(".",$img_filename);
                  $countExp       = count($explode_file);
                  $fileExtenstion = $explode_file[$countExp-1];
                   
                  if(($fileExtenstion != 'png') && ($fileExtenstion != 'jpg') && ($fileExtenstion != 'jpeg') &&($fileExtenstion != 'gif')){
                      
                      $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                    array('pass'=>array('611','0')));
                  }else{
                      $final_img = str_replace(".","",str_replace(" ","",date("YmdHis").microtime())).".".$fileExtenstion;    
                         
                          $upload=WWW_ROOT."img/group_image/".$final_img;
                             
                            if(move_uploaded_file($img_tmpname,$upload)){ 
                                
                                
                                $dataArray['group_name']=$data['ConnectGroup']['group_name'];
                                $dataArray['segment_id']=$data['ConnectGroup']['segment_id'];
                                $dataArray['group_image']=$final_img;
                                $dataArray['status']=1;
                                $dataArray['add_date']=strtotime(date('Y-m-d H:i:s'));
                                
                                $dataArray['modify_date']=strtotime(date('Y-m-d H:i:s'));
                                
                                $this->ConnectGroup->save($dataArray);
                                
                                 $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                    array('pass'=>array('120','1')));
                                 $this->redirect(array('controller'=>'Admins','action'=>'manageGroup'));

                  }
            }

          }
      }
    }
  }
  $res=$this->ClassSegment->find('all',array('conditions'=>array('status'=>1)));
       if(!empty($res)){
        $dataArray[0]="Select";
        foreach($res as $result){
          $dataArray[$result['ClassSegment']['id']]=$result['ClassSegment']['segment_name'];

        }
       $this->set('segment_name',$dataArray);
       }
} 
public function groupStatus(){
  if(!empty($this->params->pass[0])){
    $ide=base64_decode($this->params->pass[0]);
    $res1=$this->ConnectGroup->find('first',array('conditions'=>array('id'=>$ide)));
            //print_r($res1);die;
            $data1=array();
          
                if(!empty($res1)){
                if($res1['ConnectGroup']['status']==1){
                    $data1['ConnectGroup']['status']=2;
                    $data1['ConnectGroup']['id']=$ide;
                    
                $this->ConnectGroup->save($data1);
                    $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
            array('pass'=>array('943','0')));
        $this->redirect( $this->referer());
                    
                
                }else if($res1['ConnectGroup']['status']==2){
                    $data1['ConnectGroup']['status']=1;
                    $data1['ConnectGroup']['id']=$ide;
                $this->ConnectGroup->save($data1);
                    $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
            array('pass'=>array('118','1')));
        $this->redirect( $this->referer());
                    
                }
            }
  }
} 
public function manageClass(){
   $this->checkUser();
   $this->layout="admin_layout";
   $class = $this->VendorClasse->find('all',array(
                              'joins'  =>  array(
                                              array(
                                                  'table' => 'bg_vendor_classe_level_details',
                                                  'alias' => 'ClassLevel',
                                                  'conditions' => array('VendorClasse.id = ClassLevel.vendor_class_id',
                                                                        'VendorClasse.level_id=ClassLevel.level_id'),
                                                  ),
                                             ),
                            'conditions'=>array('VendorClasse.status'=>1),
                            'group'=>array('VendorClasse.id'),
                            'fields'  => array('VendorClasse.*','ClassLevel.*'),
                            ));
  
   //$class = $this->VendorClasse->find('all');
      if(!empty($class)){
        $l=0;
       foreach($class as $res){
      $class_by=$this->UserMaster->find('first',array('conditions'=>array('id'=>$res['VendorClasse']['user_id'])));
      if($class_by['UserMaster']['vendor_type_id']=='1'){
        $class[$l]['VendorClasse']['class_by']=$class_by['UserMaster']['institute_name'];
      }
      else{
       $class[$l]['VendorClasse']['class_by']=$class_by['UserMaster']['first_name'];
       
      }
      $l++;
      }
   
      $this->set('view_class',$class);
     }

}
 public function ClassStatus(){
   $this->checkUser();
   $this->autoRender=false;
   $ide=base64_decode($this->params->pass[0]);
   $res=$this->VendorClasse->find('first',array('conditions'=>array('VendorClasse.id'=>$ide)));
   if(!empty($res)){
    if($res['VendorClasse']['status']==1){
      $res['VendorClasse']['status']=2;
      $this->VendorClasse->save($res);
      $this->requestAction(array('controller'=>'Cpanels','action'=>'generateMessages'),array('pass'=>array('159','1')));
      $this->redirect($this->referer());
    }
     if($res['VendorClasse']['status']==2){
      $res['VendorClasse']['status']=1;
      $this->VendorClasse->save($res);
      $this->requestAction(array('controller'=>'Cpanels','action'=>'generateMessages'),array('pass'=>array('158','1')));
      $this->redirect($this->referer());
    }
   }
}
public function viewClass(){
   $this->checkUser();
   $this->layout="admin_layout";
   if(!empty($this->params->pass[0])){
    $ide=base64_decode($this->params->pass[0]);
    
   
    $class = $this->VendorClasse->query("SELECT * FROM  bg_vendor_classes where bg_vendor_classes.id='".$ide."'");
    //print_r($class);die;
    $this->set('view_class',$class);
    $class_session = $this->VendorClasse->query("SELECT bg_class_schedules.* FROM  bg_vendor_classes,bg_class_schedules where bg_vendor_classes.id=bg_class_schedules.class_id and bg_vendor_classes.id='".$ide."'");
    $str_date="";
    $str_time="";
    
    if(!empty($class_session)){
      foreach($class_session as $res){
        $str_date=$str_date.",".$res['bg_class_schedules']['session_date'];
        $str_time=$str_time.",".$res['bg_class_schedules']['session_time'];
      }
      $str_date = substr($str_date, 1);
      $str_time = substr($str_time, 1);
     $this->set(compact('str_date','str_time'));
    }
    

 }
}
public function manageFeaturedClass(){
  $this->checkUser();
  $this->layout="admin_layout";

  $res=$this->FeaturedPrice->find('all',array('conditions'=>array('status'=>1)));
  if(!empty($res)){
    $this->set('view_featured',$res);
  }
}
public function editFeaturedPrice(){
   $this->checkUser();
   $this->layout="admin_layout";
  if(!empty($this->params->pass[0])){
    $ide=base64_decode($this->params->pass[0]);
    if($this->request->is('post')){
      $data=$this->data;
      $data['FeaturedPrice']['id']=$ide;
      $this->FeaturedPrice->save($data);
      $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'),
      array('pass'=>array('123','1')));
      $this->redirect(array('controller'=>'Admins','action'=>'manageFeaturedClass'));
    }
    $res=$this->FeaturedPrice->find('first',array('conditions'=>array('id'=>$ide)));
    //print_r($res);die;
    $this->set('edit_featured',$res);
  }
} 
public function ChangePassword(){
    $this->checkUser();
    $this->layout="admin_layout";
    $id=$this->Session->read('Admin');

    $validate=0;
    if($this->request->is('post')){
        $data=$this->data;
       if(empty($data['ChangePassword']['password'])){
        $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'),
            array('pass'=>array('101','0')));
        $validate++;         
       }
       else if(empty($data['ChangePassword']['new_password'])){
        $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'),
            array('pass'=>array('102','0')));
        $validate++;         
       }
       else if(empty($data['ChangePassword']['confirm_password'])){
        $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'),
            array('pass'=>array('103','0')));
        $validate++;         
       }
       
       else{
        if($validate=='0'){
            $res=$this->Admin->find('first',array('conditions'=>array('id'=>$id,'password'=>md5($data['ChangePassword']['password']))));
            if(empty($res)){

                $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'),
            array('pass'=>array('106','0')));
                
            }
            else{
                if($data['ChangePassword']['new_password']!=$data['ChangePassword']['confirm_password']){
                    $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'),
                    array('pass'=>array('104','0')));  
                 }
                 else{
                    $dataArray['password']=md5($data['ChangePassword']['new_password']);
                    $dataArray['id']=$res['Admin']['id'];
                    
                    $this->Admin->save($dataArray);
                    $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'),
                    array('pass'=>array('126','1')));
                   $this->redirect($this->referer());
                }
            }
        }        

    }
  }
}

  public function logout(){
    $this->autoRender = false;
    $this->Session->delete('Admin');
    $this->redirect(array('controller'=>'Admins','action'=>'login'));
    
  }

  /*  akash 26 aus 16*/

    public function manageActivityRequest(){
    $this->checkUser();
    $this->layout="admin_layout";
    $data1 = $this->GroupActivity->find('all');
    $data = $this->GroupActivity->find('all',array(
                              'joins'  =>  array(
                                              array(
                                                  'table' => 'bg_user_masters',
                                                  'alias' => 'usermaster',
                                                  'conditions' => array('GroupActivity.user_id = usermaster.id',
                                                                        'usermaster.status'=>1),
                                                  ),
                                               array(
                                                  'table' => 'bg_connect_groups',
                                                  'alias' => 'conntgrp',
                                                  'conditions' => array('GroupActivity.Group_id = conntgrp.id',
                                                                        'conntgrp.status'=>1)) 
                                                  ),
                            'conditions'=>array('GroupActivity.status !='=>2),
                            'fields'  => array('GroupActivity.*','conntgrp.*','usermaster.*'),
                            ));
   
   if(!empty($data)){

    $this->set('data',$data);

   }
 }

  public function activityRequestaccept(){
      if(!empty($this->params['pass'][0])){
         $dataArray['id']=base64_decode($this->params->pass[0]);
         $dataArray['status']=1;
         $this->GroupActivity->save($dataArray);

         $activity_data = $this->GroupActivity->find('first',array(
                                                      'joins'  =>  array(
                                                                      array(
                                                                          'table' => 'bg_user_masters',
                                                                          'alias' => 'usermaster',
                                                                          'conditions' => array('GroupActivity.user_id = usermaster.id',
                                                                                                'usermaster.status'=>1),
                                                                          ),
                                                                       array(
                                                                          'table' => 'bg_connect_groups',
                                                                          'alias' => 'conntgrp',
                                                                          'conditions' => array('GroupActivity.Group_id = conntgrp.id',
                                                                                                'conntgrp.status'=>1)) 
                                                                          ),
                                                    'conditions'=>array('GroupActivity.id'=>base64_decode($this->params->pass[0]),
                                                                        'GroupActivity.status' => 1),
                                                    'fields'  => array('GroupActivity.*','conntgrp.*','usermaster.*'),
                                                    ));

          if($activity_data['GroupActivity']['post_type'] == 1){

            $vendor_data = $this->VendorClasse->find('all', array('joins'  => array(
                                                                                  array(
                                                                                      'table' => 'bg_user_masters',
                                                                                      'alias' => 'usrmaster',
                                                                                      'conditions' => array('VendorClasse.user_id = usrmaster.id',
                                                                                                            'usrmaster.id !='=>$activity_data['GroupActivity']['user_id']),
                                                                                      )),
                                                                               'conditions' => array('VendorClasse.segment_id'=>$activity_data['conntgrp']['segment_id'],
                                                                                                      'VendorClasse.status'=>1),
                                                                               'fields' =>  array('VendorClasse.*','usrmaster.*')));
            foreach ($vendor_data as $ids) {
                 $msg_data = array();
                 $msg_data['activity_id'] = base64_decode($this->params->pass[0]);
                 $msg_data['user_id']     =  $ids['usrmaster']['id'];
                 $msg_data['message']     = 'Hii '.$ids['usrmaster']['first_name'].'. New activity  '.$activity_data['GroupActivity']['request_purpose'].' has been post by '.$activity_data['usermaster']['first_name'].'';
                 $msg_data['status']      =  1;
                 $msg_data['add_date']    = time();
                 $msg_data['modify_date'] = time();
                 $this->GroupActivityMessge->create();
                 $this->GroupActivityMessge->save($msg_data); 
            }
            
          }else{
            $user_ids = $this->UserMaster->find('all',array('conditions'=>array(
                                                          'UserMaster.id !=' => $activity_data['GroupActivity']['user_id'],
                                                          'UserMaster.status' => 1)));
            foreach ($user_ids as $ids) {
                 $msg_data = array();
                 $msg_data['activity_id'] = base64_decode($this->params->pass[0]);
                 $msg_data['user_id']     =  $ids['UserMaster']['id'];
                 $msg_data['message']     = 'Hii '.$ids['UserMaster']['first_name'].'. New activity  '.$activity_data['GroupActivity']['request_purpose'].' has been post by '.$activity_data['usermaster']['first_name'].'';
                 $msg_data['status']      =  1;
                 $msg_data['add_date']    = time();
                 $msg_data['modify_date'] = time();
                 $this->GroupActivityMessge->create();
                 $this->GroupActivityMessge->save($msg_data); 
            }
          }
          $this->redirect(array('controller'=>'Admins','action'=>'manageActivityRequest'));
         }else{
          $this->redirect(array('controller'=>'Admins','action'=>'manageActivityRequest'));
        } 
    }

  public function activityRequestrejected(){
       
      if(!empty($this->params['pass'][0])){
         $dataArray['id']=base64_decode($this->params->pass[0]);
         $dataArray['status']=2;
         $dataArray['modify_date']=time();
         $this->GroupActivity->save($dataArray);
         $activity_data = $this->GroupActivity->find('first',array(
                                            'joins'  =>  array(
                                                            array(
                                                                'table' => 'bg_user_masters',
                                                                'alias' => 'usermaster',
                                                                'conditions' => array('GroupActivity.user_id = usermaster.id',
                                                                                      'usermaster.status'=>1),
                                                                ),
                                                             array(
                                                                'table' => 'bg_connect_groups',
                                                                'alias' => 'conntgrp',
                                                                'conditions' => array('GroupActivity.Group_id = conntgrp.id',
                                                                                      'conntgrp.status'=>1)) 
                                                                ),
                                          'conditions'=>array('GroupActivity.id'=> base64_decode($this->params->pass[0])),
                                          'fields'  => array('GroupActivity.*','conntgrp.*','usermaster.*'),
                                        ));
         $msg_data = array();
         $msg_data['activity_id'] = base64_decode($this->params->pass[0]);
         $msg_data['user_id']     = $activity_data['GroupActivity']['user_id'];
         $msg_data['message']     = 'Hii '.$activity_data['usermaster']['first_name'].' Your activity '.$activity_data['GroupActivity']['request_purpose'].' has not been approved by admin.';
         $msg_data['status']      =  1;
         $msg_data['add_date']    = time();
         $msg_data['modify_date'] = time();
         $this->GroupActivityMessge->save($msg_data); 

         $this->redirect(array('controller'=>'Admins','action'=>'manageActivityRequest')); 
      }else{
        $this->redirect(array('controller'=>'Admins','action'=>'manageActivityRequest'));
      } 
   }

   public function manageBlogRequest(){
    $this->checkUser();
    $this->layout="admin_layout";
    $status_id = "0,1";

   // $data1 = $this->Blog->find('all',array('conditions' => array('Blog.status !=' => 2)));

    $data = $this->Blog->find('all',array(
                                      'joins'  =>  array(
                                                      array(
                                                          'table' => 'bg_user_masters',
                                                          'alias' => 'usermaster',
                                                          'conditions' => array('Blog.user_id = usermaster.id',
                                                                                'usermaster.status'=>1),
                                                          ),
                                                      array(
                                                            'table' => 'bg_class_segments',
                                                            'alias' => 'classgmt',
                                                            'conditions' => array('Blog.segment_id = classgmt.id',
                                                                                  'classgmt.status'=>1))
                                                       ),
            'conditions' => array('Blog.status !=' => 2),
            'fields'    => array('Blog.*','usermaster.*','classgmt.*'),
          )
        );

    if(!empty($data)){
      $this->set('data',$data);
    }
 }
 
 public function blogRequestaccept(){
      if(!empty($this->params['pass'][0])){
         $dataArray['id']=base64_decode($this->params->pass[0]);
         $dataArray['status']=1;
         $this->Blog->save($dataArray);
          

          $this->redirect(array('controller'=>'Admins','action'=>'manageBlogRequest'));
         }else{
          $this->redirect(array('controller'=>'Admins','action'=>'manageBlogRequest'));
        } 
    }

  public function blogRequestrejected(){
       
      if(!empty($this->params['pass'][0])){
         $dataArray['id']=base64_decode($this->params->pass[0]);
         $dataArray['status']=2;
         $dataArray['modify_date']=time();
         $this->Blog->save($dataArray);
       
         $this->redirect(array('controller'=>'Admins','action'=>'manageBlogRequest')); 
      }else{
        $this->redirect(array('controller'=>'Admins','action'=>'manageBlogRequest'));
      } 
   }
  

public function sendMail($mailFor, $mail= NULL, $activationCode=NULL){
        
			switch($mailFor){
				
				
				 case 'catalogue_approve':                
                $sendgrid = new SendGrid('madhulas','thirdeye123');
                $email     = new SendGrid\Email();
                $email->addTo($mail)->addTo('')->setFrom('support@braingroom.com')->setSubject('Book Class Status')->setText('!')->setHtml('
                <html>
                    <head><title></title></head>
                    <body>
                        <div style="border-radius: 6px;background-color: rgba(255,255,255,0.3);padding: 10px;width: 81%;margin-left:20px;">
                        <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
                        <p>
                            <span style="font-size:20px;font-weight:bold;color:#6397cb;line-height:110%">Hi, <br> <br> Class has been booked. </span><br>
                                <span style="font-size:14px;color:#666666;font-style:italic"></span>
                            </p>
                            <p>Class information is.</p>'.$activationCode.'<p></p>
                            <hr style="border:0;border-top:1px solid #d7d7d7;min-height:0">
                            <p>If you have any problems, or believe you have received this in error, please contact us.</p>
                            <p></p>
                            <p>BRAINGROOM</p>
                            <span style="font-size:11px;color:#8a8a8a;line-height:100%">Copyright © 2014 braingroom.com All rights reserved.</span>
                        </div>        
                    </body>
                </html>');
                $sendgrid->send($email);
                break ;
                case 'approveRequest':                
                $sendgrid = new SendGrid('madhulas','thirdeye123');
                $email     = new SendGrid\Email();
                $email->addTo($mail)->addTo('')->setFrom('support@braingroom.com')->setSubject('Add Catalog Request')->setText('!')->setHtml('
                <html>
                    <head><title></title></head>
                    <body>
                        <div style="border-radius: 6px;background-color: rgba(255,255,255,0.3);padding: 10px;width: 81%;margin-left:20px;">
                        <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
                        <p>'.$activationCode.'</p>
                            <hr style="border:0;border-top:1px solid #d7d7d7;min-height:0">
                            <p>If you have any problems, or believe you have received this in error, please contact us.</p>
                            <p></p>
                            <p>BRAINGROOM</p>
                            <span style="font-size:11px;color:#8a8a8a;line-height:100%">Copyright © 2014 braingroom.com All rights reserved.</span>
                        </div>        
                    </body>
                </html>');
                $sendgrid->send($email);
                break ;
			}
		}
public function upload_csv_classes(){

   $this->checkUser();
   $this->layout="admin_layout";

   if($this->request->is('post')){
      $data= $this->request->data;
      $file= $data['VendorClass']['csv_class'];
      $ext = substr(strtolower(strrchr($file['name'], '.')), 1); //get the extension
      $arr_ext = array('xls', 'xlsx','csv');
      if(!in_array($ext, $arr_ext)){
         $this->Session->setFlash('Invalid File');
         $this->redirect(array('action'=>'upload_csv_classes'));
      }

      if (!file_exists(WWW_ROOT.'uploads/csv')) {
          mkdir(WWW_ROOT.'uploads/csv', 0777, true);
      }

      $filename= time().$file['name'];
      $pathfilename =  WWW_ROOT."uploads/csv/".$filename;
      if(move_uploaded_file($file['tmp_name'], $pathfilename)){
         if(in_array($ext, array('xls','xlsx'))){
            require_once VENDORS .'/PHPExcel/Classes/PHPExcel.php';
            $excelFile = $pathfilename;
            $pathInfo = pathinfo($excelFile);
            $type = $pathInfo['extension'] == 'xlsx' ? 'Excel2007' : 'Excel5';

            $objReader = PHPExcel_IOFactory::createReader($type);
            $objPHPExcel = $objReader->load($excelFile);

            foreach($objPHPExcel->getWorksheetIterator() as $worksheet) {
                $worksheets[] = $worksheet->toArray();
            }

            $worksheets=$worksheets[0];
            

         }else if($ext=='csv'){
             $worksfile = fopen($pathfilename,"r"); 
             while(!feof($worksfile)){
                  $worksheets[]= fgetcsv($worksfile);
             }
             fclose($worksfile);
         }
         
         //echo "<pre>";
         //print_r($latlong);
         //exit;

         //  save data

         foreach($worksheets as $sheet){
         	 // get image upload
             $isImage= $this->VendorGalleries->field('media_path',array('VendorGalleries.user_id'=>$sheet[0],'VendorGalleries.media_title'=>'My Image'));

            if($isImage){
               $img_upload= $isImage;
            }else{
               $class_topic= $sheet[3];
               // search file in folder
               if(file_exists(WWW_ROOT."img/Vendor/class_image")){
               	   $isImage = scandir(WWW_ROOT."img/Vendor/class_image/".$class_topic, 1);
	               if(is_array($isImage) && count($isImage) >0){
	                  $img_upload= $isImage[0];
	               }else{
	                  $img_upload= 'defult_pic.png';
	               }
               }
               



            }

            // get vedio upload
            $isVideo= $this->VendorGalleries->field('media_path',array('VendorGalleries.user_id'=>$sheet[0],'VendorGalleries.media_title'=>'My Video'));
            if($isVideo){
               $vid_upload= $isVideo;
            }else{
              $vid_upload= 'default';
            }

            $data= array();
                $data['VendorClasse']['user_id']= $sheet[0];
                $data['VendorClasse']['category_id']= $sheet[1];
                $data['VendorClasse']['segment_id']= $sheet[2];
                $data['VendorClasse']['class_topic']= $sheet[3];
                $data['VendorClasse']['class_summary']= $sheet[4];
                $data['VendorClasse']['about_academy']= $sheet[5];

                $data['VendorClasse']['about_class']= $sheet[6];
                $data['VendorClasse']['class_timing_id']= $sheet[7];
                $data['VendorClasse']['recurring_class_id']= $sheet[8];
                $data['VendorClasse']['no_of_session']= $sheet[9];
                $data['VendorClasse']['starting_month']= $sheet[10];
                $data['VendorClasse']['end_month']= $sheet[11];

                $data['VendorClasse']['day_of_week']= $sheet[12];
                $data['VendorClasse']['time_of_day']= $sheet[13];
                $data['VendorClasse']['class_date']= $sheet[14];
                $data['VendorClasse']['class_duration']= $sheet[15];
                $data['VendorClasse']['class_type_id']= $sheet[16];
                $data['VendorClasse']['location']= $sheet[17];

                $data['VendorClasse']['latitude']= $sheet[18];
                $data['VendorClasse']['longitude']= $sheet[19];
                $data['VendorClasse']['age_group']= $sheet[20];
                $data['VendorClasse']['age_from']= $sheet[21];
                $data['VendorClasse']['age_to']= $sheet[22];
                $data['VendorClasse']['class_provider_id']= $sheet[23];

                $data['VendorClasse']['community_id']= $sheet[24];
                $data['VendorClasse']['total_ticket']= $sheet[25];
                $data['VendorClasse']['max_ticket_available']= $sheet[26];
                $data['VendorClasse']['price_per_head']= $sheet[27];
                $data['VendorClasse']['class_tag']= $sheet[28];
                $data['VendorClasse']['status']= $sheet[29];

                $data['VendorClasse']['upload_ppt_name']= $sheet[30];
                
                // get upload video link
                //$data['VendorClasse']['upload_video_name']= $sheet[31];
                $data['VendorClasse']['upload_video_name']=$vid_upload;

                $data['VendorClasse']['upload_tutor_picture']= $sheet[32];

                //$data['VendorClasse']['upload_class_photo']= $sheet[33];
                $data['VendorClasse']['upload_class_photo']= $img_upload;

                $data['VendorClasse']['trending_status']= $sheet[34];
                $data['VendorClasse']['featured_status']= $sheet[35];

                $data['VendorClasse']['recommended_status']= $sheet[36];
                $data['VendorClasse']['catalogue_status']= $sheet[37];
                $data['VendorClasse']['add_date']= $sheet[38];
                $data['VendorClasse']['modify_date']= $sheet[39];
                $data['VendorClasse']['locality_id']= $sheet[40];
                $data['VendorClasse']['city']= $sheet[41];

                $data['VendorClasse']['region']= $sheet[42];
                $data['VendorClasse']['view_count']= $sheet[43];
                $data['VendorClasse']['age_category']= $sheet[44];
                $data['VendorClasse']['group_id']= $sheet[45];
                $data['VendorClasse']['is_type']= $sheet[46];
                $data['VendorClasse']['class_nature']= ($sheet[47]) ? $sheet[47] : 0;
                $data['VendorClasse']['min_ticket_available']= $sheet[48];
                // new field LEVEL_DETAIL & LOCATION DETAIL
                
                //echo "<pre>";
                //print_r($data);
                //exit;

                // check field
               
                if((!empty($data['VendorClasse']['user_id'])) && (!empty($data['VendorClasse']['class_summary'])) && (!empty($data['VendorClasse']['class_topic']))){
                    
                  //echo "<pre>";
                  //print_r($data);
                	//echo "hello";
                	//exit;

                   $this->VendorClasse->create();
  	               if($this->VendorClasse->save($data)){
  	                  // do insert in bg_vendor_classe_level_detail 
                      $vendor_class_id=$this->VendorClasse->getLastInsertId();
                      
                      $level_datas= json_decode($sheet[49]);
                      foreach($level_datas as $level_data){
                          $lavel_arr= array();
                          $lavel_arr['VendorClasseLevelDetail']['vendor_class_id']=$vendor_class_id;
                          $lavel_arr['VendorClasseLevelDetail']['level_id']=$level_data->level_id;
                          $lavel_arr['VendorClasseLevelDetail']['expert_level_id']=$level_data->expert_level_id;
                          $lavel_arr['VendorClasseLevelDetail']['expert_level_id']=$level_data->expert_level_id;
                          $lavel_arr['VendorClasseLevelDetail']['price']=$level_data->price;
                          $lavel_arr['VendorClasseLevelDetail']['Description']=$level_data->Description;
                          $this->VendorClasseLevelDetail->create();
                          $this->VendorClasseLevelDetail->save($lavel_arr);
                      }
                      
                      
                      // insert in bg_vendor_classe_location_detail
                      $location_datas= json_decode($sheet[50]);
                      foreach($location_datas as $location_data){
                         $location_arr= array();
                         $location_arr['VendorClasseLocationDetail']['vendor_class_id']=$vendor_class_id;
                         $location_arr['VendorClasseLocationDetail']['location']=$location_data->location;
                         $location_arr['VendorClasseLocationDetail']['locality_id']=$location_data->locality_id;
                         $location_arr['VendorClasseLocationDetail']['latitude']=$location_data->latitude;
                         $location_arr['VendorClasseLocationDetail']['longitude']=$location_data->longitude;
                         
                         $this->VendorClasseLocationDetail->create();
                         $this->VendorClasseLocationDetail->save($location_arr);

                      }
                      

  	               }else{
  	                  $this->Session->setFlash('Error please try again');
  	                  $this->redirect(array('action'=>'upload_csv_classes'));
  	               }

              }else{
              	  
              	  
              	  $msg[]= "Some rows could not be inserted properly";
                  
              }
         


         } // foreach end
          
         if(is_array($msg) && count($msg)>1){
         	$succmsg= 'File has been uploaded sucessfully.'.count($msg).' rows could not be uploaded';
         }else{
         	$succmsg= 'File has been uploaded sucessfully.';
         } 
         
         $this->Session->setFlash($succmsg);
         $this->redirect(array('action'=>'upload_csv_classes'));
          

      }

   }
}

  /* end */
  // manage User Post by admin
	
  public function manageUserPostRequest(){
    $this->checkUser();
    $this->layout="admin_layout";
    $status_id = "0,1";
    
    $data = $this->Post->find('all',array(
                                      'joins'  =>  array(
                                                      array(
                                                          'table' => 'bg_user_masters',
                                                          'alias' => 'usermaster',
                                                          'conditions' => array('Post.user_id = usermaster.id'),
                                                          ),
                                                      array(
                                                            'table' => 'bg_class_segments',
                                                            'alias' => 'classgmt',
                                                            'conditions' => array('Post.segment_id = classgmt.id',
                                                                                  'classgmt.status'=>1))
                                                       ),
            'conditions' => array('Post.status !=' => 2),
            'fields'    => array('Post.*','usermaster.*','classgmt.*'),
          )
    );

    if(!empty($data)){
      $this->set('data',$data);
    }
  }


  public function userPostRequestaccept(){
      if(!empty($this->params['pass'][0])){
         $dataArray['id']=base64_decode($this->params->pass[0]);
         $dataArray['status']=1;
         $this->Post->save($dataArray);
          

          $this->redirect(array('controller'=>'Admins','action'=>'manageUserPostRequest'));
         }else{
          $this->redirect(array('controller'=>'Admins','action'=>'manageUserPostRequest'));
        } 
  }


  public function userPostRequestrejected(){
       
      if(!empty($this->params['pass'][0])){
         $dataArray['id']=base64_decode($this->params->pass[0]);
         $dataArray['status']=2;
         $dataArray['modify_date']=time();
         $this->Post->save($dataArray);
       
         $this->redirect(array('controller'=>'Admins','action'=>'manageUserPostRequest')); 
      }else{
        $this->redirect(array('controller'=>'Admins','action'=>'manageUserPostRequest'));
      } 
  }

  
    

}

?>
