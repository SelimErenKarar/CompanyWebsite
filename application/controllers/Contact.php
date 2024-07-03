<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
    public function __construct()
    {
        parent:: __construct();
        $this->load->model("default_model");
    }

    public function index()
    {
        $viewData  = new stdClass();

        $settings = $this->default_model->get("settings",array("id"=>1));
        $viewData->settings             = $settings;

        $social = $this->default_model->get_all("social",array("status"=>1),"rank ASC");
        $viewData->social               = $social;

        $about_us = $this->default_model->get("about_us",array("id"=>1));
        $viewData->contact             = $about_us;

        $services = $this->default_model->get_all("services",array("status"=>1),"rank ASC");
        $viewData->services             = $services;

        $projects = $this->default_model->get_all("projects",array("status"=>1),"rank ASC");
        $viewData->projects             = $projects;

        $pages = $this->default_model->get_all("pages",array("status"=>1),"rank ASC");
        $viewData->pages                = $pages;

        $viewData->url = "contact";
        $this->load->view('contact',$viewData);
    }


    public function insert()
    {
        $name     = $this->input->post("name",true);
        $mail     = $this->input->post("mail",true);
        $phone    = $this->input->post("phone",true);
        $subject  = $this->input->post("subject",true);
        $content  = $this->input->post("content",true);


        if(!$name ||!$mail ||!$phone ||!$subject ||!$content)
        {
            $alert = array(
                'title'    => "Attention!",
                'subtitle' => "Please do not leave space in the form field!",
                'type'     => "warning"
            );
            $this->session->set_flashdata("alert",$alert);
            redirect(base_url("contact"));
        }else{
            $insert = $this->default_model->insert("message",
                array(
                    "name"      =>$name,
                    "mail"      =>$mail,
                    "subject"   =>$subject,
                    "phone"     =>$phone,
                    "content"   =>$content,
                    "reply_status"    =>0,
                    "created_at"=>date("Y-m-d")));
            if($insert)
            {
                $smtp_data = $this->default_model->get("settings",array("id"=>1));

                $config = array(
                    "protocol"  => "smtp",
                    "smtp_host" => "$smtp_data->host",
                    "smtp_port" => "$smtp_data->port",
                    "smtp_user" => "$smtp_data->user_mail",
                    "smtp_pass" => "$smtp_data->user_password",
                    "mailtype"  => "html",
                    "charset"   => "utf-8",
                    "wordwrap"  => true,
                    "newline"   => "\r\n"

                );

                $this->load->library('email'); 

                $this->email->initialize($config);

                $this->email->from($smtp_data->user_mail);

                $this->email->to($smtp_data->notification_mail);

                $send=$this->email->send(); 

                $alert = array(
                    'title'    => "Congrats!",
                    'subtitle' => "The sending message transaction was completed successfully!",
                    'type'     => "success"
                );

            }else{
                $alert = array(
                    'title'    => "Error!",
                    'subtitle' => "The process failed. Try again!",
                    'type'     => "error"
                );
            }
            $this->session->set_flashdata("alert",$alert);
            redirect(base_url("contact"));
        }
    }

}
