<div class="col-md-12 col-sm-12">
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<h2 class="common center-place" style="font-weight:bold;">Recents Ads</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<div class="jcarousel-wrapper">
                <div class="jcarousel">
                    <ul>
                    	<?php foreach($rescent_ads_active as $active_ads) :?>
                    	<?php if( !empty($active_ads->item_adv_image) && file_exists(ITEM_ADV_IMAGE_UPLOAD_THUMB_PATH . $active_ads->item_adv_image)){ ?>
	                        <li>
	                        	<img src="<?php echo ITEM_ADV_IMAGE_UPLOAD_THUMB_PATH . $active_ads->item_adv_image;?>" alt="">
	                        	<div class="caption">
									<a class="btn-mini" href="#"><?php echo $active_ads->modified_date; ?></a>
									<p><a href="#"><?php echo $active_ads->item_adv_title; ?></a></p>
								</div>
	                        </li>
	                    <?php } ?>
	                    <?php endforeach; ?>
	                    <?php foreach($rescent_ads_normal as $active_ads) :?>
	                    <?php if( !empty($active_ads->item_adv_image) && file_exists(ITEM_ADV_IMAGE_UPLOAD_THUMB_PATH . $active_ads->item_adv_image)){ ?>
	                        <li>
	                        	<img src="<?php echo ITEM_ADV_IMAGE_UPLOAD_THUMB_PATH . $active_ads->item_adv_image;?>" alt="">
	                        	<div class="caption">
									<a class="btn-mini" href="#"><?php echo $active_ads->modified_date; ?></a>
									<p><a href="#"><?php echo $active_ads->item_adv_title; ?></a></p>
								</div>
	                        </li>
	                     <?php } ?>
	                    <?php endforeach; ?>
                    </ul>
                </div>
                <a href="#" class="jcarousel-control-prev">&lsaquo;</a>
                <a href="#" class="jcarousel-control-next">&rsaquo;</a>
            </div>
		</div>
	</div>
</div>