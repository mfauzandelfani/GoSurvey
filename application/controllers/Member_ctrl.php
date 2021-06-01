<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member_ctrl extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Pgn_model');
	}



	public function index()
	{
		$this->load->view('Member/Header');
		$this->load->view('Member/Dashboard');
		$this->load->view('Member/Footer');
	}

	public function hlm_dompet()
	{
		$this->load->view('Member/Header');
		$this->load->view('Member/Dompet');
		$this->load->view('Member/Footer');
	}

	public function data_survey()
	{
		$this->load->view('Member/Header');
		$this->load->view('Member/Data_survey');
		$this->load->view('Member/Footer');
	}

	public function halaman_task()
	{
		$this->load->view('Member/Header');
		$this->load->view('Member/Survey/Task_survey');
		$this->load->view('Member/Footer');
	}

	public function halaman_soal()
	{
		$this->load->view('Member/Header');
		$this->load->view('Member/Survey/soal_survey');
		$this->load->view('Member/Footer');
	}

	public function halaman_awal()
	{
		$this->load->view('Member/Header');
		$this->load->view('Member/Beranda');
		$this->load->view('Member/Footer');
	}

	public function activesurvey()
	{
		$this->load->view('Member/Header');
		$this->load->view('Member/Activesurvey');
		$this->load->view('Member/Footer');
	}

	public function addsurvey()
	{
		$this->load->view('Member/Header');
		$this->load->view('Member/Addsurvey');
		$this->load->view('Member/Footer');
	}
}
