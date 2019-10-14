<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{

  public function index()
  {
    redirect('welcome');
  }

  public function tambahKeranjang() //fungsi Add To Cart
  {
    $data = array(
      'id' => $this->input->post('produk_id'),
      'name' => $this->input->post('produk_nama'),
      'price' => $this->input->post('produk_harga'),
      'gambar' => $this->input->post('gambar'),
      'qty' => $this->input->post('qty'),
    );
    $this->cart->insert($data);
    redirect('produk/detail/' . encrypt_url($data['id']));
  }

  public function hapus_items($rowid)
  {
    $data = array(
      'rowid' => $rowid,
      'qty' => 0,
    );
    $this->cart->update($data);
    header('location:' . $_SERVER['HTTP_REFERER']);
  }
}
