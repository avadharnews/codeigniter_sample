<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  
class  SellerController extends CI_Controller {
  
     public function __construct()
        {
         parent::__construct();
         $this->load->model('Seller_Model');         
         $this->load->model('Shop_Model');
             $this->load->library(array('form_validation','session'));
                 $this->load->helper(array('url','html','form'));
                 $this->id = $this->session->userdata('id');
                 $this->email = $this->session->userdata('email');
                 $this->name = $this->session->userdata('name');
                 $this->utype = $this->session->userdata('user_type');
        }
  
  
    public function index()
    {
     $this->load->view('seller_login_reg');
     
    }

    public function SellerDashboard()
    {

        
        if(empty($this->id)){
            redirect(base_url('SellerController'));
            
        }
        $userid = $this->id;
 
        if($this->utype=='ventor'){
            $users = $this->Seller_Model->getUsernames();    
            $data['users'] = $users;   

            $products = $this->Seller_Model->getOrders($userid);  
            $data['products'] = $products;
            $this->load->view('seller/sellerdashboard', $data);    
        }
        else{
            $this->load->view('permissiondenied');       
        }
        
        
     
    }
 

     
    public function loadProductRegister()
    {
        if(empty($this->id)){
            redirect(base_url('SellerController'));            
        }

        if($this->utype=='ventor'){
            $users = $this->Seller_Model->getUsernames();    
            $data['users'] = $users;   


            $specifications = $this->Seller_Model->getProductsspecifications();
            $data['specifications'] = $specifications;

            $category = $this->Seller_Model->getCategory();  
            $data['category'] = $category;
            
            $this->load->view('seller/addproduct', $data);  
        }
        else{
            $this->load->view('permissiondenied');       
        }        
     
    }

 

    public function CreateProductAttribute()    {

        if (empty($this->id)) {
            redirect(base_url('SellerController'));
        }

        if($this->utype=='ventor'){
            $category = $this->Seller_Model->getCategory();  
            $data['category'] = $category;
            $this->load->view('seller/addproduct', $data);
        }
        else{
            $this->load->view('permissiondenied');       
        }   

        
    }
 
    public function loadProducts()    {

        if (empty($this->id)) {
            redirect(base_url('SellerController'));
        }

        if($this->utype=='ventor'){
            $userid = $this->id;
            $products = $this->Seller_Model->getProducts($userid);  
            $data['products'] = $products;
            $this->load->view('seller/viewproducts', $data);
        }
        else{
            $this->load->view('permissiondenied');       
        }   
        
    }

    

    


    public function ViewProductDetails($product_id)    {

        $postData = array(
        'product_id' => $product_id
       );
        if (empty($this->id)) {
            redirect(base_url('SellerController'));
        }

        if($this->utype=='ventor'){
            $products = $this->Seller_Model->getProductssingle($postData);          
            $data['products'] = $products;
            // $data['products'] = $postData;    
            $specifications = $this->Seller_Model->getProductsspecifications($postData);
            $data['specifications'] = $specifications;           
               
            $this->load->view('seller/viewproductssingle', $data);
        }
        else{
            $this->load->view('permissiondenied');       
        }  
       
    }
    
    
    

    public function loadProductAttribute(){
        // POST data
        $postData = $this->input->post();

        $data = $this->Seller_Model->getProductsSubattributes($postData);

        $data['sub_attributes'] = $data;   
    
        $arraycount =count($data);
        $arraylength = $arraycount - 1;
         
        $this->load->view('seller/load_product_attributes',$data);       
        
      }

      
 
    public function loadSubAttributes(){
        // POST data
        $postData = $this->input->post();

        $data = $this->Seller_Model->loadSubAttribute($postData);

        $data['sub_attributes'] = $data;   
    
        $arraycount =count($data);
        $arraylength = $arraycount - 1;
         
        $this->load->view('seller/load_subattributes',$data);       
        
      }


