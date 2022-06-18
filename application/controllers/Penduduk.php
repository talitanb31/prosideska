<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penduduk extends CI_Controller
{

    private $data;

    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Penduduk_model');
        $this->load->model('Pendidikan_model');
        $this->load->model('Pekerjaan_model');
        $this->load->model('Negara_model');
        $this->load->library('datatables');
        $this->data['page_title']  = 'Penduduk';
    }

    public function index()
    {
        $this->data['data'] = $this->Penduduk_model->getAllData();
        $this->template->load('template', 'penduduk/index', $this->data);
    }

    public function create()
    {
        $this->data['pendidikan'] = $this->Pendidikan_model->getAllData();
        $this->data['pekerjaan'] = $this->Pekerjaan_model->getAllData();
        $this->data['negara'] = $this->Negara_model->getAllData();
        $this->template->load('template', 'penduduk/create', $this->data);
    }

    public function store()
    {
        $validation = $this->form_validation;
        $validation->set_rules(
            'nik',
            'NIK',
            'required|is_unique[penduduk.nik]',
            array(
                'required' => 'Data harus terisi.',
                'is_unique' => 'Data sudah ada.'
            )
        );
        $validation->set_rules(
            'nama',
            'Nama Lengkap',
            'required',
            array(
                'required' => 'Data harus terisi.'
            )
        );
        $validation->set_rules(
            'tempat_lahir',
            'Tempat Lahir',
            'required',
            array(
                'required' => 'Data harus terisi.'
            )
        );
        $validation->set_rules(
            'tanggal_lahir',
            'Tanggal Lahir',
            'required',
            array(
                'required' => 'Data harus terisi.'
            )
        );
        $validation->set_rules(
            'jenis_kelamin',
            'Jenis Kelamin',
            'required',
            array(
                'required' => 'Data harus dipilih.'
            )
        );
        $validation->set_rules(
            'alamat',
            'Alamat',
            'required',
            array(
                'required' => 'Data harus diisi.'
            )
        );
        $validation->set_rules(
            'gol_darah',
            'Gol. Darah',
            'required',
            array(
                'required' => 'Data harus terisi.'
            )
        );
        $validation->set_rules(
            'warga_negara',
            'Warga Negara',
            'required',
            array(
                'required' => 'Data harus terisi.'
            )
        );
        $validation->set_rules(
            'pendidikan',
            'Pendidikan',
            'required',
            array(
                'required' => 'Data harus terisi.'
            )
        );
        $validation->set_rules(
            'pekerjaan',
            'Pekerjaan',
            'required',
            array(
                'required' => 'Data harus terisi.'
            )
        );
        $validation->set_rules(
            'status_pernikahan',
            'Status Pernikahan',
            'required',
            array(
                'required' => 'Data harus terisi.'
            )
        );
        if ($this->form_validation->run() == TRUE) {
            if ($this->Penduduk_model->insertData()) {
                $this->session->set_flashdata('pesan', 'data berhasil disimpan');
                redirect('penduduk/index');
            }
        } else {
            $this->template->load('template', 'penduduk/create');
        }
    }

    public function detail($id)
    {
        $this->data['data'] = $this->Penduduk_model->editData($id);
        $this->data['pendidikan'] = $this->Pendidikan_model->getAllData();
        $this->data['pekerjaan'] = $this->Pekerjaan_model->getAllData();
        $this->data['negara'] = $this->Negara_model->getAllData();
        $this->template->load('template', 'penduduk/detail', $this->data);
    }

    public function edit($id)
    {
        $this->data['data'] = $this->Penduduk_model->editData($id);
        $this->data['pendidikan'] = $this->Pendidikan_model->getAllData();
        $this->data['pekerjaan'] = $this->Pekerjaan_model->getAllData();
        $this->data['negara'] = $this->Negara_model->getAllData();
        $this->template->load('template', 'penduduk/edit', $this->data);
    }

    public function update($id)
    {
        $validation = $this->form_validation;
        $validation->set_rules(
            'nama',
            'Nama Lengkap',
            'required',
            array(
                'required' => 'Data harus terisi.'
            )
        );
        $validation->set_rules(
            'tempat_lahir',
            'Tempat Lahir',
            'required',
            array(
                'required' => 'Data harus terisi.'
            )
        );
        $validation->set_rules(
            'tanggal_lahir',
            'Tanggal Lahir',
            'required',
            array(
                'required' => 'Data harus terisi.'
            )
        );

        $validation->set_rules(
            'jenis_kelamin',
            'Jenis Kelamin',
            'required',
            array(
                'required' => 'Data harus dipilih.'
            )
        );
        $validation->set_rules(
            'gol_darah',
            'Gol. Darah',
            'required',
            array(
                'required' => 'Data harus terisi.'
            )
        );
        $validation->set_rules(
            'warga_negara',
            'Warga Negara',
            'required',
            array(
                'required' => 'Data harus terisi.'
            )
        );
        $validation->set_rules(
            'pendidikan',
            'Pendidikan',
            'required',
            array(
                'required' => 'Data harus terisi.'
            )
        );
        $validation->set_rules(
            'pekerjaan',
            'Pekerjaan',
            'required',
            array(
                'required' => 'Data harus terisi.'
            )
        );
        $validation->set_rules(
            'status_pernikahan',
            'Status Pernikahan',
            'required',
            array(
                'required' => 'Data harus terisi.'
            )
        );
        if ($this->form_validation->run() == TRUE) {

            if ($this->Penduduk_model->updateData($id)) {
                $this->session->set_flashdata('pesan', 'data berhasil di edit');
                redirect('penduduk/index');
            }
        } else {
            $this->data['data'] = $this->Penduduk_model->editData($id);
            $this->data['pendidikan'] = $this->Pendidikan_model->getAllData();
            $this->data['pekerjaan'] = $this->Pekerjaan_model->getAllData();
            $this->data['negara'] = $this->Negara_model->getAllData();

            $this->template->load('template', 'penduduk/edit', $this->data);
        }
    }

    public function delete($id)
    {
        $this->Penduduk_model->deleteData($id);
        $this->session->set_flashdata('pesan', 'data berhasil di hapus!');
        redirect('penduduk/index');
    }
}
