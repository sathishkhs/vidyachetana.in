<?php if (!defined('BASEPATH'))

    exit('No direct script access allowed');



//  application/core/MY_Controller.php

class MY_Controller extends CI_Controller {



   
  public $preview = "";

  public $data = array();

  

  public function __construct() {

      parent::__construct();

      //$this->output->cache(15);
      $this->load->model('pages_model');
      $this->load->model('templates_model');
      $this->load->model('page_types_model');
      $this->load->model('widget_areas_model');
      $this->load->model('widgets_model');

      $this->load->model('menuitems_model');
      $header_menu = $this->menuitems_model->header_sub_menu();
     
      for ($i = 0; $i < count($header_menu); $i++) {
          $header_menu[$i]->submenu = $this->menuitems_model->view_submenu($header_menu[$i]->menuitem_id);
          for ($j = 0; $j < count($header_menu[$i]->submenu); $j++) {
              $header_menu[$i]->submenu[$j]->submenu = $this->menuitems_model->view_submenu($header_menu[$i]->submenu[$j]->menuitem_id);
          }
      }


      $this->data['header_menu'] = $header_menu;
      $this->load->model('settings_model');
      $this->settings = $this->settings_model->view($this->session->userdata('app_lang_id'));
      $this->data['settings'] = $this->settings;
      $this->data['menus_items_1'] = $this->menuitems_model->get_menuitems(1, $this->session->userdata('app_lang_id'));
      $this->data['menus_items_2'] = $this->menuitems_model->get_menuitems(2, $this->session->userdata('app_lang_id'));
      $this->data['menus_items_3'] = $this->menuitems_model->get_menuitems(3, $this->session->userdata('app_lang_id'));
      $this->data['ver_radom'] = mt_rand(125, 854) . '.' . mt_rand(15, 50);

      //echo "<pre>"; print_r($this->data['facilities']);exit;
      // $this->data['header_menu_2'] = $header_menu;
      // $this->data['menus_items_2'] = $this->menuitems_model->view(2);
      // $this->data['menus_items_3'] = $this->menuitems_model->view(3);
      // $this->data['banners'] = $this->banners_model->view();
      // $this->data['address'] = $this->master_model->get_data('address');

  }     
//   protected function doctorwisecontent($page_slug){
      
//       $this->doctors_model->primary_key = array('page_slug' => $page_slug);
//       $this->data['doctor'] = $page_items = $this->doctors_model->get_row($this->preview); 
//       $this->data['banner_image'] = $page_items->banner_image;
//       $template_path = $this->attachtemplatewidgets($page_slug,$page_items);
//     //   $this->doctors_model->primary_key = array('doctors_id' => $page_items->doctors_id);
//     //   $this->data['doctors'] = $this->doctors_model->view_rowdata('doctors');
     
//       $this->doctors_model->primary_key = array('doctors_id' => $page_items->doctors_id);
//       $this->data['testimonials'] = $this->doctors_model->getdata('testimonials');

//       return $template_path;
//   }
  protected function pagewisecontent($page_slug) {

      $this->pages_model->primary_key = array('page_slug' => $page_slug);
      $page_items = $this->pages_model->get_row($this->preview);
      //$this->data['banner_image'] = $page_items->banner_image;
      $template_path = $this->attachtemplatewidgets($page_slug,$page_items);
      return $template_path;
  }
  protected function attachtemplatewidgets($page_slug,$page_items){
      if (empty($page_items)) {
          redirect('/page-not-found/');
      }
      $this->data['page_items'] = $page_items;
      $template_id = $page_items->template_id;
      $template_path = $this->templates_model->get_template_path($template_id);    
      
      //breadcrumbs start
      $breadcrumbs = "";
      $this->menuitems_model->primary_key = array('menuitem_link' => $page_slug);
      $menuitem = $this->menuitems_model->get_row();
      //echo "<pre/>"; print_r($menuitem); die;
      if (!empty($menuitem)) {
          $breadcrumbs = "<li><a href=$page_slug>" . $menuitem->menuitem_text . "</a></li>";
          $breadcrumbs = "<li><a href=\"\">Home</a></li>" . $breadcrumbs;
      }
      $this->data['breadcrumbs'] = $breadcrumbs;
      //breadcrumbs end
     

      $this->page_types_model->primary_key = array('type_id' => $page_items->type_id);
      $page_type = $this->page_types_model->get_row();
      $type_id = $page_type->type_id;
      $page_type_model = $page_type->model_name;
      $this->load->model($page_type_model);
      $this->data['view_path'] = $page_type->view_path;
      
      $widgetareas = $this->widget_areas_model->get_widget_areas($template_id);
      foreach ($widgetareas as $widgetarea) {
          $area_id = $widgetarea->area_id;
          $widgets = array();

          if (($template_id == 2 && $area_id == 5) || ($template_id == 5 && $area_id == 6)) {
              for ($i = 1; $i <= 5; $i++) {
                  $wid = "widget_id_$i";
                  if (!empty($page_items->$wid)) {
                      $this->widgets_model->primary_key = array('widget_id' => $page_items->$wid);
                      $widgets[] = $this->widgets_model->get_row();
                  }
              }
          }
           
          //pagewise widget from other languge for pape display code begins here
          if (!empty($page_items->from_widgets) && $page_items->from_widgets == 2) {
              //if (count($widgets) == 0) {
              $widgets = $this->widgets_model->view_page_widgets($template_id, $area_id, $page_items->page_id);
              // }
              for ($i = 0; $i < count($widgets); $i++) {
                  if (!empty($widgets[$i]->widget_type)) {
                      $widgets[$i]->widget_content = $this->widgetcontent($widgets[$i]->widget_type, $widgets[$i]->widget_content, $widgets[$i]->template_id);
                  } else {
                      $widgets[$i]->widget_path = 'templates/includes/common/widgets/static';
                  }
              }
              //echo "<pre/>"; print_r($widgets); die;
//              $this->data['widgetarea_' . $area_id] = $widgets;
          } else {

              if (count($widgets) == 0) {
                  $widgets = $this->widgets_model->view($template_id, $area_id);
              }
              
              for ($i = 0; $i < count($widgets); $i++) {
                  if (!empty($widgets[$i]->widget_type)) {
                      $widgets[$i]->widget_content = $this->widgetcontent($widgets[$i]->widget_type, $widgets[$i]->widget_content, $widgets[$i]->template_id);
                  } else {
                      $widgets[$i]->widget_path = 'templates/includes/common/widgets/static';
                  }
              }
              //echo "<pre/>"; print_r($widgets); die;
              $this->data['widgetarea_' . $area_id] = $widgets;
          }
          //pagewise widget from other languge for pape display code end here
      }
      // print_r($template_path);exit;
      return $template_path;
      
  }

  protected function widgetcontent($widget_type, $widget_content, $template_id = "") {
      $this->page_types_model->primary_key = array('type_id' => $widget_type);
      $page_type = $this->page_types_model->get_row();
      
      $content_model = $page_type->model_name;
      $value_field = $page_type->value_field;
      $text_field = $page_type->text_field;
      $this->load->model($content_model);
      $primary_key = array($value_field => $widget_content);
      $this->$content_model->primary_key = $primary_key;
      return $this->$content_model->get_widgetcontent($template_id);
  }


 

}