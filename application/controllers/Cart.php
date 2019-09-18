<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
  
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_All');
  }
  
  public function index()
  {
    $this->load->view('orders/cart');
    
  }

  public function addToCart(){
    // where product
    $whereKode = array('kode_menu' => $this->input->post('cartKode'));
    // qty & catatan
    $qty = $this->input->post('cartQty');
    $catatan = $this->input->post('cartCatatan');
    // query get by id
    $getKode = $this->M_All->getId($whereKode, 'menu')->result();
    $result = $getKode[0];
    $data = array(
      'id' => $result->kode_menu,
      'price' => $result->harga,
      'qty' => $qty,
      'name' => $result->nama,
      'options' => array(
        'catatan' => $catatan
      )
    );
    $insert = $this->cart->insert($data);
    $mess = ''; 
    if($insert){
      $mess = 'sukses';
      echo json_encode($mess);
    }else{
      $mess = 'gagal';
      echo json_encode($mess);
    }
  }

}

/* End of file Cart.php */
