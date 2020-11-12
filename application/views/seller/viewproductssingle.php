


<?php include_once('shop_head_user.php') ?>

<div class="container-fluid min-he">
    <div class="row">
        <div class="col-md-2">
           <?php include_once('left_menu_user.php') ?>
        </div>
        <div class="col-md-10">
        <form method="post" id="upload_form"  enctype="multipart/form-data" class="form-panel">
                <div class="row">
                    <div class="col-md-12">
                        
                        <div class="panel panel-defaults-si">
                    <?php
                        foreach($products as $product){ ?>
                           <h4><?php echo $product['product_name']; ?></h4>
                           <br>
                           <div class="row">
                               <div class="col-md-4">
                                  <img src="<?php echo base_url();?>uploads/<?php echo $product['image'] ?>" class="img-fluid">
                               </div>
                               <div class="col-md-8">
                                   <h5><?php echo $product['categoryname']; ?></h5>
                                   <h2><del><i class="fa fa-rupee"></i><?php echo $product['original_rate']; ?></del> <i class="fa fa-rupee"></i><?php echo $product['selling_rate']; ?> </h2>
                                  <br>
                                  <h3>Existing Attributes</h3>
                                  <div id="attributes_list"></div>

                                   <h3>Create Attributes</h1>
                                   
                                    <select onchange="loadattributes(<?php echo $product['product_id']; ?>)" id="attribute">
                                            <option>Select Attribute</option>
                                        <?php foreach($specifications as $specification){ ?>
                                            <option value="<?php echo $specification['id']; ?>"><?php echo $specification['attribute_name']; ?></option>
                                        <?php } ?>
                                    </select>

                                    <div id="result"></div>
                                    <br>
                                    <button type="button" class="btn btn-danger" onclick="addattributetoproduct(<?php echo $product['product_id']; ?>)"><i class="fa fa-plus-square"></i> Create Attribute</button>
                                    <br><br>
                                    <h3>Product Description</h3>
                                    <p><?php echo $product['description']; ?></p>
     
                                    <script>
                                        loadAttributes(<?php echo $product['product_id']; ?>);
                                    </script>

                                </div>
                           </div>
                           <h6>Sale your product completely free</h6>
                           <br>
                       
                        </div>
                        <?php } ?>
                    </div>
         
                </form>
        </div>
    </div>
</div>


   
        </div>
    </div>
   
</div>          
          
<div class="clearfix"></div>




<?php include_once('shop_footer_user.php') ?>