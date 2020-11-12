<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set("Asia/Kolkata"); 
class Shop_Model extends CI_Model {





  function getUsernames(){
    $this->db->select('*');
    $this->db->where('status', 1);
    $records = $this->db->get('shop_user');
    $users = $records->result_array();
    return $users;
  }

  function getUser($userid){
    $where = "id='$userid'" ;
    $this->db->where($where);
    $this->db->select('*');
    // $this->db->where('status', 1);
    $records = $this->db->get('shop_user');
    $user = $records->result_array();
    return $user;
  }


public function auth_check_customer($data)
{
    $query = $this->db->get_where('shop_user', $data);
    if($query){   
     return $query->row();
    }
    return false;
}


function getExistCustomer($postData=array()){

    $response = array();
    
   
    if(isset($postData['email'])){
        $email = $postData['email'];
        $data = array(
            'email' => valid::sanitizestring($email),
            'phone' => valid::sanitizestring($postData['phone']),                
        );
        $email = $postData['email'];
        $phone = $postData['phone'];
        $where = "email='$email' OR phone='$phone' AND status = 1" ;
        $this->db->where($where);
        $this->db->select('*');
        $records = $this->db->get('shop_user');
        $rows = $this->db->affected_rows();
        $users = $records->result_array();
        return $rows;

    }
}




    function getCategory(){
        $this->db->select('*');
        $this->db->where('cat_status', 1);
        $this->db->order_by('categoryname', 'ASC');
        $records = $this->db->get('category_master');
        $category = $records->result_array();
        return $category;
     }


     

     function getCategoryHome($Data=array()){
      $catid = $Data;
      $this->db->select('*');
      $this->db->where_in('pcatid', $catid);
      $this->db->order_by('categoryname', 'DESC');
      $records = $this->db->get('category_master');
      $category = $records->result_array();
      return $category;
   }
     
     

    
    
    function addToCart($postData=array(),$userid){

      $response = array();
      $date =  date('Y/m/d', time());    
  
      if(isset($postData['productid']) ){
          $data = array(
              'userid' => $userid,
              'product_id' => $postData['productid'],  
              'time' => $date,
              'counts' => 1,
              'amount' => $postData['amount'],
          );
  
          $this->db->insert('cart_master', $data);
  
          $rows = $this->db->affected_rows();
  
          return $rows;
  
      }
      
    }


    function addToWishlist($postData=array(),$userid){

      $response = array();
      $date =  date('Y/m/d', time());    
  
      if(isset($postData['productid']) ){
          $data = array(
              'userid' => $userid,
              'product_id' => $postData['productid'],  
              'time' => $date,
              'status' => 1,
          );
  
          $this->db->insert('wish_list', $data);
  
          $rows = $this->db->affected_rows();
  
          return $rows;
  
      }
      
    }

    


    


    function removeFromCart($postData=array(),$userid){

  
      if(isset($postData['cid']) ){
          
          $cid = $postData['cid'];

          $where = "userid='$userid' AND cid='$cid'" ;
          $this->db->where($where);  
          $this->db->delete('cart_master');  
          $rows = $this->db->affected_rows();
  
          return $rows;
  
      }
      
    }

    

    
    function removeFromWishlist($postData=array(),$userid){

  
      if(isset($postData['wishid']) ){
          
          $wishid = $postData['wishid'];

          $where = "userid='$userid' AND wish_id='$wishid'" ;
          $this->db->where($where);  
          $this->db->delete('wish_list');  
          $rows = $this->db->affected_rows();
  
          return $rows;
  
      }
      
    }


    

    
    

   

    function getWishList($userid){

      $this->db->where('product_master.status', 1);  
      $where = "userid='$userid'" ;
      $this->db->where($where);  
      $this->db->select('*');
      $this->db->from('wish_list');
      $this->db->join('product_master', 'product_master.product_id = wish_list.product_id');
      $this->db->join('shop_user', 'shop_user.id = product_master.user_id');
      $records = $this->db->get(); 
      $products = $records->result_array();
      return $products;
    }
    function getFilterAttributes($attributeslist){

   

      $str_arr2 = explode (",", $attributeslist); 

      $List = implode( "," ,  $str_arr2);

      $res = str_replace( array( '\'', '"', 
       '' , ';', '<', '>' ), ' ',  $List); 

      if($res==''){
        
      }
      

      $this->db->where("id IN(".$res.")",NULL, false);
      $this->db->select('*');
      $this->db->from('attribute_master'); 
      $records = $this->db->get(); 
      $attributes = $records->result_array();
      return $attributes;
    }


