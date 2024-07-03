<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    public function __construct()
    {
        parent:: __construct();
        $this->load->model("default_model");
    }

    public function index()
    {
        $viewData  = new stdClass();

        $message    = $this->default_model->get_all("message",array(),"id DESC");

        $admin= $this->default_model->get("admin",array("id"=>1));

        $settings= $this->default_model->get("settings",array("id"=>1));
        $viewData->settings = $settings;

        $viewData->admin   = $admin;
        $viewData->title = $settings->title;
        $viewData->message   = $message;
        $viewData->url = "message";
        $this->load->view('message',$viewData);
    }



    public function reply($id)
    {
        $reply     = $this->input->post("reply");
        $mail      = $this->input->post("mail");
        $subject   = $this->input->post("subject");


        /**verilerimizin inputlarda dolu yada boşluk kontrolunu yapıcağız.*/
        if(!$reply )

            /**todo alert notification gelicek unutma.*/
        {
            $alert = array(
                'title'    => "Attention!",
                'subtitle' => "Please do not leave space in the form field!",
                'type'     => "warning"
            );
            $this->session->set_flashdata("alert",$alert);
            redirect(base_url("message"));
        }else{

          $smtp_data = $this->default_model->get("settings",array("id"=>1));

            //Smtp Mail kodları
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

        $this->load->library('email'); //email kütüphanesini includ ettik.

        $this->email->initialize($config); //sunucu bilgilerini email kütüphanesine gönderdik

        $this->email->from($smtp_data->user_mail,"Selim Eren KARAR");//mail gönderen bilgileri

        $this->email->to($mail); //formdan gelen mail alıcı bilgileri

        $this->email->subject($subject); //Formdan gelen mail konusu

        $this->email->message($reply); //Formdan gelen mail içeriği

        $send=$this->email->send(); //Email kütüphanesi ile maili gönderiyoruz.



            if($send)
            {
                $alert = array(
                    'title'    => "Congrats!",
                    'subtitle' => "Cevabınız başarılı bir şekilde gönderildi!",
                    'type'     => "success"
                );

             $reply_status = $this->default_model->update("message",array("id"=>$id),array("reply_status"=>1));

            }else{
                $alert = array(
                    'title'    => "Error!",
                    'subtitle' => "Ceva gönderilemedi.Tekrar deneyin!",
                    'type'     => "error"
                );
            }
            $this->session->set_flashdata("alert",$alert);
            redirect(base_url("message"));
        }

    }

    public function delete($id)
    {

            $delete = $this->default_model->delete("message",array("id"=>$id));
            if($delete)
            {
                $alert = array(
                    'title'    => "Congrats!",
                    'subtitle' => "The deletion was successful!",
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
            redirect(base_url("message"));
        }

//   public function isactivesetter($id)
//    {
//        if($id)
//        {
//            $isActive = ($this->input->post("data") == "true") ? 1 : 0;
//            $this->default_model->update("message",array("id"=>$id),array("status"=>$isActive));
//        }
//    }
//





}
