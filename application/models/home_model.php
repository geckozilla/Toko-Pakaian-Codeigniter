<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_Model extends CI_Model
{

    public function getProduk($limit, $start)
    {
        $this->db->join('detail_produk', 'detail_produk.id_produk=produk.id_produk');
        $this->db->join('kategori', 'kategori.id_cat=produk.id_cat');
        $this->db->limit($limit, $start);
        return $this->db->get_where('produk', ['detail_produk.aktif' => 1])->result_array();
    }

    public function hitungProduk()
    {
        $this->db->from('produk');
        $this->db->join('detail_produk', 'detail_produk.id_produk=produk.id_produk');
        $this->db->where('detail_produk.aktif', 1);
        return $this->db->count_all_results();
    }
}
