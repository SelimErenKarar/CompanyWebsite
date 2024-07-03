<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sliders extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("default_model");
    }

    public function index()
    {
        $viewData = new stdClass();

        $sliders = $this->default_model->get_all("sliders", array(), "rank ASC");

        $admin = $this->default_model->get("admin", array("id" => 1));

        $settings = $this->default_model->get("settings", array("id" => 1));
        $viewData->settings = $settings;

        $viewData->admin = $admin;
        $viewData->title = $settings->title;
        $viewData->sliders = $sliders;
        $viewData->url = "sliders";
        $this->load->view('sliders', $viewData);
    }

    public function insert()
    {
        $content = $this->input->post("content");
        $btn_left = $this->input->post("btn_left");
        $btn_right = $this->input->post("btn_right");
        $btn_left_link = $this->input->post("btn_left_link");
        $btn_right_link = $this->input->post("btn_right_link");

        if (!$content || !$btn_left || !$btn_right || !$btn_left_link || !$btn_right_link) {
            $alert = array(
                'title' => "Attention!",
                'subtitle' => "Please do not leave space in the form field!",
                'type' => "warning"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("sliders"));
        } else {
            if (!empty($_FILES["image"]["name"])) {

                $config["upload_path"] = "../uploads/sliders/";
                $config["allowed_types"] = "gift|jpg|jpeg|png|svg";
                $config["file_name"] = uniqid();

                $this->load->library("upload", $config);
                $upload = $this->upload->do_upload("image");

                if ($upload) {
                    $uploaded_filename = $this->upload->data("file_name");

                    $config["image_library"] = "gd2";
                    $config["source_image"] = "../uploads/sliders/" . $uploaded_filename;
                    $config["create_thumb"] = FALSE;
                    $config["maintain_ratio"] = TRUE;
                    $config["quality"] = "100%";
                    $config["witdh"] = 1100;
                    $config["height"] = 500;

                    $this->load->library("image_lib", $config);
                    $this->image_lib->resize();

                    $insert = $this->default_model->insert(
                        "sliders",
                        array(
                            "image" => "sliders/" . $uploaded_filename,
                            "content" => $content,
                            "btn_left" => $btn_left,
                            "btn_right" => $btn_right,
                            "btn_left_link" => $btn_left_link,
                            "btn_right_link" => $btn_right_link,
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
                    redirect(base_url("sliders"));

                } else {

                    $alert = array(
                        'title' => "Error!",
                        'subtitle' => "The operation failed while loading the slide. Try again!",
                        'type' => "error"
                    );

                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("sliders"));

                }
            } else {
                $alert = array(
                    'title' => "Error!",
                    'subtitle' => "Image field cannot be empty. Try again!",
                    'type' => "error"
                );

                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("sliders"));
            }
        }
    }

    public function update($id)
    {
        $content = $this->input->post("content");
        $btn_left = $this->input->post("btn_left");
        $btn_right = $this->input->post("btn_right");
        $btn_left_link = $this->input->post("btn_left_link");
        $btn_right_link = $this->input->post("btn_right_link");

        if (!$content || !$btn_left || !$btn_right || !$btn_left_link || !$btn_right_link) {
            $alert = array(
                'title' => "Attention!",
                'subtitle' => "Please do not leave space in the form field!",
                'type' => "warning"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("sliders"));
        } else {
            if (!empty($_FILES["image"]["name"])) {
                $image_data = $this->default_model->get("sliders", array("id" => $id));

                unlink("uploads/" . $image_data->image);

                $config["upload_path"] = "../uploads/sliders/";
                $config["allowed_types"] = "gift|jpg|jpeg|png|svg";
                $config["file_name"] = uniqid();

                $this->load->library("upload", $config);
                $upload = $this->upload->do_upload("image");

                if ($upload) {
                    $uploaded_filename = $this->upload->data("file_name");

                    $config["image_library"] = "gd2";
                    $config["source_image"] = "../uploads/sliders/" . $uploaded_filename;
                    $config["create_thumb"] = FALSE;
                    $config["maintain_ratio"] = TRUE;
                    $config["quality"] = "100%";
                    $config["witdh"] = 1100;
                    $config["height"] = 500;

                    $this->load->library("image_lib", $config);
                    $this->image_lib->resize();

                    $update = $this->default_model->update(
                        "sliders",
                        array("id" => $id),
                        array(
                            "image" => "sliders/" . $uploaded_filename,
                            "content" => $content,
                            "btn_left" => $btn_left,
                            "btn_right" => $btn_right,
                            "btn_left_link" => $btn_left_link,
                            "btn_right_link" => $btn_right_link
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
                    redirect(base_url("sliders"));

                } else {

                    $alert = array(
                        'title' => "Error!",
                        'subtitle' => "The operation failed while loading the slide. Try again!",
                        'type' => "error"
                    );

                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("sliders"));

                }


            } else {
                $update = $this->default_model->update(
                    "sliders",
                    array("id" => $id),

                    array(
                        "content" => $content,
                        "btn_left" => $btn_left,
                        "btn_right" => $btn_right,
                        "btn_left_link" => $btn_left_link,
                        "btn_right_link" => $btn_right_link
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
                redirect(base_url("sliders"));
            }
        }
    }


    public function delete($id)
    {
        $image_data = $this->default_model->get("sliders", array("id" => $id));

        unlink("uploads/" . $image_data->image);

        $delete = $this->default_model->delete("sliders", array("id" => $id));
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
        redirect(base_url("sliders"));
    }

    public function isactivesetter($id)
    {
        if ($id) {
            $isActive = ($this->input->post("data") == "true") ? 1 : 0;
            $this->default_model->update("sliders", array("id" => $id), array("status" => $isActive));
        }
    }

    public function ranksetter()
    {
        $data = $this->input->post("data");
        parse_str($data, $rank);
        $value = $rank["rank"];
        foreach ($value as $rank => $id) {
            $this->default_model->update("sliders", array("id" => $id), array("rank" => $rank));
        }
    }
}