    function getCategoryAttributes($categoryid){
      // echo $categoryid; 
      $where = "categoryid='$categoryid'";
      $this->db->where($where);
      $this->db->select('*');
      $this->db->from('category_master');
      // $this->db->group_by('attributes'); 
      // $this->db->join('shop_user', 'shop_user.id = product_master.user_id');
      $records = $this->db->get(); 
      $attributes = $records->result_array();
      return $attributes;
    }

    function getFilterSubattributes($attributeid,$attribute_pro_fil){

      // echo $attribute_pro_fil;

      $str_arr2 = explode (",", $attribute_pro_fil); 
      $str_arr3 = array_unique($str_arr2);
      $List = implode( "," ,  $str_arr3);
      // print_r($List);
      $res = str_replace( array( '\'', '"', 
       '' , ';', '<', '>' ), ' ',  $List).','; 
    
      $this->db->where("sub_attr_id IN(".$List.")",NULL, false);

      $where = "attribute_id='$attributeid'" ;
      $this->db->where($where);
      $this->db->select('*');
      $this->db->from('sub_attributes');
      // $this->db->join('sub_attributes', 'sub_attributes.attribute_id = attribute_master.attributes');
      $this->db->group_by('sub_attr_id'); 
      // $this->db->limit(1); 

      // $this->db->join('shop_user', 'shop_user.id = product_master.user_id');
      $records = $this->db->get(); 
      $attributes = $records->result_array();
      return $attributes;
    }


    function getFilterBaseAttributes($attribute_pro_fil){

      // echo $attribute_pro_fil;

      $str_arr2 = explode (",", $attribute_pro_fil); 
      $str_arr3 = array_unique($str_arr2);
      $List = implode( "," ,  $str_arr3);
      // print_r($List);
      $res = str_replace( array( '\'', '"', 
       '' , ';', '<', '>' ), ' ',  $List).','; 
    
      $this->db->where("sub_attr_id IN(".$List.")",NULL, false);

      $this->db->select('*');
      $this->db->from('sub_attributes');
      $this->db->join('attribute_master', 'attribute_master.id = sub_attributes.attribute_id');
      $this->db->group_by('attribute_id'); 
      // $this->db->limit(1); 

      // $this->db->join('shop_user', 'shop_user.id = product_master.user_id');
      $records = $this->db->get(); 
      $attributes = $records->result_array();
      return $attributes;
    }


    
    
    function getSubAttributesFromPro($categoryid){

      // $where = "category_id='$categoryid'" ;
      // $this->db->where($where);
      $this->db->where("find_in_set($categoryid, category_id)");
      $this->db->select('*');
      $this->db->from('product_master');
      // $this->db->join('sub_attributes', 'sub_attributes.attribute_id = attribute_master.attributes');
      $this->db->group_by('attributes'); 
      // $this->db->limit(1); 
      // $this->db->join('shop_user', 'shop_user.id = product_master.user_id');
      $records = $this->db->get(); 
      $attributes = $records->result_array();
      return $attributes;
    }

    
    
    function getQuickProduct($postData=array()){      

      if(isset($postData['productid']) ){
          
          $productid = $postData['productid'];
          $this->db->where('product_master.status', 1);  
          $where = "product_id='$productid'";
          $this->db->where($where);  
          $this->db->select('*');
          $this->db->from('product_master');
          $this->db->join('category_master', 'category_master.categoryid = product_master.category_id');
          $this->db->join('shop_user', 'shop_user.id = product_master.user_id');
          $records = $this->db->get(); 
          $products = $records->result_array();
          return $products;
      }
    }

