
    <?php 
        if (empty($this->id)) {
            include_once('shop_head.php');
        }
        else{
            include('shop_head_user.php');
        }
    ?>

            <!-- Header Area End Here -->
            <!-- Begin Slider With Category Menu Area -->
            <div class="slider-with-banner">
                <div class="container">
                    <div class="">

                        <!-- Begin Category Menu Area -->
                       
                        <!-- Category Menu Area End Here -->
                        <!-- Begin Slider Area -->
                        <div id="demo" class="carousel slide" data-ride="carousel">

                                <!-- Indicators -->
                                <ul class="carousel-indicators">
                                <?php  foreach($banner as $banners){ ?>
                                <li data-target="#demo" data-slide-to="0" class="active"></li>
                                <?php } ?>
                                <?php foreach($banner2 as $banners){ ?>
                                <li data-target="#demo" data-slide-to="1"></li>
                                <?php } ?>
                                </ul>
                                <!-- The slideshow -->
                                
                                <div class="carousel-inner">
                                <?php foreach($banner as $banners){ ?>
                                    <div class="carousel-item active">
                                        <a href="<?php echo base_url(); ?><?php echo $banners['link']; ?>"> 
                                        <img src="<?php echo base_url() ?>admin/uploads/<?php echo $banners['banner_img']; ?>" alt="product image" class="img-fluid">
                                        </a>
                                    </div>
                                <?php } ?>
                                <?php foreach($banner2 as $banners){ ?>
                                <div class="carousel-item">
                                <a href="<?php echo base_url(); ?><?php echo $banners['link']; ?>"> 
                                        <img src="<?php echo base_url() ?>admin/uploads/<?php echo $banners['banner_img']; ?>" alt="product image" class="img-fluid">
                                    </a>
                                </div>
                                <?php } ?>
                                </div>

                                <!-- Left and right controls -->
                                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                <div class="previc">
                                <span class="carousel-control-prev-icon"></span>
                                </div>
                                </a>
                                <a class="carousel-control-next" href="#demo" data-slide="next">
                                <div class="nextic">
                                <span class="carousel-control-next-icon"></span>
                                </div> 
                                </a>
                                </div>
                        <!-- Slider Area End Here -->
                    </div>
                </div>
            </div>
            
            <section class="product-area li-laptop-product Special-product pt-25 pb-0">
                <div class="container">
                    <div class="row">
                        <!-- Begin Li's Section Area -->
                        <div class="col-lg-12">                          



                            <section class="product-area li-laptop-product li-laptop-product-2 pb-45" >
                                <div id="hdeal">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="li-section-title">
                                                <h2>
                                                    <span>Hot Deals Products <span id="time"></span></span>
                                                </h2>

                                                <?php foreach($endtimer as $endtime){  ?>
                                                     <?php  $time = $endtime['end_time'];   $time = strtotime($endtime['end_time']); $dealtimerend =  date("m d Y", $time);?>
                                                <?php  } ?>    

                                                
                                                <script>
                                                    $(function(){
                                                        var calcNewYear = setInterval(function(){
                                                            date_future = new Date(new Date("<?php echo $dealtimerend ?>"));
                                                            // alert(date_future);
                                                            date_now = new Date();

                                                            seconds = Math.floor((date_future - (date_now))/1000);
                                                            minutes = Math.floor(seconds/60);
                                                            hours = Math.floor(minutes/60);
                                                            days = Math.floor(hours/24);
                                                            if(days<=0 && hours<=0 && minutes<=0 && seconds<=0){
                                                                $('#hdeal').hide();
                                                            }
                                                            
                                                            hours = hours-(days*24);
                                                            minutes = minutes-(days*24*60)-(hours*60);
                                                            seconds = seconds-(days*24*60*60)-(hours*60*60)-(minutes*60);

                                                            $("#time").text("Days : " + days + " Hours: " + hours + " Minutes: " + minutes + " Seconds: " + seconds);
                                                        },1000);
                                                    });
                                                </script>
                                                <ul class="li-sub-category-list">
                                                <!-- <li class="active "><a  href="<?php echo base_url() ?>ShopController/ProductFilter/1"><span class="btn-view-all">View All</span></a></li>                                    -->
                                                </ul>
                                            </div>
                                        
                                            <div class="row">
                                                <div class="product-active owl-carousel">

                                                <?php foreach($deals as  $deal) { ?>
                                                    <div class="col-lg-12">
                                                        <!-- single-product-wrap start -->
                                                        <div class="single-product-wrap single-product-wrap2">
                                                            <div class="aspect-ratio aspect-ratio-1-1 img-frame">
                                                                <a href="<?php echo base_url();?>ShopController/ProductSingle/<?php echo $deal['product_id']; ?>" target="_blank">
                                                                    <img src="<?php echo base_url();?>uploads/<?php echo $deal['image']; ?>" alt=" Product Image" class="fit-img">
                                                                </a>
                                                                <span class="sticker"><?php echo $deal['prostatus']; ?></span>
                                                                <?php if($deal['bidding_avail']=='on'){ ?>
                                                                    <span class="sticker2"><i class="fa fa-gavel"></i> Bidding</span>
                                                                <?php } ?>

                                                                <?php  if($deal['status']==0){ ?>
                                                            <span class="uavail-badge d-block mx-auto">Temporarily Unavailable</span>
                                                            <?php } ?>
                                                            <?php  if($deal['stock']==0){ ?>
                                                            <span class="outvail-badge d-block mx-auto">Out Of Stock</span>
                                                            <?php } ?>
                                                            </div>
                                                            <div class="product_desc">
                                                                <div class="product_desc_info">
                                                                    <div class="product-review">
                                                                        <h5 class="manufacturer">
                                                                            <a href="<?php echo base_url();?>ShopController/SellerSingle/<?php echo $deal['id']; ?>" target="_blank"><?php echo $deal['companyname']; ?></a>
                                                                        </h5>
                                                                        <div class="rating-box">
                                                                            <!-- call rating starts                                                         -->
                                                                            <?php
                                                                            $productid = $deal['product_id'];
                                                                            $rating = $this->Shop_Model->getRating($productid); 
                                                                            include('includes/rating_sec.php');
                                                                            ?>   
                                                                            <!-- call rating ends here -->
                                                                        </div>
                                                                    </div>
                                                                    <h4><a class="product_name" href="<?php echo base_url();?>ShopController/ProductSingle/<?php echo $deal['product_id']; ?>" target="_blank"><?php echo substr($deal['product_name'], 0, 25) ?></a></h4>
                                                                    <div class="price-box">
                                                                        <span class="new-price"><i class="fa fa-rupee"></i> <?php echo $deal['original_rate']; ?></span>
                                                                        <span class="old-price"><i class="fa fa-rupee"></i><?php echo $deal['original_rate']; ?></span>

                                                                        <?php 
                                                                        $originalprice = $deal['original_rate']; 
                                                                        $sellingprice =  $deal['selling_rate'];                                                      
                                                                        $pricedecrease = $originalprice -  $sellingprice;
                                                                        $pricediff = $pricedecrease / $originalprice * 100
                                                                        ?>
                                                                        <span class="discount-percentage"><?php echo round($pricediff) ?> % Offer</span>
                                                                    </div>
                                                                    <!-- timer logic starts here  -->
                                                                    <?php                                                    
                                                                        $dealendtime = $deal['end_time'];
                                                                    ?>
                                                                    
                                                                    <div class="countersection">
                                                                        <div class="li-countdowns">                                                       
                                                                            
                                                                        </div>
                                                                    </div>


                                                                
                                                                </div>
                                                                <div class="add-actions">
                                                                <?php  if (empty($this->id)) { ?>
                                                                    <ul class="add-actions-link">
                                                                        <li class="add-cart active pointer-cursor" onclick="notsigninswal()">Add to cart</li>
                                                                        <li onclick="notsigninswal()"><a class="links-details"><i class="fa fa-heart-o"></i></a></li>
                                                                        <li onclick="quickview(<?php echo $deal['product_id']; ?>)"><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>                                                        
                                                                    </ul>
                                                                <?php } else{ ?>    
                                                                    <ul class="add-actions-link">
                                                                        <?php if($deal['status']==1 && $deal['stock']>=1){ ?>
                                                                            <li class="add-cart active pointer-cursor" onclick="addtocart(<?php echo $deal['product_id']; ?>,<?php echo $deal['selling_rate']; ?>,<?php echo $deal['shipping_charge']; ?>)">Add to cart</li>
                                                                        <?php } ?>                                                                        
                                                                        <li onclick="addtowishlist(<?php echo $deal['product_id']; ?>)"><a><i class="fa fa-heart-o"></i></a></li>
                                                                        <li onclick="quickview(<?php echo $deal['product_id']; ?>)"><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>                                                        
                                                                    </ul>
                                                                <?php } ?> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- single-product-wrap end -->
                                                    </div>
                                                <?php } ?>   
                                                
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Li's Section Area End Here -->
                                    </div>
                                </div>
                            </section>                          
                          
                        </div>
                        <!-- Li's Section Area End Here -->
                    </div>
                </div>
            </section>

            <section>
                <div class="container">
                    <div class="offer-tube">
                        Delivery All Over India
                    </div>
                </div>
            </section>                                                        

            <section class="product-area li-laptop-product li-laptop-product-2 pb-0">
                <div class="container">
                    <!-- Slider With Category Menu Area End Here -->
                    <!-- Begin Li's Static Banner Area -->
                    <div class="li-static-banner pt-20 pt-sm-30 pt-xs-30">
                        <div class="container">
                            <div class="row">
                                <!-- Begin Single Banner Area  -->
                                <div class="col-lg-4 col-md-4">
                                    <div class="single-banner pb-xs-30">
                                        <a href="<?php echo base_url(); ?>ShopController/ProductFilter/107">
                                            <img src="<?php echo base_url(); ?>images/banner/coolers.jpg" alt="offer Banner">
                                        </a>
                                    </div>
                                </div> 
                                <!-- Single Banner Area End Here -->
                                <!-- Begin Single Banner Area -->
                                <div class="col-lg-4 col-md-4">
                                    <div class="single-banner pb-xs-30">
                                        <a href="<?php echo base_url(); ?>ShopController/ProductFilter/124">
                                            <img src="<?php echo base_url(); ?>images/banner/mengrooming.jpg" alt="offer Banner">
                                        </a>
                                    </div>
                                </div> 
                                <!-- Single Banner Area End Here -->
                                <!-- Begin Single Banner Area -->
                                <div class="col-lg-4 col-md-4">
                                    <div class="single-banner">
                                        <a href="<?php echo base_url(); ?>ShopController/ProductFilter/130">
                                            <img src="<?php echo base_url(); ?>images/banner/menclothing.jpg" alt="offer Banner">
                                        </a>
                                    </div>
                                </div> 
                                <!-- Single Banner Area End Here -->
                            </div>
                        </div>
                    </div>
                    <!-- Li's Static Banner Area End Here -->
                    <!-- Begin Li's Special Product Area -->
                    <br>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>TV & Appliances</span>
                                </h2>
                                <ul class="li-sub-category-list">
                                <li class="active "><a  href="<?php echo base_url() ?>ShopController/ProductFilter/68/TV and Appliances"><span class="btn-view-all">View All</span></a></li>                                   
                                </ul>
                            </div>
                         
                            <div class="row">
                                <div class="product-active owl-carousel">

                                <?php
                                $cathome = $this->Shop_Model->getCategoryHome(68);  
                                foreach($cathome as $cathomes){ ?>
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <div class="single-category-wrap">
                                            <div class="aspect-ratio aspect-ratio-1-1 img-frame">
                                                <a href="<?php echo base_url();?>ShopController/ProductFilter/<?php echo $cathomes['categoryid']; ?>" target="_blank">
                                                    <img src="<?php echo base_url();?>admin/uploads/<?php echo $cathomes['cat_image']; ?>" alt="Category Image" class="fit-img">
                                                </a>
                                                <!-- <span class="sticker">25%</span>                                                -->
                                            </div>   
                                            <h2><?php echo $cathomes['categoryname']; ?></h2>     
                                            <p>Popular Brands</p>                                   
                                        </div>
                                        <!-- single-product-wrap end -->
                                    </div>
                                <?php } ?>   
                                  
                                </div>
                            </div>
                        </div>
                    </div>          
                    
                </div>
            </section>

              <!-- food essentials-->
              <section class="product-area li-laptop-product li-laptop-product-2 pb-0">
                <div class="container">
                    <!-- Slider With Category Menu Area End Here -->
                    <!-- Begin Li's Static Banner Area -->
                   
                    <!-- Li's Static Banner Area End Here -->
                    <!-- Begin Li's Special Product Area -->
                    <br>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>Food Essentials</span>
                                </h2>
                                <ul class="li-sub-category-list">
                                <li class="active "><a  href="<?php echo base_url() ?>ShopController/ProductFilter/459/Food Essentials"><span class="btn-view-all">View All</span></a></li>                                   
                                </ul>
                            </div>
                         
                            <div class="row">
                                <div class="product-active owl-carousel">

                                <?php
                                $cathome = $this->Shop_Model->getCategoryHome(459);  
                                foreach($cathome as $cathomes){ ?>
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <div class="single-category-wrap">
                                            <div class="aspect-ratio aspect-ratio-1-1 img-frame">
                                                <a href="<?php echo base_url();?>ShopController/ProductFilter/<?php echo $cathomes['categoryid']; ?>" target="_blank">
                                                    <img src="<?php echo base_url();?>admin/uploads/<?php echo $cathomes['cat_image']; ?>" alt="Category Image" class="fit-img">
                                                </a>
                                                <!-- <span class="sticker">25%</span>                                                -->
                                            </div>   
                                            <h2><?php echo $cathomes['categoryname']; ?></h2>     
                                            <p>Popular Brands</p>                                   
                                        </div>
                                        <!-- single-product-wrap end -->
                                    </div>
                                <?php } ?>   
                                  
                                </div>
                            </div>
                        </div>
                    </div>          
                    
                </div>
            </section>


             <!-- Health and nutition-->
             <section class="product-area li-laptop-product li-laptop-product-2 pb-0">
                <div class="container">
                    <!-- Slider With Category Menu Area End Here -->
                    <!-- Begin Li's Static Banner Area -->
                   
                    <!-- Li's Static Banner Area End Here -->
                    <!-- Begin Li's Special Product Area -->
                    <br>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>Health & Nutrition</span>
                                </h2>
                                <ul class="li-sub-category-list">
                                <li class="active "><a  href="<?php echo base_url() ?>ShopController/ProductFilter/470/Food Essentials"><span class="btn-view-all">View All</span></a></li>                                   
                                </ul>
                            </div>
                         
                            <div class="row">
                                <div class="product-active owl-carousel">

                                <?php
                                $cathome = $this->Shop_Model->getCategoryHome(469);  
                                foreach($cathome as $cathomes){ ?>
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <div class="single-category-wrap">
                                            <div class="aspect-ratio aspect-ratio-1-1 img-frame">
                                                <a href="<?php echo base_url();?>ShopController/ProductFilter/<?php echo $cathomes['categoryid']; ?>" target="_blank">
                                                    <img src="<?php echo base_url();?>admin/uploads/<?php echo $cathomes['cat_image']; ?>" alt="Category Image" class="fit-img">
                                                </a>
                                                <!-- <span class="sticker">25%</span>                                                -->
                                            </div>   
                                            <h2><?php echo $cathomes['categoryname']; ?></h2>     
                                            <p>Popular Brands</p>                                   
                                        </div>
                                        <!-- single-product-wrap end -->
                                    </div>
                                <?php } ?>   
                                  
                                </div>
                            </div>
                        </div>
                    </div>          
                    
                </div>
            </section>


              <!-- Books-->
              <section class="product-area li-laptop-product li-laptop-product-2 pb-0">
                <div class="container">
                    <!-- Slider With Category Menu Area End Here -->
                    <!-- Begin Li's Static Banner Area -->
                   
                    <!-- Li's Static Banner Area End Here -->
                    <!-- Begin Li's Special Product Area -->
                    <br>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>Books</span>
                                </h2>
                                <ul class="li-sub-category-list">
                                <li class="active "><a  href="<?php echo base_url() ?>ShopController/ProductFilter/478/Books"><span class="btn-view-all">View All</span></a></li>                                   
                                </ul>
                            </div>
                         
                            <div class="row">
                                <div class="product-active owl-carousel">

                                <?php
                                $cathome = $this->Shop_Model->getCategoryHome(478);  
                                foreach($cathome as $cathomes){ ?>
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <div class="single-category-wrap">
                                            <div class="aspect-ratio aspect-ratio-1-1 img-frame">
                                                <a href="<?php echo base_url();?>ShopController/ProductFilter/<?php echo $cathomes['categoryid']; ?>" target="_blank">
                                                    <img src="<?php echo base_url();?>admin/uploads/<?php echo $cathomes['cat_image']; ?>" alt="Category Image" class="fit-img">
                                                </a>
                                                <!-- <span class="sticker">25%</span>                                                -->
                                            </div>   
                                            <h2><?php echo $cathomes['categoryname']; ?></h2>     
                                            <p>Popular Brands</p>                                   
                                        </div>
                                        <!-- single-product-wrap end -->
                                    </div>
                                <?php } ?>   
                                  
                                </div>
                            </div>
                        </div>
                    </div>          
                    
                </div>
            </section>


           
           


            <!-- mobile and accessories -->
            <section class="product-area li-laptop-product li-laptop-product-2 pb-0">
                <div class="container">
                    <!-- Slider With Category Menu Area End Here -->
                    <!-- Begin Li's Static Banner Area -->
                   
                    <!-- Li's Static Banner Area End Here -->
                    <!-- Begin Li's Special Product Area -->
                    <br>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>Mobile & Accessories</span>
                                </h2>
                                <ul class="li-sub-category-list">
                                <li class="active "><a  href="<?php echo base_url() ?>ShopController/ProductFilter/23/Mobile and accessories"><span class="btn-view-all">View All</span></a></li>                                   
                                </ul>
                            </div>
                         
                            <div class="row">
                                <div class="product-active owl-carousel">

                                <?php
                                $cathome = $this->Shop_Model->getCategoryHome(21);  
                                foreach($cathome as $cathomes){ ?>
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <div class="single-category-wrap">
                                            <div class="aspect-ratio aspect-ratio-1-1 img-frame">
                                                <a href="<?php echo base_url();?>ShopController/ProductFilter/<?php echo $cathomes['categoryid']; ?>" target="_blank">
                                                    <img src="<?php echo base_url();?>admin/uploads/<?php echo $cathomes['cat_image']; ?>" alt="Category Image" class="fit-img">
                                                </a>
                                                <!-- <span class="sticker">25%</span>                                                -->
                                            </div>   
                                            <h2><?php echo $cathomes['categoryname']; ?></h2>     
                                            <p>Popular Brands</p>                                   
                                        </div>
                                        <!-- single-product-wrap end -->
                                    </div>
                                <?php } ?>   
                                  
                                </div>
                            </div>
                        </div>
                    </div>          
                    
                </div>
            </section>


            

            <!-- computer and accessories -->
            <section class="product-area li-laptop-product li-laptop-product-2 pb-0">
                <div class="container">
                    <!-- Slider With Category Menu Area End Here -->
                    <!-- Begin Li's Static Banner Area -->
                    <div class="li-static-banner pt-20 pt-sm-30 pt-xs-30">
                        <div class="container">
                            <div class="row">
                                <!-- Begin Single Banner Area  -->
                                <div class="col-lg-4 col-md-4">
                                    <div class="single-banner pb-xs-30">
                                        <a href="<?php echo base_url(); ?>ShopController/ProductFilter/239">
                                            <img src="<?php echo base_url(); ?>images/banner/womenwatches.jpg" alt="offer Banner">
                                        </a>
                                    </div>
                                </div> 
                                <div class="col-lg-4 col-md-4">
                                    <div class="single-banner pb-xs-30">
                                        <a href="<?php echo base_url(); ?>ShopController/ProductFilter/212">
                                            <img src="<?php echo base_url(); ?>images/banner/sarees.jpg" alt="offer Banner">
                                        </a>
                                    </div>
                                </div> 
                               
                                <div class="col-lg-4 col-md-4">
                                    <div class="single-banner">
                                        <a href="<?php echo base_url(); ?>ShopController/ProductFilter/53">
                                            <img src="<?php echo base_url(); ?>images/banner/speakers.jpg" alt="offer Banner">
                                        </a>
                                    </div>
                                </div> 
                                <!-- Single Banner Area End Here -->
                            </div>
                        </div>
                    </div>
                    
                  
                    
                    <!-- Li's Static Banner Area End Here -->
                    <!-- Begin Li's Special Product Area -->
                    <br>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>Computer Accessories</span>
                                </h2>
                                <ul class="li-sub-category-list">
                                <li class="active "><a  href="<?php echo base_url() ?>ShopController/ProductFilter/37/Computer accessories"><span class="btn-view-all">View All</span></a></li>                                   
                                </ul>
                            </div>
                         
                            <div class="row">
                                <div class="product-active owl-carousel">

                                <?php
                                $cathome = $this->Shop_Model->getCategoryHome(37);  
                                foreach($cathome as $cathomes){ ?>
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <div class="single-category-wrap">
                                            <div class="aspect-ratio aspect-ratio-1-1 img-frame">
                                                <a href="<?php echo base_url();?>ShopController/ProductFilter/<?php echo $cathomes['categoryid']; ?>" target="_blank">
                                                    <img src="<?php echo base_url();?>admin/uploads/<?php echo $cathomes['cat_image']; ?>" alt="Category Image" class="fit-img">
                                                </a>
                                                <!-- <span class="sticker">25%</span>                                                -->
                                            </div>   
                                            <h2><?php echo $cathomes['categoryname']; ?></h2>     
                                            <p>Popular Brands</p>                                   
                                        </div>
                                        <!-- single-product-wrap end -->
                                    </div>
                                <?php } ?>   
                                  
                                </div>
                            </div>
                        </div>
                    </div>          
                    
                </div>
            </section>



             <!-- camera and and accessories -->
             <section class="product-area li-laptop-product li-laptop-product-2 pb-0">
                <div class="container">
              
                    <br>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>Camera & Accessories</span>
                                </h2>
                                <ul class="li-sub-category-list">
                                <li class="active "><a  href="<?php echo base_url() ?>ShopController/ProductFilter/63/Camera and accessories"><span class="btn-view-all">View All</span></a></li>                                   
                                </ul>
                            </div>
                         
                            <div class="row">
                                <div class="product-active owl-carousel">

                                <?php
                                $cathome = $this->Shop_Model->getCategoryHome(array(59,63));  
                                foreach($cathome as $cathomes){ ?>
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <div class="single-category-wrap">
                                            <div class="aspect-ratio aspect-ratio-1-1 img-frame">
                                                <a href="<?php echo base_url();?>ShopController/ProductFilter/<?php echo $cathomes['categoryid']; ?>" target="_blank">
                                                    <img src="<?php echo base_url();?>admin/uploads/<?php echo $cathomes['cat_image']; ?>" alt="Category Image" class="fit-img">
                                                </a>
                                                <!-- <span class="sticker">25%</span>                                                -->
                                            </div>   
                                            <h2><?php echo $cathomes['categoryname']; ?></h2>     
                                            <p>Popular Brands</p>                                   
                                        </div>
                                        <!-- single-product-wrap end -->
                                    </div>
                                <?php } ?>   
                                  
                                </div>
                            </div>
                        </div>
                    </div>          
                    
                </div>
            </section>
            

            <!-- refrigerators -->
            <section class="product-area li-laptop-product li-laptop-product-2 pb-0">
                <div class="container">
                    <!-- Slider With Category Menu Area End Here -->
                    <!-- Begin Li's Static Banner Area -->
                    <div class="li-static-banner pt-20 pt-sm-30 pt-xs-30">
                        <div class="container">
                            <div class="row">
                                <!-- Begin Single Banner Area  -->
                                <div class="col-lg-4 col-md-4">
                                    <div class="single-banner pb-xs-30">
                                        <a href="<?php echo base_url(); ?>ShopController/ProductFilter/44">
                                            <img src="<?php echo base_url(); ?>images/banner/printers.jpg" alt="offer Banner">
                                        </a>
                                    </div>
                                </div> 
                                <!-- Single Banner Area End Here -->
                                <!-- Begin Single Banner Area -->
                                <div class="col-lg-4 col-md-4">
                                    <div class="single-banner pb-xs-30">
                                        <a href="<?php echo base_url(); ?>ShopController/ProductFilter/87">
                                            <img src="<?php echo base_url(); ?>images/banner/smartwatches.jpg" alt="offer Banner">
                                        </a>
                                    </div>
                                </div> 
                                <!-- Single Banner Area End Here -->
                                <!-- Begin Single Banner Area -->
                                <div class="col-lg-4 col-md-4">
                                    <div class="single-banner">
                                        <a href="<?php echo base_url(); ?>ShopController/ProductFilter/51">
                                            <img src="<?php echo base_url(); ?>images/banner/gaming.jpg" alt="offer Banner">
                                        </a>
                                    </div>
                                </div> 
                                <!-- Single Banner Area End Here -->
                            </div>
                        </div>
                    </div>
                    <!-- Li's Static Banner Area End Here -->
                    <!-- Begin Li's Special Product Area -->
                    <br>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>Refrigerators</span>
                                </h2>
                                <ul class="li-sub-category-list">
                                <li class="active "><a  href="<?php echo base_url() ?>ShopController/ProductFilter/81/Refrigerators"><span class="btn-view-all">View All</span></a></li>                                   
                                </ul>
                            </div>
                         
                            <div class="row">
                                <div class="product-active owl-carousel">

                                <?php
                                $cathome = $this->Shop_Model->getCategoryHome(81);  
                                foreach($cathome as $cathomes){ ?>
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <div class="single-category-wrap">
                                            <div class="aspect-ratio aspect-ratio-1-1 img-frame">
                                                <a href="<?php echo base_url();?>ShopController/ProductFilter/<?php echo $cathomes['categoryid']; ?>" target="_blank">
                                                    <img src="<?php echo base_url();?>admin/uploads/<?php echo $cathomes['cat_image']; ?>" alt="Category Image" class="fit-img">
                                                </a>
                                                <!-- <span class="sticker">25%</span>                                                -->
                                            </div>   
                                            <h2><?php echo $cathomes['categoryname']; ?></h2>     
                                            <p>Popular Brands</p>                                   
                                        </div>
                                        <!-- single-product-wrap end -->
                                    </div>
                                <?php } ?>   
                                  
                                </div>
                            </div>
                        </div>
                    </div>          
                    
                </div>
            </section>

            
              <!-- Exercise & Fitness-->
              <section class="product-area li-laptop-product li-laptop-product-2 pb-0">
                <div class="container">
                    <!-- Slider With Category Menu Area End Here -->
                    <!-- Begin Li's Static Banner Area -->
                   
                    <!-- Li's Static Banner Area End Here -->
                    <!-- Begin Li's Special Product Area -->
                    <br>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>Exercise & Fitness</span>
                                </h2>
                                <ul class="li-sub-category-list">
                                <li class="active "><a  href="<?php echo base_url() ?>ShopController/ProductFilter/450/Food Essentials"><span class="btn-view-all">View All</span></a></li>                                   
                                </ul>
                            </div>
                         
                            <div class="row">
                                <div class="product-active owl-carousel">

                                <?php
                                $cathome = $this->Shop_Model->getCategoryHome(450);  
                                foreach($cathome as $cathomes){ ?>
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <div class="single-category-wrap">
                                            <div class="aspect-ratio aspect-ratio-1-1 img-frame">
                                                <a href="<?php echo base_url();?>ShopController/ProductFilter/<?php echo $cathomes['categoryid']; ?>" target="_blank">
                                                    <img src="<?php echo base_url();?>admin/uploads/<?php echo $cathomes['cat_image']; ?>" alt="Category Image" class="fit-img">
                                                </a>
                                                <!-- <span class="sticker">25%</span>                                                -->
                                            </div>   
                                            <h2><?php echo $cathomes['categoryname']; ?></h2>     
                                            <p>Popular Brands</p>                                   
                                        </div>
                                        <!-- single-product-wrap end -->
                                    </div>
                                <?php } ?>   
                                  
                                </div>
                            </div>
                        </div>
                    </div>          
                    
                </div>
            </section>


              <!-- Stationary-->
              <section class="product-area li-laptop-product li-laptop-product-2 pb-0">
                <div class="container">
                    <!-- Slider With Category Menu Area End Here -->
                    <!-- Begin Li's Static Banner Area -->
                   
                    <!-- Li's Static Banner Area End Here -->
                    <!-- Begin Li's Special Product Area -->
                    <br>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>Stationary</span>
                                </h2>
                                <ul class="li-sub-category-list">
                                <li class="active "><a  href="<?php echo base_url() ?>ShopController/ProductFilter/489/Food Essentials"><span class="btn-view-all">View All</span></a></li>                                   
                                </ul>
                            </div>
                         
                            <div class="row">
                                <div class="product-active owl-carousel">

                                <?php
                                $cathome = $this->Shop_Model->getCategoryHome(489);  
                                foreach($cathome as $cathomes){ ?>
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <div class="single-category-wrap">
                                            <div class="aspect-ratio aspect-ratio-1-1 img-frame">
                                                <a href="<?php echo base_url();?>ShopController/ProductFilter/<?php echo $cathomes['categoryid']; ?>" target="_blank">
                                                    <img src="<?php echo base_url();?>admin/uploads/<?php echo $cathomes['cat_image']; ?>" alt="Category Image" class="fit-img">
                                                </a>
                                                <!-- <span class="sticker">25%</span>                                                -->
                                            </div>   
                                            <h2><?php echo $cathomes['categoryname']; ?></h2>     
                                            <p>Popular Brands</p>                                   
                                        </div>
                                        <!-- single-product-wrap end -->
                                    </div>
                                <?php } ?>   
                                  
                                </div>
                            </div>
                        </div>
                    </div>          
                    
                </div>
            </section>


            


            <!-- kitchen Appliances -->
            <section class="product-area li-laptop-product li-laptop-product-2 pb-0">
                <div class="container">
                    <!-- Slider With Category Menu Area End Here -->
                    <!-- Begin Li's Static Banner Area -->
                  
                    <!-- Li's Static Banner Area End Here -->
                    <!-- Begin Li's Special Product Area -->
                    <br>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>Kitchen Appliances</span>
                                </h2>
                                <ul class="li-sub-category-list">
                                <li class="active "><a  href="<?php echo base_url() ?>ShopController/ProductFilter/87/Kitchen Appliances"><span class="btn-view-all">View All</span></a></li>                                   
                                </ul>
                            </div>
                         
                            <div class="row">
                                <div class="product-active owl-carousel">

                                <?php
                                $cathome = $this->Shop_Model->getCategoryHome(87);  
                                foreach($cathome as $cathomes){ ?>
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <div class="single-category-wrap">
                                            <div class="aspect-ratio aspect-ratio-1-1 img-frame">
                                                <a href="<?php echo base_url();?>ShopController/ProductFilter/<?php echo $cathomes['categoryid']; ?>" target="_blank">
                                                    <img src="<?php echo base_url();?>admin/uploads/<?php echo $cathomes['cat_image']; ?>" alt="Category Image" class="fit-img">
                                                </a>
                                                <!-- <span class="sticker">25%</span>                                                -->
                                            </div>   
                                            <h2><?php echo $cathomes['categoryname']; ?></h2>     
                                            <p>Popular Brands</p>                                   
                                        </div>
                                        <!-- single-product-wrap end -->
                                    </div>
                                <?php } ?>   
                                  
                                </div>
                            </div>
                        </div>
                    </div>          
                    
                </div>
            </section>

             <!-- Small Home Appliances -->
             <section class="product-area li-laptop-product li-laptop-product-2 pb-0">
                <div class="container">
                    <!-- Slider With Category Menu Area End Here -->
                    <!-- Begin Li's Static Banner Area -->
                    <div class="li-static-banner pt-20 pt-sm-30 pt-xs-30">
                        <div class="container">
                            <div class="row">
                                <!-- Begin Single Banner Area  -->
                                <div class="col-lg-4 col-md-4">
                                    <div class="single-banner pb-xs-30">
                                        <a href="<?php echo base_url(); ?>ShopController/ProductFilter/296">
                                            <img src="<?php echo base_url(); ?>images/banner/kidsshoes.jpg" alt="offer Banner">
                                        </a>
                                    </div>
                                </div> 
                                <!-- Single Banner Area End Here -->
                                <!-- Begin Single Banner Area -->
                                <div class="col-lg-4 col-md-4">
                                    <div class="single-banner pb-xs-30">
                                        <a href="<?php echo base_url(); ?>ShopController/ProductFilter/261">
                                            <img src="<?php echo base_url(); ?>images/banner/ladieswallets.jpg" alt="offer Banner">
                                        </a>
                                    </div>
                                </div> 
                                <!-- Single Banner Area End Here -->
                                <!-- Begin Single Banner Area -->
                                <div class="col-lg-4 col-md-4">
                                    <div class="single-banner">
                                        <a href="<?php echo base_url(); ?>ShopController/ProductFilter/255">
                                            <img src="<?php echo base_url(); ?>images/banner/womenbags.jpg" alt="offer Banner">
                                        </a>
                                    </div>
                                </div> 
                                <!-- Single Banner Area End Here -->
                            </div>
                        </div>
                    </div>
                    <!-- Li's Static Banner Area End Here -->
                    <!-- Begin Li's Special Product Area -->
                    <br>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>Small Home Appliances</span>
                                </h2>
                                <ul class="li-sub-category-list">
                                <li class="active "><a  href="<?php echo base_url() ?>ShopController/ProductFilter/103/Small Home Appliances"><span class="btn-view-all">View All</span></a></li>                                   
                                </ul>
                            </div>
                         
                            <div class="row">
                                <div class="product-active owl-carousel">

                                <?php
                                $cathome = $this->Shop_Model->getCategoryHome(103);  
                                foreach($cathome as $cathomes){ ?>
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <div class="single-category-wrap">
                                            <div class="aspect-ratio aspect-ratio-1-1 img-frame">
                                                <a href="<?php echo base_url();?>ShopController/ProductFilter/<?php echo $cathomes['categoryid']; ?>" target="_blank">
                                                    <img src="<?php echo base_url();?>admin/uploads/<?php echo $cathomes['cat_image']; ?>" alt="Category Image" class="fit-img">
                                                </a>
                                                <!-- <span class="sticker">25%</span>                                                -->
                                            </div>   
                                            <h2><?php echo $cathomes['categoryname']; ?></h2>     
                                            <p>Popular Brands</p>                                   
                                        </div>
                                        <!-- single-product-wrap end -->
                                    </div>
                                <?php } ?>   
                                  
                                </div>
                            </div>
                        </div>
                    </div>          
                    
                </div>
            </section>


             <!-- Men -->
             <section class="product-area li-laptop-product li-laptop-product-2 pb-0">
                <div class="container">
                    <!-- Slider With Category Menu Area End Here -->
                    <!-- Begin Li's Static Banner Area -->
                   
                    <!-- Li's Static Banner Area End Here -->
                    <!-- Begin Li's Special Product Area -->
                    <br>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>Men</span>
                                </h2>
                                <ul class="li-sub-category-list">
                                <li class="active "><a  href="<?php echo base_url() ?>ShopController/ProductFilter/113/Men"><span class="btn-view-all">View All</span></a></li>                                   
                                </ul>
                            </div>
                         
                            <div class="row">
                                <div class="product-active owl-carousel">

                                <?php
                                $cathome = $this->Shop_Model->getCategoryHome(113);  
                                foreach($cathome as $cathomes){ ?>
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <div class="single-category-wrap">
                                            <div class="aspect-ratio aspect-ratio-1-1 img-frame">
                                                <a href="<?php echo base_url();?>ShopController/ProductFilter/<?php echo $cathomes['categoryid']; ?>" target="_blank">
                                                    <img src="<?php echo base_url();?>admin/uploads/<?php echo $cathomes['cat_image']; ?>" alt="Category Image" class="fit-img">
                                                </a>
                                                <!-- <span class="sticker">25%</span>                                                -->
                                            </div>   
                                            <h2><?php echo $cathomes['categoryname']; ?></h2>     
                                            <p>Popular Brands</p>                                   
                                        </div>
                                        <!-- single-product-wrap end -->
                                    </div>
                                <?php } ?>   
                                  
                                </div>
                            </div>
                        </div>
                    </div>          
                    
                </div>
            </section>

             <!-- Men footweares-->
             <section class="product-area li-laptop-product li-laptop-product-2 pb-0">
                <div class="container">
                    <!-- Slider With Category Menu Area End Here -->
                    <!-- Begin Li's Static Banner Area -->
                    
                    <!-- Li's Static Banner Area End Here -->
                    <!-- Begin Li's Special Product Area -->
                    <br>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>Foot Weares For Men</span>
                                </h2>
                                <ul class="li-sub-category-list">
                                <li class="active "><a  href="<?php echo base_url() ?>ShopController/ProductFilter/114/Foot Weares For Men"><span class="btn-view-all">View All</span></a></li>                                   
                                </ul>
                            </div>
                         
                            <div class="row">
                                <div class="product-active owl-carousel">

                                <?php
                                $cathome = $this->Shop_Model->getCategoryHome(114);  
                                foreach($cathome as $cathomes){ ?>
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <div class="single-category-wrap">
                                            <div class="aspect-ratio aspect-ratio-1-1 img-frame">
                                                <a href="<?php echo base_url();?>ShopController/ProductFilter/<?php echo $cathomes['categoryid']; ?>" target="_blank">
                                                    <img src="<?php echo base_url();?>admin/uploads/<?php echo $cathomes['cat_image']; ?>" alt="Category Image" class="fit-img">
                                                </a>
                                                <!-- <span class="sticker">25%</span>                                                -->
                                            </div>   
                                            <h2><?php echo $cathomes['categoryname']; ?></h2>     
                                            <p>Popular Brands</p>                                   
                                        </div>
                                        <!-- single-product-wrap end -->
                                    </div>
                                <?php } ?>   
                                  
                                </div>
                            </div>
                        </div>
                    </div>          
                    
                </div>
            </section>

             <!-- Men Accessories-->
             <section class="product-area li-laptop-product li-laptop-product-2 pb-0">
                <div class="container">
                    <!-- Slider With Category Menu Area End Here -->
                    <!-- Begin Li's Static Banner Area -->
                    <div class="li-static-banner pt-20 pt-sm-30 pt-xs-30">
                        <div class="container">
                            <div class="row">
                                <!-- Begin Single Banner Area  -->
                                <div class="col-lg-4 col-md-4">
                                    <div class="single-banner pb-xs-30">
                                        <a href="<?php echo base_url(); ?>ShopController/ProductFilter/73">
                                            <img src="<?php echo base_url(); ?>images/banner/1_3.jpg" alt="offer Banner">
                                        </a>
                                    </div>
                                </div> 
                                <!-- Single Banner Area End Here -->
                                <!-- Begin Single Banner Area -->
                                <div class="col-lg-4 col-md-4">
                                    <div class="single-banner pb-xs-30">
                                        <a href="<?php echo base_url(); ?>ShopController/ProductFilter/87">
                                            <img src="<?php echo base_url(); ?>images/banner/1_4.jpg" alt="offer Banner">
                                        </a>
                                    </div>
                                </div> 
                                <!-- Single Banner Area End Here -->
                                <!-- Begin Single Banner Area -->
                                <div class="col-lg-4 col-md-4">
                                    <div class="single-banner">
                                        <a href="<?php echo base_url(); ?>ShopController/ProductFilter/81">
                                            <img src="<?php echo base_url(); ?>images/banner/1_5.jpg" alt="offer Banner">
                                        </a>
                                    </div>
                                </div> 
                                <!-- Single Banner Area End Here -->
                            </div>
                        </div>
                    </div>
                    <!-- Li's Static Banner Area End Here -->
                    <!-- Begin Li's Special Product Area -->
                    <br>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>Men Accessories</span>
                                </h2>
                                <ul class="li-sub-category-list">
                                <li class="active "><a  href="<?php echo base_url() ?>ShopController/ProductFilter/175/Men Accessories"><span class="btn-view-all">View All</span></a></li>                                   
                                </ul>
                            </div>
                         
                            <div class="row">
                                <div class="product-active owl-carousel">

                                <?php
                                $cathome = $this->Shop_Model->getCategoryHome(175);  
                                foreach($cathome as $cathomes){ ?>
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <div class="single-category-wrap">
                                            <div class="aspect-ratio aspect-ratio-1-1 img-frame">
                                                <a href="<?php echo base_url();?>ShopController/ProductFilter/<?php echo $cathomes['categoryid']; ?>" target="_blank">
                                                    <img src="<?php echo base_url();?>admin/uploads/<?php echo $cathomes['cat_image']; ?>" alt="Category Image" class="fit-img">
                                                </a>
                                                <!-- <span class="sticker">25%</span>                                                -->
                                            </div>   
                                            <h2><?php echo $cathomes['categoryname']; ?></h2>     
                                            <p>Popular Brands</p>                                   
                                        </div>
                                        <!-- single-product-wrap end -->
                                    </div>
                                <?php } ?>   
                                  
                                </div>
                            </div>
                        </div>
                    </div>          
                    
                </div>
            </section>



             <!-- baby & Kids-->
             <section class="product-area li-laptop-product li-laptop-product-2 pb-0">
                <div class="container">
                    <!-- Slider With Category Menu Area End Here -->
                    <!-- Begin Li's Static Banner Area -->
                   
                    <!-- Li's Static Banner Area End Here -->
                    <!-- Begin Li's Special Product Area -->
                    <br>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>Baby & Kids</span>
                                </h2>
                                <ul class="li-sub-category-list">
                                <li class="active "><a  href="<?php echo base_url() ?>ShopController/ProductFilter/267/Men Accessories"><span class="btn-view-all">View All</span></a></li>                                   
                                </ul>
                            </div>
                         
                            <div class="row">
                                <div class="product-active owl-carousel">

                                <?php
                                $cathome = $this->Shop_Model->getCategoryHome(267);  
                                foreach($cathome as $cathomes){ ?>
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <div class="single-category-wrap">
                                            <div class="aspect-ratio aspect-ratio-1-1 img-frame">
                                                <a href="<?php echo base_url();?>ShopController/ProductFilter/<?php echo $cathomes['categoryid']; ?>" target="_blank">
                                                    <img src="<?php echo base_url();?>admin/uploads/<?php echo $cathomes['cat_image']; ?>" alt="Category Image" class="fit-img">
                                                </a>
                                                <!-- <span class="sticker">25%</span>                                                -->
                                            </div>   
                                            <h2><?php echo $cathomes['categoryname']; ?></h2>     
                                            <p>Popular Brands</p>                                   
                                        </div>
                                        <!-- single-product-wrap end -->
                                    </div>
                                <?php } ?>   
                                  
                                </div>
                            </div>
                        </div>
                    </div>          
                    
                </div>
            </section>


            <!-- Women Accessories-->
            <section class="product-area li-laptop-product li-laptop-product-2 pb-0">
                <div class="container">
                    <!-- Slider With Category Menu Area End Here -->
                    <!-- Begin Li's Static Banner Area -->
                   
                    <!-- Li's Static Banner Area End Here -->
                    <!-- Begin Li's Special Product Area -->
                    <br>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>Women</span>
                                </h2>
                                <ul class="li-sub-category-list">
                                <li class="active "><a  href="<?php echo base_url() ?>ShopController/ProductFilter/189/Women"><span class="btn-view-all">View All</span></a></li>                                   
                                </ul>
                            </div>
                         
                            <div class="row">
                                <div class="product-active owl-carousel">

                                <?php
                                $cathome = $this->Shop_Model->getCategoryHome(189);  
                                foreach($cathome as $cathomes){ ?>
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <div class="single-category-wrap">
                                            <div class="aspect-ratio aspect-ratio-1-1 img-frame">
                                                <a href="<?php echo base_url();?>ShopController/ProductFilter/<?php echo $cathomes['categoryid']; ?>" target="_blank">
                                                    <img src="<?php echo base_url();?>admin/uploads/<?php echo $cathomes['cat_image']; ?>" alt="Category Image" class="fit-img">
                                                </a>
                                                <!-- <span class="sticker">25%</span>                                                -->
                                            </div>   
                                            <h2><?php echo $cathomes['categoryname']; ?></h2>     
                                            <p>Popular Brands</p>                                   
                                        </div>
                                        <!-- single-product-wrap end -->
                                    </div>
                                <?php } ?>   
                                  
                                </div>
                            </div>
                        </div>
                    </div>          
                    
                </div>
            </section>


          

                    
            
            <section class="product-area li-laptop-product li-laptop-product-2 pb-45">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>Electronics</span>
                                </h2>
                                <ul class="li-sub-category-list">
                                <li class="active "><a  href="<?php echo base_url() ?>ShopController/ProductFilter/1/Electronics"><span class="btn-view-all">View All</span></a></li>                                   
                                </ul>
                            </div>
                            <div class="li-banner-2 pt-15">
                                <div class="row">
                                    <!-- Begin Single Banner Area -->
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single-banner">
                                            <a href="<?php echo base_url(); ?>ShopController/ProductFilter/49">
                                                <img src="<?php echo base_url();?>images/banner/2_1.jpg" alt="Static Banner">
                                            </a>
                                        </div>
                                    </div>
                                    <!-- Single Banner Area End Here -->
                                    <!-- Begin Single Banner Area -->
                                    <div class="col-lg-6 col-md-6">
                                        <div class="single-banner pt-xs-30">
                                            <a href="<?php echo base_url(); ?>ShopController/ProductFilter/53">
                                                <img src="<?php echo base_url();?>images/banner/2_2.jpg" alt="Li's Static Banner">
                                            </a>
                                        </div>
                                    </div>
                                    <!-- Single Banner Area End Here -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="product-active owl-carousel">

                                <?php foreach($electronics as $electronic){ ?>
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <div class="single-product-wrap">
                                            <div class="aspect-ratio aspect-ratio-1-1 img-frame">
                                                <a href="<?php echo base_url();?>ShopController/ProductSingle/<?php echo $electronic['product_id']; ?>" target="_blank">
                                                    <img src="<?php echo base_url();?>uploads/<?php echo $electronic['image']; ?>" alt=" Product Image" class="fit-img">
                                                </a>
                                                <span class="sticker"><?php echo $electronic['prostatus']; ?></span>
                                                <?php if($electronic['bidding_avail']=='on'){ ?>
                                                    <span class="sticker2"><i class="fa fa-gavel"></i> Bidding</span>
                                                <?php } ?>
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                        <a href="<?php echo base_url();?>ShopController/SellerSingle/<?php echo $electronic['user_id']; ?> " target="_blank"><?php echo $electronic['companyname']; ?></a>
                                                        </h5>
                                                        <div class="rating-box">
                                                            <!-- call rating starts                                                         -->
                                                            <?php
                                                             $productid = $electronic['product_id'];
                                                             $rating = $this->Shop_Model->getRating($productid); 
                                                               include('includes/rating_sec.php');
                                                            ?>   
                                                            <!-- call rating ends here -->
                                                        </div>
                                                    </div>
                                                    <h4><a class="product_name" href="<?php echo base_url();?>ShopController/ProductSingle/<?php echo $electronic['product_id']; ?>" target="_blank"><?php echo  substr( $electronic['product_name'] ,0,25) ?></a></h4>
                                                    <div class="price-box">
                                                    <div class="price-box">
                                                        <span class="new-price new-price-2"><i class="fa fa-rupee"></i><?php echo $electronic['selling_rate']; ?></span>
                                                        <span class="old-price"><i class="fa fa-rupee"></i><?php echo $electronic['original_rate']; ?></span>

                                                        <?php 
                                                         $originalprice = $electronic['original_rate']; 
                                                         $sellingprice =  $electronic['selling_rate'];                                                      
                                                         $pricedecrease = $originalprice -  $sellingprice;
                                                         $pricediff = $pricedecrease / $originalprice * 100
                                                         ?>
                                                        <span class="discount-percentage"><?php echo round($pricediff) ?> % Offer</span>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="add-actions">
                                                <?php  if (empty($this->id)) { ?>
                                                    <ul class="add-actions-link">
                                                        <li class="add-cart active pointer-cursor" onclick="notsigninswal()">Add to cart</li>
                                                        <li onclick="notsigninswal()"><a class="links-details"><i class="fa fa-heart-o"></i></a></li>
                                                        <li onclick="quickview(<?php echo $electronic['product_id']; ?>)"><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>                                                        
                                                    </ul>
                                                <?php } else{ ?>    
                                                    <ul class="add-actions-link">
                                                        <li class="add-cart active pointer-cursor" onclick="addtocart(<?php echo $electronic['product_id']; ?>,<?php echo $electronic['selling_rate']; ?>,<?php echo $electronic['shipping_charge']; ?>)">Add to cart</li>
                                                        <li onclick="addtowishlist(<?php echo $electronic['product_id']; ?>)"><a><i class="fa fa-heart-o"></i></a></li>
                                                        <li onclick="quickview(<?php echo $electronic['product_id']; ?>)"><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>                                                        
                                                    </ul>
                                                <?php } ?> 
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single-product-wrap end -->
                                    </div>
                                <?php } ?>   
                                  
                                </div>
                            </div>
                        </div>
                        <!-- Li's Section Area End Here -->
                    </div>
                </div>
            </section>








         
         
          
     


