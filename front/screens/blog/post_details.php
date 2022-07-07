<style>

  img{
    margin: 6px;
  }
    .news-details a,.news-details a:hover{
        text-decoration: underline!important;
        color: #fed018!important;
    }
    body .news-details{
        font-family:'Overpass', sans-serif!important;
        font-size: 16px!important;
    }
    .news-details p, .news-details span, .news-details a, .news-details li{
        font-family:'Overpass', sans-serif!important ;
        font-size: 16px!important;
    }
    .news-details h1,.news-details h2,.news-details h3,.news-details h4,.news-details h5,.news-details h6{
        
        font-family:'Overpass', sans-serif!important;
        display: inline-flex;
        color: #ea5638;
        font-size: 18px;
        font-weight: 700;
        align-items: center;
        line-height: 30px;
        text-transform: uppercase;
        margin-top: 18px;
    }
    
    .news-details h1:before,.news-details h2:before,.news-details h3:before,.news-details h4:before,.news-details h5:before,.news-details h6:before {
          content: '';
          background-color: currentColor;
          width: 44px;
          height: 2px;
          margin-right: 10px;
    }
    .news-details .sidebar__post-content_meta{
        font-family:'Overpass', sans-serif!important ;
        font-size: 12px!important;
    }
  </style>





    <section class="news-details">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <div class="news-details__left">
                            <div class="news-details__img">
                                <img src="<?php echo BLOG_PHOTO_UPLOAD_PATH.$post->post_image; ?>" alt="">
                            </div>
                            <div class="news-details__content">
                                <ul class="list-unstyled news-details__meta">
                                <?php  $user = $this->db->select('*')->where('id',$post->author)->get('author')->row(); ?>
                                    <li><a href="#"><i class="far fa-user-circle"></i> by <?php echo $user->name; ?> </a></li>
                                    <!--<li><span>/</span></li>-->
                                    <!--<li><a href="#"><i class="far fa-comments"></i> 2 Comments</a>-->
                                    <!--</li>-->
                                </ul>
                                <h3 class="news-details__title"><?php echo $post->title; ?></h3>
                                <?php echo $post->post_content; ?>
                            </div>
                           
                           
                           
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="sidebar">
                           
                            <div class="sidebar__single sidebar__post">
                                <h3 class="sidebar__title">Recent Posts</h3>
                                <ul class="sidebar__post-list list-unstyled">
                                <?php foreach($posts as $post){ ?>     
                                <li>
                                        <div class="sidebar__post-image">
                                            <img src="<?php echo BLOG_PHOTO_UPLOAD_PATH.$post->post_image; ?>" alt="">
                                        </div>
                                        <div class="sidebar__post-content">
                                            <?php  $user = $this->db->select('*')->where('id',$post->author)->get('author')->row(); ?>
                                                <span  class="sidebar__post-content_meta"><i class="far fa-user-circle"></i>by <?php echo $user->name; ?></span>
                                            <h3>
                                                <a href="blog/post/<?php echo $post->page_slug; ?>"><?php echo $post->title; ?></a>
                                            </h3>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="sidebar__single sidebar__category">
                                <h3 class="sidebar__title">Categories</h3>
                                <ul class="sidebar__category-list list-unstyled">
                                <?php foreach($categories as $category){ 
                        ?>
                                    <li><a href="blog/category/<?php echo $category->category_id; ?>"><i class="fas fa-arrow-circle-right"></i><?php echo $category->category_name; ?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
        </section>