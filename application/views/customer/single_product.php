
<?php 
        if (empty($this->id)) {
            include_once('shop_head.php');
        }
        else{
            include('shop_head_user.php');
        }
    ?>


                <!-- Header Bottom Area End Here -->
                <!-- Begin Mobile Menu Area -->
              
                <!-- Mobile Menu Area End Here -->
            </header>

            


            <?php foreach($products as $product){ ?>
                
                <meta name="keywords" content="<?php echo $product['keywords']; ?>">
                <meta name="description" content="<?php echo $product['description']; ?>">
                <title><?php echo $product['product_name']; ?></title>
            <!-- Header Area End Here -->
            <!-- Begin Li's Breadcrumb Area -->
            <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="<?php echo base_url();?>">Home</a></li>
                            <li class="active">Single Product</li>
                        </ul>
                    </div>
                </div>
            </div>
                    <!-- pop up section  -->
                        <?php 
                            $productid = $product['product_id'];
                            $userid = $this->id;
                            $biddingapprooval = $this->Shop_Model->getAgreedBidding($userid,$productid);
                            $data['biddingapprooval'] = $biddingapprooval;
                            if(count(($biddingapprooval))>0){
                            foreach($biddingapprooval as $biddingapproovals){     
                        ?>
                            <div class="custompopup" style="display: none;">
                                <h2><i class="fa fa-check"></i> Congrats</h2>
                                <h3>Your Bidding is Agreed with <i class="fa fa-rupee"></i> <?php echo $biddingapproovals['amount']; ?>/-</h3>
                                <button data-toggle="modal" data-target="#myModal">Buy With Bidding Price</button>
                            </div>
                            <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-lg">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"></h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="coupon-accordion">
                                                    <h3>Checkout </h3>                              
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-12">
                                                <form action="#">
                                                    <div class="checkbox-form">
                                                        <h3>Billing Details</h3>
                                                        <?php
                                                            $index = 0;
                                                            foreach($address as $billingaddress){
                                                            $index=$index+1;
                                                        ?>

                                                        <div class="add-address">
                                                            <h6>Billing Address <?php echo $index ?> 
                                                            <span><input type="radio" name="billingaddress" id="billingaddress" checked="checked" value="<?php echo $billingaddress['aid']; ?>"></span>
                                                        </h6>
                                                            <p>
                                                                <?php echo $billingaddress['address']; ?>,<br> <?php echo $billingaddress['city']; ?>,
                                                                <?php echo $billingaddress['state']; ?>, <?php echo $billingaddress['country']; ?>,
                                                                <?php echo $billingaddress['pin']; ?>,
                                                            </p>  
                                                        
                                                        </div>  

                                                        <?php }  ?>
                                                        <div class="different-address">
                                                            <div class="ship-different-title">
                                                                <h3>
                                                                    <label>Ship to a different address?</label>
                                                                    <input id="ship-box" type="checkbox">
                                                                </h3>
                                                            </div>
                                                            <div id="ship-box-info" class="">
                                                                <?php
                                                                $index = 0;
                                                                foreach($address as $shippingaddress){
                                                                $index=$index+1;
                                                            ?>

                                                                <div class="add-address">
                                                                    <h6>Shipping Address <?php echo $index ?> 
                                                                    <span><input type="radio" name="shippingaddress" id="shippingaddress" value="<?php echo $shippingaddress['aid']; ?>" checked="checked"></span>
                                                                </h6>
                                                                    <p>
                                                                        <?php echo $shippingaddress['address']; ?>,<br> <?php echo $shippingaddress['city']; ?>,
                                                                        <?php echo $shippingaddress['state']; ?>, <?php echo $shippingaddress['country']; ?>,
                                                                        <?php echo $shippingaddress['pin']; ?>,
                                                                    </p>  
                                                                
                                                                </div>  

                                                                <?php }  ?>
                                                            </div>
                                                            <div class="order-notes">
                                                                <div class="checkout-form-list">
                                                                    <label>Order Notes</label>
                                                                    <textarea id="ordernote" cols="30" rows="10" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-lg-12 col-12">
                                                <div class="your-order">
                                                    <h3>Your order</h3>
                                                    <div class="your-order-table table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th class="cart-product-name">Product</th>
                                                                    <th>Count</th>
                                                                    <th><i class="fa fa-rupee"></i> Selling Rate</th>
                                                                    <th class="cart-product-total">Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <script>var products = [];</script>
                                                                <?php 
                                                                $total_cart_price = 0;                                           
                                                                foreach($products as $product){ ?>
                                                                <script>products = products + <?php echo $product['product_id'] ?> + ','; </script>

                                                                <tr class="cart_item">
                                                                <td class="cart-product-name"><?php echo substr( $product['product_name'], 0, 15) ?><strong class="product-quantity"></strong></td>
                                                                <td> <input type="number" value="1" id="itemcount" onclick="changecarttotal()"></td>
                                                                <td> <?php echo $biddingapproovals['amount']+$product['shipping_charge']; ?>/-</td>
                                                                <td class="cart-product-total"><span class="amount"><span class="ordertotal"></span>/-</span></td>                                                
                                                                </tr>
                                                                <!-- get Cart total -->
                                                                <?php $total_cart_price += ($biddingapproovals['amount']+$product['shipping_charge']) ?>
                                                                <?php } ?>
                                                                
                                                            </tbody>
                                                            <tfoot>
                                                                <tr class="cart-subtotal">
                                                                    <th>Cart Subtotal</th>
                                                                    <td><span class="amount"><i class="fa fa-rupee"></i><span class="ordertotal"></span> /-</span></td>
                                                                </tr>
                                                                <tr class="order-total">
                                                                    <th>Order Total</th>
                                                                    <td><strong><span class="amount"><i class="fa fa-rupee"></i><span class="ordertotal"></span> /-</span></strong></td>
                                                                    <script>var amount = <?php echo $total_cart_price ?>;</script>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>

                                                    <script>
                                                        function changecarttotal(){
                                                            var amount = <?php echo ($biddingapproovals['amount']+$product['shipping_charge']); ?>;
                                                            var count = $('#itemcount').val();
                                                            $('.ordertotal').html(amount*count);
                                                            if(count<=0){
                                                                $('#plceordrbtn').hide();
                                                            }
                                                            else{
                                                                $('#plceordrbtn').show();
                                                            }
                                                        }
                                                        changecarttotal();
                                                    </script>
                                                    <div class="payment-method">
                                                        <div class="payment-accordion">
                                                            <div id="accordion">
                                                            <div class="card">
                                                                <div class="card-header" id="#payment-1">
                                                                <h5 class="panel-title">
                                                                    <input type="radio" name="paytype" id="paytype" value="banktransfer" checked="checked"> 
                                                                    <a class="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                    Direct Bank Transfer.
                                                                    </a>
                                                                    <br>
                                                                </h5>
                                                                </div>
                                                                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                                                <div class="card-body">
                                                                    <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                                                </div>
                                                                </div>
                                                            </div>
                                                            <div class="card">
                                                                <div class="card-header" id="#payment-2">
                                                                <h5 class="panel-title">
                                                                    <span><input type="radio" name="paytype" id="paytype" value="cashondelivery" > </span>  
                                                                    <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                        Cash On Delivery
                                                                    </a>
                                                                    <br>
                                                                </h5>
                                                                </div>
                                                                <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                                                <div class="card-body">
                                                                    <p>Payment will done at the time of delivery</p>                                                
                                                                </div>
                                                                
                                                                </div>
                                                            </div>
                                                          
                                                            </div>
                                                            <div class="order-button-payment">
                                                                <button onclick="placeorderwithbid(<?php echo $biddingapproovals['amount']; ?>,<?php echo $biddingapproovals['bidding_id']; ?>)" id="plceordrbtn">Place Order</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                setTimeout(() => {
                                    $('.custompopup').fadeIn(1000);
                                }, 1000);
                            </script>  
                        <?php } }?>              
                    <!-- pop up section  -->


            <!-- Li's Breadcrumb Area End Here -->
            <!-- content-wraper start -->
            <div class="content-wraper">
                <div class="container">
                    <div class="row single-product-area">
                        <div class="col-lg-5 col-md-6">
                           <!-- Product Details Left -->
                           <!-- <br><br><br> -->
                            <div class="product-details-left mt-30">
                                <div class="product-details-images slider-navigation-1">
                                    <div class="lg-image">
                                        <div class="aspect-ratio aspect-ratio-1-1 img-frame">
                                            <a class="popup-img venobox vbox-item" href="<?php echo base_url();?>uploads/<?php echo $product['image']; ?>" data-gall="myGallery">
                                                <img src="<?php echo base_url();?>uploads/<?php echo $product['image']; ?>" alt="product image" class="fit-img magniflier">
                                            </a>
                                        </div>                                      

                                        <?php  if($product['status']==0){ ?>
                                                            <span class="uavail-badge d-block mx-auto">Temporarily Unavailable</span>
                                                            <?php } ?>
                                                            <?php  if($product['stock']==0){ ?>
                                                            <span class="outvail-badge d-block mx-auto">Out Of Stock</span>
                                                            <?php } ?>
                                        
                                       
                                    </div>
                                    <!-- <div class="lg-image">
                                        <a class="popup-img venobox vbox-item" href="images/product/large-size/2.jpg" data-gall="myGallery">
                                            <img src="images/product/large-size/2.jpg" alt="product image">
                                        </a>
                                    </div>
                                    <div class="lg-image">
                                        <a class="popup-img venobox vbox-item" href="images/product/large-size/3.jpg" data-gall="myGallery">
                                            <img src="images/product/large-size/3.jpg" alt="product image">
                                        </a>
                                    </div>
                                    <div class="lg-image">
                                        <a class="popup-img venobox vbox-item" href="images/product/large-size/4.jpg" data-gall="myGallery">
                                            <img src="images/product/large-size/4.jpg" alt="product image">
                                        </a>
                                    </div>
                                    <div class="lg-image">
                                        <a class="popup-img venobox vbox-item" href="images/product/large-size/5.jpg" data-gall="myGallery">
                                            <img src="images/product/large-size/5.jpg" alt="product image">
                                        </a>
                                    </div>
                                    <div class="lg-image">
                                        <a class="popup-img venobox vbox-item" href="images/product/large-size/6.jpg" data-gall="myGallery">
                                            <img src="images/product/large-size/6.jpg" alt="product image">
                                        </a>
                                    </div> -->
                                </div>
                                <!-- <div class="product-details-thumbs slider-thumbs-1 aspect-ratio aspect-ratio-1-1 img-frame fit2">                                         -->
                                    <!-- <div class="sm-image"><img src="<?php echo base_url();?>uploads/<?php echo $product['image']; ?>" alt="product image thumb" class="fit-img"></div> -->
                                    

                                    
                                    <!-- <div class="sm-image"><img src="images/product/small-size/2.jpg" alt="product image thumb"></div>
                                    <div class="sm-image"><img src="images/product/small-size/3.jpg" alt="product image thumb"></div>
                                    <div class="sm-image"><img src="images/product/small-size/4.jpg" alt="product image thumb"></div>
                                    <div class="sm-image"><img src="images/product/small-size/5.jpg" alt="product image thumb"></div>
                                    <div class="sm-image"><img src="images/product/small-size/6.jpg" alt="product image thumb"></div> -->
                                <!-- </div> -->

                                <?php 
                                if($product['status']>0 && $product['stock']>0){ ?>
                                        <?php  if (empty($this->id)) { ?>
                                            <button class="add-to-cart" onclick="notsigninswal()"><i class="fa fa-cart-plus"></i> Add to cart</button>
                                        <?php } else{?>        
                                            <button class="add-to-cart" onclick="addtocart(<?php echo $product['product_id']; ?>,<?php echo $product['selling_rate']; ?>,<?php echo $product['shipping_charge']; ?>)">Add to cart</button>
                                        <?php } ?>  
                                        
                                        <?php  if (empty($this->id)) { ?>
                                            <button class="wishlist-btn" onclick="notsigninswal()"><i class="fa fa-heart-o"></i> Add to wishlist</button>                                           
                                        <?php } else{?>   
                                            <button class="wishlist-btn" onclick="addtowishlist(<?php echo $product['product_id']; ?>)"><i class="fa fa-heart-o"></i> Add to wishlist</button>
                                        <?php }  }?>  
                            </div>
                            <!--// Product Details Left -->
                        </div>

                        <div class="col-lg-7 col-md-6">
                            
                            <div class="product-details-view-content pt-30">
                                <div class="product-info">
                                    <h2><?php echo $product['product_name']; ?></h2>
                                    <span class="product-details-ref">Sold By : <?php echo $product['companyname']; ?></span>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="rating-box pt-5">
                                                <!-- call rating starts                                                         -->
                                                <?php
                                                    $productid = $product['product_id'];
                                                    $rating = $this->Shop_Model->getRating($productid); 
                                                    include('includes/rating_sec.php');
                                            ?>   
                                            <p><?php echo $counts; ?> Reviews</p>
                                        </div>
                                       
                                    </div>

                                    <div class="col-md-6">
                                            <img src="<?php echo base_url(); ?>images/icons/assured.png" width="100">
                                    </div>
                                   <!-- call rating ends here -->
                                </div>
                                
                              
                                
                                <?php 
                                    $stock = $product['stock'];
                                    if($stock==0){
                                        echo '<h4 class="outofstsi">Out of Stock</h4>';
                                    }
                                    else if($stock<=3){
                                        echo '<h6 class="fewstosi blink"><span>Only '.$stock.' Left</span></h6>';
                                    }
                                 ?>
                                <div class="price-box pt-0">
                                    <del><i class="fa fa-rupee"></i> <?php echo $product['original_rate']; ?>/-</del>
                                    <span class="new-price new-price-2"><i class="fa fa-rupee"></i> <?php echo $product['selling_rate']; ?>/-</span>

                                    <div class="shipping-charge">
                                       <i class="fa fa-car"></i> Shipping Charge : <?php
                                        if($product['shipping_charge']==''){
                                            $sh_charge = 0;
                                        } 
                                        else{
                                            $sh_charge = $product['shipping_charge'];
                                        }
                                        echo ''. $sh_charge ?>/- Rs</span>
                                    </div>
                                </div>

                                <script>loadavailability(<?php echo $product['user_id']; ?>)</script> 
                               <div id="availabilitycheck"></div>
                                <div class="product-desc">
                                    <p>
                                        <span><?php echo $product['description']; ?>
                                        </span>
                                    </p>
                                    <?php if(!empty($specifications)){ ?>
                                    <h4>Specifications</h4>
                                    <?php                                    
                                    foreach($specifications as $specification){ ?>
                                        <h5><?php echo $specification['attribute_name']; ?> :  <span><?php echo $specification['sub_attribute_name']; ?></span></h5>
                                    <?php }} ?>
                                    <div class="mb-10"></div><br>
                                </div>

                               
                                <!-- <div class="product-variants">
                                    <div class="produt-variants-size">
                                        <label>Dimension</label>
                                        <select class="nice-select">
                                            <option value="1" title="S" selected="selected">40x60cm</option>
                                            <option value="2" title="M">60x90cm</option>
                                            <option value="3" title="L">80x120cm</option>
                                        </select>
                                    </div>
                                </div> -->
                              
                                   
                                    <div class="block-reassurance">
                                        <ul>
                                            <li>
                                                <div class="reassurance-item">
                                                    <div class="reassurance-icon">
                                                        <i class="fa fa-check-square-o"></i>
                                                    </div>
                                                    <p>Security policy (edit with Customer reassurance module)</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="reassurance-item">
                                                    <div class="reassurance-icon">
                                                        <i class="fa fa-truck"></i>
                                                    </div>
                                                    <p>Delivery policy (edit with Customer reassurance module)</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="reassurance-item">
                                                    <div class="reassurance-icon">
                                                        <i class="fa fa-exchange"></i>
                                                    </div>

                                                    <?php if($product['return_policy']==0){ ?>
                                                        <p>No Return</p>
                                                    <?php } else{?>
                                                        <p> <?php echo $product['return_policy']; ?> Days Replacement Policy</p>
                                                    <?php } ?>

                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            <!-- content-wraper end -->
            <!-- Begin Product Area -->
            <div class="product-area pt-35">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="li-product-tab">
                                <ul class="nav li-product-menu">
                                   <li><a class="active" data-toggle="tab" href="#descriptions"><span>Description</span></a></li>
                                   <li><a data-toggle="tab" href="#product-details"><span>Product Details</span></a></li>
                                   <li><a data-toggle="tab" href="#reviews"><span>Reviews</span></a></li>
                                    
                                </ul>               
                            </div>
                            <!-- Begin Li's Tab Menu Content Area -->
                        </div>
                    </div>

                 

                    <div class="tab-content">
                        <div id="descriptions" class="tab-pane active show" role="tabpanel">
                            <div class="product-description">
                                <span><?php echo $product['description']; ?></span>
                            </div>
                        </div>
                        <div id="product-details" class="tab-pane" role="tabpanel">
                            <div class="product-details-manufacturer">
                                <a href="#">
                                    <!-- <img src="images/product-details/1.jpg" alt="Product Manufacturer Image"> -->
                                </a>
                                
                                <?php foreach($specifications as $specification){ ?>
                                    <p><span><?php echo $specification['attribute_name']; ?></span> :  <?php echo $specification['sub_attribute_name']; ?></p>
                                <?php } ?>
                            </div>
                        </div>
                        <div id="reviews" class="tab-pane" role="tabpanel">
                            <div class="product-reviews">
                                <div class="product-details-comment-block">
                                    <div class="comment-review">

                                    <!-- call rating starts                                                         -->
                                    <?php
                                         $productid = $product['product_id'];
                                         $rating = $this->Shop_Model->getRating($productid); 
                                         include('includes/rating_sec.php');
                                   ?>   
                                   <p><?php echo $counts; ?> Reviews</p>
                                   <?php 
                                       include('includes/ratings_single.php');
                                   ?>    

                                   <!-- call rating ends here -->
                                      
                                  
                                 
                                    <!-- Begin Quick View | Modal Area -->
                                    <div class="modal fade modal-wrapper" id="mymodal" >
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <h3 class="review-page-title">Write Your Review</h3>
                                                    <div class="modal-inner-area row">
                                                        <div class="col-lg-6">
                                                           <div class="li-review-product">
                                                               <img src="images/product/large-size/3.jpg" alt="Li's Product">
                                                               <div class="li-review-product-desc">
                                                                   <p class="li-product-name">Today is a good day Framed poster</p>
                                                                   <p>
                                                                       <span>Beach Camera Exclusive Bundle - Includes Two Samsung Radiant 360 R3 Wi-Fi Bluetooth Speakers. Fill The Entire Room With Exquisite Sound via Ring Radiator Technology. Stream And Control R3 Speakers Wirelessly With Your Smartphone. Sophisticated, Modern Design </span>
                                                                   </p>
                                                               </div>
                                                           </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="li-review-content">
                                                                <!-- Begin Feedback Area -->
                                                                <div class="feedback-area">
                                                                    <div class="feedback">
                                                                        <h3 class="feedback-title">Our Feedback</h3>
                                                                        <form action="#">
                                                                            <p class="your-opinion">
                                                                                <label>Your Rating</label>
                                                                                <span>
                                                                                    <select class="star-rating">
                                                                                      <option value="1">1</option>
                                                                                      <option value="2">2</option>
                                                                                      <option value="3">3</option>
                                                                                      <option value="4">4</option>
                                                                                      <option value="5">5</option>
                                                                                    </select>
                                                                                </span>
                                                                            </p>
                                                                            <p class="feedback-form">
                                                                                <label for="feedback">Your Review</label>
                                                                                <textarea id="feedback" name="comment" cols="45" rows="8" aria-required="true"></textarea>
                                                                            </p>
                                                                            <div class="feedback-input">
                                                                                <p class="feedback-form-author">
                                                                                    <label for="author">Name<span class="required">*</span>
                                                                                    </label>
                                                                                    <input id="author" name="author" value="" size="30" aria-required="true" type="text">
                                                                                </p>
                                                                                <p class="feedback-form-author feedback-form-email">
                                                                                    <label for="email">Email<span class="required">*</span>
                                                                                    </label>
                                                                                    <input id="email" name="email" value="" size="30" aria-required="true" type="text">
                                                                                    <span class="required"><sub>*</sub> Required fields</span>
                                                                                </p>
                                                                                <div class="feedback-btn pb-15">
                                                                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">Close</a>
                                                                                    <a href="#">Submit</a>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                <!-- Feedback Area End Here -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>   
                                    <!-- Quick View | Modal Area End Here -->
                                </div>
                            </div>
                        </div>

                       
                    </div>
                </div>
            </div>

            <?php if($product['bidding_avail']=='on'){ ?>
                  <div class="container">
                        <div class="li-section-title">
                                <h2>
                                    <span>Bidding Available</span>
                                </h2>
                        </div>
                        <div class="bid-comment-sec">
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="product-description">
                                    <span>Bidding available for this product, You can enter your bidding date to continue.</span>
                                    </div>  
                                    <?php  if (empty($this->id)) { ?>
                                         <h6><a href="<?php echo base_url(); ?>ShopController/CustomerLoginRegister" target="_blank">Sign in</a> to Join Bidding</h6>   
                                    <?php } else{?>    
                                        <label>Enter your bidding amount : </label>
                                        <div class="input-group ">
                                        <input type="text" class="form-control" placeholder="Bidding Amount" id="biddingamount" name="biddingamount">
                                        <div class="input-group-append">
                                        <span class="input-group-text pointer" onclick="submitbidding(<?php echo $this->id; ?>,<?php echo $product['product_id']; ?>,<?php echo $product['user_id']; ?>)">Submit</span>
                                        </div>
                                    <?php } ?>

                                    <div id="toast"><div id="img"><i class="fa fa-save"></i></div><div id="desc">Bidding Request Successful..</div></div>
                                </div>
                                </div>
                              
                            </div>
                           
                            </div>
                        </div>
                        
                  </div>  
                  
                  <!-- biddings list  -->
                  <div class="container">
                        <div class="li-section-title mt-30 mb-20">
                                <h2>
                                    <span>Top Bidding </span>
                                </h2>
                        </div>
                        <div class="bid-comment-sec">
                            
                            <div class="row">                              
                              
                                <div class="col-md-12">
                                     <div class="bidding-box">
                                         <script>loadbidding(<?php echo $product['product_id']; ?>);</script>
                                         <div id="biddings-list"></div>
                                     </div>
                                </div>
                            </div>
                           
                            </div>
                        </div>
                        
                  </div>  
                                   
            <?php } ?>
            <!-- Product Area End Here -->
            <!-- Begin Li's Laptop Product Area -->
            <section class="product-area li-laptop-product pt-30 pb-50">
                <div class="container">
                    <div class="row">
                        <!-- Begin Li's Section Area -->
                        <div class="col-lg-12">
                            <div class="li-section-title">
                                <h2>
                                    <span>Related Products </span>
                                </h2>
                            </div>
                            <div class="row">
                                <div class="product-active owl-carousel">
                                    <?php foreach($relatedproducts as $relatedproduct){ ?>
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <div class="single-product-wrap">
                                            <div class="aspect-ratio aspect-ratio-1-1 img-frame">
                                                <a href="<?php echo base_url() ?>ShopController/ProductSingle/<?php echo $relatedproduct['product_id']; ?>">
                                                    <img src="<?php echo base_url();?>/uploads/<?php echo $relatedproduct['image']; ?>" class="fit-img" alt="Product Image">
                                                </a>
                                                <span class="sticker">New</span>
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="<?php echo base_url() ?>ShopController/SellerSingle/<?php echo $relatedproduct['user_id']; ?>" target="_blank"><?php echo $relatedproduct['companyname']; ?></a>
                                                        </h5>
                                                        <div class="rating-box">
                                                           <!-- call rating starts                                                         -->
                                                                <?php
                                                                    $productid = $relatedproduct['product_id'];
                                                                    $rating = $this->Shop_Model->getRating($productid); 
                                                                    include('includes/rating_sec.php');
                                                                ?>   
                                                            <!-- call rating ends here -->
                                                        </div>
                                                    </div>
                                                    <h4><a class="product_name" href="<?php echo base_url() ?>ShopController/ProductSingle/<?php echo $relatedproduct['product_id']; ?>"><?php echo substr($relatedproduct['product_name'], 0, 35).'...' ?></a></h4>
                                                    <div class="price-box">
                                                        <span class="old-price"><del><i class="fa fa-rupee"></i> <?php echo $relatedproduct['original_rate']; ?></del></span>
                                                        <span class="new-price"><i class="fa fa-rupee"></i> <?php echo $relatedproduct['selling_rate']; ?></span>
                                                    </div>
                                                   
                                                </div>
                                                <div class="add-actions">
                                                    <ul class="add-actions-link">
                                                    <li class="add-cart active" onclick="addtocart(<?php echo $relatedproduct['product_id'] ?>,<?php echo $relatedproduct['selling_rate'] ?>,<?php echo $relatedproduct['shipping_charge'] ?>)">Add to cart</li>
                                                                    <li onclick="quickview(<?php echo $relatedproduct['product_id'] ?>)"><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                                                    <li onclick="addtowishlist(<?php echo $relatedproduct['product_id'] ?>)"><a class="links-details"><i class="fa fa-heart-o"></i></a></li>
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
                        <!-- Li's Section Area End Here -->
                    </div>
                </div>
            </section>
            <!-- Li's Laptop Product Area End Here -->
            <!-- Begin Footer Area -->

            <?php } ?>


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
                // zoom script  

                                            $(function() {

var native_width = 0;
var native_height = 0;
var mouse = {x: 0, y: 0};
var magnify;
var cur_img;

var ui = {
  magniflier: $('.magniflier')
};

// Add the magnifying glass
if (ui.magniflier.length) {
  var div = document.createElement('div');
  div.setAttribute('class', 'glass');
  ui.glass = $(div);

  $('body').append(div);
}


// All the magnifying will happen on "mousemove"

var mouseMove = function(e) {
  var $el = $(this);

  // Container offset relative to document
  var magnify_offset = cur_img.offset();

  // Mouse position relative to container
  // pageX/pageY - container's offsetLeft/offetTop
  mouse.x = e.pageX - magnify_offset.left;
  mouse.y = e.pageY - magnify_offset.top;
  
  // The Magnifying glass should only show up when the mouse is inside
  // It is important to note that attaching mouseout and then hiding
  // the glass wont work cuz mouse will never be out due to the glass
  // being inside the parent and having a higher z-index (positioned above)
  if (
    mouse.x < cur_img.width() &&
    mouse.y < cur_img.height() &&
    mouse.x > 0 &&
    mouse.y > 0
    ) {

    magnify(e);
  }
  else {
    ui.glass.fadeOut(100);
  }

  return;
};

var magnify = function(e) {

  // The background position of div.glass will be
  // changed according to the position
  // of the mouse over the img.magniflier
  //
  // So we will get the ratio of the pixel
  // under the mouse with respect
  // to the image and use that to position the
  // large image inside the magnifying glass

  var rx = Math.round(mouse.x/cur_img.width()*native_width - ui.glass.width()/2)*-1;
  var ry = Math.round(mouse.y/cur_img.height()*native_height - ui.glass.height()/2)*-1;
  var bg_pos = rx + "px " + ry + "px";
  
  // Calculate pos for magnifying glass
  //
  // Easy Logic: Deduct half of width/height
  // from mouse pos.

  // var glass_left = mouse.x - ui.glass.width() / 2;
  // var glass_top  = mouse.y - ui.glass.height() / 2;
  var glass_left = e.pageX - ui.glass.width() / 2;
  var glass_top  = e.pageY - ui.glass.height() / 2;
  //console.log(glass_left, glass_top, bg_pos)
  // Now, if you hover on the image, you should
  // see the magnifying glass in action
  ui.glass.css({
    left: glass_left,
    top: glass_top,
    backgroundPosition: bg_pos
  });

  return;
};

$('.magniflier').on('mousemove', function() {
  ui.glass.fadeIn(200);
  
  cur_img = $(this);

  var large_img_loaded = cur_img.data('large-img-loaded');
  var src = cur_img.data('large') || cur_img.attr('src');

  // Set large-img-loaded to true
  // cur_img.data('large-img-loaded', true)

  if (src) {
    ui.glass.css({
      'background-image': 'url(' + src + ')',
      'background-repeat': 'no-repeat'
    });
  }

  // When the user hovers on the image, the script will first calculate
  // the native dimensions if they don't exist. Only after the native dimensions
  // are available, the script will show the zoomed version.
  //if(!native_width && !native_height) {

    if (!cur_img.data('native_width')) {
      // This will create a new image object with the same image as that in .small
      // We cannot directly get the dimensions from .small because of the 
      // width specified to 200px in the html. To get the actual dimensions we have
      // created this image object.
      var image_object = new Image();

      image_object.onload = function() {
        // This code is wrapped in the .load function which is important.
        // width and height of the object would return 0 if accessed before 
        // the image gets loaded.
        native_width = image_object.width;
        native_height = image_object.height;

        cur_img.data('native_width', native_width);
        cur_img.data('native_height', native_height);

        //console.log(native_width, native_height);

        mouseMove.apply(this, arguments);

        ui.glass.on('mousemove', mouseMove);
      };


      image_object.src = src;
      
      return;
    } else {

      native_width = cur_img.data('native_width');
      native_height = cur_img.data('native_height');
    }
  //}
  //console.log(native_width, native_height);

  mouseMove.apply(this, arguments);

  ui.glass.on('mousemove', mouseMove);
});

ui.glass.on('mouseout', function() {
  ui.glass.off('mousemove', mouseMove);
});

});
            </script>
           
               
                <?php include('shop_footer_user.php') ?>
