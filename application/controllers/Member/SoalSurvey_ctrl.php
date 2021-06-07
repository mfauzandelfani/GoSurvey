<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SoalSurvey_ctrl extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('SurveyMember_model');
    }

    public function index($id)
    {
        $data['user'] = $this->db->get_where('tbl_user', ['email_usr' =>
        $this->session->userdata('email')])->row_array();

        $dataa['task'] = $this->db->get_where('tbl_task', ['id_task' =>
        $this->session->userdata('id_task')])->row_array();
        $data['id_task'] = $id;


        $this->load->view('Member/UI/Header', $data);
        $this->load->view('Member/Survey/soal_survey', $dataa);
        $this->load->view('Member/UI/Footer');
    }

    public function buatsoal()
    {
        // echo $id;
        // die;
        // $data['user'] = $this->db->get_where('tbl_user', ['email_usr' =>
        // $this->session->userdata('email')])->row_array();

        // $dataa['task'] = $this->db->get_where('tbl_task', ['id_task' =>
        // $this->session->userdata('id_task')])->row_array();

        // // $this->load->view('Member/UI/Header', $data);
        // // $this->load->view('Member/Survey/soal_survey', $dataa);
        // $this->load->view('Member/UI/Footer');

        // var_dump($this->input->post('idsoal'));
        // die();
        $id = $this->input->post('idtask');
        $idso = $this->input->post('idsoal');

        foreach ($_POST['Soal'] as $v => $soal) {

            $type = $_POST['tipe_soal'][$v];
            $id_task = $this->input->post('idtask');
            $data_input = array(
                'id_task' => $id,
                'soal' => $soal,
                'type_soal' => $type
            );

            $idsoal = $this->SurveyMember_model->buat_soal($data_input);

            if ($type == "Radio" || $type == "Checkbox") {
                $pil = $_POST['pil_option-' . $v];
                foreach ($pil as $item) {
                    $data_input1 = array(
                        'id_task' => $id_task,
                        'id_soal' => $idsoal,
                        'pilihan_opt' => $item
                    );

                    $this->SurveyMember_model->buat_soal_option($data_input1);
                }
            }
        }
        redirect('/Member/TaskSurvey_ctrl/waiting_survey');
    }

    public function tampil_soal($id)
    {
        $dataa['user'] = $this->db->get_where('tbl_user', ['email_usr' =>
        $this->session->userdata('email')])->row_array();

        $data['id_task'] = $id;

        $soal = $this->SurveyMember_model->tampil_soal($id);
        $soal_opt = $this->SurveyMember_model->soal_option($id);
        $data = array(
            'soal' => $soal,
            'soal_opt' => $soal_opt,
        );

        // var_dump($data);
        // die;


        $this->load->view('Member/UI/Header', $dataa);
        $this->load->view('Member/Survey/View_SoalSurvey', $data);
        $this->load->view('Member/UI/Footer');
    }

    public function jawabsoal()
    {
        $id_taskk = $this->input->post('idtask');
        $id_user = $this->input->post('iduser');

        foreach ($_POST['jawaban'] as $a => $jwbn) {
            // $jwb = $_POST['jawaban-' . $a];
            $jawab[] = array($jwbn);
            // foreach ($jwb as $item) {
            $data_input = array(
                'id_usr' => $id_user,
                'id_task' => $id_taskk,
                'jawaban' => $jawab
            );

            var_dump($data_input);
            die;

            $this->SurveyMember_model->jawab_soal($data_input);
            // }
        }
        redirect('/Member/Member_ctrl');
    }
}
