<script src="<?php echo base_url();?>/ajax/ajax_seller.js"></script>
<script type='text/javascript'>
    var baseURL= "<?php echo base_url();?>";
</script>
<script src="<?php echo base_url();?>/js/jquery-3.5.1.min.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/sweetalert2/6.4.3/sweetalert2.min.css" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/sweetalert2/latest/sweetalert2.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<?php include_once('shop_head.php') ?>
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
         
            <!-- Li's Breadcrumb Area End Here -->
            <!-- Begin Login Content Area -->

            <br>
            <div class="page-section mb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30 mt-65">
                            <!-- Login Form s-->
                            <form action="<?php echo base_url('SellerController/LoginSeller') ?>" method="post" accept-charset="utf-8" >
                                <div class="login-form">
                                    <h4 class="login-title">Login</h4>
                                    <div class="row">
                                        <div class="col-md-12 col-12 mb-20">
                                            <label>Email Address*</label>
                                            <input class="mb-0" type="email" placeholder="Email Address" name="email">
                                            <?php echo form_error('email'); ?> 
                                        </div>
                                        <div class="col-12 mb-20">
                                            <label>Password</label>
                                            <input class="mb-0" type="password" placeholder="Password" name="password">
                                            <?php echo form_error('password'); ?> 
                                        </div>
                                        <div class="col-md-8">
                                            <div class="check-box d-inline-block ml-0 ml-md-2 mt-10">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-10 mb-20 text-left text-md-right">
                                            <a href="#"> Forgotten pasward?</a>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="register-button mt-0">Login</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>



                        <!-- <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                                <div class="login-form">
                                    <h4 class="login-title">Register</h4>
                                    <div class="row">
                                       <div class="col-md-12 col-12 mb-20">
                                            <label>Company/Shop Name</label>
                                            <input class="mb-0" type="text" placeholder="Company/Shop Name" name="companyname" id="companyname">
                                        </div>
                                        <div class="col-md-6 col-12 mb-20">
                                            <label>First Name</label>
                                            <input class="mb-0" type="text" placeholder="First Name" name="fname" id="fname">
                                        </div>
                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Last Name</label>
                                            <input class="mb-0" type="text" placeholder="Last Name" name="lname" id="lname">
                                        </div>
                                        <div class="col-md-12 mb-20">
                                            <label>Email Address*</label>
                                            <input class="mb-0" type="email" placeholder="Email Address" name="email" id="email">
                                        </div>
                                        <div class="col-md-6 mb-20">
                                            <label>Phone</label>
                                            <input class="mb-0" type="text" placeholder="Phone Number" name="phone_no" id="phone">
                                        </div>
                                        <div class="col-md-6 mb-20">
                                            <label>Pin Code</label>
                                            <input class="mb-0" type="text" placeholder="Pin Code" name="pin" id="pin">
                                        </div>
                                        <div class="col-md-6 mb-20">
                                            <label>Select Country </label>
                                            <select name="state" id="countySel"   class=" mb-0 form-control" >
                                               <option value="" selected="selected">Select Country</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-20">
                                            <label>Select State </label>
                                            <select class="form-control mb-0" name="countrya" id="stateSel" >
                                               <option value="" selected="selected">Please select Country first</option>
                                            </select>                                  
                                  
                                         </div>


                                         <div class="col-md-6 mb-20">
                                          <label>Select District </label>
                                           <select class="form-control mb-0" name="district" id="districtSel" >
                                              <option value="" selected="selected">Please select State first</option>
                                           </select>                               
                                        </div>
                                        <div class="col-12">
                                            <label>Address</lanbel>
                                            <textarea class="form-control" placeholder="Enter Your Address" name="address" id="address"></textarea>
                                        </div>
                                        <div class="col-12">
                                            <button class="register-button mt-0" onclick="registerseller()">Register</button>
                                        </div>
                                        </div>
                                        </div>
                                      
                                       
                                    </div>
                                </div>
                        </div> -->











                        <!-- <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                            <form action="<?php echo base_url('auth/post_register') ?>" method="post" accept-charset="utf-8">
                                <div class="login-form">
                                    <h4 class="login-title">Register</h4>
                                    <div class="row">
                                        <div class="col-md-6 col-12 mb-20">
                                            <label>First Name</label>
                                            <input class="mb-0" type="text" placeholder="First Name" name="fname">
                                            <?php echo form_error('first_name'); ?>   
                                        </div>
                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Last Name</label>
                                            <input class="mb-0" type="text" placeholder="Last Name" name="lname">
                                            <?php echo form_error('last_name'); ?>   
                                        </div>
                                        <div class="col-md-12 mb-20">
                                            <label>Email Address*</label>
                                            <input class="mb-0" type="email" placeholder="Email Address" name="email">
                                            <?php echo form_error('email'); ?>                                         </div>
                                        <div class="col-md-6 mb-20">
                                            <label>Phone</label>
                                            <input class="mb-0" type="text" placeholder="Phone Number" name="phone_no">
                                            <?php echo form_error('contact_no'); ?> 
                                        </div>
                                        <div class="col-md-6 mb-20">
                                            <label>Select Country </label>
                                            <select name="state" id="countySel"   class=" mb-0 form-control" >
                                               <option value="" selected="selected">Select Country</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-20">
                                            <label>Select State </label>
                                            <select class="form-control mb-0" name="countrya" id="stateSel" >
                                               <option value="" selected="selected">Please select Country first</option>
                                            </select>                                  
                                  
                                         </div>


                                         <div class="col-md-6 mb-20">
                                          <label>Select District </label>
                                           <select class="form-control mb-0" name="district" id="districtSel" >
                                              <option value="" selected="selected">Please select State first</option>
                                           </select>                               
                                        </div>
                                        <div class="col-12">
                                            <label>Address</lanbel>
                                            <textarea class="form-control" placeholder="Enter Your Address" name="address"></textarea>
                                        </div>
                                        <div class="col-12">
                                            <button class="register-button mt-0" type="submit">Register</button>
                                        </div>
                                        </div>
                                        </div>
                                      
                                       
                                    </div>
                                </div>
                            </form>
                        </div> -->
                    </div>
                </div>
            </div>
            <!-- Login Content Area End Here -->
          

