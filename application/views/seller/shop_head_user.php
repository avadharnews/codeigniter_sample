<!doctype html>
<html class="no-js" lang="zxx">    
<!-- index28:48-->
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Margin Free Shop</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">
        <!-- Material Design Iconic Font-V2.2.0 -->
        <link rel="stylesheet" href="<?php echo base_url();?>css/material-design-iconic-font.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url();?>css/font-awesome.min.css">
        <!-- Font Awesome Stars-->
        <link rel="stylesheet" href="<?php echo base_url();?>css/fontawesome-stars.css">
        <!-- Meanmenu CSS -->
        <link rel="stylesheet" href="<?php echo base_url();?>css/meanmenu.css">
        <!-- owl carousel CSS -->
        <link rel="stylesheet" href="<?php echo base_url();?>css/owl.carousel.min.css">
        <!-- Slick Carousel CSS -->
        <link rel="stylesheet" href="<?php echo base_url();?>css/slick.css">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="<?php echo base_url();?>css/animate.css">
        <!-- Jquery-ui CSS -->
        <link rel="stylesheet" href="<?php echo base_url();?>css/jquery-ui.min.css">
        <!-- Venobox CSS -->
        <link rel="stylesheet" href="<?php echo base_url();?>css/venobox.css">
        <!-- Nice Select CSS -->
        <link rel="stylesheet" href="<?php echo base_url();?>css/nice-select.css">
        <!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="<?php echo base_url();?>css/magnific-popup.css">
        <!-- Bootstrap V4.1.3 Fremwork CSS -->
        <link rel="stylesheet" href="<?php echo base_url();?>css/bootstrap.min.css">
        <!-- Helper CSS -->
        <link rel="stylesheet" href="<?php echo base_url();?>css/helper.css">
        <!-- Main Style CSS -->
        <link rel="stylesheet" href="<?php echo base_url();?>css/style.css">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="<?php echo base_url();?>css/responsive.css">
        <!-- Modernizr js -->
        <script src="<?php echo base_url();?>js/vendor/modernizr-2.8.3.min.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <script src="<?php echo base_url();?>/js/jquery-3.5.1.min.js"></script>
        <script src="<?php echo base_url();?>/js/jquery-3.5.1.min.js"></script>
        <script src="<?php echo base_url();?>/ajax/ajax_seller.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/sweetalert2/6.4.3/sweetalert2.min.css" rel="stylesheet"/>
        <script src="https://cdn.jsdelivr.net/sweetalert2/latest/sweetalert2.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

        <script type='text/javascript'>
            var baseURL= "<?php echo base_url();?>";
        </script>
    </head>
    <body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
        <!-- Begin Body Wrapper -->
        <style></style>
        <div class="body-wrapper">
            <!-- Begin Header Area -->
            <header>
                <!-- Begin Header Top Area -->
                <div class="header-top">
                    <div class="container">
                        <div class="row">
                            <!-- Begin Header Top Left Area -->
                            <div class="col-lg-3 col-md-4">
                                <div class="header-top-left">
                                    <ul class="phone-wrap">
                                        <!-- <li></li> -->
                                    </ul>
                                </div>
                            </div>
                            <!-- Header Top Left Area End Here -->
                            <!-- Begin Header Top Right Area -->
                            <div class="col-lg-9 col-md-8">
                                <div class="header-top-right">
                                    <ul class="ht-menu">
                                        <!-- Begin Setting Area -->
                                        <li><span style="text-transform: capitalize;"><?php echo  $this->utype; ?> Dashboard</span></li>
                                        <li>
                                            <div class="ht-setting-trigger"><span>Setting</span></div>
                                            <div class="setting ht-setting">
                                                <ul class="ht-setting-list">
                                                    <li><a href="<?php echo base_url();?>ShopController/MyAccount">My Account</a></li>
                                                    <li><a href="<?php echo base_url();?>ShopController/Checkout">Checkout</a></li>
                                                    <li><a href="<?php echo base_url();?>SellerController/logout">Sign Out</a></li>
                                                    <li><a href="<?php echo base_url();?>ShopController/SellerLoginRegister">Sellers Zone</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <!-- Setting Area End Here -->
                                        <!-- Begin Currency Area -->
                                        <li>
                                        <span><b>Sigin with : </b><?php echo $sessionname= $this->email; ?></span>
                                        </li>
                                        <!-- Currency Area End Here -->
                                        <!-- Begin Language Area -->
                                        
                                        <!-- Language Area End Here -->
                                    </ul>
                                </div>
                            </div>
                            <!-- Header Top Right Area End Here -->
                        </div>
                    </div>
                </div>
                <!-- Header Top Area End Here -->
                <!-- Begin Header Middle Area -->
                <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
                    <div class="container">
                        <div class="row">
                            <!-- Begin Header Logo Area -->
                            <div class="col-lg-3">
                                <div class="logo pb-sm-30 pb-xs-30">
                                    <a href="<?php echo base_url();?>">
                                        <img src="<?php echo base_url();?>images/menu/logo/1.jpg" alt="">
                                    </a>
                                </div>
                            </div>
                            <!-- Header Logo Area End Here -->
                            <!-- Begin Header Middle Right Area -->
                            <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                               
                                <!-- Header Middle Searchbox Area End Here -->
                                <!-- Begin Header Middle Right Area -->
                               
                                <!-- Header Middle Right Area End Here -->
                            </div>
                            <!-- Header Middle Right Area End Here -->
                        </div>
                    </div>
                </div>
                <!-- Header Middle Area End Here -->
                <!-- Begin Header Bottom Area -->
          
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

            <style>
                .hb-menu nav > ul > li > a::after {
    content: "";
    position: absolute;
    top: 8px;
    right: 15px;
    font-family: fontawesome;
    font-size: 18px;
    transition: all 0.3s ease-in-out;
    color: #242424;
}
            </style>