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
                    <div class="col-md-12">
                        
                        <div class="panel panel-defaults">
                        <h3>New Orders</h3>
                        <h6>Sale your product completely free</h6>
                        <br>
                        <div class="table-res">
                            <table class="table table-bordered" id="old-tab">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Product Name</th>
                                        <th>Category </th>
                                        <th>Rate</th>
                                        <th>Count</th>
                                        <th>Time </th>
                                        <th>Order By </th>
                                        <th>Image</th>                                        
                                        <th>Action</th>                                        
                                    </tr>
                                    <?php
                                        $index=0; 
                                        foreach($products as $product){    ?>
                                            <tr id="productlist<?php echo $product['product_id'];  ?>">
                                                <td><?php echo $index=$index+1 ?></td>
                                                <td><?php echo $product['product_name'] ?></td>
                                                <td><?php echo $product['categoryname'] ?></td>
                                                <td><?php echo $product['rate'] ?>/-</td>
                                                <td><?php echo $product['counts'] ?></td>
                                                <td><?php $time = strtotime($product['order_time']); echo date("d-m-Y h:i:sa", $time) ?></td>
                                                <td><?php echo $product['first_name'] ?></td>
                                                <td><img src="<?php echo base_url();?>uploads/<?php echo $product['image'] ?>" width="50" height="50"></td>                                              
                                                <td>
                                                <a href="<?php echo base_url();?>/SellerController/ViewOrderDetails/<?php echo $product['pro_or_id'] ?>" ><span class="btn btn-danger btn-sm"><i class="fa fa-eye"></i> View & Process</span></a>
                                                </td>
     
                                                
                                            </tr>
                                        <?php } ?>
                                </thead>
                            </table>
                            <div id="orderspage"></div>
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