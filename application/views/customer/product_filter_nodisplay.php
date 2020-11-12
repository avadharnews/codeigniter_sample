


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
<!-- Begin Li's Breadcrumb Area -->
<div class="breadcrumb-area">
 <div class="container">
     <div class="breadcrumb-content">
         <ul>
             <li><a href="<?php echo base_url();?>">Home</a></li>
             <li class="active">Shop by Category</li>
         </ul>
     </div>
 </div>
</div>
<!-- Li's Breadcrumb Area End Here -->
<!-- Begin Li's Content Wraper Area -->
<div class="content-wraper pt-60 pb-60 pt-sm-30">
 <div class="container">
     <div class="row">
         <div class="col-lg-12 order-1 order-lg-2">
            
             <div class="row">
                 <div class="col-md-5"></div>
                 <div class="col-md-2">
                     <div class="nopr">
                        <img src="<?php echo base_url(); ?>images/icons/nopr.jpg" class="mx-auto d-block img-fluid">             
                        <h3 class="text-center">Sorry !</h3>
                        <h6 class="text-center">No Products</h6>
                     </div>
                 </div>
             </div>
             <!-- shop-products-wrapper end -->
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
<div class="loaderws" id="loader-wrapper">
 
 <div id="loading" class="center-block"></div><br>
 <h1>Loading Please Wait</h1>
</div>