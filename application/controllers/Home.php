<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Home_Model');
		$this->load->model('Produk_Model');
		$this->load->library('pagination');
	}

	public function index()
	{
		$data['tags'] = $this->Produk_Model->getAllTags();
		$data['cat'] = $this->Produk_Model->getAllCat();
		$data['title'] = 'HepiMart - Home';
		$data['tesUser'] = $this->session->email;
		//konfigurasi pagination
		$config['base_url'] = base_url('home/index'); //site url
		$config['total_rows'] = $this->Home_Model->hitungProduk(); //total row
		$config['per_page'] = 8;  //show record per halaman
		$config['uri_segment'] = 3;  // uri parameter
		$choice = $config['total_rows'] / $config['per_page'];
		$config['num_links'] = floor($choice);

		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(3));
		//konfigurasi pagination
		
		$data['produk'] = $this->Home_Model->getProduk($config['per_page'], $data['page']);         

		$data['pagination'] = $this->pagination->create_links();
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

	public function pageN()
	{
		
	}
}
