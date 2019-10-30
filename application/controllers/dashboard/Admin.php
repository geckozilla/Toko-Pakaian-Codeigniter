<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->library('upload');
    $this->load->model('Admin_Model');
    if ($this->session->has_userdata('email')) {
      if ($this->session->level == 'Member') {
        redirect('dashboard/customers');
      }
      $data['image'] = $this->freeM->getImageUser(); //Load Image user
      $this->load->vars($data);
    } else {
      redirect('home');
    }
  }

  public function index()
  {
    $data['title'] = 'Dashboard - Admin';
    $this->load->view('admin/home', $data);
  }

  public function data_customers()
  {
    $data['title'] = 'Data Customers - Admin';
    $data['customers'] = $this->Admin_Model->getAllCustomers();
    $this->load->view('admin/customers/data_customers', $data);
  }

  public function delete_customers($id = null)
  {
    if ($id != NULL) {
      if ($this->Admin_Model->deleteCustomers(decrypt_url($id))) {
        $this->freeM->getSweetAlert('message', 'Success!', 'Data pelanggan berhasil di hapus!.', 'success');
      } else {
        $this->freeM->getSweetAlert('message', 'Upss!', 'Data pelanggan gagal di hapus!', 'error');
      }
    } else {
      redirect('dashboard/admin/data_customers');
    }
    redirect('dashboard/admin/data_customers');
  }

  public function add_product()
  {
    $this->form_validation->set_rules('nama', 'Nama Produk', 'min_length[6]|max_length[30]|required|trim');
    $this->form_validation->set_rules('harga', 'Harga Produk', 'min_length[4]|required|trim|numeric');
    $this->form_validation->set_rules('diskon', 'Diskon Produk', 'min_length[1]|required|trim|numeric');
    $this->form_validation->set_rules('stok', 'Stok Produk', 'min_length[1]|required|trim|numeric');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Add Products - Admin';
      $data['tag'] = $this->Admin_Model->getCatTag('tags', ['active' => 1]);
      $data['cat'] = $this->Admin_Model->getCatTag('kategori', ['active' => 1]);
      $this->load->view('admin/product/addProduct', $data);
    } else if ($this->form_validation->run() == true) {
      $tags = $this->input->post('tags', true); //Tags Produk
      if (!empty($_FILES['foto']['name'])) {
        $data = [
          'unik_produk' => $this->freeM->getUnikProduk($this->input->post('kategori')),
          'nama_produk' => $this->input->post('nama', true),
          'ket_produk' => $this->input->post('ket_produk', true),
          'id_cat' => $this->input->post('kategori', true),
          'harga_produk' => $this->input->post('harga', true),
          'gambar_produk' => $this->uploadFotoProduk(),
          'create_date' => time()
        ];
        $ukuran = $this->input->post('ukuran', true);
        $newUk = '';
        foreach ($ukuran as $uk) {
          $newUk .= $uk . ', ';
        }
        $detail = [
          'stok' => $this->input->post('stok', true),
          'diskon' => $this->input->post('diskon', true),
          'ukuran' => $newUk,
          'aktif' => 1
        ];
        if ($this->Admin_Model->inputProduct($data, $tags, $detail)) {
          $this->freeM->getSweetAlert('message', 'Success!', 'Data Produk berhasil ditambahkan.', 'success');
        } else {
          $this->freeM->getSweetAlert('message', 'Upss!', 'Data Produk gagal ditambahkan.', 'error');
        }
      } else {
        $this->freeM->getSweetAlert('message', 'Upss!', 'Foto Produk gagal diupload.', 'error');
      }
      redirect('dashboard/admin/add_product');
    }
  }

  public function uploadFotoProduk()
  {
    $config['upload_path']       = './assets/images/produk/';
    $config['allowed_types']     = 'gif|jpg|png|jpeg';
    $config['max_size']          = 0;
    $config['remove_spaces']     = TRUE;
    $config['file_name']         = round(microtime(true) * 1000);

    $this->load->library('upload');
    $this->upload->initialize($config);

    if ($this->upload->do_upload('foto')) {
      $config['image_library'] = 'gd2';
      $config['source_image'] = './assets/images/produk/' .  $this->upload->data('file_name');
      $config['create_thumb'] = FALSE;
      $config['maintain_ratio'] = FALSE;
      // $config['quality'] = '50%';
      $config['width'] = 372;
      $config['height'] = 431;
      $config['new_image'] = './assets/images/produk/' .  $this->upload->data('file_name');
      $this->load->library('image_lib', $config);
      $this->image_lib->resize();

      return $this->upload->data('file_name');
    } else {
      $this->freeM->getSweetAlert('message', 'Upss!', 'Foto utama Produk gagal diupload.', 'error');
      $this->session->set_flashdata( 'error_msg', $this->upload->display_errors() );
      redirect('dashboard/admin/add_product');
    }
  }

  public function data_product()
  {
    $data['title'] = 'Data Produk - Admin';
    $res = $this->Admin_Model->getAllProduk();

    $tags = [];
    $newAr = [];
    foreach ($res as $produk) {
      //Membuat array baru jika kosong
      if (empty($tags[$produk['id_produk']])) {
        $tags[$produk['id_produk']] = [];
      }
      //Push value array
      array_push($tags[$produk['id_produk']], [
        'id_tags' => $produk['id_tags'],
        'nama_tag' => $produk['nama_tag']
      ]);
      //Membuat result array baru
      $newAr[$produk['id_produk']] = [
        'id_produk' => $produk['id_produk'],
        'unik_produk' => $produk['unik_produk'],
        'nama_produk' => $produk['nama_produk'],
        'ket_produk' => $produk['ket_produk'],
        'nama_cat' => $produk['nama_cat'],
        'harga_produk' => $produk['harga_produk'],
        'gambar_produk' => $produk['gambar_produk'],
        'create_date' => $produk['create_date'],
        'delete_at' => $produk['delete_at'],
        'id_detail' => $produk['id_detail'],
        'stok' => $produk['stok'],
        'diskon' => $produk['diskon'],
        'ukuran' => $produk['ukuran'],
        'aktif' => $produk['aktif'],
        'id_tags_produk' => $produk['id_tags_produk'],
        'ket_tag' => $produk['ket_tag'],
        'nama_tag' => $tags[$produk['id_produk']]
      ];
    }
    $data['produk'] = $newAr;
    $this->load->view('admin/product/data_product', $data);
  }

  public function delete_produk($id = null)
  {
    if ($id != null) {
      if ($this->Admin_Model->deleteProduct(decrypt_url($id))) {
        $this->freeM->getSweetAlert('message', 'Horay!', 'Produk berhasil dihapus.', 'success');
      } else {
        $this->freeM->getSweetAlert('message', 'Upss!', 'Produk gagal dihapus.', 'error');
      }
      redirect('dashboard/admin/data_product');
    } else {
      redirect('dashboard/admin/data_product');
    }
  }

  public function aktif_produk($id = null)
  {
    if ($id != null) {
      if ($this->Admin_Model->statusProduct(decrypt_url($id), 1)) {
        $this->freeM->getSweetAlert('message', 'Horay!', 'Produk berhasil diaktifkan.', 'success');
      } else {
        $this->freeM->getSweetAlert('message', 'Upss!', 'Produk gagal diaktifkan.', 'error');
      }
      redirect('dashboard/admin/data_product');
    } else {
      redirect('dashboard/admin/data_product');
    }
  }

  public function nonaktif_produk($id = null)
  {
    if ($id != null) {
      if ($this->Admin_Model->statusProduct(decrypt_url($id), 0)) {
        $this->freeM->getSweetAlert('message', 'Horay!', 'Produk berhasil dinonaktifkan.', 'success');
      } else {
        $this->freeM->getSweetAlert('message', 'Upss!', 'Produk gagal dinonaktifkan.', 'error');
      }
      redirect('dashboard/admin/data_product');
    } else {
      redirect('dashboard/admin/data_product');
    }
  }

  public function add_tag()
  {
    $this->form_validation->set_rules('nama_tag', 'Nama Tag', 'required|trim|min_length[3]|max_length[20]|alpha');
    $this->form_validation->set_rules('ket_tag', 'Keterangan Tag', 'required|trim|min_length[8]|max_length[50]');
    if ($this->form_validation->run() == false) {
      $data['title'] = 'Tambah Tag Produk - Admin';
      $data['tagAktif'] = $this->Admin_Model->getAllTag(1);
      $data['tagNonaktif'] = $this->Admin_Model->getAllTag(0);
      $this->load->view('admin/product/addTag', $data);
    } else if ($this->form_validation->run() == true) {
      $data = [
        'nama_tag' => ucwords($this->input->post('nama_tag', true)),
        'ket_tag' =>  $this->input->post('ket_tag', true),
        'active' => 1
      ];
      if ($this->Admin_Model->inputTagProduk($data) > 0) {
        $this->freeM->getSweetAlert('message', 'Horay!', 'Tag Produk berhasil ditambahkan.', 'success');
      } else {
        $this->freeM->getSweetAlert('message', 'Upss!', 'Tag Produk gagal ditambahkan.', 'error');
      }
      redirect('dashboard/admin/add_tag');
    }
  }

  public function deactive_tag($id = null)
  {
    if ($id != null) {
      if ($this->Admin_Model->updateStatusTag(decrypt_url($id), 0)) {
        $this->freeM->getSweetAlert('message', 'Horay!', 'Tag Produk berhasil dinonaktifkan.', 'success');
      } else {
        $this->freeM->getSweetAlert('message', 'Upss!', 'Tag Produk gagal dinonaktifkan.', 'error');
      }
      redirect('dashboard/admin/add_tag');
    } else {
      redirect('dashboard/admin/add_tag');
    }
  }

  public function reactive_tag($id = null)
  {
    if ($id != null) {
      if ($this->Admin_Model->updateStatusTag(decrypt_url($id), 1)) {
        $this->freeM->getSweetAlert('message', 'Horay!', 'Tag Produk berhasil diaktifkan.', 'success');
      } else {
        $this->freeM->getSweetAlert('message', 'Upss!', 'Tag Produk gagal diaktifkan.', 'error');
      }
      redirect('dashboard/admin/add_tag');
    } else {
      redirect('dashboard/admin/add_tag');
    }
  }

  public function delete_tag($id)
  {
    if ($id != null) {
      if ($this->Admin_Model->deleteTag(decrypt_url($id))) {
        $this->freeM->getSweetAlert('message', 'Horay!', 'Tag Produk berhasil dihapus selamanya.', 'success');
      } else {
        $this->freeM->getSweetAlert('message', 'Upss!', 'Tag Produk gagal dihapus selamanya.', 'error');
      }
      redirect('dashboard/admin/add_tag');
    } else {
      redirect('dashboard/admin/add_tag');
    }
  }

  public function add_category()
  {
    $this->form_validation->set_rules('nama_cat', 'Nama Kategori', 'required|trim|min_length[3]|max_length[20]|alpha');
    $this->form_validation->set_rules('ket_cat', 'Keterangan Kategori', 'required|trim|min_length[8]|max_length[50]');
    if ($this->form_validation->run() == false) {
      $data['title'] = 'Tambah Kategori Produk - Admin';
      $data['categoryAktif'] = $this->Admin_Model->getAllCategory(1);
      $data['categoryNonaktif'] = $this->Admin_Model->getAllCategory(0);
      $this->load->view('admin/product/addCategory', $data);
    } else if ($this->form_validation->run() == true) {
      $data = [
        'nama_cat' => ucwords($this->input->post('nama_cat', true)),
        'ket_cat' =>  $this->input->post('ket_cat', true),
        'active' => 1
      ];
      if ($this->Admin_Model->inputCategoryProduk($data) > 0) {
        $this->freeM->getSweetAlert('message', 'Horay!', 'Kategori Produk berhasil ditambahkan.', 'success');
      } else {
        $this->freeM->getSweetAlert('message', 'Upss!', 'Kategori Produk gagal ditambahkan.', 'error');
      }
      redirect('dashboard/admin/add_category');
    }
  }

  public function deactive_category($id = null)
  {
    if ($id != null) {
      if ($this->Admin_Model->updateStatusCategory(decrypt_url($id), 0)) {
        $this->freeM->getSweetAlert('message', 'Horay!', 'Kategori Produk berhasil dinonaktifkan.', 'success');
      } else {
        $this->freeM->getSweetAlert('message', 'Upss!', 'Kategori Produk gagal dinonaktifkan.', 'error');
      }
      redirect('dashboard/admin/add_category');
    } else {
      redirect('dashboard/admin/add_category');
    }
  }

  public function reactive_category($id = null)
  {
    if ($id != null) {
      if ($this->Admin_Model->updateStatusCategory(decrypt_url($id), 1)) {
        $this->freeM->getSweetAlert('message', 'Horay!', 'Kategori Produk berhasil diaktifkan.', 'success');
      } else {
        $this->freeM->getSweetAlert('message', 'Upss!', 'Kategori Produk gagal diaktifkan.', 'error');
      }
      redirect('dashboard/admin/add_category');
    } else {
      redirect('dashboard/admin/add_category');
    }
  }

  public function delete_category($id)
  {
    if ($id != null) {
      if ($this->Admin_Model->deleteCategory(decrypt_url($id))) {
        $this->freeM->getSweetAlert('message', 'Horay!', 'Kategori Produk berhasil dihapus selamanya.', 'success');
      } else {
        $this->freeM->getSweetAlert('message', 'Upss!', 'Kategori Produk gagal dihapus selamanya.', 'error');
      }
      redirect('dashboard/admin/add_category');
    } else {
      redirect('dashboard/admin/add_category');
    }
  }

  public function updateTag()
  {
    $this->form_validation->set_rules('nama_tag_new', 'Nama Tag', 'required|trim|min_length[3]|max_length[20]|alpha');
    $this->form_validation->set_rules('ket_tag_new', 'Keterangan Tag', 'required|trim|min_length[8]|max_length[50]');
    if ($this->form_validation->run() == false) {
      $this->freeM->getSweetAlert('message', 'Upss!', 'Tag Produk gagal diupdate. Perbaiki data inputan!', 'error');
      redirect('dashboard/admin/add_tag');
    } else if ($this->form_validation->run() == true) {
      $idTag =  $this->input->post('id_tag_new', true);
      $data = [
        'nama_tag' => ucwords($this->input->post('nama_tag_new', true)),
        'ket_tag' =>  $this->input->post('ket_tag_new', true),
      ];
      if($this->Admin_Model->updateTagCat($idTag, 'tags', $data)){
        $this->freeM->getSweetAlert('message', 'Horay!', 'Tag Produk berhasil diupdate.', 'success');
        redirect('dashboard/admin/add_tag');
      } else {
        $this->freeM->getSweetAlert('message', 'Upss!', 'Tag Produk gagal diupdate. Query Error!', 'error');
        redirect('dashboard/admin/add_tag');
      }
    }
  }

  public function updateCat()
  {
    $this->form_validation->set_rules('nama_cat_new', 'Nama Kategori', 'required|trim|min_length[3]|max_length[20]|alpha');
    $this->form_validation->set_rules('ket_cat_new', 'Keterangan Kategori', 'required|trim|min_length[8]|max_length[50]');
    if ($this->form_validation->run() == false) {
      $this->freeM->getSweetAlert('message', 'Upss!', 'Kategori Produk gagal diupdate. Perbaiki data inputan!', 'error');
      redirect('dashboard/admin/add_category');
    } else if ($this->form_validation->run() == true) {
      $idCat =  $this->input->post('id_cat_new', true);
      $data = [
        'nama_cat' => ucwords($this->input->post('nama_cat_new', true)),
        'ket_cat' =>  $this->input->post('ket_cat_new', true),
      ];
      if($this->Admin_Model->updateTagCat($idCat, 'kategori', $data)){
        $this->freeM->getSweetAlert('message', 'Horay!', 'Kategori Produk berhasil diupdate.', 'success');
        redirect('dashboard/admin/add_category');
      } else {
        $this->freeM->getSweetAlert('message', 'Upss!', 'Kategori Produk gagal diupdate. Query Error!', 'error');
        redirect('dashboard/admin/add_category');
      }
    }
  }
}
