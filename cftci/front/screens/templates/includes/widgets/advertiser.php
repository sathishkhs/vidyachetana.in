<div class="col-lg-12 col-md-12 col-sm-12 widget">
<?php
if (!empty($w['content'])) {
	foreach ($w['content'] as $adv_data) {  ?>
		<div class="col-lg-12 col-md-12 col-sm-12 widget">
			<a href="<?php if(!empty($adv_data->advertiser_link)){ echo $adv_data->advertiser_link;} ?>" target="_blank">
			<?php if ($adv_data->advertiser_content_type == 'I') { ?>
				<?php if ($adv_data->advertiser_roll_image) { ?>
	                    <img title="<?php echo $adv_data->advertiser_title; ?>"  class="swapimg" id="swap_<?php echo $w['details']->widget_id;?>" over-img="<?php echo ADVERTISER_UPLOAD_PATH . $adv_data->advertiser_roll_image; ?>" src="<?php echo ADVERTISER_UPLOAD_PATH . $adv_data->advertiser_image; ?>" >
	            <?php } else { ?>
	                <img  title="<?php echo $adv_data->advertiser_title; ?>" id="swap_<?php echo $w['details']->widget_id;?>"  src="<?php echo ADVERTISER_UPLOAD_PATH . $adv_data->advertiser_image; ?>"/>
	             <?php } ?>
			<?php } else { ?>
				<p><?php echo $adv_data->advertiser_content; ?></p>
			<?php } ?>
			</a>
		</div>
	<?php }
} ?>
</div>  
<style type="text/css">
.hoverBorderWrapper_<?php echo $w->widget_id;?> {
	position: absolute;
	bottom: 10px;
	left:1px;
	padding : 4px 10px;
	border-radius: 5px;
	background-color:<?php echo $w->link_bg_color; ?>
}
</style>