<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class KartuKeluarga_model extends CI_Model
{
    public $table = 'kartu_keluarga';
    public $order = 'ASC';

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllData()
    {
        return $this->db->get($this->table)->result_array();
    }

    public function insertData($scanKK)
    {
        $data = array(
            'alamat' => $this->input->post('alamat'),
            'dusun' => $this->input->post('dusun'),
            'dusun' => $this->input->post('dusun'),
            'rt' => $this->input->post('rt'),
            'rw' => $this->input->post('rw'),
            'ekonomi' => $this->input->post('ekonomi'),
            'file_kk' => $scanKK,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        return $this->db->insert($this->table, $data);
    }

    public function editData($id)
    {
        return $this->db->get_where($this->table, ['id' => $id])->row_array();
    }

    public function updateData($id)
    {
        $data = array(
            'alamat' => $this->input->post('alamat'),
            'dusun' => $this->input->post('dusun'),
            'dusun' => $this->input->post('dusun'),
            'rt' => $this->input->post('rt'),
            'rw' => $this->input->post('rw'),
            'ekonomi' => $this->input->post('ekonomi'),
            'updated_at' => date('Y-m-d H:i:s'),
        );

        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function deleteData($id)
    {
        $this->db->where('id',$id);
        $this->db->delete($this->table);
    }
}