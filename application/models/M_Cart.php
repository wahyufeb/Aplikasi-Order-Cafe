<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Cart extends CI_Model {

  function orders($data, $table){
    // insert into invoice table
    $this->db->insert($table, $data);
    // id invoice
    $id_invoice = $this->db->insert_id();
    // create transactions code
    $length = 8;
    $code= "";
    $data = "A1B2C3D4E5F6G7H8I9J10K23L02M2N0O0P2Q1R2S3T4U5V6W7X8Y9Z10QWERTYUIOPLKJHGFDSAZXCVBNM1QAZXSW23EDCVFR45TGBNHY67UJM8IK9OL0PPLKMNJI9876543WSCGY54323456TFVBHUYTREW34567";
    for($i = 0; $i < $length; $i++){
        $code .= substr($data, (rand()%(strlen($data))), 1);
    }

    foreach ($this->cart->contents() as $item) {
      // handle terjual
      $where = array('kode_menu' => $item['id']);
      $getMenu = $this->db->get_where('menu', $where)->result();

      $defaultTerjual = $getMenu[0]->terjual;
      $terjual = array(
        'terjual' => $defaultTerjual + 1
      );
      $this->db->update('menu', $terjual, $where);

      $orders = array(
        'id_invoice' => $id_invoice,
        'kode_menu' => $item['id'],
        'qty' => $item['qty'],
        'subtotal' => $item['subtotal'],
        'catatan' => $item['options']['catatan'],
        'kode_transaksi' => $code
      );
      $this->db->insert('orders', $orders);
    }
    
    // insert into transaksi table
    $transaksi = array(
      'kode_transaksi' => $code,
      'id_user' => 1,
      // 'id_user' => $this->session->userdata('id_user'),
      'id_invoice' => $id_invoice,
      'total_pembayaran' => $this->cart->total()
    );
    $this->db->insert('transaksi', $transaksi);
    $this->cart->destroy();
  }

}

/* End of file M_All.php */
