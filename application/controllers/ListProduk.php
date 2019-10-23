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

  public function get_autocomplete(){
    if (isset($_GET['term'])) {
        $result = $this->M_ListProduk->search($_GET['term']);
        if (count($result) > 0) {
        foreach ($result as $row)
            $arr_result[] = $row->name;
            echo json_encode($arr_result);
        }
    }
  }

  public function search(){
    $keyword = $this->input->post('search');
    $data['top'] = $this->M_ListProduk->top()->result_array();
    $data['getProdukKategori'] = $this->M_ListProduk->search($keyword);
    $this->load->view('product/list_produk', $data);
    $this->footer();
  }

  public function kategori($kategori){
    if($kategori == ''){
      redirect('Home');
    }
    $where = array('kategori' => $kategori);
    $data['top'] = $this->M_ListProduk->top()->result_array();
    $data['getProdukKategori'] = $this->M_ListProduk->getKategori($where)->result();
    $this->load->view('product/list_produk', $data);
    $this->footer();
  }

  public function filter(){
    $key = $this->input->post('key');
    $data['top'] = $this->M_ListProduk->top()->result_array();
    $data['getProdukKategori'] = $this->M_ListProduk->filter($key)->result();
    $this->load->view('product/list_produk', $data);
    $this->footer();
  }

}

/* End of file ListProduk.php */
