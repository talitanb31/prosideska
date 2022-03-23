<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Negara_model extends CI_Model
{
    public $table = 'negara';
    public $id = 'id';
    public $order = 'ASC';

    public function __construct()
    {
        parent::__construct();
    }

    public function getAllData()
    {
        return $this->db->get($this->table)->result_array();
    }
}