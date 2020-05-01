<?php

    class co_upload extends CI_Controller{

        function __construct(){
            // method helper form dan url
            parent::__construct();
            $this->load->helper(array('form','url'));
        }
        
        // membuat function menampilkan halaman
        public function index(){
            $this->load->view('v_upload_data',array('message' => ' '));
        }

        // membuat function untuk upload data
        public function aksi_upload(){
            // memilih lokasi penyimpanan gambar
            $config['upload_path'] = './gambar/';
            // memilih file yang bisa di upload
            $config['allowed_types'] = 'jpg|png|jpeg';
            // maximal size kb
            $config['max_size'] = 500;
            // dimensi lebar
            $config['max_width'] = 10240;
            // dimensi tinggi
            $config['max_height'] = 10240;
            // nama baru file yang akan diupload
            $new_name = "file_".time();
            // setting nama baru
            $config['file_name'] = $new_name;

            // meload library upload data dari codeigneter
            $this->load->library('upload',$config);

            // kondisi jika upload berhasil
            if(!$this->upload->do_upload('berkas')){
                $message = array ('message' => $this->upload->display_errors());
                $this->load->view('v_upload_data',$message);
            }else{
                $message = array ('message' => 'upload berhasil');
                $this->load->view('v_upload_data',$message);
            }

        }
        
    }

