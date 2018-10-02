<!-- Slider Area -->
<section id="slider" class="slider" style="background-image:url('<?php echo $top_article[0]['featured_image']['url'];?>')">
	<div class="container">
		<div class="row">
			<div class="col-md-7 col-sm-12 col-xs-12">
				<div class="text">
					<?php echo $top_article[0]['content']['rendered'];?>
					<div class="button">
						<a href="#" class="btn primary "><i class="fa fa-briefcase"></i>view work</a>
						<a href="#" class="btn"><i class="fa fa-phone"></i>Contact me</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End Slider Area -->

<!-- Start about -->
<section id="about" class="about">
	<div class="container">
		<div class="row">
			<div class="about-content">
				<div class="col-xs-12">
					<div style="margin-top: 0;margin-bottom: 16px;text-align: left;" class="section-title">
						<h2><?php echo $service_article[0]['title']['rendered'];?></h2>
					</div>
				</div>
				<div class="col-md-8 col-sm-8 col-xs-12">
					<div class="single-about">
					<?php echo $service_article[0]['content']['rendered'];?>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-12">
					<div class="image">
						<img src="<?php echo $service_article[0]['featured_image']['url'];?>" alt="#">
						<a href="<?php echo $service_article[0]['acf']['link_youtube'];?>" class="video video-popup mfp-iframe"><i class="fa fa-play"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End about -->
		
<!-- Testimonials -->
<section id="testimonials" class="testimonials section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="testi-content">
					<h2>What People Says</h2>
					<div class="owl-carousel testimonial-slider">
						<!--Start single-testimonial -->
						<?php
						if ( count($people_says) > 0 ) { 
							foreach( $people_says as $k => $v) {
						?>
						<div class="single-testimonial">
							<img src="<?php echo $v['featured_image']['url'];?>" alt="#">
							<p><i class="fa fa-quote-left"></i><i><?php echo strip_tags($v['content']['rendered']);?></i></p>
							<div class="star">
								<?php for ( $i=0;$i<$v['acf']['star_rate'];$i++ ) { ?>
								<i class="fa fa-star"></i>
								<?php } ?>
							</div>
							<span class="name"><?php echo $v['title']['rendered'];?></span>
						</div>
						<?php } } else { ?>
						<!--End single-testimonial -->
						<!--Start single-testimonial -->
						<div class="single-testimonial">
							<img src="img/author2.jpg" alt="#">
							<p><i class="fa fa-quote-left"></i><i>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </i> </p>
							<div class="star">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-half"></i>
								<i class="fa fa-star-half"></i>
							</div>
							<span class="name">Sabbir Ahmed</span>
						</div>
						<?php } ?>
						<!--End single-testimonial -->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End testimonial -->
	
<!-- Contact -->
<section id="contact" class="contact section">
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="contact-info">
					<h4>Contact info</h4>
					<?php echo $contact[0]['content']['rendered'];?>
					<span><i class="fa fa-phone-square"></i><?php echo $contact[0]['acf']['handphone'];?></span>
					<span><i class="fa fa-map-marker"></i><?php echo $contact[0]['acf']['address'];?></span>
					<span><i class="fa fa-envelope"></i><a href="#"><?php echo $contact[0]['acf']['email'];?></a></span>
					<span><i class="fa fa-globe"></i><a href="#"><?php echo $contact[0]['acf']['website'];?></a></span>
				</div>
			</div>
			<div class="col-md-8 col-sm-12 col-xs-12 ">
				<div class="form-head">
					<form class="form" action="#">
						<div class="form-group">
							<input name="name" type="text" placeholder="enter name">
						</div>
						<div class="form-group">
							<input name="email" type="email" placeholder="enter email">
						</div>
						<div class="form-group">
							<textarea name="message" placeholder="enter message"></textarea>
						</div>
						<div class="form-group">
							<div class="button">
								<button type="submit" class="btn primary">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End Contact -->