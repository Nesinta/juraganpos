<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cust extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        chek_role();
        $this->load->model('Model_cust');
    }

    function index()
    {
        $data['cust'] = $this->Model_cust->cust()->result();

        // Ubah nilai addr_status jika diperlukan
        foreach ($data['cust'] as &$cust) {
            if ($cust->addr_status == 'main') {
                $cust->addr_status = 'Utama';
            } elseif ($cust->addr_status == 'optional') {
                $cust->addr_status = 'Alamat Lain';
            }
        }

        $this->template->load('template/template', 'cust/cust', $data);
        $this->load->view('template/datatables');
    }

    function postcust()
    {
        if (isset($_POST['submit'])) {
            // Proses upload file (jika diperlukan) menggunakan konfigurasi yang Anda sediakan

            // Mengumpulkan data dari formulir
            $nama_pelanggan = $this->input->post('nama_pelanggan', true);
            $hp = $this->input->post('hp', true);

            // Cek apakah data pelanggan sudah ada
            // $existing_pelanggan = $this->Model_cust->ambil_foto($nama_pelanggan, $hp, $prov_id, $kab_id, $kec_id, $des_id, $alamat, $kodepos, $addr_status, $id_pelanggan);

            // if (!$existing_pelanggan) {
            // Menyiapkan data untuk tabel "pelanggan"
            $data_pelanggan = array(
                'nama_pelanggan' => $nama_pelanggan,
                'hp' => $hp
            );

            // Insert data ke tabel "pelanggan"
            $this->db->insert('pelanggan', $data_pelanggan);

            // Dapatkan id_pelanggan yang baru saja di-generate
            $id_pelanggan = $this->db->insert_id();

            // Mengumpulkan data alamat dari formulir
            $prov_id = $this->input->post('prov_id', true);
            $kab_id = $this->input->post('kab_id', true);
            $kec_id = $this->input->post('kec_id', true);
            $des_id = $this->input->post('des_id', true);
            $alamat = $this->input->post('alamat', true);
            $kodepos = $this->input->post('kodepos', true);
            $addr_status = $this->input->post('addr_status', true);

            // Menyiapkan data untuk tabel "address"
            $data_alamat = array(
                'prov_id' => $prov_id,
                'kab_id' => $kab_id,
                'kec_id' => $kec_id,
                'des_id' => $des_id,
                'alamat' => $alamat,
                'kodepos' => $kodepos,
                'addr_status' => $addr_status,
                'id_pelanggan' => $id_pelanggan
            );

            // Insert data ke tabel "address"
            $this->db->insert('address', $data_alamat);
            // }

            // Redirect ke halaman "cust" setelah penambahan data
            redirect('cust');
        } else {
            $data['cust'] = $this->Model_cust->cust();
            $data['prov'] = $this->Model_cust->prov()->result();
            $data['error'] = $this->upload->display_errors();

            // Load view untuk menampilkan formulir edit
            $this->template->load('template/template', 'cust/cust_add', $data);
        }
    }

    public function edit()
    {
        if (isset($_POST['submit'])) {
            // Mengumpulkan data dari formulir
            $id_pelanggan = $this->input->post('id_pelanggan', true);
            $nama_pelanggan = $this->input->post('nama_pelanggan', true);
            $hp = $this->input->post('hp', true);
            $prov_id = $this->input->post('prov_id', true);
            $kab_id = $this->input->post('kab_id', true);
            $kec_id = $this->input->post('kec_id', true);
            $des_id = $this->input->post('des_id', true);
            $alamat = $this->input->post('alamat', true);
            $kodepos = $this->input->post('kodepos', true);
            $addr_status = $this->input->post('addr_status', true);

            // Load model
            $this->load->model('Model_cust');

            // Siapkan data untuk tabel "pelanggan"
            $data_pelanggan = array(
                'nama_pelanggan' => $nama_pelanggan,
                'hp' => $hp
            );

            // Siapkan data untuk tabel "address"
            $data_alamat = array(
                'prov_id' => $prov_id,
                'kab_id' => $kab_id,
                'kec_id' => $kec_id,
                'des_id' => $des_id,
                'alamat' => $alamat,
                'kodepos' => $kodepos,
                'addr_status' => $addr_status
            );

            // Panggil fungsi edit_data() dari model
            $result = $this->Model_cust->edit_data($id_pelanggan, $data_pelanggan, $data_alamat);

            if ($result) {
                // Transaksi berhasil, arahkan pengguna ke halaman "cust" atau tindakan lain yang diperlukan
                redirect('cust');
            } else {
                // Transaksi gagal, tampilkan pesan kesalahan atau tindakan lain yang diperlukan
                echo "Gagal menyimpan perubahan.";
            }
        } else {
            $id = $this->uri->segment(3);

            // Load model
            $this->load->model('Model_cust');

            // Ambil data pelanggan dari model
            $data['cust'] = $this->Model_cust->get_one($id)->row_array();

            // Ambil data provinsi dari model
            $data['prov'] = $this->Model_cust->prov()->result();

            // Ambil data provinsi dan kabupaten dari model
            $data['kab'] = $this->Model_cust->getKabByProvId($data['cust']['prov_id'])->result();

            // Ambil data kecamatan dari model berdasarkan kab_id
            $data['kec'] = $this->Model_cust->getKecByKabId($data['cust']['kab_id'])->result();

            // Ambil data desa dari model berdasarkan kec_id
            $data['des'] = $this->Model_cust->getDesByKecId($data['cust']['kec_id'])->result();

            // Ambil pilihan addr_status dari model
            $data['addr_status_options'] = $this->Model_cust->getAddrStatusOptions();

            $data['error'] = $this->upload->display_errors();

            // Load view untuk menampilkan formulir edit
            $this->template->load('template/template', 'cust/cust_edit', $data);
        }
    }



    function hapus()
    {
        $id = $this->uri->segment(3);

        // Menghapus data dari tabel "address" berdasarkan id_pelanggan
        $this->db->where('id_pelanggan', $id);
        $this->db->delete('address');

        // Menghapus data dari tabel "pelanggan" berdasarkan id_pelanggan
        $this->db->where('id_pelanggan', $id);
        $this->db->delete('pelanggan');

        redirect('cust');
    }

    // function index()
    // {
    //     $data['cust'] = $this->Model_cust->cust()->result();
    //     $data['custrows'] = $this->Model_cust->cust()->num_rows();
    //     $data['prov'] = $this->Model_cust->prov()->result();
    //     $this->template->load('template/template', 'cust/cust', $data);
    //     $this->load->view('template/datatables');
    // }

    // function add()
    // {
    //     $data['prov'] = $this->Model_cust->prov()->result();
    //     $this->load->view('cust/custadd', $data);
    // }

    // function addpro()
    // {
    //     $nama_pelanggan = $this->input->post('nama_pelanggan');
    //     $hp = $this->input->post('hp');
    //     $cod = $this->input->post('cod');
    //     $created = $this->input->post('created');
    //     $updated = $created;
    //     $this->Model_cust->adcust($nama_pelanggan, $hp, $cod, $created, $updated);
    //     $this->session->set_flashdata('yeay', '<div class="alert alert-success" id="hilangDitelan"><b>SUKSES!</b> Pelanggan dengan nama <b>' . $nama_pelanggan . '</b> berhasil ditambahkan.</div>');
    //     redirect('cust');
    // }

    // function adaddr()
    // {
    //     $prov_id = $this->input->post('prov_id');
    //     $kab_id = $this->input->post('kab_id');
    //     $kec_id = $this->input->post('kec_id');
    //     $des_id = $this->input->post('des_id');
    //     $alamat = $this->input->post('alamat');
    //     $kodepos = $this->input->post('kodepos');
    //     $addr_status = $this->input->post('addr_status');
    //     $id_pelanggan = $this->input->post('id_pelanggan');
    //     $this->Model_cust->adaddr($prov_id, $kab_id, $kec_id, $des_id, $alamat, $kodepos, $addr_status, $id_pelanggan);
    //     $this->session->set_flashdata('yeay', '<div class="alert alert-success" id="hilangDitelan"><b>SUKSES!</b> Data berhasil ditambahkan.</div>');
    //     redirect('cust');
    // }

    // function edit()
    // {
    //     $nama_pelanggan = $this->input->post('nama_pelanggan');
    //     $hp = $this->input->post('hp');
    //     $cod = $this->input->post('cod');
    //     $this->Model_cust->edcust($nama_pelanggan, $hp, $cod);
    //     $this->session->set_flashdata('yeay', '<div class="alert alert-success" id="hilangDitelan"><b>SUKSES!</b> Pelanggan dengan nama <b>' . $nama_pelanggan . '</b> berhasil ditambahkan.</div>');
    //     redirect('cust');
    // }

    function regencies($prov_id)
    {
        $data['regenc'] = $this->db->query("SELECT * FROM regencies WHERE prov_id='$prov_id'")->result();
        $this->load->view('cust/reg_data', $data);
    }

    function districts($kab_id)
    {
        $data['dis'] = $this->db->query("SELECT * FROM districts WHERE kab_id='$kab_id'")->result();
        $this->load->view('cust/dis_data', $data);
    }

    function subdistricts($kec_id)
    {
        $data['subdis'] = $this->db->query("SELECT * FROM subdistricts WHERE kec_id='$kec_id'")->result();
        $this->load->view('cust/subdis_data', $data);
    }

    // function addaddress()
    // {
    //     $prov_id = $this->input->post('prov_id');
    //     $kab_id = $this->input->post('kab_id');
    //     $kec_id = $this->input->post('kec_id');
    //     $des_id = $this->input->post('des_id');
    //     $alamat = $this->input->post('alamat');
    //     $kodepos = $this->input->post('kodepos');
    //     $id_pelanggan = $this->input->post('id_pelanggan');
    //     $this->Model_cust->adaddr($prov_id, $kab_id, $kec_id, $des_id, $alamat, $kodepos, $id_pelanggan);
    //     $this->session->set_flashdata('yeay', '<div class="alert alert-success" id="hilangDitelan"><b>SUKSES!</b> Alamat berhasil ditambahkan.</div>');
    //     redirect('cust');
    // }
    // function delet($cid)
    // {
    //     $this->db->query("DELETE FROM pelanggan WHERE id_pelanggan='$cid'");
    //     $this->db->query("DELETE FROM address WHERE id_pelanggan='$cid'");
    //     $this->session->set_flashdata('yeay', '<div class="alert alert-success" id="hilangDitelan"><b>SUKSES!</b> Cs di hapus</div>');
    //     redirect('cust');
    // }
}
