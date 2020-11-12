<script src="<?php echo base_url();?>/js/jquery-3.5.1.min.js"></script>
<?php include_once('shop_head_user.php') ?>

<div class="container-fluid min-he">
    <div class="row">
        <div class="col-md-2">
           <?php include_once('left_menu_user.php') ?>
        </div>
        <div class="col-md-10">
        <form method="post" id="upload_form"  enctype="multipart/form-data" class="form-panel">
                <div class="row">
                    <div class="col-md-9">
                        
                        <div class="panel panel-defaults">
                        <h4>Create Product</h4>
                        <h6>Sale your product completely free</h6>
                        <div class="row">
                                

                                            <div class="col-md-6">                                
                                                <label><span>*</span>Product Name</label>
                                                <input type="text" class="form-control" placeholder="Product Name" id="productname" name="productname">
                                            </div>
                                            <div class="col-md-6">
                                                <label><span>*</span>Original Rate</label>
                                                <input type="text" class="form-control" placeholder="Original Rate" id="originalserate" name="originalserate">
                                            </div>
                                            <div class="col-md-6">
                                                <label><span>*</span>Selling Rate</label>
                                                <input type="text" class="form-control" placeholder="Selling Rate" id="sellingrate" name="sellingrate">
                                            </div>
                                            <div class="col-md-6">
                                                <label><span>*</span>Shipping Charge</label>
                                                <input type="text" class="form-control" placeholder="Shipping Charge" id="shippingrate" name="shippingrate">
                                            </div>
                                            <div class="col-md-6">
                                                <label><span>*</span>Qauntity</label>
                                                <div class="row">
                                                    <div class="col-md">
                                                       <input type="text" class="form-control" placeholder="Quantity" id="quantity" name="quantity">
                                                    </div>
                                                    <div class="col-md">
                                                       <select id="unit" name="unit">
                                                           <option value="">Select Unit</option>
                                                           <option value="gram">Gram</option>
                                                           <option value="kg">Kg</option>
                                                           <option value="nos">NOS</option>
                                                       </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label>Product Status</label>
                                                <select id="prostatus" name="prostatus">
                                                    <option value="new">New</option>
                                                </select>
                                            </div>

                                            <div class="col-md-6">
                                                <label>Bidding Availability</label>
                                                <select id="biddingavail" name="biddingavail">
                                                    <option value="on">Yes</option>
                                                    <option value="off">No</option>
                                                </select>
                                            </div>

                                            <div class="col-md-6">
                                                <label>Return Policy(Days)</label>
                                                <input type="number" class="form-control" placeholder="Enter return validity" id="return" name="return">
                                            </div>

                                            <div class="col-md-12">
                                                <label><span>*</span>Product Description</label>
                                                <textarea class="form-control" placeholder="Product describtion" id="description" name="description"></textarea>
                                            </div>
                                            <div class="col-md-12">
                                                <label>Parent Category</label>
                                                <div class="check-con">                                               
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
                                                </div>   
                                                
                                                <br>                                           
                                            </div>

                                        
                                            <div class="col-md-12">
                                                 <h5>Inventory (Stock)</h5>                                         
                                                        
                                                 <div class="row">
                                                     <div class="col-md-6"> 
                                                        <label>Number of Items</label>                                                       
                                                        <input type="number" class="form-control" placeholder="" name="stock" id="stock" value="1">
                                                     </div>
                                                 </div>               
                                            </div>

                                            <div class="col-md-12">
                                                <br>
                                                 <h5>SEO (Keywords)</h5>                                         
                                                        
                                                 <div class="row">
                                                     <div class="col-md-12"> 
                                                        <label>Keywords</label>                                                       
                                                        <textarea class="form-control" placeholder="Enter keywords related to your project, Separate each keyword with commas ( , )" id="keywords" name="keywords"></textarea>
                                                     </div>
                                                 </div>               
                                            </div>
                                            
                                            <div class="col-12">
                                            <br>
                                                <button type="submit" name="upload" id="upload" class="btn btn-danger" >Upload Product</button>


                                            </div>

  


    </div>
                        </div>
    
                    </div>
                    <div class="col-md-3">
                       <div class="image-peview ">
                           <div class="aspect-ratio aspect-ratio-1-1 img-frame">
                                <img id="blah" src="../images/image.jpg" class="fit-img" alt="your image" />
                           </div>
                           
                           <br>
                           <!-- <label>Upload Image</label> -->
                           <!-- <input type="file" class="form-control" name="image_file" onchange="readURL(this);"  id="image_file" / > -->
                           
                           <label class="custom-file-upload btn btn-warning btn-sm mx-auto d-block"><i class="fa fa-file-upload"></i>Upload Image
                                    <input type="file" class="form-control btn-sm" name="image_file" onchange="readURL(this);"  id="image_file" / >
                               </label>
<!--                           <div id="uploaded_image" style=" margin-top: 100px">-->
<!--                </div>-->
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

            // alert(return_val);


            if($('#image_file').val() == '')
            {
                        swal({
                                 title: "Warning",
                                 text: "Please Select the File",
                                 type: "warning",
                                 confirmButtonClass: "btn-danger",
                            })
            }            
            
            else if($('#attributes').val() == '' || $('#productname').val() == '' || ($('#cattegoryid').val() == '' || $('#originalserate').val() == '' || $('#sellingrate').val() == '' || $('#quantity').val() == '' || $('#shippingrate').val() == '' || $('#keywords').val() == '' || $('#stock').val() == '') || $('#return').val() == '')

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
                    url:"<?php echo base_url(); ?>/SellerController/uploadproduct",
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
                                 text: "Product Added Successfully",
                                 type: "success",
                                 confirmButtonClass: "btn-danger",
                            })
                            $("#productname").val('');
                            $("#originalserate").val('');
                            $("#sellingrate").val('');
                            $("#quantity").val('');
                            $("#description").val('');
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
    });


</script>
        </div>
    </div>
   
</div>          
          

