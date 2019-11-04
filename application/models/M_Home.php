<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Home extends CI_Model {

  // get minuman & makanan laku
  function getLakuKategori($where, $table){
    $this->db->order_by('terjual', 'desc');
    return $this->db->get_where($table, $where);
  }

  // Pesanan User
  function getInvTrans($where){
    $this->db->where($where);
    $this->db->join('transaksi', 'transaksi.id_invoice = invoices.id_invoice', 'left');
    return $this->db->get('invoices');
  } 
}

/* End of file M_Home.php */
