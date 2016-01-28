<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

class Home extends CI_Controller {
        public function __construct()
        {
                parent::__construct();
                //$this->load->model('home_model');
                $this->load->helper('url_helper');
        }
        public function index()
        {
            $this->load->helper('form');
            $this->load->library('form_validation');
            $data['title'] = 'Spice up your life';
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('text', 'Text', 'required');

            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/bootstrap_include.php');
                //$this->load->view('templates/header', $data);
                $this->load->view('home/index', $data);
                $this->load->view('templates/footer');

            }
            else
            {
                $this->load->view('templates/bootstrap_include.php');
                //$this->load->view('templates/header', $data);
                $this->load->view('home/index', $data);
                $this->load->view('templates/footer');
            }
        }
}