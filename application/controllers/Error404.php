<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Error404 extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("default_model");
	}

	public function index()
	{
		$this->load->view('new404');
	}

}