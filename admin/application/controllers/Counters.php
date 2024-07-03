<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Counters extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("default_model");
    }

    public function index()
    {
        $viewData = new stdClass();

        $counters = $this->default_model->get_all("counters", array(), "rank ASC");

        $admin = $this->default_model->get("admin", array("id" => 1));

        $settings = $this->default_model->get("settings", array("id" => 1));
        $viewData->settings = $settings;

        $viewData->admin = $admin;
        $viewData->title = $settings->title;
        $viewData->counters = $counters;
        $viewData->url = "counters";
        $this->load->view('counters', $viewData);
    }


    public function insert()
    {
        $title = $this->input->post("title");
        $icon = $this->input->post("icon");
        $count = $this->input->post("count");

        if (!$title || !$icon || !$count) {
            $alert = array(
                'title' => "Attention!",
                'subtitle' => "Please do not leave space in the form field!",
                'type' => "warning"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("counters"));
        } else {
            $insert = $this->default_model->insert("counters", array("title" => $title, "icon" => $icon, "count" => $count, "status" => 1, "created_at" => date("Y-m-d")));
            if ($insert) {
                $alert = array(
                    'title' => "Congrats!",
                    'subtitle' => "The transaction was successful!",
                    'type' => "success"
                );

            } else {
                $alert = array(
                    'title' => "Error!",
                    'subtitle' => "The process failed. Try again!",
                    'type' => "error"
                );
            }
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("counters"));
        }

    }

    public function update($id)
    {
        $title = $this->input->post("title");
        $icon = $this->input->post("icon");
        $count = $this->input->post("count");


        if (!$title || !$icon || !$count) {
            $alert = array(
                'title' => "Attention!",
                'subtitle' => "Please do not leave space in the form field!",
                'type' => "warning"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("counters"));
        } else {
            $update = $this->default_model->update("counters", array("id" => $id), array("title" => $title, "icon" => $icon, "count" => $count, "status" => 1, "created_at" => date("Y-m-d")));
            if ($update) {
                $alert = array(
                    'title' => "Congrats!",
                    'subtitle' => "The transaction was successful!",
                    'type' => "success"
                );

            } else {
                $alert = array(
                    'title' => "Error!",
                    'subtitle' => "The process failed. Try again!",
                    'type' => "error"
                );
            }
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("counters"));
        }

    }

    public function delete($id)
    {
        $delete = $this->default_model->delete("counters", array("id" => $id));
        if ($delete) {
            $alert = array(
                'title' => "Congrats!",
                'subtitle' => "The deletion was successful!",
                'type' => "success"
            );
        } else {
            $alert = array(
                'title' => "Error!",
                'subtitle' => "The process failed. Try again!",
                'type' => "error"
            );
        }
        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("counters"));
    }

    public function isactivesetter($id)
    {
        if ($id) {
            $isActive = ($this->input->post("data") == "true") ? 1 : 0;
            $this->default_model->update("counters", array("id" => $id), array("status" => $isActive));
        }
    }

    public function ranksetter()
    {
        $data = $this->input->post("data");
        parse_str($data, $rank);
        $value = $rank["rank"];
        foreach ($value as $rank => $id) {
            $this->default_model->update("counters", array("id" => $id), array("rank" => $rank));
        }
    }
}
