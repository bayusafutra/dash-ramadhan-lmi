<?php

class Dashboard extends CI_Controller {
	public $Dashboard_model;
	public $Event_model;
	public $session;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model');
		$this->load->model('Event_model');
	}

	public function index()
	{
		$data['event'] = $this->Event_model->getAllEvent();
		$this->load->view('layout/header');
		$this->load->view('dashboard/index', $data);
		$this->load->view('layout/footer');
	}

	public function tambah()
	{
		$this->load->view('layout/header');
		$this->load->view('dashboard/tambah');
		$this->load->view('layout/footer');
	}
}
