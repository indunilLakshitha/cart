
<!-- Header End====================================================================== -->

<!-- Sidebar ================================================== -->

<!-- Sidebar end=============================================== -->
		<div class="span9">		
			<div class="well well-small">
			<h4>Featured Products <small class="pull-right">200+ featured products</small></h4>
			<div class="row-fluid">
			<div id="featured" class="carousel slide">
			<div class="carousel-inner">
			
			  <div class="item active">
			  
			  <ul class="thumbnails">
			  <?php foreach ($featurePro as $pro ) {?> 
				<li class="span3">
				  <div class="thumbnail">
				  <i class="tag"></i>
					<a href="<?php echo base_url("product/productDetails") ?>?pid=<?php echo $pro->product_id?>"><img src="<?php echo base_url() ?><?php echo $pro->product_image?>" alt=""></a>
					<div class="caption">
					  <h5><?php echo $pro->product_name ?></h5>
					  <h4><a class="btn" href="<?php echo base_url("product/productDetails") ?>?pid=<?php echo $pro->product_id?>">VIEW</a> <span class="pull-right"><?php echo $pro->product_price ?></span></h4>
					</div>
				  </div>
				</li>
				<?php }?>
			  </ul>
			 
			  </div>
			  </div>
			  <a class="left carousel-control" href="#featured" data-slide="prev">‹</a>
			  <a class="right carousel-control" href="#featured" data-slide="next">›</a>
			  </div>
			  </div>
		</div>
		<h4>Latest Products </h4>
			  <ul class="thumbnails">
			  <?php foreach ($featurePro as $pro ) {?> 
				<li class="span3">
				  <div class="thumbnail">
					<a  href="<?php echo base_url("product/productDetails") ?>?pid=<?php echo $pro->product_id?>"><img src="<?php echo base_url() ?><img src="<?php echo base_url() ?>assets/themes/images/products/6.jpg" alt=""/></a>
					<div class="caption">
					  <h5>Product name</h5>
					  <p> 
						<!-- Lorem Ipsum is simply dummy text.  -->
					  </p>
					 
					  <h4 style="text-align:center"><a class="btn" href="<?php echo base_url("product/productDetails") ?>?pid=<?php echo $pro->product_id?>"><img src="<?php echo base_url() ?><?php echo $pro->product_image?>"> <i class="icon-zoom-in"></i></a> <a class="btn" href="#">Add to <i class="icon-shopping-cart"></i></a> <a class="btn btn-primary" href="#">$222.00</a></h4>
					</div>
				  </div>
				</li>
				<?php }?>
			  </ul>	

		</div>
		</div>
	</div>
</div>