      public function editProduct($product_id)    {

           $postData = array(
            'product_id' => $product_id
           );
            if (empty($this->id)) {
                redirect(base_url('SellerController'));
            }

            if($this->utype=='ventor'){
                $products = $this->Seller_Model->getProductssingle($postData);          
                $data['products'] = $products;
                // $data['products'] = $postData;
        
                $specifications = $this->Seller_Model->getProductsspecifications($postData);
                $data['specifications'] = $specifications;
    
                $category = $this->Seller_Model->getCategory();  
                $data['category'] = $category;
        
                $this->load->view('seller/editproduct', $data);
            }
            else{
                $this->load->view('permissiondenied');       
            }  
            
    }

    

    public function editProductAttribute($product_id)    {

        $postData = array(
         'product_id' => $product_id
        );
         if (empty($this->id)) {
             redirect(base_url('SellerController'));
         }

         if($this->utype=='ventor'){
             $products = $this->Seller_Model->getProductssingle2($postData);          
             $data['products'] = $products;
             // $data['products'] = $postData;
     
             $specifications = $this->Seller_Model->getProductsspecifications($postData);
             $data['specifications'] = $specifications;
 
             $category = $this->Seller_Model->getCategory();  
             $data['category'] = $category;
     
             $this->load->view('seller/editproduct_attribute', $data);
         }
         else{
             $this->load->view('permissiondenied');       
         }  
         
 }


    public function deleteProduct()    {

        $postData = array(
         'product_id' => $this->input->post('productid')
        );
        $productid = $this->input->post('productid');
        $sessionid = $this->id;

         if (empty($this->id)) {
             redirect(base_url('SellerController'));
         }
         $data  = $this->Seller_Model->deteleproduct($productid,$sessionid);   
         if(json_encode($data)>0){
            echo 1;
        } 
        else{
            echo 0;
        }       
        
 }


    


    

    
    function editProductApi()
    {           
                $productname = $this->input->post('productname');
                $originalsellerrate = $this->input->post('originalserate');
                // commission original rate 
                $originalrate = $originalsellerrate;
                //  + ($originalsellerrate * (5/100));                   
                $sellersellingrate = $this->input->post('sellingrate');                
                // commission in selling rate
                $sellingrate = $sellersellingrate;
                //  + ($sellersellingrate * (5/100));  
                $description = $this->input->post('description');
                $cattegoryids = $this->input->post('cattegoryid');
                $keywords = $this->input->post('keywords');
                $stock =  $this->input->post('stock');  
                $return =  $this->input->post('return'); 
                // $attributes = $this->input->post('attributes');

                // $attributesid = implode(',', $attributes);
                $cattegoryid = implode(',', $cattegoryids);
               

                $quantity = $this->input->post('quantity');
                $unit = $this->input->post('unit');
                $shippingrate = $this->input->post('shippingrate');

                $productid = $this->input->post('productid');

                
                $userid = $this->id;                

                // echo $productname.$data["file_name"];

                // echo '<br><br>';
                $product_data = array(
                    'product_name' => $productname,
                    'original_rate' => $originalrate,
                    'selling_rate' => $sellingrate,
                    'description' => $description,
                    'seller_original_rate' => $originalsellerrate,
                    'seller_selling_rate' => $sellersellingrate,
                    'category_id' => $cattegoryid,
                    'date_time' => date("Y/m/d h:i:sa"),
                    'user_id' => $userid,
                    'quantity' => $quantity,
                    'unit' => $unit,  
                    'shipping_charge' => $shippingrate, 
                    'keywords' => $keywords,  
                    'stock' => $stock,    
                    'return_policy' => $return,
                    // 'attributes' => $attributesid,               
                );

                $data = $this->Seller_Model->update_product($product_data,$productid);
                if(json_encode($data)>0){
                    echo 1;
                } 
                else{
                    echo 0;
                }
                // echo $this->Seller_Model->fetch_image();
                //echo '<img src="'.base_url().'upload/'.$data["file_name"].'" width="300" height="225" class="img-thumbnail" />';
            }
        




            
    
