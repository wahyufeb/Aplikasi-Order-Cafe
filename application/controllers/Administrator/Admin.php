<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
  
  public function __construct()
  {
    parent::__construct();
    if($this->session->userdata('level') != "admin"){
      redirect('Auth/Masuk');
    }
    $this->load->model('M_All');
    $this->load->model('M_Admin');
  }
  
  function header(){
    $where = array('id_user' => $this->session->userdata('id_user'));
    $data['userLog'] = $this->M_All->getId($where, 'users')->result_array();
    $this->load->view('admin/header', $data);
  }

  function footer(){
    $this->load->view('admin/footer');
  }

  public function index(){
    $data['inv'] = $this->M_All->getAll('invoices')->row();
    $data['total_barang'] = $this->M_Admin->totalBarang();
    // pendapatan bulanan
    $mulai = date('01-m-y');
    $end = date('32-m-y');
    $data['bulanan'] = $this->M_Admin->hitungPendatapan($mulai, $end)->result_array();
    // pendapatan harian
    $hariini = date('d-m-Y 00:00:00');
    $besok = date('d-m-Y 24:00:00');
    $data['harian'] = $this->M_Admin->hitungPendatapan($hariini, $besok)->result_array();

    $this->header();
    $this->load->view('admin/index', $data);
    $this->footer();
  }

  function cobaa(){
    date_default_timezone_set('Asia/Bangkok');
    $mulai = date('d-m-Y 00:00:00');
    $end = date('d-m-Y 24:00:00');
    $a = $this->M_Admin->hitungPendatapan($mulai, $end);
    print_r($mulai);
    echo '<br>';
    print_r($end);
    print_r($a->result());
  }


  // Pesanan
  public function pesanan(){
    $this->header();
    $this->load->view('admin/pesanan');
    // $this->footer();
  }

  // Konfirmasi Pesanan
  public function konfirmasi($id_invioce, $id_user){
    $where = array('id_invoice' => $id_invioce);
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
  
    $data['message'] = 'konfimasi_to_'.$id_user;
    $pusher->trigger('my-channel', 'konfirmasi', $data);
    $this->M_Admin->konfirmasiPesanan($where);
    redirect('Administrator/Admin/pesanan');
  }

  // manajemen menu
  public function menu(){
    $data['error'] = '';
    $data['allMenu'] = $this->M_All->getAll('menu')->result_array();
    $this->header();
    $this->load->view('admin/menu', $data);
  }

  // tambah menu
  public function tambah_menu(){
    $config['upload_path'] = './uploads/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size']     = '2048';
    $config['max_width'] = '800';
    $config['max_height'] = '800';
    $config['encrypt_name'] = true;
    $config['remove_spaces'] = true;
    $config['detect_mime'] = true;

    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if ( ! $this->upload->do_upload('gambar')){
      $error = array('error' => $this->upload->display_errors());
      print_r($error);
    }else{
      $data = array('upload_data' => $this->upload->data());
      $filename = $data['upload_data']['file_name'];

      $dataPost = array(
        'kode_menu' => $this->input->post('kode_menu'),
        'image' => $filename,
        'nama' => $this->input->post('nama'),
        'harga' => $this->input->post('harga'),
        'kategori' => $this->input->post('kategori'),
        'stok' => $this->input->post('stok'),
        'waktu' => $this->input->post('waktu'). ' menit'
      );
      $this->M_All->insert_to('menu', $dataPost);
      redirect('Administrator/Admin/menu');
    }
  }

  // update menu
  public function update_menu(){
    $config['upload_path'] = './uploads/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size']     = '2048';
    $config['max_width'] = '800';
    $config['max_height'] = '800';
    $config['encrypt_name'] = true;
    $config['remove_spaces'] = true;
    $config['detect_mime'] = true;

    $this->load->library('upload', $config);
    $this->upload->initialize($config);
    if ( ! $this->upload->do_upload('gambar_update')){
      $error = $this->upload->display_errors();
      if($error = "You did not select a file to upload."){
        $kode_menu = array('kode_menu' => $this->input->post('kodeID'));
        $getImg = $this->M_All->getId($kode_menu, 'menu')->row();
        $data = array(
          'image' => $getImg->image,
          'nama' => $this->input->post('nama_update'),
          'harga' => $this->input->post('harga_update'),
          'kategori' => $this->input->post('kategori_update'),
          'stok' => $this->input->post('stok_update'),
          'waktu' => $this->input->post('waktu_update')
        );
        $this->M_All->update_data($kode_menu, $data, 'menu');
        redirect('Administrator/Admin/menu');
      }else{
        print_r($error);
      }
    }else{
      $data = array('upload_data' => $this->upload->data());
      $filename = $data['upload_data']['file_name'];
      // delete prev image
      $kode_menu = array('kode_menu' => $this->input->post('kodeID'));
      $getImg = $this->M_All->getId($kode_menu, 'menu')->row();
      $photoname = $getImg->image;
      if(file_exists($file=FCPATH.'/uploads/'.$photoname)){
				unlink($file);
      }
      $dataUpdate = array(
        'image' => $filename,
        'nama' => $this->input->post('nama_update'),
        'harga' => $this->input->post('harga_update'),
        'kategori' => $this->input->post('kategori_update'),
        'stok' => $this->input->post('stok_update'),
        'waktu' => $this->input->post('waktu_update')
      );
      $this->M_All->update_data($kode_menu, $dataUpdate, 'menu');
      redirect('Administrator/Admin/menu');
    }
  }

  //delete menu
  public function deleteMenu($kode){
    $where = array('kode_menu' => $kode);
    $getImg = $this->M_All->getId($where, 'menu')->row();
    $photoname = $getImg->image;
    if(file_exists($file=FCPATH.'/uploads/'.$photoname)){
      unlink($file);
    }
    $this->M_All->delete($where, 'menu');
    redirect('Administrator/Admin/menu');
  }

  // All transaksi
  public function allTransaksi(){
    $data['pembayaran'] = $this->M_Admin->allTransaksi()->result_array();
    $this->header();
    $this->load->view('admin/transaksi', $data);
  }

  public function bayar(){
    $total = $this->input->post('total_pembayaran');
    $uang = $this->input->post('uang_pembeli');
    $inv = $this->input->post('inv_id');
    $where = array(
      'kode_transaksi' => $this->input->post('kode_transaksi')
    );
    $data = array(
      'kembalian' => $uang-$total,
      'jum_uang' => $uang
    );

    $dibayar = array(
      'status' => 'dibayar'
    );
    $this->M_All->update_data($where, $data, 'transaksi');
    $this->M_All->update_data(['id_invoice' => $inv], $dibayar, 'invoices');
    redirect('Administrator/Admin/allTransaksi');
  }



  // pengguna
  public function pengguna(){
    $where = array('level' => 'member');
    $data['user'] = $this->M_All->getId($where, 'users')->result_array();
    $this->header();
    $this->load->view('admin/pengguna', $data);
  }


  // logout
  public function logout(){
    $this->session->sess_destroy();
    redirect('Auth/Masuk');
  }


  // AJAX
  // Get Invoices
  function getInv(){
    $where = array('status' => 'belum dibayar');
    $data = $this->M_Admin->getInvoices($where)->result();
    echo json_encode($data);
  }

  // Get Invoice, User & Transaction
  function getInvUserTrans(){
    $where = array('invoices.id_invoice' => $this->input->post('id'));
    $req = $this->M_Admin->getUserInvTrans($where)->result();
    echo json_encode($req);
  }

  // Orders
  function getOrders(){
    $where = array('orders.id_invoice' => $this->input->post('id_invoice'));
    $req = $this->M_Admin->getAllOrders($where)->result();
    echo json_encode($req);
  }

  function getUser(){
    $where = array('id_user' => $this->input->post('id_user'));
    $result = $this->M_All->getId($where, 'users')->result();
    echo json_encode($result);
  }

  function getMenu(){
    $where = array('kode_menu' => $this->input->post('kode'));
    $result = $this->M_All->getId($where, 'menu')->result();
    echo json_encode($result);
  }

  function transaksiId(){
    $where = array('kode_transaksi' => $this->input->post('kode'));
    $result = $this->M_All->getId($where, 'transaksi')->result();
    echo json_encode($result);
  }

  
  function coba(){
    $where = array('invoices.id_invoice' => 1);
    $req = $this->M_Admin->getUserInvTrans($where)->result();
    print_r($req);
  }

}

/* End of file Admin.php */
