<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jenis_barang extends CI_Controller {
	//load model_jenis_barang dan form validation
	function __construct(){
		parent::__construct();
		$this->load->model('model_jenis_barang');
		$this->load->library('form_validation');
	}

	//membuat function untuk menampilkan halaman insert
	//jenis barang dengan nama entry_jenis
	public function view_insert()
	{
		//menampilkan variabel message pada view entry_jenis
		$message=array('message'=>'Silahkan masukkan data');
		$this->load->view('entry_jenis',$message);
	}
	//membuat function untuk validasi
	public function validation_data()
	{
		//membuat variabel menampung fungsi dari model
		$model_jenis_barang=$this->model_jenis_barang;
		$validation=$this->form_validation;
		//isikan parameter kesesuaian data dari model
		$validation->set_rules($model_jenis_barang->rules());
		//menjalankan fungsi validasi
		if ($validation->run()) 
		{
			//menampung nilai post dari view kedalam variabel
			$kode_jenis=$this->input->post('kode_jenis');
			$nama_jenis=$this->input->post('nama_jenis');
			$deskripsi=$this->input->post('deskripsi');

			//menampung varibel kedalam array
			$data=array('kode_jenis'=>$kode_jenis
				,'nama_jenis'=>$nama_jenis
				,'deskripsi'=>$deskripsi);

			//bila data valid
			$this->model_jenis_barang->insertData($data);

			//memanggil fungsi untuk memanggil data
			$dataShow['jenis_barang']=$this->model_jenis_barang->showData();
			//memanggil view dan mengirim variabel
			$this->load->view('show_jenis_barang',$dataShow);
		}
		else
		{
			$message=array('message'=>'Data tidak valid');
			$this->load->view('entry_jenis',$message);
		}
	}

	//membuat function untuk menyalurkan data dari model ke view
	public function showData()
	{
		//load model
		$this->load->model('model_jenis_barang');
		//membuat variabel untuk menampung data dari model
		//dari fungsi showData dari model
		$data['jenis_barang']=$this->model_jenis_barang->showData();
		//memanggil view dan mengirim variabel
		$this->load->view('show_jenis_barang',$data);
	}

	public function showDataFilter(){
		// Mendapatkan nilai dari data yang di cari
		$nama_jenis = $this->input->post('txt_cari');
		// load model
		$this->load->model('model_jenis_barang');
		// manampung variable untuk menampung data dari model dari fungsi showFataFilter dari model dan memberikan nilai dari parameter nama_jenis
		$data['jenis_barang']=$this->model_jenis_barang->showDataFilter($nama_jenis);
		// memangil view dan mengirim variable
		$this->load->view('show_jenis_barang', $data);
	}

	// function untuk memunculkan data yang ingin diupdate pada form edit_jenis
	public function view_update($kode_jenis){
		$where=array('kode_jenis'=>$kode_jenis);
		$this->load->model('model_jenis_barang');
		$data['jenis_barang']=$this->model_jenis_barang->showDataEdit($where,'kode_jenis')->result();
		$this->load->view('edit_jenis',$data);
	}

	public function update_jenis(){
		$this->load->model('model_jenis_barang');
		$jenis_barang=$this->model_jenis_barang;
		$kode_jenis=$this->input->post('kode_jenis');
		$nama_jenis=$this->input->post('nama_jenis');
		$deskripsi=$this->input->post('deskripsi');

		$data=array('kode_jenis'=>$kode_jenis,'nama_jenis'=>$nama_jenis,'deskripsi'=>$deskripsi);
		$this->model_jenis_barang->update($data,'jenis_barang');
		$data['jenis_barang'] = $this->model_jenis_barang->showData();
		$this->load->view('show_jenis_barang',$data);
	}

	// function untuk memanggil fungsi menghapus data pada model
	public function delete_jenis($kode_jenis){
		$this->load->model('model_jenis_barang');
		$this->model_jenis_barang->delete_data($kode_jenis, 'kode_jenis');
		// membuat fungsi untuk redirect ke halaman jenis_barang/show_data
		redirect(base_url().'jenis_barang/showData');
	}

}
