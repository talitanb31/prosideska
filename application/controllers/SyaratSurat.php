<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SyaratSurat extends CI_Controller
{
  public function __construct()
  {
      parent::__construct();
      is_login();
      $this->load->model('SyaratSurat_model');
      $this->load->model('Jenis_surat_model');
  }

  function _rules() {
    $this->form_validation->set_rules('jenis_surat', 'Jenis surat', 'required',
                          array(
                            'required' => 'Data harus dipilih.'
                        ));
    $this->form_validation->set_rules('syarat_surat', 'Syarat surat', 'required',
                          array(
                            'required' => 'Data harus dipilih.'
                        ));
  }

  public function index()
  {
    $data['data'] = $this->SyaratSurat_model->getAllData();
    $this->template->load('template', 'syarat_surat/index',$data);
  }

  public function create()
  {
    $data['jenis'] = $this->Jenis_surat_model->getAllData();
    $this->template->load('template', 'syarat_surat/create', $data);
  }

  public function store()
  {
    $this->_rules();

    if ($this->form_validation->run() == TRUE) {
      if ($this->SyaratSurat_model->insertData()) {
        $this->session->set_flashdata('pesan','data berhasil disimpan');
        redirect('syaratsurat/index');
      }
    }else{
      $this->template->load('template','syarat_surat/create');
    }
  }

  public function edit($id)
  {
    $data['jenis'] = $this->Jenis_surat_model->getAllData();
    $data['data'] = $this->SyaratSurat_model->editData($id);
    $this->template->load('template', 'syarat_surat/edit',$data);
  }

  public function update($id)
  { 
    $this->_rules();

    if ($this->form_validation->run() == TRUE) {
      if ($this->SyaratSurat_model->updateData($id)) {
        $this->session->set_flashdata('pesan','data berhasil di edit!');
        redirect('syaratsurat/index');
      }
    }else{
      $data['dataJenis'] = $this->SyaratSurat_model->editData($id);
      $this->template->load('template','syarat_surat/edit',$data);
    }
  }

  public function delete($id)
  {
    $this->SyaratSurat_model->deleteData($id);
    $this->session->set_flashdata('pesan','data berhasil di hapus!');
    redirect('syaratsurat/index');

  }

}


/* End of file JenisSurat.php */
/* Location: ./application/controllers/JenisSurat.php */