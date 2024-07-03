<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("default_model");
    }

    public function index()
    {
        $viewData = new stdClass();

        $pages = $this->default_model->get_all("pages", array(), "rank ASC");

        $admin = $this->default_model->get("admin", array("id" => 1));

        $settings = $this->default_model->get("settings", array("id" => 1));
        $viewData->settings = $settings;

        $viewData->admin = $admin;
        $viewData->title = $settings->title;
        $viewData->pages = $pages;
        $viewData->url = "pages";
        $this->load->view('pages', $viewData);
    }


    public function insert()
    {
        $title = $this->input->post("title");
        $icon = $this->input->post("icon");
        $content = $this->input->post("content");

        if (!$title || !$icon || !$content) {
            $alert = array(
                'title' => "Attention!",
                'subtitle' => "Please do not leave space in the form field!",
                'type' => "warning"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("sss"));
        } else {
            $insert = $this->default_model->insert("pages", array("title" => $title, "icon" => $icon, "content" => $content, "status" => 1, "created_at" => date("Y-m-d")));
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
            redirect(base_url("pages"));
        }

    }

    public function update($id)
    {
        $title = $this->input->post("title");
        $icon = $this->input->post("icon");
        $content = $this->input->post("content");

        if (!$title || !$icon || !$content) {
            $alert = array(
                'title' => "Attention!",
                'subtitle' => "Please do not leave space in the form field!",
                'type' => "warning"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("sss"));
        } else {
            $update = $this->default_model->update("pages", array("id" => $id), array("title" => $title, "icon" => $icon, "content" => $content, "status" => 1, "created_at" => date("Y-m-d")));
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
            redirect(base_url("pages"));
        }

    }

    public function delete($id)
    {
        $delete = $this->default_model->delete("pages", array("id" => $id));
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
        redirect(base_url("pages"));
    }

    public function isactivesetter($id)
    {
        if ($id) {
            $isActive = ($this->input->post("data") == "true") ? 1 : 0;
            $this->default_model->update("pages", array("id" => $id), array("status" => $isActive));
        }
    }

    public function ranksetter()
    {
        $data = $this->input->post("data");
        parse_str($data, $rank);
        $value = $rank["rank"];
        foreach ($value as $rank => $id) {
            $this->default_model->update("pages", array("id" => $id), array("rank" => $rank));
        }
    }
}
