<?php
defined('BASEPATH') OR exit('No direct script access allowed');

header("Access-Control-Allow-Origin: *");

header("Access-Control-Allow-Methods: POST");


class  ShopController extends CI_Controller {
  
     public function __construct()
        {
         parent::__construct();
         $this->load->model('Shop_Model');
         $this->load->model('Seller_Model');
         
             $this->load->library(array('form_validation','session','pagination'));
                 $this->load->helper(array('url','html','form'));
                 $this->id = $this->session->userdata('id');
                 $this->email = $this->session->userdata('email');
                 $this->name = $this->session->userdata('name');
                 $this->user_type = $this->session->userdata('user_type'); 
                
                 
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

        public function LoginCustomer()
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
            //    'status' => 1,
             );
   
            $check = $this->Shop_Model->auth_check_customer($data);
            
            if($check != false){
                 $user = array(
                 'id' => $check->id,
                 'email' => $check->email,
                 'name' => $check->first_name .' '. $check->last_name,
                 'user_type' => $check->user_type,
                );
  
            $this->session->set_userdata($user);
 
             redirect( base_url('ShopController') ); 
            }
 
           $this->load->view('customer/customer_login_reg');
        }
         
    }   


    // public function loadProduct()    {
        
    //     $category = $this->Seller_Model->getCategory();  
    //     $data['category'] = $category;
    //     $this->load->view('customer/shop_head_user', $data);
    // }

   
  
    public function index()
    {

        // get all deals 

        $deals = $this->Shop_Model->getHotdeals();  
        $data['deals'] = $deals;

        // get all category 
        $cat = $this->Shop_Model->getCategory();  
        $data['cat'] = $cat;

        


        $banner = $this->Shop_Model->selectBanner();  
        $data['banner'] = $banner;

        $banner2 = $this->Shop_Model->selectBanner2();  
        $data['banner2'] = $banner2;

        // deal timer 

        $endtimer = $this->Shop_Model->getDealtimer();  
        $data['endtimer'] = $endtimer;  
        
               

        $this->load->view('customer/shop_home',$data);        
     
    }

    public function ProductSingle($productid)
    {
        $userid = $this->id;
        // get all category 
        $cat = $this->Shop_Model->getCategory();  
        $data['cat'] = $cat;

        $address = $this->Shop_Model->getShippingAddress($userid);  
        $data['address'] = $address;


        $products = $this->Shop_Model->getProductSingle($productid);  
        $data['products'] = $products;  
        $companyname = '';
        foreach($products as $product){
            $categoryid = $product['categoryid'];
            $company =  $product['id'];
            $relatedproducts = $this->Shop_Model->getRelatedProductSingle($categoryid);  
            $data['relatedproducts'] = $relatedproducts;             
            
        }     

        $attr = $this->Shop_Model->getProductSingleAttribue($productid);  
        $data['attr'] = $attr;   
        foreach($attr as $attrs){
               $attributeids = $attrs['attributes'];
               if($attributeids != null ){
                $specifications = $this->Shop_Model->getProductSinglespecifications($attributeids);  
                $data['specifications'] = $specifications;   
               }
               else{
                   
               }
        }
        
        $this->load->view('customer/single_product',$data);
        
     
    }



    


        

        



    public function ProductFilter($categoryid)
    {
        $config = array();
        $config["base_url"] = base_url() . "ShopController/ProductFilter/$categoryid";
        $config["total_rows"] = $this->Shop_Model->record_count($categoryid);
        $config["per_page"] = 9;
        $config["uri_segment"] = 4;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(4) : 0;
        // $page = $pageid;
        // echo $page;
        $data["results"] = $this->Shop_Model->
        fetch_products($config["per_page"], $page, $categoryid );
        $data["links"] = $this->pagination->create_links();

        // print_r(($data));
      
        $attribute = $this->Shop_Model->fetch_products($config["per_page"], $page, $categoryid );
        $data['attribute'] = $attribute; 
          
        //  get product sub attribute from product category 
        $productsubattributes = $this->Shop_Model->getSubAttributesFromPro($categoryid);  
        $data['productsubattributes'] = $productsubattributes;       


        $catattributes = $this->Shop_Model->getCategoryAttributes($categoryid);  
        $data['catattributes'] = $catattributes;  
      

          // get sub category
          $subcategory = $this->Shop_Model->getSubcategoryLeft($categoryid);  
          $data['subcategory'] = $subcategory;
        //   print_r(json_encode($subcategory));
          $arr = $subcategory;


          //   list categories in top 

        $cat = $this->Shop_Model->getCategory();  
        $data['cat'] = $cat;
        
          
          
        foreach($catattributes as $catattribute){
            $attributeslist =  $catattribute['attributes'];

            $attributes = $this->Shop_Model->getFilterAttributes($attributeslist);  
            $data['attributes'] = $attributes;     
           
            $selectedcategory = explode(',',$categoryid);
            $data['selectedcategory'] = $selectedcategory;

            // print_r($data['attributes']);
            // print_r($selectedcategory);

            if($data["results"]!=''){
                $this->load->view('customer/product_filter',$data);
            }
            else{
                $this->load->view('customer/product_filter_nodisplay',$data);
            }
        }        
     
    }


    

  

    public function loadAttribure(){
        
        $postData = $this->input->post();
        $categoryid = $postData['attributeid'];
        $attributes = $this->Shop_Model->getFilterAttributes($categoryid);  
        $data['attributes'] = $attributes;   
                    
        $this->load->view('customer/product_filter',$data);
    }

    public function loadSubAttribute()
    {

        $postData = $this->input->post();
        $attributeid = $postData['attributeid'];
        $subattributes = $this->Shop_Model->getFilterSubattributes($attributeid);  
        $data['subattributes'] = $subattributes;       

        $this->load->view('customer/loadsubattribute',$data);
             
    }




    


    public function sortProductFilterLeft()
    {
        $postData = $this->input->post();
        // print_r ($postData['arrribute']);
        // if($postData['arrribute']=='Undefined'){
        //     echo 1; 
        // }
        $categoryid = $postData['categoryid'];
        if(isset($postData['arrribute'])){
        
            $arrribute = $postData['arrribute'];

        // echo $categoryid;
        $arrributes = array($arrribute); 
        // print_r ($arrributes);
        $values = '';
        foreach ($arrribute as &$value) {
            $values .= 'find_in_set ('  .$value.  ','.'product_master.attributes'.') AND '  ;
            // print_r($values);
            
        }
        // echo $values;
        $results = $this->Shop_Model->fetch_sort_products_filterleft($values,$categoryid);
        $data['results'] = $results;
        
      

       
    }
    else{
        // echo '<br><h3>No Result</h3>';
        $results = $this->Shop_Model->fetch_sort_products_filterleft_when_null($categoryid);
        $data['results'] = $results;
    }
    $this->load->view('customer/product_filter_sort_left',$data);
    }




    public function searchProductFilter()
    {
        $postData = $this->input->post();
        // $postData['arrribute'];
        // if($postData['arrribute']=='Undefined'){
        //     echo 1; 
        // }
        if(isset($postData['searchkey'])){

        $searchkey = $postData['searchkey'];
        

        $suggestionresults = $this->Shop_Model->searchProduct($searchkey);
        $data['suggestionresults'] = $suggestionresults;

        $suggestionresultscategory = $this->Shop_Model->searchCategory($searchkey);
        $data['suggestionresultscategory'] = $suggestionresults;
        
        foreach($suggestionresultscategory as $results1){ ?>
           <a href="<?php echo base_url() ?>ShopController/ProductFilter/<?php echo $results1['categoryid'] ?>/<?php echo $results1['categoryname'] ?>">
            <div class="container-fluid bor-bot" >
               <div class="row">
                   <div class="col-2">
                       <img src="<?php echo base_url() ?>admin//uploads/<?php echo $results1['cat_image'] ?> " class="img-fluid center-block"  style="width: 50px;height:50px">  
                   </div>
                   <div class="col-10">
                        <div class="mar-le"><?php echo $results1['categoryname'] ?> </div>
                   </div>
               </div>
            </div>
            </a>

        <?php } ?>
        
        <?php
        
        $suggestionresultscategory = $this->Shop_Model->searchCategory($searchkey);
        $data['suggestionresultscategory'] = $suggestionresults;
        
        foreach($suggestionresults as $results){ ?>

          
<a href="<?php echo base_url() ?>ShopController/ProductSingle/<?php echo $results['product_id'] ?>/<?php echo($results['keywords']) ?>">
            <div class="container-fluid bor-bot" onclick="loadsearchproduct(<?php echo $results['categoryid'] ?>)">
               <div class="row">
                   <div class="col-2">
                       <img src="<?php echo base_url() ?>/uploads/<?php echo $results['image'] ?> " class="img-fluid center-block" style="width: 50px;height:50px">  
                   </div>
                   <div class="col-10">
                        <div class="mar-le"><?php echo $results['product_name'] ?> </div>
                   </div>
               </div>
            </div>
       <?php } ?>

   <?php }
    else{
        echo '<br><h3>No Result</h3>';
    }
     
    }
    


    
    
    

    public function UserLogin()
    {
     $this->load->view('user_login');
     
    }  

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url('ShopController'));
       }   

    
   

    


    public function CustomerLoginRegister()
    {
        $cat = $this->Shop_Model->getCategory();  
        $data['cat'] = $cat;   
        $this->load->view('customer/customer_login_reg', $data);
     
    }

    

    

    
  


         
}







    




