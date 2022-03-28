<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Berita_model extends CI_Model
{
    public $table = 'berita';
    public $order = 'ASC';

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllData()
    {
        return $this->db->get($this->table)->result_array();
    }

    public function insertData($file)
    {
        $data = array(
            'id_admin' => $_SESSION['id'],
            'cover' => $file,
            'title' => $this->input->post('title'),
            'deskripsi' => $this->input->post('deskripsi'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        return $this->db->insert($this->table, $data);
    }

    public function editData($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row_array();
    }

    public function updateData($id, $filename)
    {
        $data = array(
            'id_admin' => $_SESSION['id'],
            'title' => $this->input->post('title'),
            'deskripsi' => $this->input->post('deskripsi'),
            'updated_at' => date('Y-m-d H:i:s'),
        );

        if ($filename != '') {
            $this->db->where('id', $id);
            $this->db->update($this->table, array('cover' => $filename));
        }
        $this->db->where('id', $id);

        return $this->db->update($this->table, $data);
    }

    public function deleteData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }
}
