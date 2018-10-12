<div class="container">

			<div class="row">
				<div class="col-md-12">
					<div class="section-title" style="text-align: left !important; margin: 16px 0 24px;">
						<h2>Upcoming <span>Events</span></h2>
					</div>
				</div>
			</div>

			<?php 
			if (count($event) > 0) {
				foreach($event as $k=>$v) {
			?>
	      	<!-- Event One -->
			<div class="row">
	            <div class="col-md-7">
	                <a href="#">
	                    <img class="img-responsive" src="<?php echo $v['featured_image']['url'];?>" style="width: 700px;height: 300px;" alt="">
	                </a>
	            </div>
	            <div class="col-md-5 events-page">
	                <h3><?php echo $v['title']['rendered'];?></h3>
	                <h5><i class="fa fa-map-pin" aria-hidden="true"></i> <?php echo $v['acf']['address'];?></h5>
	                <h5><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $v['acf']['date'];?></h5>
	                <h5><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $v['acf']['time']['start'] . " - " . $v['acf']['time']['finish'];?></h5>
	                <?php echo $v['content']['rendered'];?>
	            </div>
	        </div>

			<hr>
			<?php }} ?>
			<!-- Pagination -->
			<!-- <ul class="pagination justify-content-center">
				<li class="page-item">
					<a class="page-link" href="#" aria-label="Previous">
					    <span aria-hidden="true">«</span>
					    <span class="sr-only">Previous</span>
					</a>
				</li>
				<li class="page-item">
					<a class="page-link" href="#">1</a>
				</li>
				<li class="page-item">
					<a class="page-link" href="#">2</a>
				</li>
				<li class="page-item">
					<a class="page-link" href="#">3</a>
				</li>
				<li class="page-item">
					<a class="page-link" href="#" aria-label="Next">
						<span aria-hidden="true">»</span>
						<span class="sr-only">Next</span>
					</a>
				</li>
			</ul> -->
		</div>