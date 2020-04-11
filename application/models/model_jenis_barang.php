<?php

class model_jenis_barang extends CI_Model
{
	private $table="jenis_barang";

	//membuat fungsi validasi data dari form
	public function rules()
	{
		return 
		[
		//mendefinisikan kesesuaian data yang dimasukkan
			[
				'field'=>'kode_jenis',
				'label'=>'kode_jenis',
				'rules'=>'required'
			],
			[
				'field'=>'nama_jenis',
				'label'=>'nama_jenis',
				'rules'=>'required'
			]
		];

	}

	//membuat function untuk menampilkan data jenis barang
	public function showData()
	{
		//sintaks untuk menampilkan data dengan select
		//dan menaruh data dalam variabel
		$data=$this->db->query("SELECT kode_jenis,nama_jenis,deskripsi FROM jenis_barang");
		//mengembalikan variabel yang telah diisi data
		return $data;

	}

	public function showDataFilter($nama_jenis){
		// sintact untuk menampilkan data dengan select dengan where condition dan menaruh data pada variable
		$data = $this->db->query("SELECT kode_jenis,nama_jenis,deskripsi FROM jenis_barang WHERE nama_jenis LIKE '%".$nama_jenis."%'");
		// Mengembalikan variabel yang telah diisi data
		return $data;
	}

	//membuat function untuk memasukkan data
	public function insertData()
	{
		//membuat fungsi menampung nilai dari controller
		$post=$this->input->post();
		//mengisi field dari database dengan nilai pada variabel $post
		$this->kode_jenis=$post['kode_jenis'];
		$this->nama_jenis=$post['nama_jenis'];
		$this->deskripsi=$post['deskripsi'];
		//fungsi memasukkan data dalam database
		return $this->db->insert($this->table,$this);
	}

	public function showDataEdit($kode_jenis){
		$data = $this->db->get_where($this->table, $kode_jenis);
		return $data;
	}

	public function update(){
		$post=$this->input->post();
		$this->kode_jenis=$post['kode_jenis'];
		$this->nama_jenis=$post['nama_jenis'];
		$this->deskripsi = $post['deskripsi'];
		$this->db->where('kode_jenis',$this->kode_jenis);
		return $this->db->update($this->table, $this);
	}

	public function delete_data($kode_jenis){
		$this->db->where('kode_jenis',$kode_jenis);
		return $this->db->delete($this->table, $this);
	}
}
?>