<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  public function index()
  {
    $this->load->view('account/login');
  }

  public function login_process(){
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $where = array('email' => $email);
    $userLog = $this->db->get_where('users',$where)->row_array();
    if($userLog){
      if(password_verify($password, $userLog['password'])){
        $data = array(
          'id_user' => $userLog['id_user'],
          'level' => $userLog['level']
        );
        $this->session->set_userdata($data);
        if($this->session->userdata('level') == "member"){
          redirect('Beranda');
        }
        if($this->session->userdata('level') == "admin"){
          redirect('Admin');
        }
      }else{
        echo 'gagal gan';
      }
    }else{
      echo "email tidak ditemukan";
    }
  }

}

/* End of file Login.php */
