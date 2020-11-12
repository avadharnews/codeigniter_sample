<?php 
$cusrating=0; 
$counts =0;
foreach($rating as $rate){
     $cusrating+=$rate['ratingstar']; 
     $counts ++;  
    //  $counts = ($counts);  
                                                               
}                          
 if($counts==0){
    $counts = 1;
 }                               
 $avg_rating = $cusrating/($counts);
?>


<?php if($avg_rating==5){ ?>
<ul class="rating">
    <li><?php echo bcdiv($avg_rating, 1, 1)  ?> </li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
</ul>
<?php } 
else if($avg_rating>=4.5){ ?>
<ul class="rating">
    <li><?php echo bcdiv($avg_rating, 1, 1)  ?> </li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star-half-o"></i></li>
</ul>
<?php } 
else if($avg_rating>=4.0){ ?>
<ul class="rating">
    <li><?php echo  bcdiv($avg_rating, 1, 1) ?> </li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li class="no-star"><i class="fa fa-star-o"></i></li>
</ul>
<?php } 
else if($avg_rating>=3.5){ ?>
<ul class="rating">
    <li><?php echo  bcdiv($avg_rating, 1, 1) ?> </li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star-half-o"></i></li>
    <li class="no-star"><i class="fa fa-star-o"></i></li>
</ul>
<?php } 
else if($avg_rating>=3.0){ ?>
<ul class="rating">
    <li><?php echo  bcdiv($avg_rating, 1, 1) ?> </li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li class="no-star"><i class="fa fa-star"></i></li>
    <li class="no-star"><i class="fa fa-star-o"></i></li>
</ul>
<?php } 
else if($avg_rating>=2.5){ ?>
<ul class="rating">
    <li><?php echo  bcdiv($avg_rating, 1, 1) ?> </li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star-half-o"></i></li>
    <li class="no-star"><i class="fa fa-star-o"></i></li>
    <li class="no-star"><i class="fa fa-star-o"></i></li>
</ul>
<?php } 
else if($avg_rating>=2.0){ ?>
<ul class="rating">
    <li><?php echo  bcdiv($avg_rating, 1, 1) ?> </li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li class="no-star"><i class="fa fa-star-o"></i></li>
    <li class="no-star"><i class="fa fa-star-o"></i></li>
    <li class="no-star"><i class="fa fa-star-o"></i></li>
</ul>
<?php } 
else if($avg_rating>=1.5){ ?>
<ul class="rating">
    <li><?php echo  bcdiv($avg_rating, 1, 1) ?> </li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star-half-o"></i></li>
    <li class="no-star"><i class="fa fa-star-o"></i></li>
    <li class="no-star"><i class="fa fa-star-o"></i></li>
    <li class="no-star"><i class="fa fa-star-o"></i></li>
</ul>
<?php } 
else if($avg_rating>=1.0){ ?>
<ul class="rating">
    <li><?php echo  bcdiv($avg_rating, 1, 1) ?> </li>
    <li><i class="fa fa-star"></i></li>
    <li class="no-star"><i class="fa fa-star-o"></i></li>
    <li class="no-star"><i class="fa fa-star-o"></i></li>
    <li class="no-star"><i class="fa fa-star-o"></i></li>
    <li class="no-star"><i class="fa fa-star-o"></i></li>
</ul>
<?php } 
else if($avg_rating<1.0){ ?>
<ul class="rating">
    <li><?php echo  bcdiv($avg_rating, 1, 1) ?> </li>
    <li class="no-star"><i class="fa fa-star-o"></i></li>
    <li class="no-star"><i class="fa fa-star-o"></i></li>
    <li class="no-star"><i class="fa fa-star-o"></i></li>
    <li class="no-star"><i class="fa fa-star-o"></i></li>
    <li class="no-star"><i class="fa fa-star-o"></i></li>
</ul>
<?php } ?>
