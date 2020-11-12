<div class="shop-products-wrapper">
                 <div class="tab-content">
                     <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                         <div class="product-area shop-product-area">
                             <div class="row">

                             <?php
                                foreach($results as $products) { ?>
                               
                               
                                <script>
                                    var categoryid = <?php echo $products['category_id'] ?>
                             //    document.getElementById("categoryid").value=""
                                </script>
                                
                                 <div class="col-lg-4 col-md-4 col-sm-6 mt-40">
                                     <!-- single-product-wrap start -->
                                     <div class="single-product-wrap">
                                         <div class="aspect-ratio aspect-ratio-1-1 img-frame">
                                             <a href="<?php echo base_url() ?>ShopController/ProductSingle/<?php echo $products['product_id'] ?>" target="_blank">
                                                 <img src="<?php echo base_url() ?>uploads/<?php echo $products['image'] ?>" alt=" Product Image" class="fit-img">
                                             </a>
                                             <span class="sticker">New</span>
                                             <?php  if($products['status']==0){ ?>
                                                            <span class="uavail-badge d-block mx-auto">Temporarily Unavailable</span>
                                                            <?php } ?>
                                                            <?php  if($products['stock']==0){ ?>
                                                            <span class="outvail-badge d-block mx-auto">Out Of Stock</span>
                                                            <?php } ?>
                                         </div>
                                         <div class="product_desc">
                                             <div class="product_desc_info">
                                                 <div class="product-review">
                                                     <h5 class="manufacturer">
                                                         <a href="<?php echo base_url() ?>ShopController/SellerSingle/<?php echo $products['product_id'] ?>"><?php echo $products['companyname']; ?></a>
                                                     </h5>
                                                     <div class="rating-box">
                                                         <ul class="rating">
                                                             <!-- call rating starts                                                         -->
                                                             <?php
                                                                $productid = $products['product_id'];
                                                                $rating = $this->Shop_Model->getRating($productid); 
                                                                include('includes/rating_sec.php');
                                                                ?>   
                                                            <!-- call rating ends here -->     
                                                         </ul>
                                                     </div>
                                                 </div>
                                                 <h4><a class="product_name" href="<?php echo base_url() ?>ShopController/ProductSingle/<?php echo $products['product_id'] ?>"><?php echo substr($products['product_name'], 0, 30) ?></a></h4>
                                                 <div class="price-box">
                                                     <span class="price2"><del><i class="fa fa-rupee"></i> <?php echo $products['original_rate'] ?></del></span> 
                                                     <span class="new-price"><i class="fa fa-rupee"></i> <?php echo $products['selling_rate'] ?></span>
                                                 </div>
                                             </div>
                                             <div class="add-actions">
                                                 <ul class="add-actions-link">
                                                 <ul class="add-actions-link">
                                                                    <?php if($products['status']==1 && $products['stock']>=1){ ?>
                                                                        <li class="add-cart active" onclick="addtocart(<?php echo $products['product_id'] ?>,<?php echo $products['selling_rate'] ?>,<?php echo $products['shipping_charge'] ?>)">Add to cart</li>
                                                                    <?php } ?>
                                                                    
                                                     <li onclick="quickview(<?php echo $products['product_id'] ?>)"><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                                     <li onclick="addtowishlist(<?php echo $products['product_id'] ?>)"><i class="fa fa-heart-o"></i></li>
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
                                                            <a href="<?php echo base_url() ?>ShopController/ProductSingle/<?php echo $products['product_id']; ?>">
                                                                <img src="<?php echo base_url() ?>uploads/<?php echo $products['image'] ?>" alt="Product Image" class="fit-img">
                                                            </a>
                                                            <span class="sticker">New</span>
                                                            <?php  if($products['status']==0){ ?>
                                                            <span class="uavail-badge d-block mx-auto">Temporarily Unavailable</span>
                                                            <?php } ?>
                                                            <?php  if($products['stock']==0){ ?>
                                                            <span class="outvail-badge d-block mx-auto">Out Of Stock</span>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5 col-md-7">
                                                        <div class="product_desc">
                                                            <div class="product_desc_info">
                                                                <div class="product-review">
                                                                    <h5 class="manufacturer">
                                                                        <a href="<?php echo base_url() ?>ShopController/SellerSingle/<?php echo $products['user_id']; ?>"><?php echo $products['companyname']; ?></a>
                                                                    </h5>
                                                                    <div class="rating-box">
                                                                        <!-- call rating starts                                                         -->
                                                                            <?php
                                                                            $productid = $products['product_id'];
                                                                            $rating = $this->Shop_Model->getRating($productid); 
                                                                            include('includes/rating_sec.php');
                                                                            ?>   
                                                                        <!-- call rating ends here -->        

                                                                    </div>
                                                                </div>
                                                                <h4><a class="product_name" href="<?php echo base_url() ?>ShopController/ProductSingle/<?php echo $products['product_id']; ?>"><?php echo $products['product_name'] ?></a></h4>
                                                                <div class="price-box">
                                                                    <span class="old-price"><del><i class="fa fa-rupee"></i> <?php echo $products['original_rate'] ?></del></span>
                                                                    <span class="new-price"><i class="fa fa-rupee"></i> <?php echo $products['selling_rate'] ?></span>
                                                                </div>
                                                                <p><?php echo substr($products['description']  , 0, 40) ?></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="shop-add-action mb-xs-30">
                                                            <ul class="add-actions-link">
                                                                <?php if($products['status']==1 && $products['stock']>=1){ ?>
                                                                    <li class="add-cart active" onclick="addtocart(<?php echo $products['product_id'] ?>,<?php echo $products['selling_rate'] ?>,<?php echo $products['shipping_charge'] ?>)">Add to cart</li>
                                                                <?php } ?>
                                                                <li class="wishlist" onclick="addtowishlist(<?php echo $products['product_id'] ?>)"><i class="fa fa-heart-o"></i>Add to wishlist</li>
                                                                <li onclick="quickview(<?php echo $products['product_id'] ?>)"><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter" href="#"><i class="fa fa-eye"></i>Quick view</a></li>
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
                                 <p>Showing 1-12 of 13 item(s)</p>
                             </div>
                             <div class="col-lg-6 col-md-6">

                                 <div class="pagination-sec">
                                     <!-- <span><?php echo $links; ?></span> -->
                                 </div>
                                 
                             </div>
                         </div>
                     </div>
                 </div>
             </div>