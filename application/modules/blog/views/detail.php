<?php
	$strtime = strtotime($article['date_gmt']." UCT");
	$human_time = date('F d, Y H:i A', $strtime);
?>
<div class="container" style="margin-bottom: 30px;">
	<!-- Page Heading/Breadcrumbs -->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header" style="border-bottom: 0;"><?php echo $article['title']['rendered'];?>
				<!--<small>by <a href="#">Start Bootstrap</a></small>--><br>
				<small style="font-size: 14px;"><i class="fa fa-clock-o"></i> Posted on <?php echo $human_time;?></small>
			</h1>
		</div>
	</div>
	<!-- /.row -->
	<!-- Content Row -->
	<div class="row">
		<!-- Blog Post Content Column -->
		<div class="col-lg-8">
			<!-- Date/Time -->
			<!-- Preview Image -->
			<!--<img class="img-responsive" src="http://placehold.it/900x300" alt="">-->
			<hr>
			<!-- Post Content -->
			<?php echo $article['content']['rendered'];?>
			<hr>
			<!-- Blog Comments -->
			<!-- Comments Form -->
			<div class="well">
				<h4>Leave a Comment:</h4>
				<form role="form" id="form-comment" method="post" action="<?php echo base_url('blog/post_comment');?>">
					<div class="form-group">
						<input type="hidden" name="post" id="post" value="<?php echo $article['id'];?>">
						<input type="hidden" name="<?=$csrf['name'];?>" id="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
						<input name="author_name" id="author_name" required class="form-control" placeholder="Your Name"></textarea>
					</div>
					<div class="form-group">
						<input name="author_email" id="author_email" required type="email" class="form-control" placeholder="Your Email"></textarea>
					</div>	
					<div class="form-group">
						<textarea name="content" id="content" required class="form-control" rows="3" placeholder="Type Your Comment Here"></textarea>
					</div>
					<button id="btn-submit-comment" data-loading-text="Loading..." type="submit" class="btn btn-primary">Submit</button>
					<br>
					<br>
					<div id="alert-comment-success" style="display:none;" class="alert alert-success alert-comment" role="alert"></div>
					<div id="alert-comment-failed" style="display:none;" class="alert alert-danger alert-comment" role="alert"></div>
				</form>
			</div>
			<hr>
			<!-- Posted Comments -->
			<!-- Comment -->
			<?php 
				if ( count($comment) > 0 ) {
					foreach ( $comment as $k => $v ) {
						$comment_strtime = strtotime($v['date_gmt']." UCT");
						$comment_human_time = date('F d, Y H:i A', $comment_strtime);
			?>
			<div class="media">
				<span class="pull-left">
					<i class="fa fa-user-circle fa-3x" aria-hidden="true"></i>
				</span>
				<div class="media-body">
					<h4 class="media-heading"><?php echo $v['author_name'];?>
						<small>
							<?php echo $comment_human_time;?>
						</small>
					</h4>
					<?php echo $v['content']['rendered'];?>
				</div>
			</div>
			<?php } } ?>
			<!-- Comment -->  
		</div>
		<!-- Blog Sidebar Widgets Column -->
		<div class="col-md-4">
		<!-- Blog Search Well -->
		<div class="well">
			<h4>Article Search</h4>
			<form method="get" action="<?php echo base_url('blog/');?>">
				<div class="input-group">
					<input type="text" name="search" class="form-control">
					<span class="input-group-btn">
						<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button> 
					</span>
				</div>
			</form>
			<!-- /.input-group -->
		</div>
		<!-- Blog Categories Well -->
		<div class="well">
			<h4>Article Categories</h4>
			<div class="row">
				<div class="col-lg-12">
					<ul class="list-unstyled">
						<?php 
							if ( count($list_category) > 0 ) {
								foreach ($list_category as $k => $v) {
						?>
						<li class="col-md-6 odd"><a href="<?php echo site_url('blog/' . $v['slug']);?>"><?php echo $v['name'];?></a></li>
						<?php } } ?>
					</ul>
				</div>
			</div>
			<!-- /.row -->
		</div>
		<!-- Side Widget Well -->
		<!--<div class="well">
			<h4>Side Widget Well</h4>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
		</div>-->
	</div>
</div>
        <!-- /.row -->
</div>
<script>
	$(document).ready(function (){
		$("#form-comment").submit(function(e){
			var csrf_name = '<?=$csrf['name'];?>';
			var url = $(this).attr('action');
			var data = $('form').serialize();
			var btn = $("#btn-submit-comment").button('loading');
			$.ajax({
				type: "POST",
				url: url,
				data: data,
				dataType: 'json',
				success: function(data){
					$("#"+data.csrfName).val(data.csrfHash);
					if (data.status === 200) {
						$("#alert-comment-success").text(data.message).show();
					} else {
						$("#alert-comment-failed").text(data.message).show();
					}
					btn.button('reset');
					$("#author_name,#author_email,#content").val('');
				},
				error: function(error) {
					$("#alert-comment-failed").text('Oops sory something wrong, please try again').show();
					btn.button('reset');
					$("#author_name,#author_email,#content").val('');
				}
			});
			setTimeout(function(){$(".alert-comment").hide(); }, 5000);
			e.preventDefault();
		});
	});
</script>