<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ListProduk extends CI_Controller {
  
  public function __construct()
  {
    parent::__construct();
    //Do your magic here
    $this->load->model('M_ListProduk');
    
  }
  
  public function index()
  {
    $this->load->view('produk/list_produk');
    
  }

}

/* End of file ListProduk.php */