<!-- <div id="quickviewresult"></div> -->


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


                            <script>
                            function loaddealtimers(){                                
                                    $.ajax({
                                        url:baseURL+'index.php/ShopController/loadDealtimers',
                                        method: 'post',
                                        // data: DataJsons,
                                        success: function(response) {

                                            const diffInMilliseconds = Math.abs(new Date() - new Date(response));

                                            // $('.dealtimer').html(diffInMilliseconds);


                                            var days, hours, minutes, seconds, total_hours, total_minutes, total_seconds;
  
                                            total_seconds = parseInt(Math.floor(diffInMilliseconds / 1000));
                                            total_minutes = parseInt(Math.floor(total_seconds / 60));
                                            total_hours = parseInt(Math.floor(total_minutes / 60));
                                            days = parseInt(Math.floor(total_hours / 24));

                                            seconds = parseInt(total_seconds % 60);
                                            minutes = parseInt(total_minutes % 60);
                                            hours = parseInt(total_hours % 24);


                                            $('.dealtimer').html(days+'days' + hours+'hours' + minutes+'minutes'+ seconds+'seconds');
                                            // $("#loader-wrapper").hide();
                                        }
                                    });  
                                }
                            
                            // loaddealtimers();

                            // setInterval(() => {
                            //     loaddealtimers();
                            // }, 1000);
                            </script>





