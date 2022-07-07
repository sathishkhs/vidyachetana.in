<?php //echo "<pre>";print_r($tc);?>
<?php //echo "<pre>";print_r($blogs); die();?>
<div class="col-md-12 col-sm-12" style="margin-bottom:10px !important;">
<?php if(!empty($blogs)) { ?>
		<div class="circular-bg">
		<?php $count = 1; 
			foreach ($blogs as $blogs) { 
				$pad = ''; 
				$padtop = '';
				if($count % 2==0){ 
					$pad = "padding-right:0px;"; 
				} 
				if($count % 1==0){ $padtop = "padding-top:10px;";  }
		?>
			<a href="blogs/blog-details/<?php echo $blogs->lc_item_id;?>">
				<div class="col-md-6 col-sm-6 col-xs-12" style='padding-left:0px;<?php echo $pad; ?><?php echo $padtop; ?>'>
					<div class="jcarousel-wrapper" style="margin-right:5px;min-height: 264px;background-color:<?php echo $bg; ?>; ">
						<div style="min-height: 203px;max-height: 203px;overflow: hidden;padding:0px 10px;color:<?php echo $tc; ?>">
							<h2 class="blog_title" style="color:<?php echo $tc; ?>"><b><?php echo $blogs->lc_item_title;?></b></h2>
							<br>
							<?php if (!empty($blogs->lc_item_cover_image) && file_exists(LOCALLIFE_ITEM_COVER_UPLOAD_PATH.$blogs->lc_item_cover_image)) {?>
								<img alt="cover image" src="<?php echo LOCALLIFE_ITEM_COVER_UPLOAD_PATH.$blogs->lc_item_cover_image?>">
							<?php }?>
							<p><?php echo $blogs->lc_item_description;?></p>
						</div>
						<br>
						<div style="float: right;margin-right: 10px;">
							<span class="latest_added" style="color:<?php echo $tc; ?>"><?php echo 'about' .' '. $blogs->NoDAY .' '.'days ago'; ?></span>
							<span style="marign-right:5px;"><a href="blogs/blog-details/<?php echo $blogs->lc_item_id;?>">more</a></span>
						</div>
					</div>
				</div>
			</a>
		<?php  $count++; } ?>
		</div>
<?php } ?>

<?php if(!empty($home_page_news)) { ?>
		<div class="circular-bg">
		<?php $count = 1; 
			foreach ($home_page_news as $home_page_news) { 
				$pad = ''; 
				$padtop = '';
				if($count % 2==0){ 
					$pad = "padding-right:0px;"; 
				} 
				if($count % 1==0){ $padtop = "padding-top:10px;";  }
		?>
			<a href="news/<?php echo $home_page_news->news_id;?>">
				<div class="col-md-6 col-sm-6 col-xs-12" style='padding-left:0px;<?php echo $pad; ?><?php echo $padtop; ?>'>
					<div class="jcarousel-wrapper" style="margin-right:5px;min-height: 264px;background-color:<?php echo $bg; ?>; ">
						<div style="min-height: 203px;max-height: 203px;overflow: hidden;padding:0px 10px;color:<?php echo $tc; ?>">
							<h2 class="blog_title" style="color:<?php echo $tc; ?>"><b><?php echo $home_page_news->news_title;?></b></h2>
							<br>
							<?php if (!empty($home_page_news->news_path) && file_exists(NEWS_PATH.$home_page_news->news_path)) {?>
								<img alt="cover image" src="<?php echo NEWS_PATH.$home_page_news->news_path?>">
							<?php } ?>
							<p>
								<?php echo $home_page_news->news_short_desc;?>
							</p>
						</div>
						<br>
						<div style="float: right;margin-right: 10px;">
							<span class="latest_added" style="color:<?php echo $tc; ?>"><?php echo 'about' .' '. $home_page_news->NoDAY .' '.'days ago'; ?></span>
							<span style="marign-right:5px;"><a href="blogs/blog-details/<?php echo $home_page_news->lc_item_id;?>">more</a></span>
						</div>
					</div>
				</div>
			</a>
		<?php  $count++; } ?>
		</div>
<?php } ?>
</div>