    function getProductSingle($productid){      

      if(isset($productid) ){
          
          $productid = $productid;

          $this->db->where('product_master.status', 1);  
          $where = "product_id='$productid'";
          $this->db->where($where);  
          $this->db->select('*');
          $this->db->from('product_master');
          $this->db->join('category_master', 'category_master.categoryid = product_master.category_id');
          $this->db->join('shop_user', 'shop_user.id = product_master.user_id');
          $records = $this->db->get(); 
          $products = $records->result_array();
          return $products;
      }
    }
    
    

    function getProductSingleAttribue($productid){      

      if(isset($productid) ){
          
          $productid = $productid;
          $where = "product_master.product_id='$productid'";
          $this->db->where($where);  
          $this->db->select('*');
          $this->db->from('product_master');
          // $this->db->join('product_specifications', 'product_specifications.product_id = product_master.product_id');
          // $this->db->join('product_master', 'product_master.attributes = sub_attributes.sub_attr_id');
          // $this->db->join('attribute_master', 'attribute_master.id = sub_attributes.attribute_id');
          $records = $this->db->get(); 
          $products = $records->result_array();
          return $products;
      }
    }

    

    function getRelatedProductSingle($categoryid){      

      if(isset($categoryid) ){
          
          $categoryid = $categoryid;

          $where = "categoryid='$categoryid'";
          $this->db->where($where);  
          $this->db->select('*');
          $this->db->from('product_master');
          $this->db->join('category_master', 'category_master.categoryid = product_master.category_id');
          $this->db->join('shop_user', 'shop_user.id = product_master.user_id');
          $this->db->limit(15, 0);
          $this->db->order_by('product_id', 'DESC');
          $records = $this->db->get(); 
          $products = $records->result_array();
          return $products;
      }
    }


    public function record_count($categoryid) {    
     
      return $this->db->where("find_in_set($categoryid, category_id)")->count_all_results('product_master');
      
  }

  public function fetch_products($limit, $start, $categoryid) {
      // echo $limit;
      // echo  $start;
      $this->db->where('product_master.status', 1);  
      $this->db->where("prostatus='new'");
      $this->db->where("find_in_set($categoryid, category_id)");  
      // $this->db->limit(10, 3);
      $this->db->select('*');
      $this->db->from('product_master');
      $this->db->join('category_master', 'category_master.categoryid = product_master.category_id');
      $this->db->join('shop_user', 'shop_user.id = product_master.user_id');
      $this->db->order_by('product_id', 'DESC');
      $this->db->limit($limit, $start);
      
      $query = $this->db->get(); 

      if ($query->num_rows() > 0) {
          foreach ($query->result() as $row) {
              $data[] = $row;
          }
          return $data;
      }
      return false;
 }
    
    

public function fetch_sort_products_filterleft_when_null($categoryid){

    $this->db->where("prostatus='new'");
    $this->db->where("find_in_set($categoryid, category_id)"); 
 
    $this->db->select('*');
    $this->db->from('product_master');
    $this->db->join('category_master', 'category_master.categoryid = product_master.category_id');
    $this->db->join('shop_user', 'shop_user.id = product_master.user_id');
    // $this->db->limit($limit, $start);
    $this->db->group_by('product_name');
    $this->db->order_by('product_name', 'ASC');
    $records = $this->db->get(); 
    $subcategory = $records->result_array();
    return $subcategory;
  }
  


public function getSubcategoryLeft($categoryid){

  $this->db->where('pcatid', $categoryid);
  $this->db->order_by('categoryid', 'ASC');
  $this->db->select('*');
  $this->db->from('category_master');
  $records = $this->db->get(); 
  $subcategory = $records->result_array();
  return $subcategory;
}




public function getCategoryDetails($categoryid){

  $this->db->where("find_in_set($categoryid, categoryid)");  
  $this->db->select('*');
  $this->db->from('category_master');
  $records = $this->db->get(); 
  $category = $records->result_array();
  return $category;
}








public function searchProduct($searchkey){
  $this->db->like('product_name', $searchkey);
  // $this->db->order_by('product_id', 'ASC');
  $this->db->select('*');
  $this->db->where('product_master.status', 1);  
  $this->db->from('product_master');
  $this->db->join('category_master', 'category_master.categoryid = product_master.category_id');
  $this->db->limit(3, 0);
  $records = $this->db->get(); 
  $suggestionresults = $records->result_array();
  return $suggestionresults;
}



public function searchCategory($searchkey){
  $this->db->like('categoryname', $searchkey);
  // $this->db->order_by('product_id', 'ASC');
  $this->db->select('*');
  $this->db->from('category_master');
  $this->db->limit(3, 0);
  $records = $this->db->get(); 
  $suggestionresults = $records->result_array();
  return $suggestionresults;
}






public function fetch_sort_products_filterleft2($limit, $start, $categoryid, $filterattribute) {
  // echo $limit;
  // echo  $start;
  if(isset($filterattribute) ){
 
    $res = str_replace( array( '\'', '"', 
    '' , ';', '<', '>' ), ' ',  $filterattribute);


     $sub_attr = 'sub_attribute='. $res;

     $this->db->where('product_master.status', 1);  
     $this->db->where("find_in_set($categoryid, category_id) AND sub_attribute IN(".$res.")",NULL, false);
        // $this->db->like('id', $res, 'before');
        // $where = "category_id='$categoryid'  AND sub_attribute";
        // $this->db->where($where);  
        // $this->db->limit(10, 3);
        $this->db->select('*');
        $this->db->from('product_master');
        $this->db->join('category_master', 'category_master.categoryid = product_master.category_id');
        $this->db->join('shop_user', 'shop_user.id = product_master.user_id');
        $this->db->join('product_specifications', 'product_specifications.product_id = product_master.product_id');
        $this->db->limit($limit, $start);
        $this->db->group_by('product_name'); 
        $this->db->order_by('product_name', 'ASC');
       
        // $query = $this->db->get(); 
        // echo $this->db->last_query();
      $records = $this->db->get(); 
      $products = $records->result_array();
      return $products;

        // if ($query->num_rows() > 0) {
        //     foreach ($query->result() as $row) {
        //         $data[] = $row;
        //     }
        //     return $data;
        // }
        
            // return false;
      }
}





