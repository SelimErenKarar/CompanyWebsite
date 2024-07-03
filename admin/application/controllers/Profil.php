<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("default_model");
    }

    public function index()
    {
        $viewData = new stdClass();

        $admin = $this->default_model->get("admin", array("id" => 1));

        $admin = $this->default_model->get("admin", array("id" => 1));

        $settings = $this->default_model->get("settings", array("id" => 1));
        $viewData->settings = $settings;

        $viewData->admin = $admin;
        $viewData->admin = $admin;
        $viewData->title = $settings->title;
        $viewData->admin = $admin;
        $viewData->url = "";
        $this->load->view('profil', $viewData);
    }


    public function updateprofilimage($id)
    {
        if (!empty($_FILES["image"]["name"])) {
            $image_data = $this->default_model->get("admin", array("id" => $id));

            unlink("uploads/" . $image_data->image);

            $config["upload_path"] = "../uploads/admin/";
            $config["allowed_types"] = "gift|jpg|jpeg|png|svg";
            $config["file_name"] = uniqid();

            $this->load->library("upload", $config);
            $upload = $this->upload->do_upload("image");

            if ($upload) {
                $uploaded_filename = $this->upload->data("file_name");

                $config["image_library"] = "gd2";
                $config["source_image"] = "../uploads/admin/" . $uploaded_filename;
                $config["create_thumb"] = FALSE;
                $config["maintain_ratio"] = TRUE;
                $config["quality"] = "100%";
                $config["witdh"] = 128;
                $config["height"] = 128;

                $this->load->library("image_lib", $config);
                $this->image_lib->resize();

                $update = $this->default_model->update("admin", array("id" => $id), array("image" => "admin/" . $uploaded_filename));

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
                redirect(base_url("profil"));

            } else {

                $alert = array(
                    'title' => "Error!",
                    'subtitle' => "Profil Imagei yüklenirken işlem başarısız oldu.Tekrar deneyin!",
                    'type' => "error"
                );

                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("profil"));

            }
        } else {
            $alert = array(
                'title' => "Error!",
                'subtitle' => "Profil Image field cannot be empty. Try again!",
                'type' => "error"
            );

            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("profil"));
        }
    }

    public function updateprofilinfo($id)
    {
        $name = $this->input->post("name");
        $mail = $this->input->post("mail");

        if (!$name || !$mail) {
            $alert = array(
                'title' => "Attention!",
                'subtitle' => "Please do not leave space in the form field!",
                'type' => "warning"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("profil"));
        } else {
            $update = $this->default_model->update("admin", array("id" => $id), array("name" => $name, "mail" => $mail));
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
            redirect(base_url("profil"));
        }
    }

    public function updateprofilpassword($id)
    {
        $password1 = $this->input->post("password1");
        $password2 = $this->input->post("password2");

        $this->load->library("form_validation");

        $this->form_validation->set_rules("password1", "Password", "required|trim|min_lenght[5]|max_length[12]");
        $this->form_validation->set_rules("password2", "Password (Tekrar)", "required|trim|matches[password2]|min_lenght[5]|max_length[12]");

        $this->form_validation->set_message(

            array(
                "required" => "<b>{field}</b> field must be filled.",
                "matches" => "Passwords do not match each other!",
                "min_lenght" => "<b>{field}</b> <b>{param}</b> cannot be smaller than char!",
                "max_lenght" => "<b>{field}</b> <b>{param}</b> cannot be bigger than char!"

            )
        );

        $validate = $this->form_validation->run();

        if ($validate) {

            $update = $this->default_model->update("admin", array("id" => $id), array("password" => md5($password1)));
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
            redirect(base_url("profil"));
        } else {

            $viewData = new stdClass();

            $admin = $this->default_model->get("admin", array("id" => 1));



            $settings = $this->default_model->get("settings", array("id" => 1));
            $viewData->settings = $settings;

            $viewData->admin = $admin;
            $viewData->title = $settings->title;

            $viewData->admin = $admin;
            $viewData->admin = $admin;
            $viewData->url = "";
            $viewData->form_error = true;
            $this->load->view('profil', $viewData);
        }
    }
}
