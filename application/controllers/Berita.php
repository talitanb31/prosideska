<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Berita_model');
        $this->load->library('datatables');
    }

    public function index()
    {
        $data['data'] = $this->Berita_model->getAllData();
        $this->template->load('template', 'berita/index', $data);
    }

    public function create()
    {
        $this->template->load('template', 'berita/create');
    }

    function upload_foto()
    {
        $config['upload_path']          = './assets/berita/';
        $config['allowed_types']        = 'jpg|png';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $config['file_name'] = $_FILES['cover']['name'];
        $this->load->library('upload', $config);
        $this->upload->do_upload('cover');
        return $this->upload->data();
    }

    function _rules()
    {
        $this->form_validation->set_rules(
            'title',
            'Judul',
            'required',
            array(
                'required' => 'Data harus terisi.'
            )
        );
        $this->form_validation->set_rules(
            'deskripsi',
            'Deskripsi',
            'required',
            array(
                'required' => 'Data harus terisi.'
            )
        );
        // $this->form_validation->set_rules(
        //     'cover',
        //     'Cover',
        //     'required',
        //     array(
        //         'required' => 'Data harus terisi.'
        //     )
        // );
    }

    public function store()
    {
        $this->_rules();
        
        $cover = $this->upload_foto();
        if ($this->form_validation->run() == TRUE) {
            if ($this->Berita_model->insertData($cover['file_name'])) {
                $this->session->set_flashdata('pesan','data berhasil disimpan');
                redirect('berita/index');
            }
        }else{
            $this->template->load('template','berita/create');
        }
    }

    public function edit($id)
    {
        $data['data'] = $this->Berita_model->editData($id);
        $this->template->load('template', 'berita/edit',$data);
    }

    public function update($id)
    {
        $this->_rules();
        $filename = '';
        if($this->input->post('cover') == null) {
            $cover = $this->upload_foto();
            $filename = $cover['file_name'];
        }

        if ($this->form_validation->run() == TRUE) {
            if ($this->Berita_model->updateData($id, $filename)) {
                $this->session->set_flashdata('pesan','data berhasil disimpan');
                redirect('berita/index');
            }
        }else{
            $this->template->load('template','berita/edit');
        }
    }

    public function delete($id)
    {
        $this->Berita_model->deleteData($id);
        $this->session->set_flashdata('pesan','data berhasil di hapus!');
        redirect('berita/index');
    }
}
