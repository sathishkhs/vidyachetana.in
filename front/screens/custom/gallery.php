 

        <!--Causes One Start-->
        <section class="causes-one">
            <div class="container">
                <div class="section-title text-center">
                    <span class="section-title__tagline">GLIMPSES OF OUR SERVICE</span>
                   
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="causes-one__carousel owl-theme owl-carousel">
                           <?php foreach($gallery as $row){ ?> 
                            <div class="causes-one__single wow fadeInLeft" data-wow-duration="1000ms">
                                <div class="causes-one__img">
                                    <div class="causes-one__img-box">
                                        <img src="<?php echo GALLERY_IMG_UPLOAD_PATH.$row->gallery_img; ?>" alt="">
                                        <a href="<?php echo $row->page_slug; ?>">
                                            <!-- <i class="fa fa-plus"></i> -->
                                        </a>
                                    </div>
                                    <div class="causes-one__category">
                                        <span><?php echo $row->gallery_name; ?></span>
                                    </div>
                             </div>
                         </div>
                         <?php } ?>
                            <!-- <div class="causes-one__single wow fadeInUp" data-wow-duration="1500ms"
                                data-wow-delay="100ms">
                                <div class="causes-one__img">
                                    <div class="causes-one__img-box">
                                        <img src="assets/images/kitchen/cama2.jpg" alt="">
                                        <a href="gt-hospital/">
                                          
                                        </a>
                                    </div>
                                    <div class="causes-one__category">
                                        <span>GOKULDAS TEJPAL HOSPITAL</span>
                                    </div>
                                </div>
                            </div>
                            <div class="causes-one__single wow fadeInRight" data-wow-duration="1500ms"
                                data-wow-delay="200ms">
                                <div class="causes-one__img">
                                    <div class="causes-one__img-box">
                                        <img src="assets/images/kitchen/cama3.jpg" alt="">
                                        <a href="nair-hospital/">
                                           
                                        </a>
                                    </div>
                                    <div class="causes-one__category">
                                        <span>BYL NAIR HOSPITAL</span>
                                    </div>
                                </div>
                            </div>
                           
                         <div class="causes-one__single wow fadeInLeft" data-wow-duration="1000ms">
                                <div class="causes-one__img">
                                    <div class="causes-one__img-box">
                                        <img src="assets/images/kitchen/cama4.jpg" alt="">
                                        <a href="/akshayachaitanya.org/st-george/">
                                          
                                        </a>
                                    </div>
                                    <div class="causes-one__category">
                                        <span>ST. GEORGE HOSPITAL</span>
                                    </div>
                             </div>
                         </div> -->
                     </div>
                 </div>
             </div>
         </div>
 </section>
        <!--Causes One End-->



      