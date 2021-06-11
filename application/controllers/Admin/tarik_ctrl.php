<?php
defined('BASEPATH') or exit('No direct script access allowed');

class tarik_ctrl extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pgn_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $pgn = $this->Pgn_model->select_tarik();
        $data = array('pgn' => $pgn,);
        $data1['user'] = $this->db->get_where('tbl_user', ['email_usr' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('Admin/UI/Header', $data1);
        $this->load->view('Admin/verifikasi/tarik', $data);
        $this->load->view('Admin/UI/Footer');
    }

    // public function hapus($data)
    // {

    //     $data1['user'] = $this->db->get_where('tbl_user', ['email_usr' =>
    //     $this->session->userdata('email')])->row_array();
    //     $this->Pgn_model->delete($data);
    //     $this->session->set_flashdata('flash', 'Dihapus');
    //     $pgn = $this->Pgn_model->select_user();
    //     $data = array('pgn' => $pgn,);

    //     $this->load->view('Admin/UI/Header', $data1);
    //     $this->load->view('Admin/Member/Data_member', $data);
    //     $this->load->view('Admin/UI/Footer');
    // }

    // public function edit($data)
    // {


    //     $data['tbl_task'] = $this->Pgn_model->get_by_id3($data);
    //     $id = $this->input->post('id_task');
    //     $this->form_validation->set_rules('status', 'Status', 'required|trim');
    //     // $this->form_validation->set_rules('email', 'Email', 'required|trim');
    //     // $this->form_validation->set_rules('password', 'Password', 'required|trim');
    //     // $this->form_validation->set_rules('status', 'Status', 'required|trim');


    //     if ($this->form_validation->run() == false) {


    //         redirect('Admin/verifikasi_ctrl', $data);
    //     } else {

    //         $this->pgn_model->ubahdataverifikasi();
    //         redirect('Admin/verifikasi_ctrl');
    //     }
    // }

    public function editaction()
    {
        $id = $this->input->post('id');
        $data = [

            'id' => $this->input->post('id'),
            'status' => $this->input->post('status'),
            // 'email_usr' => $this->input->post('email'),
            // 'image_usr' => "Default.png",
            // 'Password_usr' => $this->input->post('password'),
            // 'role_id' => $this->input->post('status'),
            // 'is_active' => "1",
            // 'date_created' => "Null"

        ];

        if ($this->Pgn_model->ubahdatatarik($data, $id) == TRUE) {

            $this->session->set_flashdata('edit', true);
        } else {

            $this->session->set_flashdata('edit', false);
        }
        // var_dump($data);
        // die;
        redirect(base_url('Admin/tarik_ctrl'));

        // var_dump($id);
        // die;
        // $this->db->where('id_pgn', $id);
        // $this->db->where('pengguna', $data);
        // redirect('Admin_ctrl/Data_member');
    }

    // public function register_pgn2()
    // {
    //     $this->form_validation->set_rules('name', 'Name', 'required|trim');
    //     $this->form_validation->set_rules('email', 'Email', 'required|trim');
    //     $this->form_validation->set_rules('password', 'Password', 'required|trim');
    //     $this->form_validation->set_rules('status', 'Status', 'required|trim');


    //     if ($this->form_validation->run() == false) {

    //         $data['title'] = 'Registrasi';
    //         $this->load->view('Admin/UI/Dashboard', $data);
    //     } else {
    //         $data = [
    //             'nama_usr' =>  htmlspecialchars($this->input->post('name', true)),
    //             'email_usr' => htmlspecialchars($this->input->post('email', true)),
    //             'image_usr' => "default.png",
    //             'Password_usr' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
    //             'role_id' => $this->input->post('status'),
    //             'is_active' => "1",
    //             'date_created' => time()

    //         ];

    //         $this->db->insert('tbl_user', $data);
    //         //          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    //         //   Congratulation! your account has been created. Please Login
    //         // </div>');
    //         redirect('Admin/MemberMin_ctrl');
    //     }
    // }
}
