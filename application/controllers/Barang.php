<?php

class Barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        chek_role();
        $this->load->model('Model_barang');
        $this->load->model('Model_kategori');
    }
    function index()
    {
        $data['record'] = $this->Model_barang->tampil_data()->result();
        $this->template->load('template/template', 'barang/lihat_data', $data);
        $this->load->view('template/datatables');
    }
    function post()
    {
        if (isset($_POST["submit"])) {
            $config['overwrite'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['encrypt_name'] = TRUE;
            $this->upload->initialize($config);
            // proses barang
            $id = $this->input->post('id');
            $nama = $this->input->post('nama_barang');
            $kategori = $this->input->post('kategori');
            $harga = $this->input->post('harga');
            $ukuran = $this->input->post('ukuran');
            $data = array(
                'nama_barang' => $nama,
                'id_kategori' => $kategori,
                'ukuran' => $ukuran,
                'harga' => $harga,
            );
            $this->Model_barang->post($data, $id);
            $this->session->set_flashdata('message', 'Data Barang berhasil ditambahkan!');
            redirect('barang');
        } else {
            $id = $this->uri->segment(3);
            $data['error'] = $this->upload->display_errors();
            $this->load->model("Model_kategori");
            $data['kategori'] =  $this->Model_kategori->tampilkan_data();
            $data['record'] = $this->Model_barang->get_one($id)->row_array();
            $data['ukuran'] = $this->Model_barang->tampilkan_ukuran()->result();
            $this->template->load("template/template", "barang/form_input", $data);
        }
    }


    function edit()
    {
        if (isset($_POST['submit'])) {
            $config['overwrite'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['encrypt_name'] = TRUE;
            $this->upload->initialize($config);
            $id         =   $this->input->post('id');
            $nama       =   $this->input->post('nama_barang');
            $kategori   =   $this->input->post('kategori');
            $harga      =   $this->input->post('harga');
            $ukuran     =   $this->input->post('ukuran');
            $data       = array(
                'nama_barang' => $nama,
                'id_kategori' => $kategori,
                'ukuran' => $ukuran,
                'harga' => $harga,
            );
            $this->Model_barang->edit($data, $id);
            $this->session->set_flashdata('message', 'Data Barang berhasil dirubah!');
            redirect('barang');
        } else {
            $id =  $this->uri->segment(3);
            $this->load->model('Model_kategori');
            $data['kategori']   =  $this->Model_kategori->tampilkan_data();
            $data['record']     =  $this->Model_barang->get_one($id)->row_array();
            $data['ukuran'] = $this->Model_barang->tampilkan_ukuran()->result();
            $this->template->load('template/template', 'barang/form_edit', $data);
        }
    }
    function hapus()
    {
        $id = $this->uri->segment(3);
        $this->Model_barang->hapus($id);
        $this->session->set_flashdata('message', 'Data Barang berhasil dihapus!');
        redirect('barang');
    }

    function detail_modal($id)
    {
        $id = $this->input->get('id');
        $data['detail'] = $this->Model_barang->get_detail_modal($id);
        $this->load->view('barang/modal_detail', $data);
    }
}
