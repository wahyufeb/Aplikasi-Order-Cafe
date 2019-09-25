<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
  
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_All');
    $this->load->model('M_Cart');
    
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
    if($catatan == ""){
      $catatan = "tidak ada catatan";
    }
    // query get by id
    $getKode = $this->M_All->getId($whereKode, 'menu')->result();
    $result = $getKode[0];
    $data = array(
      'id' => $result->kode_menu,
      'price' => $result->harga,
      'qty' => $qty,
      'name' => $result->nama,
      'options' => array(
        'catatan' => $catatan,
        'img_name' => $result->image
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

  public function deleteItem($rowid){
    $where = array('rowid' => $rowid,
                    'qty' => 0
    );
    $this->cart->update($where);
    redirect('Cart');
  }

  public function addQty($rowid, $qty, $image, $catatan){
    $catatan = str_replace('%20', ' ', $catatan);
    $data = array(
      'rowid' => $rowid,
      'qty' => $qty + 1,
      'options' => array(
        'img_name' => $image,
        'catatan' => $catatan
      )
    );
    $this->cart->update($data);
    redirect('Cart');
  }

  public function minQty($rowid, $qty, $image, $catatan){
    $catatan = str_replace('%20', ' ', $catatan);
    $data = array(
      'rowid' => $rowid,
      'qty' => $qty - 1,
      'options' => array(
        'img_name' => $image,
        'catatan' => $catatan
      )
    );
    $this->cart->update($data);
    redirect('Cart');
  }

  public function checkout(){
    date_default_timezone_set('Asia/Bangkok');
    $invoices = array(
      'id_user' => 1,
      // 'id_user' => $this->session->userdata('id_user'),
      'tanggal' => date('d-m-Y H:i:s'),
      'no_meja' => $this->input->post('no_meja'),
      'status' => 'belum dibayar',
      'total' => $this->cart->total()
    );
    // pusher
    require_once(APPPATH.'views/vendor/autoload.php');
    $options = array(
      'cluster' => 'ap1',
      'useTLS' => true
    );
    $pusher = new Pusher\Pusher(
      'b8a3021cab51c9711d9b',
      '76d78ab2839d88cf20ee',
      '855723',
      $options
    );
  
    $data['message'] = 'hello';
    $pusher->trigger('my-channel', 'my-event', $data);
    $this->M_Cart->orders($invoices, 'invoices');
    $this->session->set_flashdata('notif', 'notif');
    redirect('Home/index');
  }

}

/* End of file Cart.php */
