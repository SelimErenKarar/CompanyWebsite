<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sliders extends CI_Controller {

    public function __construct()
    {
        parent:: __construct();
        $this->load->model("default_model");
    }

    public function index()
    {
        $viewData  = new stdClass();

        $sliders    = $this->default_model->get_all("sliders",array(),"rank ASC");

        $admin= $this->default_model->get("admin",array("id"=>1));

        $settings= $this->default_model->get("settings",array("id"=>1));
        $viewData->settings = $settings;

        $viewData->admin     = $admin;
        $viewData->title = $settings->title;
        $viewData->sliders   = $sliders;
        $viewData->url = "sliders";
        $this->load->view('sliders',$viewData);
    }
}
