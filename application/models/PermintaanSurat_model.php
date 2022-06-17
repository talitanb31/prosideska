<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PermintaanSurat_model extends CI_Model
{

  private $_table = "permintaan_surat";
  public function __construct()
  {
    parent::__construct();
  }

  public function getAllData()
  {
    $this->db->select('permintaan_surat.*, jenis_surat.jenis, penduduk.nama as penduduk, penduduk.nik, akun.nama as admin');
    $this->db->from($this->_table);
    $this->db->join('jenis_surat', 'jenis_surat.id = permintaan_surat.id_jenis_surat');
    $this->db->join('penduduk', 'penduduk.nik = permintaan_surat.nik');
    $this->db->join('akun', 'akun.id = permintaan_surat.id_admin', 'left');
    $this->db->order_by("FIELD(permintaan_surat.status, 'pending', 'diproses', 'selesai', 'ditolak')");
    $query = $this->db->get();

    return $query->result_array();
  }

  public function getSuratByStatus($status)
  {
    return $this->db->get_where($this->_table, ['status' => $status])->result_array();
  }

  public function getSuratByMonth($month)
  {
    $this->db->select('permintaan_surat.id');
    $this->db->from($this->_table);
    $this->db->where('status', 'selesai');
    $this->db->where('YEAR(created_at)', date('Y'));
    $this->db->where('MONTH(created_at)', $month);
    $this->db->where('status', 'selesai');
    $query = $this->db->get();

    return $query->result_array();
  }

  public function terima($id, $nik)
  {
    $data = array('status' => 'diproses', 'id_admin' => $_SESSION['id']);
    $this->db->where('id', $id);

    $this->db->update($this->_table, $data);

    return $this->storeNotification($nik, 'Permintaan surat anda sudah diterima.');
  }

  public function tolak($id, $nik)
  {
    $data = array('status' => 'ditolak', 'id_admin' => $_SESSION['id']);
    $this->db->where('id', $id);

    $this->db->update($this->_table, $data);

    return $this->storeNotification($nik, 'Permintaan surat ditolak.');
  }

  public function done($id, $nik)
  {
    $data = array('status' => 'selesai', 'id_admin' => $_SESSION['id']);
    $this->db->where('id', $id);

    $this->db->update($this->_table, $data);

    return $this->storeNotification($nik, 'Permintaan surat anda sudah diterima.');
  }

  public function storeNotification($nik, $pesan)
  {
    $data = array(
      'nik' => $nik,
      'pesan' => $pesan,
    );

    return $this->db->insert("notifikasi", $data);
  }
}
