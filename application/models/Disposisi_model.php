<?php

class Disposisi_model extends CI_Model
{
	public function getAllDisposisi($id)
	{
		$this->db->select('disposisi.id as disposisi_id, disposisi.*, eventramadhan.*, tb_mst_regencies.*, disposisi.debet as disposisi_debet, disposisi.kredit as disposisi_kredit');
		$this->db->from('disposisi');
		$this->db->join('eventramadhan', 'eventramadhan.id = disposisi.event_id');
		$this->db->join('tb_mst_regencies', 'tb_mst_regencies.id = disposisi.kantor_id');
		$this->db->where('event_id', $id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function store($slug)
	{
		$event = $this->db->where('slug', $slug)->get('eventramadhan')->result_array();

		$config['upload_path']          = './public/bukti-transaksi';
		$config['allowed_types']        = 'jpg|jpeg|png';
		$config['max_size']             = 10240;
		$this->load->library('upload', $config);
		$this->upload->do_upload('bukti');
		$upload_data = $this->upload->data();

		$data = [
			"tgltransaksi" => $this->input->post('tgltransaksi', true),
			"periode" => $this->input->post('periode', true),
			"jenistransaksi" => $this->input->post('jenistransaksi', true),
			"jenistransaksi" => $this->input->post('jenispenyaluran', true),
			"nodispkp" => $this->input->post('nodispkp', true),
			"nodisppwk" => $this->input->post('nodisppwk', true),
			"uraian" => $this->input->post('uraian', true),
			"pic" => $this->input->post('pic', true),
			"kantor_id" => $this->input->post('kantor_id', true),
			"bukti" => $upload_data['file_name'],
		];

		if ($this->input->post('debet')  != "") {
			$debet1 = str_replace('.', '', $this->input->post('debet'));
			$debet2 = str_replace('Rp', '', $debet1);
			$debet3 = str_replace(',00', '', $debet2);
			$data["debet"] = $debet3;
			$update["debet"] = $event[0]["debet"] + $debet3;
			$update["saldo"] = $event[0]["saldo"] + $debet3;
		} else {
			$data["debet"] = 0;
			$update["debet"] = $event[0]["debet"] + 0;
			$update["saldo"] = $event[0]["saldo"] + 0;
		}

		if ($this->input->post('kredit')  != "") {
			$kredit1 = str_replace('.', '', $this->input->post('kredit'));
			$kredit2 = str_replace('Rp', '', $kredit1);
			$kredit3 = str_replace(',00', '', $kredit2);
			$data["kredit"] = $kredit3;
			$update["kredit"] = $event[0]["kredit"] + $kredit3;
			$update["saldo"] = $event[0]["saldo"] - $kredit3;
		} else {
			$data["kredit"] = 0;
			$update["kredit"] = $event[0]["kredit"] + 0;
		}
		$data["event_id"] = $this->input->post('eventid');
		$this->db->insert('disposisi', $data);
		$this->db->where('id', $event[0]["id"])->update('eventramadhan', $update);
	}

	public function update_checkkeu($id, $isChecked)
	{
		$data = array('checkkeu' => $isChecked ? 1 : 0);
		$this->db->where('id', $id);
		$this->db->update('disposisi', $data);
	}
}
