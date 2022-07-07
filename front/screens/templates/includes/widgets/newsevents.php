<?php /*
<div class="col-lg-12 col-md-12 col-sm-12 widget" style="border:1px solid #efefef;background-color:#ededed;margin-bottom: 10px;padding:0px;border-radius:8px;">
	<h2 class="listed-title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Categories</h2>
	<ul>
<?php
	foreach ($categories as $categories): ?>
	<li>
		<a href="news-events/<?php echo $categories->news_category_id;?>"><?php echo $categories->news_category_name;?></a>
	</li>
	<?php endforeach ?>
	</ul>
</div>
*/ ?>
<div class="col-lg-12 col-md-12 col-sm-12" style="margin-bottom: 16px;">
	<a href="add-event"><div class="btn btn-primary" style="margin: 0px 45px;font-weight: bold;text-align: center;">Add Event</div></a>
</div>
<?php //echo "<pre>";print_r($categories);?>
<div class="col-lg-12 col-md-12 col-sm-12 widget" style="margin-bottom: 16px;padding:0px;">
	<h2 class="listed-title" style="color:#5b5b5b;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="padding:0px 17px;margin: -33px;">Categories</span></h2>

<?php
	foreach ($categories as $categories): ?>

	<div class="col-md-6 col-sm-6 col-xs-6 wind_button "  style="color:white;border-radius:2px;height:30px;padding:5px;margin : 5px 5px 5px 0px;background-color:<?php echo $categories->news_category_bg_color; ?>;width:252px;">
		<a href="news-events/<?php echo $categories->news_category_id;?>"><span style="color:white;font-weight:bold;"><?php echo $categories->news_category_name;?></span></a>
	</div>
	<?php endforeach ?>
</div>