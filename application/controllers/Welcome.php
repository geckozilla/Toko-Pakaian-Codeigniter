<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_Model');
	}

	public function index()
	{
		$data['tesUser'] = $this->session->email;
		$data['produk'] = $this->Home_Model->getProduk();
		$this->load->view('home', $data);
	}

	public function about()
	{
		$this->load->view('about');
	}

	public function contact()
	{
		$this->load->view('contact');
	}
}