    function editProductAttributeApi()
    {           
                // $productname = $this->input->post('productname');
                // $originalsellerrate = $this->input->post('originalserate');
                // // commission original rate 
                // $originalrate = $originalsellerrate;
                // //  + ($originalsellerrate * (5/100));                   
                // $sellersellingrate = $this->input->post('sellingrate');                
                // // commission in selling rate
                // $sellingrate = $sellersellingrate;
                // //  + ($sellersellingrate * (5/100));  
                // $description = $this->input->post('description');
                // $cattegoryids = $this->input->post('cattegoryid');
                // $keywords = $this->input->post('keywords');
                // $stock =  $this->input->post('stock');  
                $attributes = $this->input->post('attributes');
                $attributesid = implode(',', $attributes);
                // $cattegoryid = implode(',', $cattegoryids);
               

                // $quantity = $this->input->post('quantity');
                // $unit = $this->input->post('unit');
                // $shippingrate = $this->input->post('shippingrate');

                $productid = $this->input->post('productid');

                
                $userid = $this->id;                


                // echo '<br><br>';
                $product_data = array(                    
                    'attributes' => $attributesid,               
                );

                $data = $this->Seller_Model->update_product_attr($product_data,$productid);
                if(json_encode($data)>0){
                    echo 1;
                } 
                else{
                    echo 0;
                }
                // echo $this->Seller_Model->fetch_image();
                //echo '<img src="'.base_url().'upload/'.$data["file_name"].'" width="300" height="225" class="img-thumbnail" />';
            }
        
    
            


