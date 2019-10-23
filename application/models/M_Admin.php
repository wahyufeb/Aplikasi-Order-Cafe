<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Admin extends CI_Model {
  // Get All
  function getInvoices($where){
    $this->db->select('users.nama_lengkap, users.no_hp, users.photo, invoices.*');
    $this->db->join('users', 'users.id_user = invoices.id_user', 'left');
    $this->db->order_by('invoices.tanggal', 'desc');
    $this->db->where($where);
    return $this->db->get('invoices');    
  }

  // Konfirmasi Pesanan
  function konfirmasiPesanan($where){
    $data = array('status' => 'dibayar');
    $this->db->where($where);
    return $this->db->update('invoices', $data);
  }

}

/* End of file M_Admin.php */
