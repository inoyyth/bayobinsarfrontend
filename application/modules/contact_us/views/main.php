<!-- Contact -->
<section id="contact" class="contact section">
			<div class="container">
				<div class="row">
					<div class="row" style="margin-bottom: 16px;">
				        <!-- Map Column -->
				        <div class="col-lg-12 col-md-12">
				          <!-- Embedded Google Map -->
				          <iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;ll=37.0625,-95.677068&amp;spn=56.506174,79.013672&amp;t=m&amp;z=4&amp;output=embed"></iframe>
				        </div>
				    </div>
				</div>
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