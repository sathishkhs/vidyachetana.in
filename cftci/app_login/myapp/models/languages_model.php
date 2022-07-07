<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class languages_Model extends CI_Model {

    private $table;
    public $primary_key;
    public $data;

    function __construct() {
        parent::__construct();
        $this->table = substr(strtolower(get_class($this)), 0, -6);
        $this->primary_key = array();
        $this->data = array();
    }

    private function reset() {
        $this->primary_key = array();
        $this->data = array();
    }

    private function reset_pk() {
        $this->primary_key = array();
    }

    private function reset_data() {
        $this->data = array();
    }

    public function get_max_value($field) {
        $this->db->select_max($field);
        $query = $this->db->get($this->table);
        $row = $query->row();
        return $row->$field;
    }

    public function get_row() {
        $this->db->where($this->primary_key);
        $query = $this->db->get($this->table);
        $row = $query->row();
        $this->reset_pk();
        return $row;
    }

    public function view() {
        $this->db->order_by('l.display_order');
        $this->db->where('l.status_ind', 1);
        $this->db->select('l.*,u.username as last_modified_user,au.username as created_user');
        $this->db->from($this->table . ' as l');
        $this->db->join('admin_users as u', 'l.modified_by = u.user_id', 'left');
        $this->db->join('admin_users as au', 'l.created_by = au.user_id', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    public function view_all() {
        $this->db->order_by('l.display_order');
        $this->db->select('l.*,u.username as last_modified_user,au.username as created_user');
        $this->db->from($this->table . ' as l');
        $this->db->join('admin_users as u', 'l.modified_by = u.user_id', 'left');
        $this->db->join('admin_users as au', 'l.created_by = au.user_id', 'left');
        $query = $this->db->get();
        return $query->result();
    }

    public function insert() {
        $this->db->insert($this->table, $this->data);
        $this->reset_data();
        return true;
    }

    public function update() {
        $this->db->update($this->table, $this->data, $this->primary_key);
        $this->reset();
        return true;
    }

    public function delete() {
        $this->db->query("SET FOREIGN_KEY_CHECKS=0");
        $this->db->delete("menuitems", $this->primary_key);
        $this->db->delete("settings", $this->primary_key);
        $this->db->delete("pages", $this->primary_key);
        $this->db->delete("widgets", $this->primary_key);
        $this->db->delete("banners", $this->primary_key);
        $this->db->delete("donation_modes", $this->primary_key);
        $this->db->delete("donation_options", $this->primary_key);
        $this->db->delete("donation_types", $this->primary_key);
        $this->db->delete("email_templates", $this->primary_key);
        $this->db->delete("events", $this->primary_key);
        $this->db->delete("faq_categories", $this->primary_key);
        $this->db->delete("faqs", $this->primary_key);
        $this->db->delete("galleries", $this->primary_key);
        $this->db->delete("news", $this->primary_key);
        $this->db->delete("photos", $this->primary_key);
        $this->db->delete("phrases", $this->primary_key);
        $this->db->delete("testimonial", $this->primary_key);
        $this->db->delete("downloads", $this->primary_key);
        $this->db->delete("download_types", $this->primary_key);
        $this->db->delete("videos", $this->primary_key);
        $this->db->delete("enquiry_natures", $this->primary_key);
        $this->db->delete("partners", $this->primary_key);
        $this->db->delete($this->table, $this->primary_key);
        $this->db->query("SET FOREIGN_KEY_CHECKS=1");
        $this->reset_pk();
        return true;
    }

    public function check_duplicate_lang_name($field_name, $field_value, $lang_id) {
        $this->db->where($field_name, $field_value);
        if (!empty($lang_id)) {
            $this->db->where('lang_id !=', $lang_id);
        }
        $query = $this->db->get($this->table);
        return $query->num_rows();
    }

    public function check_duplicate_lang_code($field_name, $field_value, $lang_id) {
        $this->db->where($field_name, $field_value);
        if (!empty($lang_id)) {
            $this->db->where('lang_id !=', $lang_id);
        }
        $query = $this->db->get($this->table);
        return $query->num_rows();
    }

    public function indLanguage() {
        $this->db->where('status_ind', 1);
        $query = $this->db->select('*')->from($this->table)->get();
        return $query->result();
    }

    public function copycontent($lang_id_from, $lang_id_to) {
        $this->db->query("SET FOREIGN_KEY_CHECKS=0");
        $this->db->query("INSERT INTO `menuitems`(`menuitem_id`, `lang_id`, `menu_id`, `parent_menuitem_id`, `menuitem_target`, `menuitem_link`, `menuitem_text`, `display_order`, `http_protocol`,`status_ind`, `created_date`, `last_modified_date`, `created_by`, `modified_by`)
                          SELECT `menuitem_id`, $lang_id_to as `lang_id`, `menu_id`, `parent_menuitem_id`, `menuitem_target`, `menuitem_link`, `menuitem_text`, `display_order`, `http_protocol`,`status_ind`, `created_date`, `last_modified_date`, `created_by`, `modified_by` FROM `menuitems` WHERE `lang_id` = $lang_id_from");
        $this->db->query("INSERT INTO `settings`(`setting_id`, `lang_id`, `type`, `setting_key`, `setting_name`,`setting_value`, `status_ind`)
                          SELECT `setting_id`, $lang_id_to as `lang_id`, `type`, `setting_key`, `setting_name`,`setting_value`, `status_ind` FROM `settings` WHERE `lang_id` = $lang_id_from");
        $this->db->query("INSERT INTO `pages`(`page_id`,`lang_id`, `type_id`, `menuitem_id`, `widget_id_1`, `widget_id_2`, `widget_id_3`, `widget_id_4`, `widget_id_5`, `template_id`, `page_title`, `page_path`,`display_image`, `alt_title`, `page_slug`, `page_content`, `meta_title`, `meta_description`, `meta_keywords`, `other_meta_tags`, `nofollow_ind`, `noindex_ind`,`canonical_index`,`canonical_url`,`redirection_link`, `status_ind`, `created_date`, `last_modified_date`, `created_by`, `modified_by`)
                          SELECT `page_id`, $lang_id_to as `lang_id`, `type_id`, `menuitem_id`, `widget_id_1`, `widget_id_2`, `widget_id_3`, `widget_id_4`, `widget_id_5`, `template_id`, `page_title`, `page_path`,`display_image`, `alt_title`, `page_slug`, `page_content`, `meta_title`, `meta_description`, `meta_keywords`, `other_meta_tags`, `nofollow_ind`, `noindex_ind`,`canonical_index`,`canonical_url`,`redirection_link`, `status_ind`, `created_date`, `last_modified_date`, `created_by`, `modified_by` FROM `pages` WHERE `lang_id` = $lang_id_from");
        $this->db->query("INSERT INTO `widgets`(`widget_id`,`lang_id`, `template_id`, `area_id`, `widget_title`, `widget_type`, `widget_content`,`link_target`,`blog_url`, `display_tittle`, `display_order`, `status_ind`, `created_date`, `allow_customize`)
                          SELECT `widget_id`, $lang_id_to as `lang_id`, `template_id`, `area_id`, `widget_title`, `widget_type`, `widget_content`,`link_target`,`blog_url`, `display_tittle`, `display_order`, `status_ind`, `created_date`, `allow_customize` FROM `widgets` WHERE `lang_id` = $lang_id_from");
        $this->db->query("INSERT INTO `banners`(`banner_id`,`lang_id`, `banner_path`, `link_target`, `banner_title`, `alt_title`,`display_order`, `status_ind`,`title_txt_ind`,`banner_txt_ind`, `created_date`, `last_modified_date`, `created_by`, `modified_by`, `button_text`, `button_url`)
                          SELECT `banner_id`, $lang_id_to as `lang_id`, `banner_path`, `link_target`, `banner_title`, `alt_title`,`display_order`, `status_ind`,`title_txt_ind`,`banner_txt_ind`, `created_date`, `last_modified_date`, `created_by`, `modified_by`, `button_text`, `button_url` FROM `banners` WHERE `lang_id` = $lang_id_from");
        $this->db->query("INSERT INTO `donation_modes`(`mode_id`,`lang_id`, `mode_name`, `status_ind`, `created_date`, `last_modified_date`, `created_by`, `modified_by`)
                          SELECT `mode_id`, $lang_id_to as `lang_id`, `mode_name`, `status_ind`, `created_date`, `last_modified_date`, `created_by`, `modified_by` FROM `donation_modes` WHERE `lang_id` = $lang_id_from");
        $this->db->query("INSERT INTO `donation_options`(`option_id`,`lang_id`, `type_id`, `option_amount`, `option_name`, `status_ind`, `created_date`, `last_modified_date`, `created_by`, `modified_by`)
                          SELECT `option_id`, $lang_id_to as `lang_id`, `type_id`, `option_amount`, `option_name`, `status_ind`, `created_date`, `last_modified_date`, `created_by`, `modified_by` FROM `donation_options` WHERE `lang_id` = $lang_id_from");
        $this->db->query("INSERT INTO `donation_types`(`type_id`,`lang_id`, `type_name`, `status_ind`, `created_date`, `last_modified_date`, `created_by`, `modified_by`)
                          SELECT `type_id`, $lang_id_to as `lang_id`, `type_name`, `status_ind`, `created_date`, `last_modified_date`, `created_by`, `modified_by` FROM `donation_types` WHERE `lang_id` = $lang_id_from");
        $this->db->query("INSERT INTO `email_templates`( `template_id`, `lang_id`, `template_title`, `template_content`,`from`,`cc`,`bcc`, `status_ind`, `created_date`, `last_modified_date`, `created_by`, `modified_by`)
                          SELECT `template_id`, $lang_id_to as `lang_id`, `template_title`, `template_content`,`from`,`cc`,`bcc`, `status_ind`, `created_date`, `last_modified_date`, `created_by`, `modified_by` FROM `email_templates` WHERE `lang_id` = $lang_id_from");
        $this->db->query("INSERT INTO `events`(`event_id`, `lang_id`, `event_title`, `event_date`,`event_month`,`event_year`, `photo_path`,`display_image`, `alt_title`, `event_slug`, `event_short_desc`, `event_long_desc`, `meta_title`, `meta_description`, `meta_keywords`, `other_meta_tags`, `nofollow_ind`, `noindex_ind`, `canonical_index`,`canonical_url`,`redirection_link`, `status_ind`, `created_date`, `last_modified_date`, `created_by`, `modified_by`)
                          SELECT `event_id`, $lang_id_to as `lang_id`, `event_title`, `event_date`,`event_month`,`event_year`, `photo_path`,`display_image`, `alt_title`, `event_slug`, `event_short_desc`, `event_long_desc`, `meta_title`, `meta_description`, `meta_keywords`, `other_meta_tags`, `nofollow_ind`, `noindex_ind`, `canonical_index`,`canonical_url`,`redirection_link`, `status_ind`, `created_date`, `last_modified_date`, `created_by`, `modified_by` FROM `events` WHERE `lang_id` = $lang_id_from");
        $this->db->query("INSERT INTO `faq_categories`(`category_id`,`lang_id`, `category_name`, `status_ind`, `created_date`, `last_modified_date`, `created_by`, `modified_by`)
                          SELECT `category_id`, $lang_id_to as `lang_id`, `category_name`, `status_ind`, `created_date`, `last_modified_date`, `created_by`, `modified_by` FROM `faq_categories` WHERE `lang_id` = $lang_id_from");
        $this->db->query("INSERT INTO `faqs`(`faq_id`, `lang_id`, `category_id`, `faq_question`, `faq_answer`, `status_ind`, `created_date`, `last_modified_date`, `created_by`, `modified_by`)
                          SELECT `faq_id`, $lang_id_to as `lang_id`, `category_id`, `faq_question`, `faq_answer`, `status_ind`, `created_date`, `last_modified_date`, `created_by`, `modified_by` FROM `faqs` WHERE `lang_id` = $lang_id_from");
        $this->db->query("INSERT INTO `galleries`(`gallery_id`, `lang_id`, `gallery_name`, `sub_query`, `gallery_year`,`gallery_month`, `alt_title`, `description`, `gallery_type`, `status_ind`, `created_date`, `last_modified_date`, `created_by`, `modified_by`)
                          SELECT `gallery_id`, $lang_id_to as `lang_id`, `gallery_name`, `sub_query`, `gallery_year`,`gallery_month`, `alt_title`, `description`, `gallery_type`, `status_ind`, `created_date`, `last_modified_date`, `created_by`, `modified_by` FROM `galleries` WHERE `lang_id` = $lang_id_from");
        $this->db->query("INSERT INTO `news`(`news_id`,`lang_id`, `news_title`, `news_date`, `news_year`, `news_month`, `news_slug`, `news_short_desc`, `news_path`,`display_image`,`news_long_desc`, `meta_title`, `meta_description`, `meta_keywords`, `other_meta_tags`, `nofollow_ind`, `noindex_ind`,`canonical_index`,`canonical_url`,`redirection_link`, `status_ind`, `created_date`, `last_modified_date`, `created_by`, `modified_by`)
                          SELECT `news_id`, $lang_id_to as `lang_id`, `news_title`, `news_date`, `news_year`, `news_month`, `news_slug`, `news_short_desc`, `news_path`,`display_image`,`news_long_desc`, `meta_title`, `meta_description`, `meta_keywords`, `other_meta_tags`, `nofollow_ind`, `noindex_ind`,`canonical_index`,`canonical_url`,`redirection_link`, `status_ind`, `created_date`, `last_modified_date`, `created_by`, `modified_by` FROM `news` WHERE `lang_id` = $lang_id_from");
        $this->db->query("INSERT INTO `photos`(`photo_id`,`lang_id`, `gallery_id`, `photo_path`, `photo_title`, `alt_title`, `short_description`, `status_ind`, `created_date`,`photo_month`,`photo_year`,`last_modified_date`, `created_by`, `modified_by`)
                          SELECT `photo_id`, $lang_id_to as `lang_id`, `gallery_id`, `photo_path`, `photo_title`, `alt_title`, `short_description`, `status_ind`, `created_date`,`photo_month`,`photo_year`,`last_modified_date`, `created_by`, `modified_by` FROM `photos` WHERE `lang_id` = $lang_id_from");
        $this->db->query("INSERT INTO `phrases`( `phrase_id`, `lang_id` ,`type`,`controller_name`, `phrase_key`, `phrase_name`, `phrase_value`, `status_ind`)
                          SELECT `phrase_id`, $lang_id_to as `lang_id` ,`type`,`controller_name`, `phrase_key`, `phrase_name`, `phrase_value`, `status_ind` FROM `phrases` WHERE `lang_id` = $lang_id_from");
        $this->db->query("INSERT INTO `testimonial`(`testimonial_id`, `lang_id`, `employee_name`,`testimonial_slug`,`display_order`,`canonical_index`,`canonical_url`,`redirection_link`, `degisation`,`address`, `company_name`,`email`,`mobileno`, `employee_image`,`display_image`, `image_alt_tag`, `testimonial_short_desc`,`nofollow_ind`, `noindex_ind`, `status_ind`,`rating`,`ip_address`, `created_date`, `last_modified_date`, `created_by`, `modified_by`)
                          SELECT `testimonial_id`, $lang_id_to as `lang_id`, `employee_name`,`testimonial_slug`,`display_order`,`canonical_index`,`canonical_url`,`redirection_link`, `degisation`,`address`, `company_name`,`email`,`mobileno`, `employee_image`,`display_image`, `image_alt_tag`, `testimonial_short_desc`,`nofollow_ind`, `noindex_ind`, `status_ind`,`rating`,`ip_address`, `created_date`, `last_modified_date`, `created_by`, `modified_by` FROM `testimonial` WHERE `lang_id` = $lang_id_from");
        $this->db->query("INSERT INTO `downloads`(`download_id`, `lang_id`, `download_type_id`, `download_path`, `download_title`, `status_ind`, `created_date`, `last_modified_date`, `created_by`, `modified_by`)
                          SELECT `download_id`, $lang_id_to as `lang_id`, `download_type_id`, `download_path`, `download_title`, `status_ind`, `created_date`, `last_modified_date`, `created_by`, `modified_by` FROM `downloads` WHERE `lang_id` = $lang_id_from");
        $this->db->query("INSERT INTO `download_types`(`download_type_id`, `lang_id`, `download_type_name`, `status_ind`, `created_date`, `last_modified_date`, `created_by`, `modified_by`)
                          SELECT `download_type_id`, $lang_id_to as `lang_id`, `download_type_name`, `status_ind`, `created_date`, `last_modified_date`, `created_by`, `modified_by` FROM `download_types` WHERE `lang_id` = $lang_id_from");
        $this->db->query("INSERT INTO `videos`(`video_id`, `lang_id`,`gallery_id`, `video_path`, `video_title`, `alt_title`, `short_description`, `status_ind`, `display_order`,`video_year`, `video_month`, `created_date`, `last_modified_date`, `created_by`, `modified_by`)
                          SELECT `video_id`, $lang_id_to as `lang_id`,`gallery_id`, `video_path`, `video_title`, `alt_title`, `short_description`, `status_ind`, `display_order`,`video_year`, `video_month`, `created_date`, `last_modified_date`, `created_by`, `modified_by` FROM `videos` WHERE `lang_id` = $lang_id_from");
        $this->db->query("INSERT INTO `enquiry_natures`(`enquiry_nature_id` ,`lang_id`, `enquiry_nature_name` , `status_ind` , `created_date` , `last_modified_date` , `created_by` , `modified_by` )
                          SELECT `enquiry_nature_id` ,$lang_id_to as `lang_id`, `enquiry_nature_name` , `status_ind` , `created_date` , `last_modified_date` , `created_by` , `modified_by`  FROM `enquiry_natures` WHERE `lang_id` = $lang_id_from");
        $this->db->query("INSERT INTO `partners`(`partner_id`,`lang_id`, `display_image`,`image_only`,`partner_path`, `alt_title`, `partner_title`, `partner_slug`,`display_order`, `partner_short_desc`, `partner_long_desc`, `meta_title`, `meta_description`, `meta_keywords`, `other_meta_tags`, `nofollow_ind`, `noindex_ind`, `canonical_index`,`canonical_url`,`redirection_link`,`status_ind`, `created_date`, `last_modified_date`, `created_by`, `modified_by`)
                          SELECT `partner_id`, $lang_id_to as `lang_id`, `display_image`,`image_only`,`partner_path`, `alt_title`, `partner_title`, `partner_slug`,`display_order`, `partner_short_desc`, `partner_long_desc`, `meta_title`, `meta_description`, `meta_keywords`, `other_meta_tags`, `nofollow_ind`, `noindex_ind`, `canonical_index`,`canonical_url`,`redirection_link`, `status_ind`, `created_date`, `last_modified_date`, `created_by`, `modified_by` FROM `partners` WHERE `lang_id` = $lang_id_from");

        $this->db->query("SET FOREIGN_KEY_CHECKS=1");
    }

}