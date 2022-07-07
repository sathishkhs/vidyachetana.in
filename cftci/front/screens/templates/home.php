<!DOCTYPE html>
<html lang="en-US">

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->

<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->

<!--[if !IE]><!-->
<!--<![endif]-->

<?php $this->load->view('templates/includes/head'); ?>

<body>


	<!--<div class="preloader"></div>-->
	<header class="navigation">
		<?php $this->load->view('templates/includes/topbar'); ?>
		<?php $this->load->view('templates/includes/navbar'); ?>
	</header>
	<?php $this->load->view('templates/includes/slider'); ?>
	<?php $this->load->view('templates/includes/home_container'); ?>
	<?php $this->load->view('templates/includes/footer'); ?>


	<?php $this->load->view('templates/includes/scripts'); ?>
	<?php if (!empty($scripts) && count($scripts) > 0) : ?>
		<?php foreach ($scripts as $script) : ?>
			<script src="<?php echo $script; ?>"></script>
		<?php endforeach ?>
	<?php endif ?>
</body>

</html>