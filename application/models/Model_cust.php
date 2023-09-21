<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_cust extends CI_Model
{

    function reg($username, $password, $name, $emaila, $created_at, $update_at)
    {
        return $this->db->query("INSERT INTO user (username,password,name,email,created_at,updated_at) VALUES ('$username','$password','$name','$emaila','$created_at','$update_at')");
    }

    function unow2()
    {
        $usr = $this->session->userdata('usr');
        return $this->db->query("SELECT * FROM user WHERE id='$usr'");
    }

    //LOGIN
    function data_login($username, $password)
    {
        return $this->db->query("SELECT * FROM user WHERE username='$username' OR email='$username' AND pass='$password'");
    }

    //USER IDENTIFICATION
    function unow()
    {
        $usr = $this->session->userdata('adm');
        return $this->db->query("SELECT * FROM user WHERE id='$usr'");
    }

    //JURAGAN VIEW
    function juragan()
    {
        return $this->db->query("SELECT * FROM juragan");
    }

    //JURAGAN ADD
    function adjur($juragan, $created, $updated)
    {
        return $this->db->query("INSERT INTO juragan (nama_juragan,created_at,updated_at) VALUES ('$juragan','$created','$updated')");
    }

    //JURAGAN EDIT
    function edjur($jur, $juragan, $updated)
    {
        return $this->db->query("UPDATE juragan SET nama_juragan='$juragan', updated_at='$updated' WHERE id_juragan='$jur'");
    }

    //CS VIEW
    function cs()
    {
        return $this->db->query("SELECT * FROM user WHERE level='cs'");
    }

    //ADMIN VIEW
    function adm()
    {
        return $this->db->query("SELECT * FROM user WHERE level='admin'");
    }

    //CS ADD
    function adcs($username, $pass, $name, $email, $created, $updated)
    {
        return $this->db->query("INSERT INTO user (username,password,name,email,created_at,updated_at) VALUES ('$username','$pass','$name','$email','$created','$updated')");
    }

    //ADMIN ADD
    function adadm($username, $pass, $name, $email, $level, $status, $created, $updated)
    {
        return $this->db->query("INSERT INTO user (username,password,name,email, level,status,created_at,updated_at) VALUES ('$username','$pass','$name','$email','$level','$status','$created','$updated')");
    }

    //CS EDIT
    function edcs($username, $name, $email, $id)
    {
        return $this->db->query("UPDATE user SET username='$username', name='$name', email='$email' WHERE id='$id'");
    }

    //CUSTOMER ADD
    function ambil_foto($nama_pelanggan, $hp, $prov_id, $kab_id, $kec_id, $des_id, $alamat, $kodepos, $addr_status, $id_pelanggan)
    {
        $chek =  $this->db->join('address', 'pelanggan.id_pelanggan = address.id_pelanggan', 'left')
            ->get_where('pelanggan', array('nama_pelanggan' => $nama_pelanggan, 'hp' =>  $hp, 'prov_id' =>  $prov_id, 'kab_id' =>  $kab_id, 'kec_id' =>  $kec_id, 'des_Id' =>  $des_id, 'alamat' =>  $alamat, 'kodepos' =>  $kodepos, 'addr_status' => $addr_status, 'id_pelanggan' =>  $id_pelanggan));
        if ($chek->num_rows() > 0) {
            return $chek;
        } else {
            return false;
        }
    }


    function adcust($nama_pelanggan, $hp, $cod, $created, $updated)
    {
        return $this->db->query("INSERT INTO pelanggan (nama_pelanggan,hp,cod,created_at,updated_at) VALUES ('$nama_pelanggan','$hp','$cod','$created','$updated')");
    }

    function edit_data($id_pelanggan, $data_pelanggan, $data_alamat)
    {
        // Mulai transaksi database
        $this->db->trans_start();

        // Update data pada tabel "pelanggan"
        $this->db->where('id_pelanggan', $id_pelanggan);
        $this->db->update('pelanggan', $data_pelanggan);

        // Update data pada tabel "address" berdasarkan id_pelanggan
        $this->db->where('id_pelanggan', $id_pelanggan);
        $this->db->update('address', $data_alamat);

        // Selesaikan transaksi database
        $this->db->trans_complete();

        // Cek apakah transaksi berhasil
        if ($this->db->trans_status() === FALSE) {
            return false;
        } else {
            return true;
        }
    }

    function get_one($id)
    {
        $this->db->select('pelanggan.*, address.prov_id, address.kab_id, address.kec_id, address.des_id, address.alamat, address.kodepos, address.addr_status');
        $this->db->from('pelanggan');
        $this->db->join('address', 'pelanggan.id_pelanggan = address.id_pelanggan');
        $this->db->where('pelanggan.id_pelanggan', $id);
        return $this->db->get();
    }

    public function getProvNameById($prov_id)
    {
        $this->db->select('prov_name');
        $this->db->where('prov_id', $prov_id);
        $query = $this->db->get('provinces');
        return $query->row();
    }

    public function getKabByProvId($prov_id)
    {
        $this->db->select('kab_id, kab_name');
        $this->db->where('prov_id', $prov_id);
        return $this->db->get('regencies');
    }

    public function getKecByKabId($kab_id)
    {
        $this->db->select('kec_id, kec_name');
        $this->db->where('kab_id', $kab_id);
        return $this->db->get('districts');
    }

    public function getDesByKecId($kec_id)
    {
        $this->db->select('des_id, des_name');
        $this->db->where('kec_id', $kec_id);
        return $this->db->get('subdistricts');
    }

    public function getAddrStatusOptions()
    {
        // Return array of addr_status options
        return array(
            'main' => 'Utama',
            'optional' => 'Alamat Lain'
        );
    }

    //CUSTOMER VIEW
    function cust()
    {
        return $this->db->query("SELECT p.*, a.addr_status FROM pelanggan p LEFT JOIN address a ON p.id_pelanggan = a.id_pelanggan");
    }

    //ADDRESS ADD
    function adaddr($prov_id, $kab_id, $kec_id, $des_id, $alamat, $kodepos, $addr_status, $id_pelanggan)
    {
        return $this->db->query("INSERT INTO address (prov_id,kab_id,kec_id,des_id,alamat,kodepos,addr_status,id_pelanggan)
			VALUES ('$prov_id','$kab_id','$kec_id','$des_id','$alamat','$kodepos','$addr_status','$id_pelanggan')");
    }

    //PROVINCES VIEW ON DROPDOWN
    function prov()
    {
        return $this->db->query("SELECT * FROM provinces");
    }

    //NAME OF USER EDIT
    function edinama($name, $id)
    {
        return $this->db->query("UPDATE user SET name='$name' WHERE id='$id'");
    }

    //EMAIL OF USER EDIT
    function edimail($email, $id)
    {
        return $this->db->query("UPDATE user SET email='$email' WHERE id='$id'");
    }

    //USERNAME OF USER EDIT
    function ediuser($user, $id)
    {
        return $this->db->query("UPDATE user SET username='$user' WHERE id='$id'");
    }

    //PASSWORD OF USER EDIT
    function edipass($pass, $id)
    {
        return $this->db->query("UPDATE user SET password='$pass' WHERE id='$id'");
    }


    function upusr($username, $name, $email, $updated_at)
    {
        $usrid = $this->session->userdata('usr');
        return $this->db->query("UPDATE user SET username='$username', name='$name', email='$email', updated_at='$updated_at' WHERE id='$usrid'");
    }
}