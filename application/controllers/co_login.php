<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class co_login extends CI_Controller {
        // membuat function untuk menampilkan halaman login
        public function show_login(){
            $message = array('message'=>'Masukan username dan password');
            $this->load->view('login',$message);
        }

        // membuat function login
        public function login(){
            // meload model-model login
            $this->load->model('model_login');

            // untuk mendapatkan nilai yang dikirim oleh view
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // untuk mendapatkan nilai yang dikirimkan menjadi sebuah array dan password dieksripsi dengan md5
            $where = array('username'=>$username,'password'=>md5($password));

            // Menampung nilai balik apakah data username dan password ada didalam database
            $cek=$this->model_login->cek_login('pengguna',$where)->num_rows();

            // bila mendapat nilai balik dari database lebih dari 0 baris
            if($cek>0){
                // membuat array untuk menampung data ketika login berhasil
                $data_session=array('name'=>$username,'status'=>'login');

                // mengaktifkan fungsi session pada codeigneter
                $this->session->set_userdata($data_session);

                // masuk kedalam home
                redirect (base_url('home'));
            }
            // bila mendapatkan nilai balik dari database = 0
            else{
                // bila username dan password salah maka akan kembali ke halaman login
                $message=array('message'=>'Username dan Password salah');
                $this->load->view('login',$message);
            }
        }

        // membuat logout
        public function logout(){
            // untuk menghapus session
            $this->session->sess_destroy();
            // kembali kehalaman login
            redirect(base_url('login'));
        }

    }