<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
        
        $this->load->view('login');
    }

    public function loginControl()
    {
        $mail       = $this->input->post("mail");
        $password   = $this->input->post("password");

        if(!$mail || !$password ) {
            $alert = array(
                'title' => "Attention!",
                'subtitle' => "Lütfen giriş alanında boş stun bırakmayınız!",
                'type' => "warning"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("login"));
    }else{

        $admins= $this->default_model->get("admin",array("mail"=>$mail,"password"=>md5($password),));

        if($admins){
            // giriş olursa sessionları oluşturmaya başlar..
            $alert = array(
                'title' => "Congrats!",
                'subtitle' => "<b>$admins->name</b> Admin Paneline Hoşgeldiniz.",
                'type' => "success"
            );

            $this->session->set_userdata("admins",$admins);
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("home"));



        }else{
            //giriş başarısız olursa alert gönder..

            $alert = array(
                'title' => "Error!",
                'subtitle' => "You entered your email or password incorrectly!",
                'type' => "warning"
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

    $this->session->set_flashdata("alert", $alert);
    redirect(base_url("login"));
    }	

    

    



}
