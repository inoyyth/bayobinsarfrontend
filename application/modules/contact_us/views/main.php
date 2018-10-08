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
				<div class="form">
					<form id="form-inquiry" class="form" action="contact_us/submit_inquiry">
						<div class="form-group">
							<input type="hidden" name="<?=$csrf['name'];?>" id="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>"/>
							<input name="name" id="name-inquiry" required="true" type="text" placeholder="enter name">
						</div>
						<div class="form-group">
							<input name="email" id="email-inquiry" required="true" type="email" placeholder="enter email">
						</div>
						<div class="form-group">
							<input name="phone" id="phone-inquiry" required="true" type="number" placeholder="enter phone number">
						</div>
						<div class="form-group">
							<textarea name="message" id="message-inquiry" required="true" placeholder="enter message"></textarea>
						</div>
						<div class="form-group">
							<div class="button">
								<button type="submit" id="btn-submit-inquiry" required="true" data-loading-text="Loading..." class="btn primary">Submit</button>
							</div>
							<br>
							<div id="alert-inquiry-success" style="display:none;" class="alert alert-success alert-inquiry" role="alert"></div>
							<div id="alert-inquiry-failed" style="display:none;" class="alert alert-danger alert-inquiry" role="alert"></div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End Contact -->
<script>
	$(document).ready(function (){
		$("#form-inquiry").submit(function(e){
			var csrf_name = '<?=$csrf['name'];?>';
			var url = $(this).attr('action');
			var data = $('form').serialize();
			var btn = $("#btn-submit-inquiry").button('loading');
			$.ajax({
				type: "POST",
				url: url,
				data: data,
				dataType: 'json',
				success: function(data){
					$("#"+data.csrfName).val(data.csrfHash);
					if (data.status === 200) {
						$("#alert-inquiry-success").text(data.message).show();
					} else {
						$("#alert-inquiry-failed").text(data.message).show();
					}
					btn.button('reset');
					$("#name-inquiry,#email-inquiry,#phone-inquiry,#message-inquiry").val('');
				},
				error: function(error) {
					$("#alert-inquiry-failed").text('Oops sory something wrong, please try again').show();
					btn.button('reset');
					$("#name-inquiry,#email-inquiry,#phone-inquiry,#message-inquiry").val('');
				}
			});
			setTimeout(function(){$(".alert-inquiry").hide(); }, 5000);
			e.preventDefault();
		});
	});
</script>