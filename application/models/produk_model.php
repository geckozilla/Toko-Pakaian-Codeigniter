<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk_Model extends CI_Model
{
    public function getDetail($id)
    {
        $this->db->select('*')->from('produk')->where(['unik_produk'  => $id]);
        $this->db->join('kategori', 'kategori.id_cat=produk.id_cat');
        $this->db->join('detail_produk', 'detail_produk.id_produk=produk.id_produk');
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->row_array();
        } else {
            return 0;
        }
    }

    public function getTagsById($id)
    {
        $this->db->select('tags.nama_tag');
        $this->db->join('tags_produk', 'tags_produk.id_produk=produk.id_produk', 'INNER');
        $this->db->join('tags', 'tags_produk.id_tags=tags.id_tags', 'INNER');
        $query = $this->db->get_where('produk', ['produk.unik_produk' => $id]);
        if ($query->num_rows() == 1) {
            return $query->row_array();
        } else if ($query->num_rows() > 1) {
            return $query->result_array();
        } else {
            return 0;
        }
    }

    public function getProduk()
    {
        $this->db->join('detail_produk', 'detail_produk.id_produk=produk.id_produk');
        $this->db->join('kategori', 'kategori.id_cat=produk.id_cat');
        $this->db->limit();
        return $this->db->get_where('produk', ['detail_produk.aktif' => 1])->result_array();
    }

    public function getAllTags()
    {   
        $this->db->select('nama_tag');
        return $this->db->get_where('tags', ['active' => 1])->result_array();
    }

    Public function getAllCat()
    {
        $this->db->select('nama_cat');
        return $this->db->get_where('kategori', ['active' => 1])->result_array();
    }

    public function cariProduk($jenis, $nama, $limit, $start)
    {
        if($jenis == 'kategori'){
            $namaField = 'kategori.nama_cat';
        } else {
            $namaField = 'tags.nama_tag';
        }
        $this->db->join('detail_produk', 'detail_produk.id_produk=produk.id_produk');
        $this->db->join('kategori', 'kategori.id_cat=produk.id_cat');
        $this->db->limit($limit, $start);
        $kondisi = [
            'detail_produk.aktif' => 1,
            $namaField => ucwords($nama)
        ];
        return $this->db->get_where('produk', $kondisi)->result_array();
    }

    public function hitungProdukKategori($jenis, $nama)
    {
        if($jenis == 'kategori'){
            $namaField = 'kategori.nama_cat';
        } else {
            $namaField = 'tags.nama_tag';
        }
        $this->db->select('kategori.nama_cat');
        $this->db->from('produk');
        $this->db->join('detail_produk', 'detail_produk.id_produk=produk.id_produk');
        $this->db->join('kategori', 'kategori.id_cat=produk.id_cat');
        $this->db->where('detail_produk.aktif', 1);
        $this->db->where($namaField, $nama);
        return $this->db->count_all_results();
    }
}
