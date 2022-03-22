<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mail extends CI_Controller
{

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
    function __construct()
    {
        parent::__construct();
        $this->load->library('email');
        $this->load->helper('form');
        $this->load->model('mailmodel');
    }
    public function index()
    {
        $this->load->helper('form');
        $this->load->view('contact_email_form');
    }

    public function send_mail()
    {
        //print_r($_POST);exit; 
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com';
        $config['smtp_port'] = '465';
        $config['smtp_user'] = 'hardiks.elsner@gmail.com';
        $config['smtp_pass'] = 'hardik@01';
        $config['charset'] = 'utf-8';
        $config['newline'] = "\r\n";
        $config['mailtype'] = "text";
        $config['validation'] = TRUE;  //bool whether to validate email or not

        $this->email->initialize($config);

        $from_email = "hardiks.elsner@gmail.com";
        $to_email = $this->input->post('email');
        $to_pass = $this->input->post('password');

        $mail = "Testing Email For CI: " . $to_email . " " . "Your Password Is" . $to_pass;
        //echo $mail;exit;
        $this->email->from($from_email);
        $this->email->to($to_email);
        $this->email->subject('Email Test');
        $this->email->message($mail);
        $this->email->send();
        $this->load->model('mailmodel');
        $this->mailmodel->insert($to_email, $to_pass);
        redirect('Mail');
    }
}
