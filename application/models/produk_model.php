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
}
