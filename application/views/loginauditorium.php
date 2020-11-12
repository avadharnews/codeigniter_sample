
<!DOCTYPE html>
<html lang="en" ng-app="myApp">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Prime matrimonial</title>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="Prime matrimonial">
    <meta name="description" content="Prime matrimonial">
    <link rel="icon" type="image/png" href="images/favicon.png">
    <link href="<?php echo base_url();?>/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <script src="<?php echo base_url();?>/js/script.js"></script>
    <script src="<?php echo base_url();?>/js/sb-admin-2.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Rubik' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Rubik:400' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Clicker Script' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet'>
    <link href="//fonts.googleapis.com/css?family=Raleway:400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/animate.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/css/animation.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/css/mediaqueries.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/css/font-awesome.css" />
    <link href='https://fonts.googleapis.com/css?family=Arimo' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Great+Vibes' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url();?>/css/mediaqueries.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/css/matrimonial.css" />

   
    <script>
        new WOW().init();
    </script>
    <script src="<?php echo base_url();?>/js/script.js"></script>
    <script src="<?php echo base_url();?>/js/locationselector.js"></script>
    <script src="<?php echo base_url();?>/js/TaxiScript.js"></script>
    <script src="<?php echo base_url();?>/js/jquery-3.5.1.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" rel="stylesheet"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/sweetalert2/6.4.3/sweetalert2.min.css" rel="stylesheet"/>
<script src="https://cdn.jsdelivr.net/sweetalert2/latest/sweetalert2.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

</head>
<body>

<?php include('profile_head.php') ?>



<div class="container">
<div class="row" id="loginform" style="margin-top: 100px;">
                <div class="col-md-6 col-md-offset-3">
                   <div class="search-sec">
                       <div id="otpinput">
                       <h4>Login Here</h4>
                       <div class="" >
                       <div class="">
    <form action="<?php echo base_url('AuditoriumController/loginauditoriumowner') ?>" method="post" accept-charset="utf-8">
      <label>Username</label>
      <input class="un form-control" type="text" align="center" name="email" placeholder="email">
      <?php echo form_error('email'); ?> 
      <br>
      <label>Password</label>
      <input class="pass form-control" type="password" align="center" name="password" placeholder="Password">
      <?php echo form_error('password'); ?> 
      <br>
      <button type="submit"  class="submit btn">Sign in</button>
      
     </form>                
    </div>
                       </div>
</div>




   
   <!-- <?php include "block_footer.php";?> -->
   
   
</body>