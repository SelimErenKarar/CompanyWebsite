<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model("default_model");

        $admins = $this->session->userdata("admins");
        if (!$admins) {
            redirect(base_url("login"));
        }
    }

    public function index()
    {
        $viewData = new stdClass();

        $admin = $this->default_model->get("admin", array("id" => 1));
        $settings = $this->default_model->get("settings", array("id" => 1));

        $viewData->admin = $admin;
        $viewData->settings = $settings;
        $viewData->title = $settings->title;
        $viewData->url = "home";
        $this->load->view('home', $viewData);
    }
}