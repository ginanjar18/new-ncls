<?php 

class Permohonan_Produk_Nucleus_Detail extends CI_Model {

  function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }

  public function show($id, $column = '*')
  {
    $this->db->select($column);
    $this->db->where('id_permohonan', $id);
    $this->db->where('hapus', null);
    $result = $this->db->get('v_ppnd');
    if (!$result) {
      $ret_val = array(
        'status' => 'error',
        'data'   => $this->db->error(),
      );
    } else {
      $ret_val = array(
        'status' => 'success',
        'data'   => $result,
      );
    }
    return $ret_val;
  }

  public function store($data = array())
  {
    $query = $this->db->set($data)->get_compiled_insert('permohonan_produk_nucleus_detail');
    $this->db->query($query);
  }

  public function update($id, $id_produk, $data = array())
  {
    $this->db->set($data);
    $this->db->where('id_permohonan', $id);
    $this->db->where('id_produk', $id_produk);
    $query = $this->db->get_compiled_update('permohonan_produk_nucleus_detail');
    $this->db->query($query);
  }

}