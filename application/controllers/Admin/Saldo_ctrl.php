<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Saldo_ctrl extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Pgn_model');
    }

    public function index()
    {
        $saldo = $this->Pgn_model->select_bank();
        $data = array('saldo' => $saldo,);
        $data1['user'] = $this->db->get_where('tbl_user', ['email_usr' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('Admin/UI/Header', $data1);
        $this->load->view('Admin/Setting/saldo', $data);
        $this->load->view('Admin/UI/Footer');
    }

    public function register_bank()
    {
        $config['upload_path']          = './assets/gambar/logo';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            $this->upload->data("file_name");
        }


        $data = [
            'logo_bank' => $_FILES['image']['name'],
            'nama_bank' => $this->input->post('NamaBank'),
            'nomor_bank' => $this->input->post('NomorBank'),
            'atas_nama' => $this->input->post('ats_nama')

        ];


        $this->db->insert('tbl_bank', $data);
        //          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        //   Congratulation! your account has been created. Please Login
        // </div>');
        redirect('Admin/Saldo_ctrl');
    }

    public function edit2($data)
    {


        $data['tbl_bank'] = $this->Pgn_model->get_by_id2($data);
        $id = $this->input->post('no_bank');
        $this->form_validation->set_rules('logo', 'Logo', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('nomor', 'Nomor', 'required|trim');


        if ($this->form_validation->run() == false) {

            redirect(base_url('Admin/Saldo_ctrl', $data));
        } else {

            $this->pgn_model->ubahdatabank();
            redirect(base_url('Admin/Saldo_ctrl'));
        }
    }

    public function editaction2()
    {

        $config['upload_path']          = './assets/gambar/logo';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
            $this->upload->data("file_name");
        }

        $id = $this->input->post('id');
        $data = [

            'no_bank' => $this->input->post('id'),
            'logo_bank' => $_FILES['image']['name'],
            'nama_bank' => $this->input->post('nama'),
            'nomor_bank' => $this->input->post('nomor'),
            'atas_nama' => $this->input->post('ats_nama')


            // 'alamat_pgn' => $this->input->post('alamat'),
            // 'sts_pgn' => $this->input->post('status'),
            // 'email_pgn' => $this->input->post('email'),
            // 'pass_pgn' => $this->input->post('pass')

        ];

        if ($this->Pgn_model->ubahdatabank($data, $id) == TRUE) {
            $this->session->set_flashdata('edit2', true);
        } else {
            $this->session->set_flashdata('edit2', false);
        }

        redirect(base_url('Admin/Saldo_ctrl'));


        // $this->db->where('id_pgn', $id);
        // $this->db->where('pengguna', $data);
        // redirect('Admin_ctrl/Data_member');
    }

    public function hapus_bank($data)
    {


        $this->Pgn_model->delete_bank($data);
        $this->session->set_flashdata('flash', 'Dihapus');
        $pgn = $this->Pgn_model->select_bank();
        $data = array('pgn' => $pgn,);

        redirect('Admin/Saldo_ctrl');
    }
}
