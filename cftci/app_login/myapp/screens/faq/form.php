	<div class="container">
		<div class="row">
			<div class="col-md-10 col-sm-12 mx-auto">
				<?php $msg = $this->session->flashdata('msg');
				if (!empty($msg['txt'])) : ?>
					<div class="alert alert-block alert-<?php echo $msg['type']; ?>">
						<button type="button" class="btn defalut" data-dismiss="alert">
							<i class="fa fa-times"></i>
						</button>
						<i class="<?php echo $msg['icon']; ?>"></i>
						<?php echo $msg['txt']; ?>
					</div>
				<?php endif ?>
			</div>
		</div>
	</div>
	<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?php echo $page_heading; ?> <?php if (!empty($sub_heading)) { ?><small><?php echo $sub_heading; ?></small><?php } ?></h6>
    </div>
    <div class="card-body">
  
            	<form class="form-horizontal" action="faq/save" method="post" enctype="multipart/form-data">
            		<input name="faq_id" type="hidden" value="<?php echo (!empty($query->faq_id)) ? $query->faq_id : ''; ?>"  />
                	<br/>
		                <div class="form-group">
		                    <label class="col-sm-2 col-md-2 control-label" placeholder="Menu name" for="form-field-1">faq question<span class="eror"><?php echo form_error('faq_question'); ?></span></label>
		                    	<div class="col-sm-10">
		                       		<input name="faq_question" type="text" class="form-control" value="<?php echo (!empty($query->faq_question)) ? $query->faq_question : ''; ?>"  />
		  						</div>
		               	</div>
						<div class="form-group">
							<label class="col-sm-2 col-md-2 control-label" for="form-field-4">faq answer<span class="eror"><?php echo form_error('faq_answer'); ?></span></label>
							<div class="col-sm-10">
		                       		<textarea name="faq_answer" rows="5" type="text" class="form-control ckeditor"><?php echo (!empty($query->faq_answer)) ? $query->faq_answer : ''; ?></textarea>
		  					</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 col-md-2 control-label" for="form-field-4">faq answer<span class="eror"><?php echo form_error('faq_answer'); ?></span></label>
							<div class="col-sm-10">
		                       	<select name="faq_category_id" class="form-control">
									<?php foreach($categories as $cat):?>
									<option value="<?php echo $cat->faq_category_id;?>" <?php if(isset($query->faq_category_id)) if($cat->faq_category_id == $query->faq_category_id) echo "selected";?>><?php echo $cat->category_name;?></option>
									<?php endforeach;?>
								</select>
		  					</div>
						</div>
		               	<div class="form-group">
		                    <label class="col-sm-2 col-md-2 control-label" for="form-field-8">Status<span class="eror"><?php echo form_error('status'); ?></span></label>
		                    	<div class="col-sm-10">
		                       		<input name="status_ind"  value="1" type="radio"  <?php echo (!empty($query->status_ind)) ? 'checked' : ''; ?>/>
                        			<span class="label label-success">Publish</span>
                        			&nbsp; &nbsp; &nbsp;&nbsp;
                        			<input name="status_ind" value="0" type="radio" <?php echo (empty($query->status_ind)) ? 'checked' : ''; ?> />
                        			<span class="label label-danger">Unpublish</span>
		  						</div>
		               	</div>
		               	<div class="form-actions form-btns">
		               			<button class="btn btn-round btn-success" type="submit">
		                       		 <i class="fa fa-check"></i>
		                       		 Save
	                   			 </button>
			                    	&nbsp; &nbsp; &nbsp;
			                    <button class="btn btn-round btn-default" type="reset">
			                        <i class="fa fa-sync"></i>
			                        Reset
		                   		</button>
	                   				 &nbsp; &nbsp; &nbsp;
	                    		<a href="faq"> 
	                    		<button class="btn btn-warning btn-round" type="button">
	                            <i class="fa fa-times"></i>
	                            	Back
	                        	</button></a>
		               	</div>
        			</form>
        	
	</div>
</div>