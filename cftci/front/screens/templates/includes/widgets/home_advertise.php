<?php if(isset($w->advertiser_content_type)) {?>	
	<div class="col-md-12 col-sm-12" style="margin-bottom:10px;text-align: center;">
		<?php if($w->advertiser_content_type == 'I') {?>
			<a href="#"><img src="<?php echo ADVERTISER_UPLOAD_PATH.$w->advertiser_image?>"></a>
		<?php }  elseif($w->advertiser_content_type == 'T') {
			echo $w->advertiser_content;
		}?>
	</div>
<?php } ?>