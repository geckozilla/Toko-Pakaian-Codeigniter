<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Model extends CI_Model
{
    public function getAllCustomers()
    {
        $this->db->join('detail_user', 'detail_user.id_user=data_user.id_user', 'INNER');
        return $this->db->get_where('data_user', ['data_user.level' => 'member'])->result_array();
    }

    public function deleteCustomers($id)
    {
        $this->db->delete('data_user', ['id_user' => $id]);
        return $this->db->affected_rows();
    }

    public function inputProduct($data, $tags, $detail)
    {
        $this->db->trans_begin();
        $this->db->insert('produk', $data);
        $id_produk = $this->db->insert_id();
        $detail['id_produk'] = $id_produk;
        $this->db->insert('detail_produk', $detail);
        foreach ($tags as $tag) {
            $dataTags = [
                'id_produk' => $id_produk,
                'id_tags' => $tag
            ];
            $this->db->insert('tags_produk', $dataTags);
        }
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return 0;
        } else {
            $this->db->trans_commit();
            return 1;
        }
    }

    public function deleteProduct($id)
    {
        $this->db->where('id_produk', $id);
        $this->db->update('produk', ['delete_at' => time()]);
        return $this->db->affected_rows();
    }

    public function statusProduct($id, $status)
    {
        $this->db->where('id_produk', $id);
        $this->db->update('detail_produk', ['aktif' => $status]);
        return $this->db->affected_rows();
    }

    public function getAllProduk()
    {
        $this->db->join('detail_produk', 'detail_produk.id_produk=produk.id_produk', 'INNER');
        $this->db->join('tags_produk', 'tags_produk.id_produk=produk.id_produk', 'INNER');
        $this->db->join('tags', 'tags_produk.id_tags=tags.id_tags', 'INNER');
        $this->db->join('kategori', 'kategori.id_cat=produk.id_cat', 'INNER');
        return $this->db->get_where('produk', ['produk.delete_at' => 0])->result_array();
    }

    public function getCatTag($tabel, $field = array())
    {
        return $this->db->get_where($tabel, $field)->result_array();
    }

    // @begin Tag Produk
    public function getAllTag($status)
    {
        $this->db->where('active', $status);
        return $this->db->get('tags')->result_array();
    }

    public function inputTagProduk($data)
    {
        $this->db->insert('tags', $data);
        return $this->db->affected_rows();
    }

    public function updateStatusTag($id, $status)
    {
        $this->db->where('id_tags', $id);
        $this->db->update('tags', ['active' => $status]);
        return $this->db->affected_rows();
    }

    public function deleteTag($id)
    {
        $this->db->delete('tags', ['id_tags' => $id]);
        return $this->db->affected_rows();
    }
    // @end Tag Produk

    // @begin Category Produk
    public function getAllCategory($status)
    {
        $this->db->where('active', $status);
        return $this->db->get('kategori')->result_array();
    }

    public function inputCategoryProduk($data)
    {
        $this->db->insert('kategori', $data);
        return $this->db->affected_rows();
    }

    public function updateStatusCategory($id, $status)
    {
        $this->db->where('id_cat', $id);
        $this->db->update('kategori', ['active' => $status]);
        return $this->db->affected_rows();
    }

    public function deleteCategory($id)
    {
        $this->db->delete('kategori', ['id_cat' => $id]);
        return $this->db->affected_rows();
    }
    // @end Category Produk

    public function updateTagCat($id, $tabel, $data)
    {
        $whereID = ($tabel == 'tags')? 'id_tags' : 'id_cat';
        $this->db->update($tabel, $data, [$whereID => $id]);
        return $this->db->affected_rows();
    }
}
