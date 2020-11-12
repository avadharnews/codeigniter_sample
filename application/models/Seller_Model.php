<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include('validation.class.php');
date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)

class Seller_Model extends CI_Model {
  


    function getUsernames(){
        $this->db->select('*');
        $this->db->where('status', 1);
        $records = $this->db->get('shop_user');
        $users = $records->result_array();
        return $users;
      }
  
   
    public function auth_check_seller($data)
    {
        $query = $this->db->get_where('shop_user', $data);
        if($query){   
         return $query->row();
        }
        return false;
    }


    function getExistSeller($postData=array()){

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

      function getProducts($userid){  
        $this->db->where(array('user_id'=> $userid));     
        $this->db->select('*');
        $this->db->from('product_master');
        $this->db->join('category_master', 'product_master.category_id = category_master.categoryid');
        $this->db->limit(20);
        $this->db->order_by('product_id', 'DESC');
        $records = $this->db->get(); 
        $products = $records->result_array();
        return $products;
      }

      

      
      function getProductsPage($userid,$postData=array()){  

        $offset = $postData['offset'];
        $next = $postData['next'];

        // echo $offset;

        $this->db->where('user_id', $userid);     
        $this->db->select('*');
        $this->db->from('product_master');
        $this->db->join('category_master', 'product_master.category_id = category_master.categoryid');
        $this->db->limit($next, $offset);
        $this->db->order_by('product_id', 'DESC');

        $records = $this->db->get(); 
        $products = $records->result_array();
        return $products;
      }


      function getOrdersPage($userid,$postData=array()){  

        $offset = $postData['offset'];
        $next = $postData['next'];

        // echo $offset;

        $this->db->where('user_id', $userid, 'order_status', 'ordered');    
        $this->db->select('*');
        $this->db->from('ordered_products');
        $this->db->join('product_master', 'product_master.product_id = ordered_products.product_id');
        $this->db->join('category_master', 'product_master.category_id = category_master.categoryid');        
        $this->db->join('order_master', 'ordered_products.orid = order_master.orid');
        $this->db->join('shop_user', 'order_master.userid = shop_user.id');
        $this->db->limit($next, $offset);
        $this->db->order_by('ordered_products.order_time', 'DESC');

        $records = $this->db->get(); 
        $orders = $records->result_array();
        return $orders;
      }
      

      

      function getProductssingle($postData=array()){

        $product_id = $postData['product_id'];
        $this->db->where('product_id', $product_id);
        $this->db->select('*');
        $this->db->from('product_master');
        $this->db->join('category_master', 'product_master.category_id = category_master.categoryid');
        $records = $this->db->get(); 
        $products = $records->result_array();
        return $products;
      }

      
      function getProductssingle2($postData=array()){

        $product_id = $postData['product_id'];
        $this->db->where('product_id', $product_id);
        $this->db->select('*');
        $this->db->from('product_master');
        $records = $this->db->get(); 
        $products = $records->result_array();
        return $products;
      }


      function getProductsspecifications(){

        // $product_id = $postData['product_id'];
        // $this->db->where('product_id', $product_id);
        $this->db->select('*');
        $this->db->from('attribute_master');
        $this->db->order_by('attribute_name', 'ASC');       

        // $this->db->join('category_master', 'product_master.category_id = category_master.categoryid');
        $records = $this->db->get(); 
        $products = $records->result_array();
        return $products;
      }

      function getProductsSubattributes($postData2=array()){

        $product_id = $postData2['productid'];
        $this->db->where('product_id', $product_id);  






        $this->db->select('*');
        $this->db->from('product_specifications');
        $this->db->join('sub_attributes', 'product_specifications.sub_attribute = sub_attributes.sub_attr_id ');
        $this->db->join('attribute_master', 'sub_attributes.attribute_id = attribute_master.id ');
        $records = $this->db->get(); 
        $products = $records->result_array();
        return $products;



      }




      
function loadSubAttribute($postData=array()){

    $response = array();

    if(isset($postData['productid'])){
        $data = array(
            'spec' => valid::sanitizestring($postData['spec']),
            'productid' => valid::sanitizestring($postData['productid']),
        );
        $spec = $postData['spec'];
        $productid = $postData['productid'];

  
// WHERE `title` LIKE '%match%' ESCAPE '!' AND  `body` LIKE '%match% ESCAPE '!'

        $where = "attribute_id = $spec";
        $this->db->where($where);  
        $this->db->select('*');
        $records = $this->db->get('sub_attributes');
        $users = $records->result_array();
        return $users;

       
    }
}

      

function loadProductAttribute($postData=array()){

    $response = array();

    if(isset($postData['productid'])){
        $data = array(
            'productid' => valid::sanitizestring($postData['productid']),
        );
        $productid = $postData['productid'];

  
// WHERE `title` LIKE '%match%' ESCAPE '!' AND  `body` LIKE '%match% ESCAPE '!'

        $where = "product_id = $productid";
        $this->db->where($where);  
        $this->db->select('*');
        $records = $this->db->get('product_specifications');
        $users = $records->result_array();
        return $users;

       
    }
}

      

      
      
  
      function insert_image($image_data)
      {
         $this->db->insert("product_master", $image_data);  
         $rows = $this->db->affected_rows();
         return $rows;
      }

      function update_image($image_data,$productid)
      {
         $this->db->where('product_id', $productid);
         $this->db->update("product_master", $image_data);  
         $rows = $this->db->affected_rows();
         return $rows;
      }


      
      function update_product($product_data,$productid)
      {
        //   echo  json_encode($image_data);
         $this->db->where('product_id', $productid);
         $this->db->update("product_master", $product_data);
         
         $rows = $this->db->affected_rows();
         return $rows;
  
      }

      function update_product_attr($product_data,$productid)
      {
        //   echo  json_encode($image_data);
         $this->db->where('product_id', $productid);
         $this->db->update("product_master", $product_data);
         
         $rows = $this->db->affected_rows();
         return $rows;
  
      }


      function deteleproduct($productid,$sessionid)
      {
        //   echo  json_encode($image_data);
        $productid = $productid;
        $data = array(
          'status' => 0,                 
    
      ); 
         $this->db->where('product_id', $productid );
         $this->db->update("product_master", $data);
         
         $rows = $this->db->affected_rows();
         return $rows;
  
      }







      function getExistProductAttribute($postData=array()){

        $response = array();
        
       
        if(isset($postData['productid'])){
            $productid = $postData['productid'];
            $data = array(
                'productid' => valid::sanitizestring($postData['productid']),
                'sub_attribute' => valid::sanitizestring($postData['subattribute']),                
            );
            $productid = $postData['productid'];
            $subattribute = $postData['subattribute'];
            $attribute = $postData['attribute'];
            $where = "attribute_id='$attribute' AND product_id='$productid' AND status = 1" ;
            $this->db->where($where);
            $this->db->select('*');
            $records = $this->db->get('product_specifications');
            $rows = $this->db->affected_rows();
            $users = $records->result_array();
            return $rows;

        }
    }








    function registerSeller($postData=array()){ 
    
        $time =  date("Y-m-d h:i:s");   
    
        if(isset($postData['phone']) ){
            
            
            
             $password = rand(100000,999999);
             $email = $postData['email'];
            
            
        $to      = $email;
        $subject = 'Shop OTP';
        $from = '';
        $message = 'Hi This is from ,<br> Your OTP is <b>'. $password. '<b>';
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    
    // Create email headers
        $headers .= 'From: '.$from."\r\n".
            'Reply-To: '.$from."\r\n" .
            'X-Mailer: PHP/' . phpversion();
    
    // Compose a simple HTML email message
    
    
    // Sending email
        // if(mail($to, $subject, $message, $headers))
    
            
            
            $data = array(
                'status' => '0',
                'companyname' => valid::sanitizestring(($postData['companyname'])),
                'first_name' => valid::sanitizestring($postData['firstname']),
                'last_name' => valid::sanitizestring($postData['lastname']),
                'country' => valid::sanitizestring($postData['country']),                
                'state' => valid::sanitizestring($postData['state']),
                'district' => valid::sanitizestring($postData['district']),
                'address' => valid::sanitizestring($postData['address']),
                'email' => valid::sanitizestring($postData['email']),
                'phone' => valid::sanitizestring($postData['phone']),
                'user_type' => 'ventor',
                'time' => $time,
                'password' => $password,
            );
             
           
    
    
            $this->db->insert('shop_user', $data);
            $insertid = $this->db->insert_id();
               
            $rows = $this->db->affected_rows();
    
            return $rows;
    
        }         
      }





      
    function insertProductAttribute($postData=array()){ 
    
    
        if(isset($postData['productid']) ){        
                                   
            $data = array(
                'status' => '1',
                'product_id' => valid::sanitizestring($postData['productid']),
                'sub_attribute' => valid::sanitizestring($postData['subattribute']), 
                'attribute_id' => valid::sanitizestring($postData['attribute']),                              
            );     
    
            $this->db->insert('product_specifications', $data);
            $insertid = $this->db->insert_id();               
            $rows = $this->db->affected_rows();    
            return $rows;
    
        }         
      }


      
    function removeProductAttribute($postData=array()){ 
    
    
        if(isset($postData['productid']) ){        
                                   
            $productid = $postData['productid'];
            $attribute = $postData['attribute'];

    
            $where = "product_id='$productid' AND attribute_id='$attribute'" ;
            $this->db->where($where);
            $this->db->delete('product_specifications');


            // $this->db->insert('product_specifications', $data);
            // $insertid = $this->db->insert_id();               
            $rows = $this->db->affected_rows();    
            return $rows;
    
        }         
      }


}






