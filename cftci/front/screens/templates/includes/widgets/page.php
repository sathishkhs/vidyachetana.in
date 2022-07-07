<div class="col-lg-12 col-md-12 col-sm-12 widget">
<?php if ($w->display_tittle): ?><h2><?php echo $w->widget_title; ?></h2><?php endif; ?>
<div class="content-box" id="portfolio">     
    <h3><?php echo substr($w->widget_content->page_title, 0, 70); ?></h3>
    <div class="c-box-img <?php if ($w->link_display_style == 1) { echo "animate_text"; }?>"  id="<?php echo $w->widget_id;?>" style="position: relative;">
    	<?php if ($w->link_display_style == 1) { ?>
        	<div class="hoverBorderWrapper_<?php echo $w->widget_id;?>" id="<?php echo $w->widget_id;?>" onmouseover="return change_onmh_home(this.id);" onmouseout="return change_onmo_home(this.id);">
	    		<a href="<?php echo (!empty($w->widget_link)) ? $w->widget_link : $w->widget_content->page_slug; ?>" target="<?php echo $w->link_target; ?>" style="color:<?php echo $w->link_display_color; ?>"><?php echo $w->link_text; ?></a>
	    	</div>
	    <?php }?>
        <a href="<?php echo (!empty($w->widget_link)) ? $w->widget_link : $w->widget_content->page_slug; ?>" target="<?php echo $w->link_target; ?>">
            <?php if ($w->widget_content->roll_over_image_path) { ?>
                <div >
                    <img class="swapimg" id="swap_<?php echo $w->widget_id;?>" over-img="<?php echo PAGES_ROLL_OVER_IMAGE_UPLOAD_THUMB_PATH . $w->widget_content->roll_over_image_path; ?>" src="<?php echo PAGES_PATH_THUMB . $w->widget_content->page_path; ?>" >
                </div>
            <?php } else { ?>
                <img alt="" id="swap_<?php echo $w->widget_id;?>"  title="<?php echo substr($w->widget_content->alt_title, 0, 60); ?>" src="<?php echo PAGES_PATH_THUMB . $w->widget_content->page_path; ?>"/>
                <?php }
            ?>
        </a>
    </div>
    <p><?php echo $w->widget_content->page_short_description; ?></p>
    <?php if ($w->link_display_style == 2) { ?>
    	<a href="<?php echo (!empty($w->widget_link)) ? $w->widget_link : $w->widget_content->page_slug; ?>" target="<?php echo $w->link_target; ?>"><?php echo $w->link_text; ?></a>
    <?php }?>
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
</div>