<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kritik_saran_model extends CI_Model
{
    public $table = 'feedback';
    public $order = 'ASC';

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllData()
    {
        return $this->db->get($this->table)->result_array();
    }

    public function deleteData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }
}
