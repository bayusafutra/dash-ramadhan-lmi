<?php

class Event_model extends CI_Model
{
	public function getEvent($slug)
	{
		return $this->db->where('slug', $slug)->get('eventramadhan')->result_array();
	}

	public function getAllEvent()
	{
        return $this->db->get('eventramadhan')->result_array();
	}

	public function generateRandomSlug() {
		$bytes = random_bytes(8);
		$hex = bin2hex($bytes);
		$slug = substr($hex, 0, 15);
		return $slug;
	}

	public function store(){
		$data = 
		[
			"nama" => $this->input->post('nama', true),
			"disposisi" => $this->input->post('disposisi', true),
		];
		$data["slug"] = $this->generateRandomSlug();

		$this->db->insert('eventramadhan', $data);
	}
}