<?php   if (empty($this->id)) { ?>

    <div class="modal fade text-center py-5"  id="subscribeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-body">
				<div class="top-strip"></div>
                <a class="h2" href="https://www.fiverr.com/share/qb8D02" target="_blank"></a>
                <h3 class="pt-5 mb-0 text-secondary">Login Here</h3>
                <p class="pb-1 text-muted"><small>Already have an account signin here</small></p>
                <form action="<?php echo base_url('ShopController/LoginCustomer') ?>" method="post" accept-charset="utf-8">                
                    <div class="mb-3 w-75 mx-auto">
                        <input type="text" class="form-control full-ro" placeholder="Email ID" aria-label="Recipient's username" aria-describedby="" name="email" required>                                
                    </div>
                    <div class="input-group mb-3 w-75 mx-auto">
    				  <input type="password" class="form-control" placeholder="Password" aria-label="Recipient's password" name="password" aria-describedby="button-addon2" required>
    				  <div class="input-group-append">
    					<button class="btn btn-primary" type="submit" id="button-addon2"><i class="fa fa-paper-plane"></i></button>
    				  </div>
    				</div>
    			</form>
                <p class="pb-1 text-muted"><small><a href="<?php echo base_url(); ?>ShopController/ForgotPassword">Fogot Password ?</a></small></p>
				<div class="bottom-strip"></div>
            </div>
        </div>
    </div>
</div>

<?php } ?>    





