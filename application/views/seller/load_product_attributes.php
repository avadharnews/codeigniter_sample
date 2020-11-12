
   
         <?php foreach($sub_attributes as $sub_attribute){ ?>    
            <div class="btn-group">  
               <button class="btn btn-primary" type="button" style="text-transform: capitalize;"><?php echo $sub_attribute['attribute_name']; ?>   : <?php echo $sub_attribute['sub_attribute_name']; ?> </button>
               <button class="btn btn-danger" type="button" onclick="removeproductattribute(<?php echo $sub_attribute['product_id']; ?>,<?php echo $sub_attribute['attribute_id']; ?>)"><i class="fa fa-times-circle"></i></button>
            </div>

         <?php } ?>

         <br><br>
    
                                 