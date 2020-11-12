
<!-- <div class="col-md-2">
<div class="aspect-ratio aspect-ratio-1-1 img-frame">
    <img src="http://[::1]/circuitbuyandsell/uploads/20200918125607pm-redmi-note-8-64-a-m1908c3ji-mi-4-original-imafhgpphwztnchc.jpeg" class="fit-img" alt="sample">
  </div>
</div>   -->


    <?php 
        if (empty($this->id)) {
            include_once('shop_head.php');
        }
        else{
            include('shop_head_user.php');
        }
    ?>

 
<!-- <button onclick="sendsms()">test sms</button> -->

                <!-- Header Bottom Area End Here -->
                <!-- Begin Mobile Menu Area -->
                <div class="mobile-menu-area d-lg-none d-xl-none col-12">
                    <div class="container"> 
                        <div class="row">
                            <div class="mobile-menu">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Mobile Menu Area End Here -->
            </header>
            <!-- Header Area End Here -->
            <!-- Begin 's Breadcrumb Area -->
            <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <!-- load category name  -->
                            <?php 
                                foreach($selectedcategory as $selectedcategories){
                                    $categoryids = $selectedcategories;
                                }
                                $categories = $this->Shop_Model->getCategoryDetails($categoryids);  
                                $data['categories'] = $categories; 
                            ?>    
                        <!-- load category name  -->
                        <ul>
                            <li><a href="<?php echo base_url();?>">Home</a></li>
                            <?php foreach($categories as $category){ ?>
                                <li class="active"><?php echo $category['categoryname']; ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- 's Breadcrumb Area End Here -->
            <!-- Begin 's Content Wraper Area -->
            <div class="content-wraper pt-60 pb-60 pt-sm-30">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 order-1 order-lg-2">
                            <!-- Begin 's Banner Area -->
                            
                            
                            <!-- 's Banner Area End Here -->
                            <!-- shop-top-bar start -->

                            
                          
                            <!-- shop-top-bar end -->
                            <!-- shop-products-wrapper start -->


                           
                            <div id="loadsec" style="display: none;">
                                <div class="loader d-block mx-auto mt-100"></div>
                                Loading Please Wait
                            </div>
                            
                            <div id="sortresult"></div>
                            <!-- <div id="cleareddata"></div> -->


                            <div class="shop-products-wrapper" id="beforesort">
                                <div class="tab-content">
                                    <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                                        <div class="product-area shop-product-area">
                                            <div class="row">

                                            <?php
                                               foreach($results as $products) { ?>
                                              
                                              
                                               <script>
                                                   var categoryids = <?php echo $products->category_id ?>
                                               </script>
                                               
                                                <div class="col-lg-4 col-md-4 col-sm-6 mt-40">
                                                    <!-- single-product-wrap start -->
                                                    <div class="single-product-wrap">
                                                        <div class="aspect-ratio aspect-ratio-1-1 img-frame">
                                                            <a href="<?php echo base_url() ?>ShopController/ProductSingle/<?php echo $products->product_id ?>" target="_blank">
                                                                <img src="<?php echo base_url() ?>uploads/<?php echo $products->image ?>" class="fit-img" alt=" Product Image">
                                                            </a>
                                                            <span class="sticker">New</span>
                                                            <?php  if($products->status==0){ ?>
                                                            <span class="uavail-badge d-block mx-auto">Temporarily Unavailable</span>
                                                            <?php } ?>
                                                            <?php  if($products->stock==0){ ?>
                                                            <span class="outvail-badge d-block mx-auto">Out Of Stock</span>
                                                            <?php } ?>
                                                            
                                                        </div>
                                                        <div class="product_desc">
                                                            <div class="product_desc_info">
                                                                <div class="product-review">
                                                                    <h5 class="manufacturer">
                                                                        <a href="<?php echo base_url() ?>ShopController/SellerSingle/<?php echo $products->user_id ?>" target="_blank"><?php echo $products->companyname ?></a>
                                                                    </h5>
                                                                    <div class="rating-box">
                                                                        <!-- call rating starts                                                         -->
                                                                        <?php
                                                                            $productid = $products->product_id;
                                                                            $rating = $this->Shop_Model->getRating($productid); 
                                                                            include('includes/rating_sec.php');
                                                                            ?>   
                                                                        <!-- call rating ends here -->
                                                                    </div>
                                                                </div>
                                                                <h4><a class="product_name" href="<?php echo base_url() ?>ShopController/ProductSingle/<?php echo $products->product_id ?>"><?php echo substr($products->product_name, 0, 35).'...' ?></a></h4>
                                                                <div class="price-box">
                                                                    <span class="price2"><del><i class="fa fa-rupee"></i> <?php echo $products->original_rate ?></del></span> 
                                                                    <span class="new-price"><i class="fa fa-rupee"></i> <?php echo $products->selling_rate ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="add-actions">
                                                                <ul class="add-actions-link">
                                                                    <?php if($products->status==1 && $products->stock>=1){ ?>
                                                                    <li class="add-cart active" onclick="addtocart(<?php echo $products->product_id ?>,<?php echo $products->selling_rate ?>,<?php echo $products->shipping_charge ?>)">Add to cart</li>
                                                                    <?php } ?>
                                                                    
                                                                    <li onclick="quickview(<?php echo $products->product_id ?>)"><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                                                    <li onclick="addtowishlist(<?php echo $products->product_id ?>)"><a class="links-details"><i class="fa fa-heart-o"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- single-product-wrap end -->
                                                </div>                                               
                                               <?php } ?>    
                                            </div>
                                        </div>
                                    </div>
                                    <div id="list-view" class="tab-pane fade product-list-view" role="tabpanel">
                                        <div class="row">
                                            <div class="col">
                                            <?php
                                               foreach($results as $products) { ?>                                               
                                                <div class="row product-layout-list">
                                                    <div class="col-lg-3 col-md-5 ">
                                                        <div class="aspect-ratio aspect-ratio-1-1 img-frame">
                                                            <a href="#">
                                                                <img src="<?php echo base_url() ?>uploads/<?php echo $products->image ?>" alt="Product Image" class="fit-img">
                                                            </a>
                                                            <span class="sticker">New</span>
                                                            <?php  if($products->status==0){ ?>
                                                            <span class="uavail-badge d-block mx-auto">Temporarily Unavailable</span>
                                                            <?php } ?>
                                                            <?php  if($products->stock==0){ ?>
                                                            <span class="outvail-badge d-block mx-auto">Out Of Stock</span>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5 col-md-7">
                                                        <div class="product_desc">
                                                            <div class="product_desc_info">
                                                                <div class="product-review">
                                                                    <h5 class="manufacturer">
                                                                        <a href="<?php echo base_url() ?>ShopController/ProductSingle/<?php echo $products->product_id ?>"><?php echo $products->companyname ?></a>
                                                                    </h5>
                                                                    <div class="rating-box">
                                                                         <!-- call rating starts                                                         -->
                                                                            <?php
                                                                            $productid = $products->product_id;
                                                                            $rating = $this->Shop_Model->getRating($productid); 
                                                                            include('includes/rating_sec.php');
                                                                            ?>   
                                                                        <!-- call rating ends here -->
                                                                    </div>
                                                                </div>
                                                                <h4><a class="product_name" href="<?php echo base_url() ?>ShopController/ProductSingle/<?php echo $products->product_id ?>"><?php echo $products->product_name ?></a></h4>
                                                                <div class="price-box">
                                                                    <span class="old-price"><del><i class="fa fa-rupee"></i> <?php echo $products->original_rate ?></del></span>
                                                                    <span class="new-price"><i class="fa fa-rupee"></i> <?php echo $products->selling_rate ?></span>
                                                                </div>
                                                                <p><?php echo substr($products->description , 0, 100) ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="shop-add-action mb-xs-30">
                                                            <ul class="add-actions-link">
                                                                <?php if($products->status==1 && $products->stock>=1){ ?>
                                                                <li class="add-cart" onclick="addtocart(<?php echo $products->product_id ?>,<?php echo $products->selling_rate ?>,<?php echo $products->shipping_charge ?>)"><a href="#">Add to cart</a></li>
                                                                <?php } ?>
                                                                <li class="wishlist" onclick="addtowishlist()(<?php echo $products->product_id ?>)"><i class="fa fa-heart-o"></i>Add to wishlist</li>
                                                                <li onclick="quickview(<?php echo $products->product_id ?>)"><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter" href="#"><i class="fa fa-eye"></i>Quick view</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>  
                                            
                                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="paginatoin-area">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 pt-xs-15">
                                                <p>Showing 1-9 of 9 item(s)</p>
                                            </div>
                                            <div class="col-lg-6 col-md-6">

                                                <div class="pagination-sec">
                                                    <span><?php echo $links; ?></span>
                                                </div>
                                                <!-- <ul class="pagination-box pt-xs-20 pb-xs-15">
                                                    <li><a href="#" class="Previous"><i class="fa fa-chevron-left"></i> Previous</a>
                                                    </li>
                                                    <li class="active"></li>
                                                   
                                                    <li>
                                                      <a href="#" class="Next"> Next <i class="fa fa-chevron-right"></i></a>
                                                    </li>
                                                </ul> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- shop-products-wrapper end -->
                        </div>
                        <div class="col-lg-3 order-2 order-lg-1">
                            <!--sidebar-categores-box start  -->
                            <div class="sidebar-categores-box mt-sm-30 mt-xs-30">
                                <div class="sidebar-title">
                                    <h2>Sub Categories</h2>
                                </div>
                                <!-- category-sub-menu start -->
                                <div class="category-sub-menu">
                                    <ul>
                                      <!-- load sub categories    -->
                                        <?php 
                                            foreach($selectedcategory as $selectedcategories){
                                                 $categoryids = $selectedcategories;
                                             
                                             $subcategories = $this->Shop_Model->getSubcategoryLeft($categoryids);  
                                             $data['subcategories'] = $subcategories; 
                                            } 
                                        ?>     
                                     <!-- load sub categories    -->   
                                   
                                     
                                        <li class="has-sub"><a href="#">Click To Expand</a>
                                            <ul>
                                                <?php foreach($subcategories as $subcategory){?>
                                                    <li class="subcat"><a href="<?php echo base_url(); ?>ShopController/ProductFilter/<?php echo $subcategory['categoryid']; ?>"><?php echo $subcategory['categoryname']; ?><i class="fa fa-angle-right pull-right"></i></a></li>
                                                <?php } ?>                                              
                                            </ul>
                                        </li>
                                     
                                    </ul>
                                </div>
                                <!-- category-sub-menu end -->
                            </div>
                            <!--sidebar-categores-box end  -->
                            <!--sidebar-categores-box start  -->
                            <div class="sidebar-categores-box">
                                <div class="sidebar-title">
                                    <h2>Filter By</h2>
                                </div>
                                <!-- btn-clear-all start -->
                                <?php 
                                    foreach($selectedcategory as $selectedcategories){
                                         $categoryids = $selectedcategories;
                                    }
                                ?>    
                                <button class="btn-clear-all mb-sm-30 mb-xs-30" onclick="clearfilter(<?php echo $categoryids ?>)">Clear all</button>
                                <!-- btn-clear-all end -->
                                <!-- filter-sub-area start -->
                                <?php 
                                $attribute_pro_fil=0;
                                foreach($productsubattributes as $productsubattribute){
                                    $attribute_pro_fil  .= $productsubattribute['attributes'].',0';
                                }
                                $baseattributes = $this->Shop_Model->getFilterBaseAttributes($attribute_pro_fil);  
                                $data['baseattributes'] = $baseattributes; 
                                foreach($baseattributes as $attribute){  ?>
                                   
                                <div class="filter-sub-area">
                                    <h5 class="filter-sub-titel"><?php echo $attribute['attribute_name']; ?></h5>
                                    <div class="categori-checkbox">
                                        <form action="#">
                                            <ul>
                                               
                                            <?php 
                                              foreach($selectedcategory as $selectedcategories){
                                                  $categoryids = $selectedcategories;
                                              }
                                               $attribute_pro_fil = 0;
                                               foreach($productsubattributes as $productsubattribute){
                                                    $attribute_pro_fil  .= $productsubattribute['attributes'].',0';
                                               }
                                               $attributeid = $attribute['id'];
                                               $subattributes = $this->Shop_Model->getFilterSubattributes($attributeid,$attribute_pro_fil);  
                                               $data['subattributes'] = $subattributes; 
                                               
                                               foreach($subattributes as $subattribute){ ?>
                                                <li><input id="attr<?php echo $subattribute['sub_attr_id']; ?>" onclick="leftfilterproduct(<?php echo $subattribute['sub_attr_id']; ?>,<?php echo $categoryids ?>)" type="checkbox" name="product-categori"><a href="#"><?php echo $subattribute['sub_attribute_name']; ?></a></li>                                                
                                                <?php  }   ?>

                                                <?php 
                                                   ?>
                                            
                                          
                                             
                                               
                                            </ul>
                                        </form>
                                    </div>
                                 </div>

                                <?php } ?>
                              
                            </div>
                            <!--sidebar-categores-box end  -->
                            <!-- category-sub-menu start -->

                             <!-- load sub categories    -->
                                        <?php 
                                            foreach($selectedcategory as $selectedcategories){
                                                 $categoryids = $selectedcategories;


                                                //  print_r(json_encode($productsubattributes));
                                            
                                             
                                             $subcategories = $this->Shop_Model->getSubcategoryLeft($categoryids);  
                                             $data['subcategories'] = $subcategories; 
                                            } 
                                        ?>     
                                     <!-- load sub categories    -->   
                                   
                                     
                                       
                            <div class="sidebar-categores-box mb-sm-0 mb-xs-0">
                                <div class="sidebar-title">
                                    <h2>Related Categories</h2>
                                </div>
                                <div class="category-tags">
                                    <ul>                                    
                                    <?php foreach($subcategories as $subcategory){?>
                                            <li class=""><a href="<?php echo base_url(); ?>ShopController/ProductFilter/<?php echo $subcategory['categoryid']; ?>"><?php echo $subcategory['categoryname']; ?></a></li>
                                    <?php } ?> 
                                    </ul>
                                </div>
                                <!-- category-sub-menu end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content Wraper Area End Here -->
            <!-- Begin Footer Area -->
          
            <div class="modal fade modal-wrapper" id="exampleModalCenter" >


<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

            <div id="quickviewresult"></div>
            
        </div>
    </div>
</div>
</div>   

            <?php include_once('shop_footer_user.php') ?>
            

        