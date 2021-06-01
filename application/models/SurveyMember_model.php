<?php
class SurveyMember_model extends CI_Model
{
    public $table = 'tbl_task';
    public $id = 'id_task';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
        $this->db->insert('tbl_task', $data);
        $this->db->insert('tbl_option_soal', $data);
    }

    public function get_by_id($id)
    {
        $this->db->where('id_soal', $id);
        return $this->db->get('tbl_soal')->row();
    }


    public function select_task($id_user)
    {
        // return $this->db->get('tbl_task')->result();
        return $this->db->query('select a.id_task, a.judul_task, a.desk_task, a.jmlrespon_task, a.nominal_task, a.img from tbl_task a, tbl_user b where a.id_usr = b.id_usr and a.id_usr ="' . $id_user . '" 
        order by id_task desc limit 1')->result();
    }

    public function survey_activ($id_user)
    {
        return $this->db->query('select b.judul_task, b.desk_task, b.nominal_task, a.nama_usr from tbl_user a, tbl_task b where a.id_usr = b.id_usr and a.id_usr !="' . $id_user . '" 
        ')->result();
    }

    public function survey_byid($id_user)
    {
        return $this->db->query('select b.judul_task, b.desk_task, b.nominal_task, a.nama_usr from tbl_user a, tbl_task b where a.id_usr = b.id_usr and a.id_usr ="' . $id_user . '" 
        ')->result();
    }

    public function jml_task($id_user)
    {
        return $this->db->query('select count(a.id_task) as id_task from tbl_task a, tbl_user b where a.id_usr = b.id_usr and a.id_usr != "' . $id_user . '"')->row_array();
    }

    public function buat_soal($data)
    {
        $this->db->insert('tbl_soal', $data);
        $insert_id = $this->db->insert_id();

        return  $insert_id;
    }



    public function buat_soal_option($data)
    {
        $this->db->insert('tbl_option_soal', $data);
    }
}
