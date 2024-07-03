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

        $about_us = $this->default_model->get_all("about_us", array(), "rank ASC");

        $admin = $this->default_model->get("admin", array("id" => 1));

        $settings = $this->default_model->get("settings", array("id" => 1));
        $viewData->settings = $settings;

        $viewData->admin = $admin;
        $viewData->title = $settings->title;
        $viewData->about_us = $about_us;
        $viewData->url = "about_us";
        $this->load->view('about_us', $viewData);
    }

    public function insert()
    {
        $content = $this->input->post("content");
        $name = $this->input->post("name");

        if (!$content || !$name) {
            $alert = array(
                'title' => "Attention!",
                'subtitle' => "Please do not leave space in the form field!",
                'type' => "warning"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("about_us"));
        } else {
            if (!empty($_FILES["image"]["name"])) {

                $config["upload_path"] = "../uploads/about_us/";
                $config["allowed_types"] = "gift|jpg|jpeg|png|svg";
                $config["file_name"] = uniqid();

                $this->load->library("upload", $config);
                $upload = $this->upload->do_upload("image");

                if ($upload) {
                    $uploaded_filename = $this->upload->data("file_name");

                    $config["image_library"] = "gd2";
                    $config["source_image"] = "../uploads/about_us/" . $uploaded_filename;
                    $config["create_thumb"] = FALSE;
                    $config["maintain_ratio"] = TRUE;
                    $config["quality"] = "100%";
                    $config["witdh"] = 560;
                    $config["height"] = 360;

                    $this->load->library("image_lib", $config);
                    $this->image_lib->resize();

                    $insert = $this->default_model->insert(
                        "about_us",
                        array(
                            "image" => "about_us/" . $uploaded_filename,
                            "content" => $content,
                            "name" => $name,
                            "status" => 1,
                            "rank" => 0,
                            "created_at" => date("Y-m-d")
                        )
                    );

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
                    redirect(base_url("about_us"));

                } else {

                    $alert = array(
                        'title' => "Error!",
                        'subtitle' => "Image upload failed. Try again!",
                        'type' => "error"
                    );

                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("about_us"));

                }


            } else {

                $alert = array(
                    'title' => "Error!",
                    'subtitle' => "Image field cannot be empty. Try again!",
                    'type' => "error"
                );

                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("about_us"));

            }
        }
    }

    public function update($id)
    {
        $content = $this->input->post("content");
        $name = $this->input->post("name");


        if (!$content || !$name) {
            $alert = array(
                'title' => "Attention!",
                'subtitle' => "Please do not leave space in the form field!",
                'type' => "warning"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("about_us"));
        } else {
            if (!empty($_FILES["image"]["name"])) {
                $image_data = $this->default_model->get("about_us", array("id" => $id));

                unlink("uploads/" . $image_data->image);

                $config["upload_path"] = "../uploads/about_us/";
                $config["allowed_types"] = "gift|jpg|jpeg|png|svg";
                $config["file_name"] = uniqid();

                $this->load->library("upload", $config);
                $upload = $this->upload->do_upload("image");

                if ($upload) {
                    $uploaded_filename = $this->upload->data("file_name");

                    $config["image_library"] = "gd2";
                    $config["source_image"] = "../uploads/about_us/" . $uploaded_filename;
                    $config["create_thumb"] = FALSE;
                    $config["maintain_ratio"] = TRUE;
                    $config["quality"] = "100%";
                    $config["witdh"] = 560;
                    $config["height"] = 360;

                    $this->load->library("image_lib", $config);
                    $this->image_lib->resize();

                    $update = $this->default_model->update(
                        "about_us",
                        array("id" => $id),
                        array(
                            "image" => "about_us/" . $uploaded_filename,
                            "content" => $content,
                            "name" => $name
                        )
                    );

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
                    redirect(base_url("about_us"));

                } else {

                    $alert = array(
                        'title' => "Error!",
                        'subtitle' => "The operation failed while loading the slide. Try again!",
                        'type' => "error"
                    );

                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("about_us"));

                }


            } else {
                $update = $this->default_model->update(
                    "about_us",
                    array("id" => $id),

                    array(
                        "content" => $content,
                        "name" => $name,
                    )
                );

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
                redirect(base_url("about_us"));


            }
        }
    }


    public function delete($id)
    {
        $image_data = $this->default_model->get("about_us", array("id" => $id));

        unlink("uploads/" . $image_data->image);

        $delete = $this->default_model->delete("about_us", array("id" => $id));
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
        redirect(base_url("about_us"));
    }

    public function isactivesetter($id)
    {
        if ($id) {
            $isActive = ($this->input->post("data") == "true") ? 1 : 0;
            $this->default_model->update("about_us", array("id" => $id), array("status" => $isActive));
        }
    }

    public function ranksetter()
    {
        $data = $this->input->post("data");
        parse_str($data, $rank);
        $value = $rank["rank"];
        foreach ($value as $rank => $id) {
            $this->default_model->update("about_us", array("id" => $id), array("rank" => $rank));
        }
    }
}