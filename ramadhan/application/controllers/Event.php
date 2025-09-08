<?php

class Event extends CI_Controller {
	public $Event_model;
	public $Dashboard_model;
	public $Disposisi_model;
	public $session;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Event_model');
		$this->load->model('Dashboard_model');
		$this->load->model('Disposisi_model');
	}

	public function index($slug)
	{
		$data['event'] = $this->Event_model->getEvent($slug);
		$data['kota'] = $this->Dashboard_model->getAllKota();
		$data['program'] = $this->Disposisi_model->getAllProgram();
		$event = $this->Event_model->getEvent($slug);
		$data["disposisi"] = $this->Disposisi_model->getAllDisposisi($event[0]['id']);
		$this->load->view('layout/header');
		$this->load->view('event/index', $data);
		$this->load->view('layout/footer');
	}

	public function create()
	{
		$this->Event_model->store();
		$this->session->set_flashdata('success', 'Event baru berhasil ditambahkan');
		redirect('dashboard');
	}

	public function edit()
	{
		$this->Event_model->update();
		$this->session->set_flashdata('success', 'Event berhasil diupdate');
		redirect('dashboard');
	}
}
