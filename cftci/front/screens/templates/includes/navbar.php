

	<nav class="navbar navbar-expand-lg navigation" id="navbar">
		<div class="container">
		  <a class="navbar-brand" href="">
		  	<img src="assets/img/logo.png" alt="" class="img-fluid">
		  </a>

		  <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
			<span class="ti-menu"></span>
		  </button>
	  
		  <div class="collapse navbar-collapse text-center" id="navbarsExample09">
			<ul class="navbar-nav ml-auto">
			<?php if (!empty($header_menu)) { ?>
					<?php foreach ($header_menu as $header) { ?>
					<?php if ($header->submenu == null || empty($header->submenu)) { ?>
			  	<li class="nav-item active">
					<a target="<?php echo $header->menuitem_target; ?>" class="nav-link" href="<?php echo base_url() . $header->menuitem_link; ?>"><?php echo $header->menuitem_text; ?> <span class="sr-only"><?php echo $header->menuitem_text; ?></span></a>
			  	</li>
				  <?php } ?>
				  <?php if (!empty($header->submenu)) : ?>
			  	<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $header->menuitem_text; ?><span class="ml-1">+</span></a>
					<ul class="dropdown-menu" aria-labelledby="dropdown03">
					<?php foreach ($header->submenu as $submenu) : ?>
						<li><a target="<?php echo $submenu->menuitem_target; ?>" class="dropdown-item" href="<?php echo $submenu->menuitem_link; ?>"><?php echo $submenu->menuitem_text; ?>
						<?php if (!empty($submenu->submenu)) : ?><span class="ml-1">+</span> <?php endif; ?></a></li>
							<?php if (!empty($submenu->submenu)) : ?>
								<ul class="dropdown-menu" aria-labelledby="dropdown03">
									<?php foreach ($submenu->submenu as $submenu_2) : ?>
										<li><a target="<?php echo $submenu_2->menuitem_target; ?>" class="dropdown-item" href="<?php echo $submenu_2->menuitem_link ?>"><?php echo $submenu_2->menuitem_text ?></a></li>
										</li>
									<?php endforeach; ?>
								</ul>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
				</ul>
			  	</li>
				  <?php endif; ?>

				<?php } ?>
				<?php } ?>
			</ul>
		
		  </div>
		</div>
	</nav>
