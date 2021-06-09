<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ActiveSurvey_ctrl extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('SurveyMember_model');
    }

    public function index()
    {
        $dataa['user'] = $this->db->get_where('tbl_user', ['email_usr' =>
        $this->session->userdata('email')])->row_array();

        $srvy = $this->SurveyMember_model->survey_activ($dataa['user']['id_usr']);
        $jwb = $this->SurveyMember_model->tampil_jawaban();
        $data = array(
            'srvy' => $srvy,
            'jwb' => $jwb,
        );
        // var_dump($data['srvy']);
        // die;

        $this->load->view('Member/UI/Header', $dataa);
        $this->load->view('Member/Survey/Activesurvey', $data);
        $this->load->view('Member/UI/Footer');
    }
}
