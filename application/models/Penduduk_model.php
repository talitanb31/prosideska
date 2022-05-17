<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penduduk_model extends CI_Model
{
    public $table = 'penduduk';
    public $order = 'ASC';

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllData()
    {
        $this->db->select('penduduk.*,negara.country_name,pendidikan.pendidikan,pekerjaan.pekerjaan');
        $this->db->from($this->table);
        $this->db->join('negara', 'negara.id = penduduk.id_negara');
        $this->db->join('pendidikan', 'pendidikan.id = penduduk.id_pendidikan');
        $this->db->join('pekerjaan', 'pekerjaan.id = penduduk.id_pekerjaan');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPenduduk($nik)
    {
        $this->db->select('penduduk.*,negara.country_name,pendidikan.pendidikan,pekerjaan.pekerjaan');
        $this->db->join('negara', 'negara.id = penduduk.id_negara');
        $this->db->join('pendidikan', 'pendidikan.id = penduduk.id_pendidikan');
        $this->db->join('pekerjaan', 'pekerjaan.id = penduduk.id_pekerjaan');

        return $this->db->get_where($this->table, ['penduduk.nik' => $nik])->row_array();
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
            'alamat' => $this->input->post('alamat'),
            'gol_darah' => $this->input->post('gol_darah'),
            'id_negara' => $this->input->post('warga_negara'),
            'id_pendidikan' => $this->input->post('pendidikan'),
            'id_pekerjaan' => $this->input->post('pekerjaan'),
            'status_pernikahan' => $this->input->post('status_pernikahan'),
        );
        return $this->db->insert($this->table, $data);
    }

    public function editData($nik)
    {
        return $this->db->get_where($this->table, ['nik' => $nik])->row_array();
    }

    public function updateData($nik)
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'agama' => $this->input->post('agama'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat' => $this->input->post('alamat'),
            'gol_darah' => $this->input->post('gol_darah'),
            'id_negara' => $this->input->post('warga_negara'),
            'id_pendidikan' => $this->input->post('pendidikan'),
            'id_pekerjaan' => $this->input->post('pekerjaan'),
            'status_pernikahan' => $this->input->post('status_pernikahan'),
        );

        $this->db->where('nik', $nik);
        return $this->db->update($this->table, $data);
    }

    public function deleteData($nik)
    {
        $this->db->where('nik', $nik);
        $this->db->delete($this->table);
    }
}
