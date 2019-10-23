<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
  
  public function __construct()
  {
    parent::__construct();
    if($this->session->userdata('level') != "admin"){
      redirect('Account/Login');
    }
    $this->load->model('M_All');
    $this->load->model('M_Admin');
  }
  
  function header(){
    $this->load->view('admin/header');
  }

  function footer(){
    $this->load->view('admin/footer');
  }

  public function index()
  {
    $data['inv'] = $this->M_All->getAll('invoices')->result_array();
    $this->header();
    $this->load->view('admin/index', $data);
    $this->footer();
  }


  // Pesanan
  public function pesanan(){
    $this->header();
    $this->load->view('admin/pesanan');
    $this->footer();
  }

  // Konfirmasi Pesanan
  public function konfirmasi($id_invioce){
    $where = array('id_invoice' => $id_invioce);
    $this->M_Admin->konfirmasiPesanan($where);
    redirect('Administrator/Admin/pesanan');
  }

  public function getInv(){
    $where = array('status' => 'belum dibayar');
    $data = $this->M_Admin->getInvoices($where)->result();
    echo json_encode($data);
  }

}

/* End of file Admin.php */
