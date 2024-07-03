<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
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

        $about_us = $this->default_model->get("about_us", array("id" => 1));
        $viewData->about_us = $about_us;

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



        $viewData->title = $settings->title;
        $viewData->url = "home";
        $this->load->view('home', $viewData);
    }

    public function page($id)
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

        $pag = $this->default_model->get("pages", array("status" => 1, "id" => $id));
        $viewData->pag = $pag;  

        $viewData->title = $settings->title;
        $viewData->url = "albums";
        $this->load->view('page-detail', $viewData);
    }
}