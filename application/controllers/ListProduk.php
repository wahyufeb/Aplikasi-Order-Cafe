<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ListProduk extends CI_Controller {
  
  public function __construct()
  {
    parent::__construct();
    //Do your magic here
    $this->load->model('M_ListProduk');
    
  }
    // templating
    function footer(){
      $this->load->view('template/footer');
    }
  
  public function index(){
    redirect('Home');
  }

  public function kategori($kategori){
    if($kategori == ''){
      redirect('Home');
    }
    $where = array('kategori' => $kategori);
    $data['getProdukKategori'] = $this->M_ListProduk->getKategori($where)->result_array();
    $this->load->view('product/list_produk', $data);
    $this->footer();
  }

}

/* End of file ListProduk.php */
