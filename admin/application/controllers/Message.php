<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Message extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("default_model");
    }

    public function index()
    {
        $viewData = new stdClass();

        $message = $this->default_model->get_all("message", array(), "id DESC");

        $admin = $this->default_model->get("admin", array("id" => 1));

        $settings = $this->default_model->get("settings", array("id" => 1));
        $viewData->settings = $settings;

        $viewData->admin = $admin;
        $viewData->title = $settings->title;
        $viewData->message = $message;
        $viewData->url = "message";
        $this->load->view('message', $viewData);
    }

    public function reply($id)
    {
        $reply = $this->input->post("reply");
        $mail = $this->input->post("mail");
        $subject = $this->input->post("subject");

        if (!$reply) {
            $alert = array(
                'title' => "Attention!",
                'subtitle' => "Please do not leave space in the form field!",
                'type' => "warning"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("message"));
        } else {

            $smtp_data = $this->default_model->get("settings", array("id" => 1));

            $config = array(
                "protocol" => "smtp",
                "smtp_host" => "$smtp_data->host",
                "smtp_port" => "$smtp_data->port",
                "smtp_user" => "$smtp_data->user_mail",
                "smtp_pass" => "$smtp_data->user_password",
                "mailtype" => "html",
                "charset" => "utf-8",
                "wordwrap" => true,
                "newline" => "\r\n"

            );

            $this->load->library('email');

            $this->email->initialize($config);

            $this->email->from($smtp_data->user_mail, "Selim Eren KARAR");

            $this->email->to($mail);

            $this->email->subject($subject);

            $this->email->message($reply);

            $send = $this->email->send();

            if ($send) {
                $alert = array(
                    'title' => "Congrats!",
                    'subtitle' => "Your answer has been sent successfully!",
                    'type' => "success"
                );

                $reply_status = $this->default_model->update("message", array("id" => $id), array("reply_status" => 1));

            } else {
                $alert = array(
                    'title' => "Error!",
                    'subtitle' => "Reply could not be sent. Try again!",
                    'type' => "error"
                );
            }
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("message"));
        }
    }

    public function delete($id)
    {
        $delete = $this->default_model->delete("message", array("id" => $id));
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
        redirect(base_url("message"));
    }
}
