<!-- Start about -->
<section id="about" class="about">
	<div class="container">
		<div class="row">
			<div class="about-content">
				<div class="col-xs-12">
					<div style="margin-top: 0;margin-bottom: 16px;text-align: left;" class="section-title">
						<h2><?php echo $article['title']['rendered'];?></h2>
					</div>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="single-about">
					<?php echo $article['content']['rendered'];?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End about -->
	
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