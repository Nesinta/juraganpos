<?php

class Model_Laporan extends CI_Model
{

    function get_data()
    {
        return
            $this->db
            ->join('penjualan', 'penjualan.id_dtlpen = detail_penjualan.id', 'left')
            ->join('barang', 'barang.id_barang = penjualan.id_barang', 'left')
            ->join('pembayaran', ' detail_penjualan.id_pembayaran = pembayaran.id_byr ', 'inner')
            ->join('transaksi', ' detail_penjualan.status_transaksi = transaksi.id_status ', 'inner')
            ->group_by('detail_penjualan.no_trf')
            ->distinct()
            ->order_by('detail_penjualan.id', 'ASC')
            ->get('detail_penjualan')->result();
    }

    function get_status()
    {
        return
            $this->db
            ->join('transaksi', 'transaksi.id_status = detail_penjualan.status_transaksi', 'left')
            ->group_by('detail_penjualan.no_trf')
            ->distinct()
            ->order_by('detail_penjualan.id', 'ASC')
            ->get('detail_penjualan')->result();
    }

    function get_status_by_trf($no_trf)
    {
        return $this->db->query("SELECT * FROM detail_penjualan WHERE no_trf='$no_trf'");
    }

    function get_metode()
    {
        return $this->db->get('pembayaran')->result();
    }

    function cek_transaksi($id)
    {
        return $this->db->join('penjualan', 'penjualan.id_dtlpen = detail_penjualan.id', 'left')
            ->join('barang', 'barang.id_barang = penjualan.id_barang', 'left')
            ->join('pembayaran', 'pembayaran.id_byr = detail_penjualan.id_pembayaran', 'inner')
            ->join('bank', 'bank.id = detail_penjualan.id_bank', 'left')
            ->where('detail_penjualan.id', $id)->get('detail_penjualan')->result();
    }


    function get_range($start, $end, $metode, $status_transaksi)
    {
        if ($metode != '') {
            return $this->db->join('penjualan', 'penjualan.id_dtlpen = detail_penjualan.id', 'left')
                ->join('barang', 'barang.id_barang = penjualan.id_barang', 'left')
                ->join('pembayaran', ' detail_penjualan.id_pembayaran = pembayaran.id_byr ', 'inner')
                ->join('transaksi', ' detail_penjualan.status_transaksi = transaksi.id_status ', 'inner')
                ->where("tgl_trf >=", $start)
                ->where("tgl_trf <=", $end)
                ->where('id_pembayaran', $metode)
                ->where('status_transaksi', $status_transaksi)
                ->group_by('detail_penjualan.no_trf')
                ->distinct()
                ->order_by('detail_penjualan.id', 'ASC')
                ->get('detail_penjualan')->result();
        } else {
            return $this->db->join('penjualan', 'penjualan.id_dtlpen = detail_penjualan.id', 'left')
                ->join('barang', 'barang.id_barang = penjualan.id_barang', 'left')
                ->join('pembayaran', ' detail_penjualan.id_pembayaran = pembayaran.id_byr ', 'inner')
                ->join('transaksi', ' detail_penjualan.status_transaksi = transaksi.id_status ', 'inner')
                ->where("tgl_trf >=", $start)
                ->where("tgl_trf <=", $end)
                ->group_by('detail_penjualan.no_trf')
                ->distinct()
                ->order_by('detail_penjualan.id', 'ASC')
                ->get('detail_penjualan')->result();
        }
    }

    function hapus_trf($id)
    {
        $this->db->where('id', $id)->delete('detail_penjualan');
    }
    function hapus_id($id)
    {
        $this->db->where('id_dtlpen', $id)->delete('penjualan');
    }
}