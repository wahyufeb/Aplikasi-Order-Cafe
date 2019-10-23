<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_ListProduk extends CI_Model {

  function getKategori($where){
    return $this->db->get_where('menu', $where);
  }

  function search($tittle){
    $this->db->like('nama', $tittle);
    $this->db->or_like('kategori', $tittle);
    return $this->db->get('menu')->result();
  }

  function top(){
    $this->db->order_by('terjual', 'desc');
    return $this->db->get('menu', 10);
  }

  function filter($key){
    if($key == "lebih20"){
      return $this->db->query("SELECT * FROM menu WHERE harga > 20000");
    }elseif ($key == "kurang20") {
      return $this->db->query("SELECT * FROM menu WHERE harga < 20000");
    }elseif ($key == "laku") {
      $this->db->order_by('terjual', 'desc');
      return $this->db->get('menu', 10);
    }else{
      return $this->db->get('menu');
    }
  }

}

/* End of file M_ListProduk.php */
