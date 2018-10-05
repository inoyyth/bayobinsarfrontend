<!-- Start service -->
<section id="service" class="service section">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="section-title">
					<h2>My <span>Service</span></h2>
				</div> 
			</div>
			<div class="col-md-8 col-sm-12 col-xs-12">
				<div class="row">
					<?php
						if ( count($service) > 0) {
							foreach ( $service as $k => $v ) {
					?>
					<div class="col-md-6 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s">
						<!-- single-service -->	
						<div class="single-service">
							<i class="fa fa-check"></i>
							<h5><?php echo $v['title']['rendered'];?></h5>
							<?php echo  word_limiter($v['content']['rendered'], 20);?>
						</div>
					</div>
					<?php } } ?>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End service -->	