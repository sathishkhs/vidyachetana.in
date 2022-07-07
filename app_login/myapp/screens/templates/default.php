<!DOCTYPE html>

<html lang="en">

	<?php $this->load->view('templates/default-head');?>

	    

    <body  class="hold-transition login-page bg-gradient-primary">

        <?php $this->load->view($view); ?>        

        <?php $this->load->view('templates/scripts'); ?>

        <!-- scripts related to this page -->        

		<?php if(count($scripts)>0): ?>      

           <?php foreach ($scripts as $script): ?>

               <script src="<?php echo $script; ?>"></script>

           <?php endforeach ?>      

	    <?php endif ?>         

    </body>

</html>