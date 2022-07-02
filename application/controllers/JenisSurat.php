<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JenisSurat extends CI_Controller
{
  private $data;

  public function __construct()
  {
    parent::__construct();
    is_login();
    $this->load->model('Jenis_surat_model');
    $this->data['page_title']  = 'Master Jenis Surat';
  }

  public function index()
  {
    $this->data['dataJenis'] = $this->Jenis_surat_model->getAllData();
    $this->template->load('template', 'jenis_surat/index', $this->data);
  }
  public function create()
  {
    $this->template->load('template', 'jenis_surat/create', $this->data);
  }
  public function store()
  {
    $validation = $this->form_validation; //untuk menghemat penulisan kode

    $validation->set_rules(
      'jenis_surat',
      'jenis surat',
      'required|is_unique[jenis_surat.jenis]',
      array(
        'required' => 'Data harus terisi.',
        'is_unique' => 'Data sudah ada.'
      )
    );


    if ($this->form_validation->run() == TRUE) {
      if ($this->Jenis_surat_model->insertData()) {
        $this->session->set_flashdata('pesan', 'data berhasil disimpan');
        redirect('jenissurat/index');
      }
    } else {
      $this->template->load('template', 'jenis_surat/create');
    }
  }
  public function edit($id)
  {
    $this->data['dataJenis'] = $this->Jenis_surat_model->editData($id);
    $this->template->load('template', 'jenis_surat/edit', $this->data);
  }

  public function update($id)
  {
    $validation = $this->form_validation; //untuk menghemat penulisan kode

    $validation->set_rules(
      'jenis_surat',
      'jenis surat',
      'required',
      array(
        'required' => 'Data harus terisi.',
      )
    );


    if ($this->form_validation->run() == TRUE) {
      if ($this->Jenis_surat_model->updateData()) {
        $this->session->set_flashdata('pesan', 'data berhasil di edit!');
        redirect('jenissurat/index');
      }
    } else {
      $this->data['dataJenis'] = $this->Jenis_surat_model->editData($id);
      $this->template->load('template', 'jenis_surat/edit', $this->data);
    }
  }

  public function delete($id)
  {
    $this->Jenis_surat_model->deleteData($id);
    $this->session->set_flashdata('pesan', 'data berhasil di hapus!');
    redirect('jenissurat/index');
  }
}


/* End of file JenisSurat.php */
/* Location: ./application/controllers/JenisSurat.php */
