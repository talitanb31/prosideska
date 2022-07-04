<?php

defined('BASEPATH') or exit('No direct script access allowed');

class KartuKeluarga extends CI_Controller
{

    private $data;

    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('KartuKeluarga_model');
        $this->load->model('NotifikasiPermintaan_model');
        $this->load->library('datatables');
        $this->data['page_title']  = 'Kartu Keluarga';
    }

    public function index()
    {
        $this->data['data'] = $this->KartuKeluarga_model->getAllData();
        $this->template->load('template', 'kartu_keluarga/index', $this->data);
    }

    public function create()
    {
        $this->template->load('template', 'kartu_keluarga/create', $this->data);
    }

    function upload_foto()
    {
        $config['upload_path']          = './assets/scan_kk/';
        $config['allowed_types']        = 'jpg|png';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $config['file_name'] = $_FILES['file_kk']['name'];
        $this->load->library('upload', $config);
        $this->upload->do_upload('file_kk');
        return $this->upload->data();
    }

    function _rules()
    {
        $this->form_validation->set_rules(
            'alamat',
            'Alamat',
            'required',
            array(
                'required' => 'Data harus terisi.'
            )
        );
        $this->form_validation->set_rules(
            'dusun',
            'Dusun',
            'required',
            array(
                'required' => 'Data harus terisi.'
            )
        );
        $this->form_validation->set_rules(
            'rt',
            'RT',
            'required',
            array(
                'required' => 'Data harus terisi.'
            )
        );

        $this->form_validation->set_rules(
            'rw',
            'RW',
            'required',
            array(
                'required' => 'Data harus dipilih.'
            )
        );
        // $this->form_validation->set_rules(
        //     'ekonomi',
        //     'Ekonomi',
        //     'required',
        //     array(
        //         'required' => 'Data harus terisi.'
        //     )
        // );
    }

    public function store()
    {
        $this->_rules();
        // $this->form_validation->set_rules('file_kk','Warga Negara', 'required',
        //                         array(
        //                         'required' => 'Data harus terisi.'
        //                         ));
        $scanKK = $this->upload_foto();
        if ($this->form_validation->run() == TRUE) {
            if ($this->KartuKeluarga_model->insertData($scanKK['file_name'])) {
                $this->session->set_flashdata('pesan', 'data berhasil disimpan');
                redirect('kartukeluarga/index');
            }
        } else {
            $this->template->load('template', 'kartu_keluarga/create');
        }
    }

    public function edit($id)
    {
        $this->data['data'] = $this->KartuKeluarga_model->editData($id);
        $this->template->load('template', 'kartu_keluarga/edit', $this->data);
    }

    public function update($id)
    {
        $this->_rules();
        $filename = '';
        // if($this->input->post('file_kk') == null) {
        //     $scanKK = $this->upload_foto();
        //     $filename = $scanKK['file_name'];
        // }

        if ($this->form_validation->run() == TRUE) {
            if ($this->KartuKeluarga_model->updateData($id, $filename)) {
                $this->session->set_flashdata('pesan', 'data berhasil disimpan');
                redirect('kartukeluarga/index');
                // echo 'sukses';
            }
        } else {
            // echo 'error';
            $this->template->load('template', 'kartu_keluarga/edit');
        }
    }

    public function delete($id)
    {
        $this->KartuKeluarga_model->deleteData($id);
        $this->session->set_flashdata('pesan', 'data berhasil di hapus!');
        redirect('kartukeluarga/index');
    }
}
