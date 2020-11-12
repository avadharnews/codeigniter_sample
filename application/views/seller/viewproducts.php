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
                        <h4>View Products</h4>
                        <h6>Sale your product completely free</h6>
                        <br>
                        <div class="table-res">
                            <table class="table table-bordered" id="old-tab">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Product Name</th>
                                        <th>Category </th>
                                        <th>Original Rate</th>
                                        <th>Selling Rate</th>
                                        <th>Seller Original Rate</th>
                                        <th>Seller Selling Rate</th>
                                        <th>Image</th>                                        
                                        <th>Attribute</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    <?php
                                        $index=0; 
                                        foreach($products as $product){ ?>
                                            <tr id="productlist<?php echo $product['product_id'] ?>">
                                                <td><?php echo $index=$index+1 ?></td>
                                                <td><?php echo substr($product['product_name'], 0, 20) ?></td>
                                                <td><?php echo $product['categoryname'] ?></td>
                                                <td><?php echo $product['original_rate'] ?></td>
                                                <td><?php echo $product['selling_rate'] ?></td>
                                                <td><?php echo $product['seller_original_rate'] ?></td>
                                                <td><?php echo $product['seller_selling_rate'] ?></td>
                                                <td><img src="<?php echo base_url();?>uploads/<?php echo $product['image'] ?>" width="50" height="50"></td>
                                                <td>
                                                <a href="<?php echo base_url();?>SellerController/editProductAttribute/<?php echo $product['product_id'] ?>" target="_blank">
                                                   <button class="btn btn-dark btn-sm" type="button"><i class="fa fa-pencil"></i> Edit Attribute</button>
                                                </a>   
                                                <br>

                                                </td>
                                               
                                                <td>
                                                <a href="<?php echo base_url();?>SellerController/editProduct/<?php echo $product['product_id'] ?>" target="_blank">
                                                   <button class="btn btn-warning btn-sm" type="button"><i class="fa fa-pencil"></i> Edit</button>
                                                </a>   
                                                <br>

                                                </td>
                                                <td>
                                                   <?php if($product['status']==0){ ?>
                                                        <button class="btn btn-primary btn-sm">Not Active</button>  
                                                   <?php } else{ ?>
                                                    <span class="btn btn-danger btn-sm" onclick="deleteproduct(<?php echo $product['product_id'] ?>)"><i class="fa fa-fa-trash"></i> Delete</span>
                                                   <?php } ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                </thead>
                            </table>

                            <div id="productspage"></div>
                        </div>
                        <br>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-danger" onclick="productviewprev()"><i class="fa fa-angle-left" ></i> Prevoius</button>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-danger pull-right" onclick="productviewnext()">Next <i class="fa fa-angle-right"></i> </button>
                            </div>
                        </div>
                        </div>
    
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
            if($('#image_file').val() == '')
            {
                alert("Please Select the File");
            }
            else
            {
                $.ajax({
                    url:"<?php echo base_url(); ?>/SellerController/uploadproduct",
                    //base_url() = http://localhost/tutorial/codeigniter
                    method:"POST",
                    data:new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    success:function(data)
                    {
                        $('#uploaded_image').html(data);
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