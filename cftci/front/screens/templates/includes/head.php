<?php error_reporting(0); ?>
<head>
	<meta charset="utf-8">
    <title><?php echo $page_items->meta_title; ?></title>
    <meta name="title" content="<?php echo $page_items->meta_title; ?>"/>
    <meta name="keywords" content="<?php echo $page_items->meta_keywords; ?>"/>
    <meta name="description" content="<?php echo $page_items->meta_description; ?>"/>
    <base href="<?php echo base_url(); ?>"/>
    <?php $parts = $this->uri->segment(1); ?>
    <?php if (!empty($page_url) && $page_url > 1) {
        ?>   <link rel="canonical" href="<?php echo base_url() . $parts . '/' . $page_url; ?>"/>
    <?php } else if (!empty($page_items->canonical_url)) { ?>
        <link rel="canonical" href="<?php echo $page_items->canonical_url; ?>"/>
        <?php
    } if (!empty($page_items->redirection_link)) {
        header('Location:' . $page_items->redirection_link);
    }
    ?>
    <?php echo $page_items->other_meta_tags; ?>
    <?php
    $robots = array();
    if (!empty($page_items->nofollow_ind)) {
        $robots[] = 'NOINDEX';
    }
    if (!empty($page_items->noindex_ind)) {
        $robots[] = 'NOFOLLOW';
    }
    if (count($robots) > 0):
        ?>
        <META NAME="ROBOTS" CONTENT="<?php echo implode(', ', $robots); ?>" />
    <?php endif ?>

    <meta name="author" content="Sathish-Kumar">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<link href="assets/css/font-awesome.min.css" rel="stylesheet">
    
	<!--<link rel="shortcut icon" href="<?php echo $settings->FAVICON_IMAGE ?>" type="image/x-icon">-->
	<link rel="icon" href="<?php echo SETTINGS_UPLOAD_PATH.$settings->FAVICON_IMAGE ?>" type="image/png">
	
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="assets/css/css-bootstrap.min.css">
  <!-- Icon Font Css -->
  <link rel="stylesheet" href="assets/css/css-themify-icons.css">
  <link rel="stylesheet" href="assets/css/icofont-icofont.css">
  <link rel="stylesheet" href="assets/css/dist-magnific-popup.css">
  <!-- Owl Carousel CSS -->
  <link rel="stylesheet" href="assets/css/slick-slick.css">
  <link rel="stylesheet" href="assets/css/slick-slick-theme.css">
  <link rel="stylesheet" href="assets/css/modal-video-modal-video.min.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="assets/css/css-style.css">
  <script src="assets/js/jquery-jquery.js"></script>
      
</head>

