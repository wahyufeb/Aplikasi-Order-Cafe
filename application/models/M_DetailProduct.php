<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_DetailProduct extends CI_Model {

  function getProduct($where){
    return $this->db->get_where('menu', $where);
  }

}

/* End of file M_DetailProduct.php */
