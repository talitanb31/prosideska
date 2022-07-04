<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NotifikasiPermintaan_model extends CI_Model
{

    private $_table = "read_notifikasi_permintaan";
    public function __construct()
    {
        parent::__construct();
    }

    public function getSuratByStatus($status, $idUser)
    {
        $this->db->select('permintaan_surat.id, jenis_surat.jenis, penduduk.nik, penduduk.nama, permintaan_surat.created_at');
        $this->db->from('permintaan_surat');
        $this->db->join('jenis_surat', 'jenis_surat.id = permintaan_surat.id_jenis_surat');
        $this->db->join('penduduk', 'penduduk.nik = permintaan_surat.nik');
        // $this->db->join('read_notifikasi_permintaan', 'read_notifikasi_permintaan.id_permintaan != permintaan_surat.id', 'left');

        $this->db->where('permintaan_surat.status =', $status);
        $this->db->where('permintaan_surat.id NOT IN (select id_permintaan from read_notifikasi_permintaan where id_user = ' . $idUser . ')', NULL, false);


        return $this->db->get()->result_array();
    }

    public function isRead($idPermintaan)
    {
        $data = array(
            'id_user' => $_SESSION['id'],
            'id_permintaan' => $idPermintaan,
        );

        return $this->db->insert($this->_table, $data);
    }
}
