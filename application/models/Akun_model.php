<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Akun_model
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

class Akun_model extends CI_Model {

  // ------------------------------------------------------------------------
  private $_table = "akun";
  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function getAllData()
  {
    return $this->db->get($this->_table)->result_array();
  }

  public function insertData()
  {
    $password = password_hash($this->input->post('password'),PASSWORD_BCRYPT);
    $data = array(
      'nama' => $this->input->post('name'),
      'username' => $this->input->post('username'),
      'password' => $password,
      'level' => 'admin',
    );
    return $this->db->insert('akun',$data);
  }
  public function editData($id)
  {
    return $this->db->get_where($this->_table, ['id' => $id])->row_array();
  }
  public function updateData($id)
  {
    $data = array(
      'nama' => $this->input->post('name'),
      'username' => $this->input->post('username'),
    );
    $this->db->where('id', $id);
    return $this->db->update('akun',$data);
  }
  public function deleteData($id)
  {
    $this->db->where('id',$id);
    $this->db->delete('akun');
  }
  // ------------------------------------------------------------------------

}

/* End of file Akun_model.php */
/* Location: ./application/models/Akun_model.php */