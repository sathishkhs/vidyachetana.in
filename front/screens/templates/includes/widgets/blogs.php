<div class="col-lg-12 col-md-12 col-sm-12 widget">
	<h2 class="listed-title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Category</h2>
	<ul>
<?php
	foreach ($categories as $categories): ?>
	<li>
		<a href="blogs/<?php echo $categories->lc_category_id;?>"><?php echo $categories->lc_category_title;?></a>
	</li>
	<?php endforeach ?>
	</ul>
</div>