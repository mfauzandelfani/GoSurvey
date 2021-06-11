<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dompet_ctrl extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Dompet_model');
    }

    public function index()
    {
        $dataa['user'] = $this->db->get_where('tbl_user', ['email_usr' => $this->session->userdata('email')])->row_array();
        // var_dump($dataa['user']);
        // die();
        // $rwyt = ;
        $data = array(
            'rwyt' => $this->Dompet_model->lihat_riwayat($dataa['user']['id_usr']),
            // 'status' => $this->Dompet_model->riwayat_status($dataa['user']['id_usr']),
            'dompet' =>  $this->Dompet_model->saldo($dataa['user']['id_usr']),
            'trans' => $this->Dompet_model->riwayat_transaksi($dataa['user']['id_usr'])
        );

        // var_dump($dataa['user']);
        // die;
        // $data[] =
        // $this->db->query('select sum(nominal_saldo) as nominal_saldo from tbl_saldo a, tbl_user b where a.id_usr = b.id_usr and a.id_usr ="' . $data['user']['id_usr'] . '"
        // ')->row_array();


        $this->load->view('Member/UI/Header', $dataa);
        $this->load->view('Member/Saldo/Dompet', $data);
        $this->load->view('Member/UI/Footer');
    }

    public function topup()
    {
        $data['user'] = $this->db->get_where('tbl_user', ['email_usr' =>
        $this->session->userdata('email')])->row_array();

        $data['dompet'] = $this->Dompet_model->saldo($data['user']['id_usr']);

        $this->load->view('Member/UI/Header', $data);
        $this->load->view('Member/Saldo/Topup', $data);
        $this->load->view('Member/UI/Footer');
    }

    public function isi_topup()
    {


        $data['user'] = $this->db->get_where('tbl_user', ['email_usr' =>
        $this->session->userdata('email')])->row_array();

        $idusr = $this->input->post("id_usr");
        $nom = $this->input->post("nominal");
        $tran = "Topup";
        $bkt = $this->input->post("bukti");
        $sts = "unverified";

        $data_input = array(
            'id_usr' => $idusr,
            'tgl_topup' => time(),
            'jml_topup' => $nom,
            'bukti' => $bkt,
            'transaksi' => $tran,
            'status' => $sts
        );

        $data_input1 = array(
            'id_usr' => $idusr,
            'transaksi' => $tran,
            'nominal_trans' => $nom,
            'wkt_trans' => time()
        );
        // $this->Dompet_model->isi_topup($data_input);
        // if ($data_input['status'] == $sts) {
        //     $this->load->view('Member/UI/Header', $data);
        //     $this->load->view('Member/Saldo/Tunggu_vrf', $data);
        //     $this->load->view('Member/UI/Footer');
        // } elseif ($data_input['status'] == "verified") {
        $this->Dompet_model->isi_topup($data_input);
        $this->Dompet_model->isi_topup_riwayat($data_input1);
        redirect('/Member/Dompet_ctrl');
        // }
    }

    public function tarik()
    {
        $data['user'] = $this->db->get_where('tbl_user', ['email_usr' =>
        $this->session->userdata('email')])->row_array();

        $data['dompet'] = $this->Dompet_model->saldo($data['user']['id_usr']);

        $this->load->view('Member/UI/Header', $data);
        $this->load->view('Member/Saldo/Tarik', $data);
        $this->load->view('Member/UI/Footer');
    }

    public function tarik_saldo()
    {
        $data['user'] = $this->db->get_where('tbl_user', ['email_usr' =>
        $this->session->userdata('email')])->row_array();

        $data['dompet'] = $this->Dompet_model->saldo($data['user']['id_usr']);

        $idusr = $this->input->post("id_usr");
        $nom = $this->input->post("nominal");
        $bayar = $this->input->post("harga_saldo");
        $rek = $this->input->post("rek");
        $tran = "Tarik";
        $sts = "unverified";

        $data_input = array(
            'id_usr' => $idusr,
            'tgl_tarik' => time(),
            'jml_tarik' => $nom,
            'transaksi' => $tran,
            'pembayaran' => $bayar,
            'no_rek' => $rek,
            'status' => $sts

        );

        $data_input1 = array(
            'id_usr' => $idusr,
            'transaksi' => $tran,
            'nominal_trans' => $nom,
            'wkt_trans' => time()
        );

        $this->Dompet_model->tarik_saldo($data_input);
        $this->Dompet_model->tarik_saldo_riwayat($data_input1);
        redirect('/Member/Dompet_ctrl');
    }
}
