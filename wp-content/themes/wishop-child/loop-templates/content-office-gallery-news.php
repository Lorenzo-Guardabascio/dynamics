<?php

$color = esc_attr(get_post_meta( get_the_ID(), '_'.get_post_type().'_post_color', true ));
list($r, $g, $b) = hex_to_rgb($color);
$bgColor = 'rgba('.$r.','.$g.','.$b.',0.1)';
?>

	<div class="row flex-column-reverse flex-lg-row footer-archive">

          <div class="col-md-12 p-3 col-lg-4" >
            <div class="p-3 img-footer" style="background-color:<?php echo $bgColor  ?>" >

                     <span class="title-activity text-color">Gallery</span>

                    <div class="container text-center my-3">
                  <div class="row mx-auto my-auto">
            <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
                      <div class="carousel-inner" role="listbox">
                        <div class="carousel-item carousel-item-duble active">
                          <img class="d-block col-6 img-fluid" src="http://placehold.it/350x180?text=1">
                        </div>
                        <div class="carousel-item carousel-item-duble">
                          <img class="d-block col-6 img-fluid" src="http://placehold.it/350x180?text=2">
                        </div>
                        <div class="carousel-item carousel-item-duble">
                          <img class="d-block col-6 img-fluid" src="http://placehold.it/350x180?text=3">
                        </div>
                        <div class="carousel-item carousel-item-duble">
                          <img class="d-block col-6 img-fluid" src="http://placehold.it/350x180?text=4">
                        </div>
                        <div class="carousel-item carousel-item-duble">
                          <img class="d-block col-6 img-fluid" src="http://placehold.it/350x180?text=5">
                        </div>
                        <div class="carousel-item carousel-item-duble">
                          <img class="d-block col-6 img-fluid" src="http://placehold.it/350x180?text=6">
                        </div>
                      </div>
                <!---
                      <a class="carousel-control-prev" href="#recipeCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#recipeCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
    --->
            </div>
                  </div>
                </div>

            </div>
          </div><!---end div col 4 (image slider)--->

          <div class="col-md-12 p-3 col-lg-8">
              <div class="p-3 news-footer" style=" background-color:<?php echo $bgColor  ?>" >
                <span class="title-activity text-color">News</span>
                <div class="bd-example">
              <div id="carouselExampleCaptions" class="slide" data-ride="carousel">
		<ol class="carousel-indicators">
                  <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                  <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner ">
                  <div class="carousel-item flex-column active">
                    <div class="txt-notice">
                        <h5 class="">First slide label</h5>
                        <p class="">Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                    </div>
                  </div>
                  <div class="carousel-item flex-column">
                     <div>
                        <h5 class="">Second slide label</h5>
                        <p class="">Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                    </div> >
                  </div>
                  <div class="carousel-item flex-column">
                     <div>
                        <h5 class="">First slide label</h5>
                        <p class="">Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                    </div>
                  </div>
		</div>
                  <!---
		<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
		</a>
        --->
              </div>
            </div><!---end carousell onli text--->
             </div>
          </div><!---end div col 8--->

	</div><!--- end row --->

