<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
  
  public function __construct(){
    parent::__construct();
    if($this->session->userdata('level') != "member"){
      redirect('Auth/Masuk');
    }
    $this->load->library('encryption');
    // General Query
    //Model
    $this->load->model('M_All');
    
    // spesifik model
    $this->load->model('M_Home');

  }

  // templating
  function footer(){
    $this->load->view('template/footer');
  }
  
  public function index(){
    $where = array('kategori' => 'minuman');
    $where2 = array('kategori' => 'makanan');
    $data['all_menu'] = $this->M_All->getAll('menu')->result_array();
    $data['makananlaku'] = $this->M_Home->getLakuKategori($where2, 'menu')->result_array();
    $data['minumanlaku'] = $this->M_Home->getLakuKategori($where, 'menu')->result_array();
    $this->load->view('home/index', $data);
    $this->footer();
  }

  public function pesanan(){
    $id = $this->session->userdata('id_user');
    $where = array(
      'invoices.id_user' => $id,
      'invoices.status' => 'proses'
    );
    $data['pesananmu'] = $this->M_Home->getInvTrans($where)->result_array();
    $this->load->view('home/pesanan_user', $data);
    // print_r($data['pesananmu']);
  }

  function a(){
    $a = 'EnkripsiUntukAplikasiPemesananOnlineBDP12345678900987654321234567890qwertyuiopasdfghjklzxcvbnmmnbvcxzlkjhgfdsapoiuytrewqQAZXSWEDCVFRTGBNHUJMKIOPL';
    $b = password_hash($a, PASSWORD_DEFAULT);
    echo $b;
  }

  function coba(){
    $id = 1;
    $encode_id = $this->encryption->encrypt($id);
    $decrypt_id = $this->encryption->decrypt($encode_id);

    echo $encode_id;
    echo $decrypt_id;
  }

  function logout(){
    $this->session->sess_destroy();
    redirect('Auth/Masuk');
  }

}

/* End of file Home.php */
