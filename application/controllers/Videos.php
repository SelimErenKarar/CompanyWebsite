<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Videos extends CI_Controller
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

        $sliders = $this->default_model->get_all("sliders", array("status" => 1), "rank ASC");
        $viewData->sliders = $sliders;

        $services = $this->default_model->get_all("services", array("status" => 1), "rank ASC");
        $viewData->services = $services;

        $teams = $this->default_model->get_all("teams", array("status" => 1), "rank ASC");
        $viewData->teams = $teams;

        $counters = $this->default_model->get_all("counters", array("status" => 1), "rank ASC");
        $viewData->counters = $counters;

        $social = $this->default_model->get_all("social", array("status" => 1), "rank ASC");
        $viewData->social = $social;

        $projects = $this->default_model->get_all("projects", array("status" => 1), "rank ASC");
        $viewData->projects = $projects;

        $pages = $this->default_model->get_all("pages", array("status" => 1), "rank ASC");
        $viewData->pages = $pages;

        $videos = $this->default_model->get_all("videos", array("status" => 1), "rank ASC");
        $viewData->videos = $videos;

        $viewData->url = "videos";
        $this->load->view('videos', $viewData);
    }
}
