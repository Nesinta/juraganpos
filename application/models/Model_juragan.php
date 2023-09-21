<?php

class Model_juragan extends CI_Model
{
    function data()
    {
        return $this->db->get('juragan');
    }
    function getAkses()
    {
        return $this->db->get('akses')->result();
    }

    function add($nama_juragan, $alamat)
    {
        $this->db->query("INSERT INTO juragan (nama_juragan, alamat) VALUES ('$nama_juragan', '$alamat')");
    }

    function get_one($id)
    {
        $param  =   array('id_juragan' => $id);
        return $this->db->get_where('juragan', $param);
    }

    function edit($data)
    {
        $this->db->where('id_juragan', $this->input->post('id'));
        $this->db->update('juragan', $data);
    }

    function hapus($id)
    {
        $this->db->where('id_juragan', $id);
        $this->db->delete('juragan');
    }

    function get_detail_modal($id)
    {
        return $this->db->where('id_juragan', $id)
            ->get('juragan')
            ->row();
    }
}
