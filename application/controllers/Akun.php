<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Akun extends CI_Controller
{
  private $data;

  public function __construct()
  {
    parent::__construct();
    is_login();
    $this->load->model('Akun_model');
    $this->load->model('NotifikasiPermintaan_model');
    $this->load->library('datatables');
    $this->data['page_title'] = 'Master Akun';
  }

  public function index()
  {
    //$this->load->view('table');
    $this->data['dataAkun'] = $this->Akun_model->getAllData();
    $this->template->load('template', 'akun/index', $this->data);
  }
  public function create()
  {
    $this->template->load('template', 'akun/create', $this->data);
  }
  public function store()
  {
    $validation = $this->form_validation;
    $validation->set_rules(
      'name',
      'Nama Lengkap',
      'required',
      array(
        'required' => 'Data harus terisi.'
      )
    );
    $validation->set_rules(
      'username',
      'Usename',
      'required|is_unique[akun.username]',
      array(
        'required' => 'Data harus terisi.',
        'is_unique' => 'Data sudah ada.'
      )
    );
    $validation->set_rules(
      'password',
      'Password',
      'required',
      array(
        'required' => 'Data harus terisi.'
      )
    );
    if ($this->form_validation->run() == TRUE) {

      if ($this->Akun_model->insertData()) {
        $this->session->set_flashdata('pesan', 'data berhasil disimpan');
        redirect('akun/index');
      }
    } else {
      $this->template->load('template', 'akun/create');
    }
  }
  public function edit($id)
  {
    $this->data['dataAkun'] = $this->Akun_model->editData($id);
    $this->template->load('template', 'akun/edit', $this->data);
  }

  public function update($id)
  {
    $validation = $this->form_validation;
    $validation->set_rules(
      'name',
      'Nama Lengkap',
      'required',
      array(
        'required' => 'Data harus terisi.'
      )
    );
    $validation->set_rules(
      'username',
      'Usename',
      'required',
      array(
        'required' => 'Data harus terisi.',
      )
    );
    if ($this->form_validation->run() == TRUE) {

      if ($this->Akun_model->updateData($id)) {
        $this->session->set_flashdata('pesan', 'data berhasil di edit');
        redirect('akun/index');
      }
    } else {
      $this->template->load('template', 'akun/create');
    }
  }
  public function delete($id)
  {
    $this->Akun_model->deleteData($id);
    $this->session->set_flashdata('pesan', 'data berhasil di hapus!');
    redirect('akun/index');
  }
}


/* End of file Akun.php */
/* Location: ./application/controllers/Akun.php */
