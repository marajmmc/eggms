<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php

class Dashboard extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    function __construct()
    {
        parent::__construct();
        // $this->load->helper(array('url', 'form'));
    }

    public function index()
    {
        $user=User_helper::get_user();
        if ($user)
        {
            //go to its task
            $this->template->set_template('dashboard');
            $this->template->write('title', $this->lang->line("DASHBOARD_TITLE"));
            $this->template->write_view('content','dashboard/main');
            $this->template->render();
        }
        else
        {
            redirect(base_url() . 'dashboard/login');
            // die();
        }
    }

    public function logout()
    {
        $this->lang->load("dashboard_login");
        $this->session->set_userdata("user_id", "");
        System_helper::set_system_message($this->lang->line("LOGOUT_SUCCESS"), 1);
        redirect(base_url() . 'dashboard/login');
    }

    public function login() {
//        echo "login";
//        die();
        $this->lang->load("dashboard_login");
        $user=User_helper::get_user();

        if ($user)
        {
            redirect(base_url() . 'dashboard');
        }
        else
        {
            if ($this->input->post())
            {
                $username = System_helper::Get_Bng_to_Eng($this->input->post("user_name"));
                $password = System_helper::Get_Bng_to_Eng($this->input->post("password"));

                if ($username && $password)
                {
                    if (User_helper::login($username, $password))
                    {
                        $user=User_helper::get_user();
                        System_helper::set_system_message("Welcome to ".$user->username, 1);
                        redirect(base_url() . 'dashboard');
                    }
                    else
                    {
                        System_helper::set_system_message($this->lang->line("INVALID_USERNAME_PASSWORD"), 0);
                        redirect(base_url() . 'dashboard/login');
                    }
                }
                else
                {
                    System_helper::set_system_message($this->lang->line("EMPTY_USERNAME_PASSWORD"), 0);
                    redirect(base_url() . 'dashboard/login');
                }
            }
            else
            {
                $data['login_action_url'] = base_url().'dashboard/login';
                $this->template->set_template('login');
                $this->template->write('title',$this->lang->line("PAGE_LOGIN"));
                $this->template->write_view('content', 'dashboard/login', $data);
                $this->template->render();
            }
        }
    }

    public function menu()
    {
        //echo "login";
        $this->load->view('dashboard/menu');
    }


    public function user_registration()
    {
        $this->lang->load("dashboard_login");
        $this->template->set_template('login');
        $this->template->write('title', $this->lang->line("USER_REGISTRATION_TITLE"));
        $this->template->write_view('content','dashboard/user_registration');
        $this->template->render();
    }

    public function user_registration_save()
    {

        if(!$this->shop_checkValidation())
        {
            System_helper::set_system_message($this->lang->line("MSG_INVALID_DATA"),0);
            redirect(base_url().'dashboard/user_registration');
        }

        $this->load->model('common_model');
        $exist_user= $this->common_model->exist_user_email_address($this->input->post('email_address'));
        if($exist_user==true)
        {
            System_helper::set_system_message($this->lang->line("MSG_USER_EXIST"),0);
            redirect(base_url().'dashboard/user_registration');
        }
        /////////  start shop info //////////////
        $this->load->config('upload_config');
        $new_file_name = time().'.jpg';
        $img = System_helper::file_upload('logo',$this->config->item('shop_logo_img_upload_folder'), $new_file_name,$this->config->item('shop_logo_img_type'),$this->config->item('shop_logo_img_size'));

        $dataf['shop_name'] = $this->input->post('shop_name');
        $dataf['shop_address'] = $this->input->post('shop_address');
        $dataf['email_address'] = $this->input->post('email_address');
        $dataf['mobile_no'] = $this->input->post('mobile_no');
        $dataf['logo'] = $img;
        $dataf['Status'] = '1';

        Query_helper::add('shop_info',$dataf);
        $shop_id=$this->db->insert_id();
        /////////  end shop info //////////////

        /////////  start warehouse info //////////////
        $dataw['shop_id'] = $shop_id;
        $dataw['warehouse_name'] = 'Head Office Warehouse';
        $dataw['Status'] = '1';
        $dataw['CreatedBy'] = $shop_id;
        $dataw['CreationDate'] = System_helper::convert_date('date','CurrentSqlDateTime');
        Query_helper::add('warehouse_info',$dataw);
        /////////  end warehouse info //////////////

        /////////  start user info ///////////

        $data_user['shop_id'] = $shop_id;
        $data_user['user_group'] = 3;
        $data_user['mobile_no'] = $this->input->post('mobile_no');
        $data_user['username'] = $this->input->post('email_address');
        $data_user['password'] = md5($this->input->post('password'));
        $data_user['created_date']=time();
        Query_helper::add('sys_user',$data_user);

        /////////  end user info ///////////
        System_helper::set_system_message($this->lang->line("MSG_CREATE_SUCCESS"),1);
        redirect(base_url().'dashboard');
    }

    private function shop_checkValidation()
    {
        $this->load->helper('validation_helper');

        if (!Validation_helper::is_empty($this->input->post('shop_name'))) {
            return false;
        }

        if (!Validation_helper::is_empty($this->input->post('mobile_no'))) {
            return false;
        }

        if (!Validation_helper::is_empty($this->input->post('email_address'))) {
            return false;
        }

        return true;
    }

}

