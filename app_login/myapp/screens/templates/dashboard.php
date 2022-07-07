<!DOCTYPE html>

<html lang="en">

<?php $this->load->view('templates/head'); ?>



<body id="page-top">

  <div id="wrapper">

    <!--<section id="container" >-->
    <?php $this->load->view('templates/dashboard-sidebar'); ?>

    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php $this->load->view('templates/dashboard-navbar'); ?>
        <div class="container-fluid">
        
        <?php $this->load->view('templates/dashboard-breadcrumbs'); ?>
          <?php $this->load->view($view); ?>

        </div>
      </div>

      <?php $this->load->view('templates/footer'); ?>
      
      
    </div>
    
    <!-- ./wrapper -->
    
    <?php $this->load->view('templates/dashboard-modals'); ?>
    
    <?php $this->load->view('templates/dashboard-scripts'); ?>

    <!-- scripts related to this page -->

    <?php if (count($scripts) > 0): ?>

<?php foreach ($scripts as $script): ?>

    <script src="<?php echo $script; ?>"></script>

<?php endforeach ?>

<?php endif ?> 


<script>
$(document).ready(function() {

var url = window.location.pathname;
var hosturl = window.location.href;

var url_parts = url.split('/');

// console.log(url_parts[3])
$('#accordionSidebar .collapse .collapse-inner a').filter(function() {
    var current_link =  $(this).attr('href') != 'undefined' ? $(this).attr('href') : '';
    if ('/'+url_parts[1]+'/'+url_parts[2]+'/'+current_link == url ){
     
        $(this).parents().addClass('active');
        var width = $(window).width();
    
        if (width >= '720') {
          $(this).parent().parent().addClass('show');
        }
        // $(this).parent().parent().addClass('show');
        $(this).addClass('active');
    }  
    
});


});

</script>

    <!-- </section>-->
  </div>
</body>

</html>