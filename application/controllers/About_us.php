<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About_us extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("default_model");
    }

    public function index()
    {
        $viewData = new stdClass();

        $settings = $this->default_model->get("settings", array("id" => 1));
        $viewData->settings = $settings;

        $social = $this->default_model->get_all("social", array("status" => 1), "rank ASC");
        $viewData->social = $social;

        $about_us = $this->default_model->get("about_us", array("id" => 1), "rank ASC");
        $viewData->about_us = $about_us;

        $services = $this->default_model->get_all("services", array("status" => 1), "rank ASC");
        $viewData->services = $services;

        $projects = $this->default_model->get_all("projects", array("status" => 1), "rank ASC");
        $viewData->projects = $projects;

        $pages = $this->default_model->get_all("pages", array("status" => 1), "rank ASC");
        $viewData->pages = $pages;

        $viewData->url = "about_us";
        $this->load->view('about_us', $viewData);
    }
}