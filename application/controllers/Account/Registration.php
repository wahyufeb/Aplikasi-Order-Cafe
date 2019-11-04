<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {
  
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_All');
  }
  
  public function index()
  {
    $this->load->view('account/daftar');
    
  }

  public function register_process(){
    $namaDepan = $this->input->post('nama_depan');
    $namaBelakang = $this->input->post('nama_belakang');
    $namaLengkap = $namaDepan." ".$namaBelakang;
    $data = array(
      'nama_lengkap' => $namaLengkap,
      'email' => $this->input->post('email'),
      'photo' => 'user.png',
      'no_hp' => $this->input->post('no_hp'),
      'tgl_lahir' => $this->input->post('tanggal_lahir'),
      'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
      'level' => 'member'
    );
    $this->M_All->insert_to('users', $data);
    redirect('Account/Login');
  }

}

/* End of file Registration.php */
