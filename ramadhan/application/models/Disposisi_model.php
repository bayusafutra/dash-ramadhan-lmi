<?php

class Disposisi_model extends CI_Model
{
	public function getAllProgram()
	{
		return $this->db->get('tb_akun_ramadhan')->result_array();
	}

	public function getAllDisposisi($id)
	{
		$this->db->select('disposisi.id as disposisi_id, disposisi.*, eventramadhan.*, tb_mst_regencies.*, disposisi.debet as disposisi_debet, disposisi.kredit as disposisi_kredit, tb_akun_ramadhan.id as akun_ramadhan_id, tb_akun_ramadhan.nama_program as nama_program');
		$this->db->from('disposisi');
		$this->db->join('eventramadhan', 'eventramadhan.id = disposisi.event_id');
		$this->db->join('tb_mst_regencies', 'tb_mst_regencies.id = disposisi.kantor_id');
		$this->db->join('tb_akun_ramadhan', 'tb_akun_ramadhan.akun_program_ramadhan = disposisi.jenispenyaluran');
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
			"jenispenyaluran" => $this->input->post('jenispenyaluran', true),
			"nodispkp" => $this->input->post('nodispkp', true),
			"nodisppwk" => $this->input->post('nodisppwk', true),
			"uraian" => $this->input->post('uraian', true),
			"pic" => $this->input->post('pic', true),
			"kantor_id" => $this->input->post('kantor_id', true),
			"bukti" => $upload_data['file_name'],
		];
		$slug = $this->generateRandomSlug();
		$data["slug"] = $slug;

		$debet1 = str_replace('.', '', $this->input->post('debet'));
		$debet2 = str_replace('Rp', '', $debet1);
		$debet3 = str_replace(',00', '', $debet2);
		$data["debet"] = $debet3;
		$update["debet"] = $event[0]["debet"] + $debet3;
		$update["saldo"] = $event[0]["saldo"] + $debet3;

