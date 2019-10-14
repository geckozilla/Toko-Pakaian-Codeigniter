<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customers extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->has_userdata('email')) {
            redirect('welcome');
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard - Customers';
        $this->load->view('user/home', $data);
    }
}
