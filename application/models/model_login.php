<?php

class model_login extends CI_Model{
    // membuat function untuk menggambil nilai dari table pengguna
    function cek_login($table,$where){
        return $this->db->get_where($table,$where);
    }
}