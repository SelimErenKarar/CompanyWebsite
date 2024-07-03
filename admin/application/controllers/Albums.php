<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Albums extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("default_model");
    }

    public function index()
    {
        $viewData = new stdClass();

        $albums = $this->default_model->get_all("albums", array(), "rank ASC");

        $admin = $this->default_model->get("admin", array("id" => 1));

        $settings = $this->default_model->get("settings", array("id" => 1));
        $viewData->settings = $settings;

        $viewData->admin = $admin;
        $viewData->title = $settings->title;
        $viewData->albums = $albums;
        $viewData->url = "albums";
        $this->load->view('albums', $viewData);
    }

    public function insert()
    {
        $title = $this->input->post("title");
        if (!$title) {
            $alert = array(
                'title' => "Attention!",
                'subtitle' => "Please do not leave space in the form field!",
                'type' => "warning"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("albums"));
        } else {
            if (!empty($_FILES["image"]["name"])) {

                $config["upload_path"] = "../uploads/albums/";
                $config["allowed_types"] = "gift|jpg|jpeg|png|svg";
                $config["file_name"] = uniqid();

                $this->load->library("upload", $config);
                $upload = $this->upload->do_upload("image");

                if ($upload) {
                    $uploaded_filename = $this->upload->data("file_name");

                    $config["image_library"] = "gd2";
                    $config["source_image"] = "../uploads/albums/" . $uploaded_filename;
                    $config["create_thumb"] = FALSE;
                    $config["maintain_ratio"] = TRUE;
                    $config["quality"] = "100%";
                    $config["witdh"] = 527;
                    $config["height"] = 307;

                    $this->load->library("image_lib", $config);
                    $this->image_lib->resize();

                    $insert = $this->default_model->insert(
                        "albums",
                        array(
                            "image" => "albums/" . $uploaded_filename,
                            "title" => $title,
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
                    redirect(base_url("albums"));

                } else {

                    $alert = array(
                        'title' => "Error!",
                        'subtitle' => "Album upload failed. Try again!",
                        'type' => "error"
                    );

                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("albums"));

                }


            } else {

                $alert = array(
                    'title' => "Error!",
                    'subtitle' => "Image field cannot be empty. Try again!",
                    'type' => "error"
                );

                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("albums"));

            }
        }
    }

    public function update($id)
    {
        $title = $this->input->post("title");

        if (!$title) {
            $alert = array(
                'title' => "Attention!",
                'subtitle' => "Please do not leave space in the form field!",
                'type' => "warning"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("albums"));
        } else {
            if (!empty($_FILES["image"]["name"])) {
                $image_data = $this->default_model->get("albums", array("id" => $id));

                unlink("uploads/" . $image_data->image);

                $config["upload_path"] = "../uploads/albums/";
                $config["allowed_types"] = "gift|jpg|jpeg|png|svg";
                $config["file_name"] = uniqid();

                $this->load->library("upload", $config);
                $upload = $this->upload->do_upload("image");

                if ($upload) {
                    $uploaded_filename = $this->upload->data("file_name");

                    $config["image_library"] = "gd2";
                    $config["source_image"] = "../uploads/albums/" . $uploaded_filename;
                    $config["create_thumb"] = FALSE;
                    $config["maintain_ratio"] = TRUE;
                    $config["quality"] = "100%";
                    $config["witdh"] = 527;
                    $config["height"] = 307;

                    $this->load->library("image_lib", $config);
                    $this->image_lib->resize();

                    $update = $this->default_model->update(
                        "albums",
                        array("id" => $id),
                        array(
                            "image" => "albums/" . $uploaded_filename,
                            "title" => $title
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
                    redirect(base_url("albums"));

                } else {

                    $alert = array(
                        'title' => "Error!",
                        'subtitle' => "Album upload failed. Try again!",
                        'type' => "error"
                    );

                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("albums"));

                }


            } else {
                $update = $this->default_model->update(
                    "albums",
                    array("id" => $id),

                    array(
                        "title" => $title
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
                redirect(base_url("albums"));


            }
        }
    }

    public function delete($id)
    {
        $image_data = $this->default_model->get("albums", array("id" => $id));

        unlink("uploads/" . $image_data->image);

        $delete = $this->default_model->delete("albums", array("id" => $id));
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
        redirect(base_url("albums"));
    }

    public function isactivesetter($id)
    {
        if ($id) {
            $isActive = ($this->input->post("data") == "true") ? 1 : 0;
            $this->default_model->update("albums", array("id" => $id), array("status" => $isActive));
        }
    }

    public function ranksetter()
    {
        $data = $this->input->post("data");
        parse_str($data, $rank);
        $value = $rank["rank"];
        foreach ($value as $rank => $id) {
            $this->default_model->update("albums", array("id" => $id), array("rank" => $rank));
        }
    }

    public function uploadpage($id)
    {
        $viewData = new stdClass();

        $album = $this->default_model->get("albums", array("id" => $id));
        $albums = $this->default_model->get_all("album_images", array("album_id" => $id), "rank ASC");

        $admin = $this->default_model->get("admin", array("id" => 1));

        $settings = $this->default_model->get("settings", array("id" => 1));
        $viewData->settings = $settings;

        $viewData->admin = $admin;
        $viewData->title = $settings->title;


        $viewData->album = $album;
        $viewData->albums = $albums;
        $viewData->url = "albums";
        $this->load->view('album_images', $viewData);
    }

    public function uploadimages($id)
    {

        $config["upload_path"] = "../uploads/album_images/";
        $config["allowed_types"] = "gift|jpg|jpeg|png|svg";
        $config["file_name"] = uniqid();

        $this->load->library("upload", $config);
        $upload = $this->upload->do_upload("file");

        if ($upload) {
            $uploaded_filename = $this->upload->data("file_name");

            $config["image_library"] = "gd2";
            $config["source_image"] = "../uploads/album_images/" . $uploaded_filename;
            $config["create_thumb"] = FALSE;
            $config["maintain_ratio"] = TRUE;
            $config["quality"] = "100%";
            $config["witdh"] = 527;
            $config["height"] = 307;

            $this->load->library("image_lib", $config);
            $this->image_lib->resize();

            $this->default_model->insert(
                "album_images",
                array(
                    "album_images" => "album_images/" . $uploaded_filename,
                    "album_id" => $id,
                    "status" => 1,
                    "rank" => 0,
                    "created_at" => date("Y-m-d")
                )
            );


        }

    }

    public function image_delete($id)
    {
        $image_data = $this->default_model->get("album_images", array("id" => $id));

        unlink("uploads/" . $image_data->album_images);

        $delete = $this->default_model->delete("album_images", array("id" => $id));
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
        redirect(base_url("albums/uploadpage/$image_data->album_id"));
    }
    public function alldelete($id)
    {
        $image_data = $this->default_model->get_all("album_images", array("album_id" => $id), "id DESC");
        foreach ($image_data as $image_datas) {
            unlink("uploads/" . $image_datas->album_images);
        }
        $delete = $this->default_model->delete("album_images", array("album_id" => $id));
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
        redirect(base_url("albums/uploadpage/$id"));
    }

    public function isactivesetter2($id)
    {
        if ($id) {
            $isActive = ($this->input->post("data") == "true") ? 1 : 0;
            $this->default_model->update(
                "album_images"
                ,
                array(
                    "id" => $id
                ),
                array("status" => $isActive)
            );
        }
    }

    public function ranksetter2($id)
    {
        $data = $this->input->post("data");
        parse_str($data, $rank);
        $value = $rank["rank"];
        foreach ($value as $rank => $id) {
            $this->default_model->update("album_images", array("id" => $id), array("rank" => $rank));
        }
    }
}
