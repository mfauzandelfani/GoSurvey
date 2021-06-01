<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('Pgn_model');

		if(!$this->session->userdata('logined') || $this->session->userdata('logined') != true){
			redirect('/');
		}
	}
	


	public function index()
	{

		$this->load->view('Admin/Header');
		$this->load->view('Admin/CobaCon');
		$this->load->view('Admin/Footer');


	}

	public function halaman_awal(){
		$this->load->view('Admin/Header');
		$this->load->view('Admin/Beranda');
		$this->load->view('Admin/Footer');
	}

	public function home($nama = 'Azmi')
	{
		echo "Halaman Home " . $nama;
	}
}

