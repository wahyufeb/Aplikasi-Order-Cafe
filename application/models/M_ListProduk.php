<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_ListProduk extends CI_Model {

  function getKategori($where){
    return $this->db->get_where('menu', $where);
  }

}

/* End of file M_ListProduk.php */
