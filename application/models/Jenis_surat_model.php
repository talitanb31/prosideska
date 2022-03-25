<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_surat_model extends CI_Model {

  private $_table = "jenis_surat";
  public function __construct()
  {
    parent::__construct();
  }
  
  public function getAllData()
  {
    return $this->db->get($this->_table)->result_array();
  }

  public function insertData()
  {
    $data = array(
      'jenis' => $this->input->post('jenis_surat'),
    );
    return $this->db->insert('jenis_surat',$data);
  }

  public function editData($id)
  {
    return $this->db->get_where($this->_table, ['id' => $id])->row_array();
  }
  public function updateData()
  {
    $data = array('jenis' => $this->input->post('jenis_surat') );
        $this->db->where('id',$this->uri->segment(3));
        return $this->db->update('jenis_surat',$data);
  }
  public function deleteData($id)
  {
    $this->db->where('id',$id);
    $this->db->delete('jenis_surat');
  }
  public function getIdData()
  {
    
    $this->db->select('*');
    $this->db->where('id',$this->uri->segment(3));
    return $this->db->get('jenis_surat');
  }

}