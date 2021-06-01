<?php
class Dompet_model extends CI_Model
{
    public $table = 'tbl_saldo';
    public $id = 'id_saldo';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    public function saldo($id_user)
    {
        return $this->db->query('select sum(nominal_saldo) as nominal_saldo from tbl_saldo a, tbl_user b where a.id_usr = b.id_usr and a.id_usr ="' . $id_user . '"
        ')->row_array();
    }

    public function isi_topup($data)
    {
        $this->db->insert('tbl_topup', $data);
    }
    public function isi_topup_riwayat($data)
    {
        $this->db->insert('tbl_riwayat', $data);
    }

    public function tarik_saldo($data)
    {
        $this->db->insert('tbl_tarik', $data);
    }

    public function create_saldo($data)
    {
        $this->db->insert('tbl_saldo', $data);
    }

    public function tarik_saldo_riwayat($data)
    {
        $this->db->insert('tbl_riwayat', $data);
    }

    public function riwayat_transaksi($id_user)
    {
        return $this->db->query('select a.transaksi, b.transaksi from tbl_topup a, tbl_tarik b where a.id_usr = b.id_usr and a.id_usr ="' . $id_user . '"
        ')->row_array();
    }

    public function lihat_riwayat($id_user)
    {
        return $this->db->query('select a.transaksi, a.nominal_trans, a.wkt_trans from tbl_riwayat a, tbl_user b where a.id_usr = b.id_usr and a.id_usr ="' . $id_user . '"
         ')->result();
    }

    // public function lihat_riwayat()
    // {
    //     return $this->db->get('tbl_riwayat')->result();
    // }
}
