<html>
<title>Menampilkan Data Jenis Barang</title>
<body>
<h1>Menampilkan data jenis barang</h1>

<form action="<?= base_url().'jenis_barang/showDataFilter'; ?>" method="post">
	<a href="<?= base_url().'jenis_barang/view_insert' ?>">Tambah Data</a>

	Pencarian jenis barang
	<input type="text" name="txt_cari">
	<input type="submit" value="cari">
	<table border="1">
		<tr>
			<td>Kode Jenis</td>
			<td>Nama Jenis</td>
			<td>Deskripsi</td>
			<td>Action</td>
		</tr>
		<?php
			//membuat fungsi looping untuk menampilkan data
			foreach($jenis_barang->result_array() as $dt):
				$kode_jenis=$dt['kode_jenis'];
				$nama_jenis=$dt['nama_jenis'];
				$deskripsi=$dt['deskripsi'];
		?>
		<tr>
			<td><?= $kode_jenis; ?></td>
			<td><?= $nama_jenis; ?></td>
			<td><?= $deskripsi; ?></td>
			<td><a href="<?= base_url().'jenis_barang/view_update/'.$kode_jenis; ?>">Edit</a>
			<a href="<?= base_url().'jenis_barang/delete_jenis/'.$kode_jenis; ?>">Delete</a></td>
		</tr>
		<?php //mengakhiri looping
		endforeach; ?>
	</table>
</form>
</body>
</html>