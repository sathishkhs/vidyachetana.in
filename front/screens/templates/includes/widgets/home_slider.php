<div class="row-for-large-screen">
	<div class="col-md-12 col-sm-12">
		<div class="row">
			<div class="col-md-2 col-sm-2 col-xs-2 wind_button" style="padding:0px;height:210px;margin : 7px;border:1px solid #ccc;">
				<a href="groups"><img src="images/createagroup.jpg"></a>
			</div>
			<div class="col-md-5 col-sm-5 col-xs-6 wind_button"  style="padding:0px;height: 100px;margin : 7px;border:1px solid #ccc;">
				<a href="post-ur-add"><img src="images/postanad.jpg"></a>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-2 wind_button"  style="padding:0px;height: 100px;margin : 7px;border:1px solid #ccc;">
				<a href="forum"><img src="images/forum.jpg"></a>
			</div>
			<div class="col-md-2 col-sm-2 col-xs-3 wind_button"  style="padding:0px;height: 100px;margin : 7px;border:1px solid #ccc;">
				<?php if($this->session->userdata('login_user_id') > 0) { ?>
					<a href="my-account"><img src="images/myaccount.jpg"></a>
				<?php } else { ?>
					<a href="login"><img src="images/loginregister.jpg"></a>
				<?php } ?>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-4 wind_button"  style="padding:0px;height: 100px;margin : 7px;border:1px solid #ccc;">
				<a href="news-events"><img src="images/newsandevents.jpg"></a>
			</div>
			<div class="col-md-5 col-sm-5 col-xs-2 wind_button"  style="padding:0px;height: 100px;margin : 5px 5px 5px 19px;border:1px solid #ccc;">
				<a href="classifieds"><img src="images/classifieds.jpg"></a>
			</div>
		</div>
	</div>
</div>
<div class="row-for-small-screen">
	<div class="col-md-12 col-sm-12">
		<div class="row">
			<a href="groups">
				<div class="col-md-6 col-sm-6 col-xs-6 wind_button "  style="color:white;border-radius:2px;height:30px;padding:5px;margin : 5px 5px 5px 0px;background-color:#fe6848">
					<?php echo "Create Group";?>
				</div>
			</a>
			<a href="news-events">
				<div class="col-md-6 col-sm-6 col-xs-6 wind_button "  style="color:white;border-radius:2px;padding:5px;height:30px;margin : 5px -8px 5px -2px;background-color:#428bca">
					<?php echo "News And Events";?>
				</div>
			</a>
			<a href="post-ur-add">
				<div class="col-md-6 col-sm-6 col-xs-6 wind_button "  style="color:white;border-radius:2px;padding:5px;height:30px;margin : 5px 5px 5px 0px;background-color:#fe6848">
					<?php echo "Post AD";?>
				</div>
			</a>
			<a href="classifieds">
				<div class="col-md-6 col-sm-6 col-xs-6 wind_button "  style="color:white;border-radius:2px;padding:5px;height:30px;margin : 5px -8px 5px -2px;background-color:#428bca">
					<?php echo "Classifieds";?>
				</div>
			</a>
			<?php /*
			<div class="col-md-6 col-sm-6 col-xs-6 wind_button "  style="color:white;border-radius:2px;padding:5px;height:30px;margin : 5px 5px 5px 0px;background-color:#fe6848">
				<?php if($this->session->userdata('login_user_id') > 0) { ?>
					<a href="my-account"><?php echo "My Account";?></a>
				<?php }else { ?>
					<a href="login"><?php echo "Login";?></a>
				<?php } ?>
			</div>
			*/ ?>
			<?php if($this->session->userdata('login_user_id') > 0) { ?>
			<a href="my-account">
				<div class="col-md-6 col-sm-6 col-xs-6 wind_button "  style="color:white;border-radius:2px;padding:5px;height:30px;margin : 5px 5px 5px 0px;background-color:#fe6848">
					<?php echo "My Account";?>
			    </div>
			</a>
			<?php } else { ?>
			<a href="login">
				<div class="col-md-6 col-sm-6 col-xs-6 wind_button "  style="color:white;border-radius:2px;padding:5px;height:30px;margin : 5px 5px 5px 0px;background-color:#fe6848">
				  <?php echo "Login";?>
				</div>
			</a>
			<?php } ?>
			
			<a href="forum">
				<div class="col-md-6 col-sm-6 col-xs-6 wind_button "  style="color:white;border-radius:2px;padding:5px;height:30px;margin : 5px -8px 5px -2px;background-color:#428bca">
					<?php echo "Forum";?>
				</div>
			</a>
		</div>
	</div>
</div>
<style>
.wind_button:hover {
	opacity: 0.6;
}
</style>
<?php /*
<div class="responsive-slider" data-spy="responsive-slider" data-autoplay="true">
	<div class="slides" data-group="slides">
    	<ul>
    		<?php
			if (!empty($w)){ ?>
				<?php foreach ($w as $banner){ ?>
      		<li>
      			<div class="slide-body" data-group="slide">
                	<img src="<?php echo BANNERS_UPLOAD_PATH . $banner->banner_path; ?>">
                	<!-- <div class="caption header" data-animate="slideAppearRightToLeft" data-delay="500" data-length="300">
                  		<h2>Responsive slider</h2>
                  		<div class="caption sub" data-animate="slideAppearLeftToRight" data-delay="800" data-length="300">With one to one swipe movement!</div>
                	</div>
                	<div class="caption img-html5" data-animate="slideAppearLeftToRight" data-delay="200">
                  		<img src="../img/html5.png">
                	</div>
                	<div class="caption img-css3" data-animate="slideAppearLeftToRight">
                  		<img src="../img/css3.png">
                	</div>
                	 -->
              	</div>
      		</li>
      		<?php } }?>
      </ul>
	</div>
    <a class="slider-control left" href="#" data-jump="prev"><B><</B></a>
    <a class="slider-control right" href="#" data-jump="next"><B>></B></a>
    <div class="pages">
    	<a class="page" href="#" data-jump-to="1">1</a>
        <a class="page" href="#" data-jump-to="2">2</a>
        <a class="page" href="#" data-jump-to="3">3</a>
	</div>
  </div>
  */ ?>