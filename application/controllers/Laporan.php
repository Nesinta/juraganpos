<?php


class Laporan extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        chek_role();
        $this->load->model('Model_laporan');
    }


    function index($start = null, $end = null)
    {
        if (isset($_POST['search'])) {
            $start = $this->input->post('start_date');
            $end = $this->input->post('end_date');
            $metode = $this->input->post('metode');
            $status_transaksi = $this->input->post('status_transaksi');
            $data['laporan'] = $this->Model_laporan->get_range($start, $end, $metode, $status_transaksi);
            $data['metode'] = $this->Model_laporan->get_metode();
            $this->template->load('template/template', 'laporan/lihat_data', $data);
            $this->load->view('template/datatables');
        } else {
            $data['laporan'] = $this->Model_laporan->get_data();
            $data['metode'] = $this->Model_laporan->get_metode();
            $this->template->load('template/template', 'laporan/lihat_data', $data);
            $this->load->view('template/datatables');
        }
    }

    function status($no_trf)
    {
        $data['status'] = $this->Model_laporan->get_status_by_trf($no_trf)->row_array();
        $this->template->load('template/template', 'laporan/status', $data);
        $this->load->view('template/datatables');
    }

    function struk($id)
    {
        $cek = $this->Model_laporan->cek_transaksi($this->uri->segment(3));
        $data = array(
            'tanggal' => $cek[0]->tgl_trf,
            'jam' => $cek[0]->jam_trf,
            'nota' => $cek[0]->no_trf,
            'operator' => $cek[0]->operator,
            'pelanggan' => $cek[0]->nama_pelanggan,
            'total' => $cek[0]->totalpure,
            'diskon' => $cek[0]->diskon,
            'grand_total' => $cek[0]->grand_total,
            'result' => $cek,
            'metode' => $cek[0]->metode,
            'bayar' => $cek[0]->bayar,
            'kembalian' => $cek[0]->kembalian,
            'rekening' => $cek[0]->no_rek,
            'bank' => $cek[0]->nama_bank,
            'atasnama' => $cek[0]->atas_nama,
        );
        $this->template->load('template/template', 'laporan/struk', $data);
    }

    function hapus($id)
    {
        $this->Model_laporan->hapus_trf($id);
        $this->Model_laporan->hapus_id($id);
    }
    function edit()
    {
        $no_trf = $this->input->post('no_trf');
        $note = $this->input->post('note');

        $cek = $this->db->query("SELECT * FROM detail_penjualan WHERE no_trf='$no_trf'");
        $htg = $cek->num_rows();
        $hsl = $cek->result();
        if ($htg > 0) {
            foreach ($hsl as $hs) {
                $this->db->query("UPDATE detail_penjualan SET catatan='$note' WHERE no_trf='$no_trf'");
            }
        }
        redirect('laporan/');
    }

    function updatestatus()
    {
        $no_trf = $this->input->post('no_trf');
        $status_transaksi = $this->input->post('status_transaksi');
        $this->db->query("UPDATE detail_penjualan SET status_transaksi='$status_transaksi' WHERE no_trf='$no_trf'");
        redirect('laporan/status/' . $no_trf);
    }
}
