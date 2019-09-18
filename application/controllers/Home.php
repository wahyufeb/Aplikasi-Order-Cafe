<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
  
  public function __construct()
  {
    parent::__construct();
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
  
  public function index()
  {
    $data['all_menu'] = $this->M_All->getAll('menu')->result_array();
    $this->load->view('home/index', $data);
    $this->footer();
  }

}

/* End of file Home.php */
