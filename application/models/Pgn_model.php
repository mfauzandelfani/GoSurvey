<?php
class Pgn_model extends CI_Model
{
	public $table = 'pengguna';
	public $id = 'id_user';
	public $order = 'DESC';

	function __construct()
	{
		parent::__construct();
	}

	public function login($username, $password)
	{
		return $this->db->query("select * from pengguna where email_pgn='" . $username . "'and pass_pgn='" . $password . "' ")->row();
	}

	public function insert($data)
	{
		$this->db->insert('pengguna', $data);
	}

	public function get_by_id($id)
	{
		$this->db->where('id_pgn', $id);
		return $this->db->get('pengguna')->row();
	}
	public function get_by_id2($id)
	{
		$this->db->where('no_bank', $id);
		return $this->db->get('tbl_bank')->row();
	}
	public function select_srvy()
	{
		return $this->db->get('tbl_task')->result();
	}

	//update
	public function update_user($id, $data)
	{
		$this->db->where('id_pgn', $id);
		$this->db->update('pengguna', $data);
	}

	//delete
	public function delete($data)
	{
		$this->db->where('id_usr', $data);
		$this->db->delete('tbl_user');
	}
	public function delete_bank($data)
	{
		$this->db->where('no_bank', $data);
		$this->db->delete('tbl_bank');
	}

	public function select_user()
	{
		return $this->db->get('tbl_user')->result();
	}
	public function select_bank()
	{
		return $this->db->get('tbl_bank')->result();
	}

	public function insert_user($data)
	{
		$this->db->insert('pengguna', $data);
	}
	public function ubahdatapgn($data, $id)
	{

		$this->db->update('pengguna', $data, array('id_pgn' => $id));
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}
	public function ubahdatabank($data, $id)
	{

		$this->db->update('tbl_bank', $data, array('no_bank' => $id));
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}

	public function ubahdataverifikasi($data, $id)
	{

		$this->db->update('tbl_task', $data, array('id_task' => $id));
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}

	public function ubahdatatopup($data, $id)
	{

		$this->db->update('tbl_topup', $data, array('id' => $id));
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}
	public function ubahdatatarik($data, $id)
	{

		$this->db->update('tbl_tarik', $data, array('id' => $id));
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
	}

	public function registrasi($data)
	{
		$this->db->insert('tbl_user', $data);
		$insert_id = $this->db->insert_id();

		return  $insert_id;
	}

	public function insert_saldo($data)
	{
		$this->db->insert('tbl_saldo', $data);
	}
}