		$data["event_id"] = $this->input->post('eventid');
		$this->db->insert('disposisi', $data);
		$this->db->where('id', $event[0]["id"])->update('eventramadhan', $update);
	}

	public function update($slug)
	{
		$event = $this->db->where('slug', $slug)->get('eventramadhan')->result_array();
		if ($_FILES['bukti']['name'] != "") {
			$config['upload_path']          = './public/bukti-transaksi';
			$config['allowed_types']        = 'jpg|jpeg|png';
			$config['max_size']             = 10240;
			$this->load->library('upload', $config);
			$this->upload->do_upload('bukti');
			$upload_data = $this->upload->data();
		}

		$data = [
			"tgltransaksi" => $this->input->post('tgltransaksi', true),
			"periode" => $this->input->post('periode', true),
			"jenistransaksi" => $this->input->post('jenistransaksi', true),
			"jenispenyaluran" => $this->input->post('jenispenyaluran', true),
			"nodispkp" => $this->input->post('nodispkp', true),
			"nodisppwk" => $this->input->post('nodisppwk', true),
			"uraian" => $this->input->post('uraian', true),
			"pic" => $this->input->post('pic', true),
			"kantor_id" => $this->input->post('kantor_id', true),
			"pic" => $this->input->post('pic', true)
		];
		if ($_FILES['bukti']['name'] != "") {
			$data["bukti"] = $upload_data['file_name'];
		}
		$debet1 = str_replace('.', '', $this->input->post('debet'));
		$debet2 = str_replace('Rp', '', $debet1);
		$debet3 = str_replace(',00', '', $debet2);
		$data["debet"] = $debet3;
		$update["debet"] = ($event[0]["debet"] + $debet3) - $this->input->post('debetnow');
		$update["saldo"] = ($event[0]["saldo"] + $debet3) - $this->input->post('debetnow');

		$data["event_id"] = $this->input->post('eventid');
		$this->db->where('id', $this->input->post('disposisi_id'));
		$this->db->update('disposisi', $data);
		$this->db->where('id', $event[0]["id"])->update('eventramadhan', $update);
	}

	public function update_checkkeu($id, $isChecked)
	{
		$data = array('checkkeu' => $isChecked ? 1 : 0);
		$this->db->where('id', $id);
		$this->db->update('disposisi', $data);
	}

	public function generateRandomSlug()
	{
		$bytes = random_bytes(8);
		$hex = bin2hex($bytes);
		$slug = substr($hex, 0, 15);
		return $slug;
	}

	public function storelpj()
	{
		$config['upload_path']          = './public/bukti-lpj';
		$config['allowed_types']        = 'jpg|jpeg|png';
		$config['max_size']             = 10240;
		$this->load->library('upload', $config);
		$this->upload->do_upload('bukti');
		$upload_data = $this->upload->data();

		$data = [
			"disposisi_id" => $this->input->post('disposisi_id', true),
			"tgltransaksi" => $this->input->post('tgltransaksi', true),
			"uraian" => $this->input->post('uraian', true),
			"pic" => $this->input->post('pic', true),
			"paket" => $this->input->post('paket', true),
			"penerima" => $this->input->post('penerima', true),
			"bukti" => $upload_data['file_name'],
		];
		$slug = $this->generateRandomSlug();
		$data["slug"] = $slug;

		$kredit1 = str_replace('.', '', $this->input->post('kredit'));
		$kredit2 = str_replace('Rp', '', $kredit1);
		$kredit3 = str_replace(',00', '', $kredit2);
		$data["kredit"] = $kredit3;

		$this->db->insert('lpj', $data);

		$disposisi = $this->db->where('id', $this->input->post('disposisi_id'))->get('disposisi')->result_array();
		$update["kredit"] = $disposisi[0]["kredit"] + $kredit3;
		$this->db->where('id', $disposisi[0]["id"])->update('disposisi', $update);

		$event = $this->db->where('id', $this->input->post('eventid'))->get('eventramadhan')->result_array();
		$edit["kredit"] = $event[0]["kredit"] + $kredit3;
		$edit["saldo"] = $event[0]["saldo"] - $kredit3;
		$this->db->where('id', $event[0]["id"])->update('eventramadhan', $edit);
	}

	public function storeps()
	{
		$config['upload_path']          = './public/bukti-pengembaliansaldo';
		$config['allowed_types']        = 'jpg|jpeg|png';
		$config['max_size']             = 10240;
		$this->load->library('upload', $config);
		$this->upload->do_upload('bukti');
		$upload_data = $this->upload->data();

		$data = [
			"disposisi_id" => $this->input->post('disposisi_id', true),
			"tgltransaksi" => $this->input->post('tgltransaksi', true),
			"uraian" => $this->input->post('uraian', true),
			"pic" => $this->input->post('pic', true),
			"bukti" => $upload_data['file_name'],
		];
		$slug = $this->generateRandomSlug();
		$data["slug"] = $slug;

		$kredit1 = str_replace('.', '', $this->input->post('kredit'));
		$kredit2 = str_replace('Rp', '', $kredit1);
		$kredit3 = str_replace(',00', '', $kredit2);
		$data["kredit"] = $kredit3;

		$this->db->insert('pengembaliansaldo', $data);

		$disposisi = $this->db->where('id', $this->input->post('disposisi_id'))->get('disposisi')->result_array();
		$update["kredit"] = $disposisi[0]["kredit"] + $kredit3;
		$this->db->where('id', $disposisi[0]["id"])->update('disposisi', $update);

		$event = $this->db->where('id', $this->input->post('eventid'))->get('eventramadhan')->result_array();
		$edit["kredit"] = $event[0]["kredit"] + $kredit3;
		$edit["saldo"] = $event[0]["saldo"] - $kredit3;
		$this->db->where('id', $event[0]["id"])->update('eventramadhan', $edit);
	}

	public function destroy()
	{
		$disposisi = $this->input->post('disposisiId');
		$debetdisposisi = $this->input->post('debetdisposisi');
		$kreditdisposisi = $this->input->post('kreditdisposisi');
		$event = $this->input->post('eventid');
		$debetevent = $this->input->post('debetevent');
		$kreditevent = $this->input->post('kreditevent');
		$saldoevent = $this->input->post('saldoevent');
		$lpj = $this->db->where('disposisi_id', $this->input->post('disposisiId'))->get('lpj')->result_array();
		$pengembaliansaldo = $this->db->where('disposisi_id', $this->input->post('disposisiId'))->get('pengembaliansaldo')->result_array();
		
		if(isset($lpj)){
			foreach($lpj as $l){
				$this->db->delete('lpj', array('id' => $l["id"]));
			}
		}

		if(isset($pengembaliansaldo)){
			foreach($pengembaliansaldo as $ps){
				$this->db->delete('pengembaliansaldo', array('id' => $ps["id"]));
			}
		}
		$this->db->delete('disposisi', array('id' => $disposisi));

		$update["debet"] = $debetevent - $debetdisposisi;
		$update["kredit"] = $kreditevent - $kreditdisposisi;
		$update["saldo"] = $saldoevent - $debetdisposisi + $kreditdisposisi;
		$this->db->where('id', $event)->update('eventramadhan', $update);
	}
}
