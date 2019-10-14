<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Free_Model extends CI_Model
{

    private $namaFlash;

    public function getInfoUser()
    {
        $this->db->join('detail_user', 'detail_user.id_user=data_user.id_user');
        return $this->db->get_where('data_user', ['data_user.id_user' => $this->session->id_user])->row_array();
    }

    public function getImageUser()
    {
        $img = $this->getInfoUser();
        return  $img['foto'];
    }

    public function getAlertBS($namaFlash, $jenis, $judul, $pesan)
    {
        return  $this->session->set_flashdata($namaFlash, '<div class="alert alert-' . $jenis . ' alert-dismissible fade show" role="alert">
        <strong>' . $judul . '</strong> ' . $pesan . '.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
    }

    public function getSweetAlert($namaFlash, $title = '', $text = '', $type = '')
    {
        return  $this->session->set_flashdata($namaFlash, "<script>
		var title = '$title';
		var text = '$text'; 
		var type = '$type';
			Swal.fire(title,text,type);
		</script>");
    }


    public function getSweetAlertHref($namaFlash, $title = '', $text = '', $type = '', $href = '')
    {
        return  $this->session->set_flashdata($namaFlash, "<script>
		var title = '$title';
		var text = '$text'; 
		var type = '$type';
			Swal.fire(title,text,type).then(function() {
              window.location = '$href';
          });
		</script>");
    }

    public function validInvalid($name, $submit)
    {
        $status = '';
        if (isset($_POST[$submit])) {
            if (form_error($name) == false) {
                $status = 'is-valid';
            } else {
                $status = 'is-invalid';
            }
        }
        return $status;
    }

    public function getUnikProduk($id)
    {
        $this->db->select_max('id_produk', 'max');
        $data = $this->db->get('produk')->row_array();
        $nama = $this->db->get_where('kategori', ['id_cat' => $id])->row_array();
        $noUrut = substr($data['max'], 0, 6);
        $noUrut++;
        return strtoupper($nama['nama_cat']) . sprintf("%06s", $noUrut);
    }
}
