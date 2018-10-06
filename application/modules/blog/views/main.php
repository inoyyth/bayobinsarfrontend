<!-- Blog -->
<section id="blog" class="latest-works blog section" style="background: #ffffff;">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="well">
					<h4>Blog Search</h4>
					<form method="get" action="<?php echo base_url('blog/');?>">
						<div class="input-group">
							<input type="text" name="search" value="<?php echo (isset($keyword) ? $keyword : '');?>" class="form-control">
							<span class="input-group-btn">
								<button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
							</span>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-4 col-xs-12">
				<div class="section-title">
					<h2>Latest <span>News</span></h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<!-- Project Nav -->
				<div class="works-menu">
					<ul>
						<li <?php echo ($current_category == 0 ? 'class="active"' : '');?>><a href="<?php echo site_url('blog');?>"><i class="fa fa-tasks"></i>All</a></li>
						<?php 
						if ( count($list_category > 0) ) {
							foreach ( $list_category as $k => $v ) {
						?>
						<li <?php echo ($current_category == $v['id'] ? 'class="active"' : '');?>><a href="<?php echo site_url('blog/' . $v['slug']);?>"><i class="fa fa-tasks"></i><?php echo $v['name'];?></a></li>
						<?php } } ?>
					</ul>
				</div>
				<!--/ End Project Nav -->
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
							<!--<span><i class="fa fa-comments"></i>25 comments</span> -->
							<span><i class="fa fa-eye"></i><?php echo ((int)$v['post_views'] == 0 ? 1 : (int)$v['post_views']);?> views</span>
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