<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_Model');
        $this->load->library('pagination');
    }

    public function index()
    {
        redirect('');
    }

    public function detail($id = null)
    {
        if ($id != null) {
            $data['produk'] = $this->Produk_Model->getDetail(decrypt_url($id));
            if ($data['produk']) {
                $data['title'] = 'Produk - ' . ucwords($data['produk']['nama_produk']);
                $data['fotoDll'] = explode(',', $data['produk']['gambar_dll']);
                $data['ukuranNew'] = explode(', ', $data['produk']['ukuran']);
                $data['tags'] = $this->Produk_Model->getTagsById(decrypt_url($id));
                $this->load->view('produk/product-page', $data);
            } else {
                redirect('');
            }
        } else {
            redirect('');
        }
    }

    public function checkout()
    {
        if (count($this->cart->contents()) == 0) {
            redirect('home');
        } else {
            if ($this->session->email) {
                $data['title'] = 'HepiMart - Pembayaran';
                $this->load->view('produk/checkout-page', $data);
            } else {
                $this->session->set_userdata('checkout_url', current_url());
                redirect('auth/login');
            }
        }
    }

    public function cari($jenis = null, $nama = null)
    {   
        $jenis = $this->uri->segment(3);
		$data['tags'] = $this->Produk_Model->getAllTags();
		$data['cat'] = $this->Produk_Model->getAllCat();
        $data['title'] = 'HepiMart - Pencarian';
        //konfigurasi pagination
		$config['base_url'] = base_url('produk/cari/'.$jenis.'/'.$nama); //site url
		$config['total_rows'] = $this->Produk_Model->hitungProdukKategori($jenis, $nama); //total row
		$config['per_page'] = 2;  //show record per halaman
		$config["uri_segment"] = 5;  // uri parameter
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);

		// Membuat Style pagination untuk BootStrap v4
		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';

		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(5));

		//panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        $data['produk'] = $this->Produk_Model->cariProduk($jenis, $nama, $config["per_page"], $data['page']);         

		$data['pagination'] = $this->pagination->create_links();
        
        $this->load->view('produk/cari-produk', $data);
    }

}
