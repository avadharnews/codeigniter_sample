<script src="<?php echo base_url();?>/js/jquery-3.5.1.min.js"></script>
<?php include_once('shop_head_user.php') ?>

<div class="container-fluid min-he">
    <div class="row">
        <div class="col-md-2">
           <?php include_once('left_menu_user.php') ?>
        </div>
        <div class="col-md-10">
       
                <div class="row">
                    <div class="col-md-9">
                        <?php foreach($products as $product){  ?>
                        <div class="panel panel-defaults">
                        <form method="post" id="upload_form"  enctype="multipart/form-data" class="form-panel">
                        <h3>Edit Product</h3>
                        <h6>Sale your product completely free</h6>
                        <div class="row">
                               
                             
                                        
                                            <div class="col-md-12">
                                                <br>
                                            <h5><?php echo $product['product_name']; ?></h5>
                                            <br>
                                                <div class="row">
                                                <?php foreach($specifications as $attribute){
                                                      $attributeid = $attribute['id'];
                                                      $subattribute = $this->Seller_Model->getSubattributes($attributeid);          
                                                      $data['subattribute'] = $subattribute;
                                                    ?>                                                    
                                                    <div class="col-md-4">
                                                        <h6><?php echo $attribute['attribute_name']; ?></h6>   
                                                        <div class="check-con">                                               
                                                            <div class="row">                                                                    
                                                                <div class="col-md-12">
                                                                <input type="text" class="form-control" style="display: none;" placeholder="Product Name" id="productid" name="productid" value="<?php echo $product['product_id']; ?>">

                                                                    <?php foreach($subattribute as $subattributes){ ?>   
                                                                        <div class="row">
                                                                            <div class="col-md-3">
                                                                                <input type="checkbox" id="attributes" name="attributes[]" value="<?php echo $subattributes['sub_attr_id'] ?>" style="position: relative;top:16px">
                                                                            </div>
                                                                            <div class="col-md-9">
                                                                                <p><?php echo $subattributes['sub_attribute_name'] ?></span>
                                                                            </div>
                                                                      </div>
                                                                    <?php } ?>   
                                                                </div>                                                                   
                                                            </div> 
                                                        </div> <br>
                                                    </div>  
                                                <?php } ?>
                                                </div>
                                                
                                                <br>                                           
                                            </div>
                                 
                                            <div class="col-md-4">
                                                                                                  
                                                <?php
                                                 $str_arr = explode (",", $product['attributes']); 
                                                ?>   
                                                
                                                <!-- set selected values selected  -->
                                                <?php foreach($str_arr as $str_arrs){ ?>
                                                    <script>
                                                         $(":checkbox[value=<?php echo $str_arrs ?>]").prop("checked","true");
                                                    </script>
                                                <?php } ?>
                                               <!-- set selected values selected  -->
                                                
                                                
                                                
                                                </div>
                                            </div>
                                            <div class="col-12">
                                            <br>
                                                <button type="submit" name="upload" id="upload" class="btn btn-danger" >Upload Product</button>
                                            </div>

  


                        </div>

                        </form>


                        </div>
                        <?php } ?>
                        <br><br><br>
                    </div>
                    <div class="col-md-3">
                   
                
        </div>
    </div>
    
</div>

<br>
                
    <script>

function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    // .width(200)
                    // .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }


    $(document).ready(function(){
        $('#loading').hide();            

        $('#upload_form').on('submit', function(e){
            e.preventDefault();

            var originalserate = $('#originalserate').val();
            var sellingrate = $('#sellingrate').val();
            var quantity = $('#quantity').val();
            var shippingrate = $('#shippingrate').val();

            // alert(sellingrate,quantity)

            
          if($('#attributes').val() == '')
            {
                        swal({
                                 title: "Warning",
                                 text: "Please Fill All Fields",
                                 type: "warning",
                                 confirmButtonClass: "btn-danger",
                            })
            }
            else{
                $.ajax({
                    url:"<?php echo base_url(); ?>/SellerController/editProductAttributeApi",
                    method:"POST",
                    data:new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    success:function(response)
                    {
                        
                        if(response==1){
                            swal({
                                 title: "Success",
                                 text: "Product Updated Successfully",
                                 type: "success",
                                 confirmButtonClass: "btn-danger",
                            })
                        }
                        else{
                            swal({
                                 title: "Warning",
                                 text: "Something went wrong in server",
                                 type: "warning",
                                 confirmButtonClass: "btn-danger",
                            })
                        }
                    }
                });
            }

            
        });


        $('#upload_form_image').on('submit', function(e){
            e.preventDefault();           
            
          if($('#image_file').val() == '')
            {
                        swal({
                                 title: "Warning",
                                 text: "Please Change Image File",
                                 type: "warning",
                                 confirmButtonClass: "btn-danger",
                            })
            }
            else {
                        
             $.ajax({
                    url:"<?php echo base_url(); ?>/SellerController/editProductImageApi",
                    //base_url() = http://localhost/tutorial/codeigniter
                    method:"POST",
                    data:new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    success:function(response)
                    {
                        
                        if(response==1){
                            swal({
                                 title: "Success",
                                 text: "Product Updated Successfully",
                                 type: "success",
                                 confirmButtonClass: "btn-danger",
                            })
                        }
                        else{
                            swal({
                                 title: "Warning",
                                 text: "Something went wrong in server",
                                 type: "warning",
                                 confirmButtonClass: "btn-danger",
                            })
                        }
                    }
                });
            }
           
        });
    });


</script>
        </div>
    </div>
   
</div>          
          
<div class="clearfix"></div>

