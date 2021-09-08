<?php
class Auth extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->model('PenggunaModel');
    }

    public function index()
    {
        $this->load->view('login');
    }

    function login()
    {
        if(isset($_POST['submit'])){

            // proses login disini
            
            $username   =   $this->input->post('username');
            $password   =   $this->input->post('password');
//            $passmd5    = md5($password);

            $hasil= $this->PenggunaModel->masuk($username,$password)->row_array();

            
            if($username == $hasil['username'] && $password == $hasil['password'] )
            { 
                $level = $this->PenggunaModel->ambiLevelAkses($username)->result();
                $this->session->set_userdata(array('statusLlogin'=>'oke','username'=>$username,'level'=>$level[0]->level));
               // $_SESSION['Login'] = $username
                 redirect('Dashboard');
            }

            else
            {
              $Welcome=base_url();
//              echo $this->session->set_flashdata('msg','Username Atau Password Salah');
                echo $this->session->set_flashdata("msg","<div class='alert alert-danger alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
                                ×
                            </button>
                             Gagal ! Username atau Password Salah ! 
                </div>");
              redirect('Welcome');
            }
        }
        
    }


    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
