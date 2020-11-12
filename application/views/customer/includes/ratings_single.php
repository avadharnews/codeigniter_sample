<?php 
$cusrating=0; 
$counts = 0;
foreach($rating as $rate){
     $cusrating+=$rate['ratingstar'];   
     $counts ++;                                                             
                                                         
//  $avg_rating = $cusrating/$counts;

if($counts==0){
    $counts = 1;
 }                               
 $avg_rating = $cusrating/($counts);
 
?>

<h6><?php echo $rate['first_name'] . $rate['last_name'] ; ?></h6>

<?php if($cusrating==5){ ?>
    
    <span><?php echo bcdiv($cusrating, 1, 1)  ?></span>
<ul class="rating">
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
</ul>
<p><?php echo $rate['reviewcomment']; ?></p>
<?php } 
else if($cusrating>=4.5){ ?>
<ul class="rating">
    <li><?php echo bcdiv($avg_rating, 1, 1)  ?> </li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star-half-o"></i></li>
</ul>
<p><?php echo $rate['reviewcomment']; ?></p>

<?php } 
else if($cusrating>=4.0){ ?>
<ul class="rating">
    <li><?php echo  bcdiv($avg_rating, 1, 1) ?> </li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li class="no-star"><i class="fa fa-star-o"></i></li>
</ul>
<p><?php echo $rate['reviewcomment']; ?></p>

<?php } 
else if($cusrating>=3.5){ ?>
<ul class="rating">
    <li><?php echo  bcdiv($avg_rating, 1, 1) ?> </li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star-half-o"></i></li>
    <li class="no-star"><i class="fa fa-star-o"></i></li>
</ul>
<p><?php echo $rate['reviewcomment']; ?></p>

<?php } 
else if($cusrating>=3.0){ ?>
<ul class="rating">
    <li><?php echo  bcdiv($avg_rating, 1, 1) ?> </li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li class="no-star"><i class="fa fa-star"></i></li>
    <li class="no-star"><i class="fa fa-star-o"></i></li>
</ul>
<p><?php echo $rate['reviewcomment']; ?></p>

<?php } 
else if($cusrating>=2.5){ ?>
<ul class="rating">
    <li><?php echo  bcdiv($avg_rating, 1, 1) ?> </li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star-half-o"></i></li>
    <li class="no-star"><i class="fa fa-star-o"></i></li>
    <li class="no-star"><i class="fa fa-star-o"></i></li>
</ul>
<p><?php echo $rate['reviewcomment']; ?></p>

<?php } 
else if($cusrating>=2.0){ ?>
<ul class="rating">
    <li><?php echo  bcdiv($avg_rating, 1, 1) ?> </li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star"></i></li>
    <li class="no-star"><i class="fa fa-star-o"></i></li>
    <li class="no-star"><i class="fa fa-star-o"></i></li>
    <li class="no-star"><i class="fa fa-star-o"></i></li>
</ul>
<p><?php echo $rate['reviewcomment']; ?></p>

<?php } 
else if($cusrating>=1.5){ ?>
<ul class="rating">
    <li><?php echo  bcdiv($avg_rating, 1, 1) ?> </li>
    <li><i class="fa fa-star"></i></li>
    <li><i class="fa fa-star-half-o"></i></li>
    <li class="no-star"><i class="fa fa-star-o"></i></li>
    <li class="no-star"><i class="fa fa-star-o"></i></li>
    <li class="no-star"><i class="fa fa-star-o"></i></li>
</ul>
<p><?php echo $rate['reviewcomment']; ?></p>

<?php } 
else if($cusrating>=1.0){ ?>
<ul class="rating">
    <li><?php echo  bcdiv($avg_rating, 1, 1) ?> </li>
    <li><i class="fa fa-star"></i></li>
    <li class="no-star"><i class="fa fa-star-o"></i></li>
    <li class="no-star"><i class="fa fa-star-o"></i></li>
    <li class="no-star"><i class="fa fa-star-o"></i></li>
    <li class="no-star"><i class="fa fa-star-o"></i></li>
</ul>
<p><?php echo $rate['reviewcomment']; ?></p>

<?php } 
else if($cusrating<1.0){ ?>
<ul class="rating">
    <li><?php echo  bcdiv($avg_rating, 1, 1) ?> </li>
    <li class="no-star"><i class="fa fa-star-o"></i></li>
    <li class="no-star"><i class="fa fa-star-o"></i></li>
    <li class="no-star"><i class="fa fa-star-o"></i></li>
    <li class="no-star"><i class="fa fa-star-o"></i></li>
    <li class="no-star"><i class="fa fa-star-o"></i></li>
</ul>
<p><?php echo $rate['reviewcomment']; ?></p>

<?php } } ?>
