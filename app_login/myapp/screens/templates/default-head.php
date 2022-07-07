<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title; ?></title>
  <base href="<?php echo base_url(); ?>" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link href="../js-plugins/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../js-plugins/themify/themify-icons.css" rel="stylesheet" type="text/css">
  <link href="../js-plugins/timepicker/jquery.timepicker.min.css" rel="stylesheet" type="text/css">
  <link href="../js-plugins/line-icons/font-css/LineIcons.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../js-plugins/summernote/summernote-lite.min.css">
	<?php if(isset($styles) && count($styles)>0): ?>
	   <?php foreach ($styles as $style): ?>
	   		<link rel="stylesheet" href="<?php echo $style; ?>">
	   <?php endforeach ?>
	<?php endif ?>

  <script src="../js-plugins/jquery/jquery.min.js"></script>
</head>