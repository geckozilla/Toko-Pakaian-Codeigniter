<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_Model extends CI_Model
{

    public function getProduk()
    {
        $this->db->join('detail_produk', 'detail_produk.id_produk=produk.id_produk');
        $this->db->join('kategori', 'kategori.id_cat=produk.id_cat');
        return $this->db->get_where('produk', ['detail_produk.aktif' => 1])->result_array();
    }
}
