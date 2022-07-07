<!DOCTYPE html>
<html lang="en">

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->

<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->

<!--[if !IE]><!-->
<!--<![endif]-->

<?php $this->load->view('templates/campaigns/diwali/head'); ?>

<body>
	<!-- Preloader code goes here -->
	<div class="preloader">
		<div class="container">
		<div class="row">
		<div class="col-2 mx-auto">
		<img class="preloader__image" width="100%" src="assets/images/loader.png" alt="" />
		</div>
		</div>
		</div>
	</div>
	<div class="page-wrapper">
	<!-- Preloader code ends here -->
	<!-- <?php $this->load->view('templates/includes/topbar'); ?> -->
		<?php $this->load->view('templates/includes/navbar'); ?>
		<?php $this->load->view('templates/includes/banner'); ?>
		<?php $this->load->view($view_path); ?>

		<!-- Footer Code goes here -->
		<footer class="site-footer">
			<div class="site-footer-bg" style="background-image: url(assets/images/backgrounds/footer-bg.jpg)"></div>
			<div class="container">
				<?php $this->load->view('templates/includes/footer'); ?>
				<?php $this->load->view('templates/includes/bottom_footer'); ?>
			</div>
		</footer>

		<!-- Footer code end here -->
		<?php $this->load->view('templates/includes/mobile_nav'); ?>
		<?php $this->load->view('templates/includes/search_pop'); ?>
		<a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>
	</div>	
	<?php $this->load->view('templates/includes/scripts'); ?>

	<?php if (!empty($scripts) && count($scripts) > 0) : ?>
		<?php foreach ($scripts as $script) : ?>
			<script src="<?php echo $script; ?>"></script>
		<?php endforeach ?>
	<?php endif ?>
	</body>

</html>
