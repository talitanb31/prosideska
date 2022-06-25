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
    $this->db->where('permintaan_surat.status !=', 'selesai');
    $this->db->order_by("FIELD(permintaan_surat.status, 'pending', 'diproses', 'selesai', 'ditolak')");
    $query = $this->db->get();

    return $query->result_array();
  }

  public function getNoUrut($id)
  {
    return $this->db->get_where($this->_table, ['id' => $id])->row_array()['no_urut'];
  }

  public function setNoUrut($id, $no)
  {
    $data = array('no_urut' => $no);
    $this->db->where('id', $id);

    return $this->db->update($this->_table, $data);
  }

  public function generateNoUrut()
  {
    $this->db->select('permintaan_surat.no_urut');
    $this->db->from($this->_table);
    $this->db->where('status =', 'selesai');
    $this->db->order_by('no_urut', 'desc');
    $query = $this->db->get();
    $query = $query->result_array();
    $no_urut = '';

    if ($query != null && count($query) > 0)
      $no_urut = $query[0]['no_urut'] + 1;
    else
      $no_urut = 1;

    return $no_urut;
  }

  public function getAllDataRiwayat()
  {
    $this->db->select('permintaan_surat.*, jenis_surat.jenis, penduduk.nama as penduduk, penduduk.nik, akun.nama as admin');
    $this->db->from($this->_table);
    $this->db->join('jenis_surat', 'jenis_surat.id = permintaan_surat.id_jenis_surat');
    $this->db->join('penduduk', 'penduduk.nik = permintaan_surat.nik');
    $this->db->join('akun', 'akun.id = permintaan_surat.id_admin', 'left');
    $this->db->where('permintaan_surat.status', 'selesai');
    $this->db->order_by("created_at DESC");
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

  public function edit($id)
  {
    $this->db->select('id,form_data');
    $this->db->from($this->_table);
    $this->db->where('id', $id);
    $query = $this->db->get();

    return $query->result_array();
  }

  public function updateData($id, $json)
  {
    $data = array(
      'form_data' => $json,
      'created_at' => date('Y-m-d H:i:s'),
      'updated_at' => date('Y-m-d H:i:s'),
    );
    $this->db->where('id', $id);

    return $this->db->update($this->_table, $data);

    // return $this->db->insert($this->_table, $data);
  }
}
