<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pekerjaan_model extends CI_Model
{
    public $table = 'pekerjaan';
    public $id = 'id';
    public $order = 'ASC';

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllData()
    {
        return $this->db->get($this->table)->result_array();
    }

    public function insertData()
    {
        $data = array(
            'nik' => $this->input->post('nik'),
            'nama' => $this->input->post('nama'),
            'agama' => $this->input->post('agama'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'gol_darah' => $this->input->post('gol_darah'),
            'warga_negara' => $this->input->post('warga_negara'),
            'id_pendidikan' => $this->input->post('pendidikan'),
            'id_pekerjaan' => $this->input->post('pekerjaan'),
            'status_pernikahan' => $this->input->post('status_pernikahan'),
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
            'nik' => $this->input->post('nik'),
            'nama' => $this->input->post('nama'),
            'agama' => $this->input->post('agama'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'gol_darah' => $this->input->post('gol_darah'),
            'warga_negara' => $this->input->post('warga_negara'),
            'id_pendidikan' => $this->input->post('pendidikan'),
            'id_pekerjaan' => $this->input->post('pekerjaan'),
            'status_pernikahan' => $this->input->post('status_pernikahan'),
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