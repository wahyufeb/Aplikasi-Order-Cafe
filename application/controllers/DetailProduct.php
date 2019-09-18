<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class DetailProduct extends CI_Controller {
  
  public function __construct()
  {
    parent::__construct();
    //Do your magic here
    $this->load->model('M_DetailProduct');
  }

  // templating
  function footer(){
    $this->load->view('template/footer');
  }

  public function index(){
    redirect('ListProduk');
  }

  public function detail($kode){
    if($kode == ''){
      redirect('ListProduk');
    }
    $where = array('kode_menu' => $kode);
    $data['getProdukId'] = $this->M_DetailProduct->getProduct($where)->result_array();
    $this->load->view('product/detail', $data);
    $this->footer();
  }

}

/* End of file DetailProduct.php */
