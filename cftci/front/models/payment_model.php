<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Payment_Model extends CI_Model {

    private $table;
    public $primary_key;
    public $data;

    function __construct() {
        parent::__construct();
        $this->table = substr(strtolower(get_class($this)), 0, -6);
        $this->primary_key = array();
        $this->date = array();
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
    public function insert($table){
        $r = $this->db->insert($table,$this->data);
        return $this->db->insert_id();
      }
      public function update($table){
          $this->db->where($this->primary_key);
          $this->db->update($table,$this->data);
          return true;
      }
  
    public function row_data($table) {
        $this->db->where($this->primary_key);
        $query = $this->db->get($table);
        $row = $query->row();
        $this->reset_pk();
        return $row;
    }
    }