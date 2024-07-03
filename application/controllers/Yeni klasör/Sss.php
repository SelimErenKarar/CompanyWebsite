<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sss extends CI_Controller {

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

        $sss    = $this->default_model->get_all("sss",array(),"rank ASC");

        $admin= $this->default_model->get("admin",array("id"=>1));

        $settings= $this->default_model->get("settings",array("id"=>1));
        $viewData->settings = $settings;

        $viewData->admin   = $admin;
        $viewData->title = $settings->title;
        $viewData->sss   = $sss;
        $viewData->url = "sss";
        $this->load->view('sss',$viewData);
    }


	public function insert()
{
    $title   = $this->input->post("title");
    $icon    = $this->input->post("icon");
    $content = $this->input->post("content");


    /**verilerimizin inputlarda dolu yada boşluk kontrolunu yapıcağız.*/
    if(!$title || !$icon || !$content )

        /**todo alert notification gelicek unutma.*/
    {
        $alert = array(
            'title'    => "Attention!",
            'subtitle' => "Please do not leave space in the form field!",
            'type'     => "warning"
        );
        $this->session->set_flashdata("alert",$alert);
        redirect(base_url("sss"));
    }else{
        $insert = $this->default_model->insert("sss",array("title"=>$title,"icon"=>$icon,"content"=>$content,"status"=>1,"created_at"=>date("Y-m-d")));
        if($insert)
        {
            $alert = array(
                'title'    => "Congrats!",
                'subtitle' => "The transaction was successful!",
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
        redirect(base_url("sss"));
    }

}

    public function update($id)
    {
        $title   = $this->input->post("title");
        $icon    = $this->input->post("icon");
        $content = $this->input->post("content");


        /**verilerimizin inputlarda dolu yada boşluk kontrolunu yapıcağız.*/
        if(!$title || !$icon || !$content )

            /**todo alert notification gelicek unutma.*/
        {
            $alert = array(
                'title'    => "Attention!",
                'subtitle' => "Please do not leave space in the form field!",
                'type'     => "warning"
            );
            $this->session->set_flashdata("alert",$alert);
            redirect(base_url("sss"));
        }else{
            $update = $this->default_model->update("sss",array("id"=>$id),array("title"=>$title,"icon"=>$icon,"content"=>$content,"status"=>1,"created_at"=>date("Y-m-d")));
            if($update)
            {
                $alert = array(
                    'title'    => "Congrats!",
                    'subtitle' => "The transaction was successful!",
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
            redirect(base_url("sss"));
        }

    }

    public function delete($id)
    {

            $delete = $this->default_model->delete("sss",array("id"=>$id));
            if($delete)
            {


            }else{

            }
            $this->session->set_flashdata("alert",$alert);
            redirect(base_url("sss"));
        }

    public function isactivesetter($id)
    {
        if($id)
        {
            $isActive = ($this->input->post("data") == "true") ? 1 : 0;
            $this->default_model->update("sss",array("id"=>$id),array("status"=>$isActive));
        }
    }

    public function ranksetter()
    {
        $data = $this->input->post("data");
        parse_str($data,$rank);
        $value = $rank["rank"];
        foreach ($value as $rank =>$id)
        {
            $this->default_model->update("sss",array("id"=>$id),array("rank"=>$rank));
        }
    }




}
