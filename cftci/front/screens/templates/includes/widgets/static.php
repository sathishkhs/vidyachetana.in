<div class="col-lg-12 col-md-12 col-sm-12 widget">
<?php
if($w['details']->display_tittle != 0){
if($w['details']->widget_title): ?><h2><?php echo $w['details']->widget_title; ?></h2><?php endif; }?>
<?php echo $w['details']->widget_content; ?>
</div>