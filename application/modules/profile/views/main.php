<!-- Start about -->
<section id="about" class="about">
	<div class="container">
		<div class="row">
			<div class="about-content">
				<div class="col-xs-12">
					<div style="margin-top: 0;margin-bottom: 16px;text-align: left;" class="section-title">
						<h2><?php echo $profile_article[0]['title']['rendered'];?></h2>
					</div>
				</div>
				<div class="col-md-8 col-sm-8 col-xs-12">
					<div class="single-about">
					<?php echo $profile_article[0]['content']['rendered'];?>
					</div>
				</div>
				<div class="col-md-4 col-sm-4 col-xs-12">
					<div class="image">
						<img src="<?php echo $profile_article[0]['featured_image']['url'];?>" alt="#">
						<!-- <a href="<?php echo $profile_article[0]['acf']['link_youtube'];?>" class="video video-popup mfp-iframe"><i class="fa fa-play"></i></a> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End about -->

<!-- Start Story -->
<section id="story" class="story section">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="section-title">
					<h2>my <span>Story</span></h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
				<div class="story-content">
					<!-- single-story -->
					<?php 
						if ( count($my_story) > 0 ) {
							foreach ( $my_story as $k => $v ) {
					?>
					<div class="single-story">
						<span class="year wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.4s"><?php echo $v['acf']['year'];?></span>
						<div class="inner-content wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s">
							<h3><?php echo $v['title']['rendered'];?></h3>
							<p><?php echo $v['acf']['job_title'];?></p>
							<p class="p2"><?php echo $v['content']['rendered'];?></p>
						</div>
					</div>
					<?php } } ?>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End story -->	

	
<!-- Contact -->
<!--<section id="contact" class="contact section">
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
</section>-->
<!--/ End Contact -->