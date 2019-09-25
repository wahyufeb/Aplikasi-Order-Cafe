<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
  
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_All');
    
  }
  
  public function index()
  {
    $data['inv'] = $this->M_All->getAll('invoices')->result_array();
    $this->load->view('admin/index', $data);
  }

  function getInv(){
    $data = $this->M_All->getAll('invoices')->result();
    echo json_encode($data);
  }

}

/* End of file Admin.php */
