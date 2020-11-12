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
                               

                                <div class="col-md-6">
                                <input type="text" class="form-control" style="display: none;" placeholder="Product Name" id="productid" name="productid" value="<?php echo $product['product_id']; ?>">
                                                <label><span>*</span>Product Name</label>
                                                <input type="text" class="form-control" placeholder="Product Name" id="productname" name="productname" value="<?php echo $product['product_name']; ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label><span>*</span>Original Rate</label>
                                                <input type="text" class="form-control" placeholder="Original Rate" id="originalserate" name="originalserate" value="<?php echo $product['seller_original_rate']; ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label><span>*</span>Selling Rate</label>
                                                <input type="text" class="form-control" placeholder="Selling Rate" id="sellingrate" name="sellingrate" value="<?php echo $product['seller_selling_rate']; ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label><span>*</span>Shipping Charge</label>
                                                <input type="text" class="form-control" placeholder="Shipping Charge" id="shippingrate" name="shippingrate" value="<?php echo $product['shipping_charge']; ?>">
                                            </div>
                                            <div class="col-md-6">
                                                <label><span>*</span>Qauntity</label>
                                                <div class="row">
                                                    <div class="col-md">
                                                       <input type="text" class="form-control" placeholder="Quantity" id="quantity" name="quantity" value="<?php echo $product['quantity']; ?>">
                                                    </div>
                                                    <div class="col-md">
                                                       <select id="unit" name="unit">
                                                           <option value="">Select Unit</option>
                                                           <option value="gram" <?php if ($product['unit'] == 'gram' ) echo 'selected' ; ?>>Gram</option>
                                                           <option value="kg" <?php if ($product['unit'] == 'kg' ) echo 'selected' ; ?>>Kg</option>
                                                           <option value="nos" <?php if ($product['unit'] == 'nos' ) echo 'selected' ; ?>>NOS</option>
                                                       </select>
                                                    </div>
                                                </div>
                                            </div>

                                            
                                            <div class="col-md-6">
                                                <label>Return Policy(Days)</label>
                                                <input type="number" class="form-control" placeholder="Enter return validity" id="return" name="return" value="<?php echo $product['return_policy']; ?>">
                                            </div>

                                            <div class="col-md-12">
                                                <label><span>*</span>Product Description</label>
                                                <textarea class="form-control" placeholder="Product describtion" id="description" name="description"><?php echo $product['description']; ?></textarea>
                                            </div>
                                 
                                            <div class="col-md-12">
                                                <label value="0">Parent Category</label>                                               
                                                <div class="check-con">
                                                <?php
                                                $selected_pro = $product['category_id'];
                                                ?>                                        
                                                <div class="row">
                                                <?php foreach($category as $user){ ?>                                                    
                                                     <div class="col-md-6">
                                                     <div class="row">
                                                                            <div class="col-md-3">
                                                                                <input type="checkbox" id="cattegoryid" name="cattegoryid[]" value="<?php echo $user['categoryid'] ?>" style="margin-left: 15px;">
                                                                            </div>
                                                                            <div class="col-md-9">
                                                                                <p><?php echo $user['categoryname'] ?></span>
                                                                            </div>
                                                                      </div>
                                                     </div>   
                                                <?php } ?>
                                                </div>                                                          
                                                <?php
                                                 $str_arr = explode (",", $product['category_id']);  
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




                                        

                                            <div class="col-md-12">
                                            <br>
                                                 <h5>Inventory (Stock)</h5>                                         
                                                        
                                                 <div class="row">
                                                     <div class="col-md-6"> 
                                                        <label>Number of Items</label>                                                       
                                                        <input type="number" class="form-control" placeholder="" name="stock" id="stock" value="<?php echo $product['stock'] ?>">
                                                     </div>
                                                 </div>               
                                            </div>

                                            <div class="col-md-12">
                                                <br>
                                                 <h5>SEO (Keywords)</h5>                                         
                                                        
                                                 <div class="row">
                                                     <div class="col-md-12"> 
                                                        <label>Keywords</label>                                                       
                                                        <textarea class="form-control" placeholder="Enter keywords related to your project, Separate each keyword with commas ( , )" id="keywords" name="keywords"><?php echo $product['keywords'] ?></textarea>
                                                     </div>
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
                    <form method="post" id="upload_form_image"  enctype="multipart/form-data" class="form-panel">
                       <div class="image-peview">
                       <div class="aspect-ratio aspect-ratio-1-1 img-frame">
                           <img id="blah" src="<?php echo base_url();?>uploads/<?php echo $product['image']; ?>"  class="fit-img" alt="your image" />
                       </div>    
                           <label class="text-center">Change Image</label>
                           <div class="row">
                               <div class="col-md-6">
                               <input type="text" class="form-control" style="display: none;" placeholder="Product Name" id="productid" name="productid" value="<?php echo $product['product_id']; ?>">

                               <label class="custom-file-upload btn btn-warning btn-sm"><i class="fa fa-file-upload"></i>Change Image
                                    <input type="file" class="form-control btn-sm" name="image_file" onchange="readURL(this);"  id="image_file" / >
                               </label>
                               </div>
                               <div class="col-md">
                                    <button type="submit" class="btn btn-danger btn-sm btn-saveup">Save</button>
                               </div>
                           </div>    
                           <!-- <br> -->
                           
                           
                        </div>
                    </form>    
                
        </div>
    </div>
</div>


                
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
            var return_val = $('#return').val();

            // alert(sellingrate,quantity)

            
          if($('#productname').val() == '' || $('#cattegoryid').val() == '' || $('#originalserate').val() == '' || $('#sellingrate').val() == '' || $('#quantity').val() == '' ||  $('#unit').val() == '' || $('#shippingrate').val()=='' || $('#keywords').val() == '' || $('#stock').val() == '')
            {
                        swal({
                                 title: "Warning",
                                 text: "Please Fill All Fields",
                                 type: "warning",
                                 confirmButtonClass: "btn-danger",
                            })
            }

            else if(return_val<0 || return_val>30){
                swal({
                    title: "Warning",
                    text: "Return policy between 0 to 30 Days",
                    type: "warning",
                    confirmButtonClass: "btn-danger",
                    })
            }

            else if($.isNumeric(originalserate && sellingrate && quantity && shippingrate)){
                        
             $.ajax({
                    url:"<?php echo base_url(); ?>/SellerController/editProductApi",
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
            else
            {
                swal({
                                 title: "Warning",
                                 text: "Incorrect numeric values in Amount and Quantity",
                                 type: "warning",
                                 confirmButtonClass: "btn-danger",
                            })
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

<?php include_once('shop_footer_user.php') ?>