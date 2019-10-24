<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_Model');
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
            redirect('welcome');
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
        $data['produk'] = $this->Produk_Model->cariProduk($jenis, $nama);
        $this->load->view('produk/cari-produk', $data);
    }

}
