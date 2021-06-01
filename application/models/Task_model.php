<?php
class Task_model extends CI_Model
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
	}

	public function get_by_id($id)
	{
		$this->db->where('id_task', $id);
		return $this->db->get('task')->row();
	}

	//update
	public function update_user($id, $data)
	{
		$this->db->where('id_task', $id);
		$this->db->update('task', $data);
	}

	//delete
	public function delete($data)
	{
		$this->db->where('id_task', $data);
		$this->db->delete('task');
	}

	public function select_task()
	{
		return $this->db->get('task')->result();
	}

	public function select_bank()
	{
		return $this->db->get('tbl_bank')->result();
	}
}
