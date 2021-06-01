<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TaskSurvey_ctrl extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Task_model');
        $this->load->model('SurveyMember_model');
    }

    public function index()
    {
        $saldo = $this->Task_model->select_bank();
        $data = array('saldo' => $saldo,);
        $data['user'] = $this->db->get_where('tbl_user', ['email_usr' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('Member/UI/Header', $data);
        $this->load->view('Member/Survey/TaskSurvey', $data);
        $this->load->view('Member/UI/Footer');
    }

    public function create_survey()
    {
        $data['user'] = $this->db->get_where('tbl_user', ['email_usr' =>
        $this->session->userdata('email')])->row_array();

        $idusr = $this->input->post("id_usr");
        $jdl = $this->input->post("judul");
        $desk  = $this->input->post("deskripsi");
        $res = $this->input->post("jml_res");
        $nom  = $this->input->post("nominal");
        $img = $this->input->post("bukti");

        $data_input = array(
            'id_usr' => $idusr,
            'judul_task' => $jdl,
            'desk_task' => $desk,
            'jmlrespon_task' => $res,
            'nominal_task' => $nom,
            'img' => $img
        );

        // var_dump($data_input);
        // die;

        $this->Task_model->insert($data_input);
        redirect('/Member/TaskSurvey_ctrl/waiting_survey');
    }

    public function waiting_survey()
    {
        $dataa['user'] = $this->db->get_where('tbl_user', ['email_usr' =>
        $this->session->userdata('email')])->row_array();

        $dataa['task'] = $this->db->get_where('tbl_task', ['id_task' =>
        $this->session->userdata('id_task')])->row_array();

        $srvy = $this->SurveyMember_model->select_task($dataa['user']['id_usr']);
        $data = array('srvy' => $srvy,);

        $this->load->view('Member/UI/Header', $dataa);
        $this->load->view('Member/Survey/Wait_survey', $data);
        $this->load->view('Member/UI/Footer');
    }
}
