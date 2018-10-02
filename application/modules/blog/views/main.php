<!-- Blog -->
<section id="blog" class="blog section" style="background: #ffffff;">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-4 col-xs-12">
				<div class="section-title">
					<h2>Latest <span>News</span></h2>
				</div>
			</div>
		</div>
		<div class="row">
			<?php 
			if ( count($blog) > 0 ) {
				foreach ( $blog as $k => $v) {
				$strtime = strtotime($v['date_gmt']." UCT");
			?>
			<div class="col-md-4 col-sm-12 col-xs-12 wow fadeInRight" data-wow-duration="0.8s" data-wow-delay="0.4s">
				<!-- single-news -->
				<div class="single-news">
					<div class="news-head">
						<div class="news-date">
							<span><?php echo date('d', $strtime);?></span> 
							<span><?php echo date('M', $strtime);?></span> 
							<span><?php echo date('Y', $strtime);?></span> 
						</div>
						<img src="<?php echo $v['featured_image']['url'];?>" alt="#">
						<div class="news-view"> 
							<span><i class="fa fa-comments"></i>25 comments</span>
							<span><i class="fa fa-eye"></i>10k views</span>
						</div>
					</div>
					<div class="news-body" style="text-align: justify;">
						<h2><a title="<?php echo $v['title']['rendered'];?>" href="<?php echo site_url('blog/' . url_title($v['title']['rendered'], '-', true) . '-' . $v['id']);?>"><?php echo word_limiter($v['title']['rendered'], 5);?></a></h2>
						<?php echo word_limiter($v['excerpt']['rendered'], 23);?>
						<!--<a href="<?php echo site_url('blog/' . url_title($v['title']['rendered'], '-', true) . '-' . $v['id']);?>" class="btn">Read More<i class="fa fa-angle-double-right"></i></a>-->
					</div>
				</div>
			</div>
			<?php } } ?>
		</div>
	</div>
</section>
<!--/ End blog -->