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
    $data = array('status' => 'proses');
    $this->db->where($where);
    return $this->db->update('invoices', $data);
  }


  // get Invoices, User, Transaksi
  function getUserInvTrans($where){
    $this->db->select('users.nama_lengkap, users.no_hp, users.photo, invoices.*, transaksi.*');
    $this->db->join('users', 'users.id_user = invoices.id_user', 'left');
    $this->db->join('transaksi', 'transaksi.id_invoice = invoices.id_invoice', 'left');
    $this->db->where($where);
    return $this->db->get('invoices');    
  }

  // All Orders
  function getAllOrders($where){
    $this->db->from('orders');
    $this->db->join('menu', 'menu.kode_menu = orders.kode_menu', 'left');
    $this->db->where($where);
    return $this->db->get();
  }

  // all transaksi
  function allTransaksi(){
    $this->db->where('invoices.status', 'proses');
    $this->db->join('invoices', 'invoices.id_invoice = transaksi.id_invoice', 'left');
    return $this->db->get('transaksi');
  }


  // Semua Perhitungan
  function totalBarang(){
    return $this->db->get('menu')->num_rows();
  }

  function hitungPendatapan($mulai, $end){
    $this->db->select('SUM(total) as jumlah');
    $this->db->where('tanggal >=', $mulai);
    $this->db->where('tanggal <=', $end);
    return $this->db->get('invoices');
  }

}

/* End of file M_Admin.php */
