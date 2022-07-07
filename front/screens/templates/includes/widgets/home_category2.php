<div id="recent_section" class="col-md-12 col-sm-12" style="background-color:<?php echo $bg; ?>;">
<div class="col-md-12 col-sm-12" style="margin-bottom:10px !important;">
	<div class="col-md-12 col-sm-12 jcarousel-wrapper" style="padding-bottom: 10px;">
		<div class="row">
			<div style="color: #656668 ;">
				<div class="row">
					<ul>
					<?php
					  foreach ($categroy_level2 as $r) {
					    echo  $r;
					  }
					?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<style>
#recent_section h2.listed-title, #recent_section ul.listed-item li a {
	color : <?php echo $tc;?> !important;
}
</style>