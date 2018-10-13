<!-- Social
<div class="social-body">
    <ul>
        <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
        <li class="instagram"><a href="#"><i class="fa fa-instagram"></i></a></li>
        <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
    </ul>
</div>
End Social -->

<!-- Header Area -->
<header id="header" class="header">
    <div class="header-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4 col-xs-8">
                    <div class="logo">
                        <a href="<?php echo base_url();?>">Bayo Binsar</a>
                    </div>
                </div>
                <div class="col-md-9 col-sm-8 col-xs-4">
                    <div class="mobile-menu"></div>
                    <nav class="navbar navbar-default">
                        <div class="collapse navbar-collapse">
                            <?php 
                                echo $this->multi_menu->render(
                                    array(
                                        'nav_tag_open'        => '<ul id="nav" class="nav navbar-nav">',            
                                        'parentl1_tag_open'   => '<li>',
                                        'parentl1_anchor'     => '<a href="%s">%s</a>',
                                        'parent_tag_open'     => '<li>',
                                        'parent_anchor'       => '<a href="%s">%s</a>',
                                        'children_tag_open'   => '<ul>'
                                    )
                                ); 
                            ?>
                        </div> 
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
</header>
<!-- End Header Area -->