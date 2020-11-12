
      <br>
      <select id="subattribute">
         <?php foreach($sub_attributes as $sub_attribute){ ?>
          <option value="<?php echo $sub_attribute['sub_attr_id']; ?>"><?php echo $sub_attribute['sub_attribute_name']; ?></option>
         <?php } ?>    
      </select>
    
                                 