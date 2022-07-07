<?php //echo "<pre>";print_r($rescent_ads_active);?>
<div id="recent_section" class="col-md-12 col-sm-12" style="margin-bottom:10px;">
	<div class="row">
		<div class="col-md-12 col-sm-12">
			<h2 class="common center-place" style="font-weight:bold;">Recents Ads</h2>
		</div>
	</div>
	<div class="col-md-12 col-sm-12" style="background-color:<?php echo $bg; ?>;border-radius:5px;">
	<!--<div class="row"> -->
		<div class="col-md-12 col-sm-12 jcarousel-wrapper" style="padding-left:0px;margin-bottom:10px;">
			<!--<div class="">
				<div class="row">
					<div class="col-md-12 col-sm-12 jcarousel-wrapper">
			                -->
			                <div style="padding:0px 15px 0px 23px;">
			                <div class="jcarousel" style="border:none;box-shadow:none !important;">
			                    <ul>
			                    	<?php foreach($rescent_ads_active as $active_ads) :?>
			                    	<?php
			                    	if( !empty($active_ads->item_adv_image) && file_exists(ITEM_ADV_IMAGE_UPLOAD_THUMB_PATH . $active_ads->item_adv_image)){ ?>
				                        <li style="border: 1px solid <?php echo $bg; ?>;">
				                        	<a href="item-list/item-adv-details/<?php echo $active_ads->item_adv_id;?>">
				                        		<img src="<?php echo ITEM_ADV_IMAGE_UPLOAD_THUMB_PATH . $active_ads->item_adv_image;?>" alt="">
				                        	</a>
				                        	<?php /*
				                        	<div class="caption" style="margin-top:0px">
				                        		<!-- <a href="item-list/item-adv-details/<?php //echo $active_ads->item_adv_id;?>"><h2 class="listed-title" style="margin-top:0px !important"><?php //echo $active_ads->item_adv_title; ?></h2></a> -->
												<a class="btn-mini" href="item-list/item-adv-details/<?php echo $active_ads->item_adv_id;?>">
													<span class="time-section" style="padding-right:15px;">
													<?php 
															if ($active_ads->NoDAY > 0) {
																echo $active_ads->NoDAY." days ";
															} else if($active_ads->NoHOUR > 0) {
																echo $active_ads->NoHOUR." hours ";
														   } else { echo $active_ads->NoMINUTE." min"; }  ?> ago 
													</span>
												</a>
											</div>
											*/?>
				                        </li>
				                    <?php } ?>
				                    <?php endforeach; ?>
									<?php //echo "<pre>";print_r($rescent_ads_normal); ?>
				                    <?php foreach($rescent_ads_normal as $active_ads) :?>
				                    <?php if( !empty($active_ads->item_adv_image) && file_exists(ITEM_ADV_IMAGE_UPLOAD_THUMB_PATH . $active_ads->item_adv_image)){ ?>
				                        <li>
				                        	<a href="item-list/item-adv-details/<?php echo $active_ads->item_adv_id;?>">
				                        		<img src="<?php echo ITEM_ADV_IMAGE_UPLOAD_THUMB_PATH . $active_ads->item_adv_image;?>" alt="">
				                        	</a>
				                        <?php /*
				                        	<div class="caption" style="margin-top:0px">
				                        		<!-- <a href="item-list/item-adv-details/<?php // echo $active_ads->item_adv_id;?>"><h2 class="listed-title" style="margin-top:0px !important"><?php // echo $active_ads->item_adv_title; ?></h2></a> -->
												<a class="btn-mini" href="item-list/item-adv-details/<?php echo $active_ads->item_adv_id;?>">
													<span class="time-section" style="padding-right:15px;">
													<?php 
															if ($active_ads->NoDAY > 0) {
																echo $active_ads->NoDAY." days ";
															} else if($active_ads->NoHOUR > 0) {
																echo $active_ads->NoHOUR." hours ";
														   } else { echo $active_ads->NoMINUTE." min"; }  ?> ago 
													</span>
												</a>
											</div>
											*/ ?>
				                        </li>
				                     <?php } ?>
				                    <?php endforeach; ?>
			                    </ul>
			                </div>
						</div>
			                <a href="#" class="jcarousel-control-prev">&lsaquo;</a>
			                <a href="#" class="jcarousel-control-next">&rsaquo;</a>
						<div class="col-md-12 col-sm-12">
							<div class="row">
								<div style="color: #656668 ;">
									<div class="row category_list_width">
										<ul>
										<?php
										  foreach ($categroy_level as $r) {
										    echo  $r;
										  }
										?>
										</ul>
									</div>
								</div>
							</div>
						<!--</div>
					</div>
				</div>
            </div>-->
            </div>
		</div>
	</div>
</div>
<style>
#recent_section h2.listed-title, #recent_section ul.listed-item li a {
	color : <?php echo $tc;?> !important;
}
</style>