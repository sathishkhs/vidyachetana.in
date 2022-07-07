<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
<?php //print_r($this->data['settings']);exit; ?>
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo $this->data['settings']['logo_link']; ?>">
    <div class="sidebar-brand-icon rotate-n-15">
      <?php if($this->data['settings']['logo_image']){ ?>
      <img src="<?php echo SETTINGS_UPLOAD_PATH.$this->data['settings']['logo_image']; ?>" width="40px">
      <?php }else{ ?>
        <i class="fas fa-laugh-wink"></i>
        <?php } ?>
    </div>
    <div class="sidebar-brand-text mx-3"><?php echo $this->data['settings']['company_name']; ?> </div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item <?php if ($this->uri->segment(1) == 'dashboard') {
                        echo "active";
                      }; ?>">
    <a class="nav-link" href="">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Interface
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <?php $menuitems = $_SESSION['sidebar_menuitems'];
  if (empty($menuitems)) {
  ?>
    <div class="sidebar-card">
      <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="">
      <p class="text-center mb-2"><strong class="">You Have No Rights.</strong> Please Ask Admin for permissions to access your account. Till then you cant see anything.</p>

    </div>
    <?php } else {
    foreach ($menuitems as $menuitem) : ?>

      <li class="nav-item ">
        <a class="nav-link collapsed" href="<?php echo $menuitem->menuitem_link; ?>" data-toggle="collapse" data-target="#collapse<?php echo $menuitem->menuitem_id; ?>" aria-expanded="true" aria-controls="collapse<?php echo $menuitem->menuitem_id; ?>">
          <i class=" <?php echo $menuitem->menuitem_icon; ?>"></i>
          <span><?php echo $menuitem->menuitem_text; ?></span>

        </a>
        <?php if (count($menuitem->submenus) > 0) : ?>
          <div id="collapse<?php echo $menuitem->menuitem_id; ?>" class="collapse" aria-labelledby="heading<?php echo $menuitem->menuitem_id; ?>" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header"><?php echo !empty($menuitem->parent_menu_sub_heading_text) ? $menuitem->parent_menu_sub_heading_text : 'Administrator'; ?>:</h6>
              <?php foreach ($menuitem->submenus as $submenuitem) : ?>
                <a class="collapse-item " href="<?php echo $submenuitem->menuitem_link; ?>"><?php echo $submenuitem->menuitem_text; ?></a>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endif; ?>
      </li>
  <?php endforeach;
  } ?>




  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

  <!-- Sidebar Message -->
  <!-- <div class="sidebar-card">
    <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="">
    <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
    <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
  </div> -->

</ul>