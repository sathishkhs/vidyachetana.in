<!DOCTYPE html>
<html dir="ltr" lang="en">

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->

<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->

<!--[if !IE]><!-->
<!--<![endif]-->
<head>
<?php $this->load->view('templates/includes/head'); ?>
     <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-PVHSWSS');</script>
        <!-- End Google Tag Manager -->


</head>
<body>
    
 <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PVHSWSS"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<div id="wrapper" class="clearfix">
		<!-- Preloader -->
		<div id="preloader">
			<div id="spinner">
				<img class="floating" src="assets/images/preloaders/13.png" alt="">
				<h5 class="line-height-50 font-18 ml-15">Loading...</h5>
			</div>
			<div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>
		</div>
		<!-- Preloader code ends here -->
		<header id="header" class="header">
			<?php $this->load->view('templates/includes/topbar'); ?>
			<?php $this->load->view('templates/includes/navbar'); ?>
		</header>
		<!-- Start main-content -->
		<div class="main-content">
			<!-- Breadcrumb Code -->
			<?php $this->load->view('templates/includes/breadcrumb'); ?>
			<!-- Main Inner page content Loads here -->
			<?php $this->load->view($view_path); ?>

			<!-- Footer Code goes here -->
			<footer id="footer" class="footer" data-bg-img="assets/images/footer-bg.png">
				<?php $this->load->view('templates/includes/footer'); ?>
				<?php $this->load->view('templates/includes/bottom_footer'); ?>
			</footer>
			<!-- Footer code end here -->
		</div>

		<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
	</div>
	<!--/wrapper-->
	<?php $this->load->view('templates/includes/scripts'); ?>

	<?php if (!empty($scripts) && count($scripts) > 0) : ?>
		<?php foreach ($scripts as $script) : ?>
			<script src="<?php echo $script; ?>"></script>
		<?php endforeach ?>
	<?php endif ?>
</body>

</html>