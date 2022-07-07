<div id="recent_section1" class="col-md-12 col-sm-12" >
	<div class="col-md-12 col-sm-12" style="padding-left:0px;background-color:<?php echo $bg; ?>;margin-bottom:10px !important;border-radius:5px;">
		<div class="col-md-12 col-sm-12 jcarousel-wrapper" style="padding-bottom: 10px;" >
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
#recent_section1 h2.listed-title, #recent_section1 ul.listed-item li a {
	color : <?php echo $tc;?> !important;
}
</style>