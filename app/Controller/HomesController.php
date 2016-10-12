<?php
class HomesController extends AppController {
//{
/*var $uses = array('Admin','UserMaster','City','Locality','FeaturedPrice','Category','Community','UserVerfication','ClassType','ClassSegment','VendorClasse','ClassRegular',
'ClassSchedule','VendorGalleries','TransactionHistorie','Cookie', 'PromoteClassDetail','Wishlist','ConnectGroup','CupanDetail','GiftCupan','GiftCard','GiftCardSegment','Ngo');*/

   var $uses = array('Admin','UserMaster','City','Locality','Category','Community','UserVerfication','ClassType','ClassSegment','VendorClasse','ClassRegular','ClassLrregular','ClassSchedule','VendorGalleries',
'TransactionHistorie','AccountDetail','RequestCatalog','CupanDetail','GiftCupan','GiftCard','GiftCardSegment','FeaturedPrice','PromoteClassDetail','Blog','BlogComment','BlogLike','UserSegment','ConnectGroup','Wishlist','Ngo','ChatMessage','GetQuote','Communitie','CustomerReview');
  
   var $components = array('Paginator','Messages','Session');

	public function beforeFilter() {
    	parent::beforeFilter();
		  $this->response->disableCache();
	}
	public function cat_segments(){
			$this->loadModel('Category');
			$result = $this->Category->find('all' , array(
				'contain' => array(
					'ClassSegment'
				)
			));
			return $result;
		}
    public function saveAccount(){

        $this->autoRender=false;
        $this->checkUser();
        $user = $this->Session->read('User');
        //print_r($user);
        //die;
         $u_id = $user['UserMaster']['id'];
         $this->request->data['vender_id']= $u_id;
         $this->AccountDetail->save($this->request->data);
         echo 1;
          }
    public function paymentAccount(){

          $this->checkUser();
          $user=$this->Session->read('User');
          $user=$this->UserMaster->find('first',array('conditions'=>array('email'=>$user['UserMaster']['email'])));
          $this->layout='vendor_layout';
          $this->set('user_view',$user);
          $u_id = $user['UserMaster']['id'];

          $ac_detail = $this->AccountDetail->find('first',array('conditions'=>array('AccountDetail.vender_id'=>$u_id)));
          /*echo "<pre>";
          print_r($ac_detail);*/
          $this->set('account_detail',$ac_detail);
        
   }
public function Attendence(){
 require ('sendgrid-php/vendor/autoload.php');
 require ('sendgrid-php/lib/SendGrid.php'); 
  $this->autoRender=false;
  $this->loadModel('Ticket');
  if(!empty($_POST)){

    $start_code=$_POST['start_code'];
    $end_code=$_POST['end_code'];
    $user_id=$_POST['user_id'];
    $class_id=$_POST['class_id'];
    if(($start_code!='')&&($end_code=='')){
    $check=$this->Ticket->find('first',array('conditions'=>array('Ticket.user_id'=>$user_id,
      'Ticket.vendor_classe_id'=>$class_id,'Ticket.start_code'=>$start_code)));
    if(!empty($check)){
    
      $check['Ticket']['start_status']=1;
      $check['Ticket']['start_code_date']=date('Y-m-d h:i:s A');
      $this->Ticket->save($check);

       echo "1";die;//Start Code Updated Class Started; 
    }
    else{
      echo "2";die;//Invalid Start Code;
    }
  }
  else{
    
   $check=$this->Ticket->find('first',array('conditions'=>array('Ticket.user_id'=>$user_id,
      'Ticket.vendor_classe_id'=>$class_id,'Ticket.start_code'=>$start_code,'Ticket.end_code'=>$end_code))); 
   $user_email=$this->UserMaster->find('first',array('conditions'=>array('id'=>$user_id)));
   $email=$user_email['UserMaster']['email'];
   $mobile=$user_email['UserMaster']['mobile'];
    $link=HTTP_ROOT.'/homes/customerReviewForm/'.base64_encode($user_id).'/'.base64_encode($class_id);
      
   $msg='Hello%20'.$user_email['UserMaster']['first_name'].'%20Your%20Class%20Has%20been%20Completed%20Successfully%20Please%20click%20on%20this%20link%20for%20Review%20%20:'.$link;
     
  if(!empty($check)){
     $check['Ticket']['end_status']=1;
      $check['Ticket']['end_code_date']=date('Y-m-d h:i:s A');
      $this->Ticket->save($check);
     $this->sendMail('review',$email,$link);
        
                    $Url = 'http://193.105.74.159/api/v3/sendsms/plain?user=braingroom&password=3e4IG3WL&sender=BRAING&SMSText='.$msg.'&type=longsms&GSM=91'.$mobile;
                    $ch = curl_init();
                    // Set URL to download
                    curl_setopt($ch, CURLOPT_URL, $Url);
                 
                    // Set a referer
                    // curl_setopt($ch, CURLOPT_REFERER, "'http://bulksms.mysmsmantra.com:8080/WebSMS/SMSAPI.jsp?username=gurpreet&password=1627184459&sendername=NETSMS&mobileno='.$mobile_no.'&message='.$otp");
                 
                    // User agent
                    curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
                 
                    // Include header in result? (0 = yes, 1 = no)
                    curl_setopt($ch, CURLOPT_HEADER, 0);
                 
                    // Should cURL return or print out the data? (true = return, false = print)
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                 
                    // Timeout in seconds
                    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
                  
                    // Download the given URL, and return output
                    $output = curl_exec($ch);
                   
                    // Close the cURL resource, and free system resources
                    curl_close($ch);
      return '3';//Start Code,End Code Updated Class Ended; 
    }
    else{
      return 4;//Invalid EndCode;
    }
  }
    
}
}

    public function checkUser(){
		 // print_r($this->Session->read('User'));die;
      if(!$this->Session->check('User')){

        $this->redirect(array('controller'=>'Homes','action'=>'login'));

      }

    }

    public function index() {
			ini_set('memory_limit', '1024M');
      $this->layout='index_layout';
      $loggedinuser = $this->Session->read('User');
    if(!empty($loggedinuser)){
      $this->set('user_view',$$loggedinuser);
      }

      $user_id = $loggedinuser['UserMaster']['id'];
      $user = $this->UserMaster->find('all', array('conditions'=>array('id'=>$user_id)));
      $this->set('user_view',$user);
     if($this->request->is('post')){
         $lat=$this->params->pass[0];
         $lng=$this->params->pass[1];
        if(($lat!='0')&&($lng!='0')){
        
         $res=$this->VendorClasse->query("SELECT bg_vendor_classes.id as ide, bg_vendor_classe_location_details.vendor_class_id, bg_vendor_classes.class_topic,bg_vendor_classes.category_id,bg_vendor_classe_location_details.latitude, bg_vendor_classe_location_details.longitude,bg_categories.color_code,bg_categories.id,SQRT( POW( 69.1 * ( bg_vendor_classe_location_details.latitude - $lat ) , 2 ) + POW( 69.1 * (  bg_vendor_classe_location_details.longitude- $lng ) * COS( $lat / 57.3 ) , 2 ) ) AS distance
FROM bg_vendor_classes, bg_vendor_classe_location_details,bg_categories
HAVING distance <20
 and  bg_vendor_classe_location_details.vendor_class_id = bg_vendor_classes.id and bg_vendor_classes.category_id=bg_categories.id 
ORDER BY distance");
   if(!empty($res)){
          $l=0;
          foreach($res as $res1){
          $res[$l]['bg_vendor_classes']['current_lat']=$lat;
          $res[$l]['bg_vendor_classes']['current_lng']=$lng;
          $l++;
         }
        echo json_encode($res);die;
        }
        else{
          $res['found']=0;
           $res['current_lat']=$lat;
           $res['current_lng']=$lng;
          echo json_encode($res);die;
        }
    }
    else{
      
     $address="Chennai";

     $res1=$this->getLatLong($address);
     $lat=$res1['latitude'];
     $lng=$res1['longitude'];
     

     $res=$this->VendorClasse->query("SELECT bg_vendor_classes.id as ide, bg_vendor_classe_location_details.vendor_class_id, bg_vendor_classes.class_topic,bg_vendor_classes.category_id,bg_vendor_classe_location_details.latitude, bg_vendor_classe_location_details.longitude,bg_categories.color_code,bg_categories.id,SQRT( POW( 69.1 * ( bg_vendor_classe_location_details.latitude - $lat ) , 2 ) + POW( 69.1 * ( bg_vendor_classe_location_details.longitude - $lng ) * COS( $lat / 57.3 ) , 2 ) ) AS distance
FROM bg_vendor_classes, bg_vendor_classe_location_details,bg_categories
HAVING distance <20
 and  bg_vendor_classe_location_details.vendor_class_id = bg_vendor_classes.id and bg_vendor_classes.category_id=bg_categories.id 
ORDER BY distance");
    

     if(!empty($res)){
          $l=0;
          foreach($res as $res1){
          $res[$l]['bg_vendor_classes']['current_lat']=$lat;
          $res[$l]['bg_vendor_classes']['current_lng']=$lng;
          $l++;
         }
        echo json_encode($res);die;
        }
else{
  $res['found']=0;
           $res['current_lat']=$lat;
           $res['current_lng']=$lng;
          echo json_encode($res);die; 
}
    }
}
		$trending_class = $this->VendorClasse->find('all',array(
		
		'contain'=> array(		
									'ClassType',
									'User',
									'VendorClasseLocationDetail'=> array('Locality'),
									'VendorClasseLevelDetail'
									),
				'order' => array('VendorClasse.view_count DESC'),	
				'limit' => 15,
		));
		
	  	$featured_class = $this->VendorClasse->find('all', array(
		
		'contain'=> array(		
									'ClassType',
									'User',
									'VendorClasseLocationDetail'=> array('Locality'),
									'VendorClasseLevelDetail'
									),
	  			'conditions' => array(
	  				'featured_status' => 1
	  				),
	  			'limit' => 15,
	  			));
				
		
				
	      $segment_IDS = $this->ClassSegment->find('all', array(
		  
		  			'conditions' => array(
						'ClassSegment.segment_name LIKE' => '%India Indigenous%',
						),
				));
				foreach($segment_IDS as $key => $value){
						$s_id[$key] = $value['ClassSegment']['id'];
						$conditions['OR'][$key] = array('FIND_IN_SET('.$s_id[$key].',VendorClasse.segment_id)');
				}	
		$recommended_class = $this->VendorClasse->find('all', array(
		
		'contain'=> array(		
									'ClassType',
									'User',
									'VendorClasseLocationDetail'=> array('Locality'),
									'VendorClasseLevelDetail'
									),
				'conditions' => $conditions,
				'order' => array('VendorClasse.id DESC'),	
				'limit' => 15,	
		));
		$this->set('trending_class',$trending_class);
		$this->set('featured_class',$featured_class);
		$this->set('recommended_class',$recommended_class);
       //echo '<pre>'; print_r($trending_class); die;
		}

       public function about() {

      $this->layout='index_layout';

       }
	    public function about_the_team() {

      $this->layout='index_layout';

       }

       public function terms() {

      $this->layout='fun_layout';

       }
	    public function privacy() {

      $this->layout='fun_layout';

       }
	    public function reviews_and_testimonials() {

      $this->layout='fun_layout';

       }    
	    public function partner_with_us() {

      $this->layout='fun_layout';

       }   
	   public function contact(){

//$this->checkUser();

$this->layout='fun_layout';

$user=$this->Session->read('User');

$this->set('user_view',$user);

}
        public function weighLoss() {
    
            $this->layout='fun_layout';
            if(!empty($this->params->pass[0]) && !empty($this->params->pass[1])){
            
                $url_id       = base64_decode($this->params->pass[1]);
                $category_id  = base64_decode($this->params->pass[0]); 

                $data = $this->VendorClasse->find('all',array(
                  
                  'joins'    =>   array(
                                  array(
                                      'table' => 'bg_request_catalogs',
                                      'alias' => 'Catalog',
                                      'type'  =>  'INNER',
                                      'conditions' => array('VendorClasse.id = Catalog.class_id','Catalog.status'=>1),
                                      'order'=>array('Catalog.add_date')
                                      ),
                                   array(
                                      'table' => 'bg_user_masters',
                                      'alias' => 'UserMaster',
                                      'type'  =>  'INNER',
                                      'conditions' => array('VendorClasse.user_id = UserMaster.id')
                                      ),
                                    array(
                                      'table' => 'bg_class_types',
                                      'alias' => 'clastye',
                                      'type'  =>  'INNER',
                                      'conditions' => array('VendorClasse.class_type_id = clastye.id')
                                      ),
                                      array(
                                      'table' => 'bg_connect_groups',
                                      'alias' => 'ConnectGroup',
                                      'type'  =>  'INNER',
                                      'conditions' => array('Catalog.catalogue_group_id = ConnectGroup.id','ConnectGroup.id'=>$category_id)
                                      )                           
                                    ),
                  'conditions'=>array('VendorClasse.id'=>$url_id),
                  'fields'    =>array('VendorClasse.*','Catalog.*','UserMaster.*','clastye.types','ConnectGroup.*'),
                 
                  ));
            }

      $this->set('alldata',$data);

    } 




      public function sellExpress() {

      $this->layout='index_layout';

       }

     
          public function arrange_class() {
                 
               $this->layout='arrange_layout';
               $user = $this->Session->read('User');
               $this->set('user_view',$user);
      $catalog = $this->VendorClasse->find('all',array(
            'joins' =>   array(
                            array(
                                'table' => 'bg_add_catalogs',
                                'alias' => 'Catalog',
                                'type'  =>  'INNER',
                                'conditions' => array('VendorClasse.id = Catalog.class_id','Catalog.status'=>1),
                                'order'=>array('Catalog.add_date')
                                ),
                             array(
                                'table' => 'bg_user_masters',
                                'alias' => 'UserMaster',
                                'type'  =>  'INNER',
                                'conditions' => array('VendorClasse.user_id = UserMaster.id')
                                ),
                              array(
                                'table' => 'bg_class_types',
                                'alias' => 'clastye',
                                'type'  =>  'INNER',
                                'conditions' => array('VendorClasse.class_type_id = clastye.id')
                                )
                              ),
            'contain'=> array('VendorClasseLocationDetail'=> array('Locality')), 
             'group'=>array('VendorClasse.id'),
            'fields'    =>array('VendorClasse.*','Catalog.*','UserMaster.*','clastye.types')
            ));

        $group_detail=$this->ConnectGroup->find('all',array('conditions'=>array('status'=>1),
        'fields'=>'ConnectGroup.*'));
      
      $group_detail1=$this->ConnectGroup->find('all');

      $this->set('group_detail',$group_detail);
      $this->set('catalog_class',$catalog);
    }



       // **********Najmuddin

    // date 28 june

  

   public function bookClass(){
      $this->checkUser();
      $this->loadModel('Ticket');
      $this->loadModel('PayuTransaction');
      $this->layout='vendor_layout';
      $user=$this->Session->read('User');
      $this->set('user_view',$user);
      $user_id =$user['UserMaster']['id'];
      if(!empty($this->params->pass[0])){
        $class_id=base64_decode($this->params->pass[0]);
        
           $bookingArr =$res=$this->TransactionHistorie->query("SELECT bg_payu_transactions.*,bg_tickets.*,bg_vendor_classes.*,bg_user_masters.*,count(bg_tickets.id) as 'total_ticket' from bg_payu_transactions,bg_tickets,bg_user_masters,bg_vendor_classes where bg_payu_transactions.txnid=bg_tickets.txn_id and bg_tickets.vendor_classe_id=bg_vendor_classes.id and  bg_tickets.user_id=bg_user_masters.id and bg_tickets.status='success' and bg_tickets.vendor_classe_id='$class_id' group by bg_payu_transactions.txnid order by bg_payu_transactions.created desc");
          
              
        $this->set('booking_status',$bookingArr);
          
        
      }
    }

     public function viewclassDetail(){

      //$this->checkUser();

      $this->layout='fun_layout';

      $user=$this->Session->read('User');

      $this->set('user_view',$user);

      if(!empty($this->params->pass[0])){

        //echo $class_id=$this->params->pass[0];

        $class_id=base64_decode($this->params->pass[0]);

        $class_detail = $this->VendorClasse->find('first',array('conditions'=>array('VendorClasse.id'=>$class_id)));

        if(!empty($class_detail)){

         $l=0;

       foreach($class_detail as $res){

      $class_by=$this->UserMaster->find('first',array('conditions'=>array('id'=>$res['user_id'])));

      if($class_by['UserMaster']['vendor_type_id']=='1'){

        $class_detail[$l]['VendorClasse']['class_by']=$class_by['UserMaster']['institute_name'];

      }

      else{

       $class_detail[$l]['VendorClasse']['class_by']=$class_by['UserMaster']['first_name'];

       

      }

      $l++;

      }

        }

        $community_id = $class_detail['VendorClasse']['community_id'];

        $community = $this->Community->find('first',array(

            'conditions'=>array(

                'id'=>$community_id

              ),

            'fields'=>'community_name'));

        $community_name = $community['Community']['community_name'];



        $class_by=$this->UserMaster->find('first',array('conditions'=>array('id'=>$class_detail['VendorClasse']['user_id']),'fields'=>'first_name'));

        $class_detail['VendorClasse']['class_by']=$class_by['UserMaster']['first_name'];

        $class_detail['VendorClasse']['community_name']=$community_name ;

        $this->set('view_class',$class_detail);

  /************** added by vineet ********/

        $user_id = $user['UserMaster']['id'];

        $shedule_detail = $this->ClassSchedule->find('all',array('conditions'=> array('class_provider_id'=>$user_id)));

        $this->set('shedule_class',$shedule_detail);

        $cat=$this->Category->find('all',array('conditions'=>array('status'=>1)));

        $this->set('category',$cat);

        $category_id = $class_detail['VendorClasse']['category_id'];

        $segment = $this->ClassSegment->find('all',array('conditions' => array('category_id'=> $category_id)));

        $this->set('segment',$segment);

        $classstatus = $this->VendorClasse->find('all', array('conditions' => array('trending_status' => 1)),array('conditions'=> array('featured_status'=> 1)), array('conditions'=> array('recommended_status' => 1)));

        $this->set('class_status',$classstatus);

      }   



      //$this->set('user_view',$user);

    }
public function fun(){
      //$this->checkUser();
      $this->layout='fun_layout';
      $user=$this->Session->read('User');

      $class_type=$this->ClassType->find('all'); 
        $this->set('all_class_type',$class_type);

        $coummunity_data=$this->Community->find('all',array('conditions'=>array('status'=>1)));
        $this->set('coummunity_data',$coummunity_data);

         $usermaster_data=$this->UserMaster->find('all',array('conditions'=>array('status'=>1,'user_type_id'=>1)));
        $this->set('usermaster_data',$usermaster_data);
        
          /* ======================= Start Akash =============================*/
            $featured_class = $this->VendorClasse->find('all', array('conditions' => array('featured_status' => 1)));
            if(!empty($featured_class)){
              $l=0;
              foreach($featured_class as $res){
                $class_by=$this->UserMaster->find('first',array('conditions'=>array('id'=>$res['VendorClasse']['user_id'])));
                if($class_by['UserMaster']['vendor_type_id']=='1'){
                  $featured_class[$l]['VendorClasse']['class_by']=$class_by['UserMaster']['institute_name'];
                }else{
                  $featured_class[$l]['VendorClasse']['class_by']=$class_by['UserMaster']['first_name'];
                }
                $l++;
              }
              $this->set('featured_status',$featured_class);
            }

            //$recommended_class = $this->VendorClasse->find('all', array('conditions' => array('recommended_status' => 1)));
            $recommended_class = $this->VendorClasse->find('all', array(
				'conditions' => array(
						)	,
				'order' => array('VendorClasse.view_count DESC'),	
				'limit' => 15,	
		));		

              if(!empty($recommended_class)){
                $l=0;
                foreach($recommended_class as $res){
                  $class_by=$this->UserMaster->find('first',array('conditions'=>array('id'=>$res['VendorClasse']['user_id'])));
                  if($class_by['UserMaster']['vendor_type_id']=='1'){
                    $recommended_class[$l]['VendorClasse']['class_by']=$class_by['UserMaster']['institute_name'];
                  }
                  else{
                    $recommended_class[$l]['VendorClasse']['class_by']=$class_by['UserMaster']['first_name'];
                  }
                  $l++;
                }
                $this->set('recomendeds_status',$recommended_class);
              }
          /* ======================= End Akash =========================*/


     /*echo "<pre>";
      print_r($_POST);
      echo "</pre>";*/
        if (isset($_POST["search"])){

                 
                      $s_key     = $_POST['search_key'];
                      $cat_id  = $_POST['search_cat_id'];

                       $page=10;
                          if(!empty($_GET['page'])){

                            $page = $_GET['page'];
                          }
                          
                          $this->set('page_no',$page);


                            $res_cat_img = $this->Category->find('all',array('conditions'=>array('Category.id'=>$cat_id)));
                            $this->set('cat_img',$res_cat_img);

                            $res = $this->ClassSegment->find('all',array('conditions'=>array('ClassSegment.category_id'=>$cat_id)));
                            $this->set('view_clasa_segment',$res);
                      
                             /*$res_total_class = $this->VendorClasse->find('all',array('conditions'=>array('VendorClasse.category_id'=>$cat_id,'VendorClasse.class_topic LIKE'=>'%'.$s_key.'%')));
                             $this->set('all_total_class',$res_total_class);*/
                            
                             //echo $total_search;
                             //die;
                             $res_class = $this->VendorClasse->query("SELECT bg_vendor_classes.id,
                                                                               bg_vendor_classes.id,
                                                                               bg_vendor_classes.class_topic,
                                                                               bg_vendor_classes.class_summary,
                                                                               bg_vendor_classes.class_timing_id,  
                                                                               bg_vendor_classes.class_duration,
                                                                               bg_vendor_classes.location,
                                                                               bg_vendor_classes.no_of_session,  
                                                                               bg_vendor_classes.price_per_head,
                                                                               bg_vendor_classes.upload_class_photo,
                                                                               bg_vendor_classes.status,
                                                                               bg_class_schedules.id,
                                                                               bg_class_schedules.session_date,
                                                                               bg_class_schedules.session_time,
                                                                               bg_user_masters.id,
                                                                               bg_user_masters.first_name
                                                                              
                                                                               FROM bg_vendor_classes LEFT JOIN bg_class_schedules
                                                                               ON bg_vendor_classes.id = bg_class_schedules.class_id
                                                                               LEFT JOIN bg_user_masters
                                                                               ON bg_user_masters.id = bg_vendor_classes.user_id 
                                                                               where bg_vendor_classes.category_id=$cat_id
                                                                               and bg_vendor_classes.class_topic LIKE '%$s_key%' 

                                                                               ORDER BY bg_vendor_classes.id  DESC");

                            $this->set('all_total_class',$res_class);
                            $this->set('allclass',$res_class);
                            $this->set('cat_id',$cat_id);
                            $this->set('seg_id',$seg_id);
                    }

                        else if(isset($_POST["Filter"])){

                                                            $cat_id              = $this->params->pass[0];
                                                            $seg_id              = $this->params->pass[1];
                                                            $filter              = 'Filter';
                                                              $date              = $_POST['start_datepicker'];
                                                              $time              = $_POST['time'];
                                                              $class_type        = $_POST['class_type'];
                                                               $community_id     = $_POST['Community_id'];
                                                               $class_timing_id  = $_POST['class_schedule'];
                                                                $class_provider  = $_POST['class_provider'];
                                                                      $location  = $_POST['location'];

                                                                      if($location==''){

                                                                      $filter_query = "or bg_class_schedules.session_time LIKE '$time'
                                                                                                           or bg_vendor_classes.class_type_id LIKE '$class_type'
                                                                                                           or bg_vendor_classes.community_id LIKE '$community_id'
                                                                                                           or bg_vendor_classes.class_timing_id LIKE '$class_timing_id'
                                                                                                           or bg_vendor_classes.user_id LIKE '$class_provider'";
                                                                      }                                     
                                                                      else{

                                                                              $filter_query = "or bg_class_schedules.session_time LIKE '$time'
                                                                                                           or bg_vendor_classes.class_type_id LIKE '$class_type'
                                                                                                           or bg_vendor_classes.community_id LIKE '$community_id'
                                                                                                           or bg_vendor_classes.class_timing_id LIKE '$class_timing_id'
                                                                                                           or bg_vendor_classes.user_id LIKE '$class_provider'
                                                                                                           or bg_vendor_classes.user_id LIKE '%$location%'"; 
                                                                        }                           

                                                              $res_cat_img = $this->Category->find('all',array('conditions'=>array('Category.id'=>$cat_id)));
                                                              $this->set('cat_img',$res_cat_img);
                                                              $res = $this->ClassSegment->find('all',array('conditions'=>array('ClassSegment.category_id'=>$cat_id)));
                                                              $this->set('view_clasa_segment',$res);
                                                            if($seg_id=='')
                                                              {
                                                                  //$res_total_class = $this->VendorClasse->find('all',array('conditions'=>array('VendorClasse.category_id'=>$cat_id)));
                                                                  //$this->set('all_total_class',$res_total_class);
                                                                  $page=10;
                                                                      if(!empty($_GET['page'])){

                                                                                      $page = $_GET['page'];
                                                                                        }
                                                            
                                                                  $this->set('page_no',$page);
                                                                  $res_class = $this->VendorClasse->query("SELECT bg_vendor_classes.id,
                                                                                                           bg_vendor_classes.id,
                                                                                                           bg_vendor_classes.class_topic,
                                                                                                           bg_vendor_classes.class_summary,
                                                                                                           bg_vendor_classes.class_timing_id,  
                                                                                                           bg_vendor_classes.class_duration,
                                                                                                           bg_vendor_classes.no_of_session, 
                                                                                                           bg_vendor_classes.location, 
                                                                                                           bg_vendor_classes.price_per_head,
                                                                                                           bg_vendor_classes.upload_class_photo,
                                                                                                           bg_vendor_classes.status,
                                                                                                           bg_class_schedules.id,
                                                                                                           bg_class_schedules.session_date,
                                                                                                           bg_class_schedules.session_time,
                                                                                                           bg_user_masters.id,
                                                                                                           bg_user_masters.first_name 
                                                                                                           FROM bg_vendor_classes LEFT JOIN bg_class_schedules
                                                                                                           ON bg_vendor_classes.id = bg_class_schedules.class_id
                                                                                                           LEFT JOIN bg_user_masters
                                                                                                           ON bg_user_masters.id = bg_vendor_classes.user_id 
                                                                                                           where bg_vendor_classes.category_id=$cat_id 


                                                                                                            and bg_class_schedules.session_date LIKE '$date'
                                                                                                           $filter_query ORDER BY bg_vendor_classes.id  DESC");
                                                                                                           $this->set('all_total_class',$res_class);
                                                                                                           $this->set('allclass',$res_class);
                                                                                                           $this->set('cat_id',$cat_id);
                                                                                                           $this->set('seg_id',$seg_id);
                                                                                                           $this->set('filter',$filter);
                                                                                                           $this->set('date',$date);
                                                                                                           $this->set('time',$time);
                                                                                                           $this->set('class_type',$class_type);
                                                                                                           $this->set('community_id',$community_id);
                                                                                                           $this->set('class_timing_id',$class_timing_id);
                                                                                                           $this->set('class_provider',$class_provider);
                                                                                                           $this->set('location',$location);
                                                                                                           
                                                         }  else {


                                                
                                                                  $page=10;
                                                                      if(!empty($_GET['page'])){

                                                                                      $page = $_GET['page'];
                                                                                        }
                                                            
                                                                  $this->set('page_no',$page);
                                                                  $res_class = $this->VendorClasse->query("SELECT bg_vendor_classes.id,
                                                                                                           bg_vendor_classes.id,
                                                                                                           bg_vendor_classes.class_topic,
                                                                                                           bg_vendor_classes.class_summary,
                                                                                                           bg_vendor_classes.class_timing_id,  
                                                                                                           bg_vendor_classes.class_duration,
                                                                                                           bg_vendor_classes.location, 
                                                                                                           bg_vendor_classes.price_per_head,
                                                                                                           bg_vendor_classes.upload_class_photo,
                                                                                                           bg_vendor_classes.status,
                                                                                                           bg_class_schedules.id,
                                                                                                           bg_class_schedules.session_date,
                                                                                                           bg_class_schedules.session_time,
                                                                                                           bg_user_masters.id,
                                                                                                           bg_user_masters.first_name 
                                                                                                           FROM bg_vendor_classes LEFT JOIN bg_class_schedules
                                                                                                           ON bg_vendor_classes.id = bg_class_schedules.class_id
                                                                                                           LEFT JOIN bg_user_masters
                                                                                                           ON bg_user_masters.id = bg_vendor_classes.user_id 
                                                                                                           where bg_vendor_classes.category_id=$cat_id  
                                                                                                             and bg_vendor_classes.segment_id=$seg_id
                                                                                                              and bg_class_schedules.session_date LIKE '$date'
                                                                                                           $filter_query ORDER BY bg_vendor_classes.id  DESC");
                                                                                                           $this->set('all_total_class',$res_class);
                                                                                                           $this->set('allclass',$res_class);
                                                                                                           $this->set('cat_id',$cat_id);
                                                                                                           $this->set('seg_id',$seg_id);
                                                                                                           $this->set('filter',$filter);
                                                                                                           $this->set('date',$date);
                                                                                                           $this->set('time',$time);
                                                                                                           $this->set('class_type',$class_type);
                                                                                                           $this->set('community_id',$community_id);
                                                                                                           $this->set('class_timing_id',$class_timing_id);
                                                                                                           $this->set('class_provider',$class_provider);
                                                                                                           $this->set('location',$location);
                                                    }
                            
                                              }

                          else if(isset($_POST["Sort"])){  
                                                          


                                                          $sort_value = $_POST['optionsRadios'];
                                                          $this->set('filter','Sort');

                                                          if($sort_value==1)
                                                          {
                                                            $sort_by ='bg_vendor_classes.price_per_head  DESC';
                                                             $this->set('find_sort_val',$sort_value);

                                                          }
                                                          if($sort_value==2)
                                                          {
                                                            $sort_by ='bg_vendor_classes.price_per_head  ASC';
                                                            $this->set('find_sort_val',$sort_value);
                                                            
                                                          }
                                                          if($sort_value==3)
                                                          {
                                                            $sort_by ='bg_vendor_classes.price_per_head  DESC';
                                                            $this->set('find_sort_val',$sort_value);
                                                            
                                                          }
                                                          if($sort_value==4)
                                                          {
                                                            $sort_by ='bg_vendor_classes.id  DESC';
                                                            $this->set('find_sort_val',$sort_value);
                                                            
                                                          }

                                                            $cat_id = $this->params->pass[0];
                                                            $seg_id = $this->params->pass[1];
                                                            $res_cat_img = $this->Category->find('all',array('conditions'=>array('Category.id'=>$cat_id)));
                                                            $this->set('cat_img',$res_cat_img);
                                                            $res = $this->ClassSegment->find('all',array('conditions'=>array('ClassSegment.category_id'=>$cat_id)));
                                                            $this->set('view_clasa_segment',$res);
                                                            if($seg_id=='')
                                                                {
                                                                    /*$res_total_class = $this->VendorClasse->find('all',array('conditions'=>array('VendorClasse.category_id'=>$cat_id)));
                                                                    $this->set('all_total_class',$res_total_class);*/
                                                                    $page=10;
                                                                        if(!empty($_GET['page'])){

                                                                          $page = $_GET['page'];
                                                                        }
                                    
                                                        $this->set('page_no',$page);
                                                        $res_class = $this->VendorClasse->query("SELECT bg_vendor_classes.id,
                                                                                                         bg_vendor_classes.id,
                                                                                                         bg_vendor_classes.class_topic,
                                                                                                         bg_vendor_classes.class_summary,
                                                                                                         bg_vendor_classes.class_timing_id,  
                                                                                                         bg_vendor_classes.class_duration,
                                                                                                         bg_vendor_classes.location,
                                                                                                         bg_vendor_classes.no_of_session, 
                                                                                                         bg_vendor_classes.price_per_head,
                                                                                                         bg_vendor_classes.upload_class_photo,
                                                                                                         bg_vendor_classes.status,
                                                                                                         bg_class_schedules.id,
                                                                                                         bg_class_schedules.session_date,
                                                                                                         bg_class_schedules.session_time,
                                                                                                         bg_user_masters.id,
                                                                                                         bg_user_masters.first_name 
                                                                                                         FROM bg_vendor_classes LEFT JOIN bg_class_schedules
                                                                                                         ON bg_vendor_classes.id = bg_class_schedules.class_id
                                                                                                         LEFT JOIN bg_user_masters
                                                                                                         ON bg_user_masters.id = bg_vendor_classes.user_id 
                                                                                                         where bg_vendor_classes.category_id=$cat_id 
                                                                                                         ORDER BY $sort_by");
                                                                                                         $this->set('all_total_class',$res_class);
                                                                                                         $this->set('allclass',$res_class);
                                                                                                         $this->set('cat_id',$cat_id);
                                                                                                         $this->set('seg_id',$seg_id); 
                                                                                                       }

                                                      else{


                                                      

                                                             $page=10;
                                                             if(!empty($_GET['page'])){
                                                                          
                                                                                        $page = $_GET['page'];
                                                                                    }
                                                                $this->set('page_no',$page);
                                                                /*$res_total_class = $this->VendorClasse->find('all',array('conditions'=>array('VendorClasse.category_id'=>$cat_id,'VendorClasse.segment_id'=>$seg_id)));
                                                                $this->set('all_total_class',$res_total_class);*/
                                                                $res_class = $this->VendorClasse->query("SELECT bg_vendor_classes.id,
                                                                                                                     bg_vendor_classes.id,
                                                                                                                     bg_vendor_classes.class_topic,
                                                                                                                     bg_vendor_classes.class_summary,
                                                                                                                     bg_vendor_classes.class_timing_id,  
                                                                                                                     bg_vendor_classes.class_duration,
                                                                                                                     bg_vendor_classes.location, 
                                                                                                                     bg_vendor_classes.price_per_head,
                                                                                                                     bg_vendor_classes.upload_class_photo,
                                                                                                                     bg_vendor_classes.status,
                                                                                                                     bg_vendor_classes.no_of_session,
                                                                                                                     bg_class_schedules.id,
                                                                                                                     bg_class_schedules.session_date,
                                                                                                                     bg_class_schedules.session_time,
                                                                                                                     bg_user_masters.id,
                                                                                                                     bg_user_masters.first_name

                                                                                                                      FROM bg_vendor_classes LEFT JOIN bg_class_schedules
                                                                                                                       ON bg_vendor_classes.id = bg_class_schedules.class_id
                                                                                                                       LEFT JOIN bg_user_masters
                                                                                                                       ON bg_user_masters.id = bg_vendor_classes.user_id 
                                                                                                                       where bg_vendor_classes.category_id=$cat_id  

                                                                                                                     ORDER BY $sort_by LIMIT 0 ,$page");
                                                                                                                      $this->set('all_total_class',$res_class);
                                                                                                                      $this->set('allclass',$res_class);
                                                                                                                      $this->set('cat_id',$cat_id);
                                                                                                                      $this->set('seg_id',$seg_id);
                                                    }
                                                  
                                                  




                           
                                                        }
                else{
                              


                            $cat_id = $this->params->pass[0];
                            $seg_id = $this->params->pass[1];
                            $res_cat_img = $this->Category->find('all',array('conditions'=>array('Category.id'=>$cat_id)));
                            $this->set('cat_img',$res_cat_img);
                            $res = $this->ClassSegment->find('all',array('conditions'=>array('ClassSegment.category_id'=>$cat_id)));
                            $this->set('view_clasa_segment',$res);
                            if($seg_id=='')
                                {
                                    /*$res_total_class = $this->VendorClasse->find('all',array('conditions'=>array('VendorClasse.category_id'=>$cat_id)));
                                    $this->set('all_total_class',$res_total_class);*/
                                    $page=10;
                                        if(!empty($_GET['page'])){

                                          $page = $_GET['page'];
                                        }
                                    
                                    $this->set('page_no',$page);
                                    
                                    $res_class = $this->VendorClasse->query("SELECT bg_vendor_classes.id,
                                                                                     bg_vendor_classes.id,
                                                                                     bg_vendor_classes.class_topic,
                                                                                     bg_vendor_classes.class_summary,
                                                                                     bg_vendor_classes.class_timing_id,  
                                                                                     bg_vendor_classes.class_duration,
                                                                                     bg_vendor_classes.location, 
                                                                                     bg_vendor_classes.price_per_head,
                                                                                     bg_vendor_classes.upload_class_photo,
                                                                                     bg_vendor_classes.status,
                                                                                     bg_vendor_classes.no_of_session,
                                                                                     bg_class_schedules.id,
                                                                                     bg_class_schedules.session_date,
                                                                                     bg_class_schedules.session_time,
                                                                                     bg_user_masters.id,
                                                                                     bg_user_masters.first_name
                                                                                    
                                                                                     FROM bg_vendor_classes LEFT JOIN bg_class_schedules
                                                                                     ON bg_vendor_classes.id = bg_class_schedules.class_id
                                                                                     LEFT JOIN bg_user_masters
                                                                                     ON bg_user_masters.id = bg_vendor_classes.user_id 
                                                                                     where bg_vendor_classes.category_id=$cat_id
                                                                                     ORDER BY bg_vendor_classes.id  DESC");
                                                                                      $this->set('all_total_class',$res_class); 
                                                                                      $this->set('allclass',$res_class);
                                                                                      $this->set('cat_id',$cat_id);
                                                                                      $this->set('seg_id',$seg_id);
                          }

                          else{
                                  
                                 $page=10;
                                 if(!empty($_GET['page'])){
                                              
                                                            $page = $_GET['page'];
                                                        }
                                    $this->set('page_no',$page);
                                   /* $res_total_class = $this->VendorClasse->find('all',array('conditions'=>array('VendorClasse.category_id'=>$cat_id,'VendorClasse.segment_id'=>$seg_id)));
                                    $this->set('all_total_class',$res_total_class);*/
                                    $res_class = $this->VendorClasse->query("SELECT bg_vendor_classes.id,
                                                                                         bg_vendor_classes.id,
                                                                                         bg_vendor_classes.class_topic,
                                                                                         bg_vendor_classes.class_summary,
                                                                                         bg_vendor_classes.class_timing_id,  
                                                                                         bg_vendor_classes.class_duration,
                                                                                         bg_vendor_classes.location,
                                                                                         bg_vendor_classes.no_of_session, 
                                                                                         bg_vendor_classes.price_per_head,
                                                                                         bg_vendor_classes.upload_class_photo,
                                                                                         bg_vendor_classes.status,
                                                                                         bg_class_schedules.id,
                                                                                         bg_class_schedules.session_date,
                                                                                         bg_class_schedules.session_time,
                                                                                         bg_user_masters.id,
                                                                                         bg_user_masters.first_name
                                                                                         FROM bg_vendor_classes LEFT JOIN bg_class_schedules
                                                                                         ON bg_vendor_classes.id = bg_class_schedules.class_id
                                                                                         LEFT JOIN bg_user_masters
                                                                                         ON bg_user_masters.id = bg_vendor_classes.user_id 
                                                                                         where bg_vendor_classes.category_id=$cat_id
                                                                                         and bg_vendor_classes.segment_id=$seg_id

                                                                                        
                                                                                         ORDER BY bg_vendor_classes.id  DESC");
                                                                                        
                                                                                         $this->set('all_total_class',$res_class);
                                                                                         $this->set('allclass',$res_class);
                                                                                         $this->set('cat_id',$cat_id);
                                                                                         $this->set('seg_id',$seg_id);
                        }
          }
}
      public function fun_bkp_16_07(){

      //$this->checkUser();

      $this->layout='fun_layout';

      $user=$this->Session->read('User');





      $cat_id = $this->params->pass[0];

      $seg_id = $this->params->pass[1];



    

    

    $res_cat_img = $this->Category->find('all',array('conditions'=>array('Category.id'=>$cat_id)));

    $this->set('cat_img',$res_cat_img);

      $this->set('view_clasa_segment',$res);



      $res = $this->ClassSegment->find('all',array('conditions'=>array('ClassSegment.category_id'=>$cat_id)));

      $this->set('view_clasa_segment',$res);



      if($seg_id=='')

      {

        

 $res_total_class = $this->VendorClasse->find('all',array('conditions'=>array('VendorClasse.category_id'=>$cat_id)));

      $this->set('all_total_class',$res_total_class);



        $this->paginate=array('limit'=>5,'order' => array('VendorClasse.id'=>'desc'),

                      'conditions'=>array('VendorClasse.category_id'=>$cat_id));

                      

                      

              $res_class = $this->paginate('VendorClasse');

        $this->set('allclass',$res_class);

        $this->set('cat_id',$cat_id);

  $this->set('seg_id',$seg_id);

        

    }

    else

    {

       $res_total_class = $this->VendorClasse->find('all',array('conditions'=>array('VendorClasse.category_id'=>$cat_id,'VendorClasse.segment_id'=>$seg_id)));

      $this->set('all_total_class',$res_total_class);





      $this->paginate=array('limit'=>5,

                      'conditions'=>array('VendorClasse.category_id'=>$cat_id,'VendorClasse.segment_id'=>$seg_id));

              $res_class = $this->paginate('VendorClasse');

        $this->set('allclass',$res_class);

        $this->set('cat_id',$cat_id);

        $this->set('seg_id',$seg_id);

    }

    }

     public function addClassCatalog(){
      //$this->checkUser();
      $this->layout='vendor_layout';
      $user=$this->Session->read('User');
      $this->set('user_view',$user);
      $user_id = $user['UserMaster']['id'];

      $user_name = $user['UserMaster']['first_name'];
      $allclass = $this->VendorClasse->find('all', array('conditions' => array('user_id'=>$user_id)));
      $city_data=$this->City->find('all',array('conditions'=>array('status'=>1)));
      $this->set('cities_data',$city_data);
      $class_type=$this->ClassType->find('all');

      $this->set('class_type11',$class_type);
      $group_name=$this->ConnectGroup->find('all');
      $this->set('group_name',$group_name);
      $this->set('all_class',$allclass);
     
      $this->set('user_name',$user_name);
      
    }
public function requestCatalogue(){
	$this->checkUser();
      $this->layout='vendor_layout';
      $user=$this->Session->read('User');
      $mobile=$user['UserMaster']['mobile'];
      $msg='';
    if(!empty($_POST)){
      $class_type=$_POST['class_type'];
      $region=$_POST['region'];
      $locality=$_POST['locality'];
      $group=$_POST['group'];
      $city=$_POST['city'];
      $vendor_id=$_POST['vendor_id'];
      $class_id=$_POST['class_id'];
      $countclasstype=count($class_type);
      $countregion=count($region);
      $countlocality=count($locality);
      $countgroup=count($group);
      $strclasstype='';
      $strregion='';
      $strlocality='';
      $strgroup='';
      for($i=0;$i<$countclasstype;$i++){
      $strclasstype= $strclasstype.",".$class_type[$i];
      }
      for($i=0;$i< $countregion;$i++){
      $strregion= $strregion.",".$region[$i];
      }
      for($i=0;$i< $countlocality;$i++){
      $strlocality= $strlocality.",".$locality[$i];
      }
      for($i=0;$i<$countgroup;$i++){
       $strgroup=  $strgroup.",".$group[$i];
      }
      $strclasstype=ltrim( $strclasstype, ',');
      $strregion=ltrim($strregion, ',');
      $strlocality=ltrim($strlocality,',');
      $strgroup=ltrim($strgroup,',');
      $dataArray['class_id']=$class_id;
      $dataArray['vendor_id']=$vendor_id;
      $dataArray['group_name']=$strgroup;
      $dataArray['city']=$city;
      $dataArray['region']= $strregion;
      $dataArray['locality']=$strlocality;
      $dataArray['class_type']=$strclasstype;
      $dataArray['status']=0;
      $dataArray['add_date']=strtotime(date('Y-m-d H:i:s'));
      $dataArray['modify_date']=strtotime(date('Y-m-d H:i:s'));
      $this->RequestCatalog->save($dataArray);
      $userArray['id']=$class_id;
      $userArray['catalogue_status']=0;
      $this->VendorClasse->save($userArray);
      $this->sendMail('catalogRequest',$email,$email);
      $msg='Your Add class to catalogue request has been sent to BrainGroom Admin. You will get back from them in 24 to 48 hrs.';
      $msg = str_replace(" ","%20",$msg);
      $Url = 'http://193.105.74.159/api/v3/sendsms/plain?user=braingroom&password=3e4IG3WL&sender=BRAING&SMSText='.$msg.'&type=longsms&GSM=91'.$mobile;
      $this->openurl($Url);
     echo 1;die;
      


      
          }
  }

public function addCatalogue(){
          
          $this->autoRender = false;
          $user=$this->Session->read('User');

          $this->request->data['vendor_id']= $user['UserMaster']['id'];
          $date = date("d-m-Y H:i:s");
          $timestamp = strtotime($date);
          $this->request->data['modify_date']= $timestamp;
          $this->request->data['add_date']= $timestamp;
          $class_id = $this->request->data['class_id'];
          $c_status=0;
          if($this->RequestCatalog->save($this->request->data)){

            $this->VendorClasse->query("UPDATE bg_vendor_classes SET  catalogue_status='".$c_status."' WHERE id='".$class_id."'");

            echo '1';
          }
          else
          {
            echo '0';
          }

          //echo 'hi';
    }

    public function addClass(){

      //$this->checkUser();

      $this->layout='vendor_layout';

      $user=$this->Session->read('User');



      //$this->set('user_view',$user);

    }

    public function informative(){

      //$this->checkUser();

      $this->layout='fun_layout';

      $user=$this->Session->read('User');



      //$this->set('user_view',$user);

    }

   public function gift(){
              //$this->checkUser();
              $this->layout='fun_layout';
              $user=$this->Session->read('User');
              $this->set('user_view',$user);
                //$gift_ngo_id=7;
              $gift_card_in = $this->GiftCard->find('all', array('conditions' => array('card_type_status'=>1)));
              $gift_card_co = $this->GiftCard->find('all', array('conditions' => array('card_type_status'=>2)));
              $gift_card_ngo = $this->GiftCard->find('all', array('conditions' => array('card_type_status'=>3)));
        
               $ngo_segment1 = $this->GiftCardSegment->query('SELECT bg_gift_card_segments.id,
                                     bg_class_segments.id,
                                     bg_class_segments.segment_name  
                                     FROM bg_gift_card_segments LEFT JOIN bg_class_segments 
                                     ON bg_gift_card_segments.segment_id = bg_class_segments.id
                                     WHERE bg_gift_card_segments.gift_card_id =7');
                                     
              $ngo_segment2 = $this->GiftCardSegment->query('SELECT bg_gift_card_segments.id, bg_class_segments.id, bg_class_segments.segment_name FROM bg_gift_card_segments LEFT JOIN bg_class_segments ON bg_gift_card_segments.segment_id = bg_class_segments.id WHERE bg_gift_card_segments.gift_card_id = 8');
                                      
              $ngo_segment3 = $this->GiftCardSegment->query('SELECT bg_gift_card_segments.id,
                                     bg_class_segments.id,
                                     bg_class_segments.segment_name  
                                     FROM bg_gift_card_segments LEFT JOIN bg_class_segments 
                                     ON bg_gift_card_segments.segment_id = bg_class_segments.id
                                     WHERE bg_gift_card_segments.gift_card_id = 9'); 

              $ngo_dropdown_name1 = $this->Ngo->find('all', array('conditions' => array('gift_card_id'=>7)));
              $ngo_dropdown_name2 = $this->Ngo->find('all', array('conditions' => array('gift_card_id'=>8)));
              $ngo_dropdown_name3 = $this->Ngo->find('all', array('conditions' => array('gift_card_id'=>9)));
              $all_cat_name = $this->Category->find('all',array('conditions'=>array('status'=>1)));



                                     
              $this->set('individual',$gift_card_in);
              $this->set('corporate',$gift_card_co);
              $this->set('ngo',$gift_card_ngo);
              $this->set('ngo_segment1',$ngo_segment1);
              $this->set('ngo_segment2',$ngo_segment2);
              $this->set('ngo_segment3',$ngo_segment3);
              $this->set('ngo_dropdown_name1',$ngo_dropdown_name1);
              $this->set('ngo_dropdown_name2',$ngo_dropdown_name2);
              $this->set('ngo_dropdown_name3',$ngo_dropdown_name3);
              $this->set('cat_name',$all_cat_name);
              

   }
 public function gift1(){
              //$this->checkUser();
              $this->layout='fun_layout';
              $user=$this->Session->read('User');
              $this->set('user_view',$user);
                //$gift_ngo_id=7;
              $gift_card_in = $this->GiftCard->find('all', array('conditions' => array('card_type_status'=>1)));
              $gift_card_co = $this->GiftCard->find('all', array('conditions' => array('card_type_status'=>2)));
              $gift_card_ngo = $this->GiftCard->find('all', array('conditions' => array('card_type_status'=>3)));
        
               $ngo_segment1 = $this->GiftCardSegment->query('SELECT bg_gift_card_segments.id,
                                     bg_class_segments.id,
                                     bg_class_segments.segment_name  
                                     FROM bg_gift_card_segments LEFT JOIN bg_class_segments 
                                     ON bg_gift_card_segments.segment_id = bg_class_segments.id
                                     WHERE bg_gift_card_segments.gift_card_id =7');
                                     
              $ngo_segment2 = $this->GiftCardSegment->query('SELECT bg_gift_card_segments.id, bg_class_segments.id, bg_class_segments.segment_name FROM bg_gift_card_segments LEFT JOIN bg_class_segments ON bg_gift_card_segments.segment_id = bg_class_segments.id WHERE bg_gift_card_segments.gift_card_id = 8');
                                      
              $ngo_segment3 = $this->GiftCardSegment->query('SELECT bg_gift_card_segments.id,
                                     bg_class_segments.id,
                                     bg_class_segments.segment_name  
                                     FROM bg_gift_card_segments LEFT JOIN bg_class_segments 
                                     ON bg_gift_card_segments.segment_id = bg_class_segments.id
                                     WHERE bg_gift_card_segments.gift_card_id = 9'); 

              $ngo_dropdown_name1 = $this->Ngo->find('all', array('conditions' => array('gift_card_id'=>7)));
              $ngo_dropdown_name2 = $this->Ngo->find('all', array('conditions' => array('gift_card_id'=>8)));
              $ngo_dropdown_name3 = $this->Ngo->find('all', array('conditions' => array('gift_card_id'=>9)));
              $all_cat_name = $this->Category->find('all',array('conditions'=>array('status'=>1)));



                                     
              $this->set('individual',$gift_card_in);
              $this->set('corporate',$gift_card_co);
              $this->set('ngo',$gift_card_ngo);
              $this->set('ngo_segment1',$ngo_segment1);
              $this->set('ngo_segment2',$ngo_segment2);
              $this->set('ngo_segment3',$ngo_segment3);
              $this->set('ngo_dropdown_name1',$ngo_dropdown_name1);
              $this->set('ngo_dropdown_name2',$ngo_dropdown_name2);
              $this->set('ngo_dropdown_name3',$ngo_dropdown_name3);
              $this->set('cat_name',$all_cat_name);
              

   }
   
  public function buySuccess_bck_07_09_16(){

    //$this->autoRender = false;
    $this->layout='book_layout';
    $status=$_POST["status"];
    $amount=$_POST["amount"];
    $firstname  = $_POST["firstname"];
    $txnid=$_POST["txnid"];
    $posted_hash=$_POST["hash"];
    $key=$_POST["key"];
    $salt="GQs7yium";
    $cupan_term_id = $this->Session->read('term_id');
    $find_term_id = $cupan_term_id['GiftCupan']['term_id'];
    $cupan_term_id='';
    $book_id = $uuid=uniqid();

    $this->request->data['payment_amt']    = $amount;
    $this->request->data['transaction_id'] = $txnid;
    $this->request->data['booking_id']     = $book_id;
    $this->request->data['status']         = 2;
     $this->request->data['payment_from_class'] = 2;
    $user = $this->Session->read('User');
    $user_id = $user['UserMaster']['id'];
    $this->request->data['user_id'] = $user_id;
    $date = date("d-m-Y H:i:s");
    $timestamp = strtotime($date);
    $this->request->data['transaction_date']= $timestamp;

    if($this->TransactionHistorie->save($this->request->data)){
    
        $this->GiftCupan->query("UPDATE bg_gift_cupans SET  bg_gift_cupans.booking_id='$book_id',bg_gift_cupans.status='1' WHERE bg_gift_cupans.term_id='$find_term_id'");
         require ('sendgrid-php/vendor/autoload.php');
         require ('sendgrid-php/lib/SendGrid.php');

          //$email = 'rohitdtrm@gmail.com';
         $all_gift_cupan = $this->GiftCupan->find('all', array('conditions' => array('GiftCupan.term_id' =>$find_term_id,'GiftCupan.status'=>1)));

          //echo $find_term_id;

        foreach ($all_gift_cupan as $key => $value) {

              $gift_email_id   = $value['GiftCupan']['email'];
              $gift_rupees     = $value['GiftCupan']['rupees'];
              $no_of_coupons   = $value['GiftCupan']['no_of_coupons'];
              $reciepent_name  = $value['GiftCupan']['reciepent_name'];
              $class_id        = $value['GiftCupan']['class_id'];
              $gift_card_id    = $value['GiftCupan']['gift_card_id'];
              
             $find_class_img  = $this->VendorClasse->find('all',array('conditions'=>array('VendorClasse.id' =>$class_id),'fields'=>array('VendorClasse.upload_class_photo','VendorClasse.class_topic')));
              if($gift_card_id!=''){
                $find_ngo_img  = $this->GiftCard->find('all',array('conditions'=>array('GiftCard.id' =>$gift_card_id),'fields'=>array('GiftCard.gift_image','GiftCard.title')));
              }
              if($no_of_coupons=555){
                  
                  $send_mail_html.='<div>Hi &nbsp;'.$reciepent_name.'</div><br><div>You have denoted the amount of Rs.;&nbsp;'.$gift_rupees.'&nbsp; to NGO successfully.</div></br><hr>';
                }
                else if($no_of_coupons==444){
                  $class_name     = $find_class_img[0]['VendorClasse']['class_topic'];
                  
                  $send_mail_html.='<div>Hi &nbsp;'.$reciepent_name.'</div><br><div>This is to inform you that '.$firstname.' have been gifted a card '.$class_name.'&nbsp;</div></br><hr>';
                }
                else{

                  $send_mail_html.='<div>Cupan Amount &nbsp;&nbsp;'.$gift_rupees.'</div></br><div>Cupan Code &nbsp;&nbsp;:'.$no_of_coupons.'</div></br><hr>';
                }

              
            }
             $total_email = count($all_gift_cupan);
             for($i=0; $i<$total_email; $i++){

              $email_id = $all_gift_cupan[$i]['GiftCupan']['email'];

            $this->sendMail('giftmailFailure',$email_id,$send_mail_html);

       }

    if(isset($_POST["additionalCharges"])) {
         $additionalCharges=$_POST["additionalCharges"];
          $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$amount.'|'.$txnid.'|'.$key;
          
                    }
    else {    

        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$total_price;

         }
     $hash = hash("sha512", $retHashSeq);
     
       /*if ($hash != $posted_hash) {
         $msg = 'Invalid Transaction. Please try again';
        $this->set('msg',$msg);
       }*/
     //else {
     if($gift_by==1 and $gift_type==2){
          
          $class_img  = 'http://162.243.205.148/braingroom/img/gift_image/Card.png';
          $text_msg   = 'Cupon has booked through BrainGroom.com';
        }
        else if($gift_by==2 and $gift_type==2){
          $class_img  =  'http://162.243.205.148/braingroom/img/gift_image/Card.png';
          $text_msg   =  'Cupon has booked through BrainGroom.com';
        }
        else if($gift_by==1 and $gift_type==1){
          $class_img_find = $find_class_img[0]['VendorClasse']['upload_class_photo'];
          $class_name     = $find_class_img[0]['VendorClasse']['class_topic'];
          $class_img      = 'http://162.243.205.148/braingroom/img/Vendor/class_image/'.$class_img_find;
          $text_msg       =  $class_name.' class has booked through BrainGroom.com';
          
        }
        else if($gift_by==2 and $gift_type==1){
         
          $class_img_find = $find_class_img[0]['VendorClasse']['upload_class_photo'];
          $class_name     = $find_class_img[0]['VendorClasse']['class_topic'];
          $class_img      = 'http://162.243.205.148/braingroom/img/Vendor/class_image/'.$class_img_find;
          $text_msg       = $class_name.' class has booked through BrainGroom.com';
        }
         else if($gift_by==3 and $gift_type==1){
          $ngo_img_find   = $find_ngo_img[0]['GiftCard']['gift_image'];
          $ngo_text       = $find_ngo_img[0]['GiftCard']['title'];
          $class_img      = 'http://162.243.205.148/braingroom/img/gift_class/'.$ngo_img_find;
          $text_msg       = 'You have successfully denoted the amount of Rs. '.$gift_rupees. 'to '.$ngo_text.'Ngo through braingroom.com';
           }
          $this->set('status',$status);
          $this->set('txnid',$txnid);
          $this->set('book_id',$book_id);
          $this->set('firstname',$firstname);
          $this->set('class_img',$class_img);
          $this->set('email',$gift_email_id);
          $this->set('text_msg',$text_msg);    
         
          
          $this->set('status',$status);
          $this->set('txnid',$txnid);
          $this->set('book_id',$book_id);
          $this->set('firstname',$firstname);
          $this->set('class_img',$class_img);
          $this->set('email',$gift_email_id);
           
       //}         
}
}
/* ============================ Start Rohit Gift Section =====================*/
    public function savegiftCard(){
      
          $this->autoRender = false;
          $user=$this->Session->read('User');
          $price = 0;
          //print_r($_POST);
          if(!empty($user)){
          
              $user_id = $user['UserMaster']['id'];
              $this->request->data['user_id']=$user_id;
          }

            $session_id = uniqid('gift_');
            $TramID = array();
                        $TramID['GiftCupan']['term_id'] = $session_id;
                        $this->Session->write('term_id',$TramID);

                        $total_post              = count($_POST);
                        @$class_id               = $_POST['class_id'];
                        @$gift_card_id           = $_POST['gift_card_id'];
                        $email                   = $_POST['email_id1'];
                        $reciepent_name          = $_POST['reciepent_name1'];
                        @$classprice             = $_POST['class_Price'];
                        $comment1                = $_POST['comment1'];
                        $gift_type               = $_POST['gift_type'];
                        $gift_by                 = $_POST['gift_by'];
                        @$gift_card_segement_id  = $_POST['gift_card_segement_id'];
                        //print_r($reciepent_name);
                        if($class_id==''){

                          $class_id=0;
                        }
                        if($gift_card_id==''){

                          $gift_card_id='';
                        }
                      $total_email = count($email);
                     //echo $classprice;
                      for ($k=1;$k<=1;$k++){ 
                          
                              for($i=0; $i<$total_email; $i++){

                                          $email_id        = $email[$i];
                                          $rec_name        = $reciepent_name[$i]; 
                                          $comment         = $comment1[$i];
                                          $add_date        = strtotime(date('Y-m-d H:i:s'));
                                          $NewDate         = Date('Y-m-d', strtotime("+45 days"));
                                          $NewDate         = strtotime(date($NewDate)); 
                                          @$class_price    = $classprice;
                                         
                                          $this->request->data['class_id']                = $class_id;
                                          $this->request->data['gift_card_id']            = $gift_card_id;
                                           $this->request->data['gift_card_segement_id']  = $gift_card_segement_id;
                                          $this->request->data['gift_type']               = $gift_type;
                                          $this->request->data['gift_by']                 = $gift_by;
                                          $this->request->data['email']                   = $email_id;
                                          $this->request->data['term_id']                 = $session_id;
                                           $this->request->data['rupees']                 = $class_price;
                                          $this->request->data['available_amt']           = $class_price;
                                          $this->request->data['reciepent_name']          = $rec_name;
                                          $this->request->data['no_of_coupons']           =  444;
                                          
                                          $this->request->data['exp_date']                = $NewDate;
                                          $this->request->data['add_date']                = $add_date;
                                          $this->request->data['modify_date']             = $add_date;
                                          $this->GiftCupan->saveAll($this->request->data);
                                          $price = $price+$class_price;
                                  }

                echo $price;
                die;
             }
              
    }
	public function get_randon(){

			$randnum = rand(1111111111,9999999999);
		
			$this->loadModel('Ticket');
			
			$check = $this->Ticket->find('first',
				array(
					'conditions' => array(
						'OR' => array(
							'Ticket.start_code' => $randnum,
							'Ticket.end_code' => $randnum,
							'Ticket.ticket_id' => $randnum,
						),
					)
				)
			);
			if(!empty($check)){
					$this->get_randon();
			} else {
					return $randnum;
				}

		}
    public function saveCoupon(){

              $this->autoRender = false;
              $user=$this->Session->read('User');
              $user_id = $user['UserMaster']['id'];
              $amount =   $_POST['payment_amt'];
              $c_id            = $this->request->data['class_id'];
              $no_of_ticket    = $this->request->data['no_of_ticket'];
              $coupon_number   = $this->request->data['coupon_number'];
              $booking_id      = $this->request->data['booking_id'];
			  $tot_ticket      = $this->request->data['tot_ticket'];
              $coupon_number   = trim($coupon_number);
              $Coup_id = array();
                        $Coup_id['GiftCupan']['coupon_number'] = $coupon_number;
                        $Coup_id['GiftCupan']['price'] = $amount;
                        $this->Session->write('coup_id',$Coup_id);

               $class_cat_id_by_cl_id = $this->VendorClasse->find('first',array('conditions'=>array('VendorClasse.id'=>$c_id),'fields'=>array('VendorClasse.category_id')));

               $class_cat_id_by_gift_id = $this->GiftCupan->find('first', array('conditions'=>array('GiftCupan.no_of_coupons'=>$coupon_number,'status'=>1),'fields'=>array('GiftCupan.cat_id')));
              
              //print_r($class_cat_id_by_gift_id);
              //die;
                if(!empty($class_cat_id_by_cl_id)){

                  $cl_cat_id = $class_cat_id_by_cl_id['VendorClasse']['category_id'];
                }
                if(!empty($class_cat_id_by_gift_id)){

                    $gift_cat_id = $class_cat_id_by_gift_id['GiftCupan']['cat_id'];
                  
                }
                if($gift_cat_id==''){

                    echo 5;
                        die;
                }
                
                if($gift_cat_id!=0){
                    if($cl_cat_id!=$gift_cat_id){

                        echo 5;
                        die;
                    }
              }

              $find_class_max_price = $this->VendorClasse->find('first', array('conditions'=>array('VendorClasse.user_id'=>$user_id)));
              /*echo "<pre>";
              print_r($find_class_max_price);
              echo "</pre>";*/
              $max_sheet = $find_class_max_price['VendorClasse']['max_ticket_available'];

              //die;
              $this->request->data['user_id']=$user_id;
              $date = date("d-m-Y H:i:s");
              $timestamp = strtotime($date);
              $this->request->data['transaction_date']= $timestamp;
              //$this->request->data['class_id']=$class_id;
              //echo 'hi';
              $find_cupan = $this->GiftCupan->find('first', array('conditions'=>array('no_of_coupons'=>$coupon_number,'status'=>1)));


                  if(empty($find_cupan)){
                    echo 4;
                    die;
                  }

              else if(!empty($find_cupan)){

                        $expdate = $find_cupan['GiftCupan']['exp_date'];
                        $c_date = date("d-m-Y");
                        $c_timestamp = strtotime($c_date);
                        //$adddate = $find_cupan['GiftCupan']['add_date'];
                        if($expdate < $c_timestamp){
                              echo 6;
                              exit();
                               }
                          $cupan_rupess = $find_cupan['GiftCupan']['available_amt'];
                         $cupanid = $find_cupan['GiftCupan']['id'];
                         $this->request->data['cupon_id']=$cupanid; 
                         if($cupan_rupess<$amount){

                             echo 2;
                             die;
                        }
                      }
                  else if($no_of_ticket>$max_sheet){
                    
                     echo 3;
                     die;
                  }
                  if($this->TransactionHistorie->save($this->request->data)){
                    
                      /*echo 'abil_amt-> :'.$cupan_rupess;
                      echo "</br>";
                      echo 'total_tickat-- > :'.$amount;
                      echo "</br>";
                      $abl_amt = $cupan_rupess-$amount;
                      echo 'last amount--> :'.$abl_amt;

                      echo "</br>";
                      die;*/
                     //$cupan_rupess = $cupan_rupess-$amount;
					 $this->log('tickets');
				$last_id = $this->TransactionHistorie->getLastInsertID();	 
				$this->log($last_id);
				$tick =array();
		$cookie = htmlspecialchars_decode($tot_ticket);
		$tick = json_decode($cookie, true);
		$this->loadModel('Ticket');
		
		foreach($tick as $key => $val){
			for($i=0;$i<$val;$i++){
			$this->request->data['Ticket'][$key] = $key;
						$this->Ticket->create();
						$this->request->data['Ticket'][$i]['vendor_classe_id'] = $c_id;
						$this->request->data['Ticket'][$i]['user_id'] = $user_id;
						$this->request->data['Ticket'][$i]['transaction_history_id'] = $last_id;
						$this->request->data['Ticket'][$i]['ticket_id'] = $this->get_randon();
						$this->request->data['Ticket'][$i]['start_code'] = $this->get_randon();
						$this->request->data['Ticket'][$i]['end_code'] = $this->get_randon();
						$this->Ticket->save($this->request->data['Ticket'][$i]);
			}
		}
		
		$this->loadModel('Ticket');
		$z = $this->Ticket->find('all', array(
			'conditions' => array('Ticket.transaction_history_id'=>$last_id),
			
			
			));
		$this->log($z);	
		 	require ('sendgrid-php/vendor/autoload.php');
            require ('sendgrid-php/lib/SendGrid.php'); 
			 $booking_status_mail ='';            

$booking_status_mail.='<table border="1" cellpadding="0" cellspacing="0" width="100%">

    <tr>
     <td>
       	 <img src="http://www.braingroom.com/img/logo.jpg"/>    
                                                      
     </td>
    </tr>
    <tr>

     <td>
      
      <table border="1" cellpadding="0" cellspacing="0" width="100%">

      <tr>
<td>Ticket ID
</td>
<td>Class Name
</td>
<td>Start Code
</td>
<td>End Code
</td>
<td>Level
</td>
</tr>
<tr>';
;
foreach($z as $x){
$booking_status_mail.= '<tr>
    <td>'.$x['Ticket']['ticket_id'].'</td>
    <td>'.$x['VendorClasse']['class_topic'].'</td>
    <td>'.$x['Ticket']['start_code'].'</td>
    <td>'.$x['Ticket']['end_code'].'</td>
    <td>';
			if($x['VendorClasseLevelDetail']['level_id'] == 1){
                   $booking_status_mail.= '<p>Begineer - Level '.$x['VendorClasseLevelDetail']['expert_level_id'];
				}
			else if($x['VendorClasseLevelDetail']['level_id'] == 2){
					$booking_status_mail.= '<p>Intermediate - Level '.$x['VendorClasseLevelDetail']['expert_level_id'];
				}
				else{
					$booking_status_mail.= '<p>Expert - Level '.$x['VendorClasseLevelDetail']['expert_level_id'];
				}
   $booking_status_mail.= ' </td>';
	}
  $booking_status_mail.='</tr></table>';

$booking_status_mail.='<tr>
    <td style="font-size: 0; line-height: 0;" width="20">&nbsp;
   <p>Note - You have to give the above mentioned start verification code when the class starts and end verification code when the class ends to the tutor. Braingroom will take care of any issues raised regarding clasess only if you avail right codes in the first place.</p>
  </td>
    </tr>
   </table>';
$this->sendMail('bookClass_status',$user['UserMaster']['email'],$booking_status_mail);
		  
		  
                      $abl_amt = $cupan_rupess-$amount;
                      $max_ticket_available = $max_sheet-$no_of_ticket;


                      $this->VendorClasse->query("UPDATE bg_vendor_classes SET  max_ticket_available='".$max_ticket_available."' WHERE id='".$c_id."' and user_id='".$user_id."'");
                      $this->GiftCupan->query("UPDATE bg_gift_cupans SET  available_amt='".$abl_amt."',booking_id='".$booking_id."' WHERE no_of_coupons='".$coupon_number."'");
                      //$find_class_max_price = $this->VendorClasse->find('first', array('conditions'=>array('user_id'=>$user_id,'fields' => array('VendorClasse.max_ticket_available'))));
                    echo 1;
                    die;
                }
}


    public function savegiftCoupon(){ 
          $this->autoRender = false; 
          $user=$this->Session->read('User');
          $price = 0;
          if(!empty($user)){
          
              $user_id = $user['UserMaster']['id'];
              $this->request->data['user_id']=$user_id;
          }
          $session_id = uniqid('gift_');
          $TramID = array();
          $TramID['GiftCupan']['term_id'] = $session_id;
          $this->Session->write('term_id',$TramID);
          $total_post  = count($_POST);

          $denmo       = $_POST['denomination'];
          $coupons     = $_POST['no_coupons'];
          $email       = $_POST['gift_email'];
          $cat_id      = $_POST['cat_id'];
          $gift_type   = $_POST['gift_type'];
          $gift_by     = $_POST['gift_by']; 
          $total_coupons = count($coupons);
           //echo $total_coupons;
          for($i=0; $i<$total_coupons; $i++){

              $cupan_no  = $coupons[$i];
             /* echo $cupan_no;
              die('Test for no of coupon');*/

              for($j=0;$j<$cupan_no;$j++){

                      $denmo_no  = $denmo[$i];
                      $email_id  = $email;
                      $catid    = $cat_id[$i];
                      $cupan_id  = rand(10000,100000);
                      $add_date=strtotime(date('Y-m-d H:i:s'));
                      $this->request->data['add_date']=$add_date;
                      $this->request->data['modify_date']=$add_date;
                      $NewDate = Date('Y-m-d', strtotime("+45 days"));
                      $NewDate = strtotime(date($NewDate));
                      $this->request->data['gift_type']           = $gift_type;
                      $this->request->data['gift_by']             = $gift_by;
                      $this->request->data['rupees']              = $denmo_no;
                      $this->request->data['available_amt']       = $denmo_no; 
                      $this->request->data['no_of_coupons']       = $cupan_id;
                      $this->request->data['email']               = $email_id;
                      $this->request->data['term_id']             = $session_id;
                      $this->request->data['cat_id']              = $catid;

                      $this->request->data['add_date']            = $add_date;
                      $this->request->data['exp_date']            = $NewDate;
                      $this->request->data['modify_date']         = $add_date;
                      $this->request->data['mail_option_type']    = 1;
                      $this->GiftCupan->saveAll($this->request->data);
                      $price = $price+$denmo_no;
                  }
          }
            echo $price;
                die;
    }
    public function savegiftCoupon2(){
      
          $this->autoRender = false;
          $user=$this->Session->read('User');
          $price = 0;
          
          if(!empty($user)){
          
              $user_id = $user['UserMaster']['id'];
              $this->request->data['user_id']=$user_id;
          }

            $session_id = uniqid('gift_');
            $TramID = array();
                        $TramID['GiftCupan']['term_id'] = $session_id;
                        $this->Session->write('term_id',$TramID);

                        $total_post              = count($_POST);
                        $denmo                   = $_POST['denomination1'];
                        $coupons                 = $_POST['no_coupons1'];
                        $email                   = $_POST['email_id1'];
                        @$cat_id                 = $_POST['cat_id1'];
                        $reciepent_name          = $_POST['reciepent_name1'];
                        $comment1                = $_POST['comment1'];
                        $gift_type               = $_POST['gift_type'];
                        $gift_by                 = $_POST['gift_by'];
                        @$gift_card_segement_id  = $_POST['gift_card_segement_id'];   
                        $total_coupons = count($coupons);
          
                      for($i=0; $i<$total_coupons; $i++){

                              $cupan_no  = $coupons[$i];
                              for($j=0;$j<$cupan_no;$j++){

                                      $denmo_no        = $denmo[$i];
                                      $email_id        = $email[$i];
                                      $rec_name  = $reciepent_name[$i];
                                      @$catid           = $cat_id[$i];
                                      $comment         = $comment1[$i];
                                      $cupan_id  = rand(10000,100000);
                                      if($catid==''){
                                        $catid=0;
                                      }

                                      $add_date=strtotime(date('Y-m-d H:i:s'));
                                      $this->request->data['add_date']=$add_date;
                                      $this->request->data['modify_date']=$add_date;
                                      $NewDate = Date('Y-m-d', strtotime("+45 days"));
                                      $NewDate = strtotime(date($NewDate));
                                      $this->request->data['gift_card_segement_id']   = $gift_card_segement_id;
                                      $this->request->data['gift_type']               = $gift_type;
                                      $this->request->data['gift_by']                 = $gift_by;
                                      $this->request->data['rupees']                  = $denmo_no;
                                      $this->request->data['available_amt']           = $denmo_no; 
                                      $this->request->data['no_of_coupons']           = $cupan_id;
                                      $this->request->data['email']                   = $email_id;
                                      $this->request->data['term_id']                 = $session_id;
                                      $this->request->data['cat_id']                  = $catid;
                                      $this->request->data['reciepent_name']          = $rec_name;
                                      $this->request->data['exp_date']                = $NewDate;
                                      $this->request->data['add_date']                = $add_date;
                                      $this->request->data['modify_date']             = $add_date;
                                      $this->request->data['mail_option_type']        = 2;
                                      
                                      $this->GiftCupan->saveAll($this->request->data);
                                      $price = $price+$denmo_no;
                                  }
                    }
            echo $price;
              die;
    }

    public function saveNgo(){
      
              $this->autoRender = false;
              $user=$this->Session->read('User');
              $price = 0;
              if(!empty($user)){
              
                  $user_id = $user['UserMaster']['id'];
                  $this->request->data['user_id']=$user_id;
              }

              $session_id = uniqid('gift_');
              $TramID = array();
                        $TramID['GiftCupan']['term_id'] = $session_id;
                        $this->Session->write('term_id',$TramID);

                        $denmo                   = $_POST['denomination1'];
                        $ngo_id                  = $_POST['get_ngo_na'];
                        $gift_card_id            = $_POST['card_id'];
                        $coupons                 = $_POST['no_coupons1'];
                        $mobile                  = $_POST['mobile'];
                        $email                   = $_POST['email_id1'];
                        @$cat_id                 = 0;
                        $reciepent_name          = $_POST['reciepent_name1'];
                        $comment1                = $_POST['comment1'];
                        $gift_type               = $_POST['gift_type'];
                        $gift_by                 = $_POST['gift_by'];
                        @$gift_card_segement_id  = $_POST['gift_card_segement_id'];
                         $add_date=strtotime(date('Y-m-d H:i:s'));
                         $this->request->data['add_date']=$add_date;
                         $this->request->data['modify_date']=$add_date; 
                         $NewDate = Date('Y-m-d', strtotime("+45 days"));
                         $NewDate = strtotime(date($NewDate));


                         $this->request->data['ngo_id']                  = $ngo_id;
                         $this->request->data['gift_card_segement_id']   = $gift_card_segement_id;
                         $this->request->data['gift_card_id']            = $gift_card_id;
                         $this->request->data['gift_by']                 = $gift_by;
                         $this->request->data['rupees']                  = $denmo;
                         $this->request->data['available_amt']           = $denmo; 
                         $this->request->data['no_of_coupons']           = $coupons;
                         $this->request->data['email']                   = $email;
                         $this->request->data['mobile']                  = $mobile; 
                         $this->request->data['term_id']                 = $session_id;
                         $this->request->data['cat_id']                  = $cat_id;
                         $this->request->data['reciepent_name']          = $reciepent_name;
                         $this->request->data['exp_date']                = $NewDate;
                         $this->request->data['add_date']                = $add_date;
                         $this->request->data['modify_date']             = $add_date;
                         $this->request->data['mail_option_type']        = 2;
                        
                         $this->GiftCupan->saveAll($this->request->data);
                         $price = $price+$denmo;
                         echo $price;
                          die;
            }

     public function findGiftclass(){

              $this->autoRender = false;
              $segment_id   = $this->request->data['segment_id'];
             
              $find_gift_class = $this->VendorClasse->query("SELECT bg_vendor_classes.id,
                                                                   bg_vendor_classes.id,
                                                                   bg_vendor_classes.class_topic,
                                                                   bg_vendor_classes.class_summary,
                                                                   bg_vendor_classes.class_timing_id,  
                                                                   bg_vendor_classes.class_duration,
                                                                   bg_vendor_classes.location, 
                                                                   bg_vendor_classes.price_per_head,
                                                                   bg_vendor_classes.no_of_session,
                                                                   bg_vendor_classes.upload_class_photo,
                                                                   bg_vendor_classes.age_group,
                                                                   bg_vendor_classes.status,
                                                                   bg_class_schedules.id,
                                                                   bg_class_schedules.session_date,
                                                                   bg_user_masters.id,
                                                                   bg_user_masters.first_name,
                                                                   bg_vendor_classe_level_details.price 
                                                                    FROM bg_vendor_classes
                                                                    INNER JOIN bg_vendor_classe_level_details
                                                                    ON bg_vendor_classes.id = bg_vendor_classe_level_details.vendor_class_id 
                                                                    LEFT JOIN bg_user_masters
                                                                    ON bg_user_masters.id = bg_vendor_classes.user_id
                                                                    LEFT JOIN bg_class_schedules
                                                                    ON bg_vendor_classes.id  = bg_class_schedules.class_id
                                                                    where bg_vendor_classes.segment_id Like '%$segment_id%' Group by bg_vendor_classe_level_details.vendor_class_id");
                              echo "<div class='col-xs-12 col-sm-12 segment_exist20' id='gift_card_segement_name'></div>";
                              /*echo "<pre>";
                              print_r($find_gift_class);
                              echo "</pre>";
                              die;*/
                              if(empty($find_gift_class)){

                                 echo "<div class='col-xs-12 col-sm-12 no_exit_classes20'>No Class Exists</div>";
                                 die;
                              }
                              $class_list='';
                           
                              foreach ($find_gift_class as $key => $value_class) {

                                    $id                   = $value_class['bg_vendor_classes']['id'];
                                    $class_topic          = $value_class['bg_vendor_classes']['class_topic'];
                                    $upload_class_photo   = $value_class['bg_vendor_classes']['upload_class_photo'];

                                    $class_summary        = $value_class['bg_vendor_classes']['class_summary'];
                                    $class_timing_id      = $value_class['bg_vendor_classes']['class_timing_id'];
                                    $class_duration       = $value_class['bg_vendor_classes']['class_duration'];
                                    $price_per_head       = $value_class['bg_vendor_classe_level_details']['price'];

                                    $session_date         = $value_class['bg_class_schedules']['session_date'];
                                    $session_time         = $value_class['bg_class_schedules']['session_time'];
                                             $uid         =   $value_class['bg_user_masters']['id'];
                                            $user_name    =   $value_class['bg_user_masters']['first_name'];
                                            $no_of_session    =   $value_class['bg_vendor_classes']['no_of_session'];
                                            if($upload_class_photo==''){
                                  $upload_class_photo = 'FFFFFF.png';
                                    }
                                    else{
                                    $upload_class_photo = $upload_class_photo.'.jpg';
                                  }
                                            

                                    if($class_timing_id=1){

                                        $class_name_type='Flexible';
                                        $time = $class_duration;
                                        $date = '';
                                         $date_time= '<div class="col-xs-12 col-sm-12 sr_2605_03_padding sr_serch_div_l_hite" style="margin-top: 5px; margin-bottom:5px;">
                                                      <img class="img-responsive" src="http://www.braingroom.com/img/fun&refreshment/clock.png" style="display: inline; width: 15px; margin-right: 12px;">
                                                      <span class="gift-city">Total Duration '.$time.'</span>&nbsp;&nbsp;<span>No of Sessions: '.$no_of_session.'</span><span>No of Sessions: 10</span>&nbsp;</div>';
                                    }
                                    else if($class_timing_id=2){

                                        $class_name_type='Fixed';
                                        $time = $session_time;
                                        $date = $session_date;

                                        $date_time= '<div class="col-xs-12 col-sm-12 sr_2605_03_padding sr_serch_div_l_hite">
                                           
                                          <span class="gift-city">
                                          <img class="img-responsive gift-calendar" src="http://www.braingroom.com/img/sideicon2.png">
                                          '.$date.'</span>
                                          <span class="gift-city">
                                          <img class="img-responsive gift-calendar" src="http://www.braingroom.com/img/fun&amp;refreshment/clock.png">
                                          '.$time.'</span>&nbsp;
                                          </div>';


                                    }
                                 $class_list.='<div style="opacity: 1; border-bottom:1px solid #b4a9a9;" class="col-sm-12 col-xs-12 sr_260501 padd_l_r scroll_box_display">
                                <div class="col-md-4 col-sm-4 col-xs-12 img-responsive padd_l_r">
                                <input type="hidden" name="" id="get_class_price_'.$id.'" value="'.$price_per_head.'"/>
                                <input type="hidden" name="" id="get_class_name_'.$id.'" value="'.$class_topic.'"/>
                            <div class="col-xs-12 col-sm-12 fun01_img_w">
                              <span class="flexible-fixed-fun">'.$class_name_type.'</span>
                              <span class="image_price12-fun pull-right-fun" style="color:white">₹'.$price_per_head.'</span><a href="#">
                              <img src="http://www.braingroom.com/img/Vendor/class_image/'.$upload_class_photo.'"class="imgresponsive img-thumbnail" alt="'.$upload_class_photo.'">
                            </a>
                            </div></div>
                            <div class="col-md-8 col-sm-8 col-xs-12 text_res sr_2605_03_padding">
                             <div class="col-xs-12 col-sm-12 sr_2605_06 sr_2605_06_textLorem021">
                                <div class="hathyga col-xs-12 col-sm-12">'.$class_topic.'<span class="pull-right">
                                        <div class="col-xs-12 col-sm-12 sr_2605_03_padding sr_serch_div_l_hite sr_class_acc_div padd_l_r" style="margin-bottom:7px;">
                                            <div class="row">
                                  <img class="img-responsive" style="display: inline; margin-right: 5px;" src="http://www.braingroom.com/img/fun&refreshment/user.png">
                                                <span class="city">
                                                <strong> By :</strong> '.$user_name.'</span>
                                            </div>
                                        </div>
                                   
                                    </span>
                              </div></div>
                              <div class="col-xs-12 col-sm-12 sr_2605_03_padding sr_serch_div_l_hite">
                                  <img class="img-responsive" style="display: inline; margin-top: -10px;  width: 20px; margin-right: 5px;" src="http://www.braingroom.com/img/fun&refreshment/location.png">
                                <span class="city">Madipakkam</span>
                                <img src="http://www.braingroom.com/img/8.jpg" class="pull-right star" style="height: 20px;">
                                </div>'.$date_time.'<div class="col-xs-12 col-sm-12 sr_2605_03_padding sr_2605_06_textLorem sr_serch_div_l_hite">
                                  <img class="img-responsive" style="display: inline; margin-right: 5px; width: 10px; margin-top: -5px;" src="http://www.braingroom.com/img/fun&refreshment/information.png">&nbsp;&nbsp; 
                                  <p class="comment more city text-justify"> LearnKeyboard  from Spark Dance Academy who has 18 years of experinece.Our academy is the best music training institute with best tutors.<a href="" class="morelink">more</a></p>
                                </div>
                                <div class="col-xs-12 col-sm-12">
                                  <span>Age Group: <?php echo $age_group; ?></span>
                                </div>
                                <div class="col-xs-12 col-sm-12">
                                <span>Other Localities:Madipakkam</span>
                                </div>
                                <div class="col-xs-12 col-sm-12 sr_2605_03_padding">
                                          <a href="#" class="btn gift-this-butt" id="" onclick="show_gift_form('.$id.');">Gift This Class</a>
                                        </div>
                                </div></div>';
                               echo @$class_list;
                               
                        }
                         die;
    }

    public function findGiftclassforngo(){

              $this->autoRender = false;
              $ngo_card_id = $this->request->data['ngo_card_id'];
              $seg_val_id = '';
              /*echo $ngo_card_id;
              die;*/
              $segment_data     = $this->GiftCardSegment->find('all',array('conditions'=>array(
                                                           'GiftCardSegment.gift_card_id'=>$ngo_card_id,
                                                           'GiftCardSegment.status'=>1),'fields'=>array('segment_id')));
              
              $i=1;
              $class_list='';
              $get_seg_id_h='';
              echo "<div class='col-xs-12 col-sm-12 segment_exist20' id='gift_card_segement_name'>View All Segment Classes</div>";
              foreach ($segment_data as $key => $find_seg_value) {
                
                $get_seg_id = $find_seg_value['GiftCardSegment']['segment_id'];

                 //echo $get_seg_id;
                
                /*if($i!=1){
                $seg_val_id.= ',';
              }
                $seg_val_id.= $get_seg_id;
                $i++;
              
              }*/
              //echo $seg_val_id;
              //die;
             
              $find_gift_class = $this->VendorClasse->query("SELECT bg_vendor_classes.id,
                                                                   bg_vendor_classes.id,
                                                                   bg_vendor_classes.class_topic,
                                                                   bg_vendor_classes.class_summary,
                                                                   bg_vendor_classes.class_timing_id,  
                                                                   bg_vendor_classes.class_duration,
                                                                   bg_vendor_classes.location, 
                                                                   bg_vendor_classes.price_per_head,
                                                                   bg_vendor_classes.no_of_session,
                                                                   bg_vendor_classes.upload_class_photo,
                                                                   bg_vendor_classes.age_group,
                                                                   bg_vendor_classes.status,
                                                                   bg_class_schedules.id,
                                                                   bg_class_schedules.session_date,
                                                                   bg_user_masters.id,
                                                                   bg_user_masters.first_name,
                                                                   bg_vendor_classe_level_details.price 
                                                                    FROM bg_vendor_classes
                                                                    INNER JOIN bg_vendor_classe_level_details
                                                                    ON bg_vendor_classes.id = bg_vendor_classe_level_details.vendor_class_id 
                                                                    LEFT JOIN bg_user_masters
                                                                    ON bg_user_masters.id = bg_vendor_classes.user_id
                                                                    LEFT JOIN bg_class_schedules
                                                                    ON bg_vendor_classes.id  = bg_class_schedules.class_id
                                                                    where bg_vendor_classes.segment_id like '%$get_seg_id%' 
                                                                    Group by bg_vendor_classe_level_details.vendor_class_id");
      
                              
                              /*echo "<pre>";
                              print_r($find_gift_class);
                              echo "</pre>";*/
                              //die;
                              foreach ($find_gift_class as $key => $value_class) {

                                    $id                   = $value_class['bg_vendor_classes']['id'];
                                    $class_topic          = $value_class['bg_vendor_classes']['class_topic'];
                                    $upload_class_photo   = $value_class['bg_vendor_classes']['upload_class_photo'];

                                    $class_summary        = $value_class['bg_vendor_classes']['class_summary'];
                                    $class_timing_id      = $value_class['bg_vendor_classes']['class_timing_id'];
                                    $class_duration       = $value_class['bg_vendor_classes']['class_duration'];
                                    $price_per_head       = $value_class['bg_vendor_classe_level_details']['price'];

                                    $session_date         = $value_class['bg_class_schedules']['session_date'];
                                    $session_time         = $value_class['bg_class_schedules']['session_time'];
                                    $uid                  =   $value_class['bg_user_masters']['id'];
                                            $user_name    =   $value_class['bg_user_masters']['first_name'];
                                            $no_of_session    =   $value_class['bg_vendor_classes']['no_of_session'];
                                if($upload_class_photo==''){
                                  $upload_class_photo = 'FFFFFF.png';
                                    }
                                    else{
                                    $upload_class_photo = $upload_class_photo.'.jpg';
                                  }
                                    if($class_timing_id=1){

                                        $class_name_type='Flexible';
                                        $time = $class_duration;
                                        $date = '';
                                        $date_time= '<div class="col-xs-12 col-sm-12 sr_2605_03_padding sr_serch_div_l_hite" style="margin-top: 5px; margin-bottom:5px;">
                                                      <img class="img-responsive" src="http://www.braingroom.com/img/fun&refreshment/clock.png" style="display: inline; width: 15px; margin-right: 12px;">
                                                      <span class="gift-city">Total Section '.$time.'</span>&nbsp;&nbsp;<span>No of Sessions: '.$no_of_session.'</span>&nbsp;</div>';
                                    }
                                    else if($class_timing_id=2){

                                        $class_name_type='Fixed';
                                        $time = $session_time;
                                        $date = $session_date;

                                        $date_time= '<div class="col-xs-12 col-sm-12 sr_2605_03_padding sr_serch_div_l_hite">
                                           
                                          <span class="gift-city">
                                          <img class="img-responsive gift-calendar" src="http://www.braingroom.com/img/sideicon2.png">
                                          '.$date.'</span>
                                          <span class="gift-city">
                                          <img class="img-responsive gift-calendar" src="http://www.braingroom.com/img/fun&amp;refreshment/clock.png">
                                          '.$time.'</span>&nbsp;
                                          </div>';


                                    }
                                $class_list.='<div style="opacity: 1; border-bottom:1px solid #b4a9a9;" class="col-sm-12 col-xs-12 sr_260501 padd_l_r scroll_box_display">
                                <div class="col-md-4 col-sm-4 col-xs-12 img-responsive padd_l_r">
                                <input type="hidden" name="" id="get_class_price_'.$id.'" value="'.$price_per_head.'"/>
                                <input type="hidden" name="" id="get_class_name_'.$id.'" value="'.$class_topic.'"/>
                            <div class="col-xs-12 col-sm-12 fun01_img_w">
                              <span class="flexible-fixed-fun">'.$class_name_type.'</span>
                              <span class="image_price12-fun pull-right-fun" style="color:white">₹'.$price_per_head.'</span><a href="#">
                              <img src="http://www.braingroom.com/img/Vendor/class_image/'.$upload_class_photo.'"class="imgresponsive img-thumbnail" alt="'.$upload_class_photo.'">
                            </a>
                            </div></div>
                            <div class="col-md-8 col-sm-8 col-xs-12 text_res sr_2605_03_padding">
                             <div class="col-xs-12 col-sm-12 sr_2605_06 sr_2605_06_textLorem021">
                                <div class="hathyga col-xs-12 col-sm-12">'.$class_topic.'<span class="pull-right">
                                        <div class="col-xs-12 col-sm-12 sr_2605_03_padding sr_serch_div_l_hite sr_class_acc_div padd_l_r" style="margin-bottom:7px;">
                                            <div class="row">
                                  <img class="img-responsive" style="display: inline; margin-right: 5px;" src="http://www.braingroom.com/img/fun&refreshment/user.png">
                                                <span class="city">
                                                <strong> By :</strong> '.$user_name.'</span>
                                            </div>
                                        </div>
                                   
                                    </span>
                              </div></div>
                              <div class="col-xs-12 col-sm-12 sr_2605_03_padding sr_serch_div_l_hite">
                                  <img class="img-responsive" style="display: inline; margin-top: -10px;  width: 20px; margin-right: 5px;" src="http://www.braingroom.com/img/fun&refreshment/location.png">
                                <span class="city">Madipakkam</span>
                                <img src="http://www.braingroom.com/img/8.jpg" class="pull-right star" style="height: 20px;">
                                </div>'.$date_time.'<div class="col-xs-12 col-sm-12 sr_2605_03_padding sr_2605_06_textLorem sr_serch_div_l_hite">
                                  <img class="img-responsive" style="display: inline; margin-right: 5px; width: 10px; margin-top: -5px;" src="http://www.braingroom.com/img/fun&refreshment/information.png">&nbsp;&nbsp; 
                                  <p class="comment more city text-justify"> LearnKeyboard  from Spark Dance Academy who has 18 years of experinece.Our academy is the best music training institute with best tutors.<a href="" class="morelink">more</a></p>
                                </div>
                                <div class="col-xs-12 col-sm-12">
                                  <span>Age Group: <?php echo $age_group; ?></span>
                                </div>
                                <div class="col-xs-12 col-sm-12">
                                <span>Other Localities:Madipakkam</span>
                                </div>
                                <div class="col-xs-12 col-sm-12 sr_2605_03_padding">
                       <a href="'.HTTP_ROOT.'/classes/'.$class_topic.'\gift" class="btn gift-this-butt" id="" onclick="">Gift This Class</a>
                                        </div>
                                </div></div>';
                                   }
                                 }
                                 if($class_list==''){
                                  echo "<div class='col-xs-12 col-sm-12 no_exit_classes20'>No Class Exists</div>";
                                 }else{
                                 echo @$class_list;
                               }
                                  die;
    }

    public function createPaycode(){

          $this->autoRender = false;
      
          // Merchant key here as provided by Payu
          $MERCHANT_KEY = "hF6qmoBJ";

          // Merchant Salt as provided by Payu
          $SALT = "sBL86X9MpG";

          // End point - change to https://secure.payu.in for LIVE mode
          //$PAYU_BASE_URL = "https://test.payu.in";
          //$PAYU_BASE_URL = "https://secure.payu.in";

          $action = '';

          $posted = array();
          if(!empty($_POST)) {
                    //print_r($_POST);
          foreach($_POST as $key => $value) {    
              $posted[$key] = $value; 
            
              }
            }

          $formError = 0;

          if(empty($posted['txnid'])) {
            // Generate random transaction id
            $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
          } else {
            $txnid = $posted['txnid'];
          }
          $hash = '';
          // Hash Sequence
          $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
          if(empty($posted['hash']) && sizeof($posted) > 0) {
                  if(
                        empty($posted['key'])
                       /* || empty($posted['txnid'])*/
                        /*|| empty($posted['amount'])
                        || empty($posted['firstname'])
                        || empty($posted['email'])
                        || empty($posted['phone'])
                        || empty($posted['productinfo'])
                        || empty($posted['surl'])
                        || empty($posted['furl'])
                    || empty($posted['service_provider'])*/
                ) {
            $formError = 1;
          } else {
            //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
          $hashVarsSeq = explode('|', $hashSequence);
            $hash_string = '';  
          foreach($hashVarsSeq as $hash_var) {
              $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
              $hash_string .= '|';
            }

            $hash_string .= $SALT;


            $hash = strtolower(hash('sha512', $hash_string));
            //$action = $PAYU_BASE_URL . '/_payment';
            }
          } elseif(!empty($posted['hash'])) {
            $hash = $posted['hash'];
            //$action = $PAYU_BASE_URL . '/_payment';
          }
            echo $txnid;
            echo '*';
            echo $hash;
    } 

    public function findGiftsegment(){

              $this->autoRender = false;
              $gift_id = $this->request->data['gift_id'];
              $gift_card_in = $this->GiftCard->find('all', array('conditions' => array('GiftCard.id'=>$gift_id)));

              
              foreach ($gift_card_in as $key => $value_caed){

                  $id           = $value_caed['GiftCard']['id'];
                  $title        = $value_caed['GiftCard']['title'];
                  $description  = $value_caed['GiftCard']['description'];
                  $gift_image   = $value_caed['GiftCard']['gift_image'];

                  $list_gift_cat='';
                   $list_gift_cat.='<section class="gift-section">
                                  <div class="col-md-4 col-sm-4 col-xs-12 add_top1">
                                      <div class="">
                                        <img src="'.HTTP_ROOT.'/img/gift_class/'.$gift_image.'" alt="CakePHP" class="img-responsive"><center class="gift-center">
                                          <img src="'.HTTP_ROOT.'/img/gift_class/gift_tag.png" alt="CakePHP" class="img-responsive img_post_head"></center>  
                                      </div>
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-12 add_top1">
                                      <div class="col-md-12 col-sm-12 col-xs-12 gift-i-care">'.$title.'</div>
                                      <div class="col-md-12 col-sm-12 col-xs-12 gift-someone">'.$description.'</div>
                                      
                      </div>
              </section>';

                }
                echo @$list_gift_cat;
                echo '**';

                $find_gift_segment = $this->ClassSegment->query("SELECT bg_class_segments.id,
                                                                      bg_class_segments.segment_name,
                                                                      bg_gift_card_segments.id
                                                                      FROM bg_gift_card_segments, bg_class_segments
                                                                      WHERE bg_class_segments.id = bg_gift_card_segments.segment_id
                                                                      AND bg_gift_card_segments.gift_card_id ='$gift_id'");
                        
                            $segment_list='';
                            $i=1;
                            $j=1;
                            foreach ($find_gift_segment as $key => $value) {

                              $seg_name = $value['bg_class_segments']['segment_name'];
                              $seg_id   = $value['bg_class_segments']['id'];
                              //echo $seg_name;
                              if($i==1){

                                     $first_seg_id = $seg_id;
                                     echo $first_seg_id;
                                     echo '**';
                                   }
                                   //$i/2
                                   if($j%2==0){
                                    $random_color = '#4a235a';
                                  }
                                  else
                                  {
                                     $random_color = '#148f77';

                                  }
                                  $cat_bg_color ='background-color:'.$random_color.'; !important';
                                  $segment_list.='<div class="col-md-3 col-sm-3 col-xs-4 gift-pad-r m_buttom">
                                    <div class="btn  gift-fitness_segment" style="'.$cat_bg_color.'"onclick="show_class('.$seg_id.');">'.$seg_name.'</div>
                                  </div><input type="hidden" value="'.$seg_name.'" id="s_na'.$seg_id.'">';
                                  $i++;
                                  $j++;
                            }
                            echo @$segment_list;
                            //die;      
    }

public function buyFailure(){

    //$this->autoRender = false;
    $this->layout='book_layout';
    $status     = $_POST["status"];
    $amount     = $_POST["amount"];
    $txnid      = $_POST["txnid"];
    $firstname  = $_POST["firstname"];
    
    $posted_hash=$_POST["hash"];
    $key=$_POST["key"];
    $salt="GQs7yium";
    $cupan_term_id = $this->Session->read('term_id');
    $find_term_id = $cupan_term_id['GiftCupan']['term_id'];
    $cupan_term_id='';
    $book_id = $uuid=uniqid();

    $this->request->data['payment_amt']        = $amount;
    $this->request->data['transaction_id']     = $txnid;
    $this->request->data['booking_id']         = $book_id;
    $this->request->data['status']             = 1;
    $this->request->data['payment_from_class'] = 2;
    $date = date("d-m-Y H:i:s");
    $timestamp = strtotime($date);
    $this->request->data['transaction_date']= $timestamp;
    
    $user = $this->Session->read('User');
    $user_id = $user['UserMaster']['id'];
    $this->request->data['user_id'] = $user_id;


    if($this->TransactionHistorie->save($this->request->data)){
    
        $this->GiftCupan->query("UPDATE bg_gift_cupans SET  bg_gift_cupans.booking_id='$book_id',
                                                            bg_gift_cupans.status='1' WHERE bg_gift_cupans.term_id='$find_term_id'");
         require ('sendgrid-php/vendor/autoload.php');
         require ('sendgrid-php/lib/SendGrid.php');

          //$email = 'rohitdtrm@gmail.com';
         $all_gift_cupan = $this->GiftCupan->find('all', array('conditions' => array('GiftCupan.term_id' =>$find_term_id,'GiftCupan.status'=>1),'group'=>'GiftCupan.email'));
         /*echo "<pre>";
         print_r($all_gift_cupan);
         echo "</pre>";
         die;*/
          //echo $find_term_id;

        foreach ($all_gift_cupan as $key => $value){

              $gift_email_id   = $value['GiftCupan']['email'];
              $gift_rupees     = $value['GiftCupan']['rupees'];
              $no_of_coupons   = $value['GiftCupan']['no_of_coupons'];
              $reciepent_name  = $value['GiftCupan']['reciepent_name'];
              $class_id        = $value['GiftCupan']['class_id'];
              $gift_card_id    = $value['GiftCupan']['gift_card_id'];
              $gift_by         = $value['GiftCupan']['gift_by'];
              $gift_type       = $value['GiftCupan']['gift_type'];
              $ngo_id          = $value['GiftCupan']['ngo_id']; 
              $no_of_coupons   = trim($no_of_coupons);

              
              $ngo_name_get = $this->Ngo->find('all', array('conditions'=>array('Ngo.id'=>$ngo_id)));
               $ngo_email_id = $ngo_name_get['Ngo']['email'];
              
              
              $all_cat_by_gift = $this->Category->find('all', array('conditions' => array('Category.id' =>$cat_id,'Category.status'=>1),'fields'=>array('Category.id','Category.category_name')));
            
              $gift_cat_name = $all_cat_by_gift[0]['Category']['category_name'];
              if(empty($all_cat_by_gift)){
                $gift_cat_name='General';
              }
              
              $find_class_img  = $this->VendorClasse->find('all',array('conditions'=>array('VendorClasse.id' =>$class_id),'fields'=>array('VendorClasse.upload_class_photo','VendorClasse.class_topic')));
              if($gift_card_id!=''){
                $find_ngo_img  = $this->GiftCard->find('all',array('conditions'=>array('GiftCard.id' =>$gift_card_id),'fields'=>array('GiftCard.gift_image','GiftCard.title')));
              }
              
              //$share_text = array('gift_rupees'=>$gift_rupees,'no_of_coupons'=>$no_of_coupons,);
              if($no_of_coupons=='555'){
                  
                  $send_mail_html='<div>Hi &nbsp;'.$reciepent_name.'</div><br><div>You have denoted the amount of Rs &nbsp;'.$gift_rupees.' to NGO successfully.</div></br><hr>';
                  $this->sendMail('giftmailFailure',$ngo_email_id,$send_mail_html);
                }
                else if($no_of_coupons=='444'){
                  $class_name     = $find_class_img[0]['VendorClasse']['class_topic'];
                  
                  $send_mail_html='<div>Hi &nbsp;'.$reciepent_name.'</div><br><div>This is to inform you that '.$firstname.' have been gifted a card '.$class_name.'&nbsp;</div></br><hr>';
                  $this->sendMail('giftmailFailure',$gift_email_id,$send_mail_html);
                }
               
                 else if($reciepent_name!=''){

                  $all_gift_cupan_email = $this->GiftCupan->find('all', array('conditions' => array('GiftCupan.term_id' =>$find_term_id,'GiftCupan.status'=>1,'GiftCupan.email'=>$gift_email_id)));
                  foreach ($all_gift_cupan_email as $key => $value_email){



                    $gift_email_id_email   = $value_email['GiftCupan']['email'];
                    $gift_rupees_email     = $value_email['GiftCupan']['rupees'];
                    $no_of_coupons_email   = $value_email['GiftCupan']['no_of_coupons'];
                    $reciepent_name_email  = $value_email['GiftCupan']['reciepent_name'];
                    $class_id_email        = $value_email['GiftCupan']['class_id'];
                    $gift_card_id_email    = $value_email['GiftCupan']['gift_card_id'];
                    $gift_by_email         = $value_email['GiftCupan']['gift_by'];
                    $gift_type_email       = $value_email['GiftCupan']['gift_type'];
                    $cat_id_email          = $value_email['GiftCupan']['cat_id'];
                    $no_of_coupons_email   = trim($no_of_coupons);

                     $all_cat_by_gift = $this->Category->find('all', array('conditions' => array('Category.id' =>$cat_id_email,'Category.status'=>1),'fields'=>array('Category.id','Category.category_name')));
            
              $gift_cat_name = $all_cat_by_gift[0]['Category']['category_name'];
              if(empty($all_cat_by_gift)){
                $gift_cat_name='General';
              }
                    $send_mail_html.='<div>Category Name : &nbsp;&nbsp;'.$gift_cat_name.'</div></br><div>Coupon Amount &nbsp;&nbsp;'.$gift_rupees_email.'</div></br><div>Coupon Code &nbsp;&nbsp;:'.$no_of_coupons_email.'</div></br><hr>';
                    
                  //$send_mail_html='';
                   }
                    
                    $this->sendMail('giftmailFailure',$gift_email_id_email,$send_mail_html);
                    $send_mail_html='';
                 }
                else if($reciepent_name==''){

                  $all_gift_cupan_email = $this->GiftCupan->find('all', array('conditions' => array('GiftCupan.term_id' =>$find_term_id,'GiftCupan.status'=>1)));
                  foreach ($all_gift_cupan_email as $key => $value_email){

                    $gift_email_id_email   = $value_email['GiftCupan']['email'];
                    $gift_rupees_email     = $value_email['GiftCupan']['rupees'];
                    $no_of_coupons_email   = $value_email['GiftCupan']['no_of_coupons'];
                    $reciepent_name_email  = $value_email['GiftCupan']['reciepent_name'];
                    $class_id_email        = $value_email['GiftCupan']['class_id'];
                    $gift_card_id_email    = $value_email['GiftCupan']['gift_card_id'];
                    $gift_by_email         = $value_email['GiftCupan']['gift_by'];
                    $gift_type_email       = $value_email['GiftCupan']['gift_type'];
                    $cat_id_email          = $value_email['GiftCupan']['cat_id'];
                    $no_of_coupons_email   = trim($no_of_coupons);

                     $all_cat_by_gift = $this->Category->find('all', array('conditions' => array('Category.id' =>$cat_id_email,'Category.status'=>1),'fields'=>array('Category.id','Category.category_name')));
            
              $gift_cat_name = $all_cat_by_gift[0]['Category']['category_name'];
              if(empty($all_cat_by_gift)){
                $gift_cat_name='General';
              }
                    $send_mail_html.='<div>Category Name : &nbsp;&nbsp;'.$gift_cat_name.'</div></br><div>Coupon Amount &nbsp;&nbsp;'.$gift_rupees_email.'</div></br><div>Coupon Code &nbsp;&nbsp;:'.$no_of_coupons_email.'</div></br><hr>';
                    
                  //$send_mail_html='';
                   }
                    
                    $this->sendMail('giftmailFailure',$gift_email_id,$send_mail_html);
                    $send_mail_html='';

                  $send_mail_html.='<div>Category Name : &nbsp;&nbsp;'.$gift_cat_name.'</div></br><div>Coupon Amount &nbsp;&nbsp;'.$gift_rupees.'</div></br><div>Coupon Code &nbsp;&nbsp;:'.$no_of_coupons.'</div></br><hr>';
                  
                }
              }
                 
        if(isset($_POST["additionalCharges"])) {
         $additionalCharges=$_POST["additionalCharges"];
          $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$amount.'|'.$txnid.'|'.$key;
          
                    }
    else {    

        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$total_price;

         }
     $hash = hash("sha512", $retHashSeq);
     if($gift_by==1 and $gift_type==2){
          
          $class_img  = 'http://162.243.205.148/braingroom/img/gift_image/Card.png';
          $text_msg   = 'Cupon has booked through BrainGroom.com';
        }
        else if($gift_by==2 and $gift_type==2){
          $class_img  =  'http://162.243.205.148/braingroom/img/gift_image/Card.png';
          $text_msg   =  'Cupon has booked through BrainGroom.com';
        }
        else if($gift_by==1 and $gift_type==1){
          $class_img_find = $find_class_img[0]['VendorClasse']['upload_class_photo'];
          $class_name     = $find_class_img[0]['VendorClasse']['class_topic'];
          $class_img      = 'http://162.243.205.148/braingroom/img/Vendor/class_image/'.$class_img_find;
          $text_msg       =  $class_name.' class has booked through BrainGroom.com';
          
        }
        else if($gift_by==2 and $gift_type==1){
         
          $class_img_find = $find_class_img[0]['VendorClasse']['upload_class_photo'];
          $class_name     = $find_class_img[0]['VendorClasse']['class_topic'];
          $class_img      = 'http://162.243.205.148/braingroom/img/Vendor/class_image/'.$class_img_find;
          $text_msg       = $class_name.' class has booked through BrainGroom.com';
        }
         else if($gift_by==3 and $gift_type==1){
          $ngo_img_find   = $find_ngo_img[0]['GiftCard']['gift_image'];
          $ngo_text       = $find_ngo_img[0]['GiftCard']['title'];
          $class_img      = 'http://162.243.205.148/braingroom/img/gift_class/'.$ngo_img_find;
          $text_msg       = 'You have successfully denoted the amount of Rs. '.$gift_rupees. 'to '.$ngo_text.'Ngo through braingroom.com';
           }
          $this->set('status',$status);
          $this->set('txnid',$txnid);
          $this->set('book_id',$book_id);
          $this->set('firstname',$firstname);
          $this->set('class_img',$class_img);
          $this->set('email',$gift_email_id);
          $this->set('text_msg',$text_msg);
          
}
}
public function buySuccess(){ 

    //$this->autoRender = false;
    $this->layout='book_layout';
    $status     = $_POST["status"];
    $amount     = $_POST["amount"];
    $txnid      = $_POST["txnid"];
    $firstname  = $_POST["firstname"];
    
    $posted_hash=$_POST["hash"];
    $key=$_POST["key"];
    $salt="GQs7yium";
    $cupan_term_id = $this->Session->read('term_id');
    $find_term_id = $cupan_term_id['GiftCupan']['term_id'];
    $cupan_term_id='';
    $book_id = $uuid=uniqid();

    $this->request->data['payment_amt']        = $amount;
    $this->request->data['transaction_id']     = $txnid;
    $this->request->data['booking_id']         = $book_id;
    $this->request->data['status']             = 1;
    $this->request->data['payment_from_class'] = 2;
    $date = date("d-m-Y H:i:s");
    $timestamp = strtotime($date);
    $this->request->data['transaction_date']= $timestamp;
    
    $user = $this->Session->read('User');
    $user_id = $user['UserMaster']['id'];
    $this->request->data['user_id'] = $user_id;


    if($this->TransactionHistorie->save($this->request->data)){
    
        $this->GiftCupan->query("UPDATE bg_gift_cupans SET  bg_gift_cupans.booking_id='$book_id',
                                                            bg_gift_cupans.status='1' WHERE bg_gift_cupans.term_id='$find_term_id'");
         require ('sendgrid-php/vendor/autoload.php');
         require ('sendgrid-php/lib/SendGrid.php');

          //$email = 'rohitdtrm@gmail.com';
         $all_gift_cupan = $this->GiftCupan->find('all', array('conditions' => array('GiftCupan.term_id' =>$find_term_id,'GiftCupan.status'=>1),'group'=>'GiftCupan.email'));
         /*echo "<pre>";
         print_r($all_gift_cupan);
         echo "</pre>";
         die;*/
          //echo $find_term_id;

        foreach ($all_gift_cupan as $key => $value){

              $gift_email_id   = $value['GiftCupan']['email'];
              $gift_rupees     = $value['GiftCupan']['rupees'];
              $no_of_coupons   = $value['GiftCupan']['no_of_coupons'];
              $reciepent_name  = $value['GiftCupan']['reciepent_name'];
              $class_id        = $value['GiftCupan']['class_id'];
              $gift_card_id    = $value['GiftCupan']['gift_card_id'];
              $gift_by         = $value['GiftCupan']['gift_by'];
              $gift_type       = $value['GiftCupan']['gift_type'];
              $ngo_id          = $value['GiftCupan']['ngo_id']; 
              $no_of_coupons   = trim($no_of_coupons);

              
              $ngo_name_get = $this->Ngo->find('all', array('conditions'=>array('Ngo.id'=>$ngo_id)));
               $ngo_email_id = $ngo_name_get['Ngo']['email'];
              
              
              $all_cat_by_gift = $this->Category->find('all', array('conditions' => array('Category.id' =>$cat_id,'Category.status'=>1),'fields'=>array('Category.id','Category.category_name')));
            
              $gift_cat_name = $all_cat_by_gift[0]['Category']['category_name'];
              if(empty($all_cat_by_gift)){
                $gift_cat_name='General';
              }
              
              $find_class_img  = $this->VendorClasse->find('all',array('conditions'=>array('VendorClasse.id' =>$class_id),'fields'=>array('VendorClasse.upload_class_photo','VendorClasse.class_topic')));
              if($gift_card_id!=''){
                $find_ngo_img  = $this->GiftCard->find('all',array('conditions'=>array('GiftCard.id' =>$gift_card_id),'fields'=>array('GiftCard.gift_image','GiftCard.title')));
              }
              
              //$share_text = array('gift_rupees'=>$gift_rupees,'no_of_coupons'=>$no_of_coupons,);
              if($no_of_coupons=='555'){
                  
                  $send_mail_html='<div>Hi &nbsp;'.$reciepent_name.'</div><br><div>You have denoted the amount of Rs &nbsp;'.$gift_rupees.' to NGO successfully.</div></br><hr>';
                  $this->sendMail('giftmailFailure',$ngo_email_id,$send_mail_html);
                }
                else if($no_of_coupons=='444'){
                  $class_name     = $find_class_img[0]['VendorClasse']['class_topic'];
                  
                  $send_mail_html='<div>Hi &nbsp;'.$reciepent_name.'</div><br><div>This is to inform you that '.$firstname.' have been gifted a card '.$class_name.'&nbsp;</div></br><hr>';
                  $this->sendMail('giftmailFailure',$gift_email_id,$send_mail_html);
                }
                else if($reciepent_name!=''){
                  $all_gift_cupan_email = $this->GiftCupan->find('all', array('conditions' => array('GiftCupan.term_id' =>$find_term_id,'GiftCupan.status'=>1,'GiftCupan.email'=>$gift_email_id)));
                    foreach ($all_gift_cupan_email as $key => $value_email){

                    $gift_email_id_email   = $value_email['GiftCupan']['email'];
                    $gift_rupees_email     = $value_email['GiftCupan']['rupees'];
                    $no_of_coupons_email_r   = $value_email['GiftCupan']['no_of_coupons'];
                    $reciepent_name_email  = $value_email['GiftCupan']['reciepent_name'];
                    $class_id_email        = $value_email['GiftCupan']['class_id'];
                    $gift_card_id_email    = $value_email['GiftCupan']['gift_card_id'];
                    $gift_by_email         = $value_email['GiftCupan']['gift_by'];
                    $gift_type_email       = $value_email['GiftCupan']['gift_type'];
                    $cat_id_email          = $value_email['GiftCupan']['cat_id'];
                    $no_of_coupons_email   = trim($no_of_coupons);

                    $all_cat_by_gift = $this->Category->find('all', array('conditions' => array('Category.id' =>$cat_id_email,'Category.status'=>1),'fields'=>array('Category.id','Category.category_name')));
                    $gift_cat_name = $all_cat_by_gift[0]['Category']['category_name'];
                      if(empty($all_cat_by_gift)){
                        $gift_cat_name='General';
                      }
                          $send_mail_html.='<div>Category Name : &nbsp;&nbsp;'.$gift_cat_name.'</div></br><div>Coupon Amount &nbsp;&nbsp;'.$gift_rupees_email.'</div></br><div>Coupon Code &nbsp;&nbsp;:'.$no_of_coupons_email_r.'</div></br><hr>';
                      }
                      $this->sendMail('giftmailFailure',$gift_email_id_email,$send_mail_html);
                       $send_mail_html='';
                    
                 }
                 else if($reciepent_name==''){

                  $all_gift_cupan_email = $this->GiftCupan->find('all', array('conditions' => array('GiftCupan.term_id' =>$find_term_id,'GiftCupan.status'=>1)));
                      foreach ($all_gift_cupan_email as $key => $value_email){

                                $gift_email_id_email   = $value_email['GiftCupan']['email'];
                                $gift_rupees_email     = $value_email['GiftCupan']['rupees'];
                                $no_of_coupons_email_wr   = $value_email['GiftCupan']['no_of_coupons'];
                                $reciepent_name_email  = $value_email['GiftCupan']['reciepent_name'];
                                $class_id_email        = $value_email['GiftCupan']['class_id'];
                                $gift_card_id_email    = $value_email['GiftCupan']['gift_card_id'];
                                $gift_by_email         = $value_email['GiftCupan']['gift_by'];
                                $gift_type_email       = $value_email['GiftCupan']['gift_type'];
                                $cat_id_email          = $value_email['GiftCupan']['cat_id'];
                                $no_of_coupons_email   = trim($no_of_coupons);

                                $all_cat_by_gift = $this->Category->find('all', array('conditions' => array('Category.id' =>$cat_id_email,'Category.status'=>1),'fields'=>array('Category.id','Category.category_name')));
            
                                $gift_cat_name = $all_cat_by_gift[0]['Category']['category_name'];
                                if(empty($all_cat_by_gift)){
                                  $gift_cat_name='General';
                                }
                                $send_mail_html.='<div>Category Name : &nbsp;&nbsp;'.$gift_cat_name.'</div></br><div>Coupon Amount &nbsp;&nbsp;'.$gift_rupees_email.'</div></br><div>Coupon Code &nbsp;&nbsp;:'.$no_of_coupons_email_wr.'</div></br><hr>';
                              }
                    
                    $this->sendMail('giftmailFailure',$gift_email_id,$send_mail_html);
                    $send_mail_html='';

                  //$send_mail_html.='<div>Category Name : &nbsp;&nbsp;'.$gift_cat_name.'</div></br><div>Coupon Amount &nbsp;&nbsp;'.$gift_rupees.'</div></br><div>Coupon Code &nbsp;&nbsp;:'.$no_of_coupons.'</div></br><hr>';
                  
                }
              }
                 
        if(isset($_POST["additionalCharges"])) {
         $additionalCharges=$_POST["additionalCharges"];
          $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$amount.'|'.$txnid.'|'.$key;
          
                    }
    else {    

        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$total_price;

         }
     $hash = hash("sha512", $retHashSeq);
     if($gift_by==1 and $gift_type==2){
          
          $class_img  = 'http://162.243.205.148/braingroom/img/gift_image/Card.png';
          $text_msg   = 'Cupon has booked through BrainGroom.com';
        }
        else if($gift_by==2 and $gift_type==2){
          $class_img  =  'http://162.243.205.148/braingroom/img/gift_image/Card.png';
          $text_msg   =  'Cupon has booked through BrainGroom.com';
        }
        else if($gift_by==1 and $gift_type==1){
          $class_img_find = $find_class_img[0]['VendorClasse']['upload_class_photo'];
          $class_name     = $find_class_img[0]['VendorClasse']['class_topic'];
          $class_img      = 'http://162.243.205.148/braingroom/img/Vendor/class_image/'.$class_img_find;
          $text_msg       =  $class_name.' class has booked through BrainGroom.com';
          
        }
        else if($gift_by==2 and $gift_type==1){
         
          $class_img_find = $find_class_img[0]['VendorClasse']['upload_class_photo'];
          $class_name     = $find_class_img[0]['VendorClasse']['class_topic'];
          $class_img      = 'http://162.243.205.148/braingroom/img/Vendor/class_image/'.$class_img_find;
          $text_msg       = $class_name.' class has booked through BrainGroom.com';
        }
         else if($gift_by==3 and $gift_type==1){
          $ngo_img_find   = $find_ngo_img[0]['GiftCard']['gift_image'];
          $ngo_text       = $find_ngo_img[0]['GiftCard']['title'];
          $class_img      = 'http://162.243.205.148/braingroom/img/gift_class/'.$ngo_img_find;
          $text_msg       = 'You have successfully denoted the amount of Rs. '.$gift_rupees. 'to '.$ngo_text.'Ngo through braingroom.com';
           }
          $this->set('status',$status);
          $this->set('txnid',$txnid);
          $this->set('book_id',$book_id);
          $this->set('firstname',$firstname);
          $this->set('class_img',$class_img);
          $this->set('email',$gift_email_id);
          $this->set('text_msg',$text_msg);
          
}
}
public function coupanDetail(){

  //$this->autoRender = false;
   $this->layout='gift_success';
   require ('sendgrid-php/vendor/autoload.php');
   require ('sendgrid-php/lib/SendGrid.php');
  
  $cupan_coup_id = $this->Session->read('coup_id');
  $cu_id     = $cupan_coup_id['GiftCupan']['coupon_number'];
  $cu_price = $cupan_coup_id['GiftCupan']['price'];

  $coupon_id = $cu_id;
  $class_id = $this->params->pass[0];
  $all_gift_cupan_email   = $this->GiftCupan->find('all',array('conditions'=>array('GiftCupan.no_of_coupons' =>$coupon_id,'GiftCupan.status'=>1)));
  
  $all_gift_vendor_classe     = $this->VendorClasse->find('all',array('conditions'=>array('VendorClasse.id'=>$class_id),'fields'=>array('VendorClasse.id','VendorClasse.class_topic')));
  $cat_gift_id                = $all_gift_cupan_email[0]['GiftCupan']['cat_id'];
  $cat                        = $this->Category->find('all',array('conditions'=>array('Category.id'=>$cat_gift_id)));
  $cat_name                   = $cat[0]['Category']['category_name'];
  $class_topic_mail           = $all_gift_vendor_classe[0]['VendorClasse']['class_topic'];
  $available_rupees_mail      = $all_gift_cupan_email[0]['GiftCupan']['available_amt'];
  $coupan_mail_for_gift       = $all_gift_cupan_email[0]['GiftCupan']['email'];
  if($cat_name==''){
    $cat_name = 'General';
  }

  $send_mail_html_coupon_gift ='<div>Category Name : &nbsp;&nbsp;'.$cat_name.'</div></br><div>Class Name &nbsp;&nbsp;:'.$class_topic_mail.'</div></br><div>Amount deducted from coupon &nbsp;&nbsp;:'.$cu_price.'</div></br><div>Available amount in coupon &nbsp;&nbsp;:'.$available_rupees_mail.'</div></br><hr>';
  //$send_mail_html_coupon_gift = "Rohit Mishra";
  //$coupan_mail_for_gift='rohitdtrm@gmail.com';
  $this->sendMail('gift_rohit',$coupan_mail_for_gift,$send_mail_html_coupon_gift);
  
  $this->set('deducted',$cu_price);
  $this->set('category',$cat_name);
  $this->set('gift_vendor_classe',$all_gift_vendor_classe);
  $this->set('coupan_Detail',$all_gift_cupan_email);

}
public function coupanDetail_bck(){

  $this->layout='book_layout';
   require ('sendgrid-php/vendor/autoload.php');
   require ('sendgrid-php/lib/SendGrid.php');
  
  $cupan_coup_id = $this->Session->read('coup_id');
  $cu_id     = $cupan_coup_id['GiftCupan']['coupon_number'];
  $cu_price = $cupan_coup_id['GiftCupan']['price'];
 /* echo "<pre>";
  print_r($cupan_coup_id);
  echo "</pre>";*/
  //echo $cu_id;
  //die;
  $coupon_id = $cu_id;
  $class_id = $this->params->pass[0];
  $all_gift_cupan_email   = $this->GiftCupan->find('all',array('conditions'=>array('GiftCupan.no_of_coupons' =>$coupon_id,'GiftCupan.status'=>1)));
  $all_gift_vendor_classe = $this->VendorClasse->find('all',array('conditions'=>array('VendorClasse.id'=>$class_id),'fields'=>array('VendorClasse.id','VendorClasse.class_topic')));
  $cat_gift_id = $all_gift_cupan_email[0]['GiftCupan']['cat_id'];
  $cat=$this->Category->find('all',array('conditions'=>array('Category.id'=>$cat_gift_id)));
  $cat_name = $cat[0]['Category']['category_name'];
  $class_topic_mail      = $all_gift_vendor_classe[0]['VendorClasse']['class_topic'];
  $available_rupees_mail = $all_gift_cupan_email[0]['GiftCupan']['available_amt'];
  $coupan_mail           = $all_gift_cupan_email[0]['GiftCupan']['email'];
  if($cat_name==''){
    $cat_name = 'General';
  }
  $send_mail_html_coupon ='<div>Category Name : &nbsp;&nbsp;'.$cat_name.'</div></br><div>Class Name &nbsp;&nbsp;:'.$class_topic_mail.'</div></br><div>Amount deducted from coupon &nbsp;&nbsp;:'.$cu_price.'</div></br><div>Available amount in coupon &nbsp;&nbsp;:'.$available_rupees_mail.'</div></br><hr>';
  $this->sendMail('bookClass_status_by_coupan',$coupan_mail,$send_mail_html_coupon);
  $this->set('deducted',$cu_price);
  $this->set('category',$cat_name);
  //echo "</pre>";
  //die;
 
  $this->set('gift_vendor_classe',$all_gift_vendor_classe);
  $this->set('coupan_Detail',$all_gift_cupan_email);
}
/* ============================ END Rohit Gift Section =====================*/

	/*=========================================Explore Section @Rahul Pathak===================================================*/
public function sameLocationClass($lat=null,$lng=null){
    $str='';
    $res1=$this->VendorClasse->query("SELECT bg_vendor_classes.id as ide,
     bg_vendor_classe_location_details.vendor_class_id, bg_vendor_classes.class_topic,
     bg_vendor_classes.category_id,bg_vendor_classe_location_details.latitude
     ,bg_vendor_classe_location_details.longitude,bg_categories.color_code,bg_categories.id
      FROM bg_vendor_classes, bg_vendor_classe_location_details,bg_categories 
      where bg_vendor_classe_location_details.vendor_class_id = bg_vendor_classes.id
       and bg_vendor_classes.category_id=bg_categories.id and
        bg_vendor_classe_location_details.latitude='".$lat."' 
        and bg_vendor_classe_location_details.longitude='".$lng."' group by bg_vendor_classe_location_details.vendor_class_id");
        $str='<table class="table table-striped table-bordered"><thead><tr><th>Sr No</th><th>Class Name</th></tr></thead>';
      if(!empty($res1)){
        $i=1;
       foreach($res1 as $result){
        $str=$str.'<tr style="background-color:#'.$result['bg_categories']['color_code'].';"><td>'.$i.'</td><td><a style="color:black;text-decoration:none;" href='.HTTP_ROOT."/classes/".$result['bg_vendor_classes']['class_topic'].'>'.$result['bg_vendor_classes']['class_topic'].'</a></td></tr>';
        $i++;
       }
       $str=$str.'</table>';
       echo $str;die;
      }
      else{
        echo "0";die;
      }
  
  }
public function explore(){

      $this->layout='fun_layout';
     $cat=$this->Category->find('all',array('conditions'=>array('status'=>1)));
     $user=$this->Session->read('User');
     if(!empty($cat)){
      $this->set('category',$cat);
     }
    if($this->request->is('post')){
         $lat=$this->params->pass[0];
         $lng=$this->params->pass[1];
        if((!empty($lat))&&(!empty($lng))){
         $res=$this->VendorClasse->query("SELECT bg_vendor_classes.id as ide, bg_vendor_classe_location_details.vendor_class_id, bg_vendor_classes.class_topic,bg_vendor_classes.category_id,bg_vendor_classe_location_details.latitude, bg_vendor_classe_location_details.longitude,bg_categories.color_code,bg_categories.id,SQRT( POW( 69.1 * ( bg_vendor_classe_location_details.latitude - $lat ) , 2 ) + POW( 69.1 * (  bg_vendor_classe_location_details.longitude- $lng ) * COS( $lat / 57.3 ) , 2 ) ) AS distance
FROM bg_vendor_classes, bg_vendor_classe_location_details,bg_categories
HAVING distance <10
 and  bg_vendor_classe_location_details.vendor_class_id = bg_vendor_classes.id and bg_vendor_classes.category_id=bg_categories.id 
ORDER BY distance");
   
        
      
     echo json_encode($res);die;
    }
    else{
      
     $address="Chennai";

     $res1=$this->getLatLong($address);
     $lat=$res1['latitude'];
     $lng=$res1['longitude'];
   
       
     $res=$this->VendorClasse->query("SELECT bg_vendor_classes.id as ide, bg_vendor_classe_location_details.vendor_class_id, bg_vendor_classes.class_topic,bg_vendor_classes.category_id,bg_vendor_classe_location_details.latitude, bg_vendor_classe_location_details.longitude,bg_categories.color_code,bg_categories.id,SQRT( POW( 69.1 * ( bg_vendor_classe_location_details.latitude - $lat ) , 2 ) + POW( 69.1 * ( bg_vendor_classe_location_details.longitude - $lng ) * COS( $lat / 57.3 ) , 2 ) ) AS distance
FROM bg_vendor_classes, bg_vendor_classe_location_details,bg_categories
HAVING distance <100
 and  bg_vendor_classe_location_details.vendor_class_id = bg_vendor_classes.id and bg_vendor_classes.category_id=bg_categories.id 
ORDER BY distance");
 

     echo json_encode($res);die;
    }
}
  }
  public function locationRange(){
    $lat=$this->params->pass[0];
    $lng=$this->params->pass[1];
    $location=$this->params->pass[2];
    $distance=$this->params->pass[3];
    $search=$this->params->pass[4];
    if(($lat=='0')&&($lng=='0')){
        $res=$this->getLatLong($location);
        $lat=$res['latitude'];
         $lng=$res['longitude'];
         if($search=='0'){
          $res1=$this->VendorClasse->query("SELECT bg_vendor_classes.id as ide, bg_vendor_classe_location_details.vendor_class_id, bg_vendor_classes.class_topic,bg_vendor_classes.category_id,bg_vendor_classe_location_details.latitude, bg_vendor_classe_location_details.longitude,bg_categories.color_code,bg_categories.id,SQRT( POW( 69.1 * ( bg_vendor_classe_location_details.latitude - $lat ) , 2 ) + POW( 69.1 * ( bg_vendor_classe_location_details.longitude - $lng ) * COS( $lat / 57.3 ) , 2 ) ) AS distance
      FROM bg_vendor_classes, bg_vendor_classe_location_details,bg_categories
      HAVING distance <$distance
      AND bg_vendor_classe_location_details.vendor_class_id = bg_vendor_classes.id and bg_vendor_classes.category_id=bg_categories.id 
      ORDER BY distance");
        if(!empty($res1)){
          $l=0;
          foreach($res1 as $res){
          $res1[$l]['bg_vendor_classes']['current_lat']=$lat;
          $res1[$l]['bg_vendor_classes']['current_lng']=$lng;
          $l++;
         }
        echo json_encode($res1);die;
        }
        else{
          $res['found']=0;
           $res['current_lat']=$lat;
           $res['current_lng']=$lng;
          echo json_encode($res);die;
        }
    }
    else{
      $res1=$this->VendorClasse->query("SELECT bg_vendor_classes.id as ide, bg_vendor_classe_location_details.vendor_class_id, bg_vendor_classes.class_topic,bg_vendor_classes.category_id,bg_vendor_classe_location_details.latitude, bg_vendor_classe_location_details.longitude,bg_categories.color_code,bg_categories.id,SQRT( POW( 69.1 * ( bg_vendor_classe_location_details.latitude - $lat ) , 2 ) + POW( 69.1 * ( bg_vendor_classe_location_details.longitude - $lng ) * COS( $lat / 57.3 ) , 2 ) ) AS distance
      FROM bg_vendor_classes, bg_vendor_classe_location_details,bg_categories
      HAVING distance <$distance
      AND bg_vendor_classe_location_details.vendor_class_id = bg_vendor_classes.id and bg_vendor_classes.category_id=bg_categories.id and bg_vendor_classes.class_topic Like '%$search%'  
      ORDER BY distance");
        if(!empty($res1)){
           $l=0;
          foreach($res1 as $res){
          $res1[$l]['bg_vendor_classes']['current_lat']=$lat;
          $res1[$l]['bg_vendor_classes']['current_lng']=$lng;
          $l++;
         }
          
          
        echo json_encode($res1);die;
        }
        else{
          $res['found']=0;
           $res['current_lat']=$lat;
           $res['current_lng']=$lng;
          echo json_encode($res);die;
        }
    }
  }
    else{
      if($search=='0'){
      
      $res1=$this->VendorClasse->query("SELECT bg_vendor_classes.id as ide, bg_vendor_classe_location_details.vendor_class_id, bg_vendor_classes.class_topic,bg_vendor_classes.category_id,bg_vendor_classe_location_details.latitude, bg_vendor_classe_location_details.longitude,bg_categories.color_code,bg_categories.id,SQRT( POW( 69.1 * ( bg_vendor_classe_location_details.latitude - $lat ) , 2 ) + POW( 69.1 * ( bg_vendor_classe_location_details.longitude - $lng ) * COS( $lat / 57.3 ) , 2 ) ) AS distance
      FROM bg_vendor_classes, bg_vendor_classe_location_details,bg_categories
      HAVING distance <$distance
      AND bg_vendor_classe_location_details.vendor_class_id = bg_vendor_classes.id and bg_vendor_classes.category_id=bg_categories.id 
      ORDER BY distance");
        if(!empty($res1)){
           $l=0;
          foreach($res1 as $res){
          $res1[$l]['bg_vendor_classes']['current_lat']=$lat;
          $res1[$l]['bg_vendor_classes']['current_lng']=$lng;
          $l++;
         }
         
        echo json_encode($res1);die;
        }
        else{
          $res['found']=0;
          echo json_encode($res);die;
        } 
    }
    else{
       $res1=$this->VendorClasse->query("SELECT bg_vendor_classes.id as ide, bg_vendor_classe_location_details.vendor_class_id, bg_vendor_classes.class_topic,bg_vendor_classes.category_id,bg_vendor_classe_location_details.latitude, bg_vendor_classe_location_details.longitude,bg_categories.color_code,bg_categories.id,SQRT( POW( 69.1 * ( bg_vendor_classe_location_details.latitude - $lat ) , 2 ) + POW( 69.1 * ( bg_vendor_classe_location_details.longitude - $lng ) * COS( $lat / 57.3 ) , 2 ) ) AS distance
      FROM bg_vendor_classes, bg_vendor_classe_location_details,bg_categories
      HAVING distance <$distance
      AND bg_vendor_classe_location_details.vendor_class_id = bg_vendor_classes.id and bg_vendor_classes.category_id=bg_categories.id or bg_vendor_classes.class_topic Like '%$search%'
      ORDER BY distance");
        if(!empty($res1)){
         $l=0;
          foreach($res1 as $res){
          $res1[$l]['bg_vendor_classes']['current_lat']=$lat;
          $res1[$l]['bg_vendor_classes']['current_lng']=$lng;
          $l++;
         }
          
        echo json_encode($res1);die;
        }
        else{
          $res['found']=0;
          echo json_encode($res);die;
        } 
    }
  }
  } 
  public function findByAddress($address=null,$dist=null,$search=null){
  $this->autoRender=false;
  $res=$this->getLatLong(base64_decode($address));
  
  if(empty($res['latitude'])){
     return 0;//not Found
  }
  else{
   $lat=$res['latitude'];
   $lng=$res['longitude'];
   if($search=='0'){
  $res1=$this->VendorClasse->query("SELECT bg_vendor_classes.id as ide, bg_vendor_classe_location_details.vendor_class_id, bg_vendor_classes.class_topic,bg_vendor_classes.category_id,bg_vendor_classe_location_details.latitude, bg_vendor_classe_location_details.longitude,bg_categories.color_code,bg_categories.id,SQRT( POW( 69.1 * ( bg_vendor_classe_location_details.latitude - $lat ) , 2 ) + POW( 69.1 * ( bg_vendor_classe_location_details.longitude - $lng ) * COS( $lat / 57.3 ) , 2 ) ) AS distance
FROM bg_vendor_classes, bg_vendor_classe_location_details,bg_categories
HAVING distance <$dist
AND bg_vendor_classe_location_details.vendor_class_id = bg_vendor_classes.id and bg_vendor_classes.category_id=bg_categories.id 
ORDER BY distance");
}
else{
  $res1=$this->VendorClasse->query("SELECT bg_vendor_classes.id as ide, bg_vendor_classe_location_details.vendor_class_id, bg_vendor_classes.class_topic,bg_vendor_classes.category_id,bg_vendor_classe_location_details.latitude, bg_vendor_classe_location_details.longitude,bg_categories.color_code,bg_categories.id,SQRT( POW( 69.1 * ( bg_vendor_classe_location_details.latitude - $lat ) , 2 ) + POW( 69.1 * ( bg_vendor_classe_location_details.longitude - $lng ) * COS( $lat / 57.3 ) , 2 ) ) AS distance
FROM bg_vendor_classes, bg_vendor_classe_location_details,bg_categories
HAVING distance <$dist
AND bg_vendor_classe_location_details.vendor_class_id = bg_vendor_classes.id and bg_vendor_classes.category_id=bg_categories.id and bg_vendor_classes.class_topic Like '%$search%' 
ORDER BY distance");
}
  if(!empty($res1)){
    
    
  echo json_encode($res1);die;
  }
  else{
    $res['found']=0;
    echo json_encode($res);die;
  }
  }

}

public function findByAddressClasss($address=null,$dist=null,$search=null){
   $this->loadModel('Ticket');
  $this->autoRender=false;
  $res1=$this->getLatLong(base64_decode($address));
 
  if(empty($res1['latitude'])){
     return 0;//not Found
  }
  else{
   $lat=$res1['latitude'];
   $lng=$res1['longitude'];
    if($search=='0'){
    $res=$this->VendorClasse->query("SELECT bg_vendor_classes.id as ide,bg_vendor_classe_location_details.vendor_class_id, bg_vendor_classes.class_topic,bg_vendor_classe_location_details.latitude, bg_vendor_classe_location_details.longitude,SQRT( POW( 69.1 * ( bg_vendor_classe_location_details.latitude - $lat ) , 2 ) + POW( 69.1 * ( bg_vendor_classe_location_details.longitude -$lng ) * COS( $lat / 57.3 ) , 2 ) ) AS distance

FROM bg_vendor_classes,bg_vendor_classe_location_details

HAVING distance <$dist

AND bg_vendor_classe_location_details.vendor_class_id = bg_vendor_classes.id

ORDER BY distance");

  }
  else{
    $res=$this->VendorClasse->query("SELECT bg_vendor_classes.id as ide,bg_vendor_classe_location_details.vendor_class_id, bg_vendor_classes.class_topic,bg_vendor_classe_location_details.latitude, bg_vendor_classe_location_details.longitude,SQRT( POW( 69.1 * ( bg_vendor_classe_location_details.latitude - $lat ) , 2 ) + POW( 69.1 * ( bg_vendor_classe_location_details.longitude -$lng ) * COS( $lat / 57.3 ) , 2 ) ) AS distance

FROM bg_vendor_classes,bg_vendor_classe_location_details

HAVING distance <$dist

AND bg_vendor_classe_location_details.vendor_class_id = bg_vendor_classes.id and bg_vendor_classes.class_topic Like '%$search%'

ORDER BY distance"); 
  }
 $str='';


 if(!empty($res)){
$str=$str.'<table id="example" class="table table-striped table-bordered" style="table-layout: fixed;width: 100%;font_size:20px;">';
$str=$str.'<thead style="background-color:#00cdc6;">
                                <tr>
                                    <th>Sr. no.</th>
                                    <th>Class</th>
                                    <th>People have booked</th>
                                  <th>Action</th></tr></thead><tbody style="font-size:15px;">';
                                  $i=1;  
                                  foreach($res as $result){
                                     $str=$str.'<tr><td>'.$i.'</td>';
                                     $str=$str.'<td>'.$result['bg_vendor_classes']['class_topic'].'</td>';

                                $a = $this->Ticket->find('all',array(      
                                              'joins'=>
                                                        array(
                                                          array(
                                                          'table'  =>'bg_user_masters',  
                                                          'alias'  =>'UserMaster',
                                                          'conditions'=>array(
                                                          'Ticket.user_id=UserMaster.id'
                                                          ),                  
                                                        )
                                              ),
                                              'conditions' => array(  
                                                              'Ticket.vendor_classe_id'=>$result['bg_vendor_classes']['ide']
                                                            
                                                            ),      
                                              'fields' => 'UserMaster.*',  
                                          ));
                              
                               


                                 /* $a=$this->Ticket->find('all',array('conditions'=>array('Ticket.vendor_classe_id'=>$result['bg_vendor_classes']['id'],'Ticket.txn_id'=>$result['bg_tickets']['txn_id'])));*/
                                $b=count($a);
                                  
                                     $str=$str.'<td class="dropdown" align="center" >'.$b.' People ';
                                     if($b!='0'){
                                     $str.='<ul class="dropdown-menu extended logout" style="width:100%;background-color:#00cdc6;color:#fff;top:30px;">';
                                   }
                                 foreach($a as $r){
                                  $str=$str.'<li><center><a href='.HTTP_ROOT.'/Homes/profile/'.base64_encode($r['UserMaster']['id']).'>'.$r['UserMaster']['first_name'].'</center></li>';
                                }
                                 $str=$str.'</ul>
                                     </a></td>';
                                     $str=$str.'<td><a href='.HTTP_ROOT.'/classes/'.$result['bg_vendor_classes']['class_topic'].'>Click to Book</a></td></tr>';
                                    $i++;
                                  }
                                  $str=$str."<tbody>";
                                 print_r($str);die;


 }
}

}


function getLatLong($address){
    if(!empty($address)){
       
        //Formatted address
        $formattedAddr = str_replace(' ','+',$address);
        //Send request and receive json data by address
        $geocodeFromAddr = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddr.'&sensor=false'); 
        $output = json_decode($geocodeFromAddr);
        //Get latitude and longitute from json data
        $data['latitude']  = $output->results[0]->geometry->location->lat; 
        $data['longitude'] = $output->results[0]->geometry->location->lng;
        //Return latitude and longitude of the given address
        if(!empty($data)){
            return $data;
        }else{
            return false;
        }
    }else{
        return false;   
    }
}
public function findByClass($searchValue){
    $this->autoRender=false;
    $searchValue=base64_decode($searchValue);

   $res=$this->VendorClasse->query("SELECT bg_vendor_classes.id as ide, bg_vendor_classe_location_details.vendor_class_id, bg_vendor_classes.class_topic,bg_vendor_classes.category_id,bg_vendor_classe_location_details.latitude, bg_vendor_classe_location_details.longitude,bg_categories.color_code,bg_categories.id FROM bg_vendor_classes, bg_vendor_classe_location_details,bg_categories
where bg_vendor_classe_location_details.vendor_class_id = bg_vendor_classes.id and bg_vendor_classes.category_id=bg_categories.id and bg_vendor_classes.class_topic Like '%$searchValue%'
ORDER BY bg_vendor_classes.add_date DESC");
 if(!empty($res)){
  echo json_encode($res);die;
 }
 else{
  $res['found']=0;
   echo json_encode($res);die;
 }
 
  
 

}
public function findNearAllClasses(){
  $this->autoRender=false;
  $this->loadModel('Ticket');
 $lat=$this->params->pass[0];
 $lng=$this->params->pass[1];
 if(($lat=='0')&&($lng=='0')){
$featured_class = $this->VendorClasse->find('all', array(
    
    'contain'=> array(    
                  'ClassType',
                  'User',
                  'VendorClasseLocationDetail'=> array('Locality'),
                  'VendorClasseLevelDetail'
                  ),
          'conditions' => array(
            'featured_status' => 1
            ),
          'limit' => 15,
          ));
if(!empty($featured_class)){

$str='';
 
   $str=$str.'<table id="example" class="table table-striped table-bordered" style="table-layout: fixed;width: 100%;font_size:20px;">';
$str=$str.'<thead style="background-color:#00cdc6;">
                                <tr>
                                    <th>Sr. no.</th>
                                    <th>Class</th>
                                    <th>People have booked</th>
                                  <th>Action</th></tr></thead><tbody style="font-size:15px;">';
                                  $i=1;  
                                  foreach($featured_class as $result){
                                     $str=$str.'<tr><td>'.$i.'</td>';
                                     $str=$str.'<td>'.$result['VendorClasse']['class_topic'].'</td>';
                                $a = $this->Ticket->find('all',array(      
                                              'joins'=>
                                                        array(
                                                          array(
                                                          'table'  =>'bg_user_masters',  
                                                          'alias'  =>'UserMaster',
                                                          'conditions'=>array(
                                                          'Ticket.user_id=UserMaster.id'
                                                          ),                  
                                                        )
                                              ),
                                              'conditions' => array(  
                                                              'Ticket.vendor_classe_id'=>$result['VendorClasse']['id']
                                                            
                                                            ),      
                                              'fields' => 'UserMaster.*',  
                                          ));
                              
                               


                                 /* $a=$this->Ticket->find('all',array('conditions'=>array('Ticket.vendor_classe_id'=>$result['bg_vendor_classes']['id'],'Ticket.txn_id'=>$result['bg_tickets']['txn_id'])));*/
                                   $b=count($a);
                                  
                                     $str=$str.'<td class="dropdown" align="center" >'.$b.' People ';
                                     if($b!='0'){
                                     $str.='<ul class="dropdown-menu extended logout" style="width:100%;background-color:#00cdc6;color:#fff;top:30px;">';
                                   }
                                 foreach($a as $r){
                                  $str=$str.'<li><center><a href='.HTTP_ROOT.'/Homes/profile/'.base64_encode($r['UserMaster']['id']).'>'.$r['UserMaster']['first_name'].'</center></li>';
                                }
                                 $str=$str.'</ul>
                                     </a></td>';
                                     $str=$str.'<td><a href='.HTTP_ROOT.'/classes/'.$result['VendorClasse']['class_topic'].'>Click to Book</a></td></tr>';
                                    $i++;
                                  }
                                  $str=$str."<tbody>";
                                 print_r($str);die;   
 }
}
 else{

 $res=$this->VendorClasse->query("SELECT bg_vendor_classes.id as ide,bg_vendor_classe_location_details.vendor_class_id, bg_vendor_classes.class_topic,bg_vendor_classe_location_details.latitude, bg_vendor_classe_location_details.longitude,SQRT( POW( 69.1 * ( bg_vendor_classe_location_details.latitude - $lat ) , 2 ) + POW( 69.1 * ( bg_vendor_classe_location_details.longitude -$lng ) * COS( $lat / 57.3 ) , 2 ) ) AS distance

FROM bg_vendor_classes,bg_vendor_classe_location_details

HAVING distance <=10

AND bg_vendor_classe_location_details.vendor_class_id = bg_vendor_classes.id
ORDER BY distance");


 if(!empty($res)){
$str=$str.'<table id="example" class="table table-striped table-bordered" style="table-layout: fixed;width: 100%;font_size:20px;">';
$str=$str.'<thead style="background-color:#00cdc6;">
                                <tr>
                                    <th>Sr. no.</th>
                                    <th>Class</th>
                                    <th>People have booked</th>
                                  <th>Action</th></tr></thead><tbody style="font-size:15px;">';
                                  $i=1;  
                                  foreach($res as $result){
                                     $str=$str.'<tr><td>'.$i.'</td>';
                                     $str=$str.'<td>'.$result['bg_vendor_classes']['class_topic'].'</td>';
                                $a = $this->Ticket->find('all',array(      
                                              'joins'=>
                                                        array(
                                                          array(
                                                          'table'  =>'bg_user_masters',  
                                                          'alias'  =>'UserMaster',
                                                          'conditions'=>array(
                                                          'Ticket.user_id=UserMaster.id'
                                                          ),                  
                                                        )
                                              ),
                                              'conditions' => array(  
                                                              'Ticket.vendor_classe_id'=>$result['bg_vendor_classes']['ide']
                                                            
                                                            ),      
                                              'fields' => 'UserMaster.*',  
                                          ));
                              
                               


                                 /* $a=$this->Ticket->find('all',array('conditions'=>array('Ticket.vendor_classe_id'=>$result['bg_vendor_classes']['id'],'Ticket.txn_id'=>$result['bg_tickets']['txn_id'])));*/
                                    $b=count($a);
                                  
                                     $str=$str.'<td class="dropdown" align="center" >'.$b.' People ';
                                     if($b!='0'){
                                     $str.='<ul class="dropdown-menu extended logout" style="width:100%;background-color:#00cdc6;color:#fff;top:30px;">';
                                   }
                                 foreach($a as $r){
                                  $str=$str.'<li><center><a href='.HTTP_ROOT.'/Homes/profile/'.base64_encode($r['UserMaster']['id']).'>'.$r['UserMaster']['first_name'].'</center></li>';
                                }
                                 $str=$str.'</ul>
                                     </a></td>';
                                     $str=$str.'<td><a href='.HTTP_ROOT.'/classes/'.$result['bg_vendor_classes']['class_topic'].'>Click to Book</a></td></tr>';
                                    $i++;
                                  }
                                  $str=$str."<tbody>";
                                 print_r($str);die;  


 }
}
}

public function findClassesData($latitude=null,$longitude=null,$cat_id=null,$dist=null,$location=null,$search=null){
   $this->autoRender=false;
  $this->loadModel('Ticket');
 
  $lat=$latitude;
  $lng=$longitude;
if(($lat!='0')&&($lng!='0')&&($location=='null')&&($search=='0')&&($cat_id!='null')){
 
  $res=$this->VendorClasse->query("SELECT bg_vendor_classes.id as ide,bg_vendor_classe_location_details.vendor_class_id, bg_vendor_classes.class_topic,bg_vendor_classe_location_details.latitude, bg_vendor_classe_location_details.longitude,bg_vendor_classes.category_id

FROM bg_vendor_classes,bg_vendor_classe_location_details


where  bg_vendor_classe_location_details.vendor_class_id = bg_vendor_classes.id  and bg_vendor_classes.category_id='".$cat_id."'");

 if(!empty($res)){
$str=$str.'<table id="example" class="table table-striped table-bordered" style="table-layout: fixed;width: 100%;font_size:20px;">';
$str=$str.'<thead style="background-color:#00cdc6;">
                                <tr>
                                    <th>Sr. no.</th>
                                    <th>Class</th>
                                    <th>People have booked</th>
                                  <th>Action</th></tr></thead><tbody style="font-size:15px;">';
                                  $i=1;  
                                  foreach($res as $result){
                                     $str=$str.'<tr><td>'.$i.'</td>';
                                     $str=$str.'<td>'.$result['bg_vendor_classes']['class_topic'].'</td>';
                                $a = $this->Ticket->find('all',array(      
                                              'joins'=>
                                                        array(
                                                          array(
                                                          'table'  =>'bg_user_masters',  
                                                          'alias'  =>'UserMaster',
                                                          'conditions'=>array(
                                                          'Ticket.user_id=UserMaster.id'
                                                          ),                  
                                                        )
                                              ),
                                              'conditions' => array(  
                                                              'Ticket.vendor_classe_id'=>$result['bg_vendor_classes']['ide']
                                                            
                                                            ),      
                                              'fields' => 'UserMaster.*',  
                                          ));
                              
                               


                                 /* $a=$this->Ticket->find('all',array('conditions'=>array('Ticket.vendor_classe_id'=>$result['bg_vendor_classes']['id'],'Ticket.txn_id'=>$result['bg_tickets']['txn_id'])));*/
                                    $b=count($a);
                                  
                                     $str=$str.'<td class="dropdown" align="center" >'.$b.' People ';
                                     if($b!='0'){
                                     $str.='<ul class="dropdown-menu extended logout" style="width:100%;background-color:#00cdc6;color:#fff;top:30px;">';
                                   }
                                 foreach($a as $r){
                                  $str=$str.'<li><center><a href='.HTTP_ROOT.'/Homes/profile/'.base64_encode($r['UserMaster']['id']).'>'.$r['UserMaster']['first_name'].'</center></li>';
                                }
                                 $str=$str.'</ul>
                                     </a></td>';
                                     $str=$str.'<td><a href='.HTTP_ROOT.'/classes/'.$result['bg_vendor_classes']['class_topic'].'>Click to Book</a></td></tr>';
                                    $i++;
                                  }
                                  $str=$str."<tbody>";
                                 print_r($str);die;

}
}
if(($lat!='0')&&($lng!='0')&&($location=='null')&&($search=='0')&&($cat_id=='null')){
   $res=$this->VendorClasse->query("SELECT bg_vendor_classes.id as ide,bg_vendor_classe_location_details.vendor_class_id, bg_vendor_classes.class_topic,bg_vendor_classe_location_details.latitude, bg_vendor_classe_location_details.longitude,bg_vendor_classes.category_id,SQRT( POW( 69.1 * ( bg_vendor_classe_location_details.latitude - $lat ) , 2 ) + POW( 69.1 * ( bg_vendor_classe_location_details.longitude -$lng ) * COS( $lat / 57.3 ) , 2 ) ) AS distance

FROM bg_vendor_classes,bg_vendor_classe_location_details

HAVING distance <=$dist

AND bg_vendor_classe_location_details.vendor_class_id = bg_vendor_classes.id
ORDER BY distance");

 if(!empty($res)){
$str=$str.'<table id="example" class="table table-striped table-bordered" style="table-layout: fixed;width: 100%;font_size:20px;">';
$str=$str.'<thead style="background-color:#00cdc6;">
                                <tr>
                                    <th>Sr. no.</th>
                                    <th>Class</th>
                                    <th>People have booked</th>
                                  <th>Action</th></tr></thead><tbody style="font-size:15px;">';
                                  $i=1;  
                                  foreach($res as $result){
                                     $str=$str.'<tr><td>'.$i.'</td>';
                                     $str=$str.'<td>'.$result['bg_vendor_classes']['class_topic'].'</td>';
                                $a = $this->Ticket->find('all',array(      
                                              'joins'=>
                                                        array(
                                                          array(
                                                          'table'  =>'bg_user_masters',  
                                                          'alias'  =>'UserMaster',
                                                          'conditions'=>array(
                                                          'Ticket.user_id=UserMaster.id'
                                                          ),                  
                                                        )
                                              ),
                                              'conditions' => array(  
                                                              'Ticket.vendor_classe_id'=>$result['bg_vendor_classes']['ide']
                                                            
                                                            ),      
                                              'fields' => 'UserMaster.*',  
                                          ));
                              
                               


                                 /* $a=$this->Ticket->find('all',array('conditions'=>array('Ticket.vendor_classe_id'=>$result['bg_vendor_classes']['id'],'Ticket.txn_id'=>$result['bg_tickets']['txn_id'])));*/
                                    $b=count($a);
                                  
                                     $str=$str.'<td class="dropdown" align="center" >'.$b.' People ';
                                     if($b!='0'){
                                     $str.='<ul class="dropdown-menu extended logout" style="width:100%;background-color:#00cdc6;color:#fff;top:30px;">';
                                   }
                                 foreach($a as $r){
                                  $str=$str.'<li><center><a href='.HTTP_ROOT.'/Homes/profile/'.base64_encode($r['UserMaster']['id']).'>'.$r['UserMaster']['first_name'].'</center></li>';
                                }
                                 $str=$str.'</ul>
                                     </a></td>';
                                     $str=$str.'<td><a href='.HTTP_ROOT.'/classes/'.$result['bg_vendor_classes']['class_topic'].'>Click to Book</a></td></tr>';
                                    $i++;
                                  }
                                  $str=$str."<tbody>";
                                 print_r($str);die;
}
}
if(($lat!='0')&&($lng!='0')&&($location=='null')&&($search!='0')){
  
   $res=$this->VendorClasse->query("SELECT bg_vendor_classes.id as ide,bg_vendor_classe_location_details.vendor_class_id, bg_vendor_classes.class_topic,bg_vendor_classe_location_details.latitude, bg_vendor_classe_location_details.longitude,bg_vendor_classes.category_id,SQRT( POW( 69.1 * ( bg_vendor_classe_location_details.latitude - $lat ) , 2 ) + POW( 69.1 * ( bg_vendor_classe_location_details.longitude -$lng ) * COS( $lat / 57.3 ) , 2 ) ) AS distance

FROM bg_vendor_classes,bg_vendor_classe_location_details

HAVING distance <=$dist

AND bg_vendor_classe_location_details.vendor_class_id = bg_vendor_classes.id  and bg_vendor_classes.category_id='".$cat_id."' and bg_vendor_classes.class_topic Like '%$search%'
ORDER BY distance");



 if(!empty($res)){
$str=$str.'<table id="example" class="table table-striped table-bordered" style="table-layout: fixed;width: 100%;font_size:20px;">';
$str=$str.'<thead style="background-color:#00cdc6;">
                                <tr>
                                    <th>Sr. no.</th>
                                    <th>Class</th>
                                    <th>People have booked</th>
                                  <th>Action</th></tr></thead><tbody style="font-size:15px;">';
                                  $i=1;  
                                  foreach($res as $result){
                                     $str=$str.'<tr><td>'.$i.'</td>';
                                     $str=$str.'<td>'.$result['bg_vendor_classes']['class_topic'].'</td>';
                                $a = $this->Ticket->find('all',array(      
                                              'joins'=>
                                                        array(
                                                          array(
                                                          'table'  =>'bg_user_masters',  
                                                          'alias'  =>'UserMaster',
                                                          'conditions'=>array(
                                                          'Ticket.user_id=UserMaster.id'
                                                          ),                  
                                                        )
                                              ),
                                              'conditions' => array(  
                                                              'Ticket.vendor_classe_id'=>$result['bg_vendor_classes']['ide']
                                                            
                                                            ),      
                                              'fields' => 'UserMaster.*',  
                                          ));
                              
                               


                                 /* $a=$this->Ticket->find('all',array('conditions'=>array('Ticket.vendor_classe_id'=>$result['bg_vendor_classes']['id'],'Ticket.txn_id'=>$result['bg_tickets']['txn_id'])));*/
                                    $b=count($a);
                                  
                                     $str=$str.'<td class="dropdown" align="center" >'.$b.' People ';
                                     if($b!='0'){
                                     $str.='<ul class="dropdown-menu extended logout" style="width:100%;background-color:#00cdc6;color:#fff;top:30px;">';
                                   }
                                 foreach($a as $r){
                                  $str=$str.'<li><center><a href='.HTTP_ROOT.'/Homes/profile/'.base64_encode($r['UserMaster']['id']).'>'.$r['UserMaster']['first_name'].'</center></li>';
                                }
                                 $str=$str.'</ul>
                                     </a></td>';
                                     $str=$str.'<td><a href='.HTTP_ROOT.'/classes/'.$result['bg_vendor_classes']['class_topic'].'>Click to Book</a></td></tr>';
                                    $i++;
                                  }
                                  $str=$str."<tbody>";
                                 print_r($str);die;
/*===========================================================================End ===========================================================*/

}
}
if(($lat=='0')&&($lng=='0')&&($location=='null')&&($search=='0')&&($cat_id!='null')){

  $res=$this->VendorClasse->query("SELECT bg_vendor_classes.id as ide,bg_vendor_classe_location_details.vendor_class_id, bg_vendor_classes.class_topic,bg_vendor_classe_location_details.latitude, bg_vendor_classe_location_details.longitude,bg_vendor_classes.category_id

FROM bg_vendor_classes,bg_vendor_classe_location_details


where  bg_vendor_classe_location_details.vendor_class_id = bg_vendor_classes.id  and bg_vendor_classes.category_id='".$cat_id."'");

 if(!empty($res)){
$str=$str.'<table id="example" class="table table-striped table-bordered" style="table-layout: fixed;width: 100%;font_size:20px;">';
$str=$str.'<thead style="background-color:#00cdc6;">
                                <tr>
                                    <th>Sr. no.</th>
                                    <th>Class</th>
                                    <th>People have booked</th>
                                  <th>Action</th></tr></thead><tbody style="font-size:15px;">';
                                  $i=1;  
                                  foreach($res as $result){
                                     $str=$str.'<tr><td>'.$i.'</td>';
                                     $str=$str.'<td>'.$result['bg_vendor_classes']['class_topic'].'</td>';
                                $a = $this->Ticket->find('all',array(      
                                              'joins'=>
                                                        array(
                                                          array(
                                                          'table'  =>'bg_user_masters',  
                                                          'alias'  =>'UserMaster',
                                                          'conditions'=>array(
                                                          'Ticket.user_id=UserMaster.id'
                                                          ),                  
                                                        )
                                              ),
                                              'conditions' => array(  
                                                              'Ticket.vendor_classe_id'=>$result['bg_vendor_classes']['ide']
                                                            
                                                            ),      
                                              'fields' => 'UserMaster.*',  
                                          ));
                              
                               


                                 /* $a=$this->Ticket->find('all',array('conditions'=>array('Ticket.vendor_classe_id'=>$result['bg_vendor_classes']['id'],'Ticket.txn_id'=>$result['bg_tickets']['txn_id'])));*/
                                    $b=count($a);
                                  
                                     $str=$str.'<td class="dropdown" align="center" >'.$b.' People ';
                                     if($b!='0'){
                                     $str.='<ul class="dropdown-menu extended logout" style="width:100%;background-color:#00cdc6;color:#fff;top:30px;">';
                                   }
                                 foreach($a as $r){
                                  $str=$str.'<li><center><a href='.HTTP_ROOT.'/Homes/profile/'.base64_encode($r['UserMaster']['id']).'>'.$r['UserMaster']['first_name'].'</center></li>';
                                }
                                 $str=$str.'</ul>
                                     </a></td>';
                                     $str=$str.'<td><a href='.HTTP_ROOT.'/classes/'.$result['bg_vendor_classes']['class_topic'].'>Click to Book</a></td></tr>';
                                    $i++;
                                  }
                                  $str=$str."<tbody>";
                                 print_r($str);die;

}
}


//case1->if Gps Not Found
  if(($lat=='0')&&($lng=='0')&&($location=='null')&&($search=='0')){
  
   $res=$this->VendorClasse->query("SELECT bg_vendor_classes.id as ide,bg_vendor_classe_location_details.vendor_class_id, bg_vendor_classes.class_topic,bg_vendor_classe_location_details.latitude, bg_vendor_classe_location_details.longitude,bg_vendor_classes.category_id,SQRT( POW( 69.1 * ( bg_vendor_classe_location_details.latitude - $lat ) , 2 ) + POW( 69.1 * ( bg_vendor_classe_location_details.longitude -$lng ) * COS( $lat / 57.3 ) , 2 ) ) AS distance

FROM bg_vendor_classes,bg_vendor_classe_location_details

HAVING distance <=$dist

AND bg_vendor_classe_location_details.vendor_class_id = bg_vendor_classes.id  and bg_vendor_classes.category_id='".$cat_id."' and bg_vendor_classes.class_topic Like '%$search%'
ORDER BY distance");



 if(!empty($res)){
$str=$str.'<table id="example" class="table table-striped table-bordered" style="table-layout: fixed;width: 100%;font_size:20px;">';
$str=$str.'<thead style="background-color:#00cdc6;">
                                <tr>
                                    <th>Sr. no.</th>
                                    <th>Class</th>
                                    <th>People have booked</th>
                                  <th>Action</th></tr></thead><tbody style="font-size:15px;">';
                                  $i=1;  
                                  foreach($res as $result){
                                     $str=$str.'<tr><td>'.$i.'</td>';
                                     $str=$str.'<td>'.$result['bg_vendor_classes']['class_topic'].'</td>';
                                $a = $this->Ticket->find('all',array(      
                                              'joins'=>
                                                        array(
                                                          array(
                                                          'table'  =>'bg_user_masters',  
                                                          'alias'  =>'UserMaster',
                                                          'conditions'=>array(
                                                          'Ticket.user_id=UserMaster.id'
                                                          ),                  
                                                        )
                                              ),
                                              'conditions' => array(  
                                                              'Ticket.vendor_classe_id'=>$result['bg_vendor_classes']['ide']
                                                            
                                                            ),      
                                              'fields' => 'UserMaster.*',  
                                          ));
                              
                               


                                 /* $a=$this->Ticket->find('all',array('conditions'=>array('Ticket.vendor_classe_id'=>$result['bg_vendor_classes']['id'],'Ticket.txn_id'=>$result['bg_tickets']['txn_id'])));*/
                                    $b=count($a);
                                  
                                     $str=$str.'<td class="dropdown" align="center" >'.$b.' People ';
                                     if($b!='0'){
                                     $str.='<ul class="dropdown-menu extended logout" style="width:100%;background-color:#00cdc6;color:#fff;top:30px;">';
                                   }
                                 foreach($a as $r){
                                  $str=$str.'<li><center><a href='.HTTP_ROOT.'/Homes/profile/'.base64_encode($r['UserMaster']['id']).'>'.$r['UserMaster']['first_name'].'</center></li>';
                                }
                                 $str=$str.'</ul>
                                     </a></td>';
                                     $str=$str.'<td><a href='.HTTP_ROOT.'/classes/'.$result['bg_vendor_classes']['class_topic'].'>Click to Book</a></td></tr>';
                                    $i++;
                                  }
                                  $str=$str."<tbody>";
                                 print_r($str);die;
/*===========================================================================End ===========================================================*/

}
}
  if(($lat=='0')&&($lng=='0')&&($location=='null')&&($search=='0')){
$featured_class = $this->VendorClasse->find('all', array(
    
    'contain'=> array(    
                  'ClassType',
                  'User',
                  'VendorClasseLocationDetail'=> array('Locality'),
                  'VendorClasseLevelDetail'
                  ),
          'conditions' => array(
            'featured_status' => 1
            ),
          'limit' => 15,
          ));
if(!empty($featured_class)){

$str='';
 
   $str=$str.'<table id="example" class="table table-striped table-bordered" style="table-layout: fixed;width: 100%;font_size:20px;">';
$str=$str.'<thead style="background-color:#00cdc6;">
                                <tr>
                                    <th>Sr. no.</th>
                                    <th>Class</th>
                                    <th>People have booked</th>
                                  <th>Action</th></tr></thead><tbody style="font-size:15px;">';
                                  $i=1;  
                                  foreach($featured_class as $result){
                                     $str=$str.'<tr><td>'.$i.'</td>';
                                     $str=$str.'<td>'.$result['VendorClasse']['class_topic'].'</td>';
                                $a = $this->Ticket->find('all',array(      
                                              'joins'=>
                                                        array(
                                                          array(
                                                          'table'  =>'bg_user_masters',  
                                                          'alias'  =>'UserMaster',
                                                          'conditions'=>array(
                                                          'Ticket.user_id=UserMaster.id'
                                                          ),                  
                                                        )
                                              ),
                                              'conditions' => array(  
                                                              'Ticket.vendor_classe_id'=>$result['VendorClasse']['id']
                                                            
                                                            ),      
                                              'fields' => 'UserMaster.*',  
                                          ));
                              
                               


                                 /* $a=$this->Ticket->find('all',array('conditions'=>array('Ticket.vendor_classe_id'=>$result['bg_vendor_classes']['id'],'Ticket.txn_id'=>$result['bg_tickets']['txn_id'])));*/
                                   $b=count($a);
                                  
                                     $str=$str.'<td class="dropdown" align="center" >'.$b.' People ';
                                     if($b!='0'){
                                     $str.='<ul class="dropdown-menu extended logout" style="width:100%;background-color:#00cdc6;color:#fff;top:30px;">';
                                   }
                                 foreach($a as $r){
                                  $str=$str.'<li><center><a href='.HTTP_ROOT.'/Homes/profile/'.base64_encode($r['UserMaster']['id']).'>'.$r['UserMaster']['first_name'].'</center></li>';
                                }
                                 $str=$str.'</ul>
                                     </a></td>';
                                     $str=$str.'<td><a href='.HTTP_ROOT.'/classes/'.$result['VendorClasse']['class_topic'].'>Click to Book</a></td></tr>';
                                    $i++;
                                  }
                                  $str=$str."<tbody>";
                                 print_r($str);die;   
 }
}
/*=====================================End First Case===================================================*/
/* Case 2 @RahulPathak
Gps Found And Location is Blank*/

if(($lat=='0')&&($lng=='0')&&($location!='null')&&($search=='0')&&($cat_id=='null')){
  
  $res1=$this->getLatLong($location);
  $lat=$res1['latitude'];
  $lng=$res1['longitude'];
  $res=$this->VendorClasse->query("SELECT bg_vendor_classes.id as ide,bg_vendor_classe_location_details.vendor_class_id, bg_vendor_classes.class_topic,bg_vendor_classe_location_details.latitude, bg_vendor_classe_location_details.longitude,bg_vendor_classes.category_id,SQRT( POW( 69.1 * ( bg_vendor_classe_location_details.latitude - $lat ) , 2 ) + POW( 69.1 * ( bg_vendor_classe_location_details.longitude -$lng ) * COS( $lat / 57.3 ) , 2 ) ) AS distance

FROM bg_vendor_classes,bg_vendor_classe_location_details

HAVING distance <=$dist

AND bg_vendor_classe_location_details.vendor_class_id = bg_vendor_classes.id
ORDER BY distance");

 if(!empty($res)){
$str=$str.'<table id="example" class="table table-striped table-bordered" style="table-layout: fixed;width: 100%;font_size:20px;">';
$str=$str.'<thead style="background-color:#00cdc6;">
                                <tr>
                                    <th>Sr. no.</th>
                                    <th>Class</th>
                                    <th>People have booked</th>
                                  <th>Action</th></tr></thead><tbody style="font-size:15px;">';
                                  $i=1;  
                                  foreach($res as $result){
                                     $str=$str.'<tr><td>'.$i.'</td>';
                                     $str=$str.'<td>'.$result['bg_vendor_classes']['class_topic'].'</td>';
                                $a = $this->Ticket->find('all',array(      
                                              'joins'=>
                                                        array(
                                                          array(
                                                          'table'  =>'bg_user_masters',  
                                                          'alias'  =>'UserMaster',
                                                          'conditions'=>array(
                                                          'Ticket.user_id=UserMaster.id'
                                                          ),                  
                                                        )
                                              ),
                                              'conditions' => array(  
                                                              'Ticket.vendor_classe_id'=>$result['bg_vendor_classes']['ide']
                                                            
                                                            ),      
                                              'fields' => 'UserMaster.*',  
                                          ));
                              
                               


                                 /* $a=$this->Ticket->find('all',array('conditions'=>array('Ticket.vendor_classe_id'=>$result['bg_vendor_classes']['id'],'Ticket.txn_id'=>$result['bg_tickets']['txn_id'])));*/
                                    $b=count($a);
                                  
                                     $str=$str.'<td class="dropdown" align="center" >'.$b.' People ';
                                     if($b!='0'){
                                     $str.='<ul class="dropdown-menu extended logout" style="width:100%;background-color:#00cdc6;color:#fff;top:30px;">';
                                   }
                                 foreach($a as $r){
                                  $str=$str.'<li><center><a href='.HTTP_ROOT.'/Homes/profile/'.base64_encode($r['UserMaster']['id']).'>'.$r['UserMaster']['first_name'].'</center></li>';
                                }
                                 $str=$str.'</ul>
                                     </a></td>';
                                     $str=$str.'<td><a href='.HTTP_ROOT.'/classes/'.$result['bg_vendor_classes']['class_topic'].'>Click to Book</a></td></tr>';
                                    $i++;
                                  }
                                  $str=$str."<tbody>";
                                 print_r($str);die;

}
}
/*=================================================End Secound Case===========================================================*/
/* @Rahul Pathak Case 3 Gps Not Found Location  found*/
if(($lat=='0')&&($lng=='0')&&($location!='null')&&($search=='0')){

  $res1=$this->getLatLong($location);
  $lat=$res1['latitude'];
  $lng=$res1['longitude'];
  $res=$this->VendorClasse->query("SELECT bg_vendor_classes.id as ide,bg_vendor_classe_location_details.vendor_class_id, bg_vendor_classes.class_topic,bg_vendor_classe_location_details.latitude, bg_vendor_classe_location_details.longitude,bg_vendor_classes.category_id,SQRT( POW( 69.1 * ( bg_vendor_classe_location_details.latitude - $lat ) , 2 ) + POW( 69.1 * ( bg_vendor_classe_location_details.longitude -$lng ) * COS( $lat / 57.3 ) , 2 ) ) AS distance

FROM bg_vendor_classes,bg_vendor_classe_location_details

HAVING distance <=$dist

AND bg_vendor_classe_location_details.vendor_class_id = bg_vendor_classes.id  and bg_vendor_classes.category_id='".$cat_id."'
ORDER BY distance");

 if(!empty($res)){
$str=$str.'<table id="example" class="table table-striped table-bordered" style="table-layout: fixed;width: 100%;font_size:20px;">';
$str=$str.'<thead style="background-color:#00cdc6;">
                                <tr>
                                    <th>Sr. no.</th>
                                    <th>Class</th>
                                    <th>People have booked</th>
                                  <th>Action</th></tr></thead><tbody style="font-size:15px;">';
                                  $i=1;  
                                  foreach($res as $result){
                                     $str=$str.'<tr><td>'.$i.'</td>';
                                     $str=$str.'<td>'.$result['bg_vendor_classes']['class_topic'].'</td>';
                                $a = $this->Ticket->find('all',array(      
                                              'joins'=>
                                                        array(
                                                          array(
                                                          'table'  =>'bg_user_masters',  
                                                          'alias'  =>'UserMaster',
                                                          'conditions'=>array(
                                                          'Ticket.user_id=UserMaster.id'
                                                          ),                  
                                                        )
                                              ),
                                              'conditions' => array(  
                                                              'Ticket.vendor_classe_id'=>$result['bg_vendor_classes']['ide']
                                                            
                                                            ),      
                                              'fields' => 'UserMaster.*',  
                                          ));
                              
                               


                                 /* $a=$this->Ticket->find('all',array('conditions'=>array('Ticket.vendor_classe_id'=>$result['bg_vendor_classes']['id'],'Ticket.txn_id'=>$result['bg_tickets']['txn_id'])));*/
                                    $b=count($a);
                                  
                                     $str=$str.'<td class="dropdown" align="center" >'.$b.' People ';
                                     if($b!='0'){
                                     $str.='<ul class="dropdown-menu extended logout" style="width:100%;background-color:#00cdc6;color:#fff;top:30px;">';
                                   }
                                 foreach($a as $r){
                                  $str=$str.'<li><center><a href='.HTTP_ROOT.'/Homes/profile/'.base64_encode($r['UserMaster']['id']).'>'.$r['UserMaster']['first_name'].'</center></li>';
                                }
                                 $str=$str.'</ul>
                                     </a></td>';
                                     $str=$str.'<td><a href='.HTTP_ROOT.'/classes/'.$result['bg_vendor_classes']['class_topic'].'>Click to Book</a></td></tr>';
                                    $i++;
                                  }
                                  $str=$str."<tbody>";
                                 print_r($str);die;

}
}
/*======================================================End=========================================================*/
/* @Rahul Pathak Case 5 Gps Not Found Location found and search Found*/




if(($lat=='0')&&($lng=='0')&&($location!='null')&&($search!='0')){
   $res1=$this->getLatLong($location);
  $lat=$res1['latitude'];
  $lng=$res1['longitude'];
  $res=$this->VendorClasse->query("SELECT bg_vendor_classes.id as ide,bg_vendor_classe_location_details.vendor_class_id, bg_vendor_classes.class_topic,bg_vendor_classe_location_details.latitude, bg_vendor_classe_location_details.longitude,bg_vendor_classes.category_id,SQRT( POW( 69.1 * ( bg_vendor_classe_location_details.latitude - $lat ) , 2 ) + POW( 69.1 * ( bg_vendor_classe_location_details.longitude -$lng ) * COS( $lat / 57.3 ) , 2 ) ) AS distance

FROM bg_vendor_classes,bg_vendor_classe_location_details

HAVING distance <=$dist

AND bg_vendor_classe_location_details.vendor_class_id = bg_vendor_classes.id  and bg_vendor_classes.category_id='".$cat_id."' and bg_vendor_classes.class_topic Like '%$search%'
ORDER BY distance");

 if(!empty($res)){
$str=$str.'<table id="example" class="table table-striped table-bordered" style="table-layout: fixed;width: 100%;font_size:20px;">';
$str=$str.'<thead style="background-color:#00cdc6;">
                                <tr>
                                    <th>Sr. no.</th>
                                    <th>Class</th>
                                    <th>People have booked</th>
                                  <th>Action</th></tr></thead><tbody style="font-size:15px;">';
                                  $i=1;  
                                  foreach($res as $result){
                                     $str=$str.'<tr><td>'.$i.'</td>';
                                     $str=$str.'<td>'.$result['bg_vendor_classes']['class_topic'].'</td>';
                                $a = $this->Ticket->find('all',array(      
                                              'joins'=>
                                                        array(
                                                          array(
                                                          'table'  =>'bg_user_masters',  
                                                          'alias'  =>'UserMaster',
                                                          'conditions'=>array(
                                                          'Ticket.user_id=UserMaster.id'
                                                          ),                  
                                                        )
                                              ),
                                              'conditions' => array(  
                                                              'Ticket.vendor_classe_id'=>$result['bg_vendor_classes']['ide']
                                                            
                                                            ),      
                                              'fields' => 'UserMaster.*',  
                                          ));
                              
                               


                                 /* $a=$this->Ticket->find('all',array('conditions'=>array('Ticket.vendor_classe_id'=>$result['bg_vendor_classes']['id'],'Ticket.txn_id'=>$result['bg_tickets']['txn_id'])));*/
                                    $b=count($a);
                                  
                                     $str=$str.'<td class="dropdown" align="center" >'.$b.' People ';
                                     if($b!='0'){
                                     $str.='<ul class="dropdown-menu extended logout" style="width:100%;background-color:#00cdc6;color:#fff;top:30px;">';
                                   }
                                 foreach($a as $r){
                                  $str=$str.'<li><center><a href='.HTTP_ROOT.'/Homes/profile/'.base64_encode($r['UserMaster']['id']).'>'.$r['UserMaster']['first_name'].'</center></li>';
                                }
                                 $str=$str.'</ul>
                                     </a></td>';
                                     $str=$str.'<td><a href='.HTTP_ROOT.'/classes/'.$result['bg_vendor_classes']['class_topic'].'>Click to Book</a></td></tr>';
                                    $i++;
                                  }
                                  $str=$str."<tbody>";
                                 print_r($str);die;

}
}
/*================================================================End ======================================================*/
/* @Rahul Pathak Case 5 Gps  Found Location Not found and search Found*/

if(($lat=='0')&&($lng=='0')&&($location=='null')&&($search!='0')){
   
   $res=$this->VendorClasse->query("SELECT bg_vendor_classes.id as ide,bg_vendor_classe_location_details.vendor_class_id, bg_vendor_classes.class_topic,bg_vendor_classe_location_details.latitude, bg_vendor_classe_location_details.longitude,bg_vendor_classes.category_id

FROM bg_vendor_classes,bg_vendor_classe_location_details


where bg_vendor_classe_location_details.vendor_class_id = bg_vendor_classes.id  and bg_vendor_classes.category_id='".$cat_id."' and bg_vendor_classes.class_topic Like '%$search%'");



 if(!empty($res)){
$str=$str.'<table id="example" class="table table-striped table-bordered" style="table-layout: fixed;width: 100%;font_size:20px;">';
$str=$str.'<thead style="background-color:#00cdc6;">
                                <tr>
                                    <th>Sr. no.</th>
                                    <th>Class</th>
                                    <th>People have booked</th>
                                  <th>Action</th></tr></thead><tbody style="font-size:15px;">';
                                  $i=1;  
                                  foreach($res as $result){
                                     $str=$str.'<tr><td>'.$i.'</td>';
                                     $str=$str.'<td>'.$result['bg_vendor_classes']['class_topic'].'</td>';
                                $a = $this->Ticket->find('all',array(      
                                              'joins'=>
                                                        array(
                                                          array(
                                                          'table'  =>'bg_user_masters',  
                                                          'alias'  =>'UserMaster',
                                                          'conditions'=>array(
                                                          'Ticket.user_id=UserMaster.id'
                                                          ),                  
                                                        )
                                              ),
                                              'conditions' => array(  
                                                              'Ticket.vendor_classe_id'=>$result['bg_vendor_classes']['ide']
                                                            
                                                            ),      
                                              'fields' => 'UserMaster.*',  
                                          ));
                              
                               


                                 /* $a=$this->Ticket->find('all',array('conditions'=>array('Ticket.vendor_classe_id'=>$result['bg_vendor_classes']['id'],'Ticket.txn_id'=>$result['bg_tickets']['txn_id'])));*/
                                    $b=count($a);
                                  
                                     $str=$str.'<td class="dropdown" align="center" >'.$b.' People ';
                                     if($b!='0'){
                                     $str.='<ul class="dropdown-menu extended logout" style="width:100%;background-color:#00cdc6;color:#fff;top:30px;">';
                                   }
                                 foreach($a as $r){
                                  $str=$str.'<li><center><a href='.HTTP_ROOT.'/Homes/profile/'.base64_encode($r['UserMaster']['id']).'>'.$r['UserMaster']['first_name'].'</center></li>';
                                }
                                 $str=$str.'</ul>
                                     </a></td>';
                                     $str=$str.'<td><a href='.HTTP_ROOT.'/classes/'.$result['bg_vendor_classes']['class_topic'].'>Click to Book</a></td></tr>';
                                    $i++;
                                  }
                                  $str=$str."<tbody>";
                                 print_r($str);die;
/*===========================================================================End ===========================================================*/

}
}
if(($lat=='0')&&($lng=='0')&&($location=='null')&&($search!='0')&&($cat_id=='null')){
 
  $res=$this->VendorClasse->query("SELECT bg_vendor_classes.id as ide,bg_vendor_classe_location_details.vendor_class_id, bg_vendor_classes.class_topic,bg_vendor_classe_location_details.latitude, bg_vendor_classe_location_details.longitude,bg_vendor_classes.category_id

FROM bg_vendor_classes,bg_vendor_classe_location_details


where  bg_vendor_classe_location_details.vendor_class_id = bg_vendor_classes.id  and bg_vendor_classes.class_topic Like '%$search%'");

 if(!empty($res)){
$str=$str.'<table id="example" class="table table-striped table-bordered" style="table-layout: fixed;width: 100%;font_size:20px;">';
$str=$str.'<thead style="background-color:#00cdc6;">
                                <tr>
                                    <th>Sr. no.</th>
                                    <th>Class</th>
                                    <th>People have booked</th>
                                  <th>Action</th></tr></thead><tbody style="font-size:15px;">';
                                  $i=1;  
                                  foreach($res as $result){
                                     $str=$str.'<tr><td>'.$i.'</td>';
                                     $str=$str.'<td>'.$result['bg_vendor_classes']['class_topic'].'</td>';
                                $a = $this->Ticket->find('all',array(      
                                              'joins'=>
                                                        array(
                                                          array(
                                                          'table'  =>'bg_user_masters',  
                                                          'alias'  =>'UserMaster',
                                                          'conditions'=>array(
                                                          'Ticket.user_id=UserMaster.id'
                                                          ),                  
                                                        )
                                              ),
                                              'conditions' => array(  
                                                              'Ticket.vendor_classe_id'=>$result['bg_vendor_classes']['ide']
                                                            
                                                            ),      
                                              'fields' => 'UserMaster.*',  
                                          ));
                              
                               


                                 /* $a=$this->Ticket->find('all',array('conditions'=>array('Ticket.vendor_classe_id'=>$result['bg_vendor_classes']['id'],'Ticket.txn_id'=>$result['bg_tickets']['txn_id'])));*/
                                    $b=count($a);
                                  
                                     $str=$str.'<td class="dropdown" align="center" >'.$b.' People ';
                                     if($b!='0'){
                                     $str.='<ul class="dropdown-menu extended logout" style="width:100%;background-color:#00cdc6;color:#fff;top:30px;">';
                                   }
                                 foreach($a as $r){
                                  $str=$str.'<li><center><a href='.HTTP_ROOT.'/Homes/profile/'.base64_encode($r['UserMaster']['id']).'>'.$r['UserMaster']['first_name'].'</center></li>';
                                }
                                 $str=$str.'</ul>
                                     </a></td>';
                                     $str=$str.'<td><a href='.HTTP_ROOT.'/classes/'.$result['bg_vendor_classes']['class_topic'].'>Click to Book</a></td></tr>';
                                    $i++;
                                  }
                                  $str=$str."<tbody>";
                                 print_r($str);die;

}
}

}


public function findClasses(){
  $this->autoRender=false;
  $lat1=$this->params->pass[0];
  $lng1=$this->params->pass[1];
  $cat_id=$this->params->pass[2];
  $dist=$this->params->pass[3];
  $search=$this->params->pass[4];
  $location=$this->params->pass[5];
 if(($lat1=='0')&&($lng1=='0')&&($location=='null')){

  $address="Chennai";
  $res1=$this->getLatLong($address);
 
  if(empty($res1['latitude'])){
     return 0;//not Found
  }
  else{
   $lat=$res1['latitude'];
   $lng=$res1['longitude'];
 }
}
else{
  $lat=$lat1;
  $lng=$lng1;
}
//Not Empty Location And search Both
if(($location!='null')&&($search!='0')){   
 $res1=$this->getLatLong($location);
 $lat=$res1['latitude'];
 $lng=$res1['longitude'];
  $res=$this->VendorClasse->query("SELECT bg_vendor_classes.id as ide, bg_vendor_classe_location_details.vendor_class_id, bg_vendor_classes.class_topic,bg_vendor_classes.category_id,bg_vendor_classe_location_details.latitude, bg_vendor_classe_location_details.longitude,bg_categories.color_code,bg_categories.id,SQRT( POW( 69.1 * ( bg_vendor_classe_location_details.latitude - $lat ) , 2 ) + POW( 69.1 * ( bg_vendor_classe_location_details.longitude - $lng ) * COS( $lat / 57.3 ) , 2 ) ) AS distance
FROM bg_vendor_classes, bg_vendor_classe_location_details,bg_categories
HAVING distance <$dist
AND bg_vendor_classes.category_id='".$cat_id."' and  bg_vendor_classe_location_details.vendor_class_id = bg_vendor_classes.id and bg_vendor_classes.category_id=bg_categories.id and bg_vendor_classes.class_topic Like '%$search%' 
ORDER BY distance");
  if(!empty($res)){
    $l=0;
          foreach($res as $res1){
          $res[$l]['bg_vendor_classes']['current_lat']=$lat;
          $res[$l]['bg_vendor_classes']['current_lng']=$lng;
          $l++;
         }
    
  echo json_encode($res);die;
}
else{
  $res['found']=0;
   $res['current_lat']=$lat;
   $res['current_lng']=$lng;
    
  echo json_encode($res);die;
}
}
//Empty Search But Not Location
if(($search=='0')&&($location!='null')){  
 $res1=$this->getLatLong($location);
 $lat=$res1['latitude'];
 $lng=$res1['longitude'];
 $res=$this->VendorClasse->query("SELECT bg_vendor_classes.id as ide, bg_vendor_classe_location_details.vendor_class_id, bg_vendor_classes.class_topic,bg_vendor_classes.category_id,bg_vendor_classe_location_details.latitude, bg_vendor_classe_location_details.longitude,bg_categories.color_code,bg_categories.id,SQRT( POW( 69.1 * ( bg_vendor_classe_location_details.latitude - $lat ) , 2 ) + POW( 69.1 * ( bg_vendor_classe_location_details.longitude - $lng ) * COS( $lat / 57.3 ) , 2 ) ) AS distance
FROM bg_vendor_classes, bg_vendor_classe_location_details,bg_categories
HAVING distance <$dist
AND bg_vendor_classes.category_id='".$cat_id."' and  bg_vendor_classe_location_details.vendor_class_id = bg_vendor_classes.id and bg_vendor_classes.category_id=bg_categories.id 
ORDER BY distance");
  if(!empty($res)){
     $l=0;
          foreach($res as $res1){
          $res[$l]['bg_vendor_classes']['current_lat']=$lat;
          $res[$l]['bg_vendor_classes']['current_lng']=$lng;
          $l++;
         }
    
  echo json_encode($res);die;
}
else{
  $res['found']=0;
   $res['current_lat']=$lat;
   $res['current_lng']=$lng;
    
  echo json_encode($res);die;
}
}
//Empty Search and location Both 
  if(($search=='0')&&($location=='null')){

  $res=$this->VendorClasse->query("SELECT bg_vendor_classes.id as ide, bg_vendor_classe_location_details.vendor_class_id, bg_vendor_classes.class_topic,bg_vendor_classes.category_id,bg_vendor_classe_location_details.latitude, bg_vendor_classe_location_details.longitude,bg_categories.color_code,bg_categories.id,SQRT( POW( 69.1 * ( bg_vendor_classe_location_details.latitude - $lat ) , 2 ) + POW( 69.1 * ( bg_vendor_classe_location_details.longitude - $lng ) * COS( $lat / 57.3 ) , 2 ) ) AS distance
FROM bg_vendor_classes, bg_vendor_classe_location_details,bg_categories
HAVING distance <$dist
AND bg_vendor_classes.category_id='".$cat_id."' and  bg_vendor_classe_location_details.vendor_class_id = bg_vendor_classes.id and bg_vendor_classes.category_id=bg_categories.id 
ORDER BY distance");
  if(!empty($res)){
    $l=0;
          foreach($res as $res1){
          $res[$l]['bg_vendor_classes']['current_lat']=$lat;
          $res[$l]['bg_vendor_classes']['current_lng']=$lng;
          $l++;
         }
  
  echo json_encode($res);die;
}
else{
  $res['found']=0;
   $res['current_lat']=$lat;
   $res['current_lng']=$lng;
    
  echo json_encode($res);die;
}
}
else{
 $res=$this->VendorClasse->query("SELECT bg_vendor_classes.id as ide, bg_vendor_classe_location_details.vendor_class_id, bg_vendor_classes.class_topic,bg_vendor_classes.category_id,bg_vendor_classe_location_details.latitude, bg_vendor_classe_location_details.longitude,bg_categories.color_code,bg_categories.id,SQRT( POW( 69.1 * ( bg_vendor_classe_location_details.latitude - $lat ) , 2 ) + POW( 69.1 * ( bg_vendor_classe_location_details.longitude - $lng ) * COS( $lat / 57.3 ) , 2 ) ) AS distance
FROM bg_vendor_classes, bg_vendor_classe_location_details,bg_categories
HAVING distance <$dist
AND bg_vendor_classes.category_id='".$cat_id."' and  bg_vendor_classe_location_details.vendor_class_id = bg_vendor_classes.id and bg_vendor_classes.category_id=bg_categories.id and bg_vendor_classes.class_topic Like '%$search%' 
ORDER BY distance");
  if(!empty($res)){
    $l=0;
          foreach($res as $res1){
          $res[$l]['bg_vendor_classes']['current_lat']=$lat;
          $res[$l]['bg_vendor_classes']['current_lng']=$lng;
          $l++;
         }
  echo json_encode($res);die;
}
else{
  $res['found']=0;
   $res['current_lat']=$lat;
   $res['current_lng']=$lng;
    
  echo json_encode($res);die;
} 
}
}

/*======================================================End Explore Section @ RahulPathak================================================================*/

    public function gift_class1(){

      //$this->checkUser();

      $this->layout='vendor_layout';

      $user=$this->Session->read('User');

      

     $this->set('user_view',$user);

      



    }

    public function brain_catalog(){

      //$this->checkUser();

      $this->layout='vendor_layout';

      $user=$this->Session->read('User');

      

     $this->set('user_view',$user);

      



    }

    public function health(){

      //$this->checkUser();

      $this->layout='fun_layout';

      $user=$this->Session->read('User');



      //$this->set('user_view',$user);

    }

    public function kids(){

      //$this->checkUser();

      $this->layout='fun_layout';

      $user=$this->Session->read('User');



      //$this->set('user_view',$user);

    }

    public function education(){

      //$this->checkUser();

      $this->layout='fun_layout';

      $user=$this->Session->read('User');



      //$this->set('user_view',$user);

    }

    public function home_maintenance(){

      //$this->checkUser();

      $this->layout='fun_layout';

      $user=$this->Session->read('User');



      //$this->set('user_view',$user);

    }

    // ***************Najmuddin

   /*public function dashboard(){
     if($this->params->pass[0] == 'lern_dash'){
        $page_section_name =  $this->params['pass'][0];
           if(!empty($page_section_name)){
               $this->set('page_section_name',$page_section_name);
               $this->checkUser();
               $user=$this->Session->read('User');
               $user=$this->UserMaster->find('first',array('conditions'=>array('email'=>$user['UserMaster']['email'])));
               $this->layout='vendor_layout';
               $this->set('user_view',$user);
           }
          }else{  
               if(!empty($this->params->pass[0])){
                  $email=base64_decode($this->params->pass[0]);
                  print_r($email);die;
                  $user=$this->UserMaster->find('first',array('conditions'=>array('email'=>$email)));
                      if(!empty($user)){
                           $user['UserMaster']['status']=1;
                           $this->UserMaster->save($user);
                           $this->layout='vendor_layout';
                     $user=$this->UserMaster->find('first',array('conditions'=>array('email'=>$email)));
                     print_r($user);die;
                           $this->set('user_view',$user);
                           
                       }else{
                           $this->redirect(array('controller'=>'Homes','action'=>'login'));
                       }
                 }else{

                     $this->checkUser();
                     $user=$this->Session->read('User');
                    
                     $user=$this->UserMaster->find('first',array('conditions'=>array('email'=>$user['UserMaster']['email'],'user_type_id'=>$user['UserMaster']['user_type_id'])));
                     print_r($user);die;
                     $this->layout='vendor_layout';
                     $this->set('user_view',$user);
                }
         }
   }*/
	public function dashboard(){
     if($this->params->pass[0] == 'lern_dash'){
        $page_section_name =  $this->params['pass'][0];
           if(!empty($page_section_name)){
               $this->set('page_section_name',$page_section_name);
               $this->checkUser();
               $user=$this->Session->read('User');
               $user=$this->UserMaster->find('first',array('conditions'=>array('email'=>$user['UserMaster']['email'])));
               $this->layout='vendor_layout';
               $this->set('user_view',$user);
           }
          }else{  
               if(!empty($this->params->pass[0])){ 
                  $email=base64_decode($this->params->pass[0]);
                  $user=$this->UserMaster->find('first',array('conditions'=>array('email'=>$email)));
                      if(!empty($user)){
                           $user['UserMaster']['status']=1;
                           $this->UserMaster->save($user);
                           $this->layout='vendor_layout';
                           $user=$this->UserMaster->find('first',array('conditions'=>array('email'=>$email)));
                          
                           $this->Session->write('User',$user); 
                           $this->set('user_view',$user);
                       }else{
                           $this->redirect(array('controller'=>'Homes','action'=>'login'));
                       }
                 }else{
                     $this->checkUser();
                     $user=$this->Session->read('User');
                     $user=$this->UserMaster->find('first',array('conditions'=>array('email'=>$user['UserMaster']['email'])));
                     //print_r($user);die;
                     $this->layout='vendor_layout';
                     $this->set('user_view',$user);
                }
         }
   
      }
    public function profile(){

      $this->layout= 'profile_layout';

      if(!empty($this->params->pass[0])){

        $profile_id = base64_decode($this->params->pass[0]);

        $user = $this->UserMaster->Find("first",array('conditions'=>array('id' => $profile_id)));

        $this->set('user_view',$user);

        $res = $this->UserMaster->find('first' ,array('conditions' => array('id' => $profile_id)));

        if(!empty($res)){

          $city_name=$this->City->find('first',array('conditions'=>array('id'=>$res['UserMaster']['city_id'])));

          $this->set('city_name',$city_name);



          $locality_name=$this->Locality->find('first',array('conditions'=>array('id'=>$res['UserMaster']['locality_id']))); 

          //print_r($locality_name);die;

          if(!empty($locality_name)){

          $res['UserMaster']['locality']=$locality_name['Locality']['name'];

          } 

          

          $interest=$this->Category->query("select * from bg_categories where id IN (".$res['UserMaster']['category_id'].")");

          //print_r($interest);die;

          if(!empty($interest)){

           foreach($interest as $res1){

          $res['UserMaster']['interest']=$res['UserMaster']['interest'].$res1['bg_categories']['category_name'].",";

          }

          $res['UserMaster']['interest']=rtrim($res['UserMaster']['interest'], ",");

           

          }

        

          $city=$this->City->find('all');

          //print_r($city);die;

          $cat_localitie=$this->Locality->find('all');

          $cat=$this->Category->find('all',array('conditions'=>array('status'=>1)));

          $this->set('localitie',$cat_localitie);

          $this->set('city',$city);

          $this->set('category',$cat);

          //print_r($res);die;  

         $this->set('user_view',$res);

         $class_detail=$this->VendorClasse->find('all',array('conditions'=>array('user_id'=>$user['UserMaster']['id'],'end_month >='=>date('m/d/Y'))));

         //print_r($class_detail);die;

         if(!empty($class_detail)){

       $l=0;

       foreach($class_detail as $res){

      $class_by=$this->UserMaster->find('first',array('conditions'=>array('id'=>$res['VendorClasse']['user_id'])));

      if($class_by['UserMaster']['vendor_type_id']=='1'){

        $class_detail[$l]['VendorClasse']['class_by']=$class_by['UserMaster']['institute_name'];

      }

      else{

       $class_detail[$l]['VendorClasse']['class_by']=$class_by['UserMaster']['first_name'];

       

      }

      $l++;

      }

     // print_r($class_detail);die;

      $this->set('upcoming_class',$class_detail);

     

   }

    

     $class_detail1=$this->VendorClasse->find('all',array('conditions'=>array('user_id'=>$user['UserMaster']['id'],'starting_month <'=>date('m/d/Y'))));

     //print_r($class_detail1);die;

    // print_r($class_detail);die;

     if(!empty($class_detail1)){

       $p=0;

       foreach($class_detail1 as $res){

      $class_by=$this->UserMaster->find('first',array('conditions'=>array('id'=>$res['VendorClasse']['user_id'])));

      if($class_by['UserMaster']['vendor_type_id']=='1'){

        $class_detail1[$p]['VendorClasse']['class_by']=$class_by['UserMaster']['institute_name'];

      }

      else{

       $class_detail1[$p]['VendorClasse']['class_by']=$class_by['UserMaster']['first_name'];

       

      }

      $p++;

    }

      $this->set('past_class',$class_detail1);

      //print_r($class_detail1);die;

     }

      }

    }

    }

    public function myProfile(){
		
		
      $this->checkUser();
      $this->layout='vendor_layout';
      $userdata = $this->Session->read('User');
      
      $user_id = $userdata['UserMaster']['id'];
      $vendor_type=array();
      
      $vendor_type[1]='Organisation';
      $vendor_type[2]='Indivisual';
      
      $this->set('vendor_type',$vendor_type);
     
      if($userdata['UserMaster']['user_type_id'] == 1){
		$ven_msg = $this->ChatMessage->find('count',array('conditions'=>array('ChatMessage.reciever_id'=>$user_id,
		'ChatMessage.sender_id'=>0,
		'ChatMessage.status'=>1)));
		if(!empty($ven_msg)){
		$this->set('ven_msg',$ven_msg);
		}
		}else{
		$ven_msg = $this->ChatMessage->find('count',array('conditions'=>array('ChatMessage.reciever_id'=>$user_id,
		'ChatMessage.sender_id'=>0,
		'ChatMessage.status'=>1)));
		if(!empty($ven_msg)){
		$this->set('ven_msg',$ven_msg);
		}
		}
      $page_section_name =  $this->params['pass'][0];
      $this->set('page_section_name',$page_section_name);
    
      //upload image file
      if(isset($_FILES['imagefiles'])){
          $errors= array();

        foreach($_FILES['imagefiles']['tmp_name'] as $key => $tmp_name ){
          
            $file_name = $user_id."_".$_FILES['imagefiles']['name'][$key];
            $file_size =$_FILES['imagefiles']['size'][$key];
            $file_tmp =$_FILES['imagefiles']['tmp_name'][$key];
			
            $file_type=$_FILES['imagefiles']['type'][$key];
            //debug($key." - ".$tmp_name." - ".$file_size ." - ".$file_name);die;
            if($file_size > 2097152){
              $errors[]='File size must be less than 2 MB';
            }
            
              $get_name = explode('.',$file_name);  
              //print_r($get_name);die;
              $final_name = mt_rand(100000,999999).'.'.$get_name[1];


              $desired_dir=WWW_ROOT.'img/Vendor/UploadImage_'.$user_id.'/';
                if(empty($errors)==true){
                  if(is_dir($desired_dir)==false){
                      mkdir("$desired_dir", 0777);    // Create directory if it does not exist
                  }
                  if(is_dir("$desired_dir/".$final_name)==false){
					  
					        $image_size_info    = getimagesize($file_tmp); //get image size

							if($image_size_info){
								$image_width        = $image_size_info[0]; //image width
								$image_height       = $image_size_info[1]; //image height
								$image_type         = $image_size_info['mime']; //image type
							}else{
								die("Make sure image file is valid!");
							}

							//switch statement below checks allowed image type 
							//as well as creates new image from given file 
							
							$quality  = 50;
							$destination_url = $desired_dir.$final_name;
							$destination_url_thumb = $desired_dir."thumb_".$final_name;
							$thumb_width = 90;
							$thumb_height = 50;
							$thumb_create = imagecreatetruecolor($thumb_width,$thumb_height);
							
							
							switch($image_type){
								case 'image/png':
									$image_res =  imagecreatefrompng($file_tmp); 
									imagepng($image_res, $destination_url, $quality);
									break;
								case 'image/gif':
									$image_res =  imagecreatefromgif($file_tmp); 
                                   imagegif($image_res, $destination_url, $quality);
								   break;									
								case 'image/jpeg': case 'image/pjpeg':
									$image_res = imagecreatefromjpeg($file_tmp); 
									
									imagejpeg($image_res, $destination_url, $quality);
									break;
								default:
									$image_res = false;
							}
					
							
							imagecopyresized($thumb_create,$image_res,0,0,0,0,$thumb_width,$thumb_height,$image_width,$image_height);
							
							switch($image_type){
								case 'image/jpeg': case 'image/pjpeg':
									imagejpeg($thumb_create,$destination_url_thumb,50);
									break;
								case 'image/png':
									imagepng($thumb_create,$destination_url_thumb,50);
									break;

								case 'image/gif':
									imagegif($thumb_create,$destination_url_thumb,50);
									break;
								default:
									imagejpeg($thumb_create,$destination_url_thumb,50);
							}
							
						
				
					        
					   
					   imagedestroy($image_res);
					   
					  
					/*
                    move_uploaded_file($file_tmp,$desired_dir.$final_name);
                    */
                    $photodata = $this->VendorGalleries->set(array(
                                                        'user_id' => $user_id,
                                                        'category_id' => 1,
                                                        'media_title' => 'My Image',
                                                        'media_path' => $final_name,
                                                        'description' => '',
                                                        'status'      => 1,
                                                        'add_date'    => time(),
                                                        'modify_date' => time()
                                                      )
                                                    );
										  							
                    $photoresult =   $this->VendorGalleries->save($photodata);
					
					
					
					
					
                  }
                  if($photoresult){
                    $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                          array('pass'=>array('107','1')));
                    $this->redirect(array('controller'=>'homes','action'=>'myProfile'));
                  } 
                }else{
                  print_r($errors);
              }
          }
          if($result)
          {
            if($result){
                $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                      array('pass'=>array('107','1')));
                $this->redirect(array('controller'=>'homes','action'=>'myProfile'));
              } 
          } 
        if(empty($error)){
         echo "Success";
        }
      }
	  
	  /* image upload ends here    */
      $galleryimage = $this->VendorGalleries->find('all', array(
                            'conditions' => array(
                              'VendorGalleries.user_id'    => $user_id,
                              'VendorGalleries.category_id' => 1
                          )
                      ));

      $this->set(compact('galleryimage')); 
      //upload video file
      //print_r($_FILES['videofiles']);die;
      if(isset($_FILES['videofiles'])){
          $errors= array();

        foreach($_FILES['videofiles']['tmp_name'] as $key => $tmp_name ){
          
            $file_name = $user_id."_".$_FILES['videofiles']['name'][$key];
            $file_size =$_FILES['videofiles']['size'][$key];
            $file_tmp =$_FILES['videofiles']['tmp_name'][$key];
            $file_type=$_FILES['videofiles']['type'][$key];
            //debug($key." - ".$tmp_name." - ".$file_size ." - ".$file_name);die;
          
              $get_name = explode('.',$file_name);  
              $final_name = mt_rand(100000,999999).'.'.$get_name[2];
              $desired_dir=WWW_ROOT.'img/Vendor/UploadVideo_'.$user_id.'/';
                if(empty($errors)==true){
                  if(is_dir($desired_dir)==false){
                      mkdir("$desired_dir", 0777);    // Create directory if it does not exist
                  }
                  if(is_dir("$desired_dir/".$final_name)==false){
                    move_uploaded_file($file_tmp,$desired_dir.$final_name);

                    $data = $this->VendorGalleries->set(array(
                                                        'user_id' => $user_id,
                                                        'category_id' => 2,
                                                        'media_title' => 'My Video',
                                                        'media_path' => $final_name,
                                                        'description' => '',
                                                        'status'      => 1,
                                                        'add_date'    => time(),
                                                        'modify_date' => time()
                                                      )
                                                    );
                   
                    $result =   $this->VendorGalleries->save($data);
                  
                  } 
                 if($result){
                    $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                          array('pass'=>array('108','1')));
                    $this->redirect(array('controller'=>'homes','action'=>'myProfile'));
                  } 
                }else{
                  print_r($errors);
              }
          }
          if($result){
            $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                  array('pass'=>array('108','1')));
            $this->redirect(array('controller'=>'homes','action'=>'myProfile'));
          } 
        if(empty($error)){
         echo "Success";
        }
      }
      $galleryvideo = $this->VendorGalleries->find('all', array(
                              'conditions' => array(
                                'VendorGalleries.user_id'    => $user_id,
                                'VendorGalleries.category_id' => 2
                          )
                      ));

      $this->set(compact('galleryvideo'));

      if($this->request->is('post')){
        $data=$this->data;
        $res=$this->UserVerfication->find('first',array('conditions'=>array('UserVerfication.user_id'=>$data['UserMaster']['id'])));
                    
        if(!empty($data['UserVerfication']['primary_attached_media1']['name'])){
                    $img_filename = $data['UserVerfication']['primary_attached_media1']['name'];
                    
                    $img_tmpname  = $data['UserVerfication']['primary_attached_media1']['tmp_name'];
                              
             
               
              if(($img_filename != "") && ($img_tmpname != "")){

                  
                  $explode_file   = explode(".",$img_filename);
                  $countExp       = count($explode_file);
                  $fileExtenstion = $explode_file[$countExp-1];
                   
                  if(($fileExtenstion != 'png') && ($fileExtenstion != 'jpg') && ($fileExtenstion != 'jpeg') &&($fileExtenstion != 'gif')){
                      
                      $this->requestAction(array('controller'=>'validate','action'=>'generateServerResponse'),array('pass'=>array('611','0'))
                          ); 
                  }else{
                      $final_img = str_replace(".","",str_replace(" ","",date("YmdHis").microtime())).".".$fileExtenstion;    
                         
                          $upload=WWW_ROOT."img/Vendor/Varification/".$final_img;
                          
                            if(move_uploaded_file($img_tmpname,$upload)){ 
                             $dataArray['primary_attached_media1']=$final_img;
                             }      
                    } 
                    }
                  }
                   if(!empty($data['UserVerfication']['primary_attached_media2']['name'])){
                    $img_filename = $data['UserVerfication']['primary_attached_media2']['name'];
                    
                    $img_tmpname  = $data['UserVerfication']['primary_attached_media2']['tmp_name'];
                              
             
               
              if(($img_filename != "") && ($img_tmpname != "")){

                  
                  $explode_file   = explode(".",$img_filename);
                  $countExp       = count($explode_file);
                  $fileExtenstion = $explode_file[$countExp-1];
                   
                  if(($fileExtenstion != 'png') && ($fileExtenstion != 'jpg') && ($fileExtenstion != 'jpeg') &&($fileExtenstion != 'gif')){
                      
                      $this->requestAction(array('controller'=>'validate','action'=>'generateServerResponse'),array('pass'=>array('611','0'))
                          ); 
                  }else{
                      $final_img = str_replace(".","",str_replace(" ","",date("YmdHis").microtime())).".".$fileExtenstion;    
                         
                          $upload=WWW_ROOT."img/Vendor/Varification/".$final_img;
                          
                            if(move_uploaded_file($img_tmpname,$upload)){ 
                             $dataArray['primary_attached_media2']=$final_img;
                             }      
                    } 
                    }
                  }
                  if(!empty($data['UserVerfication']['secoundry_attached_media1']['name'])){
                    $img_filename = $data['UserVerfication']['secoundry_attached_media1']['name'];
                    
                    $img_tmpname  = $data['UserVerfication']['secoundry_attached_media1']['tmp_name'];
                              
             
               
              if(($img_filename != "") && ($img_tmpname != "")){

                  
                  $explode_file   = explode(".",$img_filename);
                  $countExp       = count($explode_file);
                  $fileExtenstion = $explode_file[$countExp-1];
                   
                  if(($fileExtenstion != 'png') && ($fileExtenstion != 'jpg') && ($fileExtenstion != 'jpeg') &&($fileExtenstion != 'gif')){
                      
                      $this->requestAction(array('controller'=>'validate','action'=>'generateServerResponse'),array('pass'=>array('611','0'))
                          ); 
                  }else{
                      $final_img = str_replace(".","",str_replace(" ","",date("YmdHis").microtime())).".".$fileExtenstion;    
                         
                          $upload=WWW_ROOT."img/Vendor/Varification/".$final_img;
                          
                            if(move_uploaded_file($img_tmpname,$upload)){ 
                             $dataArray['secoundry_attached_media1']=$final_img;
                             }      
                    } 
                    }
                  }
                  if(!empty($data['UserVerfication']['secoundry_attached_media2']['name'])){
                    $img_filename = $data['UserVerfication']['secoundry_attached_media2']['name'];
                    
                    $img_tmpname  = $data['UserVerfication']['secoundry_attached_media2']['tmp_name'];
                              
             
               
              if(($img_filename != "") && ($img_tmpname != "")){

                  
                  $explode_file   = explode(".",$img_filename);
                  $countExp       = count($explode_file);
                  $fileExtenstion = $explode_file[$countExp-1];
                   
                  if(($fileExtenstion != 'png') && ($fileExtenstion != 'jpg') && ($fileExtenstion != 'jpeg') &&($fileExtenstion != 'gif')){
                      
                      $this->requestAction(array('controller'=>'validate','action'=>'generateServerResponse'),array('pass'=>array('611','0'))
                          ); 
                  }else{
                      $final_img = str_replace(".","",str_replace(" ","",date("YmdHis").microtime())).".".$fileExtenstion;    
                         
                          $upload=WWW_ROOT."img/Vendor/Varification/".$final_img;
                          
                            if(move_uploaded_file($img_tmpname,$upload)){ 
                             $dataArray['secoundry_attached_media2']=$final_img;
                             }      
                    } 
                    }
                  }
                     $dataArray['id']=$res['UserVerfication']['id'];
                     if(!empty($data['UserVerfication']['identity_of_primary_verification1'])){
                     $dataArray['identity_of_primary_verification1']=$data['UserVerfication']['identity_of_primary_verification1'];
                     }
                     if(!empty($data['UserVerfication']['primary_verfication_no1'])){
                     $dataArray['primary_verfication_no1']=$data['UserVerfication']['primary_verfication_no1'];
                     }
                     if(!empty($data['UserVerfication']['identity_of_primary_verification2'])){
                     $dataArray['identity_of_primary_verification2']=$data['UserVerfication']['identity_of_primary_verification2'];
                     }
                     if(!empty($data['UserVerfication']['primary_verfication_no2'])){
                     $dataArray['primary_verfication_no2']=$data['UserVerfication']['primary_verfication_no2'];
                     }
                     if(!empty($data['UserVerfication']['identity_of_secoundry_verification1'])){
                      $dataArray['identity_of_secoundry_verification1']=$data['UserVerfication']['identity_of_secoundry_verification1'];
                     }
                     if(!empty($data['UserVerfication']['identity_of_secoundry_verification2'])){
                      $dataArray['identity_of_secoundry_verification2']=$data['UserVerfication']['identity_of_secoundry_verification2'];
                      }
                     
                     $this->UserVerfication->save($dataArray);  
        //print_r($data);die;
        if(!empty($data['UserMaster']['category_id'])){
        $str='';
        foreach($data['UserMaster']['category_id'] as $res){ 
        $str=$str.$res.",";
        }
        $str=rtrim($str, ",");
        $data['UserMaster']['category_id']=$str;
        $this->UserMaster->save($data);
                //$this->UserMaster->save($data);
         $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                           array('pass'=>array('109','1')));
         $this->redirect(array('controller'=>'homes','action'=>'myProfile'));
        
        }
        else{
        //print_r($data);die;
         $this->UserMaster->save($data);
                //$this->UserMaster->save($data);
         $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                           array('pass'=>array('109','1')));
         $this->redirect(array('controller'=>'homes','action'=>'myProfile'));
       
        }
          
      }
      $user=$this->Session->read('User');
      $res=$this->UserMaster->find('first',array('conditions'=>array('id'=>$user['UserMaster']['id'])));
      
 if(!empty($res)){
      $city_name=$this->City->find('first',array('conditions'=>array('id'=>$res['UserMaster']['city_id'])));
      if(!empty($city_name)){
      $res['UserMaster']['city']=$city_name['City']['name'];
      }
       $locality_name=$this->Locality->find('first',array('conditions'=>array('id'=>$res['UserMaster']['locality_id']))); 

      //print_r($locality_name);die;

      if(!empty($locality_name)){

      $res['UserMaster']['locality']=$locality_name['Locality']['name'];

      } 

      
      if(!empty($res['UserMaster']['category_id'])){
      $interest=$this->Category->query("select * from bg_categories where id IN (".$res['UserMaster']['category_id'].")");
    
      

      if(!empty($interest)){

       foreach($interest as $res1){

      $res['UserMaster']['interest']=$res['UserMaster']['interest'].$res1['bg_categories']['category_name'].",";

      }
     
      
      $res['UserMaster']['interest']=rtrim($res['UserMaster']['interest'], ",");
    
       }

      }

    
      $city=$this->City->find('all');
      //print_r($city);die;
      $cat_localitie=$this->Locality->find('all');
      $cat=$this->Category->find('all',array('conditions'=>array('status'=>1)));
      $this->set('localitie',$cat_localitie);
      $this->set('city',$city);
      $this->set('category',$cat);
      //print_r($res);die;  
     $this->set('user_view',$res);
     $class_detail=$this->VendorClasse->find('all',array('conditions'=>array('user_id'=>$user['UserMaster']['id'],'end_month >='=>date('m/d/Y'))));
     //print_r($class_detail);die;
     if(!empty($class_detail)){
       $l=0;
       foreach($class_detail as $res){
      $class_by=$this->UserMaster->find('first',array('conditions'=>array('id'=>$res['VendorClasse']['user_id'])));
      if($class_by['UserMaster']['vendor_type_id']=='1'){
        $class_detail[$l]['VendorClasse']['class_by']=$class_by['UserMaster']['institute_name'];
      }
      else{
       $class_detail[$l]['VendorClasse']['class_by']=$class_by['UserMaster']['first_name'];
       
      }
      $l++;
      }
     // print_r($class_detail);die;
      $this->set('upcoming_class',$class_detail);
     
   }
    
     $class_detail1=$this->VendorClasse->find('all',array('conditions'=>array('user_id'=>$user['UserMaster']['id'],'end_month <'=>date('m/d/Y'))));
     //print_r($class_detail1);die;
    // print_r($class_detail);die;
     if(!empty($class_detail1)){
       $p=0;
       foreach($class_detail1 as $res){
      $class_by=$this->UserMaster->find('first',array('conditions'=>array('id'=>$res['VendorClasse']['user_id'])));
      if($class_by['UserMaster']['vendor_type_id']=='1'){
        $class_detail1[$p]['VendorClasse']['class_by']=$class_by['UserMaster']['institute_name'];
      }
      else{
       $class_detail1[$p]['VendorClasse']['class_by']=$class_by['UserMaster']['first_name'];
       
      }
      $p++;
    }
      $this->set('past_class',$class_detail1);
      //print_r($class_detail1);die;
     }

    /* akash book class data  list data */        
      
     $my_book_class_data = $this->TransactionHistorie->find('all',array(      
                                  'joins'=>
                                            array(
                                              array(
                                              'table'  =>'vendor_classes',  
                                              'alias'  =>'vancs',
                                              'conditions'=>array(
                                              'vancs.id=TransactionHistorie.class_id',
                                              'vancs.user_id=TransactionHistorie.user_id',
                                              )
                                            ),
                                              
                                              array(
                                              'table'  =>'user_masters',  
                                              'alias'  =>'usermaster',
                                              'conditions'=>array(
                                              'usermaster.id=TransactionHistorie.user_id',
                                              'usermaster.status'=>1
                                              ),                   
                                            )
                                  ),
                                  'conditions' => array(  
                                                  'TransactionHistorie.payment_from_class'=>1,
                                                  'TransactionHistorie.status'=>2,
                                                  'TransactionHistorie.user_id'=>$user_id,
                                                ),      
                                  'fields' => 'TransactionHistorie.*,vancs.*,usermaster.*',  
                                ));
       $this->set('my_book_class_data',$my_book_class_data);

     /* add end of book class data  */

     /***************** whistlist classes  */
           $wishlist_data = $this->Wishlist->find('all',array(      
                                  'joins'=>
                                            array(
                                              array(
                                              'table'  =>'vendor_classes',  
                                              'alias'  =>'vancs',
                                              'conditions'=>array(
                                              'vancs.id=Wishlist.class_id',
                                              'vancs.user_id=Wishlist.user_id',
                                              )
                                            ),
                                              
                                              array(
                                              'table'  =>'user_masters',  
                                              'alias'  =>'usermaster',
                                              'conditions'=>array(
                                              'usermaster.id=Wishlist.user_id',
                                              'usermaster.status'=>1
                                              ),                   
                                            )
                                  ),
                                  'conditions' => array(  
                                                  'Wishlist.status'=>1,
                                                  'Wishlist.user_id'=>$user_id,
                                                ),      
                                  'fields' => 'Wishlist.*,vancs.*,usermaster.*',  
                                ));
        
       $this->set('wishlist_data',$wishlist_data);

     /* end of whistlist class  */

     $class_pics=$this->VendorClasse->find('all',array('conditions'=>array('user_id'=>$user['UserMaster']['id']),'fields'=>'upload_class_photo'));
     if(!empty($class_pics)){
      $this->set('class_pics',$class_pics);
     }
     $class_video=$this->VendorClasse->find('all',array('conditions'=>array('user_id'=>$user['UserMaster']['id']),'fields'=>'upload_video_name'));
     //print_r($class_video);die;
     if(!empty($class_video)){
      $this->set('class_video',$class_video);
     }
      }

    }

    public function myProfile_bkp_11_08(){
       

      $this->checkUser();

      $this->layout='vendor_layout';

      $userdata = $this->Session->read('User');
    
      $user_id = $userdata['UserMaster']['id'];
      
      //upload image file

      if(isset($_FILES['imagefiles'])){

          $errors= array();



        foreach($_FILES['imagefiles']['tmp_name'] as $key => $tmp_name ){

          

            $file_name = $user_id."_".$_FILES['imagefiles']['name'][$key];

            $file_size =$_FILES['imagefiles']['size'][$key];

            $file_tmp =$_FILES['imagefiles']['tmp_name'][$key];

            $file_type=$_FILES['imagefiles']['type'][$key];

            //debug($key." - ".$tmp_name." - ".$file_size ." - ".$file_name);die;

            if($file_size > 2097152){

              $errors[]='File size must be less than 2 MB';

            }

            

              $get_name = explode('.',$file_name);  

              //print_r($get_name);die;

              $final_name = mt_rand(100000,999999).'.'.$get_name[1];





              $desired_dir=WWW_ROOT.'img/Vendor/UploadImage_'.$user_id.'/';

                if(empty($errors)==true){

                  if(is_dir($desired_dir)==false){

                      mkdir("$desired_dir", 0777);    // Create directory if it does not exist

                  }

                  if(is_dir("$desired_dir/".$final_name)==false){

                    move_uploaded_file($file_tmp,$desired_dir.$final_name);

                    

                    $photodata = $this->VendorGalleries->set(array(

                                                        'user_id' => $user_id,

                                                        'category_id' => 1,

                                                        'media_title' => 'My Image',

                                                        'media_path' => $final_name,

                                                        'description' => '',

                                                        'status'      => 1,

                                                        'add_date'    => time(),

                                                        'modify_date' => time()

                                                      )

                                                    );

                    $photoresult =   $this->VendorGalleries->save($data);

                  }

                  if($photoresult){

                    $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 

                          array('pass'=>array('107','1')));

                    $this->redirect(array('controller'=>'homes','action'=>'myProfile'));

                  } 

                }else{

                  print_r($errors);

              }

          }

          if($result)

          {

            if($result){

                $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 

                      array('pass'=>array('107','1')));

                $this->redirect(array('controller'=>'homes','action'=>'myProfile'));

              } 

          } 

        if(empty($error)){

         echo "Success";

        }

      }

      $galleryimage = $this->VendorGalleries->find('all', array(

                            'conditions' => array(

                              'VendorGalleries.user_id'    => $user_id,

                              'VendorGalleries.category_id' => 1

                          )

                      ));


          
      $this->set(compact('galleryimage')); 

      //upload video file

      //print_r($_FILES['videofiles']);die;

      if(isset($_FILES['videofiles'])){

          $errors= array();



        foreach($_FILES['videofiles']['tmp_name'] as $key => $tmp_name ){

          

            $file_name = $user_id."_".$_FILES['videofiles']['name'][$key];

            $file_size =$_FILES['videofiles']['size'][$key];

            $file_tmp =$_FILES['videofiles']['tmp_name'][$key];

            $file_type=$_FILES['videofiles']['type'][$key];

            //debug($key." - ".$tmp_name." - ".$file_size ." - ".$file_name);die;

            // if($file_size > 2097152){

            //   $errors[]='File size must be less than 2 MB';

            // }

            //print_r($file_name);die;



              $get_name = explode('.',$file_name);  

              $final_name = mt_rand(100000,999999).'.'.$get_name[2];

              $desired_dir=WWW_ROOT.'img/Vendor/UploadVideo_'.$user_id.'/';

                if(empty($errors)==true){

                  if(is_dir($desired_dir)==false){

                      mkdir("$desired_dir", 0777);    // Create directory if it does not exist

                  }

                  if(is_dir("$desired_dir/".$final_name)==false){

                    move_uploaded_file($file_tmp,$desired_dir.$final_name);



                    $data = $this->VendorGalleries->set(array(

                                                        'user_id' => $user_id,

                                                        'category_id' => 2,

                                                        'media_title' => 'My Video',

                                                        'media_path' => $final_name,

                                                        'description' => '',

                                                        'status'      => 1,

                                                        'add_date'    => time(),

                                                        'modify_date' => time()

                                                      )

                                                    );

                    //$a = $this->VendorGallery->create(); 

                    // print_r($a);die;

                    $result =   $this->VendorGalleries->save($data);

                    //print_r($result);die;

                    /*$log = $this->ShopGallery->getDataSource()->getLog();            

                    debug($log);*/

                  } 

                 if($result){

                    $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 

                          array('pass'=>array('108','1')));

                    $this->redirect(array('controller'=>'homes','action'=>'myProfile'));

                  } 

                }else{

                  print_r($errors);

              }

          }

          if($result){

            $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 

                  array('pass'=>array('108','1')));

            $this->redirect(array('controller'=>'homes','action'=>'myProfile'));

          } 

        if(empty($error)){

         echo "Success";

        }

      }

      $galleryvideo = $this->VendorGalleries->find('all', array(

                              'conditions' => array(

                                'VendorGalleries.user_id'    => $user_id,

                                'VendorGalleries.category_id' => 2

                          )

                      ));

 
      $this->set(compact('galleryvideo'));



      if($this->request->is('post')){

        $data=$this->data;

       

        if(!empty($data['UserMaster']['category_id'])){

        $str='';

        foreach($data['UserMaster']['category_id'] as $res){ 

        $str=$str.$res.",";

        }

        $str=rtrim($str, ",");

        $data['UserMaster']['category_id']=$str;

        $this->UserMaster->save($data);

                //$this->UserMaster->save($data);

         $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 

                           array('pass'=>array('109','1')));

         $this->redirect(array('controller'=>'homes','action'=>'myProfile'));

        

        }

        else{

        //print_r($data);die;

         $this->UserMaster->save($data);

                //$this->UserMaster->save($data);

         $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 

                           array('pass'=>array('109','1')));

         $this->redirect(array('controller'=>'homes','action'=>'myProfile'));

       

        }

          

      }

      $user=$this->Session->read('User');



      $res=$this->UserMaster->find('first',array('conditions'=>array('id'=>$user['UserMaster']['id'])));


 if(!empty($res)){

      $city_name=$this->City->find('first',array('conditions'=>array('id'=>$res['UserMaster']['city_id'])));
     
      if(!empty($city_name)){

      $res['UserMaster']['city']=$city_name['City']['name'];

      }

      $locality_name=$this->Locality->find('first',array('conditions'=>array('id'=>$res['UserMaster']['locality_id']))); 

      //print_r($locality_name);die;

      if(!empty($locality_name)){

      $res['UserMaster']['locality']=$locality_name['Locality']['name'];

      } 

      
      if(!empty($res['UserMaster']['category_id'])){
      $interest=$this->Category->query("select * from bg_categories where id IN (".$res['UserMaster']['category_id'].")");
    
      

      if(!empty($interest)){

       foreach($interest as $res1){

      $res['UserMaster']['interest']=$res['UserMaster']['interest'].$res1['bg_categories']['category_name'].",";

      }
     
      
      $res['UserMaster']['interest']=rtrim($res['UserMaster']['interest'], ",");
    
       }

      }

    

      $city=$this->City->find('all');

      //print_r($city);die;

      $cat_localitie=$this->Locality->find('all');

      $cat=$this->Category->find('all',array('conditions'=>array('status'=>1)));

      $this->set('localitie',$cat_localitie);

      $this->set('city',$city);

      $this->set('category',$cat);

      //print_r($res);die;  

     $this->set('user_view',$res);

     $class_detail=$this->VendorClasse->find('all',array('conditions'=>array('user_id'=>$user['UserMaster']['id'],'end_month >='=>date('m/d/Y'))));

     //print_r($class_detail);die;

     if(!empty($class_detail)){

       $l=0;

       foreach($class_detail as $res){

      $class_by=$this->UserMaster->find('first',array('conditions'=>array('id'=>$res['VendorClasse']['user_id'])));

      if($class_by['UserMaster']['vendor_type_id']=='1'){

        $class_detail[$l]['VendorClasse']['class_by']=$class_by['UserMaster']['institute_name'];

      }

      else{

       $class_detail[$l]['VendorClasse']['class_by']=$class_by['UserMaster']['first_name'];

       

      }

      $l++;

      }

     // print_r($class_detail);die;

      $this->set('upcoming_class',$class_detail);

     

   }

    

     $class_detail1=$this->VendorClasse->find('all',array('conditions'=>array('user_id'=>$user['UserMaster']['id'],'starting_month <'=>date('m/d/Y'))));

     //print_r($class_detail1);die;

    // print_r($class_detail);die;

     if(!empty($class_detail1)){

       $p=0;

       foreach($class_detail1 as $res){

      $class_by=$this->UserMaster->find('first',array('conditions'=>array('id'=>$res['VendorClasse']['user_id'])));

      if($class_by['UserMaster']['vendor_type_id']=='1'){

        $class_detail1[$p]['VendorClasse']['class_by']=$class_by['UserMaster']['institute_name'];

      }

      else{

       $class_detail1[$p]['VendorClasse']['class_by']=$class_by['UserMaster']['first_name'];

       

      }

      $p++;

    }

      $this->set('past_class',$class_detail1);

      //print_r($class_detail1);die;

     }

     $class_pics=$this->VendorClasse->find('all',array('conditions'=>array('user_id'=>$user['UserMaster']['id']),'fields'=>'upload_class_photo'));

     if(!empty($class_pics)){

      $this->set('class_pics',$class_pics);

     }

     $class_video=$this->VendorClasse->find('all',array('conditions'=>array('user_id'=>$user['UserMaster']['id']),'fields'=>'upload_video_name'));

     //print_r($class_video);die;

     if(!empty($class_video)){

      $this->set('class_video',$class_video);

     }

      }



    }

public function imageUpload(){



  $dataArray=array();

  if(!empty($this->params->pass[0])){

  $user_id=base64_decode($this->params->pass[0]);

  $type=$this->params->pass[1];

  if($type=='1'){

  if(!empty($_FILES)){

      $img_filename = $_FILES['FileUpload']['name'];

      $img_tmpname  = $_FILES['FileUpload']['tmp_name'];

     if(($img_filename != "") && ($img_tmpname != "")){

        $explode_file   = explode(".",$img_filename);

        $countExp       = count($explode_file);

        $fileExtenstion = $explode_file[$countExp-1];

       }

       if(($fileExtenstion != 'png') && ($fileExtenstion != 'jpg') && ($fileExtenstion != 'jpeg') &&($fileExtenstion != 'gif')){

                $dataArray['res_code']=0;

                echo json_encode($dataArray);die;

                }else{

                $final_img = str_replace(".","",str_replace(" ","",date("YmdHis").microtime())).".".$fileExtenstion;

                $check=$this->UserMaster->find('first',array('conditions'=>array('id'=>$user_id)));

                if(!empty($check)){

                if(($check['UserMaster']['user_type_id'])=='1'){ 

                $upload=WWW_ROOT."img/Vendor/profile/".$final_img;

                unlink(WWW_ROOT."/img/Vendor/profile/".$check['UserMaster']['profile_image']);   

                

                $abc="img/Vendor/profile/".$final_img;

                }

                else{

                $upload=WWW_ROOT."img/Buyer/profile/".$final_img;

                unlink(WWW_ROOT."/img/Buyer/profile/".$check['UserMaster']['profile_image']);   

                $abc="img/Buyer/profile/".$final_img; 

                }

                   

                if(move_uploaded_file($img_tmpname,$upload)){                  

                  $check['UserMaster']['id']=$user_id;

                  $check['UserMaster']['profile_image']=$final_img;

                  $this->UserMaster->save($check);

                  $dataArray['res_code']=1;

                  $dataArray['res_img']=$abc;

                  echo json_encode($dataArray);die;

                } 

                } 

            

}

}

$dataArray['res_code']=0;

echo json_encode($dataArray);die;

}



if($type=='2'){



  if(!empty($_FILES)){

     //print_r($_FILES);die;

      $img_filename = $_FILES['FileUpload']['name'];

      $img_tmpname  = $_FILES['FileUpload']['tmp_name'];

     if(($img_filename != "") && ($img_tmpname != "")){

        $explode_file   = explode(".",$img_filename);

        $countExp       = count($explode_file);

        $fileExtenstion = $explode_file[$countExp-1];

       }

       if(($fileExtenstion != 'png') && ($fileExtenstion != 'jpg') && ($fileExtenstion != 'jpeg') &&($fileExtenstion != 'gif')){

                $dataArray['res_code']=0;

                echo json_encode($dataArray);die;

                }else{

                $final_img = str_replace(".","",str_replace(" ","",date("YmdHis").microtime())).".".$fileExtenstion;



                $check=$this->UserMaster->find('first',array('conditions'=>array('id'=>$user_id)));

                if(!empty($check)){

                if(($check['UserMaster']['user_type_id'])=='1'){ 

                $upload=WWW_ROOT."img/Vendor/profile/".$final_img;

                unlink(WWW_ROOT."/img/Vendor/profile/".$check['UserMaster']['background_image']);   

                

                $abc="img/Vendor/profile/".$final_img;

                }

                else{

                $upload=WWW_ROOT."img/Buyer/profile/".$final_img;

                unlink(WWW_ROOT."/img/Buyer/profile/".$check['UserMaster']['background_image']);   

                $abc="img/Buyer/profile/".$final_img; 

                }

                   

                if(move_uploaded_file($img_tmpname,$upload)){                  

                  $check['UserMaster']['id']=$user_id;

                  $check['UserMaster']['background_image']=$final_img;

                  $this->UserMaster->save($check);

                  $dataArray['res_code']=1;

                  $dataArray['res_img']=$abc;

                  echo json_encode($dataArray);die;

                } 

                } 

            

}

}

$dataArray['res_code']=0;

echo json_encode($dataArray);die;

} 

}

}

    public function gift_class(){

      //$this->checkUser();

      $this->layout='vendor_layout';

      $user=$this->Session->read('User');

      

     $this->set('user_view',$user);

      



    }

    public function classDetail(){

     $this->checkUser();

      $this->layout='vendor_layout';

      $user=$this->Session->read('User');

      $this->set('user_view',$user);     

      if(!empty($this->params->pass[0])){

        //echo $class_id=$this->params->pass[0];

        $class_id=base64_decode($this->params->pass[0]);

        $class_detail = $this->VendorClasse->find('first',array('conditions'=>array('id'=>$class_id)));

        $community_id = $class_detail['VendorClasse']['community_id'];

        $community = $this->Community->find('first',array(

            'conditions'=>array(

                'id'=>$community_id

              ),

            'fields'=>'community_name'));

        $community_name = $community['Community']['community_name'];



        $class_by=$this->UserMaster->find('first',array('conditions'=>array('id'=>$class_detail['VendorClasse']['user_id']),'fields'=>'first_name'));

        $class_detail['VendorClasse']['class_by']=$class_by['UserMaster']['first_name'];

        $class_detail['VendorClasse']['community_name']=$community_name ;

        $this->set('view_class',$class_detail);

        /************** added by vineet ********/

        $user_id = $user['UserMaster']['id'];

        $shedule_detail = $this->ClassSchedule->find('all',array('conditions'=> array('class_provider_id'=>$user_id)));

        $this->set('shedule_class',$shedule_detail);

        $cat_id = $class_detail['VendorClasse']['category_id'];

        $cat=$this->Category->find('all',array('conditions'=>array('id'=>$cat_id)));

        $this->set('category',$cat);

        $segment_id = $class_detail['VendorClasse']['segment_id'];

        $segment = $this->ClassSegment->find('all',array('conditions' => array('id'=> $segment_id)));

        $this->set('segment',$segment);

        $classstatus = $this->VendorClasse->find('all', array('conditions' => array('trending_status' => 1)),array('conditions'=> array('featured_status'=> 1)), array('conditions'=> array('recommended_status' => 1)));

        $this->set('class_status',$classstatus);

      }   



    }

    public function class_13c(){

      //$this->checkUser();



      $this->layout='vendor_layout';

      $user=$this->Session->read('User');

      $this->set('user_view',$user);

    }





    /*end   NAJMUDDIN 2.06.2016 */

    /*sitaram 30.05.2016*/



    public function Faq(){

    //  $this->checkUser();



      $this->layout='index_layout';

      $user=$this->Session->read('User');
      if($this->params->pass[0] == 'learner'){
        $page_section_name =  $this->params['pass'][0];
           if(!empty($page_section_name)){
              $this->set('page_section_name',$page_section_name);
            }
     }
      $this->set('user_view',$user);

    }



    /*sitaram 31.05.2016 / */





public function postClass(){



     //$this->checkUser();

      //print_r($this->Session->read('User'));die;

      $user=$this->Session->read('User');

      $this->layout='vendor_layout';

      $this->set('user_view',$user);



  $cat=$this->Category->find('all',array('conditions'=>array('status'=>1))); 

        $this->set('all_main_cat',$cat);



        $class_type=$this->ClassType->find('all'); 

        $this->set('all_class_type',$class_type);

        /* Braingroom modifications */

        $localitie=$this->Locality->find('all');

        $this->set('localitie',$localitie);

		/* Braingroom modifications */



        $coummunity_data=$this->Community->find('all',array('conditions'=>array('status'=>1)));

        $this->set('coummunity_data',$coummunity_data);

    }

  /*sitaram 31.05.2016 / */



public function findsubCat(){

      

       $this->autoRender=false;

       $cat_id=$_POST['cat_id'];

       $cat_sub=$this->ClassSegment->find('all',array('conditions'=>array('category_id'=>$cat_id))); 

/* Braingroom modifications 16/07/2016 */
   echo '<div class="form-group" style="margin-bottom: 5px;" >
			<div class="form-group" >
<select class="form-control reg_input" name="segment_id[]" id="segment_id" multiple="multiple" value="" 
   data-actions-box="true"  style="overflow:auto" onblur="cat(this.value)">';
								foreach ($cat_sub as $key => $cat_sub) {

									$sub_cat_name=$cat_sub['ClassSegment']['segment_name'];
                            $id=$cat_sub['ClassSegment']['id'];
								 echo  '<option value="'.$id.'">'.$sub_cat_name.'</option>';
								}

						echo	'</select></div>
						<div id="s2" class="error_msg">&nbsp;&nbsp;</div>
						<span class="carimg" style="top:-69px;"><img src='.HTTP_ROOT.'/img/caret.png></span>
						<p class="err_css" id="error_01" style="padding-top:0px;padding-left:10px;"></p></div>';
 /* Braingroom modifications 16/07/2016 */





}







    public function EmailConfirmation($mail=null){

    $this->layout=null;

   

}

public function classList(){
  $this->checkUser();
  $this->layout='vendor_layout';
  $user=$this->Session->read('User');
  $user_id = $user['UserMaster']['id'];
  $this->set('user_view',$user);
  $res=$this->VendorClasse->find('all',array('conditions'=>array('user_id'=>$user_id)));

  $this->set('view_class',$res);
}

public function flexibleclassattendance(){
  $this->checkUser();
  $this->layout='vendor_layout';
  $user=$this->Session->read('User');
  $user_id = $user['UserMaster']['id'];
  $class_id=base64_decode($this->params->pass[0]);
  
  $this->set('user_view',$user);
   $res = $this->VendorClasse->find('all',array(
            'joins' =>   array(
                            array(
                                'table' => 'bg_tickets',
                                'alias' => 'Ticket',
                                'type'  =>  'INNER',
                                'conditions' => array('VendorClasse.id=Ticket.vendor_classe_id','VendorClasse.id'=>$class_id),
                                'order'=>array('TransactionHistorie.add_date DESC')
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
            
            'fields'    =>array('Ticket.*','Payu.*','UserMaster.*','VendorClasse.*'),
            
            ));
      
       $this->set('view_ticket',$res);
      
}


############ Create By Rohit ##############

function changepasswordac(){

    

    $this->checkUser();

    $this->autoRender = false;

    $user=$this->Session->read('User');

    $id=   $user['id'];

    echo $id;

    die;

    $newpassword = $this->request->data['newpassword'];

    $cpassword =   $this->request->data['cpassword'];

    $oldpassword = $this->request->data['oldpassword'];

    $my_id=$this->request->data['newpassword'];

    if($newpassword!=$cpassword)

    {

      echo '2';

      exit();

    }

    $oldpassword=md5($oldpassword);

    $newpassword=md5($newpassword);

    $chkUser = $this->UserMaster->find('first', array('conditions' => array('UserMaster.id' => $id, 'UserMaster.password' =>$oldpassword,'UserMaster.status' =>'1','UserMaster.user_type_id' =>'1')));

    if(!empty($chkUser)){

    $this->UserMaster->updateAll(array('UserMaster.password' => "'$newpassword'",'UserMaster.my_id' => "'$my_id'"), array('UserMaster.id' => $id, 'UserMaster.user_type_id' =>'1'));



    echo '1';

    exit();

    }

    else {

            echo '0';

            exit();

           }

        exit();

    }

############ Create By Rohit ##############



  public function reg1(){

        $this->layout=null;

        if($this->request->is('post')){

          $data=$this->data;

          $data['UserMaster']['password']=md5($data['UserMaster']['password']);

          $this->Session->delete('registration1');

          $Usertype = array();

                    $Usertype['utype']      = $data['user_type'];

                   

                    $this->Session->write('usertype', $Usertype);







          if($data['user_type']=='2'){



          $this->Session->write('registration1',$data);

          $this->redirect(array('controller'=>'Homes','action'=>'reg4'));

          }

          else{

          $this->Session->write('registration1',$data);

          $this->redirect(array('controller'=>'Homes','action'=>'reg2'));

          }

        }

          $city=$this->City->find('all');

          $cityArray=array();

          $catArray=array();

          if(!empty($city)){

              $cityArray['0']='Select City';

            foreach($city as $res){

              $cityArray[$res['City']['id']]=$res['City']['name'];

            }

        $this->set('city',$cityArray);

        }

        $cat=$this->Category->find('all',array('conditions'=>array('status'=>1)));

        if(!empty($cat)){

         $catArray[0]="Select Interest Areas";

         foreach ($cat as $result) {

            $catArray[$result['Category']['id']]=$result['Category']['category_name'];

              

            } 

            $this->set('category',$catArray);  

        }

        

        $nm=$this->Session->read('name');

        if(!empty($nm)){

            $this->set('data',$nm);

        }



         $cat_localitie=$this->Locality->find('all');

         $this->set('localitie',$cat_localitie);



             /* echo "<pre>";

              print_r($cat_localitie);

              echo "</pre>";

              exit();*/

      }

      public function getLocality(){

        $this->autoRender=false;

        $locationArray=array();

        if(!empty($this->params->pass[0])){

            $city_id=$this->params->pass[0];

            $res=$this->Locality->find('all',array('conditions'=>array('city_id'=>$city_id)));

            if(!empty($res)){

                $i=0;

              foreach ($res as $result){

                //$locationArray[$result['Locality']['id']]=$result['Locality']['name'];

                $locationArray[$i]['id']=$result['Locality']['id'];

                $locationArray[$i]['name']=$result['Locality']['name'];

                $i++;

              }

              echo json_encode($locationArray);die;

            }

            else{

                echo "0";die;

            }

        }

      }

      public function getUser($id=null){

       $user_data=$this->UserMaster->find('first',array('conditions'=>array('id'=>$id)));

       return $user_data;

      }
   public function getUserByEmail($email=null){

       $user_data=$this->UserMaster->find('first',array('conditions'=>array('email'=>$email)));

       return $user_data;

      }

   public function reg2(){

      $this->layout=null;

     /* if(!$this->Session->check('registration1')){

        $this->redirect(array('controller'=>'Homes','action'=>'reg1'));

      }*/

      

      if($this->request->is('post')){



      $data1=$this->data;

     

      if($data1['vendor_type_id']=='2'){

          if($data1['UserMaster']['profile_pic']['error']=='4'){

          $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 

                              array('pass'=>array('917','0')));

                    $validate++;

          //$this->redirect(array('controller'=>'Homes','action'=>'reg2'));

        }

        else{

        $profile_name=$this->uploadImage('Vendor/profile','UserMaster','profile_pic',$data1);



                //print_r($background_name);die;

                if($profile_name=="0"){

                 

                  $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 

                            array('pass'=>array('917','0')));

                  $validate++;

                }

        else{

      $data=$this->Session->read('registration1');



      //echo $data1['user_type'];

      //echo "test by rohit";

      //die;



      $this->Session->delete('registration1');

      $data['UserMaster']['profile_image']=$profile_name;

      $data['UserMaster']['user_type_id']=$data1['user_type'];

      $data['UserMaster']['vendor_type_id']=$data1['vendor_type_id'];

      $data['UserMaster']['d-o-b']=$data1['UserMaster']['d-o-b'];

      $data['UserMaster']['Institute']=$data1['UserMaster']['Institute'];

      $data['UserMaster']['registration_id']=$data1['UserMaster']['registration_id'];

      $data['UserMaster']['expertise_area']=$data1['UserMaster']['expertise_area'];

      $data['UserMaster']['address']=$data1['UserMaster']['address'];

      $data['UserMaster']['description']=$data1['UserMaster']['description'];

      $data['UserMaster']['profile_pic']['name']=$data1['UserMaster']['profile_pic']['name'];

      $data['UserMaster']['profile_pic']['type']=$data1['UserMaster']['profile_pic']['type'];

      $data['UserMaster']['profile_pic']['tmp_name']=$data1['UserMaster']['profile_pic']['tmp_name'];

      $data['UserMaster']['profile_pic']['error']=$data1['UserMaster']['profile_pic']['error'];

      $data['UserMaster']['profile_pic']['size']=$data1['UserMaster']['profile_pic']['size'];

      $this->Session->write('registration2',$data);

      $this->redirect(array('controller'=>'Homes','action'=>'reg3'));

         }

        }

      }

      if($data1['vendor_type_id']=='1'){

          if($data1['UserMaster']['profile_pic1']['error']=='4'){

          $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 

                              array('pass'=>array('917','0')));

                    $validate++;

          //$this->redirect(array('controller'=>'Homes','action'=>'reg2'));

        }

        else{

        $profile_name=$this->uploadImage('Vendor/profile','UserMaster','profile_pic1',$data1);



                //print_r($background_name);die;

                if($profile_name=="0"){

                 

                  $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 

                            array('pass'=>array('917','0')));

                  $validate++;

                }

        else{

      $data['UserMaster']['profile_image']=$profile_name;

      $data['UserMaster']['user_type_id']=$data1['user_type'];

      $data=$this->Session->read('registration1');

      $this->Session->delete('registration1');

      $data['UserMaster']['vendor_type_id']=$data1['vendor_type_id'];

      $data['UserMaster']['d-o-b']=$data1['UserMaster']['d-o-b'];

      $data['UserMaster']['Institute']=$data1['UserMaster']['Institute'];

      $data['UserMaster']['registration_id']=$data1['UserMaster']['registration_id'];

      $data['UserMaster']['expertise_area']=$data1['UserMaster']['expertise_area'];

      $data['UserMaster']['address']=$data1['UserMaster']['address'];

      $data['UserMaster']['description']=$data1['UserMaster']['description'];

      $data['UserMaster']['profile_pic1']['name']=$data1['UserMaster']['profile_pic']['name'];

      $data['UserMaster']['profile_pic1']['type']=$data1['UserMaster']['profile_pic']['type'];

      $data['UserMaster']['profile_pic1']['tmp_name']=$data1['UserMaster']['profile_pic']['tmp_name'];

      $data['UserMaster']['profile_pic1']['error']=$data1['UserMaster']['profile_pic']['error'];

      $data['UserMaster']['profile_pic1']['size']=$data1['UserMaster']['profile_pic']['size'];

      $this->Session->write('registration2',$data);

      $this->redirect(array('controller'=>'Homes','action'=>'reg3'));

    }

        }

      }

     

     }

      // print_r($this->Session->read('registration1'));die;

    }

    public function reg3(){

      require ('sendgrid-php/vendor/autoload.php');

      require ('sendgrid-php/lib/SendGrid.php'); 

      $this->layout=null;

      $skip_val=$this->params->pass[0];



      //echo $skip_val;

       $usertype = $this->Session->read('usertype');

      /* echo "<pre>";

       print_r($usertype);

       echo "</pre>";

       die;*/

      $data['user_type']=$usertype['utype'];

      //echo "hello";

      //die;





      if($skip_val=='Back')

      {

        

        if($data['user_type']=='2'){



          $this->Session->write('registration1',$data);

          $this->redirect(array('controller'=>'Homes','action'=>'reg1'));

          }

        $skip_val='Skip';



      }

      

      if($skip_val!='Skip')

      {

        //echo $skip_val;

        //die;

          

          /*if(!$this->Session->check('registration2')){

            $this->redirect(array('controller'=>'Homes','action'=>'reg1'));

          }*/

      }

     

      if($this->request->is('post')){

        /*echo "<pre>";

        print_r($this->request->data);

        echo "</pre>";

        die;*/

        $this->UserVerfication->save($this->request->data);

        $userArray=array();

        $data1=$this->data;

        $data=$this->Session->read('registration2');

        echo "<pre>";

        print_r($data);

        echo "</pre>";

       

        

        $this->Session->destroy();

        $userArray['profile_image']=$data['UserMaster']['profile_image'];

        $userArray['first_name']=$data['UserMaster']['first_name'];

        $userArray['email']=$data['UserMaster']['email'];

        $userArray['user_type_id']=1;

        $userArray['password']=$data['UserMaster']['password'];

        $userArray['contact_no']=$data['UserMaster']['contact_no'];

        $userArray['city_id']=$data['UserMaster']['city_id'];

        $userArray['locality']=$data['UserMaster']['locality'];

        $userArray['category_id']=$data['UserMaster']['category_id'];

        $userArray['vendor_type_id']=$data['UserMaster']['vendor_type_id'];

        $userArray['d_o_b']=$data['UserMaster']['d-o-b'];

        $userArray['institute_name']=$data['UserMaster']['Institute'];

        $userArray['registration_id']=$data['UserMaster']['registration_id'];

        $userArray['area_of_expertise/interest']=$data['UserMaster']['expertise_area'];

        $userArray['address']=$data['UserMaster']['address'];

        $userArray['description']=$data['UserMaster']['description'];

        $userArray['coaching_experience']=$data1['UserMaster']['coaching_experience'];

        $userArray['ip_address']=$_SERVER['REMOTE_ADDR'];

       

        $userArray['add_date']=strtotime(date('Y-m-d H:i:s'));

        $userArray['modify_date']=strtotime(date('Y-m-d H:i:s'));

        $userArray['status']=2;

        $address = $userArray['locality'].' Chennai India';



// We get the JSON results from this request

$geo = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false');

// We convert the JSON to an array

$geo = json_decode($geo, true);

// If everything is cool

if ($geo['status'] = 'OK') {

  // We set our values

  $latitude = $geo['results'][0]['geometry']['location']['lat'];

  $longitude = $geo['results'][0]['geometry']['location']['lng'];



}

        $userArray['latitude']=$latitude;

        $userArray['longitude']=$longitude;

        

        $this->UserMaster->save($userArray);

        $this->sendMail('signup', $userArray['email'],$userArray['email']);

        $this->Session->delete('registration2');

        $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 

                            array('pass'=>array('104','1')));

        $this->redirect(array('controller'=>'Homes','action'=>'reg4'));

                           

                     }

        

        

        

      



    }

    public function reg4(){

      require ('sendgrid-php/vendor/autoload.php');

      require ('sendgrid-php/lib/SendGrid.php'); 

    $this->layout=null;

      $communityArray=array();

       $skip_val=$this->params->pass[0];







      //echo $skip_val;

      //die;

      if($skip_val=='Back')

      {

        $skip_val='Skip';

      }

      

      if($skip_val!='Skip')

      {

         /* if(!$this->Session->check('registration1')){

            $this->redirect(array('controller'=>'Homes','action'=>'reg1'));

          }*/

      }

      if($this->request->is('post')){

        $data1=$this->data;



        $data=$this->Session->read('registration1');

        $data['UserMaster']['user_preference_id']=$data1['UserMaster']['community_id'];

        $data['UserMaster']['gender']=$data1['UserMaster']['gender'];

        $data['UserMaster']['d_o_b']=$data1['UserMaster']['d_o_b'];

        $data['UserMaster']['user_type_id']=$data['user_type'];

        $data['UserMaster']['add_date']=strtotime(date('Y-m-d H:i:s'));

        $data['UserMaster']['modify_date']=strtotime(date('Y-m-d H:i:s'));

        $data['UserMaster']['status']=2;

        $profile_name=$this->uploadImage('Buyer/profile','UserMaster','profile_pic',$data1);

          //echo $profile_name

          //die;

                  //print_r($background_name);die;

                if($profile_name==0){

                 

                  $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 

                            array('pass'=>array('917','0')));

                  $validate++;

                }

        else{

        $data['UserMaster']['profile_image']=$profile_name;

        $this->UserMaster->save($data);

          $this->sendMail('signup', $data['UserMaster']['email'],$data['UserMaster']['email']);

         $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 

                            array('pass'=>array('104','1')));

         $this->Session->delete('registration1');

         $this->redirect(array('controller'=>'Homes','action'=>'login'));

       }

       

      }

      $res=$this->Community->find('all',array('conditions'=>array('status'=>1)));

      if(!empty($res)){

        $communityArray['0']='Select';

        foreach($res as $result){

         $communityArray[$result['Community']['id']]=$result['Community']['community_name'];

        }

        $this->set('community_name',$communityArray);

      }

      $genderArray['1']="Male";

      $genderArray['2']="Female";

      $this->set('gender',$genderArray);



    }

    public function uploadImage($folder,$modelName,$image_name,$data){

        $validate=0;

        $filename = WWW_ROOT. 'img'.DS.$folder.DS.time().$data[$modelName][$image_name]['name'];



                    $ext = pathinfo($filename, PATHINFO_EXTENSION);

                    $filename1 = WWW_ROOT. 'img'.DS.$folder.DS.time().".".$ext;



                    

                    if( $ext == 'gif' || $ext == 'png' || $ext == 'jpg' ) { 

                            

                            move_uploaded_file($data[$modelName][$image_name]['tmp_name'],$filename1);

                            $data[$modelName][$image_name]=time().".".$ext;

                            return $data[$modelName][$image_name];

                    }else{

          

                            //$this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 

                           // array('pass'=>array('308','0')));

                            //$validate++; 

                          return "0";



                        }

                       



    }

   public function checkMobile(){
      $this->autoRender=false;
      if(!empty($this->params->pass[0])){
        $mob_no=base64_decode($this->params->pass[0]);
        $check=$this->UserMaster->find('first',array('conditions'=>array('mobile'=>$mob_no,'status !='=>4)));
       if(!empty($check)){
          return 1;
        }
        else{
          return 2;
        }
      }
    }

    public function registration(){

      $this->layout=null;

      $user_ip = getenv('REMOTE_ADDR');



    $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));



    $country = $geo["geoplugin_countryName"];

    

    

    }

    public function forgotPassword(){

      $chkLogin['braingroom']['email']='rahul.bst1224@gmail.com';



      $responseApi = $this->requestAction(

                array('controller' => 'apis', 'action' => 'postData'),

                array('pass' => array($chkLogin, 'apis/forgotPassword'))

              );

      print_r($responseApi);die;

      

       

      $response = json_decode($responseApi, true);

    print_r($response['braingroom']['res_code']);

    }

          public function socialLogin(){

       $this->autoRender = false;
     require ('sendgrid-php/vendor/autoload.php');
      require ('sendgrid-php/lib/SendGrid.php'); 
     
    $fb_name=$_POST['response']['name'];

    $fb_id=$_POST['response']['id'];

    $email=$_POST['response']['email'];
    
    $profile_image=$_POST['response']['picture']['data']['url'];
    
   

   $find =$this->UserMaster->find('first',array('conditions'=>array('social_network_id'=>$fb_id)));
   
      if(!empty($find))

                {
                    //$find['UserMaster']['profile_image']=$profile_image;
                    $this->UserMaster->save($find); 
                    $status = $find['UserMaster']['status'];

                    $email  = $find['UserMaster']['email'];

  if($status==1)

            {

                $email_id    = $find['UserMaster']['email'];

                $id          = $find['UserMaster']['id'];

                $uuid        = $find['UserMaster']['uuid'];

                $first_name  = $find['UserMaster']['first_name'];

                $Login = array();

                        $Login['UserMaster']['id']         = $id;

                        $Login['UserMaster']['uuid']       = $uuid;

                        $Login['UserMaster']['email']   = $email_id;

                        $Login['UserMaster']['first_name'] = $first_name;

                        $Login['UserMaster']['profile_image']=$profile_image;

                        $this->Session->write('User', $Login);

                        echo '1';die;

            }

            else if($status==2)

                {

                    

                   $find = $this->UserMaster->find('first', array('conditions' => array('UserMaster.social_network_id'=>$fb_id)));

                    $id   = $find['UserMaster']['id'];

                    $Login = array();

                    $Login['UserMaster']['fb_name']=$fb_name;

                    $Login['UserMaster']['social_network_id']=$fb_id;

                    $Login['UserMaster']['id']=$id;

                    $Login['UserMaster']['email']= $email;

                    $Login['UserMaster']['profile_image']=$profile_image;

                    $this->Session->write('User', $Login);

                    //$this->Session->write('uid', $id);

                   //print_r($this->Session->read('User11'));die; */

                    echo '2';

                

                }

  }

               

  

            else

                {
                    
                    $check=$this->UserMaster->find('first',array('conditions'=>array('email'=>$email)));
                    
                    if(!empty($check)){

                    $userArray['social_network_id']=$fb_id;

                    $userArray['first_name']=$fb_name;

                    //$userArray['profile_image']=$profile_image;

                    $userArray['id']=$check['UserMaster']['id'];
                    $userArray['status']=1;
                    $userArray['user_type_id']=0;
                    $password=$this->generatePassword(8);
                    $userArray['password']=md5($password);

                    $userArray['add_date']=strtotime(date('Y-m-d H:i:s'));
                     $userArray['modify_date']=strtotime(date('Y-m-d H:i:s'));
                    $this->UserMaster->save($userArray);
                    if(!empty($email)){
                    $this->sendMail('social',$email,$password);
                    }
                    $find = $this->UserMaster->find('first', array('conditions'=> array('social_network_id'=>$fb_id)));

                    $id   = $find['UserMaster']['id'];

                    $Name = array();

                    $Name['UserMaster']['fb_name']=$fb_name;

                    $Name['UserMaster']['social_network_id']=$fb_id;

                    $Name['UserMaster']['id']=$id;

                    $Name['UserMaster']['email']   = $email;

                    $Name['UserMaster']['profile_image']=$profile_image;

                    $this->Session->write('User', $Name);

                    echo '1';die;

                    }

        else{

                    $this->request->data['first_name']=$fb_name;

                    $this->request->data['social_network_id']=$fb_id;

                    $this->request->data['email']= $email;
                    $this->request->data['status']=1;

                    $this->request->data['profile_image']=$profile_image;
                    $this->request->data['user_type_id']=0;
                    $password=$this->generatePassword(8);
                    $this->request->data['password']=md5($password);
                    $this->request->data['add_date']=strtotime(date('Y-m-d H:i:s'));
                    $this->request->data['modify_date']=strtotime(date('Y-m-d H:i:s'));
                    $this->UserMaster->save($this->request->data);
                    if(!empty($email)){
                    $this->sendMail('social',$email,$password);
                    }

                  $find = $this->UserMaster->find('first', array('conditions'=> array('social_network_id'=>$fb_id)));

                   

                    $id   = $find['UserMaster']['id'];

                    $Name = array();

                    $Name['UserMaster']['fb_name']=$fb_name;

                    $Name['UserMaster']['social_network_id']=$fb_id;

                    $Name['UserMaster']['id']=$id;

                    $Name['UserMaster']['email']   = $email;

                    $Name['UserMaster']['profile_image']=$profile_image;

                    $this->Session->write('User', $Name);

                    echo '1';die;

                    }

                   

                }

        

    

        }
public function generatePassword($length=8){
     $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
     public function community(){
            //$this->checkUser();
            $this->layout='fun_layout';
            $user = $this->Session->read('User');

            $Categorie_data=$this->Category->find('all',array('conditions'=>array('status'=>1)));
            $this->set('coummunity_data',$Categorie_data);

            $usermaster_data=$this->UserMaster->find('all',array('conditions'=>array('status'=>1,'user_type_id'=>1)));
            $this->set('usermaster_data',$usermaster_data);
            $com_id = $this->params->pass[0];

             $cum_img = $this->Communitie->find('first',array('conditions'=>array('Communitie.id'=>$com_id)));
            //$res_class = $this->Communitie->query("select * FROM bg_communities");
            $this->set('com_img',$cum_img);

              ########## Start Show Search community #####
            if (isset($_POST["search"])){

                        $s_key     = $_POST['search_key'];
                        $com_id    = $_POST['search_cat_id'];
                        $s_key = trim($s_key);
                        $res_class = $this->VendorClasse->query("SELECT bg_vendor_classes.id,
                                                                         bg_vendor_classes.id,
                                                                         bg_vendor_classes.class_topic,
                                                                         bg_vendor_classes.class_summary,
                                                                         bg_vendor_classes.class_timing_id,  
                                                                         bg_vendor_classes.class_duration,
                                                                         bg_vendor_classes.location, 
                                                                         bg_vendor_classes.price_per_head,
                                                                         bg_vendor_classes.no_of_session,
                                                                         bg_vendor_classes.upload_class_photo,
                                                                         bg_vendor_classes.status,
                                                                         bg_class_schedules.id,
                                                                         bg_class_schedules.session_date,
                                                                         bg_class_schedules.session_time,
                                                                         bg_user_masters.id,
                                                                         bg_user_masters.first_name,
                                                                         bg_vendor_classe_level_details.price,
                                                                         bg_vendor_classe_location_details.id,
                                                                         bg_vendor_classe_location_details.locality_id,
                                                                         bg_localities.id, 
                                                                         bg_localities.name
                                                                         FROM bg_vendor_classes LEFT JOIN bg_class_schedules
                                                                         ON bg_vendor_classes.id = bg_class_schedules.class_id
                                                                         LEFT JOIN bg_user_masters
                                                                         ON bg_user_masters.id = bg_vendor_classes.user_id
                                                                         LEFT JOIN bg_vendor_classe_level_details
                                                                         ON bg_vendor_classes.id = bg_vendor_classe_level_details.vendor_class_id
                                                                         LEFT JOIN bg_vendor_classe_location_details
                                                                         ON bg_vendor_classes.id = bg_vendor_classe_location_details.vendor_class_id
                                                                         LEFT JOIN bg_localities
                                                                         ON bg_localities.id = bg_vendor_classe_location_details.locality_id
                                                                         where bg_vendor_classes.class_topic LIKE '%$s_key%'
                                                                         AND bg_vendor_classes.community_id =$com_id  
                                                                         ORDER BY bg_vendor_classes.id  DESC");
                                                                         $this->set('allclass',$res_class); 
                                                                         $this->set('all_total_class',$res_class);
                                                                        /* echo "<pre>";
                                                                         print_r($res_class);
                                                                         echo "</pre>";*/
                                                                         //die;
                                                                        
                    }
                    else if(isset($_POST["Sort"])){  
                                                          
                                                                  $sort_value = $_POST['optionsRadios'];
                                                                  $this->set('filter','Sort');

                                                                  if($sort_value==1)
                                                                  {
                                                                    $sort_by ='bg_vendor_classe_level_details.price  DESC';
                                                                     $this->set('find_sort_val',$sort_value);

                                                                  }
                                                                  if($sort_value==2)
                                                                  {
                                                                    $sort_by ='bg_vendor_classe_level_details.price  ASC';
                                                                    $this->set('find_sort_val',$sort_value);
                                                                    
                                                                  }
                                                                  if($sort_value==3)
                                                                  {
                                                                    $sort_by ='bg_vendor_classe_level_details.price  DESC';
                                                                    $this->set('find_sort_val',$sort_value);
                                                                    
                                                                  }
                                                                  if($sort_value==4)
                                                                  {
                                                                    $sort_by ='bg_vendor_classe_level_details.price  DESC';
                                                                    $this->set('find_sort_val',$sort_value);
                                                                    
                                                                  }

                                                                    $com_id = $this->params->pass[0];
                                                                    $res_total_class = $this->VendorClasse->find('all',array('conditions'=>array('VendorClasse.community_id'=>$com_id)));
                                                                    $this->set('all_total_class',$res_total_class);
                                                                    $res_class = $this->VendorClasse->query("SELECT bg_vendor_classes.id,
                                                                                                                             bg_vendor_classes.id,
                                                                                                                             bg_vendor_classes.class_topic,
                                                                                                                             bg_vendor_classes.class_summary,
                                                                                                                             bg_vendor_classes.class_timing_id,  
                                                                                                                             bg_vendor_classes.class_duration,
                                                                                                                             bg_vendor_classes.location, 
                                                                                                                             bg_vendor_classes.price_per_head,
                                                                                                                             bg_vendor_classes.upload_class_photo,
                                                                                                                             bg_vendor_classes.status,
                                                                                                                             bg_class_schedules.id,
                                                                                                                             bg_class_schedules.session_date,
                                                                                                                             bg_class_schedules.session_time,
                                                                                                                             bg_user_masters.id,
                                                                                                                             bg_user_masters.first_name,
                                                                                                                             bg_vendor_classe_level_details.price,
                                                                                                                             bg_vendor_classe_location_details.id,
                                                                                                                             bg_vendor_classe_location_details.vendor_class_id,
                                                                                                                             bg_localities.id,
                                                                                                                             bg_localities.name 
                                                                                                                             FROM bg_vendor_classes LEFT JOIN bg_class_schedules
                                                                                                                             ON bg_vendor_classes.id = bg_class_schedules.class_id
                                                                                                                             LEFT JOIN bg_user_masters
                                                                                                                             ON bg_user_masters.id = bg_vendor_classes.user_id
                                                                                                                             LEFT JOIN bg_vendor_classe_level_details
                                                                                                                             ON bg_vendor_classes.id = bg_vendor_classe_level_details.vendor_class_id 
                                                                                                                             LEFT JOIN bg_vendor_classe_location_details
                                                                                                                             ON bg_vendor_classes.id  = bg_vendor_classe_location_details.vendor_class_id
                                                                                                                             LEFT JOIN bg_localities
                                                                                                                             ON bg_localities.id  = bg_vendor_classe_location_details.locality_id
                                                                                                                             where bg_vendor_classes.community_id=$com_id ORDER BY $sort_by");
                                                                                                                              $this->set('allclass',$res_class);
                                                                                                                              $this->set('cat_id',$com_id);
                                                }
                    else if(isset($_POST["Filter"])){ 

                      $cat_id       = $this->params->pass[0];
                      $community_id        = $_POST['Community_id'];
                      $location            = $_POST['location'];
                      if($location==''){ 
                        $filter_query = "bg_vendor_classes.category_id ='$community_id'";
                      } else{ 
                        $filter_query = "bg_vendor_classes.category_id = '$community_id'
                                         or bg_localities.name LIKE '%$location%'"; 
                            }
                        $res_class = $this->VendorClasse->query("SELECT  
                                                                         bg_vendor_classes.id,
                                                                         bg_vendor_classes.id,
                                                                         bg_vendor_classes.class_topic,
                                                                         bg_vendor_classes.class_summary,
                                                                         bg_vendor_classes.class_timing_id,  
                                                                         bg_vendor_classes.class_duration,
                                                                         bg_vendor_classes.location, 
                                                                         bg_vendor_classes.price_per_head,
                                                                         bg_vendor_classes.no_of_session,
                                                                         bg_vendor_classes.upload_class_photo,
                                                                         bg_vendor_classes.status,
                                                                         bg_class_schedules.id,
                                                                         bg_class_schedules.session_date,
                                                                         bg_user_masters.id,
                                                                         bg_user_masters.first_name,
                                                                         bg_vendor_classe_level_details.price,
                                                                         bg_vendor_classe_location_details.id,
                                                                         bg_vendor_classe_location_details.vendor_class_id,
                                                                         bg_localities.id,
                                                                         bg_localities.name
                                                                         FROM bg_vendor_classes LEFT JOIN bg_class_schedules
                                                                         ON bg_vendor_classes.id = bg_class_schedules.class_id
                                                                         LEFT JOIN bg_user_masters
                                                                         ON bg_user_masters.id = bg_vendor_classes.user_id
                                                                         INNER JOIN bg_vendor_classe_level_details
                                                                         ON bg_vendor_classes.id = bg_vendor_classe_level_details.vendor_class_id
                                                                         LEFT JOIN bg_vendor_classe_location_details
                                                                         ON bg_vendor_classes.id  = bg_vendor_classe_location_details.vendor_class_id
                                                                         LEFT JOIN bg_localities
                                                                         ON bg_localities.id  = bg_vendor_classe_location_details.locality_id 
                                                                         where bg_vendor_classes.community_id=$cat_id and $filter_query
                                                                         group by bg_vendor_classe_level_details.vendor_class_id
                                                                         ORDER BY bg_vendor_classes.id  DESC");
                                                                         $this->set('all_total_class',$res_class);
                                                                         $this->set('allclass',$res_class);
                                                                         $this->set('cat_id',$cat_id);
                                                                         $this->set('filter',$filter);
                                                                         $this->set('date',$date);
                                                                         $this->set('time',$time);
                                                                         $this->set('class_type',$class_type);
                                                                         $this->set('community_id',$community_id);
                                                                         $this->set('class_timing_id',$class_timing_id);
                                                                         $this->set('class_provider',$class_provider);
                                                                         $this->set('location',$location);
                                                                                                           
                                                }
                                                                       

                                                
                    else{ 
                          #################### End Show Search community #######################
                          #################### Start Show All community #######################
                            $com_class = $this->VendorClasse->query("SELECT  bg_vendor_classes.id,
                                                               bg_vendor_classes.id,
                                                               bg_vendor_classes.class_topic,
                                                               bg_vendor_classes.class_summary,
                                                               bg_vendor_classes.class_timing_id,  
                                                               bg_vendor_classes.class_duration,
                                                               bg_vendor_classes.location,
															   bg_vendor_classes.community_id, 
                                                               bg_vendor_classes.price_per_head,
                                                               bg_vendor_classes.no_of_session,
                                                               bg_vendor_classes.upload_class_photo,
                                                               bg_vendor_classes.age_group,
                                                               bg_vendor_classes.status,
                                                               bg_class_schedules.id,
                                                               bg_class_schedules.session_date,
                                                               bg_user_masters.id,
                                                               bg_user_masters.first_name,
                                                               bg_vendor_classe_level_details.price,
                                                               bg_vendor_classe_location_details.id,
                                                               bg_vendor_classe_location_details.vendor_class_id,
                                                               bg_localities.id,
                                                               bg_localities.name
                                                               FROM bg_vendor_classes 
                                                               LEFT JOIN bg_class_schedules
                                                               ON bg_vendor_classes.id = bg_class_schedules.class_id
                                                               LEFT JOIN bg_user_masters
                                                               ON bg_user_masters.id = bg_vendor_classes.user_id
                                                               LEFT JOIN bg_vendor_classe_level_details
                                                               ON bg_vendor_classes.id = bg_vendor_classe_level_details.vendor_class_id
                                                               LEFT JOIN bg_vendor_classe_location_details
                                                               ON bg_vendor_classes.id  = bg_vendor_classe_location_details.vendor_class_id
                                                               LEFT JOIN bg_localities
                                                               ON bg_localities.id  = bg_vendor_classe_location_details.locality_id
                                                              	where FIND_IN_SET($com_id,bg_vendor_classes.community_id)
                                                               group by bg_vendor_classe_level_details.vendor_class_id
                                                               ORDER BY bg_vendor_classes.id DESC
                                                               ");
                                                               $this->set('allclass',$com_class);
                                                               $this->set('all_total_class',$com_class);
                      ############# End Show All community ###############
                    }
  }
    
     public function community_08_09_6(){
            //$this->checkUser();
            $this->layout='fun_layout';
            $user = $this->Session->read('User');

            $Categorie_data=$this->Category->find('all',array('conditions'=>array('status'=>1)));
            $this->set('coummunity_data',$Categorie_data);

            $usermaster_data=$this->UserMaster->find('all',array('conditions'=>array('status'=>1,'user_type_id'=>1)));
            $this->set('usermaster_data',$usermaster_data);
            $com_id = $this->params->pass[0];

             $cum_img = $this->Communitie->find('first',array('conditions'=>array('Communitie.id'=>$com_id)));
            //$res_class = $this->Communitie->query("select * FROM bg_communities");
            $this->set('com_img',$cum_img);

              ########## Start Show Search community #####
            if (isset($_POST["search"])){

                        $s_key     = $_POST['search_key'];
                        $com_id    = $_POST['search_cat_id'];
                        $s_key = trim($s_key);
                        $res_class = $this->VendorClasse->query("SELECT bg_vendor_classes.id,
                                                                         bg_vendor_classes.id,
                                                                         bg_vendor_classes.class_topic,
                                                                         bg_vendor_classes.class_summary,
                                                                         bg_vendor_classes.class_timing_id,  
                                                                         bg_vendor_classes.class_duration,
                                                                         bg_vendor_classes.location, 
                                                                         bg_vendor_classes.price_per_head,
                                                                         bg_vendor_classes.upload_class_photo,
                                                                         bg_vendor_classes.status,
                                                                         bg_class_schedules.id,
                                                                         bg_class_schedules.session_date,
                                                                         bg_class_schedules.session_time,
                                                                         bg_vendor_classe_level_details.price 
                                                                         FROM bg_vendor_classes LEFT JOIN bg_class_schedules
                                                                         ON bg_vendor_classes.id = bg_class_schedules.class_id
                                                                         LEFT JOIN bg_vendor_classe_level_details
                                                                         ON bg_vendor_classes.id = bg_vendor_classe_level_details.vendor_class_id 
                                                                         where bg_vendor_classes.class_topic LIKE '%$s_key%'
                                                                         AND bg_vendor_classes.community_id =$com_id  
                                                                         ORDER BY bg_vendor_classes.id  DESC");
                                                                         $this->set('allclass',$res_class); 
                                                                         $this->set('all_total_class',$res_class);
                                                                        /* echo "<pre>";
                                                                         print_r($res_class);
                                                                         echo "</pre>";*/
                                                                         //die;
                                                                        
                    }
                    else if(isset($_POST["Sort"])){  
                                                          
                                                                  $sort_value = $_POST['optionsRadios'];
                                                                  $this->set('filter','Sort');

                                                                  if($sort_value==1)
                                                                  {
                                                                    $sort_by ='bg_vendor_classe_level_details.price  DESC';
                                                                     $this->set('find_sort_val',$sort_value);

                                                                  }
                                                                  if($sort_value==2)
                                                                  {
                                                                    $sort_by ='bg_vendor_classe_level_details.price  ASC';
                                                                    $this->set('find_sort_val',$sort_value);
                                                                    
                                                                  }
                                                                  if($sort_value==3)
                                                                  {
                                                                    $sort_by ='bg_vendor_classe_level_details.price  DESC';
                                                                    $this->set('find_sort_val',$sort_value);
                                                                    
                                                                  }
                                                                  if($sort_value==4)
                                                                  {
                                                                    $sort_by ='bg_vendor_classe_level_details.price  DESC';
                                                                    $this->set('find_sort_val',$sort_value);
                                                                    
                                                                  }

                                                                    $com_id = $this->params->pass[0];
                                                                    $res_total_class = $this->VendorClasse->find('all',array('conditions'=>array('VendorClasse.community_id'=>$com_id)));
                                                                    $this->set('all_total_class',$res_total_class);
                                                                    $res_class = $this->VendorClasse->query("SELECT bg_vendor_classes.id,
                                                                                                                             bg_vendor_classes.id,
                                                                                                                             bg_vendor_classes.class_topic,
                                                                                                                             bg_vendor_classes.class_summary,
                                                                                                                             bg_vendor_classes.class_timing_id,  
                                                                                                                             bg_vendor_classes.class_duration,
                                                                                                                             bg_vendor_classes.location, 
                                                                                                                             bg_vendor_classes.price_per_head,
                                                                                                                             bg_vendor_classes.upload_class_photo,
                                                                                                                             bg_vendor_classes.status,
                                                                                                                             bg_class_schedules.id,
                                                                                                                             bg_class_schedules.session_date,
                                                                                                                             bg_class_schedules.session_time,
                                                                                                                             bg_vendor_classe_level_details.price 
                                                                                                                             FROM bg_vendor_classes LEFT JOIN bg_class_schedules
                                                                                                                             ON bg_vendor_classes.id = bg_class_schedules.class_id
                                                                                                                             LEFT JOIN bg_vendor_classe_level_details
                                                                                                                             ON bg_vendor_classes.id = bg_vendor_classe_level_details.vendor_class_id 
                                                                                                                             where bg_vendor_classes.community_id=$com_id ORDER BY $sort_by");
                                                                                                                              $this->set('allclass',$res_class);
                                                                                                                              $this->set('cat_id',$com_id);
                                                }
                    else if(isset($_POST["Filter"])){ 

                      $cat_id       = $this->params->pass[0];
                      $community_id        = $_POST['Community_id'];
                      $location            = $_POST['location'];
                      if($location==''){ 
                        $filter_query = "bg_vendor_classes.category_id ='$community_id'";
                      } else{ 
                        $filter_query = "bg_vendor_classes.category_id = '$community_id'
                                         and bg_vendor_classes.location LIKE '%$location%'"; 
                            }
                        $res_class = $this->VendorClasse->query("SELECT  
                                                                         bg_vendor_classes.id,
                                                                         bg_vendor_classes.id,
                                                                         bg_vendor_classes.class_topic,
                                                                         bg_vendor_classes.class_summary,
                                                                         bg_vendor_classes.class_timing_id,  
                                                                         bg_vendor_classes.class_duration,
                                                                         bg_vendor_classes.location, 
                                                                         bg_vendor_classes.price_per_head,
                                                                         bg_vendor_classes.upload_class_photo,
                                                                         bg_vendor_classes.status,
                                                                         bg_class_schedules.id,
                                                                         bg_class_schedules.session_date,
                                                                         bg_vendor_classe_level_details.price 
                                                                         FROM bg_vendor_classes LEFT JOIN bg_class_schedules
                                                                         ON bg_vendor_classes.id = bg_class_schedules.class_id
                                                                         INNER JOIN bg_vendor_classe_level_details
                                                                         ON bg_vendor_classes.id = bg_vendor_classe_level_details.vendor_class_id 
                                                                         where bg_vendor_classes.community_id=$cat_id and $filter_query
                                                                         group by bg_vendor_classe_level_details.vendor_class_id
                                                                         ORDER BY bg_vendor_classes.id  DESC");
                                                                         $this->set('all_total_class',$res_class);
                                                                         $this->set('allclass',$res_class);
                                                                         $this->set('cat_id',$cat_id);
                                                                         $this->set('filter',$filter);
                                                                         $this->set('date',$date);
                                                                         $this->set('time',$time);
                                                                         $this->set('class_type',$class_type);
                                                                         $this->set('community_id',$community_id);
                                                                         $this->set('class_timing_id',$class_timing_id);
                                                                         $this->set('class_provider',$class_provider);
                                                                         $this->set('location',$location);
                                                                                                           
                                                }
                                                                       

                                                
                    else{ 
                          #################### End Show Search community #######################
                          #################### Start Show All community #######################
                            $com_class = $this->VendorClasse->query("SELECT  bg_vendor_classes.id,
                                                               bg_vendor_classes.id,
                                                               bg_vendor_classes.class_topic,
                                                               bg_vendor_classes.class_summary,
                                                               bg_vendor_classes.class_timing_id,  
                                                               bg_vendor_classes.class_duration,
                                                               bg_vendor_classes.location, 
                                                               bg_vendor_classes.price_per_head,
                                                               bg_vendor_classes.upload_class_photo,
                                                               bg_vendor_classes.status,
                                                               bg_class_schedules.id,
                                                               bg_class_schedules.session_date,
                                                               bg_vendor_classe_level_details.price
                                                               FROM bg_vendor_classes LEFT JOIN bg_class_schedules
                                                               ON bg_vendor_classes.id = bg_class_schedules.class_id
                                                               LEFT JOIN bg_vendor_classe_level_details
                                                               ON bg_vendor_classes.id = bg_vendor_classe_level_details.vendor_class_id
                                                               where bg_vendor_classes.community_id=$com_id 
                                                               group by bg_vendor_classe_level_details.vendor_class_id
                                                               ORDER BY bg_vendor_classes.id DESC
                                                               ");
                                                               $this->set('allclass',$com_class);
                                                               $this->set('all_total_class',$com_class);
                      ############# End Show All community ###############
                    }
  }
 public function checkEmail(){
  $this->autoRender = false;
  if(!empty($this->params->pass[0])){
        $email=$this->params->pass[0];
        $res1=$this->UserMaster->find('first',array('conditions'=>array('email'=>$email,'status !='=>4)));
        //print_r($res1);
        if(!empty($res1)){
          echo "1";die;//Email Already Exists
        }
        else{
          echo "2";die;//Email Not Exists
        }
      }
    }


public function login(){
      $this->layout=null;

       $class_id11=$this->params->pass[0];
       $type=$this->params->pass[1];
      if(!empty($this->params->pass[0])){
        $email=base64_decode($this->params->pass[0]);
        $check=$this->UserMaster->find('first',array('conditions'=>array('email'=>$email)));
        if(!empty($check)){
          $user['id']=$check['UserMaster']['id'];
          $user['status']=1;
          $this->UserMaster->save($user);
          $this->requestAction(array('controller'=>'Cpanels','action'=>'generateMessages'),
                               array('pass'=>array('105','1')));

        }
      }
        //$this->Session->delete('User');
      $validate=0;
      if($this->request->is('post')){
        
        $data=$this->data;
        
       
        if(empty($data['email'])){

          $validate++;
          $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                            array('pass'=>array('600','0')));


        }
       
        
          
        else if(empty($data['password'])){
          $validate++;
          $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                            array('pass'=>array('601','0')));
        }
        
        
        else{
          if($validate=='0'){

           
         
            
             $email=$data['email'];
             $password=md5($data['password']);
             $re=$this->UserMaster->find('first',array('conditions'=>array('email'=>$email)));
                if(!empty($re)){
                      $res=$this->UserMaster->find('first',array('conditions'=>array('email'=>$email,'password'=>$password)));
                      if(!empty($res)){
                      if($res['UserMaster']['status']!='1'){ //User Not Verified
                         $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                            array('pass'=>array('653','0')));
                         if($type=='login'){
                           $class_id11=base64_decode($class_id11);
                          $this->redirect(array('controller'=>'Homes','action'=>'login/'.base64_encode($class_id11)."/login"));
        
                         }
                          if($class_id11=='gift'){
                          $this->redirect(array('controller'=>'Homes','action'=>'login/gift'));
        
                         }
                         if($this->params->pass[2]=='quote'){
                         $this->redirect(array('controller'=>'Homes','action'=>'login/'.$this->params->pass[0].'/'.$this->params->pass[1]));
        
                         }
                          
                      }
                      else{
                        if($res['UserMaster']['user_type_id']=='1'){

                             $this->Session->write('User',$res);

                             setcookie("authCookie", $res['UserMaster']['id'], time() + (86400 * 30), "/");

                             if($type=='login'){
                                 $class_id11=base64_decode($class_id11);
                                  $this->redirect(array('controller'=>'Homes','action'=>'bookNow/'.base64_encode($class_id11)));
       
                             }
                             else if($class_id11=='gift'){
                                $this->redirect(array('controller'=>'Homes','action'=>'gift'));
       
                         }
                         else if($this->params->pass[2]=='quote'){
                           $this->redirect(array('controller'=>'Homes','action'=>'CatalougeClassDetail/'.$this->params->pass[0].'/'.$this->params->pass[1].'/'.$this->params->pass[1]));
                         }
                         else{
                             $this->redirect(array('controller'=>'Homes','action'=>'dashboard'));
                           }
                        }
                        else{

                          $this->Session->write('User',$res);
                          
                           setcookie("authCookie", $res['UserMaster']['id'], time() + (86400 * 30), "/");

                            if($type=='login'){
                                 $class_id11=base64_decode($class_id11);
                                  $this->redirect(array('controller'=>'Homes','action'=>'bookNow/'.base64_encode($class_id11)));
       
                             }
                             else if($this->params->pass[2]=='quote'){
                           $this->redirect(array('controller'=>'Homes','action'=>'CatalougeClassDetail/'.$this->params->pass[0].'/'.$this->params->pass[1].'/'.$this->params->pass[1]));
                         }
                             else if($this->params->pass[1]=='gift'){
                              $this->redirect(array('controller'=>'Homes','action'=>'gift'));
                             }
                             else{
                                 $this->redirect(array('controller'=>'Homes','action'=>'dashboard'));
                               }
                        }
                          
                      }
                     }
                     else{
                      $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                            array('pass'=>array('604','0')));
                     }
                   }
                     else{
                            $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                            array('pass'=>array('954','0')));
                            if($type=='login'){
                            $class_id11=base64_decode($class_id11);
                           $this->redirect(array('controller'=>'Homes','action'=>'login/'.base64_encode($class_id11)."/login"));
        
                            }
                            else if($class_id11=='gift'){
                              $this->redirect(array('controller'=>'Homes','action'=>'login/gift'));
        
                            }
                             else if($this->params->pass[2]=='quote'){

                              $this->redirect(array('controller'=>'Homes','action'=>'login/'.$this->params->pass[0].'/'.$this->params->pass[1]."/".$this->params->pass[2]));
        
                            }
                            else{
                            $this->redirect(array('action'=>'login'));
                          }

                     }
              
          }
        }
      }
  
    }
    public function giftLogin_bck_07_09_16(){
      $this->layout=null;
      $this->autoRender = false;
        if ($this->request->is('post')) {

            $user = $this->request->data['email'];
            $pass = $this->request->data['password'];
            $phone = $this->request->data['phone'];
            $pass= md5($pass);
            if($phone==''){
              echo '2';
              die;
            }
            else{
              $this->UserMaster->updateAll(array('mobile'=>"'$phone'"),array('email'=>$user));
              $chkUser = $this->UserMaster->find('first',array('conditions'=>array('UserMaster.email'=>$user, 
                                                                                  'UserMaster.password'=>$pass, 
                                                                                  'UserMaster.status' =>'1')));//echo $chkUser;
                if(empty($chkUser)){

                        echo "0";
                      }else{

                        $this->Session->write('User',$chkUser);
                        $f_name  = $chkUser['UserMaster']['first_name'];
                        $u_mail  = $chkUser['UserMaster']['email'];
                        $u_phone = $chkUser['UserMaster']['mobile'];
                        
                        echo $f_name;
                        echo '*';
                        echo $u_mail;
                        echo '*';
                        echo $u_phone;
                        echo '*';
                        echo "1";
              }
        }
      }
  }
  public function giftLogin(){
      $this->layout=null;
      $this->autoRender = false;
        if ($this->request->is('post')) {

            $user = $this->request->data['email'];
            $pass = $this->request->data['password'];
            $phone = $this->request->data['phone'];
            $pass= md5($pass);
            $chkUser_mo = $this->UserMaster->find('first',array('conditions'=>array('UserMaster.email'=>$user, 
                                                                                  'UserMaster.password'=>$pass, 
                                                                                  'UserMaster.status' =>'1')));
            $find_mo = $chkUser_mo['UserMaster']['mobile'];
            if($find_mo!=''){
              $phone = $find_mo;
            }
            if($phone==''){
              echo '2';
              die;
            }
            else{
              $this->UserMaster->updateAll(array('mobile'=>"'$phone'"),array('email'=>$user));
              $chkUser = $this->UserMaster->find('first',array('conditions'=>array('UserMaster.email'=>$user, 
                                                                                  'UserMaster.password'=>$pass, 
                                                                                  'UserMaster.status' =>'1')));//echo $chkUser;
                if(empty($chkUser)){

                        echo "0";
                      }else{

                        $this->Session->write('User',$chkUser);
                        $f_name  = $chkUser['UserMaster']['first_name'];
                        $u_mail  = $chkUser['UserMaster']['email'];
                        $u_phone = $chkUser['UserMaster']['mobile'];
                        
                        echo $f_name;
                        echo '*';
                        echo $u_mail;
                        echo '*';
                        echo $u_phone;
                        echo '*';
                        echo "1";
              }
        }
      }
  }
    public function book_now_login(){
	  
		
      $this->layout=null;
      $this->autoRender = false;
        if ($this->request->is('post')) {

            $user = $this->request->data['email'];
            $pass = $this->request->data['password'];
            $phone = $this->request->data['phone'];
            $pass= md5($pass);
            $chkUser_mo = $this->UserMaster->find('first',array('conditions'=>array('UserMaster.email'=>$user, 
                                                                                  'UserMaster.password'=>$pass, 
                                                                                  'UserMaster.status' =>'1')));
            $find_mo = $chkUser_mo['UserMaster']['mobile'];
            if($find_mo!=''){
              $phone = $find_mo;
            }
            if($phone==''){
              echo '2';
              die;
            }
            else{
              $this->UserMaster->updateAll(array('mobile'=>"'$phone'"),array('email'=>$user));
              $chkUser = $this->UserMaster->find('first',array('conditions'=>array('UserMaster.email'=>$user, 
                                                                                  'UserMaster.password'=>$pass, 
                                                                                  'UserMaster.status' =>'1')));//echo $chkUser;
                if(empty($chkUser)){

                        echo "0";
                      }else{

                        $this->Session->write('User',$chkUser);
                        $f_name  = $chkUser['UserMaster']['first_name'];
                        $u_mail  = $chkUser['UserMaster']['email'];
                        $u_phone = $chkUser['UserMaster']['mobile'];
						$u_id = $chkUser['UserMaster']['id'];
                        
                        echo $f_name;
                        echo '*';
                        echo $u_mail;
                        echo '*';
                        echo $u_phone;
                        echo '*';
						echo $u_id;
                        echo '*';
                        echo "1";
              }
        }
      }
    
	}
    public function giftLogin_bck(){
      $this->layout=null;
      $this->autoRender = false;
        if ($this->request->is('post')) {

            $user=$this->request->data['email'];
            $pass=$this->request->data['password'];
            //echo $user;
            //echo $pass;
            $pass= md5($pass);
            //echo $pass;
            //die;
            $chkUser = $this->UserMaster->find('first',array('conditions'=>array('UserMaster.email'=>$user, 
                                                                                  'UserMaster.password'=>$pass, 
                                                                                  'UserMaster.status' =>'1')));//echo $chkUser;
                if(empty($chkUser)){

                        echo "0";
                      }else{

                        $this->Session->write('User',$chkUser);
                        $f_name  = $chkUser['UserMaster']['first_name'];
                        $u_mail  = $chkUser['UserMaster']['email'];
                        $u_phone = $chkUser['UserMaster']['mobile'];
                        echo $f_name;
                        echo '*';
                        echo $u_mail;
                        echo '*';
                        echo $u_phone;
                        echo '*';
                        echo "1";
              }
        }
  }
     public function sendOtp(){
        $this->layout=null;
        $validate=0;
        if($this->request->is('post')){
            $data=$this->data;
           
            if(empty($data['mobile_no'])){
               $validate++;
               $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                            array('pass'=>array('625','0')));
            }
            else{
                
                if($validate=='0'){
                  $mobile_no=$data['mobile_no'];
                  $res=$this->UserMaster->find('first',array('conditions'=>array('mobile'=>$mobile_no)));
                  
                  if(!empty($res)){
                     $otp=$this->requestAction(array('controller'=>'Apis','action'=>'generateCode'),
                                               array('pass'=>array(6)));
                     
                      
                    $Url = 'http://193.105.74.159/api/v3/sendsms/plain?user=braingroom&password=3e4IG3WL&sender=BRAING&SMSText='.$otp.'&type=longsms&GSM=91'.$mobile_no;
                    $ch = curl_init();
                    // Set URL to download
                    curl_setopt($ch, CURLOPT_URL, $Url);
                 
                    // Set a referer
                    // curl_setopt($ch, CURLOPT_REFERER, "'http://bulksms.mysmsmantra.com:8080/WebSMS/SMSAPI.jsp?username=gurpreet&password=1627184459&sendername=NETSMS&mobileno='.$mobile_no.'&message='.$otp");
                 
                    // User agent
                    curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
                 
                    // Include header in result? (0 = yes, 1 = no)
                    curl_setopt($ch, CURLOPT_HEADER, 0);
                 
                    // Should cURL return or print out the data? (true = return, false = print)
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                 
                    // Timeout in seconds
                    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
                  
                    // Download the given URL, and return output
                    $output = curl_exec($ch);
                   
                    // Close the cURL resource, and free system resources
                    curl_close($ch);
                     $data['id']=$res['UserMaster']['id'];
                    $data['reset_otp']=$otp;

                    $this->UserMaster->save($data);
                    $userArray['mobile_no']=$mobile_no;
                    $userArray['otp']=$otp;
                    $this->Session->Write('verify',$userArray);
                     //$this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                           // array('pass'=>array('101','1')));
                     $this->redirect(array('controller'=>'Homes','action'=>'verifyOtp'));

                  } 
                  else{
                  $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                            array('pass'=>array('649','0')));
                  $this->redirect($this->referer());  
                  }
                }
            }
        }
      }
      public function verifyOtp(){
        $this->layout=null;
        if(!$this->Session->check('verify')){
            $this->redirect(array('controller'=>'Homes','action'=>'sendOtp'));
        }
        else{
            if($this->request->is('post')){
                $data=$this->data;

                $send_otp=$data['otp_code'];
                $mobile_no=$this->Session->read('verify.mobile_no');
                $otp=$this->Session->read('verify.otp');
               
                $check=$this->UserMaster->find('first',array('conditions'=>array('mobile'=>$mobile_no,'reset_otp'=>$send_otp)));
                if(!empty($check)){
                  $this->Session->delete('verify');
                  $this->Session->write('match',$mobile_no);
                  $this->redirect(array('controller'=>'Homes','action'=>'resetPassword'));
                }
                else{
                    $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                            array('pass'=>array('909','0')));
                  $this->redirect($this->referer());   
                }
            }

        
        }

      }
      public function resetPassword(){
         $this->layout=null;
          if(!$this->Session->check('match')){
            $this->redirect(array('controller'=>'Homes','action'=>'sendOtp'));
        }
        else{
            if($this->request->is('post')){
                $data=$this->data;
               $new_password=$data['new_password'];
               $cnfrm_password=$data['cnfrm_password'];
               $mobile_no=$this->Session->read('match');
               if($new_password==$cnfrm_password){
                $res=$this->UserMaster->find('first',array('conditions'=>array('mobile'=>$mobile_no)));
                $dataArray['id']=$res['UserMaster']['id'];

                $dataArray['password']=md5($new_password);
                $this->UserMaster->save($dataArray);
                $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                            array('pass'=>array('102','1')));
                $this->Session->delete('match');
                  $this->redirect(array('controller'=>'Homes','action'=>'login'));
               }
               else{
                $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                            array('pass'=>array('910','0')));
                  $this->redirect($this->referer());
               }
                
            }

        }

      }

     function validateEmail($email){



        $this->autoRender = false;

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {

           return 0;

        }

        else{

          return 1;

        }

    }  
public function signout(){
			$this->log('check session');
	$this->log($this->Session->read('User'));
	$this->Session->destroy();
	$this->log('check session after destroy');
	$this->log($this->Session->read('User'));
		$msgResponse="you have successfully logged out!";
		$this->Session->setFlash('<div class="alert alert-success">'.$msgResponse.'</div>');
			$this->redirect(array('controller'=>'Homes','action'=>'login'));
	}
	public function logout(){
    // delete cookie
    setcookie("authCookie","", time() + (86400 * 30), "/");
    setcookie("authCookie", "", time() - 3600);
    unset($_COOKIE['authCookie']);
    //echo $_COOKIE['authCookie'];
    //exit;
    
		$this->log('check session');
		$this->log($this->Session->read('User'));
		$this->Session->delete('User');
    //delete cookie


		$this->log('check session after destroy');
		$this->log($this->Session->read('User'));
		$msgResponse="you have successfully logged out!";
		$this->Session->setFlash('<div class="alert alert-success">'.$msgResponse.'</div>');
		$this->redirect(array('controller'=>'Homes','action'=>'login'));
      }

    public function main(){

      $this->checkUser();

      $this->layout=null;

      





    }

function sendMail($mailFor, $mail= NULL, $activationCode=NULL){
        
        switch($mailFor){
	case 'bookClass_status':                

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
            case 'review' : 
           
	           $sendgrid = new SendGrid('madhulas','thirdeye123');

            $email    = new SendGrid\Email();
            $email->addTo($mail)->addTo('')->setFrom('support@braingroom.com')->setSubject('braingroom| Customer Review Collection')->setText('!')->setHtml('
            <html>
                <head><title></title></head>
                <body>
                    <div style="border-radius: 6px;background-color: rgba(255,255,255,0.3);padding: 10px;width: 81%;margin-left:20px;">
                    <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
                    <p>
                        <span style="font-size:20px;font-weight:bold;color:#6397cb;line-height:110%">Dear,user your class has been Competed Successfully,</span><br>
                            <span style="font-size:14px;color:#666666;font-style:italic"></span>
                        </p>
                        <p>Please Click on This Link For Review  Class...,</p>
                        <p>'.$activationCode.'</p>
                        
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
            case 'signup' : 
           
	           $sendgrid = new SendGrid('madhulas','thirdeye123');

            $email    = new SendGrid\Email();
            $email->addTo($mail)->addTo('')->setFrom('support@braingroom.com')->setSubject('braingroom| Registration Verification Mail')->setText('!')->setHtml('
            <html>
                <head><title></title></head>
                <body>
                    <div style="border-radius: 6px;background-color: rgba(255,255,255,0.3);padding: 10px;width: 81%;margin-left:20px;">
                    <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
                    <p>
                        <span style="font-size:20px;font-weight:bold;color:#6397cb;line-height:110%">Registration completed Successfully, Your Verification Link has been Sent to Your Email id,</span><br>
                            <span style="font-size:14px;color:#666666;font-style:italic"></span>
                        </p>
                        <p>Please Verify Your Account to continue...,</p>
                        <p>https://www.braingroom.com/Homes/dashboard/'.base64_encode($activationCode).'</p>
                        <p>Click On Link to Activate Your Account</p>
                        <hr style="border:0;border-top:1px solid #d7d7d7;min-height:0">
                        <p>If you have any problems, or believe you have received this in error, please contact us.</p>
                        <p></p>
                        <p>braingroom</p>
                        <span style="font-size:11px;color:#8a8a8a;line-height:100%">Copyright © 2016 braingroom.com All rights reserved.</span>
                    </div>        
                </body>
            </html>');
            $sendgrid->send($email);
                break ;
	case 'catalogRequest' : 
           
	           $sendgrid = new SendGrid('madhulas','thirdeye123');

            $email    = new SendGrid\Email();
            $email->addTo($mail)->addTo('')->setFrom('support@braingroom.com')->setSubject('braingroom| Request Add Class to Catalog')->setText('!')->setHtml('
            <html>
                <head><title></title></head>
                <body>
                    <div style="border-radius: 6px;background-color: rgba(255,255,255,0.3);padding: 10px;width: 81%;margin-left:20px;">
                    <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
                     <p>
                        Your “Add class to catalogue” request has been sent to BrainGroom Admin. You will get back from them in 24 to 48 hrs.</p>
                        <hr style="border:0;border-top:1px solid #d7d7d7;min-height:0">
                        <p>If you have any problems, or believe you have received this in error, please contact us.</p>
                        <p></p>
                        <p>braingroom</p>
                        <span style="font-size:11px;color:#8a8a8a;line-height:100%">Copyright © 2016 braingroom.com All rights reserved.</span>
                    </div>        
                </body>
            </html>');
            $sendgrid->send($email);
                break ;
                
            case 'forgot_password' : 
                
               $sendgrid = new SendGrid('madhulas','thirdeye123');
                $email    = new SendGrid\Email();
                $email->addTo($mail)->addTo('')->setFrom('support@braingroom.com')->setSubject('braingroom | Forgot Password Mail')->setText('!')->setHtml('
                <html>
                    <head><title></title></head>
                    <body>
                        <div style="border-radius: 6px;background-color: rgba(255,255,255,0.3);padding: 10px;width: 81%;margin-left:20px;">
                            <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
                            <p>
                                <span style="font-size:20px;font-weight:bold;color:#6397cb;line-height:110%">Lost Password Request</span><br>
                                <span style="font-size:14px;color:#666666;font-style:italic"></span>
                            </p>
                            <p>We received a lost password request from for your account on braingroom.com .</p>
                            <p>Your  New Password is  : </p>
                            <p>'.$activationCode.'</p>
                            <hr style="border:0;border-top:1px solid #d7d7d7;min-height:0">
                            <p>If you have any problems, or believe you have received this in error, please contact us.</p>
                            <p></p>
                            <p>braingroom.com Team</p>
                            <span style="font-size:11px;color:#8a8a8a;line-height:100%">Copyright © 2013 braingroom.com All rights reserved.</span>
                        </div>        
                    </body>
                </html>');
                $sendgrid->send($email);
                /*$to  = $mail ;                
                $subject = 'SkillGrok | Forgot Password Mail';
                $message = '
                <html>
                    <head><title></title></head>
                    <body>
                        <div style="border-radius: 6px;background-color: rgba(255,255,255,0.3);padding: 10px;width: 81%;margin-left:20px;">
                            <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
                            <p>
                                <span style="font-size:20px;font-weight:bold;color:#6397cb;line-height:110%">Lost Password Request</span><br>
                                <span style="font-size:14px;color:#666666;font-style:italic"></span>
                            </p>
                            <p>We received a lost password request from for your account on braingroom.com .</p>
                            <p>Your Password is  : </p>
                            <p>'.$activationCode.'</p>
                            <hr style="border:0;border-top:1px solid #d7d7d7;min-height:0">
                            <p>If you have any problems, or believe you have received this in error, please contact us.</p>
                            <p></p>
                            <p>braingroom.com Team</p>
                            <span style="font-size:11px;color:#8a8a8a;line-height:100%">Copyright © 2013 braingroom.com All rights reserved.</span>
                        </div>        
                    </body>
                </html>';
                
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $headers .= 'From: SKILLGROK Team<support@braingroom.com>' . "\r\n";
                mail($to, $subject, $message, $headers);
                */
                break ;
                
            case 'resend_activation_code':
                
                $sendgrid = new SendGrid('madhulas','thirdeye123');
                $email    = new SendGrid\Email();
                $email->addTo($mail)->addTo('')->setFrom('support@braingroom.com')->setSubject('SkillGrok | Activation Code Request')->setText('!')->setHtml('
                <html>
                    <head><title></title></head>
                    <body>
                        <div style="border-radius: 6px;background-color: rgba(255,255,255,0.3);padding: 10px;width: 81%;margin-left:20px;">
                        <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
                        <p>
                            <span style="font-size:20px;font-weight:bold;color:#6397cb;line-height:110%">Hi, You had requested for activation code .</span><br>
                                <span style="font-size:14px;color:#666666;font-style:italic"></span>
                            </p>
                            <p>Your activation code is.</p>
                            <p>'.$activationCode.'</p>
                            <p></p>
                            <hr style="border:0;border-top:1px solid #d7d7d7;min-height:0">
                            <p>If you have any problems, or believe you have received this in error, please contact us.</p>
                            <p></p>
                            <p>SkillGrok</p>
                            <span style="font-size:11px;color:#8a8a8a;line-height:100%">Copyright © 2016 braingroom.com All rights reserved.</span>
                        </div>        
                    </body>
                </html>');
                $sendgrid->send($email);
               
/*
                case 'accountInfo' : 
                $sendgrid = new SendGrid('appkraft', 'refrico2014');
                $email    = new SendGrid\Email();
                $email->addTo($mail)->addTo('')->setFrom('support@braingroom.com')->setSubject('SkillGrok | Registration Verification Mail')->setText('!')->setHtml('
                <html>
                    <head><title></title></head>
                    <body>
                        <div style="border-radius: 6px;background-color: rgba(255,255,255,0.3);padding: 10px;width: 81%;margin-left:20px;">
                        <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
                        <p>
                            <span style="font-size:20px;font-weight:bold;color:#6397cb;line-height:110%">Hi, You are successfully registered on a SkillGrok.</span><br>
                                <span style="font-size:14px;color:#666666;font-style:italic"></span>
                            </p>
                            <p>Your Account Details are.</p>
                            <p> Email :     '.$email.'</p>
                             <p> Password :  '.$password.'</p>
                            <p></p>
                            <hr style="border:0;border-top:1px solid #d7d7d7;min-height:0">
                            <p>If you have any problems, or believe you have received this in error, please contact us.</p>
                            <p></p>
                            <p>SkillGrok</p>
                            <span style="font-size:11px;color:#8a8a8a;line-height:100%">Copyright © 2014 braingroom.com All rights reserved.</span>
                        </div>        
                    </body>
                </html>');
                $sendgrid->send($email);*/
                /*$to  = $mail;
                $subject = 'SkillGrok | Activation Code Request';
                $message = '
                <html>
                    <head><title></title></head>
                    <body>
                        <div style="border-radius: 6px;background-color: rgba(255,255,255,0.3);padding: 10px;width: 81%;margin-left:20px;">
                        <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
                        <p>
                            <span style="font-size:20px;font-weight:bold;color:#6397cb;line-height:110%">Hi, You had requested for activation code .</span><br>
                                <span style="font-size:14px;color:#666666;font-style:italic"></span>
                            </p>
                            <p>Your activation code is.</p>
                            <p>'.$activationCode.'</p>
                            <p></p>
                            <hr style="border:0;border-top:1px solid #d7d7d7;min-height:0">
                            <p>If you have any problems, or believe you have received this in error, please contact us.</p>
                            <p></p>
                            <p>SkillGrok</p>
                            <span style="font-size:11px;color:#8a8a8a;line-height:100%">Copyright © 2016 braingroom.com All rights reserved.</span>
                        </div>        
                    </body>
                </html>';
                
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $headers .= 'From: SKILLGROK Team<support@braingroom.com>' . "\r\n";
                mail($to, $subject, $message, $headers);*/
                break ;
                case 'giftmailFailure' : 
                      $sendgrid = new SendGrid('madhulas','thirdeye123');
                      $email     = new SendGrid\Email();
                      $bg_img    = 'http://162.243.205.148/braingroom/app/webroot/img/bg_img.png';
                      //echo $bg_img;
                      //die;
                      $email->addTo($mail)->addTo('')->setFrom('support@braingroom.com')->setSubject('braingroom| Gift')->setText('!')->setHtml('
                      <head><title></title>
                          <meta charset="utf-8">
                          <meta name="viewport" content="width=device-width, initial-scale=1">
                          <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
                          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
                          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
                                         </head>
                                        <body>
                            <div class="" style="width:100%!important;height:100%!important;background-color:white!important;">
                                       
                            <center>  
                              <div class="bdr" style="background: url('.$bg_img.') no-repeat ; width: 80%; height:100%;margin-top:30px;">
                                <div class="" style="width:80%;position:absolute">
                                  <center>
                                    <img src="162.243.205.148/gifting_app/logo.png" style="width:20%!important;">
                                  </center>
                                </div>
                                 <div style="margin-top: 15%; ">
                                  <div class="" style="">
                                    <span style=" ">
                                      <img src="162.243.205.148/gifting_app/gift_card.png" style="width: 100%!important;">
                                    </span>
                                  </div>
                                  <div class="" style="background:white">
                                    <span style="">
                                      <center style="color:red!important; font-size:24px!important;margin-top: -4px !important;">
                                         Gift Details
                                      </center>
                                      <br/>
                                      <center style="color:gray!important; font-size:16px!important; padding-bottom: 10px!important;">'.$activationCode.'</center>
                                    </span>
                                  </div>

                                  <div class="" style="">
                                    <span style=" ">
                                      <img src="162.243.205.148/gifting_app/gift_card.png" style="width: 100%!important;">
                                    </span>
                                  </div>
                                </div> 
                              </div>
                            </center>
                            </div>
                          </body>
                        </html>');
                $sendgrid->send($email);
              break ;
              case 'social' : 
                      $sendgrid = new SendGrid('madhulas','thirdeye123');
                      $email     = new SendGrid\Email();
                    
                      $email->addTo($mail)->addTo('')->setFrom('support@braingroom.com')->setSubject('braingroom| Password Socail Login')->setText('!')->setHtml('
                       <html>
                <head><title></title></head>
                <body>
                    <div style="border-radius: 6px;background-color: rgba(255,255,255,0.3);padding: 10px;width: 81%;margin-left:20px;">
                    <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
                    <p>
                        <span style="font-size:20px;font-weight:bold;color:#6397cb;line-height:110%">Registration completed Successfully, Your Password is:</span><br>
                            <span style="font-size:14px;color:#666666;font-style:italic">'.$activationCode.'</span>
                        </p>
                        <p>You Have Also facility To Login on Braingroom Using This Password </p>
                        <p>http://www.braingroom.com/Homes/login</p>
                        <p>Click On Link to Normal Login</p>
                        <hr style="border:0;border-top:1px solid #d7d7d7;min-height:0">
                        <p>If you have any problems, or believe you have received this in error, please contact us.</p>
                        <p></p>
                        <p>braingroom</p>
                        <span style="font-size:11px;color:#8a8a8a;line-height:100%">Copyright © 2016 braingroom.com All rights reserved.</span>
                    </div>        
                </body>
            </html>');
                $sendgrid->send($email);
              break ;
            
            
             case 'bookClass_status':                
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
                            <span style="font-size:11px;color:#8a8a8a;line-height:100%">Copyright © 2016 braingroom.com All rights reserved.</span>
                        </div>        
                    </body>
                </html>');
                $sendgrid->send($email);
                break ;
                 case 'bookClass_status_by_coupan':                
                $sendgrid = new SendGrid('madhulas','thirdeye123');
                $email     = new SendGrid\Email();
                $email->addTo($mail)->addTo('')->setFrom('support@braingroom.com')->setSubject('Book Class Status')->setText('!')->setHtml('
                <html>
                    <head><title></title></head>
                    <body>
                        <div style="border-radius: 6px;background-color: rgba(255,255,255,0.3);padding: 10px;width: 81%;margin-left:20px;">
                        <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
                        <p>
                            <span style="font-size:20px;font-weight:bold;color:#6397cb;line-height:110%">Hi,<br> <br> Class has been booked. </span><br>
                                <span style="font-size:14px;color:#666666;font-style:italic"></span>
                            </p>
                            <p>Class information is.</p>'.$activationCode.'<p></p>
                            <hr style="border:0;border-top:1px solid #d7d7d7;min-height:0">
                            <p>If you have any problems, or believe you have received this in error, please contact us.</p>
                            <p></p>
                            <p>BRAINGROOM</p>
                            <span style="font-size:11px;color:#8a8a8a;line-height:100%">Copyright © 2016 braingroom.com All rights reserved.</span>
                        </div>        
                    </body>
                </html>');
                $sendgrid->send($email);
                break ;
              
                
        }
    }

   ############## Start Registration By Rohit #############
    public function Register(){

         $this->layout='registration_layout';
          $city=$this->City->find('all');

          $cat_localitie=$this->Locality->find('all');

          $cat=$this->Category->find('all',array('conditions'=>array('status'=>1)));

          $res_community=$this->Community->find('all',array('conditions'=>array('status'=>1)));

          /*print_r($cat);
          die;*/
         $this->set('localitie',$cat_localitie);
         $this->set('city',$city);
         $this->set('category',$cat);
          $this->set('community',$res_community);
          //print_r($city);
          //die;
    }

    public function uploadImage1($folder,$modelName,$image_name,$data){
        $validate=0;
        $filename = WWW_ROOT. 'img'.DS.$folder.DS.time().$data[$modelName][$image_name]['name'];

                    $ext = pathinfo($filename, PATHINFO_EXTENSION);
                    $filename1 = WWW_ROOT. 'img'.DS.$folder.DS.time().".".$ext;

                    
                    if( $ext == 'gif' || $ext == 'png' || $ext == 'jpg' ) { 
                            
                            move_uploaded_file($data[$modelName][$image_name]['tmp_name'],$filename1);
                            $data[$modelName][$image_name]=time().".".$ext;
                            return $data[$modelName][$image_name];
                    }else{
          
                            //$this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                           // array('pass'=>array('308','0')));
                            //$validate++; 
                          return "0";

                        }
                       

    }
    public function saveRegister(){
          $this->autoRender = false;

            
          
          require ('sendgrid-php/vendor/autoload.php');
          require ('sendgrid-php/lib/SendGrid.php'); 
          //print_r($this->request->data);die;
          $add_date=strtotime(date('Y-m-d H:i:s'));
          $this->request->data['add_date']=$add_date;
          $this->request->data['modify_date']=$add_date;
          $cat_id=$this->request->data['category_id'];

          $email=$this->request->data['email'];
          if($this->request->data['d_o_b2']!='')
          {
              $d_o_b2=$this->request->data['d_o_b2'];
              $this->request->data['d_o_b']=$d_o_b2;
          }
            //$profile_image_buyer=$_FILES['data']['name']['profile_image'];
            $this->request->data['profile_image']='';
            $password=$this->request->data['password'];
	    $pass=$password;
            $password=md5($password);
            $this->request->data['password']=$password;
            $total_array=count($cat_id);
            @$category="";
            for ($i=0; $i < $total_array ; $i++) { 

            @$category=@$category.",".$cat_id[$i];

         
        }

             $category=substr($category,1);
             $this->request->data['category_id']=@$category;
              $uuid=uniqid('fas_');
              $this->request->data['uuid']=$uuid;
             $post_data = $this->request->data;
             if(empty($this->request->data['vendor_type_id'])){
               $this->request->data['vendor_type_id']=1;
               }

             /*echo "<pre>";
             print_r($post_data);
             echo "</pre>";
             die;*/
             if($this->UserMaster->save($post_data)){

               $last_des_id=$this->UserMaster->getLastInsertId();
              // $email=$this->request->data['email'];
               $this->sendMail('signup',$email,$email);
                $msg='';
              $msg='Registration completed Successfully, Welcome to BrainGroom your Password is'.$pass;
              $msg = str_replace(" ","%20",$msg);
              $Url = 'http://193.105.74.159/api/v3/sendsms/plain?user=braingroom&password=3e4IG3WL&sender=BRAING&SMSText='.$msg.'&type=longsms&GSM=91'.$mobile;
              $this->openurl($Url);

           ############  Start Step 3 #############

            $pv1=$this->request->data['identity_of_primary_verification1'];
            $doc_id=$this->request->data['document_id'];
            $pv2=$this->request->data['identity_of_primary_verification2'];
            $doc_id2=$this->request->data['document_id2'];
            $sv1=$this->request->data['identity_of_secoundry_verification1'];
            $sv2=$this->request->data['identity_of_secoundry_verification2'];
            $sv3=$this->request->data['identity_of_secoundry_verification3'];


            $this->request->data['identity_of_primary_verification1']=$pv1;
            $this->request->data['identity_of_primary_verification2']=$pv2;
            $this->request->data['document_id']=$doc_id;
            $this->request->data['document_id2']=$doc_id2;
            $this->request->data['identity_of_secoundry_verification1']=$sv1;
            $this->request->data['identity_of_secoundry_verification2']=$sv2;
            $this->request->data['identity_of_secoundry_verification3']=$sv3;
            $this->request->data['user_id']=$last_des_id;

            

            $post_data1 = $this->request->data;
            
            $this->UserVerfication->save($post_data1);




           ############ End Step 3 #############

           //echo $last_des_id;
           //die;
          

           /*Start Image Upload Section*/
              // $profile_name=$this->uploadImage1('Buyer/profile','UserMaster','profile_image',$data1);

          $imgcount=count($_FILES);
          $img_val=0;
          for ($i=1; $i <= $imgcount; $i++) {             
            $ut_id=$this->request->data['user_type_id'];
              if($ut_id==1)
              {
                  $filename1=$_FILES['data']['name']['profile_image1'];
                  
                  if($filename1=='')
                  {
                    @$na='profile_image2';
                    //echo 'yes';
                  }
                  else
                  {
                  @$na='profile_image1';
                }
              }
              else
              {
                @$na='profile_image';
              }


            $filename=$_FILES['data']['name'][$na];
           
            if($filename!='')
            {
                //$filename=$_FILES["fileToUpload".$i]["name"];
                //$titlename=$this->request->data["titlename".$i];
                //echo $titlename;
                /*echo '<br/>';
                echo '<br/>';
                echo $filename;
                die;*/
                if($ut_id==1)
                {
                    $target_dir = WWW_ROOT."img/"."Vendor/profile/";
                }
                else
                {
                  $target_dir = WWW_ROOT."img/"."Buyer/profile/";
                }     
            
                $newfile=$random_digit=rand(0000,9999).$filename;
                
                //die; 
                $target_file = $target_dir .$newfile;
                $uploadOk = 1;

            //echo $target_file;
            //die; 
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            // Check if image file is a actual image or fake image
            //if(isset($_POST["submit"])) {
              $check = getimagesize($_FILES['data']['tmp_name'][$na]);
              if($check !== false) {
                //echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
              } else {
                echo "File is not an image.";
                $uploadOk = 0;
              }
          
          // Check if file already exists
          if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
          }
          // Check file size
          if ($_FILES['data']['size'][$na] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
          }
          // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {

          
          //die;
          if (move_uploaded_file($_FILES['data']['tmp_name'][$na], $target_file)) {
              
              //$this->UserMaster->updateAll(array('profile_image' => $newfile),array('id' => $last_des_id));

            $this->UserMaster->query("UPDATE bg_user_masters SET  profile_image='".$newfile."' WHERE id='".$last_des_id."'");
              } else {
                      echo "Sorry, there was an error uploading your file.";
                  }

      }
    }

      

           /*End Image Upload Section*/

           $filename_doc_img_1=$_FILES['data']['name']['document_image_pvri_1'];
           $filename_doc_img_2=$_FILES['data']['name']['document_image_pvri_2'];

           $certif_img1=$_FILES['data']['name']['certif_img1'];
           $certif_img2=$_FILES['data']['name']['certif_img2'];
           $certif_img3=$_FILES['data']['name']['certif_img3'];
           

            ################## start 1 ####################

           /* Start Image Upload for P verify 1*/



           
            if($filename_doc_img_1!='')
            {

            //$filename=$_FILES["fileToUpload".$i]["name"];
            //$titlename=$this->request->data["titlename".$i];
            //echo $titlename;
            /*echo '<br/>';
            echo '<br/>';
            echo $filename;
            die;*/
               
            $target_dir = WWW_ROOT."img/"."Vendor/Varification/";
            
             
            $na='document_image_pvri_1';

            $newfile=$random_digit=rand(0000,9999).$filename_doc_img_1;
            //echo $newfile;
            //die; 
            $target_file = $target_dir .$newfile;
            $uploadOk = 1;

            //echo $target_file;
            //die; 
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            // Check if image file is a actual image or fake image
            //if(isset($_POST["submit"])) {
              $check = getimagesize($_FILES['data']['tmp_name'][$na]);
              if($check !== false) {
                //echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
              } else {
                echo "File is not an image.";
                $uploadOk = 0;
              }
          
          // Check if file already exists
          if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
          }
          // Check file size
          if ($_FILES['data']['size'][$na] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
          }
          // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {

          //echo $target_file;
          //die;
          if (move_uploaded_file($_FILES['data']['tmp_name'][$na], $target_file)) {
              
              //$this->UserMaster->updateAll(array('profile_image' => $newfile),array('id' => $last_des_id));

            $this->UserVerfication->query("UPDATE bg_user_verfications SET  document_image='".$newfile."' WHERE user_id='".$last_des_id."'");
              } else {
                      echo "Sorry, there was an error uploading your file.";
                  }

      }
    }


           /*End Start Image Upload for P verify 1 */

           ########################## End 1 ############################

            ################## start 2 ####################

           /* Start Image Upload for P verify 2*/
            if($filename_doc_img_2!='')
            {

            //$filename=$_FILES["fileToUpload".$i]["name"];
            //$titlename=$this->request->data["titlename".$i];
            //echo $titlename;
            /*echo '<br/>';
            echo '<br/>';
            echo $filename;
            die;*/
               
            $target_dir = WWW_ROOT."img/"."Vendor/Varification/";
            
             
            $na='document_image_pvri_2';

            $newfile=$random_digit=rand(0000,9999).$filename_doc_img_2;
            //echo $newfile;
            //die; 
            $target_file = $target_dir .$newfile;
            $uploadOk = 1;

            //echo $target_file;
            //die; 
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            // Check if image file is a actual image or fake image
            //if(isset($_POST["submit"])) {
              $check = getimagesize($_FILES['data']['tmp_name'][$na]);
              if($check !== false) {
                //echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
              } else {
                echo "File is not an image.";
                $uploadOk = 0;
              }
          
          // Check if file already exists
          if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
          }
          // Check file size
          if ($_FILES['data']['size'][$na] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
          }
          // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {

          //echo $target_file;
          //die;
          if (move_uploaded_file($_FILES['data']['tmp_name'][$na], $target_file)) {
              
              //$this->UserMaster->updateAll(array('profile_image' => $newfile),array('id' => $last_des_id));

             $this->UserVerfication->query("UPDATE bg_user_verfications SET  document_image2='".$newfile."' WHERE user_id='".$last_des_id."'");
              } else {
                      echo "Sorry, there was an error uploading your file.";
                  }

      }
    }


           /*End Start Image Upload for P verify 2 */

           ########################## End 2 ############################


           ################## start 3 ####################

           /* Start Image Upload for sec verify 1*/
            if($certif_img1!='')
            {

            //$filename=$_FILES["fileToUpload".$i]["name"];
            //$titlename=$this->request->data["titlename".$i];
            //echo $titlename;
            /*echo '<br/>';
            echo '<br/>';
            echo $filename;
            die;*/
               
            $target_dir = WWW_ROOT."img/"."Vendor/Varification/";
            
             
            $na='certif_img1';

            $newfile=$random_digit=rand(0000,9999).$certif_img1;
            //echo $newfile;
            //die; 
            $target_file = $target_dir .$newfile;
            $uploadOk = 1;

            //echo $target_file;
            //die; 
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            // Check if image file is a actual image or fake image
            //if(isset($_POST["submit"])) {
              $check = getimagesize($_FILES['data']['tmp_name'][$na]);
              if($check !== false) {
                //echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
              } else {
                echo "File is not an image.";
                $uploadOk = 0;
              }
          
          // Check if file already exists
          if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
          }
          // Check file size
          if ($_FILES['data']['size'][$na] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
          }
          // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {

          //echo $target_file;
          //die;
          if (move_uploaded_file($_FILES['data']['tmp_name'][$na], $target_file)) {
              
              //$this->UserMaster->updateAll(array('profile_image' => $newfile),array('id' => $last_des_id));

             $this->UserVerfication->query("UPDATE bg_user_verfications SET  secoundry_attached_media1='".$newfile."' WHERE user_id='".$last_des_id."'");
              } else {
                      echo "Sorry, there was an error uploading your file.";
                  }

      }
    }


           /*End Start Image Upload for Sec verify 1 */

           ########################## End 3 ############################


             ################## start 4 ####################

           /* Start Image Upload for sec verify 2*/
            if($certif_img2!='')
            {

            //$filename=$_FILES["fileToUpload".$i]["name"];
            //$titlename=$this->request->data["titlename".$i];
            //echo $titlename;
            /*echo '<br/>';
            echo '<br/>';
            echo $filename;
            die;*/
               
            $target_dir = WWW_ROOT."img/"."Vendor/Varification/";
            
             
            $na='certif_img2';

            $newfile=$random_digit=rand(0000,9999).$certif_img2;
            //echo $newfile;
            //die; 
            $target_file = $target_dir .$newfile;
            $uploadOk = 1;

            //echo $target_file;
            //die; 
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            // Check if image file is a actual image or fake image
            //if(isset($_POST["submit"])) {
              $check = getimagesize($_FILES['data']['tmp_name'][$na]);
              if($check !== false) {
                //echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
              } else {
                echo "File is not an image.";
                $uploadOk = 0;
              }
          
          // Check if file already exists
          if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
          }
          // Check file size
          if ($_FILES['data']['size'][$na] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
          }
          // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {

          //echo $target_file;
          //die;
          if (move_uploaded_file($_FILES['data']['tmp_name'][$na], $target_file)) {
              
              //$this->UserMaster->updateAll(array('profile_image' => $newfile),array('id' => $last_des_id));

             $this->UserVerfication->query("UPDATE bg_user_verfications SET  secoundry_attached_media2='".$newfile."' WHERE user_id='".$last_des_id."'");
              } else {
                      echo "Sorry, there was an error uploading your file.";
                  }

      }
    }


           /*End Start Image Upload for Sec verify 2 */

           ########################## End 4 ############################


           ################## start 5 ####################

           /* Start Image Upload for sec verify 3*/
            if($certif_img3!='')
            {

            //$filename=$_FILES["fileToUpload".$i]["name"];
            //$titlename=$this->request->data["titlename".$i];
            //echo $titlename;
            /*echo '<br/>';
            echo '<br/>';
            echo $filename;
            die;*/
               
            $target_dir = WWW_ROOT."img/"."Vendor/Varification/";
            
             
            $na='certif_img3';

            $newfile=$random_digit=rand(0000,9999).$certif_img3;
            //echo $newfile;
            //die; 
            $target_file = $target_dir .$newfile;
            $uploadOk = 1;

            //echo $target_file;
            //die; 
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            // Check if image file is a actual image or fake image
            //if(isset($_POST["submit"])) {
              $check = getimagesize($_FILES['data']['tmp_name'][$na]);
              if($check !== false) {
                //echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
              } else {
                echo "File is not an image.";
                $uploadOk = 0;
              }
          
          // Check if file already exists
          if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
          }
          // Check file size
          if ($_FILES['data']['size'][$na] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
          }
          // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {

          //echo $target_file;
          //die;
          if (move_uploaded_file($_FILES['data']['tmp_name'][$na], $target_file)) {
              
              //$this->UserMaster->updateAll(array('profile_image' => $newfile),array('id' => $last_des_id));

            $this->UserVerfication->query("UPDATE bg_user_verfications SET  secoundry_attached_media3='".$newfile."' WHERE user_id='".$last_des_id."'");
              } else {
                      echo "Sorry, there was an error uploading your file.";
                  }

      }
    }
     /*End Start Image Upload for Sec verify 3 */

           ########################## End 5 ############################

          $this->requestAction(array('controller'=>'Cpanels', 'action'=>'generateMessages'), 
                            array('pass'=>array('104','1')));
         $this->Session->delete('registration1');
         $this->redirect(array('controller'=>'Homes','action'=>'login'));
       }

           
      }
    
}  
############## End Registration By Rohit #############





public function savepostClass(){ 
  // $this->checkUser();
  $this->autoRender=false;
  $user=$this->Session->read('User');
  $this->set('user_view',$user);
  /* echo "<pre>";
  print_r($this->request->data);
  echo "</pre>";
  die; */
  $data_1 =  $this->request->data['data_1'];
  $cls_count=count($data_1);
  $time_1 =  $this->request->data['time_1'];
    //$cls_count_time=count($time_1);
    //die;
  $time_day=$this->request->data['time_day'];
  $duration=$this->request->data['duration'];
  $class_duration = $duration.' '.$time_day;
  $this->request->data['class_duration']=$class_duration;
  $this->request->data['user_id']=''; 
  $this->request->data['class_provider_id']='';
  $this->request->data['status']= 1;
  $date = date("d-m-Y");
  $timestamp = strtotime($date);
  $this->request->data['modify_date']= $timestamp;
  $this->request->data['add_date']= $timestamp;
  $cl_van_id = $_SESSION['User']['UserMaster']['id'];
  $this->request->data['user_id']= $cl_van_id;
  $address=$this->request->data['location'];
  $geo = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($address).'&sensor=false');
  // We convert the JSON to an array
    $geo = json_decode($geo, true);
  // If everything is cool
  if ($geo['status'] = 'OK') {
    // We set our values
    @$latitude = $geo['results'][0]['geometry']['location']['lat'];
    @$longitude = $geo['results'][0]['geometry']['location']['lng'];
  }
  if($latitude=='' && $latitude='null'){    
    $this->request->data['latitude']=0;
  }
    if($longitude=='' && $longitude='null'){
      $this->request->data['longitude']=0;
    }

        $this->request->data['latitude']=$latitude;
        $this->request->data['longitude']=$longitude;
        $this->request->data['class_provider_id']=$cl_van_id;
        $total_tickat = $this->request->data['max_ticket_available'];
        $this->request->data['total_ticket']= $total_tickat;

        /* Braingroom modifications */
          $this->request->data['segment_id']=implode(',',$this->request->data['segment_id']);
          $this->request->data['community_id']=implode(',',$this->request->data['community_id']);
	      /* Braingroom modifications */

    if($this->VendorClasse->save($this->request->data)){
      $last_des_id=$this->VendorClasse->getLastInsertId();
      $sessionid = 'session_id_'.rand(10,900);
      $this->request->data['session_id']= $sessionid;
      $this->request->data['van_class_id']= '';
      $this->request->data['modified_date']= date('dd-mm-yy');
      $this->request->data['add_date']= date('dd-mm-yy');
      $this->request->data['status']= 1;
      $this->request->data['class_provider_id']= $last_des_id;
      $cl_vander_id = $_SESSION['User']['UserMaster']['id'];
      $this->request->data['class_provider_id']= $cl_vander_id;
      $this->request->data['class_id']= $last_des_id;
      $date = date("d-m-Y");
      $timestamp = strtotime($date);
      $this->request->data['modified_date']= $timestamp;
      $this->request->data['add_date']= $timestamp;
      for($cl=0;$cl<=$cls_count; $cl++){      
        @$cl_sesstion_date = $data_1[$cl];
        @$cl_sesstion_time = $time_1[$cl];
        if($cl_sesstion_date!= ''){
          $this->request->data['session_date']= $cl_sesstion_date;
          $this->request->data['session_time']= $cl_sesstion_time; 
          $this->ClassSchedule->saveAll($this->request->data);
        }
      } 
      $img1_name      = $_FILES['data']['name']['class_image1'];
      $img1_type      = $_FILES['data']['type']['class_image1'];
      $img1_tmp_name  = $_FILES['data']['tmp_name']['class_image1'];
      $img1_size      = $_FILES['data']['size']['class_image1'];

    ###################### 2 ##################################
    $img2_name      = $_FILES['data']['name']['class_image2'];
    $img2_type      = $_FILES['data']['type']['class_image2'];
    $img2_tmp_name  = $_FILES['data']['tmp_name']['class_image2'];
    $img2_size      = $_FILES['data']['size']['class_image2'];
    ###################### 3 ##################################
    $img3_name      = $_FILES['data']['name']['class_image3'];
    $img3_type      = $_FILES['data']['type']['class_image3'];
    $img3_tmp_name  = $_FILES['data']['tmp_name']['class_image3'];
    $img3_size      = $_FILES['data']['size']['class_image3'];
    ###################### 4 ##################################
    $img4_name      = $_FILES['data']['name']['class_image4'];
    $img4_type      = $_FILES['data']['type']['class_image4'];
    $img4_tmp_name  = $_FILES['data']['tmp_name']['class_image4'];
    $img4_size      = $_FILES['data']['size']['class_image4'];
    /* Start Image Upload 1*/
            if($img1_name!=''){
              //$filename=$_FILES["fileToUpload".$i]["name"];
              //$titlename=$this->request->data["titlename".$i];
              //echo $titlename;
              /*echo '<br/>';
              echo '<br/>';
              echo $filename;
              die;*/               
              $target_dir = WWW_ROOT."img/"."Vendor/class_image/";
              $na='class_image1';
              $newfile=$random_digit=rand(0000,9999).$img1_name;
              $target_file = $target_dir .$newfile;
              $uploadOk = 1;
              //echo $target_file;
              //die; 
              $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                // Check if image file is a actual image or fake image
                //if(isset($_POST["submit"])) {
                  //$check = getimagesize($_FILES['data']['tmp_name'][$na]);
                  //if($check !== false) {
                    //echo "File is an image - " . $check["mime"] . ".";
                    //$uploadOk = 1;
                  //} else {
                    //echo "File is not an image.";
                    //$uploadOk = 0;
                  //}     
                // Check if file already exists
                if (file_exists($target_file)) {
                  echo "Sorry, file already exists.";
                  $uploadOk = 0;
                }
                  // Check file size
                  //if ($_FILES['data']['size'][$na] > 500000) {
                   // echo "Sorry, your file is too large.";
                   // $uploadOk = 0;
                  //}
                  // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "ppt" && $imageFileType != "jpeg"

                 && $imageFileType != "gif" ) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }
                  // Check if $uploadOk is set to 0 by an error
                if($uploadOk == 0){
                  echo "Sorry, your file was not uploaded.";
                  // if everything is ok, try to upload file
                } else {
                  //echo $target_file;
                  //die;
                  if (move_uploaded_file($_FILES['data']['tmp_name'][$na], $target_file)) {                    
                      //$this->UserMaster->updateAll(array('profile_image' => $newfile),array('id' => $last_des_id));
                    $this->VendorClasse->query("UPDATE bg_vendor_classes SET  upload_ppt_name='".$newfile."' WHERE id='".$last_des_id."'");
                  } else {
                      echo "Sorry, there was an error uploading your file.";
                  }
                }

            }

    /*End Start Image Upload 1 */
    /* Start Image Upload 2*/
          if($img2_name!=''){            
            $target_dir = WWW_ROOT."img/"."Vendor/class_image/"; 
            $na='class_image2';
            $newfile=$random_digit=rand(0000,9999).$img1_name;           
            $target_file = $target_dir .$newfile;
            $uploadOk = 1;           
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            // Check if image file is a actual image or fake image
              //if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES['data']['tmp_name'][$na]);
                if($check !== false) {
                  //echo "File is an image - " . $check["mime"] . ".";
                  $uploadOk = 1;
                } else {
                  echo "File is not an image.";
                  $uploadOk = 0;
                }
            // Check if file already exists
            if (file_exists($target_file)) {
              echo "Sorry, file already exists.";
              $uploadOk = 0;
            }
            // Check file size
              if ($_FILES['data']['size'][$na] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
              }          
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
              echo "Sorry, your file was not uploaded.";
              // if everything is ok, try to upload file
            } else {
              //echo $target_file;
              //die;
              if (move_uploaded_file($_FILES['data']['tmp_name'][$na], $target_file)) {  
                //$this->UserMaster->updateAll(array('profile_image' => $newfile),array('id' => $last_des_id));
                $this->VendorClasse->query("UPDATE bg_vendor_classes SET  upload_tutor_picture='".$newfile."' WHERE id='".$last_des_id."'");
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
          }
    /*End Start Image Upload 2 */





      /* Start Image Upload 3 */

            if($img3_name!='')

            {



            //$filename=$_FILES["fileToUpload".$i]["name"];

            //$titlename=$this->request->data["titlename".$i];

            //echo $titlename;

            /*echo '<br/>';

            echo '<br/>';

            echo $filename;

            die;*/

               

            $target_dir = WWW_ROOT."img/"."Vendor/class_image/";

            

             

            $na='class_image3';



            $newfile=$random_digit=rand(0000,9999).$img1_name;

            //echo $newfile;

            //die; 

            $target_file = $target_dir .$newfile;

            $uploadOk = 1;



            //echo $target_file;

            //die; 

            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

            // Check if image file is a actual image or fake image

            //if(isset($_POST["submit"])) {

              //$check = getimagesize($_FILES['data']['tmp_name'][$na]);

              //if($check !== false) {

                //echo "File is an image - " . $check["mime"] . ".";

                //$uploadOk = 1;

              //} else {

               // echo "File is not an image.";

                //$uploadOk = 0;

              //}

          

          // Check if file already exists

          if (file_exists($target_file)) {

            echo "Sorry, file already exists.";

            $uploadOk = 0;

          }

          // Check file size

          //if ($_FILES['data']['size'][$na] > 500000) {

           // echo "Sorry, your file is too large.";

           // $uploadOk = 0;

          //}

          // Allow certain file formats

        if($imageFileType != "mp4" && $imageFileType != "mkv" && $imageFileType != "avi"

        && $imageFileType != "swf" && $imageFileType != "webm"  && $imageFileType != "264" && $imageFileType != "mov" && $imageFileType != "dvr") {

            echo "Sorry, only Video upload";

            $uploadOk = 0;

        }

        // Check if $uploadOk is set to 0 by an error

        if ($uploadOk == 0) {

            echo "Sorry, your file was not uploaded.";

        // if everything is ok, try to upload file

        } else {



          //echo $target_file;

          //die;

          if (move_uploaded_file($_FILES['data']['tmp_name'][$na], $target_file)) {

              

              //$this->UserMaster->updateAll(array('profile_image' => $newfile),array('id' => $last_des_id));



           $this->VendorClasse->query("UPDATE bg_vendor_classes SET  upload_video_name='".$newfile."' WHERE id='".$last_des_id."'");

              } else {

                      echo "Sorry, there was an error uploading your file.";

                  }



      }

    }

     /*End Start Image Upload 3 */







       /* Start Image Upload 4 */

            if($img4_name!='')

            {



            //$filename=$_FILES["fileToUpload".$i]["name"];

            //$titlename=$this->request->data["titlename".$i];

            //echo $titlename;

            /*echo '<br/>';

            echo '<br/>';

            echo $filename;

            die;*/

               

            $target_dir = WWW_ROOT."img/"."Vendor/class_image/";

            

             

            $na='class_image4';



            $newfile=$random_digit=rand(0000,9999).$img4_name;

            //echo $newfile;

            //die; 

            $target_file = $target_dir .$newfile;

            $uploadOk = 1;



            //echo $target_file;

            //die; 

            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

            // Check if image file is a actual image or fake image

            //if(isset($_POST["submit"])) {

              $check = getimagesize($_FILES['data']['tmp_name'][$na]);

              if($check !== false) {

                //echo "File is an image - " . $check["mime"] . ".";

                $uploadOk = 1;

              } else {

                echo "File is not an image.";

                $uploadOk = 0;

              }

          

          // Check if file already exists

          if (file_exists($target_file)) {

            echo "Sorry, file already exists.";

            $uploadOk = 0;

          }

          // Check file size

          if ($_FILES['data']['size'][$na] > 500000) {

            echo "Sorry, your file is too large.";

            $uploadOk = 0;

          }

          // Allow certain file formats

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"

        && $imageFileType != "gif" ) {

            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";

            $uploadOk = 0;

        }

        // Check if $uploadOk is set to 0 by an error

        if ($uploadOk == 0) {

            echo "Sorry, your file was not uploaded.";

        // if everything is ok, try to upload file

        } else {



          //echo $target_file;

          //die;

          if (move_uploaded_file($_FILES['data']['tmp_name'][$na], $target_file)) {

              

              //$this->UserMaster->updateAll(array('profile_image' => $newfile),array('id' => $last_des_id));



           $this->VendorClasse->query("UPDATE bg_vendor_classes SET  upload_class_photo='".$newfile."' WHERE id='".$last_des_id."'");

              } else {

                      echo "Sorry, there was an error uploading your file.";

                  }



      }

    }

     /*End Start Image Upload 3 */

    $msgResponse="The class is created successfully!";

   $this->Session->setFlash('<div class="alert alert-success">'.$msgResponse.'</div>');

 $this->redirect(array('controller'=>'Homes','action'=>'PostClass'));



  

  }

  die;

}



/*public function addRegular(){



  $this->autoRender = false;

  $user=$this->Session->read('User');

  //echo "hi";

  //die;



//print_r($user);

  //die;

  $se='session_'.rand(10,100);

  $this->request->data['session_id']=$se;

  //$cl_van_id = $_SESSION['User']['UserMaster']['id'];

  $c_van_id= $user['UserMaster']['id'];

    $this->request->data['class_vandor_id']= $c_van_id;

  $date = date("d-m-Y");

  $timestamp = strtotime($date);

  //$this->request->data['modify_date']= $timestamp;

  $this->request->data['add_date']= $timestamp;



  $total_date = $this->request->data['reg_date'];

  $total_time = $this->request->data['reg_time'];



  $date = count($total_date);

  $time = count($total_time);



  for($i=0;$i<=$date; $i++)

  {



    if(@$date[$i]!='' && @$date[$i]!='')

    {

    

    $sd=$date[$i];

    $ed=$time[$i];



    $this->request->data['start_date']=$sd;

    $this->request->data['end_date']=$ed;

    $this->ClassRegular->saveAll($this->request->data);



    }

  

}

echo '1';

die;

}

public function addLrregular(){



  $this->autoRender = false;







  $user=$this->Session->read('User');



   $c_van_id= $user['UserMaster']['id'];



  $reg_date = $this->request->data['date_month_lrr']; 

  $reg_time = $this->request->data['session_time']; 

  //$c_van_id = $_SESSION['User']['UserMaster']['id'];

  $today_date = date('d-m-Y');

  $timestamp = strtotime($today_date);

  $s='sessionid'.rand(10,900);

  $this->request->data['session_id']=$s;

  $this->request->data['class_ven_id']=$c_van_id;

  $this->request->data['add_date']=$timestamp;



  $startdate      =      $this->request->data['start_date_lrr'];

  $no_lrc         =      $this->request->data['no_lrc'];

  $end_date_lrr   =      $this->request->data['end_date_lrr'];

  $no_lrsc        =      $this->request->data['no_lrsc'];



  $this->request->data['start_date']     =$startdate;

  $this->request->data['no_of_lrc']      =$no_lrc;

  $this->request->data['no_of_ss_class'] =$no_lrsc;

  $this->request->data['start_date']     =$end_date_lrr;

  //print_r($reg_date);

  

  $dateof_week=count($reg_date);

  //echo $dateof_week;



  for($i=0;$i<=$dateof_week; $i++)

  {



    if(@$reg_date[$i]!='' && @$reg_time[$i]!='')

    {

    

    $sd=$reg_date[$i];

    $ed=$reg_time[$i];



    $this->request->data['date_month']=$sd;

    $this->request->data['time_of_day']=$ed;

    $this->ClassLrregular->saveAll($this->request->data);



    }

  

}

echo '1';

die;

}*/
public function addRegular(){



	$this->autoRender = false;
	
	$user=$this->Session->read('User');
	$se = rand(1111111111,9999999999);
	$this->request->data['session_id']=$se;
	$_SESSION['regular_session'] = $se;
	$c_van_id= $user['UserMaster']['id'];
	$this->request->data['class_vandor_id']= $c_van_id;
	$date = date("d-m-Y");
	$timestamp = strtotime($date);

$this->request->data['add_date']= $timestamp;
$this->request->data['class_session_id'] = $this->request->data['session_id'];


  $date = count($total_date);

  $time = count($total_time);
$this->loadModel('ClassRegular');
  for($i=0;$i<count($this->request->data['reg_date']); $i++)

  {
	  
	$this->ClassRegular->create();
	$this->request->data['ClassRegular'][$i]['start_date'] = $this->request->data['start_date'];
	$this->request->data['ClassRegular'][$i]['end_date'] = $this->request->data['end_date'];
	$this->request->data['ClassRegular'][$i]['class_vandor_id'] = $c_van_id;
	$this->request->data['ClassRegular'][$i]['class_session_id'] = $se;
	$this->request->data['ClassRegular'][$i]['session_single_class'] = $this->request->data['session_single_class'];
	$this->request->data['ClassRegular'][$i]['day_of_week'] = $this->request->data['reg_date'][$i];
	$this->request->data['ClassRegular'][$i]['time_of_day'] = $this->request->data['reg_time'][$i];
	//$this->log($this->request->data['ClassRegular']);
	$this->ClassRegular->save($this->request->data['ClassRegular'][$i]);

}

echo '1';

die;

}

public function addLrregular(){


	
	$this->autoRender = false;
	$user=$this->Session->read('User');
	$c_van_id= $user['UserMaster']['id'];
	$reg_date = $this->request->data['date_month_lrr']; 
	
	$reg_time = $this->request->data['session_time']; 
	$today_date = date('d-m-Y');
	$timestamp = strtotime($today_date);
	$s='sessionid'.rand(10,900);
	$this->request->data['session_id']=$s;
	$s = rand(1111111111,9999999999);
	$_SESSION['irregular_session'] = $s;
	$this->request->data['class_ven_id']=$c_van_id;
	
	$this->request->data['add_date']=$timestamp;

  $startdate      =      $this->request->data['start_date_lrr'];

  $no_lrc         =      $this->request->data['no_lrc'];

  $end_date_lrr   =      $this->request->data['end_date_lrr'];

  $no_lrsc        =      $this->request->data['no_lrsc'];


$this->loadModel('ClassLrregular');
  for($i=0;$i<count($this->request->data['date_month_lrr']); $i++)

  {
	  
	$this->ClassLrregular->create();
	$this->request->data['ClassLrregular'][$i]['start_date'] = $this->request->data['start_date_lrr'];
	$this->request->data['ClassLrregular'][$i]['end_date'] = $this->request->data['end_date_lrr'];
	$this->request->data['ClassLrregular'][$i]['class_ven_id'] = $c_van_id;
	$this->request->data['ClassLrregular'][$i]['session_id'] = $s;
	$this->request->data['ClassLrregular'][$i]['no_of_ss_class'] = $this->request->data['no_lrsc'];
	$this->request->data['ClassLrregular'][$i]['no_of_lrc'] = $this->request->data['no_lrc'];
	$this->request->data['ClassLrregular'][$i]['date_month'] = $this->request->data['date_month_lrr'][$i];
	$this->request->data['ClassLrregular'][$i]['time_of_day'] = $this->request->data['session_time'][$i];
	//$this->log($this->request->data['ClassRegular']);
	$this->ClassLrregular->save($this->request->data['ClassLrregular'][$i]);

}

echo '1';

die;

}

public function bookDesign(){

      //$this->checkUser();

      $this->layout='book_layout';

      $user=$this->Session->read('User');

      

     $this->set('user_view',$user);

      



    }

  public function bookNow(){

      //$this->checkUser();

      $this->layout='vendor_layout_payment';

      $user=$this->Session->read('User');

      $this->set('user_view',$user);

      if(!empty($this->params->pass[0])){ 



        $class_id = $this->params->pass[0];

        $class_id = base64_decode($class_id);

        $class_detail = $this->VendorClasse->find('first',array('conditions'=>array('id'=>$class_id)));

        $this->set('view_class',$class_detail);

        $this->set('class_id',$class_id);

        

       

        $class_type = $class_detail['VendorClasse']['class_timing_id'];

        if($class_type==2)

        {



          $fixed_class_detail = $this->ClassSchedule->find('first',array('conditions'=>array('class_id'=>$class_id)));

          $this->set('view_fixed_class',$fixed_class_detail);

        }

      }



    }

public function gmailSave(){

       $this->autoRender = false;
        require ('sendgrid-php/vendor/autoload.php');
        require ('sendgrid-php/lib/SendGrid.php'); 
       $dataArray=array();
       
  if(!empty($_POST))

  {
    
    $sn_id = $_POST['social_network_id'];
    $profile_image=$_POST['profile_image'];
    $fb_name=$_POST['first_name'];
    $email=$_POST['email'];
    $user_type_id=$_POST['user_type_id'];
    $vendor_type_id=$_POST['vendor_type_id'];
    
    
    $find=$this->UserMaster->find('first',array('conditions'=>array('UserMaster.email'=>$email)));
   if(!empty($find)){
     //$find['UserMaster']['profile_image']=$profile_image;
     $find['UserMaster']['social_network_id']=$sn_id; 
       
       $find['UserMaster']['status']=1;
     $this->UserMaster->save($find);
    $status = $find['UserMaster']['status'];
    $email  = $find['UserMaster']['email'];
     if($status=='1')

            {

                $email_id    = $find['UserMaster']['email'];

                $id          = $find['UserMaster']['id'];

                $uuid        = $find['UserMaster']['uuid'];

                $first_name  = $find['UserMaster']['first_name'];

                $Login = array();

                        $Login['UserMaster']['id']         = $id;

                        $Login['UserMaster']['uuid']       = $uuid;

                        $Login['UserMaster']['email']   = $email_id;

                        $Login['UserMaster']['fb_name'] = $first_name;
                         $Login['UserMaster']['first_name'] = $first_name;

                        $Login['UserMaster']['profile_image']=$profile_image;
                        $Login['UserMaster']['user_type_id']=$find['UserMaster']['user_type_id'];
                        $Login['UserMaster']['vendor_type_id']=$find['UserMaster']['vendor_type_id'];

                        
                        $this->Session->write('User',$Login);
                       
                        return 1;

            }
            else if($status==2)

                {

                    

                    $find = $this->UserMaster->find('first', array('conditions' => array('UserMaster.social_network_id'=>$sn_id,'UserMaster.email'=>$email)));

                    $id   = $find['UserMaster']['id'];

                    $Login = array();

                    $Login['UserMaster']['fb_name']=$fb_name;
                    $Login['UserMaster']['first_name']=$fb_name;
                    $Login['UserMaster']['social_network_id']=$fb_id;

                    $Login['UserMaster']['id']=$id;

                    $Login['UserMaster']['email']= $email;

                   // $Login['UserMaster']['profile_image']=$profile_image;
                    $Login['UserMaster']['user_type_id']=$find['UserMaster']['user_type_id'];
                    $Login['UserMaster']['vendor_type_id']=$find['UserMaster']['vendor_type_id'];


                    $this->Session->write('User', $Login);

                    //$this->Session->write('uid', $id);

                   //print_r($this->Session->read('User11'));die; 

                    echo "2";die;

                

                }
   }
             else{
                    $dataArray['UserMaster']['social_network_id']=$sn_id;
                    $dataArray['UserMaster']['first_name']=$fb_name;
                    $dataArray['UserMaster']['profile_image']=$profile_image;
                    $dataArray['UserMaster']['user_type_id']=$user_type_id;
                    $dataArray['UserMaster']['vendor_type_id']=$profile_image;
                    $dataArray['UserMaster']['user_type_id']=$user_type_id;
                    $dataArray['UserMaster']['vendor_type_id']=$vendor_type_id;
                    $dataArray['UserMaster']['email']=$email;
                    $dataArray['UserMaster']['status']=1;
                    $dataArray['UserMaster']['add_date']=strtotime(date('Y-m-d H:i:s'));
                    $dataArray['UserMaster']['modify_date']=strtotime(date('Y-m-d H:i:s'));
                    $password=$this->generatePassword(8);
                    $dataArray['UserMaster']['password']=md5($password);
                    $this->UserMaster->save($dataArray);

                    $this->sendMail('social',$email,$password);
                    $dataArray['UserMaster']['fb_name']=$fb_name;
                    $this->Session->write('User',$dataArray);
                    echo "1";die;
                    
                    }
                  }
          }



public function saveBookclass(){

      //$this->checkUser();

      $this->autoRender = false;

      

      ############### Save Date Code Start###############

      if(!empty($_POST)){

          

          $tran_id = $_POST['tran_id'];

          if($tran_id==1)

          {

           

           $timestem = strtotime(date('Y-m-d H:i:s'));



            $this->request->data['user_id'] = $_POST['user_id'];

            $this->request->data['class_id'] = $_POST['class_id'];

            $this->request->data['payment_type'] = $_POST['user_type_id'];

            $this->request->data['transaction_date']=$timestem;

            $this->request->data['payment_amt']=$_POST['amount'];

            //$_POST['tran_id]';

            $this->TransactionHistorie->save($this->request->data);

          }



        

      }



     ################ Save Date Code End #############

          //print_r($_POST);

     // Merchant key here as provided by Payu

    $MERCHANT_KEY = "hF6qmoBJ";



    // Merchant Salt as provided by Payu

    $SALT = "sBL86X9MpG";



    // End point - change to https://secure.payu.in for LIVE mode

    //$PAYU_BASE_URL = "https://test.payu.in";

    //$PAYU_BASE_URL = "https://secure.payu.in";



    $action = '';



    $posted = array();

    if(!empty($_POST)) {

        //print_r($_POST);

foreach($_POST as $key => $value) {    

        $posted[$key] = $value; 

      

      }

    }



    $formError = 0;



    if(empty($posted['txnid'])) {

      // Generate random transaction id

      $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);

    } else {

      $txnid = $posted['txnid'];

    }

    $hash = '';

    // Hash Sequence

    $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";

    if(empty($posted['hash']) && sizeof($posted) > 0) {

      if(

          empty($posted['key'])

         /* || empty($posted['txnid'])*/

          /*|| empty($posted['amount'])

          || empty($posted['firstname'])

          || empty($posted['email'])

          || empty($posted['phone'])

          || empty($posted['productinfo'])

          || empty($posted['surl'])

          || empty($posted['furl'])

      || empty($posted['service_provider'])*/

  ) {

    $formError = 1;

  } else {

    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));

  $hashVarsSeq = explode('|', $hashSequence);

    $hash_string = '';  

  foreach($hashVarsSeq as $hash_var) {

      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';

      $hash_string .= '|';

    }



    $hash_string .= $SALT;





    $hash = strtolower(hash('sha512', $hash_string));

    //$action = $PAYU_BASE_URL . '/_payment';

  }

} elseif(!empty($posted['hash'])) {

  $hash = $posted['hash'];

  //$action = $PAYU_BASE_URL . '/_payment';

}

  echo $txnid;

  echo '*';

  echo $hash;

 



}

public function paySuccess()

{

    $status=$_POST["status"];

    $amount=$_POST["amount"];

    $txnid=$_POST["txnid"];

    $posted_hash=$_POST["hash"];

    $key=$_POST["key"];

    $salt="GQs7yium";



  if(isset($_POST["additionalCharges"])) {

       $additionalCharges=$_POST["additionalCharges"];

        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$amount.'|'.$txnid.'|'.$key;

        

                  }

  else {    



        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$total_price;



         }

     $hash = hash("sha512", $retHashSeq);

     

       /*if ($hash != $posted_hash) {

         $msg = 'Invalid Transaction. Please try again';

        $this->set('msg',$msg);

       }*/

     //else {
		$this->loadModel('Cookies');
		$result = $this->Cookie->find('first');
		$cookie = $_COOKIE[$result['Cookie']['cook']];
		$cookie = stripslashes($cookie);
		$tick = json_decode($cookie, true);
		
		$this->loadModel('Ticket');
		
		foreach($tick as $key => $val){
			for($i=0;$i<$val;$i++){
					$this->request->data['Ticket'][$key] = $key;
							for($j =0; $j<$val; $j++){
									$this->Ticket->create();
									$this->request->data['Ticket'][$j]['vendor_classe_level_detail_id'] = $key;
									$this->request->data['Ticket'][$j]['vendor_classe_id'] = $_COOKIE['class_id'];
									$this->request->data['Ticket'][$j]['locality_id'] = $_COOKIE['locality_id'];
									$this->request->data['Ticket'][$j]['user_id'] = $this->Session->read('User');
									$this->request->data['Ticket'][$j]['status'] = 0;
									$this->request->data['Ticket'][$j]['txn_id'] = $txnid;
									$this->request->data['Ticket'][$j]['ticket_id'] = $this->get_randon();
									$this->request->data['Ticket'][$j]['start_code'] = $this->get_randon();
									$this->request->data['Ticket'][$j]['end_code'] = $this->get_randon();
									$this->Ticket->save($this->request->data['Ticket'][$j]);
									//echo '<pre>'; print_r($this->request->data['Ticket'][$j]);
						}
				}
		}

          $msg = "<h3>Thank You. Your order status is ". $status .".</h3><br/><h4>Your Transaction ID for this transaction is ".$txnid.".</h4>

          <br/><h4>We have received a payment of Rs. " . $amount . ". Your order will soon be shipped.</h4>";

          $this->set('msg',$msg);
          
          $this->set('status',$status);
          $this->set('txnid',$txnid);
          $this->set('booking_id',$book_id);
          $this->set('mobile_no',$_POST['phone']); 
          $this->set('email',$_POST['email']);
           

       //}         

}

public function payFailure()

{



$status=$_POST["status"];

$amount=$_POST["amount"];

$txnid=$_POST["txnid"];



$posted_hash=$_POST["hash"];

$key=$_POST["key"];

$salt="GQs7yium";



If (isset($_POST["additionalCharges"])) {

       $additionalCharges=$_POST["additionalCharges"];

        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$amount.'|'.$txnid.'|'.$key;

        

                  }

  else {    



        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$amount.'|'.$txnid.'|'.$key;



         }

     $hash = hash("sha512", $retHashSeq);

  

       //if ($hash != $posted_hash) {

         //echo "Invalid Transaction. Please try again";

          //$msg = 'Invalid Transaction. Please try again';

        //$this->set('msg',$msg);

       //}

     //else {



         $msg="<h3>Your order status is ". $status .".</h3><br/><h4>Your transaction id for this transaction is ".$txnid.". You may try making the payment by clicking the link below.</h4>";

          $this->set('msg',$msg);
          
          $this->set('status',$status);
          $this->set('txnid',$txnid);
          $this->set('booking_id',$book_id);
          $this->set('mobile_no',$_POST['phone']); 
          $this->set('email',$_POST['email']);
     //} 

  }


 /* public function catalogDetail(){

          
          if(isset($this->params->pass[0])){
            $this->layout='fun_layout';
          $catalog_id = base64_decode($this->params->pass[0]);
         
          $catalog_det = $this->VendorClasse->find('all',array(
            'joins' =>   array(
                            array(
                                'table' => 'bg_add_catalogs',
                                'alias' => 'Catalog',
                                'type'  =>  'INNER',
                                'conditions' => array('VendorClasse.id = Catalog.class_id','Catalog.status'=>1,'Catalog.catalog_group_id'=>$catalog_id),
                                'order'=>array('Catalog.add_date')
                                ),
                             array(
                                'table' => 'bg_user_masters',
                                'alias' => 'UserMaster',
                                'type'  =>  'INNER',
                                'conditions' => array('VendorClasse.user_id = UserMaster.id')
                                ),
                              array(
                                'table' => 'bg_class_types',
                                'alias' => 'classtype',
                                'type'  =>  'INNER',
                                'conditions' => array('VendorClasse.class_type_id = classtype.id')
                                ),
                                array(
                                'table' => 'bg_connect_groups',
                                'alias' => 'ConnectGroup',
                                'type'  =>  'INNER',
                                'conditions' => array('Catalog.catalog_group_id = ConnectGroup.id','Catalog.catalog_group_id'=>$catalog_id)
								)
							)
							));
		  }
  }*/
public function catalogDetail(){
          if(isset($this->params->pass[0])){
            $this->layout='fun_layout';
          $catalog_id = base64_decode($this->params->pass[0]);
          if($this->request->is('post')){
             $data=$this->data;
            /*================================Search Bar==============================================================*/
             if(!empty($data['Request']['search'])){
              $class_topic=$data['Request']['search'];
              $catalog_det = $this->VendorClasse->find('all',array(
                      'joins' =>   array(
                                      array(
                                          'table' => 'bg_add_catalogs',
                                          'alias' => 'Catalog',
                                          'type'  =>  'INNER',
                                          'conditions' => array('VendorClasse.id = Catalog.class_id','Catalog.status'=>1,'Catalog.catalog_group_id'=>$catalog_id,'VendorClasse.class_topic LIKE'=>'%'.$class_topic.'%'),
                                          'order'=>array('Catalog.add_date')
                                          ),
                                       array(
                                          'table' => 'bg_user_masters',
                                          'alias' => 'UserMaster',
                                          'type'  =>  'INNER',
                                          'conditions' => array('VendorClasse.user_id = UserMaster.id')
                                          ),
                                        array(
                                          'table' => 'bg_class_types',
                                          'alias' => 'classtype',
                                          'type'  =>  'INNER',
                                          'conditions' => array('VendorClasse.class_type_id = classtype.id')
                                          ),
                                          array(
                                          'table' => 'bg_connect_groups',
                                          'alias' => 'ConnectGroup',
                                          'type'  =>  'INNER',
                                          'conditions' => array('Catalog.catalog_group_id = ConnectGroup.id','Catalog.catalog_group_id'=>$catalog_id)
                                          )

                                     
                                        ),
                      'conditions'=>array('VendorClasse.class_topic LIKE'=>'%'.$class_topic.'%'),
                      'order'=>array('Catalog.modify_date'),
                      'fields'    =>array('VendorClasse.*','Catalog.*','UserMaster.*','classtype.types','ConnectGroup.*')
                     
                      ));
                  
                    $this->set('cataloglist',$catalog_det);
                    $this->set('catalog_id',$catalog_id);
             }
            /*================================End Search Bar==========================================================*/
/*=============================Filter Ascending or Descending Order====================================================*/
             if(!empty($data['optradio'])){
               if($data['optradio']=='1'){
                          $catalog_det = $this->VendorClasse->find('all',array(
                      'joins' =>   array(
                                      array(
                                          'table' => 'bg_add_catalogs',
                                          'alias' => 'Catalog',
                                          'type'  =>  'INNER',
                                          'conditions' => array('VendorClasse.id = Catalog.class_id','Catalog.status'=>1,'Catalog.catalog_group_id'=>$catalog_id),
                                          'order'=>array('Catalog.add_date')
                                          ),
                                       array(
                                          'table' => 'bg_user_masters',
                                          'alias' => 'UserMaster',
                                          'type'  =>  'INNER',
                                          'conditions' => array('VendorClasse.user_id = UserMaster.id')
                                          ),
                                        array(
                                          'table' => 'bg_class_types',
                                          'alias' => 'classtype',
                                          'type'  =>  'INNER',
                                          'conditions' => array('VendorClasse.class_type_id = classtype.id')
                                          ),
                                          array(
                                          'table' => 'bg_connect_groups',
                                          'alias' => 'ConnectGroup',
                                          'type'  =>  'INNER',
                                          'conditions' => array('Catalog.catalog_group_id = ConnectGroup.id','Catalog.catalog_group_id'=>$catalog_id)
                                          )

                                     
                                        ),
                      'order'=>array('Catalog.modify_date'),
                      'fields'    =>array('VendorClasse.*','Catalog.*','UserMaster.*','classtype.types','ConnectGroup.*')
                     
                      ));
                   $this->set('cataloglist',$catalog_det);
                    $this->set('catalog_id',$catalog_id);
               }
               else if($data['optradio']=='2'){
                  $catalog_det = $this->VendorClasse->find('all',array(
                      'joins' =>   array(
                                      array(
                                          'table' => 'bg_add_catalogs',
                                          'alias' => 'Catalog',
                                          'type'  =>  'INNER',
                                          'conditions' => array('VendorClasse.id = Catalog.class_id','Catalog.status'=>1,'Catalog.catalog_group_id'=>$catalog_id),
                                          'order'=>array('Catalog.add_date')
                                          ),
                                       array(
                                          'table' => 'bg_user_masters',
                                          'alias' => 'UserMaster',
                                          'type'  =>  'INNER',
                                          'conditions' => array('VendorClasse.user_id = UserMaster.id')
                                          ),
                                        array(
                                          'table' => 'bg_class_types',
                                          'alias' => 'classtype',
                                          'type'  =>  'INNER',
                                          'conditions' => array('VendorClasse.class_type_id = classtype.id')
                                          ),
                                          array(
                                          'table' => 'bg_connect_groups',
                                          'alias' => 'ConnectGroup',
                                          'type'  =>  'INNER',
                                          'conditions' => array('Catalog.catalog_group_id = ConnectGroup.id','Catalog.catalog_group_id'=>$catalog_id)
                                          )

                                     
                                        ),
                      'order'=>array('Catalog.modify_date DESC'),
                      'fields'    =>array('VendorClasse.*','Catalog.*','UserMaster.*','classtype.types','ConnectGroup.*')
                     
                      ));
                   $this->set('cataloglist',$catalog_det);
                    $this->set('catalog_id',$catalog_id);
               }
             }
  /*==========================================================End Filter Ascending or Descending Order==============================*/
  /*========================================================Filter According cit,Locality,class_type,Region=========================*/
             $str='';
             $classArray=array();
             $res=$this->RequestCatalog->find('all',array('conditions'=>array('status'=>1)));
            if(!empty($res)){
              foreach($res as $result){
              $locality=explode(",",$result['RequestCatalog']['locality']);
              $class_type=explode(",",$result['RequestCatalog']['class_type']);
              $region=explode(",",$result['RequestCatalog']['region']); 
              
              if ((in_array($data['Request']['locality'],$locality))&&(in_array($data['Request']['class_type'],$class_type))&&(in_array($data['Request']['region'],$region))&&($result['RequestCatalog']['city']==$data['Request']['city_id'])){
                
               $str=$str.",".$result['RequestCatalog']['class_id'];
              }
              }
             $str=substr($str,1);
             $class_ide=explode(",",$str);
             $catalog_det = $this->VendorClasse->find('all',array(
            'joins' =>   array(
                            array(
                                'table' => 'bg_add_catalogs',
                                'alias' => 'Catalog',
                                'type'  =>  'INNER',
                                'conditions' => array('VendorClasse.id = Catalog.class_id','Catalog.status'=>1,'Catalog.class_id'=>$class_ide),
                                'order'=>array('Catalog.add_date')
                                ),
                             array(
                                'table' => 'bg_user_masters',
                                'alias' => 'UserMaster',
                                'type'  =>  'INNER',
                                'conditions' => array('VendorClasse.user_id = UserMaster.id')
                                ),
                              array(
                                'table' => 'bg_class_types',
                                'alias' => 'classtype',
                                'type'  =>  'INNER',
                                'conditions' => array('VendorClasse.class_type_id = classtype.id')
                                )

                           
                              ),
            
            'fields'    =>array('VendorClasse.*','Catalog.*','UserMaster.*','classtype.types')
           
            ));
         if(!empty($catalog_det)){
         $this->set('cataloglist',$catalog_det);
          $this->set('catalog_id',$catalog_id);
            }
          }
        }
/*=====================================================End Filtering==================================================================*/

          $catalog_det = $this->VendorClasse->find('all',array(
            'joins' =>   array(
                            array(
                                'table' => 'bg_add_catalogs',
                                'alias' => 'Catalog',
                                'type'  =>  'INNER',
                                'conditions' => array('VendorClasse.id = Catalog.class_id','Catalog.status'=>1,'Catalog.catalog_group_id'=>$catalog_id),
                                'order'=>array('Catalog.add_date')
                                ),
                             array(
                                'table' => 'bg_user_masters',
                                'alias' => 'UserMaster',
                                'type'  =>  'INNER',
                                'conditions' => array('VendorClasse.user_id = UserMaster.id')
                                ),
                              array(
                                'table' => 'bg_class_types',
                                'alias' => 'classtype',
                                'type'  =>  'INNER',
                                'conditions' => array('VendorClasse.class_type_id = classtype.id')
                                ),
                                array(
                                'table' => 'bg_connect_groups',
                                'alias' => 'ConnectGroup',
                                'type'  =>  'INNER',
                                'conditions' => array('Catalog.catalog_group_id = ConnectGroup.id','Catalog.catalog_group_id'=>$catalog_id)
                                )

                           
                              ),
            
            'fields'    =>array('VendorClasse.*','Catalog.*','UserMaster.*','classtype.types','ConnectGroup.*')
           
            ));
         $group_image=$this->ConnectGroup->find('first',array('conditions'=>array('id'=>$catalog_id),'fields'=>array('group_image')));
          $this->set('group_image',$group_image['ConnectGroup']['group_image']);
          $this->set('cataloglist',$catalog_det);
          $this->set('catalog_id',$catalog_id);
           /*=============================================Papular catalog class===============================================*/
    $catalog = $this->VendorClasse->find('all',array(
            'joins' =>   array(
                            array(
                                'table' => 'bg_add_catalogs',
                                'alias' => 'Catalog',
                                'type'  =>  'INNER',
                                'conditions' => array('VendorClasse.id = Catalog.class_id','Catalog.status'=>1),
                                'order'=>array('Catalog.add_date')
                                ),
                             array(
                                'table' => 'bg_user_masters',
                                'alias' => 'UserMaster',
                                'type'  =>  'INNER',
                                'conditions' => array('VendorClasse.user_id = UserMaster.id')
                                ),
                              array(
                                'table' => 'bg_class_types',
                                'alias' => 'classtype',
                                'type'  =>  'INNER',
                                'conditions' => array('VendorClasse.class_type_id = classtype.id')
                                ),
                              

                           
                              ),
            'group'=>array('VendorClasse.id'),
            'fields'    =>array('VendorClasse.*','Catalog.*','UserMaster.*','classtype.types')
           
            ));
//echo "<pre>";print_r($catalog);die;
      
      $this->set('papluar_catalog',$catalog);
        }
        else{
          $this->redirect(array('controller'=>'Homes','action'=>'arrangeClass'));
        } 
        $city=$this->City->find('all',array('conditions'=>array('status'=>1),'order'=>array('name ASC')));
        $cityArray=array();
        if(!empty($city)){
          foreach($city as $city1){
           $cityArray[$city1['City']['id']]=$city1['City']['name'];
           }

        }
         $class_type=$this->ClassType->find('all');
        $classArray=array();
        if(!empty($class_type)){
          foreach($class_type as $res){
           $classArray[$res['ClassType']['types']]=$res['ClassType']['types'];
           }
           
        }
        

         $this->set('class_type',$classArray); 
        $this->set('city_name',$cityArray); 
    }

 public function CatalougeClassDetail(){
            
            //$this->checkUser();

            $this->layout='fun_layout';
            $user=$this->Session->read('User');
            $this->set('user_view',$user);
            $res1=$this->UserMaster->find('first',array('conditions'=>array('id'=>$user['UserMaster']['id'])));
           
            $this->Session->delete('User');
          
            $this->Session->write('User',$res1);

            $class_id = base64_decode($this->params->pass[0]);

            $group_id=base64_decode($this->params->pass[1]);
			//echo '<pre>'; print_r($class_id);
			//echo '<pre>'; print_r($group_id);
            /*$catalog_det = $this->VendorClasse->find('first',array(
            'joins' =>   array(
                            array(
                                'table' => 'bg_add_catalogs',
                                'alias' => 'Catalog',
                                'type'  =>  'INNER',
                                'conditions' => array('VendorClasse.id = Catalog.class_id','Catalog.status'=>1,'Catalog.catalog_group_id'=>$group_id,'Catalog.class_id'=>$class_id),
                                'order'=>array('Catalog.add_date')
                                ),
                             array(
                                'table' => 'bg_user_masters',
                                'alias' => 'UserMaster',
                                'type'  =>  'INNER',
                                'conditions' => array('VendorClasse.user_id = UserMaster.id')
                                ),
                             
                                array(
                                'table' => 'bg_connect_groups',
                                'alias' => 'ConnectGroup',
                                'type'  =>  'INNER',
                                'conditions' => array('Catalog.catalog_group_id = ConnectGroup.id','Catalog.catalog_group_id'=>$group_id)
                                ),
                                array(
                                'table' => 'bg_request_catalogs',
                                'alias' => 'RequestCatalog',
                                'type'  =>  'INNER',
                                'conditions' => array('Catalog.catalog_id = RequestCatalog.id','RequestCatalog.class_id'=>$class_id)
                                ),
                               array(
                                'table' => 'bg_cities',
                                'alias' => 'City',
                                'type'  =>  'INNER',
                                'conditions' => array('RequestCatalog.city=City.id')
                                ),
                                
                           
                              ),
            
            'fields'    =>array('VendorClasse.*','Catalog.*','UserMaster.*','ConnectGroup.*','RequestCatalog.*')
           
            ));*/
			$view  =  $this->VendorClasse->find('first', array(
				'conditions' => array(
					'VendorClasse.id' => $class_id,
				),
					'contain' => array(
						'VendorClasseLevelDetail',
						'ClassType',
						'User',
						'Category',
						'Segment',
						'Community',
						'Locality',
						'VendorClasseLocationDetail'=> array('Locality'),
				),
			));
			//echo '<pre>'; print_r($view); die;
           $class_type1=$this->ClassType->find('all');
           $this->set('all_class_type',$class_type1);
           
           $locality_array=$catalog_det['RequestCatalog']['locality'];
           $group_array=$catalog_det['RequestCatalog']['group_name'];
           $locality_array=explode(",",$locality_array);
           $group_array=explode(",",$group_array);
           $str_locality='';
           $str_group='';
           for($i=0;$i<count($locality_array);$i++){
            $res=$this->Locality->find('first',array('conditions'=>array('id'=>$locality_array[$i])));
            $str_locality=$str_locality.",".$res['Locality']['name'];
           }
           for($j=0;$j<count($group_array);$j++){
            $res=$this->ConnectGroup->find('first',array('conditions'=>array('id'=>$group_array[$j])));
            $str_group=$str_group.",".$res['ConnectGroup']['group_name'];
           }
           $str_group= ltrim ($str_group,',');
           $str_locality=ltrim($str_locality,',');
            $this->set('group_name',$str_group);
            $this->set('locality_name',$str_locality);
            
            $this->set('detail',$view);
           
            

    } 
    public function getQuote(){

          $this->autoRender = false;
          $user     = $this->Session->read('User');
          $u_id     = $user['UserMaster']['id'];
          if(empty($user)){
            $u_id=0;

          }
          
          $get_date = $this->request->data['data_qu'];
          $timestamp_get = strtotime($get_date);
          $timestamp_add_date = strtotime(date('d-m-Y H:i:s'));
          $this->request->data['quote_data']   = $timestamp_get;
          $this->request->data['add_date']     = $timestamp_add_date;
          $this->request->data['modify_date']  = $timestamp_add_date;
          $this->request->data['modify_date']  = $timestamp_add_date;
          $this->request->data['class_id']= $this->request->data['class_id']; 
          $this->request->data['user_id']= $u_id;
          if($this->GetQuote->save($this->request->data))
           {
                echo 1;
           }
           else
           {
            echo 0;
           }
    }

/*=====================================================Catalog Book @RahulPathak==========================================*/
 public function catalogBook(){
      //$this->checkUser();
      $this->layout='vendor_layout_payment';
      $this->loadModel('GetQuote');
      $user=$this->Session->read('User');
      $this->set('user_view',$user);
      if(!empty($this->params->pass[0])){ 

        $quote_id = $this->params->pass[0];
        $quote_id = base64_decode($quote_id);
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
            'fields'    =>array('GetQuote.*','ClassType.*','UserMaster.*','VendorUser.*','VendorClasse.*')
           
            ));


$this->set('payment_quote',$res);
      }

    }
 

public function test(){

        $this->layout=null;

        

      }

  public function findlocality(){

    $this->autoRender = false;

    $city_id = $this->request->data['city_id'];

    $locality = $this->Locality->find('all', array(
                                          'conditions' => array(
                                          'Locality.city_id' => $city_id,
                                          )));

    if(empty($locality)){


      $stateString = '<option value="-1"> No data exist </option>'; 
     
      print_r($stateString);die;  


    }else{

       $stateString = '<option value="-1">Select locality</option>'; 
        foreach ($locality as $state) {
            
            $stateString .= '<option value="'.$state['Locality']['id'].'">'.$state['Locality']['name'].'</option>';
       
        }
       print_r($stateString);die;   

    }

 }       
     





public function updateUser(){
  $this->autoRender=false;
   $ide=$this->params->pass[0];
   $user_type_id=$this->params->pass[1];
   
   $email_ide=$this->params->pass[2];
   $mobile_no=$this->params->pass[3];
   
  if(($email_ide!='')&&($mobile_no!='')){
   $res=$this->UserMaster->find('first',array('conditions'=>array('UserMaster.id'=>$ide)));
   
  if(!empty($res)){
   $res1=$this->UserMaster->find('first',array('conditions'=>array('UserMaster.email'=>$email_ide,'UserMaster.id !='=>$ide)));
   
   $res2=$this->UserMaster->find('first',array('conditions'=>array('UserMaster.mobile'=>$mobile_no,'UserMaster.id !='=>$ide)));
   if(!empty($res1)){
    return "2";die;
    }
   else if(!empty($res2)){
     return "3";die;
    }
   
  else {
  $res['UserMaster']['user_type_id']=$user_type_id; 
  $res['UserMaster']['email']=$email_ide;
  $res['UserMaster']['mobile']=$mobile_no;
  $res['UserMaster']['status']=1;
 
  $this->UserMaster->save($res);
  $this->Session->delete('User');
  $res12=$this->UserMaster->find('first',array('conditions'=>array('UserMaster.id'=>$ide)));
  $this->Session->write('User',$res12);
  return "1";die;
  }
  }
  }
  else{
  $res=$this->UserMaster->find('first',array('conditions'=>array('id'=>$ide)));
  if(!empty($res)){
  $res['UserMaster']['user_type_id']=$user_type_id; 
  $this->UserMaster->save($res);
  return "1";die;
  }
 }
}

     
  public function getCities(){
      
      $this->autoRender=false;
      $res=$this->City->find('all',array('conditions'=>array('status'=>1)));
      if(!empty($res)){
        return $res;
      }
  }

   public function upcoming(){
            
       $this->layout ='fun_layout';
       if(!empty($this->params->pass[0])){
         
          $city_id =$this->params->pass[0];
         
          $city_ids =base64_decode($city_id);  
          $res1     = $this->City->find('first',array('conditions'=>array(
                                               'City.status'=>1,
                                              'City.id'=>$city_ids)));
          $city_name = $res1['City']['name'];
          //$this->set('city_name',$city_name);
         //$all_city=$this->City->find('all');
        // $this->set('Allcities',$all_city);
          return $city_name;

      }     
   }

     public function getCategory(){
        $this->autoRender=false;
        $res=$this->Category->find('all',array('conditions'=>array('status'=>1)));
        if(!empty($res)){
          return $res;
        }
      } 
    public function getSegment($id=null){
        $this->autoRender=false;
        $res=$this->ClassSegment->find('all',array('conditions'=>array('status'=>1,'category_id'=>$id)));
        if(!empty($res)){
          return $res;
        }
      }

  public function changePassword(){
    $this->checkUser();
    $this->layout='vendor_layout';
    $user=$this->Session->read('User'); 
   if($this->params->pass[0] == 'learner'){
        $page_section_name =  $this->params['pass'][0];
           if(!empty($page_section_name)){
              $this->set('page_section_name',$page_section_name);
            }
     }
    $user=$this->UserMaster->find('first',array('conditions'=>array('email'=>$user['UserMaster']['email'])));
    $user_id    = $user['UserMaster']['id'];
    $this->set('user_id',$user_id);
    $this->set('user_view',$user);

  }
  public function checkoldpassword(){
    $this->autoRender = false;
    if($this->request->is('post')){
      $userid       = $_POST['userid'];
      $oldpassword  = md5($_POST['user_old_pass']);
      $user_data    = $this->UserMaster->find('first',array('conditions' => array(
      'UserMaster.id'=>$userid)));
      $user_pass    = $user_data['UserMaster']['password'];
      if($oldpassword == $user_pass){
        return 1;
      }else{
        return 0; 
      }
    }
  }
  public function changePassword12(){
    $this->autoRender = false;
    if($this->request->is('post')){
      $userid       = $_POST['userid'];
      $old_pass     = $_POST['old_pass'];
      $new_pass     = md5($_POST['new_pass']);
      $con_pass     = $_POST['con_pass'];
      if(!empty($new_pass)){
        $result = $this->UserMaster->updateAll(array('UserMaster.password' => "'$new_pass'"),
        array('UserMaster.id' => $userid));
        if($result){
          return 1;
        }else{
          return 0;
        } 
      }
    }
  }

    public function promoteClass(){

      $this->checkUser();

      $this->layout='vendor_layout';

      $user=$this->Session->read('User');

      $user_id    = $user['UserMaster']['id'];

      $category_data = $this->Category->find('all',array('conditions'=>array(
                                                       'Category.status'=>1)));

      $this->set('category_data',$category_data);

      $price_data = $this->FeaturedPrice->find('all', array(
                                               'conditions' => array(
                                               'FeaturedPrice.status'=>1)));
      $this->set('price_data',$price_data);

      $promt_data =  $this->VendorClasse->find('all',array(
                                               'conditions'=>array(
                                               'VendorClasse.user_id'=>$user_id
                                               )));
     

      $promt_data1 =  $this->VendorClasse->find('all',array(
                              'joins'=>
                                  array(
                                    array(
                                       'table'  =>'class_schedules',  
                                       'alias'  =>'class_sdule',
                                       'conditions'=>array(
                                            'VendorClasse.id=class_sdule.class_id',
                                            'class_sdule.session_date >='=>date('m/d/Y'),
                                        ),
                                       'order' => array('class_sdule.session_date ASC'),
                                       'limit' => 1,                
                                    )
                                  ), 
                                'conditions' => array(
                                          'VendorClasse.user_id'=>$user_id,
                                          'VendorClasse.class_timing_id'=>2,
                                        ),
                                'limit' => 1, 
                                'fields' => array('VendorClasse.*','class_sdule.*')));

    //  print_r($promt_data1);

      $flxied_data = $promt_data1['0']['class_sdule']['session_date'];
      $flxied_time = $promt_data1['0']['class_sdule']['session_time']; 

      $this->set('promt_data',$promt_data);
      $this->set('flxied_data',$flxied_data);
      $this->set('flxied_time',$flxied_time);
      
      $this->set('user_view',$user);

    }

      public function savePromtclass (){
          
          $this->autoRender = false;

          if(!empty($_POST)){

         $tran_id = $_POST['tran_id'];

          if($tran_id==1){

                $timestem = strtotime(date('Y-m-d H:i:s'));
                $this->request->data['fromdate'] = $_POST['fromdate'];
                $this->request->data['todates']  = $_POST['todates'];
                $this->request->data['sList'] = $_POST['sList'];
                $this->request->data['transaction_date']=$timestem;
                $this->request->data['payment_amt']=$_POST['amount'];
                
                $user_id      = $_POST['user_id'];
                $start_date   = $_POST['fromdate'];
                $end_date     = $_POST['todates'];
                $no_weekdays  = $_POST['weekdays'];
                $no_weekends  = $_POST['weekends'];
                $amt          = $_POST['amount'];
              
                $page_data    = $_POST['productinfo']; 

                $page_data1   = explode("_",$page_data);
                $page_name    = $page_data1[0];

                $all_class    = $_POST['sList'];
                $all_cat_ids  = $_POST['cat_ids'];


                $class_data    =  explode(",",$all_class); 

                $category_data =  explode(",",$all_cat_ids);

                $count        =  sizeof($class_data);

                $amt1         = ($amt)/($count);  

          }

      }
        $MERCHANT_KEY = "hF6qmoBJ";
        $SALT = "sBL86X9MpG";
        $action = '';
        $posted = array();
        if(!empty($_POST)) {
        foreach($_POST as $key => $value){ 
          $posted[$key] = $value;
        }
    }
        $formError = 0;
    if(empty($posted['txnid'])) {

      $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);

    } else {

       $txnid = $posted['txnid'];

       if($count > 0){

           for($i=0; $i<$count;$i++){
            
            $featured_class_transction_details = array();

            $featured_class_transction_details['user_id']           = $user_id;
            $featured_class_transction_details['page_name']         = $page_name;
            $featured_class_transction_details['class_id']          = $class_data[$i];
            $featured_class_transction_details['category_id']       = $category_data[$i];
            $featured_class_transction_details['start_date']        = $start_date;
            $featured_class_transction_details['end_date']          = $end_date;
            $featured_class_transction_details['total_amount']      = $amt1;
            $featured_class_transction_details['no_of_weekdays']    = $no_weekdays;
            $featured_class_transction_details['no_of_weekends']    = $no_weekends;
            $featured_class_transction_details['add_date']          = time();
            $featured_class_transction_details['modify_date']       = time();
            $featured_class_transction_details['status']            = 0;
            $featured_class_transction_details['txn_id']            = $txnid; 
            
            $this->PromoteClassDetail->create();

            $result  = $this->PromoteClassDetail->save($featured_class_transction_details);
       
           }

       }

    }

    $hash = '';

    // Hash Sequence

    $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";

    if(empty($posted['hash']) && sizeof($posted) > 0) {

      if(

          empty($posted['key'])
    ) {

      $formError = 1;

    } else {

      //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));

    $hashVarsSeq = explode('|', $hashSequence);

      $hash_string = '';  

    foreach($hashVarsSeq as $hash_var) {

        $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';

        $hash_string .= '|';

      }
      $hash_string .= $SALT;
      $hash = strtolower(hash('sha512', $hash_string));
    }

  } elseif(!empty($posted['hash'])) {

        $hash = $posted['hash'];;

  }
      echo $txnid;
      echo '*';
      echo $hash;

  }

   public function promtclass_success(){


      $this->checkUser();
      $this->layout='vendor_layout';
      $user=$this->Session->read('User');
      $user_id    = $user['UserMaster']['id'];
      $this->set('user_view',$user);

      $status=$_POST["status"];

      $amount=$_POST["amount"];
      $txnid=$_POST["txnid"];
      $posted_hash=$_POST["hash"];
      $key=$_POST["key"];
      $salt="GQs7yium";

      if(isset($_POST["additionalCharges"])) {

          $additionalCharges=$_POST["additionalCharges"];
          $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$amount.'|'.$txnid.'|'.$key;

        } else {    

            $retHashSeq = $salt.'|'.$status.'|||||||||||'.$total_price;
        
        }

            $hash = hash("sha512", $retHashSeq);
            $msg = "<h3>Thank You. Your order status is ". $status .".</h3><br/><h4>Your Transaction ID for this transaction is ".$txnid.".</h4>

              <br/><h4>We have received a payment of Rs. " . $amount . ". Your order will soon be shipped.</h4>";

            $this->set('msg',$msg);
            
            $this->set('amount',$amount);
            $this->set('txnid',$txnid);

            $result     =   $this->PromoteClassDetail->updateAll(
                                                  array(
                                                  'status'  => 1,
                                                  ),

                                    array('PromoteClassDetail.txn_id' => $txnid)
            );

            $trans_data = $this->PromoteClassDetail->find('all',array('conditions'=>array(
                                                          'PromoteClassDetail.txn_id' =>$txnid)));
            
            foreach ($trans_data as  $value) {
                  
                  $promt_transaction_data   = array();

                  $promt_transaction_data['user_id']                = $value['PromoteClassDetail']['user_id'];
                  $promt_transaction_data['class_id']               = $value['PromoteClassDetail']['class_id'];
                  $promt_transaction_data['payment_from_class']     = 3;
                  $promt_transaction_data['transaction_id']         = $value['PromoteClassDetail']['txn_id'];
                  $promt_transaction_data['payment_amt']            = $value['PromoteClassDetail']['total_amount'];
                  $promt_transaction_data['class_start_date_time']  = $value['PromoteClassDetail']['start_date'];
                  $promt_transaction_data['class_end_date_time']    = $value['PromoteClassDetail']['end_date'];
                  $promt_transaction_data['transaction_date']       = $value['PromoteClassDetail']['add_date'];
                  $promt_transaction_data['status']                 = 2;

                  $this->TransactionHistorie->create();
                  
                  $result  = $this->TransactionHistorie->save($promt_transaction_data);

            }                                                   


    }
    public function promtclass_failure(){

      $this->checkUser();
      $this->layout='vendor_layout';
      $user=$this->Session->read('User');
      $user_id    = $user['UserMaster']['id'];
      $this->set('user_view',$user);
      
      $status=$_POST["status"];

      $amount=$_POST["amount"];

      $txnid=$_POST["txnid"];

      $posted_hash=$_POST["hash"];

      $key=$_POST["key"];

      $salt="GQs7yium";

      if(isset($_POST["additionalCharges"])) {

          $additionalCharges=$_POST["additionalCharges"];
          $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$amount.'|'.$txnid.'|'.$key;

           }else{    

              $retHashSeq = $salt.'|'.$status.'|||||||||||'.$amount.'|'.$txnid.'|'.$key;
 
          }

            $hash = hash("sha512", $retHashSeq);
            $msg="<h3>Your order status is ". $status .".</h3><br/><h4>Your transaction id for this transaction is ".$txnid.".</h4>";
            
            $result     =   $this->PromoteClassDetail->updateAll(
                                                  array(
                                                  'status'  => 2,
                                                  ),

                                    array('PromoteClassDetail.txn_id' => $txnid)
                        ); 



            $this->set('msg',$msg);
             $this->set('amount',$amount);
            $this->set('txnid',$txnid);

            $trans_data = $this->PromoteClassDetail->find('all',array('conditions'=>array(
                                                          'PromoteClassDetail.txn_id' =>$txnid)));
            
            foreach ($trans_data as  $value) {
                  
                  $promt_transaction_data   = array();

                  $promt_transaction_data['user_id']                = $value['PromoteClassDetail']['user_id'];
                  $promt_transaction_data['class_id']               = $value['PromoteClassDetail']['class_id'];
                  $promt_transaction_data['payment_from_class']     = 3;
                  $promt_transaction_data['transaction_id']         = $value['PromoteClassDetail']['txn_id'];
                  $promt_transaction_data['payment_amt']            = $value['PromoteClassDetail']['total_amount'];
                  $promt_transaction_data['class_start_date_time']  = $value['PromoteClassDetail']['start_date'];
                  $promt_transaction_data['class_end_date_time']    = $value['PromoteClassDetail']['end_date'];
                  $promt_transaction_data['transaction_date']       = $value['PromoteClassDetail']['add_date'];
                  $promt_transaction_data['status']                 = 1;

                  $this->TransactionHistorie->create();

                  $result  = $this->TransactionHistorie->save($promt_transaction_data);


            }

    }

     
      public function payTrackFixed(){

          $this->checkUser();
          $user=$this->Session->read('User');
          $user=$this->UserMaster->find('first',array('conditions'=>array('email'=>$user['UserMaster']['email'])));
          $this->layout='vendor_layout';
          $this->set('user_view',$user);
          $this->loadModel('Ticket');
          $fixed_data = $this->VendorClasse->find('all',array(
                                         'joins'=>array(
                                          array(
                                              'table'=>'bg_user_masters',
                                              'alias'=>'UserMaster',
                                              'conditions'=>array('VendorClasse.user_id = UserMaster.id'),
                                              'order'=>array('VendorClasse.add_date DESC')
                                            )
                                          ),
                                             'conditions' => array('VendorClasse.class_timing_id'=>2,'VendorClasse.user_id'=>$user['UserMaster']['id']),
                                             'fields'=>array('VendorClasse.*','UserMaster.first_name','UserMaster.institute_name','UserMaster.vendor_type_id')
                                          )
                                        );
          $this->set('fixed_data',$fixed_data);                   
    }

    public function payTrackFiexible(){

          $this->checkUser();
          $user=$this->Session->read('User');
          $user=$this->UserMaster->find('first',array('conditions'=>array('email'=>$user['UserMaster']['email'])));
          $this->layout='vendor_layout';
          $this->set('user_view',$user);
          $this->loadModel('Ticket');
          $flexible_data = $this->VendorClasse->find('all',array(
                                         'joins'=>array(
                                          array(
                                              'table'=>'bg_user_masters',
                                              'alias'=>'UserMaster',
                                              'conditions'=>array('VendorClasse.user_id = UserMaster.id'),
                                              'order'=>array('VendorClasse.add_date DESC')
                                            )
                                          ),
                                             'conditions' => array('VendorClasse.class_timing_id'=>1,'VendorClasse.user_id'=>$user['UserMaster']['id']),
                                             'fields'=>array('VendorClasse.*','UserMaster.first_name','UserMaster.institute_name','UserMaster.vendor_type_id')
                                          )
                                        );
          $this->set('flexible_data',$flexible_data);
    }

    public function payTrackFlexibleDetail(){

          if(!empty($this->params['pass'][0])){
             
              $this->checkUser();
              $user=$this->Session->read('User');
              $user=$this->UserMaster->find('first',array('conditions'=>array('email'=>$user['UserMaster']['email'])));
              $this->layout='vendor_layout';
              $this->set('user_view',$user);
              $this->loadModel('Ticket');
              $this->loadModel('PayuTransaction');
                $class_id = base64_decode($this->params['pass'][0]);
              $class_data=$this->VendorClasse->find('first',array('conditions'=>array(
                                                                  'VendorClasse.id'=>base64_decode($this->params['pass'][0]))));
              



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

              $this->set('res',$res);
              $this->set('class_data',$class_data);
          }else{

              $this->redirect(array('controller'=>'Homes','action'=>'payTrackFiexible'));

          }
    }

     public function payTrackingFixedDetails(){

        if(!empty($this->params['pass'][0])){
              
           
              
            $this->checkUser();
            $user=$this->Session->read('User');
            
            $user=$this->UserMaster->find('first',array('conditions'=>array('email'=>$user['UserMaster']['email'])));
            $this->layout='vendor_layout';
            $this->set('user_view',$user);
            $class_id = base64_decode($this->params['pass'][0]);
           
            $this->loadModel('Ticket');
            $this->loadModel('PayuTransaction');
            $class_data=$this->VendorClasse->find('first',array('conditions'=>array(
                                                                'VendorClasse.id'=>base64_decode($this->params['pass'][0]))));
            $this->set('class_data',$class_data);

            $res=$this->PayuTransaction->query("select bg_tickets.user_id,
                                                bg_tickets.status,
                                                bg_tickets.created,
                                                bg_tickets.txn_id,
                                                count(bg_tickets.ticket_id) as total_ticket,
                                                bg_payu_transactions.amount 
                                                from bg_tickets,
                                                bg_payu_transactions where bg_tickets.txn_id=bg_payu_transactions.txnid and bg_tickets.vendor_classe_id='".$class_id."'");


            $this->set('class_data',$class_data);
            $this->set('res',$res);
          
          }else{

            $this->redirect(array('controller'=>'Homes','action'=>'payTrackFixed'));

          }      
    }

   
 public function msgInboxVendor(){ 
      $this->checkUser();
      $user=$this->Session->read('User');
      $user=$this->UserMaster->find('first',array('conditions'=>array('email'=>$user['UserMaster']['email'])));
      $this->layout='vendor_layout';
      $this->set('user_view',$user);

      if($user['UserMaster']['user_type_id'] == 1 ){

       // $ven_msg = $
        $ven_msg = $this->ChatMessage->find('all',array(
                                               'joins' => array(
                                                            array(
                                                                'table'      => 'bg_user_masters',
                                                                'alias'      => 'usermaster',
                                                                'conditions' => array('ChatMessage.reciever_id = usermaster.id'))),   
                                                'conditions'=>array('ChatMessage.reciever_id'=>$user['UserMaster']['id'],
                                                                    'ChatMessage.sender_id'=>0),
                                                'order'=>array('ChatMessage.status ASC'),
                                                'fields' =>array('ChatMessage.*','usermaster.*')));       
        $this->set('ven_msg',$ven_msg);  
      }else{
         $this->set('ven_msg',$ven_msg);  
      } 
  }

  public function msgInboxLearner(){

      $this->checkUser();
      $user=$this->Session->read('User');
      $user=$this->UserMaster->find('first',array('conditions'=>array('email'=>$user['UserMaster']['email'])));
      $this->layout='vendor_layout';
      $this->set('user_view',$user);

      if($user['UserMaster']['user_type_id'] == 2 ){

        $ven_msg = $this->ChatMessage->find('all',array(
                                               'joins' => array(
                                                            array(
                                                                'table'      => 'bg_user_masters',
                                                                'alias'      => 'usermaster',
                                                                'conditions' => array('ChatMessage.reciever_id = usermaster.id'))),   
                                                'conditions'=>array('ChatMessage.reciever_id'=>$user['UserMaster']['id'],
                                                                    'ChatMessage.sender_id'=>0),
                                                'order'=>array('ChatMessage.status ASC'),
                                                'fields' =>array('ChatMessage.*','usermaster.*')));       
        $this->set('ven_msg',$ven_msg);  

      }else{
         $this->set('ven_msg',$ven_msg);  
      }   

  }

  public function vendorMsgRead(){

      $this->checkUser();
      $user=$this->Session->read('User');
      $user=$this->UserMaster->find('first',array('conditions'=>array('email'=>$user['UserMaster']['email'])));
      $this->layout='vendor_layout';
      $this->set('user_view',$user);
      if($this->params['pass'][0]){

        $ven_msg_id = base64_decode($this->params['pass'][0]);
        $data_array['id']       = $ven_msg_id;
        $data_array['status']   = 2; 
        $this->ChatMessage->save($data_array);
        $ven_msg = $this->ChatMessage->find('first',array(
                                               'joins' => array(
                                                            array(
                                                                'table'      => 'bg_user_masters',
                                                                'alias'      => 'usermaster',
                                                                'conditions' => array('ChatMessage.reciever_id = usermaster.id'))),   
                                                'conditions'=>array('ChatMessage.reciever_id'=>$user['UserMaster']['id'],
                                                                    'ChatMessage.id'=>$ven_msg_id),
                                                'order'=>array('ChatMessage.status ASC'),
                                                'fields' =>array('ChatMessage.*','usermaster.*')));
       $this->set('ven_msg',$ven_msg); 
      }else{
        $this->redirect(array('controller'=>'Homes','action'=>'msgInboxVendor'));
      }  
  }

  public function vendorMsgReply(){

      $this->checkUser();
      $user=$this->Session->read('User');
      $user=$this->UserMaster->find('first',array('conditions'=>array('email'=>$user['UserMaster']['email'])));
      $this->layout='vendor_layout';
      $this->set('user_view',$user);
      if($this->params['pass'][0]){
        $msg_id   = base64_decode($this->params['pass'][0]);          
        $msd_date = $this->ChatMessage->find('first',array(
                                               'joins' => array(
                                                            array(
                                                                'table'      => 'bg_user_masters',
                                                                'alias'      => 'usermaster',
                                                                'conditions' => array('ChatMessage.reciever_id = usermaster.id'))),   
                                                'conditions'=>array('ChatMessage.reciever_id'=>$user['UserMaster']['id'],
                                                                    'ChatMessage.id'=>$msg_id),
                                                'order'=>array('ChatMessage.status ASC'),
                                                'fields' =>array('ChatMessage.*','usermaster.*')));
        $this->set('msd_date',$msd_date);  
      }else{
         $this->redirect(array('controller'=>'Homes','action'=>'vendorMsgRead'));
      }
  }

  public function submitReply(){

    $this->autoRender = false;
    
    if(!empty($_POST)){

      $msd_date = $this->ChatMessage->find('first',array('conditions'=>array('ChatMessage.id'=>$_POST['msg_id'])));
      
      $chech_data = $this->ChatMessage->find('first',array('conditions'=>array('ChatMessage.sender_id'=>$_POST['user_id'],
                                                                               'ChatMessage.quote_id'=>$_POST['msg_queots_id'])));  

      if(empty($chech_data)){

          $data_array  = array();
          $data_array['sender_id']      = $_POST['user_id'];
          $data_array['reciever_id']    = 0;
          $data_array['quote_id']       = $_POST['msg_queots_id'];
          $data_array['message_type']   = $msd_date['ChatMessage']['message_type'];
          $data_array['message']        = $_POST['message'];
          $data_array['status']         = 1;
          $data_array['add_date']     = time();
          $data_array['modify_date']  = time();
          $this->ChatMessage->save($data_array);
      
          $data_msg['id']          = $_POST['msg_queots_id'];
          $data_msg['price']       = $_POST['quotes_amt'];
          $data_msg['modify_date'] = time();
          $this->GetQuote->save($data_msg);
            
            $result_string.='';

            $result_string.='<center class="connet_text_hed" style="color:#2bcdc1"><h4><i>Thank you for giving quotes price.</i></h4>
                                <img alt="img not found" style="width:300px;height:300px;" class="img-responsive" src="'.HTTP_ROOT.'/img/send12.png">
                               </center>';
            print_r($result_string);die;
          
      }else{

            $result_string.='<center class="connet_text_hed" style="color:#2bcdc1"><h4><i>You have already send quotes price for this request.</i></h4>
                                <img alt="img not found" style="width:300px;height:300px;" class="img-responsive" src="'.HTTP_ROOT.'/img/failure.png">
                               </center>';
            print_r($result_string);die;   
     
      }
    }else{
      $this->redirect(array('controller'=>'Homes','action'=>'vendorMsgRead'));
    }  
  }
public function addBlog(){

          $this->checkUser();
          $user=$this->Session->read('User');
          $user=$this->UserMaster->find('first',array('conditions'=>array('email'=>$user['UserMaster']['email'])));
          $this->layout='vendor_layout';
          $this->set('user_view',$user);
          if(!empty($user)){
            $user_data     = $this->UserMaster->find('first',array('conditions'=>array(
                                                                   'UserMaster.id'=>$user['UserMaster']['id'],
                                                                   'UserMaster.user_type_id'=>1,
                                                                   'UserMaster.status'=>1)));
            $cat_ids       = $user_data['UserMaster']['category_id'];
            $category_ids  = explode(",",$cat_ids);
            $cat_data      = $this->Category->find('all',array('conditions'=>array(
                                                               'Category.id'=>$category_ids)));
            $this->set('cat_data',$cat_data);
          }
  }
public function customerReviewForm(){
      $this->layout='cutomer_review_layout';
      if(!empty($this->params['pass'][0])){
       $user_id = base64_decode($this->params['pass'][0]);
        $class_id = base64_decode($this->params['pass'][1]);
        $user=$this->UserMaster->find('first',array('conditions'=>array('id'=>$user_id)));
        $this->Session->delete('User');
        $this->Session->write('User',$user);
        $this->checkUser();
        $user    = $this->Session->read('User');
        $user_id = $user['UserMaster']['id'];
        $this->set('user_view',$user);
      
       
       
        $this->set('class_id',$class_id);
      }else{
         $this->redirect(array('controller'=>'Homes','action'=>'index'));  
      }
  }
public function submitreview(){

    $this->autoRender = false;
    if(!empty($_POST)){
      $check_review_data = $this->CustomerReview->find('first',array('conditions' => array(
                                                                     'CustomerReview.user_id' => $_POST['user_id'],
                                                                     'CustomerReview.class_id' => $_POST['class_id'],
                                                                     'CustomerReview.status' =>1)));
      if(empty($check_review_data)){  
          $review_data  = array();
          $review_data['rating']    = $_POST['rating_star'];
          $review_data['review']    = $_POST['review'];
          $review_data['user_id']   = $_POST['user_id'];
          $review_data['class_id']  = $_POST['class_id'];
          $review_data['status']    = 1;
          $review_data['add_date']  = time();
          $review_data['modify_date'] = time();
          $this->CustomerReview->save($review_data);
          $result_string.='<center class="connet_text_hed" style="color:#2bcdc1"><h4><i> Thank you for taking your time for the review.</i></h4>
                            <img alt="img not found" style="width:300px;height:300px;" class="img-responsive" src="'.HTTP_ROOT.'/img/thank-you.jpg">
                           </center>';
          print_r($result_string);die;
      }else{
          $result_string.='<center class="connet_text_hed" style="color:#2bcdc1"><h4><i>You have already reviewed this class.</i></h4>
                            <img alt="img not found" style="width:300px;height:200px;" class="img-responsive" 
                            src="'.HTTP_ROOT.'/img/not_allowed.png">
                           </center>';
           print_r($result_string);die;                   
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
public function quoteSuccess(){
   $this->layout='book_layout';
}
public function quoteFailure(){
    $this->layout='book_layout';
}



}?>