    function getRating($productid){
      $this->db->where(array('product_id'=> $productid)); 
      $this->db->select('*');
      $this->db->from('review_master');
      $this->db->join('shop_user', 'shop_user.id = review_master.user_id');
      $records = $this->db->get();
      $rating = $records->result_array();
      return $rating;
   }


   function getHotdeals(){
    // $this->db->where(array('product_id'=> $productid)); 
    $this->db->where('product_master.status', 1);  
    $this->db->select('*');
    $this->db->from('hot_deal_master');
    $this->db->join('product_master', 'product_master.product_id = hot_deal_master.product_id');
    $this->db->join('shop_user', 'shop_user.id = product_master.user_id');
    $this->db->order_by('deal_id','DESC');
    $records = $this->db->get();
    $deals = $records->result_array();
    return $deals;
 }


 

 

 function getDealtimer(){
  // $this->db->where(array('product_id'=> $productid)); 
  $this->db->select('*');
  $this->db->from('hot_deal_time');
  $this->db->limit(1);
  $records = $this->db->get();
  $deals = $records->result_array();
  return $deals;
}



function getExistDefaultPIN($postData=array(),$userid){

  $response = array();
   
  if(isset($postData['pin'])){
      $pin = $postData['pin'];      
      $userid = $userid;
      $where = "user_id='$userid'";
      $this->db->where($where);
      $this->db->select('*');
      $records = $this->db->get('default_pin');
      $rows = $this->db->affected_rows();
      $users = $records->result_array();
      return $rows;

  }
}

function setDefaultPin($postData=array(),$userid){
      if(isset($userid) ){
        $userid = $userid;
        $data = array(
          'user_id' => $userid,
          'defaultpin' => $postData['pin'],  
          'status' => 1   

      );
      // $this->db->where('id', $userid);
      $this->db->insert('default_pin', $data);
      $rows = $this->db->affected_rows();
      return $rows;

}
}




// get matching pin 
function getMatchingPin($selleruserid,$defaultcustomerpin){

  $response = array();

   
  if(isset($selleruserid)){
      $selleruserid = $selleruserid;
      $where = array('user_id'=>$selleruserid, 'pincode'=>$defaultcustomerpin);
      $this->db->where($where);
      $this->db->select('*');
      $records = $this->db->get('shipping_pincode_master');
      $rows = $this->db->affected_rows();
      $defaultpin = $records->result_array();
      return $rows;
  }
}


// get sub categories 
function getSubcategories($parentcatid){

  $response = array();
   
  if(isset($parentcatid)){
      $parentcatid = $parentcatid;
      $where = array('pcatid'=>$parentcatid);
      $this->db->where($where);
      $this->db->select('*');
      $records = $this->db->get('category_master');
      $rows = $this->db->affected_rows();
      $subcategoris = $records->result_array();
      return $subcategoris;

  }
}




function registerCustomer($postData=array(),$parentid){ 
    
  $time =  date("Y-m-d h:i:s");   

  if(isset($postData['phone']) ){
      
      
       $phno = $postData['phone'];      
       $password = rand(100000,999999);
       $email = $postData['email'];
      
      
      
      
      $data = array(
          'status' => 1,
          'parent_id' => $parentid,
          'first_name' => valid::sanitizestring($postData['firstname']),
          'last_name' => valid::sanitizestring($postData['lastname']),
          'country' => valid::sanitizestring($postData['country']),                
          'state' => valid::sanitizestring($postData['state']),
          'district' => valid::sanitizestring($postData['district']),
          'address' => valid::sanitizestring($postData['address']),
          'email' => valid::sanitizestring($postData['email']),
          'phone' => valid::sanitizestring($postData['phone']),
          'user_type' => 'customer',
          'time' => $time,
          'password' => $password,
      );
       
     


      $this->db->insert('shop_user', $data);
      $insertid = $this->db->insert_id();
         
      $rows = $this->db->affected_rows();

      return $rows;

  }         
}






function updatePasswordWithMail($postData=array()){ 
    
  $time =  date("Y-m-d h:i:s");   

  if(isset($postData['email']) ){
      
      
      //  $phno = $postData['phone'];      
       $password = rand(100000,999999);
       $email = $postData['email'];
      
       
      
      $data = array(       
          'password' => $password,
      );      
     

      $where = array('email'=>$email);
      $this->db->where($where);
      $this->db->update('shop_user', $data);
         
      $rows = $this->db->affected_rows();

      return $rows;

  }         
}



// get child user 
function getChildUser($parentuser){
   
  if(isset($parentuser)){
      $parentuser = $parentuser;
      $where = array('parent_id'=>$parentuser);
      $this->db->where($where);
      $this->db->select('*');
      $records = $this->db->get('shop_user');
      $rows = $this->db->affected_rows();
      $childuser = $records->result_array();
      return $childuser;

  }
}






// select banner 1 
function selectBanner(){

  $this->db->select('*');
  $this->db->from('banner_image');
  $this->db->limit(1);
  $this->db->order_by('banner_id','DESC');
  $records = $this->db->get();  
  $banner = $records->result_array();
  $rows = $this->db->affected_rows();
  return $banner;
}


// select banner 1 
function selectBanner2(){

  $this->db->select('*');
  $this->db->from('banner_image');
  $this->db->limit(10,1);
  $this->db->order_by('banner_id','DESC');
  $records = $this->db->get();  
  $banner = $records->result_array();
  $rows = $this->db->affected_rows();
  return $banner;
}


function getProductSinglespecifications($attributeids){      

  if(isset($attributeids) ){
      
      $attributeids = $attributeids;
    
      $this->db->where("sub_attr_id IN(".$attributeids.")",NULL, false);
      $this->db->select('*');
      $this->db->from('sub_attributes');
      // $this->db->join('product_specifications', 'product_specifications.product_id = product_master.product_id');
      // $this->db->join('product_master', 'product_master.attributes = sub_attributes.sub_attr_id');
      $this->db->join('attribute_master', 'attribute_master.id = sub_attributes.attribute_id');
      $records = $this->db->get(); 
      $products = $records->result_array();
      return $products;
  }
}







}



  



