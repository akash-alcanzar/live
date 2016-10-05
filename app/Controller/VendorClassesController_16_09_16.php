<?php
class VendorClassesController extends AppController {
	 var $uses = array('Admin','UserMaster','City','Locality','Category','Community','UserVerfication','ClassType','ClassSegment','VendorClasse','ClassRegular','ClassLrregular','ClassSchedule','VendorGalleries','TransactionHistorie','Locality','Cookie','Ticket','PayuTransaction','VendorClasseLevelDetail','Categories','ConnectGroup','RequestCatalog');
	public function slider(){
		$this->layout='slider_layout';
		$recommended_class = $this->VendorClasse->find('all', array(
					'contain' => array(
						'VendorClasseLevelDetail',
						'ClassType',
						'User',
						'Category',
						'Segment',
						'Community',
						'VendorClasseLocationDetail'=> 
						array('Locality')
					),
					'order' => array('VendorClasse.view_count DESC'),	
					'limit' => 16,	
				));
				$this->set('recommended_class',$recommended_class);	
	}
	public function classes($slug = NULL){

		$this->layout='fun_layout';
		

		if(!empty($slug)){
		 $slug = htmlspecialchars_decode($slug);
				//$class_id=base64_decode($id);
				$class = $this->VendorClasse->find('first',
				array(
						'conditions'=>array(
						"VendorClasse.class_topic Like '%$slug%'",
					),
					'contain' => array(
						'VendorClasseLevelDetail',
						'ClassType',
						'User',
						'Category',
						'Segment',
						'Community',
						'ClassSchedule',
						'ClassLrregular',
						'ClassRegular',
						'VendorClasseLocationDetail'=> 
						array('Locality')
					),
				),
				array(
					'contain' => array('Category','ClassSegment','Community'),
					)
				); 
			//	echo '<pre>'; print_r($class); die;
				
				$this->loadModel('ClassSegment');
				$segments = $this->ClassSegment->find('all', array(
					'conditions' => array(
						'ClassSegment.id' => explode(',',$class['VendorClasse']['segment_id']))
				));
				
				$user=$this->Session->read('User');
				$this->loadModel('User');
				$user_interest = $this->User->find('first',array(
									'conditions' => array(
										'User.id'=>$user['UserMaster']['id']
										)
									));
				if(!empty($user_interest)):
					$conditions = array('VendorClasse.category_id' => $user_interest['User']['category_id']);
				else:
					$conditions = array();
				endif;
				$recommended_class = $this->VendorClasse->find('all', array(
					'conditions' => $conditions,
					'contain' => array(
						'VendorClasseLevelDetail',
						'ClassType',
						'User',
						'Category',
						'Segment',
						'Community',
						'VendorClasseLocationDetail'=> 
						array('Locality')
					),
					'order' => array('VendorClasse.view_count DESC'),	
					'limit' => 15,	
				));
				$this->VendorClasse->updateAll(
					array(
						'VendorClasse.view_count' => 'VendorClasse.view_count+1'
					), 
					array(
						'VendorClasse.id' => $class_id
						)
					);
						

						foreach($class['VendorClasseLocationDetail'] as $Localities){
								   		$loc_name[] = $Localities['Locality']['name'];
										$loc_id[] = $Localities['id'];
										$onearr = array_combine($loc_id,$loc_name); 
						}
				$this->set('areas',array_unique($onearr));	
				$this->set('class',$class);
				$this->set('segments',$segments);
				$this->set('recommended_class',$recommended_class);
				
				
			//echo '<pre>'; print_r($class); die;
						
		}
	}
	public function create(){
	
		$user=$this->Session->read('User');
		$this->layout='vendor_layout';
		$this->set('user_view',$user);
		
		//$_SESSION['regular_session'] = '';
		//$_SESSION['irregular_session'] = '';
		
		$cat=$this->Category->find('all',array('conditions'=>array('status'=>1))); 
		$this->set('all_main_cat',$cat);
		$cities = $this->City->find('list');
		$locality = $this->Locality->find('list'); 
		$this->set('locality',$locality);
		$this->loadModel('ConnectGroup');
		$ConnectGroup = $this->ConnectGroup->find('all'); 
		$this->set('ConnectGroup',$ConnectGroup); //echo '<pre>'; print_r($ConnectGroup); die;
		$this->set('cities',$cities);
		$class_type=$this->ClassType->find('all'); 
		$this->set('all_class_type',$class_type);
		$localitie=$this->Locality->find('all');
		$this->set('localitie',$localitie);
		$coummunity_data=$this->Community->find('all',array('conditions'=>array('status'=>1)));
		$this->set('coummunity_data',$coummunity_data);
		
		if(!empty($this->request->data)){
			 
		$this->autoRender=false;
		//echo '<pre>'; print_r($this->request->data); die; 
		$user=$this->Session->read('User');
		$this->set('user_view',$user);
		
		$data_1 =  $this->request->data['data_1'];
		$cls_count=count($data_1);
		$time_1 =  $this->request->data['time_1'];
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

		  $this->request->data['class_provider_id']=$cl_van_id;
		if(empty($this->request->data['segment_id'])){
		$this->request->data['segment_id'] =0;
		} else {
        $this->request->data['segment_id']=implode(',',$this->request->data['segment_id']);
		}
		$this->request->data['class_type_id']=implode(',',$this->request->data['class_type_id']);
		$this->request->data['community_id']=implode(',',$this->request->data['community_id']);
		$this->request->data['age_category']=implode(',',$this->request->data['age_category']);
		$this->request->data['locality_id']=implode(',',$this->request->data['locality_id']);
		$this->request->data['region']=implode(',',$this->request->data['region']);
		$this->request->data['group_id']=implode(',',$this->request->data['group_id']);

  if($this->VendorClasse->save($this->request->data)){

    $last_des_id=$this->VendorClasse->getLastInsertId();
    	if($this->request->data['is_type'] == 2) {
			$date = date("d-m-Y");
			$stamp = strtotime($date);
			
			$this->loadModel('RequestCatalog');	
				$this->RequestCatalog->create();
				$this->request->data['RequestCatalog']['class_id'] = $last_des_id; 
				$this->request->data['RequestCatalog']['vendor_id'] = $_SESSION['User']['UserMaster']['id']; 
				$this->request->data['RequestCatalog']['catalogue_group_id'] = $this->request->data['group_id']; 
				$this->request->data['RequestCatalog']['status'] =0;
				$this->request->data['RequestCatalog']['modified_date']= $stamp;
				$this->request->data['RequestCatalog']['add_date']= $stamp;
				$this->RequestCatalog->save($this->request->data['RequestCatalog']);
		}
    $this->loadModel('ClassRegular');
	$this->ClassRegular->updateAll(
		array('vendor_class_id' => "'$last_des_id'"),
		array('class_session_id' => $_SESSION['regular_session'])
	);
	 $this->loadModel('ClassLrregular');
	$this->ClassLrregular->updateAll(
		array('vendor_class_id' => "'$last_des_id'"),
		array('session_id' => $_SESSION['irregular_session'])
	);
	$this->loadModel('VendorClasseLevelDetail');
	$this->loadModel('VendorClasseLocationDetail');
	for($i =0 ; $i<count($this->request->data['level_id']); $i++){
		
		$this->VendorClasseLevelDetail->create();
		$this->request->data['VendorClasseLevelDetail'][$i]['level_id'] = $this->request->data['level_id'][$i];
		$this->request->data['VendorClasseLevelDetail'][$i]['expert_level_id'] = $this->request->data['expert_level_id'][$i];
		if($this->request->data['is_type']){
			$this->request->data['VendorClasseLevelDetail'][$i]['price'] = 0;
		} else {
			$this->request->data['VendorClasseLevelDetail'][$i]['price'] = $this->request->data['price'][$i];
		}
		$this->request->data['VendorClasseLevelDetail'][$i]['Description'] = $this->request->data['Description'][$i];
		$this->request->data['VendorClasseLevelDetail'][$i]['vendor_class_id'] = $last_des_id;
		$this->VendorClasseLevelDetail->save($this->request->data['VendorClasseLevelDetail'][$i]);
	}
	if(!empty($this->request->data['location'])){
  		for($z =0 ; $z<count($this->request->data['location']); $z++){
		
 	 	$this->VendorClasseLocationDetail->create();
		$this->request->data['VendorClasseLocationDetail'][$z]['location'] = $this->request->data['area'][$z];
		$this->request->data['VendorClasseLocationDetail'][$z]['locality_id'] = $this->request->data['area_id'][$z];
		$this->request->data['VendorClasseLocationDetail'][$z]['vendor_class_id'] = $last_des_id;
		
		$geo = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($this->request->data['location'][$z]).'&sensor=false');
		$geo = json_decode($geo, true);
		if ($geo['status'] == 'OK') {
		  $latitude = $geo['results'][0]['geometry']['location']['lat'];
		  $longitude = $geo['results'][0]['geometry']['location']['lng'];
		} else { 
				$latitude =0;
				$longitude =0;
			}
		$this->request->data['VendorClasseLocationDetail'][$z]['latitude'] = $latitude;
		$this->request->data['VendorClasseLocationDetail'][$z]['longitude'] = $longitude;
		
		$this->VendorClasseLocationDetail->save($this->request->data['VendorClasseLocationDetail'][$z]);
		}
	}
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
    $this->request->data['vendor_class_id'] = $last_des_id;
    @$cl_sesstion_date = $data_1[$cl];
    @$cl_sesstion_time = $time_1[$cl];
    if($cl_sesstion_date!= '')
    {
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
            if($img1_name!='')
            {

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
        if ($uploadOk == 0) {
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
            if($img2_name!='')
            {

            //$filename=$_FILES["fileToUpload".$i]["name"];
            //$titlename=$this->request->data["titlename".$i];
            //echo $titlename;
            /*echo '<br/>';
            echo '<br/>';
            echo $filename;
            die;*/
               
            $target_dir = WWW_ROOT."img/"."Vendor/class_image/";
            
             
            $na='class_image2';

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
       /* if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }*/
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
 $this->redirect(array('controller'=>'vendor_classes','action'=>'create'));

  
  }
  die;
		}
		
	}
	public function search_by_name(){
		$this->layout=false;
		$all_class_type = $this->ClassType->find('all', array());
		$coummunity_data = $this->Community->find('all', array());
		$usermaster_data = $this->UserMaster->find('all', array());
		$categories = $this->Categories->find('all', array());
		if(!empty($this->request->data)){
				if($this->request->data['search_key']){
					$search_key =	$this->request->data['search_key'];
						$conditions = array(
							'OR' => array(
								array(
									"VendorClasse.class_topic LIKE '%$search_key%'"
								),
								array(
									"VendorClasse.class_summary LIKE '%$search_key%'"
								),
								array(
									"User.first_name LIKE '%$search_key%'"
								),
								array(
									"User.institute_name LIKE '%$search_key%'"
								)
							)
						);
						
						$all_total_class = $this->VendorClasse->find('all',array(
							'conditions' => $conditions,
							'contain' => array(		
									'ClassType',
									'User',
									'Category',
									'Segment',
									'Community',
									'VendorClasseLevelDetail',
									'VendorClasseLocationDetail'=> array(
										'Locality'
									)),
						));
						if(!empty($_GET['page'])){
			$page = $_GET['page'];
		}  else {
			$page = 10;
		}
							$all_class_type = $this->ClassType->find('all', array());
							$coummunity_data = $this->Community->find('all', array());
							$usermaster_data = $this->UserMaster->find('all', array());
							$categories = $this->Categories->find('all', array());
							$this->set('all_class_type',$all_class_type);
							$this->set('coummunity_data',$coummunity_data);
							$this->set('usermaster_data',$usermaster_data);
							$this->set('categories',$categories);
							$this->set('page',$page);
							$this->set('all_total_class',$all_total_class);
					}
			}
	}
	public function filter($cat_id = NULL, $seg_id = NULL){
		$this->layout=false;
		if(!empty($this->request->data)){
			
		if(!empty($_GET['page'])){
			$page = $_GET['page'];
		}  else {
			$page = 10;
		}
		
		if(!empty($this->request->data['class_provider'])){
			$conditions = array('VendorClasse.class_provider_id'=>$this->request->data['class_provider']);		
		}
		if(!empty($this->request->data['Community_id'])){
			$conditions = array('AND'=> array('VendorClasse.community_id'=>$this->request->data['Community_id']));		
		}
		if(!empty($this->request->data['class_schedule'])){
			$conditions = array('AND'=> array('VendorClasse.class_timing_id'=>$this->request->data['class_schedule']));		
		}
		if(!empty($this->request->data['class_type'])){
			$conditions = array('AND'=> array('VendorClasse.class_type_id'=>$this->request->data['class_type']));		
		}
		/*if(!empty($this->request->data['optionsRadios'])){
			$sort_value = $this->request->data['optionsRadios'];
				if($sort_value ==1){
					$conditions = array('AND' => array('VendorClasse.'));
				}
		}*/
		if(!empty($this->request->data['cat_id'])){
			$conditions['AND'] =array(
					'VendorClasse.category_id' => $this->request->data['cat_id'],
					//'FIND_IN_SET(\''. $this->request->data['seg_id'] .'\',VendorClasse.segment_id)',
				);
			}
			
			$all_total_class = $this->VendorClasse->find('all', array(
				'conditions' => $conditions,
					'contain' => array(		
									'ClassType',
									'User',
									'Category',
									'Segment',
									'Community',
									'VendorClasseLevelDetail',
									'VendorClasseLocationDetail'=> array(
										'Locality'
									))
			));
			//echo '<pre>'; print_r($all_total_class); die;
		$all_class_type = $this->ClassType->find('all', array());
		$coummunity_data = $this->Community->find('all', array());
		$usermaster_data = $this->UserMaster->find('all', array());
		$categories = $this->Categories->find('all', array());
			$this->set('all_class_type',$all_class_type);
			$this->set('coummunity_data',$coummunity_data);
			$this->set('usermaster_data',$usermaster_data);
			$this->set('categories',$Categories);
			$this->set('page_no',$page);
			$this->set('all_total_class',$all_total_class);
			}
		}
	public function lists(){
	ini_set('memory_limit', '1024M');	
		$this->layout='fun_layout';
		//$user=$this->Session->read('User');
		$data = explode('/',$this->request->url);
		if(!empty($_GET['page'])){
			$page = $_GET['page'];
		}  else {
			$page = 10;
		}
		$conditions[] = array();
		if(!empty($this->request->data['search_cat_id'])) :
			$conditions[] = array('VendorClasse.category_id' => $this->request->data['search_cat_id']);
			$this->set('cat_id',$this->request->data['search_cat_id']);
		endif;
		if(!empty($this->request->data['search_key'])) :
			$search_key = $this->request->data['search_key'];
			$conditions['AND'] = array("VendorClasse.class_topic LIKE '%$search_key%'");
			//$this->set('seg_id',$this->request->data['search_cat_id']);
		endif;
		
		if(!empty($data[0])):
			$cat_id = $this->Category->find('first', array('conditions' => array('Category.slug' => $data[0])));
			$conditions[] = array('VendorClasse.category_id' => $cat_id['Category']['id']);
			$this->set('cat_id',$cat_id['Category']['id']);
		endif;
		if(!empty($data[1])):
			$seg_id = $this->ClassSegment->find('first', array('conditions' => array('ClassSegment.slug' => $data[1])));
			$conditions['AND'] = array('FIND_IN_SET(\''. $seg_id['ClassSegment']['id'] .'\',VendorClasse.segment_id)');
			$this->set('seg_id',$seg_id['ClassSegment']['id']);
		endif;
		//echo '<pre>'; print_r($conditions); die;
		$all_class_type = $this->ClassType->find('all', array());
		$coummunity_data = $this->Community->find('all', array());
		$usermaster_data = $this->UserMaster->find('all', array());
		$categories = $this->Categories->find('all', array());
		$res_total_class = $this->VendorClasse->find('all',array(
			'conditions' =>  $conditions,
			'contain' => array(		
									'ClassType',
									'User',
									'Category',
									'Segment',
									'Community',
									'VendorClasseLevelDetail',
									'VendorClasseLocationDetail'=> array(
										'Locality'
									)),
		));
		
	$class_segments = $this->ClassSegment->find('all',array(
				'conditions' => array(
					'OR' => array(
					
								array(
									'ClassSegment.category_id' => $cat_id['Category']['id']
									),
								array(
									//'ClassSegment.category_id' => $this->request->data['search_cat_id']
									)
								)
					)
		)); 
			$featured_class = $this->VendorClasse->find('all', array(
							'conditions' => array(
									'featured_status' => 1
								),
									'contain' => array(		
									'ClassType',
									'User',
									'Category',
									'Segment',
									'Community',
									'VendorClasseLevelDetail',
									'VendorClasseLocationDetail'=> array(
										'Locality'
									)),
						));
		$recommended_class = $this->VendorClasse->find('all', array(
			'conditions' => array(
					//'featured_status' => 1
				),
					'contain' => array(		
									'ClassType',
									'User',
									'Category',
									'Segment',
									'Community',
									'VendorClasseLevelDetail',
									'VendorClasseLocationDetail'=> array(
										'Locality'
									)),
				'order' => array('VendorClasse.id DESC'),
				'limit' => 12,
		));
		$this->set('url',$this->request->url);
		$this->set('recommended_class',$recommended_class);
		$this->set('all_class_type',$all_class_type);
		$this->set('coummunity_data',$coummunity_data);
		$this->set('usermaster_data',$usermaster_data);
		$this->set('all_total_class',$res_total_class);
		$this->set('categories',$categories);
		$this->set('class_segments',$class_segments);
		$this->set('featured_status',$featured_class);
		$this->set('page_no',$page);
		$this->set('cat_id',$cat_id['Category']['id']);
		$this->set('seg_id',$seg_id);
	$this->paginate=array('limit'=>5,'order' => array('VendorClasse.id'=>'desc'),
		'conditions'=>array('VendorClasse.category_id'=>$cat_id['Category']['id']));
		
		$res_class = $this->paginate('VendorClasse');
		$this->set('allclass',$res_class);
		//if(empty($cat_id)) :
			//$this->render('test');
		//endif;
	}
	

	public function load_classes($cat_id =NULL){
		$this->layout=false;
		if(!empty($_GET['page'])){
			$page = $_GET['page'];
		}  else {
			$page = 10;
		}
			$all_total_class = $this->VendorClasse->find('all', array(
				'conditions' => array(
					'VendorClasse.category_id' => $cat_id,
				),
					'contain' => array(		
									'ClassType',
									'User',
									'Category',
									'Segment',
									'Community',
									'VendorClasseLevelDetail',
									'VendorClasseLocationDetail'=> array(
										'Locality'
									)),
			));
			$this->set('page_no',$page);
			$this->set('all_total_class',$all_total_class);
	}
	public function save_book(){
				$this->autoRender = false;
				
				$this->loadModel('UserMaster');
				$user_phone_check = $this->UserMaster->find('first',array('conditions'=> array('UserMaster.id' => $_POST['udf2'])));
				
				if(empty($user_phone_check['UserMaster']['mobile'])){
						$this->loadModel('UserMaster');
					 	$this->request->data['UserMaster']['id'] = $user_phone_check['UserMaster']['id'];
						$this->request->data['UserMaster']['mobile'] = $_POST['udf2'];
						$this->UserMaster->save($this->request->data);
					}
				// Merchant key here as provided by Payu
				$MERCHANT_KEY = "hF6qmoBJ";
				
				// Merchant Salt as provided by Payu
				$SALT = "sBL86X9MpG";
				
				
				$action = '';
				
				$posted = array();
				if(!empty($_POST)) {
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

				 $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4||||||";
				if(empty($posted['hash']) && sizeof($posted) > 0) {
				  if(
						  empty($posted['key'])
						  || empty($posted['txnid'])
						  || empty($posted['amount'])
						  || empty($posted['firstname'])
						  || empty($posted['email'])
						  || empty($posted['phone'])
						  || empty($posted['productinfo'])
						  || empty($posted['surl'])
						  || empty($posted['furl'])
						  || empty($posted['service_provider'])
				  ) {
					$formError = 1;
				  } else {

					$hashVarsSeq = explode('|', $hashSequence);
					$hash_string = '';	
					foreach($hashVarsSeq as $hash_var) {
					  $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
					  $hash_string .= '|';
					}
				
					$hash_string .= $SALT;
				
				
					$hash = strtolower(hash('sha512', $hash_string));
					$this->log($hash_string);
					$this->log($hash);
				  }
				} elseif(!empty($posted['hash'])) {
				  $hash = $posted['hash'];
				}
					echo $txnid;
					echo '*';
					echo $hash;
	}
	public function paySuccess(){
		
		
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

	
	
		$this->loadModel('PayuTransaction');
		$this->PayuTransaction->create();
		$this->request->data['PayuTransaction']['mihpayid'] = $_POST['mihpayid'];
		$this->request->data['PayuTransaction']['mode'] = $_POST['mode'];
		$this->request->data['PayuTransaction']['status'] = $_POST['status'];
		$this->request->data['PayuTransaction']['unmappedstatus'] = $_POST['unmappedstatus'];
		$this->request->data['PayuTransaction']['txnid'] = $_POST['txnid'];
		$this->request->data['PayuTransaction']['amount'] = $_POST['amount'];
		$this->request->data['PayuTransaction']['email'] = $_POST['email'];
		$this->request->data['PayuTransaction']['hash'] = $_POST['hash'];
		$this->request->data['PayuTransaction']['pg_type'] = $_POST['SBIPG'];
		$this->request->data['PayuTransaction']['encryptedPaymentId'] = $_POST['encryptedPaymentId'];
		$this->request->data['PayuTransaction']['bank_ref_num'] = $_POST['bank_ref_num'];
		$this->request->data['PayuTransaction']['bankcode'] = $_POST['bankcode'];
		$this->request->data['PayuTransaction']['name_on_card'] = $_POST['name_on_card'];
		$this->request->data['PayuTransaction']['cardnum'] = $_POST['cardnum'];
		$this->request->data['PayuTransaction']['payuMoneyId'] = $_POST['payuMoneyId'];
		$this->request->data['PayuTransaction']['discount'] = $_POST['discount'];
		$this->request->data['PayuTransaction']['net_amount_debit'] = $_POST['net_amount_debit'];
		$this->PayuTransaction->save($this->request->data);
		$last_id = $this->PayuTransaction->getLastInsertID();
		
		$tick =array();
		$cookie = htmlspecialchars_decode($_POST['udf4']);
		$tick = json_decode($cookie, true);
		$this->loadModel('Ticket');
		
		foreach($tick as $key => $val){
			for($i=0;$i<$val;$i++){
					$this->request->data['Ticket'][$key] = $key;
							for($j =0; $j<$val; $j++){
									$this->Ticket->create();
									$this->request->data['Ticket'][$j]['vendor_classe_level_detail_id'] = $key;
									$this->request->data['Ticket'][$j]['vendor_classe_id'] = $_POST['udf2'];
									$this->request->data['Ticket'][$j]['locality_id'] = $_POST['udf3'];
									$this->request->data['Ticket'][$j]['user_id'] = $_POST['udf1'];
									$this->request->data['Ticket'][$j]['status'] = $_POST['status'];
									$this->request->data['Ticket'][$j]['txn_id'] = $txnid;
									$this->request->data['Ticket'][$j]['payu_transaction_id'] = $last_id;
									$this->request->data['Ticket'][$j]['ticket_id'] = $this->get_randon();
									$this->request->data['Ticket'][$j]['start_code'] = $this->get_randon();
									$this->request->data['Ticket'][$j]['end_code'] = $this->get_randon();
									$this->Ticket->save($this->request->data['Ticket'][$j]);
						}
				}
		}
		

			$this->loadModel('PayuTransaction');
		$z = $this->PayuTransaction->find('first', array(
			'conditions' => array('PayuTransaction.id'=>$last_id),
			'contain' => array('Ticket'=>array(
				'VendorClasse',
				'VendorClasseLevelDetail'=> array(
					
				)
			)),
			
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
          <tr>
      <td><p>You have successfully booked classes through Braingroom. Please find your Ticket ids with start Verification code and end verification code and please carry them in the form of printout or in mobile to the class centers.</p>
<p>Your transaction ID -'.$txnid.'
      </td>
      </tr>
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
foreach($z['Ticket'] as $x){
$booking_status_mail.= '<tr>
    <td>'.$x['ticket_id'].'</td>
    <td>'.$x['VendorClasse']['class_topic'].'</td>
    <td>'.$x['start_code'].'</td>
    <td>'.$x['end_code'].'</td>
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
   <p>Note - You have to give the above mentioned strat verification code when the class starts and end verification code when the class ends to the tutor. Braingroom will take care of any issues raised regarding clasess only if you avail right codes in the first place.</p>
  </td>
    </tr>
   </table>';
$this->sendMail('bookClass_status',$_POST['email'],$booking_status_mail);
          $msg = "<h3>Thank You. Your order status is ". $status .".</h3><br/><h4>Your Transaction ID for this transaction is ".$txnid.".</h4>

          <br/><h4>We have received a payment of Rs. " . $amount . ". Your order will soon be shipped.</h4>";

          $this->set('msg',$msg);
			$this->log($msg);
              $this->Session->setFlash($msg);
				$class = base64_encode($_POST['udf2']);
				$this->redirect(array('controller'=>'vendor_classes','action'=>'classes',$class));
		}
	public function book_now(){
		$this->layout='book_now_layout';
		$class = $this->VendorClasse->find('first', array(
					'conditions' => array(
									'VendorClasse.id' => $this->request->data['classid'],
									),
					'contain' => array(
									'User',
									'VendorClasseLocationDetail' => array(
											'conditions' => array(
												'VendorClasseLocationDetail.id' => $this->request->data['VendorClasses']['locality'],
												'VendorClasseLocationDetail.vendor_class_id' => $this->request->data['classid']
											),
										),
									)
					));
		$this->set('class',$class);		
		$this->set('book',$this->request->data);
		
		if(!empty($this->request->data)){
					
		foreach($this->request->data['level_check'] as $key => $val){
			$as[$val] = $this->request->data['tic_'.$val];
		}
			$txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
			$json = json_encode($as);
			$user = $this->Session->read('User');
			$this->set('ticket',$json);
			$this->set('txnid',$txnid);
			$this->set('class_id',$class['VendorClasse']['id']);
			$this->set('user_id',$user['UserMaster']['id']);
			$this->set('email',$user['UserMaster']['email']);
			$this->set('mobile',$user['UserMaster']['mobile']);	
			$this->set('locality_id',$this->request->data['VendorClasses']['locality']);

			}	
	}
	public function get_randon(){
			$randnum = rand(1111111111,9999999999);
			return $randnum;
		}
		public function sendMail($mailFor, $mail= NULL, $activationCode=NULL){
        
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
			}
		}
		public function b2c_class(){
				$this->layout = NULL;
				$this->loadModel('ClassType');
				$all_class_type = $this->ClassType->find('all');
				$this->set('all_class_type',$all_class_type);
			}
			public function b2b_class(){
				$this->layout = NULL;
				$this->loadModel('ClassType');
				$all_class_type = $this->ClassType->find('all');
				$this->set('all_class_type',$all_class_type);
			}
}