<?php
class SurveyAdmin_model extends CI_Model
{
    public $table = 'tbl_soal';
    public $id = 'id_soal';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    public function insert($data)
    {
        $this->db->insert('tbl_soal', $data);
        $this->db->insert('tbl_option_soal', $data);
    }

    public function get_by_id($id)
    {
        $this->db->where('id_soal', $id);
        return $this->db->get('tbl_soal')->row();
    }

    //update
    // public function update_user($id, $data)
    // {
    //     $this->db->where('id_task', $id);
    //     $this->db->update('task', $data);
    // }

    // //delete
    // public function delete($data)
    // {
    //     $this->db->where('id_task', $data);
    //     $this->db->delete('task');
    // }

    // public function select_task()
    // {
    //     return $this->db->get('task')->result();
    // }

    // public function insert_user($data)
    // {
    //     $this->db->insert('task', $data);
    // }
}
