<?php
class ConnectController extends AppController {

  var $uses = array('Admin','ChatMessage','UserMaster','City','Locality','Category','Community','UserVerfication','ClassType','ClassSegment','VendorClasse','ClassRegular','ClassSchedule','VendorGalleries',
    'TransactionHistorie','AccountDetail','RequestCatalog','CupanDetail','GiftCupan','GiftCard','GiftCardSegment',
    'FeaturedPrice','PromoteClassDetail','Blog','BlogComment','BlogLike','UserSegment','GetQuote',
    'VendorClasseLevelDetail','ConnectGroup','Wishlist','Ngo','Communitie','GroupActivity','GroupLike',
    'GroupComment','GroupPost','GroupActivityLike','GroupActivityComment','GroupActivityMessge','CustomerReview',
    'GroupPostComment','GroupPostLike','Post','PostComment','PostLike','TransactionHistory'
    ,'BlogReport','BlogCommentReply','PostCommentReply','GroupActivityReport','ConnectSegmentGroup',
    'GroupActivityCommentReply','GroupPostReport','PostReport','GroupPostCommentReply');

  var $components = array('Paginator','Messages','Session');

  public function checkUser(){
    if(!$this->Session->check('User')){
      $this->redirect(array('controller'=>'Homes','action'=>'login'));
    }
  }
  
/******************************** akash connect part functions **********************************************/

  public function connectpage(){

      $this->layout='connect_layout';
      $user=$this->Session->read('User');
      $user_id = $user['UserMaster']['id'];
      $this->set('user_view',$user);
      if(empty($user_id)){
        $category_data = $this->Category->find('all',array('conditions'=>array(
                                                       'Category.status'=>1)));
        
        $segment_data = $this->ClassSegment->find('all',array('conditions'=>array(
                                                       'ClassSegment.status'=>1)));
        $this->set('segment_data',$segment_data);

        $seg_ids_array  = array();
         /*start loop*/
        foreach ($segment_data as $sgt_ids) {
          $seg_ids_array[]  = $sgt_ids['ClassSegment']['id'];   
        }
      $this->set('seg_ids_array',$seg_ids_array[0]);
        // Blog Data 

        $blog_data = $this->Blog->find('all',array(
                      'fields' => 'Blog.*,userdata.*',
                      'conditions' => array(  
                      'Blog.status'=>1),
                      'joins'=>
                          array(
                            array(
                               'table'  =>'user_masters',  
                               'alias'  =>'userdata',
                               'type' =>'left',
                               'conditions'=>array(
                                      'userdata.id=Blog.user_id',
                               )                  
                            ),

                  ),
        ));

        $this->set('blog_data',$blog_data); 



      // Blog comment data 

      $like_array = array();
      foreach ($blog_data as $datas){
        $dataArray = $this->BlogComment->find('count',array('conditions'=>array(
                                                            'BlogComment.blog_id'=>$datas['Blog']['id'],
                                                            'BlogComment.status'=>1)));
        $like_array[$datas['Blog']['id']] = $dataArray;
      }

      // Blog like data 
      
      $comment_array = array();  
    
      foreach ($blog_data as  $cmmtdata) {
        $dataArray1 = $this->BlogLike->find('count',array('conditions'=>array(
                                                            'BlogLike.blog_id'=>$cmmtdata['Blog']['id'],
                                                            'BlogLike.status'=>1)));

        $dataArray2 = $this->BlogLike->find('first',array('conditions'=>array(
                                                            'BlogLike.blog_id'=>$cmmtdata['Blog']['id'],
                                                            'BlogLike.status'=>1,
                                                            'BlogLike.user_id'=>$user_id),
                                                            'fields'=>array('BlogLike.status'))); 
                                                                                                                  
        $comment_array[$cmmtdata['Blog']['id']]['value'] = $dataArray1;
        $comment_array[$cmmtdata['Blog']['id']]['status'] = $dataArray2;
      } 

      // Blog report data 

      $report_array = array(); 

      foreach ($blog_data as  $reportdata){
          $dataArray1 = $this->BlogReport->find('count',array('conditions'=>array(
                                                              'BlogReport.blog_id'=>$reportdata['Blog']['id'],
                                                              'BlogReport.status'=>1)));
          $dataArray2 = $this->BlogReport->find('first',array('conditions'=>array(
                                                              'BlogReport.blog_id'=>$reportdata['Blog']['id'],
                                                              'BlogReport.status'=>1,
                                                              'BlogReport.user_id'=>$user_id),
                                                              'fields'=>array('BlogReport.status'))); 
          $report_array[$reportdata['Blog']['id']]['value'] =  $dataArray1;
          $report_array[$reportdata['Blog']['id']]['status'] = $dataArray2;
          
      } 

      $this->set('report_array',$report_array);
      $this->set('like_array',$like_array); 
      $this->set('comment_array',$comment_array);

      // User Post data 

      $post_data = $this->Post->find('all',array(
                    'fields' => 'Post.*,userdata.*',
                    'conditions' => array(  
                    'Post.status'=>1),
                    'joins'=>
                        array(
                          array(
                             'table'  =>'user_masters',  
                             'alias'  =>'userdata',
                             'type' =>'left',
                             'conditions'=>array('userdata.id=Post.user_id')                  
                          )           
                    ),
      ));
      $this->set('post_data',$post_data);

      // post like data 
      
      $post_like_array = array();  
      foreach ($post_data as  $postdata) {
        $dataArray1 = $this->PostLike->find('count',array('conditions'=>array(
                                                            'PostLike.post_id'=>$postdata['Post']['id'],
                                                            'PostLike.status'=>1)));
        $dataArray2 = $this->PostLike->find('first',array('conditions'=>array(
                                                            'PostLike.post_id'=>$postdata['Post']['id'],
                                                            'PostLike.status'=>1,
                                                            'PostLike.user_id'=>$user_id),
                                                            'fields'=>array('PostLike.status')));                               
        $post_like_array[$postdata['Post']['id']]['value'] = $dataArray1;
        $post_like_array[$postdata['Post']['id']]['status'] = $dataArray2;
      } 
      $this->set('post_like_array',$post_like_array);   


      // post commnet data 

      $post_commmt_array = array();
      foreach ($post_data as $datas){
        $dataArray = $this->PostComment->find('count',array('conditions'=>array(
                                                            'PostComment.post_id'=>$datas['Post']['id'],
                                                            'PostComment.status'=>1)));
        $post_commmt_array[$datas['Post']['id']] = $dataArray;
      }
      $this->set('post_commmt_array',$post_commmt_array);

      // post report data 

       $post_report_array = array(); 

        foreach ($post_data as  $reportdata){
            $dataArray1 = $this->PostReport->find('count',array('conditions'=>array(
                                                                'PostReport.post_id'=>$reportdata['Post']['id'],
                                                                'PostReport.status'=>1)));
            $dataArray2 = $this->PostReport->find('first',array('conditions'=>array(
                                                                'PostReport.post_id'=>$reportdata['Post']['id'],
                                                                'PostReport.status'=>1,
                                                                'PostReport.user_id'=>$user_id),
                                                                'fields'=>array('PostReport.status'))); 
            $post_report_array[$reportdata['Post']['id']]['value']  =  $dataArray1;
            $post_report_array[$reportdata['Post']['id']]['status'] =  $dataArray2;
        }

  
      }else{

          $user_data     = $this->UserMaster->find('first',array('conditions'=>array(
                                                                 'UserMaster.id'=>$user_id,
                                                                 'UserMaster.status'=>1)));

          $cat_ids       = $user_data['UserMaster']['category_id'];
          $category_ids  = explode(",",$cat_ids); 
          $this->set('cat_ids',$cat_ids);
          $this->set('category_ids',$category_ids);

          $all_segment_data  = $this->ClassSegment->find('all',array('conditions'=>array(
                                                           'ClassSegment.status'=>1,
                                                           'ClassSegment.category_id'=>$category_ids)));

          $this->set('all_segment_data',$all_segment_data);


          $img_data = array();

          $user_customize_segs = $this->UserSegment->find('all',array('conditions'=>array(
                                                                      'UserSegment.status'=>1,
                                                                      'UserSegment.user_id'=>$user_id)));

          if(empty($user_customize_segs)){

            $segment_data = $this->ClassSegment->find('all',array('conditions'=>array(
                                                           'ClassSegment.status'=>1,
                                                           'ClassSegment.category_id'=>$category_ids)));

            $seg_array  = array();
            
            foreach ($segment_data as $data11) {    
              $seg_array[]  = $data11['ClassSegment']['segment_id'];    
            }

            $this->set('seg_array',$seg_array);
            $this->set('segment_data',$segment_data);
            
          }else{

            $seg_array  = array();
            
            foreach ($user_customize_segs as $data11) {    
              $seg_array[]  = $data11['UserSegment']['segment_id'];    
            }

            $segment_data = $this->ClassSegment->find('all',array('conditions'=>array(
                                                           'ClassSegment.status'=>1,
                                                           'ClassSegment.id'=>$seg_array)));

            $this->set('seg_array',$seg_array);
            $this->set('segment_data',$segment_data);
    
          } 

          foreach ($category_ids as $value) {
            $category_data[] = $this->Category->find('first',array('conditions'=>array(
                                                                   'Category.status'=>1,
                                                                   'Category.id'=>$value)));   
          }
          $cities_data  = $this->City->find('all',array('conditions'=>array(
                                                         'City.status'=>1)));
          $this->set('cities_data',$cities_data);  
          
          $seg_ids_array  = array();


          foreach ($segment_data as $sgt_ids) {
            $seg_ids_array[]  = $sgt_ids['ClassSegment']['id'];   
          }



          $this->set('seg_array1',$seg_ids_array);
          $this->set('seg_ids_array',$seg_ids_array[0]);

          $blog_data = $this->Blog->find('all',array(
                          'fields' => 'Blog.*,userdata.*',
                          'conditions' => array(  
                          'Blog.status'=>1,
                          'Blog.segment_id'=>$seg_ids_array),
                          'joins'=>
                              array(
                                array(
                                   'table'  =>'user_masters',  
                                   'alias'  =>'userdata',
                                   'type' =>'left',
                                   'conditions'=>array(
                                          'userdata.id=Blog.user_id',
                                   )                  
                                ),          
                      ),
          ));

          $post_data = $this->Post->find('all',array(
                          'fields' => 'Post.*,userdata.*',
                          'conditions' => array(  
                          'Post.status'=>1,
                          'Post.segment_id'=>$seg_ids_array),
                          'joins'=>
                              array(
                                array(
                                   'table'  =>'user_masters',  
                                   'alias'  =>'userdata',
                                   'type' =>'left',
                                   'conditions'=>array('userdata.id=Post.user_id')                  
                                )           
                          ),
          ));

      $this->set('blog_data',$blog_data); 
      $this->set('post_data',$post_data); 
     
     // comment data 

      $like_array = array();
      foreach ($blog_data as $datas){
        $dataArray = $this->BlogComment->find('count',array('conditions'=>array(
                                                            'BlogComment.blog_id'=>$datas['Blog']['id'],
                                                            'BlogComment.status'=>1)));
        $like_array[$datas['Blog']['id']] = $dataArray;
      }

      // like data 
      
      $comment_array = array();  
    
      foreach ($blog_data as  $cmmtdata) {
        $dataArray1 = $this->BlogLike->find('count',array('conditions'=>array(
                                                            'BlogLike.blog_id'=>$cmmtdata['Blog']['id'],
                                                            'BlogLike.status'=>1)));

        $dataArray2 = $this->BlogLike->find('first',array('conditions'=>array(
                                                            'BlogLike.blog_id'=>$cmmtdata['Blog']['id'],
                                                            'BlogLike.status'=>1,
                                                            'BlogLike.user_id'=>$user_id),
                                                            'fields'=>array('BlogLike.status'))); 
                                                                                                                  
        $comment_array[$cmmtdata['Blog']['id']]['value'] = $dataArray1;
        $comment_array[$cmmtdata['Blog']['id']]['status'] = $dataArray2;
      } 

      // report data 

      $report_array = array(); 

      foreach ($blog_data as  $reportdata){
          $dataArray1 = $this->BlogReport->find('count',array('conditions'=>array(
                                                              'BlogReport.blog_id'=>$reportdata['Blog']['id'],
                                                              'BlogReport.status'=>1)));
          $dataArray2 = $this->BlogReport->find('first',array('conditions'=>array(
                                                              'BlogReport.blog_id'=>$reportdata['Blog']['id'],
                                                              'BlogReport.status'=>1,
                                                              'BlogReport.user_id'=>$user_id),
                                                              'fields'=>array('BlogReport.status'))); 
          $report_array[$reportdata['Blog']['id']]['value'] =  $dataArray1;
          $report_array[$reportdata['Blog']['id']]['status'] = $dataArray2;
          
      } 

      $this->set('report_array',$report_array);
      $this->set('like_array',$like_array); 
      $this->set('comment_array',$comment_array);
      
      // post like data 

      $post_like_array = array();  

      foreach ($post_data as  $postdata) {
      
        $dataArray1 = $this->PostLike->find('count',array('conditions'=>array(
                                                            'PostLike.post_id'=>$postdata['Post']['id'],
                                                            'PostLike.status'=>1)));

        $dataArray2 = $this->PostLike->find('first',array('conditions'=>array(
                                                            'PostLike.post_id'=>$postdata['Post']['id'],
                                                            'PostLike.status'=>1,
                                                            'PostLike.user_id'=>$user_id),
                                                            'fields'=>array('PostLike.status'))); 
                                                                                                                  
        $post_like_array[$postdata['Post']['id']]['value'] = $dataArray1;
        $post_like_array[$postdata['Post']['id']]['status'] = $dataArray2;
      
      } 
      
      $this->set('post_like_array',$post_like_array); 

      // post commnet data 

      $post_commmt_array = array();

      foreach ($post_data as $datas){

        $dataArray = $this->PostComment->find('count',array('conditions'=>array(
                                                            'PostComment.post_id'=>$datas['Post']['id'],
                                                            'PostComment.status'=>1)));
        $post_commmt_array[$datas['Post']['id']] = $dataArray;
      }

      $this->set('post_commmt_array',$post_commmt_array); 

  }  


    $category_data1 = $this->Category->find('all',array(
                      'fields' => 'Category.*,clssgmt.*',
                      'conditions' => array(  
                      'Category.status'=>1),
                      'joins'=>
                          array(
                            array(
                               'table'  =>'class_segments',  
                               'alias'  =>'clssgmt',
                               'type' =>'left',
                               'conditions'=>array(
                                      'clssgmt.category_id=Category.id'
                               )                  
                            )
                          ),
    ));

    $segment_data = $this->ClassSegment->find('all',array('conditions'=>array(
                                                       'ClassSegment.status'=>1)));

    $dataArray12   = array();

      foreach ($segment_data as $value) {
        
        $dataArray12[]  = $value['ClassSegment']['id'];

    }

    $this->set('dataArray12',$dataArray12);

    $sem_data_count = count($segment_data);

    $this->set('sem_data_count',$sem_data_count); 
    $this->set('category_data',$category_data);
    $this->set('category_data1',$category_data1);

    $blog_id = $this->Blog->find('all',array(
                                    'fields'=>'Blog.*',
                                    'conditions'=>array(
                                    'Blog.segment_id'=>1,
                                    'Blog.status'=>1)));
  }

  public function ChangeCategory(){

      $this->autoRender = false;
      $category_id      = $_POST['cat_id'];
      $segment_data  = $this->ClassSegment->find('all', array('conditions'=>array(
                                                                 'ClassSegment.category_id'=>$category_id,
                                                                 'ClassSegment.status'=>1)));
      $segmentids_array = array();
      foreach ($segment_data as $value1) {
        $segmentids_array[]  = $value1['ClassSegment']['id'];
      }

      $smt_slt_ids   = $segmentids_array;

      $result_string.='';

          foreach ($segment_data as $data1 ) {     
            $result_string.='<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4" id="'.$data1['ClassSegment']['id'].'" style="margin-top:25px;cursor:pointer;" onclick="getsemid('.$data1['ClassSegment']['id'].');" >
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r segmt_img">
                        <center>';
                           if(empty($data1['ClassSegment']['segment_image'])){ 
                                $result_string.='<img class="image-responsive" src="'.HTTP_ROOT.'/img/connect/noimage.jpg" alt="img not found">';
                             }else{  
                                $result_string.='<img class="image-responsive" style="width:100%;" src="'.HTTP_ROOT.'/img/segment_image/'.$data1['ClassSegment']['segment_image'].'" alt="img not found">';
                             } 
                        $result_string.='</center>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 semgt_connt_bdr2" id="segt'.$data1['ClassSegment']['id'].'">
                        <center>
                            <span class="connt_flex_middle_text" id="segt_text'.$data1['ClassSegment']['id'].'">
                                 '.$data1['ClassSegment']['segment_name'].'
                            </span>
                        </center>
                    </div>           
                  </div>';
            }

            $append_two_data[0] = $smt_slt_ids;
            $append_two_data[1] = $result_string;
            print_r(json_encode($append_two_data));die;

      }

    // On Click category get Related BLog data    
      
    public function segmentdata(){

      $this->autoRender = false;
      $segment_id       = $_POST['semrt_id'];
      $user             = $this->Session->read('User'); 
      $user_id          = $user['UserMaster']['id'];
      $user_type        = $user['UserMaster']['user_type_id'];
      
      if(empty($user)){

          $blog_data = $this->Blog->find('all',array(
                        'fields' => 'Blog.*,userdata.*,bloglike.*',
                        'conditions' => array(  
                        'Blog.status'=>1,
                        'Blog.segment_id'=>$segment_id),
                        'joins'=>
                            array(
                              array(
                                 'table'  =>'user_masters',  
                                 'alias'  =>'userdata',
                                 'type' =>'left',
                                 'conditions'=>array('userdata.id=Blog.user_id')                  
                              ),
                              array(
                                 'table'  =>'bg_blog_likes',  
                                 'alias'  =>'bloglike',
                                 'type' =>'left',
                                 'conditions' => array('Blog.id = bloglike.blog_id',
                                                       'bloglike.user_id'=>$user_id)            
                              ),            
                        ),
          ));
        
           // comment data 
    
            $comment_array = array(); 
            
            foreach ($blog_data as $datas){
              $dataArray = $this->BlogComment->find('count',array('conditions'=>array(
                                                                  'BlogComment.blog_id'=>$datas['Blog']['id'],
                                                                  'BlogComment.status'=>1)));
              $comment_array[$datas['Blog']['id']] = $dataArray;
            }

            // like data 

            $like_array = array();

            foreach ($blog_data as  $cmmtdata) {
              $dataArray1 = $this->BlogLike->find('count',array('conditions'=>array(
                                                                  'BlogLike.blog_id'=>$cmmtdata['Blog']['id'],
                                                                  'BlogLike.status'=>1)));

              $dataArray2 = $this->BlogLike->find('first',array('conditions'=>array(
                                                                  'BlogLike.blog_id'=>$cmmtdata['Blog']['id'],
                                                                  'BlogLike.status'=>1,
                                                                  'BlogLike.user_id'=>$user_id),
                                                                  'fields'=>array('BlogLike.status'))); 
                                                                                                                        
              $like_array[$cmmtdata['Blog']['id']]['value'] = $dataArray1;
              $like_array[$cmmtdata['Blog']['id']]['status'] = $dataArray2;
            } 

            // report data 

            $report_array = array(); 

            foreach ($blog_data as  $reportdata){
                $dataArray1 = $this->BlogReport->find('count',array('conditions'=>array(
                                                                    'BlogReport.blog_id'=>$reportdata['Blog']['id'],
                                                                    'BlogReport.status'=>1)));
                $dataArray2 = $this->BlogReport->find('first',array('conditions'=>array(
                                                                    'BlogReport.blog_id'=>$reportdata['Blog']['id'],
                                                                    'BlogReport.status'=>1,
                                                                    'BlogReport.user_id'=>$user_id),
                                                                    'fields'=>array('BlogReport.status'))); 
                $report_array[$reportdata['Blog']['id']]['value'] =  $dataArray1;
                $report_array[$reportdata['Blog']['id']]['status'] = $dataArray2;
                
            }   

      }else{

          $blog_data = $this->Blog->find('all',array(
                        'fields' => 'Blog.*,userdata.*,bloglike.*',
                        'conditions' => array(  
                        'Blog.status'=>1,
                        'Blog.segment_id'=>$segment_id),
                        'joins'=>
                            array(
                              array(
                                 'table'  =>'user_masters',  
                                 'alias'  =>'userdata',
                                 'type' =>'left',
                                 'conditions'=>array('userdata.id=Blog.user_id')                  
                              ),
                              array(
                                 'table'  =>'bg_blog_likes',  
                                 'alias'  =>'bloglike',
                                 'type' =>'left',
                                 'conditions' => array('Blog.id = bloglike.blog_id',
                                                       'bloglike.user_id'=>$user_id)            
                              ),            
                        ),
          ));

        // comment data 
        
          $comment_array = array(); 
          
          foreach ($blog_data as $datas){
            $dataArray = $this->BlogComment->find('count',array('conditions'=>array(
                                                                'BlogComment.blog_id'=>$datas['Blog']['id'],
                                                                'BlogComment.status'=>1)));
            $comment_array[$datas['Blog']['id']] = $dataArray;
          }

          // like data 

          $like_array = array();

          foreach ($blog_data as  $cmmtdata) {
            $dataArray1 = $this->BlogLike->find('count',array('conditions'=>array(
                                                                'BlogLike.blog_id'=>$cmmtdata['Blog']['id'],
                                                                'BlogLike.status'=>1)));

            $dataArray2 = $this->BlogLike->find('first',array('conditions'=>array(
                                                                'BlogLike.blog_id'=>$cmmtdata['Blog']['id'],
                                                                'BlogLike.status'=>1,
                                                                'BlogLike.user_id'=>$user_id),
                                                                'fields'=>array('BlogLike.status'))); 
                                                                                                                      
            $like_array[$cmmtdata['Blog']['id']]['value'] = $dataArray1;
            $like_array[$cmmtdata['Blog']['id']]['status'] = $dataArray2;
          } 

          // report data 

          $report_array = array(); 

          foreach ($blog_data as  $reportdata){
              $dataArray1 = $this->BlogReport->find('count',array('conditions'=>array(
                                                                  'BlogReport.blog_id'=>$reportdata['Blog']['id'],
                                                                  'BlogReport.status'=>1)));
              $dataArray2 = $this->BlogReport->find('first',array('conditions'=>array(
                                                                  'BlogReport.blog_id'=>$reportdata['Blog']['id'],
                                                                  'BlogReport.status'=>1,
                                                                  'BlogReport.user_id'=>$user_id),
                                                                  'fields'=>array('BlogReport.status'))); 
              $report_array[$reportdata['Blog']['id']]['value'] =  $dataArray1;
              $report_array[$reportdata['Blog']['id']]['status'] = $dataArray2;
              
          } 

  }

    if(!empty($blog_data)){

          $result_string.='';
           $result_string.='<div class="">&nbsp;</div> ';

            foreach ($blog_data as $value){
                
                   $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 blog_background_design">
                    <div class="">&nbsp;</div>   
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r">
                        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 padd_l_r cat_pro_pic_blog">
                            <center>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">';
                                  $user_pic = $value['userdata']['profile_image'];
                                    if(empty($user_pic)){ 
                                      $result_string.='<img class="img-thumbnail" src="'.HTTP_ROOT.'/img/connect/dummy/pic.png" alt="img not found">';
                                                 }else{
                                                
                                                $user_pic1 = substr($user_pic,0,4); if($user_pic1 == 'http'){ 
                                                  $result_string.='<img class="img-thumbnail" src="'.$value['userdata']['profile_image'].'" alt="img not found">';
                                                  }else{ 

                                                  if( $value['userdata']['user_type_id'] == 1 ){ 

                                                      $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Vendor/profile/'.$value['userdata']['profile_image'].'" alt="img not found">';

                                                  }else{ 
                                                  
                                                      $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Buyer/profile/'.$value['userdata']['profile_image'].'" alt="img not found">';
                                                 
                                                  } 

                                                
                                      } } 
                                $result_string.='</div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <i class="fa fa-user coont_box2_icon121" aria-hidden="true"></i>
                                    <span class="coont_box2_icon">
                                      '.$value['userdata']['first_name'].'
                                    </span>    
                                </div>
                            </center>    
                        </div>
                        <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 padd_l_r">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r">
                                <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">   
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r">
                                        <span class="connt_flex_middle_bdr12" style="color:#0f0f0f;text-transform: capitalize;">
                                            <b>'.$value['Blog']['blog_title'].'</b>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 padd_l_r" style="float:left;">
                              
                                </div>
                                <div class="col-xs-12 col-sm-11 col-md-12 col-lg-11 pdd_top21">
                                    <span class="connt_flex_middle_bdr123" style="color:#5b595c;">
                                        '.$value['Blog']['blog_description'].'
                                    </span>
                                </div>    
                            </div>        
                        </div>   
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r">
                            <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2 padd_l_r">  
                               
                            </div>';
                            if(!empty($user_id)){ 

                              if($user_type == 1){ 

                                     $result_string.='<div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 padd_l_r">
                                    <div id="change_like_count_'.$value['Blog']['id'].'" class="col-xs-12 col-sm-2 col-md-2 col-lg-1 padd_l_r" style="pointer-events: none;" onclick="get_blog_like_id('.$value['Blog']['id'].');">';
                                        if($like_array[$value['Blog']['id']]['status']['BlogLike']['status'] == 1){ 
                                              $result_string.='<i style="color:#2bcdc1" class="fa fa-thumbs-up coont_box2_icon121" aria-hidden="true"></i>';
                                            }else{ 
                                              $result_string.='<i class="fa fa-thumbs-up coont_box2_icon121" aria-hidden="true"></i>';        
                                            }  
                                                      
                                              $result_string.='<span class="coont_box2_icon">';       
                                                if(isset($like_array[$value['Blog']['id']]['value'])){
                                                
                                                   $result_string.=''.$like_array[$value['Blog']['id']]['value'].'';
                                                
                                                }else{
                                                
                                                   $result_string.=' 0 ';
                                                
                                                }  
                                        $result_string.='</span>
                                    </div>   
                                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 padd_l_r">
                                        <i class="fa fa-clock-o coont_box2_icon121" aria-hidden="true"></i>
                                        <span class="coont_box2_icon">
                                          '.date('d M Y', $value['Blog']['add_date']).'
                                        </span>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2 padd_l_r" id="ajxa_attch_'.$value['Blog']['id'].'" onclick="shwdiv('.$value['Blog']['id'].')" style="cursor:pointer">
                                        <i class="fa fa-comments coont_box2_icon121" aria-hidden="true"></i>
                                        <span class="coont_box2_icon">';
                                            if(isset($comment_array[$value['Blog']['id']])){
                                                        
                                                           $result_string.=''.$comment_array[$value['Blog']['id']].'';
                                                        
                                                        }else{
                                                        
                                                           $result_string.=' 0 ';
                                                        
                                                        }  
                                                      
                                                      $result_string.=' COMMENTS
                                        </span>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 padd_l_r" id="report_check_'.$value['Blog']['id'].'" onclick="report_blog('.$value['Blog']['id'].')" 
                                            style="pointer-events:none;">';
                                        if($report_array[$value['Blog']['id']]['status']['BlogReport']['status'] == 1){ 
                                              $result_string.='<i style="color:#2bcdc1" class="fa fa-file-text coont_box2_icon121" aria-hidden="true"></i>';
                                            }else{  
                                              $result_string.='<i class="fa fa-file-text coont_box2_icon121" aria-hidden="true"></i>';
                                            } 
                                            $result_string.='<span class="coont_box2_icon">';
                                              if(isset($report_array[$value['Blog']['id']]['value'])){
                                                        
                                                           $result_string.=''.$report_array[$value['Blog']['id']]['value'].'';
                                                        
                                                        }else{
                                                        
                                                           $result_string.=' 0 ';
                                                        
                                                        }

                                                       $result_string.=' Report
                                              </span>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 connt_flex_middle_bdr" style="display:none;" id="comment'.$value['Blog']['id'].'">
                                    </div>
                                </div>';

                                  }else{ 

                                  $result_string.='<div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 padd_l_r">
                                        <div id="change_like_count_'.$value['Blog']['id'].'" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 padd_l_r" onclick="get_blog_like_id('.$value['Blog']['id'].');">';
                                            if($like_array[$value['Blog']['id']]['status']['BlogLike']['status'] == 1){ 
                                              $result_string.='<i style="color:#2bcdc1" class="fa fa-thumbs-up coont_box2_icon121" aria-hidden="true"></i>';
                                            }else{ 
                                              $result_string.='<i class="fa fa-thumbs-up coont_box2_icon121" aria-hidden="true"></i>';        
                                            }  
                                                      
                                              $result_string.='<span class="coont_box2_icon">';       
                                                if(isset($like_array[$value['Blog']['id']]['value'])){
                                                
                                                   $result_string.=''.$like_array[$value['Blog']['id']]['value'].'';
                                                
                                                }else{
                                                
                                                   $result_string.=' 0 ';
                                                
                                                }  
                                              $result_string.='</span>
                                        </div>   

                                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 padd_l_r">
                                            <i class="fa fa-clock-o coont_box2_icon121" aria-hidden="true"></i>
                                            <span class="coont_box2_icon">
                                                '.date('d M Y', $value['Blog']['add_date']).'
                                            </span>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 padd_l_r" id="ajxa_attch_'.$value['Blog']['id'].'" onclick="shwdiv('.$value['Blog']['id'].')" style="cursor:pointer">
                                            <i class="fa fa-comments coont_box2_icon121" aria-hidden="true"></i>
                                            <span class="coont_box2_icon">';
                                               if(isset($comment_array[$value['Blog']['id']])){
                                                        
                                                           $result_string.=''.$comment_array[$value['Blog']['id']].'';
                                                        
                                                        }else{
                                                        
                                                           $result_string.=' 0 ';
                                                        
                                                        }  
                                                      
                                                      $result_string.=' COMMENTS
                                            </span>
                                        </div>
                                        
                                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 padd_l_r" id="report_check_'.$value['Blog']['id'].'" onclick="report_blog('.$value['Blog']['id'].')" style="cursor:pointer">';
                                            if($report_array[$value['Blog']['id']]['status']['BlogReport']['status'] == 1){ 
                                              $result_string.='<i style="color:#2bcdc1" class="fa fa-file-text coont_box2_icon121" aria-hidden="true"></i>';
                                            }else{  
                                              $result_string.='<i class="fa fa-file-text coont_box2_icon121" aria-hidden="true"></i>';
                                            } 
                                            $result_string.='<span class="coont_box2_icon">';
                                              if(isset($report_array[$value['Blog']['id']]['value'])){
                                                        
                                                           $result_string.=''.$report_array[$value['Blog']['id']]['value'].'';
                                                        
                                                        }else{
                                                        
                                                           $result_string.=' 0 ';
                                                        
                                                        }

                                                       $result_string.=' Report
                                              </span>
                                        </div>
                                    </div>';  
                                 } }else{ 

                                $result_string.='<div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 padd_l_r">
                                    <div id="change_like_count_'.$value['Blog']['id'].'" class="col-xs-12 col-sm-2 col-md-2 col-lg-1 padd_l_r" style="pointer-events: none;" onclick="get_blog_like_id('.$value['Blog']['id'].');">';
                                        if($like_array[$value['Blog']['id']]['status']['BlogLike']['status'] == 1){ 
                                              $result_string.='<i style="color:#2bcdc1" class="fa fa-thumbs-up coont_box2_icon121" aria-hidden="true"></i>';
                                            }else{ 
                                              $result_string.='<i class="fa fa-thumbs-up coont_box2_icon121" aria-hidden="true"></i>';        
                                            }  
                                                      
                                              $result_string.='<span class="coont_box2_icon">';       
                                                if(isset($like_array[$value['Blog']['id']]['value'])){
                                                
                                                   $result_string.=''.$like_array[$value['Blog']['id']]['value'].'';
                                                
                                                }else{
                                                
                                                   $result_string.=' 0 ';
                                                
                                                }  
                                        $result_string.='</span>
                                    </div>   
                                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 padd_l_r">
                                        <i class="fa fa-clock-o coont_box2_icon121" aria-hidden="true"></i>
                                        <span class="coont_box2_icon">
                                          '.date('d M Y', $value['Blog']['add_date']).'
                                        </span>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2 padd_l_r" id="ajxa_attch_'.$value['Blog']['id'].'" onclick="shwdiv('.$value['Blog']['id'].')" style="cursor:pointer">
                                        <i class="fa fa-comments coont_box2_icon121" aria-hidden="true"></i>
                                        <span class="coont_box2_icon">';
                                            if(isset($comment_array[$value['Blog']['id']])){
                                                        
                                                           $result_string.=''.$comment_array[$value['Blog']['id']].'';
                                                        
                                                        }else{
                                                        
                                                           $result_string.=' 0 ';
                                                        
                                                        }  
                                                      
                                                      $result_string.=' COMMENTS
                                        </span>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 padd_l_r" id="report_check_'.$value['Blog']['id'].'" onclick="report_blog('.$value['Blog']['id'].')" 
                                            style="pointer-events:none;">';
                                        if($report_array[$value['Blog']['id']]['status']['BlogReport']['status'] == 1){ 
                                              $result_string.='<i style="color:#2bcdc1" class="fa fa-file-text coont_box2_icon121" aria-hidden="true"></i>';
                                            }else{  
                                              $result_string.='<i class="fa fa-file-text coont_box2_icon121" aria-hidden="true"></i>';
                                            } 
                                            $result_string.='<span class="coont_box2_icon">';
                                              if(isset($report_array[$value['Blog']['id']]['value'])){
                                                        
                                                           $result_string.=''.$report_array[$value['Blog']['id']]['value'].'';
                                                        
                                                        }else{
                                                        
                                                           $result_string.=' 0 ';
                                                        
                                                        }

                                                       $result_string.=' Report
                                              </span>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 connt_flex_middle_bdr" style="display:none;" id="comment'.$value['Blog']['id'].'">
                                    </div>
                                </div>';
                            } 
                    $result_string.='</div>
                    <div class="">&nbsp;</div>
                </div>
                <div style="background-color:white;">&nbsp;</div>';      
            }   
            print_r($result_string);die;          
                   
    }else{
     
      $result_string.='';
      $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                        <center>
                           <span class="connt_flex_middle_text" style="text-align:center;">Blog does not exist!</span>
                        </center>
                      </div>';
      print_r($result_string);die;                

    }
  }

  public function BlogCommt(){

    $this->autoRender = false;
    $blog_id1 = $_POST['userid'];
    $blog_id = $this->Blog->find('all',array(
                                    'fields'=>'Blog.id',
                                    'conditions'=>array(
                                    'Blog.segment_id'=>1,
                                    'Blog.status'=>1)));
    $like_array = array();
    
      foreach ($blog_id as $datas) {
      
        $dataArray = $this->BlogComment->find('count',array('conditions'=>array(
                                                            'BlogComment.blog_id'=>$datas['Blog']['id'],
                                                            'BlogComment.status'=>1)));
          

        $like_array[$datas['Blog']['id']] = $dataArray;


      }

    $blog_data = $this->BlogComment->find('all',array(
                                               'fields' => 'BlogComment.*,userdata.*',
                                               'joins'=>
                                                        array(
                                                          array(
                                                             'table'  =>'user_masters',  
                                                             'alias'  =>'userdata',
                                                             'conditions'=>array(
                                                                    'userdata.id=BlogComment.user_id',
                                                             )                  
                                                          ),            
                                                        ),
                                                  'conditions'   =>array(
                                                  'BlogComment.blog_id' =>$blog_id1,
                                                  'BlogComment.status'  =>1 ),      
                                                    ));
    
      $user_id  =  $user['id'];

      $dataArray12 = $this->BlogComment->find('count',array('conditions'=>array(
                                                            'BlogComment.blog_id'=>$blog_id1,
                                                            'BlogComment.status'=>1)));

      $result_string.='';

      $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" 
                                 id="comment'.$blog_id1.'">
                                <div class="">&nbsp;</div>
                                <div class="">&nbsp;</div>    
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <span class="connt_flex_middle_bdr12" style="color:#0f0f0f">
                                          '.$dataArray12.'
                                          Comments 
                                        </span>
                                    </div>
                                    <div class="">&nbsp;</div>
                                    <div class="">&nbsp;</div>';  
                            
                            if(empty($user_id)) { 
                                
                                $result_string.='<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pull-left" style="display:none;">
                                    <div class="form-group">
                                       <input type="text" class="form-control" placeholder="Add a Comment">
                                    </div>    
                                </div>';
                            
                              }else{ 
                                
                                $result_string.='<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 pull-left">
                                    <div class="form-group">
                                       <input type="text" class="form-control" placeholder="Add a Comment">
                                    </div>    
                                </div>';
                            
                             }            

                        $j=0;  foreach ($blog_data as $value) {
                           
                                  if($j%2 == 0 ){ 

                                        $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-left comm_box2_chat_box">
                                            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 cmmt_box_de">';
                                                
                                                  $user_pic = $value['userdata']['profile_image'];
                                                  $user_pic1 = substr($user_pic,0,4);

                                                 if($user_pic1 == 'http'){ 

                                                       $result_string.='<img src="'.$value['userdata']['profile_image'].'" alt="img not found">';

                                                   }else{ 


                                                        if( $value['userdata']['user_type_id'] == 1 ){ 

                                                          $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Vendor/profile/'.$value['userdata']['profile_image'].'" alt="img not found">';

                                                          }else{ 
                                                          
                                                            $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Buyer/profile/'.$value['userdata']['profile_image'].'" alt="img not found">';
                                                         
                                                          } 

                                                   
                                                   } 

                                            $result_string.='</div>   
                                            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 padd_l_r">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r" style="padding-top:15px;">
                                                    <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;padding-top:30px;padding-right:5px;">
                                                       '.$value['userdata']['first_name'].'-
                                                    </span>
                                                    <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;padding-right:5px;">
                                                     on '.$today = date("F j, Y, g:i a",$value['BlogComment']['modify_date']).'
                                                    </span>
                                                </div> 
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r" style="padding-top:15px;">
                                                    <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;">
                                                        '.$value['BlogComment']['comment'].'
                                                    </span>
                                                </div>    
                                            </div>     
                                        </div>';

                                     }else{ 

                                        $result_string.='<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 pull-right comm_box2_chat_box" style="background-color:white;">
                                            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 cmmt_box_de">';
                                                 $user_pic = $value['userdata']['profile_image'];
                                                  $user_pic1 = substr($user_pic,0,4);

                                                 if($user_pic1 == 'http'){ 

                                                       $result_string.='<img src="'.$value['userdata']['profile_image'].'" alt="img not found">';

                                                   }else{ 

                                                    if( $value['userdata']['user_type_id'] == 1 ){ 

                                                      $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Vendor/profile/'.$value['userdata']['profile_image'].'" alt="img not found">';

                                                    }else{ 
                                                        
                                                      $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Buyer/profile/'.$value['userdata']['profile_image'].'" alt="img not found">';
                                                       
                                                    } 

                                                   } 
                                            $result_string.='</div>   
                                            <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 padd_l_r">
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r" style="padding-top:15px;">
                                                    <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;padding-top:30px;">
                                                       '.$value['userdata']['first_name'].'-
                                                    </span>
                                                    <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;padding-right:5px;">
                                                      on May 19,2016 at 12.34 am 
                                                    </span>
                                                    
                                                </div> 
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r" style="padding-top:15px;">
                                                    <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;">
                                                        '.$value['BlogComment']['comment'].'
                                                    </span>
                                                </div>    
                                            </div> 
                                        </div>  '; 

                                   } 
                                 $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">&nbsp;</div>';   
                        $j++;    }  

    print_r($result_string);die;   

  } 

 public function findlocality(){

    $this->autoRender = false;
    $city_id = $this->request->data['city_id'];
    $locality = $this->Locality->find('all', array(
                                          'conditions' => array(
                                          'Locality.city_id' => $city_id,
                                          )));

    if(empty($locality)){

      $stateString = '<option value="0"> No data exist </option>'; 
      print_r($stateString);die;  

    }else{

       $stateString = '<option value="0">Select Locality</option>'; 
        foreach ($locality as $state) {
            
            $stateString .= '<option value="'.$state['Locality']['id'].'">'.$state['Locality']['name'].'</option>';
       
        }
       print_r($stateString);die;   

    }
 }  


  public function updateCatgory(){

    $this->autoRender = false;

    $city_id        = $_POST['city_id'];
    $locality_id    = $_POST['locaity'];
    $user_id        = $_POST['userid'];

    $city_name      = $city_datas['City']['name'];
    
    $locality_name  = $locality_data['Locality']['name'];

    $category_ids   = $_POST['all_cat_ids'];

    $user_ip        = getenv('REMOTE_ADDR');
    $modify_date    = time();
    $address        = ''.$locality_name.','.$city_name.',India';

    $result  = $this->UserMaster->updateAll(
                                  array('UserMaster.category_id'  => "'$category_ids'",
                                        'UserMaster.modify_date'  => $modify_date),
                                  array('UserMaster.id' => $user_id));

    $category_ids_data = explode(',',$category_ids);

    for($i=0;$i<count($category_ids_data);$i++){



      $chech_data = $this->UserSegment->find('first',array('conditions'=>array(
                                                          'UserSegment.category_id'=>$category_ids_data[$i],
                                                          'UserSegment.user_id'=>$user_id)));

    
      if(empty($chech_data)){

        $cat_wise_seg = $this->ClassSegment->find('all',array('conditions'=>array(
                                                              'ClassSegment.category_id'=>$category_ids_data[$i],
                                                              'ClassSegment.status'=>1)));
        
        for($j=0;$j<count($cat_wise_seg);$j++){

            $user_seg_array = array();

            $user_seg_array['user_id']      = $user_id;
            $user_seg_array['category_id']  = $category_ids_data[$i];
            $user_seg_array['segment_id']   = $cat_wise_seg[$j]['ClassSegment']['id'];
            $user_seg_array['status']       = 0;
            $user_seg_array['add_date']     = time();
            $user_seg_array['modify_date']  = time();

            $this->UserSegment->create();
            $this->UserSegment->save($user_seg_array);

        }

      }

    }



   if(isset($result)){
    
      $all_page_data = array();

//**************************************** Category Data ****************************************   
  
      $category_id   = explode(',',$category_ids);
      $category_data = $this->Category->find('all',array('conditions'=>array(
                                                               'Category.status'=>1,
                                                               'Category.id'=>$category_id))); 

      $result_string1.='';
      $result_string1.='<div class="">&nbsp;</div>';

      foreach ($category_data as $data){ 

        $result_string1.='<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 cat_img_cnnt" id="'.$data['Category']['id'].'" style="cursor:pointer;" onclick="getcatid('.$data['Category']['id'].');">
                              <center class="cat_image" id="res'.$data['Category']['id'].'">
                                  <img class="image-responsive img-circle" src="'.HTTP_ROOT.'/img/category_image/'.$data['Category']['category_image'].'" alt="img not found">
                              </center>
                              <div class="hidden-xs hidden-sm hidden-md">&nbsp;</div>    
                              <center>
                                  <span class="connt_flex_middle_text">
                                      '.$data['Category']['category_name'].'
                                  </span>
                              </center>
                              <div class="">&nbsp;</div>             
                          </div>';
        } 
      
//**************************************** Segment Data ********************************************  

      $segment_data   =  $this->ClassSegment->find('all',array('conditions' => array(
                                            'ClassSegment.status'=>1,
                                            'ClassSegment.category_id'=>$category_id,
                                          ),
                                        'fields' => array('ClassSegment.*'))); 


      $result_string2.='';
                  
          foreach($segment_data as $data1){

                $result_string2.='<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4" id="'.$data1['ClassSegment']['id'].'" style="margin-top:25px;cursor:pointer;" onclick="getsemid('.$data1['ClassSegment']['id'].');" >
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r segmt_img">
                        <center>';
                           if(empty($data1['ClassSegment']['segment_image'])){ 
                                $result_string2.='<img class="image-responsive" src="'.HTTP_ROOT.'/img/connect/noimage.jpg" alt="img not found">';
                             }else{  
                                $result_string2.='<img class="image-responsive" style="width:100%;" src="'.HTTP_ROOT.'/img/segment_image/'.$data1['ClassSegment']['segment_image'].'" alt="img not found">';
                             } 
                        $result_string2.='</center>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 semgt_connt_bdr2" id="segt'.$data1['ClassSegment']['id'].'">
                        <center>
                            <span class="connt_flex_middle_text" id="segt_text'.$data1['ClassSegment']['id'].'">
                                 '.$data1['ClassSegment']['segment_name'].'
                            </span>
                        </center>
                    </div>           
                  </div>';
          }

//**************************************** Blog Data ****************************************        

           $segmentids_array = array();

            foreach ($segment_data as $value1) {
              $segmentids_array[]  = $value1['ClassSegment']['id'];
            }
        

          if(!empty($city_id) && !empty($locality_id)){

            $blog_data = $this->Blog->find('all',array(
                        'fields' => 'Blog.*,userdata.*,bloglike.*',
                        'conditions' => array(  
                        'Blog.status'=>1,
                        'Blog.segment_id'=>$segmentids_array,
                        'Blog.city_id'=>$city_id,
                        'Blog.locality_id'=>$locality_id),
                        'joins'=>
                            array(
                              array(
                                 'table'  =>'user_masters',  
                                 'alias'  =>'userdata',
                                 'type' =>'left',
                                 'conditions'=>array('userdata.id=Blog.user_id')                  
                              ),
                              array(
                                 'table'  =>'bg_blog_likes',  
                                 'alias'  =>'bloglike',
                                 'type' =>'left',
                                 'conditions' => array('Blog.id = bloglike.blog_id',
                                                       'bloglike.user_id'=>$user_id)            
                              ),            
                        ),
            ));
          }

          if(!empty($city_id) && empty($locality_id)){

            $blog_data = $this->Blog->find('all',array(
                        'fields' => 'Blog.*,userdata.*,bloglike.*',
                        'conditions' => array(  
                        'Blog.status'=>1,
                        'Blog.segment_id'=>$segmentids_array,
                        'Blog.city_id'=>$city_id),
                        'joins'=>
                            array(
                              array(
                                 'table'  =>'user_masters',  
                                 'alias'  =>'userdata',
                                 'type' =>'left',
                                 'conditions'=>array('userdata.id=Blog.user_id')                  
                              ),
                              array(
                                 'table'  =>'bg_blog_likes',  
                                 'alias'  =>'bloglike',
                                 'type' =>'left',
                                 'conditions' => array('Blog.id = bloglike.blog_id',
                                                       'bloglike.user_id'=>$user_id)            
                              ),            
                        ),
            ));
         
          }

          if(empty($city_id) && !empty($locality_id) ){

            $blog_data = $this->Blog->find('all',array(
                        'fields' => 'Blog.*,userdata.*,bloglike.*',
                        'conditions' => array(  
                        'Blog.status'=>1,
                        'Blog.segment_id'=>$segmentids_array,
                        'Blog.locality_id'=>$locality_id),
                        'joins'=>
                            array(
                              array(
                                 'table'  =>'user_masters',  
                                 'alias'  =>'userdata',
                                 'type' =>'left',
                                 'conditions'=>array('userdata.id=Blog.user_id')                  
                              ),
                              array(
                                 'table'  =>'bg_blog_likes',  
                                 'alias'  =>'bloglike',
                                 'type' =>'left',
                                 'conditions' => array('Blog.id = bloglike.blog_id',
                                                       'bloglike.user_id'=>$user_id)            
                              ),            
                        ),
            ));
          }

          if(empty($city_id) && empty($locality_id) ){

            $blog_data = $this->Blog->find('all',array(
                        'fields' => 'Blog.*,userdata.*,bloglike.*',
                        'conditions' => array(  
                        'Blog.status'=>1,
                        'Blog.segment_id'=>$segmentids_array),
                        'joins'=>
                            array(
                              array(
                                 'table'  =>'user_masters',  
                                 'alias'  =>'userdata',
                                 'type' =>'left',
                                 'conditions'=>array('userdata.id=Blog.user_id')                  
                              ),
                              array(
                                 'table'  =>'bg_blog_likes',  
                                 'alias'  =>'bloglike',
                                 'type' =>'left',
                                 'conditions' => array('Blog.id = bloglike.blog_id',
                                                       'bloglike.user_id'=>$user_id)            
                              ),            
                        ),
                ));
          }
        
    // comment data 
    
      $comment_array = array(); 
      
      foreach ($blog_data as $datas){

        $dataArray = $this->BlogComment->find('count',array('conditions'=>array(
                                                            'BlogComment.blog_id'=>$datas['Blog']['id'],
                                                            'BlogComment.status'=>1)));
        $comment_array[$datas['Blog']['id']] = $dataArray;
      }

      // like data 

      $like_array = array();

      foreach ($blog_data as  $cmmtdata) {

        $dataArray1 = $this->BlogLike->find('count',array('conditions'=>array(
                                                            'BlogLike.blog_id'=>$cmmtdata['Blog']['id'],
                                                            'BlogLike.status'=>1)));

        $dataArray2 = $this->BlogLike->find('first',array('conditions'=>array(
                                                            'BlogLike.blog_id'=>$cmmtdata['Blog']['id'],
                                                            'BlogLike.status'=>1,
                                                            'BlogLike.user_id'=>$user_id),
                                                            'fields'=>array('BlogLike.status'))); 
                                                                                                                  
        $like_array[$cmmtdata['Blog']['id']]['value'] = $dataArray1;
        $like_array[$cmmtdata['Blog']['id']]['status'] = $dataArray2;
      } 

      // report data 

      $report_array = array(); 

      foreach ($blog_data as  $reportdata){

        $dataArray1 = $this->BlogReport->find('count',array('conditions'=>array(
                                                            'BlogReport.blog_id'=>$reportdata['Blog']['id'],
                                                            'BlogReport.status'=>1)));
        $dataArray2 = $this->BlogReport->find('first',array('conditions'=>array(
                                                            'BlogReport.blog_id'=>$reportdata['Blog']['id'],
                                                            'BlogReport.status'=>1,
                                                            'BlogReport.user_id'=>$user_id),
                                                            'fields'=>array('BlogReport.status'))); 
        $report_array[$reportdata['Blog']['id']]['value'] =  $dataArray1;
        $report_array[$reportdata['Blog']['id']]['status'] = $dataArray2;
      
      } 

      if(!empty($blog_data)){

          $result_string3.='';

            foreach ($blog_data as $value){
                $result_string3.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 blog_background_design">    
                        <div class="">&nbsp;</div>   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 padd_l_r cat_pro_pic_blog">';
                                 
                              $user_pic = $value['userdata']['profile_image'];
                                  if(empty($user_pic)){ 
                                      $result_string3.='<img class="img-thumbnail" src="'.HTTP_ROOT.'/img/connect/dummy/pic.png" alt="img not found">';
                                      }else{
                                      $user_pic1 = substr($user_pic,0,4);
                                      if($user_pic1 == 'http'){ 
                                          $result_string3.='<img class="img-thumbnail" src="'.$value['userdata']['profile_image'].'" alt="img not found">';
                                       }else{ 
                                        
                                        if( $value['userdata']['user_type_id'] == 1 ){ 

                                          $result_string3.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Vendor/profile/'.$value['userdata']['profile_image'].'" alt="img not found">';

                                        }else{ 
                                        
                                          $result_string3.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Buyer/profile/'.$value['userdata']['profile_image'].'" alt="img not found">';
                                       
                                        } 

                               } } 
                            $result_string3.='</div>
                            <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 padd_l_r">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r">
                                    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 padd_l_r">   
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                                            <span class="connt_flex_middle_bdr12" style="color:#0f0f0f;text-transform: capitalize;">
                                                <b>'.$value['Blog']['blog_title'].'</b>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 padd_l_r" style="float:left;">
                                        
                                    </div>
                                    <div class="col-xs-12 col-sm-11 col-md-12 col-lg-11 pdd_top21">
                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;">
                                            '.$value['Blog']['blog_description'].'
                                        </span>
                                    </div>    
                                </div>        
                            </div>   
                        </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                                <div class="col-xs-12 col-sm-3 col-md-5 col-lg-5 padd_l_r">  
                                    <i class="fa fa-user coont_box2_icon121" aria-hidden="true"></i>
                                    <span class="coont_box2_icon">
                                      '.$value['userdata']['first_name'].'
                                    </span>    
                                </div>';
                                  
                                  if(!empty($user_id)){ 

                                      if($user_type == 1){

                                            $result_string3.='<div class="col-xs-12 col-sm-9 col-md-7 col-lg-7 padd_l_r" style=" pointer-events: none;">
                                                    <div id="change_like_count_'.$value['Blog']['id'].'" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 padd_l_r" onclick="get_blog_like_id('.$value['Blog']['id'].');">';
                              
                                                     if($like_array[$value['Blog']['id']]['status']['BlogLike']['status'] == 1){ 

                                                      $result_string3.='<i style="color:#2bcdc1" class="fa fa-thumbs-up coont_box2_icon121" aria-hidden="true"></i>';
                                                    
                                                      }else{ 

                                                      $result_string3.='<i class="fa fa-thumbs-up coont_box2_icon121" aria-hidden="true"></i>';
                                                     
                                                      }  
                                                      
                                                      $result_string3.='<span class="coont_box2_icon">';
                                                        
                                                        if(isset($like_array[$value['Blog']['id']]['value'])){
                                                        
                                                           $result_string3.=''.$like_array[$value['Blog']['id']]['value'].'';
                                                        
                                                        }else{
                                                        
                                                           $result_string3.=' 0 ';
                                                        
                                                        }  
                                                    $result_string3.='</span>
                                                </div>   

                                                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 padd_l_r">
                                                    <i class="fa fa-clock-o coont_box2_icon121" aria-hidden="true"></i>
                                                    <span class="coont_box2_icon">
                                                        '.date('d M Y', $value['Blog']['add_date']).'
                                                    </span>
                                                </div>
                                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 padd_l_r" id="ajxa_attch_'.$value['Blog']['id'].'" onclick="shwdiv('.$value['Blog']['id'].')" style="cursor:pointer">
                                                    <i class="fa fa-comments coont_box2_icon121" aria-hidden="true"></i>
                                                    <span class="coont_box2_icon">';

                                                        if(isset($comment_array[$value['Blog']['id']])){
                                                        
                                                           $result_string3.=''.$comment_array[$value['Blog']['id']].'';
                                                        
                                                        }else{
                                                        
                                                           $result_string3.=' 0 ';
                                                        
                                                        }  
                                                      
                                                      $result_string3.=' COMMENTS
                                                    </span>
                                                </div>
                                                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 padd_l_r" id="report_check_'.$value['Blog']['id'].'" onclick="report_blog('.$value['Blog']['id'].')" style="cursor:pointer">';
                                                    if($report_array[$value['Blog']['id']]['status']['BlogReport']['status'] == 1){ 

                                                        $result_string3.='<i style="color:#2bcdc1" class="fa fa-file-text coont_box2_icon121" aria-hidden="true"></i>';
                                                      
                                                      }else{ 
                                                      
                                                      $result_string3.='<i class="fa fa-file-text coont_box2_icon121" aria-hidden="true"></i>';
                                                   } 
                                                    $result_string3.='<span class="coont_box2_icon">';

                                                        if(isset($report_array[$value['Blog']['id']]['value'])){
                                                        
                                                           $result_string3.=''.$report_array[$value['Blog']['id']]['value'].'';
                                                        
                                                        }else{
                                                        
                                                           $result_string3.=' 0 ';
                                                        
                                                        }

                                                       $result_string3.=' Report
                                                    </span>
                                                </div>
                                        </div>';


                                      
                                     }else{

                                        $result_string3.='<div class="col-xs-12 col-sm-9 col-md-7 col-lg-7 padd_l_r">
                                                    <div id="change_like_count_'.$value['Blog']['id'].'" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 padd_l_r" onclick="get_blog_like_id('.$value['Blog']['id'].');">';
                              
                                                     if($like_array[$value['Blog']['id']]['status']['BlogLike']['status'] == 1){ 

                                                      $result_string3.='<i style="color:#2bcdc1" class="fa fa-thumbs-up coont_box2_icon121" aria-hidden="true"></i>';
                                                    
                                                      }else{ 

                                                      $result_string3.='<i class="fa fa-thumbs-up coont_box2_icon121" aria-hidden="true"></i>';
                                                     
                                                      }  
                                                      
                                                      $result_string3.='<span class="coont_box2_icon">';
                                                        
                                                        if(isset($like_array[$value['Blog']['id']]['value'])){
                                                        
                                                           $result_string3.=''.$like_array[$value['Blog']['id']]['value'].'';
                                                        
                                                        }else{
                                                        
                                                           $result_string3.=' 0 ';
                                                        
                                                        }  
                                                    $result_string3.='</span>
                                                </div>   

                                                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 padd_l_r">
                                                    <i class="fa fa-clock-o coont_box2_icon121" aria-hidden="true"></i>
                                                    <span class="coont_box2_icon">
                                                        '.date('d M Y', $value['Blog']['add_date']).'
                                                    </span>
                                                </div>
                                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 padd_l_r" id="ajxa_attch_'.$value['Blog']['id'].'" onclick="shwdiv('.$value['Blog']['id'].')" style="cursor:pointer">
                                                    <i class="fa fa-comments coont_box2_icon121" aria-hidden="true"></i>
                                                    <span class="coont_box2_icon">';

                                                        if(isset($comment_array[$value['Blog']['id']])){
                                                        
                                                           $result_string3.=''.$comment_array[$value['Blog']['id']].'';
                                                        
                                                        }else{
                                                        
                                                           $result_string3.=' 0 ';
                                                        
                                                        }  
                                                      
                                                      $result_string3.=' COMMENTS
                                                    </span>
                                                </div>
                                                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 padd_l_r" id="report_check_'.$value['Blog']['id'].'" onclick="report_blog('.$value['Blog']['id'].')" style="cursor:pointer">';
                                                    if($report_array[$value['Blog']['id']]['status']['BlogReport']['status'] == 1){ 

                                                        $result_string3.='<i style="color:#2bcdc1" class="fa fa-file-text coont_box2_icon121" aria-hidden="true"></i>';
                                                      
                                                      }else{ 
                                                      
                                                      $result_string3.='<i class="fa fa-file-text coont_box2_icon121" aria-hidden="true"></i>';
                                                   } 
                                                    $result_string3.='<span class="coont_box2_icon">';

                                                        if(isset($report_array[$value['Blog']['id']]['value'])){
                                                        
                                                           $result_string3.=''.$report_array[$value['Blog']['id']]['value'].'';
                                                        
                                                        }else{
                                                        
                                                           $result_string3.=' 0 ';
                                                        
                                                        }

                                                       $result_string3.=' Report
                                                    </span>
                                                </div>
                                        </div>';

                                      }  
                              
                              }

                            $result_string3.='</div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 connt_flex_middle_bdr" 
                            style="display:none;"  id="comment'.$value['Blog']['id'].'">
                            <div class="">&nbsp;</div>
                            <div class="">&nbsp;</div>    
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <span class="connt_flex_middle_bdr12" style="color:#0f0f0f">';
                                        if(isset($comment_array[$value['Blog']['id']])){
                                               $result_string3.=''.$comment_array[$value['Blog']['id']].' ';
                                            }else{
                                               $result_string3.='0 ';
                                            }
                                        $result_string3.=' COMMENTS
                                    </span>
                                </div>
                                <div class="">&nbsp;</div>
                                <div class="">&nbsp;</div>     
                            </div>
                            <div class="">&nbsp;</div>
                        </div>
                        <div class="">&nbsp;</div>
                    </div>
                    <div style="background-color:white;">&nbsp;</div>';    
                 }   

            // print_r($result_string3);die;          
                   
      }else{
       
        $result_string3.='';
        $result_string3.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                          <center>
                             <span class="connt_flex_middle_text" style="text-align:center;">Blog does not exist!</span>
                          </center>
                        </div>';
        
        //print_r($result_string3);die;                

      }

// ************************************************* Post data ***********************************************************************

          $segmentids_array = array();

            foreach ($segment_data as $value1) {
              $segmentids_array[]  = $value1['ClassSegment']['id'];
            }
          
          if(!empty($city_id) && !empty($locality_id) ){

            $post_data = $this->Post->find('all',array(
                      'fields' => 'Post.*,userdata.*,postlike.*',
                      'conditions' => array(  
                      'Post.status'=>1,
                      'Post.segment_id'=>$segmentids_array,
                      'Post.city_id'=>$city_id,
                      'Post.locality_id'=>$locality_id),
                      'joins'=>
                          array(
                            array(
                               'table'  =>'user_masters',  
                               'alias'  =>'userdata',
                               'type' =>'left',
                               'conditions'=>array('userdata.id=Post.user_id')                  
                            ),
                            array(
                               'table'  =>'bg_post_likes',  
                               'alias'  =>'postlike',
                               'type' =>'left',
                               'conditions' => array('Post.id = postlike.post_id',
                                                     'postlike.user_id'=>$user_id)            
                            ),            
                      ),
            ));   
        
          }

          if(!empty($city_id) && empty($locality_id) ){
      
            $post_data = $this->Post->find('all',array(
                      'fields' => 'Post.*,userdata.*,postlike.*',
                      'conditions' => array(  
                      'Post.status'=>1,
                      'Post.segment_id'=>$segmentids_array,
                      'Post.city_id'=>$city_id),
                      'joins'=>
                          array(
                            array(
                               'table'  =>'user_masters',  
                               'alias'  =>'userdata',
                               'type' =>'left',
                               'conditions'=>array('userdata.id=Post.user_id')                  
                            ),
                            array(
                               'table'  =>'bg_post_likes',  
                               'alias'  =>'postlike',
                               'type' =>'left',
                               'conditions' => array('Post.id = postlike.post_id',
                                                     'postlike.user_id'=>$user_id)            
                            ),            
                      ),
            ));  

          }

          if(empty($city_id) && !empty($locality_id) ){

            $post_data = $this->Post->find('all',array(
                      'fields' => 'Post.*,userdata.*,postlike.*',
                      'conditions' => array(  
                      'Post.status'=>1,
                      'Post.segment_id'=>$segmentids_array,
                      'Post.locality_id'=>$locality_id),
                      'joins'=>
                          array(
                            array(
                               'table'  =>'user_masters',  
                               'alias'  =>'userdata',
                               'type' =>'left',
                               'conditions'=>array('userdata.id=Post.user_id')                  
                            ),
                            array(
                               'table'  =>'bg_post_likes',  
                               'alias'  =>'postlike',
                               'type' =>'left',
                               'conditions' => array('Post.id = postlike.post_id',
                                                     'postlike.user_id'=>$user_id)            
                            ),            
                      ),
            ));
          }

          if(empty($city_id) && empty($locality_id) ){

            $post_data = $this->Post->find('all',array(
                      'fields' => 'Post.*,userdata.*,postlike.*',
                      'conditions' => array(  
                      'Post.status'=>1,
                      'Post.segment_id'=>$segmentids_array),
                      'joins'=>
                          array(
                            array(
                               'table'  =>'user_masters',  
                               'alias'  =>'userdata',
                               'type' =>'left',
                               'conditions'=>array('userdata.id=Post.user_id')                  
                            ),
                            array(
                               'table'  =>'bg_post_likes',  
                               'alias'  =>'postlike',
                               'type' =>'left',
                               'conditions' => array('Post.id = postlike.post_id',
                                                     'postlike.user_id'=>$user_id)            
                            ),            
                      ),
              ));
          }


        $post_data = $this->Post->find('all',array(
                      'fields' => 'Post.*,userdata.*,postlike.*',
                      'conditions' => array(  
                      'Post.status'=>1,
                      'Post.segment_id'=>$segment_id),
                      'joins'=>
                          array(
                            array(
                               'table'  =>'user_masters',  
                               'alias'  =>'userdata',
                               'type' =>'left',
                               'conditions'=>array('userdata.id=Post.user_id')                  
                            ),
                            array(
                               'table'  =>'bg_post_likes',  
                               'alias'  =>'postlike',
                               'type' =>'left',
                               'conditions' => array('Post.id = postlike.post_id',
                                                     'postlike.user_id'=>$user_id)            
                            ),            
                      ),
          ));
        
         // post like data 

          $post_like_array = array();  

          foreach ($post_data as  $postdata) {
          
            $dataArray1 = $this->PostLike->find('count',array('conditions'=>array(
                                                                'PostLike.post_id'=>$postdata['Post']['id'],
                                                                'PostLike.status'=>1)));

            $dataArray2 = $this->PostLike->find('first',array('conditions'=>array(
                                                                'PostLike.post_id'=>$postdata['Post']['id'],
                                                                'PostLike.status'=>1,
                                                                'PostLike.user_id'=>$user_id),
                                                                'fields'=>array('PostLike.status'))); 
                                                                                                                      
            $post_like_array[$postdata['Post']['id']]['value'] = $dataArray1;
            $post_like_array[$postdata['Post']['id']]['status'] = $dataArray2;
          
          } 
          
          $this->set('post_like_array',$post_like_array); 

          // post commnet data 

          $post_commmt_array = array();

          foreach ($post_data as $datas){

            $dataArray = $this->PostComment->find('count',array('conditions'=>array(
                                                                'PostComment.post_id'=>$datas['Post']['id'],
                                                                'PostComment.status'=>1)));
            $post_commmt_array[$datas['Post']['id']] = $dataArray;
          }

        $this->set('post_commmt_array',$post_commmt_array); 

      if(!empty($post_data)){

        $result_string4.='';

          foreach($post_data as $value){  

                    $result_string4.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 blog_background_design">
                        <div class="">&nbsp;</div>   
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 padd_l_r cat_pro_pic_blog">';
                              
                                    $user_pic = $value['userdata']['profile_image'];
                                        if(empty($user_pic)){

                                          $result_string4.='<img class="img-thumbnail" src="'.HTTP_ROOT.'/img/connect/dummy/pic.png" alt="img not found">';
                                            }else{
                                          
                                            $user_pic1 = substr($user_pic,0,4);
                                          
                                            if($user_pic1 == 'http'){ 
                                                $result_string4.='<img class="img-thumbnail" src="'.$value['userdata']['profile_image'].'" alt="img not found">';
                                            }else{ 

                                           if( $value['userdata']['user_type_id'] == 1 ){ 

                                                $result_string4.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Vendor/profile/'.$value['userdata']['profile_image'].'" alt="img not found">';

                                              }else{ 
                                              
                                                $result_string4.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Buyer/profile/'.$value['userdata']['profile_image'].'" alt="img not found">';
                                             
                                              } 
                                 } }
                            $result_string4.='</div>
                            <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 padd_l_r">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r">
                                    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 padd_l_r">   
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                                            <span class="connt_flex_middle_bdr12" style="color:#0f0f0f;text-transform: capitalize;">
                                                <b>'.$value['Post']['post_title'].'</b>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 padd_l_r" style="float:left;">
                                  
                                    </div>
                                    <div class="col-xs-12 col-sm-11 col-md-12 col-lg-11 pdd_top21">
                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;">
                                            '.$value['Post']['post_description'].'
                                        </span>
                                    </div>    
                                </div>        
                            </div>   
                        </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                                <div class="col-xs-12 col-sm-3 col-md-5 col-lg-5 padd_l_r">  
                                    <i class="fa fa-user coont_box2_icon121" aria-hidden="true"></i>
                                    <span class="coont_box2_icon">
                                      '.$value['userdata']['first_name'].'
                                    </span>    
                                </div>';

                                if(!empty($user_id)){ 

                                  $result_string4.='<div class="col-xs-12 col-sm-9 col-md-7 col-lg-7 padd_l_r">
                                            <div id="post_change_like_count_'.$value['Post']['id'].'" class="col-xs-12 col-sm-4 col-md-4 col-lg-4 padd_l_r" onclick="get_post_like_id('.$value['Post']['id'].');">';
                                                    if($post_like_array[$value['Post']['id']]['status']['PostLike']['status'] == 1){ 
                                                        $result_string4.='<i style="color:#2bcdc1" class="fa fa-thumbs-up coont_box2_icon121" aria-hidden="true">
                                                        </i>';
                                                    }else{ 
                                                        $result_string4.='<i class="fa fa-thumbs-up coont_box2_icon121" aria-hidden="true"></i>';
                                                    }

                                                    $result_string4.='<span class="coont_box2_icon">';
                                                    
                                                    if(isset($post_like_array[$value['Post']['id']]['value'])){
                                                      $result_string4.=''.$post_like_array[$value['Post']['id']]['value'].'';
                                                    }else{
                                                       $result_string4.=' 0 ';
                                                    }

                                                    $result_string4.=' </span>                                                    
                                            </div>
                                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 padd_l_r">
                                                <i class="fa fa-clock-o coont_box2_icon121" aria-hidden="true"></i>
                                                <span class="coont_box2_icon">
                                                    '.date('d M Y', $value['Post']['add_date']).'
                                                </span>
                                            </div>
                                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 padd_l_r" id="post_ajxa_attch_'.$value['Post']['id'].'" onclick="postshwdiv('.$value['Post']['id'].')" style="cursor:pointer">
                                                <i class="fa fa-comments coont_box2_icon121" aria-hidden="true"></i>
                                                <span class="coont_box2_icon">';
                                                    if(isset($post_commmt_array[$value['Post']['id']])){
                                                      $result_string4.=''.$post_commmt_array[$value['Post']['id']].'';
                                                    }else{
                                                       $result_string4.=' 0 ';
                                                    }

                                                   $result_string4.='  COMMENTS
                                                </span>
                                            </div> 
                                    </div>';
                                 }   

                            $result_string4.='</div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 connt_flex_middle_bdr" style="display:none;" id="postcomment'.$value['Post']['id'].'">
                                
                            </div>
                        <div class="">&nbsp;</div>
                    </div>
                    <div style="background-color:white;">&nbsp;</div>';    
          }   
                            
    }else{
     
      $result_string4.='';
      $result_string4.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                        <center>
                           <span class="connt_flex_middle_text" style="text-align:center;">Post does not exist!</span>
                        </center>
                      </div>';
                
    }

    $all_page_data[0] = $result_string1;
    $all_page_data[1] = $result_string2;
    $all_page_data[2] = $result_string3;
    $all_page_data[3] = $result_string4;

    print_r(json_encode($all_page_data));die;

  } 

 }


  public function updateSegment(){

    $this->autoRender = false;
    $user_id          = $_POST['userid'];
    $segment_ids      = $_POST['all_seg_ids'];
    $segt_id          = explode(',', $segment_ids);

    // setting all segment data status 0

    $this->UserSegment->updateAll(array('UserSegment.status' => 2,
                                                 'UserSegment.modify_date' => time()),
                                           array('UserSegment.user_id'     => $user_id));

    // setting request segment data status 1
    $this->UserSegment->updateAll(array('UserSegment.status' => 1,
                                                 'UserSegment.modify_date' => time()),
                                           array('UserSegment.user_id'     => $user_id,
                                                 'UserSegment.segment_id'  => $segt_id));


    // Get request data  
    $segment_data  = $this->ClassSegment->find('all',array('conditions'=>array(
                                                           'ClassSegment.id'=>$segt_id,
                                                           'ClassSegment.status'=>1,   
                                                            )));

    

    // Generate segment code 
      $result_string.='';
              
        foreach ($segment_data as $data1){ 

                $result_string.='<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4" id="'.$data1['ClassSegment']['id'].'" style="margin-top:25px;cursor:pointer;" onclick="getsemid('.$data1['ClassSegment']['id'].');" >
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r segmt_img">
                            <center>';
                               if(empty($data1['ClassSegment']['segment_image'])){ 
                                    $result_string.='<img class="image-responsive" src="'.HTTP_ROOT.'/img/connect/noimage.jpg" alt="img not found">';
                                 }else{  
                                    $result_string.='<img class="image-responsive" style="width:100%;" src="'.HTTP_ROOT.'/img/segment_image/'.$data1['ClassSegment']['segment_image'].'" alt="img not found">';
                                 } 
                            $result_string.='</center>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 semgt_connt_bdr2" id="segt'.$data1['ClassSegment']['id'].'">
                            <center>
                                <span class="connt_flex_middle_text" id="segt_text'.$data1['ClassSegment']['id'].'">
                                     '.$data1['ClassSegment']['segment_name'].'
                                </span>
                            </center>
                        </div>           
                      </div>';
          }
      print_r($result_string);die;  
  }


  function modelSegmentdata(){

      $this->autoRender = false;

      $category_ids   =  $_POST['cat_id'];
      $category_id    =  explode(',',$category_ids);
      $user_id        =  $_POST['user_id'];

      $segment_data = $this->ClassSegment->find('all',array('conditions'=>array(
                                                            'ClassSegment.status'=>1,
                                                            'ClassSegment.category_id'=>$category_id)));
    
      $result_string.='';

         foreach ($segment_data as $value) { 
                        
              $result_string.='<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 padd_l_r">
                                  <input name="segment_ids" class="radiobtn required" value="'.$value['ClassSegment']['id'].'" 
                                  id="checkbox_seg'.$value['ClassSegment']['id'].'" type="checkbox">
                                  <label class="connt_flex_middle_text_model"  for="checkbox_seg'.$value['ClassSegment']['id'].'">
                                  '.$value['ClassSegment']['segment_name'].'
                                  </label>
                              </div>';
          }    

      print_r($result_string);die;      
  }

  public function Bloglike($id){

    $this->autoRender = false;
    $blog_data = $this->Blog->find('all',array(
                      'fields' => 'Blog.*,userdata.*',
                      'conditions' => array(  
                      'Blog.status'=>1,
                      'Blog.segment_id'=>$id),
                      'joins'=>
                          array(
                            array(
                               'table'  =>'user_masters',  
                               'alias'  =>'userdata',
                               'type' =>'left',
                               'conditions'=>array(
                                      'userdata.id=Blog.user_id',
                               )                  
                            ),            
                          ),
    ));

    $blog_id = $this->Blog->find('all',array(
                                    'fields'=>'Blog.id',
                                    'conditions'=>array(
                                    'Blog.segment_id'=>$id,
                                    'Blog.status'=>1)));

    $like_array = array();  

    foreach ($blog_id as  $cmmtdata) {
      $dataArray1 = $this->BlogLike->find('count',array('conditions'=>array(
                                                          'BlogLike.blog_id'=>$cmmtdata['Blog']['id'],
                                                          'BlogLike.status'=>1)));  
      $like_array[$cmmtdata['Blog']['id']] = $dataArray1;
    } 
    return $like_array;
  }

  public function Blogcomment($id){

      $this->autoRender = false; 
      $blog_data = $this->Blog->find('all',array(
                      'fields' => 'Blog.*,userdata.*',
                      'conditions' => array(  
                      'Blog.status'=>1,
                      'Blog.segment_id'=>$id),
                      'joins'=>
                          array(
                            array(
                               'table'  =>'user_masters',  
                               'alias'  =>'userdata',
                               'type' =>'left',
                               'conditions'=>array(
                                      'userdata.id=Blog.user_id',
                               )                  
                            ),            
                          ),
        ));
      $blog_id = $this->Blog->find('all',array(
                                    'fields'=>'Blog.id',
                                    'conditions'=>array(
                                    'Blog.segment_id'=>$id,
                                    'Blog.status'=>1)));
      $commmt_array = array();
      foreach ($blog_id as $datas) {
        $dataArray = $this->BlogComment->find('count',array('conditions'=>array(
                                                            'BlogComment.blog_id'=>$datas['Blog']['id'],
                                                            'BlogComment.status'=>1)));
        $commmt_array[$datas['Blog']['id']] = $dataArray;
      }
      return $commmt_array;
  }




/***************************************************  Connect Group Part **************************************************/

  public function connectGroup(){
  
    $this->layout='index_layout';
    $user    = $this->Session->read('User');
    $user_id = $user['UserMaster']['id'];
    $this->set('user_view',$user);
    
    if(empty($user_id)){

        $segment_data = $this->ConnectSegmentGroup->find('all',array('conditions'=>array(
                                                              'ConnectSegmentGroup.status'=>1)));  

        $this->set('segment_data',$segment_data);
        $seg_data = array();

        foreach($segment_data as $value){  
          $seg_data[]  = $value['ConnectSegmentGroup']['id'];
        }

        $this->set('seg_data',$seg_data);

        $group_data = $this->GroupActivity->find('all',array(
                                           'joins' => array(
                                                        array(
                                                            'table'      => 'bg_user_masters',
                                                            'alias'      => 'usermaster',
                                                            'type'       => 'left',
                                                            'conditions' => array('GroupActivity.user_id = usermaster.id'))),
                                            'conditions' => array('GroupActivity.status'=>1),
                                            'fields'     => array('GroupActivity.*','usermaster.*'),
                                             ));
        $this->set('group_data',$group_data);

        // Activity like data 

        $group_like = array();  
        foreach ($group_data as  $cmmtdata) {
          $dataArray1 = $this->GroupActivityLike->find('count',array('conditions'=>array(
                                                              'GroupActivityLike.activity_id'=>$cmmtdata['GroupActivity']['id'],
                                                              'GroupActivityLike.status'=>1)));
          $dataArray2 = $this->GroupActivityLike->find('first',array('conditions'=>array(
                                                              'GroupActivityLike.activity_id'=>$cmmtdata['GroupActivity']['id'],
                                                              'GroupActivityLike.status'=>1,
                                                              'GroupActivityLike.user_id'=>$user_id),
                                                              'fields'=>array('GroupActivityLike.status')));                      
          $group_like[$cmmtdata['GroupActivity']['id']]['value'] = $dataArray1;
          $group_like[$cmmtdata['GroupActivity']['id']]['status'] = $dataArray2;
        } 

        // comment data 

        $group_commt = array();

        foreach ($group_data as $datas){
          $dataArray = $this->GroupActivityComment->find('count',array('conditions'=>array(
                                                              'GroupActivityComment.activity_id'=>$datas['GroupActivity']['id'],
                                                              'GroupActivityComment.status'=>1)));
          $group_commt[$datas['GroupActivity']['id']] = $dataArray;
        }

        $this->set('group_like',$group_like);
        $this->set('group_commt',$group_commt);
      
        // activity Report data

        $report_array = array(); 

          foreach ($group_data as  $reportdata){
              $dataArray1 = $this->GroupActivityReport->find('count',array('conditions'=>array(
                                                                  'GroupActivityReport.activity_id'=>$reportdata['GroupActivity']['id'],
                                                                  'GroupActivityReport.status'=>1)));

              $dataArray2 = $this->GroupActivityReport->find('first',array('conditions'=>array(
                                                                  'GroupActivityReport.activity_id'=>$reportdata['GroupActivity']['id'],
                                                                  'GroupActivityReport.status'=>1,
                                                                  'GroupActivityReport.user_id'=>$user_id),
                                                                  'fields'=>array('GroupActivityReport.status'))); 
              $report_array[$reportdata['GroupActivity']['id']]['value'] =  $dataArray1;
              $report_array[$reportdata['GroupActivity']['id']]['status'] = $dataArray2;
              
          } 
          $this->set('report_array',$report_array); 

        //********************************** Group Post data ***************************  

          $group_post_data = $this->GroupPost->find('all',array(
                                                  'joins' => array(
                                                              array(
                                                                  'table'      => 'bg_user_masters',
                                                                  'alias'      => 'usermaster',
                                                                  'conditions' => array('GroupPost.user_id = usermaster.id')),
                                                                ),
                                                  'conditions'=>array('GroupPost.status !='=>2),
                                                  'fields'    =>array('GroupPost.*','usermaster.*'),
                                                   ));
          $this->set('group_post_data',$group_post_data);

        // Group Post LIke data 

        $group_post_like = array();  
           
        foreach ($group_post_data as  $cmmtdata) {
        
          $dataArray1 = $this->GroupPostLike->find('count',array('conditions'=>array(
                                                              'GroupPostLike.post_id'=>$cmmtdata['GroupPost']['id'],
                                                              'GroupPostLike.status'=>1)));
         
          $dataArray2 = $this->GroupPostLike->find('first',array('conditions'=>array(
                                                              'GroupPostLike.post_id'=>$cmmtdata['GroupPost']['id'],
                                                              'GroupPostLike.status'=>1,
                                                              'GroupPostLike.user_id'=>$user_id),
                                                              'fields'=>array('GroupPostLike.status')));                      
         
          $group_post_like[$cmmtdata['GroupPostLike']['id']]['value'] = $dataArray1;
          $group_post_like[$cmmtdata['GroupPostLike']['id']]['status'] = $dataArray2;
        } 

      // Group post comment data 

      $group_post_commt = array();

      foreach ($group_post_data as $datas){
      
        $dataArray = $this->GroupPostComment->find('count',array('conditions'=>array(
                                                            'GroupPostComment.post_id'=>$datas['GroupPost']['id'],
                                                            'GroupPostComment.status'=>1)));
        $group_post_commt[$datas['GroupPost']['id']] = $dataArray;
      
      }

      $this->set('group_post_like',$group_post_like);
      $this->set('group_post_commt',$group_post_commt);
      
      // Group Post Report data 

      $post_report_array = array(); 

        foreach ($group_post_data as  $reportdata){

            $dataArray1 = $this->GroupPostReport->find('count',array('conditions'=>array(
                                                                'GroupPostReport.post_id'=>$reportdata['GroupPost']['id'],
                                                                'GroupPostReport.status'=>1)));

            $dataArray2 = $this->GroupPostReport->find('first',array('conditions'=>array(
                                                                'GroupPostReport.post_id'=>$reportdata['GroupPost']['id'],
                                                                'GroupPostReport.status'=>1,
                                                                'GroupPostReport.user_id'=>$user_id),
                                                                'fields'=>array('GroupPostReport.status'))); 

            $post_report_array[$reportdata['GroupPost']['id']]['value'] =  $dataArray1;
            $post_report_array[$reportdata['GroupPost']['id']]['status'] = $dataArray2;  

        } 

        $this->set('post_report_array',$post_report_array); 

      }else{

        $segment_data = $this->ConnectSegmentGroup->find('all',array('conditions'=>array(
                                                              'ConnectSegmentGroup.status'=>1)));  

        $this->set('segment_data',$segment_data);
        
        $seg_data = array();
        
        foreach($segment_data as $value){  
          $seg_data[]  = $value['ConnectSegmentGroup']['id'];
        }

        $this->set('seg_data',$seg_data);

        $group_data = $this->GroupActivity->find('all',array(
                                           'joins' => array(
                                                        array(
                                                            'table'      => 'bg_user_masters',
                                                            'alias'      => 'usermaster',
                                                            'type'       => 'left',
                                                            'conditions' => array('GroupActivity.user_id = usermaster.id'))),
                                            'conditions' => array('GroupActivity.status'=>1),
                                            'fields'     => array('GroupActivity.*','usermaster.*'),
                                             ));
        $this->set('group_data',$group_data);

      // Activity like data 

      $group_like = array();  
      foreach ($group_data as  $cmmtdata) {
        $dataArray1 = $this->GroupActivityLike->find('count',array('conditions'=>array(
                                                            'GroupActivityLike.activity_id'=>$cmmtdata['GroupActivity']['id'],
                                                            'GroupActivityLike.status'=>1)));
        $dataArray2 = $this->GroupActivityLike->find('first',array('conditions'=>array(
                                                            'GroupActivityLike.activity_id'=>$cmmtdata['GroupActivity']['id'],
                                                            'GroupActivityLike.status'=>1,
                                                            'GroupActivityLike.user_id'=>$user_id),
                                                            'fields'=>array('GroupActivityLike.status')));                      
        $group_like[$cmmtdata['GroupActivity']['id']]['value'] = $dataArray1;
        $group_like[$cmmtdata['GroupActivity']['id']]['status'] = $dataArray2;
      } 

      // comment data 

      $group_commt = array();

      foreach ($group_data as $datas){
        $dataArray = $this->GroupActivityComment->find('count',array('conditions'=>array(
                                                            'GroupActivityComment.activity_id'=>$datas['GroupActivity']['id'],
                                                            'GroupActivityComment.status'=>1)));
        $group_commt[$datas['GroupActivity']['id']] = $dataArray;
      }

      $this->set('group_like',$group_like);
      $this->set('group_commt',$group_commt);
      
      // activity Report data 

      $report_array = array(); 

        foreach ($group_data as  $reportdata){
          
          $dataArray1 = $this->GroupActivityReport->find('count',array('conditions'=>array(
                                                              'GroupActivityReport.activity_id'=>$reportdata['GroupActivity']['id'],
                                                              'GroupActivityReport.status'=>1)));

          $dataArray2 = $this->GroupActivityReport->find('first',array('conditions'=>array(
                                                              'GroupActivityReport.activity_id'=>$reportdata['GroupActivity']['id'],
                                                              'GroupActivityReport.status'=>1,
                                                              'GroupActivityReport.user_id'=>$user_id),
                                                              'fields'=>array('GroupActivityReport.status'))); 
          $report_array[$reportdata['GroupActivity']['id']]['value'] =  $dataArray1;
          $report_array[$reportdata['GroupActivity']['id']]['status'] = $dataArray2;
            
        } 


        $this->set('report_array',$report_array);

        // My Group Data 
        $tr_check_data = $this->TransactionHistory->find('all',array(
                                                                 'joins' => array(
                                                                    array(
                                                                        'table'      => 'bg_vendor_classes',
                                                                        'alias'      => 'ven_class',
                                                                        'conditions' => array('TransactionHistory.class_id = ven_class.id'))
                                                                    ),
                                                                     'conditions' => array(
                                                                     'TransactionHistory.user_id'=>$user_id,
                                                                     'TransactionHistory.payment_from_class'=>1,
                                                                     'TransactionHistory.status'=>2),
                                                                     'fields'=>array('TransactionHistory.*','ven_class.*')));
      
        $seg_data12  =  array();

        foreach ($tr_check_data as  $value) {
          $seg_data12[] = $value['ven_class']['segment_id'];
        }  
        $my_group   = $this->ConnectSegmentGroup->find('all',array('conditions'=>array(
                                                              'ConnectSegmentGroup.status'=>1,
                                                              'ConnectSegmentGroup.segment_id'=>$seg_data12)));

        $this->set('my_group',$my_group);  
       
        // MY group activity data
        
        $my_grp_id = array();
        foreach ($my_group as  $value) {
          $my_grp_id[] = $value['ConnectSegmentGroup']['id'];
        }


        $my_group_data = $this->GroupActivity->find('all',array(
                                           'joins' => array(
                                                        array(
                                                            'table'      => 'bg_user_masters',
                                                            'alias'      => 'usermaster',
                                                            'type'       => 'left',
                                                            'conditions' => array('GroupActivity.user_id = usermaster.id'))),
                                            'conditions' => array('GroupActivity.status'=>1,
                                                                  'GroupActivity.group_id'=>$my_grp_id),
                                            'fields'     => array('GroupActivity.*','usermaster.*'),
                                             ));
        $this->set('my_group_data',$my_group_data);
        
        $this->set('my_grp_id',$my_grp_id);

        // //********************************** Group Post data ***************************  

          $group_post_data = $this->GroupPost->find('all',array(
                                                  'joins' => array(
                                                              array(
                                                                  'table'      => 'bg_user_masters',
                                                                  'alias'      => 'usermaster',
                                                                  'conditions' => array('GroupPost.user_id = usermaster.id')),
                                                                ),
                                                  'conditions'=>array('GroupPost.status !='=>2),
                                                  'fields'    =>array('GroupPost.*','usermaster.*'),
                                                   ));
          $this->set('group_post_data',$group_post_data);

        // Group Post LIke data 

        $group_post_like = array();  
           
        foreach ($group_post_data as  $cmmtdata) {
        
          $dataArray1 = $this->GroupPostLike->find('count',array('conditions'=>array(
                                                              'GroupPostLike.post_id'=>$cmmtdata['GroupPost']['id'],
                                                              'GroupPostLike.status'=>1)));
         
          $dataArray2 = $this->GroupPostLike->find('first',array('conditions'=>array(
                                                              'GroupPostLike.post_id'=>$cmmtdata['GroupPost']['id'],
                                                              'GroupPostLike.status'=>1,
                                                              'GroupPostLike.user_id'=>$user_id),
                                                              'fields'=>array('GroupPostLike.status')));                      
         
          $group_post_like[$cmmtdata['GroupPostLike']['id']]['value'] = $dataArray1;
          $group_post_like[$cmmtdata['GroupPostLike']['id']]['status'] = $dataArray2;
        } 

      // Group post comment data 

      $group_post_commt = array();

      foreach ($group_post_data as $datas){
      
        $dataArray = $this->GroupPostComment->find('count',array('conditions'=>array(
                                                            'GroupPostComment.post_id'=>$datas['GroupPost']['id'],
                                                            'GroupPostComment.status'=>1)));
        $group_post_commt[$datas['GroupPost']['id']] = $dataArray;
      
      }

      $this->set('group_post_like',$group_post_like);
      $this->set('group_post_commt',$group_post_commt);
      
      // Group Post Report data 

      $post_report_array = array(); 

        foreach ($group_post_data as  $reportdata){

            $dataArray1 = $this->GroupPostReport->find('count',array('conditions'=>array(
                                                                'GroupPostReport.post_id'=>$reportdata['GroupPost']['id'],
                                                                'GroupPostReport.status'=>1)));

            $dataArray2 = $this->GroupPostReport->find('first',array('conditions'=>array(
                                                                'GroupPostReport.post_id'=>$reportdata['GroupPost']['id'],
                                                                'GroupPostReport.status'=>1,
                                                                'GroupPostReport.user_id'=>$user_id),
                                                                'fields'=>array('GroupPostReport.status'))); 

            $post_report_array[$reportdata['GroupPost']['id']]['value'] =  $dataArray1;
            $post_report_array[$reportdata['GroupPost']['id']]['status'] = $dataArray2;  

        } 

        $this->set('post_report_array',$post_report_array); 

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
  
  public function addactivityrequest(){

    $this->autoRender = false;
    $user=$this->Session->read('User');

    if($_POST['city'] == -1){

        $data_array = array();
        $data_array['user_id']          = $user['UserMaster']['id'];
        $data_array['group_id']         = $_POST['group_id'];
        $data_array['request_purpose']  = $_POST['pro_purpose'];
        $data_array['request_date']     = $_POST['pro_date'];
        $data_array['request_time']     = $_POST['pro_time'];
        $data_array['location']         = $_POST['pro_locat'];
        $data_array['post_type']        = $_POST['pro_type'];
        $data_array['note']             = $_POST['pro_note'];
        $data_array['status']           = 0;
        $data_array['add_date']         = time();
        $data_array['modify_date']      = time();

    }else{

        $data_array = array();
        $data_array['user_id']          = $user['UserMaster']['id'];
        $data_array['group_id']         = $_POST['group_id'];
        $data_array['city_id']          = $_POST['city'];
        $data_array['locality_id']      = $_POST['locality'];
        $data_array['request_purpose']  = $_POST['pro_purpose'];
        $data_array['request_date']     = $_POST['pro_date'];
        $data_array['request_time']     = $_POST['pro_time'];
        $data_array['location']         = $_POST['pro_locat'];
        $data_array['post_type']        = $_POST['pro_type'];
        $data_array['note']             = $_POST['pro_note'];
        $data_array['status']           = 0;
        $data_array['add_date']         = time();
        $data_array['modify_date']      = time(); 

    }
    $result   =  $this->GroupActivity->save($data_array);
    if(isset($result)){
      return 1;
    }else{
      return 2;
    }
  }

  public function addviewpost(){

    $this->autoRender = false;
    $user=$this->Session->read('User');

    if(isset($_POST)){

        $post_array = array();
        $post_array['user_id']          = $user['UserMaster']['id'];
        $post_array['group_id']         = $_POST['group_id'];
        $post_array['description']      = $_POST['user_view_post']; 
        $post_array['status']           = 1;
        $post_array['add_date']         = time();
        $post_array['modify_date']      = time();

    }

    $result   =  $this->GroupPost->save($post_array);
    if(isset($result)){
      return 1;
    }else{
      return 2;
    }
  }


  public function changegroupdata(){

    $this->autoRender = false;
    $grp_id  = $_POST['group_id'];
    $user_id = $_POST['userid'];

    if(empty($user_id)){

        $group_data = $this->GroupActivity->find('all',array(
                                           'joins' => array(
                                                        array(
                                                            'table'      => 'bg_user_masters',
                                                            'alias'      => 'usermaster',
                                                            'type'       => 'left',
                                                            'conditions' => array('GroupActivity.user_id = usermaster.id'))),
                                            'conditions' => array('GroupActivity.status'=>1,
                                                                  'GroupActivity.group_id'=>$grp_id),
                                            'fields'     => array('GroupActivity.*','usermaster.*'),
                                             ));

        // Activity like data 
        
        $group_like = array();  
        foreach ($group_data as  $cmmtdata) {
          $dataArray1 = $this->GroupActivityLike->find('count',array('conditions'=>array(
                                                              'GroupActivityLike.activity_id'=>$cmmtdata['GroupActivity']['id'],
                                                              'GroupActivityLike.status'=>1)));
          $dataArray2 = $this->GroupActivityLike->find('first',array('conditions'=>array(
                                                              'GroupActivityLike.activity_id'=>$cmmtdata['GroupActivity']['id'],
                                                              'GroupActivityLike.status'=>1,
                                                              'GroupActivityLike.user_id'=>$user_id),
                                                              'fields'=>array('GroupActivityLike.status')));                      
          $group_like[$cmmtdata['GroupActivity']['id']]['value'] = $dataArray1;
          $group_like[$cmmtdata['GroupActivity']['id']]['status'] = $dataArray2;
        }

        // Activity comment data 

        $group_commt = array();

        foreach ($group_data as $datas){
          $dataArray = $this->GroupActivityComment->find('count',array('conditions'=>array(
                                                              'GroupActivityComment.activity_id'=>$datas['GroupActivity']['id'],
                                                              'GroupActivityComment.status'=>1)));
          $group_commt[$datas['GroupActivity']['id']] = $dataArray;
        }

        $this->set('group_like',$group_like);
        $this->set('group_commt',$group_commt);
      
        //activity Report data 

        $report_array = array(); 

          foreach ($group_data as  $reportdata){
              $dataArray1 = $this->GroupActivityReport->find('count',array('conditions'=>array(
                                                                  'GroupActivityReport.activity_id'=>$reportdata['GroupActivity']['id'],
                                                                  'GroupActivityReport.status'=>1)));
              $dataArray2 = $this->GroupActivityReport->find('first',array('conditions'=>array(
                                                                  'GroupActivityReport.activity_id'=>$reportdata['GroupActivity']['id'],
                                                                  'GroupActivityReport.status'=>1,
                                                                  'GroupActivityReport.user_id'=>$user_id),
                                                                  'fields'=>array('GroupActivityReport.status'))); 
              $report_array[$reportdata['GroupActivity']['id']]['value'] =  $dataArray1;
              $report_array[$reportdata['GroupActivity']['id']]['status'] = $dataArray2;      
          } 
          $this->set('report_array',$report_array);


          if(empty($group_data)){ 

            $result_string.='';
            $result_string.='<center>
                                <span class="connt_flex_middle_text" style="text-align:center;">No Activity Request !!!</span>
                             </center>';

            print_r($result_string);die;
                    
          }else{

          $result_string.='';
          $result_string.='<div class="">&nbsp;</div>';
          foreach ($group_data as $data){ 
                      $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-right comm_box2_chat_box">
                          <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 cmmt_box_de">
                                  <div class="">&nbsp;</div>
                                  <center>';
                                    $user_pic = $data['usermaster']['profile_image'];

                                      if(empty($user_pic)){ 

                                        $result_string.='<img class="profile_pic img-circle" src="'.HTTP_ROOT.'/img/connect/dummy/pic.png" alt="img not found">';

                                        }else{

                                        $user_pic1 = substr($user_pic,0,4);

                                      if($user_pic1 == 'http'){ 

                                        $result_string.='<img class="profile_pic img-circle" src="'.$data['usermaster']['profile_image'].'" alt="img not found">';
                                      
                                        }else{ 
                                  
                                            if( $data['usermaster']['user_type_id'] == 1 ){ 

                                                $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Vendor/profile/'.$data['usermaster']['profile_image'].'" alt="img not found">';

                                            }else{ 
                                              
                                                $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Buyer/profile/'.$data['usermaster']['profile_image'].'" alt="img not found">';
                                             
                                            } 
                                  
                                     } }
                            $result_string.='</center>
                          </div>   
                          <div class="col-xs-12 col-sm-9 col-md-9 col-lg-10 padd_l_r">
                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r">
                                  <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;padding-top:30px;text-transform:capitalize;">
                                     '.$data['usermaster']['first_name'].'
                                  </span>
                                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;padding-right:5px;">
                                    on '.date('d M Y', $data['GroupActivity']['add_date']).' at '.date('h:i a',$data['GroupActivity']['add_date']).' 
                                  </span>
                                  <i class="icon-map-marker"></i>
                                  <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;padding-top:30px;">
                                    Chennai
                                  </span>
                              </div>
                              <div class="">&nbsp;</div>
                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r">
                                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;text-transform:capitalize;">
                                      '.$data['GroupActivity']['request_purpose'].'   
                                  </span>
                              </div>
                              <div class="">&nbsp;</div>
                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r">
                                  <span class="connt_flex_middle_bdr123 ryt_margin" style="color:#0f0f0f;">
                                    Activity Date :
                                  </span>
                                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">
                                    on '.$data['GroupActivity']['request_date'].' 
                                  </span>
                                  <span class="connt_flex_middle_bdr123 ryt_margin" style="color:#0f0f0f;">
                                    Activity Time :
                                  </span>
                                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">
                                    '.$data['GroupActivity']['request_time'].' 
                                  </span>
                                  <span class="connt_flex_middle_bdr123 ryt_margin" style="color:#0f0f0f;">
                                    Activity Location :
                                  </span>
                                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">
                                     '.$data['GroupActivity']['location'].' 
                                  </span>
                              </div>
                              <div class="">&nbsp;</div>
                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r">';
                                     if($testCond){ 

                                    $result_string.='<span class="ryt_margin" id="change_likedata_'.$data['GroupActivity']['id'].'" style="cursor:pointer;" onclick="likechange('.$data['GroupActivity']['id'].')">
                                        <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;">';

                                        if($group_like[$data['GroupActivity']['id']]['status']['GroupActivityLike']['status'] == 1){ 

                                        $result_string.='<i style="color:#2bcdc1" class="fa fa-thumbs-up" aria-hidden="true">
                                        </i>';

                                        }else{  
                                        
                                        $result_string.='<i class="fa fa-thumbs-up" aria-hidden="true"></i>';
                                        
                                        } 
                                        $result_string.='</span>
                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">';

                                        if(!empty($group_like[$data['GroupActivity']['id']]['value'])){
                                          $result_string.=''.$group_like[$data['GroupActivity']['id']]['value'].' '; 
                                        }else{
                                          $result_string.=' 0 ';
                                        } 
                                        $result_string.='  Likes </span>   
                                      </span>
                                      <span class="ryt_margin" id="ajax_cmmt_data_'.$data['GroupActivity']['id'].'" onclick="commmt_data_show('.$data['GroupActivity']['id'].')" class="mouse_show">
                                        <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;">
                                           <i class="fa fa-comments" aria-hidden="true"></i>
                                        </span>
                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">';
                                          
                                           if(!empty($group_commt[$data['GroupActivity']['id']])){
                                              $result_string.=''.$group_commt[$data['GroupActivity']['id']].' '; 
                                            }else{
                                              $result_string.=' 0 ';
                                            }
                                  
                                      $result_string.=' Comments  </span>
                                      </span>
                                      <span class="ryt_margin" id="report_check_'.$data['GroupActivity']['id'].'" 
                                         onclick="report_activity('.$data['GroupActivity']['id'].')" style="cursor:pointer;">';
                                            if($report_array[$data['GroupActivity']['id']]['status']['GroupActivityReport']['status'] == 1){ 
                                            $result_string.='<i style="color:#2bcdc1" class="fa fa-file-text" aria-hidden="true"></i>';
                                  
                                            }else{ 
                                  
                                            $result_string.='<i class="fa fa-file-text" aria-hidden="true"></i>';
                                  
                                            }  
                                            $result_string.='<span class="connt_flex_middle_bdr123">';
                                            if(!empty($report_array[$data['GroupActivity']['id']]['value'])){
                                              $result_string.=''.$report_array[$data['GroupActivity']['id']]['value'].' '; 
                                            }else{
                                              $result_string.=' 0 ';
                                            }   
                                      $result_string.=' Report </span>
                                      </span>
                                      <span class="ryt_margin" id="attend_check_'.$data['GroupActivity']['id'].'" 
                                         onclick="attend_activity('.$data['GroupActivity']['id'].')" style="cursor:pointer;">';
                                            if($user){ 

                                            $result_string.='<i style="color:#2bcdc1" class="fa fa-user" aria-hidden="true"></i>';

                                            }else{

                                           $result_string.='<i class="fa fa-user" aria-hidden="true"></i>';
                                           
                                            } 

                                           $result_string.=' <span class="connt_flex_middle_bdr123">
                                                0 Attendance
                                            </span>
                                      </span>';

                                     }else{ 

                                      $result_string.='<span class="ryt_margin" id="change_likedata_'.$data['GroupActivity']['id'].'" style="pointer-events:none;" onclick="likechange('.$data['GroupActivity']['id'].')">
                                        <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;">';
                                        if($group_like[$data['GroupActivity']['id']]['status']['GroupActivityLike']['status'] == 1){ 
                                        
                                        $result_string.='<i style="color:#2bcdc1" class="fa fa-thumbs-up" aria-hidden="true">
                                        </i>';
                                        
                                        }else{ 

                                        $result_string.='<i class="fa fa-thumbs-up" aria-hidden="true"></i>';
                                        
                                        }  
                                        
                                        $result_string.='</span>
                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">';
                                          if(!empty($group_like[$data['GroupActivity']['id']]['value'])){
                                          $result_string.=''.$group_like[$data['GroupActivity']['id']]['value'].' '; 
                                        }else{
                                          $result_string.=' 0 ';
                                        } 
                                        $result_string.='  Likes </span>      
                                      </span>
                                      <span class="ryt_margin" id="ajax_cmmt_data_'.$data['GroupActivity']['id'].'" onclick="commmt_data_show('.$data['GroupActivity']['id'].')" class="mouse_show">
                                        <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;">
                                           <i class="fa fa-comments" aria-hidden="true"></i>
                                        </span>
                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">';
                                           if(!empty($group_commt[$data['GroupActivity']['id']])){
                                              $result_string.=''.$group_commt[$data['GroupActivity']['id']].' '; 
                                            }else{
                                              $result_string.=' 0 ';
                                            }
                                  
                                      $result_string.=' Comments  </span>
                                      </span>
                                      <span class="ryt_margin" id="report_check_'.$data['GroupActivity']['id'].'" 
                                         onclick="report_activity('.$data['GroupActivity']['id'].')" style="pointer-events:none;">';
                                            if($report_array[$data['GroupActivity']['id']]['status']['GroupActivityReport']['status'] == 1){ 
                                            $result_string.='<i style="color:#2bcdc1" class="fa fa-file-text" aria-hidden="true"></i>';
                                            }else{ 
                                            $result_string.='<i class="fa fa-file-text" aria-hidden="true"></i> ';
                                            } 
                                            $result_string.='<span class="connt_flex_middle_bdr123"> ';
                                             if(!empty($report_array[$data['GroupActivity']['id']]['value'])){
                                                $result_string.='' .$report_array[$data['GroupActivity']['id']]['value']. ' '; 
                                              }else{
                                                $result_string.=' 0 ';
                                              }   
                                      $result_string.=' Report </span>
                                      </span>
                                      <span class="ryt_margin" id="attend_check_'.$data['GroupActivity']['id'].'" 
                                         onclick="attend_activity('.$data['GroupActivity']['id'].')" style="pointer-events:none;">';
                                            if($user){ 

                                            $result_string.='<i style="color:#2bcdc1" class="fa fa-user" aria-hidden="true"></i>';

                                            }else{ 

                                            $result_string.='<i class="fa fa-user" aria-hidden="true"></i>';

                                            } 

                                            $result_string.='<span class="connt_flex_middle_bdr123">
                                                0 Attendance
                                            </span>
                                      </span>';
                                    }  
                                    $result_string.='<div id="show_cmmt_div_'.$data['GroupActivity']['id'].'" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 connt_flex_middle_bdr" style="display:none;background-color:#eeedf2;">
                                       
                                    </div>    
                              </div>
                          </div>
                      </div>
                      <div class="">&nbsp;</div>';             
          } }

          print_r($result_string);die;    

      }else{

          $group_data = $this->GroupActivity->find('all',array(
                                           'joins' => array(
                                                        array(
                                                            'table'      => 'bg_user_masters',
                                                            'alias'      => 'usermaster',
                                                            'type'       => 'left',
                                                            'conditions' => array('GroupActivity.user_id = usermaster.id'))),
                                            'conditions' => array('GroupActivity.status'=>1,
                                                                  'GroupActivity.group_id'=>$grp_id),
                                            'fields'     => array('GroupActivity.*','usermaster.*'),
                                             ));

        // Activity like data 
        $group_like = array();  
        foreach ($group_data as  $cmmtdata) {
          $dataArray1 = $this->GroupActivityLike->find('count',array('conditions'=>array(
                                                              'GroupActivityLike.activity_id'=>$cmmtdata['GroupActivity']['id'],
                                                              'GroupActivityLike.status'=>1)));
          $dataArray2 = $this->GroupActivityLike->find('first',array('conditions'=>array(
                                                              'GroupActivityLike.activity_id'=>$cmmtdata['GroupActivity']['id'],
                                                              'GroupActivityLike.status'=>1,
                                                              'GroupActivityLike.user_id'=>$user_id),
                                                              'fields'=>array('GroupActivityLike.status')));                      
          $group_like[$cmmtdata['GroupActivity']['id']]['value'] = $dataArray1;
          $group_like[$cmmtdata['GroupActivity']['id']]['status'] = $dataArray2;
        }

        // comment data 

        $group_commt = array();

        foreach ($group_data as $datas){
          $dataArray = $this->GroupActivityComment->find('count',array('conditions'=>array(
                                                              'GroupActivityComment.activity_id'=>$datas['GroupActivity']['id'],
                                                              'GroupActivityComment.status'=>1)));
          $group_commt[$datas['GroupActivity']['id']] = $dataArray;
        }

        $this->set('group_like',$group_like);
        $this->set('group_commt',$group_commt);
      
        // activity Report data 
        $report_array = array(); 

          foreach ($group_data as  $reportdata){
              $dataArray1 = $this->GroupActivityReport->find('count',array('conditions'=>array(
                                                                  'GroupActivityReport.activity_id'=>$reportdata['GroupActivity']['id'],
                                                                  'GroupActivityReport.status'=>1)));
              $dataArray2 = $this->GroupActivityReport->find('first',array('conditions'=>array(
                                                                  'GroupActivityReport.activity_id'=>$reportdata['GroupActivity']['id'],
                                                                  'GroupActivityReport.status'=>1,
                                                                  'GroupActivityReport.user_id'=>$user_id),
                                                                  'fields'=>array('GroupActivityReport.status'))); 
              $report_array[$reportdata['GroupActivity']['id']]['value'] =  $dataArray1;
              $report_array[$reportdata['GroupActivity']['id']]['status'] = $dataArray2;      
          } 
          $this->set('report_array',$report_array);
         
          if(empty($group_data)){ 

          $result_string.='';
          $result_string.='<center>
                              <span class="connt_flex_middle_text" style="text-align:center;">No Activity Request !!!</span>
                           </center>';
          print_r($result_string);die;
                    
          }else{

          $result_string.='';
          $result_string.='<div class="">&nbsp;</div>';
          foreach ($group_data as $data){ 
                      $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-right comm_box2_chat_box">
                          <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 cmmt_box_de">
                                  <div class="">&nbsp;</div>
                                  <center>';
                                    $user_pic = $data['usermaster']['profile_image'];

                                      if(empty($user_pic)){ 

                                        $result_string.='<img class="profile_pic img-circle" src="'.HTTP_ROOT.'/img/connect/dummy/pic.png" alt="img not found">';

                                        }else{

                                        $user_pic1 = substr($user_pic,0,4);

                                      if($user_pic1 == 'http'){ 

                                        $result_string.='<img class="profile_pic img-circle" src="'.$data['usermaster']['profile_image'].'" alt="img not found">';
                                      
                                        }else{ 
                                  
                                          if( $data['usermaster']['user_type_id'] == 1 ){ 

                                                $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Vendor/profile/'.$data['usermaster']['profile_image'].'" alt="img not found">';

                                            }else{ 
                                              
                                                $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Buyer/profile/'.$data['usermaster']['profile_image'].'" alt="img not found">';
                                             
                                            } 
                                  
                                     } }
                            $result_string.='</center>
                          </div>   
                          <div class="col-xs-12 col-sm-9 col-md-9 col-lg-10 padd_l_r">
                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r">
                                  <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;padding-top:30px;text-transform:capitalize;">
                                     '.$data['usermaster']['first_name'].'
                                  </span>
                                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;padding-right:5px;">
                                    on '.date('d M Y', $data['GroupActivity']['add_date']).' at '.date('h:i a',$data['GroupActivity']['add_date']).' 
                                  </span>
                                  <i class="icon-map-marker"></i>
                                  <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;padding-top:30px;">
                                    Chennai
                                  </span>
                              </div>
                              <div class="">&nbsp;</div>
                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r">
                                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;text-transform:capitalize;">
                                      '.$data['GroupActivity']['request_purpose'].'   
                                  </span>
                              </div>
                              <div class="">&nbsp;</div>
                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r">
                                  <span class="connt_flex_middle_bdr123 ryt_margin" style="color:#0f0f0f;">
                                    Activity Date :
                                  </span>
                                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">
                                    on '.$data['GroupActivity']['request_date'].' 
                                  </span>
                                  <span class="connt_flex_middle_bdr123 ryt_margin" style="color:#0f0f0f;">
                                    Activity Time :
                                  </span>
                                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">
                                    '.$data['GroupActivity']['request_time'].' 
                                  </span>
                                  <span class="connt_flex_middle_bdr123 ryt_margin" style="color:#0f0f0f;">
                                    Activity Location :
                                  </span>
                                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">
                                     '.$data['GroupActivity']['location'].' 
                                  </span>
                              </div>
                              <div class="">&nbsp;</div>
                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r">';
                                     if($testCond){ 

                                    $result_string.='<span class="ryt_margin" id="change_likedata_'.$data['GroupActivity']['id'].'" style="cursor:pointer;" onclick="likechange('.$data['GroupActivity']['id'].')">
                                        <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;">';

                                        if($group_like[$data['GroupActivity']['id']]['status']['GroupActivityLike']['status'] == 1){ 

                                        $result_string.='<i style="color:#2bcdc1" class="fa fa-thumbs-up" aria-hidden="true">
                                        </i>';

                                        }else{  
                                        
                                        $result_string.='<i class="fa fa-thumbs-up" aria-hidden="true"></i>';
                                        
                                        } 
                                        $result_string.='</span>
                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">';

                                        if(!empty($group_like[$data['GroupActivity']['id']]['value'])){
                                          $result_string.=''.$group_like[$data['GroupActivity']['id']]['value'].' '; 
                                        }else{
                                          $result_string.=' 0 ';
                                        } 
                                        $result_string.='  Likes </span>   
                                      </span>
                                      <span class="ryt_margin mouse_show" id="ajax_cmmt_data_'.$data['GroupActivity']['id'].'" onclick="commmt_data_show('.$data['GroupActivity']['id'].')" class="mouse_show">
                                        <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;">
                                           <i class="fa fa-comments" aria-hidden="true"></i>
                                        </span>
                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">';
                                          
                                           if(!empty($group_commt[$data['GroupActivity']['id']])){
                                              $result_string.=''.$group_commt[$data['GroupActivity']['id']].' '; 
                                            }else{
                                              $result_string.=' 0 ';
                                            }
                                  
                                      $result_string.=' Comments  </span>
                                      </span>
                                      <span class="ryt_margin" id="report_check_'.$data['GroupActivity']['id'].'" 
                                         onclick="report_activity('.$data['GroupActivity']['id'].')" style="cursor:pointer;">';
                                            if($report_array[$data['GroupActivity']['id']]['status']['GroupActivityReport']['status'] == 1){ 
                                            $result_string.='<i style="color:#2bcdc1" class="fa fa-file-text" aria-hidden="true"></i>';
                                  
                                            }else{ 
                                  
                                            $result_string.='<i class="fa fa-file-text" aria-hidden="true"></i>';
                                  
                                            }  
                                            $result_string.='<span class="connt_flex_middle_bdr123">';
                                            if(!empty($report_array[$data['GroupActivity']['id']]['value'])){
                                              $result_string.=''.$report_array[$data['GroupActivity']['id']]['value'].' '; 
                                            }else{
                                              $result_string.=' 0 ';
                                            }   
                                      $result_string.=' Report </span>
                                      </span>
                                      <span class="ryt_margin" id="attend_check_'.$data['GroupActivity']['id'].'" 
                                         onclick="attend_activity('.$data['GroupActivity']['id'].')" style="cursor:pointer;">';
                                            if($user){ 

                                            $result_string.='<i style="color:#2bcdc1" class="fa fa-user" aria-hidden="true"></i>';

                                            }else{

                                           $result_string.='<i class="fa fa-user" aria-hidden="true"></i>';
                                           
                                            } 

                                           $result_string.=' <span class="connt_flex_middle_bdr123">
                                                0 Attendance
                                            </span>
                                      </span>';

                                     }else{ 

                                      $result_string.='<span class="ryt_margin" id="change_likedata_'.$data['GroupActivity']['id'].'" style="pointer-events:none;" onclick="likechange('.$data['GroupActivity']['id'].')">
                                        <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;">';
                                        if($group_like[$data['GroupActivity']['id']]['status']['GroupActivityLike']['status'] == 1){ 
                                        
                                        $result_string.='<i style="color:#2bcdc1" class="fa fa-thumbs-up" aria-hidden="true">
                                        </i>';
                                        
                                        }else{ 

                                        $result_string.='<i class="fa fa-thumbs-up" aria-hidden="true"></i>';
                                        
                                        }  
                                        
                                        $result_string.='</span>
                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">';
                                          if(!empty($group_like[$data['GroupActivity']['id']]['value'])){
                                          $result_string.=''.$group_like[$data['GroupActivity']['id']]['value'].' '; 
                                        }else{
                                          $result_string.=' 0 ';
                                        } 
                                        $result_string.='  Likes </span>      
                                      </span>
                                      <span class="ryt_margin mouse_show" id="ajax_cmmt_data_'.$data['GroupActivity']['id'].'" onclick="commmt_data_show('.$data['GroupActivity']['id'].')" class="mouse_show">
                                        <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;">
                                           <i class="fa fa-comments" aria-hidden="true"></i>
                                        </span>
                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">';
                                           if(!empty($group_commt[$data['GroupActivity']['id']])){
                                              $result_string.=''.$group_commt[$data['GroupActivity']['id']].' '; 
                                            }else{
                                              $result_string.=' 0 ';
                                            }
                                  
                                      $result_string.=' Comments  </span>
                                      </span>
                                      <span class="ryt_margin" id="report_check_'.$data['GroupActivity']['id'].'" 
                                         onclick="report_activity('.$data['GroupActivity']['id'].')" style="pointer-events:none;">';
                                            if($report_array[$data['GroupActivity']['id']]['status']['GroupActivityReport']['status'] == 1){ 
                                            $result_string.='<i style="color:#2bcdc1" class="fa fa-file-text" aria-hidden="true"></i>';
                                            }else{ 
                                            $result_string.='<i class="fa fa-file-text" aria-hidden="true"></i>';
                                            } 
                                            $result_string.='<span class="connt_flex_middle_bdr123">';
                                             if(!empty($report_array[$data['GroupActivity']['id']]['value'])){
                                                $result_string.=''.$report_array[$data['GroupActivity']['id']]['value'].' '; 
                                              }else{
                                                $result_string.=' 0 ';
                                              }   
                                      $result_string.=' Report </span>
                                      </span>
                                      <span class="ryt_margin" id="attend_check_'.$data['GroupActivity']['id'].'" 
                                         onclick="attend_activity('.$data['GroupActivity']['id'].')" style="pointer-events:none;">';
                                            if($user){ 

                                            $result_string.='<i style="color:#2bcdc1" class="fa fa-user" aria-hidden="true"></i>';

                                            }else{ 

                                            $result_string.='<i class="fa fa-user" aria-hidden="true"></i>';

                                            } 

                                            $result_string.='<span class="connt_flex_middle_bdr123">
                                                0 Attendance
                                            </span>
                                      </span>';
                                    }  
                                    $result_string.='<div id="show_cmmt_div_'.$data['GroupActivity']['id'].'" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 connt_flex_middle_bdr" style="display:none;background-color:#eeedf2;">
                                       
                                    </div>    
                              </div>
                          </div>
                      </div>
                      <div class="">&nbsp;</div>';  
          } }
          print_r($result_string);die;    

      }
 
  }

   public function changegrouppostdata(){

    $grp_id  = $_POST['group_id'];
    $user_id = $_POST['userid'];

     if(empty($user_id)){

        $group_post_data = $this->GroupPost->find('all',array(
                                                  'joins' => array(
                                                              array(
                                                                  'table'      => 'bg_user_masters',
                                                                  'alias'      => 'usermaster',
                                                                  'conditions' => array('GroupPost.user_id = usermaster.id')),
                                                               array(
                                                                  'table'      => 'bg_group_post_likes',
                                                                  'alias'      => 'grouppostlike',
                                                                  'type'       => 'left',
                                                                  'conditions' => array('GroupPost.id = grouppostlike.post_id',
                                                                                        'grouppostlike.user_id'=>$user_id))),
                                                  'conditions'=>array('GroupPost.status !='=>2,
                                                                      'GroupPost.group_id'=>$grp_id),
              'Order'     =>array('GroupPost.add_date ASC'),  
                                                  'fields'    =>array('GroupPost.*','usermaster.*','grouppostlike.*'),
                                                   ));

        if(empty($group_post_data)){
          $result_string.='';
          $result_string.='<center>
                              <span class="connt_flex_middle_text" style="text-align:center;">No View Post !!!</span>
                          </center>';
          print_r($result_string);die;
      
        }else{

          $result_string.='';

           foreach ($group_post_data as $postdata){ 
                 $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-right comm_box2_chat_box" style="background-color:white;">
                    <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1 cmmt_box_de">
                        <div class="">&nbsp;</div>';
                          
                                $user_pic = $postdata['usermaster']['profile_image'];
                                if(empty($user_pic)){ 

                                  $result_string.='<img class="profile_pic img-circle" src="'.HTTP_ROOT.'/img/connect/dummy/pic.png" alt="img not found">';

                                   }else{

                                $user_pic1 = substr($user_pic,0,4);

                                if($user_pic1 == 'http'){ 

                                  $result_string.='<img class="profile_pic img-circle" src="'.$postdata['usermaster']['profile_image'].'" alt="img not found">';

                                  }else{ 

                                   if( $postdata['usermaster']['user_type_id'] == 1 ){ 

                                        $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Vendor/profile/'.$postdata['usermaster']['profile_image'].'" alt="img not found">';

                                    }else{ 
                                      
                                        $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Buyer/profile/'.$postdata['usermaster']['profile_image'].'" alt="img not found">';
                                     
                                    } 

                             } } 
                     $result_string.='</div>   
                    <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11 padd_l_r">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r" style="padding-top:15px;">
                            <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;padding-top:30px;">
                               '.$postdata['usermaster']['first_name'].' 
                            </span>
                            <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;padding-right:5px;">
                              on '.date('d M Y', $postdata['GroupPost']['add_date']).' at '.date('h:i a',$postdata['GroupPost']['add_date']).'
                            </span>
                        </div> 
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r" style="padding-top:15px;">
                            <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;">
                              '.$postdata['GroupPost']['description'].' 
                            </span>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r" style="padding-top:15px;">';
                                  if(!empty($user_id)){ 
                                    
                                     if($data['groupactivitylike']['status'] == 1 ){ 

                                        $result_string.='<span id="change_likedata_'.$data['GroupActivity']['id'].'" style="cursor:pointer;" onclick="likechange('.$data['GroupActivity']['id'].')">
                                        <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;padding-top:30px;">
                                            <i style="color:#00cdc6" class="fa fa-thumbs-up" aria-hidden="true"></i>
                                        </span>
                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;padding-right:5px;">';
                                          
                                          if(isset($group_like[$data['GroupActivity']['id']])){
                    
                                              $result_string.='' .$group_like[$data['GroupActivity']['id']]. '';
                                              
                                           }else{
                                                
                                                $result_string.=' 0 ';
                                          }
                                       $result_string.=' Likes </span> </span>';

                                      }else{ 

                                       $result_string.='<span id="change_likedata_'.$data['GroupActivity']['id'].'" style="cursor:pointer;" onclick="likechange('.$data['GroupActivity']['id'].')">
                                        <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;padding-top:30px;">
                                            <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                        </span>
                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;padding-right:5px;">';
                                         if(isset($group_like[$data['GroupActivity']['id']])){
                    
                                              $result_string.='' .$group_like[$data['GroupActivity']['id']]. '';
                                              
                                           }else{
                                                
                                                $result_string.=' 0 ';
                                          }
                                         $result_string.='  Likes  </span> </span>';

                                      } 
                                  
                                  $result_string.='<span id="ajax_cmmt_data_'.$data['GroupActivity']['id'].'" onclick="commmt_data_show('.$data['GroupActivity']['id'].')" class="mouse_show">
                                    <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;padding-top:30px;">
                                       <i class="fa fa-comments" aria-hidden="true"></i>
                                    </span>
                                    <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;padding-right:5px;">';
                                       if(isset($group_commt[$data['GroupActivity']['id']])){
                                        
                                        $result_string.='' .$group_commt[$data['GroupActivity']['id']]. '';
                                      
                                      }else{
                                        
                                        $result_string.=' 0 ';
                                  }
                                  $result_string.='  Comments </span>
                                  </span>  
                                  <div id="show_cmmt_div_'.$data['GroupActivity']['id'].'" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 connt_flex_middle_bdr" style="display:none;background-color:#eeedf2;">
                                      
                                  </div>';   
                                 }   
                            $result_string.='</div>
                    </div>
                </div>';
         } 
         print_r($result_string);die;           
        }
      }else{

        $group_post_data = $this->GroupPost->find('all',array(
                                                  'joins' => array(
                                                              array(
                                                                  'table'      => 'bg_user_masters',
                                                                  'alias'      => 'usermaster',
                                                                  'conditions' => array('GroupPost.user_id = usermaster.id')),
                                                               array(
                                                                  'table'      => 'bg_group_post_likes',
                                                                  'alias'      => 'grouppostlike',
                                                                  'type'       => 'left',
                                                                  'conditions' => array('GroupPost.id = grouppostlike.post_id',
                                                                                        'grouppostlike.user_id'=>$user_id))),
                                                  'conditions'=>array('GroupPost.status !='=>2,
                                                                      'GroupPost.group_id'=>$grp_id),
              'Order'     =>array('GroupPost.add_date ASC'),  
                                                  'fields'    =>array('GroupPost.*','usermaster.*','grouppostlike.*'),
                                                   ));


        $group_post_like   = $this->GroupPostlike($grp_id,$user_id);
        $group_post_commt  = $this->GroupPostcomment($grp_id,$user_id);
        
        if(empty($group_post_data)){

          $result_string.='';
          $result_string.='<center>
                              <span class="connt_flex_middle_text" style="text-align:center;">No View Post !!!</span>
                           </center>';
          print_r($result_string);die;
                    
        }else{

          $result_string.='';

          foreach ($group_post_data as $postdata){ 

                $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-right comm_box2_chat_box" style="background-color:white;">
                    <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1 cmmt_box_de">
                        <div class="">&nbsp;</div>';
                          
                                $user_pic = $postdata['usermaster']['profile_image'];
                                if(empty($user_pic)){ 

                                  $result_string.='<img class="profile_pic img-circle" src="'.HTTP_ROOT.'/img/connect/dummy/pic.png" alt="img not found">';

                                   }else{

                                $user_pic1 = substr($user_pic,0,4);

                                if($user_pic1 == 'http'){ 

                                  $result_string.='<img class="profile_pic img-circle" src="'.$postdata['usermaster']['profile_image'].'" alt="img not found">';

                                  }else{ 

                                    if( $postdata['usermaster']['user_type_id'] == 1 ){ 

                                        $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Vendor/profile/'.$postdata['usermaster']['profile_image'].'" alt="img not found">';

                                    }else{ 
                                      
                                        $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Buyer/profile/'.$postdata['usermaster']['profile_image'].'" alt="img not found">';
                                     
                                    } 

                             } } 
                     $result_string.='</div>   
                    <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11 padd_l_r">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r" style="padding-top:15px;">
                            <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;padding-top:30px;">
                               '.$postdata['usermaster']['first_name'].' 
                            </span>
                            <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;padding-right:5px;">
                              on '.date('d M Y', $postdata['GroupPost']['add_date']).' at '.date('h:i a',$postdata['GroupPost']['add_date']).'
                            </span>
                        </div> 
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r" style="padding-top:15px;">
                            <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;">
                              '.$postdata['GroupPost']['description'].' 
                            </span>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r" style="padding-top:15px;">';
                                  if(!empty($user_id)){ 
                                  
                                  if($postdata['grouppostlike']['status'] == 1 ){  

                        $result_string.='<span id="change_likepostdata_'.$postdata['GroupPost']['id'].'" 
                                        style="cursor:pointer;" onclick="likepostchange('.$postdata['GroupPost']['id'].')">
                                        <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;padding-top:30px;">
                                            <i style="color:#00cdc6" class="fa fa-thumbs-up" aria-hidden="true"></i>
                                        </span>
                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;padding-right:5px;">';
                                         if(isset($group_post_like[$postdata['GroupPost']['id']])){
                                      
                                                $result_string.='' .$group_post_like[$postdata['GroupPost']['id']]. '';
                                              
                                              }else{
                                                
                                                $result_string.=' 0 ';
                                          }
                                            $result_string.=' Likes </span>
                                    </span>';

                                   }else{ 

                                    $result_string.='<span id="change_likepostdata_'.$postdata['GroupPost']['id'].'" 
                                        style="cursor:pointer;" onclick="likepostchange('.$postdata['GroupPost']['id'].')">
                                        <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;padding-top:30px;">
                                            <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                        </span>
                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;padding-right:5px;">';
                                          if(isset($group_post_like[$postdata['GroupPost']['id']])){
                                      
                                                  $result_string.='' .$group_post_like[$postdata['GroupPost']['id']]. '';
                                                
                                                }else{
                                                  
                                                  $result_string.=' 0 ';
                                            }
                                            $result_string.=' Likes </span>
                                    </span>';

                                   }  
                                  
                                  $result_string.='<span id="ajax_cmmt_data_post'.$postdata['GroupPost']['id'].'" onclick="commmt_data_show_post('.$postdata['GroupPost']['id'].')" class="mouse_show">
                                    <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;padding-top:30px;">
                                       <i class="fa fa-comments" aria-hidden="true"></i>
                                    </span>
                                    <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;padding-right:5px;">';
                                      if(isset($group_post_commt[$postdata['GroupPost']['id']])){
                                        
                                        $result_string.='' .$group_post_commt[$postdata['GroupPost']['id']]. '';
                                      
                                      }else{
                                        
                                        $result_string.=' 0 ';
                                  }
                                  $result_string.=' Comments </span>
                                  </span>  
                                  <div id="show_cmmt_div_post'.$postdata['GroupPost']['id'].'" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 connt_flex_middle_bdr" style="display:none;background-color:#eeedf2;">
                                   
                                  </div>';   
                                  } 
                            $result_string.='</div>
                    </div>
                </div>';
            }     
         print_r($result_string);die;            
        }
      }
  }

  public function GroupActivitylike($group_id = NULL,$userid = NULL){

        $activity_like_data = $this->GroupActivity->find('all',array( 'conditions' => array(  
                                                                      'GroupActivity.status'=>1,
                                                                      'GroupActivity.group_id'=>$group_id)));

        $activity_id        = $this->GroupActivity->find('all',array('fields'=>'GroupActivity.id',
                                                          'conditions'=>array(
                                                          'GroupActivity.group_id'=>$group_id,
                                                          'GroupActivity.status'=>1)));
        
        $like_array = array();  
        foreach($activity_id as  $likedata){
          $dataArray1 = $this->GroupActivityLike->find('count',array('conditions'=>array(
                                                                      'GroupActivityLike.activity_id'=>$likedata['GroupActivity']['id'],
                                                                      'GroupActivityLike.status'=>1)));  
          $like_array[$likedata['GroupActivity']['id']] = $dataArray1;
        } 
        return $like_array;
  }

  public function GroupActivitycomment($group_id = NULL,$userid = NULL){   
    
    $activity_like_data = $this->GroupActivity->find('all',array( 'conditions' => array(  
                                                                  'GroupActivity.status'=>1,
                                                                  'GroupActivity.group_id'=>$group_id)));
    $activity_id = $this->GroupActivity->find('all',array('fields'=>'GroupActivity.id',
                                                      'conditions'=>array(
                                                      'GroupActivity.group_id'=>$group_id,
                                                      'GroupActivity.status'=>1)));
    $cmmt_array = array();  
    foreach($activity_id as  $cmmtdata){
      $cmmtArray12 = $this->GroupActivityComment->find('count',array('conditions'=>array(
                                                                  'GroupActivityComment.activity_id'=>$cmmtdata['GroupActivity']['id'],
                                                                  'GroupActivityComment.status'=>1)));  
      $cmmt_array[$cmmtdata['GroupActivity']['id']] = $cmmtArray12;
    } 
    return $cmmt_array; 
 }

 public function acceptActivityByUser(){
  
  $this->autoRender = false;
  if(isset($_POST)){

    $user_id   = $_POST['use_id'];
    $user_data = $this->UserMaster->find('first',array('conditions'=>array('UserMaster.id'=>$user_id,
                                                                         'UserMaster.status'=>1)));
    $act_id  = $_POST['activity_id'];
    $act_dat = $this->GroupActivity->find('first',array(
                                                  'joins'  =>  array(
                                                                  array(
                                                                      'table' => 'bg_user_masters',
                                                                      'alias' => 'usermaster',
                                                                      'conditions' => array('GroupActivity.user_id = usermaster.id',
                                                                                            'usermaster.status'=>1))),
                                                  'conditions'=>array('GroupActivity.id'=>$act_id,
                                                                      'GroupActivity.status'=>1),
                                                  'fields'=>array('GroupActivity.*','usermaster.*')));
    $msg_data                =  array(); 
    $msg_data['activity_id'] =  $act_id;
    $msg_data['user_id']     =  $act_dat['GroupActivity']['user_id'];
    $msg_data['message']     = 'Hii '.$act_dat['usermaster']['first_name'].'.New activity '.$act_dat['GroupActivity']['request_purpose'].' has been accepted by '.$user_data['UserMaster']['first_name'].'';
    $msg_data['status']      =  1;
    $msg_data['add_date']    = time();
    $msg_data['modify_date'] = time();
    $this->GroupActivityMessge->save($msg_data);
    return $act_id;
  }

 }

public function msgRead(){
  
  $this->autoRender = false;
  if(isset($_POST)){

    $user_id   = $_POST['user_id'];
    $user_data = $this->UserMaster->find('first',array('conditions'=>array('UserMaster.id'=>$user_id,
                                                                           'UserMaster.status'=>1)));
    $msg_id    = $_POST['msg_id'];
    $msg_data  = $this->GroupActivityMessge->find('first',array('conditions',array(
                                                                'GroupActivityMessge.id'=>$msg_id)));

        $msgRead_data                 =  array(); 
        $msgRead_data['id']           =  $msg_id;
        $msgRead_data['status']       =  2;
        $msgRead_data['modify_date']  =  time();
        $this->GroupActivityMessge->save($msgRead_data); 
        $result_string.='';
        $msg1_data = $this->GroupActivityMessge->find('first',array(
                                'joins' => array(
                                              array(
                                                  'table'      => 'bg_user_masters',
                                                  'alias'      => 'usermaster',
                                                  'conditions' => array('GroupActivityMessge.user_id = usermaster.id'))),
                                                  'conditions' =>array('GroupActivityMessge.status' =>2,
                                                                     'GroupActivityMessge.id'=>$msg_id),
                                                  'fields' =>array('GroupActivityMessge.*','usermaster.*')));

        $result_string.='<div class="modal-dialog" data-keyboard="false" data-backdrop="static">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#2bcdc1;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onClick="window.location.reload();">  &times;
                </button>
                <h4 class="modal-title cat_mod_title">
                  Message Detalis
                </h4>
            </div>
            <div class="modal-body">
                <div class="">&nbsp;</div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <span class="pull_left">Hello '.$user_data['UserMaster']['first_name'].'
                  </span>
                  <br>
                  <br>
                  <span class="connt_flex_middle_bdr123" style="color:#0f0f0f">
                    '.$msg1_data['GroupActivityMessge']['message'].'
                  </span>
                  <br>
                  <br>
                  <span class="pull_left">Thanks '.$msg1_data['usermaster']['first_name'].'
                  </span>
                </div>
            </div>
            <div class="modal-footer" style="border-top:none;">
            </div>
        </div>
    </div>';  
    print_r($result_string);die; 
   }
 }

  public function addBlogFindSegment(){

      $this->autoRender = false;

      $cat_id         = $_POST['cat_id'];
      $category_ids   = array();
      $category_ids   = explode(",",$cat_id); 
      $locality = $this->ClassSegment->find('all', array(
                                            'conditions' => array(
                                            'ClassSegment.category_id' =>$category_ids,
                                            )));

      if(!empty($locality)){
        
          $stateString = ''; 
              foreach ($locality as $state) {
                  $stateString .= '<option value="'.$state['ClassSegment']['id'].'">'.$state['ClassSegment']['segment_name'].'</option>';
              }
             print_r($stateString);die;  
      
      }
  }

  public function submitBlog(){

      $this->autoRender = false;
      $file_size  = $_FILES['FileUpload']['size'];

      if(empty($file_size)){

          if(isset($_FILES['FileUpload'])){

              $cus_id     = $_POST['user_id'];

              $user_data  = $this->UserMaster->find('first',array( 
                                                    
                                                    'conditions'=>array('UserMaster.id'=>$cus_id,
                                                    'UserMaster.status'=>1)));
                  
              $city_id      = $user_data['UserMaster']['city_id'];
              $locality_id  = $user_data['UserMaster']['locality_id'];
       
              if(!empty($cus_id)){

                $seg_id         = array();
                $seg_id         = $_POST['segment_id'];  
                $count          = count($seg_id);

                for($i=0; $i<$count;$i++){

                    $blog_data_array                      = array();
                    $blog_data_array['user_id']           = $cus_id;
                    $blog_data_array['segment_id']        = $seg_id[$i];
                    $blog_data_array['blog_title']        = $_POST['blog_topic'];
                    $blog_data_array['blog_description']  = $_POST['blog_summary'];
                    $blog_data_array['city_id']           = $city_id;
                    $blog_data_array['locality_id']       = $locality_id;  
                    $blog_data_array['status']            = 0;
                    $blog_data_array['add_date']          = time();
                    $blog_data_array['modify_date']       = time();
          
                    $this->Blog->create();  
                    
                    $blogresult =   $this->Blog->save($blog_data_array);

                }

                return 1;
            }else{
                return 2;
            }    
          }

      }else{

        if(isset($_FILES['FileUpload'])){

            $cus_id     = $_POST['user_id'];
            $user_data  = $this->UserMaster->find('first',array( 
                                    
                                                    'conditions'=>array('UserMaster.id'=>$cus_id,
                                                    'UserMaster.status'=>1)));

            $city_id      = $user_data['UserMaster']['city_id'];
            $locality_id  = $user_data['UserMaster']['locality_id'];

            $file_name  = $cus_id."_".$_FILES['FileUpload']['name'];
            $file_size  = $_FILES['FileUpload']['size']; 
            $file_tmp   = $_FILES['FileUpload']['tmp_name'];
            $file_type  = $_FILES['FileUpload']['type'];
            $get_name   = explode('.',$file_name);                    
            $final_name = mt_rand(100000,999999).'.'.$get_name[1];
            $explode_file = explode(".",$file_name);
            $countExp = count($explode_file);
            $fileExtenstion = $explode_file[$countExp-1];
            $final_img = str_replace(".","",str_replace(" ","",date("YmdHis").microtime())).".".$fileExtenstion;

            $upload=WWW_ROOT."img/blog_image/".$final_img;
                           
            if(!empty($cus_id)){

              move_uploaded_file($file_tmp ,$upload);    
              
                $seg_ids        = array();
                $seg_id         = $_POST['segment_id'];  
                $seg_ids        = explode(",",$seg_id);
                $count          = count($seg_ids); 

                for($i=0; $i<$count;$i++){

                    $blog_data_array                      = array();
                    $blog_data_array['user_id']           = $cus_id;
                    $blog_data_array['segment_id']        = $seg_ids[$i];
                    $blog_data_array['blog_title']        = $_POST['blog_topic'];
                    $blog_data_array['blog_description']  = $_POST['blog_summary'];
                    $blog_data_array['blog_image']        = $final_img;
                    $blog_data_array['city_id']           = $city_id;
                    $blog_data_array['locality_id']       = $locality_id;
                    $blog_data_array['status']            = 0;
                    $blog_data_array['add_date']          = time();
                    $blog_data_array['modify_date']       = time();
                    
                    $this->Blog->create();  
                    $blogresult =   $this->Blog->save($blog_data_array);
                }
            return 1;
          }else{
            return 2;
          }    
        }
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


  /* 31 aug   akash */
  public function changelike(){

    $this->autoRender = false; 
    if(!empty($_POST)){  
      $chech_like_data = $this->GroupActivityLike->find('first',array('conditions'=>array(
                                                                      'GroupActivityLike.user_id'=>$_POST['user_id'],
                                                                      'GroupActivityLike.activity_id'=>$_POST['activity_id'])));
      if(empty($chech_like_data)){
      
       $like_array = array();
       $like_array['user_id']     = $_POST['user_id'];
       $like_array['activity_id'] = $_POST['activity_id'];
       $like_array['status']      = 1;
       $like_array['add_date']    = time();
       $like_array['modify_date'] = time();
       $this->GroupActivityLike->save($like_array); 
       $like_count_data = $this->GroupActivityLike->find('count',array('conditions'=>array(
                                                                  'GroupActivityLike.activity_id'=>$_POST['activity_id'],
                                                                  'GroupActivityLike.status'=>1)));
        $result_string.='';

          $result_string.='<span class="connt_flex_middle_bdr123" style="color:#0f0f0f;padding-top:30px;">
                <i style="color:#00cdc6" class="fa fa-thumbs-up" aria-hidden="true"></i>
            </span>
            <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;padding-right:5px;">';
                 if(isset($like_count_data)){ 
                    $result_string.=''.$like_count_data.' ';
                 }else{
                    $result_string.='0 ';  
                 }

                $result_string.=' Likes
            </span>';
          print_r($result_string);die;
      
      }else{

        if($chech_like_data['GroupActivityLike']['status'] == 1 ){

          $this->GroupActivityLike->updateAll(array('GroupActivityLike.status' => 2,
                                                 'GroupActivityLike.modify_date' => time()),
                                           array('GroupActivityLike.user_id'     => $_POST['user_id'],
                                                 'GroupActivityLike.activity_id' => $_POST['activity_id']));

             $like_count_data = $this->GroupActivityLike->find('count',array('conditions'=>array(
                                                                        'GroupActivityLike.activity_id'=>$_POST['activity_id'],
                                                                        'GroupActivityLike.status'=>1)));

             $result_string.='<span class="connt_flex_middle_bdr123" style="color:#0f0f0f;padding-top:30px;">
                      <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                  </span>
                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;padding-right:5px;">';
                       if(isset($like_count_data)){ 

                        $result_string.=''.$like_count_data.' ';

                       }else{

                        $result_string.='0 ';  

                       }

                      $result_string.=' Likes
                  </span>';
              print_r($result_string);die;
        }

        if($chech_like_data['GroupActivityLike']['status'] == 2){


           $this->GroupActivityLike->updateAll(array('GroupActivityLike.status' => 1,
                                                 'GroupActivityLike.modify_date' => time()),
                                           array('GroupActivityLike.user_id'     => $_POST['user_id'],
                                                 'GroupActivityLike.activity_id' => $_POST['activity_id']));

             $like_count_data = $this->GroupActivityLike->find('count',array('conditions'=>array(
                                                                        'GroupActivityLike.activity_id'=>$_POST['activity_id'],
                                                                        'GroupActivityLike.status'=>1)));

             $result_string.='<span class="connt_flex_middle_bdr123" style="color:#0f0f0f;padding-top:30px;">
                      <i style="color:#00cdc6" class="fa fa-thumbs-up" aria-hidden="true"></i>
                  </span>
                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;padding-right:5px;">';
                       if(isset($like_count_data)){ 

                        $result_string.=''.$like_count_data.' ';

                       }else{

                        $result_string.='0 ';  

                       }

                      $result_string.=' Likes
                  </span>';
              print_r($result_string);die;

        }

      }
    }
  }

  public function GroupPostlike($group_id = NULL,$userid = NULL){

        $post_like_data = $this->GroupPost->find('all',array('conditions' => array(  
                                                                  'GroupPost.status'=>1,
                                                                  'GroupPost.group_id'=>$group_id)));
        $activity_id = $this->GroupPost->find('all',array('fields'=>'GroupPost.id',
                                                      'conditions'=>array(
                                                      'GroupPost.group_id'=>$group_id,
                                                      'GroupPost.status'=>1)));
        $like_array = array();  
        foreach($activity_id as  $likedata){
          $dataArray1 = $this->GroupPostLike->find('count',array('conditions'=>array(
                                                                      'GroupPostLike.post_id'=>$likedata['GroupPost']['id'],
                                                                      'GroupPostLike.status'=>1)));  
          $like_array[$likedata['GroupPost']['id']] = $dataArray1;
        } 
        return $like_array;
  }
  
  public function GroupPostcomment($group_id = NULL,$userid = NULL){   
    
    $post_like_data = $this->GroupPost->find('all',array( 'conditions' => array(  
                                                                  'GroupPost.status'=>1,
                                                                  'GroupPost.group_id'=>$group_id)));
    $activity_id = $this->GroupPost->find('all',array('fields'=>'GroupPost.id',
                                                      'conditions'=>array(
                                                      'GroupPost.group_id'=>$group_id,
                                                      'GroupPost.status'=>1)));
    $cmmt_array = array();  
    foreach($activity_id as  $cmmtdata){
      $cmmtArray12 = $this->GroupPostComment->find('count',array('conditions'=>array(
                                                                  'GroupPostComment.post_id'=>$cmmtdata['GroupPost']['id'],
                                                                  'GroupPostComment.status'=>1)));  
      $cmmt_array[$cmmtdata['GroupPost']['id']] = $cmmtArray12;
    } 
      return $cmmt_array; 
    
  }

  /* 01 akash */

  public function GroupActivityCommentData($activity_id = null){   
    
    $commt_data = $this->GroupActivityComment->find('all',array(
                                                          'joins' => array(
                                                            array(
                                                                'table'      => 'bg_user_masters',
                                                                'alias'      => 'usermaster',
                                                                'type'       => 'left', 
                                                                'conditions' => array('GroupActivityComment.user_id = usermaster.id'))),    
                                                            'conditions'=>array('GroupActivityComment.activity_id'=>$activity_id),
                                                            'fields' =>array('GroupActivityComment.*','usermaster.*')));
    return $commt_data;  
  }



  public function commentData(){

    if($_POST){

      $this->autoRender = false; 

      $grp_id   = $_POST['activity_id'];
      $user_id  = $_POST['user_id'];
      $group_activity_commt  = $this->GroupActivityCommentData($grp_id);

      $commt_count_data = $this->GroupActivityComment->find('count',array('conditions'=>array(
                                                                           'GroupActivityComment.activity_id'=>$grp_id,
                                                                           'GroupActivityComment.status'=>1)));

      if(!empty($group_activity_commt)){

        $result_string.='';
        $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="show_grp_post_data">           
                            <div class="">&nbsp;</div>
                            <div class="">&nbsp;</div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              <span style="color:#0f0f0f" class="connt_flex_middle_bdr12">';
                                if(isset($commt_count_data)){
                                        
                                        $result_string.=''.$commt_count_data.'';
                                      
                                      }else{
                                        
                                        $result_string.=' 0 ';
                                  }
                                $result_string.=' Comments </span>
                                </div>';
                              foreach ($group_activity_commt as $postdata){ 
                                $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-right comm_box2_chat_box">
                                                    <center><div class="col-xs-12 col-sm-12 col-md-1 col-lg-2 cmmt_box_de mar_pad">';
                                                        $user_pic = $postdata['usermaster']['profile_image'];
                                                          if(empty($user_pic)){ 

                                                            $result_string.='<img class="profile_pic img-circle" src="'.HTTP_ROOT.'/img/connect/dummy/pic.png" alt="img not found">';

                                                          }else{

                                                            $user_pic1 = substr($user_pic,0,4);

                                                            if($user_pic1 == 'http'){

                                                              $result_string.='<img class="profile_pic img-circle" src="'.$postdata['usermaster']['profile_image'].'" alt="img not found">';

                                                             }else{ 

                                                                if( $postdata['usermaster']['user_type_id'] == 1 ){ 

                                                                  $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Vendor/profile/'.$postdata['usermaster']['profile_image'].'" alt="img not found">';

                                                                }else{ 
                                                                  
                                                                  $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Buyer/profile/'.$postdata['usermaster']['profile_image'].'" alt="img not found">';
                                                                 
                                                                } 

                                                             } } 
                                                $result_string.='</div></center>   
                                                <div class="col-xs-12 col-sm-11 col-md-11 col-lg-10  cmmt_box_de">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r mar_pad" style="">
                                                        <span class="connt_flex_middle_bdr123 " style="color:#0f0f0f;">
                                                          '.$postdata['usermaster']['first_name'].' 
                                                        </span>
                                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">
                                                           on '.date('d M Y', $postdata['GroupActivityComment']['add_date']).' at '.date('h:i a',$postdata['GroupActivityComment']['add_date']).' 
                                                        </span>
                                                    </div> 
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r mar_pad" style="">
                                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;">
                                                          '.$postdata['GroupActivityComment']['comments'].' 
                                                        </span>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r mar_pad" style="">
                                                        <span onclick="show_reply_activity('.$postdata['GroupActivityComment']['id'].')" class="
                                                        connt_flex_middle_bdr123" style="color:#0f0f0f;cursor:pointer;">
                                                           Reply-
                                                        </span>
                                                    </div>
                                                    <div id="reply_activity_'.$postdata['GroupActivityComment']['id'].'" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r" style="display:none;">
                                                          

                                                    </div>
                                                </div>
                                            </div>  <div class="">&nbsp;</div>';
                                           } 
                                           if(!empty($user_id) && $user_type_id == 2){ 
                                           $result_string.='<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                            <fieldset class="form-group">
                                              <span style="" class="connt_flex_middle_bdr12">
                                                <strong>
                                                 Add Comment :
                                                </strong>
                                              </span>
                                              <textarea rows="6" cols="30" type="text" id="acty_cmmt_'.$grp_id.'" class="form-control input_login" placeholder="Add a comment..." style="border: 2px solid #2bcdc1 !important;"></textarea>
                                              <span class="err" id="err_acty_cmmt_'.$grp_id.'">&nbsp;</span>
                                              </fieldset>
                                              <button style="background-color:#2bcdc1;border:none;" type="button" class="btn btn-primary" onclick="post_submit('.$grp_id.')">Post</button>
                                             <div class="">&nbsp;</div>
                                          </div> 
                                        </div> ';
                                        }
                                        print_r($result_string);die;
                                        
                                   }else{

                    $result_string.='';
                   $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="show_grp_post_data">           
                            <div class="">&nbsp;</div>
                            <div class="">&nbsp;</div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              <span style="color:#0f0f0f" class="connt_flex_middle_bdr12">';
                                if(isset($commt_count_data)){
                                        
                                        $result_string.=''.$commt_count_data.'';
                                      
                                      }else{
                                        
                                        $result_string.='0 ';
                                  }
                            $result_string.=' Comments </span>
                            </div>';
                              foreach ($group_activity_commt as $postdata){ 
                                $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-right comm_box2_chat_box">
                                                    <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1 cmmt_box_de">';
                                                        $user_pic = $postdata['usermaster']['profile_image'];
                                                          if(empty($user_pic)){ 

                                                            $result_string.='<img class="profile_pic img-circle" src="'.HTTP_ROOT.'/img/connect/dummy/pic.png" alt="img not found">';

                                                          }else{

                                                            $user_pic1 = substr($user_pic,0,4);

                                                            if($user_pic1 == 'http'){

                                                                 $result_string.='<img class="profile_pic img-circle" src="'.$postdata['usermaster']['profile_image'].'" alt="img not found">';

                                                             }else{ 

                                                                if( $postdata['usermaster']['user_type_id'] == 1 ){ 

                                                                    $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Vendor/profile/'.$postdata['usermaster']['profile_image'].'" alt="img not found">';

                                                                }else{ 
                                                                  
                                                                    $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Buyer/profile/'.$postdata['usermaster']['profile_image'].'" alt="img not found">';
                                                                 
                                                                } 

                                                             } } 
                                                $result_string.='</div>   
                                                <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11  cmmt_box_de">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r" style="padding-top:15px;">
                                                        <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;padding-top:30px;">
                                                          '.$postdata['usermaster']['first_name'].' 
                                                        </span>
                                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;padding-right:5px;">
                                                           on '.date('d M Y', $postdata['GroupActivityComment']['add_date']).' at '.date('h:i a',$postdata['GroupActivityComment']['add_date']).' 
                                                        </span>
                                                    </div> 
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r" style="padding-top:15px;">
                                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;">
                                                          '.$postdata['GroupActivityComment']['comments'].' 
                                                        </span>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r" style="padding-top:15px;">
                                                        <span onclick="show_reply_activity('.$postdata['GroupActivityComment']['id'].')" class="connt_flex_middle_bdr123" style="color:#0f0f0f;cursor:pointer;
                                                            padding-top:30px;">
                                                           Reply-
                                                        </span>
                                                    </div>
                                                    <div id="reply_activity_'.$postdata['GroupActivityComment']['id'].'" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r" style="display:none;padding-top:15px;">
                                                          

                                                    </div>
                                                </div>
                                            </div>';
                                           } 
                                           if(!empty($user_id) && $user_type_id == 2){ 
                                           $result_string.='<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                            <fieldset class="form-group">
                                              <span style="" class="connt_flex_middle_bdr12">
                                                <strong>
                                                 Add Comment :
                                                </strong>
                                              </span>
                                              <textarea rows="6" cols="30" type="text" id="acty_cmmt_'.$grp_id.'" class="form-control input_login" placeholder="Add a comment..." style="border: 2px solid #2bcdc1 !important;"></textarea>
                                              <span class="err" id="err_acty_cmmt_'.$grp_id.'">&nbsp;</span>
                                              </fieldset>
                                              <button style="background-color:#2bcdc1;border:none;" type="button" class="btn btn-primary" onclick="post_submit('.$grp_id.')">Post</button>
                                             <div class="">&nbsp;</div>
                                          </div> 
                                        </div>';
                                        }
                                    print_r($result_string);die;
                }
            }   
    
          }

        public function activityPostCommt(){

          $this->autoRender = false; 
            if(isset($_POST)){

              $activity_cmmt_array      = array();
              $activity_cmmt_array['activity_id'] = $_POST['activity_id'];
              $activity_cmmt_array['user_id']     = $_POST['user_id'];
              $activity_cmmt_array['comments']    = $_POST['comment'];
              $activity_cmmt_array['status']      = 1;
              $activity_cmmt_array['add_date']    = time();
              $activity_cmmt_array['modify_date'] = time();

              $result  = $this->GroupActivityComment->save($activity_cmmt_array);
              
              //print_r($result);die;  

              if(isset($result)){

                $grp_id = $_POST['activity_id'];
                $group_activity_commt  = $this->GroupActivityCommentData($grp_id);
                $commt_count_data = $this->GroupActivityComment->find('count',array('conditions'=>array(
                                                                           'GroupActivityComment.activity_id'=>$grp_id,
                                                                           'GroupActivityComment.status'=>1)));

                $append_data  = array();

                $result_string.='';
                $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="show_grp_post_data">           
                            <div class="">&nbsp;</div>
                            <div class="">&nbsp;</div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              <span style="color:#0f0f0f" class="connt_flex_middle_bdr12">';
                                if(isset($commt_count_data)){
                                        
                                        $result_string.=''.$commt_count_data.'';
                                      
                                      }else{
                                        
                                        $result_string.='0 ';
                                  }
                            $result_string.=' Comments </span>
                            </div>';
                              foreach ($group_activity_commt as $postdata){ 
                                $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-right comm_box2_chat_box">
                                                    <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1 cmmt_box_de">';
                                                        $user_pic = $postdata['usermaster']['profile_image'];
                                                          if(empty($user_pic)){ 

                                                            $result_string.='<img class="profile_pic img-circle" src="'.HTTP_ROOT.'/img/connect/dummy/pic.png" alt="img not found">';

                                                          }else{

                                                            $user_pic1 = substr($user_pic,0,4);

                                                            if($user_pic1 == 'http'){

                                                              $result_string.='<img class="profile_pic img-circle" src="'.$postdata['usermaster']['profile_image'].'" alt="img not found">';

                                                             }else{ 

                                                                if( $postdata['usermaster']['user_type_id'] == 1 ){ 

                                                                    $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Vendor/profile/'.$postdata['usermaster']['profile_image'].'" alt="img not found">';

                                                                }else{ 
                                                                  
                                                                    $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Buyer/profile/'.$postdata['usermaster']['profile_image'].'" alt="img not found">';
                                                                 
                                                                } 

                                                             } } 
                                                $result_string.='</div>   
                                                <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11  cmmt_box_de">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r" style="padding-top:15px;">
                                                        <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;padding-top:30px;">
                                                          '.$postdata['usermaster']['first_name'].' 
                                                        </span>
                                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;padding-right:5px;">
                                                           on '.date('d M Y', $postdata['GroupActivityComment']['add_date']).' at '.date('h:i a',$postdata['GroupActivityComment']['add_date']).' 
                                                        </span>
                                                        <span onclick="show_reply_activity('.$postdata['GroupActivityComment']['id'].')" class="connt_flex_middle_bdr123" style="color:#0f0f0f;cursor:pointer;
                                                            padding-top:30px;">
                                                           Reply-
                                                        </span>
                                                    </div> 
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r" style="padding-top:15px;">
                                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;">
                                                          '.$postdata['GroupActivityComment']['comments'].' 
                                                        </span>
                                                    </div>
                                                    <div id="reply_activity_'.$postdata['GroupActivityComment']['id'].'" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r" style="display:none;padding-top:15px;">
                                                          

                                                    </div>
                                                </div>
                                            </div>';
                                           } 
                                           $result_string.='<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                            <fieldset class="form-group">
                                              <span style="" class="connt_flex_middle_bdr12">
                                                <strong>
                                                 Add Comment :
                                                </strong>
                                              </span>
                                              <textarea rows="6" cols="30" type="text" id="acty_cmmt_'.$grp_id.'" class="form-control input_login" placeholder="Add a comment..." style="border: 2px solid #2bcdc1 !important;"></textarea>
                                              <span class="err" id="err_acty_cmmt_'.$grp_id.'">&nbsp;</span>
                                              </fieldset>
                                              <button style="background-color:#2bcdc1;border:none;" type="button" class="btn btn-primary" onclick="post_submit('.$grp_id.')">Post</button>
                                             <div class="">&nbsp;</div>
                                          </div> 
                                        </div>';

                                      $result_string2.='<span class="connt_flex_middle_bdr123" style="color:#0f0f0f;padding-top:30px;">
                                                   <i class="fa fa-comments" aria-hidden="true"></i>
                                                </span>
                                                <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;padding-right:5px;">';
                                                   if(isset($commt_count_data)){
                                                  
                                                  $result_string2.=''.$commt_count_data.'';
                                                
                                                }else{
                                                  
                                                  $result_string2.='0 ';
                                            }
                                      $result_string2.=' Comments </span>';                      
                                        
                      $append_data[0] = $result_string;
                      $append_data[1] = $result_string2;
                      print_r(json_encode($append_data));die;
              }
            } 

         }

        /* group post like and commt function  */

        public function changepostlike(){

          $this->autoRender = false; 
          if(!empty($_POST)){  
            

            $chech_likepost_data = $this->GroupPostLike->find('first',array('conditions'=>array(
                                                                            'GroupPostLike.user_id'=>$_POST['user_id'],
                                                                            'GroupPostLike.post_id'=>$_POST['post_id'])));

          //  print_r($chech_likepost_data);die;

            if(empty($chech_likepost_data)){
             
             $likepost_array = array();
             $likepost_array['user_id']     = $_POST['user_id'];
             $likepost_array['post_id']     = $_POST['post_id'];
             $likepost_array['status']      = 1;
             $likepost_array['add_date']    = time();
             $likepost_array['modify_date'] = time();
             $this->GroupPostLike->save($likepost_array); 


             $likepost_count_data = $this->GroupPostLike->find('count',array('conditions'=>array(
                                                                        'GroupPostLike.post_id'=>$_POST['post_id'],
                                                                        'GroupPostLike.status'=>1)));
              $result_string.='';

                $result_string.='<span class="connt_flex_middle_bdr123" style="color:#0f0f0f;padding-top:30px;">
                      <i style="color:#00cdc6" class="fa fa-thumbs-up" aria-hidden="true"></i>
                  </span>
                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;padding-right:5px;">';
                       if(isset($likepost_count_data)){ 
                          $result_string.=''.$likepost_count_data.' ';
                       }else{
                          $result_string.='0 ';  
                       }

                      $result_string.=' Likes
                  </span>';
                print_r($result_string);die;
            
            }else{

              if($chech_likepost_data['GroupPostLike']['status'] == 1 ){

                $this->GroupPostLike->updateAll(array('GroupPostLike.status' => 2,
                                                       'GroupPostLike.modify_date' => time()),
                                                 array('GroupPostLike.user_id'     => $_POST['user_id'],
                                                       'GroupPostLike.post_id'     => $_POST['post_id']));

                $likepost_count_data = $this->GroupPostLike->find('count',array('conditions'=>array(
                                                                        'GroupPostLike.post_id'=>$_POST['post_id'],
                                                                        'GroupPostLike.status'=>1)));

                   $result_string.='<span class="connt_flex_middle_bdr123" style="color:#0f0f0f;padding-top:30px;">
                            <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                        </span>
                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;padding-right:5px;">';
                             if(isset($likepost_count_data)){ 

                              $result_string.=''.$likepost_count_data.' ';

                             }else{

                              $result_string.='0 ';  

                             }

                            $result_string.=' Likes
                        </span>';
                    print_r($result_string);die;
              }

             if($chech_likepost_data['GroupPostLike']['status'] == 2){

                $this->GroupPostLike->updateAll(array('GroupPostLike.status' => 1,
                                                       'GroupPostLike.modify_date' => time()),
                                                 array('GroupPostLike.user_id'     => $_POST['user_id'],
                                                       'GroupPostLike.post_id'     => $_POST['post_id']));
                $likepost_count_data = $this->GroupPostLike->find('count',array('conditions'=>array(
                                                                        'GroupPostLike.post_id'=>$_POST['post_id'],
                                                                        'GroupPostLike.status'=>1)));

                   $result_string.='<span class="connt_flex_middle_bdr123" style="color:#0f0f0f;padding-top:30px;">
                            <i style="color:#00cdc6" class="fa fa-thumbs-up" aria-hidden="true"></i>
                        </span>
                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;padding-right:5px;">';
                             if(isset($likepost_count_data)){ 

                              $result_string.=''.$likepost_count_data.' ';

                             }else{

                              $result_string.='0 ';  

                             }

                            $result_string.=' Likes
                        </span>';
                  print_r($result_string);die;
              }
            }
          }
      }

      public function GroupPostCommentData($post_id = null){   
    
          $commt_data = $this->GroupPostComment->find('all',array(
                                                      'joins' => array(
                                                        array(
                                                            'table'      => 'bg_user_masters',
                                                            'alias'      => 'usermaster',
                                                            'type'       => 'left', 
                                                            'conditions' => array('GroupPostComment.user_id = usermaster.id'))),    
                                                        'conditions'=>array('GroupPostComment.post_id'=>$post_id),
                                                        'fields' =>array('GroupPostComment.*','usermaster.*')));
          return $commt_data;  
      }

      public function commentPostData(){

              if($_POST){
        
                $this->autoRender = false; 
                $user    = $this->Session->read('User');
                $user_id = $user['UserMaster']['id'];
                $grp_id  = $_POST['post_id'];
                  
                $group_post_commt  =  $this->GroupPostComment->find('all',array(
                                                      'joins' => array(
                                                        array(
                                                            'table'      => 'bg_user_masters',
                                                            'alias'      => 'usermaster',
                                                            'type'       => 'left', 
                                                            'conditions' => array('GroupPostComment.user_id = usermaster.id'))),    
                                                        'conditions'=>array('GroupPostComment.post_id'=>$grp_id),
                                                        'fields' =>array('GroupPostComment.*','usermaster.*')));

                $commtpost_count_data = $this->GroupPostComment->find('count',array('conditions'=>array(
                                                                                     'GroupPostComment.post_id'=>$grp_id,
                                                                                     'GroupPostComment.status'=>1)));


                  $result_string.='';

                  $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="show_grp_post_data12">           
                                <div class="">&nbsp;</div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                  <span style="color:#0f0f0f" class="connt_flex_middle_bdr12">';
                                    if(isset($commtpost_count_data)){
                                      $result_string.='' .$commtpost_count_data. '';
                                    }else{      
                                      $result_string.=' 0 ';
                                    }

                  $result_string.=' Comments </span>
                  </div><div class="">&nbsp;</div>';
                    foreach ($group_post_commt as $postdata){ 
                         
                                $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-right comm_box2_chat_box">
                                        <center>
                                        <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2 cmmt_box_de mar_pad">';
                                            $user_pic = $postdata['usermaster']['profile_image'];
                                              if(empty($user_pic)){ 

                                                $result_string.='<img class="profile_pic img-circle" src="'.HTTP_ROOT.'/img/connect/dummy/pic.png" alt="img not found">';

                                              }else{

                                                $user_pic1 = substr($user_pic,0,4);

                                                if($user_pic1 == 'http'){

                                                  $result_string.='<img class="profile_pic img-circle" src="'.$postdata['usermaster']['profile_image'].'" alt="img not found">';

                                                 }else{ 

                                                 if( $postdata['usermaster']['user_type_id'] == 1 ){ 

                                                      $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Vendor/profile/'.$postdata['usermaster']['profile_image'].'" alt="img not found">';

                                                  }else{ 
                                                    
                                                      $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Buyer/profile/'.$postdata['usermaster']['profile_image'].'" alt="img not found">';
                                                   
                                                  } 

                                                 } } 

                                  $result_string.='</div></center>   
                                  <div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 cmmt_box_de">
                                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r mar_pad">
                                          <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;">
                                            '.$postdata['usermaster']['first_name'].' 
                                          </span>
                                          <span class="connt_flex_middle_bdr123 " style="color:#5b595c;padding-right:5px;">
                                             on '.date('d M Y', $postdata['GroupPostComment']['add_date']).' at '.date('h:i a',$postdata['GroupPostComment']['add_date']).' 
                                          </span>
                                      </div> 
                                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r mar_pad">
                                          <span class="connt_flex_middle_bdr123" style="color:#5b595c;">
                                            '.$postdata['GroupPostComment']['comments'].' 
                                          </span>
                                      </div>
                                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r mar_pad" style="">
                                          <span onclick="show_reply_post('.$postdata['GroupPostComment']['id'].')" class="
                                          connt_flex_middle_bdr123" style="color:#0f0f0f;cursor:pointer;">
                                             Reply-
                                          </span>
                                      </div>
                                      <div id="reply_post_'.$postdata['GroupPostComment']['id'].'" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r" style="display:none;">
                                                          

                                      </div>
                                  </div>
                              </div><div class="">&nbsp;</div>';
                             }

                             if(!empty($user_id) && $user_type_id == 2){ 

                             $result_string.='<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                              <fieldset class="form-group">
                                <span style="" class="connt_flex_middle_bdr12">
                                  <strong>
                                   Add Comment :
                                  </strong>
                                </span>
                                <textarea rows="6" cols="30" type="text" id="pst_cmmt_'.$grp_id.'" class="form-control input_login" placeholder="Add a comment..." style="border: 2px solid #2bcdc1 !important;"></textarea>
                                <span class="err" id="err_pst_cmmt_'.$grp_id.'">&nbsp;</span>
                                </fieldset>
                                <button style="background-color:#2bcdc1;border:none;" type="button" class="btn btn-primary" onclick="group_post_submit('.$grp_id.')">Post</button>
                               <div class="">&nbsp;</div>
                            </div> 
                          </div>';
                  }

                  print_r($result_string);die; 
        }
    }
      


    public function activityGroupPostCommt(){

          $this->autoRender = false; 
            if(isset($_POST)){

              $post_cmmt_array                = array();
              $post_cmmt_array['post_id']     = $_POST['post_id'];
              $post_cmmt_array['user_id']     = $_POST['user_id'];
              $post_cmmt_array['comments']    = $_POST['comment'];
              $post_cmmt_array['status']      = 1;
              $post_cmmt_array['add_date']    = time();
              $post_cmmt_array['modify_date'] = time();

              $result  = $this->GroupPostComment->save($post_cmmt_array);
            

              if(isset($result)){

                $grp_id = $_POST['post_id'];
                $group_post_commt     = $this->GroupPostCommentData($grp_id);
                $commtpost_count_data = $this->GroupPostComment->find('count',array('conditions'=>array(
                                                                           'GroupPostComment.post_id'=>$grp_id,
                                                                           'GroupPostComment.status'=>1)));
                $append_data12  = array();

                $result_string.='';
                $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="show_grp_post_data12">           
                                <div class="">&nbsp;</div>
                                <div class="">&nbsp;</div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <span style="color:#0f0f0f" class="connt_flex_middle_bdr12">';
                                if(isset($commtpost_count_data)){
                                        
                                        $result_string.=''.$commtpost_count_data.'';
                                      
                                }else{
                                        
                                        $result_string.='0 ';
                                }
                            $result_string.=' Comments </span>
                            </div>';
                              foreach ($group_post_commt as $postdata){ 
                                $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-right comm_box2_chat_box">
                                                    <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1 cmmt_box_de">';
                                                        $user_pic = $postdata['usermaster']['profile_image'];
                                                          if(empty($user_pic)){ 

                                                            $result_string.='<img class="profile_pic img-circle" src="'.HTTP_ROOT.'/img/connect/dummy/pic.png" alt="img not found">';

                                                          }else{

                                                            $user_pic1 = substr($user_pic,0,4);

                                                            if($user_pic1 == 'http'){

                                                              $result_string.='<img class="profile_pic img-circle" src="'.$postdata['usermaster']['profile_image'].'" alt="img not found">';

                                                             }else{ 

                                                                if( $postdata['usermaster']['user_type_id'] == 1 ){ 

                                                                    $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Vendor/profile/'.$postdata['usermaster']['profile_image'].'" alt="img not found">';
                                                               
                                                                }else{ 
                                                                  
                                                                    $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Buyer/profile/'.$postdata['usermaster']['profile_image'].'" alt="img not found">';
                                                                 
                                                                } 

                                                             } } 
                                                $result_string.='</div>   
                                                <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11  cmmt_box_de">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r" style="padding-top:15px;">
                                                        <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;padding-top:30px;">
                                                          '.$postdata['usermaster']['first_name'].' 
                                                        </span>
                                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;padding-right:5px;">
                                                           on '.date('d M Y', $postdata['GroupPostComment']['add_date']).' at '.date('h:i a',$postdata['GroupPostComment']['add_date']).' 
                                                        </span>
                                                    </div> 
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r" style="padding-top:15px;">
                                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;">
                                                          '.$postdata['GroupPostComment']['comments'].' 
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>';
                                           } 

                                           $result_string.='<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                            <fieldset class="form-group">
                                              <span style="" class="connt_flex_middle_bdr12">
                                                <strong>
                                                 Add Comment :
                                                </strong>
                                              </span>
                                              <textarea rows="6" cols="30" type="text" id="pst_cmmt_'.$grp_id.'" class="form-control input_login" placeholder="Add a comment..." style="border: 2px solid #2bcdc1 !important;"></textarea>
                                              <span class="err" id="err_pst_cmmt_'.$grp_id.'">&nbsp;</span>
                                              </fieldset>
                                              <button style="background-color:#2bcdc1;border:none;" type="button" class="btn btn-primary" onclick="group_post_submit('.$grp_id.')">Post</button>
                                             <div class="">&nbsp;</div>
                                          </div> 
                                        </div>';

                                      $result_string2.='<span class="connt_flex_middle_bdr123" style="color:#0f0f0f;padding-top:30px;">
                                                   <i class="fa fa-comments" aria-hidden="true"></i>
                                                </span>
                                                <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;padding-right:5px;">';
                                                   if(isset($commtpost_count_data)){
                                                  
                                                  $result_string2.=''.$commtpost_count_data.'';
                                                
                                                }else{
                                                  
                                                  $result_string2.='0 ';
                                            }
                                      $result_string2.=' Comments </span>';                      
                                        
                      $append_data12[0] = $result_string;
                      $append_data12[1] = $result_string2;
                      print_r(json_encode($append_data12));die;
              }
            } 

        }


        public function allConnectGroup(){

          $this->layout='index_layout';
          $user    = $this->Session->read('User');
          $user_id = $user['UserMaster']['id'];
          $this->set('user_view',$user);
          $this->checkUser();
          $category_data = $this->ConnectGroup->find('all',array('conditions'=>array(
                                                             'ConnectGroup.status'=>1)));  
            if(empty($category_data)){
              $emptydata = 1;
              $this->set('emptydata',$emptydata);
            }else{
              $this->set('category_data',$category_data);
            }
          }

  /* akash 05 sept */

  public function blogChangeLike(){

    $this->autoRender = false; 
    if(!empty($_POST)){  

      $chech_like_data = $this->BlogLike->find('first',array('conditions'=>array(
                                                                      'BlogLike.user_id'=>$_POST['user_id'],
                                                                      'BlogLike.blog_id'=>$_POST['blog_like_id'])));

      if(empty($chech_like_data)){
      
       $like_array = array();
       $like_array['user_id']     = $_POST['user_id'];
       $like_array['blog_id']     = $_POST['blog_like_id'];
       $like_array['status']      = 1;
       $like_array['add_date']    = time();
       $like_array['modify_date'] = time();
       $this->BlogLike->save($like_array); 
       $like_count_data = $this->BlogLike->find('count',array('conditions'=>array(
                                                                  'BlogLike.blog_id'=>$_POST['blog_like_id'],
                                                                  'BlogLike.status'=>1)));
        $result_string.='';
        $result_string.='<i style="color:#2bcdc1" class="fa fa-thumbs-up coont_box2_icon121" aria-hidden="true" style="cursor:pointer"></i>
                          <span class="coont_box2_icon">';
                             if(isset($like_count_data)){ 
                                  $result_string.=''.$like_count_data.' ';
                               }else{
                                  $result_string.='0 ';  
                               }
        $result_string.=' </span>';
        print_r($result_string);die;  
      }else{

        if($chech_like_data['BlogLike']['status'] == 1 ){

            $this->BlogLike->updateAll(array('BlogLike.status' => 2,
                                                 'BlogLike.modify_date' => time()),
                                           array('BlogLike.user_id'     => $_POST['user_id'],
                                                 'BlogLike.blog_id'     => $_POST['blog_like_id']));

             $like_count_data = $this->BlogLike->find('count',array('conditions'=>array(
                                                                  'BlogLike.blog_id'=>$_POST['blog_like_id'],
                                                                  'BlogLike.status'=>1)));

             $result_string.='';
              $result_string.='<i class="fa fa-thumbs-up coont_box2_icon121" aria-hidden="true" style="cursor:pointer"></i>
                                <span class="coont_box2_icon">';
                                   if(isset($like_count_data)){ 
                                        $result_string.=''.$like_count_data.' ';
                                     }else{
                                        $result_string.='0 ';  
                                     }
              $result_string.='  </span>';
              print_r($result_string);die;  
          }

         if($chech_like_data['BlogLike']['status'] == 2){

          $this->BlogLike->updateAll(array('BlogLike.status' => 1,
                                                 'BlogLike.modify_date' => time()),
                                           array('BlogLike.user_id'     => $_POST['user_id'],
                                                 'BlogLike.blog_id'     => $_POST['blog_like_id']));

            $like_count_data = $this->BlogLike->find('count',array('conditions'=>array(
                                                                  'BlogLike.blog_id'=>$_POST['blog_like_id'],
                                                                  'BlogLike.status'=>1)));

              $result_string.='';
              $result_string.='<i style="color:#2bcdc1" class="fa fa-thumbs-up coont_box2_icon121" aria-hidden="true" style="cursor:pointer"></i>
                                <span class="coont_box2_icon">';
                                   if(isset($like_count_data)){ 
                                        $result_string.=''.$like_count_data.' ';
                                     }else{
                                        $result_string.='0 ';  
                                     }
              $result_string.=' </span>';
              print_r($result_string);die;  
        }

      }
    }
  }

  public function blogCommentData(){

    if(isset($_POST)){

      $this->autoRender = false; 
      $blog_id          = $_POST['blog_ids'];
      $user_id          = $_POST['user_id'];

      $userdata         = $this->UserMaster->find('first',array('conditions' => array(
                                                                'UserMaster.id' => $user_id,
                                                                'UserMaster.status' => 1)));
      
      $user_type_id     = $userdata['UserMaster']['user_type_id'];

      $blog_commt       = $this->blogData($blog_id);
      $commt_count_data = $this->BlogComment->find('count',array('conditions'=>array(
                                                                           'BlogComment.blog_id'=>$blog_id,
                                                                           'BlogComment.status'=>1)));
    if(!empty($blog_commt)){

        $result_string.='';
        $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="show_grp_post_data">           
                            <div class="">&nbsp;</div>
                            <div class="">&nbsp;</div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              <span style="color:#0f0f0f" class="connt_flex_middle_bdr12">';
                                if(isset($commt_count_data)){
                                        
                                        $result_string.=''.$commt_count_data.'';
                                      
                                      }else{
                                        
                                        $result_string.='0 ';
                                  }
                            $result_string.=' Comments </span>
                            </div>';
                              foreach ($blog_commt as $postdata){ 
                                $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-right comm_box2_chat_box">
                                                  <center>
                                                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 cmmt_box_de mar_pad">';
                                                        $user_pic = $postdata['usermaster']['profile_image'];
                                                          if(empty($user_pic)){ 

                                                            $result_string.='<img class="profile_pic img-circle" src="'.HTTP_ROOT.'/img/connect/dummy/pic.png" alt="img not found">';

                                                          }else{

                                                            $user_pic1 = substr($user_pic,0,4);

                                                            if($user_pic1 == 'http'){

                                                              $result_string.='<img class="profile_pic img-circle" src="'.$postdata['usermaster']['profile_image'].'" alt="img not found">';

                                                             }else{ 

                                                                if( $postdata['usermaster']['user_type_id'] == 1 ){ 

                                                                    $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Vendor/profile/'.$postdata['usermaster']['profile_image'].'" alt="img not found">';
                                                               
                                                                }else{ 
                                                                  
                                                                    $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Buyer/profile/'.$postdata['usermaster']['profile_image'].'" alt="img not found">';
                                                                 
                                                                } 

                                                             } } 
                                                $result_string.='</div></center>   
                                                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-10  cmmt_box_de">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r mar_pad">
                                                        <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;">
                                                          '.$postdata['usermaster']['first_name'].' 
                                                        </span>
                                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">
                                                           on '.date('d M Y', $postdata['BlogComment']['add_date']).' at '.date('h:i a',$postdata['BlogComment']['add_date']).' 
                                                        </span>
                                                    </div> 
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r mar_pad">
                                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;">
                                                          '.$postdata['BlogComment']['comment'].' 
                                                        </span>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r mar_pad">
                                                        <span onclick="show_reply_blog('.$postdata['BlogComment']['id'].')" class="connt_flex_middle_bdr123" style="color:#0f0f0f;cursor:pointer;
                                                            ">
                                                           Reply-
                                                        </span>
                                                    </div>
                                                    <div id="reply_blog_'.$postdata['BlogComment']['id'].'" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r" style="display:none;">
                                                          

                                                    </div>
                                                </div>
                                            </div><div class="">&nbsp;</div>';
                                           }
                                          
                                           if(!empty($user_id) && $user_type_id == 2){

                                           $result_string.='<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                            <fieldset class="form-group">
                                              <span style="" class="connt_flex_middle_bdr12">
                                                <strong>
                                                 Add Comment :
                                                </strong>
                                              </span>
                                              <textarea rows="6" cols="30" type="text" id="acty_cmmt_'.$blog_id.'" class="form-control input_login" placeholder="Add a comment..." style="border: 2px solid #2bcdc1 !important;"></textarea>
                                              <span class="err" id="err_acty_cmmt_'.$blog_id.'">&nbsp;</span>
                                              </fieldset>
                                              <button style="background-color:#2bcdc1;border:none;" type="button" class="btn btn-primary" onclick="post_submit('.$blog_id.')">Post</button>
                                             <div class="">&nbsp;</div>
                                          </div> 
                                        </div>';
                                        }
                                        print_r($result_string);die;

                                   }else{

                   $result_string.='';
                   $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="show_grp_post_data">           
                                    <div class="">&nbsp;</div>
                                    <div class="">&nbsp;</div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mar_pad">
                              <span style="color:#0f0f0f" class="connt_flex_middle_bdr12">';
                                if(isset($commt_count_data)){
                                        
                                        $result_string.=''.$commt_count_data.'';
                                      
                                      }else{
                                        
                                        $result_string.='0 ';
                                  }
                            $result_string.=' Comments </span>
                            </div>';
                              foreach ($blog_commt as $postdata){ 
                                $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-right comm_box2_chat_box">
                                                    <center><div class="col-xs-12 col-sm-12 col-md-1 col-lg-1 cmmt_box_de">';
                                                        $user_pic = $postdata['usermaster']['profile_image'];
                                                          if(empty($user_pic)){ 

                                                            $result_string.='<img class="profile_pic img-circle" src="'.HTTP_ROOT.'/img/connect/dummy/pic.png" alt="img not found">';

                                                          }else{

                                                            $user_pic1 = substr($user_pic,0,4);

                                                            if($user_pic1 == 'http'){

                                                              $result_string.='<img class="profile_pic img-circle" src="'.$postdata['usermaster']['profile_image'].'" alt="img not found">';

                                                             }else{ 

                                                                if( $postdata['usermaster']['user_type_id'] == 1 ){ 

                                                                    $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Vendor/profile/'.$postdata['usermaster']['profile_image'].'" alt="img not found">';
                                                               
                                                                }else{ 
                                                                  
                                                                    $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Buyer/profile/'.$postdata['usermaster']['profile_image'].'" alt="img not found">';
                                                                 
                                                                } 

                                                             } } 
                                                $result_string.='</div></center>   
                                                <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11  cmmt_box_de">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r mar_pad" >
                                                        <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;">
                                                          '.$postdata['usermaster']['first_name'].' 
                                                        </span>
                                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">
                                                           on '.date('d M Y', $postdata['BlogComment']['add_date']).' at '.date('h:i a',$postdata['BlogComment']['add_date']).' 
                                                        </span>
                                                    </div> 
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r mar_pad">
                                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;">
                                                          '.$postdata['BlogComment']['comment'].' 
                                                        </span>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r mar_pad">
                                                      <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;cursor:pointer;
                                                            ">
                                                           Reply-
                                                      </span>
                                                    </div>
                                                    <div id="reply_blog_'.$postdata['BlogComment']['id'].'" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r" style="display:none;">
                                                          

                                                    </div>
                                                </div>
                                            </div><div class="">&nbsp;</div>';
                                           }
                                          if(!empty($user_id) && $user_type_id == 2 ){

                                               $result_string.='
                                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                                <fieldset class="form-group">
                                                  <span style="" class="connt_flex_middle_bdr12">
                                                    <strong>
                                                     Add Comment :
                                                    </strong>
                                                  </span>
                                                  <textarea rows="6" cols="30" type="text" id="acty_cmmt_'.$blog_id.'" class="form-control input_login" placeholder="Add a comment..." style="border: 2px solid #2bcdc1 !important;"></textarea>
                                                  <span class="err" id="err_acty_cmmt_'.$blog_id.'">&nbsp;</span>
                                                  </fieldset>
                                                  <button style="background-color:#2bcdc1;border:none;" type="button" class="btn btn-primary" onclick="post_submit('.$blog_id.')">Post</button>
                                                 <div class="">&nbsp;</div>
                                              </div> 
                                            </div>';
                                      }
                            print_r($result_string);die;
                }
            }   
    
      }
  
  Public function blogData($blog_id = null){   
    
    $commt_data = $this->BlogComment->find('all',array(
                                            'joins' => array(
                                              array(
                                                  'table'      => 'bg_user_masters',
                                                  'alias'      => 'usermaster',
                                                  'type'       => 'left', 
                                                  'conditions' => array('BlogComment.user_id = usermaster.id'))),    
                                              'conditions'=>array('BlogComment.blog_id'=>$blog_id),
                                              'fields' =>array('BlogComment.*','usermaster.*')));
    return $commt_data; 
  }


   public function blogCommtPost(){

          $this->autoRender = false; 
            if(isset($_POST)){

              $blog_cmmt_array      = array();
              $blog_cmmt_array['blog_id']     = $_POST['blog_id'];
              $blog_cmmt_array['user_id']     = $_POST['user_id'];
              $blog_cmmt_array['comment']     = $_POST['comment'];
              $blog_cmmt_array['status']      = 1;
              $blog_cmmt_array['add_date']    = time();
              $blog_cmmt_array['modify_date'] = time();

              $result  = $this->BlogComment->save($blog_cmmt_array);

              //print_r($result);die;  

              if(isset($result)){

                $blog_id  = $_POST['blog_id'];
                $blog_commt  = $this->blogData($blog_id);
                $commt_count_data = $this->BlogComment->find('count',array('conditions'=>array(
                                                                           'BlogComment.blog_id'=>$blog_id,
                                                                           'BlogComment.status'=>1)));

                $append_data  = array();

                $result_string.='';
                $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="show_grp_post_data">           
                            <div class="">&nbsp;</div>
                            <div class="">&nbsp;</div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              <span style="color:#0f0f0f" class="connt_flex_middle_bdr12">';
                                if(isset($commt_count_data)){
                                        
                                        $result_string.=''.$commt_count_data.'';
                                      
                                      }else{
                                        
                                        $result_string.='0 ';
                                  }
                            $result_string.=' Comments </span>
                            </div>';
                              foreach ($blog_commt as $postdata){ 
                                $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-right comm_box2_chat_box">
                                                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 cmmt_box_de">';
                                                        $user_pic = $postdata['usermaster']['profile_image'];
                                                          if(empty($user_pic)){ 

                                                            $result_string.='<img class="profile_pic img-circle" src="'.HTTP_ROOT.'/img/connect/dummy/pic.png" alt="img not found">';

                                                          }else{

                                                            $user_pic1 = substr($user_pic,0,4);

                                                            if($user_pic1 == 'http'){

                                                              $result_string.='<img class="profile_pic img-circle" src="'.$postdata['usermaster']['profile_image'].'" alt="img not found">';

                                                             }else{ 

                                                                if( $postdata['usermaster']['user_type_id'] == 1 ){ 

                                                                    $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Vendor/profile/'.$postdata['usermaster']['profile_image'].'" alt="img not found">';
                                                               
                                                                }else{ 
                                                                  
                                                                    $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Buyer/profile/'.$postdata['usermaster']['profile_image'].'" alt="img not found">';
                                                                 
                                                                } 

                                                             } } 
                                                $result_string.='</div>   
                                                <div class="col-xs-12 col-sm-11 col-md-9 col-lg-9  cmmt_box_de">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r" style="padding-top:15px;">
                                                        <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;padding-top:30px;">
                                                          '.$postdata['usermaster']['first_name'].' 
                                                        </span>
                                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;padding-right:5px;">
                                                           on '.date('d M Y', $postdata['BlogComment']['add_date']).' at '.date('h:i a',$postdata['BlogComment']['add_date']).' 
                                                        </span>
                                                    </div> 
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r" style="padding-top:15px;">
                                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;">
                                                          '.$postdata['BlogComment']['comment'].' 
                                                        </span>
                                                    </div>
                                                </div>
                                            </div><div class="">&nbsp;</div>';
                                           } 
                                           $result_string.='<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                            <fieldset class="form-group">
                                              <span style="" class="connt_flex_middle_bdr12">
                                                <strong>
                                                 Add Comment :
                                                </strong>
                                              </span>
                                              <textarea rows="6" cols="30" type="text" id="acty_cmmt_'.$blog_id.'" class="form-control input_login" placeholder="Add a comment..." style="border: 2px solid #2bcdc1 !important;"></textarea>
                                              <span class="err" id="err_acty_cmmt_'.$blog_id.'">&nbsp;</span>
                                              </fieldset>
                                              <button style="background-color:#2bcdc1;border:none;" type="button" class="btn btn-primary" onclick="post_submit('.$blog_id.')">Post</button>
                                             <div class="">&nbsp;</div>
                                          </div> 
                                        </div>';

                                      
                                      $result_string2.='';
                                      $result_string2.='<i class="fa fa-comments coont_box2_icon121" aria-hidden="true"></i>
                                        <span class="coont_box2_icon">';
                                            if(isset($commt_count_data)){
                                                  
                                                  $result_string2.=''.$commt_count_data.'';
                                                
                                                }else{
                                                  
                                                  $result_string2.='0 ';
                                            }      
                                          $result_string2.='  COMMENTS </span>';  
                                             
                      $append_data[0] = $result_string;
                      $append_data[1] = $result_string2;
                      print_r(json_encode($append_data));die;
              }
            } 

        } 

  public function submitPost(){

      $this->autoRender = false;
      $file_size  = $_FILES['postFileUpload']['size'];

        if(empty($file_size)){
              
              if(isset($_FILES['FileUpload'])){

                  $cus_id     = $_POST['user_id'];
                  $user_data  = $this->UserMaster->find('first',array( 
                                                   
                                                    'conditions'=>array('UserMaster.id'=>$cus_id,
                                                    'UserMaster.status'=>1)));

                  if(!empty($cus_id)){

                      $seg_id         = array();
                      $seg_id         = $_POST['segment_id'];  
                      $count          = count($seg_id);

                      for($i=0; $i<$count;$i++){  

                        $post_data_array                      = array();
                        $post_data_array['user_id']           = $cus_id;
                        $post_data_array['segment_id']        = $seg_id[$i];
                        $post_data_array['post_title']        = $_POST['post_topic'];
                        $post_data_array['post_description']  = $_POST['post_summary'];
                        $post_data_array['city_id']           = $user_data['UserMaster']['city_id'];
                        $post_data_array['locality_id']       = $user_data['UserMaster']['locality_id'];
                        $post_data_array['status']            = 1;
                        $post_data_array['add_date']          = time();
                        $post_data_array['modify_date']       = time();
                        
                        $this->Post->create();  
                        $postresult =   $this->Post->save($post_data_array);

                      }  
                  
                      return 1;
                  }else{
                      return 2;
                  }    
              }

        }else{

            if(isset($_FILES['postFileUpload'])){
                  $cus_id     = $_POST['user_id'];
                  $user_data  = $this->UserMaster->find('first',array( 
                                          
                                                    'conditions'=>array('UserMaster.id'=>$cus_id,
                                                    'UserMaster.status'=>1)));

                  $file_name  = $cus_id."_".$_FILES['postFileUpload']['name'];
                  $file_size  = $_FILES['postFileUpload']['size']; 
                  $file_tmp   = $_FILES['postFileUpload']['tmp_name'];
                  $file_type  = $_FILES['postFileUpload']['type'];
                  $get_name = explode('.',$file_name);                    
                  $final_name = mt_rand(100000,999999).'.'.$get_name[1];
                  $explode_file = explode(".",$file_name);
                  $countExp = count($explode_file);
                  $fileExtenstion = $explode_file[$countExp-1];
                  $final_img = str_replace(".","",str_replace(" ","",date("YmdHis").microtime())).".".$fileExtenstion;

                  $upload=WWW_ROOT."img/blog_image/".$final_img;
                                 
                  if(!empty($cus_id)){

                    move_uploaded_file($file_tmp ,$upload);    

                      $seg_id         = array();
                      $seg_id         = $_POST['segment_id'];  
                      $count          = count($seg_id);

                      for($i=0; $i<$count;$i++){  

                        $post_data_array                      = array();
                        $post_data_array['user_id']           = $cus_id;
                        $post_data_array['segment_id']        = $seg_id[$i];
                        $post_data_array['post_title']        = $_POST['post_topic'];
                        $post_data_array['post_description']  = $_POST['post_summary'];
                        $post_data_array['post_image']        = $final_img;
                        $post_data_array['city_id']           = $user_data['UserMaster']['city_id'];
                        $post_data_array['locality_id']       = $user_data['UserMaster']['locality_id'];
                        $post_data_array['status']            = 1;
                        $post_data_array['add_date']          = time();
                        $post_data_array['modify_date']       = time();
                        
                        $this->Post->create();  
                        $postresult =   $this->Post->save($post_data_array);
                      }

                    return 1;
                }else{

                    return 2;
                }    
          }
       }  
    }



  public  function segmentpostdata(){

      $this->autoRender = false;
      $segment_id       = $_POST['semrt_id'];
      $user=$this->Session->read('User'); 
      $user_id      = $user['UserMaster']['id'];
      $user_type    = $user['UserMaster']['user_type_id'];

      if(empty($user)){

          $post_data = $this->Post->find('all',array(
                      'fields' => 'Post.*,userdata.*,postlike.*',
                      'conditions' => array(  
                      'Post.status'=>1,
                      'Post.segment_id'=>$segment_id),
                      'joins'=>
                          array(
                            array(
                               'table'  =>'user_masters',  
                               'alias'  =>'userdata',
                               'type' =>'left',
                               'conditions'=>array('userdata.id=Post.user_id')                  
                            ),
                            array(
                               'table'  =>'bg_post_likes',  
                               'alias'  =>'postlike',
                               'type' =>'left',
                               'conditions' => array('Post.id = postlike.post_id',
                                                     'postlike.user_id'=>$user_id)            
                            ),            
                      ),
          ));
          // post like data 

            $post_like_array = array();  
            foreach ($post_data as  $postdata){

              $dataArray1 = $this->PostLike->find('count',array('conditions'=>array(
                                                                  'PostLike.post_id'=>$postdata['Post']['id'],
                                                                  'PostLike.status'=>1)));

              $dataArray2 = $this->PostLike->find('first',array('conditions'=>array(
                                                                  'PostLike.post_id'=>$postdata['Post']['id'],
                                                                  'PostLike.status'=>1,
                                                                  'PostLike.user_id'=>$user_id),
                                                                  'fields'=>array('PostLike.status'))); 
                                                                                                                        
              $post_like_array[$postdata['Post']['id']]['value'] = $dataArray1;
              $post_like_array[$postdata['Post']['id']]['status'] = $dataArray2;
            
            } 
            $this->set('post_like_array',$post_like_array); 

            // post commnet data 

            $post_commmt_array = array();
            foreach ($post_data as $datas){
              $dataArray = $this->PostComment->find('count',array('conditions'=>array(
                                                                  'PostComment.post_id'=>$datas['Post']['id'],
                                                                  'PostComment.status'=>1)));
              $post_commmt_array[$datas['Post']['id']] = $dataArray;
            }
           $this->set('post_commmt_array',$post_commmt_array); 
     
      }else{
        
        $post_data = $this->Post->find('all',array(
                      'fields' => 'Post.*,userdata.*,postlike.*',
                      'conditions' => array(  
                      'Post.status'=>1,
                      'Post.segment_id'=>$segment_id),
                      'joins'=>
                          array(
                            array(
                               'table'  =>'user_masters',  
                               'alias'  =>'userdata',
                               'type' =>'left',
                               'conditions'=>array('userdata.id=Post.user_id')                  
                            ),
                            array(
                               'table'  =>'bg_post_likes',  
                               'alias'  =>'postlike',
                               'type' =>'left',
                               'conditions' => array('Post.id = postlike.post_id',
                                                     'postlike.user_id'=>$user_id)            
                            ),            
                      ),
          ));
        
         // post like data 

          $post_like_array = array();  

          foreach ($post_data as  $postdata) {
          
            $dataArray1 = $this->PostLike->find('count',array('conditions'=>array(
                                                                'PostLike.post_id'=>$postdata['Post']['id'],
                                                                'PostLike.status'=>1)));

            $dataArray2 = $this->PostLike->find('first',array('conditions'=>array(
                                                                'PostLike.post_id'=>$postdata['Post']['id'],
                                                                'PostLike.status'=>1,
                                                                'PostLike.user_id'=>$user_id),
                                                                'fields'=>array('PostLike.status'))); 
                                                                                                                      
            $post_like_array[$postdata['Post']['id']]['value'] = $dataArray1;
            $post_like_array[$postdata['Post']['id']]['status'] = $dataArray2;
          
          } 
          
          $this->set('post_like_array',$post_like_array); 

          // post commnet data 

          $post_commmt_array = array();

          foreach ($post_data as $datas){

            $dataArray = $this->PostComment->find('count',array('conditions'=>array(
                                                                'PostComment.post_id'=>$datas['Post']['id'],
                                                                'PostComment.status'=>1)));
            $post_commmt_array[$datas['Post']['id']] = $dataArray;
          }

          $this->set('post_commmt_array',$post_commmt_array); 
  
  } 

  if(!empty($post_data)){

        $result_string.='';
        $result_string.='<div class="">&nbsp;</div>  ';
          
        foreach($post_data as $value){  

          $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 blog_background_design">
                <div class="">&nbsp;</div>   
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 padd_l_r cat_pro_pic_blog">
                        <center>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">';
                                $user_pic = $value['userdata']['profile_image'];
                                        if(empty($user_pic)){

                                          $result_string.='<img class="img-thumbnail" src="'.HTTP_ROOT.'/img/connect/dummy/pic.png" alt="img not found">';
                                            }else{
                                          
                                            $user_pic1 = substr($user_pic,0,4);
                                          
                                            if($user_pic1 == 'http'){ 
                                                $result_string.='<img class="img-thumbnail" src="'.$value['userdata']['profile_image'].'" alt="img not found">';
                                            
                                            }else{ 

                                              if( $postdata['userdata']['user_type_id'] == 1 ){ 

                                                  $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Vendor/profile/'.$postdata['userdata']['profile_image'].'" alt="img not found">';
                                             
                                              }else{ 
                                                
                                                  $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Buyer/profile/'.$postdata['userdata']['profile_image'].'" alt="img not found">';
                                               
                                              } 
                                
                                 } }
                            $result_string.='</div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <i class="fa fa-user coont_box2_icon121" aria-hidden="true"></i>
                                <span class="coont_box2_icon">
                                    '.$value['userdata']['first_name'].'
                                </span>    
                            </div>
                        </center>    
                    </div>
                    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 padd_l_r">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r">
                            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 padd_l_r">   
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                                    <span class="connt_flex_middle_bdr12" style="color:#0f0f0f;text-transform: capitalize;">
                                        <b>
                                          '.$value['Post']['post_title'].'
                                        </b>
                                    </span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 padd_l_r" style="float:left;">
                          
                            </div>
                            <div class="col-xs-12 col-sm-11 col-md-12 col-lg-11 pdd_top21">
                                <span class="connt_flex_middle_bdr123" style="color:#5b595c;">
                                   '.$value['Post']['post_description'].'
                                </span>
                            </div>    
                        </div>        
                    </div>   
                </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                        <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2 padd_l_r">  
                          
                        </div>';
                          if(!empty($user_id)){ 
                              if($user_type == 1){ 

                                 $result_string.='<div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 padd_l_r">
                                <div id="post_change_like_count_'.$value['Post']['id'].'" class="col-xs-12 col-sm-4 col-md-4 col-lg-1 padd_l_r" style="pointer-events:none;" onclick="get_post_like_id('.$value['Post']['id'].');">';
                                     if($post_like_array[$value['Post']['id']]['status']['PostLike']['status'] == 1){ 
                                            $result_string.='<i style="color:#2bcdc1" class="fa fa-thumbs-up coont_box2_icon121" aria-hidden="true">
                                            </i>';
                                          }else{ 
                                            $result_string.='<i class="fa fa-thumbs-up coont_box2_icon121" aria-hidden="true"></i>';
                                          }  
                        
                                         $result_string.='<span class="coont_box2_icon">';
                                                    
                                          if(isset($post_like_array[$value['Post']['id']]['value'])){
                                            $result_string.=''.$post_like_array[$value['Post']['id']]['value'].'';
                                          }else{
                                             $result_string.=' 0 ';
                                          }

                                          $result_string.=' </span>                                                      
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2 padd_l_r">
                                    <i class="fa fa-clock-o coont_box2_icon121" aria-hidden="true"></i>
                                    <span class="coont_box2_icon">
                                        '.date('d M Y', $value['Post']['add_date']).'
                                    </span>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2 padd_l_r" id="post_ajxa_attch_'.$value['Post']['id'].'" onclick="postshwdiv('.$value['Post']['id'].')" style="cursor:pointer">
                                    <i class="fa fa-comments coont_box2_icon121" aria-hidden="true"></i>
                                    <span class="coont_box2_icon">';
                                         if(isset($post_commmt_array[$value['Post']['id']])){
                                            $result_string.=''.$post_commmt_array[$value['Post']['id']].'';
                                          }else{
                                             $result_string.=' 0 ';
                                          }
                                         $result_string.='  COMMENTS
                                    </span>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 connt_flex_middle_bdr" style="display:none;" id="postcomment'.$value['Post']['id'].'">
                     
                                </div> 
                            </div>';
                            
                                }else{

                                $result_string.='<div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 padd_l_r">
                                <div id="post_change_like_count_'.$value['Post']['id'].'" class="col-xs-12 col-sm-4 col-md-4 col-lg-1 padd_l_r" style="cursor:pointer" onclick="get_post_like_id('.$value['Post']['id'].');">';
                                     if($post_like_array[$value['Post']['id']]['status']['PostLike']['status'] == 1){ 
                                            $result_string.='<i style="color:#2bcdc1" class="fa fa-thumbs-up coont_box2_icon121" aria-hidden="true">
                                            </i>';
                                          }else{ 
                                            $result_string.='<i class="fa fa-thumbs-up coont_box2_icon121" aria-hidden="true"></i>';
                                          }  
                        
                                         $result_string.='<span class="coont_box2_icon">';
                                                    
                                          if(isset($post_like_array[$value['Post']['id']]['value'])){
                                            $result_string.=''.$post_like_array[$value['Post']['id']]['value'].'';
                                          }else{
                                             $result_string.=' 0 ';
                                          }

                                          $result_string.=' </span>                                                      
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2 padd_l_r">
                                    <i class="fa fa-clock-o coont_box2_icon121" aria-hidden="true"></i>
                                    <span class="coont_box2_icon">
                                        '.date('d M Y', $value['Post']['add_date']).'
                                    </span>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2 padd_l_r" id="post_ajxa_attch_'.$value['Post']['id'].'" onclick="postshwdiv('.$value['Post']['id'].')" style="cursor:pointer">
                                    <i class="fa fa-comments coont_box2_icon121" aria-hidden="true"></i>
                                    <span class="coont_box2_icon">';
                                         if(isset($post_commmt_array[$value['Post']['id']])){
                                            $result_string.=''.$post_commmt_array[$value['Post']['id']].'';
                                          }else{
                                             $result_string.=' 0 ';
                                          }
                                         $result_string.='  COMMENTS
                                    </span>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 connt_flex_middle_bdr" style="display:none;" id="postcomment'.$value['Post']['id'].'">
                     
                                </div> 
                            </div>';
                             } }else{ 
                            $result_string.='<div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 padd_l_r">
                                <div id="post_change_like_count_'.$value['Post']['id'].'" class="col-xs-12 col-sm-4 col-md-4 col-lg-1 padd_l_r" style="pointer-events:none;" onclick="get_post_like_id('.$value['Post']['id'].');">';
                                     if($post_like_array[$value['Post']['id']]['status']['PostLike']['status'] == 1){ 
                                            $result_string.='<i style="color:#2bcdc1" class="fa fa-thumbs-up coont_box2_icon121" aria-hidden="true">
                                            </i>';
                                          }else{ 
                                            $result_string.='<i class="fa fa-thumbs-up coont_box2_icon121" aria-hidden="true"></i>';
                                          }  
                        
                                         $result_string.='<span class="coont_box2_icon">';
                                                    
                                          if(isset($post_like_array[$value['Post']['id']]['value'])){
                                            $result_string.=''.$post_like_array[$value['Post']['id']]['value'].'';
                                          }else{
                                             $result_string.=' 0 ';
                                          }

                                          $result_string.=' </span>                                                      
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2 padd_l_r">
                                    <i class="fa fa-clock-o coont_box2_icon121" aria-hidden="true"></i>
                                    <span class="coont_box2_icon">
                                        '.date('d M Y', $value['Post']['add_date']).'
                                    </span>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2 padd_l_r" id="post_ajxa_attch_'.$value['Post']['id'].'" onclick="postshwdiv('.$value['Post']['id'].')" style="cursor:pointer">
                                    <i class="fa fa-comments coont_box2_icon121" aria-hidden="true"></i>
                                    <span class="coont_box2_icon">';
                                         if(isset($post_commmt_array[$value['Post']['id']])){
                                            $result_string.=''.$post_commmt_array[$value['Post']['id']].'';
                                          }else{
                                             $result_string.=' 0 ';
                                          }
                                         $result_string.='  COMMENTS
                                    </span>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 connt_flex_middle_bdr" style="display:none;" id="postcomment'.$value['Post']['id'].'">
                     
                                </div> 
                            </div>';
                          } 
                    $result_string.='</div>
                <div class="">&nbsp;</div>
            </div>
            <div style="background-color:white;">&nbsp;</div>'; 
   
          }   

          print_r($result_string);die;          
                   
    }else{
     
      $result_string.='';
      $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                        <center>
                           <span class="connt_flex_middle_text" style="text-align:center;">Post does not exist!</span>
                        </center>
                      </div>';
      print_r($result_string);die;                  
    
    }                                                                 
  
  }
  

  public function Postlike($id = null){

    $this->autoRender = false;
    $post_data = $this->Post->find('all',array(
                      'fields' => 'Post.*,userdata.*',
                      'conditions' => array(  
                      'Post.status'=>1,
                      'Post.segment_id'=>$id),
                      'joins'=>
                          array(
                            array(
                               'table'  =>'user_masters',  
                               'alias'  =>'userdata',
                               'type' =>'left',
                               'conditions'=>array(
                                      'userdata.id=Post.user_id',
                               )                  
                            ),            
                          ),
    ));

    $blog_id = $this->Post->find('all',array(
                                    'fields'=>'Post.id',
                                    'conditions'=>array(
                                    'Post.segment_id'=>$id,
                                    'Post.status'=>1)));

    $post_like_array = array();  

    foreach ($blog_id as  $postdata) {
      $dataArray1 = $this->PostLike->find('count',array('conditions'=>array(
                                                          'PostLike.post_id'=>$postdata['Post']['id'],
                                                          'PostLike.status'=>1)));  
      $post_like_array[$postdata['Post']['id']] = $dataArray1;
    } 
    return $post_like_array;
  
  }

  public function Postcomment($id = null){

      $this->autoRender = false; 
      $post_data = $this->Post->find('all',array(
                      'fields' => 'Post.*,userdata.*',
                      'conditions' => array(  
                      'Post.status'=>1,
                      'Post.segment_id'=>$id),
                      'joins'=>
                          array(
                            array(
                               'table'  =>'user_masters',  
                               'alias'  =>'userdata',
                               'type' =>'left',
                               'conditions'=>array(
                                      'userdata.id=Post.user_id',
                               )                  
                            ),            
                          ),
      ));

      $post_id = $this->Post->find('all',array(
                                    'fields'=>'Post.id',
                                    'conditions'=>array(
                                    'Post.segment_id'=>$id,
                                    'Post.status'=>1)));
      $post_commmt_array = array();
      foreach ($post_id as $datas) {
        $dataArray = $this->PostComment->find('count',array('conditions'=>array(
                                                            'PostComment.post_id'=>$datas['Post']['id'],
                                                            'PostComment.status'=>1)));
        $post_commmt_array[$datas['Post']['id']] = $dataArray;
      }
      
      return $post_commmt_array;
  }


  public function postChangeLike(){

    $this->autoRender = false; 
    if(!empty($_POST)){  

      $chech_like_data = $this->PostLike->find('first',array('conditions'=>array(
                                                                      'PostLike.user_id'=>$_POST['user_id'],
                                                                      'PostLike.post_id'=>$_POST['post_like_id'])));

      if(empty($chech_like_data)){
      
       $post_like_array = array();
       $post_like_array['user_id']     = $_POST['user_id'];
       $post_like_array['post_id']     = $_POST['post_like_id'];
       $post_like_array['status']      = 1;
       $post_like_array['add_date']    = time();
       $post_like_array['modify_date'] = time();
       $this->PostLike->save($post_like_array); 
       $like_count_data = $this->PostLike->find('count',array('conditions'=>array(
                                                                  'PostLike.post_id'=>$_POST['post_like_id'],
                                                                  'PostLike.status'=>1)));
        $result_string.='';
        $result_string.='<i  class="fa fa-thumbs-up coont_box2_icon121" style="color:#2bcdc1;cursor:pointer"></i>
                          <span class="coont_box2_icon">';
                             if(isset($like_count_data)){ 
                                  $result_string.=''.$like_count_data.' ';
                               }else{
                                  $result_string.='0 ';  
                               }
        $result_string.='  </span>';
        print_r($result_string);die;  

      }else{

        if($chech_like_data['PostLike']['status'] == 1 ){

            $this->PostLike->updateAll(array('PostLike.status' => 2,
                                                 'PostLike.modify_date' => time()),
                                           array('PostLike.user_id'     => $_POST['user_id'],
                                                 'PostLike.post_id'     => $_POST['post_like_id']));

             $like_count_data = $this->PostLike->find('count',array('conditions'=>array(
                                                                  'PostLike.post_id'=>$_POST['post_like_id'],
                                                                  'PostLike.status'=>1)));

             $result_string.='';
              $result_string.='<i class="fa fa-thumbs-up coont_box2_icon121" aria-hidden="true" style="cursor:pointer"></i>
                                 <span class="coont_box2_icon">';
                                   if(isset($like_count_data)){ 
                                        $result_string.=''.$like_count_data.' ';
                                     }else{
                                        $result_string.='0 ';  
                                     }
              $result_string.='  </span>';
              print_r($result_string);die;  
          }

         if($chech_like_data['PostLike']['status'] == 2){

            $this->PostLike->updateAll(array('PostLike.status' => 1,
                                                 'PostLike.modify_date' => time()),
                                           array('PostLike.user_id'     => $_POST['user_id'],
                                                 'PostLike.post_id'     => $_POST['post_like_id']));

            $like_count_data = $this->PostLike->find('count',array('conditions'=>array(
                                                                  'PostLike.post_id'=>$_POST['post_like_id'],
                                                                  'PostLike.status'=>1)));

            $result_string.='';
            $result_string.='<i class="fa fa-thumbs-up coont_box2_icon121" aria-hidden="true" style="color:#2bcdc1;cursor:pointer"></i>
                                <span class="coont_box2_icon">';
                                   if(isset($like_count_data)){ 
                                        $result_string.=''.$like_count_data.' ';
                                     }else{
                                        $result_string.='0 ';  
                                     }
              $result_string.='  </span>';
              print_r($result_string);die;  
        }
      }
    }
  }

  public function postCommentData(){ 
   
    if(isset($_POST)){

      $this->autoRender = false; 
      $post_id     = $_POST['post_ids'];
      $user_id     = $_POST['user_id'];

      $userdata         = $this->UserMaster->find('first',array('conditions' => array(
                                                                'UserMaster.id' => $user_id,
                                                                'UserMaster.status' => 1)));

      $user_type_id     = $userdata['UserMaster']['user_type_id'];

      $post_commt  = $this->postconnectData($post_id);

      $commt_count_data = $this->PostComment->find('count',array('conditions'=>array(
                                                                           'PostComment.post_id'=>$post_id,
                                                                           'PostComment.status'=>1)));
      if(!empty($post_commt)){

        $result_string.='';
        $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="show_grp_post_data">           
                            <div class="">&nbsp;</div>
                            <div class="">&nbsp;</div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              <span style="color:#0f0f0f" class="connt_flex_middle_bdr12">';
                                if(isset($commt_count_data)){
                                        
                                        $result_string.=''.$commt_count_data.'';
                                      
                                      }else{
                                        
                                        $result_string.='0 ';
                                  }
                            $result_string.=' Comments </span>
                            </div>';
                              foreach ($post_commt as $postdata){ 
                                $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-right comm_box2_chat_box">
                                                    <center>
                                                      <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 cmmt_box_de mar_pad">';
                                                        $user_pic = $postdata['usermaster']['profile_image'];
                                                          if(empty($user_pic)){ 

                                                            $result_string.='<img class="profile_pic img-circle" src="'.HTTP_ROOT.'/img/connect/dummy/pic.png" alt="img not found">';

                                                          }else{

                                                            $user_pic1 = substr($user_pic,0,4);

                                                            if($user_pic1 == 'http'){

                                                              $result_string.='<img class="profile_pic img-circle" src="'.$postdata['usermaster']['profile_image'].'" alt="img not found">';

                                                             }else{ 

                                                                if( $postdata['usermaster']['user_type_id'] == 1 ){ 

                                                                    $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Vendor/profile/'.$postdata['usermaster']['profile_image'].'" alt="img not found">';
                                                               
                                                                }else{ 
                                                                  
                                                                    $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Buyer/profile/'.$postdata['usermaster']['profile_image'].'" alt="img not found">';
                                                                 
                                                                }

                                                             } } 
                                                $result_string.='</div></center>   
                                                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-10  cmmt_box_de">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r mar_pad">
                                                        <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;">
                                                          '.$postdata['usermaster']['first_name'].' 
                                                        </span>
                                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;">
                                                           on '.date('d M Y', $postdata['PostComment']['add_date']).' at '.date('h:i a',$postdata['PostComment']['add_date']).' 
                                                        </span>
                                                    </div> 
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r mar_pad">
                                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;">
                                                          '.$postdata['PostComment']['comment'].' 
                                                        </span>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r mar_pad">
                                                        <span onclick="show_reply_post('.$postdata['PostComment']['id'].')" class="connt_flex_middle_bdr123" style="cursor:pointer;color:#0f0f0f;padding-right:5px;">
                                                            Reply-
                                                        </span>
                                                    </div>
                                                    <div id="reply_post_'.$postdata['PostComment']['id'].'" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r" style="display:none;">
                                                          

                                                    </div>
                                                </div>
                                            </div><div class="">&nbsp;</div>';
                                           } 
                                          
                                        if(!empty($user_id) && $user_type_id == 2 ){ 
                                          
                                           $result_string.='<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                            <fieldset class="form-group">
                                              <span style="" class="connt_flex_middle_bdr12">
                                                <strong>
                                                 Add Comment :
                                                </strong>
                                              </span>
                                              <textarea rows="6" cols="30" type="text" id="post_cmmt_'.$post_id.'" class="form-control input_login" placeholder="Add a comment..." style="border: 2px solid #2bcdc1 !important;"></textarea>
                                              <span class="err" id="err_post_cmmt_'.$post_id.'">&nbsp;</span>
                                              </fieldset>
                                              <button style="background-color:#2bcdc1;border:none;" type="button" class="btn btn-primary" onclick="post_cmmt_submit('.$post_id.')">Post</button>
                                             <div class="">&nbsp;</div>
                                          </div> 
                                        </div>';
                                        } 
                                        print_r($result_string);die;
                                   }else{
                   $result_string.='';
                   $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="show_cat_post_data">           
                                    <div class="">&nbsp;</div>
                                    <div class="">&nbsp;</div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              <span style="color:#0f0f0f" class="connt_flex_middle_bdr12">';
                                if(isset($commt_count_data)){
                                        
                                        $result_string.=''.$commt_count_data.'';
                                      
                                      }else{
                                        
                                        $result_string.='0 ';
                                  }
                            $result_string.=' Comments </span>
                            </div>';
                              foreach ($post_commt as $postdata){ 
                                $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-right comm_box2_chat_box">
                                                    <center><div class="col-xs-12 col-sm-12 col-md-1 col-lg-1 cmmt_box_de">';
                                                        $user_pic = $postdata['usermaster']['profile_image'];
                                                          if(empty($user_pic)){ 

                                                            $result_string.='<img class="profile_pic img-circle" src="'.HTTP_ROOT.'/img/connect/dummy/pic.png" alt="img not found">';

                                                          }else{

                                                            $user_pic1 = substr($user_pic,0,4);

                                                            if($user_pic1 == 'http'){

                                                              $result_string.='<img class="profile_pic img-circle" src="'.$postdata['usermaster']['profile_image'].'" alt="img not found">';

                                                             }else{ 

                                                                if( $postdata['usermaster']['user_type_id'] == 1 ){ 

                                                                    $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Vendor/profile/'.$postdata['usermaster']['profile_image'].'" alt="img not found">';
                                                               
                                                                }else{ 
                                                                  
                                                                    $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Buyer/profile/'.$postdata['usermaster']['profile_image'].'" alt="img not found">';
                                                                 
                                                                }

                                                             } } 
                                                $result_string.='</div></center>   
                                                <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11  cmmt_box_de">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r mar_pad">
                                                        <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;">
                                                          '.$postdata['usermaster']['first_name'].' 
                                                        </span>
                                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">
                                                           on '.date('d M Y', $postdata['PostComment']['add_date']).' at '.date('h:i a',$postdata['PostComment']['add_date']).' 
                                                        </span>
                                                    </div> 
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r" style="">
                                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;">
                                                          '.$postdata['PostComment']['comment'].' 
                                                        </span>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r" style="">
                                                        <span onclick="show_reply_post('.$postdata['PostComment']['id'].')" class="connt_flex_middle_bdr123" style="cursor:pointer;color:#0f0f0f;padding-right:5px;">
                                                            Reply-
                                                        </span>
                                                    </div>
                                                    <div id="reply_post_'.$postdata['PostComment']['id'].'" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r" style="display:none;">
                                                          

                                                    </div>
                                                </div>
                                            </div>';
                                           }
                                          
                                          if(!empty($user_id) && $user_type_id == 2 ){ 
                                            
                                             $result_string.='<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                              <fieldset class="form-group">
                                                <span style="" class="connt_flex_middle_bdr12">
                                                  <strong>
                                                   Add Comment :
                                                  </strong>
                                                </span>
                                                <textarea rows="6" cols="30" type="text" id="post_cmmt_'.$post_id.'" class="form-control input_login" placeholder="Add a comment..." style="border: 2px solid #2bcdc1 !important;"></textarea>
                                                <span class="err" id="err_post_cmmt_'.$post_id.'">&nbsp;</span>
                                                </fieldset>
                                                <button style="background-color:#2bcdc1;border:none;" type="button" class="btn btn-primary" onclick="post_cmmt_submit('.$post_id.')">Post</button>
                                               <div class="">&nbsp;</div>
                                            </div> 
                                          </div>';
                                    } 
                              
                                print_r($result_string);die;
                }
            }   
    }

    Public function postconnectData($post_id = null){   
      $this->autoRender = false; 
      $commt_data = $this->PostComment->find('all',array(
                                              'joins' => array(
                                                array(
                                                    'table'      => 'bg_user_masters',
                                                    'alias'      => 'usermaster',
                                                    'type'       => 'left', 
                                                    'conditions' => array('PostComment.user_id = usermaster.id'))),    
                                                'conditions'=>array('PostComment.post_id'=>$post_id),
                                                'fields' =>array('PostComment.*','usermaster.*')));
      return $commt_data; 
   }

   public function postCommtPost(){

          $this->autoRender = false; 
            if(isset($_POST)){

              $post_cmmt_array      = array();
              $post_cmmt_array['post_id']     = $_POST['post_id'];
              $post_cmmt_array['user_id']     = $_POST['user_id'];
              $post_cmmt_array['comment']     = $_POST['comment'];
              $post_cmmt_array['status']      = 1;
              $post_cmmt_array['add_date']    = time();
              $post_cmmt_array['modify_date'] = time();

              $result  = $this->PostComment->save($post_cmmt_array);

              if(isset($result)){

                $post_id     = $_POST['post_id'];
                $post_commt  = $this->postconnectData($post_id);
                $commt_count_data = $this->PostComment->find('count',array('conditions'=>array(
                                                                           'PostComment.post_id'=>$post_id,
                                                                           'PostComment.status'=>1)));
                $append_data  = array();
                $result_string.='';
                $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="show_cat_post_data">           
                            <div class="">&nbsp;</div>
                            <div class="">&nbsp;</div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              <span style="color:#0f0f0f" class="connt_flex_middle_bdr12">';
                                if(isset($commt_count_data)){
                                        
                                        $result_string.=''.$commt_count_data.'';
                                      
                                      }else{
                                        
                                        $result_string.='0 ';
                                  }
                            $result_string.=' Comments </span>
                            </div>';
                              foreach ($post_commt as $postdata){ 
                                $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-right comm_box2_chat_box">
                                                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 cmmt_box_de">';
                                                        $user_pic = $postdata['usermaster']['profile_image'];
                                                          if(empty($user_pic)){ 

                                                            $result_string.='<img class="profile_pic img-circle" src="'.HTTP_ROOT.'/img/connect/dummy/pic.png" alt="img not found">';

                                                          }else{

                                                            $user_pic1 = substr($user_pic,0,4);

                                                            if($user_pic1 == 'http'){

                                                              $result_string.='<img class="profile_pic img-circle" src="'.$postdata['usermaster']['profile_image'].'" alt="img not found">';

                                                             }else{ 

                                                                if( $postdata['usermaster']['user_type_id'] == 1 ){ 

                                                                    $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Vendor/profile/'.$postdata['usermaster']['profile_image'].'" alt="img not found">';
                                                               
                                                                }else{ 
                                                                  
                                                                    $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Buyer/profile/'.$postdata['usermaster']['profile_image'].'" alt="img not found">';
                                                                 
                                                                }

                                                             } } 
                                                $result_string.='</div>   
                                                <div class="col-xs-12 col-sm-11 col-md-9 col-lg-9  cmmt_box_de">
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r" style="padding-top:15px;">
                                                        <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;padding-top:30px;">
                                                          '.$postdata['usermaster']['first_name'].' 
                                                        </span>
                                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;padding-right:5px;">
                                                           on '.date('d M Y', $postdata['PostComment']['add_date']).' at '.date('h:i a',$postdata['PostComment']['add_date']).' 
                                                        </span>
                                                    </div> 
                                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r" style="padding-top:15px;">
                                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;">
                                                          '.$postdata['PostComment']['comment'].' 
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>';
                                           } 
                                           $result_string.='<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                            <fieldset class="form-group">
                                              <span style="" class="connt_flex_middle_bdr12">
                                                <strong>
                                                 Add Comment :
                                                </strong>
                                              </span>
                                              <textarea rows="6" cols="30" type="text" id="post_cmmt_'.$post_id.'" class="form-control input_login" placeholder="Add a comment..." style="border: 2px solid #2bcdc1 !important;"></textarea>
                                              <span class="err" id="err_acty_cmmt_'.$post_id.'">&nbsp;</span>
                                              </fieldset>
                                              <button style="background-color:#2bcdc1;border:none;" type="button" class="btn btn-primary" onclick="post_cmmt_submit('.$post_id.')">Post</button>
                                             <div class="">&nbsp;</div>
                                          </div> 
                                        </div>';
                                      $result_string2.='<i class="fa fa-comments coont_box2_icon121" aria-hidden="true"></i>
                                        <span class="coont_box2_icon">';
                                            if(isset($commt_count_data)){
                                                  $result_string2.=''.$commt_count_data.'';
                                                }else{
                                                  $result_string2.='0 ';
                                            }      
                                          $result_string2.='  COMMENTS </span>';  

                      $append_data[0] = $result_string;
                      $append_data[1] = $result_string2;
                      print_r(json_encode($append_data));die;
              }
            } 

        }

        public function getCities() {

          $this->autoRender = false; 

        }
        
        public function upcoming() {

           $this->autoRender = false; 

        }

    public function searchConnectSegment(){

          $this->autoRender = false; 
          $user=$this->Session->read('User');
          $user_id = $user['UserMaster']['id'];
          $keyword = $_POST['search_seg'];
          $segment_id_input = $_POST['segt_ids'];

          // without login case 

          if(empty($user)){

            if(empty($segment_id_input)){

                $segment_data =  $this->ClassSegment->find('all',array('conditions' => array(
                                            'ClassSegment.status'=>1,
                                            'ClassSegment.segment_name LIKE' => '%'.$keyword.'%'
                                          ),
                                  'fields' => array('ClassSegment.*')));

            }else{

                $segment_id_inputs = explode(',',$segment_id_input);

                $segment_data =  $this->ClassSegment->find('all',array('conditions' => array(
                                                          'ClassSegment.status'=>1,
                                                          'ClassSegment.segment_name LIKE' => '%'.$keyword.'%',
                                                          'ClassSegment.id' => $segment_id_inputs),
                                                          'fields' => array('ClassSegment.*')));

            }

            $seg_ids_array  = array();
            
            foreach ($segment_data as $sgt_ids) {
              $seg_ids_array[]  = $sgt_ids['ClassSegment']['id'];   
            
            }

            $append_data = array();
            $append_data[0] = $seg_ids_array;

            if(!empty($segment_data)){
                
                $result_string.='';
                foreach ($segment_data as $data1){ 

                      $result_string.='<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4" id="'.$data1['ClassSegment']['id'].'" style="margin-top:25px;cursor:pointer;" onclick="getsemid('.$data1['ClassSegment']['id'].');" >
                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r segmt_img">
                                  <center>';
                                     if(empty($data1['ClassSegment']['segment_image'])){ 
                                          $result_string.='<img class="image-responsive" src="'.HTTP_ROOT.'/img/connect/noimage.jpg" alt="img not found">';
                                       }else{  
                                          $result_string.='<img class="image-responsive" style="width:100%;" src="'.HTTP_ROOT.'/img/segment_image/'.$data1['ClassSegment']['segment_image'].'" alt="img not found">';
                                       } 
                                  $result_string.='</center>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 semgt_connt_bdr2" id="segt'.$data1['ClassSegment']['id'].'">
                                  <center>
                                      <span class="connt_flex_middle_text" id="segt_text'.$data1['ClassSegment']['id'].'">
                                           '.$data1['ClassSegment']['segment_name'].'
                                      </span>
                                  </center>
                              </div>           
                            </div>';
                }

            }else{

                $result_string.='';  
                    $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r segmt_img">
                           <center>
                                <span class="connt_flex_middle_text">
                                    No Segment Availble!
                                <span>
                            </center>
                        </div>            
                </div>';
            
            }
            
            $append_data[1] = $result_string;
            print_r(json_encode($append_data));die;

          }else{

            $user_data     = $this->UserMaster->find('first',array('conditions'=>array(
                                                             'UserMaster.id'=>$user_id,
                                                             'UserMaster.status'=>1)));
            $cat_ids       = $user_data['UserMaster']['category_id'];
            $category_ids  = explode(",",$cat_ids); 
            $this->set('cat_ids',$cat_ids);
            $this->set('category_ids',$category_ids);
            
            if(empty($segment_id_input)){

              $segment_data =  $this->ClassSegment->find('all',array('conditions' => array(
                                            'ClassSegment.status'=>1,
                                            'ClassSegment.category_id'=>$category_ids,
                                            'ClassSegment.segment_name LIKE' =>'%'.$keyword.'%'
                                          ),
                                  'fields' => array('ClassSegment.*')));
            }else{

              $segment_id_inputs = explode(',',$segment_id_input);

              $segment_data =  $this->ClassSegment->find('all',array('conditions' => array(
                                            'ClassSegment.status'=>1,
                                            'ClassSegment.category_id'=>$category_ids,
                                            'ClassSegment.id'=>$segment_id_inputs,
                                            'ClassSegment.segment_name LIKE' =>'%'.$keyword.'%'
                                          ),
                                  'fields' => array('ClassSegment.*')));

            }

            $seg_ids_array  = array();
            
            foreach($segment_data as $sgt_ids){
                $seg_ids_array[]  = $sgt_ids['ClassSegment']['id'];   
            
            }

            $append_data = array();
            $append_data[0] = $seg_ids_array;

            if(empty($segment_data)){

              $result_string.='';  
                    $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"  style="padding:25px;">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r segmt_img">
                           <center>
                                <span class="connt_flex_middle_text">
                                   No Segment Availble!
                                <span>
                            </center>
                        </div>            
                </div>';
               //print_r($result_string);die;  

            }else{

              $result_string.='';
              foreach ($segment_data as $data1 ) {     
                 $result_string.='<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4" id="'.$data1['ClassSegment']['id'].'" style="margin-top:25px;cursor:pointer;" onclick="getsemid('.$data1['ClassSegment']['id'].');" >
                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r segmt_img">
                                  <center>';
                                     if(empty($data1['ClassSegment']['segment_image'])){ 
                                          $result_string.='<img class="image-responsive" src="'.HTTP_ROOT.'/img/connect/noimage.jpg" alt="img not found">';
                                       }else{  
                                          $result_string.='<img class="image-responsive" style="width:100%;" src="'.HTTP_ROOT.'/img/segment_image/'.$data1['ClassSegment']['segment_image'].'" alt="img not found">';
                                       } 
                                  $result_string.='</center>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 semgt_connt_bdr2" id="segt'.$data1['ClassSegment']['id'].'">
                                  <center>
                                      <span class="connt_flex_middle_text" id="segt_text'.$data1['ClassSegment']['id'].'">
                                           '.$data1['ClassSegment']['segment_name'].'
                                      </span>
                                  </center>
                              </div>           
                            </div>';
              }
              //print_r($result_string);die;

            }

            $append_data[1] = $result_string;
            print_r(json_encode($append_data));die;

          }
        }

    public function searchConnectBlog(){

        $this->autoRender = false; 
        $user=$this->Session->read('User');
        $user_id          = $user['UserMaster']['id'];
        $keyword          = $_POST['search_string'];
        $user_type        = $user['UserMaster']['user_type_id'];

        $segment_id_input = $_POST['segt_ids'];

        if(empty($user)){

          if(empty($segment_id_input)){

              $blog_data = $this->Blog->find('all',array(
                          'fields' => 'Blog.*,userdata.*',
                          'conditions' => array(

                           'OR' => array(
                                    array('AND' => array(
                                      array('Blog.blog_title like "%'.$keyword.'%"'),
                                      array('Blog.status' => '1')
                                  )),
                                  array('AND' => array(
                                       array('Blog.blog_description like "%'.$keyword.'%"'),
                                       array('Blog.status' => '1')
                                  )),
                                )),  
                          'joins'=>
                              array(
                                array(
                                   'table'  =>'user_masters',  
                                   'alias'  =>'userdata',
                                   'type' =>'left',
                                   'conditions'=>array(
                                          'userdata.id=Blog.user_id',
                                   )                  
                                ),            
                      ),
              ));
              
              // comment data 
    
                $comment_array = array(); 
                
                foreach ($blog_data as $datas){
                  $dataArray = $this->BlogComment->find('count',array('conditions'=>array(
                                                                      'BlogComment.blog_id'=>$datas['Blog']['id'],
                                                                      'BlogComment.status'=>1)));
                  $comment_array[$datas['Blog']['id']] = $dataArray;
                }

                // like data 

                $like_array = array();

                foreach ($blog_data as  $cmmtdata) {
                  $dataArray1 = $this->BlogLike->find('count',array('conditions'=>array(
                                                                      'BlogLike.blog_id'=>$cmmtdata['Blog']['id'],
                                                                      'BlogLike.status'=>1)));

                  $dataArray2 = $this->BlogLike->find('first',array('conditions'=>array(
                                                                      'BlogLike.blog_id'=>$cmmtdata['Blog']['id'],
                                                                      'BlogLike.status'=>1,
                                                                      'BlogLike.user_id'=>$user_id),
                                                                      'fields'=>array('BlogLike.status'))); 
                                                                                                                            
                  $like_array[$cmmtdata['Blog']['id']]['value'] = $dataArray1;
                  $like_array[$cmmtdata['Blog']['id']]['status'] = $dataArray2;
                } 

                // report data 

                $report_array = array(); 

                foreach ($blog_data as  $reportdata){
                    $dataArray1 = $this->BlogReport->find('count',array('conditions'=>array(
                                                                        'BlogReport.blog_id'=>$reportdata['Blog']['id'],
                                                                        'BlogReport.status'=>1)));
                    $dataArray2 = $this->BlogReport->find('first',array('conditions'=>array(
                                                                        'BlogReport.blog_id'=>$reportdata['Blog']['id'],
                                                                        'BlogReport.status'=>1,
                                                                        'BlogReport.user_id'=>$user_id),
                                                                        'fields'=>array('BlogReport.status'))); 
                    $report_array[$reportdata['Blog']['id']]['value'] =  $dataArray1;
                    $report_array[$reportdata['Blog']['id']]['status'] = $dataArray2;
                    
                } 

          }else{

            $segment_id_inputs = explode(',',$segment_id_input);  

            $blog_data = $this->Blog->find('all',array(
                          'fields' => 'Blog.*,userdata.*',
                          'conditions' => array(

                           'OR' => array(
                                    array('AND' => array(
                                      array('Blog.blog_title like "%'.$keyword.'%"'),
                                      array('Blog.status' => '1'),
                                      array('Blog.segment_id' => $segment_id_inputs)
                                  )),
                                  array('AND' => array(
                                       array('Blog.blog_description like "%'.$keyword.'%"'),
                                       array('Blog.status' => '1'),
                                       array('Blog.segment_id' => $segment_id_inputs)
                                  )),
                                )), 

                          'joins'=>
                              array(
                                array(
                                   'table'  =>'user_masters',  
                                   'alias'  =>'userdata',
                                   'type' =>'left',
                                   'conditions'=>array(
                                          'userdata.id=Blog.user_id',
                                   )                  
                                ),            
                      ),
              ));
              
              // comment data 
              $comment_array = array(); 
              
              foreach ($blog_data as $datas){
                $dataArray = $this->BlogComment->find('count',array('conditions'=>array(
                                                                    'BlogComment.blog_id'=>$datas['Blog']['id'],
                                                                    'BlogComment.status'=>1)));
                $comment_array[$datas['Blog']['id']] = $dataArray;
              }

                // like data 

                $like_array = array();

                foreach ($blog_data as  $cmmtdata) {
                  $dataArray1 = $this->BlogLike->find('count',array('conditions'=>array(
                                                                      'BlogLike.blog_id'=>$cmmtdata['Blog']['id'],
                                                                      'BlogLike.status'=>1)));

                  $dataArray2 = $this->BlogLike->find('first',array('conditions'=>array(
                                                                      'BlogLike.blog_id'=>$cmmtdata['Blog']['id'],
                                                                      'BlogLike.status'=>1,
                                                                      'BlogLike.user_id'=>$user_id),
                                                                      'fields'=>array('BlogLike.status'))); 
                                                                                                                            
                  $like_array[$cmmtdata['Blog']['id']]['value'] = $dataArray1;
                  $like_array[$cmmtdata['Blog']['id']]['status'] = $dataArray2;
                } 

                // report data 

                $report_array = array(); 

                foreach ($blog_data as  $reportdata){
                    $dataArray1 = $this->BlogReport->find('count',array('conditions'=>array(
                                                                        'BlogReport.blog_id'=>$reportdata['Blog']['id'],
                                                                        'BlogReport.status'=>1)));
                    $dataArray2 = $this->BlogReport->find('first',array('conditions'=>array(
                                                                        'BlogReport.blog_id'=>$reportdata['Blog']['id'],
                                                                        'BlogReport.status'=>1,
                                                                        'BlogReport.user_id'=>$user_id),
                                                                        'fields'=>array('BlogReport.status'))); 
                    $report_array[$reportdata['Blog']['id']]['value'] =  $dataArray1;
                    $report_array[$reportdata['Blog']['id']]['status'] = $dataArray2;
                    
                } 
          
          }

      }else{

        $user_data     = $this->UserMaster->find('first',array('conditions'=>array(
                                                             'UserMaster.id'=>$user_id,
                                                             'UserMaster.status'=>1)));

        $cat_ids       = $user_data['UserMaster']['category_id'];
        $category_ids  = explode(",",$cat_ids); 
   
        $segment_data = $this->ClassSegment->find('all',array('conditions'=>array(
                                                       'ClassSegment.status'=>1,
                                                       'ClassSegment.category_id'=>$category_ids)));

        $seg_ids_array  = array();
        foreach ($segment_data as $sgt_ids) {
          $seg_ids_array[]  = $sgt_ids['ClassSegment']['id'];   
        }

        if(empty($segment_id_input)){

            $blog_data = $this->Blog->find('all',array(
                      'fields' => 'Blog.*,userdata.*',
                      'conditions' => array(

                       'OR' => array(
                                array('AND' => array(
                                  array('Blog.blog_title like "%'.$keyword.'%"'),
                                  array('Blog.status' => '1'),
                                  array('Blog.segment_id'=>$seg_ids_array)
                              )),
                              array('AND' => array(
                                   array('Blog.blog_description like "%'.$keyword.'%"'),
                                   array('Blog.status' => '1'),
                                   array('Blog.segment_id'=>$seg_ids_array)
                              )),
                            )),  
                      
                      'joins'=>
                          array(
                            array(
                               'table'  =>'user_masters',  
                               'alias'  =>'userdata',
                               'type' =>'left',
                               'conditions'=>array(
                                      'userdata.id=Blog.user_id',
                               )                  
                            ),            
                  ),
            ));
        
        }else{

          $segment_id_inputs = explode(',',$segment_id_input); 

          $blog_data = $this->Blog->find('all',array(
                      'fields' => 'Blog.*,userdata.*',
                      'conditions' => array(

                      'OR' => array(
                                array('AND' => array(
                                  array('Blog.blog_title like "%'.$keyword.'%"'),
                                  array('Blog.status' => '1'),
                                  array('Blog.segment_id'=>$segment_id_input)
                              )),
                              array('AND' => array(
                                   array('Blog.blog_description like "%'.$keyword.'%"'),
                                   array('Blog.status' => '1'),
                                   array('Blog.segment_id'=>$segment_id_inputs)
                              )),
                            )),
                      'joins'=>
                          array(
                            array(
                               'table'  =>'user_masters',  
                               'alias'  =>'userdata',
                               'type' =>'left',
                               'conditions'=>array(
                                      'userdata.id=Blog.user_id',
                               )                  
                            ),            
                  ),
          ));
        
      }

    // comment data 
    
      $comment_array = array(); 
      
      foreach ($blog_data as $datas){
        $dataArray = $this->BlogComment->find('count',array('conditions'=>array(
                                                            'BlogComment.blog_id'=>$datas['Blog']['id'],
                                                            'BlogComment.status'=>1)));
        $comment_array[$datas['Blog']['id']] = $dataArray;
      }

      // like data 

      $like_array = array();

      foreach ($blog_data as  $cmmtdata) {
        $dataArray1 = $this->BlogLike->find('count',array('conditions'=>array(
                                                            'BlogLike.blog_id'=>$cmmtdata['Blog']['id'],
                                                            'BlogLike.status'=>1)));

        $dataArray2 = $this->BlogLike->find('first',array('conditions'=>array(
                                                            'BlogLike.blog_id'=>$cmmtdata['Blog']['id'],
                                                            'BlogLike.status'=>1,
                                                            'BlogLike.user_id'=>$user_id),
                                                            'fields'=>array('BlogLike.status'))); 
                                                                                                                  
        $like_array[$cmmtdata['Blog']['id']]['value'] = $dataArray1;
        $like_array[$cmmtdata['Blog']['id']]['status'] = $dataArray2;
      } 

      // report data 

      $report_array = array(); 

      foreach ($blog_data as  $reportdata){
          $dataArray1 = $this->BlogReport->find('count',array('conditions'=>array(
                                                              'BlogReport.blog_id'=>$reportdata['Blog']['id'],
                                                              'BlogReport.status'=>1)));
          $dataArray2 = $this->BlogReport->find('first',array('conditions'=>array(
                                                              'BlogReport.blog_id'=>$reportdata['Blog']['id'],
                                                              'BlogReport.status'=>1,
                                                              'BlogReport.user_id'=>$user_id),
                                                              'fields'=>array('BlogReport.status'))); 
          $report_array[$reportdata['Blog']['id']]['value'] =  $dataArray1;
          $report_array[$reportdata['Blog']['id']]['status'] = $dataArray2;
          
      } 

  }


      if(!empty($blog_data)){

           $result_string.='';
	         $result_string.='<div class="">&nbsp;</div>';
            foreach ($blog_data as $value){
                  
                   $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 blog_background_design">
                    <div class="">&nbsp;</div>   
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r">
                        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 padd_l_r cat_pro_pic_blog">
                            <center>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">';
                                  $user_pic = $value['userdata']['profile_image'];
                                    if(empty($user_pic)){ 
                                      $result_string.='<img class="img-thumbnail" src="'.HTTP_ROOT.'/img/connect/dummy/pic.png" alt="img not found">';
                                                 }else{
                                                
                                                $user_pic1 = substr($user_pic,0,4); if($user_pic1 == 'http'){ 
                                                  $result_string.='<img class="img-thumbnail" src="'.$value['userdata']['profile_image'].'" alt="img not found">';
                                                  }else{ 

                                                        if( $value['userdata']['user_type_id'] == 1 ){ 

                                                            $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Vendor/profile/'.$value['userdata']['profile_image'].'" alt="img not found">';
                                                       
                                                        }else{ 
                                                          
                                                            $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Buyer/profile/'.$value['userdata']['profile_image'].'" alt="img not found">';
                                                         
                                                        }
                                      } } 
                                $result_string.='</div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <i class="fa fa-user coont_box2_icon121" aria-hidden="true"></i>
                                    <span class="coont_box2_icon">
                                      '.$value['userdata']['first_name'].'
                                    </span>    
                                </div>
                            </center>    
                        </div>
                        <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 padd_l_r">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r">
                                <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">   
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r">
                                        <span class="connt_flex_middle_bdr12" style="color:#0f0f0f;text-transform: capitalize;">
                                            <b>'.$value['Blog']['blog_title'].'</b>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 padd_l_r" style="float:left;">
                              
                                </div>
                                <div class="col-xs-12 col-sm-11 col-md-12 col-lg-11 pdd_top21">
                                    <span class="connt_flex_middle_bdr123" style="color:#5b595c;">
                                        '.$value['Blog']['blog_description'].'
                                    </span>
                                </div>    
                            </div>        
                        </div>   
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r">
                            <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2 padd_l_r">  
                               
                            </div>';
                            if(!empty($user_id)){ 

                              if($user_type == 1){ 

                                    $result_string.='<div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 padd_l_r">
                                    <div id="change_like_count_'.$value['Blog']['id'].'" class="col-xs-12 col-sm-2 col-md-2 col-lg-1 padd_l_r" style="pointer-events: none;" onclick="get_blog_like_id('.$value['Blog']['id'].');">';
                                        if($like_array[$value['Blog']['id']]['status']['BlogLike']['status'] == 1){ 
                                              $result_string.='<i style="color:#2bcdc1" class="fa fa-thumbs-up coont_box2_icon121" aria-hidden="true"></i>';
                                            }else{ 
                                              $result_string.='<i class="fa fa-thumbs-up coont_box2_icon121" aria-hidden="true"></i>';        
                                            }  
                                                      
                                              $result_string.='<span class="coont_box2_icon">';       
                                                if(isset($like_array[$value['Blog']['id']]['value'])){
                                                
                                                   $result_string.=''.$like_array[$value['Blog']['id']]['value'].'';
                                                
                                                }else{
                                                
                                                   $result_string.=' 0 ';
                                                
                                                }  
                                        $result_string.='</span>
                                    </div>   
                                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 padd_l_r">
                                        <i class="fa fa-clock-o coont_box2_icon121" aria-hidden="true"></i>
                                        <span class="coont_box2_icon">
                                          '.date('d M Y', $value['Blog']['add_date']).'
                                        </span>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2 padd_l_r" id="ajxa_attch_'.$value['Blog']['id'].'" onclick="shwdiv('.$value['Blog']['id'].')" style="cursor:pointer">
                                        <i class="fa fa-comments coont_box2_icon121" aria-hidden="true"></i>
                                        <span class="coont_box2_icon">';
                                            if(isset($comment_array[$value['Blog']['id']])){
                                                        
                                                           $result_string.=''.$comment_array[$value['Blog']['id']].'';
                                                        
                                                        }else{
                                                        
                                                           $result_string.=' 0 ';
                                                        
                                                        }  
                                                      
                                                      $result_string.=' COMMENTS
                                        </span>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 padd_l_r" id="report_check_'.$value['Blog']['id'].'" onclick="report_blog('.$value['Blog']['id'].')" 
                                            style="pointer-events:none;">';
                                        if($report_array[$value['Blog']['id']]['status']['BlogReport']['status'] == 1){ 
                                              $result_string.='<i style="color:#2bcdc1" class="fa fa-file-text coont_box2_icon121" aria-hidden="true"></i>';
                                            }else{  
                                              $result_string.='<i class="fa fa-file-text coont_box2_icon121" aria-hidden="true"></i>';
                                            } 
                                            $result_string.='<span class="coont_box2_icon">';
                                              if(isset($report_array[$value['Blog']['id']]['value'])){
                                                        
                                                           $result_string.=''.$report_array[$value['Blog']['id']]['value'].'';
                                                        
                                                        }else{
                                                        
                                                           $result_string.=' 0 ';
                                                        
                                                        }

                                                       $result_string.=' Report
                                              </span>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 connt_flex_middle_bdr" style="display:none;" id="comment'.$value['Blog']['id'].'">
                                    </div>
                                </div>';    
                                  }else{ 
                                  $result_string.='<div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 padd_l_r">
                                        <div id="change_like_count_'.$value['Blog']['id'].'" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 padd_l_r" onclick="get_blog_like_id('.$value['Blog']['id'].');">';
                                            if($like_array[$value['Blog']['id']]['status']['BlogLike']['status'] == 1){ 
                                              $result_string.='<i style="color:#2bcdc1" class="fa fa-thumbs-up coont_box2_icon121" aria-hidden="true"></i>';
                                            }else{ 
                                              $result_string.='<i class="fa fa-thumbs-up coont_box2_icon121" aria-hidden="true"></i>';        
                                            }  
                                                      
                                              $result_string.='<span class="coont_box2_icon">';       
                                                if(isset($like_array[$value['Blog']['id']]['value'])){
                                                
                                                   $result_string.=''.$like_array[$value['Blog']['id']]['value'].'';
                                                
                                                }else{
                                                
                                                   $result_string.=' 0 ';
                                                
                                                }  
                                              $result_string.='</span>
                                        </div>   

                                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 padd_l_r">
                                            <i class="fa fa-clock-o coont_box2_icon121" aria-hidden="true"></i>
                                            <span class="coont_box2_icon">
                                                '.date('d M Y', $value['Blog']['add_date']).'
                                            </span>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 padd_l_r" id="ajxa_attch_'.$value['Blog']['id'].'" onclick="shwdiv('.$value['Blog']['id'].')" style="cursor:pointer">
                                            <i class="fa fa-comments coont_box2_icon121" aria-hidden="true"></i>
                                            <span class="coont_box2_icon">';
                                               if(isset($comment_array[$value['Blog']['id']])){
                                                        
                                                           $result_string.=''.$comment_array[$value['Blog']['id']].'';
                                                        
                                                        }else{
                                                        
                                                           $result_string.=' 0 ';
                                                        
                                                        }  
                                                      
                                                      $result_string.=' COMMENTS
                                            </span>
                                        </div>
                                        
                                        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 padd_l_r" id="report_check_'.$value['Blog']['id'].'" onclick="report_blog('.$value['Blog']['id'].')" style="cursor:pointer">';
                                            if($report_array[$value['Blog']['id']]['status']['BlogReport']['status'] == 1){ 
                                              $result_string.='<i style="color:#2bcdc1" class="fa fa-file-text coont_box2_icon121" aria-hidden="true"></i>';
                                            }else{  
                                              $result_string.='<i class="fa fa-file-text coont_box2_icon121" aria-hidden="true"></i>';
                                            } 
                                            $result_string.='<span class="coont_box2_icon">';
                                              if(isset($report_array[$value['Blog']['id']]['value'])){
                                                        
                                                           $result_string.=''.$report_array[$value['Blog']['id']]['value'].'';
                                                        
                                                        }else{
                                                        
                                                           $result_string.=' 0 ';
                                                        
                                                        }

                                                       $result_string.=' Report
                                              </span>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 connt_flex_middle_bdr" style="display:none;" id="comment'.$value['Blog']['id'].'">
                                        </div>
                                    </div>';  
                                 } }else{ 

                                $result_string.='<div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 padd_l_r">
                                    <div id="change_like_count_'.$value['Blog']['id'].'" class="col-xs-12 col-sm-2 col-md-2 col-lg-1 padd_l_r" style="pointer-events: none;" onclick="get_blog_like_id('.$value['Blog']['id'].');">';
                                        if($like_array[$value['Blog']['id']]['status']['BlogLike']['status'] == 1){ 
                                              $result_string.='<i style="color:#2bcdc1" class="fa fa-thumbs-up coont_box2_icon121" aria-hidden="true"></i>';
                                            }else{ 
                                              $result_string.='<i class="fa fa-thumbs-up coont_box2_icon121" aria-hidden="true"></i>';        
                                            }  
                                                      
                                              $result_string.='<span class="coont_box2_icon">';       
                                                if(isset($like_array[$value['Blog']['id']]['value'])){
                                                
                                                   $result_string.=''.$like_array[$value['Blog']['id']]['value'].'';
                                                
                                                }else{
                                                
                                                   $result_string.=' 0 ';
                                                
                                                }  
                                        $result_string.='</span>
                                    </div>   
                                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 padd_l_r">
                                        <i class="fa fa-clock-o coont_box2_icon121" aria-hidden="true"></i>
                                        <span class="coont_box2_icon">
                                          '.date('d M Y', $value['Blog']['add_date']).'
                                        </span>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2 padd_l_r" id="ajxa_attch_'.$value['Blog']['id'].'" onclick="shwdiv('.$value['Blog']['id'].')" style="cursor:pointer">
                                        <i class="fa fa-comments coont_box2_icon121" aria-hidden="true"></i>
                                        <span class="coont_box2_icon">';
                                            if(isset($comment_array[$value['Blog']['id']])){
                                                        
                                                           $result_string.=''.$comment_array[$value['Blog']['id']].'';
                                                        
                                                        }else{
                                                        
                                                           $result_string.=' 0 ';
                                                        
                                                        }  
                                                      
                                                      $result_string.=' COMMENTS
                                        </span>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 padd_l_r" id="report_check_'.$value['Blog']['id'].'" onclick="report_blog('.$value['Blog']['id'].')" 
                                            style="pointer-events:none;">';
                                        if($report_array[$value['Blog']['id']]['status']['BlogReport']['status'] == 1){ 
                                              $result_string.='<i style="color:#2bcdc1" class="fa fa-file-text coont_box2_icon121" aria-hidden="true"></i>';
                                            }else{  
                                              $result_string.='<i class="fa fa-file-text coont_box2_icon121" aria-hidden="true"></i>';
                                            } 
                                            $result_string.='<span class="coont_box2_icon">';
                                              if(isset($report_array[$value['Blog']['id']]['value'])){
                                                        
                                                           $result_string.=''.$report_array[$value['Blog']['id']]['value'].'';
                                                        
                                                        }else{
                                                        
                                                           $result_string.=' 0 ';
                                                        
                                                        }

                                                       $result_string.=' Report
                                              </span>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 connt_flex_middle_bdr" style="display:none;" id="comment'.$value['Blog']['id'].'">
                                    </div>
                                </div>';
                            } 
                    $result_string.='</div>
                    <div class="">&nbsp;</div>
                </div>
                <div style="background-color:white;">&nbsp;</div>';     

            }   

              print_r($result_string);die;          
                   
    }else{
     
      $result_string.='';
      $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                        <center>
                           <span class="connt_flex_middle_text" style="text-align:center;">Blog does not exist!</span>
                        </center>
                      </div>';
      print_r($result_string);die;                
    }

  }
  
  public function searchConnectPost(){

      $this->autoRender = false; 
      $user=$this->Session->read('User');
      $user_id          = $user['UserMaster']['id'];
      $keyword          = $_POST['search_string'];
      $user_type        = $user['UserMaster']['user_type_id'];

      $segment_id_input = $_POST['segt_ids'];

      if(empty($user)){

          if(empty($segment_id_input)){

              $post_data = $this->Post->find('all',array(
                      'fields' => 'Post.*,userdata.*',
                      'conditions' => array(

                       'OR' => array(
                                array('AND' => array(
                                  array('Post.post_title like "%'.$keyword.'%"'),
                                  array('Post.status' => '1')
                              )),
                              array('AND' => array(
                                   array('Post.post_description like "%'.$keyword.'%"'),
                                   array('Post.status' => '1')
                              )),
                            )),  
                      
                      'joins'=>
                          array(
                            array(
                               'table'  =>'user_masters',  
                               'alias'  =>'userdata',
                               'type' =>'left',
                               'conditions'=>array(
                                      'userdata.id=Post.user_id',
                               )                  
                            ),            
                  ),
              ));
              
              // post like data 

                $post_like_array = array();  

                foreach ($post_data as  $postdata) {
                
                  $dataArray1 = $this->PostLike->find('count',array('conditions'=>array(
                                                                      'PostLike.post_id'=>$postdata['Post']['id'],
                                                                      'PostLike.status'=>1)));

                  $dataArray2 = $this->PostLike->find('first',array('conditions'=>array(
                                                                      'PostLike.post_id'=>$postdata['Post']['id'],
                                                                      'PostLike.status'=>1,
                                                                      'PostLike.user_id'=>$user_id),
                                                                      'fields'=>array('PostLike.status'))); 
                                                                                                                            
                  $post_like_array[$postdata['Post']['id']]['value'] = $dataArray1;
                  $post_like_array[$postdata['Post']['id']]['status'] = $dataArray2;
                
                } 
                
                $this->set('post_like_array',$post_like_array); 

                // post commnet data 

                $post_commmt_array = array();

                foreach ($post_data as $datas){

                  $dataArray = $this->PostComment->find('count',array('conditions'=>array(
                                                                      'PostComment.post_id'=>$datas['Post']['id'],
                                                                      'PostComment.status'=>1)));
                  $post_commmt_array[$datas['Post']['id']] = $dataArray;
                }

                $this->set('post_commmt_array',$post_commmt_array); 

          }else{

            $post_data = $this->Post->find('all',array(
                      'fields' => 'Post.*,userdata.*',
                      'conditions' => array(

                       'OR' => array(
                                array('AND' => array(
                                  array('Post.post_title like "%'.$keyword.'%"'),
                                  array('Post.status' => '1'),
                                  array('Post.segment_id' =>$segment_id_input)
                              )),
                              array('AND' => array(
                                   array('Post.post_description like "%'.$keyword.'%"'),
                                   array('Post.status' => '1'),
                                   array('Post.segment_id' =>$segment_id_input)
                              )),
                            )),  
                      
                      'joins'=>
                          array(
                            array(
                               'table'  =>'user_masters',  
                               'alias'  =>'userdata',
                               'type' =>'left',
                               'conditions'=>array(
                                      'userdata.id=Post.user_id',
                               )                  
                            ),            
                  ),
            ));

            // post like data 

              $post_like_array = array();  

              foreach ($post_data as  $postdata) {
              
                $dataArray1 = $this->PostLike->find('count',array('conditions'=>array(
                                                                    'PostLike.post_id'=>$postdata['Post']['id'],
                                                                    'PostLike.status'=>1)));

                $dataArray2 = $this->PostLike->find('first',array('conditions'=>array(
                                                                    'PostLike.post_id'=>$postdata['Post']['id'],
                                                                    'PostLike.status'=>1,
                                                                    'PostLike.user_id'=>$user_id),
                                                                    'fields'=>array('PostLike.status'))); 
                                                                                                                          
                $post_like_array[$postdata['Post']['id']]['value'] = $dataArray1;
                $post_like_array[$postdata['Post']['id']]['status'] = $dataArray2;
              
              } 
              
              $this->set('post_like_array',$post_like_array); 

              // post commnet data 

              $post_commmt_array = array();

              foreach ($post_data as $datas){

                $dataArray = $this->PostComment->find('count',array('conditions'=>array(
                                                                    'PostComment.post_id'=>$datas['Post']['id'],
                                                                    'PostComment.status'=>1)));
                $post_commmt_array[$datas['Post']['id']] = $dataArray;
              }

              $this->set('post_commmt_array',$post_commmt_array); 

      }

        
      }else{

        $user_data     = $this->UserMaster->find('first',array('conditions'=>array(
                                                             'UserMaster.id'=>$user_id,
                                                             'UserMaster.status'=>1)));

        $cat_ids       = $user_data['UserMaster']['category_id'];
        $category_ids  = explode(",",$cat_ids); 
   
        $segment_data = $this->ClassSegment->find('all',array('conditions'=>array(
                                                       'ClassSegment.status'=>1,
                                                       'ClassSegment.category_id'=>$category_ids)));

        $seg_ids_array  = array();
        foreach ($segment_data as $sgt_ids) {
          $seg_ids_array[]  = $sgt_ids['ClassSegment']['id'];   
        }

        if(empty($segment_id_input)){

            $post_data = $this->Post->find('all',array(
                      'fields' => 'Post.*,userdata.*',
                      'conditions' => array(
                         'OR' => array(
                                  array('AND' => array(
                                    array('Post.post_title like "%'.$keyword.'%"'),
                                    array('Post.status' => '1'),
                                    array('Post.segment_id'=>$seg_ids_array)
                                )),
                                array('AND' => array(
                                     array('Post.post_description like "%'.$keyword.'%"'),
                                     array('Post.status' => '1'),
                                     array('Post.segment_id'=>$seg_ids_array)
                                )),
                              )),  
                        'joins'=>
                            array(
                              array(
                                 'table'  =>'user_masters',  
                                 'alias'  =>'userdata',
                                 'type' =>'left',
                                 'conditions'=>array(
                                        'userdata.id=Post.user_id',
                                 )                  
                              ),            
                    ),
            ));

            // post like data 

        }else{

            $post_data = $this->Post->find('all',array(
                      'fields' => 'Post.*,userdata.*',
                      'conditions' => array(
                         'OR' => array(
                                  array('AND' => array(
                                    array('Post.post_title like "%'.$keyword.'%"'),
                                    array('Post.status' => '1'),
                                    array('Post.segment_id'=>$segment_id_input)
                                )),
                                array('AND' => array(
                                     array('Post.post_description like "%'.$keyword.'%"'),
                                     array('Post.status' => '1'),
                                     array('Post.segment_id'=>$segment_id_input)
                                )),
                              )),  
                        'joins'=>
                            array(
                              array(
                                 'table'  =>'user_masters',  
                                 'alias'  =>'userdata',
                                 'type' =>'left',
                                 'conditions'=>array(
                                        'userdata.id=Post.user_id',
                                 )                  
                              ),            
                    ),
            ));
          
        }

        // post like data 

          $post_like_array = array();  

          foreach ($post_data as  $postdata) {
          
            $dataArray1 = $this->PostLike->find('count',array('conditions'=>array(
                                                                'PostLike.post_id'=>$postdata['Post']['id'],
                                                                'PostLike.status'=>1)));

            $dataArray2 = $this->PostLike->find('first',array('conditions'=>array(
                                                                'PostLike.post_id'=>$postdata['Post']['id'],
                                                                'PostLike.status'=>1,
                                                                'PostLike.user_id'=>$user_id),
                                                                'fields'=>array('PostLike.status'))); 
                                                                                                                      
            $post_like_array[$postdata['Post']['id']]['value'] = $dataArray1;
            $post_like_array[$postdata['Post']['id']]['status'] = $dataArray2;
          
          } 
          
          $this->set('post_like_array',$post_like_array); 

          // post commnet data 

          $post_commmt_array = array();

          foreach ($post_data as $datas){

            $dataArray = $this->PostComment->find('count',array('conditions'=>array(
                                                                'PostComment.post_id'=>$datas['Post']['id'],
                                                                'PostComment.status'=>1)));
            $post_commmt_array[$datas['Post']['id']] = $dataArray;
          }

          $this->set('post_commmt_array',$post_commmt_array); 
  
  }



    if(!empty($post_data)){

        $result_string.='';
	      $result_string.='<div class="">&nbsp;</div>';
            
              foreach ($post_data as $value){  

                $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 blog_background_design">
                <div class="">&nbsp;</div>   
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 padd_l_r cat_pro_pic_blog">
                        <center>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">';
                                $user_pic = $value['userdata']['profile_image'];
                                        if(empty($user_pic)){

                                          $result_string.='<img class="img-thumbnail" src="'.HTTP_ROOT.'/img/connect/dummy/pic.png" alt="img not found">';
                                            }else{
                                          
                                            $user_pic1 = substr($user_pic,0,4);
                                          
                                            if($user_pic1 == 'http'){ 
                                                $result_string.='<img class="img-thumbnail" src="'.$value['userdata']['profile_image'].'" alt="img not found">';
                                               }else{ 

                                                  if( $value['userdata']['user_type_id'] == 1 ){ 

                                                    $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Vendor/profile/'.$value['userdata']['profile_image'].'" alt="img not found">';
                                                       
                                                  }else{ 
                                                          
                                                    $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Buyer/profile/'.$value['userdata']['profile_image'].'" alt="img not found">';
                                                         
                                                  }
                                
                                 } }
                            $result_string.='</div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <i class="fa fa-user coont_box2_icon121" aria-hidden="true"></i>
                                <span class="coont_box2_icon">
                                    '.$value['userdata']['first_name'].'
                                </span>    
                            </div>
                        </center>    
                    </div>
                    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10 padd_l_r">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r">
                            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 padd_l_r">   
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                                    <span class="connt_flex_middle_bdr12" style="color:#0f0f0f;text-transform: capitalize;">
                                        <b>
                                          '.$value['Post']['post_title'].'
                                        </b>
                                    </span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 padd_l_r" style="float:left;">
                          
                            </div>
                            <div class="col-xs-12 col-sm-11 col-md-12 col-lg-11 pdd_top21">
                                <span class="connt_flex_middle_bdr123" style="color:#5b595c;">
                                   '.$value['Post']['post_description'].'
                                </span>
                            </div>    
                        </div>        
                    </div>   
                </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                        <div class="col-xs-12 col-sm-3 col-md-2 col-lg-2 padd_l_r">  
                          
                        </div>';
                          if(!empty($user_id)){ 
                              if($user_type == 1){ 

                             $result_string.='<div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 padd_l_r">
                                <div id="post_change_like_count_'.$value['Post']['id'].'" class="col-xs-12 col-sm-4 col-md-4 col-lg-1 padd_l_r" style="pointer-events:none;" onclick="get_post_like_id('.$value['Post']['id'].');">';
                                      if($post_like_array[$value['Post']['id']]['status']['PostLike']['status'] == 1){ 
                                            $result_string.='<i style="color:#2bcdc1" class="fa fa-thumbs-up coont_box2_icon121" aria-hidden="true">
                                            </i>';
                                          }else{ 
                                            $result_string.='<i class="fa fa-thumbs-up coont_box2_icon121" aria-hidden="true"></i>';
                                          }  
                        
                                         $result_string.='<span class="coont_box2_icon">';
                                                    
                                          if(isset($post_like_array[$value['Post']['id']]['value'])){
                                            $result_string.=''.$post_like_array[$value['Post']['id']]['value'].'';
                                          }else{
                                             $result_string.=' 0 ';
                                          }

                                          $result_string.=' </span>                                                      
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2 padd_l_r">
                                    <i class="fa fa-clock-o coont_box2_icon121" aria-hidden="true"></i>
                                    <span class="coont_box2_icon">
                                        '.date('d M Y', $value['Post']['add_date']).'
                                    </span>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2 padd_l_r" id="post_ajxa_attch_'.$value['Post']['id'].'" onclick="postshwdiv('.$value['Post']['id'].')" style="cursor:pointer">
                                    <i class="fa fa-comments coont_box2_icon121" aria-hidden="true"></i>
                                    <span class="coont_box2_icon">';
                                         if(isset($post_commmt_array[$value['Post']['id']])){
                                            $result_string.=''.$post_commmt_array[$value['Post']['id']].'';
                                          }else{
                                             $result_string.=' 0 ';
                                          }
                                         $result_string.='  COMMENTS
                                    </span>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 connt_flex_middle_bdr" style="display:none;" id="postcomment'.$value['Post']['id'].'">
                     
                                </div> 
                            </div>';
                            
                                }else{

                                $result_string.='<div class="col-xs-12 col-sm-9 col-md-10 col-lg-7 padd_l_r">
                                    <div id="post_change_like_count_'.$value['Post']['id'].'" class="col-xs-12 col-sm-4 col-md-4 col-lg-4 padd_l_r" onclick="get_post_like_id('.$value['Post']['id'].');">';
                                          if($post_like_array[$value['Post']['id']]['status']['PostLike']['status'] == 1){ 
                                            $result_string.='<i style="color:#2bcdc1" class="fa fa-thumbs-up coont_box2_icon121" aria-hidden="true">
                                            </i>';
                                          }else{ 
                                            $result_string.='<i class="fa fa-thumbs-up coont_box2_icon121" aria-hidden="true"></i>';
                                          }  
                        
                                         $result_string.='<span class="coont_box2_icon">';
                                                    
                                          if(isset($post_like_array[$value['Post']['id']]['value'])){
                                            $result_string.=''.$post_like_array[$value['Post']['id']]['value'].'';
                                          }else{
                                             $result_string.=' 0 ';
                                          }

                                          $result_string.=' </span>   

                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 padd_l_r">
                                            <i class="fa fa-clock-o coont_box2_icon121" aria-hidden="true"></i>
                                            <span class="coont_box2_icon">
                                                '.date('d M Y', $value['Post']['add_date']).'
                                            </span>
                                        </div>
                                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 padd_l_r" id="post_ajxa_attch_'.$value['Post']['id'].'" onclick="postshwdiv('.$value['Post']['id'].')" style="cursor:pointer">
                                            <i class="fa fa-comments coont_box2_icon121" aria-hidden="true"></i>
                                            <span class="coont_box2_icon">';
                                                 if(isset($post_commmt_array[$value['Post']['id']])){
                                                      $result_string.=''.$post_commmt_array[$value['Post']['id']].'';
                                                    }else{
                                                       $result_string.=' 0 ';
                                                    }

                                                   $result_string.='  COMMENTS
                                            </span>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 connt_flex_middle_bdr" style="display:none;" id="postcomment'.$value['Post']['id'].'">
                     
                                        </div>  
                                </div>';  
                             } }else{ 
                            $result_string.='<div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 padd_l_r">
                                <div id="post_change_like_count_'.$value['Post']['id'].'" class="col-xs-12 col-sm-4 col-md-4 col-lg-1 padd_l_r" style="pointer-events:none;" onclick="get_post_like_id('.$value['Post']['id'].');">';
                                      if($post_like_array[$value['Post']['id']]['status']['PostLike']['status'] == 1){ 
                                            $result_string.='<i style="color:#2bcdc1" class="fa fa-thumbs-up coont_box2_icon121" aria-hidden="true">
                                            </i>';
                                          }else{ 
                                            $result_string.='<i class="fa fa-thumbs-up coont_box2_icon121" aria-hidden="true"></i>';
                                          }  
                        
                                         $result_string.='<span class="coont_box2_icon">';
                                                    
                                          if(isset($post_like_array[$value['Post']['id']]['value'])){
                                            $result_string.=''.$post_like_array[$value['Post']['id']]['value'].'';
                                          }else{
                                             $result_string.=' 0 ';
                                          }

                                          $result_string.=' </span>                                                      
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2 padd_l_r">
                                    <i class="fa fa-clock-o coont_box2_icon121" aria-hidden="true"></i>
                                    <span class="coont_box2_icon">
                                        '.date('d M Y', $value['Post']['add_date']).'
                                    </span>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-2 padd_l_r" id="post_ajxa_attch_'.$value['Post']['id'].'" onclick="postshwdiv('.$value['Post']['id'].')" style="cursor:pointer">
                                    <i class="fa fa-comments coont_box2_icon121" aria-hidden="true"></i>
                                    <span class="coont_box2_icon">';
                                         if(isset($post_commmt_array[$value['Post']['id']])){
                                            $result_string.=''.$post_commmt_array[$value['Post']['id']].'';
                                          }else{
                                             $result_string.=' 0 ';
                                          }
                                         $result_string.='  COMMENTS
                                    </span>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 connt_flex_middle_bdr" style="display:none;" id="postcomment'.$value['Post']['id'].'">
                     
                                </div> 
                            </div>';
                          } 
                    $result_string.='</div>
                <div class="">&nbsp;</div>
            </div>
            <div style="background-color:white;">&nbsp;</div>';  
                 }   

              print_r($result_string);die;          
                   
    }else{
     
      $result_string.='';
      $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                        <center>
                           <span class="connt_flex_middle_text" style="text-align:center;">Post does not exist!</span>
                        </center>
                      </div>';
      print_r($result_string);die;                  
    }                                                               
  
}   


  public function reportBlog(){

      $this->autoRender = false; 
      if(!empty($_POST)){  
          $chech_report_data = $this->BlogReport->find('first',array('conditions'=>array(
                                                                          'BlogReport.user_id'=>$_POST['userid'],
                                                                          'BlogReport.blog_id'=>$_POST['report_id'])));
          if(empty($chech_report_data)){
               $report_array = array();
               $report_array['user_id']     = $_POST['userid'];
               $report_array['blog_id']     = $_POST['report_id'];
               $report_array['status']      = 1;
               $report_array['add_date']    = time();
               $report_array['modify_date'] = time();
               $this->BlogReport->save($report_array);

               $report_count_data = $this->BlogReport->find('count',array('conditions'=>array(
                                                                          'BlogReport.blog_id'=>$_POST['report_id'],
                                                                          'BlogReport.status'=>1)));
                $result_string.='';
                $result_string.='<i style="color:#2bcdc1" class="fa fa-file-text coont_box2_icon121" style="cursor:pointer"></i>
                                  <span class="coont_box2_icon">';
                                     if(isset($report_count_data)){ 
                                          $result_string.=''.$report_count_data.' ';
                                       }else{
                                          $result_string.='0 ';  
                                       }
                $result_string.=' Report</span>';
                print_r($result_string);die;
         
          }else{
            return 2;
          }
    }
  
  }

  public function blogCommentReplyData(){

    if(isset($_POST)){

      $this->autoRender = false; 
      $commt_id         = $_POST['commt_id'];
      $user_id          = $_POST['user_id'];

      $userdata         = $this->UserMaster->find('first',array('conditions' => array(
                                                                'UserMaster.id' => $user_id,
                                                                'UserMaster.status' => 1)));

      $user_type_id     = $userdata['UserMaster']['user_type_id'];

      $commt_reply_data = $this->BlogCommentReply->find('all',array(
                                            'joins' => array(
                                              array(
                                                  'table'      => 'bg_user_masters',
                                                  'alias'      => 'usermaster',
                                                  'type'       => 'left', 
                                                  'conditions' => array('BlogCommentReply.user_id = usermaster.id'))),    
                                              'conditions'=>array('BlogCommentReply.comment_id'=>$commt_id),
                                              'fields' =>array('BlogCommentReply.*','usermaster.*')));

      $commt_count_data = $this->BlogCommentReply->find('count',array('conditions'=>array(
                                                                           'BlogCommentReply.comment_id'=>$commt_id,
                                                                           'BlogCommentReply.status'=>1)));

      $result_string.='';
      $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 blog_background_design" id="blog_reply_data_'.$commt_id.'" >           
                            <div class="">&nbsp;</div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              <span style="color:#0f0f0f" class="connt_flex_middle_bdr12">';
                                if(isset($commt_count_data)){
                                        
                                        $result_string.=''.$commt_count_data.'';
                                      
                                      }else{
                                        
                                        $result_string.=' 0 ';
                                  }
                            $result_string.=' Replies </span>
                            </div>';
                          foreach ($commt_reply_data as $postdata){ 
                            $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-right comm_box2_chat_box">
                              <center><div class="col-xs-12 col-sm-3 col-md-4 col-lg-2 cmmt_box_de mar_pad">';
                                  $user_pic = $postdata['usermaster']['profile_image'];
                                    if(empty($user_pic)){ 

                                      $result_string.='<img class="profile_pic img-circle" src="'.HTTP_ROOT.'/img/connect/dummy/pic.png" alt="img not found">';

                                    }else{

                                      $user_pic1 = substr($user_pic,0,4);

                                      if($user_pic1 == 'http'){

                                        $result_string.='<img class="profile_pic img-circle" src="'.$postdata['usermaster']['profile_image'].'" alt="img not found">';

                                       }else{ 

                                          if( $postdata['usermaster']['user_type_id'] == 1 ){ 

                                            $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Vendor/profile/'.$postdata['usermaster']['profile_image'].'" alt="img not found">';
                                                       
                                          }else{ 
                                                          
                                            $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Buyer/profile/'.$postdata['usermaster']['profile_image'].'" alt="img not found">';
                                                         
                                          }

                                       } } 
                          $result_string.='</div></center>   
                          <div class="col-xs-12 col-sm-9 col-md-8 col-lg-10 cmmt_box_de">
                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r mar_pad">
                                  <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;">
                                    '.$postdata['usermaster']['first_name'].' 
                                  </span>
                                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">
                                     on '.date('d M Y', $postdata['BlogCommentReply']['add_date']).' at '.date('h:i a',$postdata['BlogCommentReply']['add_date']).' 
                                  </span>
                              </div> 
                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r mar_pad">
                                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;">
                                    '.$postdata['BlogCommentReply']['reply'].' 
                                  </span>
                              </div>
                          </div>
                      </div><div class="">&nbsp;</div>';
                     }
                    if(!empty($user_id) && $user_type_id == 2){ 
                     $result_string.='<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                      <fieldset class="form-group">
                        <textarea rows="3" cols="15" type="text" id="blog_commt_replies_'.$commt_id.'" class="form-control input_login" placeholder="Write a reply..." style="border: 2px solid #2bcdc1 !important;"></textarea>
                        <span class="err" id="err_blog_commt_replies_'.$commt_id.'">&nbsp;</span>
                        </fieldset>
                        <button style="background-color:#2bcdc1;border:none;" type="button" 
                        class="btn btn-primary" onclick="blog_cmt_reply_submit('.$commt_id.')">Send</button>
                        <div class="">&nbsp;</div>
                    </div> 
                  </div>';}
                  print_r($result_string);die;      
            }   
    }

    public function blogCommtReply(){

          $this->autoRender = false; 
            if(isset($_POST)){

              $blog_cmmt_rply_array                = array();
              $blog_cmmt_rply_array['comment_id']  = $_POST['commt_id'];
              $blog_cmmt_rply_array['user_id']     = $_POST['user_id'];
              $blog_cmmt_rply_array['reply']       = $_POST['reply'];
              $blog_cmmt_rply_array['status']      = 1;
              $blog_cmmt_rply_array['add_date']    = time();
              $blog_cmmt_rply_array['modify_date'] = time();

              $result  = $this->BlogCommentReply->save($blog_cmmt_rply_array);

              if(isset($result)){

                $commt_id     = $_POST['commt_id'];
                
                $commt_reply_data = $this->BlogCommentReply->find('all',array(
                                            'joins' => array(
                                              array(
                                                  'table'      => 'bg_user_masters',
                                                  'alias'      => 'usermaster',
                                                  'type'       => 'left', 
                                                  'conditions' => array('BlogCommentReply.user_id = usermaster.id'))),    
                                              'conditions'=>array('BlogCommentReply.comment_id'=>$commt_id),
                                              'fields' =>array('BlogCommentReply.*','usermaster.*')));

                
               $commt_count_data = $this->BlogCommentReply->find('count',array('conditions'=>array(
                                                                           'BlogCommentReply.comment_id'=>$commt_id,
                                                                           'BlogCommentReply.status'=>1)));

                $result_string.='';
                $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 blog_background_design" id="blog_reply_data_'.$commt_id.'" >           
                            <div class="">&nbsp;</div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              <span style="color:#0f0f0f" class="connt_flex_middle_bdr12">';
                                if(isset($commt_count_data)){
                                        
                                        $result_string.=''.$commt_count_data.'';
                                      
                                      }else{
                                        
                                        $result_string.='0 ';
                                  }
                            $result_string.=' Replies </span>
                            </div>';
                          foreach ($commt_reply_data as $postdata){ 
                            $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-right comm_box2_chat_box">
                              <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 cmmt_box_de">';
                                  $user_pic = $postdata['usermaster']['profile_image'];
                                    if(empty($user_pic)){ 

                                      $result_string.='<img class="profile_pic img-circle" src="'.HTTP_ROOT.'/img/connect/dummy/pic.png" alt="img not found">';

                                    }else{

                                      $user_pic1 = substr($user_pic,0,4);

                                      if($user_pic1 == 'http'){

                                        $result_string.='<img class="profile_pic img-circle" src="'.$postdata['usermaster']['profile_image'].'" alt="img not found">';

                                       }else{ 

                                          if( $postdata['usermaster']['user_type_id'] == 1 ){ 

                                            $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Vendor/profile/'.$postdata['usermaster']['profile_image'].'" alt="img not found">';
                                                       
                                          }else{ 
                                                          
                                            $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Buyer/profile/'.$postdata['usermaster']['profile_image'].'" alt="img not found">';
                                                         
                                          }

                                       } } 
                          $result_string.='</div>   
                          <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 cmmt_box_de">
                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r" style="padding-top:15px;">
                                  <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;padding-top:30px;">
                                    '.$postdata['usermaster']['first_name'].' 
                                  </span>
                                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;padding-right:5px;">
                                     on '.date('d M Y', $postdata['BlogCommentReply']['add_date']).' at '.date('h:i a',$postdata['BlogCommentReply']['add_date']).' 
                                  </span>
                              </div> 
                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r" style="padding-top:15px;">
                                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;">
                                    '.$postdata['BlogCommentReply']['reply'].' 
                                  </span>
                              </div>
                          </div>
                      </div><div class="">&nbsp;</div>';
                     } 
                     $result_string.='<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                      <fieldset class="form-group">
                        <textarea rows="3" cols="15" type="text" id="blog_commt_replies_'.$commt_id.'" class="form-control input_login" placeholder="Write a reply..." style="border: 2px solid #2bcdc1 !important;"></textarea>
                        <span class="err" id="err_blog_commt_replies_'.$commt_id.'">&nbsp;</span>
                        </fieldset>
                        <button style="background-color:#2bcdc1;border:none;" type="button" 
                        class="btn btn-primary" onclick="blog_cmt_reply_submit('.$commt_id.')">Send</button>
                        <div class="">&nbsp;</div>
                    </div> 
                  </div>';
                  print_r($result_string);die;  

              }
            } 
      } 
 
  // reply on cmment User post

  public function postCommentReplyData(){

    if(isset($_POST)){

      $this->autoRender = false; 
      $commt_id         = $_POST['commt_id'];
      $user_id          = $_POST['user_id'];
      
      $userdata         = $this->UserMaster->find('first',array('conditions' => array(
                                                                'UserMaster.id' => $user_id,
                                                                'UserMaster.status' => 1)));

      $user_type_id     = $userdata['UserMaster']['user_type_id'];  

      $commt_reply_data = $this->PostCommentReply->find('all',array(
                                            'joins' => array(
                                              array(
                                                  'table'      => 'bg_user_masters',
                                                  'alias'      => 'usermaster',
                                                  'type'       => 'left', 
                                                  'conditions' => array('PostCommentReply.user_id = usermaster.id'))),    
                                              'conditions'=>array('PostCommentReply.comment_id'=>$commt_id),
                                              'fields' =>array('PostCommentReply.*','usermaster.*')));

      $commt_count_data = $this->PostCommentReply->find('count',array('conditions'=>array(
                                                                           'PostCommentReply.comment_id'=>$commt_id,
                                                                           'PostCommentReply.status'=>1)));

      $result_string.='';
      $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 blog_background_design" id="post_reply_data_'.$commt_id.'">           
                            <div class="">&nbsp;</div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              <span style="color:#0f0f0f" class="connt_flex_middle_bdr12">';
                                if(isset($commt_count_data)){
                                        
                                        $result_string.=''.$commt_count_data.'';
                                      
                                      }else{
                                        
                                        $result_string.='0 ';
                                  }
                            $result_string.=' Replies </span>
                            </div>';
                          foreach($commt_reply_data as $postdata){ 

                            $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-right comm_box2_chat_box">
                              <center><div class="col-xs-12 col-sm-3 col-md-4 col-lg-2 cmmt_box_de mar_pad">';
                                  $user_pic = $postdata['usermaster']['profile_image'];
                                    if(empty($user_pic)){ 

                                      $result_string.='<img class="profile_pic img-circle" src="'.HTTP_ROOT.'/img/connect/dummy/pic.png" alt="img not found">';

                                    }else{

                                      $user_pic1 = substr($user_pic,0,4);

                                      if($user_pic1 == 'http'){

                                        $result_string.='<img class="profile_pic img-circle" src="'.$postdata['usermaster']['profile_image'].'" alt="img not found">';

                                       }else{ 

                                          if( $postdata['usermaster']['user_type_id'] == 1 ){ 

                                            $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Vendor/profile/'.$postdata['usermaster']['profile_image'].'" alt="img not found">';
                                                       
                                          }else{ 
                                                          
                                            $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Buyer/profile/'.$postdata['usermaster']['profile_image'].'" alt="img not found">';
                                                         
                                          }

                                       } } 

                          $result_string.='</div></center>   
                          <div class="col-xs-12 col-sm-9 col-md-8 col-lg-10 cmmt_box_de">
                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r mar_pad">
                                  <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;">
                                    '.$postdata['usermaster']['first_name'].' 
                                  </span>
                                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">
                                     on '.date('d M Y', $postdata['PostCommentReply']['add_date']).' at '.date('h:i a',$postdata['PostCommentReply']['add_date']).' 
                                  </span>
                              </div> 
                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r mar_pad">
                                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;">
                                    '.$postdata['PostCommentReply']['reply'].' 
                                  </span>
                              </div>
                          </div>
                      </div><div class="">&nbsp;</div>';
                     } 
                    if(!empty($user_id) && $user_type_id == 2 ){ 
                     $result_string.='<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                      <fieldset class="form-group">
                        <textarea rows="3" cols="15" type="text" id="post_commt_replies_'.$commt_id.'" class="form-control input_login" placeholder="Write a reply..." style="border: 2px solid #2bcdc1 !important;"></textarea>
                        <span class="err" id="err_post_commt_replies_'.$commt_id.'">&nbsp;</span>
                        </fieldset>
                        <button style="background-color:#2bcdc1;border:none;" type="button" 
                        class="btn btn-primary" onclick="post_cmt_reply_submit('.$commt_id.')">Send</button>
                        <div class="">&nbsp;</div>
                    </div> 
                  </div>';
                  }
                  print_r($result_string);die;      
            }   
       }   

        public function postCommtReply(){

          $this->autoRender = false; 
            if(isset($_POST)){
              
              $post_cmmt_rply_array                = array();
              $post_cmmt_rply_array['comment_id']  = $_POST['commt_id'];
              $post_cmmt_rply_array['user_id']     = $_POST['user_id'];
              $post_cmmt_rply_array['reply']       = $_POST['reply'];
              $post_cmmt_rply_array['status']      = 1;
              $post_cmmt_rply_array['add_date']    = time();
              $post_cmmt_rply_array['modify_date'] = time();

              $result  = $this->PostCommentReply->save($post_cmmt_rply_array);

              if(isset($result)){

                $commt_id         = $_POST['commt_id'];

                $commt_reply_data = $this->PostCommentReply->find('all',array(
                                            'joins' => array(
                                              array(
                                                  'table'      => 'bg_user_masters',
                                                  'alias'      => 'usermaster',
                                                  'type'       => 'left', 
                                                  'conditions' => array('PostCommentReply.user_id = usermaster.id'))),    
                                              'conditions'=>array('PostCommentReply.comment_id'=>$commt_id),
                                              'fields' =>array('PostCommentReply.*','usermaster.*')));

                $commt_count_data = $this->PostCommentReply->find('count',array('conditions'=>array(
                                                                           'PostCommentReply.comment_id'=>$commt_id,
                                                                           'PostCommentReply.status'=>1)));

                $result_string.='';
                $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 blog_background_design" id="post_reply_data_'.$commt_id.'" >           
                            <div class="">&nbsp;</div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              <span style="color:#0f0f0f" class="connt_flex_middle_bdr12">';
                                if(isset($commt_count_data)){
                                        
                                        $result_string.=''.$commt_count_data.'';
                                      
                                      }else{
                                        
                                        $result_string.=' 0 ';
                                  }
                            $result_string.=' Replies </span>
                            </div>';
                          foreach ($commt_reply_data as $postdata){ 
                            $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-right comm_box2_chat_box">
                              <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 cmmt_box_de">';
                                  $user_pic = $postdata['usermaster']['profile_image'];
                                    if(empty($user_pic)){ 

                                      $result_string.='<img class="profile_pic img-circle" src="'.HTTP_ROOT.'/img/connect/dummy/pic.png" alt="img not found">';

                                    }else{

                                      $user_pic1 = substr($user_pic,0,4);

                                      if($user_pic1 == 'http'){

                                          $result_string.='<img class="profile_pic img-circle" src="'.$postdata['usermaster']['profile_image'].'" alt="img not found">';

                                       }else{ 

                                          if( $postdata['usermaster']['user_type_id'] == 1 ){ 

                                            $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Vendor/profile/'.$postdata['usermaster']['profile_image'].'" alt="img not found">';
                                                       
                                          }else{ 
                                                          
                                            $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Buyer/profile/'.$postdata['usermaster']['profile_image'].'" alt="img not found">';
                                                         
                                          }

                                       } } 
                          $result_string.='</div>   
                          <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 cmmt_box_de">
                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r" style="padding-top:15px;">
                                  <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;padding-top:30px;">
                                    '.$postdata['usermaster']['first_name'].' 
                                  </span>
                                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;padding-right:5px;">
                                     on '.date('d M Y', $postdata['PostCommentReply']['add_date']).' at '.date('h:i a',$postdata['PostCommentReply']['add_date']).' 
                                  </span>
                              </div> 
                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r" style="padding-top:15px;">
                                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;">
                                    '.$postdata['PostCommentReply']['reply'].' 
                                  </span>
                              </div>
                          </div>
                      </div><div class="">&nbsp;</div>';
                     }

                     if($user_id){ 
                     
                     $result_string.='<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                      <fieldset class="form-group">
                        <textarea rows="3" cols="15" type="text" id="blog_commt_replies_'.$commt_id.'" class="form-control input_login" placeholder="Write a reply..." style="border: 2px solid #2bcdc1 !important;"></textarea>
                        <span class="err" id="err_blog_commt_replies_'.$commt_id.'">&nbsp;</span>
                        </fieldset>
                        <button style="background-color:#2bcdc1;border:none;" type="button" 
                        class="btn btn-primary" onclick="blog_cmt_reply_submit('.$commt_id.')">Send</button>
                        <div class="">&nbsp;</div>
                    </div> 
                  </div>';
                  }
                  print_r($result_string);die;  

              }
          } 
    }

    //  Connect Group Page functions    

      public function searchGroupSegment(){

          $this->autoRender = false; 
          $user    = $this->Session->read('User');
          $user_id = $user['UserMaster']['id'];
          $keyword = $_POST['search_seg'];
          $segment_data   =  $this->ConnectSegmentGroup->find('all',array('conditions' => array(
                                      'ConnectSegmentGroup.status'=>1,
                                      'ConnectSegmentGroup.group_name LIKE' => '%'.$keyword.'%'),
                            'fields' => array('ConnectSegmentGroup.*')));  
          $grp_array_data = array();
          $seg_data = array();
          foreach($segment_data as $value){  
            $seg_data[]  = $value['ConnectSegmentGroup']['id'];
          }
          if(empty($segment_data)){
              $result_string.=''; 
              $result_string.='
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 cat_img_cnnt">
                  <div class="">&nbsp;</div>
                  <center>
                    <span style="color:#2bcdc1" class="my_grp_tab">No Segment found.</span>
                  </center>        
              </div>';
          
          }else{

            foreach($segment_data as $data){ 
              $result_string.=''; 
              $result_string.='<div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 cat_img_cnnt" id="'.$data['ConnectSegmentGroup']['id'].'" style="margin-top:25px;cursor:pointer;"  onclick="getcatid('.$data['ConnectSegmentGroup']['id'].');">
                  <center class="cat_image" id="res'.$data['ConnectSegmentGroup']['id'].'">';
                    if(empty($data['ConnectSegmentGroup']['group_image'])){ 
                        $result_string.='<img class="image-responsive img-circle" src="'.HTTP_ROOT.'/img/group_image/'.$data['ConnectSegmentGroup']['group_image'].'" alt="img not found">';
                      }else{ 
                        $result_string.='<img class="image-responsive img-circle" src="'.HTTP_ROOT.'/img/group_image/'.$data['ConnectSegmentGroup']['group_image'].'" alt="img not found">';
                      } 
                  $result_string.='</center>    
                  <div class="hidden-xs">&nbsp;</div>
                  <center>
                      <span class="connt_flex_middle_text">
                      '.$data['ConnectSegmentGroup']['group_name'].'
                      </span>
                  </center>        
              </div>';

            }
          }
          $grp_array_data[0] = $seg_data;
          $grp_array_data[1] = $result_string;
          print_r(json_encode($grp_array_data));die;

  }


   public function searchMYGroupSegment(){

          $this->autoRender = false; 
          $user             = $this->Session->read('User');
          $user_id          = $user['UserMaster']['id'];
          $keyword          = $_POST['search_seg'];
          $segment_id_input = $_POST['segt_ids'];
          
          if(empty($user_id)){

             
        
          }else{

            $segment_data   =  $this->ConnectSegmentGroup->find('all',array('conditions' => array(
                                                                'ConnectSegmentGroup.id'=>$segment_id_input,
                                                                'ConnectSegmentGroup.group_name LIKE' => '%'.$keyword.'%',
                                                                'ConnectSegmentGroup.status'=>1,),
                                                  'fields' => array('ConnectSegmentGroup.*')));

            $grp_array_data = array();
            $seg_data = array();

            foreach($segment_data as $value){  
              $seg_data[]  = $value['ConnectSegmentGroup']['id'];
            }

            if(empty($segment_data)){
                    $result_string.=''; 
                    $result_string.='
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 cat_img_cnnt">
                        <div class="">&nbsp;</div>
                        <center>
                          <span style="color:#2bcdc1" class="my_grp_tab">No Segment found.</span>
                        </center>        
                    </div>';
            }else{
              foreach($segment_data as $data){ 
                $result_string.=''; 
                $result_string.='<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 cat_img_cnnt" id="'.$data['ConnectSegmentGroup']['id'].'" style="margin-top:25px;cursor:pointer;"  
				onclick="getcatid('.$data['ConnectSegmentGroup']['id'].');">
                    <center class="cat_image" id="res'.$data['ConnectSegmentGroup']['id'].'">';
                      if(empty($data['ConnectSegmentGroup']['group_image'])){ 
                          $result_string.='<img class="image-responsive img-circle" src="'.HTTP_ROOT.'/img/group_image/'.$data['ConnectSegmentGroup']['group_image'].'" alt="img not found">';
                        }else{ 
                          $result_string.='<img class="image-responsive img-circle" src="'.HTTP_ROOT.'/img/group_image/'.$data['ConnectSegmentGroup']['group_image'].'" alt="img not found">';
                        } 

                    $result_string.='</center>    
                    <div class="">&nbsp;</div>
                    <center>
                        <span class="connt_flex_middle_text">
                        '.$data['ConnectSegmentGroup']['group_name'].'
                        <span>
                    </center>        
                </div>';
              }
            }
            $grp_array_data[0] = $seg_data;
            $grp_array_data[1] = $result_string;
            print_r(json_encode($grp_array_data));die;

        }

  }

 
  public function searchGroupActivity(){
      
        $this->autoRender = false; 
        $user             = $this->Session->read('User');
        $user_id          = $user['UserMaster']['id'];
        $keyword          = $_POST['search_string'];
        $user_type        = $user['UserMaster']['user_type_id'];
        $segment_id_input = $_POST['segt_ids'];

        if(empty($user)){

          if(empty($segment_id_input)){

              $group_data = $this->GroupActivity->find('all',array(
                                           'joins' => array(
                                                        array(
                                                            'table'      => 'bg_user_masters',
                                                            'alias'      => 'usermaster',
                                                            'type'       => 'left',
                                                            'conditions' => array('GroupActivity.user_id = usermaster.id'))),
                                            'conditions' => array('OR' => array(
                                                                      array('AND' => array(
                                                                          array('GroupActivity.request_purpose like "%'.$keyword.'%"'),
                                                                          array('GroupActivity.status' => '1')
                                                                      )),
                                                                  )),
                                            'fields'     => array('GroupActivity.*','usermaster.*'),
                                             ));
              
              // Activity like data 

              $group_like = array();  
              foreach ($group_data as  $cmmtdata) {
                $dataArray1 = $this->GroupActivityLike->find('count',array('conditions'=>array(
                                                                    'GroupActivityLike.activity_id'=>$cmmtdata['GroupActivity']['id'],
                                                                    'GroupActivityLike.status'=>1)));
                $dataArray2 = $this->GroupActivityLike->find('first',array('conditions'=>array(
                                                                    'GroupActivityLike.activity_id'=>$cmmtdata['GroupActivity']['id'],
                                                                    'GroupActivityLike.status'=>1,
                                                                    'GroupActivityLike.user_id'=>$user_id),
                                                                    'fields'=>array('GroupActivityLike.status')));                      
                $group_like[$cmmtdata['GroupActivity']['id']]['value'] = $dataArray1;
                $group_like[$cmmtdata['GroupActivity']['id']]['status'] = $dataArray2;
              } 

              // comment data 

              $group_commt = array();
              foreach ($group_data as $datas){
                $dataArray = $this->GroupActivityComment->find('count',array('conditions'=>array(
                                                                    'GroupActivityComment.activity_id'=>$datas['GroupActivity']['id'],
                                                                    'GroupActivityComment.status'=>1)));
                $group_commt[$datas['GroupActivity']['id']] = $dataArray;
              }

              $this->set('group_like',$group_like);
              $this->set('group_commt',$group_commt);
              
              // activity Report data 

              $report_array = array(); 
                foreach ($group_data as  $reportdata){
                    $dataArray1 = $this->GroupActivityReport->find('count',array('conditions'=>array(
                                                                        'GroupActivityReport.activity_id'=>$reportdata['GroupActivity']['id'],
                                                                        'GroupActivityReport.status'=>1)));

                    $dataArray2 = $this->GroupActivityReport->find('first',array('conditions'=>array(
                                                                        'GroupActivityReport.activity_id'=>$reportdata['GroupActivity']['id'],
                                                                        'GroupActivityReport.status'=>1,
                                                                        'GroupActivityReport.user_id'=>$user_id),
                                                                        'fields'=>array('GroupActivityReport.status'))); 
                    $report_array[$reportdata['GroupActivity']['id']]['value'] =  $dataArray1;
                    $report_array[$reportdata['GroupActivity']['id']]['status'] = $dataArray2;
                    
                } 
                $this->set('report_array',$report_array); 
              
          }else{

              $segment_id_inputs   = explode(",",$segment_id_input);

              $group_data = $this->GroupActivity->find('all',array(
                                           'joins' => array(
                                                        array(
                                                            'table'      => 'bg_user_masters',
                                                            'alias'      => 'usermaster',
                                                            'type'       => 'left',
                                                            'conditions' => array('GroupActivity.user_id = usermaster.id'))),
                                            'conditions' => array('OR' => array(
                                                                      array('AND' => array(
                                                                          array('GroupActivity.request_purpose like "%'.$keyword.'%"'),
                                                                          array('GroupActivity.status' => '1'),
                                                                          array('GroupActivity.group_id'=>$segment_id_inputs)
                                                                      )),
                                                                  )),
                                            'fields'     => array('GroupActivity.*','usermaster.*'),
              ));
              
              // Activity like data 

              $group_like = array();  
              foreach ($group_data as  $cmmtdata) {
                $dataArray1 = $this->GroupActivityLike->find('count',array('conditions'=>array(
                                                                    'GroupActivityLike.activity_id'=>$cmmtdata['GroupActivity']['id'],
                                                                    'GroupActivityLike.status'=>1)));
                $dataArray2 = $this->GroupActivityLike->find('first',array('conditions'=>array(
                                                                    'GroupActivityLike.activity_id'=>$cmmtdata['GroupActivity']['id'],
                                                                    'GroupActivityLike.status'=>1,
                                                                    'GroupActivityLike.user_id'=>$user_id),
                                                                    'fields'=>array('GroupActivityLike.status')));                      
                $group_like[$cmmtdata['GroupActivity']['id']]['value'] = $dataArray1;
                $group_like[$cmmtdata['GroupActivity']['id']]['status'] = $dataArray2;
              } 

              // comment data 

              $group_commt = array();
              foreach ($group_data as $datas){
                $dataArray = $this->GroupActivityComment->find('count',array('conditions'=>array(
                                                                    'GroupActivityComment.activity_id'=>$datas['GroupActivity']['id'],
                                                                    'GroupActivityComment.status'=>1)));
                $group_commt[$datas['GroupActivity']['id']] = $dataArray;
              }

              $this->set('group_like',$group_like);
              $this->set('group_commt',$group_commt);
              
              // activity Report data 

              $report_array = array(); 
                foreach ($group_data as  $reportdata){
                    $dataArray1 = $this->GroupActivityReport->find('count',array('conditions'=>array(
                                                                        'GroupActivityReport.activity_id'=>$reportdata['GroupActivity']['id'],
                                                                        'GroupActivityReport.status'=>1)));

                    $dataArray2 = $this->GroupActivityReport->find('first',array('conditions'=>array(
                                                                        'GroupActivityReport.activity_id'=>$reportdata['GroupActivity']['id'],
                                                                        'GroupActivityReport.status'=>1,
                                                                        'GroupActivityReport.user_id'=>$user_id),
                                                                        'fields'=>array('GroupActivityReport.status'))); 
                    $report_array[$reportdata['GroupActivity']['id']]['value'] =  $dataArray1;
                    $report_array[$reportdata['GroupActivity']['id']]['status'] = $dataArray2;
                    
                } 
                $this->set('report_array',$report_array); 
                                   
          }

      }else{
         
          if(empty($segment_id_input)){

              $group_data = $this->GroupActivity->find('all',array(
                                           'joins' => array(
                                                        array(
                                                            'table'      => 'bg_user_masters',
                                                            'alias'      => 'usermaster',
                                                            'type'       => 'left',
                                                            'conditions' => array('GroupActivity.user_id = usermaster.id'))),
                                            'conditions' => array('OR' => array(
                                                                      array('AND' => array(
                                                                          array('GroupActivity.request_purpose like "%'.$keyword.'%"'),
                                                                          array('GroupActivity.status' => '1')
                                                                      )),
                                                                  )),
                                            'fields'     => array('GroupActivity.*','usermaster.*'),
                                             ));
              

              // Activity like data 
              $group_like = array();  
              foreach ($group_data as  $cmmtdata) {
                $dataArray1 = $this->GroupActivityLike->find('count',array('conditions'=>array(
                                                                    'GroupActivityLike.activity_id'=>$cmmtdata['GroupActivity']['id'],
                                                                    'GroupActivityLike.status'=>1)));
                $dataArray2 = $this->GroupActivityLike->find('first',array('conditions'=>array(
                                                                    'GroupActivityLike.activity_id'=>$cmmtdata['GroupActivity']['id'],
                                                                    'GroupActivityLike.status'=>1,
                                                                    'GroupActivityLike.user_id'=>$user_id),
                                                                    'fields'=>array('GroupActivityLike.status')));                      
                $group_like[$cmmtdata['GroupActivity']['id']]['value'] = $dataArray1;
                $group_like[$cmmtdata['GroupActivity']['id']]['status'] = $dataArray2;
              } 


              // comment data 
              $group_commt = array();
              foreach ($group_data as $datas){
                $dataArray = $this->GroupActivityComment->find('count',array('conditions'=>array(
                                                                    'GroupActivityComment.activity_id'=>$datas['GroupActivity']['id'],
                                                                    'GroupActivityComment.status'=>1)));
                $group_commt[$datas['GroupActivity']['id']] = $dataArray;
              }

              $this->set('group_like',$group_like);
              $this->set('group_commt',$group_commt);
              

              // activity Report data 
              $report_array = array(); 
                foreach ($group_data as  $reportdata){
                    $dataArray1 = $this->GroupActivityReport->find('count',array('conditions'=>array(
                                                                        'GroupActivityReport.activity_id'=>$reportdata['GroupActivity']['id'],
                                                                        'GroupActivityReport.status'=>1)));

                    $dataArray2 = $this->GroupActivityReport->find('first',array('conditions'=>array(
                                                                        'GroupActivityReport.activity_id'=>$reportdata['GroupActivity']['id'],
                                                                        'GroupActivityReport.status'=>1,
                                                                        'GroupActivityReport.user_id'=>$user_id),
                                                                        'fields'=>array('GroupActivityReport.status'))); 
                    $report_array[$reportdata['GroupActivity']['id']]['value'] =  $dataArray1;
                    $report_array[$reportdata['GroupActivity']['id']]['status'] = $dataArray2;
                    
                } 
                $this->set('report_array',$report_array); 
            

          }else{

              $segment_id_inputs   = explode(",",$segment_id_input);
              $group_data = $this->GroupActivity->find('all',array(
                                           'joins' => array(
                                                        array(
                                                            'table'      => 'bg_user_masters',
                                                            'alias'      => 'usermaster',
                                                            'type'       => 'left',
                                                            'conditions' => array('GroupActivity.user_id = usermaster.id'))),
                                            'conditions' => array('OR' => array(
                                                                      array('AND' => array(
                                                                          array('GroupActivity.request_purpose like "%'.$keyword.'%"'),
                                                                          array('GroupActivity.status' => '1'),
                                                                          array('GroupActivity.group_id'=>$segment_id_inputs)
                                                                      )),
                                                                  )),
                                            'fields'     => array('GroupActivity.*','usermaster.*'),
              ));
                
             // Activity like data 

              $group_like = array();  
              foreach ($group_data as  $cmmtdata) {
                $dataArray1 = $this->GroupActivityLike->find('count',array('conditions'=>array(
                                                                    'GroupActivityLike.activity_id'=>$cmmtdata['GroupActivity']['id'],
                                                                    'GroupActivityLike.status'=>1)));
                $dataArray2 = $this->GroupActivityLike->find('first',array('conditions'=>array(
                                                                    'GroupActivityLike.activity_id'=>$cmmtdata['GroupActivity']['id'],
                                                                    'GroupActivityLike.status'=>1,
                                                                    'GroupActivityLike.user_id'=>$user_id),
                                                                    'fields'=>array('GroupActivityLike.status')));                      
                $group_like[$cmmtdata['GroupActivity']['id']]['value'] = $dataArray1;
                $group_like[$cmmtdata['GroupActivity']['id']]['status'] = $dataArray2;
              } 

              // comment data 

              $group_commt = array();
              foreach ($group_data as $datas){
                $dataArray = $this->GroupActivityComment->find('count',array('conditions'=>array(
                                                                    'GroupActivityComment.activity_id'=>$datas['GroupActivity']['id'],
                                                                    'GroupActivityComment.status'=>1)));
                $group_commt[$datas['GroupActivity']['id']] = $dataArray;
              }

              $this->set('group_like',$group_like);
              $this->set('group_commt',$group_commt);
              
              // activity Report data 

              $report_array = array(); 
                foreach ($group_data as  $reportdata){
                    $dataArray1 = $this->GroupActivityReport->find('count',array('conditions'=>array(
                                                                        'GroupActivityReport.activity_id'=>$reportdata['GroupActivity']['id'],
                                                                        'GroupActivityReport.status'=>1)));

                    $dataArray2 = $this->GroupActivityReport->find('first',array('conditions'=>array(
                                                                        'GroupActivityReport.activity_id'=>$reportdata['GroupActivity']['id'],
                                                                        'GroupActivityReport.status'=>1,
                                                                        'GroupActivityReport.user_id'=>$user_id),
                                                                        'fields'=>array('GroupActivityReport.status'))); 
                    $report_array[$reportdata['GroupActivity']['id']]['value'] =  $dataArray1;
                    $report_array[$reportdata['GroupActivity']['id']]['status'] = $dataArray2;
                    
                } 
                $this->set('report_array',$report_array); 
          
          }
  
  }


    if(!empty($group_data)){

        // Check user in searching content 

        $tr_check_data = $this->TransactionHistory->find('all',array(
                                                                 'joins' => array(
                                                                    array(
                                                                        'table'      => 'bg_vendor_classes',
                                                                        'alias'      => 'ven_class',
                                                                        'conditions' => array('TransactionHistory.class_id = ven_class.id'))
                                                                    ),
                                                                     'conditions' => array(
                                                                     'TransactionHistory.user_id'=>$user_id,
                                                                     'TransactionHistory.payment_from_class'=>1,
                                                                     'TransactionHistory.status'=>2),
                                                                     'fields'=>array('TransactionHistory.*','ven_class.*')));
        // get segment data 

        $seg_data12  =  array();
        foreach ($tr_check_data as  $value) {
          $seg_data12[] = $value['ven_class']['segment_id'];
        }  

        $my_group   = $this->ConnectSegmentGroup->find('all',array('conditions'=>array(
                                                              'ConnectSegmentGroup.status'=>1,
                                                              'ConnectSegmentGroup.segment_id'=>$seg_data12)));
        $my_grp_id = array();
        foreach ($my_group as $value){
          $my_grp_id[] = $value['ConnectSegmentGroup']['id'];
        }

        $check_count  = count($my_grp_id); 
        $result_string.='';
        $result_string.='<div class="">&nbsp;</div>';
         foreach ($group_data as $data){
                
                    $testCond = false;

                    for($i=0; $i < $check_count; $i++){
                        if($data['GroupActivity']['group_id'] == $my_grp_id[$i]){
                            $testCond = true;
                            break;
                        }
                    }
                      
                $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-right comm_box2_chat_box">
                          <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 cmmt_box_de mar_pad">
                                  <center>';
                                    $user_pic = $data['usermaster']['profile_image'];

                                      if(empty($user_pic)){ 

                                        $result_string.='<img class="profile_pic img-circle" src="'.HTTP_ROOT.'/img/connect/dummy/pic.png" alt="img not found">';

                                        }else{

                                        $user_pic1 = substr($user_pic,0,4);

                                      if($user_pic1 == 'http'){ 

                                        $result_string.='<img class="profile_pic img-circle" src="'.$data['usermaster']['profile_image'].'" alt="img not found">';
                                      
                                        }else{ 
                                  
                                          if( $data['usermaster']['user_type_id'] == 1 ){ 

                                            $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Vendor/profile/'.$data['usermaster']['profile_image'].'" alt="img not found">';
                                                       
                                          }else{ 
                                                          
                                            $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Buyer/profile/'.$data['usermaster']['profile_image'].'" alt="img not found">';
                                                         
                                          }
                                  
                                     } }
                            $result_string.='</center>
                          </div>   
                          <div class="col-xs-12 col-sm-9 col-md-9 col-lg-10 padd_l_r">
                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r mar_pad">
                                  <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;text-transform:capitalize;">
                                     '.$data['usermaster']['first_name'].'
                                  </span>
                                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">
                                    on '.date('d M Y', $data['GroupActivity']['add_date']).' at '.date('h:i a',$data['GroupActivity']['add_date']).' 
                                  </span>
                                  <i class="icon-map-marker"></i>
                                  <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;">
                                    Chennai
                                  </span>
                              </div>

                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r mar_pad">
                                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;text-transform:capitalize;">
                                      '.$data['GroupActivity']['request_purpose'].'   
                                  </span>
                              </div>

                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r mar_pad">
                                  <span class="connt_flex_middle_bdr123 ryt_margin" style="color:#0f0f0f;">
                                    Activity Date :
                                  </span>
                                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">
                                    on '.$data['GroupActivity']['request_date'].' 
                                  </span>
                                  <span class="connt_flex_middle_bdr123 ryt_margin" style="color:#0f0f0f;">
                                    Activity Time :
                                  </span>
                                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">
                                    '.$data['GroupActivity']['request_time'].' 
                                  </span>
                                  <span class="connt_flex_middle_bdr123 ryt_margin" style="color:#0f0f0f;">
                                    Activity Location :
                                  </span>
                                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">
                                     '.$data['GroupActivity']['location'].' 
                                  </span>
                              </div>

                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r mar_pad">';
                                     if($testCond){ 

                                    $result_string.='<span class="ryt_margin" id="change_likedata_'.$data['GroupActivity']['id'].'" style="cursor:pointer;" onclick="likechange('.$data['GroupActivity']['id'].')">
                                        <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;">';

                                        if($group_like[$data['GroupActivity']['id']]['status']['GroupActivityLike']['status'] == 1){ 

                                        $result_string.='<i style="color:#2bcdc1" class="fa fa-thumbs-up" aria-hidden="true">
                                        </i>';

                                        }else{  
                                        
                                        $result_string.='<i class="fa fa-thumbs-up" aria-hidden="true"></i>';
                                        
                                        } 
                                        $result_string.='</span>
                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">';

                                        if(!empty($group_like[$data['GroupActivity']['id']]['value'])){
                                          $result_string.=''.$group_like[$data['GroupActivity']['id']]['value'].' '; 
                                        }else{
                                          $result_string.=' 0 ';
                                        } 
                                        $result_string.='  Likes </span>   
                                      </span>
                                      <span class="ryt_margin" id="ajax_cmmt_data_'.$data['GroupActivity']['id'].'" onclick="commmt_data_show('.$data['GroupActivity']['id'].')" class="mouse_show">
                                        <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;cursor:pointer;">
                                           <i class="fa fa-comments" aria-hidden="true"></i>
                                        </span>
                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">';
                                          
                                           if(!empty($group_commt[$data['GroupActivity']['id']])){
                                              $result_string.=''.$group_commt[$data['GroupActivity']['id']]. ' '; 
                                            }else{
                                              $result_string.=' 0 ';
                                            }
                                  
                                      $result_string.=' Comments  </span>
                                      </span>
                                      <span class="ryt_margin" id="report_check_'.$data['GroupActivity']['id'].'" 
                                         onclick="report_activity('.$data['GroupActivity']['id'].')" style="cursor:pointer;">';
                                            if($report_array[$data['GroupActivity']['id']]['status']['GroupActivityReport']['status'] == 1){ 
                                            $result_string.='<i style="color:#2bcdc1" class="fa fa-file-text" aria-hidden="true"></i>';
                                  
                                            }else{ 
                                  
                                            $result_string.='<i class="fa fa-file-text" aria-hidden="true"></i>  ';
                                  
                                            }  
                                            $result_string.='<span class="connt_flex_middle_bdr123">  ';
                                            if(!empty($report_array[$data['GroupActivity']['id']]['value'])){
                                              $result_string.=''.$report_array[$data['GroupActivity']['id']]['value'].' '; 
                                            }else{
                                              $result_string.=' 0 ';
                                            }   
                                      $result_string.='  Report </span>
                                      </span>
                                      <span class="ryt_margin" id="attend_check_'.$data['GroupActivity']['id'].'" 
                                         onclick="attend_activity('.$data['GroupActivity']['id'].')" style="cursor:pointer;">';
                                            if($user){ 

                                            $result_string.='<i style="color:#2bcdc1" class="fa fa-user" aria-hidden="true"></i>';

                                            }else{

                                           $result_string.='<i class="fa fa-user" aria-hidden="true"></i>';
                                           
                                            } 

                                           $result_string.=' <span class="connt_flex_middle_bdr123">
                                                0 Attendance
                                            </span>
                                      </span>';

                                     }else{ 

                                      $result_string.='<span class="ryt_margin" id="change_likedata_'.$data['GroupActivity']['id'].'" style="pointer-events:none;" onclick="likechange('.$data['GroupActivity']['id'].')">
                                        <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;">';
                                        if($group_like[$data['GroupActivity']['id']]['status']['GroupActivityLike']['status'] == 1){ 
                                        
                                        $result_string.='<i style="color:#2bcdc1" class="fa fa-thumbs-up" aria-hidden="true">
                                        </i>';
                                        
                                        }else{ 

                                        $result_string.='<i class="fa fa-thumbs-up" aria-hidden="true"></i>';
                                        
                                        }  
                                        
                                        $result_string.='</span>
                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">';
                                          if(!empty($group_like[$data['GroupActivity']['id']]['value'])){
                                          $result_string.=''.$group_like[$data['GroupActivity']['id']]['value'].' '; 
                                        }else{
                                          $result_string.=' 0 ';
                                        } 
                                        $result_string.='  Likes </span>      
                                      </span>
                                      <span class="ryt_margin" id="ajax_cmmt_data_'.$data['GroupActivity']['id'].'" onclick="commmt_data_show('.$data['GroupActivity']['id'].')" class="mouse_show">
                                        <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;">
                                           <i class="fa fa-comments" aria-hidden="true"></i>
                                        </span>
                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">';
                                           if(!empty($group_commt[$data['GroupActivity']['id']])){
                                              $result_string.=''.$group_commt[$data['GroupActivity']['id']].' '; 
                                            }else{
                                              $result_string.=' 0 ';
                                            }
                                  
                                      $result_string.=' Comments  </span>
                                      </span>
                                      <span class="ryt_margin" id="report_check_'.$data['GroupActivity']['id'].'" 
                                         onclick="report_activity('.$data['GroupActivity']['id'].')" style="pointer-events:none;">';
                                            if($report_array[$data['GroupActivity']['id']]['status']['GroupActivityReport']['status'] == 1){ 
                                            $result_string.='<i style="color:#2bcdc1" class="fa fa-file-text" aria-hidden="true"></i>';
                                            }else{ 
                                            $result_string.='<i class="fa fa-file-text" aria-hidden="true"></i> ';
                                            } 
                                            $result_string.='<span class="connt_flex_middle_bdr123"> ';
                                             if(!empty($report_array[$data['GroupActivity']['id']]['value'])){
                                                $result_string.=''.$report_array[$data['GroupActivity']['id']]['value'].' '; 
                                              }else{
                                                $result_string.=' 0 ';
                                              }   
                                      $result_string.=' Report </span>
                                      </span>
                                      <span class="ryt_margin" id="attend_check_'.$data['GroupActivity']['id'].'" 
                                         onclick="attend_activity('.$data['GroupActivity']['id'].')" style="pointer-events:none;">';
                                            if($user){ 

                                            $result_string.='<i style="color:#2bcdc1" class="fa fa-user" aria-hidden="true"></i>';

                                            }else{ 

                                            $result_string.='<i class="fa fa-user" aria-hidden="true"></i>';

                                            } 

                                            $result_string.='<span class="connt_flex_middle_bdr123">
                                                0 Attendance
                                            </span>
                                      </span>';
                                    }  
                                    $result_string.='<div id="show_cmmt_div_'.$data['GroupActivity']['id'].'" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 connt_flex_middle_bdr" style="display:none;background-color:#F2F3F4;">
                                       
                                    </div>    
                              </div>
                          </div>
                      </div>
                      <div class="">&nbsp;</div>';               
          
         } 
         print_r($result_string);die;    

    }else{
     
      $result_string.='';
      $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                        <center>
                           <span class="connt_flex_middle_text" style="text-align:center;">Activity does not exist!</span>
                        </center>
                      </div>';
      print_r($result_string);die;

    }

  }

	

  public function searchGroupActivity_bkp(){
      
        $this->autoRender = false; 
        $user             = $this->Session->read('User');
        $user_id          = $user['UserMaster']['id'];
        $keyword          = $_POST['search_string'];
        $user_type        = $user['UserMaster']['user_type_id'];
        $segment_id_input = $_POST['segt_ids'];

        if(empty($user)){

          if(empty($segment_id_input)){

              $group_data = $this->GroupActivity->find('all',array(
                                           'joins' => array(
                                                        array(
                                                            'table'      => 'bg_user_masters',
                                                            'alias'      => 'usermaster',
                                                            'type'       => 'left',
                                                            'conditions' => array('GroupActivity.user_id = usermaster.id'))),
                                            'conditions' => array('OR' => array(
                                                                      array('AND' => array(
                                                                          array('GroupActivity.request_purpose like "%'.$keyword.'%"'),
                                                                          array('GroupActivity.status' => '1')
                                                                      )),
                                                                  )),
                                            'fields'     => array('GroupActivity.*','usermaster.*'),
                                             ));
              
               // Activity like data 

              $group_like = array();  
              foreach ($group_data as  $cmmtdata) {
                $dataArray1 = $this->GroupActivityLike->find('count',array('conditions'=>array(
                                                                    'GroupActivityLike.activity_id'=>$cmmtdata['GroupActivity']['id'],
                                                                    'GroupActivityLike.status'=>1)));
                $dataArray2 = $this->GroupActivityLike->find('first',array('conditions'=>array(
                                                                    'GroupActivityLike.activity_id'=>$cmmtdata['GroupActivity']['id'],
                                                                    'GroupActivityLike.status'=>1,
                                                                    'GroupActivityLike.user_id'=>$user_id),
                                                                    'fields'=>array('GroupActivityLike.status')));                      
                $group_like[$cmmtdata['GroupActivity']['id']]['value'] = $dataArray1;
                $group_like[$cmmtdata['GroupActivity']['id']]['status'] = $dataArray2;
              } 

              // comment data 

              $group_commt = array();
              foreach ($group_data as $datas){
                $dataArray = $this->GroupActivityComment->find('count',array('conditions'=>array(
                                                                    'GroupActivityComment.activity_id'=>$datas['GroupActivity']['id'],
                                                                    'GroupActivityComment.status'=>1)));
                $group_commt[$datas['GroupActivity']['id']] = $dataArray;
              }

              $this->set('group_like',$group_like);
              $this->set('group_commt',$group_commt);
              
              // activity Report data 

              $report_array = array(); 
                foreach ($group_data as  $reportdata){
                    $dataArray1 = $this->GroupActivityReport->find('count',array('conditions'=>array(
                                                                        'GroupActivityReport.activity_id'=>$reportdata['GroupActivity']['id'],
                                                                        'GroupActivityReport.status'=>1)));

                    $dataArray2 = $this->GroupActivityReport->find('first',array('conditions'=>array(
                                                                        'GroupActivityReport.activity_id'=>$reportdata['GroupActivity']['id'],
                                                                        'GroupActivityReport.status'=>1,
                                                                        'GroupActivityReport.user_id'=>$user_id),
                                                                        'fields'=>array('GroupActivityReport.status'))); 
                    $report_array[$reportdata['GroupActivity']['id']]['value'] =  $dataArray1;
                    $report_array[$reportdata['GroupActivity']['id']]['status'] = $dataArray2;
                    
                } 
                $this->set('report_array',$report_array); 
              
          }else{

              $segment_id_inputs   = explode(",",$segment_id_input);
              $group_data = $this->GroupActivity->find('all',array(
                                           'joins' => array(
                                                        array(
                                                            'table'      => 'bg_user_masters',
                                                            'alias'      => 'usermaster',
                                                            'type'       => 'left',
                                                            'conditions' => array('GroupActivity.user_id = usermaster.id'))),
                                            'conditions' => array('OR' => array(
                                                                      array('AND' => array(
                                                                          array('GroupActivity.request_purpose like "%'.$keyword.'%"'),
                                                                          array('GroupActivity.status' => '1'),
                                                                          array('GroupActivity.group_id'=>$segment_id_inputs)
                                                                      )),
                                                                  )),
                                            'fields'     => array('GroupActivity.*','usermaster.*'),
              ));
              
               // Activity like data 

              $group_like = array();  
              foreach ($group_data as  $cmmtdata) {
                $dataArray1 = $this->GroupActivityLike->find('count',array('conditions'=>array(
                                                                    'GroupActivityLike.activity_id'=>$cmmtdata['GroupActivity']['id'],
                                                                    'GroupActivityLike.status'=>1)));
                $dataArray2 = $this->GroupActivityLike->find('first',array('conditions'=>array(
                                                                    'GroupActivityLike.activity_id'=>$cmmtdata['GroupActivity']['id'],
                                                                    'GroupActivityLike.status'=>1,
                                                                    'GroupActivityLike.user_id'=>$user_id),
                                                                    'fields'=>array('GroupActivityLike.status')));                      
                $group_like[$cmmtdata['GroupActivity']['id']]['value'] = $dataArray1;
                $group_like[$cmmtdata['GroupActivity']['id']]['status'] = $dataArray2;
              } 

              // comment data 

              $group_commt = array();
              foreach ($group_data as $datas){
                $dataArray = $this->GroupActivityComment->find('count',array('conditions'=>array(
                                                                    'GroupActivityComment.activity_id'=>$datas['GroupActivity']['id'],
                                                                    'GroupActivityComment.status'=>1)));
                $group_commt[$datas['GroupActivity']['id']] = $dataArray;
              }

              $this->set('group_like',$group_like);
              $this->set('group_commt',$group_commt);
              
              // activity Report data 

              $report_array = array(); 
                foreach ($group_data as  $reportdata){
                    $dataArray1 = $this->GroupActivityReport->find('count',array('conditions'=>array(
                                                                        'GroupActivityReport.activity_id'=>$reportdata['GroupActivity']['id'],
                                                                        'GroupActivityReport.status'=>1)));

                    $dataArray2 = $this->GroupActivityReport->find('first',array('conditions'=>array(
                                                                        'GroupActivityReport.activity_id'=>$reportdata['GroupActivity']['id'],
                                                                        'GroupActivityReport.status'=>1,
                                                                        'GroupActivityReport.user_id'=>$user_id),
                                                                        'fields'=>array('GroupActivityReport.status'))); 
                    $report_array[$reportdata['GroupActivity']['id']]['value'] =  $dataArray1;
                    $report_array[$reportdata['GroupActivity']['id']]['status'] = $dataArray2;
                    
                } 
                $this->set('report_array',$report_array); 
                                   
          }

      }else{
         
          if(empty($segment_id_input)){

              $group_data = $this->GroupActivity->find('all',array(
                                           'joins' => array(
                                                        array(
                                                            'table'      => 'bg_user_masters',
                                                            'alias'      => 'usermaster',
                                                            'type'       => 'left',
                                                            'conditions' => array('GroupActivity.user_id = usermaster.id'))),
                                            'conditions' => array('OR' => array(
                                                                      array('AND' => array(
                                                                          array('GroupActivity.request_purpose like "%'.$keyword.'%"'),
                                                                          array('GroupActivity.status' => '1')
                                                                      )),
                                                                  )),
                                            'fields'     => array('GroupActivity.*','usermaster.*'),
                                             ));

               // Activity like data 

              $group_like = array();  
              foreach ($group_data as  $cmmtdata) {
                $dataArray1 = $this->GroupActivityLike->find('count',array('conditions'=>array(
                                                                    'GroupActivityLike.activity_id'=>$cmmtdata['GroupActivity']['id'],
                                                                    'GroupActivityLike.status'=>1)));
                $dataArray2 = $this->GroupActivityLike->find('first',array('conditions'=>array(
                                                                    'GroupActivityLike.activity_id'=>$cmmtdata['GroupActivity']['id'],
                                                                    'GroupActivityLike.status'=>1,
                                                                    'GroupActivityLike.user_id'=>$user_id),
                                                                    'fields'=>array('GroupActivityLike.status')));                      
                $group_like[$cmmtdata['GroupActivity']['id']]['value'] = $dataArray1;
                $group_like[$cmmtdata['GroupActivity']['id']]['status'] = $dataArray2;
              } 

              // comment data 

              $group_commt = array();
              foreach ($group_data as $datas){
                $dataArray = $this->GroupActivityComment->find('count',array('conditions'=>array(
                                                                    'GroupActivityComment.activity_id'=>$datas['GroupActivity']['id'],
                                                                    'GroupActivityComment.status'=>1)));
                $group_commt[$datas['GroupActivity']['id']] = $dataArray;
              }

              $this->set('group_like',$group_like);
              $this->set('group_commt',$group_commt);
              
              // activity Report data 

              $report_array = array(); 
                foreach ($group_data as  $reportdata){
                    $dataArray1 = $this->GroupActivityReport->find('count',array('conditions'=>array(
                                                                        'GroupActivityReport.activity_id'=>$reportdata['GroupActivity']['id'],
                                                                        'GroupActivityReport.status'=>1)));

                    $dataArray2 = $this->GroupActivityReport->find('first',array('conditions'=>array(
                                                                        'GroupActivityReport.activity_id'=>$reportdata['GroupActivity']['id'],
                                                                        'GroupActivityReport.status'=>1,
                                                                        'GroupActivityReport.user_id'=>$user_id),
                                                                        'fields'=>array('GroupActivityReport.status'))); 
                    $report_array[$reportdata['GroupActivity']['id']]['value'] =  $dataArray1;
                    $report_array[$reportdata['GroupActivity']['id']]['status'] = $dataArray2;
                    
                } 
                $this->set('report_array',$report_array); 
            
          }else{
              $segment_id_inputs   = explode(",",$segment_id_input);
              $group_data = $this->GroupActivity->find('all',array(
                                           'joins' => array(
                                                        array(
                                                            'table'      => 'bg_user_masters',
                                                            'alias'      => 'usermaster',
                                                            'type'       => 'left',
                                                            'conditions' => array('GroupActivity.user_id = usermaster.id'))),
                                            'conditions' => array('OR' => array(
                                                                      array('AND' => array(
                                                                          array('GroupActivity.request_purpose like "%'.$keyword.'%"'),
                                                                          array('GroupActivity.status' => '1'),
                                                                          array('GroupActivity.group_id'=>$segment_id_inputs)
                                                                      )),
                                                                  )),
                                            'fields'     => array('GroupActivity.*','usermaster.*'),
              ));
             
             // Activity like data 

              $group_like = array();  
              foreach ($group_data as  $cmmtdata) {
                $dataArray1 = $this->GroupActivityLike->find('count',array('conditions'=>array(
                                                                    'GroupActivityLike.activity_id'=>$cmmtdata['GroupActivity']['id'],
                                                                    'GroupActivityLike.status'=>1)));
                $dataArray2 = $this->GroupActivityLike->find('first',array('conditions'=>array(
                                                                    'GroupActivityLike.activity_id'=>$cmmtdata['GroupActivity']['id'],
                                                                    'GroupActivityLike.status'=>1,
                                                                    'GroupActivityLike.user_id'=>$user_id),
                                                                    'fields'=>array('GroupActivityLike.status')));                      
                $group_like[$cmmtdata['GroupActivity']['id']]['value'] = $dataArray1;
                $group_like[$cmmtdata['GroupActivity']['id']]['status'] = $dataArray2;
              } 

              // comment data 

              $group_commt = array();
              foreach ($group_data as $datas){
                $dataArray = $this->GroupActivityComment->find('count',array('conditions'=>array(
                                                                    'GroupActivityComment.activity_id'=>$datas['GroupActivity']['id'],
                                                                    'GroupActivityComment.status'=>1)));
                $group_commt[$datas['GroupActivity']['id']] = $dataArray;
              }

              $this->set('group_like',$group_like);
              $this->set('group_commt',$group_commt);
              
              // activity Report data 

              $report_array = array(); 
                foreach ($group_data as  $reportdata){
                    $dataArray1 = $this->GroupActivityReport->find('count',array('conditions'=>array(
                                                                        'GroupActivityReport.activity_id'=>$reportdata['GroupActivity']['id'],
                                                                        'GroupActivityReport.status'=>1)));

                    $dataArray2 = $this->GroupActivityReport->find('first',array('conditions'=>array(
                                                                        'GroupActivityReport.activity_id'=>$reportdata['GroupActivity']['id'],
                                                                        'GroupActivityReport.status'=>1,
                                                                        'GroupActivityReport.user_id'=>$user_id),
                                                                        'fields'=>array('GroupActivityReport.status'))); 
                    $report_array[$reportdata['GroupActivity']['id']]['value'] =  $dataArray1;
                    $report_array[$reportdata['GroupActivity']['id']]['status'] = $dataArray2;
                    
                } 
                $this->set('report_array',$report_array); 
          
          }
  
  }


    if(!empty($group_data)){

         $result_string.='';

         foreach ($group_data as $data){
                
                $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-right comm_box2_chat_box">
                    <center>
                      <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1 cmmt_box_de mar_pad">';
                            
                                $user_pic = $data['usermaster']['profile_image'];

                                if(empty($user_pic)){ 

                                $result_string.='<img class="profile_pic img-circle" src="'.HTTP_ROOT.'/img/connect/dummy/pic.png" alt="img not found">';

                                  }else{

                                $user_pic1 = substr($user_pic,0,4);

                                if($user_pic1 == 'http'){ 

                                  $result_string.='<img class="profile_pic img-circle" src="'.$data['usermaster']['profile_image'].'" alt="img not found">';

                                 }else{ 

                                   if( $data['usermaster']['user_type_id'] == 1 ){ 

                                      $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Vendor/profile/'.$data['usermaster']['profile_image'].'" alt="img not found">';
                                                 
                                    }else{ 
                                                    
                                      $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Buyer/profile/'.$data['usermaster']['profile_image'].'" alt="img not found">';
                                                   
                                    }

                             } }      
                    $result_string.='</div></center>   
                    <div class="col-xs-12 col-sm-11 col-md-11 col-lg-11 padd_l_r">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r mar_pad" style="">
                            <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;text-transform:capitalize;">
                               '.$data['usermaster']['first_name'].'
                            </span>
                            <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">
                              on '.date('d M Y', $data['GroupActivity']['add_date']).' at '.date('h:i a',$data['GroupActivity']['add_date']).' 
                            </span>
                            <i class="icon-map-marker"></i>
                            <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;">
                              Chennai
                            </span>
                        </div> 
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r mar_pad" style="">
                            <span class="connt_flex_middle_bdr123" style="color:#5b595c;text-transform:capitalize;">
                              '.$data['GroupActivity']['request_purpose'].'   
                            </span>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r mar_pad" style="">
                            <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;">
                              Activity Date :
                            </span>
                            <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">
                              on '.$data['GroupActivity']['request_date'].' 
                            </span>
                            <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;">
                              Activity Time :
                            </span>
                            <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">
                              '.$data['GroupActivity']['request_time'].' 
                            </span>
                            <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;">
                              Activity Location :
                            </span>
                            <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">
                              '.$data['GroupActivity']['location'].'
                            </span>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r mar_pad" style="">';
                                  
                                   if(!empty($user_id)){ 
                                  
                                    $result_string.='<span id="change_likedata_'.$data['GroupActivity']['id'].'" style="cursor:pointer;" onclick="likechange('.$data['GroupActivity']['id'].')">
                                      <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;">';

                                      if($group_like[$data['GroupActivity']['id']]['status']['GroupActivityLike']['status'] == 1){ 
                                      
                                      $result_string.='<i style="color:#2bcdc1" class="fa fa-thumbs-up" aria-hidden="true">
                                      </i>';
                                       }else{
                                      $result_string.='<i class="fa fa-thumbs-up" aria-hidden="true"></i>';
                                       }  
                                      $result_string.='</span>
                                      <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">';
                                        
                                        if(!empty($group_like[$data['GroupActivity']['id']]['value'])){
                                          $result_string.=''.$group_like[$data['GroupActivity']['id']]['value'].' '; 
                                        }else{
                                          $result_string.=' 0 ';
                                        }

                                     $result_string.='  Likes </span>   
                                    </span>
                                    <span id="ajax_cmmt_data_'.$data['GroupActivity']['id'].'" onclick="commmt_data_show('.$data['GroupActivity']['id'].')" class="mouse_show">
                                      <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;">
                                         <i class="fa fa-comments" aria-hidden="true"></i>
                                      </span>
                                      <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;padding-right:5px;">';
                                        if(!empty($group_commt[$data['GroupActivity']['id']])){
                                          $result_string.=''.$group_commt[$data['GroupActivity']['id']].' '; 
                                        }else{
                                          $result_string.=' 0 ';
                                        }
                                  
                                      $result_string.=' Comments  </span>
                                    </span>

                                    <span id="report_check_'.$data['GroupActivity']['id'].'" 
                                       onclick="report_activity('.$data['GroupActivity']['id'].')" style="cursor:pointer;">';
                                          
                                          if($report_array[$data['GroupActivity']['id']]['status']['GroupActivityReport']['status'] == 1){ 

                                          $result_string.='<i style="color:#2bcdc1" class="fa fa-file-text" aria-hidden="true"></i> ';
                                          
                                          }else{ 
                                          
                                          $result_string.='<i class="fa fa-file-text" aria-hidden="true"></i> ';
                                          
                                          }  
                                          $result_string.='<span class="coont_box2_icon">';
                                            if(!empty($report_array[$data['GroupActivity']['id']]['value'])){
                                              $result_string.=''.$report_array[$data['GroupActivity']['id']]['value']. ' '; 
                                            }else{
                                              $result_string.=' 0 ';
                                            }  
                                             
                                          $result_string.=' Report </span>
                                    </span>';  
                                  }   
                              $result_string.='</div>
                          </div>
                      </div>
                      <div class="">&nbsp;</div>';
         } 
         print_r($result_string);die;    

    }else{
     
      $result_string.='';
      $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                        <center>
                           <span class="connt_flex_middle_text" style="text-align:center;">Activity does not exist!</span>
                        </center>
                      </div>';
      print_r($result_string);die;                
    }

  }


  public function reportActivity(){

      $this->autoRender = false; 
      if(!empty($_POST)){ 


          $chech_report_data = $this->GroupActivityReport->find('first',array('conditions'=>array(
                                                                          'GroupActivityReport.user_id'=>$_POST['userid'],
                                                                          'GroupActivityReport.activity_id'=>$_POST['report_id'])));
        
          if(empty($chech_report_data)){
               
               $report_array = array();
               $report_array['user_id']     = $_POST['userid'];
               $report_array['activity_id']     = $_POST['report_id'];
               $report_array['status']      = 1;
               $report_array['add_date']    = time();
               $report_array['modify_date'] = time();
               $this->GroupActivityReport->save($report_array);

               $report_count_data = $this->GroupActivityReport->find('count',array('conditions'=>array(
                                                                          'GroupActivityReport.activity_id'=>$_POST['report_id'],
                                                                          'GroupActivityReport.status'=>1)));
                $result_string.='';
                $result_string.='<i style="color:#2bcdc1" class="fa fa-file-text" style="cursor:pointer"></i>
                                  <span class="coont_box2_icon">';
                                     if(isset($report_count_data)){ 
                                          $result_string.=''.$report_count_data.' ';
                                       }else{
                                          $result_string.='0 ';  
                                       }
                $result_string.=' Report</span>';
                print_r($result_string);die;
         
          }else{
            return 2;
          }
    }
  
  }


  public function activityCommentReplyData(){

    if(isset($_POST)){

      $this->autoRender = false; 
      $commt_id         = $_POST['commt_id'];
      $user_id          = $_POST['user_id'];

      $commt_reply_data = $this->GroupActivityCommentReply->find('all',array(
                                            'joins' => array(
                                              array(
                                                  'table'      => 'bg_user_masters',
                                                  'alias'      => 'usermaster',
                                                  'type'       => 'left', 
                                                  'conditions' => array('GroupActivityCommentReply.user_id = usermaster.id'))),    
                                              'conditions'=>array('GroupActivityCommentReply.comment_id'=>$commt_id),
                                              'fields' =>array('GroupActivityCommentReply.*','usermaster.*')));

      $commt_count_data = $this->GroupActivityCommentReply->find('count',array('conditions'=>array(
                                                                           'GroupActivityCommentReply.comment_id'=>$commt_id,
                                                                           'GroupActivityCommentReply.status'=>1)));


      $result_string.='';
      $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 blog_background_design" id="activity_reply_data_'.$commt_id.'">           
                            <div class="">&nbsp;</div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              <span style="color:#0f0f0f" class="connt_flex_middle_bdr12">';
                                if(isset($commt_count_data)){
                                        
                                        $result_string.=''.$commt_count_data.'';
                                      }else{
                                        
                                        $result_string.='0 ';
                                  }
                            $result_string.=' Replies </span>
                            </div>';
                          foreach ($commt_reply_data as $postdata){ 
                            $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-right comm_box2_chat_box">
                                <center>
                                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 cmmt_box_de mar_pad">';
                                  $user_pic = $postdata['usermaster']['profile_image'];
                                    if(empty($user_pic)){ 

                                      $result_string.='<img class="profile_pic img-circle" src="'.HTTP_ROOT.'/img/connect/dummy/pic.png" alt="img not found">';

                                    }else{

                                      $user_pic1 = substr($user_pic,0,4);

                                      if($user_pic1 == 'http'){

                                        $result_string.='<img class="profile_pic img-circle" src="'.$postdata['usermaster']['profile_image'].'" alt="img not found">';

                                       }else{ 

                                          if( $postdata['usermaster']['user_type_id'] == 1 ){ 

                                            $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Vendor/profile/'.$postdata['usermaster']['profile_image'].'" alt="img not found">';
                                                       
                                          }else{ 
                                                          
                                            $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Buyer/profile/'.$postdata['usermaster']['profile_image'].'" alt="img not found">';
                                                         
                                          }

                                       } } 
                          $result_string.='</div></center>   
                          <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 cmmt_box_de mar_pad">
                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r mar_pad" style="">
                                  <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;">
                                    '.$postdata['usermaster']['first_name'].' 
                                  </span>
                                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">
                                     on '.date('d M Y', $postdata['GroupActivityCommentReply']['add_date']).' at '.date('h:i a',$postdata['GroupActivityCommentReply']['add_date']).' 
                                  </span>
                              </div> 
                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r mar_pad" style="">
                                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;">
                                    '.$postdata['GroupActivityCommentReply']['reply'].' 
                                  </span>
                              </div>
                          </div>
                      </div><div class="">&nbsp;</div>';
                     }
                     if(!empty($user_id) && $user_type_id == 2){ 
                       $result_string.='<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                        <fieldset class="form-group">
                          <textarea rows="3" cols="15" type="text" id="activity_commt_replies_'.$commt_id.'" class="form-control input_login" placeholder="Write a reply..." style="border: 2px solid #2bcdc1 !important;"></textarea>
                          <span class="err" id="err_activity_commt_replies_'.$commt_id.'">&nbsp;</span>
                          </fieldset>
                          <button style="background-color:#2bcdc1;border:none;" type="button" 
                          class="btn btn-primary" onclick="activity_cmt_reply_submit('.$commt_id.')">Send</button>
                          <div class="">&nbsp;</div>
                      </div> 
                    </div>';
                    }
                  print_r($result_string);die;      
            }   
    }


    public function groupActivityCommtReply(){

          $this->autoRender = false; 
            if(isset($_POST)){

              $blog_cmmt_rply_array                = array();
              $blog_cmmt_rply_array['comment_id']  = $_POST['commt_id'];
              $blog_cmmt_rply_array['user_id']     = $_POST['user_id'];
              $blog_cmmt_rply_array['reply']       = $_POST['reply'];
              $blog_cmmt_rply_array['status']      = 1;
              $blog_cmmt_rply_array['add_date']    = time();
              $blog_cmmt_rply_array['modify_date'] = time();

              $result  = $this->GroupActivityCommentReply->save($blog_cmmt_rply_array);

              if(isset($result)){

                $commt_id     = $_POST['commt_id'];
                
                $commt_reply_data = $this->GroupActivityCommentReply->find('all',array(
                                            'joins' => array(
                                              array(
                                                  'table'      => 'bg_user_masters',
                                                  'alias'      => 'usermaster',
                                                  'type'       => 'left', 
                                                  'conditions' => array('GroupActivityCommentReply.user_id = usermaster.id'))),    
                                              'conditions'=>array('GroupActivityCommentReply.comment_id'=>$commt_id),
                                              'fields' =>array('GroupActivityCommentReply.*','usermaster.*')));

               $commt_count_data = $this->GroupActivityCommentReply->find('count',array('conditions'=>array(
                                                                           'GroupActivityCommentReply.comment_id'=>$commt_id,
                                                                           'GroupActivityCommentReply.status'=>1)));

                $result_string.='';
                $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 blog_background_design" id="blog_reply_data_'.$commt_id.'" >           
                            <div class="">&nbsp;</div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              <span style="color:#0f0f0f" class="connt_flex_middle_bdr12">';
                                if(isset($commt_count_data)){
                                        
                                        $result_string.=''.$commt_count_data.'';
                                      
                                      }else{
                                        
                                        $result_string.='0 ';
                                  }
                            $result_string.=' Replies </span>
                            </div>';
                          foreach ($commt_reply_data as $postdata){ 
                            $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-right comm_box2_chat_box">
                              <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 cmmt_box_de">';
                                  $user_pic = $postdata['usermaster']['profile_image'];
                                    if(empty($user_pic)){ 

                                      $result_string.='<img class="profile_pic img-circle" src="'.HTTP_ROOT.'/img/connect/dummy/pic.png" alt="img not found">';

                                    }else{

                                      $user_pic1 = substr($user_pic,0,4);

                                      if($user_pic1 == 'http'){

                                        $result_string.='<img class="profile_pic img-circle" src="'.$postdata['usermaster']['profile_image'].'" alt="img not found">';

                                       }else{ 

                                          if( $postdata['usermaster']['user_type_id'] == 1 ){ 

                                            $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Vendor/profile/'.$postdata['usermaster']['profile_image'].'" alt="img not found">';
                                                       
                                          }else{ 
                                                          
                                            $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Buyer/profile/'.$postdata['usermaster']['profile_image'].'" alt="img not found">';
                                                         
                                          }

                                       } } 
                          $result_string.='</div>   
                          <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 cmmt_box_de">
                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r" style="padding-top:15px;">
                                  <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;padding-top:30px;">
                                    '.$postdata['usermaster']['first_name'].' 
                                  </span>
                                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;padding-right:5px;">
                                     on '.date('d M Y', $postdata['GroupActivityCommentReply']['add_date']).' at '.date('h:i a',$postdata['GroupActivityCommentReply']['add_date']).' 
                                  </span>
                              </div> 
                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r" style="padding-top:15px;">
                                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;">
                                    '.$postdata['GroupActivityCommentReply']['reply'].' 
                                  </span>
                              </div>
                          </div>
                      </div><div class="">&nbsp;</div>';
                     } 
                     $result_string.='<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                      <fieldset class="form-group">
                        <textarea rows="3" cols="15" type="text" id="activity_commt_replies_'.$commt_id.'" class="form-control input_login" placeholder="Write a reply..." style="border: 2px solid #2bcdc1 !important;"></textarea>
                        <span class="err" id="err_activity_commt_replies_'.$commt_id.'">&nbsp;</span>
                        </fieldset>
                        <button style="background-color:#2bcdc1;border:none;" type="button" 
                        class="btn btn-primary" onclick="activity_cmt_reply_submit('.$commt_id.')">Send</button>
                        <div class="">&nbsp;</div>
                    </div> 
                  </div>';
                  print_r($result_string);die;  

              }
            } 
    }


    public function myGroupData(){

      $this->autoRender = false;
      $user_id    = $_POST['user_id'];
      $my_grp_id  = $_POST['my_group_id'];       
      $group_data = $this->GroupActivity->find('all',array(
                                           'joins' => array(
                                                        array(
                                                            'table'      => 'bg_user_masters',
                                                            'alias'      => 'usermaster',
                                                            'type'       => 'left',
                                                            'conditions' => array('GroupActivity.user_id = usermaster.id'))),
                                            'conditions' => array('GroupActivity.status'=>1,
                                                                  'GroupActivity.group_id'=>$my_grp_id),
                                            'fields'     => array('GroupActivity.*','usermaster.*')));
      
       // Activity like data 
        $group_like = array();  
        foreach ($group_data as  $cmmtdata) {
          $dataArray1 = $this->GroupActivityLike->find('count',array('conditions'=>array(
                                                              'GroupActivityLike.activity_id'=>$cmmtdata['GroupActivity']['id'],
                                                              'GroupActivityLike.status'=>1)));
          $dataArray2 = $this->GroupActivityLike->find('first',array('conditions'=>array(
                                                              'GroupActivityLike.activity_id'=>$cmmtdata['GroupActivity']['id'],
                                                              'GroupActivityLike.status'=>1,
                                                              'GroupActivityLike.user_id'=>$user_id),
                                                              'fields'=>array('GroupActivityLike.status')));                      
          $group_like[$cmmtdata['GroupActivity']['id']]['value'] = $dataArray1;
          $group_like[$cmmtdata['GroupActivity']['id']]['status'] = $dataArray2;
        }

        // comment data 

        $group_commt = array();

        foreach ($group_data as $datas){
          $dataArray = $this->GroupActivityComment->find('count',array('conditions'=>array(
                                                              'GroupActivityComment.activity_id'=>$datas['GroupActivity']['id'],
                                                              'GroupActivityComment.status'=>1)));
          $group_commt[$datas['GroupActivity']['id']] = $dataArray;
        }

        // activity Report data 
          $report_array = array(); 
          foreach ($group_data as  $reportdata){
              $dataArray1 = $this->GroupActivityReport->find('count',array('conditions'=>array(
                                                                  'GroupActivityReport.activity_id'=>$reportdata['GroupActivity']['id'],
                                                                  'GroupActivityReport.status'=>1)));
              $dataArray2 = $this->GroupActivityReport->find('first',array('conditions'=>array(
                                                                  'GroupActivityReport.activity_id'=>$reportdata['GroupActivity']['id'],
                                                                  'GroupActivityReport.status'=>1,
                                                                  'GroupActivityReport.user_id'=>$user_id),
                                                                  'fields'=>array('GroupActivityReport.status'))); 
              $report_array[$reportdata['GroupActivity']['id']]['value'] =  $dataArray1;
              $report_array[$reportdata['GroupActivity']['id']]['status'] = $dataArray2;      
          }

          if(empty($group_data)){ 

            $result_string.='';
            $result_string.='<center>
                                <span class="connt_flex_middle_text" style="text-align:center;">No Activity Request !!!</span>
                             </center>';
            print_r($result_string);die;
                    
          }else{

            
          $result_string.='';
          $result_string.='<div class="">&nbsp;</div>';
          foreach ($group_data as $data){ 
                      $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-right comm_box2_chat_box">
                          <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 cmmt_box_de mar_pad">
                             <center><div class="">&nbsp;</div>';
                                    $user_pic = $data['usermaster']['profile_image'];

                                      if(empty($user_pic)){ 

                                        $result_string.='<img class="profile_pic img-circle" src="'.HTTP_ROOT.'/img/connect/dummy/pic.png" alt="img not found">';

                                        }else{

                                        $user_pic1 = substr($user_pic,0,4);

                                      if($user_pic1 == 'http'){ 

                                        $result_string.='<img class="profile_pic img-circle" src="'.$data['usermaster']['profile_image'].'" alt="img not found">';
                                      
                                        }else{ 
                                  
                                          if( $data['usermaster']['user_type_id'] == 1 ){ 

                                            $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Vendor/profile/'.$data['usermaster']['profile_image'].'" alt="img not found">';
                                                       
                                          }else{ 
                                                          
                                            $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Buyer/profile/'.$data['usermaster']['profile_image'].'" alt="img not found">';
                                                         
                                          }
                                  
                                     } }
                          $result_string.='</center></div>   
                          <div class="col-xs-12 col-sm-9 col-md-9 col-lg-10 padd_l_r">
                              
                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r" style="padding-top:15px;">
                                  <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;padding-top:30px;text-transform:capitalize;">
                                     '.$data['usermaster']['first_name'].'
                                  </span>
                                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;padding-right:5px;">
                                    on '.date('d M Y', $data['GroupActivity']['add_date']).' at '.date('h:i a',$data['GroupActivity']['add_date']).'
                                  </span>
                                  <i class="icon-map-marker"></i>
                                  <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;padding-top:30px;">
                                    Chennai
                                  </span>
                              </div> 

                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r" style="padding-top:15px;">
                                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;text-transform:capitalize;">
                                    '.$data['GroupActivity']['request_purpose'].'   
                                  </span>
                              </div>

                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r" style="padding-top:15px;">
                                  <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;padding-top:30px;">
                                    Activity Date :
                                  </span>
                                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;padding-right:5px;">
                                    on '.$data['GroupActivity']['request_date'].' 
                                  </span>
                                  <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;padding-top:30px;">
                                    Activity Time :
                                  </span>
                                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;padding-right:5px;">
                                    '.$data['GroupActivity']['request_time'].' 
                                  </span>
                                  <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;padding-top:30px;">
                                    Activity Location :
                                  </span>
                                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;padding-right:5px;">
                                     '.$data['GroupActivity']['location'].' 
                                  </span>
                              </div>
                               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r" style="padding-top:15px;">';
                                  
                                   if(!empty($user_id)){ 
                                  
                                    $result_string.='<span id="change_likedata_'.$data['GroupActivity']['id'].'" style="cursor:pointer;" onclick="likechange('.$data['GroupActivity']['id'].')">
                                      <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;padding-top:30px;">';

                                      if($group_like[$data['GroupActivity']['id']]['status']['GroupActivityLike']['status'] == 1){ 
                                      
                                      $result_string.='<i style="color:#2bcdc1" class="fa fa-thumbs-up" aria-hidden="true">
                                      </i>';
                                       }else{
                                      $result_string.='<i class="fa fa-thumbs-up" aria-hidden="true"></i>';
                                       }  
                                      $result_string.='</span>
                                      <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;padding-right:5px;">';
                                        
                                        if(!empty($group_like[$data['GroupActivity']['id']]['value'])){
                                          $result_string.=''.$group_like[$data['GroupActivity']['id']]['value'].' '; 
                                        }else{
                                          $result_string.=' 0 ';
                                        }

                                     $result_string.='  Likes </span>   
                                    </span>
                                    <span id="ajax_cmmt_data_'.$data['GroupActivity']['id'].'" onclick="commmt_data_show('.$data['GroupActivity']['id'].')" class="mouse_show">
                                      <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;padding-top:30px;">
                                         <i class="fa fa-comments" aria-hidden="true"></i>
                                      </span>
                                      <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-top:30px;padding-right:5px;">';
                                        if(!empty($group_commt[$data['GroupActivity']['id']])){
                                          $result_string.=''.$group_commt[$data['GroupActivity']['id']].' '; 
                                        }else{
                                          $result_string.=' 0 ';
                                        }
                                  
                                      $result_string.=' Comments  </span>
                                    </span>

                                    <span id="report_check_'.$data['GroupActivity']['id'].'" 
                                       onclick="report_activity('.$data['GroupActivity']['id'].')" style="cursor:pointer;">';
                                          
                                          if($report_array[$data['GroupActivity']['id']]['status']['GroupActivityReport']['status'] == 1){ 

                                          $result_string.='<i style="color:#2bcdc1" class="fa fa-file-text" aria-hidden="true"></i>';
                                          
                                          }else{ 
                                          
                                          $result_string.='<i class="fa fa-file-text" aria-hidden="true"></i>';
                                          
                                          }  
                                          $result_string.='<span class="coont_box2_icon">';
                                            if(!empty($report_array[$data['GroupActivity']['id']]['value'])){
                                              $result_string.=''.$report_array[$data['GroupActivity']['id']]['value'].' '; 
                                            }else{
                                              $result_string.=' 0 ';
                                            }  
                                             
                                          $result_string.=' Report </span>
                                    </span>
                                    <span class="ryt_margin" id="attend_check_'.$data['GroupActivity']['id'].'" 
                                         onclick="attend_activity('.$data['GroupActivity']['id'].')">';
                                            if($user_id){ 

                                            $result_string.='<i style="color:#2bcdc1" class="fa fa-user" aria-hidden="true"></i>';

                                            }else{ 

                                            $result_string.='<i class="fa fa-user" aria-hidden="true"></i>';

                                            }  

                                            $result_string.='<span class="connt_flex_middle_bdr123">
                                                0 Attendance
                                            </span>
                                      </span>
                                    <div id="show_cmmt_div_'.$data['GroupActivity']['id'].'" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 connt_flex_middle_bdr" style="display:none;background-color:#eeedf2;">
                                    </div>';  
                                  }   
                              $result_string.='</div>
                          </div>
                      </div>
                      <div class="">&nbsp;</div>';
          } }
          print_r($result_string);die;  

    }

    public function groupPostCommentReplyData(){

    if(isset($_POST)){

      $this->autoRender = false; 
      $commt_id         = $_POST['commt_id'];
      $user_id          = $_POST['user_id'];

      $commt_reply_data = $this->GroupPostCommentReply->find('all',array(
                                            'joins' => array(
                                              array(
                                                  'table'      => 'bg_user_masters',
                                                  'alias'      => 'usermaster',
                                                  'type'       => 'left', 
                                                  'conditions' => array('GroupPostCommentReply.user_id = usermaster.id'))),    
                                              'conditions'=>array('GroupPostCommentReply.comment_id'=>$commt_id),
                                              'fields' =>array('GroupPostCommentReply.*','usermaster.*')));

      $commt_count_data = $this->GroupPostCommentReply->find('count',array('conditions'=>array(
                                                                           'GroupPostCommentReply.comment_id'=>$commt_id,
                                                                           'GroupPostCommentReply.status'=>1)));

      $result_string.='';
      $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 blog_background_design" id="post_reply_data_'.$commt_id.'">           
                            <div class="">&nbsp;</div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                              <span style="color:#0f0f0f" class="connt_flex_middle_bdr12">';
                              if(isset($commt_count_data)){
                                      
                                      $result_string.=''.$commt_count_data.'';
                                    
                                    }else{
                                      
                                      $result_string.='0 ';
                                }
                            $result_string.=' Replies </span>
                            </div>';
                          foreach ($commt_reply_data as $postdata){ 
                            $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-right comm_box2_chat_box">
                                <center>
                                <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 cmmt_box_de mar_pad">';
                                  $user_pic = $postdata['usermaster']['profile_image'];
                                    if(empty($user_pic)){ 

                                      $result_string.='<img class="profile_pic img-circle" src="'.HTTP_ROOT.'/img/connect/dummy/pic.png" alt="img not found">';

                                    }else{

                                      $user_pic1 = substr($user_pic,0,4);

                                      if($user_pic1 == 'http'){

                                        $result_string.='<img class="profile_pic img-circle" src="'.$postdata['usermaster']['profile_image'].'" alt="img not found">';

                                       }else{ 

                                          if( $postdata['usermaster']['user_type_id'] == 1 ){ 

                                            $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Vendor/profile/'.$postdata['usermaster']['profile_image'].'" alt="img not found">';
                                                       
                                          }else{ 
                                                          
                                            $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Buyer/profile/'.$postdata['usermaster']['profile_image'].'" alt="img not found">';
                                                         
                                          }

                                       } } 

                          $result_string.='</div></center>   
                          <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 cmmt_box_de mar_pad">
                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r mar_pad" style="">
                                  <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;">
                                    '.$postdata['usermaster']['first_name'].' 
                                  </span>
                                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">
                                     on '.date('d M Y', $postdata['GroupPostCommentReply']['add_date']).' at '.date('h:i a',$postdata['GroupPostCommentReply']['add_date']).' 
                                  </span>
                              </div> 
                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r mar_pad" style="">
                                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;">
                                    '.$postdata['GroupPostCommentReply']['reply'].' 
                                  </span>
                              </div>
                          </div>
                      </div><div class="">&nbsp;</div>';
                     }
                     if(!empty($user_id) && $user_type_id == 2){  
                       $result_string.='<div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                        <fieldset class="form-group">
                          <textarea rows="3" cols="15" type="text" id="activity_commt_replies_'.$commt_id.'" class="form-control input_login" placeholder="Write a reply..." style="border: 2px solid #2bcdc1 !important;"></textarea>
                          <span class="err" id="err_activity_commt_replies_'.$commt_id.'">&nbsp;</span>
                          </fieldset>
                          <button style="background-color:#2bcdc1;border:none;" type="button" 
                          class="btn btn-primary" onclick="activity_cmt_reply_submit('.$commt_id.')">Send</button>
                          <div class="">&nbsp;</div>
                      </div> 
                    </div>';
                    }
                  print_r($result_string);die;      
            }   
    }


    public function searchGroupPost(){
      
        $this->autoRender = false; 
        $user             = $this->Session->read('User');
        $user_id          = $user['UserMaster']['id'];
        $keyword          = $_POST['search_string'];
        $user_type        = $user['UserMaster']['user_type_id'];
        $segment_id_input = $_POST['segt_ids'];

        if(empty($user)){

          if(empty($segment_id_input)){

              $group_post_data = $this->GroupPost->find('all',array(
                                           'joins' => array(
                                                        array(
                                                            'table'      => 'bg_user_masters',
                                                            'alias'      => 'usermaster',
                                                            'type'       => 'left',
                                                            'conditions' => array('GroupPost.user_id = usermaster.id'))),
                                            'conditions' => array('OR' => array(
                                                                      array('AND' => array(
                                                                          array('GroupPost.description like "%'.$keyword.'%"'),
                                                                          array('GroupPost.status' => '1')
                                                                      )),
                                                                  )),
                                            'fields'     => array('GroupPost.*','usermaster.*'),
                                             ));
              
              // Group post like data 

              $group_post_like = array();  

              foreach ($group_post_data as  $cmmtdata) {
                $dataArray1 = $this->GroupPostLike->find('count',array('conditions'=>array(
                                                                    'GroupPostLike.post_id'=>$cmmtdata['GroupPost']['id'],
                                                                    'GroupPostLike.status'=>1)));
                $dataArray2 = $this->GroupPostLike->find('first',array('conditions'=>array(
                                                                    'GroupPostLike.post_id'=>$cmmtdata['GroupPost']['id'],
                                                                    'GroupPostLike.status'=>1),
                                                                    'fields'=>array('GroupPostLike.status')));                      
                $group_post_like[$cmmtdata['GroupPost']['id']]['value'] = $dataArray1;
                $group_post_like[$cmmtdata['GroupPost']['id']]['status'] = $dataArray2;
              } 

              //Group post comment data 

              $group_post_commt = array();

              foreach ($group_post_data as $datas){
                $dataArray = $this->GroupPostComment->find('count',array('conditions'=>array(
                                                                    'GroupPostComment.post_id'=>$datas['GroupPost']['id'],
                                                                    'GroupPostComment.status'=>1)));
                $group_post_commt[$datas['GroupPost']['id']] = $dataArray;
              }

              //Group post Report data 

              $post_report_array = array(); 
                foreach ($group_post_data as  $reportdata){

                    $dataArray1 = $this->GroupPostReport->find('count',array('conditions'=>array(
                                                                        'GroupPostReport.post_id'=>$reportdata['GroupPost']['id'],
                                                                        'GroupPostReport.status'=>1)));

                    $dataArray2 = $this->GroupPostReport->find('first',array('conditions'=>array(
                                                                        'GroupPostReport.post_id'=>$reportdata['GroupPost']['id'],
                                                                        'GroupPostReport.status'=>1),
                                                                        'fields'=>array('GroupPostReport.status'))); 

                    $post_report_array[$reportdata['GroupPost']['id']]['value'] =  $dataArray1;
                    $post_report_array[$reportdata['GroupPost']['id']]['status'] = $dataArray2;      
              } 
              
          }else{

              $segment_id_inputs   = explode(",",$segment_id_input);

              $group_post_data = $this->GroupPost->find('all',array(
                                           'joins' => array(
                                                        array(
                                                            'table'      => 'bg_user_masters',
                                                            'alias'      => 'usermaster',
                                                            'type'       => 'left',
                                                            'conditions' => array('GroupPost.user_id = usermaster.id'))),
                                            'conditions' => array('OR' => array(
                                                                      array('AND' => array(
                                                                          array('GroupPost.description like "%'.$keyword.'%"'),
                                                                          array('GroupPost.status' => '1'),
                                                                          array('GroupPost.post_id'=>$segment_id_inputs)
                                                                      )),
                                                                  )),
                                            'fields'     => array('GroupPost.*','usermaster.*'),
              ));
              
               // Group post like data 

              $group_post_like = array();  
              
              foreach ($group_post_data as  $cmmtdata) {
                $dataArray1 = $this->GroupPostLike->find('count',array('conditions'=>array(
                                                                    'GroupPostLike.post_id'=>$cmmtdata['GroupPost']['id'],
                                                                    'GroupPostLike.status'=>1)));
                $dataArray2 = $this->GroupPostLike->find('first',array('conditions'=>array(
                                                                    'GroupPostLike.post_id'=>$cmmtdata['GroupPost']['id'],
                                                                    'GroupPostLike.status'=>1,
                                                                    'GroupPostLike.user_id'=>$user_id),
                                                                    'fields'=>array('GroupPostLike.status')));                      
                $group_post_like[$cmmtdata['GroupPost']['id']]['value'] = $dataArray1;
                $group_post_like[$cmmtdata['GroupPost']['id']]['status'] = $dataArray2;
              } 

              //Group post comment data 

              $group_post_commt = array();
              foreach ($group_post_data as $datas){
                $dataArray = $this->GroupPostComment->find('count',array('conditions'=>array(
                                                                    'GroupPostComment.post_id'=>$datas['GroupPost']['id'],
                                                                    'GroupPostComment.status'=>1)));
                $group_post_commt[$datas['GroupPost']['id']] = $dataArray;
              }

              //Group post Report data 

              $post_report_array = array(); 
                foreach ($group_post_data as  $reportdata){
                    $dataArray1 = $this->GroupPostReport->find('count',array('conditions'=>array(
                                                                        'GroupPostReport.post_id'=>$reportdata['GroupPost']['id'],
                                                                        'GroupPostReport.status'=>1)));

                    $dataArray2 = $this->GroupPostReport->find('first',array('conditions'=>array(
                                                                        'GroupPostReport.post_id'=>$reportdata['GroupPost']['id'],
                                                                        'GroupPostReport.status'=>1,
                                                                        'GroupPostReport.user_id'=>$user_id),
                                                                        'fields'=>array('GroupPostReport.status'))); 
                    $post_report_array[$reportdata['GroupPost']['id']]['value']  =  $dataArray1;
                    $post_report_array[$reportdata['GroupPost']['id']]['status'] = $dataArray2;      
                } 
                                  
          }

      }else{
         
          if(empty($segment_id_input)){

               $group_post_data = $this->GroupPost->find('all',array(
                                           'joins' => array(
                                                        array(
                                                            'table'      => 'bg_user_masters',
                                                            'alias'      => 'usermaster',
                                                            'type'       => 'left',
                                                            'conditions' => array('GroupPost.user_id = usermaster.id'))),
                                            'conditions' => array('OR' => array(
                                                                      array('AND' => array(
                                                                          array('GroupPost.description like "%'.$keyword.'%"'),
                                                                          array('GroupPost.status' => '1')
                                                                      )),
                                                                  )),
                                            'fields'     => array('GroupPost.*','usermaster.*'),
                                             ));
              

               // Group post like data 

              $group_post_like = array();  
              
              foreach ($group_post_data as  $cmmtdata) {
                $dataArray1 = $this->GroupPostLike->find('count',array('conditions'=>array(
                                                                    'GroupPostLike.post_id'=>$cmmtdata['GroupPost']['id'],
                                                                    'GroupPostLike.status'=>1)));
                $dataArray2 = $this->GroupPostLike->find('first',array('conditions'=>array(
                                                                    'GroupPostLike.post_id'=>$cmmtdata['GroupPost']['id'],
                                                                    'GroupPostLike.status'=>1,
                                                                    'GroupPostLike.user_id'=>$user_id),
                                                                    'fields'=>array('GroupPostLike.status')));                      
                $group_post_like[$cmmtdata['GroupPost']['id']]['value'] = $dataArray1;
                $group_post_like[$cmmtdata['GroupPost']['id']]['status'] = $dataArray2;
              } 

              //Group post comment data 

              $group_post_commt = array();
              
              foreach ($group_post_data as $datas){
                $dataArray = $this->GroupPostComment->find('count',array('conditions'=>array(
                                                                    'GroupPostComment.post_id'=>$datas['GroupPost']['id'],
                                                                    'GroupPostComment.status'=>1)));
                $group_post_commt[$datas['GroupPost']['id']] = $dataArray;
              }

             
              //Group post Report data 

                $post_report_array = array(); 

                foreach ($group_post_data as  $reportdata){
                    $dataArray1 = $this->GroupPostReport->find('count',array('conditions'=>array(
                                                                        'GroupPostReport.post_id'=>$reportdata['GroupPost']['id'],
                                                                        'GroupPostReport.status'=>1)));

                    $dataArray2 = $this->GroupPostReport->find('first',array('conditions'=>array(
                                                                        'GroupPostReport.post_id'=>$reportdata['GroupPost']['id'],
                                                                        'GroupPostReport.status'=>1,
                                                                        'GroupPostReport.user_id'=>$user_id),
                                                                        'fields'=>array('GroupPostReport.status'))); 
                    $post_report_array[$reportdata['GroupPost']['id']]['value'] =  $dataArray1;
                    $post_report_array[$reportdata['GroupPost']['id']]['status'] = $dataArray2;      
                } 
               


          }else{

                $segment_id_inputs   = explode(",",$segment_id_input);
              
                $group_post_data  = $this->GroupPost->find('all',array(
                                             'joins' => array(
                                                          array(
                                                              'table'      => 'bg_user_masters',
                                                              'alias'      => 'usermaster',
                                                              'type'       => 'left',
                                                              'conditions' => array('GroupPost.user_id = usermaster.id'))),
                                              'conditions' => array('OR' => array(
                                                                        array('AND' => array(
                                                                            array('GroupPost.description like "%'.$keyword.'%"'),
                                                                            array('GroupPost.status' => '1'),
                                                                            array('GroupPost.post_id'=>$segment_id_inputs)
                                                                        )),
                                                                    )),
                                              'fields'     => array('GroupPost.*','usermaster.*'),
                ));
              
             // Group post like data 

              $group_post_like = array();  
              foreach ($group_post_data as  $cmmtdata) {
                $dataArray1 = $this->GroupPostLike->find('count',array('conditions'=>array(
                                                                    'GroupPostLike.post_id'=>$cmmtdata['GroupPost']['id'],
                                                                    'GroupPostLike.status'=>1)));
                $dataArray2 = $this->GroupPostLike->find('first',array('conditions'=>array(
                                                                    'GroupPostLike.post_id'=>$cmmtdata['GroupPost']['id'],
                                                                    'GroupPostLike.status'=>1,
                                                                    'GroupPostLike.user_id'=>$user_id),
                                                                    'fields'=>array('GroupPostLike.status')));                      
                $group_like[$cmmtdata['GroupPost']['id']]['value'] = $dataArray1;
                $group_like[$cmmtdata['GroupPost']['id']]['status'] = $dataArray2;
              } 

              // Group post comment data 

              $group_post_commt = array();
              
              foreach ($group_post_data as $datas){
                $dataArray = $this->GroupPostComment->find('count',array('conditions'=>array(
                                                                    'GroupPostComment.post_id'=>$datas['GroupPost']['id'],
                                                                    'GroupPostComment.status'=>1)));
                $group_post_commt[$datas['GroupPost']['id']] = $dataArray;
              }

              // Group post Report data 

              $post_report_array = array(); 
                
                foreach ($group_post_data as  $reportdata){

                    $dataArray1 = $this->GroupPostReport->find('count',array('conditions'=>array(
                                                                        'GroupPostReport.post_id'=>$reportdata['GroupPost']['id'],
                                                                        'GroupPostReport.status'=>1)));
   
                    $dataArray2 = $this->GroupPostReport->find('first',array('conditions'=>array(
                                                                        'GroupPostReport.post_id'=>$reportdata['GroupPost']['id'],
                                                                        'GroupPostReport.status'=>1,
                                                                        'GroupPostReport.user_id'=>$user_id),
                                                                        'fields'=>array('GroupPostReport.status'))); 
                  
                    $post_report_array[$reportdata['GroupPost']['id']]['value'] =  $dataArray1;
                    $post_report_array[$reportdata['GroupPost']['id']]['status'] = $dataArray2;      
                
                } 

          }
  
  }


    if(!empty($group_post_data)){

        // Check user in searching content 

        $tr_check_data = $this->TransactionHistory->find('all',array(
                                                                 'joins' => array(
                                                                    array(
                                                                        'table'      => 'bg_vendor_classes',
                                                                        'alias'      => 'ven_class',
                                                                        'conditions' => array('TransactionHistory.class_id = ven_class.id'))
                                                                    ),
                                                                     'conditions' => array(
                                                                     'TransactionHistory.user_id'=>$user_id,
                                                                     'TransactionHistory.payment_from_class'=>1,
                                                                     'TransactionHistory.status'=>2),
                                                                     'fields'=>array('TransactionHistory.*','ven_class.*')));
        // get segment data 

        $seg_data12  =  array();
        foreach ($tr_check_data as  $value) {
          $seg_data12[] = $value['ven_class']['segment_id'];
        }  

        $my_group   = $this->ConnectSegmentGroup->find('all',array('conditions'=>array(
                                                              'ConnectSegmentGroup.status'=>1,
                                                              'ConnectSegmentGroup.segment_id'=>$seg_data12)));
        $my_grp_id = array();
        foreach ($my_group as $value){
          $my_grp_id[] = $value['ConnectSegmentGroup']['id'];
        }

        $check_count  = count($my_grp_id); 
        $result_string.='';
        $result_string.='<div class="">&nbsp;</div>';

         foreach ($group_post_data as $data){
                
                    $testCond = false;

                    for($i=0; $i < $check_count; $i++){
                      if($data['GroupPost']['group_id'] == $my_grp_id[$i]){
                          $testCond = true;
                          break;
                      }
                    }
                      
                $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-right comm_box2_chat_box">
                          <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 cmmt_box_de mar_pad">
                                  <center>';
                                    $user_pic = $data['usermaster']['profile_image'];

                                      if(empty($user_pic)){ 

                                        $result_string.='<img class="profile_pic img-circle" src="'.HTTP_ROOT.'/img/connect/dummy/pic.png" alt="img not found">';

                                        }else{

                                        $user_pic1 = substr($user_pic,0,4);

                                      if($user_pic1 == 'http'){ 

                                        $result_string.='<img class="profile_pic img-circle" src="'.$data['usermaster']['profile_image'].'" alt="img not found">';
                                      
                                        }else{ 
                                  
                                          if( $data['usermaster']['user_type_id'] == 1 ){ 

                                            $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Vendor/profile/'.$data['usermaster']['profile_image'].'" alt="img not found">';
                                                       
                                          }else{ 
                                                          
                                            $result_string.='<img  class="img-thumbnail" src="'.HTTP_ROOT.'/img/Buyer/profile/'.$data['usermaster']['profile_image'].'" alt="img not found">';
                                                         
                                          }
                                  
                                     } }
                            $result_string.='</center>
                          </div>   
                          <div class="col-xs-12 col-sm-9 col-md-9 col-lg-10 padd_l_r">
                               <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r mar_pad">
                                  <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;">
                                     '.$data['usermaster']['first_name'].' 
                                  </span>
                                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">
                                    on '.date('d M Y', $data['GroupPost']['add_date']).' at '.date('h:i a',$data['GroupPost']['add_date']).' 
                                  </span>
                              </div> 
                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r mar_pad">
                                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;">
                                      '.$data['GroupPost']['description'].' 
                                  </span>
                              </div>
                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r mar_pad">
                                  <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;">
                                   City :
                                  </span>
                                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">
                                    chennai
                                  </span>
                                  <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;">
                                    Locality :
                                  </span>
                                  <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">
                                   lucknow
                                  </span>
                              </div> 

                              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padd_l_r mar_pad">';
                                    
                                    if($testCond){ 

                                        $result_string.='<span class="ryt_margin" id="change_likedata_post_'.$data['GroupPost']['id'].'" style="cursor:pointer;" onclick="likechange_post('.$data['GroupPost']['id'].')">
                                        
                                        <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;">';

                                        if($group_post_like[$data['GroupPost']['id']]['status']['GroupPostLike']['status'] == 1){ 

                                        $result_string.='<i style="color:#2bcdc1" class="fa fa-thumbs-up" aria-hidden="true">
                                        </i>';

                                        }else{  
                                        
                                        $result_string.='<i class="fa fa-thumbs-up" aria-hidden="true"></i>';
                                        
                                        }

                                        $result_string.='</span>
                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">';

                                        if(!empty($group_post_like[$data['GroupPost']['id']]['value'])){
                                          $result_string.=' '.$group_post_like[$data['GroupPost']['id']]['value'].' '; 
                                        }else{
                                          $result_string.=' 0 ';
                                        } 
                                        $result_string.='  Likes </span>   
                                      </span>
                                      <span class="ryt_margin mouse_show" id="ajax_cmmt_data_post_'.$data['GroupPost']['id'].'" onclick="commmt_data_show_post('.$data['GroupPost']['id'].')">
                                        <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;cursor:pointer;">
                                           <i class="fa fa-comments" aria-hidden="true"></i>
                                        </span>
                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">';
                                          
                                            if(!empty($group_post_commt[$data['GroupPost']['id']])){
                                              $result_string.=' '.$group_post_commt[$data['GroupPost']['id']]. ' '; 
                                            }else{
                                              $result_string.=' 0 ';
                                            }
                                  
                                      $result_string.=' Comments  </span>
                                      </span>
                                      <span class="ryt_margin mouse_show" id="report_check_post_'.$data['GroupPost']['id'].'" 
                                         onclick="report_activity_post('.$data['GroupPost']['id'].')" style="cursor:pointer;">';
                                            if($post_report_array[$data['GroupPost']['id']]['status']['GroupPostReport']['status'] == 1){ 
                                            
                                            $result_string.='<i style="color:#2bcdc1" class="fa fa-file-text" aria-hidden="true"></i>';
                                  
                                            }else{ 
                                  
                                            $result_string.='<i class="fa fa-file-text" aria-hidden="true"></i>  ';
                                  
                                            }  

                                            $result_string.='<span class="connt_flex_middle_bdr123">  ';
                                            if(!empty($post_report_array[$data['GroupPost']['id']]['value'])){
                                              $result_string.=''.$post_report_array[$data['GroupPost']['id']]['value'].' '; 
                                            }else{
                                              $result_string.=' 0 ';
                                            }   
                                      $result_string.='  Report </span>
                                      </span>';
                                     
                                    }else{ 

                                      $result_string.='<span class="ryt_margin" id="change_likedata_post_'.$data['GroupPost']['id'].'" style="pointer-events:none;" onclick="likechange_post('.$data['GroupPost']['id'].')">
                                        <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;">';

                                        if($group_post_like[$data['GroupPost']['id']]['status']['GroupPostLike']['status'] == 1){ 
                                        
                                        $result_string.='<i style="color:#2bcdc1" class="fa fa-thumbs-up" aria-hidden="true">
                                        </i>';
                                        
                                        }else{ 

                                        $result_string.='<i class="fa fa-thumbs-up" aria-hidden="true"></i>';
                                        
                                        }  
                                        
                                        $result_string.='</span>
                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">';
                                          if(!empty($group_post_like[$data['GroupPost']['id']]['value'])){
                                          $result_string.=''.$group_post_like[$data['GroupPost']['id']]['value'].' '; 
                                        }else{
                                          $result_string.=' 0 ';
                                        } 
                                        $result_string.='  Likes </span>      
                                      </span>
                                      <span class="ryt_margin mouse_show" id="ajax_cmmt_data_post_'.$data['GroupPost']['id'].'" onclick="commmt_data_show_post('.$data['GroupPost']['id'].')">
                                        <span class="connt_flex_middle_bdr123" style="color:#0f0f0f;">
                                           <i class="fa fa-comments" aria-hidden="true"></i>
                                        </span>
                                        <span class="connt_flex_middle_bdr123" style="color:#5b595c;padding-right:5px;">';
                                           if(!empty($group_commt[$data['GroupPost']['id']])){
                                              $result_string.=''.$group_commt[$data['GroupPost']['id']].' '; 
                                            }else{
                                              $result_string.=' 0 ';
                                            }
                                  
                                      $result_string.=' Comments  </span>
                                      </span>
                                      <span class="ryt_margin" id="report_check_post_'.$data['GroupPost']['id'].'" 
                                         onclick="report_activity_post('.$data['GroupPost']['id'].')" style="pointer-events:none;">';
                                            if($report_array[$data['GroupPost']['id']]['status']['GroupPostReport']['status'] == 1){ 
                                            $result_string.='<i style="color:#2bcdc1" class="fa fa-file-text" aria-hidden="true"></i>';
                                            }else{ 
                                            $result_string.='<i class="fa fa-file-text" aria-hidden="true"></i> ';
                                            } 
                                            $result_string.='<span class="connt_flex_middle_bdr123"> ';
                                             if(!empty($report_array[$data['GroupPost']['id']]['value'])){
                                                $result_string.=''.$report_array[$data['GroupPost']['id']]['value'].' '; 
                                              }else{
                                                $result_string.=' 0 ';
                                              }   
                                      $result_string.=' Report </span>
                                      </span>';
                                    }  
                                    $result_string.='<div id="show_post_cmmt_div_'.$data['GroupPost']['id'].'" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 connt_flex_middle_bdr" style="display:none;background-color:#F2F3F4;">
                                       
                                    </div>    
                              </div>
                          </div>
                      </div>
                      <div class="">&nbsp;</div>';               
          
         } 
         print_r($result_string);die;    

    }else{
     
      $result_string.='';
      $result_string.='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
                        <center>
                           <span class="connt_flex_middle_text" style="text-align:center;">Post does not exist!</span>
                        </center>
                      </div>';
      print_r($result_string);die;

    }

  }

     




}

?>  



