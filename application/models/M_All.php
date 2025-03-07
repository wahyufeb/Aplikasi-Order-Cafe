<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_All extends CI_Model {
  // get All
  function getAll($table){
    return $this->db->get($table);
  }

  // get Id
  function getId($where, $table){
    return $this->db->get_where($table, $where);
  }

  // insert into DB
  function insert_to($table, $data){
    return $this->db->insert($table, $data);
  }

  function update_data($where, $data, $table){
    $this->db->where($where);
    return $this->db->update($table, $data); 
  }

  function delete($where, $table){
    $this->db->where($where);
    return $this->db->delete($table);
  }

}

/* End of file M_All.php */