<!-- 
<div class="modal fade text-center py-5 subscribeModal-lg"  id="subscribeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
				<div class="top-strip"></div>
                <a class="h2" href="https://www.fiverr.com/share/qb8D02" target="_blank">Sunlimetech</a>
                <h3 class="pt-5 mb-0 text-secondary">Newsletter</h3>
                <p class="pb-1 text-muted"><small>Sign up to update with our latest news and products.</small></p>
                <form>
                    <div class="input-group mb-3 w-75 mx-auto">
    				  <input type="email" class="form-control" placeholder="sunlimetech@gmail.com" aria-label="Recipient's username" aria-describedby="button-addon2" required>
    				  <div class="input-group-append">
    					<button class="btn btn-primary" type="button" id="button-addon2"><i class="fa fa-paper-plane"></i></button>
    				  </div>
    				</div>
    			</form>
                <p class="pb-1 text-muted"><small>Your email is safe with us. We won't spam.</small></p>
				<div class="bottom-strip"></div>
            </div>
        </div>
    </div>
</div> -->
<!-- ./subscribe Modal -->

<script>
    $(window).on('load', function() {
	 setTimeout(function(){
	   $('#subscribeModal').modal('show');
   }, 1000);
   setTimeout(function(){
	   $('.subscribeModal-lg').modal('show');
   }, 10000);
});
$('#Reloadpage').click(function() {
    location.reload();
}); 
</script>

            <?php include_once('shop_footer_user.php') ?>