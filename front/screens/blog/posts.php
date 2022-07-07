<style>
    .product .product-details{
        height: 150px;
    }


  .eventholder {
    margin: 15px 0;
    display: flex;
    justify-content: center;
  }

  .eventholder a {
    font-size: 16px;
    cursor: pointer;
    margin: 0 5px;
    color: #333;
    padding: 6px 12px;
  }

  .eventholder a:hover {
    background-color: #f7b135;
    color: #fff;
  }

  .eventholder a.jp-previous {
    margin-right: 15px;
  }

  .eventholder a.jp-next {
    margin-left: 15px;
  }

  .eventholder a.jp-current,
  a.jp-current:hover {
    color: #fff;
    font-weight: bold;
  }

  .eventholder a.jp-disabled,
  a.jp-disabled:hover {
    color: #bbb;
  }

  .eventholder a.jp-current,
  a.jp-current:hover,
  .eventholder a.jp-disabled,
  a.jp-disabled:hover {
    cursor: default;
    background: none;
  }

  .eventholder span {
    margin: 0 5px;
  }

  .eventholder a.jp-current {
    background: #f7b135;

  }

  .eventholder a:hover {
    color: #fff !important;
  }
 

    </style>



    <section class="news-page">
            <div class="container">
                <div class="row" id="itemContainer">
                <?php if(!empty($blog)) { 
                foreach($blog as $post) { ?>
                    <div class="col-xl-4 col-lg-4 wow fadeInUp animated" data-wow-delay="100ms" style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">
                       
                        <div class="news-two__single">
                            <div class="news-two__img-box">
                                <div class="news-two__img">
                                    <img src="<?php echo BLOG_PHOTO_UPLOAD_PATH.$post->post_image; ?>" alt="">
                                    <a href="news-details.html">
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                                <div class="news-two__date">
                                    <p><?php echo $post->created_at; ?></p>
                                </div>
                            </div>
                            <div class="news-two__content">
                                <ul class="list-unstyled news-two__meta">
                                <?php  $user = $this->db->select('*')->where('id',$post->author)->get('author')->row(); ?>
                                    <li><a href="blog/post/<?php echo $post->page_slug; ?>"><i class="far fa-user-circle"></i> <?php echo $user->name; ?></a></li>
                                    <li><span>/</span></li>
                                    <li><a href="blog/post/<?php echo $post->page_slug; ?>"><i class="far fa-archive"></i> <?php echo $this->db->where('category_id',$post->category_id)->get('blogcategory')->row()->category_name; ?></a>
                                    </li>
                                </ul>
                                <h3>
                                    <a href="blog/post/<?php echo $post->page_slug; ?>"><?php echo $post->title; ?></a>
                                </h3>
                                <p class="news-two__text"><?php echo substr(strip_tags($post->post_content),0, 150); ?></p>
                            </div>
                        </div>
                    </div>
            <!--        <div class="col-sm-12 d-block">-->
            <!--</div>-->
                    <?php } } else{ ?>
                         <h3>
                                  Blog Posts Not Found
                                </h3>
                    <?php } ?>
                 
                  
                    
                </div>
              <div class="eventholder d-flex justify-content-center">
            
            </div>
            </div>
        </section>










    <script>
         $(".eventholder").jPages({
    containerID  : "itemContainer",
    perPage      : 6,
    startPage    : 1,
    startRange   : 1,
    midRange     : 5,
    endRange     : 1,


});
      </script>


