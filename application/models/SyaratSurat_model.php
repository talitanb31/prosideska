<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Jenis_surat_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class SyaratSurat_model extends CI_Model {

  // ------------------------------------------------------------------------
  private $_table = "syarat_surat";
  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function getAllData()
  {
    $this->db->select('syarat_surat.*,jenis_surat.jenis');
    $this->db->from($this->_table);
    $this->db->join('jenis_surat', 'jenis_surat.id = syarat_surat.id_jenis_surat');
    $query = $this->db->get();

    return $query->result_array();
  }

  public function insertData()
  {
    $data = array(
      'id_jenis_surat' => $this->input->post('jenis_surat'),
      'syarat' => $this->input->post('syarat_surat'),
    );
    return $this->db->insert($this->_table,$data);
  }

  public function editData($id)
  {
    return $this->db->get_where($this->_table, ['id' => $id])->row_array();
  }

  public function updateData($id)
  {
    $data = array(
      'id_jenis_surat' => $this->input->post('jenis_surat'),
      'syarat' => $this->input->post('syarat_surat')
    );

    $this->db->where('id', $id);

    return $this->db->update($this->_table,$data);
  }

  public function deleteData($id)
  {
    $this->db->where('id',$id);
    $this->db->delete($this->_table);
  }

  public function getIdData()
  {
    $this->db->select('*');
    $this->db->where('id',$this->uri->segment(3));

    return $this->db->get($this->_table);
  }

}