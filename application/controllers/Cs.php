<?php
class Cs extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		chek_role();
		$this->load->model('Model_cs');
	}

	function index()
	{
		$data['record'] = $this->Model_cs->tampilkan_data()->result();
		$this->template->load('template/template', 'cs/lihat_data', $data);
		$this->load->view('template/datatables');
	}

	function postcs()
	{
		if (isset($_POST['submit'])) {
			//proses data
			$config['overwrite'] = TRUE;
			$config['remove_spaces'] = TRUE;
			$config['encrypt_name'] = TRUE;
			$this->upload->initialize($config);

			$data = array('upload_data' => $this->upload->data());
			$nama 		= $this->input->post('operator', true);
			$username	= $this->input->post('username', true);
			$password	= $this->input->post('password', true);
			$id_akses	= $this->input->post('3', true);
			$data 		= array(
				'nama_operator' => $nama,
				'username' => $username,
				'password' => md5($password),
				'id_akses' => $id_akses,
			);
			$this->db->insert('operator', $data);
			redirect('cs');
		} else {
			$data['akses'] = $this->Model_cs->getAkses();
			$data['error'] = $this->upload->display_errors();
			$this->template->load('template/template', 'cs/form_input', $data);
		}
	}

	function edit()
	{
		if (isset($_POST['submit'])) {
			//proses operator
			$config['overwrite'] = TRUE;
			$config['remove_spaces'] = TRUE;
			$config['encrypt_name'] = TRUE;
			$this->upload->initialize($config);

			$data = array('upload_data' => $this->upload->data());
			$nama 		= $this->input->post('operator', true);
			$username	= $this->input->post('username', true);
			$data = array(
				'nama_operator' => $nama,
				'username' => $username,
			);
			$this->Model_cs->edit($data);
			redirect('cs');
		} else {

			$id = $this->uri->segment(3);
			$data['record'] = $this->Model_cs->get_one($id)->row_array();
			$data['akses'] = $this->Model_cs->getAkses();
			$this->template->load('template/template', 'cs/form_edit', $data);
		}
	}

	function hapus()
	{
		$id = $this->uri->segment(3);
		$this->db->where('id_operator', $id);
		$this->db->delete('operator');
		redirect('operator');
	}
}
