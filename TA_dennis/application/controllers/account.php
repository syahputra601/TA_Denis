<?php

    /**
    * 
    */
    class Account extends CI_controller
    {
        
        function __construct()
        {
            parent::__construct();
            $this->load->database();
            $this->load->model('Account_model',"",true);
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('form_validation');
            $this->load->library('session');
        }

        function index()
        {
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
                if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('account/login');
                }
                else
                {
                        $this->load->view('account/success');
                }
        }

        function registrasi()
        {
            $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]|alpha');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
            $this->form_validation->set_rules('password_conf', 'Password Confirmation', 'matches[password]|required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('email', 'Email', 'required');
                if($this->form_validation->run()==FALSE){
                $data['username'] = set_value('username');
                $data['passowrd'] = set_value('password_conf');
                $data['email'] = set_value('email');
                $data['status'] = set_value('1');
                $data['level'] = set_value('level');

                $this->load->view('account/regist',$data);
                }
                else{
                $data = array('username' => set_value('username') ,
                              'password' => set_value('password_conf'),
                              'email' => set_value('email'),
                              'status' => set_value('level')
                             );
                $this->Account_model->simpan('user',$data);
                $this->load->view('account/login');
                }
        }

        function login()
        {
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->form_validation->run()==FALSE) {
                $data['username'] = set_value('username');
                $data['passowrd'] = set_value('password');
                $this->load->view('welcome/index');
            }

            else{
                $data = array('username' => $_POST['username'],
                              'password' => $_POST['password']);
                $hasil = $this->Account_model->getuser($data);
                if (!empty($hasil)) {
                    $this->Account_model->ambilsession($data);
                    foreach ($hasil as $key) {
                       
                    $sesi = array('username' => $key->username,
                                  'masuk' => TRUE,
                                  'level' => $key->status );
                    $level=$key->status;
                    }
                    // var_dump($sesi);exit();
                    $this->session->set_userdata($sesi,true);

                    if ($level==2) {
                        redirect ('pimpinan/index');
                    }
                    elseif ($level==3) {
                        redirect ('');
                    }
                    else {
                        redirect('welcome/index');
                    }
                    
                }
                else{
                    $this->load->view('account/login');
                }
           
            }
        }


        function logout()
        {
            $this->session->unset_userdata('masuk');
            redirect('account');
        }
    }
?>