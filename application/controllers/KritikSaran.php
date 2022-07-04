<?php

defined('BASEPATH') or exit('No direct script access allowed');

class KritikSaran extends CI_Controller
{

    private $data;

    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('Kritik_saran_model');
        $this->load->model('NotifikasiPermintaan_model');
        $this->load->library('datatables');
        $this->data['page_title']  = 'Kritik Saran';
    }

    public function index()
    {
        //$this->load->view('table');
        $this->data['kritikSaran'] = $this->Kritik_saran_model->getAllData();
        $this->template->load('template', 'kritik_saran/index', $this->data);
    }

    public function delete($id)
    {
        $this->Kritik_saran_model->deleteData($id);
        $this->session->set_flashdata('pesan', 'data berhasil di hapus!');
        redirect('kritiksaran/index');
    }
}
