<?php
class juragan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        chek_role();
        $this->load->model('Model_juragan');
    }

    function index()
    {
        $data['cust'] = $this->Model_juragan->data()->result();
        $this->template->load('template/template', 'juragan/juragan_view', $data);
        $this->load->view('template/datatables');
    }


    function post()
    {
        if (isset($_POST['submit'])) {
            //proses data
            $data = array('upload_data' => $this->upload->data());
            $nama_juragan = $this->input->post('nama_juragan', true);
            $data = array(
                'nama_juragan' => $nama_juragan,
            );
            $this->db->insert('juragan', $data);
            redirect('juragan');
        } else {
            $data['akses'] = $this->Model_juragan->data();
            $data['error'] = $this->upload->display_errors();
            $this->template->load('template/template', 'juragan/form_input', $data);
        }
    }


    function edit()
    {
        if (isset($_POST['submit'])) {
            //proses operator
            $config['overwrite'] = TRUE;
            $this->upload->initialize($config);

            $data = array('upload_data' => $this->upload->data());
            $nama = $this->input->post('juragan', true);
            $data = array(
                'nama_juragan' => $nama,
            );
            $this->Model_juragan->edit($data);
            redirect('juragan');
        } else {

            $id = $this->uri->segment(3);
            $data['record'] = $this->Model_juragan->get_one($id)->row_array();
            $this->template->load('template/template', 'juragan/form_edit', $data);
        }
    }




    function hapus()
    {
        $id = $this->uri->segment(3);
        $this->db->where('id_juragan', $id);
        $this->db->delete('juragan');
        redirect('juragan');
    }
}
