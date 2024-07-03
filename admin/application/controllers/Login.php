<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("default_model");
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function loginControl()
    {
        $mail = $this->input->post("mail");
        $password = $this->input->post("password");

        if (!$mail || !$password) {
            $alert = array(
                'title' => "Attention!",
                'subtitle' => "Please do not leave any empty space when logging in!",
                'type' => "warning"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("login"));
        } else {
            $admins = $this->default_model->get(
                "admin",
                array(
                    "mail" => $mail,
                    "password" => md5($password),
                )
            );

            if ($admins) {
                $alert = array(
                    'title' => "Congrats!",
                    'subtitle' => "<b>$admins->name</b> Welcome to the Admin Panel.",
                    'type' => "success"
                );

                $this->session->set_userdata("admins", $admins);
                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("home"));

            } else {
                $alert = array(
                    'title' => "Error!",
                    'subtitle' => "You entered your email or password incorrectly!",
                    'type' => "error"
                );
                $this->session->set_flashdata("alert", $alert);
                redirect(base_url("login"));

            }
        }
    }

    public function logout()
    {
        $admins = $this->session->userdata("admins");
        $this->session->unset_userdata($admins);
        redirect(base_url("login"));
    }
}