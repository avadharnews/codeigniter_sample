<script src="<?php echo base_url();?>/js/jquery-3.5.1.min.js"></script>
<?php include_once('shop_head_user.php') ?>

<div class="container-fluid min-he">
    <div class="row">
        <div class="col-md-2">
           <?php include_once('left_menu_user.php') ?>
        </div>
        <div class="col-md-10">
        <div>
                <div class="row">
                    <div class="col-md-12">
                        
                        <div class="panel panel-defaults">
                        <h4>Pin Management</h4>
                        <h6>Add location you have possible to ship.</h6>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label>PIN Code : </label>
                                <input type="number" id="pincode" class="form-control" placeholder="Enter PIN code">
                                <br>
                                <button class="btn btn-danger" onclick="savepin()"><i class="fa fa-save"></i> Save PIN</button>
                            </div>
                        </div>

                       
                        </div>
    
                    </div>
         
                </div>
        </div>
    </div>
</div>


     
        </div>
    </div>
   
</div>          
          
<div class="clearfix"></div>

<?php include_once('shop_footer_user.php') ?>