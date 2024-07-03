<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Social extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("default_model");
    }

    public function insertsocial()
    {
        $title = $this->input->post("title");
        $icon = $this->input->post("icon");
        $link = $this->input->post("link");

        if (!$title || !$icon || !$link) {
            $alert = array(
                'title' => "Attention!",
                'subtitle' => "Please do not leave space in the form field!",
                'type' => "warning"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("settings"));
        } else {
            $insert = $this->default_model->insert("social", array("title" => $title, "icon" => $icon, "link" => $link, "status" => 1, "created_at" => date("Y-m-d")));
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
            redirect(base_url("settings"));
        }
    }

    public function updatesocial($id)
    {
        $title = $this->input->post("title");
        $icon = $this->input->post("icon");
        $link = $this->input->post("link");

        if (!$title || !$icon || !$link) {
            $alert = array(
                'title' => "Attention!",
                'subtitle' => "Please do not leave space in the form field!",
                'type' => "warning"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("settings"));
        } else {
            $update = $this->default_model->update("social", array("id" => $id), array("title" => $title, "icon" => $icon, "link" => $link, "status" => 1, "created_at" => date("Y-m-d")));
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
            redirect(base_url("settings"));
        }
    }

    public function deletesocial($id)
    {
        $delete = $this->default_model->delete("social", array("id" => $id));
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
        redirect(base_url("settings"));
    }

    public function isactivesetter($id)
    {
        if ($id) {
            $isActive = ($this->input->post("data") == "true") ? 1 : 0;
            $this->default_model->update("social", array("id" => $id), array("status" => $isActive));
        }
    }

    public function ranksetter()
    {
        $data = $this->input->post("data");
        parse_str($data, $rank);
        $value = $rank["rank"];
        foreach ($value as $rank => $id) {
            $this->default_model->update("social", array("id" => $id), array("rank" => $rank));
        }
    }
}