<style>
.whatsapp-float{
  position: fixed;
  width: 70px;
  margin-top: 50px;
  transition: all 0.3s linear;
  box-shadow: 2px 2px 8px 0px rgba(0,0,0,.4);
  bottom:90px;
  right:0px;
  z-index: 9999;
}
.whatsapp-float:hover{
	right: 150px;
}
.whatsapp-float ul{
  padding-left: 0px;
  margin-bottom:0;
}
.whatsapp-float li{
  height: 55px;
  position:relative;
	list-style:none;
}

.whatsapp-float li a{
  color: white;
  display: block;
  height: 100%;
  width: 100%;
  line-height: 60px;
  padding-left:25%;
  border-bottom: 1px solid rgba(0,0,0,.4);
  transition: all .3s linear;
}
.whatsapp-float li:nth-child(1) a{
  background: #3fbb50;
}

.whatsapp-float li a i{
  position:absolute;
  top: 17px;
  left: 20px;
  font-size: 27px;
}
.whatsapp-float ul li a span{
  display: none;
  font-weight: bold;
  letter-spacing: 1px;
  text-transform: uppercase;
}


.whatsapp-float a:hover {
  z-index:1;
  width: 240px;
}

.whatsapp-float ul li:hover a span{
  padding-left: 30%;
  display: block;
}

@media (max-width: 580px){
  .whatsapp-float{
    position: fixed;
    bottom:0;
  width: 100%;
}
.whatsapp-float ul li a span{
  display: block;
}
.whatsapp-float a:hover {
  z-index:9999;
  width: 100%;
}
.whatsapp-float ul li:hover a span{
  padding-left: 0;
  display: block;
}
.whatsapp-float:hover{
	right:0;
}
}
  </style>


<nav class="whatsapp-float">
  <ul>

   <li><a target="_blank" href="https://wa.me/7349246271">
	<i class="fab fa-whatsapp"></i>
	<span>Whatsapp</span></a>
   </li>

   

  </ul>
</nav>



<header class="main-header-three clearfix">
	<div class="main-header-three__menu-box clearfix">
		<nav class="main-menu main-menu-three clearfix">
			<div class="main-menu-three__container clearfix">
				<div class="main-menu-three__logo">
					<!-- <a href=""> -->
						<img  src="<?php echo SETTINGS_UPLOAD_PATH.$settings->LOGO_IMAGE; ?>" alt="">
					<!-- </a> -->
				</div>
				<div class="main-menu-three__inner-upper mt-4 clearfix">
					
					<div class="main-menu-three__inner clearfix">
					
					</div>
				</div>
				    <div class="main-menu-three__btn">
						<a href="sponsor-for-education" class="main-menu-three__donate-btn"><i class="fas fa-arrow-circle-right"></i>DONATE </a>
					</div>
				<div class="main-menu__right main-menu__right-three">
					<!-- <div class="main-menu__right-social">
						<a href="<?php echo $settings->TWITTER_LINK; ?>"><i class="fab fa-twitter"></i></a>
						<a href="<?php echo $settings->FACEBOOK_LINK; ?>"><i class="fab fa-facebook-square"></i></a>
						<a href="<?php echo $settings->YOUTUBE_LINK; ?>"><i class="fab fa-youtube"></i></a>
						<a href="<?php echo $settings->INSTAGRAM_LINK; ?>"><i class="fab fa-instagram"></i></a>
					</div> -->
					<?php if($this->uri->segment(1) != 'donate'){ ?>
					<a href="sponsor-for-education" class="join-one__btn thm-btn px-2 py-2 mt-2 ml-auto campaign-donate " style="border-radius: 15px">DONATE TO EDUCATE
					<br> <span style="font-size:10px;display:block; text-align:center; line-height: 10px;">Avail 80G Tax Exemption</span>
				</a>
					<?php } ?>
				</div>
			</div>
		</nav>
	</div>
</header>

<div class="stricky-header stricked-menu main-menu main-menu-three">
	<div class="sticky-header__content"></div><!-- /.sticky-header__content -->
</div><!-- /.stricky-header -->