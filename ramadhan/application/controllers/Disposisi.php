<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disposisi extends CI_Controller {
	public $Disposisi_model;
	public $session;
	public $input;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Disposisi_model');
	}

	public function create($slug)
	{
		$this->Disposisi_model->store($slug);
		$this->session->set_flashdata('success', 'Event baru berhasil ditambahkan');
		redirect('event/index/'.$slug);
	}

	public function edit($slug)
	{
		$this->Disposisi_model->update($slug);
		$this->session->set_flashdata('success', 'Event baru berhasil ditambahkan');
		redirect('event/index/'.$slug);
	}

	public function update_checkkeu() {
		if ($this->input->is_ajax_request()) {
			$id = $this->input->post('id');
			$isChecked = $this->input->post('isChecked');
			$this->Disposisi_model->update_checkkeu($id, $isChecked);
		} else {
			show_error('Forbidden', 403);
		}
	}	

	public function createlpj($slug)
	{
		$this->Disposisi_model->storelpj();
		$this->session->set_flashdata('success', 'Laporan Pertanggung Jawaban berhasil ditambahkan');
		redirect('event/index/'.$slug);
	}

	public function createps($slug)
	{
		$this->Disposisi_model->storeps();
		$this->session->set_flashdata('success', 'Pengembalian Saldo berhasil dilakukan');
		redirect('event/index/'.$slug);
	}

	public function delete($slug)
	{
		$this->Disposisi_model->destroy();
		$this->session->set_flashdata('success', 'Disposisi berhasil dihapus');
		redirect('event/index/'.$slug);
	}
}
