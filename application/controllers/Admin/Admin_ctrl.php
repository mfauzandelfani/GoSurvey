<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_ctrl extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Pgn_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email_usr' =>
		$this->session->userdata('email')])->row_array();
		$this->load->view('Admin/UI/Header', $data);
		$this->load->view('Admin/UI/Dashboard');
		$this->load->view('Admin/UI/Footer');
	}
	// public function riwayat()
	// {
	// 	$data['user'] = $this->db->get_where('tbl_user', ['email_usr' =>
	// 	$this->session->userdata('email')])->row_array();
	// 	$this->load->view('Admin/Header', $data);
	// 	$this->load->view('Admin/riwayat');
	// 	$this->load->view('Admin/Footer');
	// }
	// public function register_rwt()
	// {

	// 	$this->form_validation->set_rules('owner_rwt', 'owner', 'required|trim');
	// 	$this->form_validation->set_rules('judul_rwt', 'judul', 'required|trim');
	// 	$this->form_validation->set_rules('bukti_rwt', 'bukti', 'required|trim');
	// 	$this->form_validation->set_rules('jumlah_rwt', 'jumlah', 'required|trim');
	// 	$this->form_validation->set_rules('desk_rwt', 'deskripsi', 'required|trim');

	// 	if ($this->form_validation->run() == false) {

	// 		$data['title'] = 'Registrasi';
	// 		$this->load->view('Admin/Beranda', $data);
	// 	} else {
	// 		$data = [
	// 			'judul_rwt' => $this->input->post('judul_rwt'),
	// 			'progres_rwt' => "0%",
	// 			'jumlah_rwt' => $this->input->post('jumlah_rwt'),
	// 			'pembayaran_rwt' => "BRI",
	// 			'jumlah_rwt' => $this->input->post('jumlah_rwt'),
	// 			'status_rwt' => "unverified",
	// 			'tanggal_rwt' => "Hari ini",
	// 			'bukti_rwt' => $this->input->post('bukti_rwt'),

	// 		];

	// 		$this->db->insert('riwayat', $data);
	// 		//          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
	// 		//   Congratulation! your account has been created. Please Login
	// 		// </div>');
	// 		redirect('Admin/Admin_ctrl/Saldo');
	// 	}
	// }

	// public function register_pgn()
	// {
	// 	$this->form_validation->set_rules('LogoBank', 'Logo', 'required|trim');
	// 	$this->form_validation->set_rules('NamaBank', 'Name', 'required|trim');
	// 	$this->form_validation->set_rules('NomorBank', 'Nomor', 'required|trim');


	// 	if ($this->form_validation->run() == false) {

	// 		$data['title'] = 'Registrasi';
	// 		$this->load->view('Admin/Beranda', $data);
	// 	} else {
	// 		$data = [
	// 			'Logo_bank' => $this->input->post('LogoBank'),
	// 			'Nama_bank' => $this->input->post('NamaBank'),
	// 			'Nomor_bank' => $this->input->post('NomorBank')

	// 		];

	// 		$this->db->insert('tbl_bank', $data);
	// 		//          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
	// 		//   Congratulation! your account has been created. Please Login
	// 		// </div>');
	// 		redirect('Admin/Admin_ctrl/Saldo');
	// 	}
	// }
}
