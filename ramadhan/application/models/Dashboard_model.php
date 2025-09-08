<?php

class Dashboard_model extends CI_Model
{
	public function getAllKota()
	{
		return $this->db->where('status', 1)
						->order_by('name', 'ASC')
						->get('tb_mst_regencies')
						->result_array();
	}
}
