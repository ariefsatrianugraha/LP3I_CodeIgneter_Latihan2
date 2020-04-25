<?php
    defined('BASEPATH') OR exit ('No direct script access allowed');

    class co_home extends CI_Controller{
        function __construct(){
            // mencegah pengguna langsung mengakses tanpa memasukan session yang didapat dari halaman login
            parent::__construct();
            if($this->session->userdata('status') != 'login'){
                redirect(base_url('login'));
            }
        }

        public function index(){
            $this->load->view('home');
        }
    }