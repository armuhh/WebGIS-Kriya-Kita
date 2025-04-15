<?php
class Chart_model extends CI_Model
{
	public function __construct()
	{
		$this->load->database();
	}
	public function charts_database()
	{
		$this->db->select('kecamatan, COUNT(kecamatan) as total');
		$this->db->from('data_kriya'); // Ganti dengan nama tabel Anda
		$this->db->group_by('kecamatan');
		return $this->db->get()->result();
	}
}