            function editProductImageApi()
            {
                if (isset($_FILES["image_file"]["name"])) {
                    $config['upload_path'] = './uploads/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('image_file')) {
                        echo $this->upload->display_errors();
                    } else {
                        $productid = $this->input->post('productid');
                      
        
                        
                        $userid = $this->id;                
                        $data = $this->upload->data();
                        $stdimage = time() . '-' . $data["file_name"];
        
        
                        //  $config['file_name'] = $stdid.'-'.$data["file_name"];
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = './uploads/' . $data["file_name"];
                        $config['create_thumb'] = FALSE;
                        $config['maintain_ratio'] = TRUE;
                        $config['quality'] = '20%';
                        $config['width'] = 500;
                        $config['height'] = 500;

                        
                        // $config['file_name'] = $stdimage;
                        $config['new_image'] = './uploads/' . date("Ymdhisa") . '-' . $data["file_name"];
                        // print_r($config);
                        $this->load->library('image_lib', $config);
                        $this->image_lib->resize();
                        $this->load->model('Seller_Model');
                        unlink('./uploads/' . $data["file_name"]);
        
                        // echo $productname.$data["file_name"];
        
                        // echo '<br><br>';
                        $image_data = array(
                            'image' => date("Ymdhisa") . '-' . $data["file_name"],
                        );
                        $data = $this->Seller_Model->update_image($image_data,$productid);
                        if(json_encode($data)>0){
                            echo 1;
                        } 
                        else{
                            echo 0;
                        }
                        
                        // echo $this->Seller_Model->fetch_image();
                        //echo '<img src="'.base_url().'upload/'.$data["file_name"].'" width="300" height="225" class="img-thumbnail" />';
                    }
                }
            }
    
    function uploadproduct()
    {
        if (isset($_FILES["image_file"]["name"])) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image_file')) {
                echo $this->upload->display_errors();
            } else {
                $productname = $this->input->post('productname');

                $originalsellerrate = $this->input->post('originalserate');
                // commission original rate 
                $originalrate = $originalsellerrate;
                // + ($originalsellerrate * (5/100));                   
                $sellersellingrate = $this->input->post('sellingrate');                
                // commission in selling rate
                $sellingrate = $sellersellingrate;
                //  + ($sellersellingrate * (5/100));  

                $description = $this->input->post('description');
                $cattegoryids = $this->input->post('cattegoryid');
                $attributes = $this->input->post('attributes');
                $prostatus = $this->input->post('prostatus');
                $biddingavail = $this->input->post('biddingavail');
                // echo $attributes;
                $attributesid = implode(',', $attributes);
                $cattegoryid = implode(',', $cattegoryids);
                $quantity = $this->input->post('quantity');
                $unit = $this->input->post('unit');
                $shippingrate = $this->input->post('shippingrate');
                $keywords = $this->input->post('keywords');
                $stock =  $this->input->post('stock'); 
                $return =  $this->input->post('return'); 
                             
               
                $userid = $this->id;                
                $data = $this->upload->data();
                $stdimage = $productname . '-' . $data["file_name"];


                //  $config['file_name'] = $stdid.'-'.$data["file_name"];
                $config['image_library'] = 'gd2';
                $config['source_image'] = './uploads/' . $data["file_name"];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['quality'] = '20%';
                $config['width'] = 500;
                $config['height'] = 500;
                // $config['file_name'] = $stdimage;
                $config['new_image'] = './uploads/' . date("Ymdhisa") . '-' . $data["file_name"];
                // print_r($config);
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $this->load->model('Seller_Model');
                unlink('./uploads/' . $data["file_name"]);

                // echo $productname.$data["file_name"];

                // echo '<br><br>';
                $image_data = array(
                    'image' => date("Ymdhisa") . '-' . $data["file_name"],
                    'product_name' => $productname,
                    'original_rate' => $originalrate,
                    'selling_rate' => $sellingrate,
                    'seller_original_rate' => $originalsellerrate,
                    'seller_selling_rate' =>  $originalrate,
                    'description' => $description,
                    'category_id' => $cattegoryid,
                    'date_time' => date("Y/m/d h:i:sa"),
                    'user_id' => $userid,
                    'quantity' => $quantity,
                    'unit' => $unit,   
                    'shipping_charge' => $shippingrate,    
                    'stock' => $stock,    
                    'keywords' => $keywords,
                    'attributes' => $attributesid, 
                    'prostatus' => $prostatus,
                    'bidding_avail' => $biddingavail,
                    'return_policy' => $return,
                    'status'=> 0,
                                 
                );
                $data = $this->Seller_Model->insert_image($image_data);

                if(json_encode($data)>0){
                    echo 1;
                } 
                else{
                    echo 0;
                }
                // echo $this->Seller_Model->fetch_image();
                //echo '<img src="'.base_url().'upload/'.$data["file_name"].'" width="300" height="225" class="img-thumbnail" />';
            }
        }
    }


      
  

      public function LoginSeller()
        {
 
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
 
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_message('required', 'Enter %s');
 
        if ($this->form_validation->run() === FALSE)
        {  
            $this->load->view('seller_login_reg');
        }
        else
        {   
            $data = array(
               'email' => $this->input->post('email'),
               'password' => $this->input->post('password'),
               'user_type' => 'ventor',               
               'status' => 1,
 
             );
   
            $check = $this->Seller_Model->auth_check_seller($data);
            
            if($check != false){
                 $user = array(
                 'id' => $check->id,
                 'email' => $check->email,
                 'user_type' => $check->user_type,                 
                 'name' => $check->first_name .' '. $check->last_name,
                );
  
            $this->session->set_userdata($user);
 
             redirect( base_url('SellerController/loadProducts') ); 
            }
 
           $this->load->view('seller_login_reg');
        }
         
    }   
      

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url('SellerController'));
       }   



       

       public function apiRegisterSeller(){
        // POST data
        $postData = $this->input->post();
        $dataexist = $this->Seller_Model->getExistSeller($postData);
        // echo json_encode($dataexist);
        if(json_encode($dataexist)>0){
            echo 2;
        }
        else{
        // get data
        $data = $this->Seller_Model->registerSeller($postData);
        if(json_encode($data)>0){
            echo 1;
        } 
        else{
            echo 0;
        }
        // echo json_encode($data);
        }
        
      }


         
        public function savePin(){        

            $userid = $this->id;
            $postData = $this->input->post();
      
            $dataexist = $this->Seller_Model->getExistPIN($postData,$userid);
            if(json_encode($dataexist)>0){
                echo 2;
            } 
            else{
                 // get data
                 $data = $this->Seller_Model->setDeliveryPins($postData,$userid);
                 if(json_encode($data)>0){
                    echo 1;
                 } 
                 else{
                    echo 0;
                 }
              }
            }     
            

}

    