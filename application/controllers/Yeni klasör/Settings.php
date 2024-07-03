<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

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

        $settings  = $this->default_model->get("settings",array("id"=>1));

        $social    = $this->default_model->get_all("social",array(),"rank ASC");

        $admin= $this->default_model->get("admin",array("id"=>1));

        $viewData->settings = $settings;
        $viewData->admin   = $admin;
        $viewData->social   = $social;
        $viewData->title = $settings->title;
	    $viewData->url = "settings";
		$this->load->view('settings',$viewData);
	}

	public function update_site_ayarlari($id)
{
    $title       = $this->input->post("title");
    $description = $this->input->post("description");
    $keywords    = $this->input->post("keywords");
    $author      = $this->input->post("author");
    $footer      = $this->input->post("footer");

    /**verilerimizin inputlarda dolu yada boşluk kontrolunu yapıcağız.*/
    if(!$title || !$description || !$keywords || !$author || !$footer)

        /**todo alert notification gelicek unutma.*/
    {
        $alert = array(
            'title'    => "Attention!",
            'subtitle' => "Please do not leave space in the form field!",
            'type'     => "warning"
        );
        $this->session->set_flashdata("alert",$alert);
        redirect(base_url("settings"));
    }else{
        $update = $this->default_model->update("settings",array("id"=>$id),array("title"=>$title,"description"=>$description,"keywords"=>$keywords,"author"=>$author,"footer"=>$footer));
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
        redirect(base_url("settings"));
    }

}

    public function update_iletisim($id)
    {
        $phone       = $this->input->post("phone");
        $mail        = $this->input->post("mail");
        $fax         = $this->input->post("fax");
        $adress      = $this->input->post("adress");
        $maps        = $this->input->post("maps");

        /**verilerimizin inputlarda dolu yada boşluk kontrolunu yapıcağız.*/
        if(!$phone || !$mail || !$fax || !$adress || !$maps)

            /**todo alert notification gelicek unutma.*/
        {
            $alert = array(
                'title'    => "Attention!",
                'subtitle' => "Please do not leave space in the form field!",
                'type'     => "warning"
            );
            $this->session->set_flashdata("alert",$alert);
            redirect(base_url("settings"));
        }else{
            $update = $this->default_model->update("settings",array("id"=>$id),array("phone"=>$phone,"mail"=>$mail,"fax"=>$fax,"adress"=>$adress,"maps"=>$maps));
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
            redirect(base_url("settings"));
        }

    }

    public function update_smtp($id)
    {
        $host                = $this->input->post("host");
        $user_mail           = $this->input->post("user_mail");
        $user_password       = $this->input->post("user_password");
        $port                = $this->input->post("port");
        $notification_mail   = $this->input->post("notification_mail");

        /**verilerimizin inputlarda dolu yada boşluk kontrolunu yapıcağız.*/
        if(!$host || !$user_mail || !$user_password || !$port || !$notification_mail)

            /**todo alert notification gelicek unutma.*/
        {
            $alert = array(
                'title'    => "Attention!",
                'subtitle' => "Please do not leave space in the form field!",
                'type'     => "warning"
            );
            $this->session->set_flashdata("alert",$alert);
            redirect(base_url("settings"));
        }else{
            $update = $this->default_model->update("settings",array("id"=>$id),array("host"=>$host,"user_mail"=>$user_mail,"user_password"=>$user_password,"port"=>$port,"notification_mail"=>$notification_mail));
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
            redirect(base_url("settings"));
        }

    }

    public function logoayarlari($id)
    {
        if(!empty($_FILES["logo"]["name"]))
        {
            $logo_data = $this->default_model->get("settings",array("id"=>$id));

            unlink("uploads/".$logo_data->logo);

            $config["upload_path"]   = "uploads/logofavicon/";
            $config["allowed_types"] = "gift|jpg|jpeg|png|svg";
            $config["file_name"]     = uniqid();

            $this->load->library("upload",$config);
            $upload = $this->upload->do_upload("logo");

            if($upload)
            {
                $uploaded_filename = $this->upload->data("file_name");

                $config["image_library"]   = "gd2";
                $config["source_image"]    =  "uploads/logofavicon/".$uploaded_filename;
                $config["create_thumb"]    = FALSE;
                $config["maintain_ratio"]  = TRUE;
                $config["quality"]         ="100%";
                $config["witdh"]  = 250;
                $config["height"] = 100;

                $this->load->library("image_lib",$config);
                $this->image_lib->resize();

                $update = $this->default_model->update("settings",array("id"=>$id),array("logo"=>"logofavicon/".$uploaded_filename));

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
                redirect(base_url("settings"));

            }else{

                $alert = array(
                    'title'    => "Error!",
                    'subtitle' => "Logo yüklenirken işlem başarısız oldu.Tekrar deneyin!",
                    'type'     => "error"
                );

                $this->session->set_flashdata("alert",$alert);
                redirect(base_url("settings"));

            }


        }else{

            $alert = array(
                'title'    => "Error!",
                'subtitle' => "The logo field cannot be empty. Try again!",
                'type'     => "error"
            );

            $this->session->set_flashdata("alert",$alert);
            redirect(base_url("settings"));

        }
    }

    public function faviconayarlari($id)
    {
        if(!empty($_FILES["favicon"]["name"]))
        {
            $favicon_data = $this->default_model->get("settings",array("id"=>$id));

            unlink("uploads/".$favicon_data->favicon);

            $config["upload_path"]   = "uploads/logofavicon/";
            $config["allowed_types"] = "gift|jpg|jpeg|png|svg";
            $config["file_name"]     = uniqid();

            $this->load->library("upload",$config);
            $upload = $this->upload->do_upload("favicon");

            if($upload)
            {
                $uploaded_filename = $this->upload->data("file_name");

                $config["image_library"]   = "gd2";
                $config["source_image"]    =  "uploads/logofavicon/".$uploaded_filename;
                $config["create_thumb"]    = FALSE;
                $config["maintain_ratio"]  = TRUE;
                $config["quality"]         ="100%";
                $config["witdh"]  = 75;
                $config["height"] = 50;

                $this->load->library("image_lib",$config);
                $this->image_lib->resize();

                $update = $this->default_model->update("settings",array("id"=>$id),array("favicon"=>"logofavicon/".$uploaded_filename));

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
                redirect(base_url("settings"));

            }else{

                $alert = array(
                    'title'    => "Error!",
                    'subtitle' => "Favicon upload failed. Try again!",
                    'type'     => "error"
                );

                $this->session->set_flashdata("alert",$alert);
                redirect(base_url("settings"));

            }


        }else{

            $alert = array(
                'title'    => "Error!",
                'subtitle' => "Favicon field cannot be empty. Try again!",
                'type'     => "error"
            );

            $this->session->set_flashdata("alert",$alert);
            redirect(base_url("settings"));

        }
    }





}
